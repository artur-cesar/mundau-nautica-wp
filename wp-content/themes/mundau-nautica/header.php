<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="site">
	<header class="site-header">
		<div class="site-container site-header__inner">
			<div class="site-branding">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<a class="site-branding__name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<span class="site-branding__mark">M</span>
						<span><?php esc_html_e( 'Mundaú Náutica', 'mundau-nautica' ); ?></span>
					</a>
				<?php endif; ?>
			</div>

			<button
				class="site-menu-toggle"
				type="button"
				aria-label="<?php esc_attr_e( 'Abrir menu', 'mundau-nautica' ); ?>"
				aria-expanded="false"
				aria-controls="primary-menu"
			>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</button>

			<nav id="primary-menu" class="site-navigation" aria-label="<?php esc_attr_e( 'Menu principal', 'mundau-nautica' ); ?>">
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_class'     => 'site-navigation__menu',
							'container'      => false,
							'depth'          => 1,
						)
					);
					?>
				<?php else : ?>
						<ul class="site-navigation__menu">
							<li><a href="#inicio"><?php esc_html_e( 'Início', 'mundau-nautica' ); ?></a></li>
							<li><a href="#servicos"><?php esc_html_e( 'Serviços', 'mundau-nautica' ); ?></a></li>
							<li><a href="#produtos"><?php esc_html_e( 'Produtos', 'mundau-nautica' ); ?></a></li>
							<li><a href="#conteudos"><?php esc_html_e( 'Conteúdos', 'mundau-nautica' ); ?></a></li>
							<li><a href="#contato"><?php esc_html_e( 'Contato', 'mundau-nautica' ); ?></a></li>
						</ul>
				<?php endif; ?>
			</nav>

			<a class="button button--primary site-header__cta" href="<?php echo esc_url( mundau_nautica_get_whatsapp_url() ); ?>" target="_blank" rel="noopener noreferrer">
				<?php esc_html_e( 'Chamar no WhatsApp', 'mundau-nautica' ); ?>
			</a>
		</div>
	</header>

	<main class="site-main">
