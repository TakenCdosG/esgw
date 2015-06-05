<?php
/*
 * Plugin Name: Advanced Custom Fields: Nav Submenu Field
 * Description: Add-On plugin for Advanced Custom Fields (ACF) that adds a 'Nav Submenu' Field type.
 * Based on the Advanced Custom Fields: Nav Menu Field plugin developed by Faison Zutavern - http://faisonz.com
 * Version: 1.0.0
 * Author: Sebastián González
 * License: GPL2 or later
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ACF_Nav_Submenu_Field_Plugin {

	/**
	 * Adds register hooks for the Nav Menu Field.
	 */
	public function __construct() {
		// version 4
		add_action( 'acf/register_fields', array( $this, 'register_field_v4' ) );	

		// version 5
		add_action( 'acf/include_field_types', array( $this, 'register_field_v5' ) );
	}

	/**
	 * Loads up the Nav Menu Field for ACF v4
	 */
	public function register_field_v4() {
		include_once 'nav-submenu-v4.php';
	}

	/**
	 * Loads up the Nav Menu Field for ACF v5
	 */
	public function register_field_v5() {
		include_once 'nav-submenu-v5.php';
	}
	
}

new ACF_Nav_Submenu_Field_Plugin();
