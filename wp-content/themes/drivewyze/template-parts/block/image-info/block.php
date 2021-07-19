<?php
/**
 * Block Name: Image Info Block
 * Description: Block with full-width Image and Text
 * Category: common
 * Icon: embed-photo
 * Keywords: intro, full-width image, partnership
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

if ( isset( $block['data']['preview_image_help'] ) ) :
	echo '<img src="' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
endif;

$slug         = str_replace( 'acf/', '', $block['name'] );
$block_id     = ! empty( $block['anchor'] ) ? $block['anchor'] : $slug . '-' . $block['id'];
$align_class  = $block['align'] ? 'align' . $block['align'] : '';
$custom_class = isset( $block['className'] ) ? $block['className'] : '';
$bl_title     = get_field( 'ii_title' );
$bl_info      = get_field( 'ii_info' );
$bl_link      = get_field( 'ii_link' );
$bl_bg_img    = get_field( 'ii_bg' );
$bl_bg        = ( ! empty( $bl_bg_img ) && is_array( $bl_bg_img ) ) ? 'style="background-image: url(' . $bl_bg_img['url'] . ')"' : '';
?>
<section id="<?php echo $block_id; ?>"
		 class="image-info-block <?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>" <?php echo $bl_bg; ?>>
<?php if ( $bl_title || $bl_info || $bl_link ) : ?>
	<div class="image-info-block__container">
		<div class="image-info-block-info subtitle">
			<div class="image-info-block-decor">
				<div class="image-info-block-decor__img"></div>
			</div>
			<div class="image-info-block__wrap">
				<?php if ( $bl_title ) : ?>
					<h5><?php echo $bl_title; ?></h5>
				<?php endif; ?>
				<?php if ( $bl_info ) : ?>
					<p><?php echo $bl_info; ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $bl_link ) && is_array( $bl_link ) ) : ?>
					<a class="image-info-link" href="<?php echo $bl_link['url']; ?>"
					   target="<?php echo $bl_link['target']; ?>">
						<?php echo $bl_link['title']; ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif; ?>
</section>
