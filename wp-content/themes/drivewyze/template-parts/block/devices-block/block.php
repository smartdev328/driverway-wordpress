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

$slug          	 	= str_replace( 'acf/', '', $block['name'] );
$block_id       	= $slug . '-' . $block['id'];
$align_class    	= $block['align'] ? 'align' . $block['align'] : '';
$custom_class   	= isset( $block['className'] ) ? $block['className'] : '';
$block_title    	= get_field('block_title');
$block_desc     	= get_field('block_desc');
$icon_title     	= get_field('icon_text');
$learn_link     	= get_field('learn_more_link');
$partner        	= get_field('partner');
$loop_all_devices = get_field('loop_all_devices');
?>
<section id="<?php echo $block_id; ?>" class="device <?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">
	<div class="device__container">
		<?php if (!$loop_all_devices && $partner) : ?>
			<div class="device-item">
				<?php
					$id = $partner->ID;
					$post_icon  = get_field( 'icon', $id );
				?>
				<div class="device-item__media">
					<?php if ( has_post_thumbnail($id) ) :
						$post_thumb_url = get_the_post_thumbnail_url($id);
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
					<?php if ($block_title) : ?>
						<h2><?php echo $block_title; ?></h2>
					<?php endif; ?>

					<?php if ($block_desc) : ?>
						<p><?php echo $block_desc; ?></p>
					<?php endif; ?>

					<?php if( $learn_link ) : ?>
						<a class="read-more" href="<?php echo $learn_link['url']; ?>"
							target="<?php echo $learn_link['target'] ? '_blank' : '_self'; ?>"
							title="<?php echo $learn_link['title']; ?>"><?php echo $learn_link['title']; ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		<?php else:
			$args  = array(
				'post_type'      => 'partners',
				'orderby'        => 'menu_order',
			);
			$posts = new WP_Query( $args );
			if ( $posts->have_posts() ) : ?>
					<div class="device-item">
						<div class="device-block-swiper">
							<div class="swiper-wrapper">
								<?php
									while ( $posts->have_posts() ) :
										$posts->the_post();
										$id         = get_the_ID();
										$post_icon  = get_field( 'icon', $id );
								?>
									<div class="swiper-slide device-item__media">
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
								<?php	endwhile; ?>
							</div>
						</div>
						<div class="device-item__content">
							<?php if ($block_title) : ?>
								<h2><?php echo $block_title; ?></h2>
							<?php endif; ?>

							<?php if ($block_desc) : ?>
								<p><?php echo $block_desc; ?></p>
							<?php endif; ?>

							<?php if( $learn_link ) : ?>
								<a class="read-more" href="<?php echo $learn_link['url']; ?>"
									target="<?php echo $learn_link['target'] ? '_blank' : '_self'; ?>"
									title="<?php echo $learn_link['title']; ?>"><?php echo $learn_link['title']; ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				<?php
			endif;
			wp_reset_postdata();
		endif;
			?>
	</div>
</section>
