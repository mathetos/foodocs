<?php
/*
Plugin Name: FooDocs
Plugin URI: https://github.com/mathetos/foodocs
Description: A WordPress plugin for organizing and showing your plugin documentation
Author: Matt Cromwell, Brad Vincent
Author URI: http://mattcromwell.com
Version: 0.1-alpha
*/

if ( !class_exists('FooDocs') ) {
	class FooDocs {
		function __construct() {
			//this runs when the class is instantiated
			add_action( 'init', array($this, 'register_custom_post_type') );
		}

		function register_custom_post_type() {
			$labels = array(
				'name'                => _x( 'FooDocs', 'Post Type General Name', 'text_foodocs' ),
				'singular_name'       => _x( 'FooDoc', 'Post Type Singular Name', 'text_foodocs' ),
				'view_item'           => __( 'View FooDoc', 'text_foodocs' ),
				'add_new_item'        => __( 'Add New FooDoc', 'text_foodocs' ),
				'add_new'             => __( 'New FooDoc', 'text_foodocs' ),
				'edit_item'           => __( 'Edit FooDoc', 'text_foodocs' ),
				'search_items'        => __( 'Search FooDocs', 'text_foodocs' ),
				'not_found'           => __( 'No FooDocs found', 'text_foodocs' ),
				'not_found_in_trash'  => __( 'No FooDocs found in Trash', 'text_foodocs' ),
				'menu_name'           => __( 'FooDocs', 'text_foodocs' ),
				'parent_item_colon'   => __( 'Parent FooDoc:', 'text_foodocs' ),
				'all_items'           => __( 'All FooDocs', 'text_foodocs' ),
				'update_item'         => __( 'Update FooDoc', 'text_foodocs' ),
			);
			
			$rewrite = array(
				'slug'                => 'foodoc',
				'with_front'          => true,
				'pages'               => true,
				'feeds'               => true,
			);
			
			$capabilities = array(
				'edit_post'           => 'edit_foodoc',
				'read_post'           => 'read_foodoc',
				'delete_post'         => 'delete_foodoc',
				'edit_posts'          => 'edit_foodocs',
				'edit_others_posts'   => 'edit_others_foodocs',
				'publish_posts'       => 'publish_foodocs',
				'read_private_posts'  => 'read_private_foodocs',
			);

			$args = array(
				'description'         => __( 'Documentation', 'text_foodocs' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'post-formats', ),
				'hierarchical'        => true,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type' 	  	  => 'page',
				'rewrite'             => $rewrite,
				'query_var'           => 'foodoc',
				'label'               => __( 'foodoc', 'text_foodocs' ),
				'taxonomies'          => array( 'category', 'post_tag' ),
				'show_in_admin_bar'   => true,
				'menu_position'       => 5,
				'menu_icon' => admin_url() . 'images/press-this.png'
			);

			register_post_type( 'foodocs', $args );
		}
	}
}

$GLOBALS['FooDocs'] = new FooDocs();