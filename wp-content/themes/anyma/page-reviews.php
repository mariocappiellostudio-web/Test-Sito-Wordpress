<?php
/**
 * Template Name: Recensioni
 *
 * @package ANyMA
 */

get_header();
$con_url = home_url( '/contatti' );
?>

<section class="section section-light" style="padding-top:calc(var(--header-h) + var(--space-lg));">
	<div class="container rating-header reveal">
		<span class="eyebrow"><?php esc_html_e( 'Recensioni', 'anyma' ); ?></span>
		<div class="rating-score">9.8<span style="font-size:1.6rem;color:var(--color-muted);">/10</span></div>
		<?php echo anyma_stars( 5 ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
		<p class="rating-label"><?php esc_html_e( 'Ospitalità Eccezionale', 'anyma' ); ?></p>

		<div class="review-chips" role="group" aria-label="<?php esc_attr_e( 'Filtra recensioni', 'anyma' ); ?>">
			<button class="chip is-active" data-filter="all"><?php esc_html_e( 'Tutti', 'anyma' ); ?></button>
			<button class="chip" data-filter="booking">Booking</button>
			<button class="chip" data-filter="airbnb">Airbnb</button>
			<button class="chip" data-filter="5"><?php esc_html_e( '5 stelle', 'anyma' ); ?></button>
			<button class="chip" data-filter="4"><?php esc_html_e( '4 stelle', 'anyma' ); ?></button>
		</div>
	</div>

	<div class="container">
		<div class="reviews-page-grid">
			<?php
			$reviews = array(
				array( 5, 'booking', 'Giulia &amp; Marco', '🇮🇹 Milano', 'Set 2024', __( 'Un angolo di paradiso. La vista al risveglio toglie il fiato e il borgo è di una tranquillità rara. Torneremo sicuramente.', 'anyma' ), __( 'Grazie di cuore Giulia e Marco! Vi aspettiamo per un nuovo soggiorno.', 'anyma' ) ),
				array( 5, 'airbnb', 'Sophie &amp; Tom', '🇬🇧 London', 'Aug 2024', __( 'Perfect romantic getaway. Spotless, tasteful and just two steps from the sea. The host was incredibly kind.', 'anyma' ), '' ),
				array( 5, 'booking', 'Francesca', '🇮🇹 Torino', 'Lug 2024', __( 'Accoglienza impeccabile e una posizione da sogno. Consigliato a chi cerca pace e mare autentico.', 'anyma' ), '' ),
				array( 5, 'airbnb', 'Lukas &amp; Anna', '🇩🇪 München', 'Jun 2024', __( 'Wunderschöne Wohnung mit Meerblick. Alles war sauber, ruhig und sehr stilvoll eingerichtet. Sehr zu empfehlen!', 'anyma' ), __( 'Vielen Dank! It was a pleasure hosting you.', 'anyma' ) ),
				array( 4, 'booking', 'Davide', '🇮🇹 Roma', 'Giu 2024', __( 'Appartamento curato e romantico. Unico piccolo neo il parcheggio non incluso, ma la vista compensa tutto.', 'anyma' ), '' ),
				array( 5, 'airbnb', 'Claire', '🇫🇷 Lyon', 'Mai 2024', __( 'Un séjour magique. La vue sur le golfe est à couper le souffle et le village est authentique. Merci pour tout!', 'anyma' ), '' ),
				array( 5, 'booking', 'Elena &amp; Paolo', '🇮🇹 Napoli', 'Apr 2024', __( 'Pur essendo campani, ci siamo sentiti in vacanza vera. Silenzio, mare e dettagli che fanno la differenza.', 'anyma' ), __( 'Che bello avervi avuti come ospiti, grazie!', 'anyma' ) ),
				array( 4, 'airbnb', 'James', '🇺🇸 New York', 'Mar 2024', __( 'Charming and cozy place steps from the marina. Loved waking up to the sea breeze. Would visit again.', 'anyma' ), '' ),
				array( 5, 'booking', 'Marta', '🇪🇸 Madrid', 'Feb 2024', __( 'Un rincón mediterráneo perfecto para desconectar. Limpieza impecable y anfitriones encantadores.', 'anyma' ), '' ),
			);
			foreach ( $reviews as $r ) :
				?>
				<article class="review-card" data-platform="<?php echo esc_attr( $r[1] ); ?>" data-stars="<?php echo (int) $r[0]; ?>">
					<?php echo anyma_stars( (int) $r[0] ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
					<p class="review-text">&ldquo;<?php echo esc_html( $r[5] ); ?>&rdquo;</p>
					<div class="review-meta">
						<div>
							<span class="review-author"><?php echo wp_kses_post( $r[2] ); ?></span><br>
							<span class="review-origin"><?php echo esc_html( $r[3] ); ?> &middot; <?php echo esc_html( $r[4] ); ?></span>
						</div>
						<span class="platform-badge <?php echo esc_attr( $r[1] ); ?>"><?php echo esc_html( ucfirst( $r[1] ) ); ?></span>
					</div>
					<?php if ( ! empty( $r[6] ) ) : ?>
						<div class="host-reply"><strong><?php esc_html_e( 'Risposta di ANyMA:', 'anyma' ); ?></strong> <?php echo esc_html( $r[6] ); ?></div>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="cta-banner reveal">
	<h2><?php esc_html_e( 'Vivi anche tu la tua storia ad ANyMA', 'anyma' ); ?></h2>
	<a class="btn btn-gold btn-lg" href="<?php echo esc_url( $con_url ); ?>"><?php esc_html_e( 'Prenota ora', 'anyma' ); ?></a>
</section>

<?php
get_footer();
