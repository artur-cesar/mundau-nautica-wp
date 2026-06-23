<?php
get_header();

while ( have_posts() ) :
	the_post();

	$has_thumbnail = has_post_thumbnail();
	$thumbnail_url = $has_thumbnail ? get_the_post_thumbnail_url( null, 'full' ) : '';

	$related_query = new WP_Query( array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => 3,
		'post__not_in'   => array( get_the_ID() ),
		'orderby'        => 'date',
		'order'          => 'DESC',
	) );
?>

<article class="single-post" itemscope itemtype="https://schema.org/Article">

	<header
		class="single-post__hero<?php echo $has_thumbnail ? ' single-post__hero--has-image' : ''; ?>"
		<?php if ( $thumbnail_url ) : ?>
			style="--post-image: url('<?php echo esc_url( $thumbnail_url ); ?>');"
		<?php endif; ?>
	>
		<div class="site-container single-post__hero-inner">
			<nav class="breadcrumb" aria-label="<?php esc_attr_e( 'Navegação estrutural', 'mundau-nautica' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Início', 'mundau-nautica' ); ?></a>
				<span aria-hidden="true">›</span>
				<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'mundau-nautica' ); ?></a>
				<span aria-hidden="true">›</span>
				<span aria-current="page"><?php the_title(); ?></span>
			</nav>
			<p class="section-eyebrow"><?php esc_html_e( 'Artigo', 'mundau-nautica' ); ?></p>
			<h1 itemprop="headline"><?php the_title(); ?></h1>
			<p class="single-post__meta">
				<time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>" itemprop="datePublished">
					<?php echo esc_html( get_the_date() ); ?>
				</time>
				<?php if ( get_the_author() ) : ?>
					<span aria-hidden="true">·</span>
					<span itemprop="author"><?php the_author(); ?></span>
				<?php endif; ?>
			</p>
		</div>
	</header>

	<div class="site-container single-post__body">
		<div class="single-post__content" itemprop="articleBody">
			<?php the_content(); ?>
		</div>

		<aside class="single-post__sidebar">
			<div class="single-post__cta-box">
				<p class="section-eyebrow"><?php esc_html_e( 'Precisa de ajuda?', 'mundau-nautica' ); ?></p>
				<p><?php esc_html_e( 'Fale com a gente pelo WhatsApp e tire suas dúvidas.', 'mundau-nautica' ); ?></p>
				<a class="button button--primary button--icon button--icon-whatsapp" href="<?php echo esc_url( mundau_nautica_get_whatsapp_url() ); ?>" target="_blank" rel="noopener noreferrer">
					<?php esc_html_e( 'Falar no WhatsApp', 'mundau-nautica' ); ?>
				</a>
			</div>

			<?php if ( $related_query->have_posts() ) : ?>
				<div class="single-post__related">
					<h2><?php esc_html_e( 'Leia também', 'mundau-nautica' ); ?></h2>
					<ul class="blog-sidebar__list">
						<?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
							<li class="blog-sidebar__item">
								<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
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
				</div>
			<?php endif; ?>

			<a class="single-post__back" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>">
				← <?php esc_html_e( 'Ver todos os artigos', 'mundau-nautica' ); ?>
			</a>
		</aside>
	</div>

</article>

<?php
endwhile;
get_footer();
?>
