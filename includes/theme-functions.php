<?php

function get_phone_number_link( $phone_number, $link_text = '' ) {

    $tel_link = 'tel:' . preg_replace( '/\D/', '', $phone_number );
    
    if ( $link_text == '' ) $link_text = $phone_number;
    
    return "<a href='$tel_link' class='phone-number-link'>$link_text</a>";

}

function get_menu_by_location( $location ) {

	if ( empty( $location ) ) {
		return false;
	}

	$locations = get_nav_menu_locations();
	if ( ! isset( $locations[ $location ] ) ) {
		return false;
	}

	$menu_obj = get_term( $locations[ $location ], 'nav_menu' );

	return $menu_obj;
    
}