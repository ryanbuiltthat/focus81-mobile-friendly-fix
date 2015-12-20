<?get_header();?>


<?if (have_posts()) while (have_posts()) : the_post();?>

<div id="post-<?the_ID();?>" <?post_class();?>>
		<?the_content();?>

		<h2><a href="http://www.focus81.com/news/category/roadwork-schedule/">Weekly Roadwork Schedule</a></h2>
		<?
		$objLatestPost = new WP_Query(array(
			'posts_per_page'		=> 1,
			'cat'					=> 8,
			'post__in'				=> get_option('sticky_posts'),
			'ignore_sticky_posts'	=> 1
		));
		
		if ($objLatestPost->have_posts()):
			while ($objLatestPost->have_posts()):
				$objLatestPost->the_post();
		?>
				<div class="news-item clearfix">
					<h4><a href="<?the_permalink();?>"><?the_title();?></a></h4>
					<div>
						<?
						the_post_thumbnail();
						the_excerpt();
						?>
					</div>
				</div><!-- /.news-item -->
		<?
			endwhile;
		endif;
		wp_reset_query();
		?>

	<div id="post-<?the_ID();?>" <?post_class();?>>

		<h2><a href="<?=get_permalink(16);?>">News &amp; Events</a></h2>
		<?
		$objLatestPost = new WP_Query(array(
			'posts_per_page'		=> 1,
			'cat'					=> 5,
			'post__in'				=> get_option('sticky_posts'),
			'ignore_sticky_posts'	=> 1
		));
		
		if ($objLatestPost->have_posts()):
			while ($objLatestPost->have_posts()):
				$objLatestPost->the_post();
		?>
				<div class="news-item clearfix">
					<h4><a href="<?the_permalink();?>"><?the_title();?></a></h4>
					<div>
						<?
						the_post_thumbnail();
						the_excerpt();
						?>
					</div>
				</div><!-- /.news-item -->
		<?
			endwhile;
		endif;
		wp_reset_query();
		?>
		<h3><a href="<?=get_permalink(60);?>">Partners</a></h3>
		<ul id="partners">
			<li id="partner-nepa"><a href="http://www.nepa-alliance.org/" title="NEPA Alliance" rel="external">NEPA Alliance</a></li>
			<li id="partner-penndot"><a href="http://www.dot.state.pa.us/" title="Penn Dot" rel="external">Penn Dot</a></li>
			<li id="partner-pmta"><a href="http://www.pmta.org/" title="PMTA" rel="external">PMTA</a></li>
			<li id="partner-pasp"><a href="http://www.psp.state.pa.us/portal/server.pt/community/psp/4451" title="PA State Police" rel="external">PA State Police</a></li>
			<li id="partner-papuc"><a href="http://www.puc.state.pa.us/" title="PA PUC" rel="external">PA PUC</a></li>
			<li id="partner-wbsa"><a href="http://www.flyavp.com/" title="Wilkes-Barre/Scranton Airport" rel="external">Wilkes-Barre/Scranton Airport</a></li>
			<li id="partner-luzerne" class="linetwo"><a href="http://www.luzernecounty.org/" title="Luzerne County" rel="external">Luzerne County</a></li>
			<li id="partner-lackawanna" class="linetwo"><a href="http://www.lackawannacounty.org/" title="Lackawanna County" rel="external">Lackawanna County</a></li>
			<li id="partner-npaaa" class="linetwo"><a href="http://ww1.aaa.com/scripts/WebObjects.dll/AAAOnline?association=aaa&amp;club=222&amp;zip=18452&amp;devicecd=PC" title="North Penn AAA" rel="external">North Penn AAA</a></li>
			<li id="partner-luzernevisitor" class="linetwo"><a href="http://www.tournepa.com/" title="Luzerne County Convention and Visitors Bureau" rel="external">Luzerne County Convention and Visitors Bureau</a></li>
			<li id="partner-lackawannavisitor" class="linetwo"><a href="http://www.visitnepa.org/" title="Lackawanna County Convention and Visitors Bureau" rel="external">Lackawanna County Convention and Visitors Bureau</a></li>
			<li id="partner-paturnpike" class="linetwo"><a href="http://www.paturnpike.com/" title="PA Turnpike" rel="external">PA Turnpike</a></li>
		</ul>

	</div><!-- #post-<?the_ID();?> -->
	
<?endwhile;?>

<?get_footer();?>