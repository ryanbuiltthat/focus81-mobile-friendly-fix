<?
get_header();

/***************************************************
	default posts to "news" category only
***************************************************/
$wp_query = new WP_Query(array(
	'posts_per_page'	=> -1,
	'cat'				=> 5
));

if (have_posts()) the_post();
rewind_posts();
?>
	<h1><?=get_the_title('16');?></h1>
<?
get_template_part('loop', 'listing-template');

get_footer();
?>
