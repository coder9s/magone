<?php

// common field for article boxes
global $MagOne_Article_Common_Fields;
$MagOne_Article_Common_Fields = array(
	'title' => array(
		'label' => esc_html__('Title', 'magone'),
		'description' => esc_html__('Title of Block', 'magone'),
	),
	'title_url' => array(
		'label' => esc_html__('Title URL', 'magone'), 
		'description' => esc_html__('URL for Title of Block. Leave blank to use default', 'magone'),
		'type' => 'url'
	),
	'title_icon' => array(
		'label' => esc_html__('Title FontAwesome Icon Code', 'magone'), 
		'description' => wp_kses(
			sprintf(__('Example: fa-home. <a href="%s" target="_blank">Check Full List of Icon Codes Here</a>', 'magone'), esc_url('https://fortawesome.github.io/Font-Awesome/icons/')),
			array(
				'a' => array(
					'href' => array(),
					'target' => array()
				),					
			)
		)
	),
	'title_bg_color' => array(
		'label' => esc_html__('Title Background Color', 'magone'), 
		'description' => esc_html__('Leave blank to use transparent', 'magone'),
		'type' => 'color'
	),
	'title_text_color' => array(
		'label' => esc_html__('Title Text Color', 'magone'), 
		'description' => esc_html__('Leave blank to use default color', 'magone'),		
		'type' => 'color'
	),
	'title_border_bottom_color' => array(
		'label' => esc_html__('Title Border Bottom Color', 'magone'), 
		'description' => esc_html__('Leave blank to to hide', 'magone'),		
		'type' => 'color'
	),
	'main_color' => array(
		'label' => esc_html__('Main Color', 'magone'), 
		'description' => esc_html__('Select the main color of box', 'magone'),
		'type' => 'color', 
		'default' => ''
	),
	'thumb_bg_color' => array(
		'label' => esc_html__('Thumbnail Background Color', 'magone'), 
		'description' => esc_html__('Thumbnail background color', 'magone'),
		'type' => 'color', 
		'default' => ''
	),
	'enable_tab' => array(
		'label' => esc_html__('Connect as Tabs', 'magone'), 
		'description' => esc_html__('All consecutive blocks which were enabled this option will be grouped into a tab', 'magone'),
		'type' => 'checkbox', 
		'default' => false
	),
	'count' => array(
		'label' => esc_html__('Count', 'magone'), 
		'description' => esc_html__('Number of posts will be loaded', 'magone'),
		'type' => 'number', 
		'default' => 6
	),	
	'orderby' => array(
		'label' => esc_html__('Content Orderby', 'magone'), 		
		'type' => 'select', 
		'choices' => array(
			'latest' => esc_html__('Latest', 'magone'), 
			'random' => esc_html__('Random', 'magone'),			
			'comment' => esc_html__('Most Commented', 'magone'),
			'popular' => esc_html__('Popular (Most Viewed)', 'magone'),	
			'latest-review' => esc_html__('Latest Reviews', 'magone'),	
			'random-review' => esc_html__('Random Reviews', 'magone'),	
			'popular-review' => esc_html__('Popular (Highest) Reviews', 'magone'),			
		),
		'default' => 'latest'
	),
	'duration' => array(
		'label' => esc_html__('Date Range', 'magone'), 		
		'description' => esc_html__('Date range limit to load post from base on publish date', 'magone'),
		'type' => 'select', 
		'choices' => array(
			'all' => esc_html__('All Time', 'magone'),
			'year' => esc_html__('Last 365 days', 'magone'), 
			'month' => esc_html__('Last 30 days', 'magone'),			
			'week' => esc_html__('Last 7 days', 'magone'),						
		),
		'default' => 'all'
	),
	'show_view_all' => array(
		'label' => esc_html__('Show View All', 'magone'), 
		'description' => esc_html__('Show View All button. Uncheck to hide', 'magone'),
		'type' => 'checkbox', 
		'default' => true
	),
	'item_title' => array(
		'label' => esc_html__('Item Title', 'magone'), 
		'type' => 'select',
		'choices' => array(
			'in' => esc_html__('In Thumbnail', 'magone'), 
			'out' => esc_html__('Out of Thumbnail', 'magone'),			
			'none' => esc_html__('Not Display', 'magone'),			
		),
		'default' => 'in'
	),
	'cates' => array(
		'label' => esc_html__('Load from Categories', 'magone'),
		'description' => esc_html__('The categories that will be loaded posts from. Leave blank to load from all', 'magone'),
		'type' => 'categories'
	),
	'cate_scenario' => array(
		'label' => esc_html__('Category Scenario', 'magone'), 
		'description' => esc_html__('If you choose many categories to load, what relation between them?', 'magone'),
		'type' => 'select', 
		'default' => 'combination',
		'choices' => array(
//			'separate' => esc_html__('Separate (will display category list to switch)', 'magone'), 			
			'combination' => esc_html__('Combination (posts has one OR more above categories)', 'magone'), 			
			'intersection' => esc_html__('Intersection (posts has ALL above categories)', 'magone'), 
		),
	),	
	'exclude_cates' => array(
		'label' => esc_html__('Exclude Categories', 'magone'),
		'description' => esc_html__('The categories that will not be loaded posts from. Leave blank to load from all', 'magone'),
		'type' => 'categories'
	),
	'authors' => array(
		'label' => esc_html__('Load from Authors', 'magone'),
		'description' => esc_html__('The authors that will be loaded posts from. Leave blank to load from all', 'magone'),
		'type' => 'users'
	),
	'exclude_authors' => array(
		'label' => esc_html__('Exclude Authors', 'magone'),
		'description' => esc_html__('The authors that will not be loaded posts from. Leave blank to load from all', 'magone'),
		'type' => 'users'
	),
	'tags' => array(
		'label' => esc_html__('Load from Tags', 'magone'),
		'description' => esc_html__('The tags that will be loaded posts from. Leave blank to load from all', 'magone'),
		'type' => 'tags'
	),
	'ignore_sticky_posts' => array(
		'label' => esc_html__('Ignore Sticky Posts', 'magone'), 
		'description' => esc_html__('Do not move sticky posts to the start of the set', 'magone'),
		'type' => 'checkbox', 
		'default' => true
	),
	'exclude_loaded_posts' => array(
		'label' => esc_html__('Exclude Loaded Posts', 'magone'), 
		'description' => esc_html__('Do not get the loaded posts from previous blocks', 'magone'),
		'type' => 'checkbox', 
		'default' => false
	),	
	'show_comment' => array(
		'label' => esc_html__('Show Comment', 'magone'), 
		'description' => esc_html__('Show comment number. Uncheck to hide', 'magone'),
		'type' => 'checkbox', 
		'default' => true
	),
	'show_readmore' => array(
		'label' => esc_html__('Show Read More', 'magone'), 
		'description' => esc_html__('Show readmore link. Uncheck to hide', 'magone'),
		'type' => 'checkbox', 
		'default' => true
	),
	'show_author' => array(
		'label' => esc_html__('Show Author', 'magone'), 
		'description' => esc_html__('Show / hide author name in item detail', 'magone'),
		'type' => 'select', 
		'default' => 'icon',
		'choices' => array(
			'none' => esc_html__('Not show', 'magone'), 
			'name' => esc_html__('Show name only', 'magone'), 
			'icon' => esc_html__('Show name with icon', 'magone'), 
			'avatar' => esc_html__('Show name with avatar', 'magone')
		),
	),
	'show_date' => array(
		'label' => esc_html__('Show Date', 'magone'), 
		'description' => esc_html__('Show / hide date / time in item detail. The format will follow the site date time format', 'magone'),
		'type' => 'select', 
		'default' => 'date',
		'choices' => array(
			'none' => esc_html__('Not Show', 'magone'), 
			'full' => esc_html__('Date and Time', 'magone'), 
			'date' => esc_html__('Only Date', 'magone'), 
			'time' => esc_html__('Only Time', 'magone'), 
			'short' => esc_html__('Short Date Time', 'magone'), 
			'pretty' => esc_html__('Pretty Date Time', 'magone')
		)
	),
	'meta_item_order' => array(
		'label' => esc_html__('Meta Item Order', 'magone'), 
		'description' => esc_html__('Pick order for meta items: comment, date, author', 'magone'),
		'type' => 'select', 
		'default' => 'a_c_d',
		'choices' => array(
			'c_d_a' => esc_html__('Comment - Date - Author', 'magone'), 
			'c_a_d' => esc_html__('Comment - Author - Date', 'magone'), 
			'a_c_d' => esc_html__('Author - Comment - Date', 'magone'), 
			'a_d_c' => esc_html__('Author - Date - Comment', 'magone'), 
			'd_a_c' => esc_html__('Date - Author - Comment', 'magone'), 
			'd_c_a' => esc_html__('Date - Comment - Author', 'magone'), 					
		)
	),
	
	'show_format_icon' => array(
		'label' => esc_html__('Show Format Icon', 'magone'), 
		'description' => esc_html__('Show format icon when mouse hover an item of box', 'magone'),
		'type' => 'checkbox', 
		'default' => false
	),
	'show_review_score' => array(
		'label' => esc_html__('Show Review Score', 'magone'), 
		'description' => esc_html__('Show review score if have', 'magone'),
		'type' => 'checkbox', 
		'default' => false
	),
	'number_cates' => array(
		'label' => esc_html__('Number Categories', 'magone'), 
		'description' => esc_html__('Number categories name will be displayed in each item. Set to 0 to hide', 'magone'),
		'type' => 'range', 
		'max' => 4,
		'default' => 1
	),
	'snippet_length' => array(
		'label' => esc_html__('Snippet Length', 'magone'), 
		'description' => esc_html__('Snippet / excerpt length. Input 0 to hide', 'magone'),
		'type' => 'range', 
		'max' => 500,
		'default' => 150
	),
	'thumbnail_height' => array(
		'label' => esc_html__('Thumbnail Height', 'magone'), 
		'description' => esc_html__('Thumbnail image height. Set to 0 and the box will show image as natural height without cropping', 'magone'),
		'type' => 'range', 
		'max' => 800,
		'default' => 150
	),
	'pagination' => array(
		'label' => esc_html__('Pagination', 'magone'), 	
		'description' => esc_html__('Will not show if you did not ignore sticky posts', 'magone'), 	
		'type' => 'select', 
		'choices' => array(
			'' => esc_html__('None', 'magone'), 
			'number' => esc_html__('Number', 'magone'), 
			'loadmore' => esc_html__('Loadmore', 'magone'), 
			'nextprev' => esc_html__('Next / Previous', 'magone')
		),
		'default' => '',		
	),
	
	
	'rainbow_thumb_bg' => array(
		'label' => esc_html__('Show Rainbow Thumbnail Background Color', 'magone'), 
		'description' => esc_html__('Regardless the Thumbnail Background Color option, just using random colors instead', 'magone'),
		'type' => 'checkbox', 
		'default' => false
	),
);

global $MagOne_Article_Fields;
$MagOne_Article_Fields = array();

// slider
$MagOne_Article_Fields['slider'] = $MagOne_Article_Common_Fields;
$MagOne_Article_Fields['slider']['number_cates']['default'] = 0;
$MagOne_Article_Fields['slider']['snippet_length']['default'] = 0;
$MagOne_Article_Fields['slider']['show_nav'] = array(
	'label' => esc_html__('Show Navigate Buttons', 'magone'), 
	'description' => esc_html__('The arrow buttons which allow user navigate slides', 'magone'), 
	'type' => 'checkbox', 
	'default' => true
);
$MagOne_Article_Fields['slider']['show_dots'] = array(
	'label' => esc_html__('Show Dot Buttons', 'magone'), 
	'description' => esc_html__('The dot buttons which allow user navigate slides', 'magone'), 
	'type' => 'checkbox', 
	'default' => true
);
$MagOne_Article_Fields['slider']['speed'] = array(
	'label' => esc_html__('Speed', 'magone'), 
	'description' => esc_html__('The animate speed in miliseconds', 'magone'), 
	'type' => 'number',
	'default' => 5000
);
unset($MagOne_Article_Fields['slider']['rainbow_thumb_bg']);
unset($MagOne_Article_Fields['slider']['pagination']);
unset($MagOne_Article_Fields['slider']['item_title']);


$MagOne_Article_Fields['slider']['thumbnail_height']['default'] = 400;
$MagOne_Article_Fields['slider']['thumbnail_height']['min'] = 50;
$MagOne_Article_Fields['slider']['thumbnail_height']['description'] = esc_html__('Thumbnail Image Height. If the image not fit in thumbnail window, it will be cropped', 'magone');

// carousel
$MagOne_Article_Fields['carousel'] = $MagOne_Article_Fields['slider'];
$MagOne_Article_Fields['carousel']['column'] = array(
	'label' => esc_html__('Number Column', 'magone'), 
	'description' => esc_html__('Number column of carousel', 'magone'),
	'type' => 'range', 
	'min' => 1,
	'max' => 10,
	'default' => 2
);
$MagOne_Article_Fields['carousel']['thumbnail_height']['default'] = 215;
unset($MagOne_Article_Fields['carousel']['snippet_length']);
unset($MagOne_Article_Fields['carousel']['item_title']);

// ticker
$MagOne_Article_Fields['ticker'] = $MagOne_Article_Fields['carousel'];
$MagOne_Article_Fields['ticker']['thumbnail_height']['default'] = 50;
$MagOne_Article_Fields['ticker']['column']['default'] = 4;
unset($MagOne_Article_Fields['ticker']['show_dots']);
unset($MagOne_Article_Fields['ticker']['item_title']);
unset($MagOne_Article_Fields['ticker']['meta_item_order']);

// sticky
$MagOne_Article_Fields['sticky'] = $MagOne_Article_Common_Fields;
$MagOne_Article_Fields['sticky']['thumbnail_height']['default'] = 310;
$MagOne_Article_Fields['sticky']['count']['default'] = 4;
unset($MagOne_Article_Fields['sticky']['pagination']);

// complex
$MagOne_Article_Fields['complex'] = $MagOne_Article_Common_Fields;
$MagOne_Article_Fields['complex']['thumbnail_height']['default'] = 189;
$MagOne_Article_Fields['complex']['count']['default'] = 4;
unset($MagOne_Article_Fields['complex']['pagination']);

// one
$MagOne_Article_Fields['one'] = $MagOne_Article_Common_Fields;
$MagOne_Article_Fields['one']['thumbnail_height']['default'] = 370;

// two
$MagOne_Article_Fields['two'] = $MagOne_Article_Common_Fields;
$MagOne_Article_Fields['two']['thumbnail_height']['default'] = 300;
$MagOne_Article_Fields['two']['no_spacing'] = array(
	'label' => esc_html__('No Spacing', 'magone'), 
	'description' => esc_html__('Disable Spacing Between Items', 'magone'),
	'type' => 'checkbox', 
	'default' => false
);

// three
$MagOne_Article_Fields['three'] = $MagOne_Article_Common_Fields;
$MagOne_Article_Fields['three']['no_spacing'] = array(
	'label' => esc_html__('No Spacing', 'magone'), 
	'description' => esc_html__('Disable Spacing Between Items', 'magone'),
	'type' => 'checkbox', 
	'default' => false
);
// blogging
$MagOne_Article_Fields['blogging'] = $MagOne_Article_Common_Fields;
$MagOne_Article_Fields['blogging']['thumbnail_height']['default'] = 180;
unset($MagOne_Article_Fields['blogging']['item_title']);

// simple-one
$MagOne_Article_Fields['simple-one'] = $MagOne_Article_Common_Fields;
$MagOne_Article_Fields['simple-one']['thumbnail_height']['default'] = 200;
unset($MagOne_Article_Fields['simple-one']['pagination']);

// list
$MagOne_Article_Fields['list'] = $MagOne_Article_Common_Fields;
unset($MagOne_Article_Fields['list']['thumbnail_height']);
unset($MagOne_Article_Fields['list']['snippet_length']);
unset($MagOne_Article_Fields['list']['number_cates']);
unset($MagOne_Article_Fields['list']['thumb_bg_color']);
unset($MagOne_Article_Fields['list']['rainbow_thumb_bg']);
unset($MagOne_Article_Fields['list']['show_format_icon']);
unset($MagOne_Article_Fields['list']['item_title']);

$MagOne_Article_Fields['list']['show_index'] = array(
	'label' => esc_html__('Show Index', 'magone'), 
	'description' => esc_html__('Show index number before each item', 'magone'),
	'type' => 'checkbox', 
	'default' => false
);

// grid
$MagOne_Article_Fields['grid'] = $MagOne_Article_Common_Fields;
$MagOne_Article_Fields['grid']['count']['default'] = 4;
$MagOne_Article_Fields['grid']['thumbnail_height']['default'] = 400;
$MagOne_Article_Fields['grid']['number_cates']['default'] = 0;
$MagOne_Article_Fields['grid']['show_author']['default'] = '';
$MagOne_Article_Fields['grid']['show_comment']['default'] = '';
$MagOne_Article_Fields['grid']['show_date']['default'] = '';
$MagOne_Article_Fields['grid']['snippet_length']['default'] = 0;
$MagOne_Article_Fields['grid']['show_readmore']['default'] = '';
unset($MagOne_Article_Fields['grid']['item_title']);


global $Rainbow_Colors;
$Rainbow_Colors = array('#292484,#DC4225', '#81AF59,#A83279', '#417711,#DC4225',  '#E0BE00,#FD340F', '#D38312,#002F4B', '#A83279,#292484', '#002F4B,#417711');
// use this class inside LOOP only
class MagOne_Article_Item {
	var $id;
	var $link;
	var $title;
	var $title_attr;
	var $date;
	var $time;
	var $format;
	var $args;
	var $has_thumbnail;
	var $author_name;
	
	/* THIS FUNCTION RUN WHEN CREATE CLASS VARIABLE
	 * we will use this to get some basic thing that will be use in every methods
	 */
	function __construct($args = array()) {
		$this->id = get_the_ID();
		$this->link = get_permalink();
		$this->title = get_the_title();
		$this->title_attr = esc_attr($this->title);
		$this->date = get_the_date();
		$this->time = get_the_time();
		$this->format = get_post_format();
		$this->args = $args;
		$this->has_thumbnail = magone_get_post_img_src();

		// remake arguments
		if (!isset($this->args['show_date']) || !$this->args['show_date'] || $this->args['show_date'] == 'none') {
			$this->args['show_date'] = false;
		}
		if (!isset($this->args['show_author']) || !$this->args['show_author'] || $this->args['show_author'] == 'none') {
			$this->args['show_author'] = false;
		}
		if (!isset($this->args['meta_item_order'])) {
			$this->args['meta_item_order'] = 'a-c-d';
		}

		$this->args['show_review_score'] = (isset($this->args['show_review_score']) && $this->args['show_review_score']);
		
		$this->args['show_comment'] = (isset($this->args['show_comment']) && $this->args['show_comment'] && comments_open());
		$this->args['show_meta'] = ($this->args['show_date'] || $this->args['show_author'] || $this->args['show_comment']);
		$this->args['show_format_icon'] = (isset($this->args['show_format_icon']) && $this->args['show_format_icon']);
		if (!isset($this->args['snippet_length']) || !is_numeric($this->args['snippet_length'])) {
			$this->args['snippet_length'] = 150;
		}
		$this->args['snippet_length'] = (int) $this->args['snippet_length'];
		
		$this->args['show_readmore'] = (!empty($this->args['show_readmore']));
	}	
	
	function snippet($length = -1, $wrap = 'div') {
		if ($length = -1) {
			$length = 150;
			if (isset($this->args['snippet_length']) && is_numeric($this->args['snippet_length'])) {
				$length = (int) $this->args['snippet_length'];
			}
		}
		if ($length == 0) {
			return '';
		}
		
		return '<'.$wrap.' class="item-snippet">'. esc_html( magone_get_the_snippet( $length, true ) ) . '</'.$wrap.'>';
	}
	
	function format_icon($format = '') {
		$ret = '';
		if ($format == '') {
			$format = $this->format;
		}
		
		$ret .= ' <i class="fa post-format-icon fa-';
		switch ($format) {
			case 'aside':
				$ret .= 'plus-circle';
				break;

			case 'gallery':
				$ret .= 'picture-o';
				break;

			case 'link':
				$ret .= 'link';
				break;

			case 'image':
				$ret .= 'camera';
				break;

			case 'quote':
				$ret .= 'quote-left';
				break;

			case 'status':
				$ret .= 'send-o';
				break;

			case 'video':
				$ret .= 'film';
				break;

			case 'audio':
				$ret .= 'music';
				break;

			case 'chat':
				$ret .= 'commenting';
				break;

			default:
				// standard format
				$ret .= 'newspaper-o';
				break;
		}
		$ret .= '"></i>';
		return $ret;
	}
	
	/* size: thumbnail/medium/large/full, natural_thumbnail/medium/large/full
	 * link_wrap: true mean wrap by link, false mean image only
	 * format_icon: true: add post format icon, false: not add.
	 */
	function thumbnail($size = 'thumbnail', $inner = false, $default = true) {		
		$natural = false;
		
		if (strpos($size, 'natural-') !== false) {
			$size = str_replace('natural-', '', $size);
			$natural = true;
		}			
		$style = '';
		if (isset($this->args['thumbnail_height']) && $this->args['thumbnail_height'] && 
			is_numeric($this->args['thumbnail_height'])) {
			$style = 'sty'.'le="height: '.$this->args['thumbnail_height'].'px"';
		}
		if (magone_is_gpsi()) {
			$size = 'thumbnail';
		}
		
		// fix size of thumbnail to full from version 2.6
		// optimizer will work to display rigth image
		$size = 'full';
		
		
		$thumbnail = magone_get_post_image(
			$this->id, 
			$size, 
			array(
				'alt' => $this->title_attr, 
				'title' => $this->title_attr
			),
			$default
		);
		
		if (!$thumbnail) {
			if ($default) {
				$thumbnail = '<img src="'.esc_url(get_theme_mod('default_post_thumbnail')).'" alt="'.esc_attr($this->title_attr).'" title="'.esc_attr($this->title_attr).'"/>';
			} else {
				return '';
			}			
		}
		
		$ret = '<a '.$style.' href="'.esc_url($this->link).'" class="thumbnail '.($natural ? 'natural' : 'item').'-thumbnail">';
		
		
		
		$ret .= $thumbnail;
		if ($inner && $this->args['show_format_icon']) {
			$ret .= '<span class="item-icon"><span class="item-icon-inner">'.$this->format_icon().'</span></span>';
		}

		// // thumbnail background
		
		if (isset($this->args['rainbow_thumb_bg']) && ($this->args['rainbow_thumb_bg']))	{
			global $Rainbow_Colors;
			$color = $Rainbow_Colors[rand ( 0 , count($Rainbow_Colors) -1)];
			$colors = explode(',', $color);
			$first_color = $colors[0];
			$style = 'sty'.'le="background-color: '.$first_color.';'.
				'background-image: -webkit-linear-gradient(135deg,'.$color.');'.
				'background-image: -moz-linear-gradient(135deg,'.$color.');'.
				'background-image: -o-linear-gradient(135deg,'.$color.');'.
				'background-image: linear-gradient(135deg,'.$color.');"';
			$ret .= '<span '.$style.' class="thumbnail-overlay"></span>';				
		} else if (isset($this->args['thumb_bg_color']) && $this->args['thumb_bg_color'] && $this->args['thumb_bg_color'] != '#000000') {			
			$ret .= '<span class="thumbnail-overlay"></span>';
		}
		
		
		$ret .= '</a>';
		if (!$inner && $this->args['show_format_icon']) {
			$ret .= '<a href="'.esc_url($this->link).'" class="item-icon"><span class="item-icon-inner">'.$this->format_icon().'</span></a>';
		}

		return $ret;
	}
	
	// $wrap_tag = blank to unwrap by heading tags
	// $class only affect if has tag
	function title($wrap_tag = 'h3', $class = 'item-title') {		
		$ret = '';
		
		if ($wrap_tag && $wrap_tag != 'a') {
			$ret .= '<'.$wrap_tag.' class="'.esc_attr($class).'">';
		}
		
		$ret .= '<a href="'.esc_url($this->link).'" title="'. esc_attr($this->title_attr).'"';
		if ($wrap_tag == '' || $wrap_tag == 'a') {
			$ret .= ' class="'.esc_attr($class).'"';
		}
		$ret .= '>'.
				$this->review_score(). wp_kses($this->title, array()) . 
		'</a>';
			
		if ($wrap_tag && $wrap_tag != 'a') {
			$ret .= '</'.$wrap_tag.'>';
		}
		
		return $ret;
	}
	
	function cate($class = '', $current_cate_id = 1) {
		$ret = '';
		if (!$this->args['show_category']) {
			return $ret;
		}
		if ($current_cate_id == 1 && is_numeric($this->args['category'])) {
			$current_cate_id = (int) $this->args['category'];
		}
		$class = 'cate '.$class;
		$categories = get_the_category();
		if($categories){
			foreach($categories as $category) {
				// to make sure has as least 1 cat
				if ($ret == '') {
					$ret = '<a class="'.$class.'" href="'.esc_url(get_category_link( $category->term_id )).'" title="' . esc_attr($category->cat_name) . '">' . 
							esc_html( $category->cat_name) . 
							'</a>';
				}
				
				// if has a cat different with box title cat, pick it
				if (((int) $category->term_id) != ((int)$current_cate_id)) {
					$ret = '<a class="'.esc_attr($class).'" href="'.esc_url(get_category_link( $category->term_id )).'" title="' . esc_attr($category->cat_name) . '">' . 
							esc_html( $category->cat_name ) .
							'</a>';
					break;
				}
			}
		}
		if (!$ret) {
			$ret = $backup_ret;
		}
		return $ret;
	}
	
	function cates($cate_class = 'cate-item') {
		$ret = '';
		if (!isset($this->args['number_cates'])) {
			return '';
		}
		if (!$this->args['number_cates']) {
			return '';
		}
		if (!is_numeric($this->args['number_cates'])) {
			return '';
		}
		$cate_count = (int) $this->args['number_cates'];

		$categories = get_the_category();
		if (empty($categories)) {
			return $ret;
		}
		
		$current_cate_ids = $this->args['current_cate_ids'];
		if (!is_array($current_cate_ids)) {
			$current_cate_ids = array();
		}
		
		// show categories that not in current cates
		$count = 0;
		for ($i = 0; $i < count($categories) && $count < $cate_count; $i++) {
			$cate = $categories[$i];
			if (!in_array($cate->term_id, $current_cate_ids)) {
				continue;
			}
			$count++;
			if ($ret) {
				$ret .= '<span>, </span>';
			}
			$ret .= '<a href="'.esc_url(get_category_link( $cate->term_id )).'">' .	
					esc_html( $cate->name ) . 
					'</a>';
		}
			
		
		// if not enough, add current cate to
		if ($count < $cate_count) {
			for ($i = 0; $i < count($categories) && $count < $cate_count; $i++) {
				$cate = $categories[$i];
				if (in_array($cate->term_id, $current_cate_ids)) {
					continue;
				}
				$count++;
				if ($ret) {
					$ret .= '<span>, </span>';
				}
				$ret .= '<a href="'.esc_url(get_category_link( $cate->term_id )).'">' . 
						esc_html( $cate->name ) .
						'</a>';
			}	
		}
		
		if ($ret) {
			$ret = '<div class="bg item-labels">'.$ret.'</div>';
		}
		
		return $ret;
	}
	
	function review_score() {

		$ret = '';
		if (!$this->args['show_review_score']) {
			return $ret;
		}
		$post_id = $this->id;
		$post_review_average_scale_score = get_post_meta($post_id, MAGONE_META_KEY_POST_REVIEW_AVERAGE, true);	
		$post_review_type = get_post_meta($post_id, 'post-review-type', true);
		
		if (!$post_review_average_scale_score || !$post_review_type) {
			return $ret;
		}		
		
		// backward scale
		$ret = '<span class="item-review"><i class="color fa fa-';
		if ('star' == $post_review_type) {
			$post_review_average_score = $post_review_average_scale_score * 5 / 100;
			$ret .= 'star';
		} else {
			$post_review_average_score = $post_review_average_scale_score * 10 / 100;			
			$ret .= 'circle';
		}
		
		$ret .= '"></i> <b>'. number_format($post_review_average_score, 1).'</b></span>';
		
		
		
		return $ret;
	}
	
	function views() {
		$ret = '';
		if (!isset($this->args['show_view_count'])) {
			return $ret;
		}
                if (!$this->args['show_view_count']) {
                    return;
                }
		$key = 'post_views_count';
		if (get_theme_mod('view_count_key')) {
			$key = get_theme_mod('view_count_key');
		}
		$views = get_post_meta($this->id, $key, true);
		if ($views) {
			$ret = ' <span class="views meta-item"><i class="fa fa-eye"></i> <span>'.$views.'</span></span><div class="clear"></div>';
		}
		return $ret;
	}
	
	function author() {	
		$ret = '';

		if (!$this->args['show_author']) {
			return '';
		}
		
		$id = get_the_author_meta('ID');
		$name = get_the_author_meta( 'display_name' );
		$avatar = get_avatar($id, 16, '', sprintf(esc_attr__("%s 's Author avatar", 'magone'), $name));
		
		if ($this->args['show_author'] == 'avatar' && $avatar) {
			$ret .= $avatar;// avatar from database
		} else if ($this->args['show_author'] == 'icon') {
			$ret .= '<i class="fa fa-pencil-square-o"></i>';
		}

		$ret .= ' <span>' . esc_html( $name ) . '</span>';

		return ('<a href="'.esc_url(get_author_posts_url($id)).'" target="_blank" class="meta-item meta-item-author">'.$ret.'</a>');
	}
	
	function comments() {
		if (!$this->args['show_comment']) {
			return '';
		}
		global $primary_comment_system;
		if ('wordpress' != $primary_comment_system) {
			add_filter('get_comments_number', 'magone_get_comments_number', 1, 2);
		}
		$comment_number = get_comments_number();		
		remove_filter('get_comments_number', 'magone_get_comments_number', 1);
		
		return '<a class="meta-item meta-item-comment-number" href="'.esc_url(get_comments_link()).'"><i class="fa fa-comment-o"></i> <span>' .$comment_number. '</span></a>';
	}
	
	/* type: date/short_date/time/date_time
	 */
	function date_time() {		
		if (!$this->args['show_date']) {
			return '';
		}

		$ret = '<a class="meta-item meta-item-date" href="'.esc_url($this->link).'"><i class="fa fa-clock-o"></i> <span>';

		switch ($this->args['show_date']) {
			case 'pretty':
				$ret .= sprintf( esc_html__( '%s ago', 'magone' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );
				break;

			case 'short':
				if (get_option('date_format')) {
					$ret .= get_the_date(str_replace('F', 'M', get_option('date_format')));
				}
				break;
				
			case 'time':
				$ret .= $this->time;
				break;

			case 'date':
				$ret .= $this->date;
				break;
			
			default:
				$ret .= $this->date.' '.$this->time;
				break;
		}
		$ret .= '</span></a>';
		
		return $ret;
	}
	
	
	
	function meta() {
		$ret = '';
		if (!$this->args['show_meta']) {
			return '';
		}
		

		$ret = explode('_', $this->args['meta_item_order']);
		for ($i = 0; $i < count($ret); $i++) {
			if ($ret[$i] == 'a') {
				$ret[$i] = $this->author();
			} else if ($ret[$i] == 'c') {
				$ret[$i] = $this->comments();
			} else if ($ret[$i] == 'd') {
				$ret[$i] = $this->date_time();
			}
		}

		return ('<div class="meta-items">'. implode('', $ret) .'</div>');
	}
	function readmore() {
		if ($this->args['show_readmore']) {			
			return '<div class="item-readmore-wrapper"><a class="item-readmore" href="'.esc_url($this->link).'#more">'.esc_html__('Read More', 'magone').'</a></div>';
		}
		return '';
	}

	function item_class ($i = 0, $extra = '') {	
		$item_class = 'shad item item-'.$i;
		if ($i % 2 == 0) {
			$item_class .= ' item-two';
		}
		if ($i % 3 == 0) {
			$item_class .= ' item-three';
		}
		if ($i % 4 == 0) {
			$item_class .= ' item-four';	
		}
		for ($j = 1; $j <= $i; $j++) {
			$item_class .= ' than-'.($j-1);
		}
		return (' class="'.$item_class.$extra.'"');
	}
}



// show article boxes
global $MagOne_Article_Box_Loaded_Posts;
$MagOne_Article_Box_Loaded_Posts = array();
function magone_article_box_content($widget_id, $type = '', $atts = array(), $content = '', $cate_ids = array(), $cates = array()) {		
	$atts['current_cate_ids'] = $cate_ids;
	if ($widget_id != 'magone-archive-blog-rolls') {
		$query_args = array();
		global $MagOne_Article_Box_Loaded_Posts;
		
		// Preparing query arguments to load
		
		$query_args['post_type'] = 'post';
		$query_args['post_status'] = 'publish';
		$query_args['posts_per_page'] = (int) $atts['count'];
		if (isset($atts['paged'])) {
			$query_args['paged'] = (int) $atts['paged'];
		}

		if ($atts['ignore_sticky_posts']) {
			$query_args['ignore_sticky_posts'] = true;		
		}
		
		if ($widget_id != 'ajax') {			
			if ($atts['exclude_loaded_posts'] && count($MagOne_Article_Box_Loaded_Posts)) {
				$query_args['post__not_in'] = $MagOne_Article_Box_Loaded_Posts;				
			}
		} else {
			if ($atts['exclude_loaded_posts'] && isset($atts['post__not_in'])) {
				$query_args['post__not_in'] = $atts['post__not_in'];
			}
		}

		/* arguments for categories */
		if (count($cate_ids)) {
			if ($atts['cate_scenario'] == 'combination') {
				$query_args['category__in'] = $cate_ids;
			} else if ($atts['cate_scenario'] == 'intersection') {
				$query_args['category__and'] = $cate_ids;
			} else {
				$query_args['cat'] = $cate_ids[0];
			}
		}
		if ($atts['exclude_cates']) {
			if (is_string($atts['exclude_cates'])) {
				$atts['exclude_cates'] = explode(',', $atts['exclude_cates']);
				foreach ($atts['exclude_cates'] as $key => $value) {
					$atts['exclude_cates'][$key] = (int) $value;
				}
			}			
			$query_args['category__not_in'] = $atts['exclude_cates'];			
		}
		
		$view_meta_key = get_theme_mod('view_count_meta_key_name', MAGONE_META_KEY_VIEWS);
		
		if ('popular' == $atts['orderby']) {
			$query_args['meta_key'] = $view_meta_key;
			$query_args['orderby'] = 'meta_value_num';
		} 
		elseif ('comment' == $atts['orderby']) {
			$query_args['orderby'] = 'comment_count';
		} 
		elseif ('random' == $atts['orderby']) {
			$query_args['orderby'] = 'rand';
		} 
		elseif ('latest-review' == $atts['orderby']) {
			$query_args['meta_key'] = MAGONE_META_KEY_POST_REVIEW_AVERAGE;
		} 
		elseif ('random-review' == $atts['orderby']) {
			$query_args['meta_key'] = MAGONE_META_KEY_POST_REVIEW_AVERAGE;
			$query_args['orderby'] = 'rand';
		} 
		elseif ('popular-review' == $atts['orderby']) {
			$query_args['meta_key'] = MAGONE_META_KEY_POST_REVIEW_AVERAGE;
			$query_args['orderby'] = 'meta_value_num';
		}

		if ($atts['tags']) {			
			if (is_string($atts['tags'])) {
				$atts['tags'] = explode(',', $atts['tags']);
			}
			$query_args['tag__in'] = $atts['tags'];
		}
		

		if ($atts['authors']) {
			if (is_string($atts['authors'])) {
				$atts['authors'] = explode(',', $atts['authors']);
			}
			$query_args['author__in'] = $atts['authors'];
		}

		if ($atts['exclude_authors']) {
			if (is_string($atts['exclude_authors'])) {
				$atts['exclude_authors'] = explode(',', $atts['exclude_authors']);
			}
			$query_args['author__not_in'] = $atts['exclude_authors'];
		}
		
		// since 3.3
		if (isset($atts['duration'])) {
			if ('year' == $atts['duration']) {//1 year ago
				$query_args['date_query'] = array(
					array(
						'column' => 'post_date_gmt',
						'after' => '1 year ago',
					)
				);
				
			} else if ('month' == $atts['duration']) {//1 month ago
				$query_args['date_query'] = array(
					array(
						'column' => 'post_date_gmt',
						'after' => '1 month ago',
					)				
				);
			} else if ('week' == $atts['duration']) {//1 week ago
				$query_args['date_query'] = array(
					array(
						'column' => 'post_date_gmt',
						'after' => '1 week ago',
					)
				);
			}
		}
		
		// loading entries	
		$entries = new WP_Query( $query_args );			
	} 
	// if this is archive page, use global query
	else {
		global $wp_query;
		$entries = $wp_query;
	}
	

	
	if ($widget_id != 'ajax' && isset($atts['pagination']) && $atts['pagination']) {
		$atts['max_num_pages'] = $entries->max_num_pages;
		$atts['found_posts'] = $entries->found_posts;
		if ($atts['exclude_loaded_posts'] && count($MagOne_Article_Box_Loaded_Posts)) {
			$atts['post__not_in'] = $MagOne_Article_Box_Loaded_Posts;
		}
		wp_localize_script( 'magone-main', 'Atts_'.$widget_id, $atts);
	}
	
	$entry_length = 0;
	if (isset($entries->posts) && is_array($entries->posts)) {
		$entry_length = count($entries->posts);
	}

	// widget content
	$ret = '';
	$ret_0 = '';
	$ret_1 = '';
	$ret_2 = '';
	$ret_3 = '';
	$page_total = 1;
	$page_first = $entry_length;
	$page_other = 0;
	$ret_mobile = '';
		
	if ($type == 'grid') {
		// find page information for GRID widget
		if ($entry_length > 5) {
			$page_total = ceil($entry_length / 5);
			for ($page_other = 5; $page_other >= 1; $page_other-=1) { // use this if want other pages always crowder than first page
				$page_first = $entry_length - ($page_total - 1) * $page_other;
				if (abs($page_first - $page_other) <= 2) {
					break;
				}
			}
		}
		if ($page_other > 5) {
			$page_other = 5;
			$page_first = $entry_length - $page_total * $page_other;	
		}
	}
	
	if ( ! isset( $atts['item_title'] )  || ! $atts['item_title'] ) {
		$atts['item_title'] = 'in';
	}


	// fill widget content with items
	$i = 0;	
	if ($entries->have_posts()) :		
		while ( $entries->have_posts() ) : $entries->the_post();
			$e = new MagOne_Article_Item($atts);
			global $MagOne_Article_Box_Loaded_Posts;
			if ($MagOne_Article_Box_Loaded_Posts == null) {
				$MagOne_Article_Box_Loaded_Posts = array();
			}
			if (is_array($MagOne_Article_Box_Loaded_Posts)) {
				array_push($MagOne_Article_Box_Loaded_Posts, $e->id);
			}
			$thumb_size = 'full';
			switch ($type) {
				case 'slider':
					$slider_item = '<div class="item slider-item slider-item-'.$i.'"><div class="slider-item-inner">'
						. 		$e->thumbnail('full')
						.		'<div class="slider-item-content">'
						.			$e->cates()
						.			$e->meta()
						.			$e->title();
					if ($e->args['snippet_length'] || $e->args['show_readmore']) {
					$slider_item .= '<div class="slider-item-sub">'
						. 			$e->snippet(-1, 'span')
						. 			$e->readmore()
						. '</div>';
					}
					$slider_item .= ''
						. 		'</div>' /*slider-item-content*/
						. '</div></div>';/* slide-item and inner */
					
					if ( is_rtl() ) {						
						$ret = $slider_item . $ret;
					} 
					else {
						$ret .= $slider_item;
					}
					break;

				case 'sticky':					
					if ($i != 1 && $i != 2 && $i != 3 && isset($e->args['thumbnail_height']) && ($e->args['thumbnail_height'] == 'auto' || $e->args['thumbnail_height'] == 0)) {
						$thumb_size = 'natural-medium';
					}
					if ($i == 4) {
						$ret .= '<div class="clear"></div>';
					}
					$ret .= '<div '.$e->item_class($i, ($i >= 4)?' item-extra':'').'>'
						. 		'<div class="item-main">'
						.			$e->thumbnail($thumb_size)
						.			'<div class="item-content'. ( $atts['item_title'] == 'in' ? ' gradident' : '' ) . '">'
						.				$e->cates()
						.				( $atts['item_title'] == 'in' ? $e->title() : '' )
						.			'</div>'
						.		'</div>';
					if ( $i == 0 && 
						 ( $e->args['snippet_length'] || 
						   $e->args['show_meta']
						 ) ||
						 $atts['item_title'] == 'out'
						) {
						$ret .= '<div class="item-sub bg">' . 
									( $atts['item_title'] == 'out' ? $e->title() : '' ) .
									( $i == 0 ? $e->snippet() : '' ). 
									( $i == 0 ? $e->meta() : '' ) . 
								'</div>';
					}
					$ret .= '</div>';
					break;

				case 'complex':	
					if ($i == 0 && isset($e->args['thumbnail_height']) && ($e->args['thumbnail_height'] == 'auto' || $e->args['thumbnail_height'] == 0)) {
						$thumb_size = 'natural-medium';
					}
					if ($i % 2 == 0 && $i >= 4) {
						$ret .= '<div class="clear"></div>';
					}
					$ret .= '<div '.$e->item_class($i, ($i >= 4)?' item-extra':'').'>'
						. 		'<div class="item-main">'
						.			($i == 0? $e->thumbnail($thumb_size) : '')
						.			'<div class="item-content'. ( 0 == $i && $atts['item_title'] == 'in' ?' gradient':'').'">'
						.				$e->cates()
						.				( $i || 'in' == $atts['item_title'] ? $e->title() : '' )
						.			'</div>'
						.		'</div>';
					if ($i == 0 && ($e->args['snippet_length'] || $e->args['show_meta'] || 'out' == $atts['item_title'])) {
						$ret .= '<div class="item-sub">' . 
								( 'out' == $atts['item_title'] ? $e->title() : '' ) .
								$e->snippet() . $e->readmore(). $e->meta()	. '</div>';
					}
					$ret .= '</div>';
					break;
					
				case 'simple-one':
					if (isset($e->args['thumbnail_height']) && ($e->args['thumbnail_height'] == 'auto' || $e->args['thumbnail_height'] == '0')) {
						$thumb_size = 'natural-medium';
					}
					$ret .= '<div '.$e->item_class($i, $i>0?' item-extra': '').'>'
							. 		'<div class="item-main">'
							.			($i==0?$e->thumbnail($thumb_size):'')
							.			'<div class="item-content'. ( 0 == $i && $atts['item_title'] == 'in' ?' gradient':'').'">'
							.				$e->cates()
							.				( $i || 'in' == $atts['item_title'] ? $e->title() : '' )
							.			'</div>'
							.		'</div>';
					if ($i == 0 && ($e->args['snippet_length'] || $e->args['show_meta'] || 'out' == $atts['item_title'])) {
						$ret .= 	'<div class="item-sub">' 
							.	( 'out' == $atts['item_title'] ? $e->title() : '' )
							. 		$e->snippet() . $e->readmore() . $e->meta()	
							. 	'</div>'
							. 	'<div class="clear"></div>';
					}
					$ret .= '</div>';// end item
					break;
				
				case 'carousel':
					$carousel_item = '<div class="item carousel-item carousel-item-' . $i . '"><div class="carousel-item-inner">'
						. 		$e->thumbnail('full')
						.		'<div class="carousel-item-content">'
						.			$e->cates()
						.	 		$e->title()
						. 		'</div>' /*carousel-item-content*/
						. '</div></div>';/* carousel-item and inner */			
					if ( is_rtl() ) {						
						$ret = $carousel_item . $ret;
					} 
					else {
						$ret .= $carousel_item;
					}
					break;
					
				case 'blogging':
					$e->has_thumbnail = magone_get_post_img_src( $e->id, 'thumbnail' );
					$thumb_size = 'full';
					if ($i == 0 && isset($e->args['thumbnail_height']) && ($e->args['thumbnail_height'] == 'auto' || $e->args['thumbnail_height'] == 0)) {
						$thumb_size = 'natural-medium';
					}

					$ret .= '<div '.$e->item_class($i, (!$e->has_thumbnail)?' no-thumbnail': '').'>'
						.		(($e->has_thumbnail)? $e->thumbnail($thumb_size, true):'')
						.		'<div class="item-content">'
						.			$e->cates()
						.			$e->title()
						.			$e->meta()
						.			'<div class="item-sub">' . $e->snippet() . $e->readmore() .	'</div>'
						.			'<div class="clear"></div>'
						.		'</div><div class="clear"></div>'/*end item content*/
						.	'</div>'; // end item
					
					break;

				case 'one':
					if (isset($e->args['thumbnail_height']) && ($e->args['thumbnail_height'] == 'auto' || $e->args['thumbnail_height'] == 0)) {
						$thumb_size = 'natural-full';
					}
					
					$ret .= '<div '.$e->item_class($i).'>'
						. 		'<div class="item-main">'
						.		$e->thumbnail($thumb_size)
						.			'<div class="item-content'. ( $atts['item_title'] == 'in' ? ' gradident' : '' ) . '">'
						.				$e->cates()
						.				( $atts['item_title'] == 'in' ? $e->title() : '' )
						.			'</div>'
						.		'</div>';
					if ( $e->args['snippet_length'] || 
						 $e->args['show_meta'] || 
						 $e->args['show_readmore'] || 
						 'out' == $atts['item_title'] ) {
						$ret .= 	'<div class="item-sub">' .
								( 'out' == $atts['item_title'] ? $e->title() : '' )
							. 		$e->meta() . $e->snippet() . $e->readmore()	
							. 	'</div>'
							. 	'<div class="clear"></div>';
					}
					$ret .= '</div>';// end item				
					
					break;

				case 'two':
					if (isset($e->args['thumbnail_height']) && ($e->args['thumbnail_height'] == 'auto' || $e->args['thumbnail_height'] == '0')) {
						$thumb_size = 'natural-medium';
					}
					$ret = '<div '.$e->item_class($i).'>'
							. 		'<div class="item-main">'
							.			$e->thumbnail($thumb_size)
							.			'<div class="item-content'. ( $atts['item_title'] == 'in' ? ' gradident' : '' ) . '">'
							.				$e->cates()
							.				( $atts['item_title'] == 'in' ? $e->title() : '' )
							.			'</div>'
							.		'</div>';
					if ( $e->args['snippet_length'] || 
						 $e->args['show_date'] || 
						 $e->args['show_comment'] || 
						 $e->args['show_readmore'] || 
						 'out' == $atts['item_title'] ) {
						$ret .= '<div class="item-sub">' .
								( 'out' == $atts['item_title'] ? $e->title() : '' )
							. 		$e->snippet() . $e->readmore() . $e->meta()
							. 	'</div>'
							. 	'<div class="clear"></div>';
					}
					$ret .= '</div>';// end item

					if ($i % 2) {
						$ret_2 .= $ret;
					} else {
						$ret_1 .= $ret;
					}
					$ret_mobile .= $ret;
					$ret_0 .= $ret;
					if ($i % 2 == 1) {
						$ret_0 .= '<div class="clear"></div>';
					}
					break;
					
				case 'three':
					if ($e->args['thumbnail_height'] == 'auto' || $e->args['thumbnail_height'] == 0) {
						$thumb_size = 'natural-medium';
					}

					$ret = '<div '.$e->item_class($i).'>'
						. 		'<div class="item-main">'
						.			$e->thumbnail($thumb_size)
						.			'<div class="item-content'. ( $atts['item_title'] == 'in' ? ' gradident' : '' ) . '">'
						.			$e->cates() 
						.			( $atts['item_title'] == 'in' ? $e->title() : '' )
						.		'</div>'
						.	'</div>';
					if ($e->args['snippet_length'] || $e->args['show_meta'] || $e->args['show_readmore'] || 'out' == $atts['item_title']) {
						$ret .= '<div class="item-sub">' . ( 'out' == $atts['item_title'] ? $e->title() : '' ) . $e->snippet() . $e->readmore() . $e->meta() . '</div>';
					}
					$ret .= '</div>';

					if ($i % 3 == 0) {
						$ret_1 .= $ret;
					} else if ($i % 3 == 1) {
						$ret_2 .= $ret;
					} else {
						$ret_3 .= $ret;
					}
					$ret_mobile .= $ret;
					$ret_0 .= $ret;
					if ($i % 3 == 2) {
						$ret_0 .= '<div class="clear"></div>';
					}
					break;


				case 'ticker':										
					if (isset($e->args['thumbnail_height']) && ($e->args['thumbnail_height'] == 'auto' || $e->args['thumbnail_height'] == '0')) {
						$thumb_size = 'natural-thumbnail';
					}
					$ticker_item = '<div class="ticker-item carousel-item-'.$i.'"><div class="ticker-item-inner">'
						. 		$e->thumbnail($thumb_size)
						.		'<div class="ticker-item-content">'
						.			$e->cates()
						.	 		$e->title()
						. 		'</div>' /*ticker-item-content*/
						. '</div></div>';/* ticker-item and inner */
					
					if ( is_rtl() ) {						
						$ret = $ticker_item . $ret;
					} 
					else {
						$ret .= $ticker_item;
					}
					
					break;

				case 'grid':
					$page_current = 0;					
					if ($i >= $page_first) {
						$page_current = ceil(($i + 1 - $page_first) / $page_other);
					}
					$start_index = 0;
					if ($page_current >= 1) {
						$start_index = ($page_current - 1) * $page_other + $page_first;
					}
					$page_layout = ($page_current == 0 ? $page_first : $page_other);
					$page_type = ($page_current % 2 ? 'odd' : 'even');
					$start_next_sub_index = ($page_type == 'even' ? ($start_index + 1) : ($start_index + $page_layout - 1));
								
					if ($i == $start_index) {
						// close previous page and its end sub
						if ($i > 0) {
							$ret .= '<div class="clear"></div></div><div class="clear"></div></div>';
						}

						// and open a new page										
						$ret .= '<div class="grid-page">';

						// also open the first sub page
						$sub_style = '';
						if (isset($e->args['thumbnail_height']) && is_numeric($e->args['thumbnail_height'])) {
							$sub_style .= ' sty'.'le="height:'.$e->args['thumbnail_height'].'px"';
						}			
						$ret .= '<div class="grid-sub grid-sub-'.($entry_length == 1? 'full' : ($page_type == 'even' ? 'wide' : 'narrow')).' grid-sub-'.($page_type == 'even' ? 1 : ($page_layout - 1)).'"'.$sub_style.'>';				
						
					} 

					// determine if it's started of next sub-page
					$start_sub_index = $start_index;

					if ($i == $start_next_sub_index) {
						$ret .= '<div class="clear"></div></div>';					

						// start new sub
						$sub_style = '';
						if (isset($e->args['thumbnail_height']) && is_numeric($e->args['thumbnail_height'])) {
							$sub_style .= ' st'.'yle="height:'.$e->args['thumbnail_height'].'px"';
						}						
						$ret .= '<div class="grid-sub grid-sub-'.($entry_length == 1? 'full' : ($page_type == 'even' ? 'narrow' : 'wide')).' grid-sub-'.($page_type == 'even' ? ($page_layout - 1) : 1).'"'.$sub_style.'>';					
					}
					if ($i >= $start_next_sub_index) {
						$start_sub_index = $start_next_sub_index;
					}
					
					// add item to grid page
					$ret .= '<div class="item grid-item grid-item-'.$i.' grid-sub-item-'.($i - $start_sub_index).'"><div class="grid-item-inner">'
						. 		$e->thumbnail('full')
						.		'<div class="grid-item-content item-content gradient">'
						.			$e->cates()
						.			$e->meta()
						.			$e->title()
						. 			$e->snippet()
						. 			$e->readmore()
						. 		'</div>' /*grid-item-content*/
						. '</div></div>';/* grid-item and inner */
					
					if ($i == $entry_length - 1) {
						// close sub-page and last page
						$ret .= '<div class="clear"></div></div><div class="clear"></div></div>';	
					}
					break;

				case 'list':
					$ret .= '<div '.$e->item_class($i, ' table').'>'.
						'<div class="tr">'.
							($e->args['show_index']? '<div class="td item-index">'.($i+1).'.</div>':'').
							'<div class="td">'.
								'<h3 class="item-title">'.									
										($e->args['show_author']? $e->author(). ': ' : '') .
										'<a href="'.esc_url($e->link).'"><span class="title-name">'.$e->review_score().  wp_kses($e->title, array()).'</span></a>'.
										($e->args['show_comment']? ' <a class="meta-item meta-item-comment-number" href="'.esc_url(get_comments_link()).'"><i class="fa fa-comment-o color"></i> <span class="color">' .get_comments_number(). '</span></a>': '').
								'</h3>'.
								($e->args['show_date']? ('<span class="meta-item meta-item-date">'.$e->date_time().'</span>'):'').
							'</div>'.
							($e->args['show_readmore']? 
							'<div class="td item-readmore">'.
								'<a href="'.esc_url($e->link).'#more"><i class="fa fa-angle-right"></i></a>'.
							'</div>':'').
						'</div>'.
					'</div><div class="clear"></div>';
					break;

				default:
					break;
			}
			$i++;
			if ($widget_id != 'magone-archive-blog-rolls' && $i >= (int) $atts['count']) {
				break;
			}
		endwhile;
		
		// pre-made content
		if ($type == 'two') :
			if (isset($atts['thumbnail_height']) && !$atts['thumbnail_height']) {
				$ret = '<div class="two-col two-col-left col-1">'. $ret_1 . '</div>'
					. '<div class="two-col two-col-right col-2">'	. $ret_2 . '</div>'
					. '<div class="two-col-mobile mobile">'. $ret_mobile . '</div>';
			} else {
				$ret = $ret_0;
			}
		endif;
		if ($type == 'three') :
			if (isset($atts['thumbnail_height']) && !$e->args['thumbnail_height']) {
				$ret = '<div class="three-col col-1">'. $ret_1 . '</div>'
					. '<div class="three-col col-2">'. $ret_2 . '</div>'
					. '<div class="three-col col-3">'. $ret_3 . '</div>'
					. '<div class="three-col-mobile mobile">'. $ret_mobile . '</div>';
			} else {
				$ret = $ret_0;
			}
		endif;
		
	else:
		$ret = esc_html__('Not found any post', 'magone');
	endif;
	wp_reset_postdata();
	return $ret;
}

function magone_article_box_style($widget_id, $type = '', $atts = array(), $content = '') {
	$style = '';
	$wid = '#'.$widget_id;
	
	if (isset($atts['main_color']) && $atts['main_color'] && $atts['main_color'] != 'false') {
		// common style
		$style .= 
		$wid.' a,'.
		$wid.' .color {color: '.$atts['main_color'].'}'.
		$wid.' .border,'.
		$wid.' a.feed-widget-pagination-button:hover {color: white}'.
		$wid.' a.feed-widget-pagination-button.active:hover {color: '.$atts['main_color'].'}'.
		
		$wid.' .bg,'.
		$wid.'.box-title h2.widget-title,'.
		($type=='slider'? $wid.' .slider-item .item-readmore:hover,': '').
		($type=='grid'? $wid.' .grid-item .item-readmore:hover,': '').
		$wid.' .owl-dot.active {background: '.$atts['main_color'].'}'.
		
		$wid.'.box-title h2.widget-title a,'.
		$wid.' .item-labels a,'.
		$wid.' .item-title a,'.
		$wid.' .meta-item,'.
		$wid.' .feed-widget-labels a'.
		($type=='slider'? ', '.$wid.' .slider-item .item-readmore': '').
		($type=='grid'? ', '.$wid.' .grid-item .item-readmore': '').
		' {color:white}'.
		
		($type=='slider'? $wid.' .slider-item .meta-item .fa {color: '.$atts['main_color'].'}': '').
		($type == 'grid' ? $wid.' .grid-item .meta-item .fa {color: '.$atts['main_color'].'}':'').
		($type == 'list' ? $wid.'.list .meta-item {color: '.$atts['main_color'].'}':'').
		($type == 'two' ? $wid.'.two .meta-items .meta-item {color: #333':'').
		($type == 'three' ? $wid.'.three .meta-items .meta-item {color: #000':'').
		
		($type=='complex'? $wid.'.complex .than-0 .item-labels {background: none}': '').				
		($type=='blogging'? $wid.'.blogging .item-labels {background: none}': '').
		($type=='left'? $wid.'.left .item-extra .item-labels {background: none}': '').
		($type=='right'? $wid.'.right .item-extra .item-labels {background: none}': '').
		($type=='simple-one'? $wid.'.simple-one .item-extra .item-labels {background: none}': '').
		($type=='ticker'? $wid.'.ticker .item-labels {background: none}': '').
				
		($type=='complex'? $wid.'.complex .than-0 .item-labels a,'.$wid.'.complex .item-sub .meta-item {color: '.$atts['main_color'].'}': '').
		($type=='blogging'? $wid.'.blogging .item-labels a {color: '.$atts['main_color'].'}': '').
		($type=='left'? $wid.'.left .item-extra .item-labels a {color: '.$atts['main_color'].'}': '').
		($type=='right'? $wid.'.right .item-extra .item-labels a {color: '.$atts['main_color'].'}': '').
		($type=='simple-one'? $wid.'.simple-one .item-extra .item-labels a {color: '.$atts['main_color'].'}': '').
		($type=='ticker'? $wid.'.ticker .item-labels a {color: '.$atts['main_color'].'}': '').
				
		($type=='complex'? $wid.'.complex .than-0 .item-title a {color: black}': '').
		($type=='blogging'? $wid.'.blogging .item-title a {color: black}': '').
		($type=='one'? $wid.'.one .meta-item {color: black}': '').
		($type=='left'? $wid.'.left .item-extra .item-title a {color: black}': '').
		($type=='right'? $wid.'.right .item-extra .item-title a {color: black}': '').
		($type=='simple-one'? $wid.'.simple-one .item-extra .item-title a {color: black}': '').
		($type=='ticker'? $wid.'.ticker .item-title a {color: black}': '').
		($type == 'list' ? $wid.'.list .item-title a {color: '.$atts['main_color'].'}':'').
				
		($type=='blogging'? $wid.'.blogging .meta-item {color: #666}': '').
		($type=='left'? $wid.'.left .item-sub .meta-item {color: #666}': '').
		($type=='right'? $wid.'.right .item-sub .meta-item {color: #666}': '').
		($type=='simple-one'? $wid.'.simple-one .item-sub .meta-item {color: #666}': '');
	}

	if (isset($atts['thumb_bg_color']) && $atts['thumb_bg_color'] && $atts['thumb_bg_color'] != '#000000' && 
		(!isset($atts['rainbow_thumb_bg']) || !$atts['rainbow_thumb_bg'])) {
		$style .= $wid.' .thumbnail-overlay {
			background-color: '.$atts['thumb_bg_color'].';
			background-image: -webkit-linear-gradient(135deg,'.$atts['thumb_bg_color'].',#000);
			background-image: -moz-linear-gradient(135deg,'.$atts['thumb_bg_color'].',#000);
			background-image: -o-linear-gradient(135deg,'.$atts['thumb_bg_color'].',#000);
			background-image: linear-gradient(135deg,'.$atts['thumb_bg_color'].',#000);
		}';
	}

	if ($style) {
		$style = '<sty'.'le type="t'.'ext/c'.'ss" scoped>'.$style.'</style>';
	}
	return $style;
}


global $widget_id;
$widget_id = 0;
function magone_article_box($type = '', $atts = array(), $content = '', $label_widget_id = '') {
	/* included sticky will change behaves of pagination */
	if (isset($atts['ignore_sticky_posts']) && !$atts['ignore_sticky_posts']) {		
		$atts['pagination'] = false;
	}
	
	// extract data	
	global $MagOne_Article_Fields;	
	
	if ($type) {
		foreach ($MagOne_Article_Fields[$type] as $key => $value) {
			if (!isset($atts[$key])) {
				if (isset($value['default'])) {
					$atts[$key] = $value['default'];
				} else {
					$atts[$key] = '';
				}				
			}
		}
	}
	
	$html = '';
	$hh_1 = '';
	$hh_2 = '';
	$hh_3 = '';
	
	if (!$label_widget_id) {
		global $widget_id;
		$widget_id++;
		$label_widget_id = 'Label'.$widget_id;
	}
	
	
	$cate_ids = array();
	$cates = array();
	if ($atts['cates']) {
		if (is_string($atts['cates'])) {
			$cate_ids = explode(',', $atts['cates']);
		} else if ($atts['cates']) {
			$cate_ids = $atts['cates'];
		}
		
		if (count($cate_ids)) {
			foreach ($cate_ids as $index => $id) {
				$cate_ids[$index] = (int) $id;
				$cates[$index] = get_category((int) $id);		
				if (is_object($cates[$index])) {
					$cates[$index]->link = get_category_link((int) $id);
				}				
			}
		}
	}
	
	// create widget header
	$title_icon = '';
	if ($atts['title_icon']) {
		$title_icon = apply_filters('sneeit_get_font_awesome_tag', $atts['title_icon']) .' ';
	}
	if ($atts['title']) {
		$title_style = '';
		if (isset($atts['title_border_bottom_color']) && $atts['title_border_bottom_color'] != '' &&
				(!isset($atts['title_bg_color']) || $atts['title_border_bottom_color'] != $atts['title_bg_color'])) {			
			$title_style = 'border-bottom: 2px solid '.$atts['title_border_bottom_color'] . '; margin-bottom: 10px;';
		}
				
		$text_color = '';
		if (isset($atts['title_text_color']) && $atts['title_text_color'] != '') {
			$title_style .= 'color: '.$atts['title_text_color'] . ';';
			$text_color = ' styl'.'e="'.$title_style. '"';			
		}
		
		
		$hh_1 .= '<h2 class="widget-title feed-widget-title';
		if (isset($atts['title_bg_color']) && $atts['title_bg_color'] != '') {
			$hh_1 .= ' box-title';
			$title_style .= 'background: '.$atts['title_bg_color'] . ';';
		}
		if ($title_style) {
			$title_style = ' styl'.'e="'.$title_style. '"';
		}
		
		$hh_1 .= '"'.$title_style.'>';
		
		
		if (count($cates) == 1) {
			// target to first label if has only 1 label
			if ($atts['title_url']) {
				$hh_1 .= '<a href="'. esc_url($atts['title_url']) .'"'.$text_color.'>'.$title_icon.$atts['title'].'</a>';
			} else if ($atts['orderby'] == 'latest' && $atts['tags'] == ''  && $atts['authors'] == '') {
				$hh_1 .= '<a href="'. esc_url($cates[0]->link) .'"'.$text_color.'>'.$title_icon.$atts['title'].'</a>';
			} else {
				$hh_1 .= '<span'.$text_color.'>'.$title_icon.$atts['title'].'</span>';
			}
			if ($atts['show_view_all'] && $atts['orderby'] == 'latest' && $atts['tags'] == ''  && $atts['authors'] == '') {
				$hh_3 .= '<div class="feed-widget-viewall"><a href="'.esc_url($cates[0]->link).'"><span>'.esc_html__('VIEW ALL', 'magone').'</span> <i class="fa fa-chevron-right"></i></a></div>';		
			}
		} else if (count($cates) == 0) { // leave blank, load all
			// target to latest posts if user selected all labels
			if ($atts['title_url']) {
				$hh_1 .= '<a href="'. esc_url($atts['title_url']) .'"'.$text_color.'>'.$title_icon.$atts['title'].'</a>';
			} else if ($atts['orderby'] == 'latest' && $atts['tags'] == ''  && $atts['authors'] == '') {
				$hh_1 .= '<a href="'.  esc_url(get_home_url()).'/?s="'.$text_color.'>'.$title_icon.$atts['title'].'</a>';
			} else {
				$hh_1 .= '<span'.$text_color.'>'.$title_icon.$atts['title'].'</span>';
			}
						
			if ($atts['show_view_all'] && $atts['orderby'] == 'latest' && $atts['tags'] == ''  && $atts['authors'] == '') {
				$hh_3 .= '<div class="feed-widget-viewall"><a href="'.  esc_url(get_home_url()).'/?s=">'.esc_html__('VIEW ALL', 'magone').' <i class="fa fa-chevron-right"></i></a></div>';			
			
			}
		} else {
			// in other case show plain text only
			if ($atts['title_url']) {
				$hh_1 .= '<a href="'. esc_url($atts['title_url']) .'"'.$text_color.'>'.$title_icon.$atts['title'].'</a>';
			} else {
				$hh_1 .= '<span'.$text_color.'>'.$title_icon.$atts['title'].'</span>';
			}				
		}
		$hh_1 .= '</h2>';
	}

	// the list of labels (disabling)
	if (count($cates) > 1 && 0) {
		$hh_2 .= '<div class="feed-widget-labels">';
		$hh_2 .= '<ul class="bg">';
		for ($i = 0; $i < count($cates); $i++) {			
			$hh_2 .= '<li><a href="javascript: void(0)" '.(($i==0)?'class="active" ':'').'data-id="'.esc_attr($cate_ids[$i]).'"><span class="check"><i class="fa fa-check"></i></span> '.$cates[$i]->category_nicename.' <span class="down"><i class="fa fa-angle-down"></i></span></a></li>';
		}
		$hh_2 .= '</ul>';
		$hh_2 .= '</div>';
	}
	
	if ($hh_1 || $hh_2 || $hh_3) {
		
		$html .= '<div class="feed-widget-header"';		
		if (!empty($atts['title_border_bottom_color']) && empty($atts['title_bg_color']) && $atts['title_bg_color'] == $atts['title_border_bottom_color']) {
			$html .= ' sty'.'le="border-bottom: 2px solid '.$atts['title_border_bottom_color'] . '; margin-bottom: 10px;"';
		}
		$html .= '>'.$hh_1.$hh_2.$hh_3.'<div class="clear"></div></div>';
	}

	// widget content
	$html .= '<div class="widget-content feed-widget-content widget-content-'.$label_widget_id.'" id="widget-content-'.$label_widget_id.'">';
	
	
	$html .= magone_article_box_content($label_widget_id, $type, $atts, $content, $cate_ids, $cates);	
	
	$html .= '</div><div class="clear"></div>';

	// pagination holder
	if (isset($atts['pagination']) && $atts['pagination']) {
		$html .= '<div class="clear"></div><div class="feed-widget-pagination feed-widget-pagination-'.$atts['pagination'].'" data-widget_id="'.$label_widget_id.'" data-type="'.$type.'"></div><div class="clear"></div>';
	}
	// data for owl
	$ret_data = '';
	if ($type == 'slider' || $type == 'carousel' || $type == 'ticker') :
		$ret_data .= '<span class="hide widget-data" data-type="'.$type.'">';
		if (isset($atts['column']) && is_numeric($atts['column']) && ((int) $atts['column'] >= 1)) {
			$ret_data .= '<span class="data-item data-column">'.$atts['column'].'</span>';	
		}
		if (isset($atts['speed']) && is_numeric($atts['speed']) && ((int) $atts['speed'] > 1)) {
			$ret_data .= '<span class="data-item data-speed">'.$atts['speed'].'</span>';
		}
		if (isset($atts['show_dots']) && $atts['show_dots']) {
			$ret_data .= '<span class="data-item data-show_dots">'.$atts['show_dots'].'</span>';	
		}
		if (isset($atts['show_nav']) && $atts['show_nav']) {
			$ret_data .= '<span class="data-item data-show_nav">'.$atts['show_nav'].'</span>';	
		}		
		
		$ret_data .= '</span>';			
	endif;
	
	// wrap widget with html
	$html = '<div class="widget Label '.
			$type.
			' label feed '.
			(isset($atts['enable_tab']) && $atts['enable_tab']? 'tab ':'').
			(isset($atts['padding_thumbnail']) && !$atts['padding_thumbnail']? 'padding-thumb ':'').
			(isset($atts['show_index']) && !$atts['show_index']? 'show-index ':'').
			(isset($atts['title']) && !$atts['title']? 'no-title ':'has-title ').
			(isset($atts['thumbnail_height']) && !$atts['thumbnail_height']? 'auto-height ':'fix-height ').
			(isset($atts['no_spacing']) && $atts['no_spacing']? 'no-spacing ':''). 
			(isset($atts['show_format_icon']) && !$atts['show_format_icon']? 'none-icon ':'').'" id="'.$label_widget_id.'">'.$html.$ret_data.'</div>';
	
	
	// style to widget
	$html .= magone_article_box_style($label_widget_id, $type, $atts, $content);
	
	// add clear bar to protect layout
	if ($type == 'left') {
		$html = '<div class="clear"></div>' . $html;		
	} else if ($type == 'right') {
		$html .= '<div class="clear"></div>';
	} else {
		$html = '<div class="clear"></div>' . $html . '<div class="clear"></div>';
	}
	
	return $html.$ret_data;

}
