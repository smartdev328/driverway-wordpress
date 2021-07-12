<?php
/**
 * The template for displaying filters block.
 *
 * @package Sr
 */

add_action( 'wp_ajax_filters_ajax', 'filters_ajax' );
add_action( 'wp_ajax_nopriv_filters_ajax', 'filters_ajax' );

/**
 * Ajax filters load
 */
function filters_ajax() {
	$paged          = ( isset( $_POST['paged'] ) ) ? $_POST['paged'] : 0;
	$posts_per_page = ( isset( $_POST['posts_per_page'] ) ) ? $_POST['posts_per_page'] : 0;
	$type           = $_POST['type'];
	$category       = $_POST['category'];

	$args = array(
		'post_type'      => $type,
		'post_status'    => 'publish',
		'posts_per_page' => $posts_per_page,
		'paged'          => $paged,
		'category_name'  => $category,
	);

	$posts = new WP_Query( $args );

	if ( $posts->have_posts() ) :
		while ( $posts->have_posts() ) :
			$posts->the_post();

            get_template_part( 'template-parts/blog-post-template' );

		endwhile;
	endif; ?>
	<?php
	wp_reset_postdata();
	wp_die();
}
