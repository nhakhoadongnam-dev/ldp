<?php
/**
 * Template Name: Trang Chủ Landing (Theme) v2
 * Auto-generated from page/trang-chu/ by wp-sync.
 * DO NOT EDIT MANUALLY — run `npm run wp:sync`.
 * Mode: Theme (content only, uses Flatsome header/footer)
 */
defined('ABSPATH') || exit;

$lp_base = home_url('/page/trang-chu');

// Ép CF7 load script/CSS — custom template không tự detect shortcode sớm.
add_filter('wpcf7_load_js',  '__return_true');
add_filter('wpcf7_load_css', '__return_true');

// Enqueue CSS/JS landing — chạy trước khi get_header() gọi wp_head().
add_action('wp_enqueue_scripts', function () use ($lp_base) {
    // Landing CSS — priority 99 để load sau Flatsome, thắng cascade
    wp_enqueue_style(
        'ndn-landing-trang-chu',
        $lp_base . '/style.css',
        [],
        null
    );
    // Google Fonts
    wp_enqueue_style(
        'ndn-landing-trang-chu-fonts',
        'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700;800&display=swap',
        [],
        null
    );
    // Landing JS (footer)
    wp_enqueue_script(
        'ndn-landing-trang-chu',
        $lp_base . '/script.js',
        [],
        null,
        true
    );
}, 99);

// Inject Schema.org JSON-LD từ page/trang-chu/schema.json nếu tồn tại
add_action('wp_head', function () {
    $schema_file = ABSPATH . 'page/trang-chu/schema.json';
    if ( file_exists($schema_file) ) {
        echo "\n<script type=\"application/ld+json\">\n";
        echo file_get_contents($schema_file);
        echo "\n</script>\n";
    }
}, 50);

get_header();
?>

<?php // Elementor cần the_content() có mặt trong DOM rendered. ?>
<div style="display:none!important" aria-hidden="true">
  <?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
</div>

<div class="ndn-lp">
<!-- Skip Navigation -->
<a href="#ndn-main" class="skip-link">Bỏ qua đến nội dung chính</a>

<!-- ═══ HERO ══ -->
<section class="hero">
  <div class="hero-bg" aria-hidden="true">
    <div class="hero-bg-slide active" style="--hero-image: url('https://nhakhoadongnam.com/wp-content/uploads/2026/03/chuong-trinh-uu-dai-implant-30-4-scaled.jpg');"></div>
    <div class="hero-bg-slide" style="--hero-image: url('https://nhakhoadongnam.com/wp-content/uploads/2026/03/chuong-trinh-uu-dai-dip-30-4-scaled.jpg');"></div>
    <div class="hero-bg-slide" style="--hero-image: url('https://nhakhoadongnam.com/wp-content/uploads/2024/12/20-nam-tao-nen-thuong-hieu-mang-tam-quoc-te.webp');"></div>
  </div>
  <div class="hero-overlay"></div>
  <button class="skip-layer" aria-label="Bỏ qua phần giới thiệu">bỏ qua</button>
  <div class="hero-text-layer">
    <div class="ndn-container">
      <div class="hero-content">
        <div class="hero-eyebrow">
          <span class="line"></span>
          <span class="since">Since 2005</span>
          <span>Chuyên gia cấy ghép Implant</span>
        </div>
        <h1>
          Hơn <em>21 năm</em><br>
          đồng hành cùng bạn.
        </h1>
        <p class="hero-lede">
          Từ 2005 đến hôm nay — vẫn là nơi bạn có thể quay lại sau 10, 20 năm để được chăm sóc bởi cùng một đội ngũ.
        </p>
        <div class="hero-actions">
          <a href="#cta" class="btn btn-red">Đặt lịch tư vấn miễn phí →</a>
          <a href="#timeline" class="btn btn-ghost">Xem hành trình 21 năm</a>
        </div>
      </div>
    </div>
  </div>
  <div class="hero-dots" aria-label="Trạng thái banner hero">
    <button class="hero-dot active" type="button" aria-label="Slide 1"></button>
    <button class="hero-dot" type="button" aria-label="Slide 2"></button>
    <button class="hero-dot" type="button" aria-label="Slide 3"></button>
  </div>
</section>

<!-- ═══ USP ═══ -->
<section class="usp" id="usp">
  <div class="ndn-container">
    <div class="section-label">Ba trụ cột thương hiệu</div>
    <h2 class="ndn-title">Điều gì giữ chúng tôi <em>đứng vững</em> suốt 21 năm?</h2>
    <p class="section-sub">Không phải quảng cáo. Là những lần khách hàng quay lại sau 10, 20 năm, dẫn theo gia&nbsp;đình.</p>

    <div class="usp-grid">
      <div class="usp-card reveal">
        <span class="usp-num">01 / Nền tảng</span>
        <div class="usp-headline">21<br><small>năm</small></div>
        <p class="usp-body">Hoạt động từ năm 2005 với hàng trăm ngàn ca điều trị thực tế, Đông Nam mang đến một nền tảng đủ vững để bạn yên tâm từ bước đầu tiên.</p>
      </div>
      <div class="usp-card reveal">
        <span class="usp-num">02 / Chuyên môn</span>
        <div class="usp-headline">Làm chủ<br>ca khó</div>
        <p class="usp-body">Các trường hợp cấy ghép Implant, đặc biệt là ca khó, được trực tiếp thăm khám và thực hiện bởi bác sĩ chuyên sâu Implant với kế hoạch cá nhân hóa.</p>
      </div>
      <div class="usp-card reveal">
        <span class="usp-num">03 / Cam kết</span>
        <div class="usp-headline">Đồng hành<br>trọn đời</div>
        <p class="usp-body">Dịch vụ không kết thúc khi bạn rời ghế nha khoa. Đông Nam cam kết đồng hành cùng khách hàng trước, trong và sau điều trị để duy trì kết quả ổn định theo thời gian.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══ TIMELINE ═══ -->
<section class="timeline-section" id="timeline">
  <div class="ndn-container">
    <div class="timeline-head">
      <div class="section-label">Hành trình 21 năm</div>
      <h2 class="ndn-title">Câu chuyện bắt đầu từ <em>một phòng khám nhỏ</em></h2>
      <p class="section-sub" style="margin:18px auto 0">Tại 411 Nguyễn Kiệm, nơi vẫn là cơ sở 1 của chúng tôi đến hôm nay.</p>
    </div>

    <!-- Story videos -->
    <div class="tl-video">
      <div class="tl-video-grid">
        <div class="tl-video-wrap">
          <iframe
            src="https://www.youtube.com/embed/Wp_h8yXediI?rel=0"
            title="20 năm đồng hành - Nha Khoa Đông Nam"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin"
            allowfullscreen
            loading="lazy">
          </iframe>
          <div class="tl-video-caption">
            <span class="tl-video-kicker">Video 20 năm</span>
            <strong>Hành trình hơn hai thập kỷ bền bỉ cùng nụ cười Việt</strong>
          </div>
        </div>
        <div class="tl-video-wrap">
          <iframe
            src="https://www.youtube.com/embed/xO72MGI2YPI?start=23&rel=0"
            title="Phóng sự VTV về Nha Khoa Đông Nam"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin"
            allowfullscreen
            loading="lazy">
          </iframe>
          <div class="tl-video-caption">
            <span class="tl-video-kicker">Phóng sự VTV</span>
            <strong>Góc nhìn báo chí về uy tín và hành trình phát triển của Đông Nam</strong>
          </div>
        </div>
      </div>
    </div>

    <!-- Timeline horizontal -->
    <div class="timeline">
      <div class="timeline-track"></div>
      <div class="timeline-items" role="tablist" aria-label="Các mốc lịch sử Nha Khoa Đông Nam">
        <button class="tl-item" role="tab" aria-selected="false"
          data-year="2005"
          data-title="Nha Khoa Đông Nam thành lập"
          data-desc="Khởi nguồn từ mong muốn mang lại nụ cười tự tin và bền vững cho người Việt, Nha Khoa Đông Nam chính thức ra đời. Sự kiện này đặt viên gạch đầu tiên cho một thương hiệu nha khoa truyền thống và lâu đời, nơi y đức, sự tận tâm và tiêu chuẩn y khoa khắt khe được chúng tôi gìn giữ, phát triển xuyên suốt qua nhiều thế hệ khách hàng.">
          <div class="tl-dot"></div>
          <div class="tl-year">2005</div>
          <div class="tl-label">Nha Khoa Đông Nam thành lập</div>
        </button>
        <button class="tl-item" role="tab" aria-selected="false"
          data-year="2015"
          data-title="Xác lập vị thế chuyên gia Implant, ca khó"
          data-desc="Đánh dấu một bước ngoặt lớn khi vinh dự nhận giải thưởng “Dịch vụ tốt nhất năm 2015”. Đặc biệt, cột mốc thực hiện thành công hơn 8.000 trụ Implant đã chính thức định vị Đông Nam là phòng khám hàng đầu trong lĩnh vực phục hình răng. Với đội ngũ bác sĩ chuyên môn cao, nha khoa luôn tự tin tiếp nhận và đưa ra giải pháp an toàn, hiệu quả cho cả những ca mất răng lâu năm, tiêu xương hàm phức tạp.">
          <div class="tl-dot"></div>
          <div class="tl-year">2015</div>
          <div class="tl-label">Xác lập vị thế chuyên gia Implant, ca khó</div>
        </button>
        <button class="tl-item" role="tab" aria-selected="false"
          data-year="2017"
          data-title="Nối dài lời cam kết &quot;Đồng hành trọn đời&quot;"
          data-desc="Đáp ứng nhu cầu ngày càng lớn mạnh, Nha Khoa Đông Nam khai trương cơ sở 2 tại (614 - 616 Lê Hồng Phong, phường Vườn Lài). Sự vươn mình này không chỉ dừng lại ở việc nâng cấp trang thiết bị hiện đại, mà còn là hành động thực tế hóa lời cam kết đồng hành trọn đời. Đông Nam tạo ra một hệ thống liền mạch, thuận tiện để khách hàng dễ dàng ghé thăm và chăm sóc răng miệng định kỳ.">
          <div class="tl-dot"></div>
          <div class="tl-year">2017</div>
          <div class="tl-label">Nối dài lời cam kết "Đồng hành trọn đời"</div>
        </button>
        <button class="tl-item" role="tab" aria-selected="false"
          data-year="2019"
          data-title="Bảo chứng cho sự chăm sóc tận tâm"
          data-desc="Vinh dự nhận giải thưởng “TOP 10 THƯƠNG HIỆU TIN CẬY, SẢN PHẨM CHẤT LƯỢNG, DỊCH VỤ TẬN TÂM 2019”. Cụm từ &quot;Dịch vụ tận tâm&quot; được xướng tên chính là thước đo chuẩn xác nhất cho triết lý cá nhân hóa kế hoạch điều trị và chính sách chăm sóc sau điều trị không giới hạn của Nha Khoa Đông Nam.">
          <div class="tl-dot"></div>
          <div class="tl-year">2019</div>
          <div class="tl-label">Bảo chứng cho sự chăm sóc tận tâm</div>
        </button>
        <button class="tl-item" role="tab" aria-selected="false"
          data-year="2024"
          data-title="Tự hào &quot;Top 10 Nha Khoa Tốt Nhất Việt Nam&quot;"
          data-desc="Được vinh danh tại giải thưởng danh giá &quot;THE BEST OF VIETNAM 2024&quot;. Trái ngọt này là sự hội tụ hoàn hảo của 3 trụ cột thương hiệu: Nền tảng truyền thống uy tín, chuyên môn của đội ngũ bác sĩ và sự tận tâm đồng hành cùng nụ cười Việt. Thành tựu hơn 21 năm của Đông Nam không chỉ nằm ở những giải thưởng, mà nằm ở sự an tâm tuyệt đối của hàng trăm ngàn khách hàng.">
          <div class="tl-dot"></div>
          <div class="tl-year">2024</div>
          <div class="tl-label">Tự hào "Top 10 Nha Khoa Tốt Nhất Việt Nam"</div>
        </button>
      </div>

      <!-- Slide-up detail card -->
      <div class="tl-card" id="tlPanel" role="region" aria-live="polite" aria-label="Chi tiết sự kiện">
        <div class="tl-card-inner">
          <div class="tl-card-year"></div>
          <div class="tl-card-body">
            <div class="tl-card-title"></div>
            <div class="tl-card-desc"></div>
          </div>
          <button class="tl-card-close" aria-label="Đóng">&times;</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ STATS HIGHLIGHT ═══ -->
<div class="stats-strip">
  <div class="ndn-container">
    <div class="usp-stats">
      <div class="usp-stat-item">
        <span class="usp-stat-num">152.000<em>+</em></span>
        <span class="usp-stat-label">Khách hàng đã tin chọn</span>
      </div>
      <div class="usp-stat-item">
        <span class="usp-stat-num">10.500<em>+</em></span>
        <span class="usp-stat-label">Trụ Implant đã cấy</span>
      </div>
      <div class="usp-stat-item">
        <span class="usp-stat-num">2</span>
        <span class="usp-stat-label">Cơ sở tại TP.HCM</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══ COMMITMENT CERTIFICATE ═══ -->
<section class="commit">
  <div class="ndn-container">
    <div class="ndn-form-section-inner">
      <div class="ndn-form-section-text reveal-left">
        <h2>ĐẶT LỊCH KHÁM NHẬN ƯU ĐÃI TRI ÂN</h2>
        <p>Chương trình kết thúc 01/05/2026. Đăng ký ngay để được tư vấn miễn phí và giữ suất ưu đãi.</p>
        <div class="ndn-form-section-contact">
          <div class="contact-row">
            <div class="contact-row-icon">📞</div>
            <div>Tổng đài: <a href="tel:19007141">1900.7141</a></div>
          </div>
          <div class="contact-row">
            <div class="contact-row-icon">📱</div>
            <div>Hotline: <a href="tel:0972411411">0972.411.411</a></div>
          </div>
          <div class="contact-row">
            <div class="contact-row-icon">📍</div>
            <div style="font-size: 14px; line-height: 1.6;">
              CS1: 411 Nguyễn Kiệm - Phường Đức Nhuận - TPHCM<br>
              CS2: 614 Lê Hồng Phong - Phường Vườn Lài - TPHCM
            </div>
          </div>
          <div class="contact-row">
            <div class="contact-row-icon">🕐</div>
            <div style="font-size: 14px; line-height: 1.6;">
              Thứ 2 - 7: 8h00 - 19h00<br>
              Chủ nhật: 8h00 - 16h00
            </div>
          </div>
        </div>
      </div>

      <div class="hero-form-wrapper reveal-right">
        <div class="form-header">
          <div class="form-urgency-badge">Suất ưu đãi có hạn</div>
          <h3>Đăng ký nhận ưu đãi</h3>
          <p>Quý khách hàng hãy để lại thông tin để được hỗ trợ trực tiếp</p>
        </div>
        <?php echo do_shortcode('[contact-form-7 id="1314978" title="CT-GIOTO2026 - name-at - phone"]'); ?>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SERVICES ═══ -->
<section class="services" id="services">
  <div class="ndn-container">
    <div class="services-head">
      <div class="left">
        <div class="section-label">Dịch vụ tại Đông Nam</div>
        <h2 class="ndn-title">Dịch vụ <em>trọn gói</em>, chi phí minh bạch</h2>
        <p class="section-sub">Mọi gói Implant đã bao gồm trụ + abutment + răng sứ + xét nghiệm. Khách hàng nhận vỏ hộp trụ chính hãng để tra cứu.</p>
      </div>
    </div>

    <div class="svc-grid">
      <div class="svc-hero">
        <div class="top">
          <span class="svc-badge">Dịch vụ trọng tâm</span>
          <h3>Trồng răng<br><em>Implant</em></h3>
          <p class="svc-tagline">Chuyên gia cấy ghép Implant từ 2005</p>
        </div>
        <div class="svc-stats">
          <div class="svc-stat"><strong>10.500+</strong><span>Trụ đã cấy</span></div>
          <div class="svc-stat"><strong>6 loại</strong><span>Hàn Quốc → Thụy Sĩ</span></div>
          <div class="svc-stat"><strong>Trọn đời</strong><span>Đồng hành</span></div>
        </div>
        <div class="bottom">
          <div style="font-size:12px;color:rgba(255,255,255,.55);max-width:200px;line-height:1.5">Package trọn gói · vỏ hộp chính hãng để tra cứu</div>
          <a href="https://nhakhoadongnam.com/bang-gia/" class="cta">Xem bảng giá →</a>
        </div>
      </div>

      <div class="svc-card">
        <div class="illust">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2026/04/boc-rang-su-cho-rang.jpg" alt="Minh họa dịch vụ bọc răng sứ" loading="lazy">
        </div>
        <h4>Bọc răng sứ thẩm mỹ</h4>
        <p>Thiết kế dáng răng hài hòa, tự nhiên, đề cao nguyên tắc bảo tồn răng thật, sử dụng 100% vật liệu sứ chính hãng cùng chế độ bảo hành, chăm sóc dài hạn để bạn luôn an tâm.</p>
        <a href="https://nhakhoadongnam.com/bang-gia/#rang-su" class="arrow">Tìm hiểu →</a>
      </div>

      <div class="svc-card">
        <div class="illust">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2026/04/nieng-rang-cho-tre-em.jpg" alt="Minh họa dịch vụ niềng răng" loading="lazy">
        </div>
        <h4>Nha khoa tổng quát</h4>
        <p>Từ thăm khám, cạo vôi, trám răng đến nhổ răng khôn... mọi quy trình đều được các bác sĩ thực hiện nhẹ nhàng, chuẩn y khoa, giúp ngăn ngừa các bệnh lý từ sớm. </p>
        <a href="https://nhakhoadongnam.com/bang-gia/#nieng" class="arrow">Tìm hiểu →</a>
      </div>
    </div>

    <div class="svc-minor">
      <a class="svc-minor-item" href="https://nhakhoadongnam.com/page/implant/">Trồng Implant</a>
      <a class="svc-minor-item" href="https://nhakhoadongnam.com/bang-gia/#tay-trang">Tẩy trắng răng</a>
      <a class="svc-minor-item" href="https://nhakhoadongnam.com/bang-gia/#tram">Trám răng</a>
      <a class="svc-minor-item" href="https://nhakhoadongnam.com/bang-gia/#nho-rang">Nhổ răng khôn</a>
      <a class="svc-minor-item" href="https://nhakhoadongnam.com/bang-gia/#tuy">Điều trị tủy</a>
      <a class="svc-minor-item" href="https://nhakhoadongnam.com/bang-gia/#tre-em">Nha khoa trẻ em</a>
    </div>
  </div>
</section>

<!-- ═══ DOCTORS ═══ -->
<section class="doctors" id="doctors">
  <div class="ndn-container">
    <div class="docs-head">
      <div class="section-label">Đội ngũ bác sĩ</div>
      <h2 class="ndn-title">Cùng một <em>chuẩn chuyên môn</em></h2>
      <p class="section-sub" style="margin-top:18px">Quy trình điều trị do Bác sĩ Giám đốc — chuyên gia cấy ghép Implant — thiết lập. Mọi ca Implant đều được giám sát bởi cùng một tiêu chuẩn y khoa.</p>
    </div>

    <!-- Row 1: Detail panel full-width -->
    <div class="doc-detail" id="docDetail" aria-live="polite" aria-label="Thông tin chi tiết bác sĩ">
      <div class="doc-detail-photo" id="docDetailPhoto" role="img" aria-label="Ảnh bác sĩ">
        <img id="docDetailImage" src="https://nhakhoadongnam.com/wp-content/uploads/2025/01/bac-si-nguyen-phu-nhan.webp" alt="Ảnh bác sĩ" loading="lazy">
      </div>
      <div class="doc-detail-body">
        <div class="doc-detail-label">Bác sĩ</div>
        <div class="doc-detail-name" id="docDetailName"></div>
        <div class="doc-detail-spec" id="docDetailSpec"></div>
        <ul class="doc-detail-creds" id="docDetailCreds"></ul>
        <a class="doc-detail-btn" id="docDetailLink" href="#">Xem hồ sơ chi tiết →</a>
      </div>
    </div>

    <!-- Row 2: 5 cards -->
    <div class="docs-slider-wrap">
      <button class="docs-arrow docs-prev" aria-label="Bác sĩ trước">‹</button>
      <div class="docs-grid" role="listbox" aria-label="Chọn bác sĩ">
        <button class="doc-card active" role="option" aria-selected="true"
          data-name="BÁC SĨ CKII ĐẶNG QUỐC DŨNG"
          data-spec="Chuyên gia cấy ghép Implant"
          data-photo="featured"
          data-image="https://nhakhoadongnam.com/wp-content/uploads/2025/01/bac-si-nguyen-phu-nhan.webp"
          data-link="#"
          data-creds="Chứng chỉ hành nghề số: 001529/HCM - CCHN">
          <img class="doc-photo" src="https://nhakhoadongnam.com/wp-content/uploads/2025/01/bac-si-nguyen-phu-nhan.webp" alt="Ảnh BÁC SĨ CKII ĐẶNG QUỐC DŨNG" loading="lazy">
          <div class="doc-card-info">
            <div class="doc-card-name">BÁC SĨ CKII ĐẶNG QUỐC DŨNG</div>
            <div class="doc-card-spec">Chuyên gia cấy ghép Implant</div>
          </div>
        </button>
        <button class="doc-card" role="option" aria-selected="false"
          data-name="BS Nguyễn Phú Nhân"
          data-spec="Implant · Phục hình sứ · Veneer"
          data-photo=""
          data-image="https://nhakhoadongnam.com/wp-content/uploads/2025/01/bac-si-nguyen-phu-nhan.webp"
          data-link="#"
          data-creds="Bác sĩ Răng Hàm Mặt|Chứng chỉ hành nghề số: 002254/HCM-CCHN|Chứng chỉ phục hồi thẩm mỹ mặt dán sứ Đại học Y Dược TP.HCM|Chứng chỉ kiểm soát nhiễm khuẩn Bệnh viện Nhi Đồng|Chứng chỉ phẫu thuật nha chu thẩm mỹ SA VIỆT NAM HOLISTIC DENTAL SOLUTIONS|Chứng chỉ cấy ghép nha khoa Bệnh viện Răng Hàm Mặt Trung Ương TP.HCM|Chứng chỉ chỉnh hình răng mặt Bệnh viện Trung ương Huế|Chuyên cấy ghép Implant, phục hình sứ trên Implant, phục hình thẩm mỹ răng sứ – Veneer, tiểu phẫu nha khoa.">
          <img class="doc-photo" src="https://nhakhoadongnam.com/wp-content/uploads/2025/01/bac-si-nguyen-phu-nhan.webp" alt="Ảnh BS Nguyễn Phú Nhân" loading="lazy">
          <div class="doc-card-info">
            <div class="doc-card-name">BS Nguyễn Phú Nhân</div>
            <div class="doc-card-spec">Implant · Phục hình sứ · Veneer</div>
          </div>
        </button>
        <button class="doc-card" role="option" aria-selected="false"
          data-name="BS CKI Thanh Thảo"
          data-spec="Chỉnh nha · Nha khoa tổng quát"
          data-photo=""
          data-image="https://nhakhoadongnam.com/wp-content/uploads/2025/01/bac-si-nguyen-thi-thanh-thao.webp"
          data-link="#"
          data-creds="Bác sĩ Răng Hàm Mặt|Bác sĩ Chuyên khoa I – Đại học Y Dược|Chứng chỉ hành nghề số: 008071/ĐL-CCHN|Chứng chỉ cấy ghép nha khoa Bệnh viện Răng Hàm Mặt Trung Ương TP.HCM|Chứng chỉ đào tạo liên tục chỉnh hình răng hàm mặt Bệnh viện Răng Hàm Mặt Trung Ương TP.HCM|Chứng chỉ điều trị nội nha và nhổ răng tiểu phẫu chuyên khoa I Đại học Y Dược Huế|Chứng chỉ kiểm soát nhiễm khuẩn Bệnh viện Trường Đại Học Y Hà Nội|Chuyên niềng răng, răng sứ thẩm mỹ, nha khoa tổng quát, nha khoa phòng ngừa.">
          <img class="doc-photo" src="https://nhakhoadongnam.com/wp-content/uploads/2025/01/bac-si-nguyen-thi-thanh-thao.webp" alt="Ảnh BS CKI Thanh Thảo" loading="lazy">
          <div class="doc-card-info">
            <div class="doc-card-name">BS CKI Thanh Thảo</div>
            <div class="doc-card-spec">Chỉnh nha · Nha khoa tổng quát</div>
          </div>
        </button>
        <!-- Đổi ảnh bác sĩ sau này: chỉ cần thay cùng lúc `data-image` và `img src` bên dưới. -->
        <button class="doc-card" role="option" aria-selected="false"
          data-name="BÁC SĨ CKI NGUYỄN THANH LONG"
          data-spec="Implant · Nội nha · Phục hình · Tiểu phẫu"
          data-photo=""
          data-image="https://nhakhoadongnam.com/wp-content/uploads/2025/01/bac-si-nguyen-phu-nhan.webp"
          data-link="#"
          data-creds="Chứng chỉ hành nghề số: 044529/HCM-CCHN|Chứng chỉ Cấy ghép Implant tại Đại Học Y Dược TPHCM|Chứng chỉ Cấy ghép Implant nâng cao tại Đại Học Y Hà Nội|Bác sĩ chuyên khoa cấp I Đại Học Y Dược TPHCM|Chuyên sâu: Cấy ghép Implant, điều trị nội nha, phục hình, tiểu phẫu nhổ răng khôn và nha khoa thẩm mỹ.">
          <img class="doc-photo" src="https://nhakhoadongnam.com/wp-content/uploads/2025/01/bac-si-nguyen-phu-nhan.webp" alt="Ảnh BÁC SĨ CKI NGUYỄN THANH LONG" loading="lazy">
          <div class="doc-card-info">
            <div class="doc-card-name">BS CKI Nguyễn Thanh Long</div>
            <div class="doc-card-spec">Implant · Nội nha · Phục hình</div>
          </div>
        </button>
        <button class="doc-card" role="option" aria-selected="false"
          data-name="BS Trần Xuân Dự"
          data-spec="Implant kỹ thuật số · Nha khoa tổng quát"
          data-photo=""
          data-image="https://nhakhoadongnam.com/wp-content/uploads/2025/01/bac-si-tran-thi-xuan-du.webp"
          data-link="#"
          data-creds="Bác sĩ Răng Hàm Mặt|Chứng chỉ hành nghề số: 008256/ĐL-CCHN|Chứng chỉ quy trình Implant kỹ thuật số Đại học Y Dược TP.HCM|Chứng chỉ chỉnh nha và Implant Đại học Y Dược Cần Thơ|Chuyên nha khoa tổng quát và nha khoa phòng ngừa.">
          <img class="doc-photo" src="https://nhakhoadongnam.com/wp-content/uploads/2025/01/bac-si-tran-thi-xuan-du.webp" alt="Ảnh BS Trần Xuân Dự" loading="lazy">
          <div class="doc-card-info">
            <div class="doc-card-name">BS Trần Xuân Dự</div>
            <div class="doc-card-spec">Implant kỹ thuật số · Nha khoa tổng quát</div>
          </div>
        </button>
      </div>
      <button class="docs-arrow docs-next" aria-label="Bác sĩ tiếp theo">›</button>
    </div>
  </div>
</section>

<!-- ═══ RESULTS ═══ -->
<section class="results" id="results">
  <div class="ndn-container">
    <div class="results-head">
      <div>
        <div class="section-label">Kết quả điều trị</div>
        <h2 class="ndn-title">Những <em>nụ cười</em> đã trở lại</h2>
      </div>
      <div class="result-tabs" role="tablist" aria-label="Kết quả điều trị theo loại dịch vụ">
        <button class="result-tab active" role="tab" aria-selected="true" aria-controls="panel-implant" id="tab-implant">Implant</button>
        <button class="result-tab" role="tab" aria-selected="false" aria-controls="panel-rang-su" id="tab-rang-su">Bọc răng sứ</button>
      </div>
    </div>

    <div role="tabpanel" id="panel-implant" aria-labelledby="tab-implant">
    <div class="result-slider" id="sliderImplant">
      <button class="slider-arrow prev" aria-label="Ảnh trước">‹</button>
      <div class="result-slides">
        <div class="result-slide">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/cay-1-tru-implant-rang-cua-ham-tren-phuc-hinh-rang-bi-mat.webp" alt="Kết quả cấy 1 trụ Implant răng cửa hàm trên phục hình răng bị mất" loading="lazy">
        </div>
        <div class="result-slide">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/cay-1-tru-implant-rang-ham-nhai-so-6-phuc-hinh-rang-bi-mat.webp" alt="Kết quả cấy 1 trụ Implant răng hàm nhai số 6 phục hình răng bị mất" loading="lazy">
        </div>
        <div class="result-slide">

          <img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/cay-1-tru-implant-rang-ham-nhai-phuc-hinh-rang-bi-mat.webp" alt="Kết quả cấy 1 trụ Implant răng hàm nhai phục hình răng bị mất" loading="lazy">
        </div>
        <div class="result-slide">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/cay-implant-ham-tren-va-phuc-hinh-rang-su-2-ham.webp" alt="Kết quả cấy Implant hàm trên và phục hình răng sứ" loading="lazy">
        </div>
      </div>
      <button class="slider-arrow next" aria-label="Ảnh tiếp">›</button>
      <div class="slider-dots">
        <button class="slider-dot active" data-index="0" aria-label="Ảnh 1"></button>
        <button class="slider-dot" data-index="1" aria-label="Ảnh 2"></button>
      </div>
    </div>
    </div>
    <div role="tabpanel" id="panel-rang-su" aria-labelledby="tab-rang-su" hidden>
    <div class="result-slider" id="sliderRangsu">
      <button class="slider-arrow prev" aria-label="Ảnh trước">‹</button>
      <div class="result-slides">
        <div class="result-slide">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/boc-2-ham-rang-toan-su-hi-zirconia-cho-rang-moc-lon-xon.webp" alt="Bọc răng sứ toàn hàm hi-zirconia" loading="lazy">
        </div>
        <div class="result-slide">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/boc-su-4-rang-cua-khac-phuc-rang-moc-khong-deu.webp" alt="Bọc sứ 4 răng cửa cải thiện răng mọc không đều" loading="lazy">
        </div>
        <div class="result-slide">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/boc-6-rang-su-zirconia-khac-phuc-rang-bi-thua.webp" alt="Bọc 6 răng sứ zirconia khắc phục răng thừa" loading="lazy">
        </div>
        <div class="result-slide">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/boc-2-ham-rang-toan-su-hi-zirconia-khac-phuc-tinh-trang-rang-o-vang.webp" alt="Bọc 2 hàm răng toàn sứ hi-zirconia cho răng ố vàng" loading="lazy">
        </div>
        <div class="result-slide">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/boc-8-rang-su-zirconia-ham-tren-khac-phuc-rang-moc-lon-xon.webp" alt="Bọc 8 răng sứ zirconia hàm trên" loading="lazy">
        </div>
      </div>
      <button class="slider-arrow next" aria-label="Ảnh tiếp">›</button>
      <div class="slider-dots">
        <button class="slider-dot active" data-index="0" aria-label="Ảnh 1"></button>
        <button class="slider-dot" data-index="1" aria-label="Ảnh 2"></button>
        <button class="slider-dot" data-index="2" aria-label="Ảnh 3"></button>
        <button class="slider-dot" data-index="3" aria-label="Ảnh 4"></button>
        <button class="slider-dot" data-index="4" aria-label="Ảnh 5"></button>
      </div>
    </div>
    </div>
  </div>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class="testimonials">
  <div class="ndn-container">
    <div class="testi-head">
      <div class="section-label">Cảm nhận khách hàng</div>
      <h2 class="ndn-title">Lời kể <em>từ chính họ</em></h2>
      <p class="section-sub">Không diễn viên, không kịch bản. Chỉ là những khách hàng đã đồng hành với Đông Nam hơn một thập kỷ.</p>
    </div>

    <div class="testi-slider">
      <!-- Arrows ngoài vùng clip, positioned relative to .testi-slider -->
      <button class="slider-arrow prev" aria-label="Video trước">‹</button>
      <button class="slider-arrow next" aria-label="Video tiếp">›</button>

      <!-- .testi-inner: overflow hidden + margin tạo khoảng cho arrows -->
      <div class="testi-inner">
        <div class="testi-slides">

          <div class="testi-slide">
            <div class="testi-card">
              <iframe src="https://www.youtube.com/embed/c8Pb_kKWdMM" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" title="Cô Lan · Q.Phú Nhuận"></iframe>
              <button class="testi-gesture-layer" type="button" data-video-url="https://www.youtube.com/watch?v=c8Pb_kKWdMM" aria-label="Mở video khách hàng Cô Lan trên YouTube"></button>
            </div>
          </div>

          <div class="testi-slide">
            <div class="testi-card">
              <iframe src="https://www.youtube.com/embed/eblVhYpRay8" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" title="Chú Hải · Q.10"></iframe>
              <button class="testi-gesture-layer" type="button" data-video-url="https://www.youtube.com/watch?v=eblVhYpRay8" aria-label="Mở video khách hàng Chú Hải trên YouTube"></button>
            </div>
          </div>

          <div class="testi-slide">
            <div class="testi-card">
              <iframe src="https://www.youtube.com/embed/kh1zckdYSX8" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" title="Chị Ngọc · Tân Bình"></iframe>
              <button class="testi-gesture-layer" type="button" data-video-url="https://www.youtube.com/watch?v=kh1zckdYSX8" aria-label="Mở video khách hàng Chị Ngọc trên YouTube"></button>
            </div>
          </div>

          <div class="testi-slide">
            <div class="testi-card">
              <iframe src="https://www.youtube.com/embed/rQkbBt-CciA" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" title="Anh Minh · Gò Vấp"></iframe>
              <button class="testi-gesture-layer" type="button" data-video-url="https://www.youtube.com/watch?v=rQkbBt-CciA" aria-label="Mở video khách hàng Anh Minh trên YouTube"></button>
            </div>
          </div>

          <div class="testi-slide">
            <div class="testi-card">
              <iframe src="https://www.youtube.com/embed/uNDrs3Cvwvs" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" title="Chị Thùy · Q.Phú Nhuận"></iframe>
              <button class="testi-gesture-layer" type="button" data-video-url="https://www.youtube.com/watch?v=uNDrs3Cvwvs" aria-label="Mở video khách hàng Chị Thùy trên YouTube"></button>
            </div>
          </div>

          <div class="testi-slide">
            <div class="testi-card">
              <iframe src="https://www.youtube.com/embed/vatpzUlPl4c" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" title="Anh Tùng · Bình Thạnh"></iframe>
              <button class="testi-gesture-layer" type="button" data-video-url="https://www.youtube.com/watch?v=vatpzUlPl4c" aria-label="Mở video khách hàng Anh Tùng trên YouTube"></button>
            </div>
          </div>

        </div>
      </div><!-- /.testi-inner -->

      <div class="slider-dots testi-dots"></div>
    </div>
  </div>
</section>

<!-- ═══ PRESS COVERAGE ═══ -->
<section class="press-coverage">
  <div class="ndn-container">
    <div class="press-head">
      <h2 class="ndn-title">Báo chí nói gì về <em>Nha Khoa Đông Nam</em></h2>
      <p class="section-sub">Những bài viết từ các đầu báo lớn về công nghệ, chuyên môn điều trị và lý do khách hàng tiếp tục tin chọn Đông Nam.</p>
    </div>

    <div class="press-slider">
      <button class="slider-arrow prev" aria-label="Bài báo trước">‹</button>
      <button class="slider-arrow next" aria-label="Bài báo tiếp">›</button>

      <div class="press-inner">
        <div class="press-slides">
          <div class="press-slide">
            <a class="press-card" href="https://dantri.com.vn/suc-khoe/uu-diem-dot-pha-cua-tru-implant-straumann-20250225191103421.htm" target="_blank" rel="noopener">
              <img src="https://nhakhoadongnam.com/wp-content/uploads/2026/04/bao-dan-tri.jpg" alt="Bài báo Dân trí về Nha Khoa Đông Nam" loading="lazy">
            </a>
          </div>

          <div class="press-slide">
            <a class="press-card" href="https://vnexpress.net/uu-diem-cua-giai-phap-trong-rang-implant-toan-ham-4875056.html" target="_blank" rel="noopener">
              <img src="https://nhakhoadongnam.com/wp-content/uploads/2026/04/bao-vnexpress.jpg" alt="Bài báo VnExpress về Nha Khoa Đông Nam" loading="lazy">
            </a>
          </div>

          <div class="press-slide">
            <a class="press-card" href="https://thanhnien.vn/dieu-tri-benh-ly-rang-mieng-nha-khoa-uy-tin-chia-khoa-nu-cuoi-hoan-hao-185250514121518541.htm" target="_blank" rel="noopener">
              <img src="https://nhakhoadongnam.com/wp-content/uploads/2026/04/bao-thanh-nien.jpg" alt="Bài báo Thanh Niên về Nha Khoa Đông Nam" loading="lazy">
            </a>
          </div>

          <div class="press-slide">
            <a class="press-card" href="https://www.24h.com.vn/bi-quyet-lam-dep/chat-luong-hay-gia-re-bi-quyet-lua-chon-nha-khoa-cua-viet-kieu-c673a1665759.html?gidzl=gOI62qbEMcgac8OEILTSRAQVWmzH1bXhxSg4MWq1N6pWpuXT3WG1EEMTtmW5LrDZxPlTKcFP-ErJGKLPQm" target="_blank" rel="noopener">
              <img src="https://nhakhoadongnam.com/wp-content/uploads/2026/04/bao-24h.jpg" alt="Bài báo 24h về Nha Khoa Đông Nam" loading="lazy">
            </a>
          </div>

          <div class="press-slide">
            <a class="press-card" href="https://suckhoe.vtv.vn/khong-phai-cong-nghe-day-moi-la-ly-do-implant-co-the-ton-tai-hang-chuc-nam-102251120153533042.htm" target="_blank" rel="noopener">
              <img src="https://nhakhoadongnam.com/wp-content/uploads/2026/04/vtv-suc-khoe.jpg" alt="Bài báo VTV Sức khỏe về Nha Khoa Đông Nam" loading="lazy">
            </a>
          </div>
        </div>
      </div>

      <div class="slider-dots press-dots"></div>
    </div>
  </div>
</section>

<!-- ═══ AWARDS & CERTIFICATIONS ═══ -->
<section class="awards-certifications" id="awards">
  <div class="ndn-container">
    <div class="awards-head">
      <div class="section-label">Dấu ấn uy tín</div>
      <h2 class="ndn-title">Giải thưởng &amp; <em>chứng nhận</em></h2>
      <p class="section-sub">Những ghi nhận tiêu biểu cho hành trình phát triển bền bỉ, chuyên môn vững vàng và sự tận tâm mà Đông Nam đã giữ gìn suốt nhiều năm.</p>
    </div>

    <div class="awards-grid">
      <a class="award-card" href="https://nhakhoadongnam.com/wp-content/uploads/2025/10/chung-nhan-top-10-thuong-hieu-tin-cay-719x1024-1.jpg" target="_blank" rel="noopener" aria-label="Xem chứng nhận Top 10 thương hiệu tin cậy">
        <span class="award-frame">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2025/10/chung-nhan-top-10-thuong-hieu-tin-cay-719x1024-1.jpg" alt="Chứng nhận Top 10 thương hiệu tin cậy của Nha Khoa Đông Nam" loading="lazy">
        </span>
      </a>

      <a class="award-card" href="https://nhakhoadongnam.com/wp-content/uploads/2025/10/chung-nhan-dich-vu-tot-nhat-733x1024-1.webp" target="_blank" rel="noopener" aria-label="Xem chứng nhận dịch vụ tốt nhất">
        <span class="award-frame">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2025/10/chung-nhan-dich-vu-tot-nhat-733x1024-1.webp" alt="Chứng nhận dịch vụ tốt nhất của Nha Khoa Đông Nam" loading="lazy">
        </span>
      </a>

      <a class="award-card" href="https://nhakhoadongnam.com/wp-content/uploads/2024/02/giay-chung-nhan.jpg" target="_blank" rel="noopener" aria-label="Xem giấy chứng nhận của Nha Khoa Đông Nam">
        <span class="award-frame">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2024/02/giay-chung-nhan.jpg" alt="Giấy chứng nhận của Nha Khoa Đông Nam" loading="lazy">
        </span>
      </a>

      <a class="award-card" href="https://nhakhoadongnam.com/wp-content/uploads/2024/03/chung-nhan-dich-vu-tot-nhat-1.jpg" target="_blank" rel="noopener" aria-label="Xem chứng nhận dịch vụ tốt nhất năm 2015">
        <span class="award-frame">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2024/03/chung-nhan-dich-vu-tot-nhat-1.jpg" alt="Chứng nhận dịch vụ tốt nhất năm 2015 của Nha Khoa Đông Nam" loading="lazy">
        </span>
      </a>
    </div>

    <div class="awards-action">
      <a class="btn btn-red" href="https://nhakhoadongnam.com/wp-content/uploads/2025/10/chung-nhan-top-10-thuong-hieu-tin-cay-719x1024-1.jpg" target="_blank" rel="noopener">Xem chi tiết</a>
    </div>
  </div>
</section>

<!-- ═══ LOCATIONS ═══ -->
<section class="locations" id="locations">
  <div class="ndn-container">
    <div class="loc-head">
      <div class="section-label">Hai cơ sở tại TP.HCM</div>
      <h2 class="ndn-title">Đến <em>gặp chúng tôi</em></h2>
    </div>
    <div class="loc-grid">
      <div class="loc-card">
        <!-- HƯỚNG DẪN: Thay .loc-map bằng Google Maps embed hoặc ảnh thật -->
        <div class="loc-map">
          <iframe src="https://maps.google.com/maps?q=411+Nguyen+Kiem,+Phu+Nhuan,+Ho+Chi+Minh+City,+Vietnam&output=embed&hl=vi" title="Bản đồ cơ sở 1 - 411 Nguyễn Kiệm" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="loc-info">
          <div class="loc-tag">Cơ sở 1</div>
          <div class="loc-name">411 Nguyễn Kiệm</div>
          <div class="loc-addr">Phường Đức Nhuận, TP. Hồ Chí Minh<br>Nơi câu chuyện Đông Nam bắt đầu</div>
          <div class="loc-meta">
                <div><a href="tel:19007141" aria-label="Gọi tổng đài 1900 7141"><strong>1900 7141</strong></a><span>TỔNG ĐÀI</span></div>
                <div><strong>Thứ 2 - 7: 08h00 - 19h00<br>Chủ nhật: 08h00 - 16h00</strong></div>
              </div>
        </div>
      </div>
      <div class="loc-card">
        <div class="loc-map">
          <iframe src="https://maps.google.com/maps?q=614+Le+Hong+Phong,+District+10,+Ho+Chi+Minh+City,+Vietnam&output=embed&hl=vi" title="Bản đồ cơ sở 2 - 614 Lê Hồng Phong" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="loc-info">
          <div class="loc-tag">Cơ sở 2</div>
          <div class="loc-name">614 Lê Hồng Phong</div>
          <div class="loc-addr">Phường Vườn Lài, TP. Hồ Chí Minh<br>Không gian mở rộng, trang thiết bị hiện đại</div>
          <div class="loc-meta">
                <div><a href="tel:0972411411" aria-label="Gọi hotline 0972 411 411"><strong>0972 411 411</strong></a><span>HOTLINE</span></div>
                <div><strong>Thứ 2 - 7: 08h00 - 19h00<br>Chủ nhật: 08h00 - 16h00</strong></div>
              </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ FINAL CTA ═══ -->
<section class="final-cta" id="cta">
  <div class="ndn-container">
    <h2 class="sr-only">Đăng ký tư vấn miễn phí</h2>
    <div class="eyebrow"><span>Từ 2005 đến hôm nay</span></div>
    <p>Năm 2005, ca cấy ghép Implant đầu tiên được thực hiện trong căn phòng khám nhỏ tại Nguyễn Kiệm.</p>
    <p class="hero-line">Hôm nay, sau hơn <em>10.500 trụ Implant</em> — chúng tôi vẫn đang tiếp tục câu chuyện đó, với bạn.</p>
    <a href="tel:0972411411" class="btn btn-red">Đặt lịch tư vấn miễn phí →</a>
  </div>
</section><!-- /.final-cta -->
</main>

<!-- ═══ REGISTRATION FORM ═══ -->
<section class="ndn-form-section" id="ndn-form-section">
  <div class="ndn-form-section-inner">
    <div class="ndn-form-section-text reveal-left">
      <h2>ĐẶT LỊCH KHÁM NHẬN ƯU ĐÃI TRI ÂN</h2>
      <p>Chương trình kết thúc 01/05/2026. Đăng ký ngay để được tư vấn miễn phí và giữ suất ưu đãi.</p>
      <div class="ndn-form-section-contact">
        <div class="contact-row">
          <div class="contact-row-icon">📞</div>
          <div>Tổng đài: <a href="tel:19007141">1900.7141</a></div>
        </div>
        <div class="contact-row">
          <div class="contact-row-icon">📱</div>
          <div>Hotline: <a href="tel:0972411411">0972.411.411</a></div>
        </div>
        <div class="contact-row">
          <div class="contact-row-icon">📍</div>
          <div style="font-size: 14px; line-height: 1.6;">
            CS1: 411 Nguyễn Kiệm - Phường Đức Nhuận - TPHCM<br>
            CS2: 614 Lê Hồng Phong - Phường Vườn Lài - TPHCM
          </div>
        </div>
        <div class="contact-row">
          <div class="contact-row-icon">🕐</div>
          <div style="font-size: 14px; line-height: 1.6;">
            Thứ 2 - 7: 8h00 - 19h00<br>
            Chủ nhật: 8h00 - 16h00
          </div>
        </div>
      </div>
    </div>

    <div class="hero-form-wrapper reveal-right">
      <div class="form-header">
        <div class="form-urgency-badge">Suất ưu đãi có hạn</div>
        <h3>Đăng ký nhận ưu đãi</h3>
        <p>Quý khách hàng hãy để lại thông tin để được hỗ trợ trực tiếp</p>
      </div>
      <?php echo do_shortcode('[contact-form-7 id="1314978" title="CT-GIOTO2026 - name-at - phone"]'); ?>
    </div>
  </div>
</section>

</div><!-- /.ndn-lp -->

<?php get_footer(); ?>
