<?php
/**
 * Customizations for the WordPress Editor.
 *
 * @since 			1.0.0
 * @package 		iGrow_Macon
 * @subpackage 		iGrow_Macon/classes
 */
class iGrow_Macon_Editor {

	/**
	 * Constructor
	 */
	public function __construct() {}

	/**
	 * Registers all the WordPress hooks and filters for this class.
	 */
	public function hooks() {

		add_action( 'admin_init', 			array( $this, 'add_editor_styles' ) );
		add_filter( 'tiny_mce_before_init', array( $this, 'add_format_options' ) );
		add_filter( 'mce_buttons', 			array( $this, 'add_first_row_buttons' ) );
		add_filter( 'mce_buttons_2', 		array( $this, 'add_second_row_buttons' ) );

	} // hooks()

	/**
	 * Adds a stylesheet to the editor.
	 */
	public function add_editor_styles() {

		add_editor_style( 'editor.css' );

	} // add_editor_styles()

	/**
	 * Add new styles to the TinyMCE "formats" menu dropdown
	 *
	 * @param 		string		$settings 		The current formats select settings.
	 * @return 		string 		$settings 		The modified formats select settings.
	 */
	public function add_format_options( $settings ) {

		$custom[0]['title'] 					= __( 'Text Formatting', 'igrow-macon' );

		$custom[0]['items'][0]['title'] 		= __( 'Uppercase', 'igrow-macon' );
		$custom[0]['items'][0]['inline'] 		= 'span';
		$custom[0]['items'][0]['classes'] 		= 'text-uppercase';

		$custom[0]['items'][1]['title'] 		= __( 'lowercase', 'igrow-macon' );
		$custom[0]['items'][1]['inline'] 		= 'span';
		$custom[0]['items'][1]['classes'] 		= 'text-lowercase';



		$custom[1]['title'] 					= __( 'Floats', 'igrow-macon' );

		$custom[1]['items'][0]['title'] 		= __( 'Float Right', 'igrow-macon' );
		$custom[1]['items'][0]['inline'] 		= 'span';
		$custom[1]['items'][0]['classes'] 		= 'float-right';

		$custom[1]['items'][1]['title'] 		= __( 'Float Left', 'igrow-macon' );
		$custom[1]['items'][1]['inline'] 		= 'span';
		$custom[1]['items'][1]['classes'] 		= 'float-left';



		$custom[2]['title'] 					= __( 'Content Blocks', 'igrow-macon' );

		$custom[2]['items'][0]['title'] 		= __( 'Full Width', 'igrow-macon' );
		$custom[2]['items'][0]['inline'] 		= 'div';
		$custom[2]['items'][0]['classes'] 		= 'igrowmacon-cb-full-width';

		$custom[2]['items'][1]['title'] 		= __( 'First Half', 'igrow-macon' );
		$custom[2]['items'][1]['block'] 		= 'p';
		$custom[2]['items'][1]['classes'] 		= 'igrowmacon-cb-first-half';

		$custom[2]['items'][2]['title'] 		= __( 'Half', 'igrow-macon' );
		$custom[2]['items'][2]['block'] 		= 'p';
		$custom[2]['items'][2]['classes'] 		= 'igrowmacon-cb-half';

		$custom[2]['items'][3]['title'] 		= __( 'Third', 'igrow-macon' );
		$custom[2]['items'][3]['block'] 		= 'p';
		$custom[2]['items'][3]['classes'] 		= 'igrowmacon-cb-third';

		$custom[2]['items'][4]['title'] 		= __( 'Two Thirds', 'igrow-macon' );
		$custom[2]['items'][4]['block'] 		= 'p';
		$custom[2]['items'][4]['classes'] 		= 'igrowmacon-cb-two-thirds';

		$custom[2]['items'][5]['title'] 		= __( 'Last Third', 'igrow-macon' );
		$custom[2]['items'][5]['block'] 		= 'p';
		$custom[2]['items'][5]['classes'] 		= 'igrowmacon-cb-last-third';

		$custom[2]['items'][6]['title'] 		= __( 'Quarter', 'igrow-macon' );
		$custom[2]['items'][6]['block'] 		= 'p';
		$custom[2]['items'][6]['classes'] 		= 'igrowmacon-cb-quarter';

		$custom[2]['items'][7]['title'] 		= __( 'Last Quarter', 'igrow-macon' );
		$custom[2]['items'][7]['block'] 		= 'p';
		$custom[2]['items'][7]['classes'] 		= 'igrowmacon-cb-last-quarter';

		$custom[2]['items'][8]['title'] 		= __( 'Three Quarters', 'igrow-macon' );
		$custom[2]['items'][8]['block'] 		= 'p';
		$custom[2]['items'][8]['classes'] 		= 'igrowmacon-cb-three-quarters';



		$custom[3]['title'] 					= __( 'Flex Blocks', 'igrow-macon' );

		$custom[3]['items'][0]['title'] 		= __( 'Flex Around', 'igrow-macon' );
		$custom[3]['items'][0]['block'] 		= 'div';
		$custom[3]['items'][0]['classes'] 		= 'igrowmacon-flex-around';

		$custom[3]['items'][1]['title'] 		= __( 'Flex Between', 'igrow-macon' );
		$custom[3]['items'][1]['block'] 		= 'div';
		$custom[3]['items'][1]['classes'] 		= 'igrowmacon-flex-tween';



		// $custom[2]['title'] 					= __( 'Theme Formatting', 'igrow-macon' );
		//
		// $custom[2]['items'][0]['title'] 		= __( 'Letterbox', 'igrow-macon' );
		// $custom[2]['items'][0]['block'] 		= 'p';
		// $custom[2]['items'][0]['classes'] 		= 'letterbox';
		//
		// $custom[2]['items'][1]['title'] 		= __( 'Letterbox Right', 'igrow-macon' );
		// $custom[2]['items'][1]['block'] 		= 'p';
		// $custom[2]['items'][1]['classes'] 		= 'letterbox float-right';
		//
		// $custom[2]['items'][2]['title'] 		= __( 'Letterbox Left', 'igrow-macon' );
		// $custom[2]['items'][2]['block'] 		= 'p';
		// $custom[2]['items'][2]['classes'] 		= 'letterbox float-left';
		//
		// $custom[2]['items'][3]['title'] 		= __( 'Line Behind - Text Center', 'igrow-macon' );
		// $custom[2]['items'][3]['inline'] 		= 'span';
		// $custom[2]['items'][3]['classes'] 		= 'line-middle lm-text-center';
		//
		// $custom[2]['items'][4]['title'] 		= __( 'Line Behind - Text Left', 'igrow-macon' );
		// $custom[2]['items'][4]['inline'] 		= 'span';
		// $custom[2]['items'][4]['classes'] 		= 'line-middle lm-text-left';
		//
		// $custom[2]['items'][5]['title'] 		= __( 'Line Behind - Text Right', 'igrow-macon' );
		// $custom[2]['items'][5]['inline'] 		= 'span';
		// $custom[2]['items'][5]['classes'] 		= 'line-middle lm-text-right';
		//
		// $custom[2]['items'][6]['title'] 		= __( 'Content Block', 'igrow-macon' );
		// $custom[2]['items'][6]['inline'] 		= 'div';
		// $custom[2]['items'][6]['classes'] 		= 'clear';



		$settings['style_formats_merge'] 	= true;
		$settings['style_formats'] 			= json_encode( $custom );

		return $settings;

	} // add_format_options()

	/**
	 * Add Formats Dropdown Menu To MCE
	 *
	 * @param 		array 		$buttons 		The current array of buttons.
	 * @return 		array 		$buttons 		The modifed array of buttons.
	 */
	function add_first_row_buttons( $buttons ) {

		array_push( $buttons, 'styleselect' ); // Adds Style select menu.
		return $buttons;

	} // add_first_row_buttons()

	/**
	 * Adds buttons to the second row in TinyMCE.
	 *
	 * @param 		array 		$buttons 		The current array of buttons.
	 * @return 		array 		$buttons 		The modified array of buttons.
	 */
	function add_second_row_buttons( $buttons ) {

		//array_unshift( $buttons, 'fontselect' ); // Adds Font select menu.
		//array_unshift( $buttons, 'fontsizeselect' ); // Adds Font Size select menu.

		$buttons[] = 'superscript'; // Adds Superscript button.
		$buttons[] = 'subscript'; // Adds Subscript button.

		return $buttons;

	} // add_second_row_buttons()

} // class
