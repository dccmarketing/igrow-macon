<?php

/**
 * Autoloader for PHP 5.3+
 *
 * @since 			1.0.0
 * @package 		iGrow_Macon
 * @subpackage 		iGrow_Macon/classes
 */
class iGrow_Macon_Autoloader {

	/**
	* Autoloader function
	*
	* @param 		string 			$class_name
	*/
	public static function autoloader( $class_name ) {

		if ( 0 !== strpos( $class_name, 'iGrow_Macon_' ) ) { return; }

		$class_name = str_replace( 'iGrow_Macon_', '', $class_name );
		$lower 		= strtolower( $class_name );
		$file      	= 'class-' . str_replace( '_', '-', $lower ) . '.php';
		$base_path 	= trailingslashit( get_stylesheet_directory() );
		$paths[] 	= $base_path . $file;
		$paths[] 	= $base_path . 'classes/' . $file;

		/**
		 * igrowmacon-autoloader-paths filter
		 */
		$paths = apply_filters( 'igrowmacon-autoloader-paths', $paths );

		foreach ( $paths as $path ) :

			if ( is_readable( $path ) && file_exists( $path ) ) {

				require_once( $path );
				return;

			}

		endforeach;

		return FALSE;

	} // autoloader()

} // class

spl_autoload_register( 'iGrow_Macon_Autoloader::autoloader' );
