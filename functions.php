<?php

require get_template_directory() . '/inc/customizer.php';

function wpcdsl_load_scripts(){
    wp_enqueue_style( 'wpcdsl-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ), 'all' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap', array(), null );
    wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/js/dropdown.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpcdsl_load_scripts' );

function wpcdsl_config(){

    $textdomain = 'wp-cdsl';
    load_theme_textdomain( $textdomain, get_template_directory() . '/languages/' );

    register_nav_menus(
        array(
            'wp_cdsl_main_menu' => esc_html__( 'Main Menu', 'wp-cdsl' ),
            'wp_cdsl_footer_menu' => esc_html__( 'Footer Menu', 'wp-cdsl' )
        )
    );

    $args = array(
        'height'    => 225,
        'width'     => 1920
    );
    add_theme_support( 'custom-header', $args );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'width' => 200,
        'height'    => 110,
        'flex-height'   => true,
        'flex-width'    => true
    ) );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ));
    add_theme_support( 'title-tag' );

    //add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'style-editor.css' );
    add_theme_support( 'wp-block-styles' );
    // add_theme_support( 'editor-color-palette', array(
    //     array(
    //         'name'  => __( 'Primary', 'wp-cdsl' ),
    //         'slug'  => 'primary',
    //         'color' => '#001E32'
    //     ),
    //     array(
    //         'name'  => __( 'Secondary', 'wp-cdsl' ),
    //         'slug'  => 'secondary',
    //         'color' => '#CFAF07'
    //     )
    // ) );
    // add_theme_support( 'disable-custom-colors' );
}
add_action( 'after_setup_theme', 'wpcdsl_config', 0 );

function wpcdsl_register_block_styles(){
    wp_register_style( 'wpcdsl-block-style', get_template_directory_uri() . '/block-style.css' );
    register_block_style(
        'core/quote',
        array(
            'name'  => 'red-quote',
            'label' => 'Red Quote',
            'is_default'    => true,
            //'inline_style'  => '.wp-block-quote.is-style-red-quote { border-left: 7px solid #ff0000; background: #f9f3f3; padding: 10px 20px; }',
            'style_handle' => 'wpcdsl-block-style'
        )
    );
}
add_action( 'init', 'wpcdsl_register_block_styles' );

add_action( 'widgets_init', 'wpcdsl_sidebars' );
function wpcdsl_sidebars(){
    register_sidebar(
        array(
            'name'  => esc_html__( 'Blog Sidebar', 'wp-cdsl' ),
            'id'    => 'sidebar-blog',
            'description'   => esc_html__( 'This is the Blog Sidebar. You can add your widgets here.', 'wp-cdsl' ),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name'  => esc_html__( 'Service 1', 'wp-cdsl' ),
            'id'    => 'services-1',
            'description'   => esc_html__( 'First Service Area', 'wp-cdsl' ),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name'  => esc_html__( 'Service 2', 'wp-cdsl' ),
            'id'    => 'services-2',
            'description'   => esc_html__( 'Second Service Area', 'wp-cdsl' ),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name'  => esc_html__( 'Service 3', 'wp-cdsl' ),
            'id'    => 'services-3',
            'description'   => esc_html__( 'Third Service Area', 'wp-cdsl' ),
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        )
    );
}

if ( ! function_exists( 'wp_body_open' ) ){
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}