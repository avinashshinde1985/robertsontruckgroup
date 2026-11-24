/* Ohio Truck Equipment: sample body & equipment inventory for the design mock-up.
   The live listings are in Skeye (app.skeye.cloud/public-inventory/ote). Replace this file with the
   Skeye feed once its format and access are confirmed. Prices and stock numbers below are placeholders.
   OTE pages sit next to the RTS folder and share its CSS, images and chat (paths start with ../rts/). */
(function () {
  'use strict';
  var IMG = '../rts/images/';

  window.OTE_TYPES = [
    { k: 'Dump Body',         label: 'Dump bodies',            icon: 'dump',    install: 'Dump body' },
    { k: 'Flatbed',           label: 'Flatbeds & platforms',   icon: 'flat',    install: 'Flatbed / platform' },
    { k: 'Landscape Body',    label: 'Landscape bodies',       icon: 'land',    install: 'Landscape / contractor body' },
    { k: 'Hooklift',          label: 'Hooklift & Switch-N-Go', icon: 'hook',    install: 'Hooklift / Switch-N-Go' },
    { k: 'Carrier & Wrecker', label: 'Carriers & wreckers',    icon: 'tow',     install: 'Carrier or wrecker' },
    { k: 'Snow & Ice',        label: 'Snow & ice',             icon: 'snow',    install: 'Snow and ice equipment' },
    { k: 'Trailer',           label: 'Trailers',               icon: 'trailer', install: null }
  ];

  /* ca = minimum cab-to-axle (in) the body needs; null = not chassis-dependent */
  window.OTE_BODIES = [
    { id: 1,  stock: 'OTE-B1021', type: 'Dump Body',         brand: 'Godwin',        model: '300U Dump Body',              len: 12, mat: 'Steel',     cond: 'New',  price: 21900, ca: 84,   img: IMG + 'p-godwin.jpg',       tags: ['single axle', 'tarp ready', 'hoist included'] },
    { id: 2,  stock: 'OTE-B1034', type: 'Dump Body',         brand: 'Beau-Roc',      model: 'Tandem Dump Body',            len: 16, mat: 'Hardox',    cond: 'New',  price: 38500, ca: 120,  img: IMG + 'p-beau-roc.jpg',     tags: ['tandem', 'construction', 'high tensile'] },
    { id: 3,  stock: 'OTE-B1040', type: 'Dump Body',         brand: 'Godwin',        model: '184U Dump Body',              len: 10, mat: 'Steel',     cond: 'New',  price: 15750, ca: 60,   img: IMG + 'v2/dump-body.jpg',   tags: ['single axle', 'non-cdl'] },
    { id: 4,  stock: 'OTE-B1046', type: 'Dump Body',         brand: 'TruckCraft',    model: 'Aluminum Dump Body',          len: 11, mat: 'Aluminum',  cond: 'New',  price: 18400, ca: 60,   img: IMG + 'v2/upfitter.jpg',    tags: ['lightweight', 'municipal'] },
    { id: 5,  stock: 'OTE-B1058', type: 'Dump Body',         brand: 'Godwin',        model: 'Stainless Dump Body',         len: 14, mat: 'Stainless', cond: 'Used', price: 14900, ca: 102,  img: IMG + 'v2/fabrication.jpg', tags: ['salt route', 'reconditioned'] },
    { id: 6,  stock: 'OTE-B2010', type: 'Flatbed',           brand: 'TruckCraft',    model: 'Steel Flatbed',               len: 12, mat: 'Steel',     cond: 'New',  price: 8950,  ca: 84,   img: IMG + 'v2/flatbed.jpg',     tags: ['headboard', 'stake pockets'] },
    { id: 7,  stock: 'OTE-B2017', type: 'Flatbed',           brand: 'Godwin',        model: 'Steel Platform',              len: 16, mat: 'Steel',     cond: 'New',  price: 11200, ca: 102,  img: IMG + 'gallery/g01.jpg',    tags: ['rub rail', 'toolboxes'] },
    { id: 8,  stock: 'OTE-B2023', type: 'Flatbed',           brand: 'Futureline',    model: 'Aluminum Platform',           len: 22, mat: 'Aluminum',  cond: 'Used', price: 6900,  ca: 138,  img: IMG + 'v2/frame.jpg',       tags: ['landscape', 'reconditioned'] },
    { id: 9,  stock: 'OTE-B3005', type: 'Landscape Body',    brand: 'TruckCraft',    model: 'Landscape Dump Body',         len: 12, mat: 'Steel',     cond: 'New',  price: 14900, ca: 84,   img: IMG + 'v2/build.jpg',       tags: ['mesh sides', 'fold-down gate'] },
    { id: 10, stock: 'OTE-B4002', type: 'Hooklift',          brand: 'Switch N Go',   model: 'SNG System + Dump Bin',       len: 14, mat: 'Steel',     cond: 'New',  price: 24900, ca: 84,   img: IMG + 'p-switch-n-go.jpg',  tags: ['one truck, many bodies', 'non-cdl'] },
    { id: 11, stock: 'OTE-B4011', type: 'Hooklift',          brand: 'Switch N Go',   model: 'Flatbed Module',              len: 12, mat: 'Steel',     cond: 'New',  price: 7600,  ca: 84,   img: IMG + 'v2/driveline.jpg',   tags: ['add-on body', 'fits SNG system'] },
    { id: 12, stock: 'OTE-B5003', type: 'Carrier & Wrecker', brand: 'NRC',           model: '40CS Wrecker',                len: 20, mat: 'Steel',     cond: 'New',  price: null,  ca: 138,  img: IMG + 'p-nrc.jpg',          tags: ['heavy recovery', 'rotator'] },
    { id: 13, stock: 'OTE-B5008', type: 'Carrier & Wrecker', brand: 'NRC',           model: 'Steel Car Carrier',           len: 21, mat: 'Steel',     cond: 'New',  price: 27500, ca: 138,  img: IMG + 'gallery/g15.jpg',    tags: ['rollback', 'towing'] },
    { id: 14, stock: 'OTE-B6001', type: 'Snow & Ice',        brand: 'Beau-Roc',      model: 'V-Box Spreader',              len: 12, mat: 'Stainless', cond: 'New',  price: 11400, ca: 84,   img: IMG + 'v2/wheelbase.jpg',   tags: ['municipal', 'salt'] },
    { id: 15, stock: 'OTE-B6006', type: 'Snow & Ice',        brand: 'Beau-Roc',      model: 'Reversible Snow Plow',        len: 10, mat: 'Steel',     cond: 'Used', price: 4900,  ca: null, img: IMG + 'hero-2.jpg',         tags: ['plow', 'reconditioned'] },
    { id: 16, stock: 'OTE-B7002', type: 'Trailer',           brand: 'CAM Superline', model: '20-Ton Equipment Trailer',    len: 24, mat: 'Steel',     cond: 'New',  price: 14900, ca: null, img: IMG + 'p-cam-superline.jpg', tags: ['tandem', 'ramps'] },
    { id: 17, stock: 'OTE-B7006', type: 'Trailer',           brand: 'Sure-Trac',     model: 'Tilt Equipment Trailer',      len: 18, mat: 'Steel',     cond: 'New',  price: 7450,  ca: null, img: IMG + 'p-sure-trac.jpg',    tags: ['tilt deck', 'skid steer'] }
  ];

  window.OTE_type = function (k) { return window.OTE_TYPES.filter(function (t) { return t.k === k; })[0]; };

  /* Simple side-profile icons (truck faces left). One stroke style so the set reads as a family. */
  var CHASSIS = '<path d="M4 30V19l3-6h9v17"/><path d="M16 26h46"/><circle cx="11" cy="31" r="3.5"/><circle cx="50" cy="31" r="3.5"/>';
  var ICONS = {
    dump:    CHASSIS + '<path d="M20 25V12h38l2 13z"/><path d="M58 12v13"/>',
    flat:    CHASSIS + '<path d="M19 25h43v-3H19z"/><path d="M19 22v-9h3v9"/>',
    land:    CHASSIS + '<path d="M20 25V14h40v11z"/><path d="M27 14v11M34 14v11M41 14v11M48 14v11M55 14v11"/>',
    hook:    CHASSIS + '<path d="M24 25 52 8l7 6-31 13"/><path d="M20 25v-8h3"/>',
    tow:     CHASSIS + '<path d="M19 24h44l-4-4H19z"/><path d="M26 20l10-12h3l-6 12"/><path d="M39 8l9 8"/>',
    snow:    CHASSIS + '<path d="M20 25V13h36l4 12z"/><path d="M2 17c-2 4-2 9 0 14"/><path d="M3 24h1"/>',
    trailer: '<path d="M6 21h54v4H6z"/><path d="M6 23H2"/><path d="M52 21l10-4"/><circle cx="40" cy="29" r="3.5"/><circle cx="49" cy="29" r="3.5"/>',
    help:    '<circle cx="32" cy="20" r="14"/><path d="M27 16a5 5 0 1 1 7 5c-1.4.7-2 1.6-2 3v1"/><path d="M32 29h.01"/>'
  };
  window.OTE_icon = function (key) {
    return '<svg class="bicon" viewBox="0 0 64 38" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' + (ICONS[key] || ICONS.help) + '</svg>';
  };

  window.OTE_price = function (b) { return b.price ? '$' + b.price.toLocaleString('en-US') : 'Call for price'; };
  window.OTE_quoteHref = function (b) { return 'quote.html?body=' + encodeURIComponent(b.stock); };

  /* Body card (home featured strip + inventory page) */
  window.OTE_card = function (b) {
    var t = window.OTE_type(b.type), installable = t && t.install;
    return '<article class="tcard" id="stock-' + b.stock + '" data-id="' + b.id + '">' +
      '<div class="tcard__img"><img src="' + b.img + '" alt="' + b.brand + ' ' + b.model + '" loading="lazy">' +
        '<span class="tcard__type">' + b.type + '</span><span class="tcard__stock">#' + b.stock + '</span></div>' +
      '<div class="tcard__body">' +
        '<h3>' + b.brand + ' ' + b.model + '</h3>' +
        '<div class="tcard__price">' + window.OTE_price(b) + (b.price ? '<small>body only</small>' : '') + '</div>' +
        '<div class="tcard__specs"><span><b>' + b.len + ' ft</b></span><span><b>' + b.mat + '</b></span><span><b>' + b.cond + '</b></span>' +
          (b.ca ? '<span class="tcard__fit">Fits <b>' + b.ca + '"+</b> CA</span>' : '') + '</div>' +
        '<div class="tcard__acts"><a href="inventory.html#stock-' + b.stock + '" class="btn btn--line btn--sm" data-open="' + b.id + '"><span>Details</span></a>' +
        (installable
          ? '<a href="' + window.OTE_quoteHref(b) + '" class="btn btn--red btn--sm"><span>Quote install</span></a>'
          : '<a href="tel:7408306488" class="btn btn--red btn--sm"><span>Call to buy</span></a>') +
        '</div>' +
      '</div></article>';
  };

  /* Easy-pick buttons. opts.href(typeKey) builds the link; opts.button renders <button>s instead (inventory page). */
  window.OTE_picks = function (el, opts) {
    opts = opts || {};
    var inv = window.OTE_BODIES;
    var html = window.OTE_TYPES.map(function (t) {
      var n = inv.filter(function (b) { return b.type === t.k; }).length;
      var inner = window.OTE_icon(t.icon) + '<span class="pick__l">' + t.label + '</span><span class="pick__n">' + n + ' in stock</span>';
      return opts.button
        ? '<button type="button" class="pick" data-type="' + t.k + '" aria-pressed="false">' + inner + '</button>'
        : '<a class="pick" href="' + opts.href(t.k) + '">' + inner + '</a>';
    }).join('');
    html += '<a class="pick pick--help" href="quote.html?type=' + encodeURIComponent('Not sure') + '">' + window.OTE_icon('help') +
      '<span class="pick__l">Not sure? Help me choose</span><span class="pick__n">Send your wheelbase, we pick</span></a>';
    el.innerHTML = html;
  };
})();
