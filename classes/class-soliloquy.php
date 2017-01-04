<?php

/**
 * A class for tweaking the Soliloquy Slider plugin.
 *
 * @since 			1.0.0
 * @package 		iGrow_Macon
 * @subpackage 		iGrow_Macon/classes
 */
class iGrow_Macon_Soliloquy {

	public function __construct(){}

	/**
	 * Registers all the WordPress hooks and filters for this class.
	 */
	public function hooks() {

		add_action( 'soliloquy_tab_slider', array( $this, 'add_notes' ), 9 );

	} // hooks()

	/**
	 * Adds content to the slide management screen in Soliloquy.
	 */
	public function add_notes() {

		echo '<p class="admin-notes update-nag">' . esc_html__( 'NOTE: Slides for the homepage need to be 1500px wide and 500px tall.', 'igrow-macon' ) . '</p>';

	} // add_notes()

} // class
