(function () {
  'use strict';
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- Measurements diagram ---------- */
  var diagram = document.getElementById('diagram');
  if (diagram) {
    var info = diagram.querySelector('.diagram__info');
    var titleEl = document.getElementById('dimTitle');
    var textEl = document.getElementById('dimText');
    var caTxt = diagram.querySelector('.ca-txt');
    var caLbl = diagram.querySelector('.ca-lbl');

    var copy = {
      ca: {
        title: 'Cab-to-axle (CA) dimension',
        text: 'The distance from the back of the cab to the centerline of the rear axle, this dimension helps determine the length of body that can be mounted on the chassis.'
      },
      ct: {
        title: 'Cab-to-tandem (CT) dimension',
        text: 'A similar concept for tandem-axle trucks is the CT dimension, measured from the rear of the cab to the centerline of the tandem. It helps determine the length of body that can be mounted on the chassis.'
      },
      wb: {
        title: 'Wheelbase (WB)',
        text: 'The distance between the front axle and the rear axle (or the centerline of tandem axles) affects body installation, truck performance, and whether a particular axle is overloaded.'
      }
    };

    function render() {
      var dim = diagram.dataset.dim, tandem = diagram.dataset.axle === 'tandem';
      var key = dim === 'ca' && tandem ? 'ct' : dim;
      caTxt.textContent = tandem ? 'CT' : 'CA';
      caLbl.textContent = tandem ? 'Cab-to-Tandem (CT)' : 'Cab-to-Axle (CA)';
      titleEl.textContent = copy[key].title;
      textEl.textContent = copy[key].text;
      diagram.querySelectorAll('.seg__btn').forEach(function (b) {
        var on = b.dataset.dim ? b.dataset.dim === dim : b.dataset.axle === diagram.dataset.axle;
        b.classList.toggle('is-active', on);
        b.setAttribute('aria-pressed', on);
      });
      if (!reduce) { info.classList.remove('is-swap'); void info.offsetWidth; info.classList.add('is-swap'); }
    }
    function setDim(d) {
      if (diagram.dataset.dim === d) return;
      diagram.dataset.dim = d;
      // restart the line-draw animation
      diagram.querySelectorAll('.dim__line').forEach(function (l) { l.style.animation = 'none'; void l.getBoundingClientRect(); l.style.animation = ''; });
      render();
    }

    diagram.addEventListener('click', function (e) {
      var t = e.target.closest('[data-dim],[data-axle]');
      if (!t || t === diagram) return;
      if (t.dataset.dim) setDim(t.dataset.dim);
      else if (t.dataset.axle && diagram.dataset.axle !== t.dataset.axle) { diagram.dataset.axle = t.dataset.axle; render(); }
    });
    diagram.querySelectorAll('.dim').forEach(function (g) {
      g.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); setDim(g.dataset.dim); }
      });
    });
    render();
    info.classList.remove('is-swap');
  }

  /* ---------- All capabilities: tabs + search ---------- */
  var list = document.getElementById('caps');
  if (list) {
    var items = Array.prototype.slice.call(list.children);
    var tabs = document.querySelectorAll('.tab');
    var search = document.getElementById('capSearch');
    var searchWrap = search.closest('.search');
    var empty = document.getElementById('capsEmpty');
    var filter = 'all';
    var labels = { fabrication: 'Fabrication', mechanical: 'Mechanical' };

    // enhance markup
    items.forEach(function (li) {
      var text = li.textContent.trim();
      li.dataset.text = text;
      li.innerHTML = '<span class="cap__ic"><svg><use href="#i-check"/></svg></span><span class="cap__t"></span><span class="cap__cat">' + labels[li.dataset.cat] + '</span>';
      li.querySelector('.cap__t').textContent = text;
    });

    // counts
    var counts = { all: items.length };
    items.forEach(function (li) { counts[li.dataset.cat] = (counts[li.dataset.cat] || 0) + 1; });
    document.querySelectorAll('[data-n]').forEach(function (n) { n.textContent = counts[n.dataset.n] || 0; });

    function esc(s) { return s.replace(/[&<>"]/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;' }[c]; }); }

    function apply() {
      var q = search.value.trim().toLowerCase();
      searchWrap.classList.toggle('has-value', !!q);
      var shown = 0;
      items.forEach(function (li) {
        var text = li.dataset.text;
        var idx = q ? text.toLowerCase().indexOf(q) : -1;
        var ok = (filter === 'all' || li.dataset.cat === filter) && (!q || idx > -1);
        li.classList.toggle('is-hidden', !ok);
        li.classList.remove('is-pop');
        var t = li.querySelector('.cap__t');
        t.innerHTML = idx > -1
          ? esc(text.slice(0, idx)) + '<mark>' + esc(text.slice(idx, idx + q.length)) + '</mark>' + esc(text.slice(idx + q.length))
          : esc(text);
        if (ok) {
          li.style.setProperty('--i', shown++);
          if (!reduce) { void li.offsetWidth; li.classList.add('is-pop'); }
        }
      });
      empty.hidden = shown > 0;
    }

    function setTab(f) {
      filter = f;
      tabs.forEach(function (t) {
        var on = t.dataset.filter === f;
        t.classList.toggle('is-active', on);
        t.setAttribute('aria-selected', on);
        if (on) list.setAttribute('aria-labelledby', t.id);
      });
      apply();
    }

    tabs.forEach(function (t) { t.addEventListener('click', function () { setTab(t.dataset.filter); }); });
    search.addEventListener('input', apply);
    searchWrap.querySelector('.search__clear').addEventListener('click', function () { search.value = ''; apply(); search.focus(); });

    // Featured cards jump to the matching tab
    document.querySelectorAll('.fcard[data-tab]').forEach(function (c) {
      c.addEventListener('click', function () { search.value = ''; setTab(c.dataset.tab); });
    });

    apply();
  }
})();
