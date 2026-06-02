<?php
/**
 * Template Name: Appartamento
 *
 * @package ANyMA
 */

get_header();
$con_url = home_url( '/contatti' );
?>

<section class="hero-small" style="background-image:linear-gradient(rgba(26,39,68,0.45),rgba(26,39,68,0.55)),url('https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=2000&q=80');">
	<div>
		<h1><?php esc_html_e( "L'Appartamento", 'anyma' ); ?></h1>
		<nav class="breadcrumb" aria-label="breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'anyma' ); ?></a> &rsaquo; <span><?php esc_html_e( 'Appartamento', 'anyma' ); ?></span>
		</nav>
	</div>
</section>

<!-- DESCRIZIONE -->
<section class="section section-light">
	<div class="container">
		<div class="apt-desc-grid">
			<div class="apt-gallery-vertical reveal">
				<?php
				$shots = array(
					array( 'ph-1', __( 'Living vista mare', 'anyma' ) ),
					array( 'ph-3', __( 'Camera matrimoniale', 'anyma' ) ),
					array( 'ph-5', __( 'Angolo cottura', 'anyma' ) ),
				);
				foreach ( $shots as $s ) :
					?>
					<div class="gallery-item <?php echo esc_attr( $s[0] ); ?>" data-lightbox data-ph="<?php echo esc_attr( $s[0] ); ?>" data-caption="<?php echo esc_attr( $s[1] ); ?>" tabindex="0" role="button" aria-label="<?php echo esc_attr( $s[1] ); ?>">
						<span class="label"><?php echo esc_html( $s[1] ); ?></span>
						<span class="plus" aria-hidden="true">+</span>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="apt-text reveal">
				<span class="eyebrow"><?php esc_html_e( 'Lo spazio', 'anyma' ); ?></span>
				<h2><?php esc_html_e( 'Blu e bianco, luce e mare', 'anyma' ); ?></h2>
				<p><?php esc_html_e( 'Trenta metri quadri pensati nei minimi dettagli: una palette di bianco e blu che dialoga con il cielo e il Golfo, tessuti naturali e una luce che cambia con le ore del giorno. L\'appartamento dispone di un ingresso privato indipendente, perché la vostra intimità venga prima di tutto.', 'anyma' ); ?></p>
				<p><?php esc_html_e( 'Completamente ristrutturato nel 2023, unisce il fascino autentico del borgo a comfort contemporanei: aria condizionata, WiFi veloce e una cucina attrezzata per chi ama svegliarsi con calma davanti al mare.', 'anyma' ); ?></p>
				<p><?php esc_html_e( 'Una camera con living, un bagno curato e finestre panoramiche: tutto ciò che serve a due persone per vivere la Costiera Sorrentina come un sogno lento.', 'anyma' ); ?></p>
				<a class="btn btn-gold" href="<?php echo esc_url( $con_url ); ?>"><?php esc_html_e( 'Verifica disponibilità', 'anyma' ); ?></a>
			</div>
		</div>
	</div>
</section>

<!-- SPECS -->
<section class="section section-sand">
	<div class="container">
		<div class="specs-grid">
			<div class="spec-card reveal"><span class="num">30</span><span class="lbl"><?php esc_html_e( 'metri quadri', 'anyma' ); ?></span></div>
			<div class="spec-card reveal"><span class="num">2</span><span class="lbl"><?php esc_html_e( 'ospiti max', 'anyma' ); ?></span></div>
			<div class="spec-card reveal"><span class="num">1</span><span class="lbl"><?php esc_html_e( 'camera + living', 'anyma' ); ?></span></div>
			<div class="spec-card reveal"><span class="num">1</span><span class="lbl"><?php esc_html_e( 'bagno', 'anyma' ); ?></span></div>
		</div>
	</div>
</section>

<!-- SERVIZI -->
<section class="section section-light text-center">
	<div class="container">
		<div class="section-head reveal">
			<span class="eyebrow"><?php esc_html_e( 'Comfort', 'anyma' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Servizi', 'anyma' ); ?></h2>
		</div>
		<div class="amenities-grid reveal">
			<?php
			$check = '<svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>';
			$amenities = array(
				__( 'WiFi gratuito', 'anyma' ),
				__( 'Cucina attrezzata', 'anyma' ),
				__( 'Colazione su richiesta', 'anyma' ),
				__( 'Ingresso privato', 'anyma' ),
				__( 'Aria condizionata', 'anyma' ),
				__( 'Minimarket in loco', 'anyma' ),
				__( 'Non fumatori', 'anyma' ),
				__( 'Parcheggio zona (€20/gg)', 'anyma' ),
				__( 'Vista mare', 'anyma' ),
			);
			foreach ( $amenities as $a ) {
				echo '<div class="amenity">' . $check . '<span>' . esc_html( $a ) . '</span></div>'; // phpcs:ignore WordPress.Security.EscapeOutput
			}
			?>
		</div>
	</div>
</section>

<!-- GALLERY APPARTAMENTO (masonry) -->
<section class="section section-sand">
	<div class="container">
		<div class="section-head text-center reveal">
			<span class="eyebrow"><?php esc_html_e( 'Galleria', 'anyma' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( "Dentro l'appartamento", 'anyma' ); ?></h2>
		</div>
		<div class="masonry reveal">
			<?php
			$masonry = array(
				array( 'ph-1', 'm-tall', __( 'Soggiorno', 'anyma' ) ),
				array( 'ph-2', 'm-short', __( 'Dettaglio', 'anyma' ) ),
				array( 'ph-3', 'm-mid', __( 'Camera', 'anyma' ) ),
				array( 'ph-4', 'm-mid', __( 'Bagno', 'anyma' ) ),
				array( 'ph-5', 'm-tall', __( 'Cucina', 'anyma' ) ),
				array( 'ph-6', 'm-short', __( 'Terrazza', 'anyma' ) ),
			);
			foreach ( $masonry as $m ) :
				?>
				<div class="gallery-item <?php echo esc_attr( $m[0] . ' ' . $m[1] ); ?>" data-lightbox data-ph="<?php echo esc_attr( $m[0] ); ?>" data-caption="<?php echo esc_attr( $m[2] ); ?>" tabindex="0" role="button" aria-label="<?php echo esc_attr( $m[2] ); ?>">
					<span class="label"><?php echo esc_html( $m[2] ); ?></span>
					<span class="plus" aria-hidden="true">+</span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- CTA -->
<section class="cta-banner reveal">
	<h2><?php esc_html_e( 'Innamorati di ANyMA?', 'anyma' ); ?></h2>
	<a class="btn btn-gold btn-lg" href="<?php echo esc_url( $con_url ); ?>"><?php esc_html_e( 'Prenota ora', 'anyma' ); ?></a>
</section>

<?php
get_footer();
