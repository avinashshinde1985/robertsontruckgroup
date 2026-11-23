(function () {
  'use strict';
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var grid = document.getElementById('ggrid');
  if (!grid) return;

  var LABELS = { fabrication: 'Fabrication & Upfitting', shop: 'Service Shop', trucks: 'Trucks & Brand', facility: 'Facility' };
  var items = Array.prototype.slice.call(grid.querySelectorAll('.gitem'));
  var filter = 'all';

  /* ---------- Enhance tiles with overlay + counts ---------- */
  items.forEach(function (a) {
    var ov = document.createElement('span');
    ov.className = 'gitem__ov';
    ov.innerHTML = '<span class="gitem__cat"></span><strong></strong>';
    ov.firstChild.textContent = LABELS[a.dataset.cat];
    ov.lastChild.textContent = a.dataset.caption;
    var zoom = document.createElement('span');
    zoom.className = 'gitem__zoom';
    zoom.setAttribute('aria-hidden', 'true');
    zoom.innerHTML = '<svg><use href="#i-expand"/></svg>';
    a.appendChild(ov);
    a.appendChild(zoom);
    a.setAttribute('aria-label', 'Open photo: ' + a.dataset.caption);
  });
  var counts = { all: items.length };
  items.forEach(function (a) { counts[a.dataset.cat] = (counts[a.dataset.cat] || 0) + 1; });
  document.querySelectorAll('[data-n]').forEach(function (n) { n.textContent = counts[n.dataset.n] || 0; });
  document.querySelectorAll('[data-count-cat]').forEach(function (n) { n.textContent = counts[n.dataset.countCat] || 0; });
  document.querySelectorAll('[data-total]').forEach(function (n) { n.textContent = items.length; });

  /* ---------- Filtering ---------- */
  var btns = document.querySelectorAll('.gf');
  var shownEl = document.getElementById('gShown');
  function visible() { return items.filter(function (a) { return !a.classList.contains('is-hidden'); }); }
  function setFilter(f) {
    filter = f;
    btns.forEach(function (b) { var on = b.dataset.filter === f; b.classList.toggle('is-active', on); b.setAttribute('aria-pressed', on); });
    var n = 0;
    items.forEach(function (a) {
      var ok = f === 'all' || a.dataset.cat === f;
      a.classList.toggle('is-hidden', !ok);
      a.classList.remove('is-pop');
      if (ok) {
        a.style.setProperty('--i', n++);
        if (!reduce) { void a.offsetWidth; a.classList.add('is-pop'); }
      }
    });
    shownEl.textContent = n;
  }
  btns.forEach(function (b) { b.addEventListener('click', function () { setFilter(b.dataset.filter); }); });
  document.querySelectorAll('[data-jump]').forEach(function (a) {
    a.addEventListener('click', function () { setFilter(a.dataset.jump); });
  });

  /* ---------- Lightbox ---------- */
  var lb = document.getElementById('lb');
  var img = document.getElementById('lbImg');
  var cap = document.getElementById('lbCap');
  var cat = document.getElementById('lbCat');
  var idxEl = document.getElementById('lbIdx');
  var totalEl = document.getElementById('lbTotal');
  var thumbs = document.getElementById('lbThumbs');
  var list = [], cur = 0, lastFocus = null;

  function preload(i) { if (list[i]) { var p = new Image(); p.src = list[i].getAttribute('href'); } }
  function show(i, instant) {
    cur = (i + list.length) % list.length;
    var a = list[cur], src = a.getAttribute('href'), alt = a.querySelector('img').alt;
    var apply = function () {
      img.src = src; img.alt = alt;
      cap.textContent = a.dataset.caption;
      cat.textContent = LABELS[a.dataset.cat];
      img.classList.remove('is-swap');
    };
    if (instant || reduce) apply();
    else { img.classList.add('is-swap'); setTimeout(apply, 180); }
    idxEl.textContent = cur + 1;
    thumbs.querySelectorAll('button').forEach(function (t, k) {
      var on = k === cur;
      t.classList.toggle('is-active', on);
      t.setAttribute('aria-current', on);
      if (on) t.scrollIntoView({ block: 'nearest', inline: 'center', behavior: reduce ? 'auto' : 'smooth' });
    });
    preload(cur + 1); preload(cur - 1);
  }
  function open(a) {
    list = visible();
    totalEl.textContent = list.length;
    thumbs.innerHTML = '';
    list.forEach(function (it, k) {
      var t = document.createElement('button');
      t.type = 'button';
      t.setAttribute('aria-label', 'Show photo ' + (k + 1) + ': ' + it.dataset.caption);
      t.innerHTML = '<img alt="" loading="lazy">';
      t.firstChild.src = it.querySelector('img').getAttribute('src');
      t.addEventListener('click', function () { show(k); });
      thumbs.appendChild(t);
    });
    lastFocus = document.activeElement;
    lb.hidden = false;
    document.body.classList.add('lb-open');
    show(list.indexOf(a), true);
    lb.querySelector('.lb__close').focus();
  }
  function close() {
    lb.hidden = true;
    document.body.classList.remove('lb-open');
    if (lastFocus) lastFocus.focus();
  }

  grid.addEventListener('click', function (e) {
    var a = e.target.closest('.gitem');
    if (!a) return;
    e.preventDefault();
    open(a);
  });
  lb.querySelector('.lb__close').addEventListener('click', close);
  lb.querySelector('.lb__prev').addEventListener('click', function () { show(cur - 1); });
  lb.querySelector('.lb__next').addEventListener('click', function () { show(cur + 1); });
  // click on the dark backdrop (not the photo/controls) closes
  lb.addEventListener('click', function (e) {
    if (e.target === lb || e.target.classList.contains('lb__stage') || e.target.classList.contains('lb__fig')) close();
  });

  document.addEventListener('keydown', function (e) {
    if (lb.hidden) return;
    if (e.key === 'Escape') { e.preventDefault(); close(); }
    else if (e.key === 'ArrowRight') { e.preventDefault(); show(cur + 1); }
    else if (e.key === 'ArrowLeft') { e.preventDefault(); show(cur - 1); }
    else if (e.key === 'Tab') {
      // keep focus inside the dialog
      var f = Array.prototype.filter.call(lb.querySelectorAll('button'), function (b) { return b.offsetParent !== null; });
      var first = f[0], last = f[f.length - 1];
      if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
      else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
    }
  });

  // swipe on touch screens
  var sx = 0, sy = 0, tracking = false;
  var fig = lb.querySelector('.lb__fig');
  fig.addEventListener('touchstart', function (e) { var t = e.touches[0]; sx = t.clientX; sy = t.clientY; tracking = true; }, { passive: true });
  fig.addEventListener('touchend', function (e) {
    if (!tracking) return;
    tracking = false;
    var t = e.changedTouches[0], dx = t.clientX - sx, dy = t.clientY - sy;
    if (Math.abs(dx) > 50 && Math.abs(dx) > Math.abs(dy)) show(cur + (dx < 0 ? 1 : -1));
    else if (dy > 90 && Math.abs(dy) > Math.abs(dx)) close();
  });
})();
