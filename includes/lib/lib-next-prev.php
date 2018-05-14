<?php
function magone_pagenav_singular() {
	if (get_adjacent_post(false, '', true) || get_adjacent_post(false, '', false)) :
	?>
		<div class="blog-pager">
			<?php if (get_adjacent_post(false, '', false)) : ?>
			<div class="blog-pager-item newer"><div class="blog-pager-item-inner">
				<div class="text"><?php esc_html_e('Newer Post','magone'); ?></div>
				<?php next_post_link('%link'); ?>
			</div></div>
			<?php endif;?>

			<?php if (get_adjacent_post(false, '', true)) : ?>
			<div class="blog-pager-item older"><div class="blog-pager-item-inner">
				<div class="text"><?php esc_html_e('Older Post','magone'); ?></div>
				<?php previous_post_link('%link'); ?>
			</div></div>
			<?php endif;?>
			<div class="clear"></div>
		</div>
	<?php

	endif;
}

function magone_pagenav_attachment() {	
	?>
		<div class="blog-pager">
			<div class="blog-pager-item newer"><div class="blog-pager-item-inner">				
				<?php previous_image_link( false, esc_html__('&larr; Previous Media', 'magone') ); ?>
			</div></div>

			<div class="blog-pager-item older"><div class="blog-pager-item-inner">
				<?php next_image_link( false, esc_html__('Next Media &rarr;','magone') ); ?>
			</div></div>
			
			<div class="clear"></div>
		</div>
		<div class="clear"></div>

	<?php
}