<?php 
/**
 * @package  UserbackPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}

    /**
     * Common callback for the checkbox field
     * @param $args
     */
    public function checkboxField($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $default = $args['default'];
        $checked = get_option($option_name, $default);

        echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ( $checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
    }

    public function textField($args) {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $default = esc_attr($args['default']);
        $text = esc_attr(get_option($option_name, $default));

        echo '<input type="text" class="' . $classes . '" name="' . $name . '" value="' . $text . '" placeholder="' . $option_name . '">';
    }

    public function userbackApiKey()
    {
        $value = esc_attr(get_option('userback_api_key'));
        $translation = __('UserBack API key', 'userback-plugin');
        echo '<input type="text" class="regular-text" name="userback_api_key" value="' . $value . '" placeholder="' . $translation . '">';
    }

    public function userbackProject()
    {
        $value = esc_attr(get_option('userback_project', -1));
        $translation = __('UserBack Project ID', 'userback-plugin');
        echo '<input type="text" class="regular-text" name="userback_project" value="' . $value . '" placeholder="' . $translation . '">';
    }

    public function userbackAssignee()
    {
        $value = esc_attr(get_option('userback_assignee'));
        $translation = __('Issue assignee username', 'userback-plugin');
        echo '<input type="text" class="regular-text" name="userback_assignee" value="' . $value . '" placeholder="' . $translation . '">';
    }

    public function userbackTimeout()
    {
        $value = esc_attr(get_option('userback_timeout', 1500));
        $translation = __('UserBack Timeout', 'userback-plugin');
        echo '<input type="text" class="regular-text" name="userback_timeout" value="' . $value . '" placeholder="' . $translation . '">';
    }

    public function userbackLocalhost()
    {
        $value = esc_attr(get_option('userback_localhost', 'yes'));
    ?>
        <select name="userback_localhost" class="userback_localhost">
            <option value="no" <?= ($value == "no") ? 'selected="selected"' : '' ?> > <?php _e('No', 'userback-plugin') ?></option>
            <option value="yes" <?= ($value == "yes") ? 'selected="selected"' : '' ?>> <?php _e('Yes', 'userback-plugin') ?></option>
        </select>
    <?php
    }
}