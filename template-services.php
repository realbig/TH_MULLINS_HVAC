<?php
/**
 * Template Name: Services
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
        <div class="small-12 columns">

            <div id = "services" class="page-copy">

                <?php

                    $services_children = get_posts( array(
                        'post_parent' => get_the_ID(),
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'post_type' => 'page',
                    ) );

                    global $post;

                    $max_grid = get_theme_mod( 'mullins_grid_columns', 3 );
                    $remainder = count( $services_children ) % $max_grid;

                    $index = 0;

                    global $post;

                    ?>

                    <div class="row">

                    <?php

                    while ( $index < $remainder ) {
                        $post = $services_children[$index];

                        setup_postdata( $post );
                        $title = str_replace( ' ', '_', strtolower( get_the_title() ) );

                                    ?>
                                    <a href = "<?php the_permalink(); ?>" class="medium-<?php echo (12/$remainder); ?> small-12 columns">
                                        <div id = "<?php echo $title; ?>_grid_item" class="fill button" style = "background-image: url('<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' )[0]; ?>');">
                                            <div class="overlay"></div>
                                            <h3><?php the_title(); ?></h3>
                                        </div>
                                    </a>
                                    <?php
                        $index++;
                    }

                    ?>

                    </div>
                    <div class="row">

                    <?php

                    while ( $index < count( $services_children ) ) {
                        $post = $services_children[$index];

                        setup_postdata( $post );
                        $title = str_replace( ' ', '_', strtolower( get_the_title() ) );

                                    ?>
                                    <a href = "<?php the_permalink(); ?>" class="medium-<?php echo (12/$max_grid); ?> small-12 columns">
                                        <div id = "<?php echo $title; ?>_grid_item" class="fill button" style = "background-image: url('<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' )[0]; ?>');">
                                            <div class="overlay"></div>
                                            <h3><?php the_title(); ?></h3>
                                        </div>
                                    </a>
                                    <?php
                        $index++;
                    }

                    wp_reset_postdata();

                ?>

                    </div>

            </div>

            <div class = "page-copy">

                <?php the_content(); ?>

            </div>
        </div>

    </div>
</section>

<?php

get_footer();
