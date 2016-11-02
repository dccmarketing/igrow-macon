<?php
/**
 * The markup for the Subtitle metabox.
 *
 * @package 		iGrow_Macon
 */

wp_nonce_field( PARENT_THEME_SLUG, 'nonce_igrowmacon_demo' );



//echo '<pre>'; print_r( $this->meta ); echo '</pre>';



$atts['id'] 	= 'field-checkbox';
$atts['name'] 	= 'field-checkbox';
$props['label'] = __( 'This is a checkbox.', 'igrow-macon' );

/**
 * This check is different from other fields. Only change the value for a checkbox
 * if the key exists in the meta array. Otherwise, leave it at the default value.
 * This handles a checked or unchecked default value.
 *
 * Checking for a not empty meta value while having a checked default value never
 * saves the unchecked state.
 */
if ( array_key_exists( $atts['id'], $this->meta ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'checkbox', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );



$atts['id'] 			= 'field-color';
$atts['name'] 			= 'field-color';
$props['description'] 	= __( 'This is a color field.', 'igrow-macon' );
$props['label'] 		= __( 'Color', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'color', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );



$atts['id'] 			= 'field-date';
$atts['name'] 			= 'field-date';
$props['description'] 	= __( 'This is a date field.', 'igrow-macon' );
$props['label'] 		= __( 'Date', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'date', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );



$atts['id'] 			= 'field-editor';
$props['description'] 	= __( 'This is an editor field.', 'igrow-macon' );
$props['settings'] 		= array( 'class' => '', );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'editor', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );



$atts['id'] 			= 'field-file';
$atts['name'] 			= 'field-file';
$props['description'] 	= __( 'This is a file uploading field.', 'igrow-macon' );
$props['label'] 		= __( 'File Upload', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'file-upload', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );



$atts['id'] 			= 'field-form';
$atts['name'] 			= 'field-form';
$props['description'] 	= __( 'This is a form selection field.', 'igrow-macon' );
$props['label'] 		= __( 'Forms', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts = apply_filters( 'igrowmacon-field-' . $atts['id'], $atts );

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'select-formidable-form', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );



$atts['id'] 			= 'field-image';
$atts['name'] 			= 'field-image';
$props['description'] 	= __( 'This is a image uploading field.', 'igrow-macon' );
$props['label'] 		= __( 'Image Upload', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'image-upload', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );



$atts['id'] 			= 'field-radios';
$atts['name'] 			= 'field-radios';
$props['description'] 	= __( 'This is a set of radios.', 'igrow-macon' );
$props['selections'][] 	= array( 'label' => __( 'One', 'igrow-macon' ), 'value' => 'one' );
$props['selections'][] 	= array( 'label' => __( 'Two', 'igrow-macon' ), 'value' => 'two' );
$props['selections'][] 	= array( 'label' => __( 'Three', 'igrow-macon' ), 'value' => 'three' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'radio', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );



$atts['id'] 			= 'field-menu';
$atts['name'] 			= 'field-menu';
$props['description'] 	= __( 'This is a menu selection field.', 'igrow-macon' );
$props['label'] 		= __( 'Menus', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'select-menu', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );



$atts['id'] 			= 'field-page';
$atts['name'] 			= 'field-page';
$props['description'] 	= __( 'This is a page selection field.', 'igrow-macon' );
$props['label'] 		= __( 'Pages', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'select-page', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );

?></p><?php



$atts['id'] 			= 'field-slider';
$atts['name'] 			= 'field-slider';
$props['description'] 	= __( 'This is a slider selection field.', 'igrow-macon' );
$props['label'] 		= __( 'Sliders', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'select-slider', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );



$atts['id'] 			= 'field-select';
$atts['name'] 			= 'field-select';
$props['description'] 	= __( 'This is a select field.', 'igrow-macon' );
$props['label'] 		= __( 'Select', 'igrow-macon' );
$props['selections'][] 	= array( 'label' => __( 'One', 'igrow-macon' ), 'value' => 'one' );
$props['selections'][] 	= array( 'label' => __( 'Two', 'igrow-macon' ), 'value' => 'two' );
$props['selections'][] 	= array( 'label' => __( 'Three', 'igrow-macon' ), 'value' => 'three' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'select', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );



$atts['id'] 			= 'field-tax';
$atts['name'] 			= 'field-tax';
$props['description'] 	= __( 'This is a taxonomy selection field.', 'igrow-macon' );
$props['label'] 		= __( 'Taxonomies', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'select-taxonomy', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );



$atts['id'] 			= 'field-text';
$atts['name'] 			= 'field-text';
$props['description'] 	= __( 'This is a text field.', 'igrow-macon' );
$props['label'] 		= __( 'Text', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'text', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );



$atts['id'] 			= 'field-textarea';
$atts['name'] 			= 'field-textarea';
$props['description'] 	= __( 'This is a textarea field.', 'igrow-macon' );
$props['label'] 		= __( 'Textarea', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'textarea', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );



$atts['id'] 			= 'field-time';
$atts['name'] 			= 'field-time';
$props['description'] 	= __( 'This is a time field.', 'igrow-macon' );
$props['label'] 		= __( 'Time', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'time', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );
