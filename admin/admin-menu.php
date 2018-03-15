<?php // PreBrandit - Admin Menu



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}




// add sub-level administrative menu
function prebrandit_add_sublevel_menu() {
	
	/*
	
	add_submenu_page(
		string   $parent_slug,
		string   $page_title,
		string   $menu_title,
		string   $capability,
		string   $menu_slug, 
		callable $function = ''
	);
	
	*/
	
	add_submenu_page(
		'options-general.php',
		esc_html__('PreBrandit Settings', 'prebrandit'),
		esc_html__('PreBrandit', 'prebrandit'),
		'manage_options',
		'prebrandit',
		'prebrandit_display_settings_page'
	);
	
}
//We can either choose a toplevel menu  or a sublevel menu (see (see line 79-110). Here we choose the toplevel menu
//add_action( 'admin_menu', 'prebrandit_add_sublevel_menu' );



// add top-level administrative menu
function prebrandit_add_toplevel_menu() {

	/*
		add_menu_page(
			string   $page_title,
			string   $menu_title,
			string   $capability,
			string   $menu_slug,
			callable $function = '' (This should match the function on line 41),
			string   $icon_url = '' (see https://developer.wordpress.org/resource/dashicons/#filter),
			int      $position = null (his parameter specifies the menu priority. The higher the number
									 the lower the plugin will appear in the admin menu. For example, if we set the value to 0 the menu
									item will appear before any other menu items. Now our plugin is displayed at the top of the admin menu.
									I wouldn't recommend doing this, but wanted to show how it works.
									In general it's best to leave this parameter set at null to avoid clashes with other plugins.
									But feel free to experiment with different numerical values
		)
	*/
	
	add_menu_page(
		esc_html__('PreBrandit Settings', 'prebrandit'),
		esc_html__('PreBrandit', 'prebrandit'),
		'manage_options',
		'prebrandit',
		'prebrandit_display_settings_page',
		'dashicons-admin-generic',
		null
	);
	
}
 add_action( 'admin_menu', 'prebrandit_add_toplevel_menu' );


