<?php
/**
 * The theme's header file that appears on EVERY page.
 *
 * @since   0.1.0
 * @package Mullins
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Start a session to preserve bucket data
if ( ! isset( $_SESSION ) ) {
	session_start();
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/vendor/js/html5.js"></script>
	<![endif]-->

    <title><?php wp_title( '|', true, 'right' ); ?></title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">
    
    <div id="top-bar" class="full-width">
        <div class="row">
            <div class="small-only-text-center">
                <span class="phone-number medium-left"><span class="fa fa-phone"></span> <?php echo get_phone_number_link( get_theme_mod( 'mullins_phone_number', '(517) 867-5309' ) ); ?></span>
                <span class="facebook medium-right"><span class="fa fa-facebook-square"></span> <a href = "<?php echo get_theme_mod( 'mullins_facebook_url', 'http://facebook.com' ); ?>" target = "_blank">Follow Us On Facebook!</a></span>
            </div>
        </div>
    </div>

	<header id="site-header">
        
		<div class="row">
			<div class="logo small-text-center">
				<a href="<?php bloginfo( 'url' ); ?>" title = "<?php bloginfo( 'name' ); ?> - Home">
					<img src="<?php echo get_theme_mod( 'mullins_logo_image', 'http://placehold.it/350x150' ); ?>" alt = "<?php bloginfo( 'name' ); ?>"/>
				</a>
			</div>
        </div>
        <div class = "row">

			<div class="container small-text-center show-for-medium-up">

					<div class="columns small-12">

						<nav class="top-nav">
							<?php

                            require_once __DIR__ . '/includes/class-mullins-walker-primarynav.php';

                            $menu  = get_menu_by_location( 'primary' );
                            $items = wp_get_nav_menu_items( $menu->name );
                            foreach ( $items as $i => $item ) {
                                if ( $item->menu_item_parent != '0' ) {
                                    unset( $items[ $i ] );
                                }
                            }

							wp_nav_menu( array(
								'theme_location' => 'primary',
                                'container'      => false,
                                'depth'          => 2,
                                'walker'         => new Mullins_Walker_PrimaryNav( count( $items ) ),
							) );

							?>
						</nav>
                        
					</div>

			</div>
		</div>
	</header>

	<section id="site-content">
