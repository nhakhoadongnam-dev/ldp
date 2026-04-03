# CLAUDE.md — Hướng dẫn làm việc với dự án

## Thông tin repository

- **Remote:** `https://github.com/nhakhoadongnam-dev/ldp.git`
- **Main branch:** `main`
- **Git user:** `kimvuu` / `kimvuu2810@gmail.com`

---

## Thiết lập Git (bắt buộc đầu mỗi session)

```bash
git config user.name "kimvuu"
git config user.email "kimvuu2810@gmail.com"
git remote set-url origin https://github.com/nhakhoadongnam-dev/ldp.git
git config credential.helper store
```

> Nếu `~/.git-credentials` chưa có token, yêu cầu user cung cấp GitHub PAT rồi lưu:
> ```bash
> printf "https://kimvuu2810:<TOKEN>@github.com\n" > ~/.git-credentials
> ```

**Kiểm tra nhanh:** `git push --dry-run origin main 2>&1` — nếu báo lỗi auth thì token hết hạn, yêu cầu token mới.

---

## Quy trình Commit & Push

### 1. Cập nhật local trước khi làm việc

```bash
git fetch origin
git rebase origin/main
```

### 2. Sau khi chỉnh sửa — Commit

```bash
git add <file1> <file2> ...
git commit -m "Mô tả ngắn gọn thay đổi

Co-Authored-By: Claude <noreply@anthropic.com>"
```

> **Không dùng** `git add -A` hoặc `git add .` — chỉ add đúng file đã sửa.

### 3. Push lên GitHub

```bash
git push origin <tên-branch>
```

Nếu bị reject (non-fast-forward):

```bash
git push --force-with-lease origin <tên-branch>
```

### 4. Sau khi push — xóa token khỏi remote URL (nếu đang lộ)

```bash
git remote set-url origin https://github.com/nhakhoadongnam-dev/ldp.git
```

> Token chỉ nên nằm trong `~/.git-credentials`, không nên nằm trong remote URL.

---

## Quy tắc quan trọng

### Đồng bộ với live site
Trước khi chỉnh sửa landing page, kiểm tra file local có khớp với live site không:

```bash
curl -s https://nhakhoadongnam.com/page/<tên-page>/ > /tmp/live.html
diff /tmp/live.html page/<tên-page>/index.html
```

Nếu khác → copy live site về trước, rồi mới thêm thay đổi.

### Không tự ý sửa file khi chưa được yêu cầu
- Chỉ sửa đúng file/section được yêu cầu
- Không đụng vào các file khác dù thấy sai

### Tracking codes
Mỗi landing page phải có đủ 2 tracking code trong `<head>`:
1. Google Analytics: `G-SKMM9JDYTH` (gtag.js)
2. Google Tag Manager: `GTM-5XG3JXR`

---

## Cấu trúc landing pages

```
page/
├── index.html                        # Trang danh sách (không thêm tracking)
├── implant/index.html                # Landing page Implant
├── chuong-trinh-30-04/index.html     # Landing page ưu đãi 30/4
└── bang-gia-nha-khoa-dong-nam/       # Landing page bảng giá
    ├── index.html
    ├── style.css
    └── script.js
```
