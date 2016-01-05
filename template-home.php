<?php
/**
 * Template Name: Home
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

        <div class = "small-12 medium-8 columns page-copy">

                <?php the_content(); ?>

        </div>

        <div class="small-12 medium-4 columns">

                <?php dynamic_sidebar( 'home-page-sidebar' ); ?>

        </div>

    </div>
</section>

<?php

mullins_template( 'modal-drawing_terms' );
mullins_template( 'modal-testimonial_entry' );

get_footer();
