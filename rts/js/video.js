/* Click-to-load Vimeo players (.vplayer[data-vimeo]) — shared by inner pages */
(function () {
  'use strict';
  var players = document.querySelectorAll('.vplayer[data-vimeo]');
  if (!players.length) return;
  var ORIGIN = 'https://player.vimeo.com';

  function pauseOthers(current) {
    players.forEach(function (p) {
      if (p === current) return;
      var f = p.querySelector('iframe');
      if (f && f.contentWindow) f.contentWindow.postMessage('{"method":"pause"}', ORIGIN);
    });
  }

  players.forEach(function (p) {
    p.addEventListener('click', function () {
      if (p.classList.contains('is-loading') || p.classList.contains('is-playing')) return;
      pauseOthers(p);
      p.classList.add('is-loading');
      var f = document.createElement('iframe');
      f.src = ORIGIN + '/video/' + p.dataset.vimeo + '?' + (p.dataset.h ? 'h=' + p.dataset.h + '&' : '') +
        'autoplay=1&byline=0&portrait=0&title=0&dnt=1&playsinline=1';
      f.title = p.dataset.title || 'Video';
      f.allow = 'autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media';
      f.setAttribute('allowfullscreen', '');
      f.referrerPolicy = 'strict-origin-when-cross-origin';
      f.addEventListener('load', function () {
        p.classList.remove('is-loading');
        p.classList.add('is-playing');
        // listen for play events so starting one video pauses the others
        f.contentWindow.postMessage('{"method":"addEventListener","value":"play"}', ORIGIN);
        f.focus();
      });
      p.appendChild(f);
    });
  });

  window.addEventListener('message', function (e) {
    if (e.origin !== ORIGIN) return;
    var d; try { d = typeof e.data === 'string' ? JSON.parse(e.data) : e.data; } catch (err) { return; }
    if (!d || d.event !== 'play') return;
    players.forEach(function (p) { var f = p.querySelector('iframe'); if (f && f.contentWindow === e.source) pauseOthers(p); });
  });
})();
