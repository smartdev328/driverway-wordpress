<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Drivewyze
 */

$prefix   = get_field( 'page_prefix', 'options' );
$category = get_the_category()[0]->name;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-header">
		<div class="post-header__container">
			<div class="post-header__top">
				<?php
				if ( function_exists('yoast_breadcrumb') ) :
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				endif; ?>

				<?php if ( $category ) : ?>
					<p class="post-category">
						<?php echo $prefix ? ''. $prefix .' /' : '' ?>
						<?php echo $category; ?>
					</p>
				<?php endif; ?>

				<?php the_title( '<h1>', '</h1>' ); ?>
			</div>

			<div class="post-header__bottom">
				<p class="post-date">
					<?php echo get_the_date() ?>
				</p>
				<?php get_template_part('template-parts/share-buttons'); ?>
			</div>
		</div>
	</div>

	<div class="post-main">
		<?php the_content(); ?>
	</div>
</article>
