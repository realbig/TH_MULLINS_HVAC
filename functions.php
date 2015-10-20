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

    // Add Customizer Preview JavaScript
    add_action( 'customize_preview_init', 'mullins_customizer_live_preview' );

	// Allow shortcodes in text widget
	add_filter( 'widget_text', 'do_shortcode' );
    
    // Spruce up wp_title();
    add_filter( 'wp_title', 'mullins_wp_title', 10, 2 );

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
    
    // General Theme Options

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
    
    $wp_customize->add_setting( 'mullins_address' , array(
            'default'     => '123 Some Street<br />Anytown, USA 45678',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mullins_address', array(
        'type' => 'textarea',
        'label'        => __( 'Address', THEME_ID ),
        'section'    => 'mullins_customizer_section',
        'settings'   => 'mullins_address',
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
    
    $wp_customize->add_setting( 'mullins_email_address' , array(
            'default'     => 'test@fake.com',
            'transport'   => 'postMessage',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mullins_email_address', array(
        'label'        => __( 'Email Address', THEME_ID ),
        'section'    => 'mullins_customizer_section',
        'settings'   => 'mullins_email_address',
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
    
    $wp_customize->add_setting( 'mullins_contact_shortcode' , array(
            'default'     => '[contact-form-7 id="31" title="Schedule a Service Call"]',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mullins_contact_shortcode', array(
        'label'        => __( 'Contact Form Shortcode', THEME_ID ),
        'section'    => 'mullins_customizer_section',
        'settings'   => 'mullins_contact_shortcode',
    ) ) );

    // Home Page Specific

    $wp_customize->add_section( 'mullins_home_customizer_section' , array(
            'title'      => __( 'Home Page Settings', THEME_ID ),
            'priority'   => 40,
            'active_callback' => 'is_front_page',
        )
    );

    $wp_customize->add_setting( 'cta_service_call_color' , array(
            'default'     => '#41EEFF',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_service_call_color', array(
        'label'        => __( 'Service Call CTA Color', THEME_ID ),
        'section'    => 'mullins_home_customizer_section',
        'settings'   => 'cta_service_call_color',
    ) ) );

    $wp_customize->add_setting( 'cta_service_call_image' , array(
            'default'     => 'http://placehold.it/300x200',
            'transport'   => 'postMessage',
        )
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cta_service_call_image', array(
        'label'        => __( 'Service Call CTA Image', THEME_ID ),
        'section'    => 'mullins_home_customizer_section',
        'settings'   => 'cta_service_call_image',
    ) ) );

    $wp_customize->add_setting( 'cta_service_call_text' , array(
            'default'     => '<p>Enter Text Using the Customizer</p>',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_service_call_text', array(
        'type' => 'textarea',
        'label'        => __( 'Service Call Text', THEME_ID ),
        'section'    => 'mullins_home_customizer_section',
        'settings'   => 'cta_service_call_text',
    ) ) );

    $wp_customize->add_setting( 'cta_dependability_promise_color' , array(
            'default'     => '#002B50',
            'transport'   => 'postMessage',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_dependability_promise_color', array(
        'label'        => __( 'Dependability Promise CTA Color', THEME_ID ),
        'section'    => 'mullins_home_customizer_section',
        'settings'   => 'cta_dependability_promise_color',
    ) ) );

    $wp_customize->add_setting( 'cta_dependability_promise_image' , array(
            'default'     => 'http://placehold.it/300x200',
            'transport'   => 'postMessage',
        )
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cta_dependability_promise_image', array(
        'label'        => __( 'Dependability Promise CTA Image', THEME_ID ),
        'section'    => 'mullins_home_customizer_section',
        'settings'   => 'cta_dependability_promise_image',
    ) ) );

    $wp_customize->add_setting( 'cta_dependability_promise_text' , array(
            'default'     => '<p>Enter Text Using the Customizer</p>',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cta_dependability_promise_text', array(
        'type' => 'textarea',
        'label'        => __( 'Dependability Promise Text', THEME_ID ),
        'section'    => 'mullins_home_customizer_section',
        'settings'   => 'cta_dependability_promise_text',
    ) ) );

    $wp_customize->add_setting( 'mullins_grid_columns' , array(
            'default'     => 3,
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mullins_grid_columns', array(
        'type' => 'number',
        'label'        => __( 'Services Number of Columns', THEME_ID ),
        'section'    => 'mullins_home_customizer_section',
        'settings'   => 'mullins_grid_columns',
    ) ) );

    $services_page = get_page_by_title( 'Services' );
    $services_children = get_posts( array(
        'post_parent' => $services_page->ID,
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'post_type' => 'page',
    ) );
    
    foreach ( $services_children as $service ) {

        $title = str_replace( ' ', '_', strtolower( $service->post_title ) );

        $wp_customize->add_setting( 'mullins_' . $title . '_icon' , array(
                'default'     => 'fa fa-flag',
                'transport'   => 'postMessage',
            )
        );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mullins_' . $title . '_icon', array(
            'label'        => __( $service->post_title . ' Icon Classes', THEME_ID ),
            'section'    => 'mullins_home_customizer_section',
            'settings'   => 'mullins_' . $title . '_icon',
        ) ) );

    }

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

    wp_localize_script( THEME_ID, 'cta_colors', array( 'serviceCall' => get_theme_mod( 'cta_service_call_color', '#41EEFF' ), 'dependabilityPromise' => get_theme_mod( 'cta_dependability_promise_color', '#002B50' ) ) );

    // Admin script
    wp_register_script(
		THEME_ID . '-admin',
		get_template_directory_uri() . '/admin.js',
		array( 'jquery' ),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : THEME_VERSION,
		true
	);

    // Customizer Preview script
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
		'name'         => 'Services Sub-Page Sidebar',
		'id'           => 'services-sub-page-sidebar',
		'description'  => 'Displays on all Services Sub-Pages.',
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

/**
 * Spruce up wp_title() to be a bit more useful.
 *
 * @since 0.2.0
 *
 * @param string $title page <title>.
 * @param string $sep <title> separator.
 */
function mullins_wp_title( $title, $sep ) {

	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', THEME_ID ), max( $paged, $page ) );

	return $title;

}


require_once __DIR__ . '/includes/theme-functions.php';
