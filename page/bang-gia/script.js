// Sticky nav active highlight on scroll
const sections = document.querySelectorAll('.ndn-lp section[id]');
const navLinks = document.querySelectorAll('.ndn-lp .ndn-sticky-nav a');
window.addEventListener('scroll', () => {
  let current = '';
  sections.forEach(s => {
    if (window.scrollY >= s.offsetTop - 80) current = s.id;
  });
  navLinks.forEach(a => {
    a.classList.toggle('active', a.getAttribute('href') === '#' + current);
  });
});

// Smooth hide float on scroll up reveal
let lastScroll = 0;
const floatDiv = document.querySelector('.ndn-lp .ndn-cta-float');
window.addEventListener('scroll', () => {
  const now = window.scrollY;
  floatDiv.style.opacity = now < 200 ? '0' : '1';
  floatDiv.style.pointerEvents = now < 200 ? 'none' : 'all';
  lastScroll = now;
}, { passive: true });
floatDiv.style.transition = 'opacity .3s';
floatDiv.style.opacity = '0';

/* Auto-resize CF7 iframes to match content height */
document.querySelectorAll('.ndn-lp .ndn-cf7-iframe').forEach(function(iframe) {
  function resize() {
    try {
      var h = iframe.contentDocument.body.scrollHeight;
      if (h > 0) iframe.style.height = h + 'px';
    } catch(e) {}
  }
  iframe.addEventListener('load', resize);
});
