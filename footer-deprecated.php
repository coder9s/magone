					<div class="clear"></div>
					<?php get_footer( 'after-content-sidebar' );	?>
					</div><!--.content-inner-->
				</div><!--#content-->
				
				<?php 
				if (!is_404()) {
					get_sidebar(); 
				}					
				?>				
				
			</div><!--#primary-->			
			<div class="clear"></div>
			<div class="is-firefox hide"></div>
			<div class="is-ie9 hide"></div>
			
			<div id="footer">
				<?php get_footer( 'wide-sidebar' );	?>
				
				<div class="footer-inner shad">
					<div class="footer-col footer-col-1">
						<div class="section" id="footer-col-1-section">
							<?php if (get_theme_mod('footer_logo')) : ?>
							<div class="widget Image no-title">
								<a href="<?php echo esc_url(get_home_url()); ?>">
									<img alt="<?php esc_attr_e('Footer Logo', 'magone'); ?>" src="<?php echo esc_url(get_theme_mod('footer_logo')); ?>"/>
								</a>
							</div>
							<?php endif; ?>
						</div>
						<div class="footer-copyright">
							<div class="copyright-line-1">
								<?php echo esc_html(get_theme_mod('copyright_1')); ?>
							</div>
							<div class="copyright-line-2">
								<?php echo esc_html(get_theme_mod('copyright_2')); ?>
							</div>
						</div>
					</div>
					<div class="footer-col footer-col-2">
						<div class="section" id="footer-col-2-section">
							<div class="widget page-list no-title">
								<?php 
								if ( has_nav_menu( 'footer-menu' ) ) {							
									wp_nav_menu( array(
										'theme_location' => 'footer-menu',
										'container' => 'ul'
									));
								} else {
									?>
									<ul class="menu">
										<li>
											
										</li>
									</ul>
									<?php
								}
								?>
							</div>
						</div>
					</div>
					<div class="footer-col footer-col-3">
						<div class="section" id="footer-col-3-section">
							<div class="widget LinkList social_icons linklist">
								<div class="widget-content">									
									<?php global $customize_social_icon_list;
									if (count($customize_social_icon_list)):?>
										<ul>
										<?php 
										foreach ($customize_social_icon_list as $key => $value) : ?>
											<li><a href="<?php echo esc_url($value); ?>" title="<?php echo esc_attr($key) ?>" class="social-icon <?php echo esc_attr($key) ?>" target="_blank"><i class="fa fa-<?php echo esc_attr($key) ?>"></i></a></li>
										<?php endforeach; ?>
										</ul>
										<div class="clear"></div>
									<?php endif; ?>							
									
									<div class="clear"></div>
								</div>
							</div>
							
							
							<?php 
							// Only show footer feedburner when activating framework
							// Because without framework, customer can not customize the form
							if (function_exists('sneeit_framework')) : 
								if (get_theme_mod('feed_uri')) : ?>
								<div class="widget follow-by-email" id="follow-by-email-footer">
									<h2 class="title"><?php echo esc_html(get_theme_mod('feed_title')); ?></h2>
									<div class="widget-content">
										<div class="follow-by-email-inner">
											<?php 
											$feed_uri = get_theme_mod('feed_uri');
											if (strpos($feed_uri, '/') !== false) {
												$feed_uri = substr(strrchr($feed_uri, '/'), 1);
											}
											if (strpos($feed_uri, '=') !== false) {
												$feed_uri = substr(strrchr($feed_uri, '='), 1);
											}
											?>
											<form action="https://feedburner.google.com/fb/a/mailverify" method="post" onsubmit="window.open(&quot;https://feedburner.google.com/fb/a/mailverify?uri=<?php echo esc_js(esc_url($feed_uri)); ?>&quot;, &quot;popupwindow&quot;, &quot;scrollbars=yes,width=550,height=520&quot;); return true" target="popupwindow">
												<table>
													<tbody>
														<tr>
															<td>
																<input class="follow-by-email-address" name="email" placeholder="<?php echo get_theme_mod('feed_placholder_text', esc_attr__('Email Address', 'magone')); ?>" type="text"/>
															</td>
															<td>
																<input class="follow-by-email-submit" type="submit" value="<?php echo esc_attr(get_theme_mod('feed_submit_text'), esc_attr__('Subscribe', 'magone')); ?>"/>
															</td>
														</tr>
													</tbody>
												</table>
												<input name="uri" type="hidden" value="<?php echo esc_attr($feed_uri); ?>"/>
												<input name="loc" type="hidden" value="<?php echo esc_attr(get_locale()); ?>"/>
											</form>
										</div>
									</div>
									<div class="clear"></div>
								</div><!-- FeedBurner Widget-->
								<?php endif; ?>
								<?php if ( get_theme_mod( 'footer_extra_code' ) ) : ?>
									<div id="footer-extra-text">
										<?php echo do_shortcode( get_theme_mod( 'footer_extra_code' ) ); ?>
									</div>
								<?php endif; ?>
								
							<?php endif; ?>
							
						</div>
					</div>
					<div class="clear"></div>
				</div> <!--.footer-inner -->
			</div> <!--#footer-->

		</div><!--.wide-->		
	</div><!--.m1-wrapper-->	
	
	<?php if (!get_theme_mod('disable_scroll_up', false)): ?>
		<a class='scroll-up shad' href='#'><i class='fa fa-angle-up'></i></a>
	<?php endif; ?>
		
	<div class='search-form-wrapper'>
		<div class='search-form-overlay'></div>
		<?php get_search_form(); ?>
	</div>	
		
	<?php wp_footer(); ?>
	
</body>
</html>