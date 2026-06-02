<?php get_header(); ?>

<main id="main" class="site-main">
  <section class="page-hero page-hero--sm" aria-label="<?php the_title_attribute(); ?>">
    <div class="container">
      <h1 class="page-hero__title"><?php the_title(); ?></h1>
    </div>
  </section>
  <div class="container section page-content">
    <?php while (have_posts()): the_post(); ?>
      <article <?php post_class('entry'); ?>>
        <?php if (has_post_thumbnail()): ?>
          <div class="entry__thumb"><?php the_post_thumbnail('large'); ?></div>
        <?php endif; ?>
        <div class="entry__content">
          <?php the_content(); ?>
          <?php wp_link_pages(['before'=>'<div class="page-links">'.__('Pagine:','anyma'),'after'=>'</div>']); ?>
        </div>
      </article>
      <?php if (comments_open() || get_comments_number()) comments_template(); ?>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>
