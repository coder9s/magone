<?php get_header(); ?>
	<div class="widget content-scroll no-title">
		<div class="blog-posts hfeed">
		<?php if ( have_posts() ) :
		// Start the Loop.
		while ( have_posts() ) : the_post(); 
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
				<div class="post hentry" itemprop="blogPost" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
					<div class="post-header">
						<a name="<?php echo $p->id; ?>" class="post-id" data-id="<?php echo $p->id; ?>"></a>
						
						<?php if (get_theme_mod('feature_image_position', 'above-title') == 'above-title' && has_post_thumbnail()): ?>
							<div class="post-feature-media-wrapper">
								<?php 
								the_post_thumbnail('full', array(
									'alt' => $p->title_attr, 
									'title' => $p->title_attr,
									'itemprop' => 'image'
								));
								?>
							</div>
						<?php endif; ?>
					
						<?php if ($p->title): ?>
						<h1 class="post-title entry-title" itemprop="name headline"><?php echo $p->title; ?></h1>
							<?php 
							$sub_title = get_post_meta($p->id, 'sub_title', true);
							if ($sub_title): ?>
							<div class="post-sub-title-wrapper"><h2><?php echo $sub_title; ?></h2></div>
							<?php endif; ?>
						<?php endif; ?>
						
						
						<?php if (get_theme_mod('enable_top_share_buttons', false)): ?>
							<div class="header-post-sharing-buttons">
								<?php include MAGONE_THEME_PATH_INCLUDABLES.'includables-share-buttons.php'; ?>
							</div>
							<div class="clear"></div>
						<?php endif; ?>
						

						<!-- meta data for post -->
						<?php if ($p->args['show_meta']): ?>
							<div class="post-meta-wrapper">
								
								<?php if ($p->args['show_comment']): ?>				
									<a class="post-meta post-meta-comments" href="#comments">
										<i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?>										
									</a>
								<?php endif; ?>
																
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
								<?php endif; ?>

								<?php if ($p->args['show_date']): ?>
									<a class="entry-date published post-meta post-meta-date timestamp-link" href="<?php echo esc_url($p->link); ?>" rel="bookmark" title="permanent link">
										<i class="fa fa-clock-o"></i>
										<abbr class="updated" itemprop="datePublished">
											<span class="value">
												<?php 
												switch ($p->args['show_date']) {
													case 'pretty':
														echo sprintf( esc_html__( '%s ago', 'magone' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );
														break;

													case 'short':
														if (get_option('date_format')) {
															echo get_the_date(str_replace('F', 'M', get_option('date_format')));
														}
														break;

													case 'time':
														echo $p->time;
														break;

													case 'date':
														echo $p->date;
														break;

													default:
														echo $p->date.' '.$p->time;
														break;
												}
												?>
											</span>
										</abbr>
									</a>
								<?php endif; ?>
								
							</div>
						<?php endif; ?>
						
						<?php if (get_theme_mod('feature_image_position', 'above-title') == 'under-title' && has_post_thumbnail()): ?>
							<div class='post-feature-media-wrapper'>
								<?php 
								the_post_thumbnail('full', array(
									'alt' => $p->title_attr, 
									'title' => $p->title_attr,
									'itemprop' => 'image'
								));
								?>
							</div>
						<?php endif; ?>


					</div><!-- end post-header -->
					
					<div class="post-body entry-content content-template" id="post-body-<?php the_ID(); ?>" itemprop="articleBody">											
						<div class="post-body-inner">
							<?php if ( wp_attachment_is_image( get_the_ID() ) ) : 
								$att_image = wp_get_attachment_image_src( get_the_ID(), "full"); 
							?>

								<p class="attachment">
									<a href="<?php echo esc_url(wp_get_attachment_url(get_the_ID())); ?>" title="<?php echo esc_attr(get_the_title()); ?>" rel="attachment">
										<img src="<?php echo esc_url($att_image[0]);?>" width="<?php echo esc_attr($att_image[1]);?>" height="<?php echo esc_attr($att_image[2]);?>"  class="attachment-medium" alt="<?php echo esc_attr(get_the_title()); ?>" />
									</a>
								</p>
								<?php 
								if (get_the_excerpt()) {
									echo '<p class="media-caption">'.  get_the_excerpt().'</p>';
								}
								?>

							<?php else : ?>
								<a href="<?php echo esc_url(wp_get_attachment_url(get_the_ID())); ?>" title="<?php echo esc_attr(get_the_title()); ?>" rel="attachment">
									<?php echo basename(get_the_guid()) ?>
								</a>
							<?php endif; ?>
							

							<div class="clear"></div>

							
							<?php the_content(); ?>
						</div>
						<div class="clear"></div>
						
						<?php wp_link_pages( array( 
							'before' => '<div class="post-page-buttons"><h4 class="post-section-title">'.  esc_html__('PAGES', 'magone').'</h4>', 
							'after' => '<div class="clear"></div></div>',
							'link_before' => '<span>',
							'link_after' => '</span>'
						) ); ?>
							
						<!-- clear for photos floats -->
						<div class="clear"></div>
					</div><!-- end post-body -->
					
					<?php 
					do_action('sneeit_display_sidebar', array(
						'id' => 'under-post-content',
						'class' => 'section'
					));
					?>					

					<div class="post-footer">
						<?php if (!get_theme_mod('disable_bottom_share_buttons')):
							include MAGONE_THEME_PATH_INCLUDABLES.'includables-share-buttons.php';
							echo '<input class="post-share-buttons-url" value="'.  get_the_permalink().'">';
						endif; ?>
						
						<?php 
						
							
						
						?>

						<?php if ($p->args['show_author']) : ?>									
						
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
													echo '<a class="author-social-links" href="'.esc_url($value).'" target="_blank" ref="nofollow"><i class="'.esc_attr('fa fa-'.$key).'"></i></a>';
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

					</div><!-- end post-footer -->
					
					<?php if (get_theme_mod('feature_image_position') == 'disable' || !has_post_thumbnail()) {
						$src = magone_get_first_image_src_in_content(get_the_content(), 'full'); 
						if ($src) {
							echo '<img src="'.esc_url($src).'" itemprop="image" class="hide"/>';
						}
					} ?>
					
				</div><!-- end post-hentry -->
				
				<?php
				if (!get_theme_mod('disable_next_prev_pager')) {
					magone_pagenav_attachment();
				}
				?>
				<?php 
				do_action('sneeit_display_sidebar', array(
					'id' => 'before-post-comment',
					'class' => 'section'
				));
				?>								
				<?php comments_template(); ?>
			</div>
			
		<?php endwhile;
		
		endif;
		?>
		</div>
	</div>
<?php get_footer(); ?>