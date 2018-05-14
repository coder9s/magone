/*STORAGE*/
// check if is firefox
var Magone_Is_Firefox = false;
if (jQuery('.is-firefox').css('display') != 'none') {
	Magone_Is_Firefox = true;
}
var Magone_Is_Ie9 = false;
if (jQuery('.is-ie9').css('display') != 'none') {
	Magone_Is_Ie9 = true;
}
var Magone_Is_Retina = false;


// store content to web browser
function magone_included_cookie() {
	if ('cookie' in document) {
		return true;
	}
	return false;
}
function magone_set_cookie(c_name,value,exdays) {
	if (!magone_included_cookie()) {
		return false;
	}
    var exdate=new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value=escape(value) + ((exdays==null) ? '' : '; expires='+exdate.toUTCString())+'; path=/';
    document.cookie=c_name + "=" + c_value;
	if (magone_get_cookie(c_name) !== value) {
		return false;
	}
	return true;
}
function magone_has_cookie() {
	if (magone_set_cookie('test', 'ok')) {
		return true;
	}
	return false;
}
function magone_get_cookie(c_name) {
	if (!magone_included_cookie()) {
		return '';
	}
    var i,x,y,ARRcookies=document.cookie.split(";");
    for (i=0;i<ARRcookies.length;i++)
    {
        x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
        y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
        x=x.replace(/^\s+|\s+$/g,"");
        if (x==c_name)
        {
            return unescape(y);
        }
    }
	return '';
}
function magone_has_storage() {
	if(typeof(localStorage) !== "undefined") {
		return true;
	} 
	return false;
}
function magone_set_storage(key,value) {
	if (magone_has_storage()) {
		localStorage.setItem(key,value);
		return true;
	}
	return false;
}
function magone_get_storage(key) {
	if (magone_has_storage()) {
		var ret = localStorage.getItem(key);
		if (ret) {
			return ret;
		}
	}
	return '';
}
function magone_update_option(option_name, option_value) {
	if (magone_has_storage()) {
		return magone_set_storage(option_name, option_value);
	} else if (magone_has_cookie()) {
		return magone_set_cookie(option_name, option_value);
	}
	return false;
}
function magone_get_option(option_name) {
	if (magone_has_storage()) {
		return magone_get_storage(option_name);
	} else if (magone_has_cookie()) {
		return magone_get_cookie(option_name);
	}
	return '';
}



/*remake UI*/


/*IMAGE MASTER*/
function magone_is_high_density(){
    return ((window.matchMedia && (window.matchMedia('only screen and (min-resolution: 124dpi), only screen and (min-resolution: 1.3dppx), only screen and (min-resolution: 48.8dpcm)').matches || window.matchMedia('only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (min-device-pixel-ratio: 1.3)').matches)) || (window.devicePixelRatio && window.devicePixelRatio > 1.3));
}


function magone_is_retina(){
    return ((window.matchMedia && (window.matchMedia('only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx), only screen and (min-resolution: 75.6dpcm)').matches || window.matchMedia('only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min--moz-device-pixel-ratio: 2), only screen and (min-device-pixel-ratio: 2)').matches)) || (window.devicePixelRatio && window.devicePixelRatio >= 2)) && /(iPad|iPhone|iPod)/g.test(navigator.userAgent);
}

(function() {
    var root = (typeof exports === 'undefined' ? window : exports);
    
    function Retina() {}

    root.Retina = Retina;

    Retina.isRetina = function(){
        
    };
})();

function magone_srcset_parse(srcset) {
	
	var ret = srcset.split(', ');
	
	// colllect sets
	for (var i = 0; i < ret.length; i++) {
		ret[i] = ret[i].split(' ');
		if (ret[i].length == 2) {
			ret[i][1] = ret[i][1].replace('w', '');
			if (isNaN(ret[i][1])) {
				ret[i][1] = 0;
			}
			ret[i][1] = Number(ret[i][1]);
		}
	}
	
	// remove blank
	for (var i = ret.length - 1; i >= 0; i-=1) {
		if (ret[i].length != 2 || ret[i][1] == 0) {
			ret.splice(i, 1);
		}
	}

	// sort from low to high
	for (var i = 0; i < ret.length - 1; i++) {
		for (var j = i+1; j < ret.length; j++) {
			if (ret[i][1] > ret[j][1]) {
				var temp = ret[j];
				ret[j] = ret[i];
				ret[i] = temp;
			}
		}
	}

	return ret;
}
/*
You must make sure your image container has class name .item-thumbnail and add below css into your style sheet.

.item-thumbnail *, .item-thumbnail img {display:block;max-width: 9999px; max-height: 9999px; padding: 0!important;}
.item-thumbnail {overflow: hidden;display: block;z-index:9;}
*/
function magone_optimize_thumbnail_image(img) {
	var img = jQuery(img);
	var thumb = img.parent().parent();
	var thumb_top = thumb.offset().top;
	var thumb_left = thumb.offset().left;
	var img_top = img.offset().top;
	var img_left = img.offset().left;
	var img_w = img.width();	
	var img_h = img.height();
	
	// very large width, may be browser slow when drawing image
	if ((img_w > img_h * 3 || Magone_Is_Firefox) && (!img.is('.special'))) {
		img.addClass('special');
		// we must delay a bit to wait it drawing image completely
		setTimeout(function() {
			magone_optimize_thumbnail_image(img)
		}, 50);
		
		return;
	}
	
	if (thumb_left < img_left && img.parent().is('.item-thumbnail-resize-landscape')) {
		img
			.parent()
				.removeClass('item-thumbnail-resize-landscape')
				.addClass('item-thumbnail-resize-portrait');
		img.css('bottom', '0');
		
		// magazine cover image which has height larger than width
		// so may be main content of image can be on the top of image
		// (must update image width and height each time we resize with classes)
		var img_w = img.width();
		var img_h = img.height();
		if (img_h > 1.3 * img_w) {
			// we must allow it go to top
			img.css('bottom','auto');
		}
		
		// fix bug for firefox
		if (Magone_Is_Firefox) {		
			var img_h = img.height();
			var thumb_h = thumb.height();
			var img_top = ( img_h - thumb_h ) / 2;
			img.css('top', '-' + img_top + 'px').css('bottom', 'auto');				
		}
	} else if (thumb_top < img_top && img.parent().is('.item-thumbnail-resize-portrait')) {
		img
			.parent()
				.removeClass('item-thumbnail-resize-portrait')
				.addClass('item-thumbnail-resize-landscape');
	}
	
	img.addClass('optimized');
}
function magone_optimize_thumbnail(images) {
	if (typeof(images) != 'object') {
		images = jQuery('.thumbnail img');
	}	
	
	// replace small images first
	images.each(function($){
		var img = jQuery(this);
		var src = img.attr('src');		
		
		// if did not wrapped with resizer
		if (img.parent().is('.item-thumbnail')) {
			img.wrap('<span class="item-thumbnail-resize-landscape"></span>');
		}

		// process with images from media library
		// to select the right image to display
		var srcset = img.attr('data-ss');
		var src_ds = img.attr('data-s');
		var wid = img.attr('width');
		var hei = img.attr('height');
		if (typeof(srcset) != 'undefined' && typeof(wid) != 'undefined' && typeof(hei) != 'undefined') {
			src = src_ds;
			wid = Number(wid);
			hei = Number(hei);
			var ss = magone_srcset_parse(srcset);			
			if (ss.length && wid && hei) {
				// find desire width
				var thumb = img.parents('.thumbnail');				
				var thumb_h = thumb.height();
				var new_w = thumb.width(); // assume image width = thumb width
				var new_h = hei * new_w / wid; // so image heigh must be
				if (new_h < thumb_h) {
					// but seem new height is smaller than need
					// so we just increase width a bit
					new_w = wid * thumb_h / hei;
				}
								
				// search in srcset to find appropriate src
				var new_src = '';
				
				// just select the largest image, if retina
				if (Magone_Is_Retina) {
					new_w = new_w * 2;
				}
								
				if (!new_src) {
					// find for exactly first
					for (var i = 0; i < ss.length; i++) {
						if (ss[i][1] == new_w) {
							new_src = ss[i][0];
							break;
						}
					}
				}
								
				
				if (!new_src) {
					for (var i = 0; i < ss.length; i++) {
						if (ss[i][1] > new_w) {							
							new_src = ss[i][0];
							break;
						}
					}
					if (i < ss.length) {
						if (0 == i)	 { 
							new_src = ss[i][0]; // can not find lower image
						} else if (ss[i-1][1] >= new_w * 0.9 || magone.serve_scaled_images) {
							new_src = ss[i-1][0]; // if the lower not lower than 90%
						} else {
							new_src = ss[i][0]; // just pick the nearest higher
						}
					}
				}
				if (!new_src) {
					new_src = src; // not found, get adta from src
				} else {
					src = new_src; // update src for next processes
				}
				img.attr('src', new_src);
			}
		} else if ((typeof(src) == 'undefined' || !src) && typeof(src_ds) != 'undefined') {
			src = src_ds;
			img.attr('src', src);			
		}
		
				
		// replace youtube thumbnail to largest image
		if (src.indexOf('youtube.com') != -1 && src.indexOf('/default.') != -1) {			
			img.attr('src', src.replace('/default.', '/hqdefault.'));			
		}		
		
		if (img.parent().is('.natural-thumbnail')) {
			return;
		}
		
		img.each(function(){
			// Trigger load event (for Gecko and MSIE)
			if (this.complete) {
				jQuery(this).trigger('load');
				
				// This fixes IE9 issue
				if ( Magone_Is_Ie9 ) {
					this.src = this.src;
				}					
			}
		}).on('load', function (){								
			magone_optimize_thumbnail_image(this);
		});
		
	});
}

Magone_Is_Retina = (magone_is_high_density() || magone_is_retina());
magone_optimize_thumbnail();

jQuery(window).resize(function(){
	Magone_Is_Retina = (magone_is_high_density() || magone_is_retina());
	magone_optimize_thumbnail();
});



/*extra lib*/
function magone_is_number (variable) {
	return (typeof(variable) != 'undefined' && !isNaN(variable));
}

function magone_ajax_error(data) {
	return (!data || ((data.indexOf('<b>Warning:</b> ') != -1  || data.indexOf('Warning: ') != -1 || data.indexOf('Fatal error: ') != -1 || data.indexOf('<b>Fatal error:</b> ') != -1) && data.indexOf(' on line ') != -1));
}

function magone_select_all (elem) {
	jQuery(elem).select();
	// Work around Chrome's little problem
	jQuery(elem).mouseup(function() {
		// Prevent further mouseup intervention
		jQuery(elem).unbind("mouseup");
		return false;
	});
}

function magone_selectText(element) {
    var doc = document;
    var text = doc.getElementById(element);
    var range;
    var selection;    

    if (doc.body.createTextRange) { //ms
        range = doc.body.createTextRange();
        range.moveToElementText(text);
        range.select();
    } else if (window.getSelection) { //all others
        selection = window.getSelection();        
        range = doc.createRange();
        range.selectNodeContents(text);
        selection.removeAllRanges();
        selection.addRange(range);
    }
}

function magone_is_image_src(url) {
	return (url.toLowerCase().match/***/(/\.(jpeg|jpg|gif|png)$/)/***/ != null);
}

function magone_scroll_to(elem, delay) {
	if (typeof(elem) == 'undefined' || jQuery(elem).length == 0) {
		return;
	}
	if (typeof(delay) == 'undefined') {
		delay = 50;
	}
	jQuery('html, body').animate({
		scrollTop: jQuery(elem).offset().top
	}, delay);
}

function magone_is_variable_name_character(character) {
	var character = character.charCodeAt(0);
	if (character >= 'a'.charCodeAt(0) && 
		character <= 'z'.charCodeAt(0) ||
		character >= 'A'.charCodeAt(0) &&
		character <= 'Z'.charCodeAt(0) ||
		character >= '0'.charCodeAt(0) &&
		character <= '9'.charCodeAt(0) ||
		character == '_'.charCodeAt(0)) {
		return true;
	}

	return false;
}
function magone_url_to_slug(url) {
	for (var i = 0; i < url.length; i++) {
		if (!magone_is_variable_name_character(url[i])) {
			url = url.replace(url[i], '_');
		}
	}
	return url;
}

function magone_get_str_between_arrays(original_text, open_keys, close_keys) {
	var found = false;
	for (var i = 0; i < open_keys.length; i++) {
		if (original_text.indexOf(open_keys[i]) != -1) {
			original_text = original_text.split(open_keys[i])[1];
			found = true;
		}
	}
	if (!found) {
		return '';
	}
	for (var i = 0; i < close_keys.length; i++) {
		original_text = original_text.split(close_keys[i])[0];
	}

	return original_text;
}

function magone_is_image_src(url) {
	return (url.toLowerCase().match/***/(/\.(jpeg|jpg|gif|png)$/)/***/ != null);
}

function magone_get_youtube_video_id (url) {	
	if (url.indexOf('youtube') == -1 && url.indexOf('youtu.be') == -1) {
		return '';
	}
	return magone_get_str_between_arrays(url, ['/embed/','youtu.be/', '/videos/', '/v/', '?v=', '&v='], ['#', '/', '?', '&', '.']);
}

function magone_get_youtube_list_id (url) {
	if (url.indexOf('youtube') == -1 && url.indexOf('youtu.be') == -1) {
		return '';
	}
	return magone_get_str_between_arrays(url, ['list='], ['#', '/', '?', '&', '.']);	
}

function magone_get_vimeo_video_id (url) {
	if (url.indexOf('vimeo') == -1) {
		return '';
	}
	return magone_get_str_between_arrays(url, ['vimeo.com/', '/video/'], ['#', '/', '?', '&', '.']);	
}

