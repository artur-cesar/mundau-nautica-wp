<?php
/**
 * Plugin Name: Mundaú Náutica Core
 * Description: CPT Produto, dados da loja e helpers de contato para o site da Mundaú Náutica.
 * Version:     1.0.0
 * Author:      Mundaú Náutica
 * Text Domain: mundau-nautica
 *
 * @package Mundau_Nautica
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once plugin_dir_path( __FILE__ ) . 'includes/customizer.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/helpers.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/cpt-produto.php';
