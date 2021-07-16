<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Drivewyze
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<section id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

		if (is_singular('post')) :

			get_template_part( 'template-parts/content', 'post' );

		else :

			get_template_part( 'template-parts/content', get_post_format() );

		endif;

		endwhile;
		?>

		</section>
	</div>

<?php
get_footer();
