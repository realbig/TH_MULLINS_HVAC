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

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">

	<header id="site-header">

        <div class = "row">
        
            <div class = "medium-4 small-12 columns">
                <div class = "row">
                    <div class = "small-12 columns">
                        <h2 class="phone-number text-center"><span class="fa fa-phone"></span> <?php echo get_phone_number_link( get_theme_mod( 'mullins_phone_number', '(517) 867-5309' ) ); ?></h2>
                    </div>
                    <div class = "small-12 columns">
                        <a href="<?php bloginfo( 'url' ); ?>" title = "<?php bloginfo( 'name' ); ?> - Home">
					<img src="<?php echo get_theme_mod( 'mullins_logo_image', 'http://placehold.it/350x150' ); ?>" alt = "<?php bloginfo( 'name' ); ?>"/>
				</a>
                    </div>
                </div>
            </div>

            <div class = "medium-8 hide-for-small-only columns">
                <?php echo do_shortcode( '[realbig_slider ids = "12,14" classes = "header-testimonials" arrows = false indicators = false]' ); ?>
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
