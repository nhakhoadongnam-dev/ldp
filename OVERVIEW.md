# Nha Khoa Đông Nam — Landing Page Project

## Tổng quan

Dự án xây dựng landing page cho **Nha Khoa Đông Nam** tại `nhakhoadongnam.com/trang-chu/`, được phát triển độc lập với WordPress và đồng bộ lên server thông qua **Plesk Git Deployment**.

### Hạ tầng
| Thành phần | Chi tiết |
|---|---|
| Repo GitHub | `nhakhoadongnam-dev/ldp` |
| Sync tool | Plesk Git (Automatic) |
| Server path | `/var/www/vhosts/nhakhoadongnam.com/httpdocs/` |
| WordPress theme | Flatsome + Child theme `flatsome-child` |
| Branch chính | `main` |

### Cấu trúc repo
```
ldp/
  trang-chu/        → nhakhoadongnam.com/trang-chu/  (landing page chính)
  bang-gia/         → nhakhoadongnam.com/bang-gia/
  page/             → nhakhoadongnam.com/page/
  test/             → nhakhoadongnam.com/test/        (môi trường test)
  wp-theme/         → flatsome-child/ (qua deployment script)
    page-trang-chu.php   ← WordPress Page Template
    assets/
      style.css          ← copy từ trang-chu/style.css
      script.js          ← copy từ trang-chu/script.js
```

---

## Mục tiêu

1. **Landing page độc lập** tại `nhakhoadongnam.com/trang-chu/` với giao diện riêng (Navy + Cream + Red accent), không phụ thuộc WordPress theme.
2. **Không ảnh hưởng trang chủ WordPress** — `nhakhoadongnam.com/` giữ nguyên giao diện cũ.
3. **Tích hợp vào WordPress child theme** (`flatsome-child`) dưới dạng Page Template để quản lý qua WP Admin.
4. **Tự động sync** — mỗi lần push GitHub là Plesk deploy + copy vào child theme, không cần thao tác thủ công.

---

## Thao tác & Workflow

### Quy trình phát triển
```
Sửa code local
  → Push lên branch claude/kind-gauss
  → Tạo PR → Merge vào main
  → Plesk tự sync xuống /httpdocs/
  → Deployment script chạy:
    cp -rf /httpdocs/wp-theme/. /httpdocs/wp-content/themes/flatsome-child/
  → File có mặt trong child theme
```

### Plesk Deployment Script
```bash
cp -rf /var/www/vhosts/nhakhoadongnam.com/httpdocs/wp-theme/. \
       /var/www/vhosts/nhakhoadongnam.com/httpdocs/wp-content/themes/flatsome-child/
```
Cấu hình tại: **Plesk → Domains → nhakhoadongnam.com → Git → Deployment settings → Deploy actions**

### Sử dụng WordPress Template
1. WP Admin → Pages → Add New
2. Slug: `trang-chu-test` (hoặc tùy ý)
3. Page Attributes → Template → **"Trang Chủ Landing"**
4. Publish → truy cập URL

---

## Mô tả vấn đề đã gặp

### 1. 301 Redirect tại root
**Nguyên nhân:** File `index.html` ở root repo có `<meta http-equiv="refresh" content="0; url=trang-chu/">`, Plesk sync lên `/httpdocs/index.html` và overwrite trang chủ WordPress.
**Giải pháp:** Xóa `index.html` khỏi repo (PR #94).

### 2. Trang chủ trắng
**Nguyên nhân:** Sau khi bỏ redirect, `index.html` được thay bằng file rỗng → trang trắng.
**Giải pháp:** Xóa hoàn toàn `index.html` khỏi repo — WordPress tự xử lý route `/`.

### 3. CSS xung đột với Flatsome theme
**Nguyên nhân:** WordPress inject Flatsome CSS qua `wp_head()`, override landing page CSS vì specificity cao hơn.
**Biểu hiện:** Tiêu đề `h2` bị tách dòng, layout bị vỡ, font sai.

### 4. `the_content()` render form lên màn hình
**Nguyên nhân:** Gọi `the_content()` để Elementor không báo lỗi, nhưng WordPress page editor có shortcode form → render ra màn hình.
**Giải pháp:** Dùng `ob_start() / ob_end_clean()` để gọi nhưng ẩn output.

### 5. Canonical/OG URL sai
**Nguyên nhân:** `trang-chu/index.html` có `canonical` và `og:url` trỏ về `nhakhoadongnam.com/` thay vì `nhakhoadongnam.com/trang-chu/`.
**Giải pháp:** Cập nhật canonical, og:url, và WebPage schema URL (PR #92, #93).

### 6. Thông tin bác sĩ chưa đồng bộ
**Nguyên nhân:** File đã sửa ở thư mục local nhưng chưa commit vào worktree.
**Giải pháp:** Cập nhật BS Dũng → BÁC SĨ CKII ĐẶNG QUỐC DŨNG + chứng chỉ hành nghề (PR #91).

---

## Các case đã test

### Case 1 — Static HTML tại `/test/` ✅
- **Cách làm:** Copy `trang-chu/` → `test/`, set `noindex`.
- **Kết quả:** Hoạt động, accessible tại `nhakhoadongnam.com/test/`.
- **Hạn chế:** Tách biệt hoàn toàn với WordPress, không test được tích hợp theme.

### Case 2 — WordPress Template + `all: revert` trên `html, body` ❌
- **Cách làm:** Thêm `<style>html, body { all: revert; }</style>` sau `wp_head()`.
- **Kết quả:** Vẫn bị xung đột — `all: revert` chỉ reset `html/body`, không reset các selector cụ thể của Flatsome (`.section-title`, `h2`, v.v.).

### Case 3 — `all: revert` trên `*` + đảo thứ tự CSS ❌
- **Cách làm:** `* { all: revert; box-sizing: border-box; }` sau `wp_head()`, landing CSS load sau cùng.
- **Kết quả:** Vẫn bị xung đột — Flatsome dùng class selectors có specificity cao hơn `*`.

### Case 4 — Dequeue toàn bộ CSS ❌
- **Cách làm:** Loop qua `$wp_styles->queue` và dequeue tất cả.
- **Kết quả:** Landing page hiển thị đúng **nhưng** phá vỡ toàn bộ plugin (chat widget, form, tracking...) — các mã tùy chỉnh mất CSS.

### Case 5 — Dequeue chỉ Flatsome CSS 🔄 (đang test)
- **Cách làm:** Chỉ dequeue handle chứa `flatsome` trong tên.
- **Kết quả:** Chưa có kết quả — đang chờ merge PR #103 và test.
- **Kỳ vọng:** Plugin CSS còn nguyên, Flatsome CSS bị gỡ, landing CSS thắng.

### Case 6 — `the_content()` + `ob_start/ob_end_clean` ✅
- **Cách làm:** Bọc `the_content()` trong output buffer.
- **Kết quả:** Form không render ra màn hình, Elementor không báo lỗi.

---

## Trạng thái hiện tại

| Hạng mục | Trạng thái |
|---|---|
| Landing page `/trang-chu/` | ✅ Hoạt động |
| Trang chủ WordPress | ✅ Không bị ảnh hưởng |
| Plesk deployment script | ✅ Đã cấu hình |
| WordPress Page Template | ✅ Đã tạo |
| CSS conflict với Flatsome | 🔄 Đang xử lý (PR #103) |
| `the_content()` ẩn output | ✅ Đã fix |
| Thông tin bác sĩ Dũng | ✅ Đã cập nhật |
| Canonical/OG URL | ✅ Đã sửa |

---

## PR History

| PR | Nội dung | Trạng thái |
|---|---|---|
| #91 | Cập nhật BÁC SĨ CKII ĐẶNG QUỐC DŨNG | ✅ Merged |
| #92 | Cập nhật nội dung dịch vụ trang chủ | ✅ Merged |
| #93 | Sửa canonical/og:url trang-chu | ✅ Merged |
| #94 | Xóa root index.html — trả trang chủ về WordPress | ✅ Merged |
| #95 | Thêm folder test/ + wp-theme template | ✅ Merged |
| #97 | Tạo lại wp-theme/page-trang-chu.php | ✅ Merged |
| #98 | Thêm the_content() cho Elementor | ✅ Merged |
| #99 | CSS reset isolation | ✅ Merged |
| #100 | Sửa thứ tự CSS load | ✅ Merged |
| #101 | Dequeue toàn bộ CSS (đã revert) | ✅ Merged |
| #102 | Fix ob_start/ob_end_clean + bỏ dequeue | ✅ Merged |
| #103 | Dequeue chỉ Flatsome CSS | 🔄 Open |
