<?php
/* Template Name: Contatti */
get_header();
$phone   = get_theme_mod('anyma_phone','');
$email   = get_theme_mod('anyma_email','');
$wa      = get_theme_mod('anyma_whatsapp','');
$addr    = anyma_get_mod('anyma_address','Via Marina della Lobra, Massa Lubrense (NA)');
$checkin = anyma_get_mod('anyma_checkin','15:00');
$checkout= anyma_get_mod('anyma_checkout','11:00');
$cf7_id  = get_theme_mod('anyma_cf7_contact');
?>

<main id="main" class="site-main page-contact">

  <section class="page-hero page-hero--sm" aria-label="Contatti" style="background-image:url('https://images.unsplash.com/photo-1521295121783-8a321d551ad2?w=1600&q=80')">
    <div class="page-hero__overlay" aria-hidden="true"></div>
    <div class="container page-hero__content">
      <nav class="breadcrumb" aria-label="Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span aria-hidden="true">/</span><span aria-current="page"><?php esc_html_e('Contatti','anyma'); ?></span></nav>
      <h1 class="page-hero__title"><?php esc_html_e('Contatti','anyma'); ?></h1>
      <p class="page-hero__sub"><?php esc_html_e('Siamo qui per rispondere a ogni tua domanda','anyma'); ?></p>
    </div>
  </section>

  <section class="section" aria-label="Modulo di contatto">
    <div class="container contact-grid">

      <div class="contact-form-wrap" data-reveal>
        <h2 class="section-title"><?php esc_html_e('Scrivici','anyma'); ?></h2>
        <?php if ($cf7_id && shortcode_exists('contact-form-7')): ?>
          <?php echo do_shortcode('[contact-form-7 id="'.esc_attr($cf7_id).'"]'); ?>
        <?php else: ?>
        <form class="contact-form" id="contact-form" method="post" action="">
          <label><span><?php esc_html_e('Nome e cognome','anyma'); ?> *</span><input type="text" name="name" required></label>
          <div class="form-row">
            <label><span><?php esc_html_e('Email','anyma'); ?> *</span><input type="email" name="email" required></label>
            <label><span><?php esc_html_e('Telefono','anyma'); ?></span><input type="tel" name="phone"></label>
          </div>
          <div class="form-row">
            <label><span><?php esc_html_e('Check-in','anyma'); ?></span><input type="date" name="checkin"></label>
            <label><span><?php esc_html_e('Check-out','anyma'); ?></span><input type="date" name="checkout"></label>
          </div>
          <label><span><?php esc_html_e('Messaggio','anyma'); ?> *</span><textarea name="message" rows="5" required></textarea></label>
          <label class="checkbox-label"><input type="checkbox" name="privacy" required> <span><?php esc_html_e('Acconsento al trattamento dei dati secondo la Privacy Policy','anyma'); ?></span></label>
          <button type="submit" class="btn btn-gold btn--block"><?php esc_html_e('Invia messaggio','anyma'); ?> <?php echo anyma_icon('arrow'); ?></button>
          <p class="form-note" data-form-message hidden></p>
        </form>
        <?php endif; ?>
      </div>

      <aside class="contact-info" data-reveal data-delay="100">
        <h2 class="section-title"><?php esc_html_e('Informazioni','anyma'); ?></h2>
        <ul class="contact-info-list">
          <?php if($phone): ?><li><?php echo anyma_icon('phone'); ?><div><span class="contact-info-list__label"><?php esc_html_e('Telefono','anyma'); ?></span><a href="tel:<?php echo esc_attr(preg_replace('/[^+\d]/','',$phone)); ?>"><?php echo esc_html($phone); ?></a></div></li><?php endif; ?>
          <?php if($email): ?><li><?php echo anyma_icon('email'); ?><div><span class="contact-info-list__label">Email</span><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></div></li><?php endif; ?>
          <?php if($wa): ?><li><?php echo anyma_icon('whatsapp'); ?><div><span class="contact-info-list__label">WhatsApp</span><a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^+\d]/','',$wa)); ?>" target="_blank" rel="noopener"><?php esc_html_e('Scrivici subito','anyma'); ?></a></div></li><?php endif; ?>
          <li><?php echo anyma_icon('pin'); ?><div><span class="contact-info-list__label"><?php esc_html_e('Indirizzo','anyma'); ?></span><?php echo esc_html($addr); ?></div></li>
          <li><?php echo anyma_icon('clock'); ?><div><span class="contact-info-list__label">Check-in / Check-out</span><?php printf(esc_html__('Dalle %s · Entro %s','anyma'),esc_html($checkin),esc_html($checkout)); ?></div></li>
        </ul>

        <div class="map-placeholder" data-reveal role="img" aria-label="Mappa di <?php echo esc_attr($addr); ?>">
          <span class="map-pin-anim" aria-hidden="true"><?php echo anyma_icon('pin'); ?></span>
          <p class="map-placeholder__label"><?php echo esc_html($addr); ?></p>
        </div>
      </aside>

    </div>
  </section>

  <!-- FAQ -->
  <section class="section section-sand" aria-label="FAQ">
    <div class="container faq-section">
      <div class="section-head text-center" data-reveal>
        <h2 class="section-title"><?php esc_html_e('Domande frequenti','anyma'); ?></h2>
      </div>
      <div class="faq-list" data-reveal>
        <?php
        $faqs=[
          ['Quanto tempo per la risposta?','Rispondiamo a tutte le richieste entro 24 ore, spesso molto prima.'],
          ['Posso fare il check-in più tardi?','Sì, concordiamo insieme orari flessibili. Contattaci per organizzare.'],
          ['È disponibile il parcheggio?','Sì, è disponibile un posto auto. Consulta la pagina Appartamento per i dettagli.'],
          ['Accettate soggiorni di una sola notte?','Il soggiorno minimo varia in base alla stagione: scrivici per verificare.'],
        ];
        foreach($faqs as [$q,$a]): ?>
          <div class="faq-item">
            <button class="faq-item__trigger" aria-expanded="false"><span><?php echo esc_html($q); ?></span><span class="faq-item__icon" aria-hidden="true">+</span></button>
            <div class="faq-item__panel"><p><?php echo esc_html($a); ?></p></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
