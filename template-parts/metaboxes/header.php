<?php
/**
 * The markup for the Subtitle metabox.
 *
 * @package 		iGrow_Macon
 */

wp_nonce_field( PARENT_THEME_SLUG, 'nonce_igrowmacon_header' );



//echo '<pre>'; print_r( $this->meta ); echo '</pre>';



$atts['id'] 		= 'hide-breadcrumbs';
$atts['name'] 		= 'hide-breadcrumbs';
$props['label'] 	= __( 'Hide the breadcrumbs on this page.', 'igrow-macon' );
$props['checked'] 	= 0;

/**
 * This check is different from other fields. Only change the value for a checkbox
 * if the key exists in the meta array. Otherwise, leave it at the default value.
 * This handles a checked or unchecked default value.
 *
 * Checking for a not empty meta value while having a checked default value never
 * saves the unchecked state.
 */
if ( array_key_exists( $atts['id'], $this->meta ) ) {

	$props['checked'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrow_Macon_Field( 'checkbox', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );



$atts['id'] 			= 'select-slider';
$atts['name'] 			= 'select-slider';
$props['description'] 	= __( 'Select the slider that appears instead of the featured image.', 'igrow-macon' );
$props['label'] 		= __( 'Select Slider', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrow_Macon_Field( 'select-slider', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );