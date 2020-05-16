<?php
/**
 * Nelum Holidays functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nelum_Holidays
 */

if ( ! function_exists( 'nelum_holidays_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nelum_holidays_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Nelum Holidays, use a find and replace
		 * to change 'nelum_holidays' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nelum_holidays', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary', 'nelum_holidays' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'nelum_holidays_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'nelum_holidays_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nelum_holidays_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'nelum_holidays_content_width', 640 );
}
add_action( 'after_setup_theme', 'nelum_holidays_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nelum_holidays_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nelum_holidays' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'nelum_holidays' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'nelum_holidays_widgets_init' );

/**
 * ACF Pro theme options.
 */
if( function_exists('acf_add_options_page') ) {
	
	$options_img = get_template_directory_uri() . "/assets/img/dashboard-icons/options.png";

	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-options',
		'icon_url' => $options_img,
    'position' => 25
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-options'
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-options'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Preloader',
		'menu_title'	=> 'Preloader',
		'parent_slug'	=> 'theme-options'
	));
	
}

/**
 * Add a parent CSS class for nav menu items.
 *
 * @param array  $items The menu items, sorted by each menu item's menu order.
 * @return array (maybe) modified parent CSS class.
 */
function wpdocs_add_menu_parent_class( $items ) {
    $parents = array();
 
    // Collect menu items with parents.
    foreach ( $items as $item ) {
        if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
            $parents[] = $item->menu_item_parent;
        }
    }
 
    // Add class.
    foreach ( $items as $item ) {
        if ( in_array( $item->ID, $parents ) ) {
            $item->classes[] = 'dropdown';
        }
    }
    return $items;
}
add_filter( 'wp_nav_menu_objects', 'wpdocs_add_menu_parent_class' );

/**
* Change wordpress sub menu class
*/
function change_submenu_class($menu) {  
  $menu = preg_replace('/ class="sub-menu"/','/ class="dropdown-menu" /',$menu);  
  return $menu;  
}  
add_filter('wp_nav_menu','change_submenu_class');


/* Add classes and other attributes to the anchor tags if list item is a parent */
add_filter( 'nav_menu_link_attributes', 'add_class_to_items_link', 10, 3 );

function add_class_to_items_link( $atts, $item, $args ) {
  // check if the item has children
  $hasChildren = (in_array('menu-item-has-children', $item->classes));
  if ($hasChildren) {
    // add the desired attributes:
    $atts['class'] = 'dropdown-toggle';
    $atts['data-toggle'] = 'dropdown';
  }
  return $atts;
}

// Add css to admin dashboard
add_action('admin_head', 'tlc_admin_css');

function tlc_admin_css() {
  echo '<style>
    #adminmenu .wp-menu-image img {
      width: 50%;
      height: auto;
    }
    #adminmenu div.wp-menu-image.dashicons-admin-page:before {
      color: #32CD32;
    }
    #adminmenu .wp-menu-image img {
      opacity: 1;
    }
  </style>';
}

/**
 * Bootstrap 4 pagination for WP-PageNavi
 */
function wiaw_pagenavi_to_bootstrap($html) {
    $out = '';
    $out = str_replace('<div','',$html);
    $out = str_replace('class=\'wp-pagenavi\' role=\'navigation\'>','',$out);
    $out = str_replace('<a','<li class="page-item"><a class="page-link"',$out);
    $out = str_replace('</a>','</a></li>',$out);
    $out = str_replace('<span aria-current=\'page\' class=\'current\'','<li aria-current="page" class="page-item active"><span class="page-link current"',$out);
    $out = str_replace('<span class=\'pages\'','<li class="page-item"><span class="page-link pages"',$out);
    $out = str_replace('<span class=\'extend\'','<li class="page-item"><span class="page-link extend"',$out);  
    $out = str_replace('</span>','</span></li>',$out);
    $out = str_replace('</div>','',$out);
    return '<ul class="pagination justify-content-center" role="navigation">'.$out.'</ul>';
}
add_filter( 'wp_pagenavi', 'wiaw_pagenavi_to_bootstrap', 10, 2 );

/**
* Prevent Contact form 7 by adding paragraphs automatically when pressing "Enter"
*/
add_filter('wpcf7_autop_or_not', '__return_false');


/**
* Contact form 7 sort countries alphabatically by label from listo plugin
*/
function sort_countries_by_label( $data, $options, $args ) {
    if ( ! $data )
        return $data;

    usort( $data, 'compare' );

    return $data;
}
function compare( $a, $b ) {
    if ( $a == $b )
        return 0;

    for ( $i = 0, $l = min( mb_strlen( $a ), mb_strlen( $b ) ); $i < $l; $i++ ) {
        $cmp = compare_char( mb_substr( $a, $i, 1 ), mb_substr( $b, $i, 1 ) );
        if ( $cmp != 0 ) {
            return $cmp;
        }
    }

    return (int) ( mb_strlen( $a ) > mb_strlen( $b ) );
}
function compare_char( $a, $b ) {
    $chars  = 'AÀÁÄÃÅBCÇDEÈÉÊËFGHIÌÍÎÏJKLMNOÒÓÔÖÕPQRSTUÙÚÛÜVWXYZ';
    $chars .= 'aàáäãåbcçdeèéêëfghiìíîïjklmnoòóôöõpqrstuùúûüvwxyz';

    $pos_a = mb_strpos( $chars, $a );
    $pos_b = mb_strpos( $chars, $b );

    if ( $pos_a === false )
        return (int) ( false !== $pos_b );

    return false === $pos_b ? -1 : ( $pos_a - $pos_b );
}
add_filter( 'wpcf7_form_tag_data_option', 'sort_countries_by_label', 11, 3 );

/**
 * Enqueue scripts and styles.
 */
function nelum_holidays_scripts() {
	wp_enqueue_style( 'nelum_holidays-style', get_stylesheet_uri() );

	wp_enqueue_script( 'nelum_holidays-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'nelum_holidays-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nelum_holidays_scripts' );

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

