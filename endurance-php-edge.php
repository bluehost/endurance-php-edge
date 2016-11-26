<?php
/*
Plugin Name: Endurance PHP Edge
Description: Run the latest stable version of PHP available.
Version: 0.1
Author: Mike Hansen
Author URI: https://www.mikehansen.me/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Do not access file directly!
if ( ! defined( 'WPINC' ) ) { die; }

define( 'EPE_VERSION', 0.1 );

if ( ! class_exists( 'Endurance_PHP_Edge' ) ) {
	class Endurance_PHP_Edge {
		function __construct() {
			$this->hooks();
		}

		function hooks() {
			add_filter( 'mod_rewrite_rules', array( $this, 'htaccess_contents' ) );
		}

		function htaccess_contents( $rules ) {
			$handler = 'AddHandler application/x-httpd-php-edge .php' . "\n";
			return $handler . $rules;
		}
	}
	$ebc = new Endurance_PHP_Edge;
}
