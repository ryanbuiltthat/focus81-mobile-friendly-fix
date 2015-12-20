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
add_filter('show_admin_bar', '__return_false');
show_admin_bar(false);

/*****************************************************************************************************
	stop wordpress seo by yoast plugin from adding the page analysis score in publish box and edit
	posts/pages screens
*****************************************************************************************************/
add_filter('wpseo_use_page_analysis', '__return_false');

/***************************************************
	hide update nag in wp admin
***************************************************/
//add_action('admin_menu', 'wp_hide_nag');
function wp_hide_nag() {
	remove_action('admin_notices', 'update_nag', 3);
}

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