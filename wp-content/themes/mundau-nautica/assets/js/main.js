(function () {
  'use strict';

  var toggle = document.querySelector('.site-menu-toggle');
  var navigation = document.querySelector('#primary-menu');

  function closeMenu() {
    if (!toggle || !navigation) {
      return;
    }

    toggle.setAttribute('aria-expanded', 'false');
    toggle.setAttribute('aria-label', 'Abrir menu');
    navigation.classList.remove('is-open');
    document.body.classList.remove('has-open-menu');
  }

  function openMenu() {
    if (!toggle || !navigation) {
      return;
    }

    toggle.setAttribute('aria-expanded', 'true');
    toggle.setAttribute('aria-label', 'Fechar menu');
    navigation.classList.add('is-open');
    document.body.classList.add('has-open-menu');
  }

  if (toggle && navigation) {
    toggle.addEventListener('click', function () {
      var isExpanded = toggle.getAttribute('aria-expanded') === 'true';

      if (isExpanded) {
        closeMenu();
      } else {
        openMenu();
      }
    });

    navigation.addEventListener('click', function (event) {
      if (event.target.closest('a')) {
        closeMenu();
      }
    });

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape') {
        closeMenu();
      }
    });
  }

  var hero = document.querySelector('.hero-section--has-image');
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  var mobileViewport = window.matchMedia('(max-width: 760px)');
  var parallaxTicking = false;
  var navTicking = false;
  var activeNavLinks = navigation ? Array.prototype.slice.call(navigation.querySelectorAll('.site-navigation__menu a[href^="#"]')) : [];
  var activeSections = activeNavLinks
    .map(function (link) {
      var id = link.getAttribute('href').slice(1);
      var section = document.getElementById(id);

      return section ? { id: id, link: link, section: section } : null;
    })
    .filter(Boolean)
    .sort(function (a, b) {
      return a.section.offsetTop - b.section.offsetTop;
    });

  function updateHeroParallax() {
    parallaxTicking = false;

    if (!hero || reduceMotion.matches || mobileViewport.matches) {
      if (hero) {
        hero.style.setProperty('--hero-parallax-y', '0px');
      }

      return;
    }

    var rect = hero.getBoundingClientRect();
    var viewportHeight = window.innerHeight || document.documentElement.clientHeight;

    if (rect.bottom < 0 || rect.top > viewportHeight) {
      return;
    }

    var progress = (viewportHeight - rect.top) / (viewportHeight + rect.height);
    var offset = (progress - 0.5) * 694;

    hero.style.setProperty('--hero-parallax-y', offset.toFixed(1) + 'px');
  }

  function requestHeroParallaxUpdate() {
    if (!parallaxTicking) {
      window.requestAnimationFrame(updateHeroParallax);
      parallaxTicking = true;
    }
  }

  function updateActiveNavigation() {
    var header = document.querySelector('.site-header');
    var headerHeight = header ? header.offsetHeight : 0;
    var viewportHeight = window.innerHeight || document.documentElement.clientHeight;
    var documentHeight = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
    var scrollY = window.pageYOffset || document.documentElement.scrollTop;
    var marker = scrollY + headerHeight + Math.min(viewportHeight * 0.35, 260);
    var current = activeSections[0];

    navTicking = false;

    if (scrollY + viewportHeight >= documentHeight - 4) {
      current = activeSections[activeSections.length - 1];
    } else {
      activeSections.forEach(function (item) {
        if (item.section.offsetTop <= marker) {
          current = item;
        }
      });
    }

    activeSections.forEach(function (item) {
      var isActive = item === current;

      item.link.classList.toggle('is-active', isActive);

      if (isActive) {
        item.link.setAttribute('aria-current', 'true');
      } else {
        item.link.removeAttribute('aria-current');
      }
    });
  }

  function requestActiveNavigationUpdate() {
    if (!navTicking) {
      window.requestAnimationFrame(updateActiveNavigation);
      navTicking = true;
    }
  }

  // Sticky header shrink on scroll
  var siteHeader = document.querySelector('.site-header');
  var headerScrollTicking = false;
  var SCROLL_THRESHOLD = 40;

  function updateHeaderScrollState() {
    headerScrollTicking = false;
    if (!siteHeader) {
      return;
    }
    var scrolled = (window.pageYOffset || document.documentElement.scrollTop) > SCROLL_THRESHOLD;
    siteHeader.classList.toggle('is-scrolled', scrolled);
  }

  if (siteHeader) {
    updateHeaderScrollState();
    window.addEventListener('scroll', function () {
      if (!headerScrollTicking) {
        window.requestAnimationFrame(updateHeaderScrollState);
        headerScrollTicking = true;
      }
    }, { passive: true });
  }

  if (hero) {
    updateHeroParallax();
    window.addEventListener('scroll', requestHeroParallaxUpdate, { passive: true });
    window.addEventListener('resize', requestHeroParallaxUpdate);
    reduceMotion.addEventListener('change', requestHeroParallaxUpdate);
    mobileViewport.addEventListener('change', requestHeroParallaxUpdate);
  }

  if (activeSections.length) {
    updateActiveNavigation();
    window.addEventListener('scroll', requestActiveNavigationUpdate, { passive: true });
    window.addEventListener('resize', requestActiveNavigationUpdate);
  }

  // Fade-in sections on scroll — selectors by class, not by sibling relation,
  // so plugin-injected elements and zero-height nodes are never targeted.
  var fadeTargets = document.querySelectorAll(
    '.brand-strip, .site-section, .authority-section, .winter-section'
  );

  if (!reduceMotion.matches && 'IntersectionObserver' in window && fadeTargets.length) {
    var fadeObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            fadeObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.08 }
    );

    fadeTargets.forEach(function (el) {
      el.classList.add('fade-in');
      fadeObserver.observe(el);
    });
  }
})();
