<?php
get_header();

$featured_query = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 1,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

$sidebar_query = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 8,
	'offset'         => 1,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );
?>

<section class="page-hero">
	<div class="site-container">
		<p class="section-eyebrow"><?php esc_html_e( 'Blog', 'mundau-nautica' ); ?></p>
		<h1><?php esc_html_e( 'Conteúdos para você navegar melhor', 'mundau-nautica' ); ?></h1>
		<p><?php esc_html_e( 'Dicas, tutoriais e informações sobre náutica, motores e manutenção.', 'mundau-nautica' ); ?></p>
	</div>
</section>

<section class="site-section blog-archive-section">
	<div class="site-container">
		<div class="blog-archive__layout">

			<?php if ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
				<article class="blog-featured">
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" class="blog-featured__image-link" tabindex="-1" aria-hidden="true">
							<?php the_post_thumbnail( 'large', array( 'class' => 'blog-featured__image', 'alt' => '' ) ); ?>
						</a>
					<?php else : ?>
						<div class="blog-featured__image blog-featured__image--placeholder" aria-hidden="true"></div>
					<?php endif; ?>
					<div class="blog-featured__content">
						<p class="section-eyebrow"><?php esc_html_e( 'Artigo em destaque', 'mundau-nautica' ); ?></p>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p class="blog-featured__meta">
							<time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						</p>
						<p class="blog-featured__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 30, '…' ) ); ?></p>
						<a class="button button--primary" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Ler artigo', 'mundau-nautica' ); ?></a>
					</div>
				</article>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

			<?php if ( $sidebar_query->have_posts() ) : ?>
				<aside class="blog-sidebar">
					<h2 class="blog-sidebar__title"><?php esc_html_e( 'Mais artigos', 'mundau-nautica' ); ?></h2>
					<ul class="blog-sidebar__list">
						<?php while ( $sidebar_query->have_posts() ) : $sidebar_query->the_post(); ?>
							<li class="blog-sidebar__item">
								<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>" class="blog-sidebar__thumb-link" tabindex="-1" aria-hidden="true">
										<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'blog-sidebar__thumb', 'alt' => '' ) ); ?>
									</a>
								<?php else : ?>
									<div class="blog-sidebar__thumb blog-sidebar__thumb--placeholder" aria-hidden="true"></div>
								<?php endif; ?>
								<div class="blog-sidebar__info">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'd/m/Y' ) ); ?></time>
								</div>
							</li>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</ul>
				</aside>
			<?php endif; ?>

		</div>
	</div>
</section>

<?php get_footer(); ?>
