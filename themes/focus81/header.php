<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png"/>
	<?php wp_head(); ?>
	<!--[if lte IE 8]>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ie.css">
	<![endif]-->
</head>
<body <?php body_class( 'cbp-spmenu-push' ); ?>>
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
	<h3>Navigation <a id="closer" href="#"><i class="fa fa-times fa-2x"></i> </a></h3>
	<?php
	$defaults = array(
		'theme_location'  => '',
		'menu'            => 2,
		'container'       => false,
//				'container_class' => 'cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left',
		'container_class' => false,
//				'container_id'    => 'cbp-spmenu-s1',
		'container_id'    => false,
		'menu_class'      => '',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => false,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '%3$s',
		'depth'           => 2,
		'walker'          => new focus_walker_nav_menu
	);

	wp_nav_menu( $defaults );
	?>
</nav>
<div id="container" class="container">
	<h5 id="banner"><a href="/" class="ir" title="<?php echo SITENAME; ?> Home"><?php echo SITENAME; ?></a></h5>
	<div class="mobile-nav-divider">
		<a class="menu-toggle" id="showLeft"><i class="fa fa-bars fa-2x"></i> </a>
	</div>

	<nav id="main-nav" class="clearfix">
		<?php
		/***************************************************
		 * menu: main nav
		 ***************************************************/
		wp_nav_menu( array(
			'menu'       => 2,
			'container'  => false,
			'menu_class' => 'sf-menu'
		) );
		?>
	</nav><!-- /#main-nav -->
	<div id="content" class="clearfix">
		<section id="copy">