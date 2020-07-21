<?php
/**
 * Kedar website functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kedar
 */
if ( ! function_exists( 'Kedar_website_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function Kedar_website_setup() {

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
		register_nav_menus( array(
			'header_menu' => 'Header menu',
            //'mobile_menu' => 'Mobile menu',
            //'footer_menu' => 'Footer menu',
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'Kedar_website_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function Kedar_website_widgets_init() {
	register_sidebar( array(
		'name' => 'Footer area',
		'id' => 'footer_area',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	) );
}
add_action( 'widgets_init', 'Kedar_website_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function Kedar_website_scripts() {
	wp_enqueue_style( 'Kedar-website-style', get_stylesheet_uri() );
	wp_enqueue_style( 'Kedar-website-base', get_template_directory_uri() . '/assets/css/app.css' );
	
	// отменяем зарегистрированный jQuery
	wp_dequeue_script('jquery');
	wp_dequeue_script('jquery-core');
	wp_dequeue_script('jquery-migrate');
	
	// регистрируем
	wp_register_script( 'jquery-core', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, null, true );
	wp_register_script( 'jquery-migrate', false, array(), false, true);
	wp_register_script( 'jquery', false, array('jquery-core','jquery-migrate'), null, true );
	
	// подключаем
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'Swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js', array('jquery'), null, true );
	//wp_enqueue_script( 'lazyload','https://cdn.jsdelivr.net/npm/vanilla-lazyload@15.2.0/dist/lazyload.min.js', array('jquery'), null, true );
	//wp_enqueue_script( 'wpforms-datepicker-locale', 'https://npmcdn.com/flatpickr/dist/l10n/ru.js', array( 'wpforms-flatpickr' ), null, true );

	wp_enqueue_script( 'Kedar-website-corejs', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '20151215', true );
} 
add_action( 'wp_enqueue_scripts', 'Kedar_website_scripts' );

/**************************
 **** REMOVE ADMIN BAR	***
 *************************/
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
  show_admin_bar(false);
}

/****************************
*****DERIDISTRING EMBED.JS***
****************************/
function my_deregister_scripts(){
	wp_deregister_script ( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

/****************************
******** REMOVE EMOJI *******
****************************/
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_filter( 'the_excerpt', 'wpautop' );
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action( 'wp_head', 'wp_shortlink_wp_head');
remove_action( 'wp_head', 'wp_generator');
remove_action( 'wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
function crunchify_remove_version() {
	return '';
}
add_filter('the_generator', 'crunchify_remove_version');

/*******************************************************
 * Remove the wp-block-library.css file from wp_head() *
*******************************************************/
add_action( 'wp_enqueue_scripts', function() {
	wp_dequeue_style( 'wp-block-library' );
} );

/********************************
*** REMOVE COMMENTS FROM MENU ***
********************************/
function remove_menus(){
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_menus' );

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Основные настройки сайта',
		'menu_title'	=> 'Установки сайта',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

add_action( 'init', 'cp_change_post_object' );
// Change dashboard Posts to News
function cp_change_post_object() {
    $get_post_type = get_post_type_object('post');
    $get_post_type->menu_icon = 'dashicons-cart';
    $labels = $get_post_type->labels;
        $labels->name = 'Каталог';
        $labels->singular_name = 'Каталог';
        $labels->add_new = 'Добавить товар';
        $labels->add_new_item = 'Добавить товар';
        $labels->edit_item = 'Изменить';
        $labels->new_item = 'товар';
        $labels->view_item = 'Посмотреть товар';
        $labels->search_items = 'Поиск';
        $labels->not_found = 'Нет реазультатов';
        $labels->not_found_in_trash = 'Нет реазультатов';
        $labels->all_items = 'Весь каталог';
        $labels->menu_name = 'Каталог';
        $labels->name_admin_bar = 'Каталог';
}

add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});


/**
 * Polylang
*/
add_action('init', function() {
  pll_register_string('home-link', 'Главная');
});


/**
 * ADD NEW IMAGE SIZE
 */
//add_image_size( 'home_partner_size', 540, 420, true );//Homepage partners image size
//add_image_size( 'google_map_size', 540, 380, true );//Google Map image size
//add_image_size( '300crop', 300, 300, true ); //Hard Crop 300*300

/**
 * Get product by AJAX
 */
add_action('wp_ajax_getproduct', 'GetProduct'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_getproduct', 'GetProduct');
 
function GetProduct(){

    $product_ID = json_decode(stripslashes($_POST['productID'])); // Получаем ID
    
    $query = new WP_Query( array( 'p' => $product_ID ) ); // Запрашиваем с эти ID
    
    // Цикл
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
        	$query->the_post();
        	get_template_part( 'template-parts/content', get_post_type() );
        }
    }
    wp_reset_postdata();
    wp_die();
}