<?if (have_posts()) while (have_posts()): the_post();?>
				
	<div id="post-<?the_ID();?>" <?post_class('common_box');?>>
		<h3><a href="<?the_permalink();?>" rel="bookmark" title="Permanent Link to <?the_title_attribute();?>"><?the_title();?></a></h3>
		<span class="date">Posted on <?the_time('l F j, Y');?></span>
		<div class="entry-content entry">
			<?the_excerpt();?>
		</div><!-- .entry-content -->
		<p class="postmetadata"><?the_tags('Tags: ', ', ', '<br />');?></p>

		<?if (get_the_author_meta('description')):?>
			<div id="entry-author-info">
				<div id="author-avatar">
					<?echo get_avatar(get_the_author_meta('user_email'), apply_filters('twentyten_author_bio_avatar_size', 60));?>
				</div><!-- #author-avatar -->
				<div id="author-description">
					<h3><?printf(esc_attr__('About %s', 'twentyten'), get_the_author());?></h3>
					<?the_author_meta('description');?>
					<div id="author-link">
						<a href="<?=get_author_posts_url(get_the_author_meta('ID'));?>">
							<?printf(__('View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyten'), get_the_author());?>
						</a>
					</div><!-- #author-link	-->
				</div><!-- #author-description -->
			</div><!-- #entry-author-info -->
		<?endif;?>

	</div><!-- #post-## -->
<?endwhile;?>