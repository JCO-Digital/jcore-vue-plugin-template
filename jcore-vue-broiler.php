<?php
/**
 * Plugin Name:     JCORE Vue Broiler
 * Plugin URI:      https://jco.fi
 * Description:     A plugin that allows you to add Vue.js applications to your WordPress theme.
 * Author:          J&Co Digital Oy
 * Author URI:      https://jco.fi
 * Text Domain:     jcore-vue-broiler
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Jcore_Vue_Broiler
 */

namespace Jcore_Vue_Broiler;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/consts.php';
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/vue-block/vue-block.php';


/**
 * Enqueue the vue app.
 *
 * @return void
 */
function enqueue_vue(): void {
	broiler_script_register( 'jcore-vue-broiler', 'dist/vue/index.js', array(), JCORE_VUE_BROILER_VERSION );
	wp_enqueue_script( 'jcore-vue-broiler' );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_vue' );
