(function () {
  'use strict';
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- Sticky header + back-to-top ---------- */
  var header = document.getElementById('header');
  var totop = document.getElementById('totop');
  function onScroll() {
    var y = window.scrollY;
    header.classList.toggle('is-scrolled', y > 20);
    totop.classList.toggle('is-visible', y > 700);
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
  totop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: reduce ? 'auto' : 'smooth' }); });

  /* ---------- Mobile menu ---------- */
  var burger = document.getElementById('burger');
  var nav = document.getElementById('nav');
  function setMenu(open) {
    burger.setAttribute('aria-expanded', open);
    burger.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    nav.classList.toggle('is-open', open);
    header.classList.toggle('menu-open', open);
    document.body.classList.toggle('no-scroll', open);
  }
  burger.addEventListener('click', function () { setMenu(burger.getAttribute('aria-expanded') !== 'true'); });
  nav.addEventListener('click', function (e) { if (e.target.closest('a')) setMenu(false); });
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') setMenu(false); });
  window.addEventListener('resize', function () { if (window.innerWidth > 1024) setMenu(false); });

  /* ---------- Hero slider ---------- */
  var slides = document.querySelectorAll('.hero__slide');
  var dotsWrap = document.getElementById('heroDots');
  var current = 0, timer;
  if (slides.length && dotsWrap) {
  slides.forEach(function (_, i) {
    var b = document.createElement('button');
    b.type = 'button';
    b.setAttribute('aria-label', 'Show slide ' + (i + 1));
    b.addEventListener('click', function () { go(i); });
    dotsWrap.appendChild(b);
  });
  var dots = dotsWrap.querySelectorAll('button');
  function go(i) {
    slides[current].classList.remove('is-active');
    dots[current].classList.remove('is-active');
    current = (i + slides.length) % slides.length;
    slides[current].classList.add('is-active');
    void dots[current].offsetWidth; // restart progress animation
    dots[current].classList.add('is-active');
    clearTimeout(timer);
    if (!reduce) timer = setTimeout(function () { go(current + 1); }, 6000);
  }
  go(0);
  }

  /* ---------- Scroll reveal ---------- */
  var reveals = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && !reduce) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (!en.isIntersecting) return;
        var el = en.target;
        var sibs = Array.prototype.filter.call(el.parentElement.children, function (c) { return c.classList.contains('reveal'); });
        el.style.transitionDelay = Math.min(sibs.indexOf(el), 5) * 90 + 'ms';
        el.classList.add('is-in');
        io.unobserve(el);
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    reveals.forEach(function (el) { io.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add('is-in'); });
  }

  /* ---------- Counters ---------- */
  var counters = document.querySelectorAll('[data-count]');
  function fmt(n) { return n.toLocaleString('en-US'); }
  function count(el) {
    var target = +el.dataset.count;
    if (reduce) { el.textContent = fmt(target); return; }
    var start = performance.now(), dur = 1800;
    (function step(t) {
      var p = Math.min((t - start) / dur, 1);
      el.textContent = fmt(Math.round(target * (1 - Math.pow(1 - p, 4))));
      if (p < 1) requestAnimationFrame(step);
    })(start);
  }
  if ('IntersectionObserver' in window) {
    var cio = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) { if (en.isIntersecting) { count(en.target); cio.unobserve(en.target); } });
    }, { threshold: 0.5 });
    counters.forEach(function (c) { cio.observe(c); });
  } else {
    counters.forEach(function (c) { c.textContent = fmt(+c.dataset.count); });
  }

  /* ---------- Products carousel ---------- */
  var car = document.getElementById('carousel');
  if (car) {
  document.querySelectorAll('.cbtn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var card = car.querySelector('.pcard');
      var step = card ? card.getBoundingClientRect().width + 24 : 360;
      car.scrollBy({ left: step * +btn.dataset.dir, behavior: reduce ? 'auto' : 'smooth' });
    });
  });
  // drag to scroll on desktop
  var down = false, sx = 0, sl = 0, moved = false;
  car.addEventListener('pointerdown', function (e) {
    if (e.pointerType !== 'mouse') return;
    down = true; moved = false; sx = e.clientX; sl = car.scrollLeft;
    car.style.scrollSnapType = 'none'; car.style.cursor = 'grabbing';
  });
  window.addEventListener('pointermove', function (e) {
    if (!down) return;
    var dx = e.clientX - sx;
    if (Math.abs(dx) > 4) moved = true;
    car.scrollLeft = sl - dx;
  });
  window.addEventListener('pointerup', function () {
    if (!down) return;
    down = false; car.style.scrollSnapType = ''; car.style.cursor = '';
  });
  car.addEventListener('click', function (e) { if (moved) { e.preventDefault(); e.stopPropagation(); } }, true);
  car.addEventListener('dragstart', function (e) { e.preventDefault(); });
  }

  /* ---------- Parallax (upfit section) ---------- */
  var pbg = document.querySelector('.upfit__bg');
  if (pbg && !reduce) {
    var sec = pbg.parentElement, ticking = false;
    function para() {
      var r = sec.getBoundingClientRect();
      if (r.bottom > 0 && r.top < window.innerHeight) {
        var p = (r.top + r.height / 2 - window.innerHeight / 2) / window.innerHeight;
        pbg.style.transform = 'translate3d(0,' + (p * -12) + '%,0)';
      }
      ticking = false;
    }
    window.addEventListener('scroll', function () { if (!ticking) { requestAnimationFrame(para); ticking = true; } }, { passive: true });
    para();
  }

  /* ---------- Year ---------- */
  var y = document.getElementById('year');
  if (y) y.textContent = new Date().getFullYear();
})();
