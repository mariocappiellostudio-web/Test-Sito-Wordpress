<?php get_header(); ?>

<main id="main" class="site-main">
  <div class="container section">
    <?php if (have_posts()): ?>
      <div class="page-head text-center">
        <h1 class="section-title"><?php echo is_home() ? esc_html__('Blog','anyma') : get_the_archive_title(); ?></h1>
      </div>
      <div class="post-list">
        <?php while (have_posts()): the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
            <?php if (has_post_thumbnail()): ?>
              <a href="<?php the_permalink(); ?>" class="post-card__thumb"><?php the_post_thumbnail('medium_large'); ?></a>
            <?php endif; ?>
            <div class="post-card__body">
              <h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p class="post-card__meta"><?php echo esc_html(get_the_date()); ?></p>
              <div class="post-card__excerpt"><?php the_excerpt(); ?></div>
              <a href="<?php the_permalink(); ?>" class="btn btn-outline"><?php esc_html_e('Leggi','anyma'); ?> <?php echo anyma_icon('arrow'); ?></a>
            </div>
          </article>
        <?php endwhile; ?>
      </div>
      <div class="pagination"><?php the_posts_pagination(['mid_size'=>2]); ?></div>
    <?php else: ?>
      <div class="page-head text-center">
        <h1 class="section-title"><?php esc_html_e('Nessun contenuto trovato','anyma'); ?></h1>
        <p><?php esc_html_e('Spiacenti, non c\'è nulla qui.','anyma'); ?></p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-gold"><?php esc_html_e('Torna alla home','anyma'); ?></a>
      </div>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
