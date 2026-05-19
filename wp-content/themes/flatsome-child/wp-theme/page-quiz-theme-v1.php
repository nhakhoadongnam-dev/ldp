<?php
/**
 * Template Name: Dự Toán Implant Landing (Theme) v1
 * Auto-generated from page/quiz/ by wp-sync.
 * DO NOT EDIT MANUALLY — run `npm run wp:sync`.
 * Mode: Theme (content only, uses Flatsome header/footer)
 */
defined('ABSPATH') || exit;

$lp_base = home_url('/page/quiz');

// Ép CF7 load script/CSS — custom template không tự detect shortcode sớm.
add_filter('wpcf7_load_js',  '__return_true');
add_filter('wpcf7_load_css', '__return_true');

// Landing JS (footer) — enqueue qua wp_enqueue_scripts priority 99.
add_action('wp_enqueue_scripts', function () use ($lp_base) {
    wp_enqueue_script(
        'ndn-landing-quiz',
        $lp_base . '/script.js',
        [],
        null,
        true
    );
}, 99);

// Landing CSS — inject trực tiếp cuối wp_head() để guaranteed load sau Flatsome/plugins.
add_action('wp_head', function () use ($lp_base) {
    echo '<link rel="stylesheet" href="' . esc_url( $lp_base . '/style.css' ) . '">' . "\n";
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800;900&display=swap">' . "\n";
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons@7.2.3/css/flag-icons.min.css">' . "\n";
}, 999);

get_header();
?>

<?php // Elementor cần the_content() có mặt trong DOM rendered. ?>
<div style="display:none!important" aria-hidden="true">
  <?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
</div>

<div class="ndn-lp">
<a href="#ndn-main" class="skip-link">Bỏ qua đến nội dung chính</a>

<main id="ndn-main">

<!-- HERO -->
<header class="hero">
  <div class="ndn-container hero-content">
    <div class="hero-label">Chuyên gia Implant 25 năm kinh nghiệm</div>
    <h1>Bảng Giá Implant 2026 &amp; <br><span>Đánh Giá Tiêu Xương Sơ Bộ Từ Nha Khoa Đông Nam</span></h1>
    <p class="hero-sub">Đừng chỉ xem bảng giá chung. Hãy dùng công cụ độc quyền của Nha Khoa Đông Nam để kiểm tra tình trạng xương hàm của bạn.</p>
    <div class="hero-cta">
      <a href="#quiz" class="quiz-btn-primary">🎯 BẮT ĐẦU KIỂM TRA NGAY (60s)</a>
      <a href="#bang-gia" class="hero-link">Xem bảng giá nhanh</a>
    </div>
  </div>
</header>

<!-- RISK REVERSAL BAR -->
<div class="ndn-container">
  <div class="risk-reversal-bar">
    <div class="rr-grid">
      <div class="rr-item">
        <span class="rr-icon">📜</span>
        <div class="rr-text">
          <strong>Bảo chứng bằng văn bản</strong>
          <span>Cam kết hoàn tiền 100% nếu đào thải trụ</span>
        </div>
      </div>
      <div class="rr-item">
        <span class="rr-icon">🤝</span>
        <div class="rr-text">
          <strong>Đồng hành trọn đời</strong>
          <span>Tái khám, kiểm tra trụ MIỄN PHÍ</span>
        </div>
      </div>
      <div class="rr-item">
        <span class="rr-icon">🏥</span>
        <div class="rr-text">
          <strong>Vững mạnh 21 năm</strong>
          <span>Hơn 21 năm hoạt động, 2 cơ sở ổn định tại TP.HCM</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- EDUCATION - TIÊU XƯƠNG -->
<section id="tieu-xuong" class="edu-section">
  <div class="ndn-container">
    <div class="edu-box quiz-text-center">
      <div class="edu-intro">
        <h2 class="quiz-section-title">Mất Răng Bao Lâu Thì Bị Tiêu Xương?</h2>
        <p class="edu-desc">Sau khi mất răng 3 tháng, quá trình tiêu xương bắt đầu. Trong năm đầu tiên, <strong>25%</strong> thể tích xương sẽ tiêu biến và con số này có thể lên tới <strong>60%</strong> sau 3 năm.</p>
        <div class="warning-badge">⚠️ HẬU QUẢ NGHIÊM TRỌNG KHI TIÊU XƯƠNG</div>
      </div>

      <div class="consequence-grid">
        <div class="cons-card">
          <div class="cons-icon">👵</div>
          <div class="cons-title">Lão hóa sớm</div>
          <div class="cons-desc">Xương hàm tiêu biến dẫn đến tình trạng tụt nướu, móp má, da mặt chảy xệ khiến khuôn mặt già đi trước tuổi.</div>
        </div>
        <div class="cons-card">
          <div class="cons-icon">🦷</div>
          <div class="cons-title">Hỏng khớp cắn</div>
          <div class="cons-desc">Răng kế cận đổ ngã, xô lệch vào khoảng trống mất răng, làm suy giảm nghiêm trọng chức năng ăn nhai.</div>
        </div>
        <div class="cons-card">
          <div class="cons-icon">💸</div>
          <div class="cons-title">Tốn kém gấp bội</div>
          <div class="cons-desc">Xương hàm mỏng giảm tỷ lệ thành công khi cấy ghép, đòi hỏi thực hiện thêm các thủ thuật phức tạp (ghép xương, nâng xoang), gây tốn kém và mất nhiều thời gian phục hồi.</div>
        </div>
      </div>

      <div class="edu-cta">
        <a href="#quiz" class="quiz-btn-primary quiz-btn-lg">KIỂM TRA NGAY TÌNH TRẠNG XƯƠNG HÀM 👇</a>
      </div>
    </div>
  </div>
</section>

<!-- QUIZ TOOL -->
<section id="quiz" class="quiz-section">
  <div class="ndn-container">
    <div class="quiz-container">
      <div class="quiz-header">
        <h2 class="quiz-title">Kiểm tra tiêu xương &amp; Dự toán chi phí</h2>
        <p class="quiz-subtitle">🔬 Cơ sở tính toán Khoa học sử dụng thang đo Cawood &amp; Howell (1988) và tiêu chuẩn của ICOI (Hội Implant Quốc tế).</p>
      </div>

      <div id="lp-quiz-steps">

        <!-- Step 1 -->
        <div class="quiz-step quiz-is-active" id="lp-quiz-step-1">
          <p class="quiz-q">1. Tình trạng mất răng hiện tại của bạn?</p>
          <div class="quiz-options">
            <div class="quiz-opt" onclick="selectQuiz(1, 'tinhTrang', 'Mất 1 răng đơn lẻ')">
              <div class="quiz-opt-top"><span>Mất 1 răng đơn lẻ</span><span class="quiz-arrow">➔</span></div>
              <div class="quiz-opt-desc">Khu trú tại 1 vị trí, không ảnh hưởng các răng lân cận.</div>
            </div>
            <div class="quiz-opt" onclick="selectQuiz(1, 'tinhTrang', 'Mất nhiều răng')">
              <div class="quiz-opt-top"><span>Mất nhiều răng (Đơn lẻ hoặc liền kề)</span><span class="quiz-arrow">➔</span></div>
              <div class="quiz-opt-desc">Suy giảm chức năng ăn nhai, có nguy cơ xô lệch các răng còn lại.</div>
            </div>
            <div class="quiz-opt" onclick="selectQuiz(1, 'tinhTrang', 'Mất toàn hàm')">
              <div class="quiz-opt-top"><span>Mất toàn hàm (1 hoặc 2 hàm)</span><span class="quiz-arrow">➔</span></div>
              <div class="quiz-opt-desc">Cần phục hình toàn bộ hàm bằng phương pháp All-on-4 hoặc All-on-6.</div>
            </div>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="quiz-step" id="lp-quiz-step-2">
          <p class="quiz-q">2. Bạn đã mất răng trong bao lâu?</p>
          <div class="quiz-options">
            <div class="quiz-opt" onclick="selectQuiz(2, 'thoiGian', 'Dưới 6 tháng')">
              <div class="quiz-opt-top"><span>Dưới 6 tháng</span><span class="quiz-arrow">➔</span></div>
              <div class="quiz-opt-desc">Xương ổ răng thường chưa bị tiêu biến nhiều.</div>
            </div>
            <div class="quiz-opt" onclick="selectQuiz(2, 'thoiGian', 'Từ 6 tháng - 2 năm')">
              <div class="quiz-opt-top"><span>Từ 6 tháng - 2 năm</span><span class="quiz-arrow">➔</span></div>
              <div class="quiz-opt-desc">Xương bắt đầu có dấu hiệu tiêu ngót.</div>
            </div>
            <div class="quiz-opt" onclick="selectQuiz(2, 'thoiGian', 'Trên 2 năm')">
              <div class="quiz-opt-top"><span>Trên 2 năm</span><span class="quiz-arrow">➔</span></div>
              <div class="quiz-opt-desc">Rủi ro tiêu xương cao, hẹp sống hàm.</div>
            </div>
          </div>
          <div class="quiz-text-center"><button class="quiz-btn-back" onclick="goBack()">❮ Quay lại</button></div>
        </div>

        <!-- Step 3 -->
        <div class="quiz-step" id="lp-quiz-step-3">
          <p class="quiz-q">3. Vị trí răng bị mất nằm ở đâu?</p>
          <div class="quiz-options">
            <div class="quiz-opt" onclick="selectQuiz(3, 'viTri', 'Răng cửa')">
              <div class="quiz-opt-top"><span>Răng cửa</span><span class="quiz-arrow">➔</span></div>
              <div class="quiz-opt-desc">Vùng thẩm mỹ, xương mặt ngoài thường mỏng.</div>
            </div>
            <div class="quiz-opt" onclick="selectQuiz(3, 'viTri', 'Răng hàm trên')">
              <div class="quiz-opt-top"><span>Răng hàm trên</span><span class="quiz-arrow">➔</span></div>
              <div class="quiz-opt-desc">Gần xoang hàm, rủi ro tiêu xương làm sa trễ xoang.</div>
            </div>
            <div class="quiz-opt" onclick="selectQuiz(3, 'viTri', 'Răng hàm dưới')">
              <div class="quiz-opt-top"><span>Răng hàm dưới</span><span class="quiz-arrow">➔</span></div>
              <div class="quiz-opt-desc">Xương đặc hơn nhưng cần tránh dây thần kinh hàm.</div>
            </div>
            <div class="quiz-opt" id="lp-quiz-opt-both-teeth" style="display:none" onclick="selectQuiz(3, 'viTri', 'Cả răng cửa và răng hàm')">
              <div class="quiz-opt-top"><span>Cả vùng răng cửa &amp; răng hàm</span><span class="quiz-arrow">➔</span></div>
              <div class="quiz-opt-desc">Mức độ phức tạp cao, cần kế hoạch phối hợp.</div>
            </div>
          </div>
          <div class="quiz-text-center"><button class="quiz-btn-back" onclick="goBack()">❮ Quay lại</button></div>
        </div>

        <!-- Step 4 -->
        <div class="quiz-step" id="lp-quiz-step-4">
          <p class="quiz-q">4. Nguyên nhân chính gây mất răng?</p>
          <div class="quiz-options">
            <div class="quiz-opt" onclick="selectQuiz(4, 'nguyenNhan', 'Sâu răng / Chấn thương')">
              <div class="quiz-opt-top"><span>Sâu răng / Chấn thương</span><span class="quiz-arrow">➔</span></div>
              <div class="quiz-opt-desc">Nền xương xung quanh thường còn chắc khỏe, thuận lợi cho Implant.</div>
            </div>
            <div class="quiz-opt" onclick="selectQuiz(4, 'nguyenNhan', 'Viêm nha chu / Lung lay')">
              <div class="quiz-opt-top"><span>Viêm nha chu / Răng tự rụng</span><span class="quiz-arrow">➔</span></div>
              <div class="quiz-opt-desc">Vi khuẩn đã phá hủy mô liên kết và nền xương trước khi rụng răng.</div>
            </div>
            <div class="quiz-opt" onclick="selectQuiz(4, 'nguyenNhan', 'Mất răng bẩm sinh')">
              <div class="quiz-opt-top"><span>Mất răng bẩm sinh / Lý do khác</span><span class="quiz-arrow">➔</span></div>
              <div class="quiz-opt-desc">Vùng xương không được kích thích nhai lâu ngày dẫn đến mỏng dần.</div>
            </div>
          </div>
          <div class="quiz-text-center"><button class="quiz-btn-back" onclick="goBack()">❮ Quay lại</button></div>
        </div>

        <!-- Step 5 -->
        <div class="quiz-step" id="lp-quiz-step-5">
          <p class="quiz-q">5. Mong muốn ưu tiên nhất của bạn?</p>
          <div class="quiz-options">
            <div class="quiz-opt" onclick="selectQuiz(5, 'uuTien', 'Tối ưu chi phí')">
              <div class="quiz-opt-top"><span>Tối ưu chi phí</span><span class="quiz-arrow">➔</span></div>
              <div class="quiz-opt-desc">Gợi ý dòng trụ Hàn Quốc với hiệu quả kinh tế cao nhất.</div>
            </div>
            <div class="quiz-opt" onclick="selectQuiz(5, 'uuTien', 'Thẩm mỹ & Bền bỉ')">
              <div class="quiz-opt-top"><span>Thẩm mỹ &amp; Bền bỉ</span><span class="quiz-arrow">➔</span></div>
              <div class="quiz-opt-desc">Gợi ý dòng trụ Ý (C-Tech) giúp bảo tồn xương cổ trụ lâu dài.</div>
            </div>
            <div class="quiz-opt" onclick="selectQuiz(5, 'uuTien', 'Cần lên răng nhanh')">
              <div class="quiz-opt-top"><span>Cần có răng nhanh</span><span class="quiz-arrow">➔</span></div>
              <div class="quiz-opt-desc">Đề xuất trụ Pháp (ETK Active) tích hợp xương nhanh gấp 3 lần.</div>
            </div>
          </div>
          <div class="quiz-text-center"><button class="quiz-btn-back" onclick="goBack()">❮ Quay lại</button></div>
        </div>

        <!-- Step 6A - Toàn hàm -->
        <div class="quiz-step" id="lp-quiz-step-6a">
          <p class="quiz-q">Chọn giải pháp toàn hàm:</p>
          <div class="quiz-options">
            <div class="quiz-opt" onclick="selectQuiz('6A', 'giaiPhapToanHam', 'All-on-4 Cải tiến (Tháo lắp)', 120000000)">
              <div class="quiz-opt-top"><span>All-on-4 Cải tiến (Tháo lắp)</span><span class="quiz-price-tag">120 Tr</span></div>
            </div>
            <div class="quiz-opt" onclick="selectQuiz('6A', 'giaiPhapToanHam', 'All-on-4 Cố định (Hybrid)', 151000000)">
              <div class="quiz-opt-top"><span>All-on-4 Cố định (Hybrid)</span><span class="quiz-price-tag">151 Tr</span></div>
            </div>
            <div class="quiz-opt" onclick="selectQuiz('6A', 'giaiPhapToanHam', 'All-on-6 Cố định (Hybrid)', 190800000)">
              <div class="quiz-opt-top"><span>All-on-6 Cố định (Hybrid)</span><span class="quiz-price-tag">190.8 Tr</span></div>
            </div>
          </div>
          <div class="quiz-text-center"><button class="quiz-btn-back" onclick="goBack()">❮ Quay lại</button></div>
        </div>

        <!-- Step 6B - Số lượng -->
        <div class="quiz-step" id="lp-quiz-step-6b">
          <p class="quiz-q">Số lượng răng cần trồng?</p>
          <div class="qty-control">
            <button class="qty-btn" onclick="changeQty(-1)">-</button>
            <input type="text" id="lp-quiz-qty" class="qty-input" value="1" readonly>
            <button class="qty-btn" onclick="changeQty(1)">+</button>
          </div>
          <div class="quiz-text-center">
            <button class="quiz-btn-primary" onclick="proceedToForm()">TIẾP TỤC ➔</button>
          </div>
          <div class="quiz-text-center"><button class="quiz-btn-back" onclick="goBack()">❮ Quay lại</button></div>
        </div>

        <!-- Step Form -->
        <div class="quiz-step" id="lp-quiz-step-form">
          <div class="quiz-form-body quiz-text-center">
            <div class="quiz-form-icon">📊</div>
            <h3 class="quiz-form-title">Đang phân tích dữ liệu lâm sàng...</h3>
            <p class="quiz-form-desc">Vui lòng để lại số điện thoại để thuật toán xử lý và gửi bản "Dự toán chi phí &amp; Chẩn đoán sơ bộ" cho bạn ngay lập tức.</p>

            <div id="lp-quiz-msg" class="msg-box"></div>

            <div id="lp-quiz-form-wrap">
              <input type="tel" id="lp-quiz-phone" class="form-input" placeholder="Nhập SĐT nhận kết quả chi tiết">
              <button class="quiz-btn-primary quiz-btn-block" onclick="submitQuiz()">XEM KẾT QUẢ DỰ TOÁN</button>
            </div>
            <div class="quiz-text-center"><button class="quiz-btn-back" onclick="goBack()">❮ Quay lại</button></div>
          </div>
        </div>

        <!-- Step Result -->
        <div class="quiz-step" id="lp-quiz-step-result">
          <div class="result-header quiz-text-center">
            <div class="result-icon">🎉</div>
            <h3 class="result-title">Kết Quả Dự Đoán Sơ Bộ</h3>
          </div>
          <div id="lp-quiz-result-table-container"></div>
          <div class="result-actions quiz-text-center">
            <a href="#dang-ky" class="quiz-btn-primary quiz-btn-block">Đăng ký chụp phim CT 3D miễn phí ngay</a>
            <button type="button" onclick="resetQuiz()" class="quiz-btn-back quiz-btn-reset">↺ Thực hiện lại bài Test</button>
          </div>
        </div>

      </div><!-- #lp-quiz-steps -->
    </div><!-- .quiz-container -->

    <!-- Cawood Howell Note -->
    <div class="cawood-note">
      <div class="scientific-note">
        <div class="sci-icon">🔬</div>
        <div>
          <strong class="sci-title">Thang đo Cawood &amp; Howell là gì?</strong>
          <span class="sci-desc">Cawood &amp; Howell (1988) là hệ thống phân loại tiêu chuẩn Y khoa Quốc tế được sử dụng rộng rãi nhất để đánh giá hình thái và mức độ tiêu xương hàm sau khi mất răng.</span>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- BẢNG CAN THIỆP XƯƠNG -->
<section id="can-thiep-xuong" class="bone-section">
  <div class="ndn-container">
    <h2 class="quiz-section-title">Chi Phí Can Thiệp Xương (Nếu Có)</h2>
    <p class="section-intro">Dành cho các trường hợp được dự đoán có rủi ro tiêu xương. Bác sĩ sẽ chẩn đoán chính xác lại qua phim CT 3D Miễn Phí.</p>

    <div class="bone-table-wrap">
      <div class="bone-table-content">
        <table class="bone-table">
          <colgroup>
            <col style="width: 52%">
            <col style="width: 20%">
            <col style="width: 28%">
          </colgroup>
          <thead>
            <tr>
              <th>Các can thiệp xương đi kèm</th>
              <th class="bone-unit-head">Đơn vị</th>
              <th class="bone-price-head">Giá niêm yết</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="quiz-fw-600">Cấy ghép xương</td>
              <td class="bone-unit">1 ống</td>
              <td class="bone-price">8.000.000 đ</td>
            </tr>
            <tr>
              <td class="quiz-fw-600">Cấy màng xương</td>
              <td class="bone-unit">1 đơn vị</td>
              <td class="bone-price">2.000.000 đ</td>
            </tr>
            <tr>
              <td class="quiz-fw-600">Nâng xoang</td>
              <td class="bone-unit">1 bên</td>
              <td class="bone-price">10.000.000 đ</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- BẢNG GIÁ -->
<section id="bang-gia" class="price-section">
  <div class="ndn-container">
    <h2 class="quiz-section-title">🦷 Bảng Giá Trụ Implant Trọn Gói 2026</h2>
    <p class="section-intro">Chi phí chưa bao gồm các can thiệp xương phát sinh (nếu có).</p>

    <div class="comp-table-wrap">
      <table class="comp-table">
        <thead>
          <tr>
            <th class="col-name">Dòng trụ</th>
            <th>Giá trọn gói / trụ</th>
            <th>Tích hợp xương</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><span class="fi fi-kr"></span>Implant Hàn Quốc</td>
            <td class="price-col">16.500.000 ₫</td>
            <td>3–6 tháng</td>
          </tr>
          <tr class="quiz-recommended">
            <td><span class="fi fi-it"></span>Implant Ý (C-Tech) <span class="recommended-badge">Đề xuất</span></td>
            <td class="price-col">19.900.000 ₫</td>
            <td>2–3 tháng</td>
          </tr>
          <tr>
            <td><span class="fi fi-us"></span>Implant Mỹ</td>
            <td class="price-col quiz-price-dark">23.500.000 ₫</td>
            <td>2–4 tháng</td>
          </tr>
          <tr>
            <td><span class="fi fi-fr"></span>Implant Pháp (ETK Active)</td>
            <td class="price-col quiz-price-dark">28.200.000 ₫</td>
            <td>1–2 tháng</td>
          </tr>
          <tr>
            <td><span class="fi fi-se"></span>Implant Thụy Điển (Nobel Active)</td>
            <td class="price-col quiz-price-dark">32.900.000 ₫</td>
            <td>1–2 tháng</td>
          </tr>
          <tr>
            <td><span class="fi fi-ch"></span>Implant Thụy Sĩ (Straumann)</td>
            <td class="price-col quiz-price-dark">34.000.000 ₫</td>
            <td>3–6 tuần</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="section-tag">LỜI KHUYÊN TỪ BÁC SĨ ĐÔNG NAM</div>
    <p class="section-intro" style="margin-top:10px">Dựa trên hàng ngàn ca lâm sàng, chúng tôi tạm chia làm 3 nhóm sau giúp quý khách dễ ra quyết định:</p>

    <div class="reco-list">
      <div class="reco-card">
        <div class="reco-badge" style="background:linear-gradient(160deg,#1A7A4A,#1e9a5a)">
          <div class="reco-icon">⭐</div>
          <div class="reco-rank">ƯU TIÊN<br>SỐ 1</div>
        </div>
        <div class="reco-body">
          <div class="reco-name"><span class="fi fi-it"></span>Implant Ý (C-Tech)</div>
          <div class="reco-tag-wrap"><span class="reco-tag reco-tag--green">Cân bằng hoàn hảo</span></div>
          <div class="reco-desc">Chất lượng chuẩn Châu Âu với mức giá hợp lý. Ứng dụng công nghệ Platform Switching giúp bảo tồn tối đa xương vùng cổ Implant, duy trì độ bền vững và thẩm mỹ lâu dài.</div>
        </div>
      </div>
      <div class="reco-card">
        <div class="reco-badge" style="background:linear-gradient(160deg,var(--navy),var(--navy-mid))">
          <div class="reco-icon">💰</div>
          <div class="reco-rank">ƯU TIÊN<br>SỐ 2</div>
        </div>
        <div class="reco-body">
          <div class="reco-name"><span class="fi fi-kr"></span>Implant Hàn Quốc</div>
          <div class="reco-tag-wrap"><span class="reco-tag reco-tag--navy">Tối ưu ngân sách</span></div>
          <div class="reco-desc">Giải pháp an toàn, bền bỉ với mức chi phí dễ tiếp cận nhất. Phù hợp cho các trường hợp mất răng đơn lẻ, tình trạng xương hàm còn tốt và khách hàng muốn tối ưu tài chính.</div>
        </div>
      </div>
      <div class="reco-card">
        <div class="reco-badge" style="background:linear-gradient(160deg,#7D4E00,#b87a20)">
          <div class="reco-icon">⚡</div>
          <div class="reco-rank">PHỤC HÌNH<br>NHANH CHÓNG</div>
        </div>
        <div class="reco-body">
          <div class="reco-name"><span class="fi fi-fr"></span>Implant Pháp (ETK Active)</div>
          <div class="reco-tag-wrap"><span class="reco-tag reco-tag--gold">Rút ngắn thời gian điều trị</span></div>
          <div class="reco-desc">Chuyên chỉ định cho các ca phức tạp hoặc cần có răng nhanh. Thiết kế đặc biệt giúp đẩy nhanh tốc độ tích hợp xương, lý tưởng cho tình trạng xương hàm xốp hoặc người có quỹ thời gian hạn hẹp.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- OFFER -->
<section id="offer" class="offer-section">
  <div class="ndn-container">
    <div class="offer-header quiz-text-center">
      <h2 class="quiz-section-title">Ưu Đãi Đặc Biệt Trong Tháng</h2>
      <p class="section-intro">Hỗ trợ tối đa để khách hàng sớm phục hồi răng, tránh rủi ro tiêu xương nặng thêm</p>
    </div>

    <div class="offer-card">
      <div class="offer-info">
        <div class="offer-badge">Ưu đãi 20%</div>
        <h3 class="offer-title">Implant Trọn Gói - Không Phát Sinh</h3>
        <ul class="offer-features">
          <li>✅ Đã bao gồm trụ Implant chính hãng (QR code check) + Abutment</li>
          <li>✅ Tặng răng sứ Mỹ trên Implant trị giá 1.000.000đ</li>
          <li>✅ Miễn phí chụp phim CT 3D chẩn đoán mật độ xương</li>
          <li>✅ Miễn phí khám &amp; tư vấn cùng BS CKII - Chuyên gia ca khó</li>
        </ul>
        <div class="offer-warning">
          ⚠️ Lưu ý: Ưu đãi chỉ áp dụng cho 30 khách hàng đăng ký online sớm nhất trong tháng.
        </div>
      </div>
      <div class="offer-price-box">
        <div class="price-unit">Chỉ từ</div>
        <div class="price-tag">13,2Tr</div>
        <div class="price-period">Trọn gói/1 răng</div>
        <a href="#dang-ky" class="quiz-btn-primary quiz-btn-light">NHẬN ƯU ĐÃI NGAY</a>
      </div>
    </div>
  </div>
</section>

<!-- AUTHORITY -->
<section class="authority-section">
  <div class="ndn-container auth-grid">
    <div class="auth-content">
      <h2 class="auth-heading">Hơn 21 Năm Khẳng Định Vị Thế<br><span class="auth-heading-sub">Chuyên Gia Implant Ca Khó</span></h2>
      <p class="auth-sub">Sự lựa chọn hàng đầu cho các ca tiêu xương nghiêm trọng, mất răng lâu năm.</p>

      <div class="auth-features-grid">
        <div class="auth-card">
          <div class="auth-card-icon">👨‍⚕️</div>
          <div class="auth-card-title">Đội ngũ bác sĩ chuyên môn sâu</div>
          <div class="auth-card-desc">Giàu kinh nghiệm trong xử lý các ca tiêu xương nghiêm trọng, nâng xoang, ghép xương phức tạp và phục hồi Implant toàn hàm.</div>
        </div>
        <div class="auth-card">
          <div class="auth-card-icon">🏛️</div>
          <div class="auth-card-title">Nền tảng hơn 21 năm phát triển</div>
          <div class="auth-card-desc">Bề dày kinh nghiệm cùng quy trình điều trị được chuẩn hóa là nền tảng cho cam kết đồng hành lâu dài cùng khách hàng.</div>
        </div>
        <div class="auth-card">
          <div class="auth-card-icon">🏥</div>
          <div class="auth-card-title">Hệ thống phẫu thuật vô trùng</div>
          <div class="auth-card-desc">Đảm bảo tiêu chuẩn an toàn nghiêm ngặt, hỗ trợ tối ưu quá trình tích hợp Implant và nâng cao hiệu quả điều trị lâu dài.</div>
        </div>
        <div class="auth-card">
          <div class="auth-card-icon">💙</div>
          <div class="auth-card-title">Chăm sóc hậu điều trị tận tâm</div>
          <div class="auth-card-desc">Khách hàng được theo dõi định kỳ, kiểm tra và bảo dưỡng Implant theo kế hoạch riêng, an tâm duy trì kết quả bền vững.</div>
        </div>
      </div>

      <div class="auth-cta">
        <a href="#dang-ky" class="quiz-btn-primary quiz-btn-light">ĐẶT LỊCH THĂM KHÁM MIỄN PHÍ</a>
      </div>
    </div>
    <div class="auth-img">
      <img src="https://nhakhoadongnam.com/wp-content/uploads/2026/03/2-1.jpg" alt="Bác sĩ Đông Nam"
           onerror="this.src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjMwMCI+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0iIzJFNkRBNCIvPjx0ZXh0IHg9IjUwJSIgeT0iNTAlIiBmb250LWZhbWlseT0iQXJpYWwiIGZvbnQtc2l6ZT0iMjQiIGZpbGw9IiNmZmYiIGR5PSIuM2VtIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5Iw6xuaCDhuqNuaCBCw6FjIHPEqTwvdGV4dD48L3N2Zz4='">
    </div>
  </div>
</section>

<!-- STATS -->
<section class="stats-section">
  <div class="ndn-container">
    <div class="stats-grid">
      <div class="stat-item">
        <div class="stat-number">21<span class="stat-plus">+</span></div>
        <div class="stat-label">Năm kinh nghiệm</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">10.500<span class="stat-plus">+</span></div>
        <div class="stat-label">Ca trồng răng thành công</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">100<span class="stat-plus">%</span></div>
        <div class="stat-label">Trụ Implant chính hãng</div>
      </div>
    </div>
  </div>
</section>

</main>

<!-- CONTACT FORM -->
<section id="dang-ky" class="contact-section">
  <div class="ndn-container">
    <div class="contact-wrapper quiz-text-center">
      <h2 class="quiz-section-title">Đăng Ký Khám &amp; Chụp CT 3D Miễn Phí</h2>
      <p class="section-intro">Để xác định chính xác bạn đang ở phân độ tiêu xương nào và nhận kế hoạch điều trị chuẩn xác nhất từ Bác sĩ chuyên khoa.</p>
      <div class="form-card">
        <?php echo do_shortcode('[contact-form-7 id="e3e8349" title="CT- T52026 - name-at - phone"]'); ?>
        <p class="form-privacy">🔒 Cam kết bảo mật thông tin khách hàng tuyệt đối</p>
      </div>
    </div>
  </div>
</section>

</div><!-- /.ndn-lp -->

<?php get_footer(); ?>
