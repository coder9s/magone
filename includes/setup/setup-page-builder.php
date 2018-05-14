<?php
function magone_setup_page_builder_admin_init(){
	do_action('sneeit_setup_page_builder', array(
		'nested' => true
	));
}
add_action('admin_init', 'magone_setup_page_builder_admin_init', 2);
