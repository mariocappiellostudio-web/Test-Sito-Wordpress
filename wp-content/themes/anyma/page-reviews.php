<?php
/* Template Name: Recensioni */
get_header();
$score  = anyma_get_mod('anyma_review_score','9.8');
$count  = absint(get_theme_mod('anyma_review_count',47));
$badge  = anyma_get_mod('anyma_review_badge','Ospitalità Eccezionale');
?>

<main id="main" class="site-main page-reviews">

  <section class="page-hero page-hero--sm" aria-label="Recensioni" style="background-image:url('https://images.unsplash.com/photo-1499793983690-e29da59ef1c2?w=1600&q=80')">
    <div class="page-hero__overlay" aria-hidden="true"></div>
    <div class="container page-hero__content">
      <nav class="breadcrumb" aria-label="Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span aria-hidden="true">/</span><span aria-current="page"><?php esc_html_e('Recensioni','anyma'); ?></span></nav>
      <h1 class="page-hero__title"><?php esc_html_e('Recensioni','anyma'); ?></h1>
      <div class="reviews-hero-score">
        <span class="reviews-hero-score__num"><?php echo esc_html($score); ?></span>
        <div>
          <span class="trust-stars"><?php echo anyma_stars(5); ?></span>
          <span class="reviews-hero-score__label"><?php echo esc_html($badge); ?> · <?php printf(esc_html__('%d recensioni','anyma'),$count); ?></span>
        </div>
      </div>
    </div>
  </section>

  <section class="section" aria-label="Tutte le recensioni">
    <div class="container">

      <div class="gallery-filters" data-reveal>
        <button class="filter-btn filter-btn--active" data-filter="all"><?php esc_html_e('Tutte','anyma'); ?></button>
        <button class="filter-btn" data-filter="booking">Booking.com</button>
        <button class="filter-btn" data-filter="airbnb">Airbnb</button>
        <button class="filter-btn" data-filter="direct"><?php esc_html_e('Diretto','anyma'); ?></button>
      </div>

      <div class="reviews-grid reviews-grid--full" id="reviews-grid" data-reveal>
        <?php
        $reviews = get_posts(['post_type'=>'anyma_review','posts_per_page'=>-1,'orderby'=>'date','order'=>'DESC']);
        if ($reviews):
          foreach ($reviews as $r):
            $stars=(int)get_post_meta($r->ID,'anyma_rating',true) ?: 5;
            $guest=get_post_meta($r->ID,'anyma_guest_name',true) ?: 'Ospite';
            $origin=get_post_meta($r->ID,'anyma_guest_origin',true);
            $plat=get_post_meta($r->ID,'anyma_platform',true) ?: 'booking';
            $reply=get_post_meta($r->ID,'anyma_owner_reply',true); ?>
          <article class="review-card" data-category="<?php echo esc_attr($plat); ?>">
            <div class="review-card__stars"><?php echo anyma_stars($stars); ?></div>
            <blockquote class="review-card__text"><?php echo wp_kses_post(get_the_content(null,false,$r)); ?></blockquote>
            <footer class="review-card__footer">
              <div><strong><?php echo esc_html($guest); ?></strong><?php if($origin): ?><span> · <?php echo esc_html($origin); ?></span><?php endif; ?></div>
              <span class="review-card__platform review-card__platform--<?php echo esc_attr($plat); ?>"><?php echo $plat==='airbnb'?'Airbnb':($plat==='direct'?'Diretto':'Booking.com'); ?></span>
            </footer>
            <?php if($reply): ?><div class="review-card__reply"><strong><?php esc_html_e('Risposta dell\'host:','anyma'); ?></strong> <?php echo esc_html($reply); ?></div><?php endif; ?>
          </article>
        <?php endforeach;
        else:
          $fake=[
            ['Posto meraviglioso, pulito e con una vista da sogno. Torneremo!','Giulia M.','Milano','booking',5,'Grazie Giulia, vi aspettiamo a braccia aperte!'],
            ['Absolute gem near the marina. Spotless, cozy and perfectly located.','James T.','London','airbnb',5,''],
            ['Appartamento curato nei minimi dettagli. Host gentilissimo e disponibile.','Marco R.','Roma','booking',5,''],
            ['Posizione imbattibile, a due passi dal mare. Consigliatissimo.','Sophie L.','Paris','airbnb',5,''],
            ['Un angolo di paradiso. Silenzio, mare e ospitalità autentica.','Andrea P.','Torino','direct',5,'Grazie di cuore Andrea!'],
            ['Perfect for a romantic getaway. Loved every moment.','Anna K.','Berlin','booking',5,''],
            ['Tutto perfetto, dalle indicazioni all\'accoglienza. 10 e lode.','Francesca D.','Napoli','direct',5,''],
            ['Stunning sea view and very comfortable. Highly recommend.','Tom B.','Dublin','airbnb',5,''],
            ['Esperienza autentica, lontano dal turismo di massa. Tornerò.','Luca V.','Firenze','booking',4,''],
          ];
          foreach($fake as [$text,$gn,$from,$plat,$st,$reply]): ?>
          <article class="review-card" data-category="<?php echo esc_attr($plat); ?>">
            <div class="review-card__stars"><?php echo anyma_stars($st); ?></div>
            <blockquote class="review-card__text">"<?php echo esc_html($text); ?>"</blockquote>
            <footer class="review-card__footer">
              <div><strong><?php echo esc_html($gn); ?></strong> · <span><?php echo esc_html($from); ?></span></div>
              <span class="review-card__platform review-card__platform--<?php echo esc_attr($plat); ?>"><?php echo $plat==='airbnb'?'Airbnb':($plat==='direct'?'Diretto':'Booking.com'); ?></span>
            </footer>
            <?php if($reply): ?><div class="review-card__reply"><strong><?php esc_html_e('Risposta dell\'host:','anyma'); ?></strong> <?php echo esc_html($reply); ?></div><?php endif; ?>
          </article>
        <?php endforeach; endif; ?>
      </div>

      <div class="text-center" style="margin-top:3rem" data-reveal>
        <a href="<?php echo esc_url(home_url('/disponibilita')); ?>" class="btn btn-gold btn--lg"><?php esc_html_e('Prenota il tuo soggiorno','anyma'); ?> <?php echo anyma_icon('arrow'); ?></a>
      </div>

    </div>
  </section>

</main>

<?php get_footer(); ?>
