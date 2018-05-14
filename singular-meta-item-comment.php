<?php if ($p->args['show_comment']): 
	global $primary_comment_system;
	if ('wordpress' != $primary_comment_system) {
		add_filter('get_comments_number', 'magone_get_comments_number', 1, 2);
	}	
		
	?><a class="post-meta post-meta-comments" href="#comments"><?php
		?><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); 
	?></a><?php
	remove_filter('get_comments_number', 'magone_get_comments_number', 1);
endif;