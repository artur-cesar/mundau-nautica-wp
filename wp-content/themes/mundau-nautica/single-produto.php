<?php
get_header();

while ( have_posts() ) :
	the_post();

	$whatsapp_url    = mundau_nautica_get_produto_whatsapp_url( get_the_ID() );
	$has_thumbnail   = has_post_thumbnail();
	$thumbnail_url   = $has_thumbnail ? get_the_post_thumbnail_url( null, 'large' ) : '';
?>

<article class="single-produto" itemscope itemtype="https://schema.org/Product">

	<div class="single-produto__hero<?php echo $has_thumbnail ? ' single-produto__hero--has-image' : ''; ?>"
		<?php if ( $thumbnail_url ) : ?>
			style="--produto-image: url('<?php echo esc_url( $thumbnail_url ); ?>');"
		<?php endif; ?>
	>
		<div class="site-container single-produto__hero-inner">
			<nav class="breadcrumb" aria-label="<?php esc_attr_e( 'Navegação estrutural', 'mundau-nautica' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Início', 'mundau-nautica' ); ?></a>
				<span aria-hidden="true">›</span>
				<a href="<?php echo esc_url( get_post_type_archive_link( 'produto' ) ); ?>"><?php esc_html_e( 'Produtos', 'mundau-nautica' ); ?></a>
				<span aria-hidden="true">›</span>
				<span aria-current="page"><?php the_title(); ?></span>
			</nav>
		</div>
	</div>

	<div class="site-container single-produto__body">
		<div class="single-produto__content">
			<p class="section-eyebrow"><?php esc_html_e( 'Produto', 'mundau-nautica' ); ?></p>
			<h1 itemprop="name"><?php the_title(); ?></h1>
			<div class="single-produto__description" itemprop="description">
				<?php
				$descricao = get_post_meta( get_the_ID(), '_mundau_produto_descricao', true );
				echo wp_kses_post( nl2br( esc_html( $descricao ) ) );
				?>
			</div>
			<div class="single-produto__actions">
				<a class="button button--primary button--icon button--icon-whatsapp" href="<?php echo esc_url( $whatsapp_url ); ?>" target="_blank" rel="noopener noreferrer">
					<?php esc_html_e( 'Consultar disponibilidade', 'mundau-nautica' ); ?>
				</a>
				<a class="button button--outline-dark" href="<?php echo esc_url( get_post_type_archive_link( 'produto' ) ); ?>">
					<?php esc_html_e( '← Ver todos os produtos', 'mundau-nautica' ); ?>
				</a>
			</div>
		</div>

		<?php if ( $has_thumbnail ) : ?>
			<div class="single-produto__image">
				<?php the_post_thumbnail( 'large', array( 'itemprop' => 'image', 'alt' => esc_attr( get_the_title() ) ) ); ?>
			</div>
		<?php endif; ?>
	</div>

</article>

<?php
endwhile;
get_footer();
?>
