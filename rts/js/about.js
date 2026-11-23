(function () {
  'use strict';
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var mqMobile = window.matchMedia('(max-width: 680px)');
  var mqTablet = window.matchMedia('(max-width: 1024px)');
  function clamp(v) { return Math.max(0, Math.min(1, v)); }

  /* ---------- Scroll-linked journey timeline ---------- */
  var tl = document.getElementById('timeline');
  var tlItems = tl ? Array.prototype.slice.call(tl.querySelectorAll('.tl__item')) : [];

  function updateTimeline() {
    if (!tl) return;
    var vh = window.innerHeight, r = tl.getBoundingClientRect(), p, fracs;
    if (reduce) { p = 1; }
    if (mqMobile.matches) {
      // vertical line: from first to last dot
      var top = r.top + 30, h = Math.max(1, r.height - 60);
      if (!reduce) p = clamp((vh * 0.6 - top) / h);
      fracs = tlItems.map(function (it) {
        var d = it.querySelector('.tl__dot').getBoundingClientRect();
        return clamp((d.top + d.height / 2 - top) / h);
      });
    } else if (mqTablet.matches) {
      // 2×2 grid, no line: reveal items in order as the block scrolls in
      if (!reduce) p = clamp((vh * 0.85 - r.top) / (r.height + vh * 0.1));
      fracs = tlItems.map(function (_, i) { return i / (tlItems.length - 1) * 0.9; });
    } else {
      var left = r.left + 32, w = Math.max(1, r.width - 64);
      if (!reduce) p = clamp((vh * 0.78 - r.top) / (vh * 0.42));
      fracs = tlItems.map(function (it) {
        var d = it.querySelector('.tl__dot').getBoundingClientRect();
        return clamp((d.left + d.width / 2 - left) / w);
      });
    }
    tl.style.setProperty('--p', p.toFixed(4));
    tlItems.forEach(function (it, i) { it.classList.toggle('is-on', p >= fracs[i] - 0.001); });
  }

  /* ---------- Parallax (clients section) ---------- */
  var cbg = document.querySelector('.clients__bg');
  function updateParallax() {
    if (!cbg || reduce) return;
    var r = cbg.parentElement.getBoundingClientRect(), vh = window.innerHeight;
    if (r.bottom > 0 && r.top < vh) {
      var k = (r.top + r.height / 2 - vh / 2) / vh;
      cbg.style.transform = 'translate3d(0,' + (k * -10) + '%,0)';
    }
  }

  var ticking = false;
  function onScroll() {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(function () { updateTimeline(); updateParallax(); ticking = false; });
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', onScroll);
  updateTimeline(); updateParallax();

  /* ---------- Team filter ---------- */
  var chips = document.querySelectorAll('.chip[data-filter]');
  var cards = Array.prototype.slice.call(document.querySelectorAll('.tcard'));
  chips.forEach(function (chip) {
    chip.addEventListener('click', function () {
      var f = chip.dataset.filter, n = 0;
      chips.forEach(function (c) { var on = c === chip; c.classList.toggle('is-active', on); c.setAttribute('aria-pressed', on); });
      cards.forEach(function (card) {
        var ok = f === 'all' || card.dataset.group === f;
        card.classList.toggle('is-hidden', !ok);
        card.classList.remove('is-pop');
        if (ok) {
          card.classList.add('is-in'); // ensure scroll-reveal state is applied
          card.style.transitionDelay = '0ms';
          card.style.setProperty('--i', n++);
          if (!reduce) { void card.offsetWidth; card.classList.add('is-pop'); }
        }
      });
    });
  });

  /* ---------- Locations map switcher ---------- */
  var frame = document.getElementById('mapFrame');
  var locs = document.querySelectorAll('.wloc');
  if (frame && locs.length) {
    var mapWrap = frame.parentElement;
    var call = document.getElementById('mapCall');
    var dir = document.getElementById('mapDir');
    frame.addEventListener('load', function () { mapWrap.classList.remove('is-switching'); });
    locs.forEach(function (btn) {
      btn.addEventListener('click', function () {
        if (btn.classList.contains('is-active')) return;
        locs.forEach(function (b) { var on = b === btn; b.classList.toggle('is-active', on); b.setAttribute('aria-selected', on); });
        mapWrap.classList.add('is-switching');
        frame.src = btn.dataset.map;
        var name = btn.querySelector('strong').textContent;
        frame.title = 'Map: ' + name;
        var phone = btn.querySelector('em').textContent.trim();
        call.href = 'tel:' + phone.replace(/\D/g, '');
        call.querySelector('span').textContent = phone;
        dir.href = 'https://www.google.com/maps/dir/?api=1&destination=' + encodeURIComponent(btn.dataset.dir);
        if (mqTablet.matches) mapWrap.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'nearest' });
      });
    });
  }
})();
