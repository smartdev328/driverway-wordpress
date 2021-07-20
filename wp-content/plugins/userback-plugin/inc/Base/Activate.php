<?php
/**
 * @package  UserbackPlugin
 */
namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		$default = array();

		if ( ! get_option( 'userback_plugin' ) ) {
			update_option( 'userback_plugin', $default );
		}
	}
}