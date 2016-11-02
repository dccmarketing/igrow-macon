<?php
/**
 * Template part for displaying a metabox.
 *
 * @package iGrow_Macon
 */

wp_nonce_field( PARENT_THEME_SLUG, 'nonce_igrowmacon_post_format' );

$format = get_post_format();



$atts['id'] 			= 'post-audio';
$atts['name'] 			= 'post-audio';
$props['label'] 		= __( 'Post Audio URL', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

if ( FALSE === strpos( $atts['id'], $format ) ) {

	$class = 'hide';

}

?><div class="post-format-field <?php echo esc_attr( $class ); ?>" id="post_format_audio"><?php

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'url', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );

?></div><?php



$atts['id'] 			= 'post-image';
$atts['name'] 			= 'post-image';
$props['label'] 		= __( 'Post Image URL', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

if ( FALSE === strpos( $atts['id'], $format ) ) {

	$class = 'hide';

}

?><div class="post-format-field <?php echo esc_attr( $class ); ?>" id="post_format_image"><?php

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'image-upload', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );

?></div><?php



$atts['id'] 			= 'post-link';
$atts['name'] 			= 'post-link';
$props['label'] 		= __( 'Post Link URL', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

if ( FALSE === strpos( $atts['id'], $format ) ) {

	$class = 'hide';

}

?><div class="post-format-field <?php echo esc_attr( $class ); ?>" id="post_format_link"><?php

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'url', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );

?></div><?php



$atts['id'] 			= 'post-video';
$atts['name'] 			= 'post-video';
$props['label'] 		= __( 'Post Video URL', 'igrow-macon' );

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

if ( FALSE === strpos( $atts['id'], $format ) ) {

	$class = 'hide';

}

?><div class="post-format-field <?php echo esc_attr( $class ); ?>" id="post_format_video"><?php

$atts 	= apply_filters( 'igrowmacon-field-atts-' . $atts['id'], $atts, $props );
$props 	= apply_filters( 'igrowmacon-field-props-' . $atts['id'], $props, $atts );
$field 	= new iGrowMacon_Field( 'url', $atts, $props );
$field->display_field();

unset( $atts );
unset( $props );
unset( $field );

?></div>
