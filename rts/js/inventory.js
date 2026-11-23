/* Inventory page: AI (plain-English) search + fixed left filter menu, sharing one filter state.
   The "AI" parser here is rule-based so the mock-up works offline; in production the same
   state object would be filled by an LLM call against the live inventory feed. */
(function () {
  'use strict';
  var INV = window.RTS_INVENTORY || [], TYPES = window.RTS_TYPES || [];
  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };
  var money = function (n) { return '$' + n.toLocaleString('en-US'); };
  var esc = function (s) { return String(s).replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; }); };

  var MAKES = INV.map(function (t) { return t.make; }).filter(function (m, i, a) { return a.indexOf(m) === i; }).sort();
  var YEARS = INV.map(function (t) { return t.year; });
  var Y0 = Math.min.apply(null, YEARS), Y1 = Math.max.apply(null, YEARS);

  var state = blank();
  function blank() { return { kw: '', types: [], makes: [], duty: [], ymin: '', ymax: '', price: '', miles: '', noncdl: false }; }

  /* ---------- Build filter controls ---------- */
  function checks(wrap, name, list) {
    wrap.innerHTML = list.map(function (v) {
      var n = INV.filter(function (t) { return t[name] === v; }).length;
      return '<label class="fcheck"><input type="checkbox" value="' + esc(v) + '" data-k="' + name + '">' + esc(v) + '<small>' + n + '</small></label>';
    }).join('');
  }
  checks($('#fType'), 'type', TYPES);
  checks($('#fMake'), 'make', MAKES);
  checks($('#fDuty'), 'duty', ['Medium', 'Heavy']);
  var yOpts = ''; for (var y = Y1; y >= Y0; y--) yOpts += '<option value="' + y + '">' + y + '</option>';
  $('#fYmin').innerHTML = '<option value="">From</option>' + yOpts;
  $('#fYmax').innerHTML = '<option value="">To</option>' + yOpts;

  var keyMap = { type: 'types', make: 'makes', duty: 'duty' };

  function readUI() {
    state.kw = $('#fKw').value.trim();
    state.types = []; state.makes = []; state.duty = [];
    $$('.filters input[type=checkbox][data-k]').forEach(function (c) { if (c.checked) state[keyMap[c.dataset.k]].push(c.value); });
    state.ymin = $('#fYmin').value; state.ymax = $('#fYmax').value;
    state.price = $('#fPrice').value; state.miles = $('#fMiles').value;
    state.noncdl = $('#fNonCdl').checked;
  }
  function writeUI() {
    $('#fKw').value = state.kw;
    $$('.filters input[type=checkbox][data-k]').forEach(function (c) { c.checked = state[keyMap[c.dataset.k]].indexOf(c.value) > -1; });
    $('#fYmin').value = state.ymin; $('#fYmax').value = state.ymax;
    setSel($('#fPrice'), state.price, function (v) { return 'Under ' + money(+v); });
    setSel($('#fMiles'), state.miles, function (v) { return 'Under ' + (+v).toLocaleString('en-US'); });
    $('#fNonCdl').checked = state.noncdl;
  }
  // AI search can ask for values the dropdown does not list (e.g. $130k): add them so the UI stays in sync
  function setSel(sel, v, label) {
    if (v && !$$('option', sel).some(function (o) { return o.value === v; })) {
      var o = document.createElement('option'); o.value = v; o.textContent = label(v); sel.appendChild(o);
    }
    sel.value = v;
  }

  /* ---------- Filter + render ---------- */
  function match(t) {
    var s = state;
    if (s.types.length && s.types.indexOf(t.type) < 0) return false;
    if (s.makes.length && s.makes.indexOf(t.make) < 0) return false;
    if (s.duty.length && s.duty.indexOf(t.duty) < 0) return false;
    if (s.ymin && t.year < +s.ymin) return false;
    if (s.ymax && t.year > +s.ymax) return false;
    if (s.price && t.price > +s.price) return false;
    if (s.miles && t.miles > +s.miles) return false;
    if (s.noncdl && t.gvwr > 26000) return false;
    if (s.kw) {
      var hay = [t.stock, t.year, t.make, t.model, t.type, t.engine, t.trans, t.tags.join(' ')].join(' ').toLowerCase();
      var ok = s.kw.toLowerCase().split(/\s+/).every(function (w) { return hay.indexOf(w) > -1; });
      if (!ok) return false;
    }
    return true;
  }
  var sorters = {
    'new': function (a, b) { return b.year - a.year || a.miles - b.miles; },
    plow: function (a, b) { return a.price - b.price; },
    phigh: function (a, b) { return b.price - a.price; },
    miles: function (a, b) { return a.miles - b.miles; }
  };

  function render() {
    var list = INV.filter(match).sort(sorters[$('#sort').value]);
    $('#results').innerHTML = list.map(window.RTS_card).join('');
    $('#empty').hidden = list.length > 0;
    $('#count').innerHTML = '<b>' + list.length + '</b> of ' + INV.length + ' trucks';
    renderChips();
  }

  function renderChips() {
    var chips = [], s = state;
    if (s.kw) chips.push(['kw', '"' + s.kw + '"']);
    s.types.forEach(function (v) { chips.push(['types', v, v]); });
    s.makes.forEach(function (v) { chips.push(['makes', v, v]); });
    s.duty.forEach(function (v) { chips.push(['duty', v + ' duty', v]); });
    if (s.ymin) chips.push(['ymin', s.ymin + ' or newer']);
    if (s.ymax) chips.push(['ymax', s.ymax + ' or older']);
    if (s.price) chips.push(['price', 'Under ' + money(+s.price)]);
    if (s.miles) chips.push(['miles', 'Under ' + (+s.miles).toLocaleString('en-US') + ' mi']);
    if (s.noncdl) chips.push(['noncdl', 'Non-CDL']);
    $('#active').innerHTML = chips.map(function (c) {
      return '<button type="button" data-k="' + c[0] + '"' + (c[2] ? ' data-v="' + esc(c[2]) + '"' : '') + ' aria-label="Remove filter ' + esc(c[1]) + '">' + esc(c[1]) + ' ×</button>';
    }).join('');
  }
  $('#active').addEventListener('click', function (e) {
    var b = e.target.closest('button'); if (!b) return;
    var k = b.dataset.k;
    if (Array.isArray(state[k])) state[k] = state[k].filter(function (v) { return v !== b.dataset.v; });
    else state[k] = k === 'noncdl' ? false : '';
    writeUI(); render(); $('#aiNote').textContent = '';
  });

  $('#filters').addEventListener('input', function () { readUI(); render(); });
  $('#filters').addEventListener('change', function () { readUI(); render(); });
  $('#sort').addEventListener('change', render);
  $('#fReset').addEventListener('click', function () { state = blank(); writeUI(); render(); $('#aiNote').textContent = ''; });

  /* ---------- Plain-English search ---------- */
  var TYPE_WORDS = [
    [/dump/i, 'Dump Truck'], [/box|van truck|straight truck/i, 'Box Truck'], [/flat ?bed|stake/i, 'Flatbed'],
    [/day ?cab|tractor|semi/i, 'Day Cab'], [/sleeper|long haul|otr/i, 'Sleeper'],
    [/chassis|upfit|bare/i, 'Cab & Chassis'], [/rollback|roll back|wrecker|tow|car carrier/i, 'Rollback']
  ];
  function num(s) { var n = parseFloat(s.replace(/[,$]/g, '')); if (/k$/i.test(s)) n *= 1000; return n; }

  function parse(q) {
    var s = blank(), said = [];
    TYPE_WORDS.forEach(function (p) { if (p[0].test(q) && s.types.indexOf(p[1]) < 0) { s.types.push(p[1]); said.push(p[1].toLowerCase() + 's'); } });
    MAKES.forEach(function (m) { if (new RegExp('\\b' + m.split(' ')[0], 'i').test(q)) { s.makes.push(m); said.push(m); } });
    if (/\bheavy/i.test(q)) { s.duty.push('Heavy'); said.push('heavy duty'); }
    if (/\bmedium/i.test(q)) { s.duty.push('Medium'); said.push('medium duty'); }
    if (/non[- ]?cdl|no cdl|without a cdl/i.test(q)) { s.noncdl = true; said.push('non-CDL'); }

    var mMiles = q.match(/(?:under|below|less than)\s*([\d,.]+\s*k?)\s*(?:mi\b|miles)/i);
    if (mMiles) { s.miles = String(num(mMiles[1].trim())); said.push('under ' + (+s.miles).toLocaleString('en-US') + ' miles'); q = q.replace(mMiles[0], ' '); }
    var mPrice = q.match(/(?:under|below|less than|max|budget|up to)\s*\$?\s*([\d,.]+\s*k?)/i) || q.match(/\$\s*([\d,.]+\s*k?)/i);
    if (mPrice) { var p = num(mPrice[1].trim()); if (p >= 1000) { s.price = String(p); said.push('under ' + money(p)); } }
    var mYr = q.match(/(20\d\d|19\d\d)\s*(?:or|and)?\s*(newer|later|up|\+)/i) || q.match(/(?:newer than|after|since)\s*(20\d\d|19\d\d)/i);
    if (mYr) { s.ymin = mYr[1]; said.push(mYr[1] + ' or newer'); }
    var mStock = q.match(/\b(rts-?\d{3,})\b/i) || q.match(/stock\s*#?\s*(\d{3,})/i);
    if (mStock) { s.kw = mStock[1].toUpperCase(); said.push('stock ' + s.kw); }

    // Anything we did not understand stays as keywords only if nothing else matched
    if (!said.length) {
      s.kw = q.replace(/\b(i|need|want|a|an|the|for|my|truck|trucks|find|me|looking|with|some|that|can|of)\b/gi, ' ').replace(/\s+/g, ' ').trim();
      if (s.kw) said.push('"' + s.kw + '"');
    }
    return { state: s, said: said };
  }

  function runAI(q) {
    var r = parse(q);
    state = r.state; writeUI(); render();
    var n = INV.filter(match).length;
    $('#aiNote').innerHTML = '<svg><use href="#i-spark"/></svg><span>' + (r.said.length
      ? 'Showing ' + esc(r.said.join(' · ')) + ' — ' + n + ' match' + (n === 1 ? '' : 'es') + '. Adjust anything in the filters.'
      : 'Showing everything in stock.') + '</span>';
  }
  $('#aiForm').addEventListener('submit', function (e) { e.preventDefault(); runAI($('#aiQ').value.trim()); });
  $$('#aiForm .ai-search__chips button').forEach(function (b) {
    b.addEventListener('click', function () { $('#aiQ').value = b.dataset.q; runAI(b.dataset.q); });
  });

  /* ---------- Truck detail ---------- */
  var dlg = $('#tdlg');
  function openTruck(t) {
    $('#tdBody').innerHTML =
      '<div class="tdlg__img"><img src="' + t.img + '" alt="' + t.year + ' ' + t.make + ' ' + t.model + '"></div>' +
      '<div class="tdlg__body">' +
        '<div class="tag" style="margin:0">' + t.type + ' · Stock #' + t.stock + '</div>' +
        '<h2 id="tdTitle">' + t.year + ' ' + t.make + ' ' + t.model + '</h2>' +
        '<div class="tcard__price">' + money(t.price) + '</div>' +
        '<dl><dt>Mileage</dt><dd>' + t.miles.toLocaleString('en-US') + ' mi</dd><dt>Engine</dt><dd>' + t.engine + '</dd><dt>Transmission</dt><dd>' + t.trans + '</dd>' +
        '<dt>GVWR</dt><dd>' + t.gvwr.toLocaleString('en-US') + ' lb' + (t.gvwr <= 26000 ? ' (non-CDL)' : '') + '</dd><dt>Wheelbase</dt><dd>' + t.wb + ' in</dd><dt>Duty</dt><dd>' + t.duty + '</dd></dl>' +
        '<div class="tdlg__acts">' +
          '<a class="btn btn--red" href="tel:7403974969"><span>Check availability · 740-397-4969</span></a>' +
          '<a class="btn btn--line" href="trade.html?for=' + t.stock + '"><span>Value my trade toward this truck</span></a>' +
          '<a class="btn btn--line" href="quote.html?stock=' + t.stock + '"><span>Get a quote to upfit this truck</span></a>' +
        '</div>' +
        '<div class="tdlg__help">Need a body on it? Ohio Truck Equipment can install dump bodies, flatbeds and more. <a href="capabilities.html">See what we can install</a>.</div>' +
      '</div>';
    if (dlg.showModal) dlg.showModal(); else dlg.setAttribute('open', '');
  }
  function closeTruck() { if (dlg.close) dlg.close(); else dlg.removeAttribute('open'); if (location.hash) history.replaceState(null, '', location.pathname + location.search); }
  $('#tdX').addEventListener('click', closeTruck);
  dlg.addEventListener('click', function (e) { if (e.target === dlg) closeTruck(); });
  $('#results').addEventListener('click', function (e) {
    var a = e.target.closest('[data-open]'); if (!a) return;
    e.preventDefault();
    var t = INV.filter(function (x) { return x.id === +a.dataset.open; })[0];
    if (t) { history.replaceState(null, '', '#stock-' + t.stock); openTruck(t); }
  });

  /* ---------- Mobile filter drawer ---------- */
  var filters = $('#filters');
  function drawer(open) { filters.classList.toggle('is-open', open); document.body.style.overflow = open ? 'hidden' : ''; }
  $('#fOpen').addEventListener('click', function () { drawer(true); });
  $('#fDone').addEventListener('click', function () { drawer(false); });
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') drawer(false); });

  /* ---------- Review switcher (AI search vs filter menu) ---------- */
  $$('.review button').forEach(function (b) {
    b.addEventListener('click', function () {
      document.body.classList.remove('mode-both', 'mode-ai', 'mode-filter');
      document.body.classList.add('mode-' + b.dataset.mode);
      $$('.review button').forEach(function (x) { x.setAttribute('aria-pressed', x === b); });
    });
  });

  /* ---------- Initial state from URL ---------- */
  var params = new URLSearchParams(location.search);
  if (params.get('q')) { $('#aiQ').value = params.get('q'); runAI(params.get('q')); }
  else {
    if (params.get('type') && TYPES.indexOf(params.get('type')) > -1) { state.types = [params.get('type')]; writeUI(); }
    render();
  }
  var hm = location.hash.match(/^#stock-(.+)$/);
  if (hm) {
    var t = INV.filter(function (x) { return x.stock === hm[1]; })[0];
    if (t) openTruck(t);
  }
})();
