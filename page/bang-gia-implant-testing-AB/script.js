// ── QUIZ 2 (section riêng) ──
(function(){
  var cur=1, total=5;
  var steps=document.querySelectorAll('.lp-bgiab-qz-s');
  var nBtn=document.getElementById('qz-next2');
  var pBtn=document.getElementById('qz-prev2');
  var dots=document.querySelectorAll('#qz-dots2 div');
  var prices={korea:16500000,italy:19900000,france:28200000,bone:8000000,membrane:2000000,sinus:10000000};

  function fmt(v){return v.toLocaleString('vi-VN')+' ₫';}

  // Option click handler
  document.querySelectorAll('.lp-bgiab-qz-opt').forEach(function(opt){
    opt.addEventListener('click',function(){
      var step=this.closest('.lp-bgiab-qz-s');
      step.querySelectorAll('.lp-bgiab-qz-opt').forEach(function(o){o.classList.remove('qz-on');});
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
    var n=parseInt(i.value)+v;
    if(n>=1&&n<=14)i.value=n;
  };

  window.qzNext2=function(){
    if(cur<total){
      steps[cur-1].style.display='none';
      cur++;
      steps[cur-1].style.display='block';
      if(cur===5){
        var pos=document.querySelector('input[name="position"]:checked');
        if(pos&&pos.value==='5'){
          document.getElementById('qz-qty-view').style.display='none';
          document.getElementById('qz-arch-view').style.display='block';
          nBtn.disabled=true; nBtn.style.opacity='0.3';
        } else {
          document.getElementById('qz-qty-view').style.display='block';
          document.getElementById('qz-arch-view').style.display='none';
          nBtn.disabled=false; nBtn.style.opacity='1';
        }
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
    var sub=0, items=[];

    if(pos==='5'){
      var archEl=document.querySelector('input[name="arch"]:checked');
      if(archEl){sub+=parseInt(archEl.value);items.push({l:archEl.dataset.label,p:parseInt(archEl.value)});}
    } else {
      var u=prio==='cost'?prices.korea:(prio==='fast'?prices.france:prices.italy);
      var n=prio==='cost'?'🇰🇷 Implant Hàn Quốc':(prio==='fast'?'🇫🇷 Implant Pháp (ETK Active)':'🇮🇹 Implant Ý (C-Tech)');
      sub+=u*qty; items.push({l:n+' × '+qty+' trụ',p:u*qty});
    }

    var risk='';
    if(score<=6){risk='Dự báo: <strong style="color:var(--green);">THẤP</strong> — Xương ổ răng ổn định, thuận lợi cấy ghép trực tiếp.';}
    else if(score<=11){
      risk='Dự báo: <strong style="color:var(--gold);">TRUNG BÌNH</strong> — Có tiêu xương nhẹ, cần ghép thêm xương bột và màng xương.';
      sub+=prices.bone+prices.membrane; items.push({l:'Ghép xương &amp; màng nhân tạo',p:prices.bone+prices.membrane});
    } else {
      risk='Dự báo: <strong style="color:var(--red);">CAO</strong> — Tiêu xương đáng kể, cần xử lý ghép xương chuyên sâu.';
      sub+=prices.bone+prices.membrane; items.push({l:'Ghép xương &amp; màng nhân tạo',p:prices.bone+prices.membrane});
      if(pos==='4'){sub+=prices.sinus; items.push({l:'Nâng xoang hàm dự báo',p:prices.sinus});}
    }

    var disc=sub*0.1;
    document.getElementById('qz-risk2').innerHTML=risk;
    document.getElementById('qz-items2').innerHTML=items.map(function(i){
      return '<div style="display:flex;justify-content:space-between;align-items:flex-start;gap:8px;"><span style="color:var(--text-sub);flex:1;line-height:1.5;">'+i.l+'</span><span style="font-weight:800;color:var(--navy);white-space:nowrap;">'+fmt(i.p)+'</span></div>';
    }).join('');
    document.getElementById('qz-total2').textContent=fmt(sub);
    document.getElementById('qz-disc2').textContent='− '+fmt(disc);
    document.getElementById('qz-final2').textContent=fmt(sub-disc);
  }

  window.qzReset2=function(){
    cur=1;
    steps.forEach(function(s,i){s.style.display=i===0?'block':'none';});
    document.getElementById('qz-form').style.display='block';
    document.getElementById('qz-nav2').style.display='flex';
    document.getElementById('qz-bar').parentElement.style.display='block';
    document.getElementById('qz-result2').style.display='none';
    nBtn.textContent='TIẾP THEO'; nBtn.disabled=true; nBtn.style.opacity='0.3';
    document.querySelectorAll('.lp-bgiab-qz-opt').forEach(function(o){o.classList.remove('qz-on');});
    document.querySelectorAll('.lp-bgiab-qz-opt input').forEach(function(r){r.checked=false;});
    document.getElementById('qz-qty2').value=1;
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

// VIDEO
function playVideo(thumb){
  document.querySelectorAll('.lp-bgiab-review-thumb.playing').forEach(function(t){
    if(t===thumb)return;t.querySelector('iframe').src='';t.classList.remove('playing');
  });
  thumb.querySelector('iframe').src='https://www.youtube.com/embed/'+thumb.getAttribute('data-vid')+'?autoplay=1&rel=0';
  thumb.classList.add('playing');
}

// DROPDOWN NHU CẦU
function toggleNhucau(){var dd=document.getElementById('nhucauDropdown');dd.style.display=dd.style.display==='none'?'block':'none';}
document.querySelectorAll('.lp-bgiab-nhucau-option').forEach(function(opt){
  opt.addEventListener('click',function(){
    document.querySelectorAll('.lp-bgiab-nhucau-option').forEach(function(o){o.classList.remove('selected');});
    opt.classList.add('selected');
    var d=document.getElementById('nhucauDisplay');d.childNodes[0].textContent=opt.textContent.trim();d.style.color='var(--text)';
    document.getElementById('nhucauDropdown').style.display='none';
  });
});
document.addEventListener('click',function(e){var w=document.getElementById('nhucauWrap');if(w&&!w.contains(e.target))document.getElementById('nhucauDropdown').style.display='none';});

// SMOOTH SCROLL
document.querySelectorAll('a[href^="#"]').forEach(function(a){
  a.addEventListener('click',function(e){var t=document.querySelector(a.getAttribute('href'));if(t){e.preventDefault();t.scrollIntoView({behavior:'smooth',block:'start'});}});
});

// DATA ATTRIBUTE BINDINGS
document.querySelectorAll('[data-qz-adj]').forEach(function(btn){
  btn.addEventListener('click', function(){ qzAdj2(parseInt(btn.getAttribute('data-qz-adj'), 10)); });
});
var qzPrevBtn = document.querySelector('[data-qz-prev]');
if (qzPrevBtn) qzPrevBtn.addEventListener('click', qzPrev2);
var qzNextBtn = document.querySelector('[data-qz-next]');
if (qzNextBtn) qzNextBtn.addEventListener('click', qzNext2);
var qzResetBtn = document.querySelector('[data-qz-reset]');
if (qzResetBtn) qzResetBtn.addEventListener('click', qzReset2);
var nhuCauToggle = document.querySelector('[data-nhucau-toggle]');
if (nhuCauToggle) nhuCauToggle.addEventListener('click', toggleNhucau);
document.querySelectorAll('.lp-bgiab-review-thumb').forEach(function(thumb){
  thumb.addEventListener('click', function(){ playVideo(thumb); });
});
