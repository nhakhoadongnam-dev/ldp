<?php
/**
 * Template Name: Trang Chủ Landing (Theme Header/Footer)
 *
 * Bản thử nghiệm: dùng get_header() / get_footer() của Flatsome
 * thay vì tự viết <html>/<head>/<body>.
 *
 * So với page-trang-chu.php:
 *  - KHÔNG tự render topbar/nav/footer của landing → để Flatsome lo.
 *  - Giữ nội dung chính (hero → final CTA → form) bọc trong .ndn-lp.
 *  - CSS/JS landing vẫn load từ /page/trang-chu/ (single source of truth).
 *
 * Cách dùng:
 *  WP Admin → Pages → Add New → chọn template "Trang Chủ Landing (Theme Header/Footer)".
 */
defined('ABSPATH') || exit;

$lp_base = home_url('/page/trang-chu');

// Ép CF7 load script/CSS — không tự detect trong custom template.
add_filter('wpcf7_load_js',  '__return_true');
add_filter('wpcf7_load_css', '__return_true');

// Enqueue CSS/JS landing — chạy trước khi get_header() gọi wp_head().
add_action('wp_enqueue_scripts', function () use ($lp_base) {
    wp_enqueue_style(
        'ndn-landing-theme',
        $lp_base . '/style.css',
        [],
        null
    );
    wp_enqueue_style(
        'ndn-landing-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap',
        [],
        null
    );
    wp_enqueue_script(
        'ndn-landing-theme',
        $lp_base . '/script.js',
        [],
        null,
        true
    );
}, 99);

get_header();
?>

<?php // Elementor cần the_content() có mặt trong DOM rendered. ?>
<div class="elementor-hidden-content" style="display:none !important" aria-hidden="true">
<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
</div>

<div class="ndn-lp">
<a href="#ndn-main" class="skip-link">Bỏ qua đến nội dung chính</a>

<main id="ndn-main">
<!-- ═══ HERO ══ -->
<section class="hero">
  <div class="hero-bg"></div>
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
</section>

<!-- ═══ USP ═══ -->
<section class="usp" id="usp">
  <div class="ndn-container">
    <div class="section-label">Ba trụ cột thương hiệu</div>
    <h2 class="ndn-title">Điều gì giữ chúng tôi <em>đứng vững</em> suốt 21 năm?</h2>
    <p class="section-sub">Không phải quảng cáo. Là những lần khách hàng quay lại sau 15 năm, dẫn theo con cháu.</p>

    <div class="usp-grid">
      <div class="usp-card reveal">
        <span class="usp-num">01 / Di sản</span>
        <div class="usp-headline">21<br><small>năm</small></div>
        <div class="usp-sub">Kinh nghiệm thực chiến</div>
        <p class="usp-body">Hơn hai thập kỷ tận tâm với 152.000+ khách hàng Việt, từ những ca đơn giản đến phục hình toàn hàm phức tạp.</p>
      </div>
      <div class="usp-card reveal">
        <span class="usp-num">02 / Chuyên môn</span>
        <div class="usp-headline">Bác sĩ<br>giám đốc</div>
        <div class="usp-sub">Chuyên gia cấy ghép implant, xử lý ca khó</div>
        <p class="usp-body">Quy trình điều trị do Bác sĩ Giám đốc, chuyên gia cấy ghép Implant, trực tiếp thiết lập và giám sát từng ca.</p>
      </div>
      <div class="usp-card reveal">
        <span class="usp-num">03 / Cam kết</span>
        <div class="usp-headline">Trọn<br>đời</div>
        <div class="usp-sub">Đồng hành dài lâu</div>
        <p class="usp-body">Bảo lãnh cấy lại Implant miễn phí nếu trụ không tích hợp. Bảo dưỡng định kỳ. Hiệu lực không giới hạn thời gian.</p>
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

    <div class="tl-video">
      <div class="tl-video-wrap">
        <iframe
          src="https://www.youtube.com/embed/BbhrSFq6jUk?rel=0"
          title="TVC kỷ niệm 21 năm — Nha Khoa Đông Nam"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          referrerpolicy="strict-origin-when-cross-origin"
          allowfullscreen
          loading="lazy">
        </iframe>
        <div class="tl-video-caption">TVC kỷ niệm 21 năm — Nha Khoa Đông Nam</div>
      </div>
    </div>

    <div class="timeline">
      <div class="timeline-track"></div>
      <div class="timeline-items" role="tablist" aria-label="Các mốc lịch sử Nha Khoa Đông Nam">
        <button class="tl-item" role="tab" aria-selected="false"
          data-year="2005"
          data-title="Nha Khoa Đông Nam thành lập"
          data-desc="Khởi nguồn từ mong muốn mang lại nụ cười tự tin và bền vững cho người Việt, Nha Khoa Đông Nam chính thức ra đời.">
          <div class="tl-dot"></div>
          <div class="tl-year">2005</div>
          <div class="tl-label">Nha Khoa Đông Nam thành lập</div>
        </button>
        <button class="tl-item" role="tab" aria-selected="false"
          data-year="2015"
          data-title="Xác lập vị thế chuyên gia Implant"
          data-desc="Đánh dấu một bước ngoặt lớn khi vinh dự nhận giải thưởng Dịch vụ tốt nhất năm 2015.">
          <div class="tl-dot"></div>
          <div class="tl-year">2015</div>
          <div class="tl-label">Xác lập vị thế chuyên gia Implant</div>
        </button>
        <button class="tl-item" role="tab" aria-selected="false"
          data-year="2017"
          data-title="Nối dài cam kết Đồng hành trọn đời"
          data-desc="Khai trương cơ sở 2 tại 614 - 616 Lê Hồng Phong.">
          <div class="tl-dot"></div>
          <div class="tl-year">2017</div>
          <div class="tl-label">Nối dài cam kết Đồng hành trọn đời</div>
        </button>
        <button class="tl-item" role="tab" aria-selected="false"
          data-year="2019"
          data-title="Bảo chứng cho sự chăm sóc tận tâm"
          data-desc="Vinh dự nhận giải thưởng TOP 10 THƯƠNG HIỆU TIN CẬY 2019.">
          <div class="tl-dot"></div>
          <div class="tl-year">2019</div>
          <div class="tl-label">Bảo chứng cho sự chăm sóc tận tâm</div>
        </button>
        <button class="tl-item" role="tab" aria-selected="false"
          data-year="2024"
          data-title="Top 10 Nha Khoa Tốt Nhất Việt Nam"
          data-desc="Được vinh danh tại giải thưởng THE BEST OF VIETNAM 2024.">
          <div class="tl-dot"></div>
          <div class="tl-year">2024</div>
          <div class="tl-label">Top 10 Nha Khoa Tốt Nhất Việt Nam</div>
        </button>
      </div>

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
    <div class="commit-head">
      <div class="section-label">Đồng hành trọn đời</div>
      <h2 class="ndn-title">Một lời hứa, <em>không phải slogan</em></h2>
    </div>

    <div class="certificate">
      <div class="cert-header">
        <div class="cert-brand">Nha Khoa Đông Nam · Since 2005</div>
        <div class="cert-title">Đồng hành trọn đời</div>
        <div class="cert-sub">Áp dụng cho mọi khách hàng cấy ghép Implant</div>
      </div>

      <div class="cert-items">
        <div class="cert-item">
          <div class="cert-check">✓</div>
          <div>Cấy lại <strong>miễn phí</strong> nếu trụ Implant không tích hợp với xương hàm.</div>
        </div>
        <div class="cert-item">
          <div class="cert-check">✓</div>
          <div>Áp dụng cho <strong>mọi loại trụ</strong> — từ Implant Hàn Quốc đến Straumann Thụy Sĩ.</div>
        </div>
        <div class="cert-item">
          <div class="cert-check">✓</div>
          <div>Bảo dưỡng định kỳ tại hai cơ sở, miễn phí cạo vôi và kiểm tra trụ.</div>
        </div>
        <div class="cert-item">
          <div class="cert-check">✓</div>
          <div>Hiệu lực <strong>trọn đời</strong> — không giới hạn thời gian, không giới hạn số lần.</div>
        </div>
      </div>

      <div class="cert-footer">
        <div class="cert-foot-left">
          <strong>Hiệu lực tại 2 cơ sở</strong>
          Nguyễn Kiệm · Lê Hồng Phong<br>
          TP. Hồ Chí Minh
        </div>
        <div class="cert-seal">
          <div class="seal-top">Mộc</div>
          <div class="seal-mid">Đông Nam</div>
          <div class="seal-bot">Since 2005</div>
        </div>
      </div>
    </div>

    <p class="commit-foot">
      <a href="https://nhakhoadongnam.com/cam-ket/">Tải bản cam kết PDF</a> &nbsp;·&nbsp; <a href="https://nhakhoadongnam.com/chinh-sach/">Đọc chi tiết chính sách →</a>
    </p>
  </div>
</section>

<!-- ═══ SERVICES ═══ -->
<section class="services" id="services">
  <div class="ndn-container">
    <div class="services-head">
      <div class="left">
        <div class="section-label">Dịch vụ tại Đông Nam</div>
        <h2 class="ndn-title">Dịch vụ <em>trọn gói</em>, chi phí minh bạch</h2>
      </div>
      <p class="section-sub">Mọi gói Implant đã bao gồm trụ + abutment + răng sứ + xét nghiệm. Khách hàng nhận vỏ hộp trụ chính hãng để tra cứu.</p>
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
        <p>Từ thăm khám, cạo vôi, trám răng đến nhổ răng khôn... mọi quy trình đều được các bác sĩ thực hiện nhẹ nhàng, chuẩn y khoa, giúp ngăn ngừa các bệnh lý từ sớm.</p>
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
      <p class="section-sub" style="margin-top:18px">Quy trình điều trị do Bác sĩ Giám đốc — chuyên gia cấy ghép Implant — thiết lập.</p>
    </div>

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
          data-creds="Bác sĩ Răng Hàm Mặt|Chứng chỉ hành nghề số: 002254/HCM-CCHN">
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
          data-creds="Bác sĩ Răng Hàm Mặt|Bác sĩ Chuyên khoa I – Đại học Y Dược">
          <img class="doc-photo" src="https://nhakhoadongnam.com/wp-content/uploads/2025/01/bac-si-nguyen-thi-thanh-thao.webp" alt="Ảnh BS CKI Thanh Thảo" loading="lazy">
          <div class="doc-card-info">
            <div class="doc-card-name">BS CKI Thanh Thảo</div>
            <div class="doc-card-spec">Chỉnh nha · Nha khoa tổng quát</div>
          </div>
        </button>
        <button class="doc-card" role="option" aria-selected="false"
          data-name="BS Trần Xuân Dự"
          data-spec="Implant kỹ thuật số · Nha khoa tổng quát"
          data-photo=""
          data-image="https://nhakhoadongnam.com/wp-content/uploads/2025/01/bac-si-tran-thi-xuan-du.webp"
          data-link="#"
          data-creds="Bác sĩ Răng Hàm Mặt|Chứng chỉ hành nghề số: 008256/ĐL-CCHN">
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
        <div class="result-slide"><img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/cay-1-tru-implant-rang-cua-ham-tren-phuc-hinh-rang-bi-mat.webp" alt="Kết quả cấy 1 trụ Implant răng cửa hàm trên" loading="lazy"></div>
        <div class="result-slide"><img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/cay-1-tru-implant-rang-ham-nhai-so-6-phuc-hinh-rang-bi-mat.webp" alt="Kết quả cấy 1 trụ Implant răng hàm nhai số 6" loading="lazy"></div>
        <div class="result-slide"><img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/cay-1-tru-implant-rang-ham-nhai-phuc-hinh-rang-bi-mat.webp" alt="Kết quả cấy 1 trụ Implant răng hàm nhai" loading="lazy"></div>
        <div class="result-slide"><img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/cay-implant-ham-tren-va-phuc-hinh-rang-su-2-ham.webp" alt="Kết quả cấy Implant hàm trên và phục hình răng sứ" loading="lazy"></div>
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
        <div class="result-slide"><img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/boc-2-ham-rang-toan-su-hi-zirconia-cho-rang-moc-lon-xon.webp" alt="Bọc răng sứ toàn hàm hi-zirconia" loading="lazy"></div>
        <div class="result-slide"><img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/boc-su-4-rang-cua-khac-phuc-rang-moc-khong-deu.webp" alt="Bọc sứ 4 răng cửa" loading="lazy"></div>
        <div class="result-slide"><img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/boc-6-rang-su-zirconia-khac-phuc-rang-bi-thua.webp" alt="Bọc 6 răng sứ zirconia" loading="lazy"></div>
        <div class="result-slide"><img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/boc-2-ham-rang-toan-su-hi-zirconia-khac-phuc-tinh-trang-rang-o-vang.webp" alt="Bọc 2 hàm răng toàn sứ" loading="lazy"></div>
        <div class="result-slide"><img src="https://nhakhoadongnam.com/wp-content/uploads/2024/11/boc-8-rang-su-zirconia-ham-tren-khac-phuc-rang-moc-lon-xon.webp" alt="Bọc 8 răng sứ zirconia hàm trên" loading="lazy"></div>
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
      <button class="slider-arrow prev" aria-label="Video trước">‹</button>
      <button class="slider-arrow next" aria-label="Video tiếp">›</button>
      <div class="testi-inner">
        <div class="testi-slides">
          <div class="testi-slide">
            <div class="testi-card">
              <iframe src="https://www.youtube.com/embed/c8Pb_kKWdMM" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" title="Cô Lan · Q.Phú Nhuận"></iframe>
              <div class="testi-info">
                <div class="name">Cô Lan · Q.Phú Nhuận</div>
                <div class="meta">Khách hàng từ 2008</div>
              </div>
            </div>
          </div>

          <div class="testi-slide">
            <div class="testi-card">
              <iframe src="https://www.youtube.com/embed/eblVhYpRay8" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" title="Chú Hải · Q.10"></iframe>
              <div class="testi-info">
                <div class="name">Chú Hải · Q.10</div>
                <div class="meta">Implant toàn hàm</div>
              </div>
            </div>
          </div>

          <div class="testi-slide">
            <div class="testi-card">
              <iframe src="https://www.youtube.com/embed/kh1zckdYSX8" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" title="Chị Ngọc · Tân Bình"></iframe>
              <div class="testi-info">
                <div class="name">Chị Ngọc · Tân Bình</div>
                <div class="meta">Bọc răng sứ</div>
              </div>
            </div>
          </div>

          <div class="testi-slide">
            <div class="testi-card">
              <iframe src="https://www.youtube.com/embed/rQkbBt-CciA" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" title="Anh Minh · Gò Vấp"></iframe>
              <div class="testi-info">
                <div class="name">Anh Minh · Gò Vấp</div>
                <div class="meta">Niềng răng trong suốt</div>
              </div>
            </div>
          </div>

          <div class="testi-slide">
            <div class="testi-card">
              <iframe src="https://www.youtube.com/embed/uNDrs3Cvwvs" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" title="Chị Thùy · Q.Phú Nhuận"></iframe>
              <div class="testi-info">
                <div class="name">Chị Thùy · Q.Phú Nhuận</div>
                <div class="meta">Implant kỹ thuật số</div>
              </div>
            </div>
          </div>

          <div class="testi-slide">
            <div class="testi-card">
              <iframe src="https://www.youtube.com/embed/vatpzUlPl4c" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" title="Anh Tùng · Bình Thạnh"></iframe>
              <div class="testi-info">
                <div class="name">Anh Tùng · Bình Thạnh</div>
                <div class="meta">Phục hình toàn hàm</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slider-dots testi-dots"></div>
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
        <div class="loc-map">
          <iframe src="https://maps.google.com/maps?q=411+Nguyen+Kiem,+Phu+Nhuan,+Ho+Chi+Minh+City,+Vietnam&output=embed&hl=vi" title="Bản đồ cơ sở 1" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="loc-info">
          <div class="loc-tag">Cơ sở 1</div>
          <div class="loc-name">411 Nguyễn Kiệm</div>
          <div class="loc-addr">Phường Đức Nhuận, TP. Hồ Chí Minh<br>Nơi câu chuyện Đông Nam bắt đầu</div>
          <div class="loc-meta">
            <div><a href="tel:19007141" aria-label="Gọi 1900 7141"><strong>1900 7141</strong></a><span>TỔNG ĐÀI</span></div>
            <div><strong>Thứ 2 - 7: 08h00 - 19h00<br>Chủ nhật: 08h00 - 16h00</strong></div>
          </div>
        </div>
      </div>
      <div class="loc-card">
        <div class="loc-map">
          <iframe src="https://maps.google.com/maps?q=614+Le+Hong+Phong,+District+10,+Ho+Chi+Minh+City,+Vietnam&output=embed&hl=vi" title="Bản đồ cơ sở 2" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="loc-info">
          <div class="loc-tag">Cơ sở 2</div>
          <div class="loc-name">614 Lê Hồng Phong</div>
          <div class="loc-addr">Phường Vườn Lài, TP. Hồ Chí Minh<br>Không gian mở rộng, trang thiết bị hiện đại</div>
          <div class="loc-meta">
            <div><a href="tel:0972411411" aria-label="Gọi 0972 411 411"><strong>0972 411 411</strong></a><span>HOTLINE</span></div>
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
</section>
</main>

<!-- ═══ REGISTRATION FORM ═══ -->
<section class="form-section" id="form-section">
  <div class="form-section-inner">
    <div class="form-section-text reveal-left">
      <h2>ĐẶT LỊCH KHÁM NHẬN ƯU ĐÃI TRI ÂN</h2>
      <p>Chương trình kết thúc 01/05/2026. Đăng ký ngay để được tư vấn miễn phí và giữ suất ưu đãi.</p>
      <div class="form-section-contact">
        <div class="contact-row"><div class="contact-row-icon">📞</div><div>Tổng đài: <a href="tel:19007141">1900.7141</a></div></div>
        <div class="contact-row"><div class="contact-row-icon">📱</div><div>Hotline: <a href="tel:0972411411">0972.411.411</a></div></div>
        <div class="contact-row"><div class="contact-row-icon">📍</div><div style="font-size:14px;line-height:1.6">CS1: 411 Nguyễn Kiệm - Phường Đức Nhuận - TPHCM<br>CS2: 614 Lê Hồng Phong - Phường Vườn Lài - TPHCM</div></div>
        <div class="contact-row"><div class="contact-row-icon">🕐</div><div style="font-size:14px;line-height:1.6">Thứ 2 - 7: 8h00 - 19h00<br>Chủ nhật: 8h00 - 16h00</div></div>
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
