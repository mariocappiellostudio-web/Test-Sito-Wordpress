<?php
/**
 * Template Name: Zona
 *
 * @package ANyMA
 */

get_header();

$pin = '<svg class="icon" width="26" height="26" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a7 7 0 0 0-7 7c0 5 7 13 7 13s7-8 7-13a7 7 0 0 0-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z"/></svg>';
?>

<section class="hero-small" style="background-image:linear-gradient(rgba(26,39,68,0.45),rgba(26,39,68,0.55)),url('https://images.unsplash.com/photo-1444084316824-dc26d6657664?auto=format&fit=crop&w=2000&q=80');">
	<div>
		<h1><?php esc_html_e( 'Esplora i Dintorni', 'anyma' ); ?></h1>
		<nav class="breadcrumb" aria-label="breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'anyma' ); ?></a> &rsaquo; <span><?php esc_html_e( 'Zona', 'anyma' ); ?></span>
		</nav>
	</div>
</section>

<!-- DISTANZE -->
<section class="section section-light">
	<div class="container">
		<div class="section-head text-center reveal">
			<span class="eyebrow"><?php esc_html_e( 'A portata di mano', 'anyma' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Distanze', 'anyma' ); ?></h2>
		</div>
		<div class="distances-row reveal">
			<?php
			$distances = array(
				array( __( 'Spiaggia', 'anyma' ), '2 min' ),
				array( __( 'Porto', 'anyma' ), '1 min' ),
				array( __( 'Ristoranti', 'anyma' ), '2 min' ),
				array( 'Sorrento', '20 min' ),
				array( 'Napoli', '45 min' ),
				array( __( 'Capri (traghetto)', 'anyma' ), '30 min' ),
			);
			foreach ( $distances as $d ) {
				echo '<div class="distance-item">' . $pin . '<span class="place">' . esc_html( $d[0] ) . '</span><span class="time">' . esc_html( $d[1] ) . '</span></div>'; // phpcs:ignore WordPress.Security.EscapeOutput
			}
			?>
		</div>
	</div>
</section>

<!-- COSA FARE -->
<section class="section section-sand">
	<div class="container">
		<div class="section-head text-center reveal">
			<span class="eyebrow"><?php esc_html_e( 'Esperienze', 'anyma' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Cosa fare', 'anyma' ); ?></h2>
		</div>
		<div class="activities-grid">
			<?php
			$activities = array(
				array( 'ph-1', __( 'Escursioni in Barca', 'anyma' ), __( 'Capri, Positano, Amalfi e la celebre Grotta Azzurra: la costa più bella del mondo dal mare.', 'anyma' ) ),
				array( 'ph-6', __( 'Trekking', 'anyma' ), __( 'Il Sentiero di Athena e la spettacolare discesa verso la Baia di Ieranto.', 'anyma' ) ),
				array( 'ph-3', __( 'Snorkeling', 'anyma' ), __( 'Le acque cristalline della Riserva Marina di Punta Campanella.', 'anyma' ) ),
				array( 'ph-2', __( 'Spiagge', 'anyma' ), __( 'Lobra, San Montano, Recommone e Marina del Cantone: calette per ogni gusto.', 'anyma' ) ),
			);
			foreach ( $activities as $a ) :
				?>
				<article class="activity-card reveal">
					<div class="activity-media <?php echo esc_attr( $a[0] ); ?>"></div>
					<div class="activity-body">
						<h3><?php echo esc_html( $a[1] ); ?></h3>
						<p><?php echo esc_html( $a[2] ); ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- COME ARRIVARE (tabs) -->
<section class="section section-light">
	<div class="container">
		<div class="section-head text-center reveal">
			<span class="eyebrow"><?php esc_html_e( 'Informazioni', 'anyma' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Come arrivare', 'anyma' ); ?></h2>
		</div>
		<div class="tabs reveal">
			<div class="tab-buttons" role="tablist">
				<button class="tab-btn is-active" data-tab="car" role="tab"><?php esc_html_e( 'In auto', 'anyma' ); ?></button>
				<button class="tab-btn" data-tab="train" role="tab"><?php esc_html_e( 'In treno', 'anyma' ); ?></button>
				<button class="tab-btn" data-tab="plane" role="tab"><?php esc_html_e( 'In aereo', 'anyma' ); ?></button>
				<button class="tab-btn" data-tab="ferry" role="tab"><?php esc_html_e( 'In traghetto', 'anyma' ); ?></button>
			</div>
			<div class="tab-panel is-active" data-panel="car"><p><?php esc_html_e( 'Dall\'autostrada A3 Napoli–Salerno, uscita Castellammare di Stabia. Proseguite sulla SS145 Sorrentina fino a Massa Lubrense e seguite le indicazioni per Marina della Lobra. Parcheggio in zona disponibile a €20/giorno.', 'anyma' ); ?></p></div>
			<div class="tab-panel" data-panel="train"><p><?php esc_html_e( 'Circumvesuviana da Napoli fino a Sorrento (circa 70 min), poi autobus EAV per Massa Lubrense. Vi attendiamo a pochi minuti dalla fermata.', 'anyma' ); ?></p></div>
			<div class="tab-panel" data-panel="plane"><p><?php esc_html_e( 'Aeroporto di Napoli Capodichino (NAP). Da lì autobus Curreri diretto a Sorrento, oppure transfer privato fino a Marina della Lobra (circa 50 min).', 'anyma' ); ?></p></div>
			<div class="tab-panel" data-panel="ferry"><p><?php esc_html_e( 'Aliscafi e traghetti collegano Napoli e Sorrento a Capri e alla Costiera. Dal porto di Sorrento raggiungete Marina della Lobra in circa 20 minuti.', 'anyma' ); ?></p></div>
		</div>
	</div>
</section>

<!-- MAPPA -->
<section class="section section-sand">
	<div class="container">
		<div class="map-placeholder reveal" role="img" aria-label="<?php esc_attr_e( 'Mappa dei punti di interesse', 'anyma' ); ?>">
			<span class="map-pin"><svg width="56" height="56" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a7 7 0 0 0-7 7c0 5 7 13 7 13s7-8 7-13a7 7 0 0 0-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z"/></svg></span>
		</div>
	</div>
</section>

<?php
get_footer();
