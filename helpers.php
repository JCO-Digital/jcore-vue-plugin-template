<?php
/**
 * Helper/Utility functions, mostly imported from JCORE base code, but added incase that this is used in a non-JCORE project.
 *
 * @package jcore-vue-broiler
 */

	/**
	 * Register script wrapper.
	 *
	 * @param string $name Script name.
	 * @param string $file Filename.
	 * @param array  $dependencies Dependencies.
	 * @param string $version Optional version number.
	 */
function broiler_script_register( $name, $file, $dependencies = array(), $version = null ): void
{
	$info = broiler_get_file_info( $file, $version );

	if ( false !== $info ) {
		wp_register_script(
			$name,
			$info['uri'],
			$dependencies,
			$info['version'],
			true
		);
	}
}

	/**
	 * Register style wrapper.
	 *
	 * @param string $name Style name.
	 * @param string $file Filename.
	 * @param array  $dependencies Dependencies.
	 * @param string $version Optional version number.
	 */
function broiler_style_register( $name, $file, $dependencies = array(), $version = '' ): void {
	$info = broiler_get_file_info( $file, $version );

	if ( false !== $info ) {
		wp_register_style(
			$name,
			$info['uri'],
			$dependencies,
			$info['version']
		);
	}
}

	/**
	 * Get file info for script/style registration.
	 *
	 * @param string $file Filename.
	 * @param string $version Optional version number.
	 *
	 * @return bool|string[]
	 */
function broiler_get_file_info( $file, $version = '' ) {
	if ( ! empty( $version ) ) {
		$version .= '-';
	}
	$location = array(
		'path' => join_path( JCORE_VUE_BROILER_PATH, $file ),
		'uri'  => join_path( JCORE_VUE_BROILER_URL, $file ),
	);
	if ( file_exists( $location['path'] ) ) {
		$version .= filemtime( $location['path'] );

		return array(
			'uri'     => $location['uri'],
			'path'    => $location['path'],
			'version' => $version,
		);
	}
	return false;
}

if ( ! function_exists( 'join_path' ) ) {
	/**
	 * A function that joins together all parts of a path.
	 *
	 * @param string $path Base path.
	 * @param string ...$parts Path parts to be joined.
	 *
	 * @return string
	 */
	function join_path( string $path, string ...$parts ): string {
		foreach ( $parts as $part ) {
			$path .= '/' . trim( $part, '/ ' );
		}

		return $path;
	}
}
