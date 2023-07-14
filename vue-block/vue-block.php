<?php

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function broiler_block_vue_block_block_init(): void {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'broiler_block_vue_block_block_init' );
