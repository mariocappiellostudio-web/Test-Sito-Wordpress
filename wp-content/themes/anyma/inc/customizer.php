<?php
/**
 * ANyMA Customizer — Pannello completo con live preview
 */

function anyma_customizer_register( WP_Customize_Manager $wp_customize ): void {

    /* ── Main Panel ─────────────────────────────────────────── */
    $wp_customize->add_panel('anyma_panel', [
        'title'       => __('ANyMA — Impostazioni', 'anyma'),
        'description' => __('Personalizza ogni aspetto del sito ANyMA', 'anyma'),
        'priority'    => 10,
    ]);

    /* SEZIONE 1 — IDENTITÀ */
    $wp_customize->add_section('anyma_identity', [
        'title' => __('Identità & Brand', 'anyma'),
        'panel' => 'anyma_panel',
    ]);
    $wp_customize->add_setting('anyma_property_name', ['default'=>'ANyMA','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_property_name', ['label'=>__('Nome Proprietà','anyma'),'section'=>'anyma_identity','type'=>'text']);
    $wp_customize->add_setting('anyma_tagline', ['default'=>'Casa Vacanze','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_tagline', ['label'=>__('Sotto-nome (es. Casa Vacanze)','anyma'),'section'=>'anyma_identity','type'=>'text']);
    $wp_customize->add_setting('anyma_tagline_long', ['default'=>'Marina della Lobra · Massa Lubrense','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_tagline_long', ['label'=>__('Tagline lunga','anyma'),'section'=>'anyma_identity','type'=>'text']);

    /* SEZIONE 2 — COLORI */
    $wp_customize->add_section('anyma_colors', [
        'title' => __('Colori', 'anyma'),
        'panel' => 'anyma_panel',
    ]);
    foreach ([
        'anyma_color_gold'  => ['#b8953f', __('Colore Oro (CTA, accenti)','anyma')],
        'anyma_color_navy'  => ['#1a2744', __('Colore Blu Scuro','anyma')],
        'anyma_color_sand'  => ['#f5f0e8', __('Colore Sabbia (sfondi)','anyma')],
    ] as $id => [$default, $label]) {
        $wp_customize->add_setting($id, ['default'=>$default,'transport'=>'postMessage','sanitize_callback'=>'sanitize_hex_color']);
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $id, ['label'=>$label,'section'=>'anyma_colors']));
    }

    /* SEZIONE 3 — HERO HOME */
    $wp_customize->add_section('anyma_hero', [
        'title' => __('Hero Homepage', 'anyma'),
        'panel' => 'anyma_panel',
    ]);
    $wp_customize->add_setting('anyma_hero_image', ['default'=>'','sanitize_callback'=>'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anyma_hero_image', ['label'=>__('Immagine Hero (sfondo)','anyma'),'section'=>'anyma_hero']));
    $wp_customize->add_setting('anyma_hero_eyebrow', ['default'=>'Marina della Lobra · Massa Lubrense','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_hero_eyebrow', ['label'=>__('Testo piccolo sopra il titolo','anyma'),'section'=>'anyma_hero','type'=>'text']);
    $wp_customize->add_setting('anyma_hero_title', ['default'=>'Svegliarsi con il profumo del mare','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_hero_title', ['label'=>__('Titolo Hero','anyma'),'section'=>'anyma_hero','type'=>'text']);
    $wp_customize->add_setting('anyma_hero_subtitle', ['default'=>'Un rifugio mediterraneo a due passi dal porto di Lobra','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_hero_subtitle', ['label'=>__('Sottotitolo Hero','anyma'),'section'=>'anyma_hero','type'=>'textarea']);
    $wp_customize->add_setting('anyma_hero_cta1_label', ['default'=>'Scopri l\'appartamento','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_hero_cta1_label', ['label'=>__('CTA 1 — Testo','anyma'),'section'=>'anyma_hero','type'=>'text']);
    $wp_customize->add_setting('anyma_hero_cta2_label', ['default'=>'Prenota ora','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_hero_cta2_label', ['label'=>__('CTA 2 — Testo','anyma'),'section'=>'anyma_hero','type'=>'text']);
    $wp_customize->add_setting('anyma_hero_cta2_url', ['default'=>'','sanitize_callback'=>'esc_url_raw']);
    $wp_customize->add_control('anyma_hero_cta2_url', ['label'=>__('CTA 2 — URL (es. link Booking)','anyma'),'section'=>'anyma_hero','type'=>'url']);

    /* SEZIONE 4 — FEATURE STRIP */
    $wp_customize->add_section('anyma_features', [
        'title' => __('3 Punti di Forza', 'anyma'),
        'panel' => 'anyma_panel',
    ]);
    for ($i=1; $i<=3; $i++) {
        $defaults = [1=>['Spiaggia in 2 min','Esci di casa e in 2 minuti sei sulla sabbia di Marina della Lobra'],2=>['Vista Mare Panoramica','Finestre ampie con vista sul Golfo di Napoli'],3=>['Ristrutturato 2023','Interni moderni e curati, stile bianco e blu mediterraneo']];
        $wp_customize->add_setting("anyma_feat{$i}_title", ['default'=>$defaults[$i][0],'transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
        $wp_customize->add_control("anyma_feat{$i}_title", ['label'=>sprintf(__('Feature %d — Titolo','anyma'),$i),'section'=>'anyma_features','type'=>'text']);
        $wp_customize->add_setting("anyma_feat{$i}_text", ['default'=>$defaults[$i][1],'transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
        $wp_customize->add_control("anyma_feat{$i}_text", ['label'=>sprintf(__('Feature %d — Testo','anyma'),$i),'section'=>'anyma_features','type'=>'textarea']);
    }

    /* SEZIONE 5 — ABOUT */
    $wp_customize->add_section('anyma_about', [
        'title' => __('Sezione "Chi Siamo"', 'anyma'),
        'panel' => 'anyma_panel',
    ]);
    $wp_customize->add_setting('anyma_about_image', ['default'=>'','sanitize_callback'=>'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'anyma_about_image',['label'=>__('Immagine About','anyma'),'section'=>'anyma_about']));
    $wp_customize->add_setting('anyma_about_eyebrow', ['default'=>'La nostra storia','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_about_eyebrow', ['label'=>__('Testo sopra il titolo','anyma'),'section'=>'anyma_about','type'=>'text']);
    $wp_customize->add_setting('anyma_about_title', ['default'=>'L\'Anima di Sorrento','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_about_title', ['label'=>__('Titolo sezione','anyma'),'section'=>'anyma_about','type'=>'text']);
    $wp_customize->add_setting('anyma_about_text', ['default'=>"ANyMA non è solo un appartamento vacanze — è un'esperienza curata con cura per riconnettarti al ritmo autentico della vita costiera. Nel borgo tranquillo di Marina della Lobra, lontano dalla folla, offre un santuario di pace.\n\nOgni dettaglio — dalle materie tessili al modo in cui le finestre panoramiche incorniciano il blu del Golfo di Napoli — è stato studiato per evocare quell'intimità mediterranea dove il tempo rallenta.\n\n30 m² riprogettati nel 2023. Per 2 persone. Per chi vuole il mare, non il resort.",'transport'=>'postMessage','sanitize_callback'=>'wp_kses_post']);
    $wp_customize->add_control('anyma_about_text', ['label'=>__('Testo (usa doppio a-capo per paragrafi)','anyma'),'section'=>'anyma_about','type'=>'textarea']);

    /* SEZIONE 6 — APPARTAMENTO */
    $wp_customize->add_section('anyma_apartment', [
        'title' => __('Appartamento — Info', 'anyma'),
        'panel' => 'anyma_panel',
    ]);
    $wp_customize->add_setting('anyma_apt_sqm', ['default'=>'30','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_apt_sqm', ['label'=>__('Metratura (m²)','anyma'),'section'=>'anyma_apartment','type'=>'number']);
    $wp_customize->add_setting('anyma_apt_guests', ['default'=>'2','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_apt_guests', ['label'=>__('Ospiti max','anyma'),'section'=>'anyma_apartment','type'=>'number']);
    $wp_customize->add_setting('anyma_apt_bedrooms', ['default'=>'1','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_apt_bedrooms', ['label'=>__('Camere da letto','anyma'),'section'=>'anyma_apartment','type'=>'number']);
    $wp_customize->add_setting('anyma_apt_bathrooms', ['default'=>'1','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_apt_bathrooms', ['label'=>__('Bagni','anyma'),'section'=>'anyma_apartment','type'=>'number']);
    $wp_customize->add_setting('anyma_apt_year', ['default'=>'2023','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_apt_year', ['label'=>__('Anno ristrutturazione','anyma'),'section'=>'anyma_apartment','type'=>'number']);
    $wp_customize->add_setting('anyma_apt_parking_price', ['default'=>'20','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_apt_parking_price', ['label'=>__('Prezzo parcheggio (€/giorno, 0 = gratuito)','anyma'),'section'=>'anyma_apartment','type'=>'number']);
    $wp_customize->add_setting('anyma_apt_description', ['default'=>'','sanitize_callback'=>'wp_kses_post']);
    $wp_customize->add_control('anyma_apt_description', ['label'=>__('Descrizione lunga appartamento','anyma'),'section'=>'anyma_apartment','type'=>'textarea']);

    /* SEZIONE 7 — PREZZI */
    $wp_customize->add_section('anyma_pricing', [
        'title' => __('Prezzi & Disponibilità', 'anyma'),
        'panel' => 'anyma_panel',
    ]);
    $wp_customize->add_setting('anyma_price_low', ['default'=>'80','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_price_low', ['label'=>__('Prezzo bassa stagione (€/notte)','anyma'),'section'=>'anyma_pricing','type'=>'number']);
    $wp_customize->add_setting('anyma_price_mid', ['default'=>'120','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_price_mid', ['label'=>__('Prezzo media stagione (€/notte)','anyma'),'section'=>'anyma_pricing','type'=>'number']);
    $wp_customize->add_setting('anyma_price_high', ['default'=>'160','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_price_high', ['label'=>__('Prezzo alta stagione (€/notte)','anyma'),'section'=>'anyma_pricing','type'=>'number']);
    $wp_customize->add_setting('anyma_price_min_stay', ['default'=>'3','sanitize_callback'=>'absint']);
    $wp_customize->add_control('anyma_price_min_stay', ['label'=>__('Soggiorno minimo (notti)','anyma'),'section'=>'anyma_pricing','type'=>'number']);
    $wp_customize->add_setting('anyma_booking_url', ['default'=>'','sanitize_callback'=>'esc_url_raw']);
    $wp_customize->add_control('anyma_booking_url', ['label'=>__('URL Booking.com (per widget)','anyma'),'section'=>'anyma_pricing','type'=>'url']);
    $wp_customize->add_setting('anyma_airbnb_url', ['default'=>'','sanitize_callback'=>'esc_url_raw']);
    $wp_customize->add_control('anyma_airbnb_url', ['label'=>__('URL Airbnb listing','anyma'),'section'=>'anyma_pricing','type'=>'url']);
    $wp_customize->add_setting('anyma_direct_discount', ['default'=>'10','sanitize_callback'=>'absint']);
    $wp_customize->add_control('anyma_direct_discount', ['label'=>__('Sconto prenotazione diretta (%)','anyma'),'section'=>'anyma_pricing','type'=>'number']);

    /* SEZIONE 8 — RECENSIONI */
    $wp_customize->add_section('anyma_reviews', [
        'title' => __('Recensioni — Punteggi', 'anyma'),
        'panel' => 'anyma_panel',
    ]);
    $wp_customize->add_setting('anyma_review_score', ['default'=>'9.8','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_review_score', ['label'=>__('Punteggio medio (es. 9.8)','anyma'),'section'=>'anyma_reviews','type'=>'text']);
    $wp_customize->add_setting('anyma_review_count', ['default'=>'47','transport'=>'postMessage','sanitize_callback'=>'absint']);
    $wp_customize->add_control('anyma_review_count', ['label'=>__('Numero totale recensioni','anyma'),'section'=>'anyma_reviews','type'=>'number']);
    $wp_customize->add_setting('anyma_review_badge', ['default'=>'Ospitalità Eccezionale','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_review_badge', ['label'=>__('Badge Booking.com','anyma'),'section'=>'anyma_reviews','type'=>'text']);

    /* SEZIONE 9 — CONTATTI & SOCIAL */
    $wp_customize->add_section('anyma_contacts', [
        'title' => __('Contatti & Social', 'anyma'),
        'panel' => 'anyma_panel',
    ]);
    $fields = [
        'anyma_phone'     => ['+39 081 000 0000', __('Telefono','anyma'), 'text'],
        'anyma_email'     => ['info@casavacanzeanyma.com', __('Email','anyma'), 'email'],
        'anyma_whatsapp'  => ['+393901234567', __('WhatsApp (numero con prefisso, no spazi)','anyma'), 'text'],
        'anyma_address'   => ['Via Marina della Lobra, Massa Lubrense (NA)', __('Indirizzo','anyma'), 'text'],
        'anyma_checkin'   => ['15:00', __('Check-in dalle','anyma'), 'text'],
        'anyma_checkout'  => ['11:00', __('Check-out entro','anyma'), 'text'],
        'anyma_instagram' => ['', __('Instagram URL','anyma'), 'url'],
        'anyma_facebook'  => ['', __('Facebook URL','anyma'), 'url'],
    ];
    foreach ($fields as $id => [$default, $label, $type]) {
        $wp_customize->add_setting($id, ['default'=>$default,'sanitize_callback'=>$type==='url'?'esc_url_raw':'sanitize_text_field']);
        $wp_customize->add_control($id, ['label'=>$label,'section'=>'anyma_contacts','type'=>$type]);
    }

    /* SEZIONE 10 — STICKY BAR */
    $wp_customize->add_section('anyma_stickybar', [
        'title' => __('Barra Prenotazione Sticky', 'anyma'),
        'panel' => 'anyma_panel',
    ]);
    $wp_customize->add_setting('anyma_sticky_text', ['default'=>'Prenota diretto e risparmia il {discount}%','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_sticky_text', ['label'=>__('Testo barra (usa {discount} per la %)','anyma'),'section'=>'anyma_stickybar','type'=>'text']);
    $wp_customize->add_setting('anyma_sticky_cta', ['default'=>'Controlla disponibilità','transport'=>'postMessage','sanitize_callback'=>'sanitize_text_field']);
    $wp_customize->add_control('anyma_sticky_cta', ['label'=>__('Testo CTA sticky','anyma'),'section'=>'anyma_stickybar','type'=>'text']);
    $wp_customize->add_setting('anyma_sticky_enabled', ['default'=>'1','sanitize_callback'=>'absint']);
    $wp_customize->add_control('anyma_sticky_enabled', ['label'=>__('Mostra barra sticky','anyma'),'section'=>'anyma_stickybar','type'=>'checkbox']);

    /* ── Selective refresh bindings ─────────────────────────── */
    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('anyma_hero_title',    ['selector'=>'.hero__title',  'render_callback'=>fn()=>esc_html(get_theme_mod('anyma_hero_title','Svegliarsi con il profumo del mare'))]);
        $wp_customize->selective_refresh->add_partial('anyma_hero_subtitle', ['selector'=>'.hero__sub',    'render_callback'=>fn()=>esc_html(get_theme_mod('anyma_hero_subtitle',''))]);
        $wp_customize->selective_refresh->add_partial('anyma_property_name', ['selector'=>'.site-name',    'render_callback'=>fn()=>esc_html(get_theme_mod('anyma_property_name','ANyMA'))]);
    }
}
add_action( 'customize_register', 'anyma_customizer_register' );

/* ── postMessage JS preview ──────────────────────────────────── */
function anyma_customizer_preview_js(): void {
    wp_enqueue_script('anyma-customizer-preview', ANYMA_URI.'/assets/js/customizer-preview.js', ['customize-preview'], ANYMA_VERSION, true);
}
add_action('customize_preview_init', 'anyma_customizer_preview_js');
