# Landing Page trong WP Theme — Đúc kết (tiếp theo OVERVIEW.md)

**Bối cảnh**: Sau loạt thử nghiệm trong OVERVIEW.md (Case 1–6 đều lỗi), quyết định dùng **WordPress Page Template** riêng (`page-trang-chu.php`) sống trong `wp-content/themes/flatsome-child/wp-theme/`, nạp CSS/JS từ `home_url('/trang-chu')`. Dưới đây là những gì đã học khi triển khai.

---

## 1. Kiến trúc cuối cùng

```
wp-content/themes/flatsome-child/wp-theme/page-trang-chu.php
    ↓ (Template Name: Trang Chủ Landing)
    ↓ Admin → Pages → New Page → chọn template → publish
    ↓ Output HTML hoàn chỉnh (tự viết <html>/<head>/<body>, không qua get_header/get_footer)
    ↓ wp_head() + wp_footer() để Elementor/plugin còn nhận diện
<link href="/trang-chu/style.css">
<script src="/trang-chu/script.js">
    ↑ load trực tiếp từ static HTML dir, 1 source of truth
```

**Ưu điểm**:
- Không cần dequeue Flatsome (giữ plugin CSS còn hoạt động bình thường).
- Không cần script copy assets — CSS/JS landing vẫn nằm trong `trang-chu/`, deploy cùng lúc với HTML tĩnh.
- 2 URL cùng dùng 1 file: `/trang-chu/` (static demo) và URL WP page (production).

---

## 2. Quy tắc cô lập CSS

Vì Flatsome (+ plugin + `Additional CSS` trong Customizer) đổ rất nhiều rule global, chỉ bọc `.ndn-lp` là **chưa đủ**. Rút ra 3 nguyên tắc:

### 2.1. Bọc wrapper `.ndn-lp`, prefix mọi selector
- Script `scripts/prefix-css.py` quét `trang-chu/style.css`, thêm `.ndn-lp ` trước mọi selector.
- Ngoại lệ giữ nguyên: `:root`, `@keyframes`, `@font-face`, `html`.
- Quy ước: `body` → `.ndn-lp` (style body gốc áp vào wrapper).

### 2.2. Tránh **ID trùng** với theme
Flatsome dùng các ID có rule mạnh (specificity ID cao hơn class, `.ndn-lp main` thua):
| ID Flatsome | Rule | Fix |
|---|---|---|
| `#main`, `#wrapper` | `background:#fff` | `id="main"` → `id="ndn-main"` |
| `#top-link` | `margin-bottom:70px` | tránh dùng |
| `#contact-menu`, `#wide-nav` | height cố định | tránh dùng |
| `#main-form-container`, `#mainImageContainer` | max-width, mobile rule | tránh dùng |

→ **Rule chung: mọi ID trong landing phải bắt đầu bằng `ndn-` hoặc `lp-`**.

### 2.3. Tránh **class tên chung** trùng với theme
Class trùng gây đổ layout vì Flatsome set property mà CSS landing không nghĩ đến sẽ override (ví dụ `display:flex` làm `<h2>` bị xé 2 đầu). Danh sách class đã confirmed đụng và đã rename:

| Class cũ | Class mới | Rule Flatsome gây xung đột |
|---|---|---|
| `.section-title` | `.ndn-title` | `display:flex; width:100%; justify-content:space-between` |
| `.container` | `.ndn-container` | `.container{max-width:...}` (Flatsome grid) |

### 2.4. Danh sách class/id có rủi ro cần tránh trong tương lai

Dưới đây là các selector xuất hiện trong **Flatsome core + Customizer Additional CSS** của Nha Khoa Đông Nam. Nếu landing cần dùng tên class/id trùng, phải prefix `ndn-`:

**Class generic** — nên luôn prefix:
`.container`, `.row`, `.col`, `.btn`, `.button`, `.post`, `.nav`, `.active`, `.panel`, `.arrow`, `.top`, `.bottom`, `.left`, `.right`, `.img`, `.box-text`, `.box-image`, `.slider-wrapper`, `.form-container`, `.collapse-content`, `.button-container`, `.section-bg-overlay`, `.fixed-height`, `.is-pc`, `.certificate`

**Class domain (đã được Customizer dùng)**:
`.doc-info`, `.doc-img`, `.decs`, `.l-doctors`, `.cam-nhan-khach-hang`, `.my-clinic-price-table`, `.dangkythamkham`, `.dk_nhanuudai`, `.from_the_blog_excerpt`, `.nav-spacing-xlarge`, `.pum-theme-default-theme`, `.m-paper`, `.slick-*` (slick-list, slick-track, slick-slide…), `.wpcf7-*`, `.open-video`, `.full-content`, `.wp-caption`

**ID cần tránh**:
`#main`, `#wrapper`, `#toc_container`, `#top-link`, `#contact-menu`, `#wide-nav`, `#main-form-container`, `#mainImageContainer`, `#menu-datlich`, `#menu-call`, `#tab-description`

---

## 3. Bẫy WordPress/Elementor

### 3.1. Elementor "không tìm thấy khu vực nội dung"
- Nguyên nhân: Elementor scan **rendered DOM** (không phải PHP source) tìm `the_content()`.
- Nếu dùng `ob_start(); the_content(); ob_end_clean()` — DOM không có → báo lỗi.
- Fix: output thật `the_content()` vào `<div class="elementor-hidden-content" style="display:none !important" aria-hidden="true">`.

### 3.2. WP Rocket cache ẩn đuôi
- Sau khi thay đổi CSS/JS, page HTML cập nhật ngay nhưng **CSS serve từ**
  `/wp-content/cache/background-css/.../trang-chu/style.css?ver=<timestamp>`
  vẫn là bản cũ.
- **Bắt buộc**: sau mỗi deploy CSS → WP Admin → WP Rocket → **Clear and preload cache** + **Clear used CSS** (nếu bật Remove Unused CSS).
- Triệu chứng: HTML dùng class mới, selector cached CSS còn class cũ → layout bung.

### 3.3. `wp_head()` + `wp_footer()` phải gọi
- Thiếu `wp_head()` → Elementor/plugin không khởi động.
- Thiếu `wp_footer()` → form, tracking script không chạy.
- Hậu quả phụ: wp_head nạp nhiều CSS Flatsome → càng cần cô lập chặt (xem mục 2).

---

## 4. Checklist khi thêm section mới vào landing

1. Đặt tên class/id với prefix `ndn-` hoặc `lp-` (không dùng tên generic).
2. Kiểm tra tên có nằm trong "danh sách cấm" ở mục 2.4 không.
3. Thêm selector vào `trang-chu/style.css` **không cần** `.ndn-lp` prefix — script `prefix-css.py` lo.
   - Hiện tại file đã prefix sẵn. Nếu sửa tay phải tự thêm `.ndn-lp`.
4. Sau deploy → purge WP Rocket cache (Clear + Used CSS).
5. So sánh `/trang-chu/` (static) vs URL WP — dùng playwright/devtools đo chiều cao từng section. Chênh > 20px là dấu hiệu có xung đột CSS/JS.

---

## 5. Lịch sử các PR đã làm

| PR | Nội dung |
|---|---|
| #105 | Chuyển `wp-theme/` vào `wp-content/themes/flatsome-child/wp-theme/` — bỏ deployment script copy assets |
| #106 | Sửa lỗi Elementor "không tìm thấy khu vực nội dung" — bọc `the_content()` trong `<div class="elementor-hidden-content">` |
| #107 | Sử dụng `home_url('/trang-chu')` thay vì `get_stylesheet_directory_uri()` → 1 source of truth |
| #108 | `id="main"` → `id="ndn-main"` (tránh Flatsome `#main{background:#fff}`) |
| #109 | `.section-title` → `.ndn-title`, `.container` → `.ndn-container` |

---

## 6. Phần mở rộng tương lai

- Nếu cần thêm section/page mới dùng cùng kỹ thuật: copy template `page-trang-chu.php` → `page-<tên>.php`, thay `Template Name`, thay `$lp_base = home_url('/<thư-mục>')`.
- Nếu cần tắt Flatsome CSS hoàn toàn cho 1 template: có thể `dequeue` nhưng phải dequeue **tất cả** handles flatsome (`flatsome-main`, `flatsome-style`, các chunk) và chấp nhận plugin CSS có thể bị kéo theo. Hướng `.ndn-lp` + rename class hiện tại an toàn và rẻ hơn.
