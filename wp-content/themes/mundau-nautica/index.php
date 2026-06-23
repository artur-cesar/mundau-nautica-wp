<?php
get_header();
?>

<section class="site-section">
	<div class="site-container">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-entry' ); ?>>
					<h1><?php the_title(); ?></h1>
					<div class="content-entry__body">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<h1><?php esc_html_e( 'Mundaú Náutica', 'mundau-nautica' ); ?></h1>
			<p><?php esc_html_e( 'Nenhum conteúdo encontrado.', 'mundau-nautica' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
