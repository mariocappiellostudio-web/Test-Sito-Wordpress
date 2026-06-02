<?php
/**
 * ANyMA Theme Functions
 */

define( 'ANYMA_VERSION', '2.0.0' );
define( 'ANYMA_DIR', get_template_directory() );
define( 'ANYMA_URI', get_template_directory_uri() );

/* ── Theme setup ──────────────────────────────────────────── */
function anyma_setup() {
    load_theme_textdomain( 'anyma', ANYMA_DIR . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', ['search-form','comment-form','comment-list','gallery','caption','style','script'] );
    add_theme_support( 'custom-logo', ['width'=>200,'height'=>60,'flex-width'=>true] );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );

    register_nav_menus([
        'primary'  => __( 'Menu Principale', 'anyma' ),
        'footer'   => __( 'Menu Footer', 'anyma' ),
        'mobile'   => __( 'Menu Mobile', 'anyma' ),
    ]);
}
add_action( 'after_setup_theme', 'anyma_setup' );

/* ── Enqueue ──────────────────────────────────────────────── */
function anyma_enqueue() {
    wp_enqueue_style( 'anyma-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Inter:wght@300;400;500;600&display=swap',
        [], null );
    wp_enqueue_style( 'anyma-main', ANYMA_URI . '/assets/css/main.css', ['anyma-fonts'], ANYMA_VERSION );
    wp_enqueue_script( 'anyma-main', ANYMA_URI . '/assets/js/main.js', [], ANYMA_VERSION, true );
    wp_localize_script( 'anyma-main', 'anymaData', [
        'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
        'nonce'     => wp_create_nonce( 'anyma_nonce' ),
        'whatsapp'  => esc_js( get_theme_mod( 'anyma_whatsapp', '' ) ),
        'homeUrl'   => esc_url( home_url( '/' ) ),
    ]);
}
add_action( 'wp_enqueue_scripts', 'anyma_enqueue' );

/* ── Customizer styles inline ─────────────────────────────── */
function anyma_customizer_inline_css() {
    $gold  = sanitize_hex_color( get_theme_mod( 'anyma_color_gold',  '#b8953f' ) );
    $navy  = sanitize_hex_color( get_theme_mod( 'anyma_color_navy',  '#1a2744' ) );
    $sand  = sanitize_hex_color( get_theme_mod( 'anyma_color_sand',  '#f5f0e8' ) );
    $css   = ":root{--color-gold:{$gold};--color-navy:{$navy};--color-sand:{$sand};}";
    wp_add_inline_style( 'anyma-main', $css );
}
add_action( 'wp_enqueue_scripts', 'anyma_customizer_inline_css', 20 );

/* ── Include files ────────────────────────────────────────── */
require_once ANYMA_DIR . '/inc/customizer.php';
require_once ANYMA_DIR . '/inc/plugin-compat.php';

/* ── Widgets ──────────────────────────────────────────────── */
function anyma_widgets_init() {
    register_sidebar(['name'=>__('Sidebar','anyma'),'id'=>'sidebar-1','before_widget'=>'<section class="widget %2$s">','after_widget'=>'</section>','before_title'=>'<h3 class="widget-title">','after_title'=>'</h3>']);
    register_sidebar(['name'=>__('Footer Col 1','anyma'),'id'=>'footer-1','before_widget'=>'<div class="widget %2$s">','after_widget'=>'</div>','before_title'=>'<h4 class="widget-title">','after_title'=>'</h4>']);
    register_sidebar(['name'=>__('Footer Col 2','anyma'),'id'=>'footer-2','before_widget'=>'<div class="widget %2$s">','after_widget'=>'</div>','before_title'=>'<h4 class="widget-title">','after_title'=>'</h4>']);
}
add_action( 'widgets_init', 'anyma_widgets_init' );

/* ── Helpers ──────────────────────────────────────────────── */
function anyma_stars( int $n = 5 ): string {
    return str_repeat( '<svg width="14" height="14" viewBox="0 0 14 14" fill="currentColor" aria-hidden="true"><path d="M7 1l1.545 3.13L12 4.635l-2.5 2.435.59 3.44L7 8.885l-3.09 1.625.59-3.44L2 4.635l3.455-.505z"/></svg>', $n );
}

function anyma_get_mod( string $key, string $default = '' ): string {
    return esc_html( get_theme_mod( $key, $default ) );
}

function anyma_icon( string $name ): string {
    $icons = [
        'wifi'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><circle cx="12" cy="20" r="1" fill="currentColor"/></svg>',
        'kitchen'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/><path d="M6 8h4v3H6zM14 8h4v3h-4z"/></svg>',
        'bed'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 4v16M2 8h20v12H2M2 12h20"/><path d="M6 12V8h4v4M14 12V8h4v4"/></svg>',
        'bath'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 12h16v3a4 4 0 0 1-4 4H8a4 4 0 0 1-4-4v-3z"/><path d="M6 12V5a2 2 0 0 1 2-2h0a2 2 0 0 1 2 2v1"/><path d="M4 15h16"/></svg>',
        'car'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M5 17H3v-2.5l2-4h14l2 4V17h-2"/><circle cx="7.5" cy="17.5" r="1.5"/><circle cx="16.5" cy="17.5" r="1.5"/></svg>',
        'ac'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="6" width="20" height="8" rx="2"/><path d="M7 14v4M12 14v4M17 14v4M6 10h12"/></svg>',
        'entrance' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M13 3h7v18h-7M9 17l-5-5 5-5M4 12h11"/></svg>',
        'nosmoking'=> '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="2" y1="2" x2="22" y2="22"/><path d="M3 14h10v2H3zM17 14h4v2h-4"/><path d="M18 10a2 2 0 0 0 0-4"/></svg>',
        'sea'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 18s3-2 6-2 6 2 9 2-3-4-6-4-6 4-9 4z"/><path d="M12 6a4 4 0 0 0 0-4"/><path d="M6 12a6 6 0 0 1 12 0"/></svg>',
        'breakfast'=> '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="2" x2="6" y2="4"/><line x1="10" y1="2" x2="10" y2="4"/><line x1="14" y1="2" x2="14" y2="4"/></svg>',
        'shop'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>',
        'beach'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2a8 8 0 0 1 8 8"/><path d="M12 2a8 8 0 0 0-8 8"/><path d="M12 2v20"/><path d="M20 10l-8 8"/><path d="M4 10l8 8"/><path d="M3 20h18"/></svg>',
        'map'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="3 6 9 3 15 6 21 3 21 18 15 21 9 18 3 21"/><line x1="9" y1="3" x2="9" y2="18"/><line x1="15" y1="6" x2="15" y2="21"/></svg>',
        'star'     => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01z"/></svg>',
        'phone'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.37 2 2 0 0 1 3.6 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.38a16 16 0 0 0 6 6l.94-.94a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.73 16l.29.92z"/></svg>',
        'email'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>',
        'clock'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12,6 12,12 16,14"/></svg>',
        'whatsapp' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>',
        'instagram'=> '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>',
        'facebook' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>',
        'check'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20,6 9,17 4,12"/></svg>',
        'arrow'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12,5 19,12 12,19"/></svg>',
        'close'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>',
        'menu'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>',
        'play'     => '<svg viewBox="0 0 24 24" fill="currentColor"><polygon points="5,3 19,12 5,21"/></svg>',
        'users'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
        'size'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="15,3 21,3 21,9"/><polyline points="9,21 3,21 3,15"/><line x1="21" y1="3" x2="14" y2="10"/><line x1="3" y1="21" x2="10" y2="14"/></svg>',
        'calendar' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>',
        'pin'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
        'boat'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 20a2.4 2.4 0 0 0 2 1 2.4 2.4 0 0 0 2-1 2.4 2.4 0 0 1 2-1 2.4 2.4 0 0 1 2 1 2.4 2.4 0 0 0 2 1 2.4 2.4 0 0 0 2-1 2.4 2.4 0 0 1 2-1 2.4 2.4 0 0 1 2 1"/><path d="M4 15l2-8h12l2 8z"/><path d="M12 3v4"/></svg>',
        'hiking'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M13 4a1 1 0 1 0 2 0 1 1 0 0 0-2 0z" fill="currentColor"/><path d="M9 20l1-4 3 2 1-7 3 9"/><path d="M8 8l2 4"/><path d="M17 8l-2 4"/></svg>',
        'snorkel'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="8" r="4"/><path d="M3 20c0-3.5 4-6 9-6s9 2.5 9 6"/><path d="M8 12l-2 4M16 12l2 4"/></svg>',
    ];
    $svg = $icons[$name] ?? '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>';
    return '<span class="icon icon--' . esc_attr($name) . '" aria-hidden="true">' . $svg . '</span>';
}
