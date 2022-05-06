<?php
/**
 * Block Name: Partners
 * Description: Partners CPT list
 * Category: common
 * Icon: buddicons-buddypress-logo
 * Keywords: partners, cpt
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

if( isset( $block['data']['preview_image_help'] )  ) :
    echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
endif;

$slug           = str_replace( 'acf/', '', $block['name'] );
$block_id       = $slug . '-' . $block['id'];
$align_class    = $block['align'] ? 'align' . $block['align'] : '';
$custom_class   = isset( $block['className'] ) ? $block['className'] : '';
$block_title    = get_field( 'title') ?? get_the_title();
$block_subtitle = get_field( 'subtitle');
$posts_per_page = get_field( 'posts_per_page');
$sort_by        = get_field( 'sort_by');
?>
<section id="<?php echo $block_id; ?>" class="pt-block <?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">
	<div class="pt-block-header post-header">
		<div class="post-header__container">
			<div class="post-header__top">
				<?php
				if ( function_exists('yoast_breadcrumb') ) :
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				endif; ?>
				<?php if ( $block_subtitle ) : ?>
					<h5><?php echo $block_subtitle; ?></h5>
				<?php endif; ?>
				<?php if ( $block_title ) : ?>
					<h1><?php echo $block_title; ?></h1>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="pt-block__container">
		<div class="pt-block__list load-posts-block">
			<?php
			$args  = array(
				'post_type'      => 'partners',
				'posts_per_page' => $posts_per_page,
				'order'          => 'ASC',
				'orderby'        => $sort_by ? $sort_by : 'menu_order',
			);
			$posts = new WP_Query( $args );
			if ( $posts->have_posts() ) : ?>
				<?php
				while ( $posts->have_posts() ) :
					$posts->the_post();
					get_template_part( 'template-parts/partners-post-template', '' );
				endwhile;
			endif;
			wp_reset_postdata();
			?>
		</div>
		<?php $published_posts = wp_count_posts( 'post' )->publish; ?>

		<?php if ( $published_posts > $posts_per_page ) : ?>
			<div class="load-more">
				<button id="load-post" title="" data-count="<?php echo $posts_per_page; ?>"
						data-post="<?php echo $published_posts; ?>"
						data-type="<?php echo $args['post_type']; ?>"
						data-orderby="<?php echo $args['orderby']; ?>"
						data-order="<?php echo $args['order']; ?>"
						href="#"
				><?php esc_html_e( 'Load More', 'wp_dev' ); ?></button>
			</div>
		<?php endif; ?>
		<div class="ajax-preloader">
		</div>
	</div>
</section>
