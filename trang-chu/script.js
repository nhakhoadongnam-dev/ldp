/* ═══════════════════════════════════════════════════════════
   NHA KHOA DONG NAM — TRANG CHU (Homepage)
   Interactions: scroll reveal, result tabs, smooth scroll, float CTA
   ═══════════════════════════════════════════════════════════ */

// ── Scroll Reveal ──
const revealObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in');
        revealObserver.unobserve(entry.target);
      }
    });
  },
  { threshold: 0.15 }
);
document.querySelectorAll('.reveal').forEach((el) => revealObserver.observe(el));

// ── Result Slider (carousel, 3 visible, slide 1 at a time) ──
document.querySelectorAll('.result-slider').forEach((slider) => {
  const slidesContainer = slider.querySelector('.result-slides');
  const allSlides = slider.querySelectorAll('.result-slide');
  const dotsContainer = slider.querySelector('.slider-dots');
  const prevBtn = slider.querySelector('.slider-arrow.prev');
  const nextBtn = slider.querySelector('.slider-arrow.next');
  const totalSlides = allSlides.length;
  const visible = 3;
  let current = 0;
  const maxIndex = Math.max(0, totalSlides - visible);
  let autoplay;

  function goTo(index) {
    current = Math.max(0, Math.min(index, maxIndex));
    const slideEl = allSlides[0];
    const gap = 24;
    const slideWidth = slideEl.offsetWidth + gap;
    slidesContainer.style.transform = `translateX(-${current * slideWidth}px)`;

    // Update dots
    const dotCount = maxIndex + 1;
    dotsContainer.querySelectorAll('.slider-dot').forEach((d, i) => d.classList.toggle('active', i === current));
  }

  function next() {
    goTo(current >= maxIndex ? 0 : current + 1);
  }

  function prev() {
    goTo(current <= 0 ? maxIndex : current - 1);
  }

  function startAutoplay() {
    if (totalSlides <= visible) return;
    autoplay = setInterval(next, 4000);
  }

  function stopAutoplay() {
    clearInterval(autoplay);
  }

  if (prevBtn) prevBtn.addEventListener('click', () => { stopAutoplay(); prev(); startAutoplay(); });
  if (nextBtn) nextBtn.addEventListener('click', () => { stopAutoplay(); next(); startAutoplay(); });

  // Build dots
  const dotCount = Math.max(1, maxIndex + 1);
  dotsContainer.innerHTML = '';
  for (let i = 0; i < dotCount; i++) {
    const dot = document.createElement('button');
    dot.className = 'slider-dot' + (i === 0 ? ' active' : '');
    dot.dataset.index = i;
    dot.setAttribute('aria-label', 'Trang ' + (i + 1));
    dot.addEventListener('click', () => { stopAutoplay(); goTo(i); startAutoplay(); });
    dotsContainer.appendChild(dot);
  }

  // Set initial slide width
  slidesContainer.style.transition = 'transform .5s cubic-bezier(.4,0,.2,1)';
  goTo(0);
  if (totalSlides > visible) startAutoplay();

  // Recalculate on resize
  window.addEventListener('resize', () => goTo(current));
});

// ── Result Tabs ──
const tabs = document.querySelectorAll('.result-tab[role="tab"]');
const panels = document.querySelectorAll('[role="tabpanel"]');

tabs.forEach((tab) => {
  tab.addEventListener('click', () => {
    // Deactivate all tabs
    tabs.forEach((t) => {
      t.classList.remove('active');
      t.setAttribute('aria-selected', 'false');
    });
    // Hide all panels
    panels.forEach((p) => p.setAttribute('hidden', ''));

    // Activate clicked tab
    tab.classList.add('active');
    tab.setAttribute('aria-selected', 'true');

    // Show matching panel
    const panelId = tab.getAttribute('aria-controls');
    if (panelId) {
      const panel = document.getElementById(panelId);
      if (panel) panel.removeAttribute('hidden');
    }
  });
});

// ── Smooth Scroll for Nav Links ──
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener('click', (e) => {
    const id = anchor.getAttribute('href');
    if (id.length > 1) {
      const target = document.querySelector(id);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    }
  });
});

// ── Floating CTA Show/Hide ──
const ctaFloat = document.querySelector('.cta-float');
if (ctaFloat) {
  window.addEventListener(
    'scroll',
    () => {
      ctaFloat.classList.toggle('visible', window.scrollY > 300);
    },
    { passive: true }
  );
  // Initially hidden
  ctaFloat.classList.remove('visible');
}

// ── Mobile Nav Toggle ──
const hamburger = document.querySelector('.hamburger');
const mobileNav = document.getElementById('mobileNav');

if (hamburger && mobileNav) {
  hamburger.addEventListener('click', () => {
    const isOpen = mobileNav.classList.toggle('open');
    hamburger.classList.toggle('active');
    hamburger.setAttribute('aria-expanded', isOpen);
    mobileNav.setAttribute('aria-hidden', !isOpen);
    document.body.style.overflow = isOpen ? 'hidden' : '';
  });

  // Close mobile nav when a link is clicked
  mobileNav.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
      mobileNav.classList.remove('open');
      hamburger.classList.remove('active');
      hamburger.setAttribute('aria-expanded', 'false');
      mobileNav.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
    });
  });

  // Close on Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && mobileNav.classList.contains('open')) {
      mobileNav.classList.remove('open');
      hamburger.classList.remove('active');
      hamburger.setAttribute('aria-expanded', 'false');
      mobileNav.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
    }
  });
}

// ── Nav CTA Button → Scroll to Form ──
const navCta = document.querySelector('.nav-cta');
if (navCta) {
  navCta.addEventListener('click', () => {
    const ctaSection = document.getElementById('cta');
    if (ctaSection) {
      ctaSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
}

// ── Timeline Interactive ──
const tlItems = document.querySelectorAll('.tl-item[role="tab"]');
const tlCard = document.getElementById('tlPanel');

if (tlItems.length && tlCard) {
  const tlCardYear  = tlCard.querySelector('.tl-card-year');
  const tlCardTitle = tlCard.querySelector('.tl-card-title');
  const tlCardDesc  = tlCard.querySelector('.tl-card-desc');
  const tlCardClose = tlCard.querySelector('.tl-card-close');

  function activateTlItem(item) {
    // If clicking the same active item, close the card
    if (item.classList.contains('active')) {
      item.classList.remove('active');
      item.setAttribute('aria-selected', 'false');
      tlCard.classList.remove('visible');
      return;
    }

    tlItems.forEach((i) => {
      i.classList.remove('active');
      i.setAttribute('aria-selected', 'false');
    });
    item.classList.add('active');
    item.setAttribute('aria-selected', 'true');
    tlCardYear.textContent  = item.dataset.year;
    tlCardTitle.textContent = item.dataset.title;
    tlCardDesc.textContent  = item.dataset.desc;
    tlCard.classList.add('visible');
    tlCard.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  }

  function closeTlCard() {
    tlItems.forEach((i) => {
      i.classList.remove('active');
      i.setAttribute('aria-selected', 'false');
    });
    tlCard.classList.remove('visible');
  }

  tlItems.forEach((item) => {
    item.addEventListener('click', () => activateTlItem(item));
    item.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        activateTlItem(item);
      }
    });
  });

  // Close button
  if (tlCardClose) {
    tlCardClose.addEventListener('click', (e) => {
      e.stopPropagation();
      closeTlCard();
    });
  }

  // Kích hoạt mốc đầu tiên (2005) mặc định
  activateTlItem(tlItems[0]);
}

// ── Doctors Interactive ──
const docCards = document.querySelectorAll('.doc-card[role="option"]');
const docDetail = document.getElementById('docDetail');

if (docCards.length && docDetail) {
  const detailPhoto = docDetail.querySelector('#docDetailPhoto');
  const detailImage = docDetail.querySelector('#docDetailImage');
  const detailName  = docDetail.querySelector('#docDetailName');
  const detailSpec  = docDetail.querySelector('#docDetailSpec');
  const detailCreds = docDetail.querySelector('#docDetailCreds');
  const detailLink  = docDetail.querySelector('#docDetailLink');

  function activateDoc(card) {
    docCards.forEach((c) => {
      c.classList.remove('active');
      c.setAttribute('aria-selected', 'false');
    });
    card.classList.add('active');
    card.setAttribute('aria-selected', 'true');

    detailName.textContent = card.dataset.name;
    detailSpec.textContent = card.dataset.spec;
    detailLink.href = card.dataset.link || '#';

    // Rebuild credentials list
    detailCreds.innerHTML = '';
    (card.dataset.creds || '').split('|').forEach((cred) => {
      if (!cred.trim()) return;
      const li = document.createElement('li');
      li.textContent = cred.trim();
      detailCreds.appendChild(li);
    });

    // Show panel
    docDetail.classList.add('visible');

    // Sync detail photo with selected card image
    detailPhoto.setAttribute('aria-label', 'Ảnh ' + card.dataset.name);
    if (detailImage) {
      detailImage.alt = 'Ảnh ' + card.dataset.name;
      if (card.dataset.image) {
        detailImage.src = card.dataset.image;
      }
    }
  }

  docCards.forEach((card) => {
    card.addEventListener('click', () => activateDoc(card));
    card.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); activateDoc(card); }
    });
  });

  // Activate first card (featured doctor) on load
  activateDoc(docCards[0]);
}

// ── Testimonial Slider ──
(function () {
  const slider = document.querySelector('.testi-slider');
  if (!slider) return;

  const slidesContainer = slider.querySelector('.testi-slides');
  const allSlides = slider.querySelectorAll('.testi-slide');
  const dotsContainer = slider.querySelector('.testi-dots');
  const prevBtn = slider.querySelector('.slider-arrow.prev');
  const nextBtn = slider.querySelector('.slider-arrow.next');
  const totalSlides = allSlides.length;
  let current = 0;
  let autoplay;

  function getVisible() {
    if (window.innerWidth <= 768) return 1;
    if (window.innerWidth <= 1024) return 2;
    return 3;
  }

  function getMaxIndex() {
    return Math.max(0, totalSlides - getVisible());
  }

  function goTo(index) {
    current = Math.max(0, Math.min(index, getMaxIndex()));
    const gap = 18;
    const slideWidth = allSlides[0].offsetWidth + gap;
    slidesContainer.style.transform = `translateX(-${current * slideWidth}px)`;
    dotsContainer.querySelectorAll('.slider-dot').forEach((d, i) =>
      d.classList.toggle('active', i === current)
    );
  }

  function buildDots() {
    dotsContainer.innerHTML = '';
    const count = getMaxIndex() + 1;
    for (let i = 0; i < count; i++) {
      const dot = document.createElement('button');
      dot.className = 'slider-dot' + (i === 0 ? ' active' : '');
      dot.setAttribute('aria-label', 'Trang ' + (i + 1));
      dot.addEventListener('click', () => { stopAutoplay(); goTo(i); startAutoplay(); });
      dotsContainer.appendChild(dot);
    }
  }

  function startAutoplay() {
    if (totalSlides <= getVisible()) return;
    autoplay = setInterval(() => goTo(current >= getMaxIndex() ? 0 : current + 1), 4500);
  }
  function stopAutoplay() { clearInterval(autoplay); }

  if (prevBtn) prevBtn.addEventListener('click', () => { stopAutoplay(); goTo(current <= 0 ? getMaxIndex() : current - 1); startAutoplay(); });
  if (nextBtn) nextBtn.addEventListener('click', () => { stopAutoplay(); goTo(current >= getMaxIndex() ? 0 : current + 1); startAutoplay(); });

  slidesContainer.style.transition = 'transform .5s cubic-bezier(.4,0,.2,1)';
  buildDots();
  goTo(0);
  startAutoplay();

  window.addEventListener('resize', () => { buildDots(); goTo(Math.min(current, getMaxIndex())); });
})();

// ── Testimonial Click-to-Play ──
document.querySelectorAll('.testi-card[data-videoid]').forEach((card) => {
  card.addEventListener('click', () => {
    const videoId = card.dataset.videoid;
    if (!videoId || card.classList.contains('playing')) return;
    // Stop all other playing cards first
    document.querySelectorAll('.testi-card.playing').forEach((c) => {
      c.classList.remove('playing');
      const iframe = c.querySelector('iframe');
      if (iframe) iframe.remove();
    });
    const iframe = document.createElement('iframe');
    iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
    iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
    iframe.allowFullscreen = true;
    card.appendChild(iframe);
    card.classList.add('playing');
  });
});

// ── Video Click to Play ──
const videoWrap = document.querySelector('.tl-video-wrap');
if (videoWrap) {
  videoWrap.addEventListener('click', () => {
    const videoId = videoWrap.dataset.videoid;
    if (!videoId || videoId === 'YOUTUBE_ID_HERE') return;
    const iframe = document.createElement('iframe');
    iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
    iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
    iframe.allowFullscreen = true;
    videoWrap.appendChild(iframe);
    videoWrap.classList.add('playing');
  });
}

