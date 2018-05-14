<?php
function magone_shortcode_contact_display( $atts = array(), $content = "" ) {		
	return 
		'<div class="magone-contact-form shad white">'.
			apply_filters('sneeit_contact_form', array(
				'target_email' => $atts['target_email'],
				'enable_name' => true,
				'enable_url' => $atts['enable_url'],
				'class_submit' => 'bg shad',
				'id_form' => 'magone-simple-contact-form',
				'id_submit' => 'magone-simple-contact-form-submit',
				'label_name' => esc_html__('Name:', 'magone'),
				'label_email' => esc_html__('Email:', 'magone'),
				'label_url' => esc_html__('Website:', 'magone'),
				'label_content' => esc_html__('Content:', 'magone'),
				'label_submit' => esc_html__('Send Content', 'magone'),
				'message_successful' => esc_html__('We received your contact. Thank you!', 'magone'),
				'message_required_email' => esc_html__('The email is requried', 'magone'),
				'message_required_content' => esc_html__('The content is requried', 'magone'),
				'message_short_content' => esc_html__('Your content is too short to submit', 'magone'),				
			)).	
		'<div class="clear"></div></div>';	
}