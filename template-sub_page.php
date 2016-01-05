<?php
/**
 * Template Name: Services Sub-Page
 *
 * @since 0.1.0
 * @package Mullins
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

get_header();

the_post();
?>

	<section id="page-<?php the_ID(); ?>" <?php body_class( array( 'page-content' ) ); ?>>
		<div class="row">
			<div class="medium-9 small-12 columns">

				<?php if ( has_post_thumbnail() ) : ?>
					<div class="page-image">
						<?php the_post_thumbnail( 'medium' ); ?>
					</div>
				<?php endif; ?>

				<div class="page-copy">
                    <h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
			</div>
            <div class="medium-3 small-12 columns">
                <?php dynamic_sidebar( 'services-sub-page-sidebar' ); ?>
            </div>
            
		</div>
	</section>

<?php

mullins_template( 'modal-drawing_terms' );

get_footer();
