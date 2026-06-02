<?php get_header(); ?>

<main id="main" class="site-main">

  <!-- HERO -->
  <?php
  $hero_img    = get_theme_mod('anyma_hero_image','');
  $hero_style  = $hero_img ? 'style="background-image:url('.esc_url($hero_img).')"' : 'style="background-image:url(https://images.unsplash.com/photo-1533104816931-20fa691ff6ca?w=1600&q=80)"';
  $hero_eyebrow= anyma_get_mod('anyma_hero_eyebrow','Marina della Lobra · Massa Lubrense');
  $hero_title  = anyma_get_mod('anyma_hero_title','Svegliarsi con il profumo del mare');
  $hero_sub    = anyma_get_mod('anyma_hero_subtitle','Un rifugio mediterraneo a due passi dal porto');
  $cta1_label  = anyma_get_mod('anyma_hero_cta1_label','Scopri l\'appartamento');
  $cta2_label  = anyma_get_mod('anyma_hero_cta2_label','Prenota ora');
  $cta2_url    = get_theme_mod('anyma_hero_cta2_url', home_url('/disponibilita'));
  $score       = anyma_get_mod('anyma_review_score','9.8');
  $rcount      = absint(get_theme_mod('anyma_review_count',47));
  $badge       = anyma_get_mod('anyma_review_badge','Ospitalità Eccezionale');
  ?>
  <section class="hero" <?php echo $hero_style; ?> aria-label="Hero">
    <div class="hero__overlay" aria-hidden="true"></div>
    <div class="container hero__content">
      <p class="hero__eyebrow" data-reveal data-delay="0"><?php echo esc_html($hero_eyebrow); ?></p>
      <h1 class="hero__title" data-reveal data-delay="100"><?php echo esc_html($hero_title); ?></h1>
      <p class="hero__sub" data-reveal data-delay="200"><?php echo esc_html($hero_sub); ?></p>
      <div class="hero__ctas" data-reveal data-delay="300">
        <a href="<?php echo esc_url(home_url('/appartamento')); ?>" class="btn btn-outline-white"><?php echo esc_html($cta1_label); ?></a>
        <a href="<?php echo esc_url($cta2_url ?: home_url('/disponibilita')); ?>" class="btn btn-gold"><?php echo esc_html($cta2_label); ?> <?php echo anyma_icon('arrow'); ?></a>
      </div>
      <div class="hero__trust" data-reveal data-delay="400">
        <div class="trust-badge">
          <span class="trust-score"><?php echo esc_html($score); ?></span>
          <div><span class="trust-stars"><?php echo anyma_stars(5); ?></span><span class="trust-label"><?php echo esc_html($badge); ?></span></div>
        </div>
        <div class="trust-divider" aria-hidden="true"></div>
        <div class="trust-platforms">
          <span>Su <?php echo esc_html($rcount); ?> recensioni verificate</span>
          <div class="platform-logos">
            <span class="plat-logo plat-logo--booking">Booking.com</span>
            <span class="plat-logo plat-logo--airbnb">Airbnb</span>
          </div>
        </div>
      </div>
    </div>
    <div class="hero__scroll-hint" aria-hidden="true"><span></span></div>
  </section>

  <!-- FEATURE STRIP -->
  <section class="features section-light" aria-label="Punti di forza">
    <div class="container features__grid">
      <?php
      $feat_icons = ['beach','sea','star'];
      for ($i=1; $i<=3; $i++):
        $ft = anyma_get_mod("anyma_feat{$i}_title",'');
        $fx = anyma_get_mod("anyma_feat{$i}_text",'');
      ?>
      <article class="feat-card" data-reveal data-delay="<?php echo ($i-1)*100; ?>">
        <span class="feat-card__icon"><?php echo anyma_icon($feat_icons[$i-1]); ?></span>
        <h3 class="feat-card__title"><?php echo esc_html($ft); ?></h3>
        <p class="feat-card__text"><?php echo esc_html($fx); ?></p>
      </article>
      <?php endfor; ?>
    </div>
  </section>

  <!-- ABOUT -->
  <?php
  $ab_img     = get_theme_mod('anyma_about_image','');
  $ab_eyebrow = anyma_get_mod('anyma_about_eyebrow','La nostra storia');
  $ab_title   = anyma_get_mod('anyma_about_title','L\'Anima di Sorrento');
  $ab_text    = get_theme_mod('anyma_about_text','ANyMA non è solo un appartamento vacanze — è un\'esperienza curata per riconnettarti al ritmo autentico della vita costiera.');
  $ab_paras   = array_filter(array_map('trim', preg_split('/\n\s*\n/', $ab_text)));
  ?>
  <section class="about section" aria-label="Chi siamo">
    <div class="container about__grid">
      <div class="about__media" data-reveal data-delay="0">
        <?php if($ab_img): ?>
          <img src="<?php echo esc_url($ab_img); ?>" alt="Interno appartamento ANyMA" loading="lazy" class="about__img">
        <?php else: ?>
          <div class="about__img-placeholder" style="background-image:url('https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=800&q=80')" role="img" aria-label="Interno appartamento ANyMA"></div>
        <?php endif; ?>
        <div class="about__stats">
          <div class="stat"><span class="stat__num"><?php echo anyma_get_mod('anyma_apt_sqm','30'); ?></span><span class="stat__label">m²</span></div>
          <div class="stat"><span class="stat__num"><?php echo anyma_get_mod('anyma_apt_guests','2'); ?></span><span class="stat__label">Ospiti</span></div>
          <div class="stat"><span class="stat__num"><?php echo anyma_get_mod('anyma_apt_year','2023'); ?></span><span class="stat__label">Renovated</span></div>
        </div>
      </div>
      <div class="about__content" data-reveal data-delay="100">
        <p class="eyebrow"><?php echo esc_html($ab_eyebrow); ?></p>
        <h2 class="section-title"><?php echo esc_html($ab_title); ?></h2>
        <div class="about__text">
          <?php foreach($ab_paras as $p): ?>
            <p><?php echo wp_kses_post($p); ?></p>
          <?php endforeach; ?>
        </div>
        <a href="<?php echo esc_url(home_url('/appartamento')); ?>" class="btn btn-outline"><?php esc_html_e('Scopri di più','anyma'); ?> <?php echo anyma_icon('arrow'); ?></a>
      </div>
    </div>
  </section>

  <!-- GALLERY PREVIEW -->
  <section class="gallery-preview section-sand section" aria-label="Anteprima galleria">
    <div class="container">
      <div class="section-head text-center" data-reveal>
        <p class="eyebrow"><?php esc_html_e('Galleria','anyma'); ?></p>
        <h2 class="section-title"><?php esc_html_e('Uno sguardo all\'appartamento','anyma'); ?></h2>
      </div>
      <div class="gallery-preview__grid" data-reveal>
        <?php
        $gallery_posts = get_posts(['post_type'=>'anyma_gallery_item','posts_per_page'=>6,'orderby'=>'menu_order','order'=>'ASC']);
        $ph_colors=['#c5d5e8','#a8c5da','#e8d5c5','#d5e8c5','#d5c5e8','#e8c5d5'];
        $ph_labels=['Appartamento','Vista Mare','Marina','Living','Camera','Dintorni'];
        if ($gallery_posts):
          foreach($gallery_posts as $i=>$gp):
            $thumb = get_the_post_thumbnail_url($gp->ID,'large');
            $cat = get_post_meta($gp->ID,'anyma_gallery_category',true) ?: 'appartamento';
            $alt = get_post_meta($gp->ID,'anyma_gallery_alt',true) ?: get_the_title($gp->ID);
        ?>
          <a href="<?php echo esc_url($thumb); ?>" class="gallery-preview__item" data-category="<?php echo esc_attr($cat); ?>" data-lightbox="gallery-home">
            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" loading="lazy">
            <span class="gallery-preview__overlay" aria-hidden="true"><?php echo anyma_icon('play'); ?></span>
          </a>
        <?php endforeach;
        else:
          for($i=0;$i<6;$i++): ?>
          <div class="gallery-preview__item gallery-preview__item--ph" style="background-color:<?php echo $ph_colors[$i]; ?>" role="img" aria-label="<?php echo esc_attr($ph_labels[$i]); ?>">
            <span class="gallery-ph-label"><?php echo esc_html($ph_labels[$i]); ?></span>
          </div>
        <?php endfor; endif; ?>
      </div>
      <div class="text-center" style="margin-top:2.5rem" data-reveal>
        <a href="<?php echo esc_url(home_url('/galleria')); ?>" class="btn btn-outline"><?php esc_html_e('Vedi tutta la galleria','anyma'); ?> <?php echo anyma_icon('arrow'); ?></a>
      </div>
    </div>
  </section>

  <!-- REVIEWS STRIP -->
  <section class="reviews-strip section" aria-label="Recensioni ospiti">
    <div class="container">
      <div class="section-head text-center" data-reveal>
        <p class="eyebrow"><?php esc_html_e('Cosa dicono di noi','anyma'); ?></p>
        <h2 class="section-title"><?php esc_html_e('Le parole dei nostri ospiti','anyma'); ?></h2>
        <div class="global-score" data-reveal>
          <span class="global-score__num"><?php echo anyma_get_mod('anyma_review_score','9.8'); ?></span>
          <div>
            <span class="global-score__stars"><?php echo anyma_stars(5); ?></span>
            <span class="global-score__label"><?php echo anyma_get_mod('anyma_review_badge','Ospitalità Eccezionale'); ?> · <?php echo absint(get_theme_mod('anyma_review_count',47)); ?> recensioni</span>
          </div>
        </div>
      </div>
      <div class="reviews-grid" data-reveal>
        <?php
        $reviews = get_posts(['post_type'=>'anyma_review','posts_per_page'=>3,'orderby'=>'date','order'=>'DESC']);
        if ($reviews):
          foreach ($reviews as $r):
            $stars    = (int) get_post_meta($r->ID,'anyma_rating',true) ?: 5;
            $guest    = get_post_meta($r->ID,'anyma_guest_name',true) ?: 'Ospite';
            $origin   = get_post_meta($r->ID,'anyma_guest_origin',true);
            $platform = get_post_meta($r->ID,'anyma_platform',true) ?: 'booking';
        ?>
          <article class="review-card" data-reveal>
            <div class="review-card__stars"><?php echo anyma_stars($stars); ?></div>
            <blockquote class="review-card__text"><?php echo wp_kses_post(get_the_content(null,false,$r)); ?></blockquote>
            <footer class="review-card__footer">
              <div><strong><?php echo esc_html($guest); ?></strong><?php if($origin): ?><span> · <?php echo esc_html($origin); ?></span><?php endif; ?></div>
              <span class="review-card__platform review-card__platform--<?php echo esc_attr($platform); ?>"><?php echo $platform==='airbnb'?'Airbnb':'Booking.com'; ?></span>
            </footer>
          </article>
        <?php endforeach;
        else:
          $fake = [
            ['Posto meraviglioso, torneremo sicuramente!','Giulia M.','Milano','booking'],
            ['Absolute gem near the marina. Spotless, cozy and perfectly located.','James T.','London','airbnb'],
            ['Appartamento curato nei minimi dettagli. Il proprietario è stato gentilissimo.','Marco R.','Roma','booking'],
          ];
          foreach($fake as $d=>[$text,$rname,$from,$plat]):
        ?>
          <article class="review-card" data-reveal data-delay="<?php echo $d*100; ?>">
            <div class="review-card__stars"><?php echo anyma_stars(5); ?></div>
            <blockquote class="review-card__text">"<?php echo esc_html($text); ?>"</blockquote>
            <footer class="review-card__footer">
              <div><strong><?php echo esc_html($rname); ?></strong> · <span><?php echo esc_html($from); ?></span></div>
              <span class="review-card__platform review-card__platform--<?php echo esc_attr($plat); ?>"><?php echo $plat==='airbnb'?'Airbnb':'Booking.com'; ?></span>
            </footer>
          </article>
        <?php endforeach; endif; ?>
      </div>
      <div class="text-center" style="margin-top:2.5rem" data-reveal>
        <a href="<?php echo esc_url(home_url('/recensioni')); ?>" class="btn btn-outline"><?php esc_html_e('Leggi tutte le recensioni','anyma'); ?></a>
      </div>
    </div>
  </section>

  <!-- LOCATION TEASER -->
  <section class="location-teaser section-sand section" aria-label="Posizione">
    <div class="container location-teaser__grid">
      <div class="location-teaser__content" data-reveal>
        <p class="eyebrow"><?php esc_html_e('Dove siamo','anyma'); ?></p>
        <h2 class="section-title"><?php esc_html_e('Il posto perfetto per partire','anyma'); ?></h2>
        <p><?php esc_html_e('A due passi dalla spiaggia e dal porto. A distanza di traghetto da Capri, Positano e Amalfi.','anyma'); ?></p>
        <ul class="distance-list">
          <?php
          $distances=[
            ['beach', '2 min','Spiaggia Marina della Lobra'],
            ['pin',   '1 min','Porto'],
            ['boat',  '30 min','Capri (traghetto)'],
            ['map',   '20 min','Sorrento'],
            ['map',   '45 min','Napoli'],
          ];
          foreach($distances as [$icon,$dist,$label]):
          ?>
            <li><span class="dist-icon"><?php echo anyma_icon($icon); ?></span><strong><?php echo esc_html($dist); ?></strong> <?php echo esc_html($label); ?></li>
          <?php endforeach; ?>
        </ul>
        <a href="<?php echo esc_url(home_url('/zona')); ?>" class="btn btn-outline"><?php esc_html_e('Esplora la zona','anyma'); ?> <?php echo anyma_icon('arrow'); ?></a>
      </div>
      <div class="location-teaser__map" data-reveal data-delay="100">
        <div class="map-placeholder" role="img" aria-label="Mappa posizione appartamento ANyMA">
          <span class="map-pin-anim" aria-hidden="true"><?php echo anyma_icon('pin'); ?></span>
          <p class="map-placeholder__label"><?php echo anyma_get_mod('anyma_address','Via Marina della Lobra, Massa Lubrense'); ?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- FINAL CTA BANNER -->
  <?php
  $discount  = absint(get_theme_mod('anyma_direct_discount',10));
  ?>
  <section class="cta-banner section" aria-label="Prenota">
    <div class="container cta-banner__inner" data-reveal>
      <p class="eyebrow eyebrow--light"><?php esc_html_e('Pronto?','anyma'); ?></p>
      <h2 class="cta-banner__title"><?php esc_html_e('Il tuo sogno mediterraneo ti aspetta','anyma'); ?></h2>
      <?php if($discount > 0): ?>
        <p class="cta-banner__sub"><?php printf(esc_html__('Prenota diretto e risparmia il %d%% rispetto a Booking e Airbnb','anyma'), $discount); ?></p>
      <?php endif; ?>
      <div class="cta-banner__btns">
        <a href="<?php echo esc_url(home_url('/disponibilita')); ?>" class="btn btn-gold btn--lg"><?php esc_html_e('Controlla disponibilità','anyma'); ?> <?php echo anyma_icon('calendar'); ?></a>
        <?php $wa=get_theme_mod('anyma_whatsapp',''); if($wa): ?>
          <a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^+\d]/','',$wa)); ?>" class="btn btn-outline-white btn--lg" target="_blank" rel="noopener"><?php echo anyma_icon('whatsapp'); ?> <?php esc_html_e('Scrivici su WhatsApp','anyma'); ?></a>
        <?php endif; ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
