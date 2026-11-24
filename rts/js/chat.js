/* Robertson Assistant — lead-qualifying chat (design mock-up, scripted; no backend yet).
   Flow: what are you shopping for → type → show matches (value first) → purchase timeline
   → soft "want me to send you matches?" → name + phone/email → routed to RTS / OTE / Leasing.
   Leads are kept in localStorage ("rtg_leads") and logged to the console until a CRM endpoint exists.

   Usage:
     RTGChat.mount(containerEl)      inline (home page)
     RTGChat.floating()              floating launcher (all other pages)
*/
(function () {
  'use strict';
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  var COMPANIES = {
    rts: { name: 'Robertson Truck Sales', phone: '740-397-4969', tel: '7403974969' },
    ote: { name: 'Ohio Truck Equipment', phone: '740-830-6488', tel: '7408306488' },
    els: { name: 'Equipment Leasing Solutions', phone: '877-359-4969', tel: '8773594969' }
  };
  var TIMELINES = ['Less than 1 month', '1–3 months', '3–6 months', 'Just browsing'];

  /* Folder prefixes so the same chat works on RTS pages and on OTE pages (which sit in ../ote/).
     A page sets window.RTG_PATHS = { rts: '../rts/', ote: '' } before loading this file. */
  var PATHS = window.RTG_PATHS || {};
  var R = PATHS.rts || '', O = PATHS.ote != null ? PATHS.ote : '../ote/';

  var FAQ = [
    { k: /financ|loan|credit|payment|budget/i, a: 'We help you find the right financing and guide you through the whole process. Most customers start with our online Finance Application, and a rep follows up the same business day.' },
    { k: /where|locat|address|hours|visit|direction/i, a: 'Robertson Truck Sales is at 8920 Columbus Rd., Mount Vernon, OH 43050: a 15-acre campus with a full mechanical and detail shop. Call 740-397-4969 anytime.' },
    { k: /upfit|install|fabricat|body|wheelbase|frame/i, a: 'Yes. Ohio Truck Equipment can install dump bodies, flatbeds and more, plus frame and wheelbase changes, on any truck in our inventory or on yours.' },
    { k: /trade|sell my|value/i, a: 'We take trades. Use Value My Trade: add the year, make, model and a few photos and a sales rep will follow up with a number.', link: { href: R + 'trade.html', label: 'Value My Trade' } },
    { k: /lease|rent|container|storage|trailer/i, a: 'Equipment Leasing Solutions leases over 100 containers and 200 storage trailers across Ohio, delivered to your site.' }
  ];

  function el(tag, cls, html) { var e = document.createElement(tag); if (cls) e.className = cls; if (html != null) e.innerHTML = html; return e; }
  function esc(s) { return String(s).replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; }); }
  function money(n) { return '$' + n.toLocaleString('en-US'); }

  function Chat(root) {
    this.root = root;
    this.lead = { company: null, interest: null, timeline: null, name: null, contact: null, page: location.pathname.split('/').pop() || 'index' };
    this.waiting = null; // what free text is being collected: 'name' | 'contact' | null
    this.build();
    this.start();
  }

  Chat.prototype.build = function () {
    var self = this;
    this.root.classList.add('rchat');
    this.root.innerHTML =
      '<div class="rchat__head">' +
        '<div class="rchat__avatar"><img src="' + R + 'images/rts-emblem.svg" alt=""></div>' +
        '<div class="rchat__who"><strong>Robertson Assistant</strong><span><i></i>Typically replies instantly</span></div>' +
        '<button type="button" class="rchat__close" aria-label="Close chat">&times;</button>' +
      '</div>' +
      '<div class="rchat__body" aria-live="polite"></div>' +
      '<form class="rchat__input" autocomplete="off">' +
        '<label class="rchat__sr" for="rchatIn' + Chat.n + '">Type a message</label>' +
        '<input id="rchatIn' + Chat.n + '" type="text" placeholder="Type a message…">' +
        '<button type="submit" aria-label="Send"><svg viewBox="0 0 24 24" width="18" height="18"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="m22 2-7 20-4-9-9-4 20-7zM22 2 11 13"/></svg></button>' +
      '</form>';
    Chat.n++;
    this.body = this.root.querySelector('.rchat__body');
    this.input = this.root.querySelector('input');
    this.root.querySelector('form').addEventListener('submit', function (e) {
      e.preventDefault();
      var v = self.input.value.trim(); if (!v) return;
      self.input.value = '';
      self.onText(v);
    });
  };
  Chat.n = 0;

  Chat.prototype.scroll = function () { this.body.scrollTop = this.body.scrollHeight; };

  Chat.prototype.user = function (text) {
    this.clearOptions();
    this.body.appendChild(el('div', 'rmsg rmsg--user', esc(text)));
    this.scroll();
  };

  /* bot says html after a short typing pause, then calls next */
  Chat.prototype.bot = function (html, next) {
    var self = this, t = el('div', 'rmsg rmsg--bot rmsg--typing', '<i></i><i></i><i></i>');
    this.body.appendChild(t); this.scroll();
    setTimeout(function () {
      t.classList.remove('rmsg--typing'); t.innerHTML = html; self.scroll();
      if (next) next();
    }, reduce ? 0 : 550 + Math.min(html.length * 4, 700));
  };

  Chat.prototype.options = function (list, onPick) {
    var self = this, wrap = el('div', 'ropts');
    list.forEach(function (o) {
      var label = typeof o === 'string' ? o : o.label;
      var b = el('button', 'ropt', esc(label)); b.type = 'button';
      b.addEventListener('click', function () { self.user(label); onPick(o); });
      wrap.appendChild(b);
    });
    this.body.appendChild(wrap); this.scroll();
  };
  Chat.prototype.clearOptions = function () { Array.prototype.forEach.call(this.body.querySelectorAll('.ropts'), function (o) { o.remove(); }); };

  /* ---------- Flow ---------- */
  Chat.prototype.start = function () {
    var self = this;
    this.bot('Hi! 👋 I can help you find a truck, a body, or leasing equipment. What are you shopping for today?', function () { self.askInterest(); });
  };

  Chat.prototype.askInterest = function () {
    var self = this;
    this.options([
      { label: 'A truck', co: 'rts' },
      { label: 'A truck body or equipment', co: 'ote' },
      { label: 'Container or trailer leasing', co: 'els' },
      { label: 'Value my trade', co: 'rts', trade: true }
    ], function (o) {
      self.lead.company = o.co;
      if (o.trade) {
        self.lead.interest = 'Trade-in';
        return self.bot('Easy. Our <a href="' + R + 'trade.html">Value My Trade</a> form takes about two minutes: year, make, model and a few photos. A sales rep follows up with a number.', function () { self.askTimeline(); });
      }
      if (o.co === 'rts') return self.askTruckType();
      if (o.co === 'ote') return self.askBodyType();
      return self.askLeaseType();
    });
  };

  Chat.prototype.askTruckType = function () {
    var self = this;
    this.bot('What kind of truck?', function () {
      self.options(['Dump Truck', 'Box Truck', 'Flatbed', 'Cab & Chassis', 'Day Cab', 'Not sure yet'], function (t) {
        self.lead.interest = t;
        self.showMatches(t);
      });
    });
  };

  Chat.prototype.showMatches = function (type) {
    var self = this, inv = window.RTS_INVENTORY || [];
    var hits = type === 'Not sure yet' ? inv.slice(0, 3) : inv.filter(function (t) { return t.type === type; }).slice(0, 3);
    if (!hits.length) {
      return this.bot('Nothing listed in that category this week, but new trucks come in all the time.', function () { self.askTimeline(); });
    }
    var cards = hits.map(function (t) {
      return '<a class="rcard" href="' + R + 'inventory.html#stock-' + t.stock + '"><img src="' + R + t.img + '" alt=""><span><b>' + t.year + ' ' + t.make + ' ' + t.model + '</b><small>' + money(t.price) + ' · ' + t.miles.toLocaleString('en-US') + ' mi</small></span></a>';
    }).join('');
    this.bot('Here ' + (hits.length === 1 ? 'is one' : 'are a few') + ' in stock right now:<div class="rcards">' + cards + '</div><a class="rlink" href="' + R + 'inventory.html' +(type === 'Not sure yet' ? '' : '?type=' + encodeURIComponent(type)) + '">See all in inventory →</a>', function () {
      self.askTimeline();
    });
  };

  Chat.prototype.askBodyType = function () {
    var self = this;
    this.bot('Which body or equipment?', function () {
      var BODY = { 'Dump body': 'Dump Body', 'Flatbed': 'Flatbed', 'Landscape body': 'Landscape Body', 'Hooklift / Switch-N-Go': 'Hooklift', 'Carrier or wrecker': 'Carrier & Wrecker', 'Snow & ice': 'Snow & Ice', 'Not sure yet': null };
      self.options(Object.keys(BODY), function (t) {
        self.lead.interest = t;
        var how = 'To quote an install, a rep needs your wheelbase measurement and a few truck photos. Here is <a href="' + O + 'tutorials.html#wheelbase">how to measure your wheelbase</a>.';
        // Value first: show matching bodies when the OTE inventory is loaded on this page
        var bodies = (window.OTE_BODIES || []).filter(function (b) { return !BODY[t] || b.type === BODY[t]; }).slice(0, 3);
        if (bodies.length) {
          var cards = bodies.map(function (b) {
            return '<a class="rcard" href="' + O + 'inventory.html#stock-' + b.stock + '"><img src="' + b.img + '" alt=""><span><b>' + esc(b.brand + ' ' + b.model) + '</b><small>' + b.len + ' ft · ' + (b.price ? money(b.price) : 'Call for price') + '</small></span></a>';
          }).join('');
          return self.bot('Here ' + (bodies.length === 1 ? 'is one' : 'are a few') + ' in stock:<div class="rcards">' + cards + '</div><a class="rlink" href="' + O + 'inventory.html' + (BODY[t] ? '?type=' + encodeURIComponent(BODY[t]) : '') + '">See all bodies →</a>', function () {
            self.bot(how, function () { self.askTimeline(); });
          });
        }
        self.bot('Ohio Truck Equipment stocks and installs ' + (t === 'Not sure yet' ? 'bodies and equipment' : t.toLowerCase() + 's') + '. ' + how, function () { self.askTimeline(); });
      });
    });
  };

  Chat.prototype.askLeaseType = function () {
    var self = this;
    this.bot('What do you need to lease?', function () {
      self.options(['Storage container', 'Storage trailer', 'Not sure yet'], function (t) {
        self.lead.interest = t;
        self.bot('Equipment Leasing Solutions delivers containers and storage trailers across Ohio, with short and long terms available.', function () { self.askTimeline(); });
      });
    });
  };

  Chat.prototype.askTimeline = function () {
    var self = this;
    var q = this.lead.company === 'els' ? 'When do you need it?' : 'When are you looking to buy?';
    this.bot(q, function () {
      self.options(TIMELINES, function (t) {
        self.lead.timeline = t;
        self.softAsk();
      });
    });
  };

  Chat.prototype.softAsk = function () {
    var self = this, browsing = this.lead.timeline === 'Just browsing';
    var line = this.lead.company === 'rts'
      ? (browsing ? 'No rush. Want me to send you new matches as they come in?' : 'Want me to send you matching trucks and have a rep hold one for you?')
      : this.lead.company === 'ote'
        ? 'Want a rep to put together an install quote for you?'
        : 'Want a rep to check availability and pricing for you?';
    this.bot(line, function () {
      self.options(['Sure', 'No thanks, just looking'], function (o) {
        if (o === 'Sure') {
          self.waiting = 'name';
          self.bot('Great. What is your first name?', function () { self.input.focus(); });
        } else {
          self.bot('No problem. I am here if anything comes up. You can also call ' + self.co().name + ' at <a href="tel:' + self.co().tel + '">' + self.co().phone + '</a>.', function () { self.more(); });
        }
      });
    });
  };

  Chat.prototype.co = function () { return COMPANIES[this.lead.company || 'rts']; };

  Chat.prototype.onText = function (v) {
    var self = this;
    this.user(v);
    if (this.waiting === 'name') {
      this.lead.name = v.split(' ')[0].slice(0, 40);
      this.waiting = 'contact';
      return this.bot('Thanks, ' + esc(this.lead.name) + '! What is the best phone number or email to reach you?', function () { self.input.focus(); });
    }
    if (this.waiting === 'contact') {
      var phone = v.replace(/[^\d]/g, ''), isMail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
      if (!isMail && phone.length < 10) {
        return this.bot('Hmm, that does not look like a phone number or email. Could you double-check it?');
      }
      this.lead.contact = v;
      this.waiting = null;
      return this.submit();
    }
    // free question: answer, then nudge back into the flow
    var hit = FAQ.filter(function (f) { return f.k.test(v); })[0];
    var ans = hit ? hit.a + (hit.link ? ' <a href="' + hit.link.href + '">' + hit.link.label + ' →</a>' : '') : 'Good question. A rep can answer that best: call Robertson Truck Sales at <a href="tel:7403974969">740-397-4969</a>, or I can help you narrow down what you need.';
    this.bot(ans, function () { if (!self.lead.company) self.askInterest(); });
  };

  Chat.prototype.submit = function () {
    var self = this, c = this.co();
    var lead = Object.assign({ routedTo: c.name, at: new Date().toISOString() }, this.lead);
    try { var all = JSON.parse(localStorage.getItem('rtg_leads') || '[]'); all.push(lead); localStorage.setItem('rtg_leads', JSON.stringify(all)); } catch (e) { /* storage unavailable */ }
    if (window.console) console.info('[RTG lead]', lead);
    this.bot('You are all set, ' + esc(this.lead.name) + '. I sent this to <b>' + c.name + '</b> and a rep will reach out soon.<div class="rsum"><span>Looking for</span><b>' + esc(this.lead.interest || '—') + '</b><span>Timeline</span><b>' + esc(this.lead.timeline || '—') + '</b><span>Contact</span><b>' + esc(this.lead.contact) + '</b></div>', function () { self.more(); });
  };

  Chat.prototype.more = function () {
    var self = this;
    this.options(['Browse inventory', 'Start over'], function (o) {
      if (o === 'Browse inventory') { location.href = self.lead.company === 'ote' ? O + 'inventory.html' : R + 'inventory.html'; return; }
      self.lead = { company: null, interest: null, timeline: null, name: null, contact: null, page: self.lead.page };
      self.waiting = null;
      self.start();
    });
  };

  /* ---------- Public ---------- */
  window.RTGChat = {
    mount: function (container) { container.classList.add('rchat--inline'); return new Chat(container); },
    floating: function () {
      var btn = el('button', 'rchat-launch', '<svg viewBox="0 0 24 24" width="24" height="24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg><span>Chat with us</span>');
      btn.type = 'button'; btn.setAttribute('aria-expanded', 'false'); btn.setAttribute('aria-label', 'Open chat');
      var panel = el('div', 'rchat-float'); panel.setAttribute('role', 'dialog'); panel.setAttribute('aria-label', 'Robertson Assistant');
      document.body.appendChild(panel); document.body.appendChild(btn);
      var chat = null;
      function set(open) {
        if (open && !chat) chat = new Chat(panel);
        panel.classList.toggle('is-open', open); btn.classList.toggle('is-open', open);
        btn.setAttribute('aria-expanded', open);
        if (open) setTimeout(function () { chat.input.focus({ preventScroll: true }); }, 250);
      }
      btn.addEventListener('click', function () { set(!panel.classList.contains('is-open')); });
      panel.addEventListener('click', function (e) { if (e.target.closest('.rchat__close')) set(false); });
      document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && panel.classList.contains('is-open')) set(false); });
    }
  };
})();
