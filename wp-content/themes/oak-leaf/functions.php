<?php
/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */			
	
// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php'); 

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php'); 

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php'); 

// CF7 hack
remove_action( 'wpcf7_swv_create_schema', 'wpcf7_swv_add_select_enum_rules', 20, 2 );

// ACF Allowed Tags
add_filter( 'wp_kses_allowed_html', 'acf_add_allowed_iframe_tag', 10, 2 );
function acf_add_allowed_iframe_tag( $tags, $context ) {
   if ( $context === 'acf' ) {
      $tags['iframe'] = array(
         'src'             => true,
         'height'          => true,
         'width'           => true,
         'frameborder'     => true,
         'allowfullscreen' => true,
         'class'           => true,
      );

      $tags['script'] = array(
         'src' => true,
         'async' => true,
         'defer' => true,
         'charset' => true
      );

      $tags['link'] = array(
         'href' => true,
         'rel' => true,
         'title' => true,
         'type' => true
      );
   }

   return $tags;
}

// Remove ACF unsafe HTML notice 
add_filter( 'acf/admin/prevent_escaped_html_notice', '__return_true' );

/**
 * Insert the Cookiebot "Do Not Sell Or Share My Personal Information"
 * link in the footer legal menu, immediately after the Privacy Policy item.
 * Idempotent: won't insert twice.
 */
add_filter( 'wp_nav_menu_items', 'oak_leaf_cookiebot_footer_link', 10, 2 );
function oak_leaf_cookiebot_footer_link( $items, $args ) {
	if ( ! isset( $args->theme_location ) || 'footer-links' !== $args->theme_location ) {
		return $items;
	}
	if ( false !== strpos( $items, 'ct-cookiebot-preferences-link' ) ) {
		return $items;
	}

	$cookiebot_item = '<li class="menu-item"><a href="#" id="ct-cookiebot-preferences-link">Do Not Sell Or Share My Personal Information</a></li>';

	$privacy_pos = strpos( $items, 'privacy-policy' );
	if ( false !== $privacy_pos ) {
		$end_li = strpos( $items, '</li>', $privacy_pos );
		if ( false !== $end_li ) {
			$end_li += strlen( '</li>' );
			return substr( $items, 0, $end_li ) . $cookiebot_item . substr( $items, $end_li );
		}
	}

	return $items . $cookiebot_item;
}