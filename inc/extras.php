<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package siteorigin-unwind
 * @since siteorigin-unwind 0.1
 * @license GPL 2.0
 */

if ( ! function_exists( 'siteorigin_unwind_body_classes' ) ) :
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function siteorigin_unwind_body_classes( $classes ) {

	// Add a CSS3 animations class.
	$classes[] = 'css3-animations';

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// If we're viewing on a mobile device, add a class.
	if ( wp_is_mobile() ) {
		$classes[] = 'is_mobile';
	}	

	// Add a no-js class which we'll remove as required.
	$classes[] = 'no-js';

	// Check if the sidebar has widgets.
	if ( ! is_active_sidebar( 'main-sidebar' ) ) {
		$classes[] = 'no-active-sidebar';
	}	

	// Add the page setting classes.
	if ( is_page() ) {
		$classes[] = 'page-layout-' . SiteOrigin_Settings_Page_Settings::get( 'layout' );
		if ( ! SiteOrigin_Settings_Page_Settings::get( 'masthead_margin' ) ) {
			$classes[] = 'page-layout-no-masthead-margin';
		}
		if ( ! SiteOrigin_Settings_Page_Settings::get('footer_margin') ) {
			$classes[] = 'page-layout-no-footer-margin';
		}
	}

	// If the navigation is sticky, add a class.
	if ( siteorigin_setting( 'navigation_sticky' ) ) {
		$classes[] = 'sticky-menu';
	}

	return $classes;
}
endif;
add_filter( 'body_class', 'siteorigin_unwind_body_classes' );

if ( ! function_exists( 'siteorigin_unwind_excerpt_read_more' ) ) :
/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function siteorigin_unwind_excerpt_read_more( $more ) {
    return '...';
}
endif;
add_filter( 'excerpt_more', 'siteorigin_unwind_excerpt_read_more' );
