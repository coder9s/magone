<?php if ($p->args['show_author']): ?>
<a class="author post-meta post-meta-author vcard" href="<?php echo esc_url($author_link); ?>" rel="author" title="<?php echo esc_attr($author_name); ?>" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
	<?php if ($p->args['show_author'] == 'icon') {
		echo '<i class="fa fa-pencil-square-o"></i>';
	} else if ($p->args['show_author'] == 'avatar') {
		echo $author_avatar_16;
	}
	?>
		<span class="fn" itemprop="name"><?php echo $author_name; ?></span>
</a>
<?php endif;