<?php

						?><div class="clear"></div><?php 
						get_footer( 'after-content-sidebar' );	
					?></div><?php // .content-inner
				?></div><?php //#content
				
				
				if (!is_404()) {
					get_sidebar(); 
				}					
			?></div><?php // #primary
			?><div class="clear"></div><?php
			?><div class="is-firefox hide"></div><?php
			?><div class="is-ie9 hide"></div><?php
			
			?><div id="footer"><?php
				get_footer( 'wide-sidebar' );
				?><div class="footer-inner shad"><?php
					?><div class="footer-col footer-col-1"><?php
					
						do_action( 'sneeit_display_sidebar', array(
							'id'    => 'footer-col-1-section',
							'class' => 'section',
						) );
					?></div><?php
					?><div class="footer-col footer-col-2"><?php
						do_action( 'sneeit_display_sidebar', array(
							'id'    => 'footer-col-2-section',
							'class' => 'section',
						) );
					?></div><?php
					?><div class="footer-col footer-col-3"><?php
						do_action( 'sneeit_display_sidebar', array(
							'id'    => 'footer-col-3-section',
							'class' => 'section',
						) );
					?></div><?php
					?><div class="clear"></div><?php
				?></div><?php // footer-inner
			?></div><?php  #footer
			
			?><div id="magone-copyright"><?php
				echo get_theme_mod('copyright_1') . ' '. get_theme_mod('copyright_2'); 	
			?></div><?php

		?></div><?php // .wide
	?></div><?php // .m1-wrapper
	
	if (!get_theme_mod('disable_scroll_up', false)): 
		?><a class='scroll-up shad' href='#'><i class='fa fa-angle-up'></i></a><?php 
	endif; 
	
	?><div class='search-form-wrapper'><?php
		?><div class='search-form-overlay'></div><?php
		get_search_form(); 
	?></div><?php 
	wp_footer(); 
?></body></html><?php

