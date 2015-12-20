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

		<script>
			var _gaq=[['_setAccount','UA-80593-2'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src='//www.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>

	<?php wp_footer(); ?>

</body>
</html>