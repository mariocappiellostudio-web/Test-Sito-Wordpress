</div><!-- #main-wrapper -->

<?php
$phone   = get_theme_mod('anyma_phone','');
$email   = get_theme_mod('anyma_email','');
$wa      = get_theme_mod('anyma_whatsapp','');
$booking = get_theme_mod('anyma_booking_url','');
$airbnb  = get_theme_mod('anyma_airbnb_url','');
$insta   = get_theme_mod('anyma_instagram','');
$fb      = get_theme_mod('anyma_facebook','');
$addr    = get_theme_mod('anyma_address','Via Marina della Lobra, Massa Lubrense (NA)');
$name    = anyma_get_mod('anyma_property_name','ANyMA');
$tagline = anyma_get_mod('anyma_tagline_long','Marina della Lobra · Massa Lubrense');
?>

<footer class="site-footer" role="contentinfo">
  <div class="footer-main container">

    <div class="footer-col footer-col--brand">
      <p class="footer-brand"><?php echo esc_html($name); ?></p>
      <p class="footer-tagline"><?php echo esc_html($tagline); ?></p>
      <?php if ($addr): ?><address class="footer-address"><?php echo anyma_icon('pin'); ?><?php echo esc_html($addr); ?></address><?php endif; ?>
      <div class="footer-social">
        <?php if($insta): ?><a href="<?php echo esc_url($insta); ?>" target="_blank" rel="noopener me" aria-label="Instagram"><?php echo anyma_icon('instagram'); ?></a><?php endif; ?>
        <?php if($fb):    ?><a href="<?php echo esc_url($fb);    ?>" target="_blank" rel="noopener me" aria-label="Facebook"><?php echo anyma_icon('facebook'); ?></a><?php endif; ?>
        <?php if($wa):    ?><a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^+\d]/','',$wa)); ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><?php echo anyma_icon('whatsapp'); ?></a><?php endif; ?>
      </div>
    </div>

    <div class="footer-col">
      <h3 class="footer-heading"><?php esc_html_e('Navigazione','anyma'); ?></h3>
      <ul class="footer-links">
        <?php
        $nav_items=[['Home','/'],['Appartamento','/appartamento'],['Disponibilità & Prezzi','/disponibilita'],['Galleria','/galleria'],['Zona & Dintorni','/zona'],['Recensioni','/recensioni'],['Contatti','/contatti']];
        foreach($nav_items as [$l,$u]): ?>
          <li><a href="<?php echo esc_url(home_url($u)); ?>"><?php echo esc_html($l); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="footer-col">
      <h3 class="footer-heading"><?php esc_html_e('Contatti','anyma'); ?></h3>
      <ul class="footer-contact-list">
        <?php if($phone): ?><li><?php echo anyma_icon('phone'); ?><a href="tel:<?php echo esc_attr(preg_replace('/[^+\d]/','',$phone)); ?>"><?php echo esc_html($phone); ?></a></li><?php endif; ?>
        <?php if($email): ?><li><?php echo anyma_icon('email'); ?><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></li><?php endif; ?>
        <?php if($wa):    ?><li><?php echo anyma_icon('whatsapp'); ?><a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^+\d]/','',$wa)); ?>" target="_blank" rel="noopener">WhatsApp</a></li><?php endif; ?>
        <?php $ci=get_theme_mod('anyma_checkin','15:00'); $co=get_theme_mod('anyma_checkout','11:00'); ?>
        <li><?php echo anyma_icon('clock'); ?>Check-in: <?php echo esc_html($ci); ?> · Check-out: <?php echo esc_html($co); ?></li>
      </ul>
      <div class="footer-platforms">
        <?php if($booking): ?><a href="<?php echo esc_url($booking); ?>" class="platform-badge platform-badge--booking" target="_blank" rel="noopener">Booking.com</a><?php endif; ?>
        <?php if($airbnb):  ?><a href="<?php echo esc_url($airbnb);  ?>" class="platform-badge platform-badge--airbnb"  target="_blank" rel="noopener">Airbnb</a><?php endif; ?>
      </div>
    </div>

  </div>

  <div class="footer-bottom">
    <div class="container footer-bottom__inner">
      <p>&copy; <?php echo date('Y'); ?> <?php echo esc_html($name); ?> &mdash; <?php esc_html_e('Tutti i diritti riservati','anyma'); ?></p>
      <ul class="footer-legal">
        <li><a href="<?php echo esc_url(get_privacy_policy_url()); ?>"><?php esc_html_e('Privacy Policy','anyma'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/cookie-policy')); ?>"><?php esc_html_e('Cookie Policy','anyma'); ?></a></li>
      </ul>
    </div>
  </div>

</footer>

<?php if($wa): ?>
<a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^+\d]/','',$wa)); ?>?text=<?php echo rawurlencode('Ciao! Vorrei informazioni sull\'appartamento ANyMA.'); ?>"
   class="whatsapp-float" target="_blank" rel="noopener"
   aria-label="<?php esc_attr_e('Contattaci su WhatsApp','anyma'); ?>">
  <?php echo anyma_icon('whatsapp'); ?>
  <span class="whatsapp-float__tooltip"><?php esc_html_e('Scrivici','anyma'); ?></span>
</a>
<?php endif; ?>

<div class="cookie-banner" id="cookie-banner" role="alertdialog" aria-labelledby="cookie-title" aria-describedby="cookie-desc" hidden>
  <div class="cookie-banner__inner">
    <p id="cookie-title"><strong><?php esc_html_e('Questo sito usa i cookie','anyma'); ?></strong></p>
    <p id="cookie-desc"><?php esc_html_e('Utilizziamo i cookie per migliorare la tua esperienza. Continuando accetti la nostra','anyma'); ?> <a href="<?php echo esc_url(home_url('/cookie-policy')); ?>"><?php esc_html_e('Cookie Policy','anyma'); ?></a>.</p>
    <div class="cookie-banner__actions">
      <button class="btn btn-gold btn--sm" id="cookie-accept"><?php esc_html_e('Accetta','anyma'); ?></button>
      <button class="btn btn-outline btn--sm" id="cookie-decline"><?php esc_html_e('Rifiuta','anyma'); ?></button>
    </div>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
