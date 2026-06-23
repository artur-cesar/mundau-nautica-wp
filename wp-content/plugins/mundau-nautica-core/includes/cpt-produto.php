<?php
/**
 * Custom Post Type: Produto — registro, meta boxes e helpers de query.
 *
 * @package Mundau_Nautica
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function mundau_nautica_register_produto_cpt(): void {
	register_post_type(
		'produto',
		array(
			'labels'       => array(
				'name'               => __( 'Produtos', 'mundau-nautica' ),
				'singular_name'      => __( 'Produto', 'mundau-nautica' ),
				'add_new'            => __( 'Adicionar produto', 'mundau-nautica' ),
				'add_new_item'       => __( 'Adicionar novo produto', 'mundau-nautica' ),
				'edit_item'          => __( 'Editar produto', 'mundau-nautica' ),
				'new_item'           => __( 'Novo produto', 'mundau-nautica' ),
				'view_item'          => __( 'Ver produto', 'mundau-nautica' ),
				'view_items'         => __( 'Ver produtos', 'mundau-nautica' ),
				'search_items'       => __( 'Buscar produtos', 'mundau-nautica' ),
				'not_found'          => __( 'Nenhum produto encontrado.', 'mundau-nautica' ),
				'not_found_in_trash' => __( 'Nenhum produto na lixeira.', 'mundau-nautica' ),
				'all_items'          => __( 'Todos os produtos', 'mundau-nautica' ),
				'menu_name'          => __( 'Produtos', 'mundau-nautica' ),
			),
			'public'       => true,
			'show_in_menu' => true,
			'menu_position'=> 5,
			'menu_icon'    => 'dashicons-cart',
			'supports'     => array( 'title', 'thumbnail' ),
			'has_archive'  => true,
			'rewrite'      => array( 'slug' => 'produtos' ),
			'show_in_rest' => false,
		)
	);
}
add_action( 'init', 'mundau_nautica_register_produto_cpt' );

function mundau_nautica_produto_meta_boxes(): void {
	add_meta_box(
		'mundau_produto_descricao',
		__( 'Descrição do produto', 'mundau-nautica' ),
		'mundau_nautica_produto_descricao_html',
		'produto',
		'normal',
		'high'
	);
	add_meta_box(
		'mundau_produto_detalhes',
		__( 'Configurações', 'mundau-nautica' ),
		'mundau_nautica_produto_detalhes_html',
		'produto',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'mundau_nautica_produto_meta_boxes' );

function mundau_nautica_produto_descricao_html( WP_Post $post ): void {
	wp_nonce_field( 'mundau_produto_save', 'mundau_produto_nonce' );
	$descricao = get_post_meta( $post->ID, '_mundau_produto_descricao', true );
	?>
	<p>
		<textarea
			id="mundau_produto_descricao"
			name="mundau_produto_descricao"
			rows="8"
			style="width:100%;font-size:14px;line-height:1.6"
			placeholder="<?php esc_attr_e( 'Descreva o produto: características, compatibilidade, usos indicados…', 'mundau-nautica' ); ?>"
		><?php echo esc_textarea( $descricao ); ?></textarea>
	</p>
	<?php
}

function mundau_nautica_produto_detalhes_html( WP_Post $post ): void {
	$ordem    = get_post_meta( $post->ID, '_mundau_produto_ordem', true );
	$mensagem = get_post_meta( $post->ID, '_mundau_produto_whatsapp', true );
	?>
	<p>
		<label for="mundau_produto_ordem"><strong><?php esc_html_e( 'Ordem de exibição', 'mundau-nautica' ); ?></strong></label><br>
		<input
			type="number"
			id="mundau_produto_ordem"
			name="mundau_produto_ordem"
			value="<?php echo esc_attr( $ordem ); ?>"
			min="0"
			step="1"
			style="width:100%"
		>
		<span style="color:#666;font-size:0.85em"><?php esc_html_e( 'Menor número = aparece primeiro.', 'mundau-nautica' ); ?></span>
	</p>
	<p>
		<label for="mundau_produto_whatsapp"><strong><?php esc_html_e( 'Mensagem para WhatsApp', 'mundau-nautica' ); ?></strong></label><br>
		<textarea
			id="mundau_produto_whatsapp"
			name="mundau_produto_whatsapp"
			rows="4"
			style="width:100%"
			placeholder="<?php esc_attr_e( 'Se vazio, usa o nome do produto automaticamente.', 'mundau-nautica' ); ?>"
		><?php echo esc_textarea( $mensagem ); ?></textarea>
	</p>
	<?php
}

function mundau_nautica_produto_save_meta( int $post_id ): void {
	if (
		! isset( $_POST['mundau_produto_nonce'] ) ||
		! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mundau_produto_nonce'] ) ), 'mundau_produto_save' )
	) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['mundau_produto_descricao'] ) ) {
		update_post_meta( $post_id, '_mundau_produto_descricao', sanitize_textarea_field( wp_unslash( $_POST['mundau_produto_descricao'] ) ) );
	}

	if ( isset( $_POST['mundau_produto_ordem'] ) ) {
		update_post_meta( $post_id, '_mundau_produto_ordem', absint( $_POST['mundau_produto_ordem'] ) );
	}

	if ( isset( $_POST['mundau_produto_whatsapp'] ) ) {
		update_post_meta( $post_id, '_mundau_produto_whatsapp', sanitize_textarea_field( wp_unslash( $_POST['mundau_produto_whatsapp'] ) ) );
	}
}
add_action( 'save_post_produto', 'mundau_nautica_produto_save_meta' );

/**
 * Retorna a URL do WhatsApp para um produto específico.
 */
function mundau_nautica_get_produto_whatsapp_url( int $post_id ): string {
	$mensagem = get_post_meta( $post_id, '_mundau_produto_whatsapp', true );
	if ( ! $mensagem ) {
		$mensagem = sprintf(
			/* translators: %s: nome do produto */
			__( 'Olá! Gostaria de consultar a disponibilidade do produto: %s', 'mundau-nautica' ),
			get_the_title( $post_id )
		);
	}
	return mundau_nautica_get_whatsapp_url( $mensagem );
}

/**
 * Query de produtos ordenada por meta _mundau_produto_ordem, depois por data.
 */
function mundau_nautica_get_produtos( int $limit = -1 ): WP_Query {
	return new WP_Query(
		array(
			'post_type'      => 'produto',
			'post_status'    => 'publish',
			'posts_per_page' => $limit,
			'meta_query'     => array(
				'relation' => 'OR',
				array(
					'key'     => '_mundau_produto_ordem',
					'compare' => 'EXISTS',
				),
				array(
					'key'     => '_mundau_produto_ordem',
					'compare' => 'NOT EXISTS',
				),
			),
			'orderby'        => array(
				'meta_value_num' => 'ASC',
				'date'           => 'DESC',
			),
		)
	);
}
