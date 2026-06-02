<?php
/**
 * Footer template.
 *
 * @package ANyMA
 */
?>
</main><!-- #main-content -->

<footer class="site-footer">
	<div class="footer-inner">
		<div class="footer-col footer-brand">
			<span class="brand-name">ANyMA</span>
			<span class="brand-sub">Casa Vacanze</span>
			<p class="footer-tagline"><?php esc_html_e( 'Un rifugio mediterraneo a due passi dal porto di Marina della Lobra.', 'anyma' ); ?></p>
		</div>

		<div class="footer-col footer-links">
			<h4><?php esc_html_e( 'Naviga', 'anyma' ); ?></h4>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/appartamento' ) ); ?>"><?php esc_html_e( 'Appartamento', 'anyma' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/galleria' ) ); ?>"><?php esc_html_e( 'Galleria', 'anyma' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/zona' ) ); ?>"><?php esc_html_e( 'Zona', 'anyma' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/recensioni' ) ); ?>"><?php esc_html_e( 'Recensioni', 'anyma' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/contatti' ) ); ?>"><?php esc_html_e( 'Contatti', 'anyma' ); ?></a></li>
			</ul>
		</div>

		<div class="footer-col footer-contact">
			<h4><?php esc_html_e( 'Contatti', 'anyma' ); ?></h4>
			<p><a href="mailto:info@casavacanzeanyma.com">info@casavacanzeanyma.com</a></p>
			<p><a href="tel:+393331234567">+39 333 123 4567</a></p>
			<p class="footer-address">Via Marina della Lobra<br>Massa Lubrense (NA)</p>
			<div class="footer-platforms">
				<a href="https://www.booking.com" target="_blank" rel="noopener" aria-label="Booking.com">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M4 3h7a5 5 0 0 1 3.2 8.8A5 5 0 0 1 12 21H4V3zm4 3v4h3a2 2 0 0 0 0-4H8zm0 7v4h4a2 2 0 0 0 0-4H8z"/></svg>
					<span>Booking</span>
				</a>
				<a href="https://www.airbnb.it" target="_blank" rel="noopener" aria-label="Airbnb">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2c1.6 0 2.9 1 3.8 2.9l5.5 12c.5 1.2.7 2.1.7 2.9 0 2-1.5 3.2-3.5 3.2-1.5 0-3-.8-4.4-2.4l-2.1-2.5-2.1 2.5C8.5 23.2 7 24 5.5 24 3.5 24 2 22.8 2 20.8c0-.8.2-1.7.7-2.9l5.5-12C9.1 3 10.4 2 12 2zm0 9.5c-1.4 1.7-2 2.9-2 3.9 0 1 .8 1.6 1.7 1.6h.6c.9 0 1.7-.6 1.7-1.6 0-1-.6-2.2-2-3.9z"/></svg>
					<span>Airbnb</span>
				</a>
			</div>
		</div>
	</div>

	<div class="footer-bottom">
		<p>&copy; 2024 Casa Vacanze ANyMA &middot; Marina della Lobra, Sorrento</p>
	</div>
</footer>

<a class="whatsapp-float" href="https://wa.me/393331234567" target="_blank" rel="noopener" aria-label="Scrivici su WhatsApp" data-tooltip="Scrivici">
	<svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38a9.86 9.86 0 0 0 4.79 1.22h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2zm5.8 14.13c-.24.68-1.42 1.32-1.95 1.36-.5.04-.97.21-3.27-.69-2.75-1.08-4.5-3.88-4.64-4.06-.13-.18-1.11-1.48-1.11-2.82s.7-2 .95-2.27c.24-.27.53-.34.71-.34l.51.01c.16.01.38-.06.6.46.24.55.79 1.9.86 2.04.07.14.12.3.02.48-.09.18-.14.29-.27.45-.14.16-.29.36-.41.48-.14.14-.28.29-.12.56.16.27.7 1.16 1.51 1.88 1.04.93 1.92 1.21 2.19 1.35.27.14.43.12.59-.07.16-.18.68-.79.86-1.07.18-.27.36-.22.6-.13.24.09 1.55.73 1.81.86.27.13.45.2.51.31.07.11.07.62-.17 1.31z"/></svg>
	<span class="wa-tooltip">Scrivici</span>
</a>

<?php wp_footer(); ?>
</body>
</html>
