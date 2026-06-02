<?php
/* Template Name: Appartamento */
get_header();

$sqm      = anyma_get_mod('anyma_apt_sqm','30');
$guests   = anyma_get_mod('anyma_apt_guests','2');
$bedrooms = anyma_get_mod('anyma_apt_bedrooms','1');
$baths    = anyma_get_mod('anyma_apt_bathrooms','1');
$year     = anyma_get_mod('anyma_apt_year','2023');
$parking  = absint(get_theme_mod('anyma_apt_parking_price','20'));
$apt_desc = get_theme_mod('anyma_apt_description','');
$avail_url= esc_url(home_url('/disponibilita'));
?>

<main id="main" class="site-main page-apartment">

  <section class="page-hero" aria-label="Appartamento" style="background-image:url('https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=1600&q=80')">
    <div class="page-hero__overlay" aria-hidden="true"></div>
    <div class="container page-hero__content">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home','anyma'); ?></a>
        <span aria-hidden="true">/</span>
        <span aria-current="page"><?php esc_html_e('Appartamento','anyma'); ?></span>
      </nav>
      <h1 class="page-hero__title"><?php esc_html_e('L\'Appartamento','anyma'); ?></h1>
      <p class="page-hero__sub"><?php esc_html_e('Un nido mediterraneo per due, curato in ogni dettaglio','anyma'); ?></p>
    </div>
  </section>

  <!-- SPECS GRID -->
  <section class="section section-light" aria-label="Caratteristiche">
    <div class="container">
      <div class="specs-grid">
        <div class="spec-card" data-reveal><span class="spec-card__icon"><?php echo anyma_icon('size'); ?></span><span class="spec-card__num"><?php echo $sqm; ?></span><span class="spec-card__label">m²</span></div>
        <div class="spec-card" data-reveal data-delay="100"><span class="spec-card__icon"><?php echo anyma_icon('users'); ?></span><span class="spec-card__num"><?php echo $guests; ?></span><span class="spec-card__label"><?php esc_html_e('Ospiti','anyma'); ?></span></div>
        <div class="spec-card" data-reveal data-delay="200"><span class="spec-card__icon"><?php echo anyma_icon('bed'); ?></span><span class="spec-card__num"><?php echo $bedrooms; ?></span><span class="spec-card__label"><?php esc_html_e('Camera','anyma'); ?></span></div>
        <div class="spec-card" data-reveal data-delay="300"><span class="spec-card__icon"><?php echo anyma_icon('bath'); ?></span><span class="spec-card__num"><?php echo $baths; ?></span><span class="spec-card__label"><?php esc_html_e('Bagno','anyma'); ?></span></div>
      </div>
    </div>
  </section>

  <!-- DESCRIPTION + VERTICAL GALLERY -->
  <section class="section apartment-desc" aria-label="Descrizione">
    <div class="container apartment-desc__grid">
      <div class="apartment-desc__gallery" data-reveal>
        <?php
        $imgs = [
          'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=600&q=80',
          'https://images.unsplash.com/photo-1560185007-cde436f6a4d0?w=600&q=80',
          'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=600&q=80',
        ];
        foreach($imgs as $im): ?>
          <a href="<?php echo esc_url($im); ?>" class="gallery-item" data-lightbox="apt"><img src="<?php echo esc_url($im); ?>" alt="<?php esc_attr_e('Appartamento ANyMA','anyma'); ?>" loading="lazy"></a>
        <?php endforeach; ?>
      </div>
      <div class="apartment-desc__content" data-reveal data-delay="100">
        <p class="eyebrow"><?php esc_html_e('Ristrutturato nel','anyma'); ?> <?php echo $year; ?></p>
        <h2 class="section-title"><?php esc_html_e('Vivere il mare, ogni giorno','anyma'); ?></h2>
        <div class="rich-text">
          <?php if($apt_desc): ?>
            <?php echo wp_kses_post(wpautop($apt_desc)); ?>
          <?php else: ?>
            <p><?php esc_html_e('Un open space luminoso di '.$sqm.' m² pensato per due persone, con finiture moderne in tinte bianco e blu mediterraneo. Ogni elemento è stato scelto per offrirti comfort senza rinunciare al fascino autentico della costa.','anyma'); ?></p>
            <p><?php esc_html_e('La zona giorno si apre sulla luce del Golfo, la cucina è completamente attrezzata e il letto comodo ti accompagna in notti di relax cullato dal suono del mare.','anyma'); ?></p>
          <?php endif; ?>
        </div>
        <a href="<?php echo $avail_url; ?>" class="btn btn-gold"><?php esc_html_e('Controlla disponibilità','anyma'); ?> <?php echo anyma_icon('arrow'); ?></a>
      </div>
    </div>
  </section>

  <!-- SERVICES GRID -->
  <section class="section section-sand" aria-label="Servizi">
    <div class="container">
      <div class="section-head text-center" data-reveal>
        <p class="eyebrow"><?php esc_html_e('Comfort','anyma'); ?></p>
        <h2 class="section-title"><?php esc_html_e('Tutti i servizi','anyma'); ?></h2>
      </div>
      <div class="amenities-grid" data-reveal>
        <?php
        $amenities = [
          ['wifi','Wi-Fi gratuito'],['kitchen','Cucina attrezzata'],['ac','Aria condizionata'],
          ['bath','Bagno privato'],['sea','Vista mare'],['bed','Biancheria inclusa'],
          ['breakfast','Set caffè & tè'],['entrance','Ingresso indipendente'],['nosmoking','Non fumatori'],
          ['shop','Negozi vicini'],['beach','Spiaggia a 2 min'],
          [$parking>0?'car':'car', $parking>0 ? 'Parcheggio '.$parking.'€/giorno' : 'Parcheggio gratuito'],
        ];
        foreach($amenities as [$ic,$lbl]): ?>
          <div class="amenity"><span class="amenity__icon"><?php echo anyma_icon($ic); ?></span><span class="amenity__label"><?php echo esc_html($lbl); ?></span></div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- APARTMENT GALLERY -->
  <section class="section" aria-label="Galleria appartamento">
    <div class="container">
      <div class="section-head text-center" data-reveal>
        <h2 class="section-title"><?php esc_html_e('Galleria','anyma'); ?></h2>
      </div>
      <div class="gallery-masonry" data-reveal>
        <?php
        $gallery_posts = get_posts(['post_type'=>'anyma_gallery_item','posts_per_page'=>9,'orderby'=>'menu_order','order'=>'ASC']);
        if ($gallery_posts):
          foreach($gallery_posts as $gp):
            $thumb=get_the_post_thumbnail_url($gp->ID,'large'); if(!$thumb) continue;
            $alt=get_post_meta($gp->ID,'anyma_gallery_alt',true) ?: get_the_title($gp->ID); ?>
            <a href="<?php echo esc_url($thumb); ?>" class="gallery-item" data-lightbox="apt-full"><img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" loading="lazy"></a>
        <?php endforeach;
        else:
          $cols=['#c5d5e8','#a8c5da','#e8d5c5','#d5e8c5','#d5c5e8','#e8c5d5','#c5e8e0','#e8e0c5','#dcc5e8'];
          foreach($cols as $i=>$c): ?>
            <div class="gallery-item gallery-item--ph" style="background-color:<?php echo $c; ?>" role="img" aria-label="Foto <?php echo $i+1; ?>"></div>
        <?php endforeach; endif; ?>
      </div>
    </div>
  </section>

  <!-- STICKY MOBILE CTA -->
  <div class="apt-sticky-cta">
    <a href="<?php echo $avail_url; ?>" class="btn btn-gold btn--block"><?php esc_html_e('Controlla disponibilità','anyma'); ?> <?php echo anyma_icon('calendar'); ?></a>
  </div>

</main>

<?php get_footer(); ?>
