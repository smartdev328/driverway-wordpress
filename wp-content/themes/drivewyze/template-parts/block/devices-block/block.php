<?php
/**
 * Block Name: Devices
 * Description: Devices Block
 * Category: common
 * Icon: nametag
 * Keywords: devices, random
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
$block_title    = get_field('block_title');
$block_desc     = get_field('block_desc');
$icon_title     = get_field('icon_text');
?>
<section id="<?php echo $block_id; ?>" class="device <?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">
	<div class="device__container">
		<?php
			$args  = array(
				'post_type'      => 'partners',
				'posts_per_page' => 1,
				'orderby'        => 'rand',
			);
			$posts = new WP_Query( $args );
			if ( $posts->have_posts() ) : ?>
				<?php
				while ( $posts->have_posts() ) :
					$posts->the_post();
					$id         = get_the_ID();
					$post_icon  = get_field( 'icon', $id );
					$post_title = get_field( 'secondary_title', $id );
					$post_desc  = get_field( 'description', $id );
					$title 		= $post_title ?? $block_title;
					$desc       = $post_desc ?? $block_desc;
				?>
					<div class="device-item">
						<div class="device-item__media">
							<?php if ( has_post_thumbnail() ) :
								$post_thumb_url = get_the_post_thumbnail_url();
								?>
								<div class="device-item__img" style="background-image: url(<?php echo $post_thumb_url; ?>)"></div>
							<?php endif; ?>
							<?php if ( $post_icon && is_array($post_icon)) : ?>
								<div class="device-item__icon">
									<?php if ($icon_title) : ?>
										<span><?php echo $icon_title; ?></span>
									<?php endif; ?>
									<?php echo wp_get_attachment_image( $post_icon['id'], 'full'); ?>
								</div>
							<?php endif; ?>
						</div>
						<div class="device-item__content">
							<?php if ($title) : ?>
								<h2><?php echo $title; ?></h2>
							<?php endif; ?>

							<?php if ($desc) : ?>
								<p><?php echo $desc; ?></p>
							<?php endif; ?>
							<a class="read-more" href="<?php echo get_permalink(); ?>"><?php esc_html_e( 'Learn More', 'drivewyze' ); ?> </a>
						</div>
					</div>
				<?php endwhile;
			endif;
			wp_reset_postdata();
			?>
	</div>
</section>
