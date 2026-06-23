<?php
/**
 * Theme setup and asset loading.
 *
 * @package Mundau_Nautica
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function mundau_nautica_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 58,
			'width'       => 220,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Menu Principal', 'mundau-nautica' ),
		)
	);
}
add_action( 'after_setup_theme', 'mundau_nautica_setup' );

function mundau_nautica_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'mundau-nautica-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		$theme_version
	);

	wp_enqueue_script(
		'mundau-nautica-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		$theme_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'mundau_nautica_enqueue_assets' );

function mundau_nautica_customize_register( $wp_customize ) {
	// --- Seção: Imagens ---
	$wp_customize->add_section(
		'mundau_nautica_homepage',
		array(
			'title'    => __( 'Mundaú Náutica — Imagens', 'mundau-nautica' ),
			'priority' => 160,
		)
	);

	$wp_customize->add_setting(
		'mundau_nautica_hero_image',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'mundau_nautica_hero_image',
			array(
				'label'       => __( 'Imagem do hero', 'mundau-nautica' ),
				'description' => __( 'Imagem principal exibida no topo da homepage.', 'mundau-nautica' ),
				'section'     => 'mundau_nautica_homepage',
				'mime_type'   => 'image',
			)
		)
	);

	$wp_customize->add_setting(
		'mundau_nautica_store_image',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'mundau_nautica_store_image',
			array(
				'label'       => __( 'Imagem da loja', 'mundau-nautica' ),
				'description' => __( 'Foto exibida na seção de atendimento técnico.', 'mundau-nautica' ),
				'section'     => 'mundau_nautica_homepage',
				'mime_type'   => 'image',
			)
		)
	);

	// --- Seção: Contato e localização ---
	$wp_customize->add_section(
		'mundau_nautica_contato',
		array(
			'title'       => __( 'Mundaú Náutica — Contato', 'mundau-nautica' ),
			'description' => __( 'Dados de contato e localização exibidos na homepage e no cabeçalho.', 'mundau-nautica' ),
			'priority'    => 161,
		)
	);

	// Telefone
	$wp_customize->add_setting(
		'mundau_nautica_telefone',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'mundau_nautica_telefone',
		array(
			'label'       => __( 'Telefone', 'mundau-nautica' ),
			'description' => __( 'Ex: (82) 3351-5321', 'mundau-nautica' ),
			'section'     => 'mundau_nautica_contato',
			'type'        => 'text',
		)
	);

	// WhatsApp
	$wp_customize->add_setting(
		'mundau_nautica_whatsapp',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'mundau_nautica_whatsapp',
		array(
			'label'       => __( 'WhatsApp (número com DDI)', 'mundau-nautica' ),
			'description' => __( 'Somente dígitos, com DDI. Ex: 5582999990000', 'mundau-nautica' ),
			'section'     => 'mundau_nautica_contato',
			'type'        => 'text',
		)
	);

	// Instagram handle
	$wp_customize->add_setting(
		'mundau_nautica_instagram',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'mundau_nautica_instagram',
		array(
			'label'       => __( 'Instagram (@ da conta)', 'mundau-nautica' ),
			'description' => __( 'Somente o @ sem URL. Ex: @mundanautica', 'mundau-nautica' ),
			'section'     => 'mundau_nautica_contato',
			'type'        => 'text',
		)
	);

	// Endereço
	$wp_customize->add_setting(
		'mundau_nautica_endereco',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'mundau_nautica_endereco',
		array(
			'label'       => __( 'Endereço', 'mundau-nautica' ),
			'description' => __( 'Endereço completo da loja.', 'mundau-nautica' ),
			'section'     => 'mundau_nautica_contato',
			'type'        => 'text',
		)
	);

	// Link do Google Maps
	$wp_customize->add_setting(
		'mundau_nautica_maps_link',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'mundau_nautica_maps_link',
		array(
			'label'       => __( 'Link do Google Maps', 'mundau-nautica' ),
			'description' => __( 'URL completa do Google Maps para o botão "Abrir no Google Maps".', 'mundau-nautica' ),
			'section'     => 'mundau_nautica_contato',
			'type'        => 'url',
		)
	);

	// Horário de funcionamento
	$wp_customize->add_setting(
		'mundau_nautica_horario',
		array(
			'default'           => 'Segunda a sexta, 08h às 18h. Sábado, 08h às 13h.',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'mundau_nautica_horario',
		array(
			'label'       => __( 'Horário de funcionamento', 'mundau-nautica' ),
			'description' => __( 'Ex: Segunda a sexta, 08h às 18h. Sábado, 08h às 13h.', 'mundau-nautica' ),
			'section'     => 'mundau_nautica_contato',
			'type'        => 'text',
		)
	);

	// Latitude e Longitude para embed do mapa
	$wp_customize->add_setting(
		'mundau_nautica_maps_lat',
		array(
			'default'           => '',
			'sanitize_callback' => 'mundau_nautica_sanitize_coordinate',
		)
	);
	$wp_customize->add_control(
		'mundau_nautica_maps_lat',
		array(
			'label'       => __( 'Latitude (para embed do mapa)', 'mundau-nautica' ),
			'description' => __( 'Ex: -9.6658. Usado junto com a longitude para exibir o mapa embutido.', 'mundau-nautica' ),
			'section'     => 'mundau_nautica_contato',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'mundau_nautica_maps_lng',
		array(
			'default'           => '',
			'sanitize_callback' => 'mundau_nautica_sanitize_coordinate',
		)
	);
	$wp_customize->add_control(
		'mundau_nautica_maps_lng',
		array(
			'label'       => __( 'Longitude (para embed do mapa)', 'mundau-nautica' ),
			'description' => __( 'Ex: -35.7353. Usado junto com a latitude para exibir o mapa embutido.', 'mundau-nautica' ),
			'section'     => 'mundau_nautica_contato',
			'type'        => 'text',
		)
	);
}
add_action( 'customize_register', 'mundau_nautica_customize_register' );

/**
 * Sanitiza coordenada geográfica: aceita apenas número decimal com sinal opcional.
 */
function mundau_nautica_sanitize_coordinate( $value ): string {
	$value = trim( $value );
	if ( preg_match( '/^-?\d+(\.\d+)?$/', $value ) ) {
		return $value;
	}
	return '';
}

/**
 * Retorna o número de WhatsApp limpo (somente dígitos).
 */
function mundau_nautica_get_whatsapp_number() {
	$raw = get_theme_mod( 'mundau_nautica_whatsapp', '' );
	return preg_replace( '/\D/', '', $raw );
}

/**
 * Retorna a URL de link do WhatsApp.
 */
function mundau_nautica_get_whatsapp_url( string $message = '' ): string {
	$number = mundau_nautica_get_whatsapp_number();
	if ( ! $number ) {
		return '#';
	}
	$url = 'https://wa.me/' . $number;
	if ( $message ) {
		$url .= '?text=' . rawurlencode( $message );
	}
	return $url;
}

/**
 * Retorna o handle do Instagram sem o @.
 */
// =============================================================================
// Custom Post Type: Produto
// =============================================================================

function mundau_nautica_register_produto_cpt() {
	register_post_type(
		'produto',
		array(
			'labels'              => array(
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
			'public'              => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-cart',
			'supports'            => array( 'title', 'thumbnail' ),
			'has_archive'         => true,
			'rewrite'             => array( 'slug' => 'produtos' ),
			'show_in_rest'        => false,
		)
	);
}
add_action( 'init', 'mundau_nautica_register_produto_cpt' );

function mundau_nautica_produto_meta_boxes() {
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
		$descricao = sanitize_textarea_field( wp_unslash( $_POST['mundau_produto_descricao'] ) );
		update_post_meta( $post_id, '_mundau_produto_descricao', $descricao );
	}

	if ( isset( $_POST['mundau_produto_ordem'] ) ) {
		$ordem = absint( $_POST['mundau_produto_ordem'] );
		update_post_meta( $post_id, '_mundau_produto_ordem', $ordem );
	}

	if ( isset( $_POST['mundau_produto_whatsapp'] ) ) {
		$mensagem = sanitize_textarea_field( wp_unslash( $_POST['mundau_produto_whatsapp'] ) );
		update_post_meta( $post_id, '_mundau_produto_whatsapp', $mensagem );
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

// =============================================================================

function mundau_nautica_get_instagram_handle() {
	return ltrim( get_theme_mod( 'mundau_nautica_instagram', '' ), '@' );
}

/**
 * Retorna a URL do perfil no Instagram.
 */
function mundau_nautica_get_instagram_url(): string {
	$handle = mundau_nautica_get_instagram_handle();
	return $handle ? 'https://instagram.com/' . rawurlencode( $handle ) : '#';
}

/**
 * Retorna a URL do embed do Google Maps via lat/lng, ou null se não configurado.
 * Usa o endpoint /maps?q= que é estável e não requer API key.
 */
function mundau_nautica_get_maps_embed_url(): ?string {
	$lat = get_theme_mod( 'mundau_nautica_maps_lat', '' );
	$lng = get_theme_mod( 'mundau_nautica_maps_lng', '' );
	if ( ! $lat || ! $lng ) {
		return null;
	}
	return add_query_arg(
		array(
			'q'      => $lat . ',' . $lng,
			'output' => 'embed',
			'hl'     => 'pt-BR',
		),
		'https://maps.google.com/maps'
	);
}
