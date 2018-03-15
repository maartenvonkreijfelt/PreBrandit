<?php // PreBrandit - Register Settings



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}



// register plugin settings
function prebrandit_register_settings() {

	/*

	register_setting(
		string   $option_group //The first parameter of this function specifies the name of the option group.
							   //This should match the parameter that we specified in the settings_fields
							   //functionsettings_fields( 'prebrandit_options' ) in the function prebrandit_display_settings_page() in de settingspage,
		string   $option_name   //the second parameter specifies the name of the option itself. We will use this name when retrieving the option from the database.,
		callable $sanitize_callback //the third parameter specifies the callback function that will be used to validate the settings.
	);


	*/
	
	register_setting( 
		'prebrandit_options',
		'prebrandit_options',
		'prebrandit_callback_validate_options'
	); 
	
	/*
	
	add_settings_section( 
		string   $id, 
		string   $title, 
		callable $callback, 
		string   $page
	);
	
	*/
	
	add_settings_section( 
		'prebrandit_section_login',
		esc_html__('Customize Login Page', 'prebrandit'),
		'prebrandit_callback_section_login',
		'prebrandit'
	);
	
	add_settings_section( 
		'prebrandit_section_admin',
		esc_html__('Customize Admin Area', 'prebrandit'),
		'prebrandit_callback_section_admin',
		'prebrandit'
	);
	
	/*
	
	add_settings_field(
    	string   $id, 
		string   $title, 
		callable $callback, 
		string   $page, 
		string   $section = 'default', 
		array    $args = []
	);
	
	*/
	
	add_settings_field(
		'custom_url',
		esc_html__('Custom URL', 'prebrandit'),
		'prebrandit_callback_field_text',
		'prebrandit',
		'prebrandit_section_login',
		[ 'id' => 'custom_url', 'label' => esc_html__('Custom URL for the login logo link', 'prebrandit') ]
	);
	
	add_settings_field(
		'custom_title',
		esc_html__('Custom Title', 'prebrandit'),
		'prebrandit_callback_field_text',
		'prebrandit',
		'prebrandit_section_login',
		[ 'id' => 'custom_title', 'label' => esc_html__('Custom title attribute for the logo link', 'prebrandit') ]
	);
	
	add_settings_field(
		'custom_style',
		esc_html__('Custom Style', 'prebrandit'),
		'prebrandit_callback_field_radio',
		'prebrandit',
		'prebrandit_section_login',
		[ 'id' => 'custom_style', 'label' => esc_html__('Custom CSS for the Login screen', 'prebrandit') ]
	);
	
	add_settings_field(
		'custom_message',
		esc_html__('Custom Message', 'prebrandit'),
		'prebrandit_callback_field_textarea',
		'prebrandit',
		'prebrandit_section_login',
		[ 'id' => 'custom_message', 'label' => esc_html__('Custom text and/or markup', 'prebrandit') ]
	);
	
	add_settings_field(
		'custom_footer',
		esc_html__('Custom Footer', 'prebrandit'),
		'prebrandit_callback_field_text',
		'prebrandit',
		'prebrandit_section_admin',
		[ 'id' => 'custom_footer', 'label' => esc_html__('Custom footer text', 'prebrandit') ]
	);
	
	add_settings_field(
		'custom_toolbar',
		esc_html__('Custom Toolbar', 'prebrandit'),
		'prebrandit_callback_field_checkbox',
		'prebrandit',
		'prebrandit_section_admin',
		[ 'id' => 'custom_toolbar', 'label' => esc_html__('Remove new post and comment links from the Toolbar', 'prebrandit') ]
	);
	
	add_settings_field(
		'custom_scheme',
		esc_html__('Custom Scheme', 'prebrandit'),
		'prebrandit_callback_field_select',
		'prebrandit',
		'prebrandit_section_admin',
		[ 'id' => 'custom_scheme', 'label' => esc_html__('Default color scheme for new users', 'prebrandit') ]
	);
    
} 
add_action( 'admin_init', 'prebrandit_register_settings' );


