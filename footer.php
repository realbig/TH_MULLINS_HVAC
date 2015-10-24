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

</footer>

<?php // #wrapper ?>
</div>

<?php wp_footer(); ?>

</body>
</html>
