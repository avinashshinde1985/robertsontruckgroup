(function () {
  'use strict';
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- Hero ticker synced with the slider ---------- */
  var ticker = document.getElementById('ticker');
  var slides = document.querySelectorAll('.hero__slide[data-caption]');
  if (ticker && slides.length && 'MutationObserver' in window) {
    var mo = new MutationObserver(function () {
      var active = document.querySelector('.hero__slide.is-active');
      if (!active || ticker.textContent === active.dataset.caption) return;
      ticker.classList.add('is-out');
      setTimeout(function () { ticker.textContent = active.dataset.caption; ticker.classList.remove('is-out'); }, reduce ? 0 : 350);
    });
    slides.forEach(function (s) { mo.observe(s, { attributes: true, attributeFilter: ['class'] }); });
  }

  /* ---------- Careers parallax ---------- */
  var cbg = document.querySelector('.careers__bg');
  if (cbg && !reduce) {
    var ticking = false;
    var para = function () {
      var r = cbg.parentElement.getBoundingClientRect(), vh = window.innerHeight;
      if (r.bottom > 0 && r.top < vh) cbg.style.transform = 'translate3d(0,' + ((r.top + r.height / 2 - vh / 2) / vh * -10) + '%,0)';
      ticking = false;
    };
    window.addEventListener('scroll', function () { if (!ticking) { requestAnimationFrame(para); ticking = true; } }, { passive: true });
    para();
  }

  /* ---------- Contact form ---------- */
  var form = document.getElementById('cform');
  if (!form) return;
  var sent = document.getElementById('sent');
  var deptOut = document.getElementById('deptOut');
  var phone = document.getElementById('f-phone');
  var zip = document.getElementById('f-zip');
  var msg = document.getElementById('f-msg');
  var count = document.getElementById('msgCount');
  var btn = form.querySelector('.cform__btn');
  var fields = Array.prototype.slice.call(form.querySelectorAll('.field input, .field textarea'));

  function dept() { var c = form.querySelector('input[name="Department"]:checked'); return c ? c.value : ''; }
  form.addEventListener('change', function (e) { if (e.target.name === 'Department') deptOut.textContent = dept(); });

  // (740) 397-4969 formatting as the user types
  phone.addEventListener('input', function () {
    var d = phone.value.replace(/\D/g, '').slice(0, 10), out = d;
    if (d.length > 6) out = '(' + d.slice(0, 3) + ') ' + d.slice(3, 6) + '-' + d.slice(6);
    else if (d.length > 3) out = '(' + d.slice(0, 3) + ') ' + d.slice(3);
    phone.value = out;
  });
  zip.addEventListener('input', function () { zip.value = zip.value.replace(/\D/g, '').slice(0, 5); });
  msg.addEventListener('input', function () { count.textContent = msg.value.length; });

  function check(el, show) {
    var f = el.closest('.field');
    if (el.value.trim() !== el.value && el.type !== 'textarea') el.value = el.value.trim();
    var ok = el.checkValidity() && (!el.required || el.value.trim() !== '');
    if (show) {
      f.classList.toggle('is-invalid', !ok);
      f.classList.toggle('is-valid', ok && el.value !== '');
      el.setAttribute('aria-invalid', !ok);
    }
    return ok;
  }
  fields.forEach(function (el) {
    var err = el.parentElement.querySelector('.field__err');
    if (err) { err.id = el.id + '-err'; el.setAttribute('aria-describedby', err.id); }
    el.addEventListener('blur', function () { if (el.value !== '' || el.closest('.field').classList.contains('is-invalid')) check(el, true); });
    el.addEventListener('input', function () { if (el.closest('.field').classList.contains('is-invalid')) check(el, true); });
  });

  function showSent() {
    var name = (document.getElementById('f-name').value.trim().split(/\s+/)[0]) || 'there';
    document.getElementById('sentName').textContent = name;
    document.getElementById('sentDept').textContent = dept();
    form.hidden = true;
    sent.hidden = false;
    sent.focus();
    sent.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'center' });
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    var firstBad = null;
    fields.forEach(function (el) {
      var f = el.closest('.field');
      f.classList.remove('is-invalid'); void f.offsetWidth; // restart shake
      if (!check(el, true) && !firstBad) firstBad = el;
    });
    if (firstBad) { firstBad.focus(); return; }

    btn.classList.add('is-loading');
    btn.querySelector('span').textContent = 'Sending…';
    var done = function () { btn.classList.remove('is-loading'); btn.querySelector('span').textContent = 'Send Message'; };

    // Set the form's action to the real endpoint (e.g. the Contact Form 7 REST URL) to submit for real.
    var endpoint = form.getAttribute('action');
    if (endpoint && endpoint !== '#') {
      fetch(endpoint, { method: 'POST', body: new FormData(form) })
        .then(function (r) { if (!r.ok) throw new Error(r.status); done(); showSent(); })
        .catch(function () { done(); alert('Sorry, your message could not be sent. Please call 740-397-4969.'); });
    } else {
      setTimeout(function () { done(); showSent(); }, 1100); // static preview: no backend wired yet
    }
  });

  document.getElementById('sentAgain').addEventListener('click', function () {
    form.reset();
    count.textContent = '0';
    deptOut.textContent = dept();
    fields.forEach(function (el) { el.closest('.field').classList.remove('is-valid', 'is-invalid'); el.removeAttribute('aria-invalid'); });
    sent.hidden = true;
    form.hidden = false;
    document.getElementById('f-name').focus();
  });
})();
