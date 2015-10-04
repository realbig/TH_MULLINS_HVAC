<?php
/**
 * Post index page.
 *
 * @since 0.1.0
 * @package Mullins
 *
 * @global WP_Query $wp_query
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

get_header();
?>

	<section id="post-index" class="page-content">
		<div class="row collapse">

			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class( array( 'small-12', 'columns' ) ); ?>>

						<h1 class="post-title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h1>

						<div class="post-copy">
							<?php the_excerpt(); ?>
						</div>

					</article>
					<?php
				endwhile;
			else:
				?>

				<div class="small-12 columns">
					Nothing found.
				</div>

			<?php endif; ?>
		</div>
	</section>

<?php
get_footer();