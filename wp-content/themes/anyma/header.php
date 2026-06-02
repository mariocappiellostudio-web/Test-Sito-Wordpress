<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Vai al contenuto','anyma'); ?></a>

<?php
$prop_name  = anyma_get_mod('anyma_property_name','ANyMA');
$sub_name   = anyma_get_mod('anyma_tagline','Casa Vacanze');
$book_url   = esc_url(get_theme_mod('anyma_booking_url',''));
$airbnb_url = esc_url(get_theme_mod('anyma_airbnb_url',''));
$is_home    = is_front_page();
?>

<header class="site-header<?php echo $is_home ? ' site-header--transparent' : ''; ?>" id="site-header" role="banner">
  <div class="header-inner container">

    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-brand" aria-label="<?php echo esc_attr($prop_name); ?> — Home">
      <span class="site-name"><?php echo esc_html($prop_name); ?></span>
      <span class="site-sub"><?php echo esc_html($sub_name); ?></span>
    </a>

    <nav class="nav-desktop" aria-label="<?php esc_attr_e('Navigazione principale','anyma'); ?>">
      <?php wp_nav_menu(['theme_location'=>'primary','menu_class'=>'nav-list','container'=>false,'fallback_cb'=>function(){
        $pages=[['Appartamento','/appartamento'],['Disponibilità','/disponibilita'],['Galleria','/galleria'],['Zona','/zona'],['Recensioni','/recensioni'],['Contatti','/contatti']];
        echo '<ul class="nav-list">';
        foreach($pages as [$l,$u]) echo '<li><a href="'.esc_url(home_url($u)).'">'.esc_html($l).'</a></li>';
        echo '</ul>';
      }]); ?>
    </nav>

    <div class="header-actions">
      <div class="lang-switcher" role="navigation" aria-label="<?php esc_attr_e('Lingua','anyma'); ?>">
        <a href="#" class="lang-btn lang-btn--active" data-lang="it" aria-label="Italiano">IT</a>
        <span aria-hidden="true">|</span>
        <a href="#" class="lang-btn" data-lang="en" aria-label="English">EN</a>
      </div>
      <a href="<?php echo $book_url ?: esc_url(home_url('/contatti')); ?>" class="btn btn-gold header-cta" target="<?php echo $book_url ? '_blank' : '_self'; ?>" rel="noopener">
        <?php echo esc_html(anyma_get_mod('anyma_hero_cta2_label','Prenota ora')); ?>
      </a>
      <button class="hamburger" id="hamburger" aria-expanded="false" aria-controls="mobile-menu" aria-label="<?php esc_attr_e('Apri menu','anyma'); ?>">
        <span></span><span></span><span></span>
      </button>
    </div>

  </div>
</header>

<div class="mobile-menu" id="mobile-menu" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e('Menu di navigazione','anyma'); ?>" hidden>
  <div class="mobile-menu__inner">
    <button class="mobile-menu__close" id="mobile-close" aria-label="<?php esc_attr_e('Chiudi menu','anyma'); ?>">
      <?php echo anyma_icon('close'); ?>
    </button>
    <nav aria-label="<?php esc_attr_e('Menu mobile','anyma'); ?>">
      <?php wp_nav_menu(['theme_location'=>'primary','menu_class'=>'mobile-nav-list','container'=>false,'fallback_cb'=>function(){
        $pages=[['Appartamento','/appartamento'],['Disponibilità','/disponibilita'],['Galleria','/galleria'],['Zona','/zona'],['Recensioni','/recensioni'],['Contatti','/contatti']];
        echo '<ul class="mobile-nav-list">';
        foreach($pages as [$l,$u]) echo '<li><a href="'.esc_url(home_url($u)).'">'.esc_html($l).'</a></li>';
        echo '</ul>';
      }]); ?>
    </nav>
    <div class="mobile-menu__footer">
      <a href="<?php echo $book_url ?: esc_url(home_url('/contatti')); ?>" class="btn btn-gold" target="<?php echo $book_url ? '_blank' : '_self'; ?>" rel="noopener">
        <?php echo esc_html(anyma_get_mod('anyma_hero_cta2_label','Prenota ora')); ?>
      </a>
      <div class="mobile-menu__contacts">
        <?php $phone = get_theme_mod('anyma_phone',''); if($phone): ?>
          <a href="tel:<?php echo esc_attr(preg_replace('/[^+\d]/','',$phone)); ?>"><?php echo anyma_icon('phone'); ?><?php echo esc_html($phone); ?></a>
        <?php endif; ?>
        <?php $wa = get_theme_mod('anyma_whatsapp',''); if($wa): ?>
          <a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^+\d]/','',$wa)); ?>" target="_blank" rel="noopener"><?php echo anyma_icon('whatsapp'); ?>WhatsApp</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<div class="mobile-menu__backdrop" id="mobile-backdrop" hidden></div>

<?php
if (get_theme_mod('anyma_sticky_enabled','1')):
    $discount  = absint(get_theme_mod('anyma_direct_discount','10'));
    $bar_text  = str_replace('{discount}', $discount, anyma_get_mod('anyma_sticky_text','Prenota diretto e risparmia il {discount}%'));
    $bar_cta   = anyma_get_mod('anyma_sticky_cta','Controlla disponibilità');
    $avail_url = esc_url(home_url('/disponibilita'));
?>
<div class="sticky-bar" id="sticky-bar" role="complementary" aria-label="Prenotazione rapida" hidden>
  <div class="container sticky-bar__inner">
    <p class="sticky-bar__text"><?php echo esc_html($bar_text); ?></p>
    <div class="sticky-bar__actions">
      <a href="<?php echo $avail_url; ?>" class="btn btn-gold btn--sm"><?php echo esc_html($bar_cta); ?></a>
      <?php if ($airbnb_url): ?><a href="<?php echo $airbnb_url; ?>" class="btn btn-outline-white btn--sm" target="_blank" rel="noopener">Airbnb</a><?php endif; ?>
    </div>
  </div>
</div>
<?php endif; ?>

<div id="main-wrapper">
