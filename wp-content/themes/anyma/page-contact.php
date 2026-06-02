<?php
/**
 * Template Name: Contatti
 *
 * @package ANyMA
 */

get_header();
?>

<section class="hero-small" style="background-image:linear-gradient(rgba(26,39,68,0.45),rgba(26,39,68,0.55)),url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=2000&q=80');">
	<div>
		<h1><?php esc_html_e( 'Prenota &amp; Contatti', 'anyma' ); ?></h1>
		<nav class="breadcrumb" aria-label="breadcrumb">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'anyma' ); ?></a> &rsaquo; <span><?php esc_html_e( 'Contatti', 'anyma' ); ?></span>
		</nav>
	</div>
</section>

<section class="section section-light">
	<div class="container">
		<div class="contact-grid">
			<!-- FORM -->
			<div class="reveal">
				<span class="eyebrow"><?php esc_html_e( 'Richiesta', 'anyma' ); ?></span>
				<h2 class="section-title" style="margin-bottom:2rem;"><?php esc_html_e( 'Richiedi disponibilità', 'anyma' ); ?></h2>
				<form class="contact-form" action="#" method="post" novalidate>
					<div class="form-row">
						<div class="field"><input type="text" id="first-name" name="first_name" placeholder=" " required><label for="first-name"><?php esc_html_e( 'Nome', 'anyma' ); ?></label></div>
						<div class="field"><input type="text" id="last-name" name="last_name" placeholder=" " required><label for="last-name"><?php esc_html_e( 'Cognome', 'anyma' ); ?></label></div>
					</div>
					<div class="form-row">
						<div class="field"><input type="email" id="email" name="email" placeholder=" " required><label for="email">Email</label></div>
						<div class="field"><input type="tel" id="phone" name="phone" placeholder=" "><label for="phone"><?php esc_html_e( 'Telefono', 'anyma' ); ?></label></div>
					</div>
					<div class="form-row">
						<div class="field filled"><input type="date" id="checkin" name="checkin" placeholder=" "><label for="checkin">Check-in</label></div>
						<div class="field filled"><input type="date" id="checkout" name="checkout" placeholder=" "><label for="checkout">Check-out</label></div>
					</div>
					<div class="field filled">
						<select id="guests" name="guests">
							<option value="1"><?php esc_html_e( '1 ospite', 'anyma' ); ?></option>
							<option value="2" selected><?php esc_html_e( '2 ospiti', 'anyma' ); ?></option>
						</select>
						<label for="guests"><?php esc_html_e( 'Ospiti', 'anyma' ); ?></label>
					</div>
					<div class="field"><textarea id="message" name="message" placeholder=" "></textarea><label for="message"><?php esc_html_e( 'Messaggio', 'anyma' ); ?></label></div>
					<button type="submit" class="btn btn-gold"><?php esc_html_e( 'Invia richiesta', 'anyma' ); ?></button>
				</form>
			</div>

			<!-- CONTATTI -->
			<aside class="contact-aside reveal">
				<h3><?php esc_html_e( 'Parla con noi', 'anyma' ); ?></h3>
				<div class="contact-line">
					<span class="icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 7l10 6 10-6"/></svg></span>
					<a href="mailto:info@casavacanzeanyma.com">info@casavacanzeanyma.com</a>
				</div>
				<div class="contact-line">
					<span class="icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.6A2 2 0 0 1 4.1 2H7a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.2a2 2 0 0 1 2.1-.5c.9.3 1.8.6 2.7.7A2 2 0 0 1 22 16.9z"/></svg></span>
					<a href="tel:+393331234567">+39 333 123 4567</a>
				</div>

				<a class="btn btn-whatsapp" href="https://wa.me/393331234567" target="_blank" rel="noopener">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38a9.86 9.86 0 0 0 4.79 1.22c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2z"/></svg>
					<?php esc_html_e( 'Scrivici su WhatsApp', 'anyma' ); ?>
				</a>

				<div class="aside-platforms">
					<a class="aside-badge booking" href="https://www.booking.com" target="_blank" rel="noopener">Booking.com</a>
					<a class="aside-badge airbnb" href="https://www.airbnb.it" target="_blank" rel="noopener">Airbnb</a>
				</div>

				<div class="checkin-info">
					<p><strong>Check-in:</strong> <?php esc_html_e( 'dalle 15:00', 'anyma' ); ?></p>
					<p><strong>Check-out:</strong> <?php esc_html_e( 'entro le 11:00', 'anyma' ); ?></p>
				</div>
			</aside>
		</div>
	</div>
</section>

<!-- FAQ -->
<section class="section section-sand">
	<div class="container">
		<div class="section-head text-center reveal">
			<span class="eyebrow">FAQ</span>
			<h2 class="section-title"><?php esc_html_e( 'Domande frequenti', 'anyma' ); ?></h2>
		</div>
		<div class="faq-list reveal">
			<?php
			$faqs = array(
				array( __( 'A che ora sono il check-in e il check-out?', 'anyma' ), __( 'Il check-in è disponibile dalle 15:00 e il check-out va effettuato entro le 11:00. Orari flessibili su richiesta, in base alla disponibilità.', 'anyma' ) ),
				array( __( "L'appartamento è adatto a bambini?", 'anyma' ), __( 'ANyMA è pensato per coppie e ospita al massimo 2 persone. Per questo non è la sistemazione ideale per famiglie con bambini piccoli.', 'anyma' ) ),
				array( __( 'È disponibile un parcheggio?', 'anyma' ), __( 'Sì, è disponibile un parcheggio nelle vicinanze al costo di €20 al giorno. Vi consigliamo di segnalarci l\'arrivo in auto in anticipo.', 'anyma' ) ),
				array( __( 'È incluso il WiFi?', 'anyma' ), __( 'Certo: WiFi gratuito e veloce in tutto l\'appartamento, perfetto anche per chi lavora da remoto.', 'anyma' ) ),
				array( __( 'Gli animali sono ammessi?', 'anyma' ), __( 'Valutiamo la presenza di piccoli animali domestici caso per caso. Contattateci prima della prenotazione per organizzare al meglio il soggiorno.', 'anyma' ) ),
				array( __( 'Offrite la colazione?', 'anyma' ), __( 'Su richiesta possiamo organizzare una colazione con prodotti locali. Indicatelo nel messaggio al momento della richiesta.', 'anyma' ) ),
			);
			foreach ( $faqs as $i => $faq ) :
				?>
				<div class="faq-item">
					<button class="faq-q" aria-expanded="false" aria-controls="faq-a-<?php echo (int) $i; ?>">
						<span><?php echo esc_html( $faq[0] ); ?></span>
						<span class="toggle" aria-hidden="true">+</span>
					</button>
					<div class="faq-a" id="faq-a-<?php echo (int) $i; ?>">
						<p><?php echo esc_html( $faq[1] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_footer();
