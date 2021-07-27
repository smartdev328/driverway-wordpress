<?php 
/**
 * @package  UserbackPlugin
 */
namespace Inc\Base;

class Enqueue extends BaseController
{
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueueAdmin' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueueUserback' ) );

        add_action( 'wp_enqueue_scripts', array( $this, 'enqueueUserback' ) );
	}
	
	function enqueueAdmin() {
		wp_enqueue_style( 'userback-backend-style', $this->plugin_url . 'assets/backend.css' );
		wp_enqueue_script( 'userback-backend-script', $this->plugin_url . 'assets/backend.js' );
	}

	/*
	 * Enqueue userback widget on the front
	 */
    function enqueueUserback() {
	    // Now allowed domains hardcoded
        // TODO Make it available from the dashboard
        $allowed_hosts = array('wp-dev.space');

        $filter_private =  filter_var(
                                $_SERVER['REMOTE_ADDR'],
                                FILTER_VALIDATE_IP,
                                FILTER_FLAG_NO_PRIV_RANGE |  FILTER_FLAG_NO_RES_RANGE
                           );
        $filter_domain = !isset($_SERVER['HTTP_HOST']) || isset($_SERVER['HTTP_HOST']) && in_array($_SERVER['HTTP_HOST'], $allowed_hosts);

        if  ((get_option('userback_localhost', true) && !$filter_private)       ||                  // Hide on the localhost
            (get_option('userback_logged', false) && !is_user_logged_in())      ||                  // Show only for logged in
            (get_option('userback_dashboard', false) && is_admin())             ||                  // Hide on the dashboard
            (get_option('userback_domain_filter', true) && !$filter_domain && !$filter_private))    // Show only on allowed domains ('local' domains ignored)
            return;

        wp_enqueue_script('userback-script', $this->plugin_url . 'assets/userback.js');
        wp_localize_script('userback-script', 'userback_data', array(
            'api_key' => get_option('userback_api_key'),
            'timeout' => get_option('userback_timeout', 1500),
            'project' => get_option('userback_project', -1),
            'assignee' => get_option('userback_assignee', ''),
        ));
    }
}