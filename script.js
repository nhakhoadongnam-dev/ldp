  // === COUNTDOWN TO 01/05/2026 ===
  (function() {
    const deadline = new Date('2026-05-01T00:00:00+07:00').getTime();
    const daysEl = document.getElementById('cd-days');
    const hoursEl = document.getElementById('cd-hours');
    const minsEl = document.getElementById('cd-mins');
    const secsEl = document.getElementById('cd-secs');

    function update() {
      const now = Date.now();
      const diff = deadline - now;
      if (diff <= 0) {
        daysEl.textContent = '00';
        hoursEl.textContent = '00';
        minsEl.textContent = '00';
        secsEl.textContent = '00';
        document.getElementById('topbar').querySelector('.topbar-text').textContent = 'Chương trình đã kết thúc';
        return;
      }
      const d = Math.floor(diff / 86400000);
      const h = Math.floor((diff % 86400000) / 3600000);
      const m = Math.floor((diff % 3600000) / 60000);
      const s = Math.floor((diff % 60000) / 1000);
      daysEl.textContent = String(d).padStart(2, '0');
      hoursEl.textContent = String(h).padStart(2, '0');
      minsEl.textContent = String(m).padStart(2, '0');
      secsEl.textContent = String(s).padStart(2, '0');
    }
    update();
    setInterval(update, 1000);
  })();

  // === SCROLL REVEAL ===
  document.addEventListener("DOMContentLoaded", function() {
    const reveals = document.querySelectorAll(".reveal, .reveal-left, .reveal-right");
    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("active");
          observer.unobserve(entry.target);
        }
      });
    }, { rootMargin: "0px 0px -50px 0px" });
    reveals.forEach(el => observer.observe(el));

    // === CAROUSEL SCROLL ===
    const track = document.getElementById('carouselTrack');
    const prevBtn = document.querySelector('.carousel-btn.prev');
    const nextBtn = document.querySelector('.carousel-btn.next');

    if (track && prevBtn && nextBtn) {
      prevBtn.addEventListener('click', () => {
        const slideWidth = track.querySelector('.carousel-slide').offsetWidth + 24; // 24px is gap
        track.scrollBy({ left: -slideWidth, behavior: 'smooth' });
      });

      nextBtn.addEventListener('click', () => {
        const slideWidth = track.querySelector('.carousel-slide').offsetWidth + 24;
        track.scrollBy({ left: slideWidth, behavior: 'smooth' });
      });
    }

    // === ACCORDION FAQ ===
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
      const question = item.querySelector('.faq-question');
      question.addEventListener('click', () => {
        const isActive = item.classList.contains('active');
        faqItems.forEach(i => {
          i.classList.remove('active');
          i.querySelector('.faq-question').setAttribute('aria-expanded', 'false');
        });
        if (!isActive) {
          item.classList.add('active');
          question.setAttribute('aria-expanded', 'true');
        }
      });
    });

  });
