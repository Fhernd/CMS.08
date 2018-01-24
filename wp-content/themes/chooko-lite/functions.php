<?php
/**
 *
 * Chooko Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2013-2017 Mathieu Sarrasin - Iceable Media
 *
 * Theme's Function
 *
 */

/*
 * Theme constants
 */
define( 'CHOOKO_THEME_DIR', get_template_directory() );
define( 'CHOOKO_THEME_DIR_URI', get_template_directory_uri() );
define( 'CHOOKO_STYLESHEET_DIR', get_stylesheet_directory() );
define( 'CHOOKO_STYLESHEET_DIR_URI', get_stylesheet_directory_uri() );
$chooko_the_theme = wp_get_theme();
define( 'CHOOKO_THEME_VERSION', $chooko_the_theme->get( 'Version' ) );

/*
 * Setup and registration functions
 */
function chooko_setup() {

	/* Set default $content_width */
	global $content_width;
	if ( ! isset( $content_width ) ) :
		$content_width = 680;
	endif;

	/* Translation support
	 * Translations can be added to the /languages directory.
	 * A .pot template file is included to get you started
	 */
	load_theme_textdomain( 'chooko-lite', CHOOKO_THEME_DIR . '/languages' );

	/* Feed links support */
	add_theme_support( 'automatic-feed-links' );

	/* Register Primary menu */
	register_nav_menu( 'primary', 'Navigation menu' );
	register_nav_menu( 'footer-menu', 'Footer menu' );

	/* Title tag support */
	add_theme_support( 'title-tag' );

	/* Post Thumbnails Support */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 260, 260, true );

	/* Custom header support */
	add_theme_support(
		'custom-header',
		array(
			'header-text' => false,
			'width'       => 962,
			'height'      => 400,
			'flex-height' => true,
		)
	);

	/* Custom background support */
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5f2f0',
			'default-image' => CHOOKO_THEME_DIR_URI . '/img/ricepaper2.png',
		)
	);

	/* Support HTML5 Search Form */
	add_theme_support( 'html5', array( 'search-form' ) );

}
add_action( 'after_setup_theme', 'chooko_setup' );

/* Adjust $content_width it depending on the page being displayed */
function chooko_content_width() {
	global $content_width;
	if ( is_page_template( 'page-full-width.php' ) ) :
		$content_width = 920;
	endif;
}
add_action( 'template_redirect', 'chooko_content_width' );

/*
 * Add a home link to wp_page_menu() ( wp_nav_menu() fallback )
 */
function chooko_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) ) :
		$args['show_home'] = true;
	endif;
	return $args;
}
add_filter( 'wp_page_menu_args', 'chooko_page_menu_args' );

/*
 * Add parent Class to parent menu items
 */
function chooko_add_menu_parent_class( $items ) {

	$parents = array();

	foreach ( $items as $item ) :
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) :
			$parents[] = $item->menu_item_parent;
		endif;
	endforeach;

	foreach ( $items as $item ) :
		if ( in_array( $item->ID, $parents, true ) ) :
			$item->classes[] = 'menu-parent-item';
		endif;
	endforeach;

	return $items;

}
add_filter( 'wp_nav_menu_objects', 'chooko_add_menu_parent_class' );


/*
 * Register Sidebar and Footer widgetized areas
 */
function chooko_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Default Sidebar', 'chooko-lite' ),
			'id'            => 'sidebar',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'chooko-lite' ),
			'id'            => 'footer-sidebar',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

}
add_action( 'widgets_init', 'chooko_widgets_init' );


/*
 * Enqueue CSS styles
 */
function chooko_styles() {

	$responsive_mode = get_theme_mod( 'chooko_responsive_mode' );

	if ( 'off' !== $responsive_mode ) :
		$stylesheet = '/css/chooko.min.css';
	else :
		$stylesheet = '/css/chooko-unresponsive.min.css';
	endif;

	/* Child theme support:
	 * Enqueue child-theme's versions of stylesheet in /css if they exist,
	 * or the parent theme's version otherwise
	 */
	wp_register_style( 'chooko', get_theme_file_uri( $stylesheet ), array(), CHOOKO_THEME_VERSION );

	// Enqueue style.css from the current theme
	wp_register_style( 'chooko-style', get_theme_file_uri( '/style.css' ), array(), CHOOKO_THEME_VERSION );

	wp_enqueue_style( 'chooko' );
	wp_enqueue_style( 'chooko-style' );

	// Google Webfonts
	wp_enqueue_style( 'chooko-ptsans', '//fonts.googleapis.com/css?family=PT+Sans:400italic,700italic,400,700&subset=latin,latin-ext', array(), null );

}
add_action( 'wp_enqueue_scripts', 'chooko_styles' );

/*
 * Register editor style
 */
function chooko_editor_styles() {
	add_editor_style( 'css/editor-style.css' );
}
add_action( 'init', 'chooko_editor_styles' );

/*
 * Enqueue Javascripts
 */
function chooko_scripts() {

	wp_enqueue_script( 'chooko', get_theme_file_uri( '/js/chooko.min.js' ), array( 'jquery', 'hoverIntent' ), CHOOKO_THEME_VERSION );
	// Loads HTML5 JavaScript file to add support for HTML5 elements for IE < 9.
	wp_enqueue_script( 'html5shiv', get_theme_file_uri( '/js/html5.js' ), array(), CHOOKO_THEME_VERSION );

	// Add conditional for HTML5Shiv to only load for IE < 9
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	/* Threaded comments support */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) :
		wp_enqueue_script( 'comment-reply' );
	endif;

}
add_action( 'wp_enqueue_scripts', 'chooko_scripts' );

/*
 * Remove hentry class from static pages
 */
function chooko_remove_hentry( $classes ) {

	if ( is_page() ) :
		$classes = array_diff( $classes, array( 'hentry' ) );
	endif;

	return $classes;

}
add_filter( 'post_class','chooko_remove_hentry' );

/*
 * Remove "rel" tags in category links (HTML5 invalid)
 */
function chooko_remove_rel_cat( $text ) {
	$text = str_replace( ' rel="category"', '', $text );
	$text = str_replace( ' rel="category tag"', ' rel="tag"', $text );
	return $text;
}
add_filter( 'the_category', 'chooko_remove_rel_cat' );

/*
 * Customize "Read More" links on index view
 */
function chooko_excerpt_more( $more ) {
	global $post;
	return '... <div class="read-more"><a href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'chooko-lite' ) . '</a></div>';
}
add_filter( 'excerpt_more', 'chooko_excerpt_more' );

function chooko_content_more( $more ) {
	global $post;
	return '<div class="read-more"><a href="' . get_permalink() . '#more-' . $post->ID . '">' . __( 'Read More', 'chooko-lite' ) . '</a></div>';
}
add_filter( 'the_content_more_link', 'chooko_content_more' );

/*
 * Rewrite and replace wp_trim_excerpt() so it adds a relevant read more link
 * when the <!--more--> or <!--nextpage--> quicktags are used
 * This new function preserves every features and filters from the original wp_trim_excerpt
 */
function chooko_trim_excerpt( $text = '' ) {

	global $post;
	$raw_excerpt = $text;

	if ( '' === $text ) :

		$text = get_the_content( '' );
		$text = strip_shortcodes( $text );
		$text = apply_filters( 'the_content', $text );
		$text = str_replace( ']]>', ']]&gt;', $text );
		$excerpt_length = apply_filters( 'excerpt_length', 55 );
		$excerpt_more = apply_filters( 'excerpt_more', ' [...]' );
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );

		/* If the post_content contains a <!--more--> OR a <!--nextpage--> quicktag
		 * AND the more link has not been added already
		 * then we add it now
		 */
		if (
			(
				preg_match( '/<!--more(.*?)?-->/', $post->post_content )
				|| preg_match( '/<!--nextpage-->/', $post->post_content )
			)
			&& strpos( $text, $excerpt_more ) === false
		) :
			$text .= $excerpt_more;
		endif;

	endif;

	return apply_filters( 'chooko_trim_excerpt', $text, $raw_excerpt );

}
remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'chooko_trim_excerpt' );

/*
 * Create dropdown menu (used in responsive mode)
 * Requires a custom menu to be set (won't work with fallback menu)
 */
function chooko_dropdown_nav_menu() {

	$menu_name = 'primary';
	$locations = get_nav_menu_locations();

	if ( ( $locations ) && isset( $locations[ $menu_name ] ) ) :

		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

		if ( $menu ) :
			$menu_items = wp_get_nav_menu_items( $menu->term_id );
			$menu_list = '<select id="dropdown-menu">';
			$menu_list .= '<option value="">Menu</option>';
			foreach ( (array) $menu_items as $key => $menu_item ) :
				$title = $menu_item->title;
				$url = $menu_item->url;
				if ( $menu_item->menu_item_parent && $menu_item->menu_item_parent > 0 ) :
					$menu_list .= '<option value="' . $url . '"> &raquo; ' . $title . '</option>';
				else :
					$menu_list .= '<option value="' . $url . '">' . $title . '</option>';
				endif;
			endforeach;
			$menu_list .= '</select>';
			// $menu_list now ready to output
			echo $menu_list; // WPCS: XSS ok.
		endif;
	endif;
}

/*
 * Find whether post page needs comments pagination links (used in comments.php)
 */
function chooko_page_has_comments_nav() {
	global $wp_query;
	return ($wp_query->max_num_comment_pages > 1);
}

function chooko_page_has_next_comments_link() {
	global $wp_query;
	$max_cpage = $wp_query->max_num_comment_pages;
	$cpage = get_query_var( 'cpage' );
	return ( $max_cpage > $cpage );
}

function chooko_page_has_previous_comments_link() {
	$cpage = get_query_var( 'cpage' );
	return ($cpage > 1);
}

/*
 * Find whether attachement page needs navigation links (used in single.php)
 */
function chooko_adjacent_image_link( $prev = true ) {

	global $post;
	$the_post = get_post( $post );
	$attachments = array_values(
		get_children(
			'post_parent=' . $the_post->post_parent . '&post_type=attachment&post_mime_type=image&orderby="menu_order ASC, ID ASC"'
		)
	);

	foreach ( $attachments as $k => $attachment ) :

		if ( $attachment->ID === $post->ID ) :
			break;
		endif;

		$k = $prev ? $k - 1 : $k + 1;

	endforeach;

	if ( isset( $attachments[ $k ] ) ) :
		return true;
	else :
		return false;
	endif;

}

/*
 * Customizer
 */

require_once 'inc/customizer/customizer.php';
