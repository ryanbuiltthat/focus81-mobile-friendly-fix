<aside id="sidebar">
	<?if (is_home() || is_archive() || is_category() || is_single()):?>
		<nav id="blog-links">
			<h4>Categories</h4>
			<ul><?wp_list_categories('title_li=');?></ul>
			<h4>Archives</h4>
			<ul><?wp_get_archives('type=monthly');?></ul>
		</nav><!-- /#blog-links -->
	<?endif;?>
	<nav id="quick-links">
		<h4>Quick Links</h4>
		<?
		/***************************************************
			menu: quick links
		***************************************************/
		wp_nav_menu(array(
			'menu'		=> 4,
			'container'	=> false
		));
		?>
	</nav><!-- /#quick-links -->
	<nav id="current-projects">
		<h4>Current Projects</h4>
		<ul>
			<?
			$objProjects = new WP_Query(array(
				'posts_per_page'	=> 4,
				'cat'				=> 6
			));
			
			if ($objProjects->have_posts()):
				while ($objProjects->have_posts()):
					$objProjects->the_post();
			?>
					<li><a href="<?the_permalink();?>"><?the_title();?></a></li>
			<?
				endwhile;
			endif;
			wp_reset_query();
			?>
			<li><a href="<?=get_category_link(6);?>">For full list of projects click here</a></li>
		</ul>
	</nav><!-- /#current-projects -->
	<?php if ( is_home() ) { ?>
		<a class="twitter-timeline" href="https://twitter.com/511PANortheast" data-tweet-limit="6" data-widget-id="380775622756139008">Tweets by @511PANortheast</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	<?php } else { ?>
		<a class="twitter-timeline" href="https://twitter.com/511PANortheast" data-tweet-limit="2" data-widget-id="380775622756139008">Tweets by @511PANortheast</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	<?php } ?>
	<br>
	<br>
	<?php /*
	*/ ?>
	<div id="go-green">
		<h4>Go Green</h4>
		<p><a href="http://www.pacommutes.com/" target="_blank">Click here for more information about how you can make a difference.</a></p>
	</div><!-- /#go-green -->
</aside><!-- /#sidebar -->