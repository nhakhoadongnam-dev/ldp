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

// ── Result Slider (responsive: 3 visible desktop, 1 mobile) ──
document.querySelectorAll('.result-slider').forEach((slider) => {
  const slidesContainer = slider.querySelector('.result-slides');
  const allSlides = slider.querySelectorAll('.result-slide');
  const dotsContainer = slider.querySelector('.slider-dots');
  const prevBtn = slider.querySelector('.slider-arrow.prev');
  const nextBtn = slider.querySelector('.slider-arrow.next');
  const totalSlides = allSlides.length;
  let current = 0;
  let autoplay;

  function getVisible() { return window.innerWidth <= 768 ? 1 : 3; }
  function getGap() { return window.innerWidth <= 768 ? 0 : 24; }

  function buildDots(maxIndex) {
    dotsContainer.innerHTML = '';
    for (let i = 0; i <= maxIndex; i++) {
      const dot = document.createElement('button');
      dot.className = 'slider-dot' + (i === 0 ? ' active' : '');
      dot.dataset.index = i;
      dot.setAttribute('aria-label', 'Trang ' + (i + 1));
      dot.addEventListener('click', () => { stopAutoplay(); goTo(i); startAutoplay(); });
      dotsContainer.appendChild(dot);
    }
  }

  function goTo(index) {
    const visible = getVisible();
    const maxIndex = Math.max(0, totalSlides - visible);
    current = Math.max(0, Math.min(index, maxIndex));
    const slideEl = allSlides[0];
    const gap = getGap();
    const slideWidth = slideEl.offsetWidth + gap;
    slidesContainer.style.transform = `translateX(-${current * slideWidth}px)`;
    dotsContainer.querySelectorAll('.slider-dot').forEach((d, i) => d.classList.toggle('active', i === current));
  }

  function next() {
    const maxIndex = Math.max(0, totalSlides - getVisible());
    goTo(current >= maxIndex ? 0 : current + 1);
  }
  function prev() {
    const maxIndex = Math.max(0, totalSlides - getVisible());
    goTo(current <= 0 ? maxIndex : current - 1);
  }
  function startAutoplay() {
    if (totalSlides <= getVisible()) return;
    autoplay = setInterval(next, 4000);
  }
  function stopAutoplay() { clearInterval(autoplay); }

  if (prevBtn) prevBtn.addEventListener('click', () => { stopAutoplay(); prev(); startAutoplay(); });
  if (nextBtn) nextBtn.addEventListener('click', () => { stopAutoplay(); next(); startAutoplay(); });

  // Touch swipe
  let touchStartX = 0;
  slidesContainer.addEventListener('touchstart', (e) => { touchStartX = e.touches[0].clientX; }, { passive: true });
  slidesContainer.addEventListener('touchend', (e) => {
    const dx = e.changedTouches[0].clientX - touchStartX;
    if (Math.abs(dx) > 40) { stopAutoplay(); dx < 0 ? next() : prev(); startAutoplay(); }
  }, { passive: true });

  slidesContainer.style.transition = 'transform .5s cubic-bezier(.4,0,.2,1)';
  buildDots(Math.max(0, totalSlides - getVisible()));
  goTo(0);
  startAutoplay();

  window.addEventListener('resize', () => {
    buildDots(Math.max(0, totalSlides - getVisible()));
    goTo(0);
  });
});

// ── Docs Mobile Slider ──
(function () {
  const wrap = document.querySelector('.docs-slider-wrap');
  if (!wrap) return;
  const grid = wrap.querySelector('.docs-grid');
  const cards = Array.from(wrap.querySelectorAll('.doc-card'));
  const prevBtn = wrap.querySelector('.docs-prev');
  const nextBtn = wrap.querySelector('.docs-next');
  let current = 0;

  function isMobile() { return window.innerWidth <= 768; }

  function goTo(index) {
    if (!isMobile()) return;
    current = Math.max(0, Math.min(index, cards.length - 1));
    const w = cards[0].offsetWidth;
    grid.style.transform = `translateX(-${current * w}px)`;
    cards.forEach((c, i) => c.classList.toggle('active', i === current));
  }

  grid.style.transition = 'transform .4s cubic-bezier(.4,0,.2,1)';
  if (prevBtn) prevBtn.addEventListener('click', () => goTo(current - 1));
  if (nextBtn) nextBtn.addEventListener('click', () => goTo(current + 1));

  // Touch swipe
  let tx = 0;
  grid.addEventListener('touchstart', (e) => { tx = e.touches[0].clientX; }, { passive: true });
  grid.addEventListener('touchend', (e) => {
    if (!isMobile()) return;
    const dx = e.changedTouches[0].clientX - tx;
    if (Math.abs(dx) > 40) dx < 0 ? goTo(current + 1) : goTo(current - 1);
  }, { passive: true });

  // Initialize slider on mobile
  if (isMobile()) goTo(0);
  window.addEventListener('resize', () => { if (!isMobile()) { grid.style.transform = ''; } else { goTo(current); } });
})();

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
  const tlItemsWrap = document.querySelector('.timeline-items');
  const tlCardYear  = tlCard.querySelector('.tl-card-year');
  const tlCardTitle = tlCard.querySelector('.tl-card-title');
  const tlCardDesc  = tlCard.querySelector('.tl-card-desc');
  const tlCardClose = tlCard.querySelector('.tl-card-close');
  const tlCardInner = tlCard.querySelector('.tl-card-inner');
  let tlAutoplay;

  function syncTlItemViewport(item) {
    if (!tlItemsWrap || window.innerWidth > 768) return;
    const targetLeft = item.offsetLeft - ((tlItemsWrap.clientWidth - item.clientWidth) / 2);
    const maxScroll = tlItemsWrap.scrollWidth - tlItemsWrap.clientWidth;
    const nextLeft = Math.max(0, Math.min(targetLeft, maxScroll));
    tlItemsWrap.scrollTo({ left: nextLeft, behavior: 'smooth' });
  }

  function syncTlCardHeight() {
    if (!tlCardInner) return;

    const previousYear = tlCardYear.textContent;
    const previousTitle = tlCardTitle.textContent;
    const previousDesc = tlCardDesc.textContent;
    const wasVisible = tlCard.classList.contains('visible');

    tlCard.classList.add('visible');
    tlCard.style.setProperty('--tl-card-height', 'auto');

    let maxHeight = 0;
    tlItems.forEach((item) => {
      tlCardYear.textContent = item.dataset.year;
      tlCardTitle.textContent = item.dataset.title;
      tlCardDesc.textContent = item.dataset.desc;
      maxHeight = Math.max(maxHeight, tlCardInner.scrollHeight);
    });

    tlCardYear.textContent = previousYear;
    tlCardTitle.textContent = previousTitle;
    tlCardDesc.textContent = previousDesc;

    if (!wasVisible) {
      tlCard.classList.remove('visible');
    }

    tlCard.style.setProperty('--tl-card-height', `${Math.ceil(maxHeight)}px`);
  }

  function activateTlItem(item, options = {}) {
    const { forceOpen = false, scrollIntoView = true } = options;

    // If clicking the same active item, close the card
    if (!forceOpen && item.classList.contains('active')) {
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
    syncTlItemViewport(item);
    if (scrollIntoView) {
      tlCard.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
  }

  function closeTlCard() {
    tlItems.forEach((i) => {
      i.classList.remove('active');
      i.setAttribute('aria-selected', 'false');
    });
    tlCard.classList.remove('visible');
  }

  function stopTlAutoplay() {
    clearInterval(tlAutoplay);
  }

  function goToNextTlItem() {
    const activeIndex = Array.from(tlItems).findIndex((item) => item.classList.contains('active'));
    const nextIndex = activeIndex === -1 ? 0 : (activeIndex + 1) % tlItems.length;
    activateTlItem(tlItems[nextIndex], { forceOpen: true, scrollIntoView: false });
  }

  function startTlAutoplay() {
    stopTlAutoplay();
    tlAutoplay = setInterval(goToNextTlItem, 4000);
  }

  function restartTlAutoplay() {
    startTlAutoplay();
  }

  tlItems.forEach((item) => {
    item.addEventListener('click', () => {
      activateTlItem(item);
      restartTlAutoplay();
    });
    item.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        activateTlItem(item);
        restartTlAutoplay();
      }
    });
    item.addEventListener('focus', restartTlAutoplay);
  });

  // Close button
  if (tlCardClose) {
    tlCardClose.addEventListener('click', (e) => {
      e.stopPropagation();
      closeTlCard();
      restartTlAutoplay();
    });
  }

  // Kích hoạt mốc đầu tiên (2005) mặc định
  syncTlCardHeight();
  activateTlItem(tlItems[0], { forceOpen: true, scrollIntoView: false });
  startTlAutoplay();
  window.addEventListener('resize', syncTlCardHeight);
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
  const slider = document.querySelector('.press-slider');
  if (!slider) return;

  const slidesContainer = slider.querySelector('.press-slides');
  const allSlides = slider.querySelectorAll('.press-slide');
  const viewport = slider.querySelector('.press-inner');
  const dotsContainer = slider.querySelector('.press-dots');
  const prevBtn = slider.querySelector('.slider-arrow.prev');
  const nextBtn = slider.querySelector('.slider-arrow.next');
  const totalSlides = allSlides.length;
  let current = 0;
  let autoplay;
  let resizeTimer;
  let pointerDown = false;
  let isDragging = false;
  let startX = 0;
  let startY = 0;
  let deltaX = 0;
  let pointerId = null;
  let dragBaseOffset = 0;

  function getVisible() {
    if (window.innerWidth <= 480) return 1;
    if (window.innerWidth <= 768) return 2;
    if (window.innerWidth <= 1024) return 3;
    return 4;
  }

  function getStepWidth() {
    if (allSlides.length < 2) return allSlides[0].getBoundingClientRect().width;
    const first = allSlides[0].getBoundingClientRect();
    const second = allSlides[1].getBoundingClientRect();
    return second.left - first.left;
  }

  function getMaxIndex() {
    return Math.max(0, totalSlides - getVisible());
  }

  function goTo(index) {
    current = Math.max(0, Math.min(index, getMaxIndex()));
    const slideWidth = getStepWidth();
    slidesContainer.style.transform = `translate3d(-${current * slideWidth}px, 0, 0)`;
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
    autoplay = setInterval(() => goTo(current >= getMaxIndex() ? 0 : current + 1), 5000);
  }
  function stopAutoplay() { clearInterval(autoplay); }

  function getMaxOffset() {
    return Math.max(0, slidesContainer.scrollWidth - viewport.clientWidth);
  }

  function getCurrentOffset() {
    return Math.min(current * getStepWidth(), getMaxOffset());
  }

  function onGestureStart(clientX, clientY, id) {
    pointerDown = true;
    isDragging = false;
    startX = clientX;
    startY = clientY;
    deltaX = 0;
    pointerId = id;
    dragBaseOffset = getCurrentOffset();
    viewport.classList.add('is-dragging');
    stopAutoplay();
  }

  function onGestureMove(clientX, clientY) {
    if (!pointerDown) return;
    const moveX = clientX - startX;
    const moveY = clientY - startY;
    if (!isDragging && Math.abs(moveX) > 8 && Math.abs(moveX) > Math.abs(moveY)) {
      isDragging = true;
    }
    if (isDragging) {
      deltaX = moveX;
      const maxOffset = getMaxOffset();
      let nextOffset = dragBaseOffset - deltaX;
      if (nextOffset < 0) nextOffset = nextOffset * 0.25;
      if (nextOffset > maxOffset) nextOffset = maxOffset + (nextOffset - maxOffset) * 0.25;
      slidesContainer.style.transform = `translate3d(-${nextOffset}px, 0, 0)`;
    }
  }

  function onGestureEnd() {
    if (!pointerDown) return;
    pointerDown = false;
    if (!isDragging) {
      viewport.classList.remove('is-dragging');
      startAutoplay();
      return;
    }

    const threshold = 28;
    if (deltaX <= -threshold) goTo(current + 1);
    else if (deltaX >= threshold) goTo(current - 1);
    else goTo(current);

    isDragging = false;
    deltaX = 0;
    pointerId = null;
    viewport.classList.remove('is-dragging');
    startAutoplay();
  }

  if (prevBtn) prevBtn.addEventListener('click', () => { stopAutoplay(); goTo(current <= 0 ? getMaxIndex() : current - 1); startAutoplay(); });
  if (nextBtn) nextBtn.addEventListener('click', () => { stopAutoplay(); goTo(current >= getMaxIndex() ? 0 : current + 1); startAutoplay(); });

  viewport.addEventListener('dragstart', (event) => {
    event.preventDefault();
  });

  viewport.addEventListener('pointerdown', (event) => {
    if (event.pointerType === 'mouse' && event.button !== 0) return;
    onGestureStart(event.clientX, event.clientY, event.pointerId);
    if (viewport.setPointerCapture) viewport.setPointerCapture(event.pointerId);
  });

  viewport.addEventListener('pointermove', (event) => {
    if (!pointerDown || (pointerId !== null && event.pointerId !== pointerId)) return;
    onGestureMove(event.clientX, event.clientY);
    if (isDragging) event.preventDefault();
  });

  viewport.addEventListener('pointerup', onGestureEnd);
  viewport.addEventListener('pointercancel', onGestureEnd);
  viewport.addEventListener('pointerleave', onGestureEnd);

  slidesContainer.style.transition = 'transform .55s cubic-bezier(0.22, 1, 0.36, 1)';
  buildDots();
  goTo(0);
  startAutoplay();

  window.addEventListener('resize', () => {
    window.clearTimeout(resizeTimer);
    resizeTimer = window.setTimeout(() => {
      buildDots();
      goTo(Math.min(current, getMaxIndex()));
    }, 120);
  });
})();

// ── Testimonial Slider ──
(function () {
  const slider = document.querySelector('.testi-slider');
  if (!slider) return;

  const slidesContainer = slider.querySelector('.testi-slides');
  const allSlides = slider.querySelectorAll('.testi-slide');
  const viewport = slider.querySelector('.testi-inner');
  const gestureLayers = slider.querySelectorAll('.testi-gesture-layer');
  const dotsContainer = slider.querySelector('.testi-dots');
  const prevBtn = slider.querySelector('.slider-arrow.prev');
  const nextBtn = slider.querySelector('.slider-arrow.next');
  const totalSlides = allSlides.length;
  let current = 0;
  let autoplay;
  let resizeTimer;
  let pointerDown = false;
  let isDragging = false;
  let startX = 0;
  let startY = 0;
  let deltaX = 0;
  let pointerId = null;
  let dragBaseOffset = 0;
  let suppressClick = false;

  function getVisible() {
    if (window.innerWidth <= 480) return 1;
    if (window.innerWidth <= 768) return 2;
    if (window.innerWidth <= 1024) return 3;
    return 4;
  }

  function getStepWidth() {
    if (allSlides.length < 2) return allSlides[0].getBoundingClientRect().width;
    const first = allSlides[0].getBoundingClientRect();
    const second = allSlides[1].getBoundingClientRect();
    return second.left - first.left;
  }

  function getMaxIndex() {
    return Math.max(0, totalSlides - getVisible());
  }

  function goTo(index) {
    current = Math.max(0, Math.min(index, getMaxIndex()));
    const slideWidth = getStepWidth();
    slidesContainer.style.transform = `translate3d(-${current * slideWidth}px, 0, 0)`;
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

  function getMaxOffset() {
    return Math.max(0, slidesContainer.scrollWidth - viewport.clientWidth);
  }

  function getCurrentOffset() {
    return Math.min(current * getStepWidth(), getMaxOffset());
  }

  function onGestureStart(clientX, clientY, id) {
    pointerDown = true;
    isDragging = false;
    startX = clientX;
    startY = clientY;
    deltaX = 0;
    pointerId = id;
    dragBaseOffset = getCurrentOffset();
    viewport.classList.add('is-dragging');
    stopAutoplay();
  }

  function onGestureMove(clientX, clientY) {
    if (!pointerDown) return;
    const moveX = clientX - startX;
    const moveY = clientY - startY;
    if (!isDragging && Math.abs(moveX) > 8 && Math.abs(moveX) > Math.abs(moveY)) {
      isDragging = true;
    }
    if (isDragging) {
      deltaX = moveX;
      const maxOffset = getMaxOffset();
      let nextOffset = dragBaseOffset - deltaX;
      if (nextOffset < 0) nextOffset = nextOffset * 0.25;
      if (nextOffset > maxOffset) nextOffset = maxOffset + (nextOffset - maxOffset) * 0.25;
      slidesContainer.style.transform = `translate3d(-${nextOffset}px, 0, 0)`;
    }
  }

  function onGestureEnd() {
    if (!pointerDown) return;
    pointerDown = false;
    if (!isDragging) {
      viewport.classList.remove('is-dragging');
      startAutoplay();
      return;
    }

    const threshold = 28;
    suppressClick = true;
    if (deltaX <= -threshold) goTo(current + 1);
    else if (deltaX >= threshold) goTo(current - 1);
    else goTo(current);

    isDragging = false;
    deltaX = 0;
    pointerId = null;
    viewport.classList.remove('is-dragging');
    startAutoplay();
  }

  if (prevBtn) prevBtn.addEventListener('click', () => { stopAutoplay(); goTo(current <= 0 ? getMaxIndex() : current - 1); startAutoplay(); });
  if (nextBtn) nextBtn.addEventListener('click', () => { stopAutoplay(); goTo(current >= getMaxIndex() ? 0 : current + 1); startAutoplay(); });

  gestureLayers.forEach((layer) => {
    layer.addEventListener('dragstart', (event) => {
      event.preventDefault();
    });

    layer.addEventListener('pointerdown', (event) => {
      if (event.pointerType === 'mouse' && event.button !== 0) return;
      onGestureStart(event.clientX, event.clientY, event.pointerId);
      if (layer.setPointerCapture) layer.setPointerCapture(event.pointerId);
    });

    layer.addEventListener('pointermove', (event) => {
      if (!pointerDown || (pointerId !== null && event.pointerId !== pointerId)) return;
      onGestureMove(event.clientX, event.clientY);
      if (isDragging) event.preventDefault();
    });

    layer.addEventListener('pointerup', onGestureEnd);
    layer.addEventListener('pointercancel', onGestureEnd);
    layer.addEventListener('pointerleave', onGestureEnd);

    layer.addEventListener('click', (event) => {
      if (suppressClick) {
        event.preventDefault();
        suppressClick = false;
        return;
      }

      const videoUrl = layer.getAttribute('data-video-url');
      if (videoUrl) {
        window.open(videoUrl, '_blank', 'noopener');
      }
    });
  });

  slidesContainer.style.transition = 'transform .55s cubic-bezier(0.22, 1, 0.36, 1)';
  buildDots();
  goTo(0);
  startAutoplay();

  window.addEventListener('resize', () => {
    window.clearTimeout(resizeTimer);
    resizeTimer = window.setTimeout(() => {
      buildDots();
      goTo(Math.min(current, getMaxIndex()));
    }, 120);
  });
})();


// ── Auto-resize CF7 iframe ──
document.querySelectorAll('.cf7-iframe').forEach(function(iframe) {
  function resize() {
    try {
      var h = iframe.contentDocument.body.scrollHeight;
      if (h > 0) iframe.style.height = h + 'px';
    } catch(e) {}
  }
  iframe.addEventListener('load', resize);
});

// ── Form Section Reveal Animations ──
const formObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('active');
        formObserver.unobserve(entry.target);
      }
    });
  },
  { threshold: 0.2 }
);
document.querySelectorAll('.reveal-left, .reveal-right').forEach((el) => {
  formObserver.observe(el);
});


// ── Skip hero layer ──
(function () {
  const btn = document.querySelector('.skip-layer');
  const textLayer = document.querySelector('.hero-text-layer');
  const overlay = document.querySelector('.hero-overlay');
  const hero = document.querySelector('.hero');
  const bgSlides = hero ? Array.from(hero.querySelectorAll('.hero-bg-slide')) : [];
  const heroDots = hero ? Array.from(hero.querySelectorAll('.hero-dot')) : [];
  let heroInterval = null;

  function showHeroSlide(index) {
    bgSlides.forEach((slide, slideIndex) => {
      slide.classList.toggle('active', slideIndex === index);
    });
    heroDots.forEach((dot, dotIndex) => {
      dot.classList.toggle('active', dotIndex === index);
    });
  }

  function startHeroSlider() {
    if (bgSlides.length < 2) return;
    let current = 0;
    heroInterval = window.setInterval(() => {
      current = (current + 1) % bgSlides.length;
      showHeroSlide(current);
    }, 5000);
  }

  startHeroSlider();

  if (!btn) return;
  btn.addEventListener('click', function () {
    if (heroInterval) {
      window.clearInterval(heroInterval);
    }
    textLayer.classList.add('hidden');
    overlay.classList.add('hidden');
    btn.style.display = 'none';
  });
})();
