<?php
/**
 * Configurações do Customizer: dados da loja, contato e localização.
 *
 * @package Mundau_Nautica
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function mundau_nautica_customize_register( $wp_customize ): void {
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

	$fields = array(
		'mundau_nautica_telefone'  => array(
			'label'    => __( 'Telefone', 'mundau-nautica' ),
			'desc'     => __( 'Ex: (82) 3351-5321', 'mundau-nautica' ),
			'sanitize' => 'sanitize_text_field',
			'type'     => 'text',
		),
		'mundau_nautica_whatsapp'  => array(
			'label'    => __( 'WhatsApp (número com DDI)', 'mundau-nautica' ),
			'desc'     => __( 'Somente dígitos, com DDI. Ex: 5582999990000', 'mundau-nautica' ),
			'sanitize' => 'sanitize_text_field',
			'type'     => 'text',
		),
		'mundau_nautica_instagram' => array(
			'label'    => __( 'Instagram (@ da conta)', 'mundau-nautica' ),
			'desc'     => __( 'Somente o @ sem URL. Ex: @mundanautica', 'mundau-nautica' ),
			'sanitize' => 'sanitize_text_field',
			'type'     => 'text',
		),
		'mundau_nautica_endereco'  => array(
			'label'    => __( 'Endereço', 'mundau-nautica' ),
			'desc'     => __( 'Endereço completo da loja.', 'mundau-nautica' ),
			'sanitize' => 'sanitize_text_field',
			'type'     => 'text',
		),
		'mundau_nautica_horario'   => array(
			'label'    => __( 'Horário de funcionamento', 'mundau-nautica' ),
			'desc'     => __( 'Ex: Segunda a sexta, 08h às 18h. Sábado, 08h às 13h.', 'mundau-nautica' ),
			'sanitize' => 'sanitize_text_field',
			'type'     => 'text',
			'default'  => 'Segunda a sexta, 08h às 18h. Sábado, 08h às 13h.',
		),
		'mundau_nautica_maps_link' => array(
			'label'    => __( 'Link do Google Maps', 'mundau-nautica' ),
			'desc'     => __( 'URL completa para o botão "Abrir no Google Maps".', 'mundau-nautica' ),
			'sanitize' => 'esc_url_raw',
			'type'     => 'url',
		),
		'mundau_nautica_maps_lat'  => array(
			'label'    => __( 'Latitude (para embed do mapa)', 'mundau-nautica' ),
			'desc'     => __( 'Ex: -9.6658', 'mundau-nautica' ),
			'sanitize' => 'mundau_nautica_sanitize_coordinate',
			'type'     => 'text',
		),
		'mundau_nautica_maps_lng'  => array(
			'label'    => __( 'Longitude (para embed do mapa)', 'mundau-nautica' ),
			'desc'     => __( 'Ex: -35.7353', 'mundau-nautica' ),
			'sanitize' => 'mundau_nautica_sanitize_coordinate',
			'type'     => 'text',
		),
	);

	foreach ( $fields as $id => $args ) {
		$wp_customize->add_setting(
			$id,
			array(
				'default'           => $args['default'] ?? '',
				'sanitize_callback' => $args['sanitize'],
			)
		);
		$wp_customize->add_control(
			$id,
			array(
				'label'       => $args['label'],
				'description' => $args['desc'],
				'section'     => 'mundau_nautica_contato',
				'type'        => $args['type'],
			)
		);
	}
}
add_action( 'customize_register', 'mundau_nautica_customize_register' );
