<?php
/* Template Name: Galleria */
get_header();
?>

<main id="main" class="site-main page-gallery">

  <section class="page-hero page-hero--sm" aria-label="Galleria" style="background-image:url('https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=1600&q=80')">
    <div class="page-hero__overlay" aria-hidden="true"></div>
    <div class="container page-hero__content">
      <nav class="breadcrumb" aria-label="Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span aria-hidden="true">/</span><span aria-current="page"><?php esc_html_e('Galleria','anyma'); ?></span></nav>
      <h1 class="page-hero__title"><?php esc_html_e('Galleria','anyma'); ?></h1>
      <p class="page-hero__sub"><?php esc_html_e('Lasciati ispirare dagli spazi e dalla luce di ANyMA','anyma'); ?></p>
    </div>
  </section>

  <section class="section" aria-label="Foto">
    <div class="container">

      <div class="gallery-filters" data-reveal>
        <button class="filter-btn filter-btn--active" data-filter="all"><?php esc_html_e('Tutte','anyma'); ?></button>
        <button class="filter-btn" data-filter="appartamento"><?php esc_html_e('Appartamento','anyma'); ?></button>
        <button class="filter-btn" data-filter="vista"><?php esc_html_e('Vista','anyma'); ?></button>
        <button class="filter-btn" data-filter="marina"><?php esc_html_e('Marina','anyma'); ?></button>
        <button class="filter-btn" data-filter="dintorni"><?php esc_html_e('Dintorni','anyma'); ?></button>
      </div>

      <div class="gallery-masonry" id="gallery-grid" data-reveal>
        <?php
        $gallery_posts = get_posts(['post_type'=>'anyma_gallery_item','posts_per_page'=>-1,'orderby'=>'menu_order','order'=>'ASC']);
        if ($gallery_posts):
          foreach($gallery_posts as $gp):
            $thumb=get_the_post_thumbnail_url($gp->ID,'large'); if(!$thumb) continue;
            $cat=get_post_meta($gp->ID,'anyma_gallery_category',true) ?: 'appartamento';
            $alt=get_post_meta($gp->ID,'anyma_gallery_alt',true) ?: get_the_title($gp->ID); ?>
            <a href="<?php echo esc_url($thumb); ?>" class="gallery-item" data-category="<?php echo esc_attr($cat); ?>" data-lightbox="gallery"><img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" loading="lazy"><span class="gallery-item__zoom" aria-hidden="true"><?php echo anyma_icon('play'); ?></span></a>
        <?php endforeach;
        else:
          $phs=[
            ['#c5d5e8','appartamento'],['#a8c5da','vista'],['#e8d5c5','marina'],
            ['#d5e8c5','dintorni'],['#d5c5e8','appartamento'],['#e8c5d5','vista'],
            ['#c5e8e0','marina'],['#e8e0c5','dintorni'],['#dcc5e8','appartamento'],
            ['#c5e0e8','vista'],['#e0e8c5','marina'],['#e8c5c5','dintorni'],
          ];
          foreach($phs as $i=>[$c,$cat]): ?>
            <div class="gallery-item gallery-item--ph" data-category="<?php echo esc_attr($cat); ?>" style="background-color:<?php echo $c; ?>" role="img" aria-label="Foto <?php echo $i+1; ?>"><span class="gallery-ph-label"><?php echo esc_html(ucfirst($cat)); ?></span></div>
        <?php endforeach; endif; ?>
      </div>

    </div>
  </section>

</main>

<?php get_footer(); ?>
