<?php
/**
 * @package  UserbackPlugin
 */
namespace Inc\Base;

use Inc\Base\BaseController;

/**
 *  Auto-update controller
 */
class UpdateController extends BaseController
{
    public function register()
    {
        add_filter('plugins_api', array( $this, 'userback_plugin_info' ), 20, 3);
        add_filter('site_transient_update_plugins', array( $this, 'userback_push_update' ));
        add_action('upgrader_process_complete', array( $this, 'userback_after_update'), 10, 2 );
    }

    /*
    * $res contains information for plugins with custom update server
    * $action 'plugin_information'
    * $args stdClass Object ( [slug] => userback-plugin [is_ssl] => [fields] => Array ( [banners] => 1 [reviews] => 1 [downloaded] => [active_installs] => 1 ) [per_page] => 24 [locale] => en_US )
    */
    function userback_plugin_info( $res, $action, $args ){
        // do nothing if this is not about getting plugin information
        if( $action !== 'plugin_information' )
            return false;

        // do nothing if it is not our plugin
        if( 'userback-plugin' !== $args->slug )
            return false;

        // trying to get from cache first
        if( false == $remote = get_transient( 'upgrade_userback-plugin' ) ) {

            // info.json is the file with the actual plugin information on your server
            $remote = wp_remote_get( 'https://wp-dev.space/pu-userback/info.json', array(
                    'timeout' => 10,
                    'headers' => array(
                        'Accept' => 'application/json'
                    ) )
            );

            if ( !is_wp_error( $remote ) && isset( $remote['response']['code'] ) && $remote['response']['code'] == 200 && !empty( $remote['body'] ) ) {
                set_transient( 'upgrade_userback-plugin', $remote, 43200 ); // 43200 - 12 hours cache
            }
        }

        if( $remote ) {

            $remote = json_decode( $remote['body'] );
            $res = new \stdClass();
            $res->name = $remote->name;
            $res->slug = 'userback-plugin';
            $res->version = $remote->version;
            $res->tested = $remote->tested;
            $res->requires = $remote->requires;
            $res->author = '<a href="https://wp-dev.space">WP Developers Space</a>';
            $res->author_profile = 'https://profiles.wordpress.org/';
            $res->download_link = $remote->download_url;
            $res->trunk = $remote->download_url;
            $res->last_updated = $remote->last_updated;
            $res->sections = array(
                'description' => $remote->sections->description, // description tab
                'installation' => $remote->sections->installation, // installation tab
                'changelog' => $remote->sections->changelog
            );
            if( !empty( $remote->sections->screenshots ) ) {
                $res->sections['screenshots'] = $remote->sections->screenshots;
            }

            $res->banners = array(
                'low' => 'https://wp-dev.space/pu-userback/banner-772x250.jpg',
                'high' => 'https://wp-dev.space/pu-userback/banner-1544x500.jpg'
            );

            return $res;
        }
        return false;
    }

    function userback_push_update( $transient ){
        if ( empty($transient->checked ) ) {
            return $transient;
        }

        // trying to get from cache first
        if( false == $remote = get_transient( 'upgrade_userback-plugin' ) ) {
            // info.json is the file with the actual plugin information on your server
            $remote = wp_remote_get( 'https://wp-dev.space/pu-userback/info.json', array(
                    'timeout' => 10,
                    'headers' => array(
                        'Accept' => 'application/json'
                    ) )
            );

            if ( !is_wp_error( $remote ) && isset( $remote['response']['code'] ) && $remote['response']['code'] == 200 && !empty( $remote['body'] ) ) {
                set_transient( 'upgrade_userback-plugin', $remote, 43200 ); // 43200 - 12 hours cache
            }

        }

        if( $remote ) {
            $remote = json_decode( $remote['body'] );

            if( $remote && version_compare( '1.0.0', $remote->version, '<' )
                && version_compare($remote->requires, get_bloginfo('version'), '<' ) ) {
                $res = new \stdClass();
                $res->slug = 'userback-plugin';
                $res->plugin = 'userback-plugin/userback-plugin.php';
                $res->new_version = $remote->version;
                $res->tested = $remote->tested;
                $res->package = $remote->download_url;
                $res->download_link = $remote->download_url;
                $transient->response[$res->plugin] = $res;
            }

        }
        return $transient;
    }

    function userback_after_update( $upgrader_object, $options ) {
        if ( $options['action'] == 'update' && $options['type'] === 'plugin' )  {
            delete_transient( 'upgrade_userback-plugin' );
        }
    }
}