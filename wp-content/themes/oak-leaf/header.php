<?php
/**
 * TWG Legal integration.
 *
 * When the twg-legal plugin is active the age-gate legal links open the
 * plugin-hydrated legal popups (see the containers in footer.php) so the
 * popup copy always comes from the TWG legal JSON API. Without the plugin
 * they fall back to the legacy static legal documents, exactly as before.
 */
$twg_legal_popups = class_exists( 'TWG_Legal_Plugin' );
$twg_terms_attrs  = $twg_legal_popups
	? 'href="#twg-terms-popup" data-fancybox data-type="inline" data-src="#twg-terms-popup"'
	: 'data-fancybox data-type="iframe" data-src="/terms-of-service.html"';
$twg_privacy_attrs = $twg_legal_popups
	? 'href="#twg-privacy-popup" data-fancybox data-type="inline" data-src="#twg-privacy-popup"'
	: 'data-fancybox data-type="iframe" data-src="/privacy-policy.html"';
?>
<!doctype html>
  <html class="no-js"  <?php language_attributes(); ?>>
	<head>
		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-GB8W53C9DZ"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		
		  gtag('config', 'G-GB8W53C9DZ');
		</script>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
	    <?php } ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link rel="stylesheet" href="https://use.typekit.net/eqd6dcq.css">
		<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="8f9ecdb2-c40e-411a-aa50-87ab7a77297d" data-blockingmode="auto" type="text/javascript"></script>
		<?php wp_head(); ?>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/contact.js"></script>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fancybox/jquery.fancybox.css">
        <script src="<?php echo get_template_directory_uri(); ?>/fancybox/jquery.fancybox.min.js"></script>
		<script>
		/* Fancybox defaults for the age-gate legal popups.
		   Fancybox renders its "small button" close X inside the content, which
		   scrolls out of view on a legal document thousands of pixels tall. The
		   toolbar variant lives in .fancybox-container (fixed to the viewport),
		   so the close X stays visible while the document scrolls. */
		jQuery(function($) {
			if ($.fancybox && $.fancybox.defaults) {
				$.fancybox.defaults.toolbar = true;
				$.fancybox.defaults.buttons = ['close'];
				$.fancybox.defaults.smallBtn = false;
			}
		});
		</script>
		<script>(function(d){var s = d.createElement("script");s.setAttribute("data-account", "OQBfWXhU5x");s.setAttribute("src", "https://cdn.userway.org/widget.js");(d.body || d.head).appendChild(s);})(document)</script><noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website accessibility</a></noscript>
	<script>
		jQuery(function($) {
		$(document).ready(function() {
			/*!
		 * Javascript Cookie v1.5.1
		 * https://github.com/js-cookie/js-cookie
		 *
		 * Copyright 2006, 2014 Klaus Hartl
		 * Released under the MIT license
		 */
		(function(factory){var jQuery;if(typeof define==='function'&&define.amd){define(['jquery'],factory);}else if(typeof exports==='object'){try{jQuery=require('jquery');}catch(e){}
		module.exports=factory(jQuery);}else{var _OldCookies=window.Cookies;var api=window.Cookies=factory(window.jQuery);api.noConflict=function(){window.Cookies=_OldCookies;return api;};}}(function($){var pluses=/\+/g;function encode(s){return api.raw?s:encodeURIComponent(s);}
		function decode(s){return api.raw?s:decodeURIComponent(s);}
		function stringifyCookieValue(value){return encode(api.json?JSON.stringify(value):String(value));}
		function parseCookieValue(s){if(s.indexOf('"')===0){s=s.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,'\\');}
		try{s=decodeURIComponent(s.replace(pluses,' '));return api.json?JSON.parse(s):s;}catch(e){}}
		function read(s,converter){var value=api.raw?s:parseCookieValue(s);return isFunction(converter)?converter(value):value;}
		function extend(){var key,options;var i=0;var result={};for(;i<arguments.length;i++){options=arguments[i];for(key in options){result[key]=options[key];}}
		return result;}
		function isFunction(obj){return Object.prototype.toString.call(obj)==='[object Function]';}
		var api=function(key,value,options){if(arguments.length>1&&!isFunction(value)){options=extend(api.defaults,options);if(typeof options.expires==='number'){var days=options.expires,t=options.expires=new Date();t.setMilliseconds(t.getMilliseconds()+days*864e+5);}
		return(document.cookie=[encode(key),'=',stringifyCookieValue(value),options.expires?'; expires='+options.expires.toUTCString():'',options.path?'; path='+options.path:'',options.domain?'; domain='+options.domain:'',options.secure?'; secure':''].join(''));}
		var result=key?undefined:{},cookies=document.cookie?document.cookie.split('; '):[],i=0,l=cookies.length;for(;i<l;i++){var parts=cookies[i].split('='),name=decode(parts.shift()),cookie=parts.join('=');if(key===name){result=read(cookie,value);break;}
		if(!key&&(cookie=read(cookie))!==undefined){result[name]=cookie;}}
		return result;};api.get=api.set=api;api.defaults={};api.remove=function(key,options){api(key,'',extend(options,{expires:-1}));return!api(key);};if($){$.cookie=api;$.removeCookie=api.remove;}
		return api;}));
			/*!
		 * Simple Age Verification (https://github.com/Herudea/age-verification))
		 */
			var modal_content,
			modal_screen;
			$(document).ready(function() {
				av_legality_check();
			});
			av_legality_check = function() {
				if ($.cookie('is_legal') == "yes") {
			
				} else {
					av_showmodal();
					$(window).on('resize', av_positionPrompt);
				}
			};
			av_showmodal = function() {
					modal_screen = jQuery('<div id="modal_screen" class="age_gate"></div>');
					modal_content = jQuery('<div id="modal_content" style="display:none" role="dialog" aria-modal="true"></div>');
					var modal_content_wrapper = jQuery('<div id="modal_content_wrapper" class="content_wrapper"></div>');
					var modal_regret_wrapper = jQuery('<div id="modal_regret_wrapper" class="content_wrapper" style="display:none;"></div>');
					var content_agegate = jQuery('<img src="/wp-content/themes/oak-leaf/assets/images/logotype.svg" alt="Oak Leaf Vineyards" title="Oak Leaf Vineyards"><span class="seperator-bar">&nbsp;</span><label for="agree" class="show-for-sr">I agree to the Terms of Service and Privacy Policy</label><input type="checkbox" id="agree" required name="agree" role="tab" aria-selected="true" tabindex="1"></input> I agree to the <a <?php echo $twg_terms_attrs; ?> aria-disabled="true">Terms of Service</a> and <a <?php echo $twg_privacy_attrs; ?> aria-disabled="true">Privacy Policy</a></p><h1>Are You of Legal Drinking Age?</h1><nav><ul><li><a href="#" class="av_btn av_go" rel="yes" id="yes" role="tab" tabindex="2">Yes</a></li><li><a href="#" class="av_btn av_no" rel="no" id="no" role="tab" tabindex="3">No</a></li></nav><article class="caption"><p role="heading">You must be at least 21 years old to view this site.<br> By clicking “yes” you affirm that you are at least 21 years old.</p><p>You can learn more about how we use cookies by reviewing our <a style="text-decoration: underline;" <?php echo $twg_privacy_attrs; ?>>Privacy Policy</a></p><small style="margin-top: 20px;">&copy; <?php echo Date("Y"); ?> Oak Leaf Vineyards, Ripon, CA</small><span class="seperator-bar">&nbsp;</span>');
					var regret_text = jQuery('<h2>You must be 21 years of age or older to view this site.</h2>');
					modal_content_wrapper.append(content_agegate);
					modal_regret_wrapper.append(regret_text);
					modal_content.append(modal_content_wrapper, modal_regret_wrapper);
					jQuery('body').append(modal_screen, modal_content);
					av_positionPrompt();
					modal_content.find('a.av_btn').on('click', av_setCookie);
				};
			av_setCookie = function(e) {
				e.preventDefault();
				var is_legal = $(e.currentTarget).attr('rel');
				$.cookie('is_legal', is_legal, {
					expires: 30,
					path: '/'
				});
				if ($("#agree").is(':checked') && (is_legal == "yes")) {
					av_closeModal();
					$(window).off('resize');
				} else if (is_legal == "no") {
					av_showRegret();
				} else if (!$("#agree").is(':checked')) {
					alert('You must agree to the terms of service.');
				}
			};
			av_closeModal = function() {
				modal_content.fadeOut();
				modal_screen.fadeOut();
			};
			av_showRegret = function() {
				modal_screen.addClass('nope');
				modal_content.find('#modal_content_wrapper').hide();
				modal_content.find('#modal_regret_wrapper').show();
			};
			av_positionPrompt = function() {
				var top = ($(window).outerHeight() - $('#modal_content').outerHeight()) / 2;
				var left = ($(window).outerWidth() - $('#modal_content').outerWidth()) / 2;
				modal_content.css({
					'top': top,
					'left': left
				});
				if (modal_content.is(':hidden') && ($.cookie('is_legal') != "yes")) {
					modal_content.fadeIn('slow');
				}
			};
		});
	});
	jQuery(function($) {
		$(document).ready(function() {
			$('#modal_regret_wrapper').on('click', function() {
				$(this).hide();
				$('#modal_content_wrapper').show();
			});
		});
	});
	</script>
	</head>
	<body <?php body_class(); ?>>
		<div class="off-canvas-wrapper">
			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
					 <?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>
