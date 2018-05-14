<form role="search" action='<?php echo get_home_url() ?>' class='search-form' method='get'>
	<label class='search-form-label'><?php esc_html_e('Type something and Enter','magone'); ?></label>
	<input class='search-text' name='s' value="" type='text' placeholder="<?php esc_attr_e('Type something and Enter','magone'); ?>"/>
	<button class='search-submit' type='submit'><i class="fa fa-search"></i></button>
</form>