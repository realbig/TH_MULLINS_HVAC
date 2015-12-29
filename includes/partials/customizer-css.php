<?php
    require_once __DIR__ . '/../class-phpcolors.php';

    // This class lets us lighten/darken Hex Colors using HSL, just like SASS.

    $primary_color = get_theme_mod( 'mullins_primary_color', '#094C8B' );
    $primary_color_object = new Mexitek\PHPColors\Color( $primary_color );

    $secondary_color = get_theme_mod( 'mullins_secondary_color', '#C31A2F' );
    $secondary_color_object = new Mexitek\PHPColors\Color( $secondary_color );

    $accent_1 = get_theme_mod( 'mullins_accent_1', '#ebebeb' );
    $accent_1_object = new Mexitek\PHPColors\Color( $accent_1 );

    $accent_2 = get_theme_mod( 'mullins_accent_2', '#D6E0EB' );
    $accent_2_object = new Mexitek\PHPColors\Color( $accent_2 );

    $background = get_theme_mod( 'mullins_background', '#ffffff' );
    $background_object = new Mexitek\PHPColors\Color( $background );
?>

<style type = "text/css">
    
    /* General */
    
    a, .phone-number .fa, a .fa {
        color: <?php echo $primary_color; ?>;
    }
    
    a:hover, .phone-number:hover .fa, a:hover .fa {
        color: <?php echo $secondary_color; ?>;
    }
    
    body {
        background-color: <?php echo $accent_2; ?>;
    }

    #wrapper {
        background-color: <?php echo $background; ?>;
    }

    /* Header */
    
    #site-header {
        background-color: <?php echo $accent_1; ?>;
        border-bottom-color: <?php echo $secondary_color; ?>;
    }
    
    #site-header .top-nav .menu {
        color: <?php echo $primary_color; ?>;
    }
    
    @media only screen and ( max-width: 40em ) { /* $small-only in _global.scss */
        #site-header .top-nav .menu > .menu-item {
            border-top-color: <?php echo $accent_2; ?>;
        } 
    }
    
    #site-header .top-nav .menu > .menu-item:first-of-type a {
        border-left-color: <?php echo $accent_2; ?>;
    }
    
    #site-header .top-nav .menu > .menu-item > a {
        border-right-color: <?php echo $accent_2; ?>;
    }
    
    @media only screen and ( min-width: 40.063em ) { /* $medium-up in _global.scss */
        #site-header .top-nav .menu > .menu-item:hover > a {
            background-color: <?php echo $secondary_color; ?>;
        }
    }
    
    #site-header .top-nav .menu > .menu-item.current-menu-item {
        background-color: #<?php echo $primary_color_object->darken(5); ?>;
    }
    
    @media only screen and ( min-width: 40.063em ) { /* $medium-up in _global.scss */
        #site-header .top-nav .sub-menu .menu-item:hover > .sub-menu .menu-item:hover a {
            background-color: #<?php echo $secondary_color_object->darken(5); ?>;
        }
    }
    
    #site-header .top-nav .sub-menu a {
        background-color: <?php echo $primary_color; ?>;
        border-bottom-color: #<?php echo $primary_color_object->darken(5); ?>;
    }
    
    #site-header .top-nav .sub-menu a + .sub-menu a {
        background-color: <?php echo $secondary_color; ?>;
    }
    
    #site-header .top-nav .sub-menu a:hover {
        background-color: #<?php echo $primary_color_object->darken(5); ?>;
    }
    
    /* Realbig Slider */
    
    .realbig-slider-container .realbig-slider .arrow:hover {
        border-color: <?php echo $secondary_color; ?>;
    }
    
    .realbig-slider-container .realbig-slider .indicators li.active {
        background-color: <?php echo $primary_color; ?>;
    }
    
    .realbig-slider-container .realbig-slider .indicators li:hover {
        background-color: <?php echo $secondary_color; ?>;
    }
    
    /* Newsletter Signup */

    #newsletter .button {
        color: <?php echo $primary_color; ?>;
        border-color: <?php echo $primary_color; ?>;
    }
    
    #newsletter .widget {
        background-color: <?php echo $accent_1; ?>;
    }
    
    /* Footer */
    
    #site-footer .primary-nav {
        background-color: <?php echo $accent_1; ?>;
        border-bottom-color: <?php echo $accent_2; ?>;
    }
    
    #site-footer .primary-nav .menu > .menu-item {
        color: <?php echo $primary_color; ?>;
    }
    
    @media only screen and ( min-width: 40.063em ) { /* $medium-up in _global.scss */
        #site-footer .primary-nav .menu > .menu-item:hover > a {
            background-color: <?php echo $secondary_color; ?>;
        }
    }
    
    #site-footer .primary-nav .menu > .menu-item.current-menu-item {
        background-color: #<?php echo $primary_color_object->darken(5); ?>;
    }
    
    #site-footer .primary-nav .menu > .menu-item:first-of-type a {
        border-left-color: <?php echo $accent_2; ?>;
    }
    
    #site-footer .primary-nav .menu > .menu-item > a {
        border-right-color: <?php echo $accent_2; ?>;
    }
    
    @media only screen and ( min-width: 40.063em ) { /* $medium-up in _global.scss */
        #site-footer .primary-nav .sub-menu .menu-item:hover > .sub-menu .menu-item:hover a {
            background-color: #<?php echo $secondary_color_object->darken(5); ?>;
        }
    }
    
    #site-footer .primary-nav .sub-menu a {
        background-color: <?php echo $primary_color; ?>;
        border-bottom-color: #<?php echo $primary_color_object->darken(5); ?>;
    }
    
    #site-footer .primary-nav .sub-menu a + .sub-menu a {
        background-color: <?php echo $secondary_color; ?>;
    }
    
    #site-footer .primary-nav .sub-menu a:hover {
        background-color: #<?php echo $primary_color_object->darken(5); ?>;
    }

</style>
