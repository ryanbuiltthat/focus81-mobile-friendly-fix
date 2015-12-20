<?
/*
Template Name: HTML Sitemap
*/

get_header();
?>

<div id="post-<?the_ID();?>" <?post_class();?>>
	<h1><?the_title();?></h1>
	<div class="html-sitemap">
		<ul>
			<?wp_list_pages('title_li=&exclude=32');?>
		</ul><!-- /.sitemap-pages -->
	</div><!-- /.html-sitemap -->
</div><!-- #post-<?the_ID();?> -->
	
<?get_footer();?>