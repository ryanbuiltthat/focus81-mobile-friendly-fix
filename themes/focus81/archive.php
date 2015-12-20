<?
get_header();

if (have_posts()) the_post();
?>
<h1 class="page-title">
	<?
	if (is_day()):
		printf(__('Daily Archives: <span>%s</span>', 'twentyten'), get_the_date());
	elseif (is_month()):
		printf(__('Archives: <span>%s</span>', 'twentyten'), get_the_date('F Y'));
	elseif (is_year()):
		printf(__('Yearly Archives: <span>%s</span>', 'twentyten'), get_the_date('Y'));
	else:
		_e('Blog Archives', 'twentyten');
	endif;
	?>
</h1>
<?
rewind_posts();
get_template_part('loop', 'archive');
get_footer();
?>
