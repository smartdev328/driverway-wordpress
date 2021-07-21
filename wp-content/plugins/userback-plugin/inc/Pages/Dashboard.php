<?php
/**
 * @package  UserbackPlugin
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

class Dashboard extends BaseController
{
    public $settings;

    public $callbacks;

    public $callbacks_mngr;

    public $pages = array();

    public function register()
    {
        $this->settings         = new SettingsApi();
        $this->callbacks        = new AdminCallbacks();
        $this->callbacks_mngr   = new ManagerCallbacks();

        $this->setPages();
        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title'    => 'Userback Plugin',
                'menu_title'    => 'Userback',
                'capability'    => 'manage_options',
                'menu_slug'     => 'userback_plugin',
                'callback'      => array( $this->callbacks, 'adminDashboard' ),
                'icon_url'      => 'dashicons-welcome-comments',
                'position'      => 110
            )
        );
    }

    public function setSettings()
    {
        $args = [
            [
                'option_group' => 'userback_plugin_settings',
                'option_name' => 'userback_api_key',
            ],
            [
                'option_group' => 'userback_plugin_settings',
                'option_name' => 'userback_project',
            ],
            [
                'option_group' => 'userback_plugin_settings',
                'option_name' => 'userback_assignee',
            ],
            [
                'option_group' => 'userback_plugin_settings',
                'option_name' => 'userback_timeout',
            ],
            [
                'option_group' => 'userback_plugin_settings',
                'option_name' => 'userback_localhost',
            ],
            [
                'option_group' => 'userback_plugin_settings',
                'option_name' => 'userback_dashboard',
            ],
            [
                'option_group' => 'userback_plugin_settings',
                'option_name' => 'userback_logged',
            ],
            [
                'option_group' => 'userback_plugin_settings',
                'option_name' => 'userback_domain_filter',
            ],
        ];

        $this->settings->setSettings( $args );
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'userback_admin_index',
                'title' => 'Main Settings',
                'callback' => array( $this->callbacks_mngr, 'adminSectionManager' ),
                'page' => 'userback_plugin'
            )
        );

        $this->settings->setSections( $args );
    }

    public function setFields()
    {
        $args = [
            [
                'id' => 'userback_api_key',
                'title' => __('API key'),
                'callback' => [$this->callbacks,'userbackApiKey'],
                'page' => 'userback_plugin',
                'section' =>  'userback_admin_index',
                'args' => [
                    'label_for' => 'userbackApiKey',
                    'class' => 'userbackApiKey'
                ]
            ],
            [
                'id' => 'userback_project',
                'title' => __('Project ID'),
                'callback' => [$this->callbacks,'userbackProject'],
                'page' => 'userback_plugin',
                'section' =>  'userback_admin_index',
                'args' => [
                    'label_for' => 'userback_project',
                    'class' => 'userback_project'
                ]
            ],
            [
                'id' => 'userback_assignee',
                'title' => __('Issue assignee name'),
                'callback' => [$this->callbacks,'userbackAssignee'],
                'page' => 'userback_plugin',
                'section' =>  'userback_admin_index',
                'args' => [
                    'label_for' => 'userback_assignee',
                    'class' => 'userback_assignee'
                ]
            ],
            [
                'id' => 'userback_timeout',
                'title' => __('Widget Timeout'),
                'callback' => [$this->callbacks,'userbackTimeout'],
                'page' => 'userback_plugin',
                'section' =>  'userback_admin_index',
                'args' => [
                    'option_name' => 'userback_timeout',
                    'default' => 1000,
                    'label_for' => 'userback_timeout',
                    'class' => 'userback_timeout',
                ]
            ],
            [
                'id' => 'userback_localhost',
                'title' => __('Hide widget on localhost'),
                'callback' => [$this->callbacks,'checkboxField'],
                'page' => 'userback_plugin',
                'section' =>  'userback_admin_index',
                'args' => [
                    'option_name' => 'userback_localhost',
                    'default' => true,
                    'label_for' => 'userback_localhost',
                    'class' => 'ui-toggle'
                ]
            ],
            [
                'id' => 'userback_dashboard',
                'title' => __('Hide widget on WP dashboard'),
                'callback' => [$this->callbacks,'checkboxField'],
                'page' => 'userback_plugin',
                'section' =>  'userback_admin_index',
                'args' => [
                    'option_name' => 'userback_dashboard',
                    'default' => false,
                    'label_for' => 'userback_dashboard',
                    'class' => 'ui-toggle'
                ]
            ],
            [
                'id' => 'userback_logged',
                'title' => __('Show widget for logged in users only'),
                'callback' => [$this->callbacks,'checkboxField'],
                'page' => 'userback_plugin',
                'section' =>  'userback_admin_index',
                'args' => [
                    'option_name' => 'userback_logged',
                    'default' => false,
                    'label_for' => 'userback_logged',
                    'class' => 'ui-toggle'
                ]
            ],
            [
                'id' => 'userback_domain_filter',
                'title' => __('Show widget for allowed domains only (wp-dev.space for now)'),
                'callback' => [$this->callbacks,'checkboxField'],
                'page' => 'userback_plugin',
                'section' =>  'userback_admin_index',
                'args' => [
                    'option_name' => 'userback_domain_filter',
                    'default' => true,
                    'label_for' => 'userback_domain_filter',
                    'class' => 'ui-toggle'
                ]
            ],
        ];

        $this->settings->setFields( $args );
    }
}