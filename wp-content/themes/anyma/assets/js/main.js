/* ============================================================
   ANyMA Casa Vacanze — main.js v2.0
   Vanilla JS · No dependencies
   ============================================================ */
( function () {
  'use strict';

  var $  = function ( sel, ctx ) { return ( ctx || document ).querySelector( sel ); };
  var $$ = function ( sel, ctx ) { return Array.prototype.slice.call( ( ctx || document ).querySelectorAll( sel ) ); };
  var on = function ( el, ev, fn, opt ) { if ( el ) el.addEventListener( ev, fn, opt || false ); };

  document.addEventListener( 'DOMContentLoaded', function () {

    /* ── 1. Header scroll ─────────────────────────────────── */
    var header = $( '#site-header' );
    var lastScroll = 0;
    function onHeaderScroll() {
      var y = window.pageYOffset || document.documentElement.scrollTop;
      if ( header ) {
        if ( y > 50 ) { header.classList.add( 'scrolled' ); }
        else { header.classList.remove( 'scrolled' ); }
      }
      lastScroll = y;
    }
    on( window, 'scroll', onHeaderScroll, { passive: true } );
    onHeaderScroll();

    /* ── 2. Sticky bar ────────────────────────────────────── */
    var stickyBar = $( '#sticky-bar' );
    var footer = $( '.site-footer' );
    function onStickyScroll() {
      if ( ! stickyBar ) return;
      var y = window.pageYOffset || document.documentElement.scrollTop;
      var nearFooter = false;
      if ( footer ) {
        var fTop = footer.getBoundingClientRect().top;
        nearFooter = fTop < window.innerHeight + 100;
      }
      if ( y > 600 && ! nearFooter ) {
        stickyBar.hidden = false;
        stickyBar.classList.add( 'sticky-bar--visible' );
      } else {
        stickyBar.classList.remove( 'sticky-bar--visible' );
      }
    }
    on( window, 'scroll', onStickyScroll, { passive: true } );
    onStickyScroll();

    /* ── 3. Mobile menu ───────────────────────────────────── */
    var hamburger = $( '#hamburger' );
    var mobileMenu = $( '#mobile-menu' );
    var mobileClose = $( '#mobile-close' );
    var backdrop = $( '#mobile-backdrop' );

    function openMenu() {
      if ( ! mobileMenu ) return;
      mobileMenu.hidden = false;
      if ( backdrop ) backdrop.hidden = false;
      requestAnimationFrame( function () {
        mobileMenu.classList.add( 'mobile-menu--open' );
        if ( backdrop ) backdrop.classList.add( 'mobile-menu__backdrop--open' );
      } );
      if ( hamburger ) hamburger.setAttribute( 'aria-expanded', 'true' );
      document.body.classList.add( 'menu-open' );
    }
    function closeMenu() {
      if ( ! mobileMenu ) return;
      mobileMenu.classList.remove( 'mobile-menu--open' );
      if ( backdrop ) backdrop.classList.remove( 'mobile-menu__backdrop--open' );
      if ( hamburger ) hamburger.setAttribute( 'aria-expanded', 'false' );
      document.body.classList.remove( 'menu-open' );
      setTimeout( function () {
        mobileMenu.hidden = true;
        if ( backdrop ) backdrop.hidden = true;
      }, 350 );
    }
    on( hamburger, 'click', openMenu );
    on( mobileClose, 'click', closeMenu );
    on( backdrop, 'click', closeMenu );
    $$( '#mobile-menu a' ).forEach( function ( a ) { on( a, 'click', closeMenu ); } );

    /* ── 4. Smooth scroll ─────────────────────────────────── */
    $$( 'a[href^="#"]' ).forEach( function ( link ) {
      on( link, 'click', function ( e ) {
        var id = link.getAttribute( 'href' );
        if ( id === '#' || id === '#0' ) { e.preventDefault(); return; }
        var target = document.getElementById( id.slice( 1 ) );
        if ( target ) {
          e.preventDefault();
          var offset = header ? header.offsetHeight + 10 : 0;
          var top = target.getBoundingClientRect().top + window.pageYOffset - offset;
          window.scrollTo( { top: top, behavior: 'smooth' } );
        }
      } );
    } );

    /* ── 5. Scroll reveal ─────────────────────────────────── */
    var revealEls = $$( '[data-reveal]' );
    if ( 'IntersectionObserver' in window && revealEls.length ) {
      var io = new IntersectionObserver( function ( entries ) {
        entries.forEach( function ( entry ) {
          if ( entry.isIntersecting ) {
            var el = entry.target;
            var delay = parseInt( el.getAttribute( 'data-delay' ) || '0', 10 );
            setTimeout( function () { el.classList.add( 'visible' ); }, delay );
            io.unobserve( el );
          }
        } );
      }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' } );
      revealEls.forEach( function ( el ) { io.observe( el ); } );
    } else {
      revealEls.forEach( function ( el ) { el.classList.add( 'visible' ); } );
    }

    /* ── 6. Lightbox ──────────────────────────────────────── */
    var lightboxLinks = $$( '[data-lightbox]' );
    var lbGroups = {};
    lightboxLinks.forEach( function ( a ) {
      var g = a.getAttribute( 'data-lightbox' );
      if ( ! lbGroups[ g ] ) lbGroups[ g ] = [];
      lbGroups[ g ].push( a );
    } );

    var lb = null, lbImg = null, lbCurrent = [], lbIndex = 0;
    function buildLightbox() {
      lb = document.createElement( 'div' );
      lb.className = 'lightbox';
      lb.setAttribute( 'role', 'dialog' );
      lb.setAttribute( 'aria-modal', 'true' );
      lb.innerHTML =
        '<button class="lightbox__close" aria-label="Chiudi">&times;</button>' +
        '<button class="lightbox__prev" aria-label="Precedente">&#8249;</button>' +
        '<img class="lightbox__img" alt="">' +
        '<button class="lightbox__next" aria-label="Successivo">&#8250;</button>';
      document.body.appendChild( lb );
      lbImg = $( '.lightbox__img', lb );
      on( $( '.lightbox__close', lb ), 'click', closeLightbox );
      on( $( '.lightbox__prev', lb ), 'click', function ( e ) { e.stopPropagation(); lbShow( lbIndex - 1 ); } );
      on( $( '.lightbox__next', lb ), 'click', function ( e ) { e.stopPropagation(); lbShow( lbIndex + 1 ); } );
      on( lb, 'click', function ( e ) { if ( e.target === lb ) closeLightbox(); } );
    }
    function lbShow( i ) {
      if ( ! lbCurrent.length ) return;
      lbIndex = ( i + lbCurrent.length ) % lbCurrent.length;
      var href = lbCurrent[ lbIndex ].getAttribute( 'href' );
      var img = lbCurrent[ lbIndex ].querySelector( 'img' );
      lbImg.src = href;
      lbImg.alt = img ? img.alt : '';
    }
    function openLightbox( group, index ) {
      if ( ! lb ) buildLightbox();
      lbCurrent = lbGroups[ group ] || [];
      lbShow( index );
      lb.classList.add( 'lightbox--open' );
      document.body.classList.add( 'menu-open' );
    }
    function closeLightbox() {
      if ( lb ) lb.classList.remove( 'lightbox--open' );
      document.body.classList.remove( 'menu-open' );
    }
    lightboxLinks.forEach( function ( a ) {
      on( a, 'click', function ( e ) {
        if ( ! a.getAttribute( 'href' ) ) return;
        e.preventDefault();
        var g = a.getAttribute( 'data-lightbox' );
        openLightbox( g, lbGroups[ g ].indexOf( a ) );
      } );
    } );

    /* swipe touch */
    var touchX = 0;
    on( document, 'touchstart', function ( e ) { if ( lb && lb.classList.contains( 'lightbox--open' ) ) touchX = e.changedTouches[0].clientX; }, { passive: true } );
    on( document, 'touchend', function ( e ) {
      if ( ! lb || ! lb.classList.contains( 'lightbox--open' ) ) return;
      var dx = e.changedTouches[0].clientX - touchX;
      if ( Math.abs( dx ) > 50 ) { lbShow( dx > 0 ? lbIndex - 1 : lbIndex + 1 ); }
    }, { passive: true } );

    /* ── 7. Gallery filter ────────────────────────────────── */
    $$( '.filter-btn' ).forEach( function ( btn ) {
      on( btn, 'click', function () {
        var filter = btn.getAttribute( 'data-filter' );
        var group = btn.closest( 'section' ) || document;
        $$( '.filter-btn', group ).forEach( function ( b ) { b.classList.remove( 'filter-btn--active' ); } );
        btn.classList.add( 'filter-btn--active' );
        $$( '[data-category]', group ).forEach( function ( item ) {
          if ( item.classList.contains( 'review-card__platform' ) ) return;
          var show = filter === 'all' || item.getAttribute( 'data-category' ) === filter;
          item.classList.toggle( 'is-hidden', ! show );
        } );
      } );
    } );

    /* ── 8. Tabs ──────────────────────────────────────────── */
    $$( '.tab-btn' ).forEach( function ( btn ) {
      on( btn, 'click', function () {
        var tab = btn.getAttribute( 'data-tab' );
        var wrap = btn.closest( '.tabs' );
        if ( ! wrap ) return;
        $$( '.tab-btn', wrap ).forEach( function ( b ) { b.classList.remove( 'tab-btn--active' ); } );
        $$( '.tab-panel', wrap ).forEach( function ( p ) { p.classList.remove( 'tab-panel--active' ); } );
        btn.classList.add( 'tab-btn--active' );
        var panel = wrap.querySelector( '.tab-panel[data-panel="' + tab + '"]' );
        if ( panel ) panel.classList.add( 'tab-panel--active' );
      } );
    } );

    /* ── 9. FAQ accordion ─────────────────────────────────── */
    $$( '.faq-item__trigger' ).forEach( function ( trigger ) {
      on( trigger, 'click', function () {
        var item = trigger.closest( '.faq-item' );
        var panel = $( '.faq-item__panel', item );
        var isOpen = item.classList.contains( 'faq-item--open' );
        if ( isOpen ) {
          panel.style.height = panel.scrollHeight + 'px';
          requestAnimationFrame( function () { panel.style.height = '0px'; } );
          item.classList.remove( 'faq-item--open' );
          trigger.setAttribute( 'aria-expanded', 'false' );
        } else {
          item.classList.add( 'faq-item--open' );
          trigger.setAttribute( 'aria-expanded', 'true' );
          panel.style.height = panel.scrollHeight + 'px';
          on( panel, 'transitionend', function te() {
            if ( item.classList.contains( 'faq-item--open' ) ) panel.style.height = 'auto';
            panel.removeEventListener( 'transitionend', te );
          } );
        }
      } );
    } );

    /* ── 10. Cookie banner ────────────────────────────────── */
    var cookieBanner = $( '#cookie-banner' );
    if ( cookieBanner && ! localStorage.getItem( 'anyma_cookie' ) ) {
      setTimeout( function () {
        cookieBanner.hidden = false;
        cookieBanner.classList.add( 'cookie-banner--visible' );
      }, 1200 );
    }
    function dismissCookie( val ) {
      localStorage.setItem( 'anyma_cookie', val );
      if ( cookieBanner ) {
        cookieBanner.classList.remove( 'cookie-banner--visible' );
        setTimeout( function () { cookieBanner.hidden = true; }, 300 );
      }
    }
    on( $( '#cookie-accept' ), 'click', function () { dismissCookie( 'accepted' ); } );
    on( $( '#cookie-decline' ), 'click', function () { dismissCookie( 'declined' ); } );

    /* ── 11. Form validation ──────────────────────────────── */
    function validateForm( form ) {
      var ok = true;
      var msg = form.querySelector( '[data-form-message]' );
      $$( '[required]', form ).forEach( function ( field ) {
        field.classList.remove( 'field-error' );
        var val = ( field.value || '' ).trim();
        if ( field.type === 'checkbox' ) { if ( ! field.checked ) { ok = false; field.classList.add( 'field-error' ); } return; }
        if ( ! val ) { ok = false; field.classList.add( 'field-error' ); }
        if ( field.type === 'email' && val && ! /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test( val ) ) { ok = false; field.classList.add( 'field-error' ); }
      } );
      var ci = form.querySelector( '[name="checkin"]' );
      var co = form.querySelector( '[name="checkout"]' );
      if ( ci && co && ci.value && co.value && new Date( co.value ) <= new Date( ci.value ) ) {
        ok = false; co.classList.add( 'field-error' );
      }
      if ( msg ) {
        msg.hidden = false;
        msg.textContent = ok ? 'Grazie! La tua richiesta è stata inviata.' : 'Controlla i campi evidenziati e riprova.';
        msg.className = 'form-note ' + ( ok ? 'form-note--ok' : 'form-note--err' );
      }
      return ok;
    }
    [ '#contact-form', '#booking-form' ].forEach( function ( sel ) {
      var form = $( sel );
      if ( ! form ) return;
      on( form, 'submit', function ( e ) {
        if ( ! validateForm( form ) ) { e.preventDefault(); }
        else { e.preventDefault(); form.reset(); }
      } );
    } );

    /* ── 12. Lang switcher ────────────────────────────────── */
    $$( '.lang-btn' ).forEach( function ( btn ) {
      on( btn, 'click', function ( e ) {
        e.preventDefault();
        $$( '.lang-btn' ).forEach( function ( b ) { b.classList.remove( 'lang-btn--active' ); } );
        btn.classList.add( 'lang-btn--active' );
        // Placeholder per WPML — qui andrebbe il redirect alla lingua.
      } );
    } );

    /* ── Global Escape key ────────────────────────────────── */
    on( document, 'keydown', function ( e ) {
      if ( e.key === 'Escape' ) {
        if ( lb && lb.classList.contains( 'lightbox--open' ) ) closeLightbox();
        if ( mobileMenu && mobileMenu.classList.contains( 'mobile-menu--open' ) ) closeMenu();
      }
      if ( lb && lb.classList.contains( 'lightbox--open' ) ) {
        if ( e.key === 'ArrowLeft' ) lbShow( lbIndex - 1 );
        if ( e.key === 'ArrowRight' ) lbShow( lbIndex + 1 );
      }
    } );

  } );
} )();
