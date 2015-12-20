<?if (have_posts()) while (have_posts()) : the_post();?>

	<div id="post-<?the_ID();?>" <?post_class();?>>
		<h1><?the_title();?></h1>
		<div class="entry-content">
			<?the_content();?>
		</div><!-- .entry-content -->
	</div><!-- #post-<?the_ID();?> -->
	
<?endwhile;?>