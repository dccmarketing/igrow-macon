<?php
/**
 * The metabox-specific functionality of the theme.
 *
 * @since 			1.0.0
 * @package 		iGrow_Macon
 * @subpackage 		iGrow_Macon/classes
 */
class iGrow_Macon_Metabox_Header {

	/**
	 * The metabox class object.
	 * @var 	obj.
	 */
	protected $metabox;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 */
	public function __construct() {

		$conditions['post_type'] 	= 'page';
		$fields[] 					= array( 'select-slider', 'select', '' );
		$fields[] 					= array( 'hide-breadcrumbs', 'checkbox', '' );
		$nonce 						= 'nonce_igrowmacon_header';
		$props['name'] 				= __( 'Header', 'igrow-macon' );
		$props['id'] 				= 'header';
		$props['context'] 			= 'side';

		$this->metabox 		= new iGrow_Macon_Metabox( $props, $nonce, $fields );

	} // __construct()

	/**
	 * Registers all the WordPress hooks and filters for this class.
	 */
	public function hooks() {

		add_action( 'add_meta_boxes', 			array( $this->metabox, 'add_metaboxes' ), 10, 2 );
		add_action( 'add_meta_boxes', 			array( $this->metabox, 'set_meta' ), 10, 2 );
		add_action( 'save_post', 				array( $this->metabox, 'save_meta' ), 10, 2 );
		add_action( 'edit_form_after_title',	array( $this->metabox, 'promote_metaboxes' ), 10, 1 );

	} // hooks()

} // class
