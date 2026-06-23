<?php
get_header();

$todos_query = mundau_nautica_get_produtos();
?>

<section class="page-hero">
	<div class="site-container">
		<p class="section-eyebrow"><?php esc_html_e( 'Catálogo', 'mundau-nautica' ); ?></p>
		<h1><?php esc_html_e( 'Todos os produtos', 'mundau-nautica' ); ?></h1>
		<p><?php esc_html_e( 'Peças, acessórios e equipamentos náuticos. Consulte disponibilidade diretamente pelo WhatsApp.', 'mundau-nautica' ); ?></p>
	</div>
</section>

<section class="site-section products-section">
	<div class="site-container">
		<?php if ( $todos_query->have_posts() ) : ?>
			<div class="card-grid card-grid--four">
				<?php while ( $todos_query->have_posts() ) : $todos_query->the_post(); ?>
					<article class="product-card">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'medium', array( 'class' => 'product-card__image product-card__image--photo', 'alt' => esc_attr( get_the_title() ) ) ); ?>
						<?php else : ?>
							<div class="product-card__image" aria-hidden="true"></div>
						<?php endif; ?>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php echo esc_html( wp_trim_words( get_post_meta( get_the_ID(), '_mundau_produto_descricao', true ), 14, '…' ) ); ?></p>
						<a class="product-card__cta" href="<?php echo esc_url( mundau_nautica_get_produto_whatsapp_url( get_the_ID() ) ); ?>" target="_blank" rel="noopener noreferrer">
							<?php esc_html_e( 'Consultar disponibilidade', 'mundau-nautica' ); ?>
						</a>
					</article>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		<?php else : ?>
			<p class="produtos-empty"><?php esc_html_e( 'Nenhum produto cadastrado ainda. Volte em breve!', 'mundau-nautica' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
