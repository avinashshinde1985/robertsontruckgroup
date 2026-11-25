(function () {
  'use strict';
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var prose = document.getElementById('prose');
  var article = document.getElementById('article');
  if (!prose) return;

  /* ---------- Table of contents (desktop + mobile) ---------- */
  var heads = Array.prototype.slice.call(prose.querySelectorAll('h2[id]'));
  var tocLists = document.querySelectorAll('.toc-list');
  var mobile = document.getElementById('tocMobile');
  tocLists.forEach(function (ol) {
    heads.forEach(function (h) {
      var li = document.createElement('li');
      var a = document.createElement('a');
      a.href = '#' + h.id;
      a.textContent = h.firstChild.textContent.replace(/^Question\s+(\d+):\s*/i, 'Q$1: ');
      a.title = h.firstChild.textContent;
      li.appendChild(a);
      ol.appendChild(li);
    });
  });
  var n = document.querySelector('.toc-m__n');
  if (n) n.textContent = heads.length + ' sections';
  document.querySelectorAll('.toc-list a').forEach(function (a) {
    a.addEventListener('click', function () { if (mobile && mobile.contains(a)) mobile.open = false; });
  });

  /* ---------- Scrollspy + reading progress ---------- */
  var bar = document.getElementById('rprogress');
  var pct = document.getElementById('tocPct');
  var deskList = document.querySelector('.toc .toc-list');
  var current = -1;

  function update() {
    var vh = window.innerHeight;
    // progress through the article body
    var r = prose.getBoundingClientRect();
    var p = Math.max(0, Math.min(1, (vh * 0.35 - r.top) / Math.max(1, r.height - vh * 0.5)));
    bar.style.transform = 'scaleX(' + p.toFixed(4) + ')';
    if (pct) pct.textContent = Math.round(p * 100) + '%';

    // active section = last heading above the reading line
    var idx = -1;
    for (var i = 0; i < heads.length; i++) {
      if (heads[i].getBoundingClientRect().top <= 140) idx = i; else break;
    }
    if (idx === current) return;
    current = idx;
    tocLists.forEach(function (ol) {
      ol.querySelectorAll('a').forEach(function (a, k) {
        a.classList.toggle('is-active', k === idx);
        a.classList.toggle('is-read', k < idx);
        if (k === idx) a.setAttribute('aria-current', 'location'); else a.removeAttribute('aria-current');
      });
    });
    // keep active item visible inside the sidebar list (without moving the page)
    if (deskList && idx > -1) {
      var act = deskList.querySelectorAll('a')[idx];
      var top = act.offsetTop - deskList.clientHeight / 2 + act.clientHeight / 2;
      deskList.scrollTo({ top: top, behavior: reduce ? 'auto' : 'smooth' });
    }
  }
  var ticking = false;
  window.addEventListener('scroll', function () {
    if (!ticking) { requestAnimationFrame(function () { update(); ticking = false; }); ticking = true; }
  }, { passive: true });
  window.addEventListener('resize', update);
  update();

  /* ---------- Share ---------- */
  var toast = document.getElementById('toast'), toastT;
  function say(msg) {
    toast.textContent = msg;
    toast.classList.add('is-on');
    clearTimeout(toastT);
    toastT = setTimeout(function () { toast.classList.remove('is-on'); }, 2200);
  }
  function copy(text) {
    if (navigator.clipboard && window.isSecureContext) return navigator.clipboard.writeText(text);
    return new Promise(function (res, rej) {
      var ta = document.createElement('textarea');
      ta.value = text; ta.setAttribute('readonly', ''); ta.style.position = 'fixed'; ta.style.opacity = '0';
      document.body.appendChild(ta); ta.select();
      try { document.execCommand('copy') ? res() : rej(); } catch (e) { rej(e); }
      document.body.removeChild(ta);
    });
  }
  var url = location.href.split('#')[0];
  var title = document.querySelector('.phero h1').textContent.trim();
  var u = encodeURIComponent(url), t = encodeURIComponent(title);
  var links = {
    fb: 'https://www.facebook.com/sharer/sharer.php?u=' + u,
    in: 'https://www.linkedin.com/sharing/share-offsite/?url=' + u,
    x: 'https://twitter.com/intent/tweet?url=' + u + '&text=' + t,
    mail: 'mailto:?subject=' + t + '&body=' + encodeURIComponent(title + '\n\n' + url)
  };
  document.querySelectorAll('[data-share]').forEach(function (b) {
    var k = b.dataset.share;
    if (links[k]) b.href = links[k];
    if (k === 'copy') b.addEventListener('click', function () {
      copy(url).then(function () { say('Link copied to clipboard'); }, function () { say('Press Ctrl+C to copy the link'); });
    });
  });

  // section anchors: jump + copy a deep link
  prose.querySelectorAll('.h-anchor').forEach(function (a) {
    a.addEventListener('click', function () {
      copy(url + a.getAttribute('href')).then(function () { say('Section link copied'); }, function () {});
    });
  });
})();
