/**
 * SteveGet.com — Main JavaScript
 * Mobile nav, lazy loading, sticky buy bar, smooth interactions.
 */
'use strict';

(function () {

  // ─── Mobile Navigation Toggle ────────────────────────────────
  const toggle = document.getElementById('mobile-nav-toggle');
  const nav    = document.getElementById('site-nav');

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      const expanded = this.getAttribute('aria-expanded') === 'true';
      this.setAttribute('aria-expanded', String(!expanded));
      nav.classList.toggle('is-open');
    });

    // Close nav when clicking a link
    nav.querySelectorAll('.site-nav__link').forEach(function (link) {
      link.addEventListener('click', function () {
        toggle.setAttribute('aria-expanded', 'false');
        nav.classList.remove('is-open');
      });
    });

    // Close nav on Escape key
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && nav.classList.contains('is-open')) {
        toggle.setAttribute('aria-expanded', 'false');
        nav.classList.remove('is-open');
      }
    });
  }

  // ─── Sticky Buy Bar (Product Pages) ─────────────────────────
  const stickyBar = document.getElementById('sticky-buy-bar');
  if (stickyBar) {
    var lastScroll = 0;
    var showThreshold = 400;

    window.addEventListener('scroll', function () {
      var currentScroll = window.pageYOffset;

      if (currentScroll > showThreshold) {
        stickyBar.classList.add('is-visible');
      } else {
        stickyBar.classList.remove('is-visible');
      }

      lastScroll = currentScroll;
    }, { passive: true });
  }

  // ─── Smooth Header Shadow on Scroll ──────────────────────────
  var header = document.getElementById('site-header');
  if (header) {
    window.addEventListener('scroll', function () {
      if (window.pageYOffset > 10) {
        header.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
      } else {
        header.style.boxShadow = '';
      }
    }, { passive: true });
  }

  // ─── Native Lazy Loading Polyfill ────────────────────────────
  // For browsers that don't support loading="lazy"
  if (!('loading' in HTMLImageElement.prototype)) {
    var lazyImages = document.querySelectorAll('img[loading="lazy"]');
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var img = entry.target;
          if (img.dataset.src) {
            img.src = img.dataset.src;
          }
          observer.unobserve(img);
        }
      });
    }, { rootMargin: '200px' });

    lazyImages.forEach(function (img) { observer.observe(img); });
  }

  // ─── External Link Handler ───────────────────────────────────
  // Add rel attributes to external links
  document.querySelectorAll('a[href^="http"]').forEach(function (link) {
    if (!link.hostname.includes('steveget.com')) {
      link.setAttribute('rel', (link.getAttribute('rel') || '') + ' noopener');
      link.setAttribute('target', '_blank');
    }
  });

  // ─── Google Review system (SITE-GUIDE §0) ────────────────────
  var cfg = window.STEVEGET || {};
  var reviewUrl =
    cfg.googleReviewUrl ||
    'https://www.google.com/search?q=SteveGet+steveget.com+review';
  var reviewQr =
    (cfg.googleReviewQr || '/assets/img/review/google-review-qr-2026.png') +
    (cfg.assetVersion ? '?v=' + cfg.assetVersion : '');
  var reviewFab = document.getElementById('review-fab');
  var reviewDialog = document.getElementById('review-dialog');
  var reviewClose = document.getElementById('review-dialog-close');
  var lastFocus = null;

  function track(eventName, payload) {
    try {
      if (window.dataLayer && typeof window.dataLayer.push === 'function') {
        window.dataLayer.push(Object.assign({ event: eventName }, payload || {}));
      }
    } catch (err) { /* analytics optional */ }
  }

  function openReview(source) {
    if (!reviewDialog) return;
    lastFocus = document.activeElement;
    reviewDialog.hidden = false;
    document.body.classList.add('dialog-open');
    track('review_cta_open', { source: source || 'fab' });
    var closeBtn = reviewClose || reviewDialog.querySelector('button');
    if (closeBtn) closeBtn.focus();
  }

  function closeReview() {
    if (!reviewDialog) return;
    reviewDialog.hidden = true;
    document.body.classList.remove('dialog-open');
    if (lastFocus && lastFocus.focus) lastFocus.focus();
  }

  if (reviewFab) {
    reviewFab.addEventListener('click', function () {
      openReview('floating');
    });
  }

  document.querySelectorAll('[data-open-review]').forEach(function (el) {
    el.addEventListener('click', function (e) {
      e.preventDefault();
      openReview(el.getAttribute('data-open-review') || 'inline');
    });
  });

  if (reviewClose) {
    reviewClose.addEventListener('click', closeReview);
  }

  if (reviewDialog) {
    reviewDialog.addEventListener('click', function (e) {
      if (e.target === reviewDialog) closeReview();
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && !reviewDialog.hidden) closeReview();
    });
  }

  document.querySelectorAll('[data-review-link]').forEach(function (el) {
    el.setAttribute('href', reviewUrl);
    el.addEventListener('click', function () {
      track('review_link_click', {
        source: el.getAttribute('data-review-link') || 'unknown',
      });
    });
  });

  document.querySelectorAll('img[data-review-qr]').forEach(function (img) {
    img.setAttribute('src', reviewQr);
  });

})();
