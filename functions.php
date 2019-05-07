<?php

if ( ! function_exists( 'master_setup' ) ) :
	function master_setup() {

		// Add domain to tra
		load_theme_textdomain( 'master' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'master' ),
				'secondary'  => __( 'Secondary Menu', 'master' ),
				'footer'  => __( 'Footer Menu', 'master' ),
			)
		);

		// Add customize logo
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
		add_theme_support( 'post-thumbnails' );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'image',
				'video',
				'gallery',
				'status',
				'audio',
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'master_setup' );

// Function setup widget
function master_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'master' ),
			'id'            => 'sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'master' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'master' ),
			'id'            => 'footer-1',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'master' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'master' ),
			'id'            => 'footer-2',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'master' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'master' ),
			'id'            => 'footer-3',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'master' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'master_widgets_init' );

// Remove don't need JS
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

function remove_js() {
	wp_deregister_script('wp-embed');
}
add_action( 'wp_enqueue_scripts', 'remove_js' );