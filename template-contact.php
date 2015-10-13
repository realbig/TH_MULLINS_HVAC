<?php
/**
 * Template Name: Contact
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

                <?php echo do_shortcode( get_theme_mod( 'mullins_contact_shortcode', '[contact-form-7 id="31" title="Schedule a Service Call"]' ) ); ?>
				
			</div>
            <div class="medium-3 small-12 columns">
                
                <?php echo get_theme_mod( 'mullins_address', '123 Some Street<br />Anytown, USA 45678' ); ?> <br />
                <?php echo get_phone_number_link( get_theme_mod( 'mullins_phone_number', '(517) 867-5309' ) ); ?> <br />
                <?php echo get_email_link( get_theme_mod( 'mullins_email_address', 'test@fake.com' ) ); ?> 
                
            </div>
            
		</div>
	</section>

<?php
get_footer();
