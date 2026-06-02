<?php
/* Template Name: Disponibilità */
get_header();

$low      = anyma_get_mod('anyma_price_low','80');
$mid      = anyma_get_mod('anyma_price_mid','120');
$high     = anyma_get_mod('anyma_price_high','160');
$min_stay = absint(get_theme_mod('anyma_price_min_stay','3'));
$checkin  = anyma_get_mod('anyma_checkin','15:00');
$checkout = anyma_get_mod('anyma_checkout','11:00');
$discount = absint(get_theme_mod('anyma_direct_discount','10'));
$booking  = esc_url(get_theme_mod('anyma_booking_url',''));
$airbnb   = esc_url(get_theme_mod('anyma_airbnb_url',''));
$wa       = get_theme_mod('anyma_whatsapp','');
$high_n   = (int) get_theme_mod('anyma_price_high','160');
$save     = round($high_n * $discount / 100);
?>

<main id="main" class="site-main page-availability">

  <section class="page-hero page-hero--sm" aria-label="Disponibilità" style="background-image:url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1600&q=80')">
    <div class="page-hero__overlay" aria-hidden="true"></div>
    <div class="container page-hero__content">
      <nav class="breadcrumb" aria-label="Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span aria-hidden="true">/</span><span aria-current="page"><?php esc_html_e('Disponibilità & Prezzi','anyma'); ?></span></nav>
      <h1 class="page-hero__title"><?php esc_html_e('Disponibilità & Prezzi','anyma'); ?></h1>
      <p class="page-hero__sub"><?php esc_html_e('Controlla le date e prenota in pochi clic','anyma'); ?></p>
    </div>
  </section>

  <!-- PRICING -->
  <section class="section" aria-label="Prezzi">
    <div class="container">
      <div class="section-head text-center" data-reveal>
        <p class="eyebrow"><?php esc_html_e('Tariffe a notte','anyma'); ?></p>
        <h2 class="section-title"><?php esc_html_e('I nostri prezzi','anyma'); ?></h2>
      </div>
      <div class="pricing-grid" data-reveal>
        <div class="price-card">
          <span class="price-card__season"><?php esc_html_e('Bassa stagione','anyma'); ?></span>
          <span class="price-card__amount">€<?php echo $low; ?><small>/notte</small></span>
          <span class="price-card__note"><?php esc_html_e('Nov – Mar','anyma'); ?></span>
        </div>
        <div class="price-card price-card--featured">
          <span class="price-card__badge"><?php esc_html_e('Più richiesto','anyma'); ?></span>
          <span class="price-card__season"><?php esc_html_e('Media stagione','anyma'); ?></span>
          <span class="price-card__amount">€<?php echo $mid; ?><small>/notte</small></span>
          <span class="price-card__note"><?php esc_html_e('Apr – Giu · Set – Ott','anyma'); ?></span>
        </div>
        <div class="price-card">
          <span class="price-card__season"><?php esc_html_e('Alta stagione','anyma'); ?></span>
          <span class="price-card__amount">€<?php echo $high; ?><small>/notte</small></span>
          <span class="price-card__note"><?php esc_html_e('Lug – Ago','anyma'); ?></span>
        </div>
      </div>
      <div class="pricing-info" data-reveal>
        <span><?php echo anyma_icon('calendar'); ?> <?php printf(esc_html__('Soggiorno minimo: %d notti','anyma'),$min_stay); ?></span>
        <span><?php echo anyma_icon('clock'); ?> <?php printf(esc_html__('Check-in dalle %s · Check-out entro %s','anyma'),esc_html($checkin),esc_html($checkout)); ?></span>
      </div>
    </div>
  </section>

  <!-- WHY DIRECT -->
  <?php if($discount>0): ?>
  <section class="section section-sand" aria-label="Prenota diretto">
    <div class="container why-direct" data-reveal>
      <div class="why-direct__content">
        <p class="eyebrow"><?php esc_html_e('Conviene','anyma'); ?></p>
        <h2 class="section-title"><?php esc_html_e('Perché prenotare diretto','anyma'); ?></h2>
        <ul class="check-list">
          <li><?php echo anyma_icon('check'); ?> <?php printf(esc_html__('Risparmi il %d%% rispetto a Booking e Airbnb','anyma'),$discount); ?></li>
          <li><?php echo anyma_icon('check'); ?> <?php esc_html_e('Nessuna commissione nascosta','anyma'); ?></li>
          <li><?php echo anyma_icon('check'); ?> <?php esc_html_e('Contatto diretto con l\'host','anyma'); ?></li>
          <li><?php echo anyma_icon('check'); ?> <?php esc_html_e('Massima flessibilità sulle date','anyma'); ?></li>
        </ul>
      </div>
      <div class="saving-calc">
        <span class="saving-calc__label"><?php esc_html_e('Risparmio stimato a notte','anyma'); ?></span>
        <span class="saving-calc__amount">-€<?php echo $save; ?></span>
        <span class="saving-calc__sub"><?php esc_html_e('in alta stagione','anyma'); ?></span>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <!-- BOOKING WIDGET / FORM -->
  <section class="section" aria-label="Richiesta prenotazione">
    <div class="container booking-section">
      <div class="section-head text-center" data-reveal>
        <h2 class="section-title"><?php esc_html_e('Richiedi le tue date','anyma'); ?></h2>
        <p><?php esc_html_e('Compila il modulo: ti risponderemo entro 24 ore con disponibilità e miglior prezzo.','anyma'); ?></p>
      </div>
      <div class="booking-widget" data-reveal>
        <?php if (shortcode_exists('contact-form-7') && get_theme_mod('anyma_cf7_availability')): ?>
          <?php echo do_shortcode('[contact-form-7 id="'.esc_attr(get_theme_mod('anyma_cf7_availability')).'"]'); ?>
        <?php else: ?>
        <form class="booking-form" id="booking-form" method="post" action="">
          <div class="form-row">
            <label>
              <span><?php esc_html_e('Check-in','anyma'); ?></span>
              <input type="date" name="checkin" required>
            </label>
            <label>
              <span><?php esc_html_e('Check-out','anyma'); ?></span>
              <input type="date" name="checkout" required>
            </label>
          </div>
          <div class="form-row">
            <label>
              <span><?php esc_html_e('Ospiti','anyma'); ?></span>
              <select name="guests"><option>1</option><option selected>2</option></select>
            </label>
            <label>
              <span><?php esc_html_e('Nome','anyma'); ?></span>
              <input type="text" name="name" required>
            </label>
          </div>
          <label>
            <span><?php esc_html_e('Email','anyma'); ?></span>
            <input type="email" name="email" required>
          </label>
          <label>
            <span><?php esc_html_e('Messaggio','anyma'); ?></span>
            <textarea name="message" rows="3"></textarea>
          </label>
          <button type="submit" class="btn btn-gold btn--block"><?php esc_html_e('Invia richiesta','anyma'); ?> <?php echo anyma_icon('arrow'); ?></button>
          <p class="form-note" data-form-message hidden></p>
        </form>
        <?php endif; ?>
      </div>

      <div class="booking-alt" data-reveal>
        <p><?php esc_html_e('Oppure prenota sulle piattaforme:','anyma'); ?></p>
        <div class="booking-alt__btns">
          <?php if($booking): ?><a href="<?php echo $booking; ?>" class="btn btn-outline" target="_blank" rel="noopener">Booking.com</a><?php endif; ?>
          <?php if($airbnb): ?><a href="<?php echo $airbnb; ?>" class="btn btn-outline" target="_blank" rel="noopener">Airbnb</a><?php endif; ?>
          <?php if($wa): ?><a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^+\d]/','',$wa)); ?>" class="btn btn-outline" target="_blank" rel="noopener"><?php echo anyma_icon('whatsapp'); ?> WhatsApp</a><?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="section section-sand" aria-label="FAQ">
    <div class="container faq-section">
      <div class="section-head text-center" data-reveal>
        <h2 class="section-title"><?php esc_html_e('Domande sulla prenotazione','anyma'); ?></h2>
      </div>
      <div class="faq-list" data-reveal>
        <?php
        $faqs = [
          ['Qual è il soggiorno minimo?', sprintf('Il soggiorno minimo è di %d notti, che può variare in alta stagione.',$min_stay)],
          ['Come avviene il pagamento?', 'Per le prenotazioni dirette è richiesto un acconto alla conferma e il saldo prima dell\'arrivo.'],
          ['Posso cancellare gratuitamente?', 'Sì, offriamo cancellazione gratuita fino a 14 giorni prima dell\'arrivo per le prenotazioni dirette.'],
          ['Gli animali sono ammessi?', 'Contattaci prima della prenotazione: valutiamo richieste per piccoli animali.'],
        ];
        foreach($faqs as $i=>[$q,$a]): ?>
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
