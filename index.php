<?php get_header(); ?>
<div class="index-content widget archive-page-content">
<?php 
global $wp_query;
?>
	<div class="archive-page-header">
		
		<?php 
		$archive_page_title = '';
		if (is_search() && get_search_query()) {
			$archive_page_title = sprintf(__('Search query: <strong>%s</strong>', 'magone'), get_search_query());
		} else if (is_category()) {
			$archive_page_title = sprintf(__('Category: <strong>%s</strong>', 'magone'), $wp_query->queried_object->name);
		} else if (is_tag()) {
			$archive_page_title = sprintf(__('Tag: <strong>%s</strong>', 'magone'), $wp_query->queried_object->name);
		} else if (is_author()) {
			$archive_page_title = sprintf(__('Author: <strong>%s</strong>', 'magone'), $wp_query->queried_object->data->display_name);
		} ?>
		<?php if ($archive_page_title) : ?>
		<h1 class="archive-page-title"><?php echo $archive_page_title; ?></h1>
		<?php endif; ?>
	</div>
	<?php
	
	if (isset($wp_query->queried_object) && isset($wp_query->queried_object->description)) {
		echo '<p class="archive-page-description">';
		if (is_author()) {
			echo get_avatar(get_the_author_ID(), 48, null, null, array(
				'class' => 'author-page-avatar'
			));
		}
		echo $wp_query->queried_object->description.'</p>';
	}
	?>
	<div class="clear"></div>
	<?php
	magone_pagenav_index('top');
	$design = get_theme_mod('archive_page_design_style', 'blogging');
	$instance['show_comment'] = get_theme_mod('show_comment', true);
	$instance['show_readmore'] = get_theme_mod('show_readmore', true);
	$instance['show_author'] = get_theme_mod('show_author', 'icon');
	$instance['show_date'] = get_theme_mod('show_date', 'full');
	$instance['meta_item_order'] = get_theme_mod('meta_item_order', 'a_c_d');
	$instance['number_cates'] = get_theme_mod('number_cates', 1);
	$instance['snippet_length'] = get_theme_mod('snippet_length', 150);
	$instance['thumbnail_height'] = get_theme_mod('thumbnail_height', 150);	
	$instance['show_format_icon'] = get_theme_mod('show_format_icon', false);	
	$instance['main_color'] = get_theme_mod('archive_main_color', get_theme_mod('main_color'));
	$instance['thumb_bg_color'] = get_theme_mod('thumb_bg_color');
	$instance['rainbow_thumb_bg'] = get_theme_mod('rainbow_thumb_bg');
	
	echo magone_article_box($design, $instance, '', 'magone-archive-blog-rolls');
	
	magone_pagenav_index('bottom');
	?>
</div>	
<?php get_footer(); ?>