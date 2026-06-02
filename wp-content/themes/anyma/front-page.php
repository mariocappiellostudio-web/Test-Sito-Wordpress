<?php
/**
 * Front page (home) template.
 *
 * @package ANyMA
 */

get_header();

$apt_url = home_url( '/appartamento' );
$gal_url = home_url( '/galleria' );
$con_url = home_url( '/contatti' );
?>

<!-- HERO -->
<section class="hero" aria-label="<?php esc_attr_e( 'Introduzione', 'anyma' ); ?>">
	<div class="hero-content">
		<span class="eyebrow">Marina della Lobra &middot; Massa Lubrense</span>
		<h1><?php esc_html_e( 'Svegliarsi con il profumo del mare', 'anyma' ); ?></h1>
		<p class="hero-sub"><?php esc_html_e( 'Un rifugio mediterraneo a due passi dal porto', 'anyma' ); ?></p>
		<div class="hero-cta">
			<a class="btn btn-outline-white" href="<?php echo esc_url( $apt_url ); ?>"><?php esc_html_e( "Scopri l'appartamento", 'anyma' ); ?></a>
			<a class="btn btn-gold" href="<?php echo esc_url( $con_url ); ?>"><?php esc_html_e( 'Prenota ora', 'anyma' ); ?></a>
		</div>
	</div>
	<a class="scroll-indicator" href="#feature" aria-label="<?php esc_attr_e( 'Scorri verso il basso', 'anyma' ); ?>">
		<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
	</a>
</section>

<!-- FEATURE STRIP -->
<section class="feature-strip" id="feature">
	<div class="feature-grid">
		<div class="feature-card reveal">
			<span class="icon"><svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><circle cx="12" cy="4" r="2"/><path d="M12 6v15M5 12H3a9 9 0 0 0 18 0h-2M12 21a9 9 0 0 1-7-3M12 21a9 9 0 0 0 7-3M9 9h6"/></svg></span>
			<h3><?php esc_html_e( 'Spiaggia in 2 min', 'anyma' ); ?></h3>
			<p><?php esc_html_e( 'La marina e la spiaggia a pochi passi dall\'ingresso.', 'anyma' ); ?></p>
		</div>
		<div class="feature-card reveal">
			<span class="icon"><svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg></span>
			<h3><?php esc_html_e( 'Vista mare panoramica', 'anyma' ); ?></h3>
			<p><?php esc_html_e( 'Finestre che incorniciano il blu del Golfo di Napoli.', 'anyma' ); ?></p>
		</div>
		<div class="feature-card reveal">
			<span class="icon"><svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" aria-hidden="true"><path d="M12 2l3 6.5 7 .9-5 4.8 1.3 6.8L12 17.8 5.4 21l1.3-6.8-5-4.8 7-.9z"/></svg></span>
			<h3><?php esc_html_e( 'Ristrutturato 2023', 'anyma' ); ?></h3>
			<p><?php esc_html_e( 'Interni rinnovati con cura, comfort contemporaneo.', 'anyma' ); ?></p>
		</div>
	</div>
</section>

<!-- ABOUT -->
<section class="section section-light" id="about">
	<div class="container">
		<div class="about-grid">
			<div class="about-image reveal" role="img" aria-label="<?php esc_attr_e( 'Interno luminoso dell\'appartamento ANyMA', 'anyma' ); ?>"></div>
			<div class="about-text reveal">
				<span class="eyebrow">ANyMA</span>
				<h2><?php esc_html_e( "L'Anima di Sorrento", 'anyma' ); ?></h2>
				<p><?php esc_html_e( 'ANyMA non è solo un appartamento vacanze — è un\'esperienza curata con cura per riconnettarti al ritmo autentico della vita costiera. Nestled nel borgo tranquillo di Marina della Lobra, lontano dalla folla, offre un santuario di pace.', 'anyma' ); ?></p>
				<p><?php esc_html_e( 'Ogni dettaglio — dalle materie tessili al modo in cui le finestre panoramiche incorniciano il blu del Golfo di Napoli — è stato studiato per evocare quell\'intimità mediterranea dove il tempo rallenta.', 'anyma' ); ?></p>
				<p><?php esc_html_e( '30 m² riprogettati nel 2023. Per 2 persone. Per chi vuole il mare, non il resort.', 'anyma' ); ?></p>
				<a class="btn btn-outline-navy" href="<?php echo esc_url( $apt_url ); ?>"><?php esc_html_e( 'Scopri di più', 'anyma' ); ?></a>
			</div>
		</div>
	</div>
</section>

<!-- GALLERY PREVIEW -->
<section class="section gallery-preview text-center" id="gallery-preview">
	<div class="container">
		<div class="section-head reveal">
			<span class="eyebrow"><?php esc_html_e( 'Galleria', 'anyma' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( "Uno sguardo all'appartamento", 'anyma' ); ?></h2>
		</div>
		<div class="gallery-grid reveal">
			<?php
			$preview = array(
				array( 'ph-1', __( 'Soggiorno', 'anyma' ) ),
				array( 'ph-2', __( 'Vista mare', 'anyma' ) ),
				array( 'ph-3', __( 'Camera', 'anyma' ) ),
				array( 'ph-4', __( 'Bagno', 'anyma' ) ),
				array( 'ph-5', __( 'Cucina', 'anyma' ) ),
				array( 'ph-6', __( 'Terrazza', 'anyma' ) ),
			);
			foreach ( $preview as $g ) :
				?>
				<div class="gallery-item <?php echo esc_attr( $g[0] ); ?>" data-lightbox data-ph="<?php echo esc_attr( $g[0] ); ?>" data-caption="<?php echo esc_attr( $g[1] ); ?>" tabindex="0" role="button" aria-label="<?php echo esc_attr( $g[1] ); ?>">
					<span class="label"><?php echo esc_html( $g[1] ); ?></span>
					<span class="plus" aria-hidden="true">+</span>
				</div>
			<?php endforeach; ?>
		</div>
		<a class="btn btn-outline-navy" href="<?php echo esc_url( $gal_url ); ?>"><?php esc_html_e( 'Vedi tutta la galleria', 'anyma' ); ?></a>
	</div>
</section>

<!-- REVIEWS STRIP -->
<section class="section section-sand text-center" id="reviews-strip">
	<div class="container">
		<div class="section-head reveal">
			<span class="eyebrow"><?php esc_html_e( 'Recensioni', 'anyma' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Cosa dicono i nostri ospiti', 'anyma' ); ?></h2>
		</div>
		<div class="reviews-grid">
			<article class="review-card reveal">
				<?php echo anyma_stars( 5 ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				<p class="review-text">&ldquo;<?php esc_html_e( 'Un angolo di paradiso. La vista al risveglio toglie il fiato e il borgo è di una tranquillità rara.', 'anyma' ); ?>&rdquo;</p>
				<div class="review-meta">
					<div><span class="review-author">Giulia &amp; Marco</span><br><span class="review-origin">Milano, Italia</span></div>
					<span class="platform-badge booking">Booking</span>
				</div>
			</article>
			<article class="review-card reveal">
				<?php echo anyma_stars( 5 ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				<p class="review-text">&ldquo;<?php esc_html_e( 'Perfect romantic getaway. Spotless, tasteful and two steps from the sea. We will be back.', 'anyma' ); ?>&rdquo;</p>
				<div class="review-meta">
					<div><span class="review-author">Sophie &amp; Tom</span><br><span class="review-origin">London, UK</span></div>
					<span class="platform-badge airbnb">Airbnb</span>
				</div>
			</article>
			<article class="review-card reveal">
				<?php echo anyma_stars( 5 ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				<p class="review-text">&ldquo;<?php esc_html_e( 'Accoglienza impeccabile e una posizione da sogno. Consigliato a chi cerca pace e mare.', 'anyma' ); ?>&rdquo;</p>
				<div class="review-meta">
					<div><span class="review-author">Francesca</span><br><span class="review-origin">Torino, Italia</span></div>
					<span class="platform-badge booking">Booking</span>
				</div>
			</article>
		</div>
	</div>
</section>

<!-- LOCATION TEASER -->
<section class="section section-light" id="location">
	<div class="container">
		<div class="location-grid">
			<div class="map-placeholder reveal" role="img" aria-label="<?php esc_attr_e( 'Mappa di Marina della Lobra', 'anyma' ); ?>">
				<span class="map-pin"><svg width="56" height="56" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a7 7 0 0 0-7 7c0 5 7 13 7 13s7-8 7-13a7 7 0 0 0-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z"/></svg></span>
			</div>
			<div class="location-info reveal">
				<span class="eyebrow"><?php esc_html_e( 'Dove siamo', 'anyma' ); ?></span>
				<h2><?php esc_html_e( 'Nel cuore della Costiera', 'anyma' ); ?></h2>
				<p class="location-address">Via Marina della Lobra, Massa Lubrense (NA)</p>
				<div class="distance-pills">
					<span class="pill"><strong>2 min</strong> &rarr; <?php esc_html_e( 'Spiaggia', 'anyma' ); ?></span>
					<span class="pill"><strong>45 min</strong> &rarr; Napoli</span>
					<span class="pill"><strong>20 min</strong> &rarr; Sorrento</span>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- FINAL CTA -->
<section class="cta-banner reveal">
	<h2><?php esc_html_e( 'Pronto per vivere il tuo sogno mediterraneo?', 'anyma' ); ?></h2>
	<a class="btn btn-gold btn-lg" href="<?php echo esc_url( $con_url ); ?>"><?php esc_html_e( 'Prenota il tuo soggiorno', 'anyma' ); ?></a>
</section>

<?php
get_footer();
