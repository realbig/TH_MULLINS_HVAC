<?php
/**
 * The theme's functions file that loads on EVERY page, used for uniform functionality.
 *
 * @since   0.1.0
 * @package Mullins
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Make sure PHP version is correct
if ( ! version_compare( PHP_VERSION, '5.3.0', '>=' ) ) {
	wp_die( 'ERROR in Mullins theme: PHP version 5.3 or greater is required.' );
}

// Make sure no theme constants are already defined (realistically, there should be no conflicts)
if ( defined( 'THEME_VERSION' ) || defined( 'THEME_ID' ) || isset( $mullins_fonts ) ) {
	wp_die( 'ERROR in Mullins theme: There is a conflicting constant. Please either find the conflict or rename the constant.' );
}

/**
 * The theme's current version (make sure to keep this up to date!)
 */
define( 'THEME_VERSION', '0.1.0' );

/**
 * The theme's ID (used in handlers).
 */
define( 'THEME_ID', 'mullins_theme' );

/**
 * Fonts for the theme. Must be hosted font (Google fonts for example).
 */
$mullins_fonts = array(
	'Font Awesome' => '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
);

/**
 * Setup theme properties and stuff.
 *
 * @since 0.1.0
 */
add_action( 'after_setup_theme', function () {

	// Image sizes
	if ( ! empty( $mullins_image_sizes ) ) {

		foreach ( $mullins_image_sizes as $ID => $size ) {
			add_image_size( $ID, $size['width'], $size['height'], $size['crop'] );
		}

		add_filter( 'image_size_names_choose', '_meesdist_add_image_sizes' );
	}
    
    // Add Customizer Controls
    add_action( 'customize_register', 'mullins_customize_register' );
    
    // Add Customizer JavaScript
    add_action( 'customize_preview_init', 'mullins_customizer_live_preview' );

	// Allow shortcodes in text widget
	add_filter( 'widget_text', 'do_shortcode' );
    
} );

/**
 * Adds support for custom image sizes.
 *
 * @since 0.1.0
 *
 * @param $sizes array The existing image sizes.
 *
 * @return array The new image sizes.
 */
function _meesdist_add_image_sizes( $sizes ) {

	global $mullins_image_sizes;

	$new_sizes = array();
	foreach ( $mullins_image_sizes as $ID => $size ) {
		$new_sizes[ $ID ] = $size['title'];
	}

	return array_merge( $sizes, $new_sizes );
}

/**
 * Adds custom Customizer Controls.
 *
 * @since 0.1.0
 */
function mullins_customize_register( $wp_customize ) {
    
    $wp_customize->add_section( 'mullins_customizer_section' , array(
            'title'      => __( 'Mullins Settings', THEME_ID ),
            'priority'   => 30,
        ) 
    );
    
    $wp_customize->add_setting( 'mullins_logo_image' , array(
            'default'     => 'http://placehold.it/350x150',
            'transport'   => 'postMessage',
        ) 
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mullins_logo_image', array(
        'label'        => __( 'Logo', THEME_ID ),
        'section'    => 'mullins_customizer_section',
        'settings'   => 'mullins_logo_image',
    ) ) );
    
    $wp_customize->add_setting( 'mullins_phone_number' , array(
            'default'     => '(517) 867-5309',
            'transport'   => 'postMessage',
        ) 
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mullins_phone_number', array(
        'label'        => __( 'Phone Number', THEME_ID ),
        'section'    => 'mullins_customizer_section',
        'settings'   => 'mullins_phone_number',
    ) ) );
    
    $wp_customize->add_setting( 'mullins_facebook_url' , array(
            'default'     => 'http://facebook.com',
            'transport'   => 'postMessage',
        ) 
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mullins_facebook_url', array(
        'label'        => __( 'Facebook URL', THEME_ID ),
        'section'    => 'mullins_customizer_section',
        'settings'   => 'mullins_facebook_url',
    ) ) );
    
}

/**
 * Adds live-refreshing capability for custom Customizer Controls.
 *
 * @since 0.1.0
 */
function mullins_customizer_live_preview() {
    
    wp_enqueue_script( THEME_ID . '-customizer' );
    
}

/**
 * Register theme files.
 *
 * @since 0.1.0
 */
add_action( 'init', function () {

	global $mullins_fonts;

	// Theme styles
	wp_register_style(
		THEME_ID,
		get_template_directory_uri() . '/style.css',
		null,
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : THEME_VERSION
	);

	// Theme script
	wp_register_script(
		THEME_ID,
		get_template_directory_uri() . '/script.js',
		array( 'jquery' ),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : THEME_VERSION,
		true
	);
    
    // Theme script
	wp_register_script(
		THEME_ID . '-customizer',
		get_template_directory_uri() . '/customizer.js',
		array( 'jquery', 'customize-preview' ),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : THEME_VERSION,
		true
	);

	// Theme fonts
	if ( ! empty( $mullins_fonts ) ) {
		foreach ( $mullins_fonts as $ID => $link ) {
			wp_register_style(
				THEME_ID . "-font-$ID",
				$link
			);
		}
	}
    
} );

/**
 * Enqueue theme files.
 *
 * @since 0.1.0
 */
add_action( 'wp_enqueue_scripts', function () {

	global $mullins_fonts;

	// Theme styles
	wp_enqueue_style( THEME_ID );

	// Theme script
	wp_enqueue_script( THEME_ID );

	// Theme fonts
	if ( ! empty( $mullins_fonts ) ) {
		foreach ( $mullins_fonts as $ID => $link ) {
			wp_enqueue_style( THEME_ID . "-font-$ID" );
		}
	}
} );

/**
 * Register nav menus.
 *
 * @since 0.1.0
 */
add_action( 'after_setup_theme', function () {

	register_nav_menu( 'primary', 'Primary Menu' );
    
} );

/**
 * Register sidebars.
 *
 * @since 0.1.0
 */
add_action( 'widgets_init', function () {

	// Sub-Page
	register_sidebar( array(
		'name'         => 'Sub-Page',
		'id'           => 'subpage',
		'description'  => 'Displays on all sub-pages.',
		'before_title' => '<h3 class="widget-title">',
		'after_title'  => '</h3>',
	) );
    
} );

/**
 * Adds a favicon.
 *
 * @since 0.1.0
 */
add_action( 'wp_head', '_mullins_favicon' );
add_action( 'admin_head', '_mullins_favicon' );
function _mullins_favicon() {

	if ( ! file_exists( get_stylesheet_directory() . '/assets/images/favicon.ico' ) ) {
		return;
	}
	?>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() . '/assets/images/favicon.ico'; ?>" />
	<?php
}

/**
 * Loads a partial.
 *
 * @since 0.1.0
 *
 * @param array|string $template The template to load.
 */
function mullins_template( $template ) {

	$template = is_array( $template ) ? implode( '/', $template ) : $template;

	if ( file_exists( __DIR__ . "/includes/partials/$template.php" ) ) {
		include __DIR__ . "/includes/partials/$template.php";
	}
    
}

require_once __DIR__ . '/includes/theme-functions.php';