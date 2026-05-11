// ── QUIZ 2 (section riêng) ──
(function(){
  var cur=1, total=5;
  var steps=document.querySelectorAll('.qz-s');
  var nBtn=document.getElementById('qz-next2');
  var pBtn=document.getElementById('qz-prev2');
  var dots=document.querySelectorAll('#qz-dots2 div');
  // CẬP NHẬT giá sau ưu đãi 20%
  var prices={korea:13200000,italy:15920000,france:22560000,bone:8000000,membrane:2000000,sinus:10000000};

  function fmt(v){return v.toLocaleString('vi-VN')+' ₫';}

  document.querySelectorAll('.qz-opt').forEach(function(opt){
    opt.addEventListener('click',function(){
      var step=this.closest('.qz-s');
      step.querySelectorAll('.qz-opt').forEach(function(o){o.classList.remove('qz-on');});
      this.classList.add('qz-on');
      var rb=this.querySelector('input');
      if(rb){rb.checked=true;}
      nBtn.disabled=false; nBtn.style.opacity='1';
    });
  });

  function ui(){
    document.getElementById('qz-bar').style.width=((cur/total)*100)+'%';
    pBtn.style.display=cur===1?'none':'block';
    dots.forEach(function(d,i){d.style.background=i<cur?'var(--navy)':'var(--gray-mid)';});
  }

  function chk(){
    var s=steps[cur-1];
    var rbs=s.querySelectorAll('input[type="radio"]');
    if(!rbs.length){nBtn.disabled=false;nBtn.style.opacity='1';return;}
    var ok=Array.from(rbs).some(function(r){return r.checked;});
    nBtn.disabled=!ok; nBtn.style.opacity=ok?'1':'0.3';
  }

  window.qzAdj2=function(v){
    var i=document.getElementById('qz-qty2');
    var d=document.getElementById('qz-qty2-display');
    var n=parseInt(i.value)+v;
    if(n>=1&&n<=14){i.value=n;if(d)d.textContent=n;}
  };

  window.qzNext2=function(){
    if(cur<total){
      steps[cur-1].style.display='none';
      cur++;
      steps[cur-1].style.display='block';
      if(cur===5){
        document.getElementById('qz-qty-view').style.display='block';
        nBtn.disabled=false; nBtn.style.opacity='1';
        nBtn.textContent='XEM KẾT QUẢ';
      } else {
        nBtn.textContent='TIẾP THEO';
        nBtn.disabled=true; nBtn.style.opacity='0.3';
        chk();
      }
      ui();
    } else {
      qzFinish2();
    }
  };

  window.qzPrev2=function(){
    steps[cur-1].style.display='none';
    cur--;
    steps[cur-1].style.display='block';
    nBtn.textContent=cur===5?'XEM KẾT QUẢ':'TIẾP THEO';
    nBtn.disabled=false; nBtn.style.opacity='1';
    ui();
  };

  function qzFinish2(){
    document.getElementById('qz-form').style.display='none';
    document.getElementById('qz-nav2').style.display='none';
    document.getElementById('qz-bar').parentElement.style.display='none';
    document.getElementById('qz-result2').style.display='block';

    var pos=(document.querySelector('input[name="position"]:checked')||{}).value||'';
    var prio=(document.querySelector('input[name="priority"]:checked')||{}).value||'quality';
    var time=parseInt((document.querySelector('input[name="time"]:checked')||{}).value||0);
    var cause=parseInt((document.querySelector('input[name="cause"]:checked')||{}).value||0);
    var posVal=parseInt((document.querySelector('input[name="position"]:checked')||{}).value||0);
    var score=time+cause+posVal;
    var qty=parseInt(document.getElementById('qz-qty2').value)||1;
    var subTru=0, subPhuThu=0, items=[];

    // Giá đã là sau ưu đãi 20%
    var u=prio==='cost'?prices.korea:(prio==='fast'?prices.france:prices.italy);
    var n=prio==='cost'?'<span class="lp-flag lp-flag-kr" aria-label="Han Quoc" role="img"><svg viewBox="0 0 36 24" aria-hidden="true"><rect width="36" height="24" fill="#fff"/><circle cx="18" cy="12" r="5.2" fill="#c60c30"/><path d="M18 6.8a5.2 5.2 0 0 1 0 10.4a5.2 5.2 0 0 0 0-10.4z" fill="#003478"/><path d="M7 5l5 2M8 3l5 2M6 7l5 2M24 17l5 2M25 15l5 2M23 19l5 2M25 5l5-2M24 7l5-2M23 9l5-2M7 19l5-2M8 21l5-2M6 17l5-2" stroke="#111" stroke-width="1.1"/></svg></span> Implant Hàn Quốc':(prio==='fast'?'<span class="lp-flag lp-flag-fr" aria-label="Phap" role="img"><svg viewBox="0 0 36 24" aria-hidden="true"><rect width="12" height="24" fill="#002395"/><rect x="12" width="12" height="24" fill="#fff"/><rect x="24" width="12" height="24" fill="#ed2939"/></svg></span> Implant Pháp ETK':'<span class="lp-flag lp-flag-it" aria-label="Y" role="img"><svg viewBox="0 0 36 24" aria-hidden="true"><rect width="12" height="24" fill="#009246"/><rect x="12" width="12" height="24" fill="#fff"/><rect x="24" width="12" height="24" fill="#ce2b37"/></svg></span> Implant Ý C-Tech');
      subTru+=u*qty; items.push({l:n+' × '+qty+' trụ',p:u*qty,tag:'(đã giảm 20%)'});

    var risk='';
    if(score<=6){risk='Dự báo: <strong style="color:var(--green);">THẤP</strong> — Xương ổ răng ổn định, thuận lợi cấy ghép trực tiếp.';}
    else if(score<=11){
      risk='Dự báo: <strong style="color:var(--gold);">TRUNG BÌNH</strong> — Có tiêu xương nhẹ, cần ghép thêm xương bột và màng xương.';
      // Giá gốc, không giảm
      subPhuThu+=prices.bone+prices.membrane;
      items.push({l:'Ghép xương &amp; màng nhân tạo',p:prices.bone+prices.membrane,tag:''});
    } else {
      risk='Dự báo: <strong style="color:var(--red);">CAO</strong> — Tiêu xương đáng kể, cần xử lý ghép xương chuyên sâu.';
      subPhuThu+=prices.bone+prices.membrane;
      items.push({l:'Ghép xương &amp; màng nhân tạo',p:prices.bone+prices.membrane,tag:''});
      if(pos==='4'){subPhuThu+=prices.sinus; items.push({l:'Nâng xoang hàm dự báo',p:prices.sinus,tag:''});}
    }

    var sub = subTru + subPhuThu;
    var riskText = score<=6 ? 'THẤP' : (score<=11 ? 'TRUNG BÌNH' : 'CAO');
    var gói = items.map(function(i){return i.l;}).join(' + ');

    document.getElementById('qz-risk2').innerHTML=risk;
    document.getElementById('qz-items2').innerHTML=items.map(function(i){
      return '<div style="display:flex;justify-content:space-between;align-items:flex-start;gap:8px;">'
        +'<span style="color:var(--text-sub);flex:1;line-height:1.5;">'+i.l
        +(i.tag?'<span style="font-size:10px;color:#888;margin-left:4px;">'+i.tag+'</span>':'')
        +'</span>'
        +'<span style="font-weight:800;color:var(--navy);white-space:nowrap;">'+fmt(i.p)+'</span>'
        +'</div>';
    }).join('');

    // Dòng ghi chú ưu đãi
    var noteHtml = '<div style="font-size:11px;color:#E53935;margin-top:8px;font-style:italic;">✓ Giá trụ đã bao gồm ưu đãi 20%</div>';
    document.getElementById('qz-items2').innerHTML += noteHtml;

    // Tổng gốc (trước giảm): cộng ngược lại giá gốc trụ
    // prices.korea=13.2tr là đã sau 20% → gốc = /0.8; tương tự các loại khác
    var uOrig = prio==='cost'?(prices.korea/0.8):(prio==='fast'?(prices.france/0.8):(prices.italy/0.8));
    var truOriginal = Math.round(uOrig) * qty;
    var totalGoc = truOriginal + subPhuThu;
    var tietKiem = truOriginal - subTru; // chỉ giảm phần trụ
    var conLai = sub; // subTru (sau 20%) + subPhuThu (giá gốc)

    document.getElementById('qz-total2').textContent = fmt(totalGoc);
    document.getElementById('qz-disc2').textContent = tietKiem > 0 ? '− ' + fmt(tietKiem) : '—';
    document.getElementById('qz-final2').textContent = fmt(conLai);

    var thoiGianMap={'1':'Dưới 6 tháng','3':'6 tháng – 2 năm','6':'Trên 2 năm'};
    var nguyenNhanMap={'1':'Sâu răng / Chấn thương','5':'Viêm nha chu / Lung lay','3':'Mất răng bẩm sinh'};
    var viTriMap={'3':'Răng cửa','4':'Răng hàm trên','1':'Răng hàm dưới','5':'Toàn hàm'};
    var uuTienMap={'cost':'Tối ưu chi phí','quality':'Thẩm mỹ & Bền bỉ','fast':'Cần lên răng nhanh'};

    var thoiGianEl=document.querySelector('input[name="time"]:checked');
    var nguyenNhanEl=document.querySelector('input[name="cause"]:checked');
    var viTriEl=document.querySelector('input[name="position"]:checked');
    var uuTienEl=document.querySelector('input[name="priority"]:checked');

    var payload={
      timestamp: new Date().toLocaleString('vi-VN'),
      thoiGianMatRang: thoiGianEl ? (thoiGianMap[thoiGianEl.value]||thoiGianEl.value) : '',
      nguyenNhan: nguyenNhanEl ? (nguyenNhanMap[nguyenNhanEl.value]||nguyenNhanEl.value) : '',
      viTri: viTriEl ? (viTriMap[viTriEl.value]||viTriEl.value) : '',
      uuTien: uuTienEl ? (uuTienMap[uuTienEl.value]||uuTienEl.value) : '',
      soLuongRang: pos==='5' ? 'Toàn hàm' : qty+' răng',
      goiDeXuat: gói,
      duBaoXuong: riskText,
      tongChiPhi: sub,
      chiPhiSauUuDai: sub,
      nguon: window.location.href
    };

    fetch('https://script.google.com/macros/s/AKfycbyReLmnszCIua_pQWkkmspb-sdqoQIa6yB0dEBPpy5iwz0nWH6E5zDDXiiwzE8RWBJe/exec', {
      method: 'POST',
      mode: 'no-cors',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify(payload)
    }).catch(function(e){ console.warn('Quiz GSheet error:', e); });
  }

  window.qzReset2=function(){
    cur=1;
    steps.forEach(function(s,i){s.style.display=i===0?'block':'none';});
    document.getElementById('qz-form').style.display='block';
    document.getElementById('qz-nav2').style.display='flex';
    document.getElementById('qz-bar').parentElement.style.display='block';
    document.getElementById('qz-result2').style.display='none';
    nBtn.textContent='TIẾP THEO'; nBtn.disabled=true; nBtn.style.opacity='0.3';
    document.querySelectorAll('.qz-opt').forEach(function(o){o.classList.remove('qz-on');});
    document.querySelectorAll('.qz-opt input').forEach(function(r){r.checked=false;});
    document.getElementById('qz-qty2').value=1;
    var d2=document.getElementById('qz-qty2-display');if(d2)d2.textContent=1;
    ui();
  };

  ui();
})();

// COUNTDOWN
var deadline=new Date('2026-05-31T23:59:59').getTime();
function pad(n){return n<10?'0'+n:''+n;}
function updateCountdown(){
  var diff=deadline-Date.now();
  [['h-days','h-hours','h-mins','h-secs','h-ended'],['f-days','f-hours','f-mins','f-secs','f-ended']].forEach(function(ids){
    var bd=document.getElementById(ids[0]),bh=document.getElementById(ids[1]),
        bm=document.getElementById(ids[2]),bs=document.getElementById(ids[3]),be=document.getElementById(ids[4]);
    if(!bd)return;
    if(diff<=0){[bd,bh,bm,bs].forEach(function(el){el.textContent='00';});be.style.display='block';}
    else{bd.textContent=pad(Math.floor(diff/86400000));bh.textContent=pad(Math.floor((diff%86400000)/3600000));
    bm.textContent=pad(Math.floor((diff%3600000)/60000));bs.textContent=pad(Math.floor((diff%60000)/1000));be.style.display='none';}
  });
}
updateCountdown();setInterval(updateCountdown,1000);

// ACCORDION
(function(){
  var btn=document.getElementById('accBtn'),body=document.getElementById('accBody');
  if(!btn||!body)return;
  body.style.display='none';
  btn.addEventListener('click',function(){
    var open=btn.classList.contains('is-open');
    if(!open){body.style.display='block';body.style.overflow='hidden';body.style.maxHeight='0px';body.style.transition='max-height 0.38s ease';
      requestAnimationFrame(function(){requestAnimationFrame(function(){body.style.maxHeight=body.scrollHeight+'px';});});
      setTimeout(function(){body.style.maxHeight='none';body.style.overflow='';},400);btn.classList.add('is-open');}
    else{body.style.maxHeight=body.scrollHeight+'px';body.style.overflow='hidden';body.style.transition='max-height 0.35s ease';
      requestAnimationFrame(function(){requestAnimationFrame(function(){body.style.maxHeight='0px';});});
      setTimeout(function(){body.style.display='none';body.style.maxHeight='';body.style.overflow='';},370);btn.classList.remove('is-open');}
  });
})();

// VIDEO CONTROL - Stop other videos when playing a new one
(function(){
  // Track currently playing video
  var currentPlaying = null;
  
  window.playVideo = function(thumb){
    var vid = thumb.getAttribute('data-vid');
    var iframe = thumb.querySelector('iframe');
    
    // If clicking the same playing video, let YouTube handle it natively
    if(thumb.classList.contains('playing') && currentPlaying === vid){
      return; // Let YouTube's native controls handle play/pause
    }
    
    // Stop all other playing videos completely
    document.querySelectorAll('.review-thumb.playing').forEach(function(t){
      if(t === thumb) return;
      var f = t.querySelector('iframe');
      if(f) {
        f.src = 'about:blank'; // Force stop
        f.style.display = 'none';
      }
      t.classList.remove('playing');
    });
    
    // Clear current playing tracker
    if(currentPlaying && currentPlaying !== vid){
      currentPlaying = null;
    }
    
    // Play the clicked video
    iframe.src = 'https://www.youtube.com/embed/' + vid + '?autoplay=1&rel=0&enablejsapi=1';
    iframe.style.display = 'block';
    thumb.classList.add('playing');
    currentPlaying = vid;
  };
  
  // Close video when clicking outside
  document.addEventListener('click', function(e){
    var clickedThumb = e.target.closest('.review-thumb');
    if(!clickedThumb){
      // Clicked outside any video - stop all
      document.querySelectorAll('.review-thumb.playing').forEach(function(t){
        var f = t.querySelector('iframe');
        if(f) {
          f.src = 'about:blank';
          f.style.display = 'none';
        }
        t.classList.remove('playing');
      });
      currentPlaying = null;
    }
  });
})();

// FORM SUBMIT
function submitForm(e){
  e.preventDefault();
  var name=document.getElementById('ndn-bgiv3-inp-name').value.trim();
  var phone=document.getElementById('ndn-bgiv3-inp-phone').value.trim().replace(/\s/g,'');
  if(!name){
    alert('Vui lòng nhập họ và tên.');
    document.getElementById('ndn-bgiv3-inp-name').focus();
    return;
  }
  var vnPhone=/^(0[3|5|7|8|9][0-9]{8}|0[1-9][0-9]{8}|\+84[3|5|7|8|9][0-9]{8})$/;
  if(!vnPhone.test(phone)){
    alert('Số điện thoại chưa đúng định dạng Việt Nam (10 số, bắt đầu bằng 0).\nVí dụ: 0972 411 411');
    document.getElementById('ndn-bgiv3-inp-phone').focus();
    return;
  }
  document.getElementById('ndn-bgiv3-form-fields').style.display='none';
  document.getElementById('ndn-bgiv3-form-success').style.display='block';
  document.getElementById('ndn-bgiv3-form-success').scrollIntoView({behavior:'smooth',block:'center'});
}

// DROPDOWN NHU CẦU
function toggleNhucau(){var dd=document.getElementById('ndn-bgiv3-nhucau-dropdown');dd.style.display=dd.style.display==='none'?'block':'none';}
document.querySelectorAll('.nhucau-option').forEach(function(opt){
  opt.addEventListener('click',function(){
    document.querySelectorAll('.nhucau-option').forEach(function(o){o.classList.remove('selected');});
    opt.classList.add('selected');
    var d=document.getElementById('ndn-bgiv3-nhucau-display');d.childNodes[0].textContent=opt.textContent.trim();d.style.color='var(--text)';
    document.getElementById('ndn-bgiv3-nhucau-dropdown').style.display='none';
  });
});
document.addEventListener('click',function(e){var w=document.getElementById('ndn-bgiv3-nhucau-wrap');if(w&&!w.contains(e.target))document.getElementById('ndn-bgiv3-nhucau-dropdown').style.display='none';});

// SMOOTH SCROLL
document.querySelectorAll('a[href^="#"]').forEach(function(a){
  a.addEventListener('click',function(e){var t=document.querySelector(a.getAttribute('href'));if(t){e.preventDefault();t.scrollIntoView({behavior:'smooth',block:'start'});}});
});
