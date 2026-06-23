<?php
/**
 * Funções auxiliares de contato e localização.
 *
 * @package Mundau_Nautica
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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
function mundau_nautica_get_whatsapp_number(): string {
	$raw = get_theme_mod( 'mundau_nautica_whatsapp', '' );
	return preg_replace( '/\D/', '', $raw );
}

/**
 * Retorna a URL wa.me para o WhatsApp da loja.
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
function mundau_nautica_get_instagram_handle(): string {
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
