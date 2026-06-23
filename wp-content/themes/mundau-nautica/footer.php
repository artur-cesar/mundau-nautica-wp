	</main>

	<footer class="site-footer">
		<div class="site-container site-footer__grid">
			<div class="site-footer__brand">
				<a class="site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img
						src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/mundau-logo-transparent.png' ); ?>"
						alt="<?php esc_attr_e( 'Mundaú Náutica', 'mundau-nautica' ); ?>"
					>
				</a>
				<p><?php esc_html_e( 'Peças, acessórios e serviços náuticos em Maceió. Atendimento técnico, confiável e com quem entende.', 'mundau-nautica' ); ?></p>
			</div>
			<div>
				<h2><?php esc_html_e( 'Links rápidos', 'mundau-nautica' ); ?></h2>
				<ul>
					<li><a href="#inicio"><?php esc_html_e( 'Início', 'mundau-nautica' ); ?></a></li>
					<li><a href="#servicos"><?php esc_html_e( 'Serviços', 'mundau-nautica' ); ?></a></li>
					<li><a href="#produtos"><?php esc_html_e( 'Produtos', 'mundau-nautica' ); ?></a></li>
					<li><a href="#conteudos"><?php esc_html_e( 'Conteúdos', 'mundau-nautica' ); ?></a></li>
					<li><a href="#contato"><?php esc_html_e( 'Contato', 'mundau-nautica' ); ?></a></li>
				</ul>
			</div>
			<div>
				<h2><?php esc_html_e( 'Categorias', 'mundau-nautica' ); ?></h2>
				<ul>
					<li><?php esc_html_e( 'Motores de popa', 'mundau-nautica' ); ?></li>
					<li><?php esc_html_e( 'Peças', 'mundau-nautica' ); ?></li>
					<li><?php esc_html_e( 'Acessórios', 'mundau-nautica' ); ?></li>
					<li><?php esc_html_e( 'Itens de segurança', 'mundau-nautica' ); ?></li>
					<li><?php esc_html_e( 'Capas e proteção', 'mundau-nautica' ); ?></li>
				</ul>
			</div>
			<?php
			$_ft_endereco  = get_theme_mod( 'mundau_nautica_endereco', '' );
			$_ft_telefone  = get_theme_mod( 'mundau_nautica_telefone', '' );
			$_ft_whatsapp  = get_theme_mod( 'mundau_nautica_whatsapp', '' );
			$_ft_instagram = mundau_nautica_get_instagram_handle();
			$_ft_insta_url = mundau_nautica_get_instagram_url();
			$_ft_horario   = get_theme_mod( 'mundau_nautica_horario', 'Segunda a sexta, 08h às 18h. Sábado, 08h às 13h.' );
			?>
			<div>
				<h2><?php esc_html_e( 'Informações', 'mundau-nautica' ); ?></h2>
				<ul>
					<?php if ( $_ft_endereco ) : ?>
						<li><?php echo esc_html( $_ft_endereco ); ?></li>
					<?php endif; ?>
					<?php if ( $_ft_telefone ) : ?>
						<li>
							<a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $_ft_telefone ) ); ?>">
								<?php echo esc_html( $_ft_telefone ); ?>
							</a>
						</li>
					<?php endif; ?>
					<?php if ( $_ft_whatsapp ) : ?>
						<li>
							<a href="<?php echo esc_url( mundau_nautica_get_whatsapp_url() ); ?>" target="_blank" rel="noopener noreferrer">
								<?php echo esc_html( $_ft_whatsapp ); ?>
							</a>
						</li>
					<?php endif; ?>
					<?php if ( $_ft_instagram ) : ?>
						<li>
							<a href="<?php echo esc_url( $_ft_insta_url ); ?>" target="_blank" rel="noopener noreferrer">
								@<?php echo esc_html( $_ft_instagram ); ?>
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
			<?php if ( $_ft_horario ) : ?>
			<div>
				<h2><?php esc_html_e( 'Horário de funcionamento', 'mundau-nautica' ); ?></h2>
				<p><?php echo esc_html( $_ft_horario ); ?></p>
			</div>
			<?php endif; ?>
		</div>
		<div class="site-container site-footer__bottom">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php esc_html_e( 'Mundaú Náutica. Todos os direitos reservados.', 'mundau-nautica' ); ?></p>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
