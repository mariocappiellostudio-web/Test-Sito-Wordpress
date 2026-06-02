<?php
/**
 * ANyMA Casa Vacanze - functions.php
 *
 * @package ANyMA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'ANYMA_VERSION' ) ) {
	define( 'ANYMA_VERSION', '1.0.0' );
}

/**
 * Theme setup.
 */
function anyma_setup() {
	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Featured images.
	add_theme_support( 'post-thumbnails' );

	// HTML5 markup.
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	// Custom logo support.
	add_theme_support( 'custom-logo' );

	// Automatic feed links.
	add_theme_support( 'automatic-feed-links' );

	// Register navigation menus.
	register_nav_menus(
		array(
			'primary' => __( 'Menu Principale', 'anyma' ),
			'footer'  => __( 'Menu Footer', 'anyma' ),
		)
	);
}
add_action( 'after_setup_theme', 'anyma_setup' );

/**
 * Enqueue styles and scripts.
 */
function anyma_assets() {
	// Google Fonts.
	wp_enqueue_style(
		'anyma-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap',
		array(),
		null
	);

	// Theme header style (WordPress requires it).
	wp_enqueue_style(
		'anyma-style',
		get_stylesheet_uri(),
		array(),
		ANYMA_VERSION
	);

	// Main stylesheet.
	wp_enqueue_style(
		'anyma-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array( 'anyma-style' ),
		ANYMA_VERSION
	);

	// Main script.
	wp_enqueue_script(
		'anyma-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		ANYMA_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'anyma_assets' );

/**
 * Register widget area.
 */
function anyma_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar Principale', 'anyma' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Widget area visualizzata nelle pagine generiche.', 'anyma' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'anyma_widgets_init' );

/**
 * Fallback menu when no menu assigned to primary location.
 */
function anyma_default_menu() {
	$items = array(
		'#apartment' => __( 'Appartamento', 'anyma' ),
		'#gallery'   => __( 'Galleria', 'anyma' ),
		'#area'      => __( 'Zona', 'anyma' ),
		'#reviews'   => __( 'Recensioni', 'anyma' ),
		'#contact'   => __( 'Contatti', 'anyma' ),
	);
	echo '<ul id="primary-menu" class="nav-menu">';
	foreach ( $items as $url => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_attr( $url ), esc_html( $label ) );
	}
	echo '</ul>';
}

/**
 * Add a body class on templates that carry a full-screen hero,
 * so the header can render with a transparent/light variant.
 *
 * @param array $classes Existing body classes.
 * @return array
 */
function anyma_body_classes( $classes ) {
	if ( is_front_page() || is_page_template( 'front-page.php' ) ) {
		$classes[] = 'has-hero';
	}
	return $classes;
}
add_filter( 'body_class', 'anyma_body_classes' );

/**
 * Render a star rating string (5 chars), filled count given.
 *
 * @param int $filled Filled stars.
 * @return string
 */
function anyma_stars( $filled = 5 ) {
	$out = '<span class="stars" aria-label="' . esc_attr( $filled ) . '/5">';
	for ( $i = 1; $i <= 5; $i++ ) {
		$out .= '<span class="star' . ( $i <= $filled ? ' filled' : '' ) . '">&#9733;</span>';
	}
	return $out . '</span>';
}
