/* ANyMA Customizer Live Preview (postMessage) */
( function ( $ ) {
  'use strict';
  if ( typeof wp === 'undefined' || ! wp.customize ) { return; }

  var bind = function ( setting, cb ) {
    wp.customize( setting, function ( value ) { value.bind( cb ); } );
  };

  bind( 'anyma_property_name', function ( v ) { $( '.site-name, .footer-brand' ).text( v ); } );
  bind( 'anyma_tagline', function ( v ) { $( '.site-sub' ).text( v ); } );
  bind( 'anyma_tagline_long', function ( v ) { $( '.footer-tagline' ).text( v ); } );
  bind( 'anyma_hero_eyebrow', function ( v ) { $( '.hero__eyebrow' ).text( v ); } );
  bind( 'anyma_hero_title', function ( v ) { $( '.hero__title' ).text( v ); } );
  bind( 'anyma_hero_subtitle', function ( v ) { $( '.hero__sub' ).text( v ); } );
  bind( 'anyma_about_title', function ( v ) { $( '.about__content .section-title' ).text( v ); } );
  bind( 'anyma_about_eyebrow', function ( v ) { $( '.about__content .eyebrow' ).text( v ); } );
  bind( 'anyma_review_score', function ( v ) { $( '.trust-score, .global-score__num, .reviews-hero-score__num' ).text( v ); } );

  var setColor = function ( prop, v ) {
    document.documentElement.style.setProperty( prop, v );
  };
  bind( 'anyma_color_gold', function ( v ) { setColor( '--color-gold', v ); } );
  bind( 'anyma_color_navy', function ( v ) { setColor( '--color-navy', v ); } );
  bind( 'anyma_color_sand', function ( v ) { setColor( '--color-sand', v ); } );

  for ( var i = 1; i <= 3; i++ ) {
    ( function ( n ) {
      bind( 'anyma_feat' + n + '_title', function ( v ) { $( '.feat-card' ).eq( n - 1 ).find( '.feat-card__title' ).text( v ); } );
      bind( 'anyma_feat' + n + '_text', function ( v ) { $( '.feat-card' ).eq( n - 1 ).find( '.feat-card__text' ).text( v ); } );
    } )( i );
  }
} )( jQuery );
