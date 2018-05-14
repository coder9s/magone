<?php get_header(); ?>		
	<?php 
	if ( have_posts() ) :
		// Start the Loop.
		while ( have_posts() ) : the_post(); 
		
			if (get_post_meta(get_the_ID(), 'content_layout', true) == 'content_only') {
				$content = get_the_content();
				if (strpos($content, '<p>') == 0 && strpos($content, '</p>') == strlen($content) - strlen('</p>')) {
					$content = str_replace('<p>', '', $content);
					$content = str_replace('</p>', '', $content);
				}
				echo do_shortcode($content);
				break;
			}
			
			$post_id = get_the_ID();
			$post_review = get_post_meta($post_id, 'post-review', true);
			$post_review_enabled = is_array($post_review) && !empty($post_review['type']) && is_array($post_review[$post_review['type']]);
			
?>
<div class="widget content-scroll no-title">
	<div class="blog-posts">
		<?php 
			
			$p = new MagOne_Article_Item(array(
				'show_date' => get_theme_mod('article_show_date', 'full'),
				'show_author' => get_theme_mod('article_show_author', 'icon'),
				'show_comment' => true
			));
					
			
			
			$author_id = get_the_author_meta('ID');
			$author_name = get_the_author_meta( 'display_name' );
			$author_avatar_16 = get_avatar($author_id, 16, '', sprintf(esc_attr__("%s 's Author avatar", 'magone'), $author_name));
			$author_avatar_50 = get_avatar($author_id, 50, '', sprintf(esc_attr__("%s 's Author avatar", 'magone'), $author_name), array(
				'class'  => 'author-profile-avatar cir',
				'itemprop' => 'image'
			));
			$author_link = get_author_posts_url($author_id);
			?>
			<div class="post-outer">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="post-header">
						<a name="<?php echo $p->id; ?>" class="post-id" data-id="<?php echo $p->id; ?>"></a>
						
						<?php if (get_theme_mod('feature_image_position') == 'above-title'): 
							include MAGONE_THEME_PATH_INCLUDABLES.'includables-singular-feature-images.php';
						endif; ?>
						
						<?php if (!get_theme_mod('disable_breadcrumb') && !is_page()): ?>
							<div class="post-breadcrumb"><?php do_action('sneeit_breadcrumbs', array(
								'separator' => '<span><i class="fa fa-angle-right"></i></span>',
								'show_current' => false,
								'home_text' => esc_html__('Home', 'magone'), 
							)); ?></div>
						<?php endif; ?>				

						<?php if ($p->title): ?>
							
						<h1 class="post-title entry-title" itemprop="name headline"><?php echo balanceTags($p->title, true); ?></h1>							

							<?php 
							$sub_title = get_post_meta($p->id, 'sub_title', true);
							if ($sub_title): ?>
						<div class="post-sub-title-wrapper"><h2><?php echo balanceTags($sub_title, true); ?></h2></div>
							<?php endif; ?>
						<?php endif; /*$p->title*/?>
						
						
						<?php if (get_theme_mod('enable_top_share_buttons')): ?>
							<div class="header-post-sharing-buttons">
								<?php include MAGONE_THEME_PATH_INCLUDABLES.'includables-share-buttons.php'; ?>
							</div>
							<div class="clear"></div>
						<?php endif; ?>
						

						<!-- meta data for post -->
						<?php if ($p->args['show_meta'] && !is_page()): 
							$meta_item_order = get_theme_mod('article_meta_item_order', 'a_c_d');
							$meta_item_order = explode('_', $meta_item_order);
							?>
							<div class="post-meta-wrapper">
								<?php
								for ($i = 0; $i < count($meta_item_order); $i++) {
									if ($meta_item_order[$i] == 'a') {
										include_once 'singular-meta-item-author.php';
									} else if ($meta_item_order[$i] == 'c') {
										include_once 'singular-meta-item-comment.php';
									} else if ($meta_item_order[$i] == 'd') {
										include_once 'singular-meta-item-date.php';
									}
								}
								?>								
							</div>
						<?php endif; ?>
						
						<?php if (get_theme_mod('feature_image_position') == 'under-title'): 
							include MAGONE_THEME_PATH_INCLUDABLES.'includables-singular-feature-images.php';
						endif; ?>


					</div><!-- end post-header -->
					<?php 
						$post_ads_code = get_theme_mod('post_ads_code');					
					?>
					<div class="post-body entry-content content-template<?php if (!$post_ads_code) {
						echo ' wide-right';
					}					
?>" id="post-body-<?php the_ID(); ?>" itemprop="<?php
	if (!$post_review_enabled) {
		echo 'articleBody';
	} else {
		echo 'reviewBody';
	}
?>">
						<?php
						if ($post_ads_code && !is_page()): ?>
							<div class="post-ads"><?php echo do_shortcode($post_ads_code); ?></div>
						<?php endif; ?>
						
						<?php 
						$post_excerpt = '';
						
						if ( ! get_theme_mod('hide_post_excerpt') ) {							
							$post_excerpt = get_the_excerpt();								
							if ( $post_excerpt ) {
								if ( strpos($post_excerpt, '&hellip;') !== false ) { // none excerpt, it's snippet
									if ( get_theme_mod( 'disable_auto_excerpt' ) ) {
										$post_excerpt = '';
									} else {
										$post_excerpt = magone_get_the_snippet(150, false);										
									}														
								}
							}
						}
																				
						$number_break_links = get_theme_mod( 'number_break_links' );
						
						
						?>
						<?php if ( ($post_excerpt || $number_break_links) && !is_page()): ?>
						<div class="post-right">
							<?php if ($post_excerpt): ?>							
								<p class="post-excerpt"><?php echo $post_excerpt;?></p>
							<?php endif; ?>
							
							<?php if ($number_break_links) {
								magone_related_post((int) $number_break_links, $p->id, 'break');
							}?>
						</div>
						<?php endif; ?>
						<?php if ($post_excerpt && $number_break_links): ?>
							<div class="clear"></div>
						<?php endif; ?>
						
						<div class="post-body-inner"><?php the_content(); ?></div>
						<div class="clear"></div>
						
						<?php wp_link_pages( array( 
							'before' => '<div class="post-page-buttons"><h4 class="post-section-title">'.esc_html__('PAGES', 'magone').'</h4>', 
							'after' => '<div class="clear"></div></div>',
							'link_before' => '<span>',
							'link_after' => '</span>'
						) ); ?>
							
						<!-- clear for photos floats -->
						<div class="clear"></div>
						
						
						<?php						
						do_action('magone_display_rating_hook');
					
					?></div><!-- end post-body -->
					<?php 
					$number_break_links_more = get_theme_mod( 'number_break_links_more' );
					if ($number_break_links_more) : ?>
					<div class="break-link-after-more-tag hide">
						<?php magone_related_post((int) $number_break_links_more, $p->id, 'break'); ?> 
					</div>					
					<?php 
					endif;
					if (!is_page()) :
					do_action('sneeit_display_sidebar', array(
						'id' => 'under-post-content',
						'class' => 'section'
					));
					endif;
					?>
					
					<div class="clear"></div>
					
					<?php
					$post_ads_code_bottom = get_theme_mod('post_ads_code_bottom');
					$number_break_links_bottom = get_theme_mod( 'number_break_links_bottom' );
					if ($post_ads_code_bottom || $number_break_links_bottom) :
					?>
					<div class="post-bot-media<?php
					if ($post_ads_code_bottom) {
						echo ' post-bot-ads';
					}
					if ($number_break_links_bottom) {
						echo ' post-bot-break';
					}
					?>">
						<?php if ($post_ads_code_bottom && !is_page()): ?>
							<div class="post-ads-bottom"><?php echo do_shortcode($post_ads_code_bottom); ?></div>
						<?php endif;

						if ($number_break_links_bottom) : ?>
						<div class="break-link-after-content">
							<?php magone_related_post((int) $number_break_links_bottom, $p->id, 'break'); ?> 
						</div>					
						<?php endif; ?>
						<div class="clear"></div>
					</div>
					<?php endif; ?>

					<div class="post-footer">
						<?php						
						$display_cate_tag = get_theme_mod('display_cate_tag');
						if (! $display_cate_tag) {
							$display_cate_tag = 'both';
						}
						if ($display_cate_tag != 'hide' && !is_page()) :
							$categories = get_the_category();
							$tags = get_the_tags();							
							if((($display_cate_tag == 'cates' || $display_cate_tag == 'both') && is_array($categories)) || 
							   (($display_cate_tag == 'tags' || $display_cate_tag == 'both') && is_array($tags))) :
								?><div class="post-labels post-section"><?php
								if ((($display_cate_tag == 'cates' || $display_cate_tag == 'both') && is_array($categories))) {
									foreach($categories as $category) {
										?>
										<a class="post-label" href="<?php echo get_category_link( $category->term_id ); ?>" rel="tag">
											<span class="bg label-name"><?php echo $category->cat_name; ?></span>
											<span class="label-count">
												<span class="label-count-arrow"></span>
												<span class="label-count-value"><?php echo $category->count; ?></span>
											</span>
										</a>
										<?php
									}
								}

								if ((($display_cate_tag == 'tags' || $display_cate_tag == 'both') && is_array($tags))) {
									foreach($tags as $tag) {
										?>
										<a class="post-label" href="<?php echo get_tag_link( $tag->term_id ); ?>" rel="tag">
											<span class="bg label-name"><?php echo $tag->name; ?></span>
											<span class="label-count">
												<span class="label-count-arrow"></span>
												<span class="label-count-value"><?php echo $tag->count; ?></span>
											</span>
										</a>
										<?php
									}
								}							
								?>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<?php							
							endif;
						endif; // end checking $display_cate_tag
						?>
						

						<?php if (!get_theme_mod('disable_bottom_share_buttons') && !is_page()):
							include MAGONE_THEME_PATH_INCLUDABLES.'includables-share-buttons.php';
							echo '<input class="post-share-buttons-url" value="'.  get_the_permalink().'">';
						endif; ?>
												

						<?php if ($p->args['show_author'] && !is_page() && !get_theme_mod('disable_author_box', false)) : ?>									
						
							<div class="post-section post-author-box" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
								<h4 class="post-section-title">
									<i class="fa fa-pencil-square"></i> <?php esc_html_e('AUTHOR', 'magone'); ?>:
									<a href="<?php echo esc_url($author_link); ?>" itemprop="url" rel="author" title="author profile">
										<span itemprop="name"><?php echo $author_name; ?></span>
									</a>
								</h4>
								<div class="clear"></div>
								<div class="post-author-box-content">
									<div class="author-profile has-avatar">
										<?php echo $author_avatar_50; ?>										
										<div class="author-profile-description">												
											<span itemprop="description">
												<?php echo get_the_author_meta('description',$author_id); ?>
											</span>
											<div class="clear"></div>
											<?php 
											global $magone_social_icon_list;
											$user_social_icon_links = $magone_social_icon_list;
											foreach ($magone_social_icon_list as $key => $name) {
												$value = get_user_meta($author_id, $key, true);
												if ($value) {
													$user_social_icon_links[$key] = $value;
												}
												else {
													unset($user_social_icon_links[$key]);
												}
											}

											if (count($user_social_icon_links)) {										
												echo '<div class="author-social-icon-links">';
												foreach ($user_social_icon_links as $key => $value) {
													echo '<a class="author-social-links" href="'.esc_url($value).'" target="_blank" ref="nofollow"><i class="fa fa-'.$key.'"></i></a>';
												}										
												echo '<div class="clear"></div></div>';
											}


											?>
										</div>
									</div>
									
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						<?php endif; ?>
						
						<?php if (get_theme_mod('number_related_posts') && !is_page()) : ?>
						<div class="post-related" data-count="<?php echo get_theme_mod('number_related_posts'); ?>" data-id="<?php echo $p->id; ?>">
							<div class="post-related-inner white shad">
								<div class="white shad post-related-header">
									<h4><?php esc_html_e('RECOMMENDED FOR YOU', 'magone'); ?></h4>
									<a class="post-related-random-button" href="javascript:void(0)" data-count="<?php echo get_theme_mod('number_related_posts'); ?>" data-id="<?php echo $p->id; ?>">
										<i class="fa fa-random"></i>
									</a>
									<div class="clear"></div>
								</div>
								<div class="post-related-content">
									<div class="ajax">
										<div class="loader"><?php esc_html_e('Loading...', 'magone'); ?></div>										
									</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>

						<?php endif; ?>

					</div><!-- end post-footer -->
					
				</div><!-- end post-hentry -->
				
				<?php
				if (!get_theme_mod('disable_next_prev_pager') && !is_page()) {
					magone_pagenav_singular();
				}
				?>								
				
				<?php comments_template(); ?>
			</div>
	</div>
</div>			
		<?php 
			// save view counts
			$view_count_key = get_theme_mod('view_count_meta_key_name', MAGONE_META_KEY_VIEWS);
			$view_count = get_post_meta($p->id, $view_count_key, true);
			if (!$view_count) {
				$view_count = 0;
			}
			$view_count++;
			update_post_meta($p->id, $view_count_key, $view_count);
		endwhile;
		
	endif;
		?>
<?php get_footer(); ?>