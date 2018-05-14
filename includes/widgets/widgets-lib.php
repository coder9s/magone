<?php

function magone_widget_common_header($class_names = array(), $instance = array(), $args = array()) {
	$no_title = '';
	if (!isset($instance['title']) || !$instance['title']) {
		$no_title = ' no-title';
	}
	echo '<div';
	if (!empty($args['widget_id'])) {
		echo ' id="'.$args['widget_id'].'"';
	}
	echo ' class="widget';
	if (is_array($class_names)) {
		foreach ($class_names as $class_name) {
			echo ' '.$class_name;
		}
	} else if ($class_names) {
		echo ' '.$class_names;
	}
	if (isset($instance['enable_tab']) && $instance['enable_tab']) {
		echo ' tab';
	}
	
	echo $no_title.'">';
	if (isset($instance['magone_before_title'])) {
		echo $instance['magone_before_title'];
	}
	if (!$no_title) {
		echo '<h2 class="widget-title">';
		if (!empty($instance['title_icon'])) {
			$title_icon = apply_filters('sneeit_get_font_awesome_tag', $instance['title_icon']);
			if ($title_icon) {
				echo $title_icon . ' ';
			}
			
		}
		echo $instance['title']. '</h2>';
	}
	echo '<div class="widget-content">';
}

function magone_widget_common_footer() {
	echo '</div><div class="clear"></div></div>';
}

function magone_set_widget_instance($instance, $widget_declaration) {	
	if (!isset($widget_declaration['fields'])) {
		return $instance;
	}
	foreach ($widget_declaration['fields'] as $key => $value) {
		if (!isset($instance[$key])) {
			if (isset($value['default'])) {
				$instance[$key] = $value['default'];
			}
			else {
				$instance[$key] = '';
			}
		}
	}
	return $instance;
}