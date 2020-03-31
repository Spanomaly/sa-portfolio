/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	// Update the site title in real time...
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '#site-title a' ).html( newval );
		} );
	} );

	//Update the site description in real time...
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).html( newval );
		} );
	} );

	wp.customize( 'header_bgcolor', function( value ) {
		value.bind( function( newval ) {
			$('header').css('background-color', newval );
		} );
	} );

	//Update site background color...
	wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background-color', newval );
		} );
	} );

  	wp.customize( 'link_textcolor', function( value ) {
		value.bind( function( newval ) {
			$('a').css('color', newval );
		} );
	} );

	wp.customize( 'menu_textcolor', function( value ) {
		value.bind( function( newval ) {
			$('#site-navigation a').css('color', newval );
		} );
	} );

	wp.customize( 'footer_bgcolor', function( value ) {
		value.bind( function( newval ) {
			$('footer').css('background-color', newval );
		} );
	} );
  wp.customize( 'footer_textcolor', function( value ) {
    value.bind( function( newval ) {
      $('footer .footer-copyright span').css('color', newval );
    } );
  } );
} )( jQuery );
