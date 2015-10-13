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

<div id="home-cta" style = "background-color: <?php echo get_theme_mod( 'cta_service_call_color', '#41EEFF' ); ?>">

    <div class="row">
        <div class="small-12 columns">

            <div class="tabs-content">
                <section id="schedule_service_call" role="tabpanel" aria-hidden="true" class="content active">
                    <h2>Schedule a Service Call</h2>
                    <div class="medium-6 small-12 columns">
                        <img src="<?php echo get_theme_mod( 'cta_service_call_image', 'http://placehold.it/300x200' ); ?>" alt = "Schedule a Service Call"/>
                    </div>
                    <div class="medium-6 small-12 columns cta-text">
                        <?php echo get_theme_mod( 'cta_service_call_text', '<p>Enter Text Using the Customizer</p>' ); ?>
                        <a href="#" data-reveal-id="cta-modal" class = "button">Schedule a Service Call Today!</a>
                    </div>
                </section>
                <section id="dependability_promise" role="tabpanel" aria-hidden="true" class="content">
                    <h2>Dependability Promise</h2>
                    <div class="medium-6 small-12 columns">
                        <img src="<?php echo get_theme_mod( 'cta_dependability_promise_image', 'http://placehold.it/300x200' ); ?>" alt = "Schedule a Service Call"/>
                    </div>
                    <div class="medium-6 small-12 columns cta-text">
                        <?php echo get_theme_mod( 'cta_dependability_promise_text', '<p>Enter Text Using the Customizer</p>' ); ?>
                    </div>
                </section>
            </div>

            <ul class="tabs" data-tab="" role="tablist">
                <li class="tab-title active small-6" role="presentational">
                    <a href="#schedule_service_call" role="tab" tabindex="0" aria-selected="false" controls="tabs-deeplink-1">Schedule a Service Call</a>
                </li>
                <li class="tab-title small-6" role="presentational">
                    <a href="#dependability_promise" role="tab" tabindex="0" aria-selected="false" controls="tabs-deeplink-2">Dependability Promise</a>
                </li>
            </ul>

        </div>
    </div>

</div>

<section id="page-<?php the_ID(); ?>" <?php body_class( array( 'page-content' ) ); ?>>
    <div class="row">
        <div class="small-12 columns">

            <div id = "home-services" class="page-copy">

                <?php

                    $services_page = get_page_by_title( 'Services' );
                    $services_children = get_posts( array(
                        'post_parent' => $services_page->ID,
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'post_type' => 'page',
                    ) );

                    global $post;

                    $max_grid = get_theme_mod( 'mullins_grid_columns', 3 );
                    $remainder = count( $services_children ) % $max_grid;

                    $count_without_remainder = count( $services_children ) - $remainder;
                    $index = 0;

                    global $post;

                    while ( $index < $count_without_remainder ) {
                        $post = $services_children[$index];

                        setup_postdata( $post );
                        $title = str_replace( ' ', '_', strtolower( get_the_title() ) );

                                    ?>
                                    <a href = "<?php the_permalink(); ?>">
                                        <div id = "<?php echo $title; ?>_grid_item" class="medium-<?php echo (12/$max_grid); ?> small-12 columns button">
                                            <i class = "fa fa-<?php echo get_theme_mod( 'mullins_' . $title . '_icon', 'flag' ); ?>"></i>
                                            <h3><?php the_title(); ?></h3>
                                        </div>
                                    </a>
                                    <?php
                        $index++;
                    }

                    while ( $index < count( $services_children ) ) {
                        $post = $services_children[$index];

                        setup_postdata( $post );
                        $title = str_replace( ' ', '_', strtolower( get_the_title() ) );

                                    ?>
                                    <a href = "<?php the_permalink(); ?>">
                                        <div id = "<?php echo $title; ?>_grid_item" class="medium-<?php echo (12/$remainder); ?> small-12 columns button">
                                            <i class = "fa fa-<?php echo get_theme_mod( 'mullins_' . $title . '_icon', 'flag' ); ?>"></i>
                                            <h3><?php the_title(); ?></h3>
                                        </div>
                                    </a>
                                    <?php
                        $index++;
                    }

                    wp_reset_postdata();

                ?>

            </div>

            <div class = "page-copy">

                <?php the_content(); ?>

            </div>
        </div>

    </div>
</section>

<?php

get_footer();