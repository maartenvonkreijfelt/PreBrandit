<?php // PreBrandit - Settings Callbacks



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}



// callback: login section
function prebrandit_callback_section_login() {
	
	echo '<p>'. esc_html__('These settings enable you to customize the WP Login screen.', 'prebrandit') .'</p>';
	
}



// callback: admin section
function prebrandit_callback_section_admin() {
	
	echo '<p>'. esc_html__('These settings enable you to customize the WP Admin Area.', 'prebrandit') .'</p>';
	
}



// callback: text field
function prebrandit_callback_field_text( $args ) {
	
	$options = get_option( 'prebrandit_options', prebrandit_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="prebrandit_options_'. $id .'" name="prebrandit_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="prebrandit_options_'. $id .'">'. $label .'</label>';
	
}



// radio field options
function prebrandit_options_radio() {
	
	return array(
		
		'enable'  => esc_html__('Enable custom styles', 'prebrandit'),
		'disable' => esc_html__('Disable custom styles', 'prebrandit')
		
	);
	
}



// callback: radio field
function prebrandit_callback_field_radio( $args ) {
	
	$options = get_option( 'prebrandit_options', prebrandit_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$radio_options = prebrandit_options_radio();
	
	foreach ( $radio_options as $value => $label ) {
		
		$checked = checked( $selected_option === $value, true, false );
		
		echo '<label><input name="prebrandit_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
		echo '<span>'. $label .'</span></label><br />';
		
	}
	
}



// callback: textarea field
function prebrandit_callback_field_textarea( $args ) {
	
	$options = get_option( 'prebrandit_options', prebrandit_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$allowed_tags = wp_kses_allowed_html( 'post' );
	
	$value = isset( $options[$id] ) ? wp_kses( stripslashes_deep( $options[$id] ), $allowed_tags ) : '';
	
	echo '<textarea id="prebrandit_options_'. $id .'" name="prebrandit_options['. $id .']" rows="5" cols="50">'. $value .'</textarea><br />';
	echo '<label for="prebrandit_options_'. $id .'">'. $label .'</label>';
	
}



// callback: checkbox field
function prebrandit_callback_field_checkbox( $args ) {
	
	$options = get_option( 'prebrandit_options', prebrandit_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';
	
	echo '<input id="prebrandit_options_'. $id .'" name="prebrandit_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
	echo '<label for="prebrandit_options_'. $id .'">'. $label .'</label>';
	
}



// select field options
function prebrandit_options_select() {
	
	return array(
		
		'default'   => esc_html__('Default',   'prebrandit'),
		'light'     => esc_html__('Light',     'prebrandit'),
		'blue'      => esc_html__('Blue',      'prebrandit'),
		'coffee'    => esc_html__('Coffee',    'prebrandit'),
		'ectoplasm' => esc_html__('Ectoplasm', 'prebrandit'),
		'midnight'  => esc_html__('Midnight',  'prebrandit'),
		'ocean'     => esc_html__('Ocean',     'prebrandit'),
		'sunrise'   => esc_html__('Sunrise',   'prebrandit'),
		
	);
	
}



// callback: select field
function prebrandit_callback_field_select( $args ) {
	
	$options = get_option( 'prebrandit_options', prebrandit_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	$select_options = prebrandit_options_select();
	
	echo '<select id="prebrandit_options_'. $id .'" name="prebrandit_options['. $id .']">';
	
	foreach ( $select_options as $value => $option ) {
		
		$selected = selected( $selected_option === $value, true, false );
		
		echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
		
	}
	
	echo '</select> <label for="prebrandit_options_'. $id .'">'. $label .'</label>';
	
}


