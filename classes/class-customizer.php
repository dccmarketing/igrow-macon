<?php
/**
 * Customizer
 *
 * Contains methods for customizing the theme customization screen.
 *
 * @link 			https://codex.wordpress.org/Theme_Customization_API
 * @since 			1.0.0
 * @package 		iGrow_Macon
 * @subpackage 		iGrow_Macon/classes
 */
class iGrow_Macon_Customizer {

	/**
	 * Constructor
	 */
	public function __construct() {}

	/**
	 * Registers all the WordPress hooks and filters for this class.
	 */
	public function hooks() {

		add_action( 'customize_register', 	array( $this, 'register_panels' ) );
		add_action( 'customize_register', 	array( $this, 'register_sections' ) );
		add_action( 'customize_register', 	array( $this, 'register_fields' ) );
		//add_action( 'wp_head', 				array( $this, 'header_output' ) );
		//add_action( 'customize_register', 	array( $this, 'load_customize_controls' ), 0 );

	} // hooks()

	/**
	 * Registers custom panels for the Customizer
	 *
	 * @hooked 		customize_register
	 * @see			add_action( 'customize_register', $func )
	 * @link 		http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
	 * @since 		1.0.0
	 * @param 		WP_Customize_Manager 		$wp_customize 		Theme Customizer object.
	 */
	public function register_panels( $wp_customize ) {

		// Register panels here

	} // register_panels()

	/**
	 * Registers custom sections for the Customizer
	 *
	 * Existing sections:
	 *
	 * Slug 				Priority 		Title
	 *
	 * title_tagline 		20 				Site Identity
	 * colors 				40				Colors
	 * header_image 		60				Header Image
	 * background_image 	80				Background Image
	 * nav_menus			100 			Navigation
	 * widgets 				110 			Widgets
	 * static_front_page 	120 			Static Front Page
	 * default 				160 			all others
	 *
	 * @hooked 		customize_register
	 * @see			add_action( 'customize_register', $func )
	 * @link 		http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
	 * @since 		1.0.0
	 * @param 		WP_Customize_Manager 		$wp_customize 		Theme Customizer object.
	 */
	public function register_sections( $wp_customize ) {

		// Tablet Menu Section
		$wp_customize->add_section( 'tablet_menu',
			array(
				'active_callback' 	=> '',
				'capability'  		=> 'edit_theme_options',
				'description'  		=> esc_html__( '', 'igrow-macon' ),
				'panel' 			=> 'nav_menus',
				'priority'  		=> 10,
				'theme_supports'  	=> '',
				'title'  			=> esc_html__( 'Tablet Menu Style', 'igrow-macon' ),
			)
		);
		
		// Contact Info Section
		$wp_customize->add_section( 'contact_info',
			array(
				'active_callback' 	=> '',
				'capability'  		=> 'edit_theme_options',
				'description'  		=> esc_html__( '', 'igrow-macon' ),
				'panel' 			=> '',
				'priority'  		=> 70,
				'theme_supports'  	=> '',
				'title'  			=> esc_html__( 'Contact Info', 'igrow-macon' ),
			)
		);
		
		// Theme Settings Section
		$wp_customize->add_section( 'theme_settings',
			array(
				'active_callback' 	=> '',
				'capability'  		=> 'edit_theme_options',
				'description'  		=> esc_html__( '', 'igrow-macon' ),
				'panel' 			=> '',
				'priority'  		=> 70,
				'theme_supports'  	=> '',
				'title'  			=> esc_html__( 'Theme Settings', 'igrow-macon' ),
			)
		);

	} // register_sections()

	/**
	 * Registers controls/fields for the Customizer
	 *
	 * Note: To enable instant preview, we have to actually write a bit of custom
	 * javascript. See live_preview() for more.
	 *
	 * Note: To use active_callbacks, don't add these to the selecting control, it apepars these conflict:
	 * 		'transport' => 'postMessage'
	 * 		$wp_customize->get_setting( 'field_name' )->transport = 'postMessage';
	 *
	 * @hooked 		customize_register
	 * @see			add_action( 'customize_register', $func )
	 * @link 		http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
	 * @since 		1.0.0
	 * @param 		WP_Customize_Manager 		$wp_customize 		Theme Customizer object.
	 */
	public function register_fields( $wp_customize ) {

		// Enable live preview JS for default fields
		$wp_customize->get_setting( 'blogname' )->transport 		= 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport 	= 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';



		// Site Identity Section Fields

		// Google Tag Manager Field
		$wp_customize->add_setting(
			'tag_manager',
			array(
				'default'  			=> '',
				'transport' 		=> 'postMessage'
			)
		);
		$wp_customize->add_control(
			'tag_manager',
			array(
				'description' 		=> esc_html__( 'Paste in the Google Tag Manager code here. Do not include the comment tags!', 'igrow-macon' ),
				'label' 			=> esc_html__( 'Google Tag Manager', 'igrow-macon' ),
				'priority' 			=> 90,
				'section' 			=> 'title_tagline',
				'settings' 			=> 'tag_manager',
				'type' 				=> 'textarea'
			)
		);
		$wp_customize->get_setting( 'tag_manager' )->transport = 'postMessage';


		// Tablet Menu Field
		$wp_customize->add_setting(
			'tablet_menu',
			array(
				'capability' 		=> 'edit_theme_options',
				'default'  			=> '',
				'transport' 		=> 'postMessage',
				'type' 				=> 'theme_mod'
			)
		);
		$wp_customize->add_control(
			'tablet_menu',
			array(
				'active_callback' 	=> '',
				'choices' 			=> array(
					'tablet-slide-ontop-from-left' 		=> esc_html__( 'Slide On Top from Left', 'igrow-macon' ),
					'tablet-slide-ontop-from-right' 	=> esc_html__( 'Slide On Top from Right', 'igrow-macon' ),
					'tablet-slide-ontop-from-top' 		=> esc_html__( 'Slide On Top from Top', 'igrow-macon' ),
					'tablet-slide-ontop-from-bottom' 	=> esc_html__( 'Slide On Top from Bottom', 'igrow-macon' ),
					'tablet-push-from-left' 			=> esc_html__( 'Push In from Left', 'igrow-macon' ),
					'tablet-push-from-right' 			=> esc_html__( 'Push In from Right', 'igrow-macon' ),
				),
				'description' 		=> esc_html__( 'Select how the tablet menu appears.', 'igrow-macon' ),
				'label'  			=> esc_html__( 'Tablet Menu', 'igrow-macon' ),
				'priority' 			=> 10,
				'section'  			=> 'tablet_menu',
				'settings' 			=> 'tablet_menu',
				'type' 				=> 'select'
			)
		);
		$wp_customize->get_setting( 'tablet_menu' )->transport = 'postMessage';
		
		
		
		// Contact Info Fields
		// Address Field
		$wp_customize->add_setting(
			'contact_address',
			array(
				'capability' 		=> 'edit_theme_options',
				'default'  			=> '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' 		=> 'postMessage',
				'type' 				=> 'theme_mod'
			)
		);
		$wp_customize->add_control(
			'contact_address',
			array(
				'active_callback' 	=> '',
				'description' 		=> esc_html__( '', 'igrow-macon' ),
				'label'  			=> esc_html__( 'Address', 'igrow-macon' ),
				'priority' 			=> 10,
				'section'  			=> 'contact_info',
				'settings' 			=> 'contact_address',
				'type' 				=> 'text'
			)
		);
		$wp_customize->get_setting( 'contact_address' )->transport = 'postMessage';
		
		// Phone Number Field
		$wp_customize->add_setting(
			'contact_phone',
			array(
				'capability' 		=> 'edit_theme_options',
				'default'  			=> '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' 		=> 'postMessage',
				'type' 				=> 'theme_mod'
			)
		);
		$wp_customize->add_control(
			'contact_phone',
			array(
				'active_callback' 	=> '',
				'description' 		=> esc_html__( '', 'igrow-macon' ),
				'label'  			=> esc_html__( 'Phone Number', 'igrow-macon' ),
				'priority' 			=> 10,
				'section'  			=> 'contact_info',
				'settings' 			=> 'contact_phone',
				'type' 				=> 'text'
			)
		);
		$wp_customize->get_setting( 'contact_phone' )->transport = 'postMessage';
		
		// Fax Number Field
		$wp_customize->add_setting(
			'contact_fax',
			array(
				'capability' 		=> 'edit_theme_options',
				'default'  			=> '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' 		=> 'postMessage',
				'type' 				=> 'theme_mod'
			)
		);
		$wp_customize->add_control(
			'contact_fax',
			array(
				'active_callback' 	=> '',
				'description' 		=> esc_html__( '', 'igrow-macon' ),
				'label'  			=> esc_html__( 'Fax Number', 'igrow-macon' ),
				'priority' 			=> 10,
				'section'  			=> 'contact_info',
				'settings' 			=> 'contact_fax',
				'type' 				=> 'text'
			)
		);
		$wp_customize->get_setting( 'contact_fax' )->transport = 'postMessage';
		
		// Email Address Field
		$wp_customize->add_setting(
			'contact_email',
			array(
				'capability' 		=> 'edit_theme_options',
				'default'  			=> '',
				'sanitize_callback' => 'sanitize_email',
				'transport' 		=> 'postMessage',
				'type' 				=> 'theme_mod'
			)
		);
		$wp_customize->add_control(
			'contact_email',
			array(
				'active_callback' 	=> '',
				'description' 		=> esc_html__( '', 'igrow-macon' ),
				'label'  			=> esc_html__( 'Email Address', 'igrow-macon' ),
				'priority' 			=> 10,
				'section'  			=> 'contact_info',
				'settings' 			=> 'contact_email',
				'type' 				=> 'email'
			)
		);
		$wp_customize->get_setting( 'contact_email' )->transport = 'postMessage';
		
		
		
		// Call Button Text Field
		$wp_customize->add_setting(
			'btn_phone_text',
			array(
				'capability' 		=> 'edit_theme_options',
				'default'  			=> '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' 		=> 'postMessage',
				'type' 				=> 'theme_mod'
			)
		);
		$wp_customize->add_control(
			'btn_phone_text',
			array(
				'active_callback' 	=> '',
				'description' 		=> esc_html__( '', 'igrow-macon' ),
				'label'  			=> esc_html__( 'Call Button Text', 'igrow-macon' ),
				'priority' 			=> 10,
				'section'  			=> 'theme_settings',
				'settings' 			=> 'btn_phone_text',
				'type' 				=> 'text'
			)
		);
		$wp_customize->get_setting( 'btn_phone_text' )->transport = 'postMessage';
		
		// Hide Phone Number Field
		$wp_customize->add_setting(
			'hide_phone_number',
			array(
				'capability' 		=> 'edit_theme_options',
				'default'  			=> '',
				'sanitize_callback' => 'absint',
				'transport' 		=> 'postMessage',
				'type' 				=> 'theme_mod'
			)
		);
		$wp_customize->add_control(
			'hide_phone_number',
			array(
				'active_callback' 	=> '',
				'description' 		=> esc_html__( 'Hides the phone number on the phone buttn and only displays the Call Button Text.', 'igrow-macon' ),
				'label'  			=> esc_html__( 'Hide Phone Number', 'igrow-macon' ),
				'priority' 			=> 10,
				'section'  			=> 'theme_settings',
				'settings' 			=> 'hide_phone_number',
				'type' 				=> 'checkbox'
			)
		);
		$wp_customize->get_setting( 'hide_phone_number' )->transport = 'postMessage';
		
		// Default Header Image Field
		$wp_customize->add_setting(
			'default_header_image' ,
			array(
				'capability' 			=> 'edit_theme_options',
				'default'  				=> '',
				'sanitize_callback' 	=> 'esc_url_raw',
				'transport' 			=> 'postMessage',
				'type' 					=> 'theme_mod'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'default_header_image',
				array(
					'active_callback' 	=> '',
					'description' 		=> esc_html__( '', 'igrow-macon' ),
					'label' 			=> esc_html__( 'Default Header Image', 'igrow-macon' ),
					'priority' 			=> 10,
					'section' 			=> 'theme_settings',
					'settings' 			=> 'default_header_image'
				)
			)
		);





		// Register more fields here.

	} // register_fields()

	/**
	 * This will generate a line of CSS for use in header output. If the setting
	 * ($mod_name) has no defined value, the CSS will not be output.
	 *
	 * @access 		public
	 * @since 		1.0.0
	 * @see 		header_output()
	 * @param 		string 		$selector 		CSS selector
	 * @param 		string 		$style 			The name of the CSS *property* to modify
	 * @param 		string 		$mod_name 		The name of the 'theme_mod' option to fetch
	 * @param 		string 		$prefix 		Optional. Anything that needs to be output before the CSS property
	 * @param 		string 		$postfix 		Optional. Anything that needs to be output after the CSS property
	 * @param 		bool 		$echo 			Optional. Whether to print directly to the page (default: true).
	 * @return 		string 						Returns a single line of CSS with selectors and a property.
	 */
	public function generate_css( $selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true ) {

		$return = '';
		$mod 	= get_theme_mod( $mod_name );

		if ( ! empty( $mod ) ) {

			$return = sprintf('%s { %s:%s; }',
				$selector,
				$style,
				$prefix . $mod . $postfix
			);

			if ( $echo ) {

				echo $return;

			}

		}

		return $return;

	} // generate_css()

	/**
	 * This will output the custom WordPress settings to the live theme's WP head.
	 *
	 * @hooked 		wp_head
	 * @access 		public
	 * @see 		add_action( 'wp_head', $func )
	 * @since 		1.0.0
	 */
	public function header_output() {

		?><!-- Customizer CSS -->
		<style type="text/css"><?php

			// pattern:
			// $this->generate_css( 'selector', 'style', 'mod_name', 'prefix', 'postfix', true );
			//
			// background-image example:
			// $this->generate_css( '.class', 'background-image', 'background_image_example', 'url(', ')' );


		?></style><!-- Customizer CSS --><?php

		/**
		 * Hides all but the first Soliloquy slide while using Customizer previewer.
		 */
		if ( is_customize_preview() ) {

			?><style type="text/css">

				li.soliloquy-item:not(:first-child) {
					display: none !important;
				}

			</style><!-- Customizer CSS --><?php

		}

	} // header_output()

	/**
	 * Returns TRUE based on which link type is selected, otherwise FALSE
	 *
	 * @param 	object 		$control 			The control object
	 * @return 	bool 							TRUE if conditions are met, otherwise FALSE
	 */
	public function states_of_country_callback( $control ) {

		$country_setting = $control->manager->get_setting('country')->value();

		if ( 'us_state' === $control->id && 'US' === $country_setting ) { return true; }
		if ( 'canada_state' === $control->id && 'CA' === $country_setting ) { return true; }
		if ( 'australia_state' === $control->id && 'AU' === $country_setting ) { return true; }
		if ( 'default_state' === $control->id && ! $this->custom_countries( $country_setting ) ) { return true; }

		return false;

	} // states_of_country_callback()

	/**
	 * Returns true if a country has a custom select menu
	 *
	 * @param 		string 		$country 			The country code to check
	 * @return 		bool 							TRUE if the code is in the array, FALSE otherwise
	 */
	public function custom_countries( $country ) {

		$countries = array( 'US', 'CA', 'AU' );

		return in_array( $country, $countries );

	} // custom_countries()

	/**
	 * Returns an array of countries or a country name.
	 *
	 * @param 		string 		$country 		Country code to return (optional)
	 * @return 		array|string 				Array of countries or a single country name
	 */
	public function country_list( $country = '' ) {

		$countries = array();

		$countries['AF'] = esc_html__( 'Afghanistan (‫افغانستان‬‎)', 'igrow-macon' );
		$countries['AX'] = esc_html__( 'Åland Islands (Åland)', 'igrow-macon' );
		$countries['AL'] = esc_html__( 'Albania (Shqipëri)', 'igrow-macon' );
		$countries['DZ'] = esc_html__( 'Algeria (‫الجزائر‬‎)', 'igrow-macon' );
		$countries['AS'] = esc_html__( 'American Samoa', 'igrow-macon' );
		$countries['AD'] = esc_html__( 'Andorra', 'igrow-macon' );
		$countries['AO'] = esc_html__( 'Angola', 'igrow-macon' );
		$countries['AI'] = esc_html__( 'Anguilla', 'igrow-macon' );
		$countries['AQ'] = esc_html__( 'Antarctica', 'igrow-macon' );
		$countries['AG'] = esc_html__( 'Antigua and Barbuda', 'igrow-macon' );
		$countries['AR'] = esc_html__( 'Argentina', 'igrow-macon' );
		$countries['AM'] = esc_html__( 'Armenia (Հայաստան)', 'igrow-macon' );
		$countries['AW'] = esc_html__( 'Aruba', 'igrow-macon' );
		$countries['AC'] = esc_html__( 'Ascension Island', 'igrow-macon' );
		$countries['AU'] = esc_html__( 'Australia', 'igrow-macon' );
		$countries['AT'] = esc_html__( 'Austria (Österreich)', 'igrow-macon' );
		$countries['AZ'] = esc_html__( 'Azerbaijan (Azərbaycan)', 'igrow-macon' );
		$countries['BS'] = esc_html__( 'Bahamas', 'igrow-macon' );
		$countries['BH'] = esc_html__( 'Bahrain (‫البحرين‬‎)', 'igrow-macon' );
		$countries['BD'] = esc_html__( 'Bangladesh (বাংলাদেশ)', 'igrow-macon' );
		$countries['BB'] = esc_html__( 'Barbados', 'igrow-macon' );
		$countries['BY'] = esc_html__( 'Belarus (Беларусь)', 'igrow-macon' );
		$countries['BE'] = esc_html__( 'Belgium (België)', 'igrow-macon' );
		$countries['BZ'] = esc_html__( 'Belize', 'igrow-macon' );
		$countries['BJ'] = esc_html__( 'Benin (Bénin)', 'igrow-macon' );
		$countries['BM'] = esc_html__( 'Bermuda', 'igrow-macon' );
		$countries['BT'] = esc_html__( 'Bhutan (འབྲུག)', 'igrow-macon' );
		$countries['BO'] = esc_html__( 'Bolivia', 'igrow-macon' );
		$countries['BA'] = esc_html__( 'Bosnia and Herzegovina (Босна и Херцеговина)', 'igrow-macon' );
		$countries['BW'] = esc_html__( 'Botswana', 'igrow-macon' );
		$countries['BV'] = esc_html__( 'Bouvet Island', 'igrow-macon' );
		$countries['BR'] = esc_html__( 'Brazil (Brasil)', 'igrow-macon' );
		$countries['IO'] = esc_html__( 'British Indian Ocean Territory', 'igrow-macon' );
		$countries['VG'] = esc_html__( 'British Virgin Islands', 'igrow-macon' );
		$countries['BN'] = esc_html__( 'Brunei', 'igrow-macon' );
		$countries['BG'] = esc_html__( 'Bulgaria (България)', 'igrow-macon' );
		$countries['BF'] = esc_html__( 'Burkina Faso', 'igrow-macon' );
		$countries['BI'] = esc_html__( 'Burundi (Uburundi)', 'igrow-macon' );
		$countries['KH'] = esc_html__( 'Cambodia (កម្ពុជា)', 'igrow-macon' );
		$countries['CM'] = esc_html__( 'Cameroon (Cameroun)', 'igrow-macon' );
		$countries['CA'] = esc_html__( 'Canada', 'igrow-macon' );
		$countries['IC'] = esc_html__( 'Canary Islands (islas Canarias)', 'igrow-macon' );
		$countries['CV'] = esc_html__( 'Cape Verde (Kabu Verdi)', 'igrow-macon' );
		$countries['BQ'] = esc_html__( 'Caribbean Netherlands', 'igrow-macon' );
		$countries['KY'] = esc_html__( 'Cayman Islands', 'igrow-macon' );
		$countries['CF'] = esc_html__( 'Central African Republic (République centrafricaine)', 'igrow-macon' );
		$countries['EA'] = esc_html__( 'Ceuta and Melilla (Ceuta y Melilla)', 'igrow-macon' );
		$countries['TD'] = esc_html__( 'Chad (Tchad)', 'igrow-macon' );
		$countries['CL'] = esc_html__( 'Chile', 'igrow-macon' );
		$countries['CN'] = esc_html__( 'China (中国)', 'igrow-macon' );
		$countries['CX'] = esc_html__( 'Christmas Island', 'igrow-macon' );
		$countries['CP'] = esc_html__( 'Clipperton Island', 'igrow-macon' );
		$countries['CC'] = esc_html__( 'Cocos (Keeling) Islands (Kepulauan Cocos (Keeling))', 'igrow-macon' );
		$countries['CO'] = esc_html__( 'Colombia', 'igrow-macon' );
		$countries['KM'] = esc_html__( 'Comoros (‫جزر القمر‬‎)', 'igrow-macon' );
		$countries['CD'] = esc_html__( 'Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)', 'igrow-macon' );
		$countries['CG'] = esc_html__( 'Congo (Republic) (Congo-Brazzaville)', 'igrow-macon' );
		$countries['CK'] = esc_html__( 'Cook Islands', 'igrow-macon' );
		$countries['CR'] = esc_html__( 'Costa Rica', 'igrow-macon' );
		$countries['CI'] = esc_html__( 'Côte d’Ivoire', 'igrow-macon' );
		$countries['HR'] = esc_html__( 'Croatia (Hrvatska)', 'igrow-macon' );
		$countries['CU'] = esc_html__( 'Cuba', 'igrow-macon' );
		$countries['CW'] = esc_html__( 'Curaçao', 'igrow-macon' );
		$countries['CY'] = esc_html__( 'Cyprus (Κύπρος)', 'igrow-macon' );
		$countries['CZ'] = esc_html__( 'Czech Republic (Česká republika)', 'igrow-macon' );
		$countries['DK'] = esc_html__( 'Denmark (Danmark)', 'igrow-macon' );
		$countries['DG'] = esc_html__( 'Diego Garcia', 'igrow-macon' );
		$countries['DJ'] = esc_html__( 'Djibouti', 'igrow-macon' );
		$countries['DM'] = esc_html__( 'Dominica', 'igrow-macon' );
		$countries['DO'] = esc_html__( 'Dominican Republic (República Dominicana)', 'igrow-macon' );
		$countries['EC'] = esc_html__( 'Ecuador', 'igrow-macon' );
		$countries['EG'] = esc_html__( 'Egypt (‫مصر‬‎)', 'igrow-macon' );
		$countries['SV'] = esc_html__( 'El Salvador', 'igrow-macon' );
		$countries['GQ'] = esc_html__( 'Equatorial Guinea (Guinea Ecuatorial)', 'igrow-macon' );
		$countries['ER'] = esc_html__( 'Eritrea', 'igrow-macon' );
		$countries['EE'] = esc_html__( 'Estonia (Eesti)', 'igrow-macon' );
		$countries['ET'] = esc_html__( 'Ethiopia', 'igrow-macon' );
		$countries['FK'] = esc_html__( 'Falkland Islands (Islas Malvinas)', 'igrow-macon' );
		$countries['FO'] = esc_html__( 'Faroe Islands (Føroyar)', 'igrow-macon' );
		$countries['FJ'] = esc_html__( 'Fiji', 'igrow-macon' );
		$countries['FI'] = esc_html__( 'Finland (Suomi)', 'igrow-macon' );
		$countries['FR'] = esc_html__( 'France', 'igrow-macon' );
		$countries['GF'] = esc_html__( 'French Guiana (Guyane française)', 'igrow-macon' );
		$countries['PF'] = esc_html__( 'French Polynesia (Polynésie française)', 'igrow-macon' );
		$countries['TF'] = esc_html__( 'French Southern Territories (Terres australes françaises)', 'igrow-macon' );
		$countries['GA'] = esc_html__( 'Gabon', 'igrow-macon' );
		$countries['GM'] = esc_html__( 'Gambia', 'igrow-macon' );
		$countries['GE'] = esc_html__( 'Georgia (საქართველო)', 'igrow-macon' );
		$countries['DE'] = esc_html__( 'Germany (Deutschland)', 'igrow-macon' );
		$countries['GH'] = esc_html__( 'Ghana (Gaana)', 'igrow-macon' );
		$countries['GI'] = esc_html__( 'Gibraltar', 'igrow-macon' );
		$countries['GR'] = esc_html__( 'Greece (Ελλάδα)', 'igrow-macon' );
		$countries['GL'] = esc_html__( 'Greenland (Kalaallit Nunaat)', 'igrow-macon' );
		$countries['GD'] = esc_html__( 'Grenada', 'igrow-macon' );
		$countries['GP'] = esc_html__( 'Guadeloupe', 'igrow-macon' );
		$countries['GU'] = esc_html__( 'Guam', 'igrow-macon' );
		$countries['GT'] = esc_html__( 'Guatemala', 'igrow-macon' );
		$countries['GG'] = esc_html__( 'Guernsey', 'igrow-macon' );
		$countries['GN'] = esc_html__( 'Guinea (Guinée)', 'igrow-macon' );
		$countries['GW'] = esc_html__( 'Guinea-Bissau (Guiné Bissau)', 'igrow-macon' );
		$countries['GY'] = esc_html__( 'Guyana', 'igrow-macon' );
		$countries['HT'] = esc_html__( 'Haiti', 'igrow-macon' );
		$countries['HM'] = esc_html__( 'Heard & McDonald Islands', 'igrow-macon' );
		$countries['HN'] = esc_html__( 'Honduras', 'igrow-macon' );
		$countries['HK'] = esc_html__( 'Hong Kong (香港)', 'igrow-macon' );
		$countries['HU'] = esc_html__( 'Hungary (Magyarország)', 'igrow-macon' );
		$countries['IS'] = esc_html__( 'Iceland (Ísland)', 'igrow-macon' );
		$countries['IN'] = esc_html__( 'India (भारत)', 'igrow-macon' );
		$countries['ID'] = esc_html__( 'Indonesia', 'igrow-macon' );
		$countries['IR'] = esc_html__( 'Iran (‫ایران‬‎)', 'igrow-macon' );
		$countries['IQ'] = esc_html__( 'Iraq (‫العراق‬‎)', 'igrow-macon' );
		$countries['IE'] = esc_html__( 'Ireland', 'igrow-macon' );
		$countries['IM'] = esc_html__( 'Isle of Man', 'igrow-macon' );
		$countries['IL'] = esc_html__( 'Israel (‫ישראל‬‎)', 'igrow-macon' );
		$countries['IT'] = esc_html__( 'Italy (Italia)', 'igrow-macon' );
		$countries['JM'] = esc_html__( 'Jamaica', 'igrow-macon' );
		$countries['JP'] = esc_html__( 'Japan (日本)', 'igrow-macon' );
		$countries['JE'] = esc_html__( 'Jersey', 'igrow-macon' );
		$countries['JO'] = esc_html__( 'Jordan (‫الأردن‬‎)', 'igrow-macon' );
		$countries['KZ'] = esc_html__( 'Kazakhstan (Казахстан)', 'igrow-macon' );
		$countries['KE'] = esc_html__( 'Kenya', 'igrow-macon' );
		$countries['KI'] = esc_html__( 'Kiribati', 'igrow-macon' );
		$countries['XK'] = esc_html__( 'Kosovo (Kosovë)', 'igrow-macon' );
		$countries['KW'] = esc_html__( 'Kuwait (‫الكويت‬‎)', 'igrow-macon' );
		$countries['KG'] = esc_html__( 'Kyrgyzstan (Кыргызстан)', 'igrow-macon' );
		$countries['LA'] = esc_html__( 'Laos (ລາວ)', 'igrow-macon' );
		$countries['LV'] = esc_html__( 'Latvia (Latvija)', 'igrow-macon' );
		$countries['LB'] = esc_html__( 'Lebanon (‫لبنان‬‎)', 'igrow-macon' );
		$countries['LS'] = esc_html__( 'Lesotho', 'igrow-macon' );
		$countries['LR'] = esc_html__( 'Liberia', 'igrow-macon' );
		$countries['LY'] = esc_html__( 'Libya (‫ليبيا‬‎)', 'igrow-macon' );
		$countries['LI'] = esc_html__( 'Liechtenstein', 'igrow-macon' );
		$countries['LT'] = esc_html__( 'Lithuania (Lietuva)', 'igrow-macon' );
		$countries['LU'] = esc_html__( 'Luxembourg', 'igrow-macon' );
		$countries['MO'] = esc_html__( 'Macau (澳門)', 'igrow-macon' );
		$countries['MK'] = esc_html__( 'Macedonia (FYROM) (Македонија)', 'igrow-macon' );
		$countries['MG'] = esc_html__( 'Madagascar (Madagasikara)', 'igrow-macon' );
		$countries['MW'] = esc_html__( 'Malawi', 'igrow-macon' );
		$countries['MY'] = esc_html__( 'Malaysia', 'igrow-macon' );
		$countries['MV'] = esc_html__( 'Maldives', 'igrow-macon' );
		$countries['ML'] = esc_html__( 'Mali', 'igrow-macon' );
		$countries['MT'] = esc_html__( 'Malta', 'igrow-macon' );
		$countries['MH'] = esc_html__( 'Marshall Islands', 'igrow-macon' );
		$countries['MQ'] = esc_html__( 'Martinique', 'igrow-macon' );
		$countries['MR'] = esc_html__( 'Mauritania (‫موريتانيا‬‎)', 'igrow-macon' );
		$countries['MU'] = esc_html__( 'Mauritius (Moris)', 'igrow-macon' );
		$countries['YT'] = esc_html__( 'Mayotte', 'igrow-macon' );
		$countries['MX'] = esc_html__( 'Mexico (México)', 'igrow-macon' );
		$countries['FM'] = esc_html__( 'Micronesia', 'igrow-macon' );
		$countries['MD'] = esc_html__( 'Moldova (Republica Moldova)', 'igrow-macon' );
		$countries['MC'] = esc_html__( 'Monaco', 'igrow-macon' );
		$countries['MN'] = esc_html__( 'Mongolia (Монгол)', 'igrow-macon' );
		$countries['ME'] = esc_html__( 'Montenegro (Crna Gora)', 'igrow-macon' );
		$countries['MS'] = esc_html__( 'Montserrat', 'igrow-macon' );
		$countries['MA'] = esc_html__( 'Morocco (‫المغرب‬‎)', 'igrow-macon' );
		$countries['MZ'] = esc_html__( 'Mozambique (Moçambique)', 'igrow-macon' );
		$countries['MM'] = esc_html__( 'Myanmar (Burma) (မြန်မာ)', 'igrow-macon' );
		$countries['NA'] = esc_html__( 'Namibia (Namibië)', 'igrow-macon' );
		$countries['NR'] = esc_html__( 'Nauru', 'igrow-macon' );
		$countries['NP'] = esc_html__( 'Nepal (नेपाल)', 'igrow-macon' );
		$countries['NL'] = esc_html__( 'Netherlands (Nederland)', 'igrow-macon' );
		$countries['NC'] = esc_html__( 'New Caledonia (Nouvelle-Calédonie)', 'igrow-macon' );
		$countries['NZ'] = esc_html__( 'New Zealand', 'igrow-macon' );
		$countries['NI'] = esc_html__( 'Nicaragua', 'igrow-macon' );
		$countries['NE'] = esc_html__( 'Niger (Nijar)', 'igrow-macon' );
		$countries['NG'] = esc_html__( 'Nigeria', 'igrow-macon' );
		$countries['NU'] = esc_html__( 'Niue', 'igrow-macon' );
		$countries['NF'] = esc_html__( 'Norfolk Island', 'igrow-macon' );
		$countries['MP'] = esc_html__( 'Northern Mariana Islands', 'igrow-macon' );
		$countries['KP'] = esc_html__( 'North Korea (조선 민주주의 인민 공화국)', 'igrow-macon' );
		$countries['NO'] = esc_html__( 'Norway (Norge)', 'igrow-macon' );
		$countries['OM'] = esc_html__( 'Oman (‫عُمان‬‎)', 'igrow-macon' );
		$countries['PK'] = esc_html__( 'Pakistan (‫پاکستان‬‎)', 'igrow-macon' );
		$countries['PW'] = esc_html__( 'Palau', 'igrow-macon' );
		$countries['PS'] = esc_html__( 'Palestine (‫فلسطين‬‎)', 'igrow-macon' );
		$countries['PA'] = esc_html__( 'Panama (Panamá)', 'igrow-macon' );
		$countries['PG'] = esc_html__( 'Papua New Guinea', 'igrow-macon' );
		$countries['PY'] = esc_html__( 'Paraguay', 'igrow-macon' );
		$countries['PE'] = esc_html__( 'Peru (Perú)', 'igrow-macon' );
		$countries['PH'] = esc_html__( 'Philippines', 'igrow-macon' );
		$countries['PN'] = esc_html__( 'Pitcairn Islands', 'igrow-macon' );
		$countries['PL'] = esc_html__( 'Poland (Polska)', 'igrow-macon' );
		$countries['PT'] = esc_html__( 'Portugal', 'igrow-macon' );
		$countries['PR'] = esc_html__( 'Puerto Rico', 'igrow-macon' );
		$countries['QA'] = esc_html__( 'Qatar (‫قطر‬‎)', 'igrow-macon' );
		$countries['RE'] = esc_html__( 'Réunion (La Réunion)', 'igrow-macon' );
		$countries['RO'] = esc_html__( 'Romania (România)', 'igrow-macon' );
		$countries['RU'] = esc_html__( 'Russia (Россия)', 'igrow-macon' );
		$countries['RW'] = esc_html__( 'Rwanda', 'igrow-macon' );
		$countries['BL'] = esc_html__( 'Saint Barthélemy (Saint-Barthélemy)', 'igrow-macon' );
		$countries['SH'] = esc_html__( 'Saint Helena', 'igrow-macon' );
		$countries['KN'] = esc_html__( 'Saint Kitts and Nevis', 'igrow-macon' );
		$countries['LC'] = esc_html__( 'Saint Lucia', 'igrow-macon' );
		$countries['MF'] = esc_html__( 'Saint Martin (Saint-Martin (partie française))', 'igrow-macon' );
		$countries['PM'] = esc_html__( 'Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)', 'igrow-macon' );
		$countries['WS'] = esc_html__( 'Samoa', 'igrow-macon' );
		$countries['SM'] = esc_html__( 'San Marino', 'igrow-macon' );
		$countries['ST'] = esc_html__( 'São Tomé and Príncipe (São Tomé e Príncipe)', 'igrow-macon' );
		$countries['SA'] = esc_html__( 'Saudi Arabia (‫المملكة العربية السعودية‬‎)', 'igrow-macon' );
		$countries['SN'] = esc_html__( 'Senegal (Sénégal)', 'igrow-macon' );
		$countries['RS'] = esc_html__( 'Serbia (Србија)', 'igrow-macon' );
		$countries['SC'] = esc_html__( 'Seychelles', 'igrow-macon' );
		$countries['SL'] = esc_html__( 'Sierra Leone', 'igrow-macon' );
		$countries['SG'] = esc_html__( 'Singapore', 'igrow-macon' );
		$countries['SX'] = esc_html__( 'Sint Maarten', 'igrow-macon' );
		$countries['SK'] = esc_html__( 'Slovakia (Slovensko)', 'igrow-macon' );
		$countries['SI'] = esc_html__( 'Slovenia (Slovenija)', 'igrow-macon' );
		$countries['SB'] = esc_html__( 'Solomon Islands', 'igrow-macon' );
		$countries['SO'] = esc_html__( 'Somalia (Soomaaliya)', 'igrow-macon' );
		$countries['ZA'] = esc_html__( 'South Africa', 'igrow-macon' );
		$countries['GS'] = esc_html__( 'South Georgia & South Sandwich Islands', 'igrow-macon' );
		$countries['KR'] = esc_html__( 'South Korea (대한민국)', 'igrow-macon' );
		$countries['SS'] = esc_html__( 'South Sudan (‫جنوب السودان‬‎)', 'igrow-macon' );
		$countries['ES'] = esc_html__( 'Spain (España)', 'igrow-macon' );
		$countries['LK'] = esc_html__( 'Sri Lanka (ශ්‍රී ලංකාව)', 'igrow-macon' );
		$countries['VC'] = esc_html__( 'St. Vincent & Grenadines', 'igrow-macon' );
		$countries['SD'] = esc_html__( 'Sudan (‫السودان‬‎)', 'igrow-macon' );
		$countries['SR'] = esc_html__( 'Suriname', 'igrow-macon' );
		$countries['SJ'] = esc_html__( 'Svalbard and Jan Mayen (Svalbard og Jan Mayen)', 'igrow-macon' );
		$countries['SZ'] = esc_html__( 'Swaziland', 'igrow-macon' );
		$countries['SE'] = esc_html__( 'Sweden (Sverige)', 'igrow-macon' );
		$countries['CH'] = esc_html__( 'Switzerland (Schweiz)', 'igrow-macon' );
		$countries['SY'] = esc_html__( 'Syria (‫سوريا‬‎)', 'igrow-macon' );
		$countries['TW'] = esc_html__( 'Taiwan (台灣)', 'igrow-macon' );
		$countries['TJ'] = esc_html__( 'Tajikistan', 'igrow-macon' );
		$countries['TZ'] = esc_html__( 'Tanzania', 'igrow-macon' );
		$countries['TH'] = esc_html__( 'Thailand (ไทย)', 'igrow-macon' );
		$countries['TL'] = esc_html__( 'Timor-Leste', 'igrow-macon' );
		$countries['TG'] = esc_html__( 'Togo', 'igrow-macon' );
		$countries['TK'] = esc_html__( 'Tokelau', 'igrow-macon' );
		$countries['TO'] = esc_html__( 'Tonga', 'igrow-macon' );
		$countries['TT'] = esc_html__( 'Trinidad and Tobago', 'igrow-macon' );
		$countries['TA'] = esc_html__( 'Tristan da Cunha', 'igrow-macon' );
		$countries['TN'] = esc_html__( 'Tunisia (‫تونس‬‎)', 'igrow-macon' );
		$countries['TR'] = esc_html__( 'Turkey (Türkiye)', 'igrow-macon' );
		$countries['TM'] = esc_html__( 'Turkmenistan', 'igrow-macon' );
		$countries['TC'] = esc_html__( 'Turks and Caicos Islands', 'igrow-macon' );
		$countries['TV'] = esc_html__( 'Tuvalu', 'igrow-macon' );
		$countries['UM'] = esc_html__( 'U.S. Outlying Islands', 'igrow-macon' );
		$countries['VI'] = esc_html__( 'U.S. Virgin Islands', 'igrow-macon' );
		$countries['UG'] = esc_html__( 'Uganda', 'igrow-macon' );
		$countries['UA'] = esc_html__( 'Ukraine (Україна)', 'igrow-macon' );
		$countries['AE'] = esc_html__( 'United Arab Emirates (‫الإمارات العربية المتحدة‬‎)', 'igrow-macon' );
		$countries['GB'] = esc_html__( 'United Kingdom', 'igrow-macon' );
		$countries['US'] = esc_html__( 'United States', 'igrow-macon' );
		$countries['UY'] = esc_html__( 'Uruguay', 'igrow-macon' );
		$countries['UZ'] = esc_html__( 'Uzbekistan (Oʻzbekiston)', 'igrow-macon' );
		$countries['VU'] = esc_html__( 'Vanuatu', 'igrow-macon' );
		$countries['VA'] = esc_html__( 'Vatican City (Città del Vaticano)', 'igrow-macon' );
		$countries['VE'] = esc_html__( 'Venezuela', 'igrow-macon' );
		$countries['VN'] = esc_html__( 'Vietnam (Việt Nam)', 'igrow-macon' );
		$countries['WF'] = esc_html__( 'Wallis and Futuna', 'igrow-macon' );
		$countries['EH'] = esc_html__( 'Western Sahara (‫الصحراء الغربية‬‎)', 'igrow-macon' );
		$countries['YE'] = esc_html__( 'Yemen (‫اليمن‬‎)', 'igrow-macon' );
		$countries['ZM'] = esc_html__( 'Zambia', 'igrow-macon' );
		$countries['ZW'] = esc_html__( 'Zimbabwe', 'igrow-macon' );

		if ( ! empty( $country ) ) {

			return $countries[$country];

		}

		return $countries;

	} // country_list()

	/**
	 * Loads files for Custom Controls.
	 *
	 * @hooked
	 */
	public function load_customize_controls() {

		$files[] = 'control-editor.php';
		$files[] = 'control-layout-picker.php';
		$files[] = 'control-multiple-checkboxes.php';
		$files[] = 'control-select-category.php';
		$files[] = 'control-select-menu.php';
		$files[] = 'control-select-post.php';
		$files[] = 'control-select-post-type.php';
		//$files[] = 'control-select-recent-post.php';
		$files[] = 'control-select-tag.php';
		$files[] = 'control-select-taxonomy.php';
		$files[] = 'control-select-user.php';

		foreach ( $files as $file ) {

			require_once( trailingslashit( get_stylesheet_directory() ) . 'classes/customizer/' . $file );

		}

	} // load_customize_controls()

	/**
	 * Returns an array of the Australian states and Territories.
	 * The optional parameters allows for returning just one state.
	 *
	 * @param 		string 		$state 		The state to return.
	 * @return 		array 					An array containing states.
	 */
	private function states_list_australia( $state = '' ) {

		$states = array();

		$states['ACT'] = esc_html__( 'Australian Capital Territory', 'igrow-macon' );
		$states['NSW'] = esc_html__( 'New South Wales', 'igrow-macon' );
		$states['NT' ] = esc_html__( 'Northern Territory', 'igrow-macon' );
		$states['QLD'] = esc_html__( 'Queensland', 'igrow-macon' );
		$states['SA' ] = esc_html__( 'South Australia', 'igrow-macon' );
		$states['TAS'] = esc_html__( 'Tasmania', 'igrow-macon' );
		$states['VIC'] = esc_html__( 'Victoria', 'igrow-macon' );
		$states['WA' ] = esc_html__( 'Western Australia', 'igrow-macon' );

		if ( ! empty( $state ) ) {

			return $states[$state];

		}

		return $states;

	} // states_list_australia()



	/**
	 * Returns an array of the Canadian states and Territories.
	 * The optional parameters allows for returning just one state.
	 *
	 * @param 		string 		$state 		The state to return.
	 * @return 		array 					An array containing states.
	 */
	private function states_list_canada( $state = '' ) {

		$states = array();

		$states['AB'] = esc_html__( 'Alberta', 'igrow-macon' );
		$states['BC'] = esc_html__( 'British Columbia', 'igrow-macon' );
		$states['MB'] = esc_html__( 'Manitoba', 'igrow-macon' );
		$states['NB'] = esc_html__( 'New Brunswick', 'igrow-macon' );
		$states['NL'] = esc_html__( 'Newfoundland and Labrador', 'igrow-macon' );
		$states['NT'] = esc_html__( 'Northwest Territories', 'igrow-macon' );
		$states['NS'] = esc_html__( 'Nova Scotia', 'igrow-macon' );
		$states['NU'] = esc_html__( 'Nunavut', 'igrow-macon' );
		$states['ON'] = esc_html__( 'Ontario', 'igrow-macon' );
		$states['PE'] = esc_html__( 'Prince Edward Island', 'igrow-macon' );
		$states['QC'] = esc_html__( 'Quebec', 'igrow-macon' );
		$states['SK'] = esc_html__( 'Saskatchewan', 'igrow-macon' );
		$states['YT'] = esc_html__( 'Yukon', 'igrow-macon' );

		if ( ! empty( $state ) ) {

			return $states[$state];

		}

		return $states;

	} // states_list_canada()

	/**
	 * Returns an array of the US states and Territories.
	 * The optional parameters allows for returning just one state.
	 *
	 * @param 		string 		$state 		The state to return.
	 * @return 		array 					An array containing states.
	 */
	private function states_list_unitedstates( $state = '' ) {

		$states = array();

		$states['AL'] = esc_html__( 'Alabama', 'igrow-macon' );
		$states['AK'] = esc_html__( 'Alaska', 'igrow-macon' );
		$states['AZ'] = esc_html__( 'Arizona', 'igrow-macon' );
		$states['AR'] = esc_html__( 'Arkansas', 'igrow-macon' );
		$states['CA'] = esc_html__( 'California', 'igrow-macon' );
		$states['CO'] = esc_html__( 'Colorado', 'igrow-macon' );
		$states['CT'] = esc_html__( 'Connecticut', 'igrow-macon' );
		$states['DE'] = esc_html__( 'Delaware', 'igrow-macon' );
		$states['DC'] = esc_html__( 'District of Columbia', 'igrow-macon' );
		$states['FL'] = esc_html__( 'Florida', 'igrow-macon' );
		$states['GA'] = esc_html__( 'Georgia', 'igrow-macon' );
		$states['HI'] = esc_html__( 'Hawaii', 'igrow-macon' );
		$states['ID'] = esc_html__( 'Idaho', 'igrow-macon' );
		$states['IL'] = esc_html__( 'Illinois', 'igrow-macon' );
		$states['IN'] = esc_html__( 'Indiana', 'igrow-macon' );
		$states['IA'] = esc_html__( 'Iowa', 'igrow-macon' );
		$states['KS'] = esc_html__( 'Kansas', 'igrow-macon' );
		$states['KY'] = esc_html__( 'Kentucky', 'igrow-macon' );
		$states['LA'] = esc_html__( 'Louisiana', 'igrow-macon' );
		$states['ME'] = esc_html__( 'Maine', 'igrow-macon' );
		$states['MD'] = esc_html__( 'Maryland', 'igrow-macon' );
		$states['MA'] = esc_html__( 'Massachusetts', 'igrow-macon' );
		$states['MI'] = esc_html__( 'Michigan', 'igrow-macon' );
		$states['MN'] = esc_html__( 'Minnesota', 'igrow-macon' );
		$states['MS'] = esc_html__( 'Mississippi', 'igrow-macon' );
		$states['MO'] = esc_html__( 'Missouri', 'igrow-macon' );
		$states['MT'] = esc_html__( 'Montana', 'igrow-macon' );
		$states['NE'] = esc_html__( 'Nebraska', 'igrow-macon' );
		$states['NV'] = esc_html__( 'Nevada', 'igrow-macon' );
		$states['NH'] = esc_html__( 'New Hampshire', 'igrow-macon' );
		$states['NJ'] = esc_html__( 'New Jersey', 'igrow-macon' );
		$states['NM'] = esc_html__( 'New Mexico', 'igrow-macon' );
		$states['NY'] = esc_html__( 'New York', 'igrow-macon' );
		$states['NC'] = esc_html__( 'North Carolina', 'igrow-macon' );
		$states['ND'] = esc_html__( 'North Dakota', 'igrow-macon' );
		$states['OH'] = esc_html__( 'Ohio', 'igrow-macon' );
		$states['OK'] = esc_html__( 'Oklahoma', 'igrow-macon' );
		$states['OR'] = esc_html__( 'Oregon', 'igrow-macon' );
		$states['PA'] = esc_html__( 'Pennsylvania', 'igrow-macon' );
		$states['RI'] = esc_html__( 'Rhode Island', 'igrow-macon' );
		$states['SC'] = esc_html__( 'South Carolina', 'igrow-macon' );
		$states['SD'] = esc_html__( 'South Dakota', 'igrow-macon' );
		$states['TN'] = esc_html__( 'Tennessee', 'igrow-macon' );
		$states['TX'] = esc_html__( 'Texas', 'igrow-macon' );
		$states['UT'] = esc_html__( 'Utah', 'igrow-macon' );
		$states['VT'] = esc_html__( 'Vermont', 'igrow-macon' );
		$states['VA'] = esc_html__( 'Virginia', 'igrow-macon' );
		$states['WA'] = esc_html__( 'Washington', 'igrow-macon' );
		$states['WV'] = esc_html__( 'West Virginia', 'igrow-macon' );
		$states['WI'] = esc_html__( 'Wisconsin', 'igrow-macon' );
		$states['WY'] = esc_html__( 'Wyoming', 'igrow-macon' );
		$states['AS'] = esc_html__( 'American Samoa', 'igrow-macon' );
		$states['AA'] = esc_html__( 'Armed Forces America (except Canada)', 'igrow-macon' );
		$states['AE'] = esc_html__( 'Armed Forces Africa/Canada/Europe/Middle East', 'igrow-macon' );
		$states['AP'] = esc_html__( 'Armed Forces Pacific', 'igrow-macon' );
		$states['FM'] = esc_html__( 'Federated States of Micronesia', 'igrow-macon' );
		$states['GU'] = esc_html__( 'Guam', 'igrow-macon' );
		$states['MH'] = esc_html__( 'Marshall Islands', 'igrow-macon' );
		$states['MP'] = esc_html__( 'Northern Mariana Islands', 'igrow-macon' );
		$states['PR'] = esc_html__( 'Puerto Rico', 'igrow-macon' );
		$states['PW'] = esc_html__( 'Palau', 'igrow-macon' );
		$states['VI'] = esc_html__( 'Virgin Islands', 'igrow-macon' );

		if ( ! empty( $state ) ) {

			return $states[$state];

		}

		return $states;

	} // states_list_unitedstates()

} // class
