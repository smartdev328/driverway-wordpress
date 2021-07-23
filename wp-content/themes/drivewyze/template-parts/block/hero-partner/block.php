<?php
/**
 * Block Name: Partner Single Hero
 * Description: Hero Block for Partner Single Page
 * Category: common
 * Icon: nametag
 * Keywords: hero, lightbox, home-hero
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

if( isset( $block['data']['preview_image_help'] )  ) :
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
endif;

$slug              = str_replace( 'acf/', '', $block['name'] );
$hero_class        = is_front_page() ? 'front' : 'interior';
$block_id          = !empty($block['anchor']) ? $block['anchor'] : $slug . '-' . $block['id'];
$page_id           = get_the_ID();
$title             = get_field( 'hero_title' );
$subtitle          = get_field( 'hero_subtitle' );
$bg_image          = get_field( 'hero_bg_img' );
$button_text       = get_field( 'button_text' );
$select_video_type = get_field( 'select_video_type' );
$video_file        = get_field( 'hero_light_file' );
$video_file_url    = is_array( $video_file ) ? $video_file['url'] : '';
$video_embed_url   = get_field( 'hero_light_url' );
$video_type        = $select_video_type == 'embed' ? $video_embed_url : $video_file_url;
$post_thumb        = get_the_post_thumbnail($page_id);
$post_icon_mobile  = get_field('icon', $page_id);
$post_icon_desk    = get_field('icon_desk', $page_id);
$post_icon_class   = ( !empty($post_icon_desk) && is_array($post_icon_desk)) ? 'mobile' : '';
?>
<section id="<?php echo $block_id; ?>" class="hero-lightbox hero-partner" data-aos="fade-up" data-aos-duration="500">
	<?php
	if ( function_exists('yoast_breadcrumb') && !is_front_page() ) :
		yoast_breadcrumb( '<div class="page-breadcrumbs"><p id="breadcrumbs" class="light">','</p></div>' );
	endif; ?>
	<?php if ( ! empty( $bg_image ) && is_array( $bg_image ) ) : ?>
		<div class="hero-lightbox-bg"
			 style="background-image: url(<?php echo wp_get_attachment_image_url( $bg_image['ID'], 'full' ); ?>)"></div>
	<?php endif; ?>

	<div class="hero-lightbox__container <?php echo $hero_class; ?>">
		<div class="hero-lightbox__content header-content">
			<?php if ( $subtitle ) : ?>
				<h5><?php echo $subtitle; ?></h5>
			<?php endif; ?>
			<?php if ( $title ) : ?>
				<h1><?php echo $title; ?></h1>
			<?php endif; ?>
			<div class="hero-lightbox__btns">
				<?php if ( $button_text && $video_type ) : ?>
					<a href="<?php echo $video_type; ?>" data-fancybox class="hero-lightbox__play btn-play js-open-popup">
						<?php echo $button_text; ?>
						<?php get_template_part( 'template-parts/play-button' ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
		<div class="hero-lightbox__media">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="hero-lightbox__img">
					<?php echo $post_thumb; ?>
				</div>
			<?php endif; ?>
			<?php if ( $post_icon_mobile && is_array($post_icon_mobile) ) : ?>
				<div class="hero-lightbox__icon">
					<?php echo wp_get_attachment_image( $post_icon_mobile['id'], 'full', "", ["class" => $post_icon_class]); ?>
					<?php if ($post_icon_desk && is_array($post_icon_desk)) : ?>
						<?php echo wp_get_attachment_image( $post_icon_desk['id'], 'full', "", ["class" => "desktop"]); ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
