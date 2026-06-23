<?php
get_header();

$hero_image_id  = absint( get_theme_mod( 'mundau_nautica_hero_image' ) );
$hero_image_url = $hero_image_id ? wp_get_attachment_image_url( $hero_image_id, 'full' ) : '';
$store_image_id  = absint( get_theme_mod( 'mundau_nautica_store_image' ) );
$store_image_url = $store_image_id ? wp_get_attachment_image_url( $store_image_id, 'large' ) : '';
?>

<section
	id="inicio"
	class="hero-section<?php echo $hero_image_url ? ' hero-section--has-image' : ''; ?>"
	<?php if ( $hero_image_url ) : ?>
		style="--hero-image: url('<?php echo esc_url( $hero_image_url ); ?>');"
	<?php endif; ?>
>
	<div class="site-container">
		<div class="hero-section__content">
			<p class="section-eyebrow"><?php esc_html_e( 'Loja náutica em Maceió', 'mundau-nautica' ); ?></p>
			<h1>
				<?php esc_html_e( 'Peças, acessórios e serviços náuticos em', 'mundau-nautica' ); ?>
				<span><?php esc_html_e( 'Maceió.', 'mundau-nautica' ); ?></span>
			</h1>
			<p><?php esc_html_e( 'Tudo para sua embarcação, com orientação de quem entende.', 'mundau-nautica' ); ?></p>
			<div class="button-row">
				<a class="button button--primary button--icon button--icon-whatsapp" href="<?php echo esc_url( mundau_nautica_get_whatsapp_url() ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Falar no WhatsApp', 'mundau-nautica' ); ?></a>
				<a class="button button--outline button--icon button--icon-map-pin" href="#contato"><?php esc_html_e( 'Ver localização', 'mundau-nautica' ); ?></a>
			</div>
		</div>
	</div>
</section>

<section class="brand-strip" aria-label="<?php esc_attr_e( 'Marcas atendidas', 'mundau-nautica' ); ?>">
	<div class="site-container brand-strip__inner">
		<p><?php esc_html_e( 'Trabalhamos com as principais marcas:', 'mundau-nautica' ); ?></p>
		<ul>
			<li>
				<span class="brand-strip__logo brand-strip__logo--yamaha" role="img" aria-label="Yamaha"></span>
			</li>
			<li>
				<span class="brand-strip__logo brand-strip__logo--mercury" role="img" aria-label="Mercury"></span>
			</li>
			<li>
				<span class="brand-strip__logo brand-strip__logo--suzuki" role="img" aria-label="Suzuki"></span>
			</li>
			<li>
				<span class="brand-strip__logo brand-strip__logo--evinrude" role="img" aria-label="Evinrude"></span>
			</li>
			<li>
				<span class="brand-strip__logo brand-strip__logo--hidea" role="img" aria-label="Hidea"></span>
			</li>
		</ul>
	</div>
</section>

<section id="servicos" class="site-section">
		<div class="site-container">
			<div class="section-heading">
				<h2><?php esc_html_e( 'O que você encontra aqui', 'mundau-nautica' ); ?></h2>
			</div>
			<div class="card-grid card-grid--four">
				<article class="feature-card">
					<div class="feature-card__icon feature-card__icon--anchor" aria-hidden="true"></div>
					<div class="feature-card__content">
						<h3><?php esc_html_e( 'Acessórios náuticos', 'mundau-nautica' ); ?></h3>
						<p><?php esc_html_e( 'Tudo que sua embarcação precisa para navegar com conforto e segurança.', 'mundau-nautica' ); ?></p>
					</div>
				</article>
				<article class="feature-card">
					<div class="feature-card__icon feature-card__icon--propeller" aria-hidden="true"></div>
					<div class="feature-card__content">
						<h3><?php esc_html_e( 'Peças para motores de popa', 'mundau-nautica' ); ?></h3>
						<p><?php esc_html_e( 'Peças e componentes para diferentes marcas e modelos.', 'mundau-nautica' ); ?></p>
					</div>
				</article>
				<article class="feature-card">
					<div class="feature-card__icon feature-card__icon--tools" aria-hidden="true"></div>
					<div class="feature-card__content">
						<h3><?php esc_html_e( 'Serviços e manutenção', 'mundau-nautica' ); ?></h3>
						<p><?php esc_html_e( 'Revisão, manutenção preventiva e suporte técnico especializado.', 'mundau-nautica' ); ?></p>
					</div>
				</article>
				<article class="feature-card">
					<div class="feature-card__icon feature-card__icon--ship" aria-hidden="true"></div>
					<div class="feature-card__content">
						<h3><?php esc_html_e( 'Apoio náutico / Marina', 'mundau-nautica' ); ?></h3>
						<p><?php esc_html_e( 'Suporte para quem precisa cuidar melhor da embarcação antes e depois da navegação.', 'mundau-nautica' ); ?></p>
					</div>
				</article>
			</div>
		</div>
	</section>

<section class="authority-section">
	<div
		class="authority-section__media<?php echo $store_image_url ? ' authority-section__media--has-image' : ''; ?>"
		role="img"
		aria-label="<?php echo $store_image_url ? esc_attr__( 'Foto da loja e atendimento técnico da Mundaú Náutica', 'mundau-nautica' ) : esc_attr__( 'Espaço reservado para foto da loja e atendimento técnico', 'mundau-nautica' ); ?>"
		<?php if ( $store_image_url ) : ?>
			style="--store-image: url('<?php echo esc_url( $store_image_url ); ?>');"
		<?php endif; ?>
	>
		<?php if ( ! $store_image_url ) : ?>
			<div>
				<strong><?php esc_html_e( 'Imagem da loja', 'mundau-nautica' ); ?></strong>
				<span><?php esc_html_e( 'Placeholder para foto real do atendimento e motores', 'mundau-nautica' ); ?></span>
			</div>
		<?php endif; ?>
	</div>
	<div class="authority-section__content">
		<p class="section-eyebrow"><?php esc_html_e( 'Atendimento técnico', 'mundau-nautica' ); ?></p>
		<h2><?php esc_html_e( 'Atendimento de quem conhece o barco por dentro.', 'mundau-nautica' ); ?></h2>
			<p><?php esc_html_e( 'Na Mundaú Náutica você encontra mais que produtos: encontra orientação, revisão e suporte técnico de verdade.', 'mundau-nautica' ); ?></p>
			<p><?php esc_html_e( 'São anos de experiência com motores de popa e equipamentos náuticos, ajudando clientes a navegarem com mais segurança e tranquilidade.', 'mundau-nautica' ); ?></p>
			<ul class="benefit-list">
				<li>
					<span class="benefit-list__icon benefit-list__icon--wrench" aria-hidden="true"></span>
					<span><?php esc_html_e( 'Especialista em motores de popa', 'mundau-nautica' ); ?></span>
				</li>
				<li>
					<span class="benefit-list__icon benefit-list__icon--gear" aria-hidden="true"></span>
					<span><?php esc_html_e( 'Peças de qualidade e procedência', 'mundau-nautica' ); ?></span>
				</li>
				<li>
					<span class="benefit-list__icon benefit-list__icon--headset" aria-hidden="true"></span>
					<span><?php esc_html_e( 'Suporte técnico personalizado', 'mundau-nautica' ); ?></span>
				</li>
			</ul>
		</div>
	</section>

<section class="winter-section">
	<div class="site-container winter-section__inner">
		<div class="winter-section__headline">
			<span class="winter-section__icon" aria-hidden="true"></span>
			<h2>
				<?php esc_html_e( 'Inverno é tempo de', 'mundau-nautica' ); ?>
				<span><?php esc_html_e( 'cuidar da embarcação.', 'mundau-nautica' ); ?></span>
			</h2>
		</div>
		<span class="winter-section__divider" aria-hidden="true"></span>
		<p><?php esc_html_e( 'Temos tudo o que você precisa para você cuidar da sua embarcação', 'mundau-nautica' ); ?></p>
		<a class="button button--primary" href="<?php echo esc_url( mundau_nautica_get_whatsapp_url( 'Olá! Gostaria de agendar uma avaliação.' ) ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Agendar avaliação', 'mundau-nautica' ); ?></a>
	</div>
</section>

<?php $produtos_query = mundau_nautica_get_produtos( 6 ); ?>
<section id="produtos" class="site-section products-section">
	<div class="site-container">
		<div class="section-heading">
			<h2><?php esc_html_e( 'Produtos em destaque', 'mundau-nautica' ); ?></h2>
		</div>

		<?php if ( $produtos_query->have_posts() ) : ?>
			<div class="card-grid card-grid--six">
				<?php while ( $produtos_query->have_posts() ) : $produtos_query->the_post(); ?>
					<article class="product-card">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'medium', array( 'class' => 'product-card__image product-card__image--photo', 'alt' => esc_attr( get_the_title() ) ) ); ?>
						<?php else : ?>
							<div class="product-card__image" aria-hidden="true"></div>
						<?php endif; ?>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php echo esc_html( wp_trim_words( get_post_meta( get_the_ID(), '_mundau_produto_descricao', true ), 12, '…' ) ); ?></p>
						<a class="product-card__cta" href="<?php echo esc_url( mundau_nautica_get_produto_whatsapp_url( get_the_ID() ) ); ?>" target="_blank" rel="noopener noreferrer">
							<?php esc_html_e( 'Consultar disponibilidade', 'mundau-nautica' ); ?>
						</a>
					</article>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<?php if ( $produtos_query->found_posts > 0 ) : ?>
				<div class="section-cta">
					<a class="button button--outline-dark" href="<?php echo esc_url( get_post_type_archive_link( 'produto' ) ); ?>">
						<?php esc_html_e( 'Ver todos os produtos', 'mundau-nautica' ); ?>
					</a>
				</div>
			<?php endif; ?>
		<?php else : ?>
			<p class="produtos-empty"><?php esc_html_e( 'Nenhum produto cadastrado ainda.', 'mundau-nautica' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php
$posts_query = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 3,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );
?>
<section id="conteudos" class="site-section content-section">
	<div class="site-container">
		<div class="section-heading">
			<h2><?php esc_html_e( 'Conteúdos para você navegar melhor', 'mundau-nautica' ); ?></h2>
		</div>
		<?php if ( $posts_query->have_posts() ) : ?>
			<div class="card-grid card-grid--three">
				<?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
					<article class="content-card">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'medium', array( 'class' => 'content-card__image content-card__image--photo', 'alt' => esc_attr( get_the_title() ) ) ); ?>
						<?php else : ?>
							<div class="content-card__image" aria-hidden="true"></div>
						<?php endif; ?>
						<div>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 16, '…' ) ); ?></p>
							<a class="content-card__link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Ler artigo', 'mundau-nautica' ); ?></a>
						</div>
					</article>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<div class="section-cta">
				<a class="button button--outline-dark" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>">
					<?php esc_html_e( 'Ver todos os artigos', 'mundau-nautica' ); ?>
				</a>
			</div>
		<?php else : ?>
			<p class="produtos-empty"><?php esc_html_e( 'Nenhum artigo publicado ainda.', 'mundau-nautica' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php
$_telefone      = get_theme_mod( 'mundau_nautica_telefone', '' );
$_whatsapp_num  = mundau_nautica_get_whatsapp_number();
$_whatsapp_raw  = get_theme_mod( 'mundau_nautica_whatsapp', '' );
$_whatsapp_url  = mundau_nautica_get_whatsapp_url();
$_instagram     = mundau_nautica_get_instagram_handle();
$_instagram_url = mundau_nautica_get_instagram_url();
$_endereco      = get_theme_mod( 'mundau_nautica_endereco', '' );
$_horario       = get_theme_mod( 'mundau_nautica_horario', 'Segunda a sexta, 08h às 18h. Sábado, 08h às 13h.' );
$_maps_link     = get_theme_mod( 'mundau_nautica_maps_link', '' );
$_maps_embed    = mundau_nautica_get_maps_embed_url();
?>
<section id="contato" class="site-section location-section">
	<div class="site-container">
		<div class="section-heading">
			<h2><?php esc_html_e( 'Visite nossa loja', 'mundau-nautica' ); ?></h2>
		</div>
		<div class="location-section__grid">
			<div class="location-info">
				<?php if ( $_endereco ) : ?>
					<p><strong><?php esc_html_e( 'Endereço', 'mundau-nautica' ); ?></strong><br><?php echo esc_html( $_endereco ); ?></p>
				<?php endif; ?>
				<?php if ( $_telefone ) : ?>
					<p>
						<strong><?php esc_html_e( 'Telefone', 'mundau-nautica' ); ?></strong><br>
						<a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', $_telefone ) ); ?>"><?php echo esc_html( $_telefone ); ?></a>
					</p>
				<?php endif; ?>
				<?php if ( $_whatsapp_num ) : ?>
					<p>
						<strong><?php esc_html_e( 'WhatsApp', 'mundau-nautica' ); ?></strong><br>
						<a href="<?php echo esc_url( $_whatsapp_url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $_whatsapp_raw ); ?></a>
					</p>
				<?php endif; ?>
				<?php if ( $_instagram ) : ?>
					<p>
						<strong><?php esc_html_e( 'Instagram', 'mundau-nautica' ); ?></strong><br>
						<a href="<?php echo esc_url( $_instagram_url ); ?>" target="_blank" rel="noopener noreferrer">@<?php echo esc_html( $_instagram ); ?></a>
					</p>
				<?php endif; ?>
				<?php if ( $_horario ) : ?>
					<p><strong><?php esc_html_e( 'Horário de funcionamento', 'mundau-nautica' ); ?></strong><br><?php echo esc_html( $_horario ); ?></p>
				<?php endif; ?>
			</div>

			<?php if ( $_maps_embed ) : ?>
				<div class="map-embed">
					<iframe
						src="<?php echo esc_url( $_maps_embed ); ?>"
						width="100%"
						height="100%"
						style="border:0;"
						allowfullscreen=""
						loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"
						title="<?php esc_attr_e( 'Localização da Mundaú Náutica no Google Maps', 'mundau-nautica' ); ?>"
					></iframe>
				</div>
			<?php else : ?>
				<div class="map-placeholder" role="img" aria-label="<?php esc_attr_e( 'Mapa da localização da loja', 'mundau-nautica' ); ?>">
					<span><?php esc_html_e( 'Configure a latitude e longitude no Customizer para exibir o mapa.', 'mundau-nautica' ); ?></span>
				</div>
			<?php endif; ?>

			<div class="location-actions">
				<?php if ( $_maps_link ) : ?>
					<a class="button button--primary" href="<?php echo esc_url( $_maps_link ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Abrir no Google Maps', 'mundau-nautica' ); ?></a>
				<?php endif; ?>
				<?php if ( $_whatsapp_url !== '#' ) : ?>
					<a class="button button--dark" href="<?php echo esc_url( $_whatsapp_url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Chamar no WhatsApp', 'mundau-nautica' ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
