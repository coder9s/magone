<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">
	<?php wp_head();?>
</head>



<body <?php body_class(); ?>>
<?php
$header_layout = get_theme_mod('header_layout');
if (!$header_layout) {
	$header_layout = 'default';
}
$header_full_width = get_theme_mod('header_full_width');


if ($header_full_width): ?>
	<header id="header" class="header-bg header-layout-<?php echo esc_attr($header_layout); ?>"><div class="m1-wrapper header-bg"><div class="wide">
	<?php get_header('top-page-sidebar'); ?>
	<?php get_header('layout-'.$header_layout); ?>

	<div class="clear"></div>
	<?php get_header('wide-sidebar'); ?>
</div></div></header>
<?php endif; ?>

<div class="m1-wrapper">
	<div class="wide">
		<?php if (!$header_full_width): ?>
		<header id="header" class="header-layout-<?php
			echo esc_attr($header_layout); 
			if (has_nav_menu( 'top-menu' )) {
				echo ' has-top-menu';
			}
		?>">
			<?php get_header('top-page-sidebar'); ?>
			<?php get_header('layout-'.$header_layout); ?>

			<div class="clear"></div>
			<?php get_header('wide-sidebar'); ?>
		</header>
		<?php endif; ?>
		<div class="clear"></div>
		<div id='primary'>
			<div id='content'><div class="content-inner">
				<?php get_header('before-content-sidebar'); ?>					