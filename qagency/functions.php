<?php
/**
 * qagency functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package qagency
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'qagency_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function qagency_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on qagency, use a find and replace
		 * to change 'qagency' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'qagency', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'qagency' ),
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
				'qagency_custom_background_args',
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
add_action( 'after_setup_theme', 'qagency_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function qagency_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'qagency_content_width', 640 );
}
add_action( 'after_setup_theme', 'qagency_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function qagency_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'qagency' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'qagency' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'qagency_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function qagency_scripts() {
	wp_enqueue_style( 'qagency-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'qagency-style', 'rtl', 'replace' );

	wp_enqueue_script( 'qagency-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'qagency_scripts' );

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

//Bajro code

//start of functions to add style on menu
function add_menu_link_class( $atts, $item, $args ) {
	if (property_exists($args, 'link_class')) {
	  $atts['class'] = $args->link_class;
	}
	return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

  function add_menu_list_item_class($classes, $item, $args) {
	if (property_exists($args, 'list_item_class')) {
		$classes[] = $args->list_item_class;
	}
	return $classes;
  }
  add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);

  //end of functions to add style on menu


  //start of custom post types

  //Slider custom post type
add_action( 'init', 'bajsl' );
function bajsl() {
	$args = [
		'label'  => esc_html__( 'Sliders', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Sliders', 'bajsl' ),
			'name_admin_bar'     => esc_html__( 'Slider', 'bajsl' ),
			'add_new'            => esc_html__( 'Add Slider', 'bajsl' ),
			'add_new_item'       => esc_html__( 'Add new Slider', 'bajsl' ),
			'new_item'           => esc_html__( 'New Slider', 'bajsl' ),
			'edit_item'          => esc_html__( 'Edit Slider', 'bajsl' ),
			'view_item'          => esc_html__( 'View Slider', 'bajsl' ),
			'update_item'        => esc_html__( 'View Slider', 'bajsl' ),
			'all_items'          => esc_html__( 'All Sliders', 'bajsl' ),
			'search_items'       => esc_html__( 'Search Sliders', 'bajsl' ),
			'parent_item_colon'  => esc_html__( 'Parent Slider', 'bajsl' ),
			'not_found'          => esc_html__( 'No Sliders found', 'bajsl' ),
			'not_found_in_trash' => esc_html__( 'No Sliders found in Trash', 'bajsl' ),
			'name'               => esc_html__( 'Sliders', 'bajsl' ),
			'singular_name'      => esc_html__( 'Slider', 'bajsl' ),
		],
		'public'              => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-image-flip-horizontal',
		'supports' => [
			'title',
			'editor',
		],
		
		'rewrite' => true
	];

	register_post_type( 'slider', $args );
}

//Service custom post type
add_action( 'init', 'custom_post_service' );
function custom_post_service() {
	$args = [
		'label'  => esc_html__( 'Services', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Services', 'custom_post_service' ),
			'name_admin_bar'     => esc_html__( 'Service', 'custom_post_service' ),
			'add_new'            => esc_html__( 'Add Service', 'custom_post_service' ),
			'add_new_item'       => esc_html__( 'Add new Service', 'custom_post_service' ),
			'new_item'           => esc_html__( 'New Service', 'custom_post_service' ),
			'edit_item'          => esc_html__( 'Edit Service', 'custom_post_service' ),
			'view_item'          => esc_html__( 'View Service', 'custom_post_service' ),
			'update_item'        => esc_html__( 'View Service', 'custom_post_service' ),
			'all_items'          => esc_html__( 'All Services', 'custom_post_service' ),
			'search_items'       => esc_html__( 'Search Services', 'custom_post_service' ),
			'parent_item_colon'  => esc_html__( 'Parent Service', 'custom_post_service' ),
			'not_found'          => esc_html__( 'No Services found', 'custom_post_service' ),
			'not_found_in_trash' => esc_html__( 'No Services found in Trash', 'custom_post_service' ),
			'name'               => esc_html__( 'Services', 'custom_post_service' ),
			'singular_name'      => esc_html__( 'Service', 'custom_post_service' ),
		],
		'public'              => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-tickets-alt',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
		],
		'taxonomies' => [
			'project_type',
		],
		'rewrite' => true
	];

	register_post_type( 'service', $args );
}

//Work custom post type
add_action( 'init', 'work_custom' );
function work_custom() {
	$args = [
		'label'  => esc_html__( 'Works', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Works', 'work_custom' ),
			'name_admin_bar'     => esc_html__( 'Work', 'work_custom' ),
			'add_new'            => esc_html__( 'Add Work', 'work_custom' ),
			'add_new_item'       => esc_html__( 'Add new Work', 'work_custom' ),
			'new_item'           => esc_html__( 'New Work', 'work_custom' ),
			'edit_item'          => esc_html__( 'Edit Work', 'work_custom' ),
			'view_item'          => esc_html__( 'View Work', 'work_custom' ),
			'update_item'        => esc_html__( 'View Work', 'work_custom' ),
			'all_items'          => esc_html__( 'All Works', 'work_custom' ),
			'search_items'       => esc_html__( 'Search Works', 'work_custom' ),
			'parent_item_colon'  => esc_html__( 'Parent Work', 'work_custom' ),
			'not_found'          => esc_html__( 'No Works found', 'work_custom' ),
			'not_found_in_trash' => esc_html__( 'No Works found in Trash', 'work_custom' ),
			'name'               => esc_html__( 'Works', 'work_custom' ),
			'singular_name'      => esc_html__( 'Work', 'work_custom' ),
		],
		'public'              => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-tickets-alt',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
		],
		
		'rewrite' => true
	];

	register_post_type( 'work', $args );
}

add_action( 'init', 'team_custom' );
function team_custom() {
	$args = [
		'label'  => esc_html__( 'Teams', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Teams', 'team_custom' ),
			'name_admin_bar'     => esc_html__( 'Team', 'team_custom' ),
			'add_new'            => esc_html__( 'Add Team', 'team_custom' ),
			'add_new_item'       => esc_html__( 'Add new Team', 'team_custom' ),
			'new_item'           => esc_html__( 'New Team', 'team_custom' ),
			'edit_item'          => esc_html__( 'Edit Team', 'team_custom' ),
			'view_item'          => esc_html__( 'View Team', 'team_custom' ),
			'update_item'        => esc_html__( 'View Team', 'team_custom' ),
			'all_items'          => esc_html__( 'All Teams', 'team_custom' ),
			'search_items'       => esc_html__( 'Search Teams', 'team_custom' ),
			'parent_item_colon'  => esc_html__( 'Parent Team', 'team_custom' ),
			'not_found'          => esc_html__( 'No Teams found', 'team_custom' ),
			'not_found_in_trash' => esc_html__( 'No Teams found in Trash', 'team_custom' ),
			'name'               => esc_html__( 'Teams', 'team_custom' ),
			'singular_name'      => esc_html__( 'Team', 'team_custom' ),
		],
		'public'              => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-tickets-alt',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
		],
		
		'rewrite' => true
	];

	register_post_type( 'team', $args );
}
//end of custom post types

add_filter( 'enter_title_here', 'custom_enter_title' );
function custom_enter_title( $input ) {

    if ( 'team' === get_post_type() ) {
        return __( 'Enter Full Name', 'your_textdomain' );
    }

    return $input;
}


function mytheme_customize_register( $wp_customize ) {
	$wp_customize->add_panel('qagency_panel', array(
		'title' => 'QAgency Settings',
		'priority' => 5,
		'capability' => 'edit_theme_options',
	));

    $wp_customize->add_section('slider_image_section', array(
		'panel' => 'qagency_panel',
        'title'          => 'Slider Background Image Settings',

    ));

	$wp_customize->add_setting( 'slider_image',
   array(
      'default' =>  get_bloginfo('template_url') . "/assets/img/banner-bg-01.jpg",
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
   )
);
 
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image',
   array(
      'label' => __( 'Slider Background Image' ),
      'description' => esc_html__( 'Change Slider Background Image' ),
      'section' => 'slider_image_section',
   )
) );

$wp_customize->add_section('client_info_section', array(
	'panel' => 'qagency_panel',
	'title'          => 'Client Info',
	

));

$wp_customize->add_setting( 'client_info_phone',
array(
   'default' =>  "010-020-0340",
)
);

$wp_customize->add_control('client_info_phone', array(
	'label' => __( 'Client Phone' ),
	'section' => 'client_info_section',
));

$wp_customize->add_setting( 'client_info_email',
array(
   'default' =>  "info@company.com",
)
);

$wp_customize->add_control('client_info_email', array(
	'label' => __( 'Client Email' ),
	'section' => 'client_info_section',
));

$wp_customize->add_section('client_info_social', array(
	'panel' => 'qagency_panel',
	'title'          => 'Client Social Networks',
	

));

$wp_customize->add_setting( 'client_info_social_fb',
array(
   'default' =>  "#",
)
);

$wp_customize->add_control('client_info_social_fb', array(
	'label' => __( 'Facebook' ),
	'section' => 'client_info_social',
));

$wp_customize->add_setting( 'client_info_social_li',
array(
   'default' =>  "#",
)
);

$wp_customize->add_control('client_info_social_li', array(
	'label' => __( 'LinkedIn' ),
	'section' => 'client_info_social',
));


$wp_customize->add_setting( 'client_info_social_wa',
array(
   'default' =>  "#",
)
);

$wp_customize->add_control('client_info_social_wa', array(
	'label' => __( 'WhatsApp' ),
	'section' => 'client_info_social',
));

$wp_customize->add_setting( 'client_info_social_me',
array(
   'default' =>  "#",
)
);

$wp_customize->add_control('client_info_social_me', array(
	'label' => __( 'Medium' ),
	'section' => 'client_info_social',
));

 }
 add_action( 'customize_register', 'mytheme_customize_register' );




function baj_category() {

	$labels = array(
		'name'              => _x( 'Project Type', 'taxonomy general name' ),
		'singular_name'     => _x( 'Project Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Project Type' ),
		'all_items'         => __( 'All Project Type' ),
		'parent_item'       => __( 'Parent Project Type' ),
		'parent_item_colon' => __( 'Parent Project Type:' ),
		'edit_item'         => __( 'Edit Project Type' ),
		'update_item'       => __( 'Update Project Type' ),
		'add_new_item'      => __( 'Add New Project Type' ),
		'new_item_name'     => __( 'New Project Type Name' ),
		'menu_name'         => __( 'Project Type' ),
	);
	$args   = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => [ 'slug' => 'project_type' ],
	);
     
    register_taxonomy( 'project_type', ['service'], $args );
}
add_action( 'init', 'baj_category', 0 );

function team_shortcode() {

	$args = array(  
		'post_type' => 'team',
		'post_status' => 'publish',
	);


	$teams = new WP_Query( $args ); 
	$team = "";

	//  print_r($teams);
	while ( $teams->have_posts() ) {
		$teams->the_post();
		$image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		$the_content = apply_filters('the_content', get_the_content());

		$teamhtml = <<< heredoc
		<div class="team-member col-md-4">
	<img class="team-member-img img-fluid rounded-circle p-4" src="%s" alt="Card image">
	<ul class="team-member-caption list-unstyled text-center pt-4 text-muted light-300">
		<li>%s</li>
		<li>%s</li>
	</ul>
	</div>
	heredoc;

	$team .= sprintf($teamhtml, $image,the_title('','',false), $the_content);
	}


return $team;

}

add_shortcode('team_short', 'team_shortcode'); 
