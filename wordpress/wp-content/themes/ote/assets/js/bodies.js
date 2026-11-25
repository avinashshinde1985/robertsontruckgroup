/* OTE body inventory page: easy-pick type buttons + left filter menu sharing one filter state,
   capability cards woven into the results, and a body detail dialog that leads to the install quote. */
(function () {
  'use strict';
  var INV = window.OTE_BODIES || [], TYPES = window.OTE_TYPES || [];
  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var money = function (n) { return '$' + n.toLocaleString('en-US'); };
  var esc = function (s) { return String(s).replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; }); };
  var uniq = function (k) { return INV.map(function (b) { return b[k]; }).filter(function (v, i, a) { return a.indexOf(v) === i; }).sort(); };
  var R = (window.RTG_PATHS && window.RTG_PATHS.rts) || '../rts/', O = (window.RTG_PATHS && window.RTG_PATHS.ote) || '';

  var state = blank();
  function blank() { return { kw: '', ca: '', types: [], brands: [], mats: [], conds: [], lmin: '', lmax: '', price: '' }; }
  var keyMap = { type: 'types', brand: 'brands', mat: 'mats', cond: 'conds' };

  /* ---------- Build controls ---------- */
  window.OTE_picks($('#picks'), { button: true });

  function checks(wrap, name, list, label) {
    wrap.innerHTML = list.map(function (v) {
      var n = INV.filter(function (b) { return b[name] === v; }).length;
      return '<label class="fcheck"><input type="checkbox" value="' + esc(v) + '" data-k="' + name + '">' + esc(label ? label(v) : v) + '<small>' + n + '</small></label>';
    }).join('');
  }
  checks($('#fType'), 'type', TYPES.map(function (t) { return t.k; }), function (k) { return window.OTE_type(k).label; });
  checks($('#fBrand'), 'brand', uniq('brand'));
  checks($('#fMat'), 'mat', uniq('mat'));
  checks($('#fCond'), 'cond', ['New', 'Used']);
  var lens = uniq('len').sort(function (a, b) { return a - b; });
  var lOpts = lens.map(function (l) { return '<option value="' + l + '">' + l + ' ft</option>'; }).join('');
  $('#fLmin').innerHTML = '<option value="">Min</option>' + lOpts;
  $('#fLmax').innerHTML = '<option value="">Max</option>' + lOpts;

  function readUI() {
    state.kw = $('#fKw').value.trim();
    state.ca = $('#fCa').value.trim();
    state.types = []; state.brands = []; state.mats = []; state.conds = [];
    $$('.filters input[type=checkbox][data-k]').forEach(function (c) { if (c.checked) state[keyMap[c.dataset.k]].push(c.value); });
    state.lmin = $('#fLmin').value; state.lmax = $('#fLmax').value;
    state.price = $('#fPrice').value;
  }
  function writeUI() {
    $('#fKw').value = state.kw; $('#fCa').value = state.ca;
    $$('.filters input[type=checkbox][data-k]').forEach(function (c) { c.checked = state[keyMap[c.dataset.k]].indexOf(c.value) > -1; });
    $('#fLmin').value = state.lmin; $('#fLmax').value = state.lmax; $('#fPrice').value = state.price;
  }

  /* ---------- Filter + render ---------- */
  function match(b) {
    var s = state;
    if (s.types.length && s.types.indexOf(b.type) < 0) return false;
    if (s.brands.length && s.brands.indexOf(b.brand) < 0) return false;
    if (s.mats.length && s.mats.indexOf(b.mat) < 0) return false;
    if (s.conds.length && s.conds.indexOf(b.cond) < 0) return false;
    if (s.lmin && b.len < +s.lmin) return false;
    if (s.lmax && b.len > +s.lmax) return false;
    if (s.price && (!b.price || b.price > +s.price)) return false;
    if (s.ca && +s.ca > 0 && b.ca && b.ca > +s.ca) return false;
    if (s.kw) {
      var hay = [b.stock, b.type, window.OTE_type(b.type).label, b.brand, b.model, b.len + ' ft', b.len + 'ft', b.mat, b.cond, b.tags.join(' ')].join(' ').toLowerCase();
      var ok = s.kw.toLowerCase().replace(/[-']/g, ' ').split(/\s+/).filter(Boolean).every(function (w) { return hay.replace(/[-']/g, ' ').indexOf(w) > -1; });
      if (!ok) return false;
    }
    return true;
  }
  var typeOrder = TYPES.map(function (t) { return t.k; });
  var sorters = {
    type: function (a, b) { return typeOrder.indexOf(a.type) - typeOrder.indexOf(b.type) || a.len - b.len; },
    plow: function (a, b) { return (a.price || 1e9) - (b.price || 1e9); },
    phigh: function (a, b) { return (b.price || 0) - (a.price || 0); },
    len: function (a, b) { return a.len - b.len; }
  };

  /* Capability cards keep "what we can install" in front of the shopper between bodies */
  var CAPS = [
    { k: 'Capabilities', h: 'Body too long for your truck?', p: 'We stretch and shorten frames and change wheelbases so the body you want fits.', a: R + 'capabilities/', l: 'See capabilities' },
    { k: 'Need a truck too?', h: 'Pick a chassis, we build it out.', p: 'Choose a cab & chassis from Robertson Truck Sales and we install the body before delivery.', a: R + 'inventory/?type=' + encodeURIComponent('Cab & Chassis'), l: 'Shop cab & chassis' },
    { k: 'Not sure what fits?', h: 'Measure once, quote right.', p: 'Your wheelbase and cab-to-axle tell us which bodies fit. It takes five minutes.', a: O + 'tutorials/#wheelbase', l: 'How to measure' }
  ];
  function capCard(i) {
    var c = CAPS[i % CAPS.length];
    return '<aside class="capcard"><div><div class="capcard__k">' + c.k + '</div><h3>' + c.h + '</h3><p>' + c.p + '</p></div>' +
      '<a href="' + c.a + '" class="btn btn--white btn--sm"><span>' + c.l + '</span></a></aside>';
  }

  function render() {
    var list = INV.filter(match).sort(sorters[$('#sort').value]);
    var html = '', capN = 0;
    list.forEach(function (b, i) {
      html += window.OTE_card(b);
      if ((i + 1) % 6 === 0 && i < list.length - 1) html += capCard(capN++);
    });
    if (list.length) html += capCard(capN);
    $('#results').innerHTML = html;
    $('#empty').hidden = list.length > 0;
    $('#count').innerHTML = '<b>' + list.length + '</b> of ' + INV.length + ' bodies &amp; equipment' + (state.ca ? ' · fits ' + esc(state.ca) + '" CA' : '');
    $$('#picks .pick[data-type]').forEach(function (p) { p.setAttribute('aria-pressed', state.types.length === 1 && state.types[0] === p.dataset.type); });
    renderChips();
  }

  function renderChips() {
    var chips = [], s = state;
    if (s.kw) chips.push(['kw', '"' + s.kw + '"']);
    if (s.ca) chips.push(['ca', 'Fits ' + s.ca + '" CA']);
    s.types.forEach(function (v) { chips.push(['types', window.OTE_type(v).label, v]); });
    s.brands.forEach(function (v) { chips.push(['brands', v, v]); });
    s.mats.forEach(function (v) { chips.push(['mats', v, v]); });
    s.conds.forEach(function (v) { chips.push(['conds', v, v]); });
    if (s.lmin) chips.push(['lmin', s.lmin + ' ft or longer']);
    if (s.lmax) chips.push(['lmax', s.lmax + ' ft or shorter']);
    if (s.price) chips.push(['price', 'Under ' + money(+s.price)]);
    $('#active').innerHTML = chips.map(function (c) {
      return '<button type="button" data-k="' + c[0] + '"' + (c[2] ? ' data-v="' + esc(c[2]) + '"' : '') + ' aria-label="Remove filter ' + esc(c[1]) + '">' + esc(c[1]) + ' ×</button>';
    }).join('');
  }
  $('#active').addEventListener('click', function (e) {
    var b = e.target.closest('button'); if (!b) return;
    var k = b.dataset.k;
    if (Array.isArray(state[k])) state[k] = state[k].filter(function (v) { return v !== b.dataset.v; });
    else state[k] = '';
    writeUI(); render();
  });

  /* Easy picks: one click shows that type; clicking the active one shows everything again */
  $('#picks').addEventListener('click', function (e) {
    var p = e.target.closest('.pick[data-type]'); if (!p) return;
    var k = p.dataset.type, on = state.types.length === 1 && state.types[0] === k;
    state.types = on ? [] : [k];
    writeUI(); render();
    var bar = $('.invp__bar');
    if (!on && bar.getBoundingClientRect().top > innerHeight * 0.6) window.scrollTo({ top: bar.getBoundingClientRect().top + scrollY - 110, behavior: 'smooth' });
  });

  $('#filters').addEventListener('input', function () { readUI(); render(); });
  $('#filters').addEventListener('change', function () { readUI(); render(); });
  $('#sort').addEventListener('change', render);
  $('#fReset').addEventListener('click', function () { state = blank(); writeUI(); render(); });

  /* ---------- Body detail ---------- */
  var dlg = $('#tdlg');
  function openBody(b) {
    var t = window.OTE_type(b.type), install = t && t.install;
    $('#tdBody').innerHTML =
      '<div class="tdlg__img"><img src="' + b.img + '" alt="' + esc(b.brand + ' ' + b.model) + '"></div>' +
      '<div class="tdlg__body">' +
        '<div class="tag" style="margin:0">' + b.type + ' · Stock #' + b.stock + '</div>' +
        '<h2 id="tdTitle">' + esc(b.brand + ' ' + b.model) + '</h2>' +
        '<div class="tcard__price">' + window.OTE_price(b) + (b.price ? '<small>body only, install quoted separately</small>' : '') + '</div>' +
        '<dl><dt>Length</dt><dd>' + b.len + ' ft</dd><dt>Material</dt><dd>' + b.mat + '</dd><dt>Condition</dt><dd>' + b.cond + '</dd>' +
          (b.ca ? '<dt>Fits</dt><dd>' + b.ca + ' in cab-to-axle or more</dd>' : '') +
          '<dt>Features</dt><dd>' + esc(b.tags.join(', ')) + '</dd></dl>' +
        '<div class="tdlg__acts">' +
          (install
            ? '<a class="btn btn--red" href="' + window.OTE_quoteHref(b) + '"><span>Get a Quote to Install This Body</span></a>' +
              '<a class="btn btn--line" href="tel:7408306488"><span>Talk to an upfit specialist · 740-830-6488</span></a>' +
              '<a class="btn btn--line" href="' + R + 'inventory/?type=' + encodeURIComponent('Cab & Chassis') + '"><span>Need a truck for it? Shop cab &amp; chassis</span></a>'
            : '<a class="btn btn--red" href="tel:7408306488"><span>Check availability · 740-830-6488</span></a>') +
        '</div>' +
        (install
          ? '<ol class="bsteps"><li><span>Measure your wheelbase and cab-to-axle. <a href="' + O + 'tutorials/#wheelbase">How to measure</a></span></li><li><span>Snap 3 photos: driver side, frame behind the cab, door sticker.</span></li><li><span>A rep confirms the fit and quotes the install.</span></li></ol>'
          : '') +
      '</div>';
    if (dlg.showModal) dlg.showModal(); else dlg.setAttribute('open', '');
  }
  function closeBody() { if (dlg.close) dlg.close(); else dlg.removeAttribute('open'); if (location.hash) history.replaceState(null, '', location.pathname + location.search); }
  $('#tdX').addEventListener('click', closeBody);
  dlg.addEventListener('click', function (e) { if (e.target === dlg) closeBody(); });
  $('#results').addEventListener('click', function (e) {
    var a = e.target.closest('[data-open]'); if (!a) return;
    e.preventDefault();
    var b = INV.filter(function (x) { return x.id === +a.dataset.open; })[0];
    if (b) { history.replaceState(null, '', '#stock-' + b.stock); openBody(b); }
  });

  /* ---------- Mobile filter drawer ---------- */
  var filters = $('#filters');
  function drawer(open) { filters.classList.toggle('is-open', open); document.body.style.overflow = open ? 'hidden' : ''; }
  $('#fOpen').addEventListener('click', function () { drawer(true); });
  $('#fDone').addEventListener('click', function () { drawer(false); });
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') drawer(false); });

  /* ---------- Initial state from URL (?type=, ?q=, ?ca=, #stock-) ---------- */
  var params = new URLSearchParams(location.search);
  if (params.get('type') && typeOrder.indexOf(params.get('type')) > -1) state.types = [params.get('type')];
  if (params.get('q')) state.kw = params.get('q');
  if (params.get('ca')) state.ca = params.get('ca').replace(/\D/g, '');
  writeUI(); render();
  var hm = location.hash.match(/^#stock-(.+)$/);
  if (hm) {
    var b = INV.filter(function (x) { return x.stock === hm[1]; })[0];
    if (b) openBody(b);
  }
})();
