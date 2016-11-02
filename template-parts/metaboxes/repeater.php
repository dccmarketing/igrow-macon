<?php
/**
 * The markup for the Repeater metabox.
 *
 * @package 		iGrow_Macon
 */

wp_nonce_field( PARENT_THEME_SLUG, 'nonce_igrowmacon_repeater' );

$setatts['id'] 							= 'file-repeater';
$setatts['labels']['add'] 				= __( 'Add File', 'igrow-macon' );
$setatts['labels']['edit'] 				= __( 'Edit File', 'igrow-macon' );
$setatts['labels']['header'] 			= __( 'File Name', 'igrow-macon' );
$setatts['labels']['remove'] 			= __( 'Remove File', 'igrow-macon' );

$setatts['fields'][0]['fieldtype'] 		= 'file-upload';
$setatts['fields'][0]['id'] 			= 'file-uploader-field';
$setatts['fields'][0]['label'] 			= __( 'File Field', 'igrow-macon' );
$setatts['fields'][0]['name'] 			= 'file-uploader-field';

$setatts['fields'][1]['class'] 			= 'widefat repeater-title';
$setatts['fields'][1]['description'] 	= __( 'Text Field Description', 'igrow-macon' );
$setatts['fields'][1]['fieldtype'] 		= 'text';
$setatts['fields'][1]['id'] 			= 'text-field';
$setatts['fields'][1]['label'] 			= __( 'Text Field', 'igrow-macon' );
$setatts['fields'][1]['name'] 			= 'text-field';

$setatts = apply_filters( PLUGIN_NAME_SLUG . '-field-' . $setatts['id'], $setatts );

if ( ! empty( $this->meta[$setatts['id']] ) ) {

	$setatts['values'] = maybe_unserialize( $this->meta[$setatts['id']][0] );

}

include( get_stylesheet_directory() . '/template-parts/fields/repeater.php' );
unset( $setatts );
