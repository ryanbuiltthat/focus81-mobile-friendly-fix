				</section><!-- /#copy -->
				<?get_sidebar();?>
			</div><!-- /#content -->
		</div><!-- /#container -->

		<footer class="container">
			<?
			/***************************************************
				menu: footer nav
			***************************************************/
			wp_nav_menu(array(
				'menu'		=> 3,
				'container'	=> false
			));
			?>
			<p>Copyright &copy; <?=date('Y');?> <?=SITENAME;?>. All rights reserved.</p>
		</footer>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?=TEMPLATEDIR;?>/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
		<script src="<?=TEMPLATEDIR;?>/js/plugins.js"></script>
		<script src="<?=TEMPLATEDIR;?>/js/main.js"></script>

		<script>
			var _gaq=[['_setAccount','UA-80593-2'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src='//www.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>

	<?wp_footer();?>

</body>
</html>