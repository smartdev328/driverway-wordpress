<?php
/**
 * Block Name: Hero Block with Lightbox Video
 * Description: Hero Block with Lightbox Video
 * Category: common
 * Icon: embed-photo
 * Keywords: hero, lightbox, home-hero
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

$slug              = str_replace( 'acf/', '', $block['name'] );
$block_id          = !empty($block['anchor']) ? $block['anchor'] : $slug . '-' . $block['id'];
$title             = get_field( 'hero_title' );
$subtitle          = get_field( 'hero_subtitle' );
$background        = get_field( 'hero_background' );
$bg_image          = get_field( 'hero_bg_img' );
$bg_video          = get_field( 'hero_bg_vid' );
$button_text       = get_field( 'button_text' );
$select_video_type = get_field( 'select_video_type' );
$video_file        = get_field( 'hero_light_file' );
$video_file_url    = is_array( $video_file ) ? $video_file['url'] : '';
$video_embed_url   = get_field( 'hero_light_url' );
$video_type        = $select_video_type == 'embed' ? $video_embed_url : $video_file_url;
$bottom_links      = get_field( 'block_links' );
$add_scroll_btn    = get_field( 'add_scroll_btn' );
$scroll_to_id      = get_field( 'scroll_to_id' );
?>
<section id="<?php echo $block_id; ?>" class="hero-lightbox">
	<?php if ( ( ! empty( $bg_image ) && is_array( $bg_image ) ) && $background === 'image' ) : ?>
		<div class="hero-lightbox-bg"
			 style="background-image: url(<?php echo wp_get_attachment_image_url( $bg_image['ID'], 'full' ); ?>)"></div>
	<?php elseif ( ( ! empty( $bg_video ) && is_array( $bg_video ) ) && ( $background === 'video' ) ) : ?>
		<div class="hero-lightbox-video-bg">
			<div class="video-container">
				<video class="" loading="lazy" aria-hidden="true" playsinline="playsinline"
					   autoplay="autoplay" muted="muted"
					   loop="loop">
					<source src="<?php echo $bg_video['url']; ?>"
							type="video/mp4">
				</video>
			</div>
		</div>
	<?php endif; ?>

	<div class="hero-lightbox__container">
		<?php if ( $subtitle ) : ?>
			<h5><?php echo $subtitle; ?></h5>
		<?php endif; ?>
		<?php if ( $title ) : ?>
			<div class="header-content">
				<?php echo $title; ?>
			</div>
		<?php endif; ?>
		<div class="hero-lightbox__btns">
			<?php if ( $bottom_links && is_array( $bottom_links ) ) : ?>
				<?php foreach ( $bottom_links as $item ) : ?>
					<?php $bottom_link = is_array( $item ) ? $item['link'] : ''; ?>
					<?php if ( ! empty( $bottom_link ) && is_array( $bottom_link ) ) : ?>
						<a class="hero-lightbox__btn" href="<?php echo $bottom_link['url']; ?>" target="<?php echo $bottom_link['target']; ?>">
							<?php echo $bottom_link['title']; ?>
						</a>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
			<?php if ( $button_text && $video_type ) : ?>
				<a href="<?php echo $video_type; ?>" data-fancybox class="hero-lightbox__play btn-play js-open-popup">
					<?php echo $button_text; ?>
					<?php get_template_part( 'template-parts/play-button' ); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>

	<?php if ( $add_scroll_btn && $scroll_to_id ) : ?>
		<div class="hero-lightbox__scroll">
			<a class="js-scroll-down" href="#<?php echo $scroll_to_id; ?>">
				<?php get_template_part( 'template-parts/scroll-down' ); ?>
			</a>
		</div>
	<?php endif; ?>
</section>
