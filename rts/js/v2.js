/* Robertson Truck Sales — Home v2 interactions
   Revised Nov 2026 per Ethan's feedback: no cursor-following effect, no particle field,
   no tilt/magnetic hover; motion kept to one-time intros and scroll-linked reveals. */
(function () {
  'use strict';
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var hasGSAP = typeof window.gsap !== 'undefined' && typeof window.ScrollTrigger !== 'undefined';
  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };

  /* ---------------- Split hero title into chars ---------------- */
  $$('.hero__title .split').forEach(function (el) {
    var html = '';
    el.childNodes.forEach(function (node) {
      if (node.nodeType === 3) {
        node.textContent.split(/(\s+)/).forEach(function (word) {
          if (!word) return;
          if (/^\s+$/.test(word)) { html += ' '; return; }
          html += '<span style="display:inline-block;white-space:nowrap">' +
            word.split('').map(function (c) { return '<span class="ch">' + c + '</span>'; }).join('') + '</span>';
        });
      } else {
        html += '<span class="ch">' + node.outerHTML + '</span>';
      }
    });
    el.innerHTML = html;
  });

  function heroIntro() {
    var chars = $$('.hero__title .ch');
    chars.forEach(function (c, i) {
      c.style.transition = 'transform 1.1s cubic-bezier(.16,1,.3,1) ' + (i * 0.025) + 's';
      requestAnimationFrame(function () { c.style.transform = 'translateY(0)'; });
    });
    var img = $('.hero__img');
    if (img) { img.style.transition = 'transform 2.4s cubic-bezier(.16,1,.3,1)'; img.style.transform = 'scale(1)'; }
    ['.hero__pill', '.hero__sub', '.hero__ctas', '.ai-search', '.hero__types', '.hero__side'].forEach(function (s, i) {
      var el = $(s); if (!el) return;
      el.animate([{ opacity: 0, transform: 'translateY(30px)' }, { opacity: 1, transform: 'none' }],
        { duration: 1000, delay: 300 + i * 140, easing: 'cubic-bezier(.16,1,.3,1)', fill: 'both' });
    });
  }

  /* ---------------- Loader ---------------- */
  var loader = $('#loader'), loadNum = $('#loadNum');
  (function () {
    var start = performance.now(), min = reduce ? 0 : 700, loaded = false, finished = false;
    window.addEventListener('load', function () { loaded = true; });
    setTimeout(function () { loaded = true; }, 4000); // safety
    function tick(t) {
      var p = Math.min((t - start) / (min || 1), 1);
      var shown = loaded ? p : Math.min(p, 0.9);
      loadNum.textContent = Math.round(shown * 100);
      if (shown >= 1 && !finished) { finished = true; done(); return; }
      requestAnimationFrame(tick);
    }
    function done() {
      loader.classList.add('is-done');
      setTimeout(function () { loader.style.display = 'none'; }, reduce ? 0 : 1250);
      setTimeout(function () {
        document.body.classList.remove('is-loading');
        heroIntro();
        if (hasGSAP) ScrollTrigger.refresh();
      }, reduce ? 0 : 550);
    }
    requestAnimationFrame(tick);
    setTimeout(function () { if (!finished) { finished = true; loadNum.textContent = 100; done(); } }, 5000); // hard cap
  })();

  /* ---------------- Smooth scroll (Lenis) ---------------- */
  var lenis = null;
  if (window.Lenis && !reduce) {
    lenis = new Lenis({ lerp: 0.09, smoothWheel: true });
    if (hasGSAP) {
      lenis.on('scroll', ScrollTrigger.update);
      gsap.ticker.add(function (time) { lenis.raf(time * 1000); });
      gsap.ticker.lagSmoothing(0);
    } else {
      (function raf(t) { lenis.raf(t); requestAnimationFrame(raf); })(0);
    }
  }
  function scrollToEl(target) {
    if (lenis) lenis.scrollTo(target, { offset: -40, duration: 1.4 });
    else (typeof target === 'number' ? window.scrollTo({ top: target, behavior: 'smooth' }) : target.scrollIntoView({ behavior: 'smooth' }));
  }
  $$('a[href^="#"]').forEach(function (a) {
    a.addEventListener('click', function (e) {
      var id = a.getAttribute('href');
      if (id === '#') { e.preventDefault(); return; }
      var t = id === '#top' ? 0 : $(id);
      if (t !== null) { e.preventDefault(); scrollToEl(t); }
    });
  });

  /* ---------------- Nav hide/show + progress ---------------- */
  var nav = $('#nav'), bar = $('#progress'), lastY = 0;
  function onScroll() {
    var y = window.scrollY, max = document.documentElement.scrollHeight - innerHeight;
    bar.style.transform = 'scaleX(' + (max > 0 ? y / max : 0) + ')';
    if (!menu.classList.contains('is-open')) nav.classList.toggle('is-hidden', y > lastY && y > 300);
    lastY = y;
    litUpdate(); roadUpdate(); revealCheck();
  }

  /* ---------------- Mobile menu ---------------- */
  var burger = $('#burger'), menu = $('#menu');
  function setMenu(open) {
    burger.setAttribute('aria-expanded', open);
    burger.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    menu.classList.toggle('is-open', open);
    menu.setAttribute('aria-hidden', !open);
    document.body.style.overflow = open ? 'hidden' : '';
    if (lenis) open ? lenis.stop() : lenis.start();
  }
  burger.addEventListener('click', function () { setMenu(burger.getAttribute('aria-expanded') !== 'true'); });
  $$('#menu a').forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') setMenu(false); });

  /* ---------------- Rotating word (gentle fade, no typing) ---------------- */
  (function () {
    var el = $('#rotator'); if (!el || reduce) return;
    var words = ['dump trucks', 'box trucks', 'flatbeds', 'day cabs', 'work trucks'], wi = 0;
    setInterval(function () {
      el.classList.add('is-out');
      setTimeout(function () { wi = (wi + 1) % words.length; el.textContent = words[wi]; el.classList.remove('is-out'); }, 400);
    }, 3200);
  })();

  /* ---------------- AI search → inventory page ---------------- */
  var aiInput = $('#aiInput');
  $('#aiSearch').addEventListener('submit', function (e) {
    e.preventDefault();
    var q = aiInput.value.trim();
    location.href = 'inventory.html' + (q ? '?q=' + encodeURIComponent(q) : '');
  });

  /* ---------------- Featured inventory ---------------- */
  var feat = $('#featGrid');
  if (feat && window.RTS_INVENTORY) {
    feat.innerHTML = window.RTS_INVENTORY.slice(0, 4).map(window.RTS_card).join('');
    // "View truck" opens the truck on the inventory page
    $$('[data-open]', feat).forEach(function (a) { a.removeAttribute('data-open'); });
  }

  /* ---------------- Reveal on scroll ---------------- */
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (en) {
      if (!en.isIntersecting) return;
      var el = en.target, sibs = $$(':scope > .reveal', el.parentElement);
      el.style.transitionDelay = (Math.max(0, sibs.indexOf(el)) % 6) * 90 + 'ms';
      el.classList.add('is-in');
      io.unobserve(el);
    });
  }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });
  var pending = $$('.reveal, .reveal-clip');
  pending.forEach(function (el) { reduce ? el.classList.add('is-in') : io.observe(el); });
  // Fallback: anything that has entered (or been scrolled past) gets revealed
  function revealCheck() {
    if (!pending.length) return;
    var lim = innerHeight * 0.92;
    pending = pending.filter(function (el) {
      if (el.classList.contains('is-in')) return false;
      if (el.getBoundingClientRect().top < lim) { el.classList.add('is-in'); io.unobserve(el); return false; }
      return true;
    });
  }

  /* ---------------- Counters ---------------- */
  var cio = new IntersectionObserver(function (entries) {
    entries.forEach(function (en) {
      if (!en.isIntersecting) return;
      var el = en.target, target = +el.dataset.count, t0 = performance.now(), dur = reduce ? 1 : 2000;
      cio.unobserve(el);
      if (reduce) { el.textContent = target.toLocaleString('en-US'); return; }
      (function f(t) {
        var p = Math.max(0, Math.min((t - t0) / dur, 1));
        el.textContent = Math.round(target * (1 - Math.pow(1 - p, 4))).toLocaleString('en-US');
        if (p < 1) requestAnimationFrame(f);
      })(t0);
    });
  }, { threshold: 0.6 });
  $$('[data-count]').forEach(function (el) { cio.observe(el); });

  /* ---------------- Scroll-lit text ---------------- */
  var lit = $('#litText'), litWords = [];
  if (lit) {
    lit.innerHTML = lit.textContent.trim().split(/\s+/).map(function (w) { return '<span class="w">' + w + '</span>'; }).join(' ');
    litWords = $$('.w', lit);
  }
  function litUpdate() {
    if (!lit) return;
    var r = lit.getBoundingClientRect();
    var p = (innerHeight * 0.85 - r.top) / (r.height + innerHeight * 0.35);
    p = Math.max(0, Math.min(1, p));
    var n = Math.round(p * litWords.length);
    for (var i = 0; i < litWords.length; i++) litWords[i].classList.toggle('on', i < n);
  }

  /* ---------------- Road progress (buyer's guide) ---------------- */
  var road = $('#road'), roadFill = $('#roadFill'), roadTruck = $('#roadTruck');
  function roadUpdate() {
    if (!road) return;
    var r = road.getBoundingClientRect();
    var p = (innerHeight * 0.55 - r.top) / r.height;
    p = Math.max(0, Math.min(1, p));
    roadFill.style.transform = 'scaleY(' + p + ')';
    roadTruck.style.transform = 'translateY(' + (p * (r.height - 58)) + 'px)';
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* ---------------- Horizontal capabilities ---------------- */
  var hs = $('#hscroll'), track = $('#hTrack');
  if (hasGSAP && !reduce) {
    gsap.registerPlugin(ScrollTrigger);
    var mm = gsap.matchMedia();
    mm.add('(min-width: 1025px)', function () {
      var dist = function () { return track.scrollWidth - innerWidth; };
      var tween = gsap.to(track, {
        x: function () { return -dist(); }, ease: 'none',
        scrollTrigger: { trigger: hs, start: 'top top', end: function () { return '+=' + dist(); }, pin: '.hscroll__pin', scrub: 1, invalidateOnRefresh: true, anticipatePin: 1 }
      });
      $$('.cap img', track).forEach(function (img) {
        gsap.fromTo(img, { xPercent: -6 }, { xPercent: 6, ease: 'none', scrollTrigger: { trigger: img.parentElement, containerAnimation: tween, start: 'left right', end: 'right left', scrub: true } });
      });
      return function () { gsap.set(track, { clearProps: 'all' }); };
    });
    mm.add('(max-width: 1024px)', function () { hs.classList.add('is-native'); return function () { hs.classList.remove('is-native'); }; });
    // subtle parallax on story image + hero image
    gsap.to('.hero__media', { yPercent: 18, ease: 'none', scrollTrigger: { trigger: '.hero', start: 'top top', end: 'bottom top', scrub: true } });
    gsap.to('.cta__title', { xPercent: -4, ease: 'none', scrollTrigger: { trigger: '.cta', start: 'top bottom', end: 'bottom top', scrub: true } });
  } else {
    hs.classList.add('is-native');
  }

  /* ---------------- Tabs ---------------- */
  var tabs = $$('.tabs button'), panes = $$('.tabpane'), ink = $('.tabs__ink');
  tabs.forEach(function (t, i) {
    t.addEventListener('click', function () {
      tabs.forEach(function (x, j) { x.setAttribute('aria-selected', i === j); panes[j].classList.toggle('is-active', i === j); });
      ink.style.transform = 'translateX(' + (i * 100) + '%)';
    });
  });
  $$('form[action="#"]').forEach(function (f) { f.addEventListener('submit', function (e) { e.preventDefault(); }); });

  /* ---------------- Assistant: lead-qualifying chat (js/chat.js) ---------------- */
  // Started only when the section scrolls into view, so the first question isn't missed
  var chatEl = $('#chat');
  if (chatEl && window.RTGChat) {
    var started = false, start = function () { if (!started) { started = true; window.RTGChat.mount(chatEl); } };
    if ('IntersectionObserver' in window) {
      var chio = new IntersectionObserver(function (en) { if (en[0].isIntersecting) { start(); chio.disconnect(); } }, { threshold: 0.3 });
      chio.observe(chatEl);
    } else start();
  }

  /* ---------------- Year ---------------- */
  var y = $('#year'); if (y) y.textContent = new Date().getFullYear();
})();
