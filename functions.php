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
 * Capability required to manage MailChimp options
 */
add_action( 'init', 'redefine_mailchimp_capability' );
function redefine_mailchimp_capability() {
    runkit_constant_remove( 'MCSF_CAP_THRESHOLD' );
    define( 'MCSF_CAP_THRESHOLD', 'mailchimp_options' );
}

/**
 * Fonts for the theme. Must be hosted font (Google fonts for example).
 */
$mullins_fonts = array(
	'Font Awesome' => '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
    'Lora' => '//fonts.googleapis.com/css?family=Lora:700,700italic',
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

    // Add theme support
	require_once __DIR__ . '/includes/theme-support.php';

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
    
    $wp_customize->add_setting( 'mullins_primary_color' , array(
            'default'     => '#094C8B',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mullins_primary_color', array(
        'label'        => __( 'Primary Color', THEME_ID ),
        'section'    => 'mullins_customizer_section',
        'settings'   => 'mullins_primary_color',
    ) ) );

    $wp_customize->add_setting( 'mullins_secondary_color' , array(
            'default'     => '#C31A2F',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mullins_secondary_color', array(
        'label'        => __( 'Secondary Color', THEME_ID ),
        'section'    => 'mullins_customizer_section',
        'settings'   => 'mullins_secondary_color',
    ) ) );

    $wp_customize->add_setting( 'mullins_accent_1' , array(
            'default'     => '#ebebeb',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mullins_accent_1', array(
        'label'        => __( 'Accent 1', THEME_ID ),
        'section'    => 'mullins_customizer_section',
        'settings'   => 'mullins_accent_1',
    ) ) );

    $wp_customize->add_setting( 'mullins_accent_2' , array(
            'default'     => '#D6E0EB',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mullins_accent_2', array(
        'label'        => __( 'Accent 2', THEME_ID ),
        'section'    => 'mullins_customizer_section',
        'settings'   => 'mullins_accent_2',
    ) ) );

    $wp_customize->add_setting( 'mullins_background' , array(
            'default'     => '#ffffff',
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mullins_background', array(
        'label'        => __( 'Background', THEME_ID ),
        'section'    => 'mullins_customizer_section',
        'settings'   => 'mullins_background',
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

    $wp_customize->add_setting( 'mullins_footer_columns' , array(
            'default'     => 4,
            'transport'   => 'refresh',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mullins_footer_columns', array(
        'type' => 'number',
        'label'        => __( 'Footer Number of Columns/Widgets', THEME_ID ),
        'section'    => 'mullins_customizer_section',
        'settings'   => 'mullins_footer_columns',
    ) ) );

    // Home Page Specific

    $wp_customize->add_section( 'mullins_home_customizer_section' , array(
            'title'      => __( 'Home Page Settings', THEME_ID ),
            'priority'   => 40,
            'active_callback' => 'is_front_page',
        )
    );

	$wp_customize->add_setting( 'angies_list_link' , array(
            'default'     => 'http://angieslist.com',
            'transport'   => 'postMessage',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'angies_list_link', array(
        'label'        => __( 'Angie\'s List Link URL', THEME_ID ),
        'section'    => 'mullins_home_customizer_section',
        'settings'   => 'angies_list_link',
    ) ) );

    $wp_customize->add_setting( 'angies_list_image' , array(
            'default'     => '//placeholdit.imgix.net/~text?txtsize=33&txt=Angie%27s+List+Badge&w=250&h=250&txttrack=0',
            'transport'   => 'postMessage',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'angies_list_image', array(
        'label'        => __( 'Angie\'s List Badge URL', THEME_ID ),
        'section'    => 'mullins_home_customizer_section',
        'settings'   => 'angies_list_image',
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

    wp_localize_script( THEME_ID, THEME_ID . '_data', array( 'ajaxUrl' => admin_url( 'admin-ajax.php' ) ) );

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
    
    // Footer
    $footer_columns = get_theme_mod( 'mullins_footer_columns', 4 );

    for ( $index = 0; $index < $footer_columns; $index++ ) {

        register_sidebar(
            array(
                'name'          =>  'Footer ' . ( $index + 1 ),
                'id'            =>  'footer-' . ( $index + 1 ),
                'description'   =>  '',
                'before_widget' =>  '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  =>  '</aside>',
                'before_title'  =>  '<h3 class="widget-title">',
                'after_title'   =>  '</h3>',
            )
        );

    }

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
 * Creates the Testimonials CPT
 *
 * @since 0.2.0
 */
add_action( 'init', 'register_cpt_mullins_testimonial' );
function register_cpt_mullins_testimonial() {

    $labels = array(
        'name' => _x( 'Testimonial', THEME_ID ),
        'all_items' => __( 'All Testimonials', THEME_ID ),
        'singular_name' => _x( 'Testimonial', THEME_ID ),
        'add_new' => _x( 'Add New Testimonial', THEME_ID ),
        'add_new_item' => _x( 'Add New Testimonial', THEME_ID ),
        'edit_item' => _x( 'Edit Testimonial', THEME_ID ),
        'new_item' => _x( 'New Testimonial', THEME_ID ),
        'view_item' => _x( 'View Testimonial', THEME_ID ),
        'search_items' => _x( 'Search Testimonials', THEME_ID ),
        'not_found' => _x( 'No Testimonials found', THEME_ID ),
        'not_found_in_trash' => _x( 'No Testimonials found in Trash', THEME_ID ),
        'parent_item_colon' => _x( 'Parent Testimonial:', THEME_ID ),
        'menu_name' => _x( 'Testimonials', THEME_ID ),
    );

    $args = array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-awards',
        'hierarchical' => false,
        'description' => 'testimonial',
        'supports' => array( 'title', 'editor', 'author', 'thumbnail' ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,

        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array(
            'slug' => 'testimonial',
            'with_front' => false,
            'feeds' => false,
            'pages' => true
        ),
		'capability_type' => 'post',
		/*
        'capability_type' => 'testimonial',
        'capabilities' => array(
            // Singular
            'edit_post'	=>	'edit_testimonial',
            'read_post'	=>	'read_testimonial',
            'delete_post'	=>	'delete_testimonial',
            // Plural
            'edit_posts'	=>	'edit_testimonials',
            'edit_others_posts'	=>	'edit_others_testimonials',
            'publish_posts'	=>	'publish_testimonials',
            'read_private_posts'	=>	'read_private_testimonials',
            'delete_posts'	=>	'delete_testimonials',
            'delete_private_posts'	=>	'delete_private_testimonials',
            'delete_published_posts'	=>	'delete_published_testimonials',
            'delete_others_posts'	=>	'delete_others_testimonials',
            'edit_private_posts'	=>	'edit_private_testimonials',
            'edit_published_posts'	=>	'edit_published_testimonials',
        ),
		*/
    );

    register_post_type( 'mullins_testimonial', $args );

}

/*
 * Makes Testimonial Gravity Form submit to the correct Post Type
 *
 * @param array $post_data The Post Data being filtered
 * @param Object $form The Form being processed
 * @param Object $entry The Entry being processed
 *
 * @since 0.2.0
 */
add_filter( 'gform_post_data', 'change_testimonials_form_post_type', 10, 3 );
function change_testimonials_form_post_type( $post_data, $form, $entry ) {

    if ( $form['id'] != 1 ) {
       return $post_data;
    }

    $post_data['post_type'] = 'mullins_testimonial';
    return $post_data;

}

require_once __DIR__ . '/includes/theme-functions.php';
