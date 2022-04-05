<?php
/**
 * Theme functions and definitions.
 *
 * @package Drivewyze
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/**
 * Text domain definition
 */
defined( 'THEME_TD' ) ? THEME_TD : define( 'THEME_TD', 'drivewyze' );


// Load modules
$theme_includes = [
	'/lib/helpers.php',
	'/lib/posts-ajax.php',                     // Ajax posts load
	'/lib/cleanup.php',                        // Clean up default theme includes
	'/lib/enqueue-scripts.php',                // Enqueue styles and scripts
	'/lib/protocol-relative-theme-assets.php', // Protocol (http/https) relative assets path
	'/lib/framework.php',                      // Css framework related stuff (content width, nav walker class, comments, pagination, etc.)
	'/lib/theme-support.php',                  // Theme support options
	'/lib/template-tags.php',                  // Custom template tags
	'/lib/menu-areas.php',                     // Menu areas
	'/lib/widget-areas.php',                   // Widget areas
	'/lib/customizer.php',                     // Theme customizer
	'/lib/vc_shortcodes.php',                  // Visual Composer shortcodes
	'/lib/jetpack.php',                        // Jetpack compatibility file
	'/lib/acf_field_groups_type.php',          // ACF Field Groups Organizer
	'/lib/acf_blocks_loader.php',              // ACF Blocks Loader
	'/lib/wp_dashboard_customizer.php',        // WP Dashboard customizer
	'/lib/gravityforms-filter.php',        	   // GF plugin filter for simple select forms
	'/lib/shortcodes.php',        	           // Shortcodes
];

foreach ( $theme_includes as $file ) {
	if ( ! locate_template( $file ) ) {
		/* translators: %s error*/
		trigger_error( esc_html( sprintf( esc_html( __('Error locating %s for inclusion', 'drivewyze') ), $file ) ), E_USER_ERROR ); // phpcs:ignore
		continue;
	}
	require_once locate_template( $file );
}
unset( $file, $filepath );


/**
 * wp_has_sidebar Add body class for active sidebar
 *
 * @param array $classes - classes
 * @return array
 */
function wp_has_sidebar( $classes ) {
	if ( is_active_sidebar( 'sidebar' ) ) {
		// add 'class-name' to the $classes array
		$classes[] = 'has_sidebar';
	}
	return $classes;
}

add_filter( 'body_class', 'wp_has_sidebar' );

// Remove the version number of WP
// Warning - this info is also available in the readme.html file in your root directory - delete this file!
remove_action( 'wp_head', 'wp_generator' );


/**
 * Obscure login screen error messages
 *
 * @return string
 */
function wp_login_obscure() {
	return sprintf(
		'<strong>%1$s</strong>: %2$s',
		__( 'Error' ),
		__( 'wrong username or password' )
	);
}

add_filter( 'login_errors', 'wp_login_obscure' );

/**
 * Require Authentication for All WP REST API Requests
 *
 * @param WP_Error|null|true $result WP_Error if authentication error, null if authentication method wasn't used, true if authentication succeeded.
 * @return WP_Error
 */
function rest_authentication_require( $result ) {
	if ( true === $result || is_wp_error( $result ) ) {
		return $result;
	}

	if ( ! is_user_logged_in() ) {
		return new WP_Error(
			'rest_not_logged_in',
			__( 'You are not currently logged in.' ),
			array( 'status' => 401 )
		);
	}

	return $result;
}

add_filter( 'rest_authentication_errors', 'rest_authentication_require' );


// Disable the theme / plugin text editor in Admin
define( 'DISALLOW_FILE_EDIT', true );

/**
 * Add Options page
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page();
}

/**
 * Customize search form.
 */
function om_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="search-form" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __( 'Search…', 'drivewyze' ) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search…', 'drivewyze' ) . '" />
    <input type="submit" class="search-submit" id="searchsubmit" value="' . esc_attr__( 'Search' ) . '" />
    </form>';

	return $form;
}
add_filter( 'get_search_form', 'om_search_form' );

add_image_size( 'team-image', 443, 443, true );
add_image_size( 'two-columns', 915, 450, true );
add_image_size( 'partner', 294, 244, true );

add_filter( 'big_image_size_threshold', '__return_false' );

function filter_wpseo_breadcrumb_separator($this_options_breadcrumbs_sep) {
	return '<i class="fa fas fa-chevron-right"></i>';
};

// add the filter
add_filter('wpseo_breadcrumb_separator', 'filter_wpseo_breadcrumb_separator', 10, 1);

// gform submit button
add_filter( 'gform_submit_button', 'om_form_submit_button', 10, 2 );
function om_form_submit_button( $button, $form ) {
	$button_text = !empty($form['buttonText']) ? $form['buttonText'] : 'submit';
	return "<button class='button gform_button' id='gform_submit_button_{$form['id']}'>{$button_text}</button>";
}


//Add the meta box callback function
function admin_init(){
	add_meta_box("partners_parent_id", "Partners Parent ID", "set_partners_parent_id", "partners", "normal", "low");
}
add_action("admin_init", "admin_init");

//Meta box for setting the parent ID
function set_partners_parent_id() {
	global $post;
	$custom = get_post_custom($post->ID);
	$parent_id = !empty($custom['parent_id'][0]) ? $custom['parent_id'][0] : '';
	?>
	<p>Please specify the ID of the page or post to be a parent to this Partner.</p>
	<p>Leave blank for no heirarchy.  Partners will appear from the server root with no assocaited parent page or post.</p>
	<input type="text" id="parent_id" name="parent_id" value="<?php echo $post->post_parent; ?>" />
	<?php
	echo '<input type="hidden" name="parent_id_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

// Save the meta data
function save_partners_parent_id($post_id) {
	global $post;

// make sure data came from our meta box
	if (isset($_POST['parent_id_noncename'])) {
        if (!wp_verify_nonce($_POST['parent_id_noncename'],__FILE__)) return $post_id;
        if(isset($_POST['parent_id']) && ($_POST['post_type'] == "partners")) {
            $data = $_POST['parent_id'];
            update_post_meta($post_id, 'parent_id', $data);
        }
    }
}
add_action("save_post", "save_partners_parent_id");

add_action( 'send_headers', 'send_frame_options_header', 10, 0 );


add_filter( 'wpseo_sitemap_index', 'add_sitemap_custom_items' );

function add_sitemap_custom_items( $sitemap_custom_items ) {
   $sitemap_custom_items .= '
	 <sitemap>
	 <loc>https://drivewyze.wpengine.com/sitemap-eyelash-extensions.xml</loc>
	 <lastmod>2017-05-22T23:12:27+00:00</lastmod>
	 </sitemap>
';

return $sitemap_custom_items;
}