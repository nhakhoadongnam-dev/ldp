(function() {
  var section = document.getElementById('ndn-bgi-direct-youtube');
  if (!section) return;
  if (section.getAttribute('data-ndn-bgi-video-ready') === '1') return;
  section.setAttribute('data-ndn-bgi-video-ready', '1');

  var track = section.querySelector('.ndn-bgi-direct-youtube__track');
  var prev = section.querySelector('[data-ndn-bgi-video-prev]');
  var next = section.querySelector('[data-ndn-bgi-video-next]');
  if (!track || !prev || !next) return;
  var cards = track.querySelectorAll('.ndn-bgi-direct-youtube__card');
  var mobileIndex = 0;

  function isMobile() {
    return window.matchMedia('(max-width: 780px)').matches;
  }

  if (isMobile()) {
    for (var m = 0; m < cards.length; m++) cards[m].hidden = false;
    return;
  }

  function updateMobileCards() {
    if (!isMobile()) {
      for (var i = 0; i < cards.length; i++) cards[i].hidden = false;
      return;
    }
    for (var j = 0; j < cards.length; j++) cards[j].hidden = false;
    prev.disabled = true;
    next.disabled = true;
  }

  function getStep() {
    var card = track.querySelector('.ndn-bgi-direct-youtube__card');
    if (!card) return track.clientWidth;
    var gap = parseFloat(window.getComputedStyle(track).columnGap || '0') || 0;
    return card.getBoundingClientRect().width + gap;
  }

  function updateButtons() {
    if (isMobile()) {
      updateMobileCards();
      return;
    }
    var maxScroll = track.scrollWidth - track.clientWidth - 2;
    prev.disabled = track.scrollLeft <= 2;
    next.disabled = track.scrollLeft >= maxScroll;
  }

  prev.addEventListener('click', function() {
    if (isMobile()) {
      mobileIndex = Math.max(0, mobileIndex - 1);
      updateMobileCards();
      return;
    }
    track.scrollBy({ left: -getStep(), behavior: 'smooth' });
  });

  next.addEventListener('click', function() {
    if (isMobile()) {
      mobileIndex = Math.min(cards.length - 1, mobileIndex + 1);
      updateMobileCards();
      return;
    }
    track.scrollBy({ left: getStep(), behavior: 'smooth' });
  });

  track.addEventListener('scroll', updateButtons, { passive: true });
  window.addEventListener('resize', updateButtons);
  updateButtons();
})();
