<?php
/***************************************************
	define custom variables/constants
***************************************************/
define('TEMPLATEDIR',	get_bloginfo('stylesheet_directory'));
define('SITENAME',		get_bloginfo('name'));

/***************************************************
	remove all twenty eleven sidebars
***************************************************/
add_action('after_setup_theme', 'remove_twentyeleven_all_widgets', 100);
function remove_twentyeleven_all_widgets() {
	remove_filter('widgets_init', 'twentyeleven_widgets_init');
}

/***************************************************
	override parent theme setup function
***************************************************/
function twentyeleven_setup() {
	// do nothing. we're only doing this because we don't want to load all the bs that the parent theme includes
}

/*****************************************************************************************************
	initialize custom post types and other theme options
*****************************************************************************************************/
add_action('init', 'focus81_theme_init');
function focus81_theme_init() {
	// manually add menu support (since we're overriding parent theme)
	register_nav_menus(array(
		'primary' => 'Primary Navigation'
	));
}

/***************************************************
	enable featured images for posts
***************************************************/
add_theme_support('post-thumbnails', array('post'));

/*****************************************************************************************************
	get rid of the admin bar from front-end web site as well as in profile preferences
*****************************************************************************************************/
//add_filter('show_admin_bar', '__return_false');
//show_admin_bar(false);

/*****************************************************************************************************
	stop wordpress seo by yoast plugin from adding the page analysis score in publish box and edit
	posts/pages screens
*****************************************************************************************************/
//add_filter('wpseo_use_page_analysis', '__return_false');

/***************************************************
	hide update nag in wp admin
***************************************************/
//add_action('admin_menu', 'wp_hide_nag');
//function wp_hide_nag() {
//	remove_action('admin_notices', 'update_nag', 3);
//}

/***************************************************
*	for debugging, print template name to screen
*	
*	@return	void
***************************************************/
function show_template() {
	global $template;
	print_r($template);
}
//add_action('wp_head', 'show_template');

function custom_excerpt_length( $length ) {
	return 108;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Refactoring the management of stylesheets and javascript to conform to
 * WordPress standards and enable better maintenance
 */

// Register and print the styles
function focus_styles() {
	if ( is_child_theme() ) {
		// Nevermind the parent styles, they were never loaded to begin with
//		wp_enqueue_style( 'parent-stylesheet', trailingslashit( get_template_directory_uri() ) . 'style.css', false );
	}
	wp_register_style( 'focus-normalize', get_stylesheet_directory_uri().'/css/normalize.css', false, '2.6.2', 'all' );
	wp_enqueue_style( 'focus-normalize' );

	wp_register_style( 'focus-iefix', get_stylesheet_directory_uri().'/css/ie10fix.css', false, '1.1.0', 'all' );
	wp_enqueue_style( 'focus-iefix' );

	wp_register_style( 'focus-default', get_stylesheet_directory_uri().'/css/focus-styles.css', false, '1.1.0', 'all' );
	wp_enqueue_style( 'focus-default' );

	wp_deregister_style( 'font-awesome' );
	wp_register_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', false, '4.1.0' );
	wp_enqueue_style( 'font-awesome' );

	wp_register_style( 'focus-components', get_stylesheet_directory_uri().'/css/components.css', false, '1.1.0', 'all' );
	wp_enqueue_style( 'focus-components' );

	wp_register_style( 'focus-responsive', get_stylesheet_directory_uri().'/css/media-queries.css', false, '1.1.0', 'all' );
	wp_enqueue_style( 'focus-responsive' );

}
add_action( 'wp_enqueue_scripts', 'focus_styles' );

// Register and print the scripts
function focus_scripts() {

	wp_register_script( 'focus-ie10fix', get_stylesheet_directory_uri().'/js/ie10fix.js', false, '1.1.0', true );
	wp_enqueue_script( 'focus-ie10fix' );

	wp_register_script( 'moderinzr', get_stylesheet_directory_uri().'/js/vendor/modernizr-2.6.2.min.js', false, '2.6.2', false );
	wp_enqueue_script( 'moderinzr' );

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', false, '2.1.4', true );
	wp_enqueue_script( 'jquery' );

	wp_register_script( 'focus-classie', get_stylesheet_directory_uri().'/js/vendor/classie.js', array( 'jquery' ), '1.7.2', true );
	wp_enqueue_script( 'focus-classie' );

	wp_register_script( 'focus-superfish', get_stylesheet_directory_uri().'/js/plugins.js', array( 'jquery' ), '1.7.2', true );
	wp_enqueue_script( 'focus-superfish' );

	wp_register_script( 'focus-mainjs', get_stylesheet_directory_uri().'/js/main.js', array( 'focus-superfish' ), '1.1.0', true );
	wp_enqueue_script( 'focus-mainjs' );

}
add_action( 'wp_enqueue_scripts', 'focus_scripts' );


/**
 * Need to make a mobile navigation menu, that's going to require a walker...
 *
 */
class focus_walker_nav_menu extends Walker_Nav_Menu {

// add classes to ul sub-menus
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
				'sub-menu',
				( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
				( $display_depth >=2 ? 'sub-sub-menu' : '' ),
				'menu-depth-' . $display_depth
		);
		$class_names = implode( ' ', $classes );

		// build html
//		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
		$output .= "\n";
	}

// add main/sub classes to li's and links
	function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		// depth dependent classes
		$depth_classes = array(
				( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
				( $depth >=2 ? 'sub-sub-menu-item' : '' ),
				( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
				'menu-item-depth-' . $depth
		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		// build html
//		$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
		$output .= '';
		// link attributes
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
//		$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
		);

		// build html
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output.= "\n";
	}
}