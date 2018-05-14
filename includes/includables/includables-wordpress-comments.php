<?php
function magone_wp_comment_form_default_fields($fields) {
	if (get_theme_mod('disable_wordpress_comment_url')) {
		unset($fields['url']);
	}
	return $fields;
}
add_filter( 'comment_form_default_fields', 'magone_wp_comment_form_default_fields' , 1, 1);


// comment design
if (!function_exists('magone_show_comment_items')) :
function magone_show_comment_items($comment, $args, $depth) {
	/*
	 * If the current post is protected by a password and the visitor has not yet
	 * entered the password we will return early without loading the comments.
	 */
	if ( post_password_required() ) {
		esc_html_e('Require password to view comments', 'magone');
		return;
	}
	
	$default_avatar = get_option('avatar_default');
	if (!$default_avatar) {
		$default_avatar = 'https://assets.tumblr.com/images/default_avatar_64.png';
	}
	
	$author_url = get_comment_author_url();
	if (!$author_url && $comment->comment_author_email) {
		$author = get_user_by('email', $comment->comment_author_email);		
		if ($author) {
			$author_url = get_author_posts_url($author->ID);
		}
	}
	$author_avatar = '<img alt="'.  esc_attr__('comment-avatar', 'magone').'" class="shad cir" src="'.esc_url($default_avatar).'">';
	$author_email = '';
	if (isset($comment->comment_author_email) && $comment->comment_author_email) {
		$author_email = $comment->comment_author_email;
	}
	$author_avatar = get_avatar($author_email, $depth == 1? 48:36, $default_avatar, esc_attr__('comment-avatar', 'magone'), array(
		'class' => 'shad cir'
	));
	$comment_link = get_comment_link();
		
	?>
	<li id="comment-<?php echo $comment->comment_ID; ?>" <?php comment_class(); ?>>
	<?php if ($author_url): ?>
		<a class="comment-avatar" href="<?php echo esc_url($author_url); ?>" target="_blank" rel="nofollow"><?php echo $author_avatar; ?></a>
	<?php else: ?>
		<span class="comment-avatar"><?php echo $author_avatar; ?></span>
	<?php endif; ?>
    
    <div class="comment-content">
        <div class="comment-header">
			<?php if ($author_url): ?>
				<a class="comment-name" href="<?php echo esc_url($author_url); ?>" target="_blank" rel="nofollow"><?php echo $comment->comment_author; ?></a>
			<?php else: ?>
				<span class="comment-name"><?php echo $comment->comment_author; ?></span>
			<?php endif; ?>

			<a class="comment-date" href="<?php echo esc_url($comment_link); ?>"><?php echo human_time_diff(strtotime($comment->comment_date)); ?></a>
		</div>
		<div class="comment-body content-template"><?php comment_text(); ?></div>
        <div class="comment-footer">
			<?php 
			comment_reply_link( wp_parse_args( $args, array( 'reply_text' => wp_kses(__('<span>Reply</span> <i class="fa fa-mail-forward"></i>','magone'), array('span'=>array(),'i'=>array('class'=>array()))), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
			?>
		</div>
    </div>
    <div class="clear"></div>
    <div class="comment-form-holder comment-form-holder-8266935611634654861"></div>


<?php
}
endif;
?>
	
<div class="wordpress-comments comments">
	<a class="wordpress-comments-title comments-title" href="javascript:void(0)" data-target=".wordpress-comments" data-comment_number="data:post.numComments">
		<?php 
		remove_filter('get_comments_number', 'magone_get_comments_number', 1);
		echo esc_html__('WORDPRESS:', 'magone').' <span class="color">'.  get_comments_number().'</span>'; 
		?>
	</a>
	
	<div class="wordpress-comments-inner comments-inner">
		<div class="wordpress-comments-holder comments-holder">
			<?php wp_list_comments( array( 'callback' => 'magone_show_comment_items' ) ); ?>
		</div>		
		<div class="wordpress-comment-footer">
			<?php 
			if ( comments_open() ) {
				comment_form(array(
					'class_submit' => 'shad bg'
				));
			} else {
				echo '<span class="noNewComments">'.esc_html__('Comments are closed', 'magone').'</span>';
			}
			?>
		</div>		
	</div>
	
	<?php
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h3 class="screen-reader-text section-heading"><?php esc_html_e('Comment navigation','magone'); ?></h3>
		<div class="nav-previous"><?php previous_comments_link( '&larr; ' . esc_html__('Older Comments','magone') ); ?></div>
		<div class="nav-next"><?php next_comments_link( esc_html__('Newer Comments','magone') . ' &rarr;' ); ?></div>
	</nav><!-- .comment-navigation -->
	<?php endif; // Check for comment navigation ?>

</div>