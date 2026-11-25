/* Step form engine for Value My Trade + Get a Quote (design mock-up; no backend yet).
   Markup contract:
     form.wiz[data-kind][data-company]   > ol.steps > li*   and   section.wstep*  (last one has [data-review])
     fields: [data-label] on inputs/selects/textareas, or on a .seg2 radio group wrapper
     photo slots: label.shot[data-label] > input[type=file]   ([data-required] = must have a photo)
     optional per-step check: window.WIZ_CHECK = { <stepIndex>: function(stepEl){ return true|false } }
   Submissions go to localStorage ("rtg_submissions") + console until the CRM / Skeye hookup is decided. */
(function () {
  'use strict';
  var form = document.querySelector('form.wiz'); if (!form) return;
  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var esc = function (s) { return String(s).replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; }); };
  var steps = $$('.wstep', form), dots = $$('.steps li', form), cur = 0;
  var prev = $('[data-prev]', form), next = $('[data-next]', form), submit = $('[data-submit]', form);

  function show(i, initial) {
    cur = i;
    steps.forEach(function (s, j) { s.classList.toggle('is-on', j === i); });
    dots.forEach(function (d, j) { d.classList.toggle('is-on', j === i); d.classList.toggle('is-done', j < i); if (j === i) d.setAttribute('aria-current', 'step'); else d.removeAttribute('aria-current'); });
    prev.hidden = i === 0; next.hidden = i === steps.length - 1; submit.hidden = i !== steps.length - 1;
    if (steps[i].hasAttribute('data-review')) buildReview();
    if (initial) return;
    var top = form.getBoundingClientRect().top + window.scrollY - 110;
    if (window.scrollY > top) window.scrollTo({ top: top, behavior: 'smooth' });
    var h = $('h2', steps[i]); if (h) { h.setAttribute('tabindex', '-1'); h.focus({ preventScroll: true }); }
  }

  function bad(el, on) { var ff = el.closest('.ff, .shot'); if (ff) ff.classList.toggle('is-bad', on); }

  function validate(i) {
    var step = steps[i], first = null;
    $$('input, select, textarea', step).forEach(function (f) {
      if (f.type === 'file' || f.type === 'radio' || f.type === 'checkbox') return;
      var v = f.value.trim(), wrong = false;
      if (f.required && !v) wrong = true;
      else if (v && f.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) wrong = true;
      else if (v && f.type === 'tel' && v.replace(/\D/g, '').length < 10) wrong = true;
      else if (v && f.pattern && !new RegExp('^(?:' + f.pattern + ')$').test(v)) wrong = true;
      bad(f, wrong); if (wrong && !first) first = f;
    });
    $$('.seg2[data-required]', step).forEach(function (g) {
      var ok = !!$('input:checked', g); g.closest('.ff').classList.toggle('is-bad', !ok); if (!ok && !first) first = $('input', g);
    });
    $$('.shot[data-required]', step).forEach(function (s) {
      var ok = s.classList.contains('has-img'); s.classList.toggle('is-bad', !ok); if (!ok && !first) first = $('input', s);
    });
    $$('input[type=checkbox][required]', step).forEach(function (c) { bad(c, !c.checked); if (!c.checked && !first) first = c; });
    if (window.WIZ_CHECK && window.WIZ_CHECK[i] && !window.WIZ_CHECK[i](step) && !first) first = step;
    if (first) { if (first.focus && first !== step) first.focus(); return false; }
    return true;
  }
  form.addEventListener('input', function (e) { var ff = e.target.closest('.ff'); if (ff) ff.classList.remove('is-bad'); });
  form.addEventListener('change', function (e) { var ff = e.target.closest('.ff'); if (ff) ff.classList.remove('is-bad'); });

  next.addEventListener('click', function () { if (validate(cur)) show(cur + 1); });
  prev.addEventListener('click', function () { show(cur - 1); });

  /* Photo slots with preview */
  $$('.shot input[type=file]', form).forEach(function (inp) {
    inp.addEventListener('change', function () {
      var slot = inp.closest('.shot'), f = inp.files && inp.files[0];
      var old = $('img', slot); if (old) old.remove();
      slot.classList.remove('has-img', 'is-bad');
      if (!f) return;
      if (inp.multiple && inp.files.length > 1) {
        slot.classList.add('has-img'); slot.setAttribute('data-label', inp.files.length + ' photos added');
      } else slot.setAttribute('data-label', slot.dataset.name);
      if (/^image\//.test(f.type)) {
        var img = document.createElement('img'); img.alt = '';
        img.src = URL.createObjectURL(f);
        slot.appendChild(img);
      }
      slot.classList.add('has-img');
    });
  });
  $$('.shot', form).forEach(function (s) { s.dataset.name = s.getAttribute('data-label'); });

  /* Review */
  function collect() {
    var out = [];
    steps.forEach(function (s) {
      if (s.hasAttribute('data-review')) return;
      $$('[data-label]', s).forEach(function (f) {
        var label = f.getAttribute('data-label'), v = '';
        if (f.classList.contains('shot')) return;
        if (f.classList.contains('seg2')) { var c = $('input:checked', f); v = c ? c.value : ''; }
        else if (f.type === 'file') v = f.files && f.files.length ? f.files.length + ' file' + (f.files.length > 1 ? 's' : '') : '';
        else v = f.value.trim();
        if (v) out.push([label, v]);
      });
      var shots = $$('.shot.has-img', s).length;
      if ($$('.shot', s).length) out.push(['Photos', shots + ' added']);
    });
    return out;
  }
  function buildReview() {
    $('[data-review-list]', form).innerHTML = collect().map(function (r) { return '<dt>' + esc(r[0]) + '</dt><dd>' + esc(r[1]) + '</dd>'; }).join('');
  }
  $$('[data-goto]', form).forEach(function (b) { b.addEventListener('click', function () { show(+b.dataset.goto); }); });

  /* Submit */
  form.addEventListener('submit', function (e) {
    e.preventDefault();
    if (!validate(cur)) return;
    var ref = (form.dataset.kind === 'trade' ? 'TR-' : 'QT-') + Date.now().toString(36).toUpperCase().slice(-6);
    var data = { kind: form.dataset.kind, ref: ref, at: new Date().toISOString(), routedTo: form.dataset.company, fields: collect() };
    try { var all = JSON.parse(localStorage.getItem('rtg_submissions') || '[]'); all.push(data); localStorage.setItem('rtg_submissions', JSON.stringify(all)); } catch (err) { /* storage unavailable */ }
    if (window.console) console.info('[RTG submission]', data);
    var name = ($('[name=first]', form) || {}).value || '';
    var done = $('#done');
    $('[data-name]', done).textContent = name ? ', ' + name : '';
    $('[data-ref]', done).textContent = 'Reference ' + ref;
    form.hidden = true; done.hidden = false;
    done.setAttribute('tabindex', '-1'); done.focus();
    window.scrollTo({ top: done.getBoundingClientRect().top + window.scrollY - 140, behavior: 'smooth' });
  });

  show(0, true);
})();
