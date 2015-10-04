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
        <div class="row">
            <div class="medium-left small-only-text-center">
                <span class="phone-number"><i class="fa fa-phone"></i> <?php echo get_phone_number_link( get_theme_mod( 'mullins_phone_number', '(517) 867-5309' ) ); ?></span>
                <span class="facebook"><i class="fa fa-facebook-square"></i> <a href = "<?php echo get_theme_mod( 'mullins_facebook_url', 'http://facebook.com' ); ?>" target = "_blank">Follow us on Facebook!</a></span>
            </div>
        </div>
		<div class="row">
			<div class="logo medium-left small-only-text-center">
				<a href="<?php bloginfo( 'url' ); ?>" title = "<?php bloginfo( 'name' ); ?> - Home">
					<img src="<?php echo get_theme_mod( 'mullins_logo_image', 'http://placehold.it/350x150' ); ?>" alt = "<?php bloginfo( 'name' ); ?>"/>
				</a>
			</div>

			<div class="container medium-right small-only-text-center show-for-medium-up">
				<div class="row">
					<div class="columns small-12">
						<div class="medium-right">
							<?php //get_search_form(); ?>
						</div>

						<nav class="top-nav medium-right">
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
		</div>
	</header>

	<div class="mobile-search hide-for-medium-up">
		<?php get_search_form(); ?>
	</div>

	<div class="mobile-bible-verse text-center hide-for-medium-up">
		<?php //dynamic_sidebar( 'header-bible-verse' ); ?>
	</div>

	<?php //include __DIR__ . '/includes/partials/bucket-menu.php'; ?>

	<section id="site-content">