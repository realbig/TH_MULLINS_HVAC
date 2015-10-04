<?php
/**
 * The theme's footer file that appears on EVERY page.
 *
 * @since   0.1.0
 * @package Mullins
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
?>

<?php // #site-content ?>
</section>

<footer id="site-footer">
	<nav class="primary-nav">
		<div class="row">
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
		</div>
	</nav>

	<div class="footer-menu show-for-medium-up">
		<div class="row">
			<?php
/*
			$footer_menu_pages = array();
			for ( $i = 1; $i <= 5; $i ++ ) {
				$footer_menu_pages[] = get_option( "mullins_footer_menu_$i" );
			}
			$footer_menu_pages = array_filter( $footer_menu_pages );

			$columns = count( $footer_menu_pages );

			if ( ! empty( $footer_menu_pages ) ) {
				$i = 0;
				foreach ( $footer_menu_pages as $page_ID ) {

					$i++;
					echo '<ul class="footer-menu-column columns medium-' .
					     round( 12 / $columns ) .
					     ( count( $footer_menu_pages ) == $i ? ' end' : '' ) .
					     '">';

					wp_list_pages( array(
						'child_of' => (int) $page_ID,
						'title_li' => get_the_title( $page_ID ),
					) );

					echo '</ul>';
				}
			}
            */
			?>
		</div>
	</div>

	<!-- Small screen footer -->
	<div class="footer-mobile hide-for-medium-up text-center">
		<div class="phone">
			<?php //echo mullins_sc_phone(); ?>
		</div>

		<div class="social">
			<a href="<?php //echo get_option( 'mullins_social_facebook', '#' ); ?>" class="button expand facebook">
				Facebook
			</a>
			<a href="<?php //echo get_option( 'mullins_social_youtube', '#' ); ?>" class="button expand youtube">
				YouTube
			</a>
			<a href="<?php //echo get_option( 'mullins_social_linkedin', '#' ); ?>" class="button expand linkedin">
				LinkedIn
			</a>
		</div>
	</div>
</footer>

<?php // #wrapper ?>
</div>

<?php wp_footer(); ?>

</body>
</html>