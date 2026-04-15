# Tóm tắt chỉnh sửa phần Đội ngũ Bác sĩ (doctor section)

## Ngữ cảnh
- Dự án: Landing page Nha Khoa Đông Nam
- Mục tiêu: Làm lại phần "Đội ngũ bác sĩ" cho thẩm mỹ, hiện đại, tối ưu hiển thị trên desktop/mobile, nhấn mạnh panel chi tiết bác sĩ.
- Công nghệ: HTML/CSS/JS thuần, không framework.

## Các bước đã thực hiện

1. **Tối giản card bác sĩ**
   - Chỉ giữ lại ảnh, bỏ toàn bộ text trên thumbnail.
   - Chuyển từ background-image sang thẻ `<img>` thật để giữ đúng tỉ lệ ảnh.

2. **Sửa lỗi viền và overlay**
   - Loại bỏ border dư, chuyển sang dùng box-shadow đỏ cho trạng thái active.
   - Xóa overlay/pseudo-element che ảnh.

3. **Đồng bộ ảnh**
   - Dùng 1 ảnh demo chuẩn cho cả 4 bác sĩ (ảnh thật, tỉ lệ 3:4).
   - JS cập nhật đúng ảnh khi chọn bác sĩ.

4. **Panel chi tiết bác sĩ**
   - Ảnh panel chi tiết dùng `<img>` với object-fit: contain, không bị crop.
   - Bố cục panel: ảnh lớn bên trái, thông tin bên phải.

5. **Điều chỉnh kích thước, tỉ lệ**
   - Thu nhỏ padding section, giảm khoảng cách các thành phần.
   - Thu nhỏ thumbnail, tăng panel chi tiết để panel luôn lớn hơn thumbnail.
   - Đặt thumbnail 4 cột, mỗi cột 250px → sau đó giảm còn 200px theo yêu cầu.
   - Panel chi tiết cố định height 420px, thumbnail ~267px (tỉ lệ panel/thumbnail ≈ 1.57).

6. **Đảm bảo hiển thị vừa 1 viewport**
   - Cả 2 hàng (panel + thumbnail) luôn vừa 1 màn hình desktop, không cần scroll.
   - Responsive: Giữ tỉ lệ khi co nhỏ màn hình.

## Kết quả cuối cùng
- Giao diện hiện đại, panel chi tiết nổi bật, thumbnail nhỏ gọn, đồng bộ tỉ lệ ảnh.
- Dễ dàng chuyển tiếp cho dev khác hoặc tiếp tục chỉnh sửa ở phiên sau.

---
**File này dùng để chuyển giao hoặc tiếp tục công việc ở phiên tiếp theo.**
