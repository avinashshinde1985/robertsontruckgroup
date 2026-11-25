(function () {
  'use strict';
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var list = document.getElementById('plist');
  if (!list) return;

  var PAGE = 6;
  var cards = Array.prototype.slice.call(list.querySelectorAll('.pcard'));
  var chips = document.querySelectorAll('.pchip');
  var topics = document.querySelectorAll('[data-topic]');
  var q = document.getElementById('postQ');
  var qWrap = q.closest('.psearch');
  var status = document.getElementById('pstatus');
  var empty = document.getElementById('pempty');
  var more = document.getElementById('pmore');
  var moreBtn = document.getElementById('pmoreBtn');
  var moreTxt = document.getElementById('pmoreTxt');
  var moreFill = document.getElementById('pmoreFill');
  var posts = document.getElementById('posts');
  var state = { filter: 'all', query: '', limit: PAGE };

  // keep original text for highlighting
  cards.forEach(function (c) {
    var a = c.querySelector('h3 a'), p = c.querySelector('p');
    c._t = a.textContent; c._x = p.textContent;
    c._hay = (c._t + ' ' + c._x).toLowerCase();
  });

  function esc(s) { return s.replace(/[&<>"]/g, function (ch) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;' }[ch]; }); }
  function mark(text, query) {
    if (!query) return esc(text);
    var i = text.toLowerCase().indexOf(query);
    if (i < 0) return esc(text);
    return esc(text.slice(0, i)) + '<mark>' + esc(text.slice(i, i + query.length)) + '</mark>' + esc(text.slice(i + query.length));
  }
  function label(f) {
    var chip = document.querySelector('.pchip[data-filter="' + f + '"]');
    return chip ? chip.firstChild.textContent.trim() : '';
  }

  function render(animateFrom) {
    var query = state.query, matches = [];
    cards.forEach(function (c) {
      var ok = (state.filter === 'all' || c.dataset.cat === state.filter) && (!query || c._hay.indexOf(query) > -1);
      c.classList.toggle('is-hidden', !ok);
      c.querySelector('h3 a').innerHTML = mark(c._t, query);
      c.querySelector('p').innerHTML = mark(c._x, query);
      if (ok) matches.push(c);
    });
    var shown = Math.min(state.limit, matches.length);
    matches.forEach(function (c, k) {
      c.classList.toggle('is-paged', k >= shown);
      c.classList.remove('is-pop');
      if (k < shown && k >= animateFrom && !reduce) {
        c.style.setProperty('--i', k - animateFrom);
        void c.offsetWidth;
        c.classList.add('is-pop');
      }
    });

    var bits = 'Showing <b>' + shown + '</b> of <b>' + matches.length + '</b> article' + (matches.length === 1 ? '' : 's');
    if (state.filter !== 'all') bits += ' in <b>' + esc(label(state.filter)) + '</b>';
    if (query) bits += ' for “<b>' + esc(query) + '</b>”';
    status.innerHTML = matches.length ? bits : '';
    empty.hidden = matches.length > 0;
    more.hidden = shown >= matches.length;
    moreTxt.textContent = 'You’ve read ' + shown + ' of ' + matches.length + ' articles';
    moreFill.style.width = (matches.length ? shown / matches.length * 100 : 0) + '%';
  }

  function setFilter(f) {
    state.filter = f; state.limit = PAGE;
    chips.forEach(function (c) { var on = c.dataset.filter === f; c.classList.toggle('is-active', on); c.setAttribute('aria-pressed', on); });
    topics.forEach(function (t) { t.classList.toggle('is-active', t.dataset.topic === f); });
    render(0);
  }
  function setQuery(v) {
    q.value = v;
    state.query = v.trim().toLowerCase(); state.limit = PAGE;
    qWrap.classList.toggle('has-value', !!v);
    render(0);
  }
  function toPosts() { posts.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'start' }); }

  chips.forEach(function (c) { c.addEventListener('click', function () { setFilter(c.dataset.filter); }); });
  topics.forEach(function (t) { t.addEventListener('click', function () { setFilter(t.dataset.topic); toPosts(); }); });

  var timer;
  q.addEventListener('input', function () { clearTimeout(timer); timer = setTimeout(function () { setQuery(q.value); }, 120); });
  qWrap.querySelector('.psearch__clear').addEventListener('click', function () { setQuery(''); q.focus(); });

  moreBtn.addEventListener('click', function () {
    var from = state.limit;
    state.limit += PAGE;
    render(from);
  });
  document.getElementById('pReset').addEventListener('click', function () { setQuery(''); setFilter('all'); });

  // hero search → filters the list below
  var hero = document.getElementById('heroSearch');
  if (hero) {
    var hq = document.getElementById('heroQ');
    hero.addEventListener('submit', function (e) { e.preventDefault(); setFilter('all'); setQuery(hq.value); toPosts(); });
    hero.querySelectorAll('[data-q]').forEach(function (b) {
      b.addEventListener('click', function () { hq.value = b.dataset.q; setFilter('all'); setQuery(b.dataset.q); toPosts(); });
    });
  }

  render(Infinity); // first paint: no entrance animation
})();
