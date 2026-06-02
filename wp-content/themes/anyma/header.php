<?php
/**
 * Header template.
 *
 * @package ANyMA
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Casa Vacanze ANyMA - Appartamento romantico vista mare a Marina della Lobra, Massa Lubrense, Costiera Sorrentina.">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e( 'Salta al contenuto', 'anyma' ); ?></a>

<header class="site-header" id="site-header">
	<div class="header-inner">
		<a class="site-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="ANyMA Casa Vacanze - Home">
			<span class="brand-name">ANyMA</span>
			<span class="brand-sub">Casa Vacanze</span>
		</a>

		<nav class="site-nav" aria-label="<?php esc_attr_e( 'Navigazione principale', 'anyma' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'nav-menu',
						'container'      => false,
					)
				);
			} else {
				anyma_default_menu();
			}
			?>
		</nav>

		<div class="header-actions">
			<div class="lang-switcher" role="group" aria-label="<?php esc_attr_e( 'Cambia lingua', 'anyma' ); ?>">
				<button type="button" class="lang-btn is-active" data-lang="it" aria-pressed="true">IT</button>
				<span class="lang-sep" aria-hidden="true">/</span>
				<button type="button" class="lang-btn" data-lang="en" aria-pressed="false">EN</button>
			</div>
			<a class="btn btn-gold header-cta" href="<?php echo esc_url( home_url( '/contatti' ) ); ?>"><?php esc_html_e( 'Prenota ora', 'anyma' ); ?></a>
			<button class="hamburger" id="hamburger" aria-label="<?php esc_attr_e( 'Apri menu', 'anyma' ); ?>" aria-expanded="false" aria-controls="mobile-overlay">
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>
</header>

<div class="mobile-overlay" id="mobile-overlay" aria-hidden="true">
	<button class="mobile-close" id="mobile-close" aria-label="<?php esc_attr_e( 'Chiudi menu', 'anyma' ); ?>">&times;</button>
	<nav class="mobile-nav" aria-label="<?php esc_attr_e( 'Navigazione mobile', 'anyma' ); ?>">
		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_class'     => 'mobile-menu',
					'container'      => false,
				)
			);
		} else {
			anyma_default_menu();
		}
		?>
		<a class="btn btn-gold mobile-cta" href="<?php echo esc_url( home_url( '/contatti' ) ); ?>"><?php esc_html_e( 'Prenota ora', 'anyma' ); ?></a>
	</nav>
</div>

<main id="main-content" class="site-main">
