<?php
/**
 * Template Name: Galleria
 *
 * @package ANyMA
 */

get_header();
?>

<section class="hero-small" style="background-image:linear-gradient(rgba(26,39,68,0.45),rgba(26,39,68,0.55)),url('https://images.unsplash.com/photo-1559827260-dc66d52bef19?auto=format&fit=crop&w=2000&q=80');">
	<div>
		<h1><?php esc_html_e( 'Galleria', 'anyma' ); ?></h1>
		<nav class="breadcrumb" aria-label="breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'anyma' ); ?></a> &rsaquo; <span><?php esc_html_e( 'Galleria', 'anyma' ); ?></span>
		</nav>
	</div>
</section>

<section class="section section-light">
	<div class="container">
		<div class="gallery-filters reveal" role="tablist" aria-label="<?php esc_attr_e( 'Filtri galleria', 'anyma' ); ?>">
			<button class="filter-btn is-active" data-filter="all"><?php esc_html_e( 'Tutti', 'anyma' ); ?></button>
			<button class="filter-btn" data-filter="apartment"><?php esc_html_e( 'Appartamento', 'anyma' ); ?></button>
			<button class="filter-btn" data-filter="view"><?php esc_html_e( 'Vista', 'anyma' ); ?></button>
			<button class="filter-btn" data-filter="marina"><?php esc_html_e( 'Marina', 'anyma' ); ?></button>
			<button class="filter-btn" data-filter="around"><?php esc_html_e( 'Dintorni', 'anyma' ); ?></button>
		</div>

		<div class="gallery-masonry reveal">
			<?php
			$gallery = array(
				array( 'ph-1', 'g-h3', 'apartment', __( 'Soggiorno', 'anyma' ) ),
				array( 'ph-2', 'g-h1', 'view', __( 'Vista Golfo', 'anyma' ) ),
				array( 'ph-3', 'g-h2', 'apartment', __( 'Camera', 'anyma' ) ),
				array( 'ph-4', 'g-h4', 'marina', __( 'Il porto', 'anyma' ) ),
				array( 'ph-5', 'g-h1', 'apartment', __( 'Cucina', 'anyma' ) ),
				array( 'ph-6', 'g-h3', 'around', __( 'Borgo', 'anyma' ) ),
				array( 'ph-7', 'g-h2', 'view', __( 'Tramonto', 'anyma' ) ),
				array( 'ph-8', 'g-h4', 'marina', __( 'Barche', 'anyma' ) ),
				array( 'ph-1', 'g-h1', 'around', __( 'Sentiero', 'anyma' ) ),
				array( 'ph-3', 'g-h3', 'apartment', __( 'Bagno', 'anyma' ) ),
				array( 'ph-2', 'g-h2', 'view', __( 'Finestra', 'anyma' ) ),
				array( 'ph-6', 'g-h4', 'around', __( 'Spiaggia', 'anyma' ) ),
			);
			foreach ( $gallery as $g ) :
				?>
				<div class="gallery-item <?php echo esc_attr( $g[0] . ' ' . $g[1] ); ?>" data-category="<?php echo esc_attr( $g[2] ); ?>" data-lightbox data-ph="<?php echo esc_attr( $g[0] ); ?>" data-caption="<?php echo esc_attr( $g[3] ); ?>" tabindex="0" role="button" aria-label="<?php echo esc_attr( $g[3] ); ?>">
					<span class="label"><?php echo esc_html( $g[3] ); ?></span>
					<span class="plus" aria-hidden="true">+</span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_footer();
