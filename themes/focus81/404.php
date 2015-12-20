<?
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header();

$i404PageId	= 260;
$objPage	= get_page($i404PageId);

echo apply_filters('the_content', $objPage->post_content);

get_footer();
?>