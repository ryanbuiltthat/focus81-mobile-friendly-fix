<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?wp_title();?></title>
		<?wp_head();?>
		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" type="image/x-icon" href="<?=TEMPLATEDIR;?>/img/favicon.png" />
		<link rel="stylesheet" href="<?=TEMPLATEDIR;?>/css/normalize.css">
		<link rel="stylesheet" href="<?bloginfo('stylesheet_url');?>">
		<script src="<?=TEMPLATEDIR;?>/js/vendor/modernizr-2.6.2.min.js"></script>
		<!--[if lte IE 8]>
			<link rel="stylesheet" href="<?=TEMPLATEDIR;?>/css/ie.css">
		<![endif]-->
	</head>
	<body <?body_class();?>>

		<div id="container" class="container">
			<h5 id="banner"><a href="/" class="ir" title="<?=SITENAME;?> Home"><?=SITENAME;?></a></h5>
			<nav id="main-nav" class="clearfix">
				<?
				/***************************************************
					menu: main nav
				***************************************************/
				wp_nav_menu(array(
					'menu'			=> 2,
					'container'		=> false,
					'menu_class'	=> 'sf-menu'
				));
				?>
			</nav><!-- /#main-nav -->
			<div id="content" class="clearfix">
				<section id="copy">