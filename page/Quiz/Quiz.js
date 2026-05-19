const SCRIPT_URL = 'https://script.google.com/macros/s/AKfycbyN91a_bDX9reGu1IqbxfokiTdpG1YnKSUaR5rnXwQpDMzZO4kbQCl2UvCavfsQC93j/exec';

let userId = localStorage.getItem('implant_quiz_user_id');
if (!userId) {
  userId = 'USER-' + Math.random().toString(36).substr(2, 9).toUpperCase();
  localStorage.setItem('implant_quiz_user_id', userId);
}

let quizData = {
  tinhTrang: '', thoiGian: '', nguyenNhan: '', viTri: '', uuTien: '',
  isToanHam: false,
  giaiPhapToanHam: { name: '', price: 0 },
  soLuong: 1
};

let quizResults = { totalCost: 0, finalCost: 0, riskLevel: '', goiDeXuat: '' };
let stepHistory = ['step-1'];

function showStep(stepId, isBack = false) {
  document.querySelectorAll('.quiz-step').forEach(el => el.classList.remove('active'));
  document.getElementById(stepId).classList.add('active');
  if (!isBack && stepHistory[stepHistory.length - 1] !== stepId) {
    stepHistory.push(stepId);
  }
}

function goBack() {
  if (stepHistory.length > 1) {
    stepHistory.pop();
    showStep(stepHistory[stepHistory.length - 1], true);
  }
}

function selectQuiz(currentStep, field, value, price = 0) {
  quizData[field] = value;

  if (currentStep === 1) {
    if (value === 'Mất toàn hàm') {
      quizData.isToanHam = true;
      showStep('step-6A');
    } else {
      quizData.isToanHam = false;
      const optBoth = document.getElementById('opt-both-teeth');
      if (value === 'Mất nhiều răng') {
        optBoth.style.display = 'flex';
        quizData.soLuong = 2;
        document.getElementById('quiz-qty').value = 2;
      } else {
        optBoth.style.display = 'none';
        quizData.soLuong = 1;
        document.getElementById('quiz-qty').value = 1;
      }
      showStep('step-2');
    }
  } else if (currentStep === 2) showStep('step-3');
  else if (currentStep === 3) showStep('step-4');
  else if (currentStep === 4) showStep('step-5');
  else if (currentStep === 5) showStep('step-6B');
  else if (currentStep === '6A') {
    quizData.giaiPhapToanHam = { name: value, price };
    showStep('step-form');
  }
}

function changeQty(amount) {
  const min = quizData.tinhTrang === 'Mất nhiều răng' ? 2 : 1;
  const input = document.getElementById('quiz-qty');
  const val = parseInt(input.value) + amount;
  if (val >= min && val <= 14) {
    input.value = val;
    quizData.soLuong = val;
  }
}

function proceedToForm() { showStep('step-form'); }

function formatCurrency(number) {
  return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(number);
}

function submitQuiz() {
  const phone = document.getElementById('quiz-phone').value.trim();
  const msgBox = document.getElementById('quiz-msg');
  msgBox.className = 'msg-box';

  if (!/^0[0-9]{9}$/.test(phone)) {
    msgBox.classList.add('msg-error');
    msgBox.innerHTML = '⚠️ Vui lòng nhập đúng số điện thoại (10 số, bắt đầu bằng 0).';
    msgBox.style.display = 'block';
    return;
  }

  calculateAndRenderTable();
  showStep('step-result');

  if (SCRIPT_URL) {
    const payload = {
      userId,
      phone,
      tinhTrang: quizData.tinhTrang,
      thoiGianMatRang: quizData.thoiGian,
      nguyenNhan: quizData.nguyenNhan,
      viTri: quizData.viTri,
      uuTien: quizData.uuTien,
      soLuongRang: quizData.isToanHam ? 'Toàn hàm' : quizData.soLuong + ' răng',
      goiDeXuat: quizResults.goiDeXuat,
      duBaoXuong: quizResults.riskLevel,
      tongChiPhi: quizResults.totalCost,
      chiPhiSauUuDai: quizResults.finalCost,
      nguon: window.location.href
    };

    fetch(SCRIPT_URL, {
      method: 'POST',
      headers: { 'Content-Type': 'text/plain;charset=utf-8' },
      body: JSON.stringify(payload)
    })
      .then(() => console.log('✅ Đã đẩy dữ liệu thành công!'))
      .catch(err => console.error('Lỗi gửi dữ liệu:', err));
  }
}

function calculateAndRenderTable() {
  let html = '';
  let totalCost = 0;
  let score = 0;

  if (quizData.thoiGian === 'Dưới 6 tháng')      score += 1;
  else if (quizData.thoiGian === 'Từ 6 tháng - 2 năm') score += 3;
  else score += 6;

  if (quizData.nguyenNhan === 'Sâu răng / Chấn thương') score += 1;
  else if (quizData.nguyenNhan === 'Viêm nha chu / Lung lay') score += 6;
  else score += 3;

  if (quizData.viTri === 'Răng cửa')      score += 3;
  else if (quizData.viTri === 'Răng hàm trên') score += 5;
  else if (quizData.viTri === 'Răng hàm dưới') score += 1;
  else score += 5;

  if ((quizData.viTri === 'Răng hàm trên' || quizData.viTri === 'Cả răng cửa và răng hàm')
      && quizData.thoiGian !== 'Dưới 6 tháng') {
    score += 2;
  }

  let riskLevel = 'KHÔNG XÁC ĐỊNH';
  let riskClass = '';
  let riskMsg   = '';

  if (!quizData.isToanHam) {
    if (score <= 7) {
      riskLevel = 'THẤP'; riskClass = 'risk-low';
      riskMsg = 'Xương ổn định, thuận lợi cấy ghép trực tiếp.';
    } else if (score <= 13) {
      riskLevel = 'TRUNG BÌNH'; riskClass = 'risk-med';
      riskMsg = 'Có tiêu xương nhẹ, thường cần ghép thêm xương bột hỗ trợ.';
    } else {
      riskLevel = 'CAO'; riskClass = 'risk-high';
      riskMsg = 'Tiêu xương đáng kể, nguy cơ phải ghép xương hoặc nâng xoang.';
    }

    html += `<div style="background:var(--white);border-left:4px solid var(--navy);padding:15px;border-radius:0 10px 10px 0;margin-bottom:20px;text-align:left;">
      <div style="font-size:13px;font-weight:800;color:var(--brown);margin-bottom:5px;text-transform:uppercase;">Dự báo phân độ Cawood &amp; Howell:</div>
      <div>Khả năng tiêu xương: <span class="risk-badge ${riskClass}">${riskLevel}</span></div>
      <div style="font-size:14px;color:var(--text-sub);margin-top:5px;">${riskMsg}</div>
    </div>`;
  }

  quizResults.riskLevel = riskLevel;

  html += '<table class="result-table"><thead><tr><th>Hạng mục</th><th>Thành tiền</th></tr></thead><tbody>';

  if (quizData.isToanHam) {
    const { name, price } = quizData.giaiPhapToanHam;
    html += `<tr><td><strong>${name}</strong></td><td>${formatCurrency(price)}</td></tr>`;
    totalCost = price;
    quizResults.goiDeXuat = name;
  } else {
    const priceMap = {
      'Tối ưu chi phí':    16500000,
      'Thẩm mỹ & Bền bỉ': 19900000,
      'Cần lên răng nhanh': 28200000
    };
    const nameMap = {
      'Tối ưu chi phí':    'Implant Hàn Quốc',
      'Thẩm mỹ & Bền bỉ': 'Implant Ý (C-Tech)',
      'Cần lên răng nhanh': 'Implant Pháp (ETK)'
    };
    const truPrice = priceMap[quizData.uuTien] || 16500000;
    const truName  = nameMap[quizData.uuTien]  || 'Implant Hàn Quốc';
    const subTotal = truPrice * quizData.soLuong;
    const detail   = quizData.soLuong > 1
      ? `<br><small style="color:var(--text-sub);font-weight:400">${quizData.soLuong} trụ × ${formatCurrency(truPrice)}</small>`
      : '';

    html += `<tr><td><strong>${truName}</strong>${detail}</td><td>${formatCurrency(subTotal)}</td></tr>`;
    totalCost = subTotal;
    quizResults.goiDeXuat = `${truName} x ${quizData.soLuong}`;
  }

  html += `<tr><td><strong>Chụp phim CT 3D &amp; Xét nghiệm</strong></td><td><span class="free-badge">Miễn phí</span></td></tr>`;

  const discount = quizData.isToanHam ? 0 : totalCost * 0.2;
  const final    = totalCost - discount;
  quizResults.totalCost = totalCost;
  quizResults.finalCost = final;

  if (!quizData.isToanHam) {
    html += `<tr class="discount-row"><td>Ưu đãi đăng ký online (−20% trụ)</td><td>− ${formatCurrency(discount)}</td></tr>`;
  }

  html += `<tr class="total-row"><td style="font-weight:700">TỔNG DỰ TOÁN:</td><td class="final-total">${formatCurrency(final)}</td></tr></tbody></table>`;

  html += `<div style="margin-top:20px;padding:15px;border-radius:12px;background:#fff5f5;border:1px solid #feb2b2;text-align:left">
    <p style="color:var(--red);font-weight:800;font-size:14px;margin-bottom:8px">⚠️ LƯU Ý QUAN TRỌNG:</p>
    <ul style="font-size:13px;color:#c53030;padding-left:20px">
      <li>Bệnh tiểu đường và Hút thuốc lá có thể làm tăng cao nguy cơ tiêu xương.</li>
      <li>Kết quả này dựa trên tính toán sơ bộ. Bác sĩ cần đánh giá trên phim chụp CT 3D thực tế tại Nha Khoa Đông Nam để đưa ra kết luận chính xác nhất.</li>
    </ul>
  </div>`;

  document.getElementById('result-table-container').innerHTML = html;
}

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) target.scrollIntoView({ behavior: 'smooth' });
  });
});
