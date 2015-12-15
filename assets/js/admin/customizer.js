/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {
    
    function getPhoneNumberLink( phoneNumber, linkText ) {
        // JavaScript clone of function found in includes/theme-functions.php
        
        var telLink = 'tel:' + phoneNumber.replace( /\D/g, '' );
    
        if ( linkText === undefined ) linkText = phoneNumber;
    
        return '<a href = "' + telLink + '" class = "phone-number-link">' + linkText + '</a>';
        
    }

    function getEmailLink( emailAddress, linkText ) {
        // JavaScript clone of function found in includes/theme-functions.php

        var mailtoLink = 'mailto:' + emailAddress.trim();

        if ( linkText === undefined ) linkText = emailAddress;

        return '<a href = "' + mailtoLink + '" class = "email-link">' + linkText + '</a>';

    }

	// Binds directly to Customizer Controls for instaneous changes. No soft-refreshes.
	wp.customize( 'mullins_logo_image', function( value ) {
		value.bind( function( newVal ) {
			$( '.logo a img' ).attr( 'src', newVal );
		} );
	} );
	wp.customize( 'mullins_phone_number', function( value ) {
		value.bind( function( newVal ) {
			$( '#site-header .phone-number-link' ).replaceWith( getPhoneNumberLink( newVal ) );
		} );
	} );
    wp.customize( 'mullins_facebook_url', function( value ) {
		value.bind( function( newVal ) {
			$( '#site-header .facebook a' ).attr( 'href', newVal );
		} );
	} );
    wp.customize( 'mullins_email_address', function( value ) {
		value.bind( function( newVal ) {
			$( '.page-template-template-contact .email-link' ).replaceWith( getEmailLink( newVal ) );
		} );
	} );

    /* Home Page */

	wp.customize( 'angies_list_link', function( value ) {
		value.bind( function( newVal ) {
			$( '#angies-list-badge a' ).attr( 'href', newVal );
		} );
	} );
    wp.customize( 'angies_list_image', function( value ) {
		value.bind( function( newVal ) {
			$( '#angies-list-badge a img' ).attr( 'src', newVal );
		} );
	} );
	
} )( jQuery );
