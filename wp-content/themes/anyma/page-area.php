<?php
/* Template Name: Zona e Dintorni */
get_header();
$addr = anyma_get_mod('anyma_address','Via Marina della Lobra, Massa Lubrense');
?>

<main id="main" class="site-main page-area">

  <section class="page-hero" aria-label="Zona" style="background-image:url('https://images.unsplash.com/photo-1534445867742-43195f401b6c?w=1600&q=80')">
    <div class="page-hero__overlay" aria-hidden="true"></div>
    <div class="container page-hero__content">
      <nav class="breadcrumb" aria-label="Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span aria-hidden="true">/</span><span aria-current="page"><?php esc_html_e('Zona & Dintorni','anyma'); ?></span></nav>
      <h1 class="page-hero__title"><?php esc_html_e('Zona & Dintorni','anyma'); ?></h1>
      <p class="page-hero__sub"><?php esc_html_e('Marina della Lobra: il cuore autentico della Penisola Sorrentina','anyma'); ?></p>
    </div>
  </section>

  <!-- DISTANCES -->
  <section class="section section-light" aria-label="Distanze">
    <div class="container">
      <div class="distance-chips" data-reveal>
        <?php
        $dists=[
          ['beach','Spiaggia','2 min'],['pin','Porto','1 min'],['boat','Capri','30 min'],
          ['map','Sorrento','20 min'],['map','Positano','40 min'],['map','Napoli','45 min'],['shop','Centro','5 min'],
        ];
        foreach($dists as [$ic,$lbl,$d]): ?>
          <span class="chip"><?php echo anyma_icon($ic); ?><strong><?php echo esc_html($d); ?></strong> <?php echo esc_html($lbl); ?></span>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- THINGS TO DO -->
  <section class="section" aria-label="Cosa fare">
    <div class="container">
      <div class="section-head text-center" data-reveal>
        <p class="eyebrow"><?php esc_html_e('Esperienze','anyma'); ?></p>
        <h2 class="section-title"><?php esc_html_e('Cosa fare in zona','anyma'); ?></h2>
      </div>
      <div class="todo-grid" data-reveal>
        <?php
        $todos=[
          ['snorkel','Snorkeling & Mare','Esplora l\'Area Marina Protetta di Punta Campanella, acque cristalline e fondali ricchi di vita.'],
          ['boat','Gita a Capri','Dal porto di Lobra raggiungi Capri, Positano e la Costiera in traghetto o gozzo privato.'],
          ['hiking','Trekking','Sentieri panoramici verso Punta Campanella e la Baia di Ieranto, tra mito e natura.'],
          ['breakfast','Sapori locali','Ristoranti di pesce, limoncello artigianale e la vera cucina della Penisola Sorrentina.'],
        ];
        foreach($todos as $i=>[$ic,$t,$d]): ?>
          <article class="todo-card" data-reveal data-delay="<?php echo $i*100; ?>">
            <span class="todo-card__icon"><?php echo anyma_icon($ic); ?></span>
            <h3 class="todo-card__title"><?php echo esc_html($t); ?></h3>
            <p><?php echo esc_html($d); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- HOW TO ARRIVE TABS -->
  <section class="section section-sand" aria-label="Come arrivare">
    <div class="container">
      <div class="section-head text-center" data-reveal>
        <h2 class="section-title"><?php esc_html_e('Come arrivare','anyma'); ?></h2>
      </div>
      <div class="tabs" data-reveal>
        <div class="tabs__nav" role="tablist">
          <button class="tab-btn tab-btn--active" data-tab="auto" role="tab"><?php echo anyma_icon('car'); ?> <?php esc_html_e('In auto','anyma'); ?></button>
          <button class="tab-btn" data-tab="treno" role="tab"><?php echo anyma_icon('map'); ?> <?php esc_html_e('In treno','anyma'); ?></button>
          <button class="tab-btn" data-tab="aereo" role="tab"><?php echo anyma_icon('boat'); ?> <?php esc_html_e('In aereo','anyma'); ?></button>
          <button class="tab-btn" data-tab="traghetto" role="tab"><?php echo anyma_icon('boat'); ?> <?php esc_html_e('In traghetto','anyma'); ?></button>
        </div>
        <div class="tabs__panels">
          <div class="tab-panel tab-panel--active" data-panel="auto" role="tabpanel"><p><?php esc_html_e('Da Napoli prendi la A3 verso Salerno, esci a Castellammare di Stabia e segui la SS145 verso Sorrento e Massa Lubrense. Circa 45 minuti.','anyma'); ?></p></div>
          <div class="tab-panel" data-panel="treno" role="tabpanel"><p><?php esc_html_e('Dalla stazione di Napoli prendi la Circumvesuviana fino a Sorrento, poi autobus SITA o taxi fino a Marina della Lobra.','anyma'); ?></p></div>
          <div class="tab-panel" data-panel="aereo" role="tabpanel"><p><?php esc_html_e('L\'aeroporto di Napoli-Capodichino dista circa 50 km. Da lì auto a noleggio, transfer privato o bus Curreri fino a Sorrento.','anyma'); ?></p></div>
          <div class="tab-panel" data-panel="traghetto" role="tabpanel"><p><?php esc_html_e('Aliscafi e traghetti collegano Napoli e Capri a Sorrento. Dal porto di Sorrento sei a 20 minuti dall\'appartamento.','anyma'); ?></p></div>
        </div>
      </div>
    </div>
  </section>

  <!-- MAP -->
  <section class="section" aria-label="Mappa">
    <div class="container">
      <div class="map-placeholder map-placeholder--lg" data-reveal role="img" aria-label="Mappa di <?php echo esc_attr($addr); ?>">
        <span class="map-pin-anim" aria-hidden="true"><?php echo anyma_icon('pin'); ?></span>
        <p class="map-placeholder__label"><?php echo esc_html($addr); ?></p>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-banner section" aria-label="Prenota">
    <div class="container cta-banner__inner" data-reveal>
      <h2 class="cta-banner__title"><?php esc_html_e('Pronto a partire?','anyma'); ?></h2>
      <div class="cta-banner__btns">
        <a href="<?php echo esc_url(home_url('/disponibilita')); ?>" class="btn btn-gold btn--lg"><?php esc_html_e('Controlla disponibilità','anyma'); ?> <?php echo anyma_icon('arrow'); ?></a>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
