#!/usr/bin/env python3
"""
Prefix all CSS selectors in trang-chu/style.css with .ndn-lp wrapper.

Rules:
- :root, @keyframes, @font-face, @import, @charset: leave body as-is.
- @media, @supports, @container: recurse into inner block.
- `body` selector (and `body::before`, `body.x`): replace `body` with `.ndn-lp`.
- `html` selector: leave as-is (global).
- `*`: prepend `.ndn-lp ` (becomes `.ndn-lp *`).
- Everything else: prepend `.ndn-lp `.
"""
import re
import sys
from pathlib import Path

PREFIX = ".ndn-lp"
LEAVE_ATRULES = {"keyframes", "-webkit-keyframes", "-moz-keyframes",
                 "font-face", "import", "charset", "page", "namespace"}
RECURSE_ATRULES = {"media", "supports", "container", "layer", "scope"}


def split_top_level(s: str, delim: str) -> list[str]:
    """Split by delim, respecting (), [], {} nesting and strings."""
    out, buf, depth, in_str = [], [], 0, None
    for ch in s:
        if in_str:
            buf.append(ch)
            if ch == in_str and (len(buf) < 2 or buf[-2] != '\\'):
                in_str = None
            continue
        if ch in "\"'":
            in_str = ch
            buf.append(ch)
        elif ch in "([{":
            depth += 1
            buf.append(ch)
        elif ch in ")]}":
            depth -= 1
            buf.append(ch)
        elif ch == delim and depth == 0:
            out.append("".join(buf))
            buf = []
        else:
            buf.append(ch)
    if buf:
        out.append("".join(buf))
    return out


def prefix_selector(sel: str) -> str:
    sel = sel.strip()
    if not sel:
        return sel
    # Handle :root
    if sel == ":root":
        return sel
    # Keyframe selectors: from, to, 0%, 50%, etc. — handled via context, but just in case
    if re.fullmatch(r"from|to|\d+%", sel):
        return sel
    # html stays global
    if sel == "html" or sel.startswith("html ") or sel.startswith("html,") or sel.startswith("html:"):
        return sel
    # body → .ndn-lp (apply body styles to wrapper)
    if sel == "body":
        return PREFIX
    m = re.match(r"^body(\W.*)$", sel)
    if m:
        rest = m.group(1)
        # body::before, body.class, body > x, body x, body:hover
        if rest.startswith((" ", ">", "+", "~", ",")):
            return f"{PREFIX}{rest}"
        return f"{PREFIX}{rest}"
    # Default: prepend
    return f"{PREFIX} {sel}"


def prefix_selector_list(sel_list: str) -> str:
    parts = split_top_level(sel_list, ",")
    return ", ".join(prefix_selector(p.strip()) for p in parts if p.strip())


def parse_and_transform(css: str) -> str:
    """Walk top-level statements and transform."""
    out = []
    i = 0
    n = len(css)
    while i < n:
        # skip whitespace but preserve
        m = re.match(r"\s+", css[i:])
        if m:
            out.append(m.group(0))
            i += len(m.group(0))
            continue
        # comments
        if css.startswith("/*", i):
            end = css.find("*/", i + 2)
            if end == -1:
                out.append(css[i:])
                return "".join(out)
            out.append(css[i:end + 2])
            i = end + 2
            continue
        # at-rule?
        if css[i] == "@":
            # find prelude end: either ; (simple) or { (block)
            j = i
            in_str = None
            while j < n:
                c = css[j]
                if in_str:
                    if c == in_str and css[j - 1] != '\\':
                        in_str = None
                elif c in "\"'":
                    in_str = c
                elif c == ";" or c == "{":
                    break
                j += 1
            if j >= n:
                out.append(css[i:])
                return "".join(out)
            prelude = css[i:j]
            name_match = re.match(r"@([\w-]+)", prelude)
            name = name_match.group(1).lower() if name_match else ""
            if css[j] == ";":
                out.append(prelude + ";")
                i = j + 1
                continue
            # block at-rule
            block_start = j
            depth = 1
            k = j + 1
            in_str = None
            while k < n and depth > 0:
                c = css[k]
                if in_str:
                    if c == in_str and css[k - 1] != '\\':
                        in_str = None
                elif c in "\"'":
                    in_str = c
                elif c == "{":
                    depth += 1
                elif c == "}":
                    depth -= 1
                k += 1
            body = css[block_start + 1:k - 1]
            if name in LEAVE_ATRULES:
                out.append(css[i:k])
            elif name in RECURSE_ATRULES:
                out.append(prelude + "{")
                out.append(parse_and_transform(body))
                out.append("}")
            else:
                # unknown @-rule with block: leave alone to be safe
                out.append(css[i:k])
            i = k
            continue
        # regular rule: selector { ... }
        # find { at top level
        j = i
        depth = 0
        in_str = None
        while j < n:
            c = css[j]
            if in_str:
                if c == in_str and css[j - 1] != '\\':
                    in_str = None
            elif c in "\"'":
                in_str = c
            elif c == "{" and depth == 0:
                break
            elif c == "(":
                depth += 1
            elif c == ")":
                depth -= 1
            j += 1
        if j >= n:
            out.append(css[i:])
            return "".join(out)
        selector = css[i:j]
        # find matching }
        depth = 1
        k = j + 1
        in_str = None
        while k < n and depth > 0:
            c = css[k]
            if in_str:
                if c == in_str and css[k - 1] != '\\':
                    in_str = None
            elif c in "\"'":
                in_str = c
            elif c == "{":
                depth += 1
            elif c == "}":
                depth -= 1
            k += 1
        body = css[j + 1:k - 1]
        new_sel = prefix_selector_list(selector)
        out.append(f"{new_sel} {{{body}}}")
        i = k
    return "".join(out)


def main():
    if len(sys.argv) < 3:
        print("Usage: prefix-css.py <input.css> <output.css>")
        sys.exit(1)
    inp = Path(sys.argv[1])
    outp = Path(sys.argv[2])
    css = inp.read_text(encoding="utf-8")
    result = parse_and_transform(css)
    outp.write_text(result, encoding="utf-8")
    print(f"Wrote {outp} ({len(result)} chars)")


if __name__ == "__main__":
    main()
