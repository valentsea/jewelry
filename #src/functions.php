<?php
/**
 * Jewelry functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Jewelry
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'jewelry_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function jewelry_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Jewelry, use a find and replace
		 * to change 'jewelry' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'jewelry', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'jewelry' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'jewelry_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
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
endif;
add_action( 'after_setup_theme', 'jewelry_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jewelry_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jewelry_content_width', 640 );
}
add_action( 'after_setup_theme', 'jewelry_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jewelry_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'jewelry' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'jewelry' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'jewelry_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jewelry_scripts() {
	wp_enqueue_style( 'jewelry-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'jewelry-style', 'rtl', 'replace' );
	wp_enqueue_style( 'jewstyle',get_stylesheet_directory_uri() . '/css/style.min.css');
		wp_enqueue_style( 'style','https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap');


	wp_enqueue_script( 'jewelry-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jewescript', get_template_directory_uri() . '/js/script.min.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jewelry_scripts' );

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




		add_filter('excerpt_more', function($more) {
			return '...';
		});


		function wp_corenavi() {
			global $wp_query;
			$total = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
			$a['total'] = $total;
			$a['mid_size'] = 3; // сколько ссылок показывать слева и справа от текущей
			$a['end_size'] = 1; // сколько ссылок показывать в начале и в конце
			$a['prev_text'] = '<'; // текст ссылки "Предыдущая страница"
			$a['next_text'] = '>'; // текст ссылки "Следующая страница"
		  
			if ( $total > 1 ) echo '<nav class="blog-pagination">';
			echo paginate_links( $a );
			if ( $total > 1 ) echo '</nav>';
		  }

		  add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
function kama_reorder_comment_fields( $fields ){
	// die(print_r( $fields )); // посмотрим какие поля есть

	$new_fields = array(); // сюда соберем поля в новом порядке

	$myorder = array('author','email','comment'); // нужный порядок

	foreach( $myorder as $key ){
		$new_fields[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}

	// если остались еще какие-то поля добавим их в конец
	if( $fields )
		foreach( $fields as $key => $val )
			$new_fields[ $key ] = $val;

	return $new_fields;
}


///ACF

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
// add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
// function my_acf_settings_show_admin( $show_admin ) {
//     return false;
// }

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5fd7917806f1a',
		'title' => 'Main page',
		'fields' => array(
			array(
				'key' => 'field_5fd7b774e3605',
				'label' => 'Main page',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'left',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5fd791fa11833',
				'label' => 'Main page heading',
				'name' => 'main-page',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Handcraft Minimalist Modern Jewelry',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5fd793276418a',
				'label' => 'Text under heading',
				'name' => 'text_field',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Jewelry that Emphasizes Your Individuality',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5fd79feb6c038',
				'label' => 'slider',
				'name' => 'slider',
				'type' => 'gallery',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'id',
				'preview_size' => 'full',
				'insert' => 'append',
				'library' => 'all',
				'min' => '',
				'max' => '',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_5fd7b7cfb5dd0',
				'label' => 'Social',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'left',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5fd7b80f03733',
				'label' => 'fb',
				'name' => 'fb',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'https://www.facebook.com/',
				'placeholder' => '',
			),
			array(
				'key' => 'field_5fd7b86f03734',
				'label' => 'inst',
				'name' => 'inst',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'https://www.instagram.com/',
				'placeholder' => '',
			),
			array(
				'key' => 'field_5fd7b88703735',
				'label' => 'pinterest',
				'name' => 'pinterest',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'https://www.pinterest.com/',
				'placeholder' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page',
					'operator' => '==',
					'value' => '5',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => array(
			0 => 'permalink',
			1 => 'the_content',
			2 => 'excerpt',
			3 => 'discussion',
			4 => 'comments',
			5 => 'revisions',
			6 => 'slug',
			7 => 'author',
			8 => 'format',
			9 => 'page_attributes',
			10 => 'featured_image',
			11 => 'categories',
			12 => 'tags',
			13 => 'send-trackbacks',
		),
		'active' => true,
		'description' => '',
	));
	
	endif;


	add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
	register_nav_menu( 'primary-menu', 'primary-menu' );
}