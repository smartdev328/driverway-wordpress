<?php
/**
 * Template part for displaying testimonials single.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Drivewyze
 */
$block_subtitle = get_field( 'testimonials_title', 'options' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('pt-block pt-block--light'); ?>>
	<div class="pt-block-header pt-block-header--light post-header">
		<div class="post-header__container">
			<div class="post-header__top">
				<?php
				if ( function_exists('yoast_breadcrumb') ) :
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				endif; ?>
				<?php if ( $block_subtitle ) : ?>
					<h5><?php echo $block_subtitle; ?></h5>
				<?php endif; ?>
				<?php the_title( '<h1>', '</h1>' ); ?>
			</div>
		</div>
	</div>

	<div class="post-main">
		<?php the_content(); ?>
	</div>
</article>
