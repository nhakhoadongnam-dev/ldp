<?php
/**
 * Template Name: Bảng Giá Implant Testing AB ver1 Landing (Theme) v3
 * Auto-generated from page/bang-gia-implant-testing-ab-ver1/ by wp-sync.
 * DO NOT EDIT MANUALLY — run `npm run wp:sync`.
 * Mode: Theme (content only, uses Flatsome header/footer)
 */
defined('ABSPATH') || exit;

$lp_base = home_url('/page/bang-gia-implant-testing-ab-ver1');

// Ép CF7 load script/CSS — custom template không tự detect shortcode sớm.
add_filter('wpcf7_load_js',  '__return_true');
add_filter('wpcf7_load_css', '__return_true');

// Landing JS (footer) — enqueue qua wp_enqueue_scripts priority 99.
add_action('wp_enqueue_scripts', function () use ($lp_base) {
    wp_enqueue_script(
        'ndn-landing-bang-gia-implant-abv1',
        $lp_base . '/script.js',
        [],
        null,
        true
    );
}, 99);

// Landing CSS — inject trực tiếp cuối wp_head() để guaranteed load sau Flatsome/plugins.
add_action('wp_head', function () use ($lp_base) {
    echo '<link rel="stylesheet" href="' . esc_url( $lp_base . '/style.css' ) . '">' . "\n";
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700;800&display=swap">' . "\n";
}, 999);

// Inject Schema.org JSON-LD từ page/bang-gia-implant-testing-ab-ver1/schema.json nếu tồn tại
add_action('wp_head', function () {
    $schema_file = ABSPATH . 'page/bang-gia-implant-testing-ab-ver1/schema.json';
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
<!-- ══ [1] HERO ══ -->
<section class="hero" style="position:relative;overflow:hidden;padding:28px 16px 24px;">
  <div class="ndn-container" style="position:relative;z-index:1;max-width:520px;">
    <div class="hero-label" style="margin-bottom:12px;">Cập nhật 01/05/2026</div>
    <div style="text-align:center;margin-bottom:16px;">
      <div style="color:rgba(255,255,255,0.85);font-size:16px;font-weight:500;margin-bottom:4px;">Giá Implant Tại</div>
      <h1 style="color:#ffffff;font-size:clamp(22px,6vw,42px);font-weight:900;font-family:var(--font-heading);line-height:1.1;margin-bottom:4px;">NHA KHOA ĐÔNG NAM</h1>
      <div style="color:#C9A84C;font-size:clamp(17px,4.5vw,32px);font-weight:700;white-space:nowrap;">Trọn gói — Không phát sinh</div>
    </div>

    <!-- Ảnh bìa 5 bác sĩ -->
    <div style="border-radius:12px;overflow:hidden;margin-bottom:16px;box-shadow:0 6px 24px rgba(0,0,0,0.5);border:2px solid rgba(201,168,76,0.45);">
      <img src="https://nhakhoadongnam.com/wp-content/uploads/2025/10/BANNER-5-BS-01-scaled.jpg" alt="Đội ngũ 5 bác sĩ Nha Khoa Đông Nam" style="width:100%;display:block;object-fit:cover;height:160px;object-position:top center;"/>
    </div>

    <!-- 4 bullets dạng 2x2 grid -->
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-bottom:18px;">
      <div style="display:flex;align-items:center;gap:8px;background:rgba(255,255,255,0.08);border:1px solid rgba(201,168,76,0.3);border-radius:10px;padding:10px 12px;">
        <span style="font-size:20px;flex-shrink:0;">🏛️</span>
        <div><div style="color:var(--gold);font-size:16px;font-weight:800;line-height:1;">2005</div><div style="color:rgba(255,255,255,0.7);font-size:10px;margin-top:1px;">Hoạt động từ năm</div></div>
      </div>
      <div style="display:flex;align-items:center;gap:8px;background:rgba(255,255,255,0.08);border:1px solid rgba(201,168,76,0.3);border-radius:10px;padding:10px 12px;">
        <span style="font-size:20px;flex-shrink:0;">🦷</span>
        <div><div style="color:var(--gold);font-size:16px;font-weight:800;line-height:1;">10.500+</div><div style="color:rgba(255,255,255,0.7);font-size:10px;margin-top:1px;">Ca Implant</div></div>
      </div>
      <div style="display:flex;align-items:center;gap:8px;background:rgba(255,255,255,0.08);border:1px solid rgba(201,168,76,0.3);border-radius:10px;padding:10px 12px;">
        <span style="font-size:20px;flex-shrink:0;">👥</span>
        <div><div style="color:var(--gold);font-size:16px;font-weight:800;line-height:1;">152.000+</div><div style="color:rgba(255,255,255,0.7);font-size:10px;margin-top:1px;">Khách hàng</div></div>
      </div>
      <div style="display:flex;align-items:center;gap:8px;background:rgba(255,255,255,0.08);border:1px solid rgba(201,168,76,0.3);border-radius:10px;padding:10px 12px;">
        <span style="font-size:20px;flex-shrink:0;">💳</span>
        <div><div style="color:var(--gold);font-size:16px;font-weight:800;line-height:1;">2 đợt</div><div style="color:rgba(255,255,255,0.7);font-size:10px;margin-top:1px;">Thanh toán</div></div>
      </div>
    </div>

    <!-- ★ BLOCK ƯU ĐÃI ĐẶC BIỆT ★ -->
    <div class="lp-bgiv3-offer-card" style="border-radius:14px;overflow:hidden;margin-bottom:16px;box-shadow:0 8px 32px rgba(0,0,0,0.35);display:flex;align-items:stretch;flex-wrap:wrap;">
      <!-- Cột trái: navy đậm + nội dung -->
      <div class="lp-bgiv3-offer-copy" style="flex:1;min-width:200px;background:var(--navy-dark);padding:22px 24px 20px;">
        <div style="display:inline-flex;align-items:center;border:1px solid rgba(201,168,76,0.5);border-radius:20px;padding:4px 12px;margin-bottom:14px;">
          <span style="font-size:11px;color:var(--gold);font-weight:700;letter-spacing:1px;text-transform:uppercase;">Gói ưu đãi nổi bật nhất</span>
        </div>
        <div style="font-size:clamp(18px,4vw,24px);font-weight:900;color:#fff;margin-bottom:14px;line-height:1.2;">Trồng Răng Implant Trọn Gói</div>
        <div style="display:flex;flex-direction:column;gap:9px;margin-bottom:16px;">
          <div style="display:flex;align-items:flex-start;gap:9px;font-size:13.5px;color:rgba(255,255,255,0.88);">
            <span style="color:var(--gold);font-weight:900;flex-shrink:0;margin-top:1px;">✓</span>
            <span>Đã bao gồm trụ Implant chính hãng (QR code check) + Abutment</span>
          </div>
          <div style="display:flex;align-items:flex-start;gap:9px;font-size:13.5px;color:rgba(255,255,255,0.88);">
            <span style="color:var(--gold);font-weight:900;flex-shrink:0;margin-top:1px;">✓</span>
            <span>Tặng răng sứ Mỹ trị giá 1.000.000đ</span>
          </div>
          <div style="display:flex;align-items:flex-start;gap:9px;font-size:13.5px;color:rgba(255,255,255,0.88);">
            <span style="color:var(--gold);font-weight:900;flex-shrink:0;margin-top:1px;">✓</span>
            <span>Miễn phí chụp phim CT 3D &amp; Xét nghiệm máu</span>
          </div>
          <div style="display:flex;align-items:flex-start;gap:9px;font-size:13.5px;color:rgba(255,255,255,0.88);">
            <span style="color:var(--gold);font-weight:900;flex-shrink:0;margin-top:1px;">✓</span>
            <span>Miễn phí khám &amp; tư vấn cùng BS chuyên gia</span>
          </div>
        </div>
        <div style="background:rgba(255,248,225,0.12);border:1px solid rgba(255,213,79,0.35);border-radius:8px;padding:9px 13px;font-size:12px;color:rgba(255,255,255,0.7);">
          ⚠ Lưu ý: Ưu đãi chỉ áp dụng cho <strong style="color:#FFD54F;">30 khách hàng</strong> đăng ký online sớm nhất trong tháng.
        </div>
      </div>
      <!-- Cột phải: trắng + giá + nút -->
      <div class="lp-bgiv3-offer-price" style="background:#fff;padding:20px 22px;text-align:center;display:flex;flex-direction:column;align-items:center;justify-content:center;min-width:180px;flex-shrink:0;position:relative;">
        <!-- Badge góc trên phải -->
        <div style="position:absolute;top:0;right:0;background:#E53935;color:#fff;font-size:10px;font-weight:800;padding:5px 12px;border-radius:0 0 0 10px;letter-spacing:1px;">TIẾT KIỆM 20%</div>
        <!-- Giá gốc gạch ngang -->
        <div style="font-size:14px;color:#aaa;text-decoration:line-through;margin-top:16px;margin-bottom:2px;">16.500.000 đ</div>
        <!-- Giá sau ưu đãi -->
        <div style="font-size:clamp(28px,7vw,40px);font-weight:900;color:#E53935;font-family:var(--font-heading);line-height:1.1;margin-bottom:6px;">13.200.000 đ</div>
        <!-- Tiết kiệm -->
        <div style="font-size:13px;color:#555;margin-bottom:18px;">Giảm trực tiếp <strong style="color:#E53935;">3.300.000 đ</strong></div>
        <!-- Nút CTA -->
        <a href="#dang-ky" style="display:block;width:100%;background:#E53935;color:#fff;font-weight:800;font-size:13px;padding:13px 16px;border-radius:8px;text-decoration:none;letter-spacing:0.5px;text-transform:uppercase;box-shadow:0 4px 14px rgba(229,57,53,0.4);">Đăng Ký Suất Ưu Đãi Ngay</a>
      </div>
    </div>

    <!-- CTA -->
    <div style="text-align:center;margin-bottom:16px;">
      <a href="#dang-ky" class="lp-btn-primary" style="font-size:15px;padding:14px 24px;">📅 Khám miễn phí &amp; Báo giá chính xác</a>
    </div>

    <!-- Countdown -->
    <div class="countdown-wrap" style="max-width:500px;margin:0 auto;">
      <div class="cd-label">⏰ Ưu đãi có thời hạn</div>
      <div class="cd-title">Ưu đãi <span>20%</span> khi đặt lịch Online — Chỉ <span>30 khách hàng</span> đầu tiên trước <span>31/05/2026</span></div>
      <div class="cd-boxes">
        <div class="cd-unit"><div class="cd-box" id="h-days">00</div><div class="cd-sub">ngày</div></div>
        <div class="cd-sep">:</div>
        <div class="cd-unit"><div class="cd-box" id="h-hours">00</div><div class="cd-sub">giờ</div></div>
        <div class="cd-sep">:</div>
        <div class="cd-unit"><div class="cd-box" id="h-mins">00</div><div class="cd-sub">phút</div></div>
        <div class="cd-sep">:</div>
        <div class="cd-unit"><div class="cd-box" id="h-secs">00</div><div class="cd-sub">giây</div></div>
      </div>
      <div id="h-ended" class="cd-ended" style="display:none;">Chương trình đã kết thúc</div>
    </div>
  </div>
</section>

<!-- ══ [2] TRUST VALUE BAR ══ -->
<div style="background:var(--navy-dark);border-bottom:3px solid var(--gold);padding:24px 20px;">
  <div style="max-width:680px;margin:0 auto;">
    <div style="display:flex;flex-direction:column;gap:10px;">
      <div style="display:flex;align-items:flex-start;gap:12px;">
        <span style="font-size:20px;flex-shrink:0;margin-top:1px;">🏛️</span>
        <span style="font-size:15px;color:rgba(255,255,255,0.88);line-height:1.6;">Nha khoa lâu đời, hơn <strong style="color:var(--gold);">21 năm</strong> uy tín tại TP.HCM.</span>
      </div>
      <div style="display:flex;align-items:flex-start;gap:12px;">
        <span style="font-size:20px;flex-shrink:0;margin-top:1px;">🦷</span>
        <span style="font-size:15px;color:rgba(255,255,255,0.88);line-height:1.6;">Bác sĩ <strong style="color:var(--gold);">chuyên môn sâu</strong>, xử lý rất nhiều ca khó/phức tạp.</span>
      </div>
      <div style="display:flex;align-items:flex-start;gap:12px;">
        <span style="font-size:20px;flex-shrink:0;margin-top:1px;">🤝</span>
        <span style="font-size:15px;color:rgba(255,255,255,0.88);line-height:1.6;">Cam kết <strong style="color:var(--gold);">đồng hành và tái khám trọn đời</strong>.</span>
      </div>
    </div>
    <p style="color:rgba(255,255,255,0.55);font-size:13px;margin-top:14px;text-align:center;">Bên dưới có <strong style="color:var(--gold);">công cụ tính dự toán chi phí Implant độc quyền</strong> của Nha khoa Đông Nam dành cho bạn.</p>
  </div>
</div>

<!-- ★ CAM KẾT BẰNG VĂN BẢN ★ -->
<div style="background:var(--white);padding:20px 20px 0;">
  <div class="ndn-container" style="max-width:760px;">
    <div class="commit-box">
      <div class="commit-inner">
        <p>Cấy lại hoàn toàn <strong>MIỄN PHÍ</strong> — hoặc <strong>HOÀN TIỀN 100%</strong><br/>nếu trụ Implant không tương thích hoặc không thể phục hình răng.</p>
        <div style="display:flex;justify-content:center;gap:10px;flex-wrap:wrap;margin-top:12px;">
          <div class="refund-badge">🔄 CẤY LẠI MIỄN PHÍ</div>
          <div class="refund-badge" style="background:#1A7A4A;">💰 HOÀN TIỀN 100%</div>
        </div>
        <p style="font-size:12px;color:#888;margin-top:8px;">Cam kết được xác nhận bằng văn bản ký kết trước khi điều trị</p>
      </div>
    </div>
  </div>
</div>

<!-- ══ [3] BẢNG GIÁ + ƯU ĐÃI 20% ══ -->
<section class="lp-bgiv3-section" id="bang-gia" style="background:var(--white);">
  <div class="ndn-container">
    <div class="lp-label">BẢNG GIÁ 2026</div>
    <h2 class="ndn-title">🦷 Bảng Giá Implant Trọn Gói</h2>

    <!-- PRICE NOTICE BOX -->
    <div class="price-notice-box">
      <div class="pnb-title">📌 GIÁ TRỌN GÓI / 1 TRỤ</div>
      <div class="pnb-grid">
        <div class="pnb-item"><div class="pnb-check"><svg viewBox="0 0 12 12" fill="white"><path d="M2 6l3 3 5-5" stroke="white" stroke-width="2" fill="none" stroke-linecap="round"/></svg></div><span>Trụ chính hãng (hộp QR code / số lô)</span></div>
        <div class="pnb-item"><div class="pnb-check"><svg viewBox="0 0 12 12" fill="white"><path d="M2 6l3 3 5-5" stroke="white" stroke-width="2" fill="none" stroke-linecap="round"/></svg></div><span>Khớp nối Abutment</span></div>
        <div class="pnb-item"><div class="pnb-check"><svg viewBox="0 0 12 12" fill="white"><path d="M2 6l3 3 5-5" stroke="white" stroke-width="2" fill="none" stroke-linecap="round"/></svg></div><span>Tặng răng sứ (Mỹ) trị giá 1.000.000₫</span></div>
        <div class="pnb-item"><div class="pnb-check"><svg viewBox="0 0 12 12" fill="white"><path d="M2 6l3 3 5-5" stroke="white" stroke-width="2" fill="none" stroke-linecap="round"/></svg></div><span>Chi phí xét nghiệm (nếu có)</span></div>
        <div class="pnb-item"><div class="pnb-check"><svg viewBox="0 0 12 12" fill="white"><path d="M2 6l3 3 5-5" stroke="white" stroke-width="2" fill="none" stroke-linecap="round"/></svg></div><span>Kinh nghiệm chuyên sâu từ BS CKII</span></div>
        <div class="pnb-item"><div class="pnb-check"><svg viewBox="0 0 12 12" fill="white"><path d="M2 6l3 3 5-5" stroke="white" stroke-width="2" fill="none" stroke-linecap="round"/></svg></div><span>Đồng hành trọn đời cùng Khách hàng</span></div>
      </div>
    </div>

    <p style="font-size:14px;color:var(--text-sub);margin-bottom:6px;">Thị trường giá trụ Implant chính hãng trung bình <strong style="color:var(--red);">15–40 triệu/trụ</strong></p>
    <h3 style="font-family:var(--font-heading);font-size:22px;color:var(--navy);margin-bottom:16px;">📋 Bảng Giá &amp; So Sánh Các Dòng Trụ</h3>

    <div class="comp-table-wrap">
      <table class="comp-table">
        <thead>
          <tr>
            <th style="text-align:left;">Dòng trụ</th>
            <th>Giá / trụ</th>
            <th>Tích hợp xương</th>
            <th>Đặc điểm nổi bật</th>
            <th>Phù hợp cho</th>
          </tr>
        </thead>
        <tbody>
          <tr class="uudai-20-row">
            <td><span class="lp-flag lp-flag-kr" aria-label="Han Quoc" role="img"><svg viewBox="0 0 36 24" aria-hidden="true"><rect width="36" height="24" fill="#fff"/><circle cx="18" cy="12" r="5.2" fill="#c60c30"/><path d="M18 6.8a5.2 5.2 0 0 1 0 10.4a5.2 5.2 0 0 0 0-10.4z" fill="#003478"/><path d="M7 5l5 2M8 3l5 2M6 7l5 2M24 17l5 2M25 15l5 2M23 19l5 2M25 5l5-2M24 7l5-2M23 9l5-2M7 19l5-2M8 21l5-2M6 17l5-2" stroke="#111" stroke-width="1.1"/></svg></span> Implant Hàn Quốc <span class="uudai-20-badge">-20%</span></td>
            <td><span class="price-original">16.500.000 ₫</span><br/><span class="price-new-20">13.200.000 ₫</span></td>
            <td>3–6 tháng</td>
            <td>Bề mặt ổn định, ren tiêu chuẩn, độ bền cao</td>
            <td>Mất răng đơn lẻ, xương hàm tốt</td>
          </tr>
          <tr class="recommended uudai-20-row">
            <td><span class="lp-flag lp-flag-it" aria-label="Y" role="img"><svg viewBox="0 0 36 24" aria-hidden="true"><rect width="12" height="24" fill="#009246"/><rect x="12" width="12" height="24" fill="#fff"/><rect x="24" width="12" height="24" fill="#ce2b37"/></svg></span> Implant Ý — C-Tech <span style="background:var(--green);color:#fff;font-size:10px;padding:2px 7px;border-radius:10px;margin-left:4px;vertical-align:middle;white-space:nowrap;display:inline-block;">Đề xuất</span> <span class="uudai-20-badge">-20%</span></td>
            <td><span class="price-original">19.900.000 ₫</span><br/><span class="price-new-20">15.920.000 ₫</span></td>
            <td>2–3 tháng</td>
            <td><strong>Platform Switching</strong> — bảo tồn xương cổ trụ, chống tụt lợi</td>
            <td>Cần thẩm mỹ cao, bền 20–30 năm</td>
          </tr>
          <tr style="background:#fff;">
            <td><span class="lp-flag lp-flag-us" aria-label="My" role="img"><svg viewBox="0 0 36 24" aria-hidden="true"><rect width="36" height="24" fill="#b22234"/><path d="M0 3.7h36M0 7.4h36M0 11.1h36M0 14.8h36M0 18.5h36M0 22.2h36" stroke="#fff" stroke-width="1.8"/><rect width="15.5" height="12.8" fill="#3c3b6e"/><g fill="#fff"><circle cx="3" cy="3" r=".7"/><circle cx="7" cy="3" r=".7"/><circle cx="11" cy="3" r=".7"/><circle cx="5" cy="6" r=".7"/><circle cx="9" cy="6" r=".7"/><circle cx="13" cy="6" r=".7"/><circle cx="3" cy="9" r=".7"/><circle cx="7" cy="9" r=".7"/><circle cx="11" cy="9" r=".7"/></g></svg></span> Implant Mỹ</td>
            <td class="price-col dark">23.500.000 ₫</td>
            <td>2–4 tháng</td>
            <td>Ren sâu, ổn định cơ học ngay khi cấy</td>
            <td>Vùng răng hàm cần lực nhai mạnh</td>
          </tr>
          <tr class="uudai-20-row">
            <td><span class="lp-flag lp-flag-fr" aria-label="Phap" role="img"><svg viewBox="0 0 36 24" aria-hidden="true"><rect width="12" height="24" fill="#002395"/><rect x="12" width="12" height="24" fill="#fff"/><rect x="24" width="12" height="24" fill="#ed2939"/></svg></span> Implant Pháp — ETK Active <span class="uudai-20-badge">-20%</span></td>
            <td><span class="price-original">28.200.000 ₫</span><br/><span class="price-new-20">22.560.000 ₫</span></td>
            <td>1–2 tháng</td>
            <td>Bề mặt SA cao cấp, lên răng tức thì</td>
            <td>Xương hàm xốp, muốn rút ngắn thời gian</td>
          </tr>
          <tr class="uudai-20-row">
            <td><span class="lp-flag lp-flag-se" aria-label="Thuy Dien" role="img"><svg viewBox="0 0 36 24" aria-hidden="true"><rect width="36" height="24" fill="#006aa7"/><rect x="10" width="4" height="24" fill="#fecc00"/><rect y="10" width="36" height="4" fill="#fecc00"/></svg></span> Implant Thụy Điển — Nobel Active <span class="uudai-20-badge">-20%</span></td>
            <td><span class="price-original">32.900.000 ₫</span><br/><span class="price-new-20">26.320.000 ₫</span></td>
            <td>1–2 tháng</td>
            <td>Hình nón nén xương, ổn định tức thì</td>
            <td>Mất toàn hàm, xương hàm yếu</td>
          </tr>
          <tr style="background:#fff;">
            <td><span class="lp-flag lp-flag-ch" aria-label="Thuy Si" role="img"><svg viewBox="0 0 24 24" aria-hidden="true"><rect width="24" height="24" fill="#d52b1e"/><path d="M10 5h4v5h5v4h-5v5h-4v-5H5v-4h5z" fill="#fff"/></svg></span> Implant Thụy Sĩ — Straumann</td>
            <td class="price-col dark">34.000.000 ₫</td>
            <td>3–6 tuần</td>
            <td><strong>SLActive</strong> — lành thương siêu tốc</td>
            <td>Người bận rộn, có bệnh lý nền</td>
          </tr>
        </tbody>
      </table>
    </div>
    <p style="font-size:12px;color:var(--text-sub);text-align:right;margin-top:-18px;margin-bottom:20px;font-style:italic;">* Ưu đãi 20% áp dụng khi đặt lịch online trước 31/05/2026. Chỉ 30 suất.</p>

    <!-- LỜI KHUYÊN BÁC SĨ -->
    <div class="lp-label" style="margin-bottom:12px;">LỜI KHUYÊN TỪ BÁC SĨ ĐÔNG NAM</div>
    <p style="font-size:14px;color:var(--text-sub);margin-bottom:16px;">Dựa trên hàng ngàn ca lâm sàng, chúng tôi tạm chia làm 3 nhóm sau giúp quý khách dễ ra quyết định:</p>
    <div class="reco-list" style="margin-bottom:16px;">
      <div class="reco-card">
        <div class="reco-badge" style="background:linear-gradient(160deg,#1A7A4A,#1e9a5a);"><div class="reco-icon">⭐</div><div class="reco-rank">ƯU TIÊN<br>SỐ 1</div></div>
        <div class="reco-body">
          <div class="reco-name"><span class="lp-flag lp-flag-it" aria-label="Y" role="img"><svg viewBox="0 0 36 24" aria-hidden="true"><rect width="12" height="24" fill="#009246"/><rect x="12" width="12" height="24" fill="#fff"/><rect x="24" width="12" height="24" fill="#ce2b37"/></svg></span> Implant Ý — C-Tech</div>
          <div style="margin:4px 0 8px;display:flex;gap:6px;flex-wrap:wrap;">
            <span style="background:var(--green);color:#fff;font-size:11px;padding:3px 10px;border-radius:10px;display:inline-block;">Cân bằng hoàn hảo</span>
            <span style="background:#E53935;color:#fff;font-size:11px;padding:3px 10px;border-radius:10px;display:inline-block;">Còn 15.920.000 ₫</span>
          </div>
          <div class="reco-desc">Chuẩn Châu Âu, công nghệ <strong>Platform Switching</strong> bảo tồn xương cổ trụ — bền đẹp 20–30 năm. Chi phí cân bằng, không quá cao như Thụy Sĩ.</div>
        </div>
      </div>
      <div class="reco-card">
        <div class="reco-badge" style="background:linear-gradient(160deg,var(--navy),var(--navy-mid));"><div class="reco-icon">💰</div><div class="reco-rank">ƯU TIÊN<br>SỐ 2</div></div>
        <div class="reco-body">
          <div class="reco-name"><span class="lp-flag lp-flag-kr" aria-label="Han Quoc" role="img"><svg viewBox="0 0 36 24" aria-hidden="true"><rect width="36" height="24" fill="#fff"/><circle cx="18" cy="12" r="5.2" fill="#c60c30"/><path d="M18 6.8a5.2 5.2 0 0 1 0 10.4a5.2 5.2 0 0 0 0-10.4z" fill="#003478"/><path d="M7 5l5 2M8 3l5 2M6 7l5 2M24 17l5 2M25 15l5 2M23 19l5 2M25 5l5-2M24 7l5-2M23 9l5-2M7 19l5-2M8 21l5-2M6 17l5-2" stroke="#111" stroke-width="1.1"/></svg></span> Implant Hàn Quốc</div>
          <div style="margin:4px 0 8px;display:flex;gap:6px;flex-wrap:wrap;">
            <span style="background:var(--navy);color:#fff;font-size:11px;padding:3px 10px;border-radius:10px;display:inline-block;">Tối ưu ngân sách</span>
            <span style="background:#E53935;color:#fff;font-size:11px;padding:3px 10px;border-radius:10px;display:inline-block;">Còn 13.200.000 ₫</span>
          </div>
          <div class="reco-desc">Lựa chọn quốc dân — bền bỉ, an toàn, chi phí vừa phải. Phù hợp mất răng đơn lẻ, xương hàm tốt, tài chính cần cân đối.</div>
        </div>
      </div>
      <div class="reco-card">
        <div class="reco-badge" style="background:linear-gradient(160deg,#7D4E00,#b87a20);"><div class="reco-icon">⚡</div><div class="reco-rank">PHỤC HÌNH<br>NHANH CHÓNG</div></div>
        <div class="reco-body">
          <div class="reco-name"><span class="lp-flag lp-flag-fr" aria-label="Phap" role="img"><svg viewBox="0 0 36 24" aria-hidden="true"><rect width="12" height="24" fill="#002395"/><rect x="12" width="12" height="24" fill="#fff"/><rect x="24" width="12" height="24" fill="#ed2939"/></svg></span> Pháp (ETK Active) / <span class="lp-flag lp-flag-se" aria-label="Thuy Dien" role="img"><svg viewBox="0 0 36 24" aria-hidden="true"><rect width="36" height="24" fill="#006aa7"/><rect x="10" width="4" height="24" fill="#fecc00"/><rect y="10" width="36" height="4" fill="#fecc00"/></svg></span> Thụy Điển (Nobel Active)</div>
          <div style="margin:4px 0 8px;display:flex;gap:6px;flex-wrap:wrap;">
            <span style="background:#7D4E00;color:#fff;font-size:11px;padding:3px 10px;border-radius:10px;display:inline-block;">Lành thương siêu tốc</span>
            <span style="background:#E53935;color:#fff;font-size:11px;padding:3px 10px;border-radius:10px;display:inline-block;">ETK từ 22.560.000 ₫</span>
          </div>
          <div class="reco-desc">Cho ca đặc biệt: cần lên răng trong thời gian ngắn nhất. <strong>ETK Active</strong> lành thương 1–2 tháng cho xương hàm xốp. <strong>Nobel Active</strong> ổn định tức thì, lý tưởng cho mất toàn hàm hoặc xương hàm yếu.</div>
        </div>
      </div>
    </div>
    <div style="background:var(--navy-light);border-left:4px solid var(--navy);border-radius:0 var(--radius) var(--radius) 0;padding:16px 20px;">
      <p style="font-size:14px;color:var(--navy);line-height:1.7;margin:0;"><strong>⚕️ Lưu ý từ bác sĩ:</strong> Kết quả còn phụ thuộc vào tình trạng xương hàm thực tế và kỹ thuật bác sĩ. Quý khách nên <strong>thăm khám sớm</strong> để có kế hoạch điều trị chính xác — <a href="#dang-ky" style="color:var(--navy);font-weight:700;text-decoration:underline;">đặt lịch miễn phí tại đây</a>.</p>
    </div>
  </div>
</section>

<!-- ══ [4] QUIZ DỰ TOÁN CHI PHÍ (ĐẶT SỚM - SAU BẢNG GIÁ) ══ -->
<section id="quiz" style="background:linear-gradient(160deg,var(--navy-dark) 0%,#1a3a5c 100%);padding:52px 0;">
  <div class="ndn-container">
    <div style="text-align:center;margin-bottom:32px;">
      <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(201,168,76,0.18);border:1.5px solid rgba(201,168,76,0.5);border-radius:30px;padding:6px 18px;margin-bottom:14px;">
        <span style="font-size:14px;">🔑</span>
        <span style="color:var(--gold);font-size:11px;font-weight:800;letter-spacing:1.5px;text-transform:uppercase;">Công Cụ Độc Quyền — Nha Khoa Đông Nam</span>
      </div>
      <h2 style="font-family:var(--font-heading);font-size:clamp(22px,3.5vw,32px);color:var(--white);margin-bottom:10px;line-height:1.3;">🎯 Dự Toán Chi Phí Implant<br/><span style="color:var(--gold);">Theo Tình Trạng Của Bạn</span></h2>
      <p style="color:rgba(255,255,255,0.7);font-size:14px;max-width:480px;margin:0 auto;">5 câu hỏi nhanh · Dự báo tình trạng tiêu xương hàm · Hoàn toàn miễn phí</p>
      <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:10px;margin-top:16px;">
        <div style="display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);border-radius:20px;padding:5px 14px;">
          <span style="font-size:13px;">🔬</span><span style="color:rgba(255,255,255,0.8);font-size:12px;font-weight:600;">Thang đo Cawood &amp; Howell (1988)</span>
        </div>
        <div style="display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);border-radius:20px;padding:5px 14px;">
          <span style="font-size:13px;">🏅</span><span style="color:rgba(255,255,255,0.8);font-size:12px;font-weight:600;">Tiêu chuẩn ICOI Quốc tế</span>
        </div>
        <div style="display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);border-radius:20px;padding:5px 14px;">
          <span style="font-size:13px;">✅</span><span style="color:rgba(255,255,255,0.8);font-size:12px;font-weight:600;">Hoàn toàn Miễn phí</span>
        </div>
      </div>
    </div>

    <!-- Quiz card -->
    <div style="max-width:500px;margin:0 auto;background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,0.4);border:2px solid rgba(201,168,76,0.3);">
      <div style="background:linear-gradient(135deg,var(--navy-dark),#1e3d6e);padding:16px 20px;display:flex;align-items:center;gap:12px;">
        <div style="width:36px;height:36px;border-radius:50%;background:var(--gold);display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;">🎯</div>
        <div>
          <div style="font-size:13px;font-weight:800;color:var(--white);letter-spacing:0.3px;">Công cụ dự toán chi phí Implant</div>
          <div style="font-size:11px;color:rgba(255,255,255,0.75);margin-top:1px;">🔬 Cơ sở tính toán Khoa học sử dụng thang đo Cawood &amp; Howell (1988) và tiêu chuẩn của ICOI (Hội Implant Quốc tế)</div>
        </div>
      </div>
      <div style="height:4px;background:#e2e8f0;">
        <div id="qz-bar" style="height:4px;background:linear-gradient(90deg,var(--navy),var(--gold));width:20%;transition:width .4s;"></div>
      </div>
      <div style="padding:22px 22px 18px;" id="qz-content">
        <form id="qz-form">
          <div class="qz-s" data-step="1">
            <div style="font-size:12px;font-weight:800;color:var(--navy);text-transform:uppercase;letter-spacing:1px;margin-bottom:14px;">1. Thời gian mất răng?</div>
            <div style="display:flex;flex-direction:column;gap:10px;">
              <label class="qz-opt"><input type="radio" name="time" value="1" style="display:none"/>
                <strong style="display:block;font-size:15px;">Dưới 6 tháng</strong>
                <span style="font-size:13px;color:var(--text-sub);">Xương ổ răng chưa tiêu — tỷ lệ cấy trực tiếp cao</span>
              </label>
              <label class="qz-opt"><input type="radio" name="time" value="3" style="display:none"/>
                <strong style="display:block;font-size:15px;">Từ 6 tháng – 2 năm</strong>
                <span style="font-size:13px;color:var(--text-sub);">Xương bắt đầu tiêu nhẹ, có thể cần ghép thêm xương bột</span>
              </label>
              <label class="qz-opt"><input type="radio" name="time" value="6" style="display:none"/>
                <strong style="display:block;font-size:15px;color:var(--red);">Trên 2 năm (Rủi ro cao)</strong>
                <span style="font-size:13px;color:var(--text-sub);">Xương tiêu trầm trọng, cần đánh giá kỹ qua CT 3D</span>
              </label>
            </div>
          </div>
          <div class="qz-s" data-step="2" style="display:none;">
            <div style="font-size:12px;font-weight:800;color:var(--navy);text-transform:uppercase;letter-spacing:1px;margin-bottom:14px;">2. Nguyên nhân mất răng?</div>
            <div style="display:flex;flex-direction:column;gap:10px;">
              <label class="qz-opt"><input type="radio" name="cause" value="1" style="display:none"/>
                <strong style="display:block;font-size:15px;">Sâu răng / Chấn thương</strong>
                <span style="font-size:13px;color:var(--text-sub);">Nền xương xung quanh thường còn chắc khỏe</span>
              </label>
              <label class="qz-opt"><input type="radio" name="cause" value="5" style="display:none"/>
                <strong style="display:block;font-size:15px;color:var(--red);">Viêm nha chu / Lung lay</strong>
                <span style="font-size:13px;color:var(--text-sub);">Vi khuẩn đã phá hủy xương ổ răng từ trước khi rụng</span>
              </label>
              <label class="qz-opt"><input type="radio" name="cause" value="3" style="display:none"/>
                <strong style="display:block;font-size:15px;">Mất răng bẩm sinh</strong>
                <span style="font-size:13px;color:var(--text-sub);">Xương không được kích thích nhai lâu ngày, dần bị mỏng</span>
              </label>
            </div>
          </div>
          <div class="qz-s" data-step="3" style="display:none;">
            <div style="font-size:12px;font-weight:800;color:var(--navy);text-transform:uppercase;letter-spacing:1px;margin-bottom:14px;">3. Vị trí cần phục hình?</div>
            <div style="display:flex;flex-direction:column;gap:10px;">
              <label class="qz-opt"><input type="radio" name="position" value="3" style="display:none"/>
                <strong style="display:block;font-size:15px;">Răng cửa</strong>
                <span style="font-size:13px;color:var(--text-sub);">Cần thẩm mỹ cao, xử lý nướu mỏng vùng mặt ngoài</span>
              </label>
              <label class="qz-opt"><input type="radio" name="position" value="4" style="display:none"/>
                <strong style="display:block;font-size:15px;">Răng hàm trên</strong>
                <span style="font-size:13px;color:var(--text-sub);">Thường liên quan xoang hàm, có thể cần nâng xoang</span>
              </label>
              <label class="qz-opt"><input type="radio" name="position" value="1" style="display:none"/>
                <strong style="display:block;font-size:15px;">Răng hàm dưới</strong>
                <span style="font-size:13px;color:var(--text-sub);">Xương đặc hơn, cần lưu ý dây thần kinh hàm dưới</span>
              </label>
            </div>
          </div>
          <div class="qz-s" data-step="4" style="display:none;">
            <div style="font-size:12px;font-weight:800;color:var(--navy);text-transform:uppercase;letter-spacing:1px;margin-bottom:14px;">4. Mong muốn ưu tiên nhất?</div>
            <div style="display:flex;flex-direction:column;gap:10px;">
              <label class="qz-opt"><input type="radio" name="priority" value="cost" style="display:none"/>
                <strong style="display:block;font-size:15px;">💰 Tối ưu chi phí</strong>
                <span style="font-size:13px;color:var(--text-sub);">Gợi ý trụ Hàn Quốc — hiệu quả kinh tế cao nhất</span>
              </label>
              <label class="qz-opt"><input type="radio" name="priority" value="quality" style="display:none"/>
                <strong style="display:block;font-size:15px;">✨ Thẩm mỹ &amp; Bền bỉ lâu dài</strong>
                <span style="font-size:13px;color:var(--text-sub);">Gợi ý trụ Ý (C-Tech) — bảo tồn xương, thẩm mỹ nướu</span>
              </label>
              <label class="qz-opt"><input type="radio" name="priority" value="fast" style="display:none"/>
                <strong style="display:block;font-size:15px;">⚡ Cần lên răng nhanh</strong>
                <span style="font-size:13px;color:var(--text-sub);">Gợi ý trụ Pháp (ETK Active) — tích hợp xương 1–2 tháng</span>
              </label>
            </div>
          </div>
          <div class="qz-s" data-step="5" style="display:none;">
            <div id="qz-qty-view">
              <div style="font-size:12px;font-weight:800;color:var(--navy);text-transform:uppercase;letter-spacing:1px;margin-bottom:14px;">5. Số lượng răng cần trồng?</div>
              <div style="display:flex;align-items:center;justify-content:center;gap:24px;padding:22px;background:var(--off-white);border-radius:12px;border:1px solid var(--gray-mid);">
                <button type="button" onclick="qzAdj2(-1)" style="width:48px;height:48px;border-radius:50%;border:2px solid var(--navy);background:#fff;font-size:24px;font-weight:800;color:var(--navy);cursor:pointer;line-height:1;">−</button>
                <input type="number" id="qz-qty2" value="1" min="1" max="14" readonly style="width:56px;text-align:center;font-size:36px;font-weight:900;color:var(--navy);background:transparent;border:none;outline:none;font-family:var(--font-heading);"/>
                <button type="button" onclick="qzAdj2(1)" style="width:48px;height:48px;border-radius:50%;border:2px solid var(--navy);background:#fff;font-size:24px;font-weight:800;color:var(--navy);cursor:pointer;line-height:1;">+</button>
              </div>
              <p style="text-align:center;font-size:12px;color:var(--text-sub);margin-top:8px;">răng cần trồng Implant</p>
            </div>
          </div>
        </form>

        <!-- KẾT QUẢ -->
        <div id="qz-result2" style="display:none;">
          <div style="background:var(--navy-light);border-left:5px solid var(--navy);border-radius:0 10px 10px 0;padding:14px 18px;margin-bottom:16px;">
            <div style="font-size:10px;font-weight:800;color:var(--navy);text-transform:uppercase;letter-spacing:1px;margin-bottom:4px;">Dự báo tình trạng xương hàm</div>
            <div id="qz-risk2" style="font-size:14px;color:var(--text);font-weight:600;line-height:1.6;"></div>
          </div>
          <div style="margin-bottom:16px;">
            <div style="font-size:10px;font-weight:800;color:var(--navy);text-transform:uppercase;letter-spacing:1px;border-bottom:2px solid var(--navy);padding-bottom:8px;margin-bottom:12px;">Bảng tính chi phí trọn gói</div>
            <div id="qz-items2" style="display:flex;flex-direction:column;gap:10px;font-size:14px;"></div>
          </div>
          <div style="border-top:2px solid var(--gray-mid);padding-top:14px;display:flex;flex-direction:column;gap:8px;margin-bottom:16px;">
            <div style="display:flex;justify-content:space-between;align-items:baseline;">
              <span style="font-size:11px;font-weight:700;color:var(--text-sub);text-transform:uppercase;">Tổng chi phí dự kiến:</span>
              <span id="qz-total2" style="font-size:18px;font-weight:800;color:var(--text);"></span>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:baseline;color:var(--red);font-style:italic;">
              <span style="font-size:13px;">Tiết kiệm ưu đãi 20% (trụ Implant):</span>
              <span id="qz-disc2" style="font-size:14px;font-weight:700;"></span>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:baseline;border-top:1px dashed var(--gray-mid);padding-top:10px;">
              <span style="font-size:12px;font-weight:800;color:var(--navy);text-transform:uppercase;">Chi phí còn lại:</span>
              <span id="qz-final2" style="font-size:26px;font-weight:900;color:var(--green);"></span>
            </div>
          </div>
          <div style="background:#FFF0F0;border:1px solid #FADBD8;border-radius:10px;padding:12px 14px;margin-bottom:16px;">
            <p style="font-size:12px;color:var(--red);line-height:1.65;margin:0;"><strong>LOẠI TRỪ TRÁCH NHIỆM:</strong> Kết quả chỉ mang tính chất dự báo. Kết luận điều trị chính xác bắt buộc phải dựa trên phim CT 3D và thăm khám trực tiếp tại Nha Khoa Đông Nam.</p>
          </div>
          <a href="#dang-ky" style="display:block;background:var(--navy);color:var(--gold);font-weight:800;font-size:14px;padding:16px;border-radius:12px;text-align:center;text-decoration:none;margin-bottom:10px;animation:zoomPulse 2s ease-in-out infinite;text-transform:uppercase;letter-spacing:0.5px;">Miễn phí chụp phim CT 3D ngay hôm nay</a>
          <button onclick="qzReset2()" style="width:100%;background:none;border:1.5px solid var(--gray-mid);border-radius:10px;padding:10px;font-family:var(--font-body);font-size:13px;color:var(--text-sub);cursor:pointer;font-weight:600;">↺ Thực hiện lại</button>
        </div>
      </div>

      <!-- Nav -->
      <div id="qz-nav2" style="display:flex;justify-content:space-between;align-items:center;padding:12px 14px;border-top:1px solid var(--gray);background:var(--off-white);">
        <button id="qz-prev2" onclick="qzPrev2()" style="display:none;font-size:12px;font-weight:800;color:var(--text-sub);background:none;border:none;cursor:pointer;font-family:var(--font-body);text-transform:uppercase;padding:8px 10px;white-space:nowrap;flex-shrink:0;">← Quay lại</button>
        <div style="display:flex;gap:6px;margin:0 auto;" id="qz-dots2">
          <div style="width:8px;height:8px;border-radius:50%;background:var(--navy);"></div>
          <div style="width:8px;height:8px;border-radius:50%;background:var(--gray-mid);"></div>
          <div style="width:8px;height:8px;border-radius:50%;background:var(--gray-mid);"></div>
          <div style="width:8px;height:8px;border-radius:50%;background:var(--gray-mid);"></div>
          <div style="width:8px;height:8px;border-radius:50%;background:var(--gray-mid);"></div>
        </div>
        <button id="qz-next2" onclick="qzNext2()" disabled style="background:var(--navy);color:#fff;font-family:var(--font-body);font-weight:800;font-size:12px;text-transform:uppercase;padding:12px 14px;border-radius:10px;border:none;cursor:pointer;opacity:0.3;transition:opacity .2s;letter-spacing:0.5px;white-space:nowrap;flex-shrink:0;">Tiếp theo</button>
      </div>
    </div>
  </div>
</section>

<!-- ══ [5] MINI CTA #1 — SAU QUIZ, TRƯỚC KHI CUỘN THÊM ══ -->
<div class="mini-cta-strip">
  <h3>Đã biết chi phí dự kiến — Giờ nhận báo giá chính xác miễn phí</h3>
  <p>Để lại số điện thoại — Nha Khoa Đông Nam gọi lại tư vấn trong 30 phút</p>
  <a href="#dang-ky" class="lp-btn-gold" style="display:inline-flex;">📅 Đặt lịch nhận ưu đãi 20% ngay</a>
</div>

<!-- ══ [6] URGENCY BANNER ══ -->
<div style="background:#fff5f5;border-top:3px solid #E53935;border-bottom:3px solid #E53935;padding:22px 20px;text-align:center;">
  <p style="max-width:680px;margin:0 auto;font-size:16px;font-weight:700;color:#C0392B;line-height:1.8;font-style:italic;">Mất răng càng lâu – xương tiêu càng nhiều – chi phí càng đội lên. Trồng Implant sớm là quyết định tiết kiệm đến 40% bạn có thể làm hôm nay.</p>
</div>

<!-- ══ [8] KHÁCH HÀNG NÓI GÌ ══ -->
<section class="lp-bgiv3-section" id="reviews" style="background:var(--off-white);padding-top:28px;">
  <div class="ndn-container">
    <div class="lp-label">KHÁCH HÀNG NÓI GÌ</div>
    <h2 class="ndn-title">Hơn 10.500 Ca Implant — Nghe Người Thật Chia Sẻ</h2>
    <p class="lp-section-sub">Những chia sẻ chân thực nhất từ khách hàng đã làm Implant tại Đông Nam</p>
    <div class="reviews-grid">
      <div class="review-card"><div class="review-thumb" data-vid="rQkbBt-CciA" onclick="playVideo(this)"><img src="https://i.ytimg.com/vi/rQkbBt-CciA/hqdefault.jpg" loading="lazy"/><iframe src="" allowfullscreen allow="autoplay"></iframe><div class="play-btn">▶</div></div><div class="review-body"><div class="review-stars">★★★★★</div><div class="review-quote">Ban đầu tôi lo lắm, cứ nghĩ cấy ghép phải đau đớn. Nhưng Bác sĩ Dũng làm rất nhẹ nhàng.</div><div class="review-meta"><div class="review-avatar">V</div><div><div class="review-name">Anh Vũ Công Uy</div></div><div class="review-tag">Implant</div></div></div></div>
      <div class="review-card"><div class="review-thumb" data-vid="kh1zckdYSX8" onclick="playVideo(this)"><img src="https://i.ytimg.com/vi/kh1zckdYSX8/hqdefault.jpg" loading="lazy"/><iframe src="" allowfullscreen allow="autoplay"></iframe><div class="play-btn">▶</div></div><div class="review-body"><div class="review-stars">★★★★★</div><div class="review-quote">Sau 5 năm làm Implant, mình vẫn nhai tốt, nhai cả sụn — không khác gì răng thật!</div><div class="review-meta"><div class="review-avatar">L</div><div><div class="review-name">Chú Lân &amp; Cô Ngọc</div></div><div class="review-tag">5 năm sau</div></div></div></div>
      <div class="review-card"><div class="review-thumb" data-vid="vatpzUlPl4c" onclick="playVideo(this)"><img src="https://i.ytimg.com/vi/vatpzUlPl4c/hqdefault.jpg" loading="lazy"/><iframe src="" allowfullscreen allow="autoplay"></iframe><div class="play-btn">▶</div></div><div class="review-body"><div class="review-stars">★★★★★</div><div class="review-quote">Tôi từng lo sẽ đau, nhưng chỉ hơi tê nhẹ lúc tiêm. Sau đó hầu như không cảm thấy gì.</div><div class="review-meta"><div class="review-avatar">L</div><div><div class="review-name">Anh Nguyễn Thanh Liêm</div></div><div class="review-tag">Implant</div></div></div></div>
      <div class="review-card"><div class="review-thumb" data-vid="Wn8wE71jd9E" onclick="playVideo(this)"><img src="https://i.ytimg.com/vi/Wn8wE71jd9E/hqdefault.jpg" loading="lazy"/><iframe src="" allowfullscreen allow="autoplay"></iframe><div class="play-btn">▶</div></div><div class="review-body"><div class="review-stars">★★★★★</div><div class="review-quote">Anh nhai chắc chắn, thoải mái như răng thật — không đau, không ê buốt.</div><div class="review-meta"><div class="review-avatar">T</div><div><div class="review-name">Anh Trương Công Thắng</div></div><div class="review-tag">Implant</div></div></div></div>
      <div class="review-card"><div class="review-thumb" data-vid="c8Pb_kKWdMM" onclick="playVideo(this)"><img src="https://i.ytimg.com/vi/c8Pb_kKWdMM/hqdefault.jpg" loading="lazy"/><iframe src="" allowfullscreen allow="autoplay"></iframe><div class="play-btn">▶</div></div><div class="review-body"><div class="review-stars">★★★★★</div><div class="review-quote">Tôi rất yên tâm — biết rằng dù ở đâu, nha khoa vẫn luôn đồng hành và hỗ trợ khi cần.</div><div class="review-meta"><div class="review-avatar">T</div><div><div class="review-name">Cô Phạm Thị Tuyết Trâm</div></div><div class="review-tag">Implant</div></div></div></div>
      <div class="review-card"><div class="review-thumb" data-vid="sJ9Zd_dTAis" onclick="playVideo(this)"><img src="https://i.ytimg.com/vi/sJ9Zd_dTAis/hqdefault.jpg" loading="lazy"/><iframe src="" allowfullscreen allow="autoplay"></iframe><div class="play-btn">▶</div></div><div class="review-body"><div class="review-stars">★★★★★</div><div class="review-quote">Cô rất an tâm khi trồng răng Implant tại Đông Nam. Và cô sẽ tiếp tục tới nữa.</div><div class="review-meta"><div class="review-avatar">H</div><div><div class="review-name">Cô Lâm Thị Hoa</div></div><div class="review-tag">Implant</div></div></div></div>
    </div>
    <div style="text-align:center;margin-top:28px;"><a href="https://nhakhoadongnam.com/khach-hang-implant-review/" class="lp-btn-outline-navy" target="_blank">Xem thêm cảm nhận khách hàng →</a></div>
  </div>
</section>

<!-- ══ [9] ĐỘI NGŨ BÁC SĨ ══ -->
<section class="lp-bgiv3-section" id="bac-si" style="background:var(--navy-dark);padding-top:36px;padding-bottom:40px;">
  <div class="ndn-container">
    <div class="lp-label" style="background:rgba(201,168,76,0.18);color:var(--gold);">ĐỘI NGŨ CHUYÊN GIA</div>
    <h2 class="ndn-title" style="color:var(--white);">Đội Ngũ Bác Sĩ Chuyên Gia Về Implant</h2>
    <p class="lp-section-sub" style="color:rgba(255,255,255,0.65);">Hơn 21 năm tích lũy, mỗi bác sĩ được đào tạo chuyên sâu về Implant &amp; xử lý ca khó</p>
    <div style="overflow-x:auto;-webkit-overflow-scrolling:touch;padding-bottom:12px;margin:0 -16px;padding-left:16px;padding-right:16px;">
      <div style="display:flex;gap:14px;min-width:max-content;align-items:stretch;">
        <div class="bs-card" style="background:linear-gradient(160deg,#1e3d6e,#0f2438);border:2px solid var(--gold);box-shadow:0 8px 28px rgba(201,168,76,0.22);position:relative;">
          <div style="position:absolute;top:10px;right:10px;background:var(--gold);color:var(--navy-dark);font-size:9px;font-weight:800;padding:3px 9px;border-radius:20px;z-index:2;white-space:nowrap;font-family:var(--font-body);">⭐ GIÁM ĐỐC</div>
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2024/12/dang-quoc-dung-quote.jpeg" alt="BS.CKII Đặng Quốc Dũng"/>
          <div class="bs-card-body">
            <div class="bs-card-name dung">BS.CKII Đặng Quốc Dũng</div>
            <div class="bs-card-points">
              <div class="bs-card-pt"><span>✦</span>Giám đốc &amp; Sáng lập Đông Nam từ 2005</div>
              <div class="bs-card-pt"><span>✦</span>Chuyên sâu Implant &amp; ca tiêu xương nặng</div>
              <div class="bs-card-pt"><span>✦</span>25 năm kinh nghiệm trồng răng Implant</div>
            </div>
            <a href="#dang-ky" class="bs-card-btn gold-solid">Đặt lịch với BS Dũng</a>
          </div>
        </div>
        <div class="bs-card" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.12);">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2024/12/nguyen-phu-nhan-quote.jpeg" alt="BS.Nguyễn Phú Nhân"/>
          <div class="bs-card-body">
            <div class="bs-card-name">BS.Nguyễn Phú Nhân</div>
            <div class="bs-card-points">
              <div class="bs-card-pt"><span>✦</span>CCHN số: 002254/HCM-CCHN</div>
              <div class="bs-card-pt"><span>✦</span>Chứng chỉ phục hồi thẩm mỹ mặt dán sứ ĐH Y Dược TPHCM</div>
              <div class="bs-card-pt"><span>✦</span>Chứng chỉ cấy ghép nha khoa BV RHM TW TPHCM</div>
            </div>
            <a href="#dang-ky" class="bs-card-btn gold-outline">Đặt lịch với BS Nhân</a>
          </div>
        </div>
        <div class="bs-card" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.12);">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2026/05/bs-long-nha-khoa-dong-nam-1536x1536.jpg" alt="BS.CKI Nguyễn Thanh Long"/>
          <div class="bs-card-body">
            <div class="bs-card-name">BS.CKI Nguyễn Thanh Long</div>
            <div class="bs-card-points">
              <div class="bs-card-pt"><span>✦</span>CCHN số: 044529/HCM-CCHN</div>
              <div class="bs-card-pt"><span>✦</span>Chứng chỉ Implant tại ĐH Y Dược TPHCM</div>
              <div class="bs-card-pt"><span>✦</span>Chứng chỉ Implant nâng cao tại ĐH Y Hà Nội</div>
            </div>
            <a href="#dang-ky" class="bs-card-btn gold-outline">Đặt lịch với BS Long</a>
          </div>
        </div>
        <div class="bs-card" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.12);">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2024/12/nguyen-thi-thanh-thao-quote.jpeg" alt="BS.CKI Nguyễn Thị Thanh Thảo"/>
          <div class="bs-card-body">
            <div class="bs-card-name">BS.CKI Nguyễn Thị Thanh Thảo</div>
            <div class="bs-card-points">
              <div class="bs-card-pt"><span>✦</span>CCHN số: 008071/ĐL-CCHN</div>
              <div class="bs-card-pt"><span>✦</span>Chứng chỉ cấy ghép nha khoa BV RHM TW TPHCM</div>
              <div class="bs-card-pt"><span>✦</span>Chứng chỉ đào tạo liên tục chỉnh hình RHM BV RHM TW</div>
            </div>
            <a href="#dang-ky" class="bs-card-btn gold-outline">Đặt lịch với BS Thảo</a>
          </div>
        </div>
        <div class="bs-card" style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.12);">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2024/12/tran-thi-xuan-du-quote.jpeg" alt="BS.Trần Thị Xuân Dự"/>
          <div class="bs-card-body">
            <div class="bs-card-name">BS.Trần Thị Xuân Dự</div>
            <div class="bs-card-points">
              <div class="bs-card-pt"><span>✦</span>CCHN số: 008256/ĐL-CCHN</div>
              <div class="bs-card-pt"><span>✦</span>Chứng chỉ quy trình Implant kỹ thuật số ĐH Y Dược TPHCM</div>
              <div class="bs-card-pt"><span>✦</span>Chứng chỉ chỉnh nha và Implant ĐH Y Dược Cần Thơ</div>
            </div>
            <a href="#dang-ky" class="bs-card-btn gold-outline">Đặt lịch với BS Dự</a>
          </div>
        </div>
      </div>
    </div>
    <p style="text-align:center;margin-top:16px;font-size:12px;color:rgba(255,255,255,0.4);">← Vuốt để xem thêm →</p>
    <div style="text-align:center;margin-top:18px;">
      <a href="https://nhakhoadongnam.com/doi-ngu-bac-si/" target="_blank" style="display:inline-flex;align-items:center;gap:8px;border:1.5px solid rgba(201,168,76,0.6);color:var(--gold);font-size:13px;font-weight:700;padding:11px 24px;border-radius:var(--radius);text-decoration:none;transition:all .2s;" onmouseover="this.style.background='rgba(201,168,76,0.12)'" onmouseout="this.style.background='transparent'">Xem đầy đủ hồ sơ đội ngũ →</a>
    </div>
  </div>
</section>

<!-- ══ [10] CAM KẾT ĐỒNG HÀNH ══ -->
<section class="lp-bgiv3-section" id="commitment" style="background:var(--off-white);position:relative;overflow:hidden;">
  <div style="position:absolute;inset:0;background:url('https://nhakhoadongnam.com/wp-content/uploads/2025/10/BANNER-5-BS-01-scaled.jpg') center center/cover no-repeat;opacity:0.07;pointer-events:none;z-index:0;"></div>
  <div class="ndn-container" style="position:relative;z-index:1;">
    <div class="lp-label">CAM KẾT ĐỒNG HÀNH</div>
    <h2 class="ndn-title">"Đồng Hành Trọn Đời" Nghĩa Là Gì?</h2>
    <p class="lp-section-sub">Không phải "bảo hành" mà là đội ngũ Đông Nam đồng hành cùng bạn suốt hành trình</p>
    <div class="commitment-grid">
      <div class="commitment-card"><div style="display:flex;align-items:center;gap:12px;margin-bottom:10px;"><div style="font-size:28px;">🔄</div><div class="commitment-title" style="margin:0;">Cấy lại miễn phí</div></div><div class="commitment-text">Trụ không tích hợp xương → Đông Nam cấy lại hoàn toàn <strong>MIỄN PHÍ</strong> hoặc có thể nâng cấp loại trụ tốt hơn.</div></div>
      <div class="commitment-card" style="border-top-color:#E53935;background:#FFF5F5;"><div style="display:flex;align-items:center;gap:12px;margin-bottom:10px;"><div style="font-size:28px;">💰</div><div class="commitment-title" style="margin:0;color:#C0392B;">Hoàn tiền 100%</div></div><div class="commitment-text"><strong style="color:#C0392B;">MỚI:</strong> Nếu không thể cấy lại hoặc phục hình răng — Đông Nam hoàn tiền 100% toàn bộ chi phí đã thanh toán. Cam kết bằng văn bản.</div></div>
      <div class="commitment-card"><div style="display:flex;align-items:center;gap:12px;margin-bottom:10px;"><div style="font-size:28px;">🏥</div><div class="commitment-title" style="margin:0;">21 năm vẫn ở đây</div></div><div class="commitment-text">Hơn 21 năm hoạt động — 2 cơ sở ổn định tại TP.HCM. Khi bạn cần đến năm 5, năm 10, chúng tôi vẫn ở đây.</div></div>
    </div>
  </div>
</section>

<!-- ══ [11] TẠI SAO CHỌN ĐÔNG NAM ══ -->
<section class="trust-section" id="trust">
  <div class="ndn-container">
    <div class="lp-label" style="background:rgba(255,255,255,0.15);color:var(--gold);">TẠI SAO CHỌN ĐÔNG NAM</div>
    <h2 class="ndn-title" style="margin-bottom:10px;font-style:italic;font-weight:400;font-size:clamp(17px,3vw,26px);color:var(--white);">"Chọn nơi đủ lâu để tin — Đủ giỏi để làm — Đủ trách nhiệm để theo bạn lâu dài"</h2>
    <p style="color:rgba(255,255,255,0.55);font-size:13px;margin-bottom:32px;"></p>
    <div class="trust-grid">
      <div class="trust-card">
        <div class="yt-embed review-thumb" data-vid="BbhrSFq6jUk" onclick="playVideo(this)" style="cursor:pointer;">
          <img src="https://i.ytimg.com/vi/BbhrSFq6jUk/hqdefault.jpg" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;" loading="lazy" alt="21 năm kinh nghiệm"/>
          <iframe src="" allowfullscreen allow="autoplay" style="position:absolute;inset:0;width:100%;height:100%;border:none;display:none;"></iframe>
          <div class="play-btn">▶</div>
        </div>
        <div class="trust-card-inner"><div class="trust-card-title">21+ Năm Kinh Nghiệm</div><div class="trust-card-text">Từ 2005 đến nay · Một trong những nha khoa lâu đời nhất TP.HCM</div></div>
      </div>
      <div class="trust-card">
        <div style="position:relative;width:100%;padding-top:56.25%;background:#000;flex-shrink:0;">
          <img src="https://nhakhoadongnam.com/wp-content/uploads/2026/05/bac-si-dung-chuyen-gia-ve-cay-ghep-implant.jpg" alt="Đội ngũ chuyên gia Implant Nha Khoa Đông Nam" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center top;" loading="lazy"/>
        </div>
        <div class="trust-card-inner"><div class="trust-card-title">Đội Ngũ Chuyên Gia</div><div class="trust-card-text">Chuyên sâu Implant · Kinh nghiệm lâm sàng dày dạn · Xử lý nhiều ca khó phức tạp</div></div>
      </div>
      <div class="trust-card">
        <div class="yt-embed review-thumb" data-vid="v_4TTLeXMEU" onclick="playVideo(this)" style="cursor:pointer;">
          <img src="https://i.ytimg.com/vi/v_4TTLeXMEU/hqdefault.jpg" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;" loading="lazy" alt="Cam kết đồng hành"/>
          <iframe src="" allowfullscreen allow="autoplay" style="position:absolute;inset:0;width:100%;height:100%;border:none;display:none;"></iframe>
          <div class="play-btn">▶</div>
        </div>
        <div class="trust-card-inner"><div class="trust-card-title">Đồng Hành Trọn Đời</div><div class="trust-card-text">Không chỉ điều trị — chúng tôi đồng hành suốt hành trình chăm sóc răng miệng của bạn</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ══ [12] THANH TOÁN ══ -->
<section class="lp-bgiv3-section" id="thanh-toan" style="background:var(--white);">
  <div class="ndn-container">
    <div class="lp-label">THANH TOÁN LINH HOẠT</div>
    <h2 class="ndn-title">Chia 2 Đợt — Không Áp Lực Tài Chính</h2>
    <div style="display:flex;flex-wrap:wrap;gap:10px;justify-content:center;">
      <div style="display:flex;align-items:center;gap:8px;background:var(--off-white);border:1.5px solid var(--navy-light);border-radius:8px;padding:10px 16px;font-size:13.5px;font-weight:600;color:var(--navy);"><span>🔒</span> Giá trọn gói — không phát sinh</div>
      <div style="display:flex;align-items:center;gap:8px;background:var(--off-white);border:1.5px solid var(--navy-light);border-radius:8px;padding:10px 16px;font-size:13.5px;font-weight:600;color:var(--navy);"><span>📋</span> Báo giá bằng văn bản trước khi làm</div>
      <div style="display:flex;align-items:center;gap:8px;background:var(--off-white);border:1.5px solid var(--navy-light);border-radius:8px;padding:10px 16px;font-size:13.5px;font-weight:600;color:var(--navy);"><span>💳</span> Đợt 1: 70% khi đặt trụ · Đợt 2: 30% khi gắn răng sứ</div>
    </div>
  </div>
</section>

<!-- ══ [13] BÁO CHÍ ══ -->
<section class="lp-bgiv3-section" id="media" style="background:var(--white);">
  <div class="ndn-container">
    <div class="lp-label">BÁO CHÍ NÓI VỀ CHÚNG TÔI</div>
    <h2 class="ndn-title">Báo Chí Đưa Tin Về Nha Khoa Đông Nam</h2>
    <p class="lp-section-sub">Được các báo điện tử lớn nhất Việt Nam liên tục đăng tải từ 2015 đến nay</p>
    <div class="media-grid">
      <a class="media-card" href="https://vnexpress.net/cam-ghep-implant-khong-dau-trong-10-phut-3643757.html" target="_blank" rel="noopener"><div class="media-source-bar"><img class="lp-media-logo-img" src="https://nhakhoadongnam.com/wp-content/uploads/2026/05/vnexpress-scaled.png" alt="VnExpress" loading="lazy"/><span class="media-date">2017</span></div><div class="media-body"><div class="media-headline">Cấy ghép Implant không đau trong 10 phút</div><div class="media-desc">Công nghệ hiện đại giúp rút ngắn thời gian, giảm thiểu tối đa đau đớn.</div><div class="media-link-label">Đọc bài viết →</div></div></a>
      <a class="media-card" href="https://vnexpress.net/tieu-xuong-van-co-the-cay-ghep-implant-etk-active-3701382.html" target="_blank" rel="noopener"><div class="media-source-bar"><img class="lp-media-logo-img" src="https://nhakhoadongnam.com/wp-content/uploads/2026/05/vnexpress-scaled.png" alt="VnExpress" loading="lazy"/><span class="media-date">2017</span></div><div class="media-body"><div class="media-headline">Tiêu xương vẫn có thể cấy ghép Implant ETK Active</div><div class="media-desc">Tiêu xương không còn là rào cản — giải pháp cho bệnh nhân mất răng lâu năm.</div><div class="media-link-label">Đọc bài viết →</div></div></a>
      <a class="media-card" href="https://tuoitre.vn/5-ly-do-nen-trong-rang-tai-nha-khoa-dong-nam-20200108091802505.htm" target="_blank" rel="noopener"><div class="media-source-bar"><img class="lp-media-logo-img" src="https://nhakhoadongnam.com/wp-content/uploads/2026/05/Logo-tuoi-tre-online.png" alt="Tuổi Trẻ" loading="lazy"/><span class="media-date">2020</span></div><div class="media-body"><div class="media-headline">5 lý do nên trồng răng tại Nha Khoa Đông Nam</div><div class="media-desc">Phân tích điểm vượt trội khiến Đông Nam là lựa chọn tin cậy.</div><div class="media-link-label">Đọc bài viết →</div></div></a>
      <a class="media-card" href="https://tuoitre.vn/nha-khoa-cay-ghep-implant-cho-nguoi-bi-mat-rang-lau-nam-20180414161607561.htm" target="_blank" rel="noopener"><div class="media-source-bar"><img class="lp-media-logo-img" src="https://nhakhoadongnam.com/wp-content/uploads/2026/05/Logo-tuoi-tre-online.png" alt="Tuổi Trẻ" loading="lazy"/><span class="media-date">2018</span></div><div class="media-body"><div class="media-headline">Nha khoa cấy ghép Implant cho người bị mất răng lâu năm</div><div class="media-desc">Phục hồi răng toàn diện cho trường hợp mất răng lâu năm kèm tiêu xương.</div><div class="media-link-label">Đọc bài viết →</div></div></a>
      <a class="media-card" href="https://thanhnien.vn/dieu-tri-benh-ly-rang-mieng-nha-khoa-uy-tin-chia-khoa-nu-cuoi-hoan-hao-185250514121518541.htm" target="_blank" rel="noopener"><div class="media-source-bar"><img class="lp-media-logo-img" src="https://nhakhoadongnam.com/wp-content/uploads/2026/05/thanhnien.webp" alt="Thanh Niên" loading="lazy"/><span class="media-date">2025</span></div><div class="media-body"><div class="media-headline">Nha khoa uy tín — chìa khóa nụ cười hoàn hảo</div><div class="media-desc">Điều trị tại nha khoa uy tín là nền tảng để sở hữu nụ cười tự tin.</div><div class="media-link-label">Đọc bài viết →</div></div></a>
      <a class="media-card" href="https://suckhoe.vtv.vn/khong-phai-cong-nghe-day-moi-la-ly-do-implant-co-the-ton-tai-hang-chuc-nam-102251120153533042.htm" target="_blank" rel="noopener"><div class="media-source-bar"><img class="lp-media-logo-img" src="https://nhakhoadongnam.com/wp-content/uploads/2026/05/logo-vtv-png.png" alt="VTV Sức Khoẻ" loading="lazy"/><span class="media-date">2025</span></div><div class="media-body"><div class="media-headline">Không phải công nghệ — đây mới là lý do Implant tồn tại hàng chục năm</div><div class="media-desc">VTV Sức Khoẻ phân tích yếu tố then chốt quyết định tuổi thọ Implant.</div><div class="media-link-label">Đọc bài viết →</div></div></a>
    </div>
  </div>
</section>

<!-- ══ [14] FORM ĐĂNG KÝ CHÍNH ══ -->
<section class="cta-section" id="dang-ky">
  <div class="ndn-container">
    <h2>Nhận Báo Giá Implant Chính Xác — Miễn Phí, Không Phát Sinh</h2>
    <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:12px;margin-bottom:24px;">
      <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(201,168,76,0.15);border:1.5px solid rgba(201,168,76,0.5);border-radius:30px;padding:8px 18px;">
        <span style="font-size:18px;">🦷</span>
        <span style="color:var(--gold);font-weight:700;font-size:14px;">Khám + Chụp phim CT 3D <strong>Miễn Phí</strong></span>
      </div>
      <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(201,168,76,0.15);border:1.5px solid rgba(201,168,76,0.5);border-radius:30px;padding:8px 18px;">
        <span style="font-size:18px;">💰</span>
        <span style="color:var(--gold);font-weight:700;font-size:14px;">Ưu đãi <strong>20%</strong> — chỉ còn vài suất</span>
      </div>
    </div>

    <div class="cta-form-box">
      <h3>Đăng Ký Nhận Ưu Đãi Ngay Hôm Nay</h3>
      <p>Để lại thông tin — chuyên viên chúng tôi sẽ liên hệ lại trong vòng 30 phút</p>
      <div class="lp-bgiv3-cf7-shortcode">
        <?php echo do_shortcode('[contact-form-7 id="e3e8349" title="CT- T52026 - name-at - phone"]'); ?>
      </div>
      <p style="font-size:12px;color:var(--text-sub);text-align:center;margin-top:12px;font-style:italic;line-height:1.6;">(Cam kết bảo mật thông tin. Nha khoa sẽ liên hệ qua Zalo/Gọi điện tư vấn, không làm phiền nếu quý khách chưa có nhu cầu.)</p>
    </div>

    <div class="countdown-wrap" style="max-width:500px;margin:0 auto 28px;">
      <div class="cd-label">⏰ Ưu đãi có thời hạn</div>
      <div class="cd-title">Ưu đãi <span>20%</span> khi đặt lịch Online — Chỉ <span>30 khách hàng</span> đầu tiên trước <span>31/05/2026</span></div>
      <div class="cd-boxes">
        <div class="cd-unit"><div class="cd-box" id="f-days">00</div><div class="cd-sub">ngày</div></div>
        <div class="cd-sep">:</div>
        <div class="cd-unit"><div class="cd-box" id="f-hours">00</div><div class="cd-sub">giờ</div></div>
        <div class="cd-sep">:</div>
        <div class="cd-unit"><div class="cd-box" id="f-mins">00</div><div class="cd-sub">phút</div></div>
        <div class="cd-sep">:</div>
        <div class="cd-unit"><div class="cd-box" id="f-secs">00</div><div class="cd-sub">giây</div></div>
      </div>
      <div id="f-ended" class="cd-ended" style="display:none;">Chương trình đã kết thúc</div>
    </div>

    <div class="hotline-display">
      <span class="number">📞 0972.411.411 &nbsp;|&nbsp; ☎ 1900.7141</span>
      <span class="hours">Thứ 2–7: 8h00–19h00 &nbsp;·&nbsp; Chủ nhật: 8h00–16h00</span>
      <div style="margin-top:10px;font-size:13px;color:rgba(255,255,255,0.55);">CS1: 411 Nguyễn Kiệm, P. Đức Nhuận, TP.HCM &nbsp;|&nbsp; CS2: 614 Lê Hồng Phong, P. Vườn Lài, TP.HCM</div>
    </div>
  </div>
</section>

<!-- FOOTER PHÁP LÝ -->
<footer style="background:var(--navy-dark);padding:24px 20px;text-align:center;border-top:3px solid var(--gold);">
  <div style="max-width:700px;margin:0 auto;">
    <p style="color:rgba(255,255,255,0.75);font-size:13px;line-height:1.8;margin-bottom:6px;"><strong style="color:var(--white);">Công Ty TNHH Nha Khoa Đông Nam</strong><br>Giấy phép Kinh doanh số <strong style="color:var(--gold);">0304132304</strong> do Sở KH &amp; ĐT TP.HCM cấp ngày: 06/12/2005</p>
    <p style="color:rgba(255,255,255,0.6);font-size:12.5px;line-height:1.7;">Giấy phép hoạt động số <strong style="color:rgba(255,255,255,0.85);">03708/SYT-GPHĐ</strong> và <strong style="color:rgba(255,255,255,0.85);">01672/HCM-GPHĐ</strong></p>
  </div>
</footer>

</div><!-- /.ndn-lp -->

<?php get_footer(); ?>
