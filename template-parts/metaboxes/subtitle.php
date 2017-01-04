<?php
/**
 * The markup for the Subtitle metabox.
 *
 * @package 		iGrow_Macon
 */

wp_nonce_field( PARENT_THEME_SLUG, 'nonce_igrowmacon_subtitle' );

$atts['id'] 			= 'subtitle';
$atts['name'] 			= 'subtitle';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrow_Macon_Field( 'text', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );
