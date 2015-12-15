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

                <div id="angies-list-badge" class="text-center">
                    <a href="<?php echo get_theme_mod( 'angies_list_link', 'http://angieslist.com' ); ?>" title = "Review Us!">
                        <img src="<?php echo get_theme_mod( 'angies_list_image', 'http://placeholdit.imgix.net/~text?txtsize=33&txt=Angie%27s+List+Badge&w=250&h=250&txttrack=0' ); ?>" />
                    </a>
                </div>

                <div id = "newsletter">
                    <?php
                        // There's no way to utilize "after_widget" within the actual Widget Options
                        the_widget( 'mailchimpSF_Widget', 'after_widget=<div class="text-right"><a href = "#" data-reveal-id="drawing-terms-modal">Terms and Conditions</a></div>&after_title=<span class="fa fa-envelope-o alignright"></h2>');
                    ?>
                </div>

        </div>

    </div>
</section>

<?php

mullins_template( 'modal-drawing_terms' );
mullins_template( 'modal-testimonial_entry' );

get_footer();
