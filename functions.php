<?php
/**
 * This file calls the init.php file, but only
 * if the child theme hasn't called it first.
 *
 * This method allows the child theme to load
 * the framework so it can use the framework
 * components immediately.
 *
 * This file is a core iGrow Macon file and should not be edited.
 *
 * @package  iGrow_Macon
 * @author   slushman
 * @license  GPL-2.0+
 * @link     https://codex.wordpress.org/Functions_File_Explained
 */

/**
 * Set the constants used throughout.
 */
define( 'PARENT_THEME_SLUG', 'igrow-macon' );
define( 'PARENT_THEME_VERSION', '1.0.0' );

/**
 * Load Imagekit.
 */
require get_stylesheet_directory() . '/functions/imagekit.php';

/**
 * Load Themekit.
 */
require get_stylesheet_directory() . '/functions/themekit.php';

/**
 * Load Menu Walker.
 */
require get_stylesheet_directory() . '/classes/menu-walker.php';

/**
 * Load Autoloader
 */
require get_stylesheet_directory() . '/classes/class-autoloader.php';


/**
 * Create an instance of each class and load the hooks function.
 */
$classes[] = 'Customizer';
$classes[] = 'Editor';
$classes[] = 'Menukit';
$classes[] = 'Metabox_Header';
$classes[] = 'Setup';
$classes[] = 'Soliloquy';
$classes[] = 'Themehooks';
$classes[] = 'Users';
$classes[] = 'Utilities';

foreach ( $classes as $class ) {

	$class_name 	= 'iGrow_Macon_' . $class;
	$class_obj 		= new $class_name();

	add_action( 'after_setup_theme', array( $class_obj, 'hooks' ) );

}
