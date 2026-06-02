<?php
/**
 * Main fallback template.
 *
 * @package ANyMA
 */

get_header();
?>

<div class="page-content">
	<div class="container">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
				<?php
			endwhile;

			the_posts_pagination();
		else :
			?>
			<h1><?php esc_html_e( 'Nessun contenuto trovato', 'anyma' ); ?></h1>
			<p><?php esc_html_e( 'Spiacenti, non è stato trovato alcun contenuto.', 'anyma' ); ?></p>
		<?php endif; ?>
	</div>
</div>

<?php
get_footer();
