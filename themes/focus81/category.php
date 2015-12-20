<?get_header();?>
<h1 class="page-title">
	<?printf(__('Category: %s', 'twentyten'), '<span>' . single_cat_title('', false) . '</span>' );?>
</h1>
<?
get_template_part('loop', 'category');

get_footer();
?>
