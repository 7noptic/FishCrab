<?php
/**
 * FishCrab functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FishCrab
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'fishcrab_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fishcrab_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on FishCrab, use a find and replace
		 * to change 'fishcrab' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fishcrab', get_template_directory() . '/languages' );

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
                'menu-1' => esc_html__( 'Main menu', 'fishcrab' ),
                'footer-1' => esc_html__( 'Footer1', 'fishcrab' ),
                'footer-2' => esc_html__( 'Footer2', 'fishcrab' ),
                'copyright' => esc_html__( 'Copyright', 'fishcrab' ),
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
				'fishcrab_custom_background_args',
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
				'height'      => 293,
				'width'       => 65,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'fishcrab_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fishcrab_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fishcrab_content_width', 640 );
}
add_action( 'after_setup_theme', 'fishcrab_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fishcrab_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'fishcrab' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fishcrab' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'fishcrab_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fishcrab_scripts() {
	wp_enqueue_style( 'fishcrab-style', get_stylesheet_uri(), array(), '' );
//	wp_style_add_data( 'fishcrab-style', 'rtl', 'replace' );
    wp_enqueue_style( 'style-vendors', get_template_directory_uri() . '/assets/css/vendors~main.css', '', '' );
    wp_enqueue_style( 'style-main', get_template_directory_uri() . '/assets/css/main.css', '', '' );


	wp_enqueue_script( 'fishcrab-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true );

    wp_enqueue_script( 'script-vendors', get_template_directory_uri() . '/assets/js/vendors~main.js', array(), false, true );
    wp_enqueue_script( 'script-main', get_template_directory_uri() . '/assets/js/main.js', array(), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fishcrab_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

add_theme_support( 'woocommerce' );



/**
 * Customize breadcrumbs.
 */
require get_template_directory() . '/inc/customize/breadcrumbs.php';


/**
 * Customize pagination.
 */
require get_template_directory() . '/inc/customize/pagination.php';


/**
 * Customize theme-options
 */
require get_template_directory() . '/inc/customize/theme-options.php';


/**
 * Customize fix upload svg files
 */
require get_template_directory() . '/inc/customize/fix-svg.php';


/**
 * Customize post views
 */
require get_template_directory() . '/inc/customize/post-views.php';


/*
 * excerpt_length
 */
require get_template_directory() . '/inc/customize/excerpt.php';


/*
 * Reviews rating
 */
require get_template_directory() . '/inc/customize/reviews_rating.php';


/*
 * Star ratings
 */
require get_template_directory() . '/inc/customize/star-ratings.php';


/* file comments */
function get_attachment_url_image_comment( $comment_id ) {
    $meta_key      = 'attachment_id';
    $attachment_id = get_comment_meta( $comment_id, $meta_key, true );
    $full_img_url  = wp_get_attachment_image_url( $attachment_id, 'full' );

    return $full_img_url;
}


// удаляет H2 из шаблона пагинации
add_filter( 'navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ) {
    /*
    Вид базового шаблона:
    <nav class="navigation %1$s" role="navigation">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s</div>
    </nav>
    */

    return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>
	';
}


//Удаляем category из УРЛа категорий
//add_filter( 'category_link', function ( $a ) {
//    return str_replace( 'category/', '', $a );
//}, 99 );



////add_filter( 'get_the_archive_title', 'artabr_remove_name_cat' );
////function artabr_remove_name_cat( $title ) {
////    if ( is_category() ) {
////        $title = single_cat_title( '', false );
////    } elseif ( is_tag() ) {
////        $title = single_tag_title( '', false );
////    }
////
////    return $title;
////}
//
//
//add_image_size( 'thumbnail', 345, 345, true );
//add_image_size( 'certificates-thumb', 325, 460, true );
//add_image_size( 'reviews-thumb', 130, 100, true );
//add_image_size( 'category-thumb', 345, 480, true );
//add_image_size( 'object-thumb', 440, 400, true );
//
//add_filter( 'woocommerce_get_image_size_single', function ( $size ) {
//    return array(
//        'width'  => 600,
//        'height' => 600,
//        'crop'   => 1,
//    );
//} );
//
//add_filter( 'woocommerce_get_image_size_thumbnail', function ( $size_options ) {
//    return array(
//        'width'  => 345,
//        'height' => 345,
//        'crop'   => 1,
//    );
//} );
//
//add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function ( $size_options ) {
//    return array(
//        'width'  => 91,
//        'height' => 91,
//        'crop'   => 1,
//    );
//} );
//
//
// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <a data-da=".header__profile,991,last" href="<?php echo esc_url(wc_get_cart_url()); ?>"
       class="header__basket">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/b.svg" alt="">
        <span><?php echo WC()->cart->get_cart_subtotal(); ?> (<?php echo WC()->cart->get_cart_contents_count(); ?>шт)</span>
    </a>
    <?php

    $fragments['a.header__basket'] = ob_get_clean();

    return $fragments;
}



remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );




//function dco_pre_get_posts($query) {
//    if (!is_admin() && $query->is_main_query()) {
//        if ($query->is_search) {
//            $query->set('post_type', 'product');
//        }
//    }
//}
//
//add_action('pre_get_posts', 'dco_pre_get_posts');


add_filter( 'woocommerce_redirect_single_search_result', '__return_false' );






/* post current category */
function get_post_primary_category($post_id, $term='category', $return_all_categories=false){
    $return = array();

    if (class_exists('WPSEO_Primary_Term')){
        // Show Primary category by Yoast if it is enabled & set
        $wpseo_primary_term = new WPSEO_Primary_Term( $term, $post_id );
        $primary_term = get_term($wpseo_primary_term->get_primary_term());

        if (!is_wp_error($primary_term)){
            $return['primary_category'] = $primary_term;
        }
    }

    if (empty($return['primary_category']) || $return_all_categories){
        $categories_list = get_the_terms($post_id, $term);

        if (empty($return['primary_category']) && !empty($categories_list)){
            $return['primary_category'] = $categories_list[0];  //get the first category
        }
        if ($return_all_categories){
            $return['all_categories'] = array();

            if (!empty($categories_list)){
                foreach($categories_list as &$category){
                    $return['all_categories'][] = $category->term_id;
                }
            }
        }
    }

    return $return;
}



/***********************/

//favorite posts array
function favorite_id_array() {
    if (!empty( $_COOKIE['favorite_post_ids'])) {
        return explode(',', $_COOKIE['favorite_post_ids']);
    }
    else {
        return array();
    }
}



//add to favorite function
function add_favorite() {
    $post_id = (int)$_POST['post_id'];
    if (!empty($post_id)) {
        $new_post_id = array(
            $post_id
        );
        $post_ids = array_merge($new_post_id, favorite_id_array());
        $post_ids = array_diff($post_ids, array(
            ''
        ));
        $post_ids = array_unique($post_ids);
        setcookie('favorite_post_ids', implode(',', $post_ids) , time() + 3600 * 24 * 365, '/');
        echo count($post_ids);
    }
    die();
}
add_action('wp_ajax_favorite', 'add_favorite');
add_action('wp_ajax_nopriv_favorite', 'add_favorite');



//delete from favorite function
function delete_favorite() {
    $post_id = (int)$_POST['post_id'];
    if (!empty($post_id)) {
        $favorite_id_array = favorite_id_array();
        if (($delete_post_id = array_search($post_id, $favorite_id_array)) !== false) {
            unset($favorite_id_array[$delete_post_id]);
        }
        setcookie('favorite_post_ids', implode(',', $favorite_id_array) , time() + 3600 * 24 * 30, '/');
        echo count($favorite_id_array);
    }
    die();
}
add_action('wp_ajax_delfavorite', 'delete_favorite');
add_action('wp_ajax_nopriv_delfavorite', 'delete_favorite');