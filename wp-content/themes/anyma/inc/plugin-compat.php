<?php
/**
 * ANyMA Plugin Compatibility
 * Hooks per: Contact Form 7, ACF, Yoast SEO, WooCommerce,
 * WP Rocket, Elementor, The Events Calendar, WPML
 */

/* ── Contact Form 7 ──────────────────────────────────────────── */
add_filter('wpcf7_autop_or_not', '__return_false');
add_filter('wpcf7_form_elements', function($content){ return $content; });

/* ── ACF (Advanced Custom Fields) ───────────────────────────── */
if (function_exists('get_field')) {
    function anyma_acf_field(string $key, string $fallback=''): string {
        $val = get_field($key);
        return $val ? esc_html($val) : esc_html($fallback);
    }
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(['page_title'=>'ANyMA Options','menu_title'=>'ANyMA','menu_slug'=>'anyma-options','capability'=>'edit_posts','redirect'=>false]);
    }
}

/* ── Yoast SEO ───────────────────────────────────────────────── */
add_filter('wpseo_breadcrumb_single_link', function($link){ return $link; });
add_filter('wpseo_json_ld_output', '__return_true');

/* ── WooCommerce ─────────────────────────────────────────────── */
if (class_exists('WooCommerce')) {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
    remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end',10);
    add_action('woocommerce_before_main_content', function(){ echo '<main class="woo-main container section">'; }, 10);
    add_action('woocommerce_after_main_content',  function(){ echo '</main>'; }, 10);
}

/* ── WP Rocket ───────────────────────────────────────────────── */
add_filter('rocket_defer_inline_exclusions', function($exclusions){
    $exclusions[] = 'anymaData';
    return $exclusions;
});
add_filter('rocket_critical_css_process_exclusions', function($exclusions){
    $exclusions[] = 'anyma-fonts';
    return $exclusions;
});

/* ── Elementor ───────────────────────────────────────────────── */
add_action('elementor/theme/register_conditions', function(){});
if (did_action('elementor/loaded')) {
    add_action('elementor/theme/register_locations', function($manager){
        $manager->register_all_core_location();
    });
}

/* ── WPML ────────────────────────────────────────────────────── */
if (defined('ICL_LANGUAGE_CODE')) {
    function anyma_current_lang(): string { return ICL_LANGUAGE_CODE; }
} else {
    function anyma_current_lang(): string { return get_locale() === 'it_IT' ? 'it' : 'en'; }
}

/* ── Rank Math SEO ───────────────────────────────────────────── */
add_filter('rank_math/frontend/breadcrumb/args', function($args){ return $args; });

/* ── Custom Post Type per Recensioni & Galleria ──────────────── */
function anyma_register_cpt(): void {
    register_post_type('anyma_review', [
        'labels'        => ['name'=>__('Recensioni','anyma'),'singular_name'=>__('Recensione','anyma'),'add_new_item'=>__('Aggiungi Recensione','anyma'),'edit_item'=>__('Modifica Recensione','anyma')],
        'public'        => false,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'show_in_rest'  => true,
        'supports'      => ['title','editor','thumbnail'],
        'menu_icon'     => 'dashicons-star-filled',
        'menu_position' => 25,
    ]);
    register_post_type('anyma_gallery_item', [
        'labels'       => ['name'=>__('Galleria','anyma'),'singular_name'=>__('Foto','anyma'),'add_new_item'=>__('Aggiungi Foto','anyma')],
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'supports'     => ['title','thumbnail'],
        'menu_icon'    => 'dashicons-format-image',
        'menu_position'=> 26,
    ]);
}
add_action('init', 'anyma_register_cpt');

/* ── Custom Meta per Recensioni ──────────────────────────────── */
function anyma_review_meta_boxes(): void {
    add_meta_box('anyma_review_meta','Dettagli Recensione','anyma_review_meta_cb','anyma_review','normal','high');
    add_meta_box('anyma_gallery_meta','Dettagli Foto','anyma_gallery_meta_cb','anyma_gallery_item','normal','high');
}
add_action('add_meta_boxes','anyma_review_meta_boxes');

function anyma_review_meta_cb(WP_Post $post): void {
    wp_nonce_field('anyma_review_save','anyma_review_nonce');
    $fields = ['anyma_guest_name'=>['Ospite (nome)','text'],'anyma_guest_origin'=>['Provenienza','text'],'anyma_rating'=>['Stelle (1-5)','number'],'anyma_platform'=>['Piattaforma','select-platform'],'anyma_date'=>['Data','date'],'anyma_owner_reply'=>['Risposta host','textarea']];
    echo '<table class="form-table">';
    foreach ($fields as $key => [$label, $type]) {
        $val = esc_attr(get_post_meta($post->ID,$key,true));
        echo "<tr><th><label for='{$key}'>{$label}</label></th><td>";
        if ($type==='textarea') echo "<textarea id='{$key}' name='{$key}' rows='3' style='width:100%'>".esc_textarea(get_post_meta($post->ID,$key,true))."</textarea>";
        elseif ($type==='select-platform') { echo "<select id='{$key}' name='{$key}'><option value='booking'".selected($val,'booking',false).">Booking.com</option><option value='airbnb'".selected($val,'airbnb',false).">Airbnb</option><option value='direct'".selected($val,'direct',false).">Diretto</option></select>"; }
        else echo "<input type='{$type}' id='{$key}' name='{$key}' value='{$val}' style='width:100%' ".($type==='number'?'min=1 max=5':'').">";
        echo '</td></tr>';
    }
    echo '</table>';
}

function anyma_review_meta_save(int $post_id): void {
    if (!isset($_POST['anyma_review_nonce']) || !wp_verify_nonce($_POST['anyma_review_nonce'],'anyma_review_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    foreach (['anyma_guest_name','anyma_guest_origin','anyma_rating','anyma_platform','anyma_date','anyma_owner_reply'] as $key) {
        if (isset($_POST[$key])) update_post_meta($post_id,$key,sanitize_text_field($_POST[$key]));
    }
}
add_action('save_post_anyma_review','anyma_review_meta_save');

function anyma_gallery_meta_cb(WP_Post $post): void {
    wp_nonce_field('anyma_gallery_save','anyma_gallery_nonce');
    $cat = esc_attr(get_post_meta($post->ID,'anyma_gallery_category',true));
    $alt = esc_attr(get_post_meta($post->ID,'anyma_gallery_alt',true));
    echo '<table class="form-table">';
    echo "<tr><th>Categoria</th><td><select name='anyma_gallery_category'><option value='appartamento'".selected($cat,'appartamento',false).">Appartamento</option><option value='vista'".selected($cat,'vista',false).">Vista</option><option value='marina'".selected($cat,'marina',false).">Marina</option><option value='dintorni'".selected($cat,'dintorni',false).">Dintorni</option></select></td></tr>";
    echo "<tr><th>Alt text</th><td><input type='text' name='anyma_gallery_alt' value='{$alt}' style='width:100%'></td></tr>";
    echo '</table>';
}
add_action('save_post_anyma_gallery_item', function(int $post_id){
    if (!isset($_POST['anyma_gallery_nonce'])||!wp_verify_nonce($_POST['anyma_gallery_nonce'],'anyma_gallery_save')) return;
    foreach (['anyma_gallery_category','anyma_gallery_alt'] as $k) {
        if (isset($_POST[$k])) update_post_meta($post_id,$k,sanitize_text_field($_POST[$k]));
    }
});
