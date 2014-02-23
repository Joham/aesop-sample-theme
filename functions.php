<?php

class ASTFunctions {

	function __construct(){

		// Set some constants
		define('AST_THEME_VERSION', '0.1');

		define('AST_THEME_DIR', get_template_directory());
		define('AST_THEME_URL', get_template_directory_uri());

		require_once(AST_THEME_DIR.'/inc/scripts.php');
		require_once(AST_THEME_DIR.'/inc/aesopmeta.php');
		require_once(AST_THEME_DIR.'/inc/styles.php');

		// Run the rest
		add_action('after_setup_theme', array($this,'theme_supports'));

	}

	public function theme_supports(){
	
		add_theme_support( 'post-thumbnails' );	

		register_nav_menus( array(
			  'main_nav' => 'Main Nav'
			)
		);
	
	}

}

new ASTFunctions;



function change_post_label() {

    global $menu;
    global $submenu;
    $menu[5][0] = 'Stories';
    $submenu['edit.php'][5][0] = 'Stories';
    $submenu['edit.php'][10][0] = 'Add Stories';
    $submenu['edit.php'][16][0] = 'Stories Tags';
    echo '';

}

add_action( 'admin_menu', 'change_post_label' );

function change_post_object() {

    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Stories';
    $labels->singular_name = 'Stories';
    $labels->add_new = 'Add Stories';
    $labels->add_new_item = 'Add Stories';
    $labels->edit_item = 'Edit Stories';
    $labels->new_item = 'Stories';
    $labels->view_item = 'View Stories';
    $labels->search_items = 'Search Stories';
    $labels->not_found = 'No Stories found';
    $labels->not_found_in_trash = 'No Stories found in Trash';
    $labels->all_items = 'All Stories';
    $labels->menu_name = 'Stories';
    $labels->name_admin_bar = 'Stories';

}
 
add_action( 'init', 'change_post_object' );
