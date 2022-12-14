<?php
/**
 * mac functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mac
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mac_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on mac, use a find and replace
		* to change 'mac' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'mac', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'mac-main-left' => __( 'Main Menu (Left)' ),
			'mac-main-right' => __( 'Main Menu (Right)' )
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'mac_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mac_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mac_content_width', 640 );
}
add_action( 'after_setup_theme', 'mac_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function mac_scripts() {

	/* LOAD FONTS */
	wp_enqueue_style('font-Roboto', '//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900');
	wp_enqueue_style('font-Rubik', 	'//fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
	wp_enqueue_style('font-Marker', '//fonts.googleapis.com/css2?family=Permanent+Marker&display=swap');

	/* LOAD CSS */
	wp_enqueue_style('css-bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css');
	wp_enqueue_style('css-slick-slider', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
	/* LOAD THIS CSS LAST */
	wp_enqueue_style('css-mac-main', get_stylesheet_uri(), array(), '1.0.0');
	wp_enqueue_style('css-mac-custom', get_theme_file_uri('/css/mac-styles.css'));

	/* LOAD BOOTSTRAP JS */
	wp_enqueue_script('js-bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js');

	/* LOAD jQuery */
	// wp_enqueue_script('js-jQuery-migrate', '//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.3.2/jquery-migrate.min.js', NULL, '3.3.2', TRUE);
	// wp_enqueue_script('js-jQuery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', NULL, '3.6.0', TRUE);
	wp_enqueue_script('js-jQuery-load1', '//code.jquery.com/jquery-1.11.0.min.js', NULL, '1.11.0', TRUE);
	wp_enqueue_script('js-jQuery-load2', '//code.jquery.com/jquery-migrate-1.2.1.min.js', NULL, '1.2.1', TRUE);

	/* LOAD SLICK */
	// wp_enqueue_script('js-slick-slider', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', NULL, '1.8.1', TRUE);

	// Custom js Scripts loaded here
    wp_enqueue_script('js-mac-custom-main', get_theme_file_uri() . '/js/bundled.js', NULL, '1.0.1', TRUE);

	// wp_enqueue_script( 'mac-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mac_scripts' );

/* Add portfolio custom post type */
function mac_port_custom_post_type() {
	register_post_type('portfolio',
		array(
			'labels'      => array(
				'name'          => __('Portfolio', 'textdomain'),
				'singular_name' => __('Project', 'textdomain'),
			),
			'taxonomies'  => array( 'origin', 'skills' ),
			'supports'    => array( 'title', 'editor', 'thumbnail'),
			'show_in_rest' => true,
			'public'      => true,
			'has_archive' => true,
			'rewrite'	  => array('slug' => 'p')
		)
	);
}
add_action('init', 'mac_port_custom_post_type');

/* Add origin taxonomy for portfolio */
function mac_orig_custom_taxonomy() {
	register_taxonomy('origin', 'portfolio',
		array(
			'labels'      => array(
				'name'          => __('Origins', 'textdomain'),
				'singular_name' => __('Origin', 'textdomain'),
			),
			'public'      		=> true,
			'hierarchical' 		=> true,
			'rewrite'	  		=> array('slug' => 'og'),
			'show_admin_column' => true
		)
	);
}
add_action('init', 'mac_orig_custom_taxonomy');

/* Add origin taxonomy for portfolio */
function mac_skills_custom_taxonomy() {
	register_taxonomy('skills', 'portfolio',
		array(
			'labels'      => array(
				'name'          => __('Skills', 'textdomain'),
				'singular_name' => __('Skill', 'textdomain'),
			),
			'public'      => true,
			'rewrite'	  => array('slug' => 'sk'),
			'show_admin_column' => true
		)
	);
}
add_action('init', 'mac_skills_custom_taxonomy');

function register_acf_block_types() {

	// register Portfolio Note Row
	acf_register_block_type(array(
    	'mode' 				=> 'edit',
        'name'              => 'note-row',
        'title'             => __('Note Row'),
        'description'       => __('Note Row'),
        'render_template'   => 'blocks/note-row/note-row.php',
        'category'          => 'layout',
        'icon'              => 'format-image',
		'keywords'          => array( 'text', 'wysiwyg', 'flex', 'content', 'image', 'gallery', 'tags' ),
		'align'				=> 'wide'
		// 'enqueue_assets'    => function() {
		// 	wp_enqueue_script('google-maps', get_theme_file_uri('/js/google-map.js'), array(), '1.0.0', true);
		// }
	));
}
if ( function_exists('acf_register_block_type') ) {
	add_action('acf/init', 'register_acf_block_types');
}



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// overwrite big image threshold - 2560p
add_filter( 'big_image_size_threshold', '__return_false' );
