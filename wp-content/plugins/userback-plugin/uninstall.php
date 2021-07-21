<?php

/**
 * Trigger this file on Plugin uninstall
 *
 * @package  UserbackPlugin
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

$options = ['userback_api_key', 'userback_project', 'userback_assignee', 'userback_timeout', 'userback_localhost', 'userback_dashboard', 'userback_logged', 'userback_domain_filter'];

foreach ($options as $option) {
    delete_option($option);
}