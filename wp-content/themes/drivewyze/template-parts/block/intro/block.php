<?php
/**
 * Block Name: Intro
 * Description: Block with full-width Image and Text
 * Category: common
 * Icon: embed-photo
 * Keywords: intro, full-width image, leaders, truck
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

$slug         = str_replace( 'acf/', '', $block['name'] );
$block_id     = !empty($block['anchor']) ? $block['anchor'] : $slug . '-' . $block['id'];
$align_class  = $block['align'] ? 'align' . $block['align'] : '';
$custom_class = isset( $block['className'] ) ? $block['className'] : '';
$left_col     = get_field( 'left_col' );
$lc_title     = is_array( $left_col ) ? $left_col['title'] : '';
$lc_info      = is_array( $left_col ) ? $left_col['info'] : '';
$lc_bg_img    = is_array( $left_col ) ? $left_col['bg_img'] : '';
$lc_bg        = ( ! empty( $lc_bg_img ) && is_array( $lc_bg_img ) ) ? 'style="background-image: url(' . $lc_bg_img['url'] . ')"' : '';
$lc_decor     = is_array( $left_col ) ? $left_col['decor_img'] : '';
$lc_decor_bg  = ( ! empty( $lc_decor ) && is_array( $lc_decor ) ) ? 'style="background-image: url(' . $lc_decor['url'] . ')"' : '';
$right_col    = get_field( 'right_col' );
$rc_title     = is_array( $right_col ) ? $right_col['title'] : '';
$rc_subtitle  = is_array( $right_col ) ? $right_col['subtitle'] : '';
$rc_desc      = is_array( $right_col ) ? $right_col['description'] : '';
$rc_link      = is_array( $right_col ) ? $right_col['link'] : '';
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">
	<div class="intro-wrap">
		<?php if ( $lc_title || $lc_info ) : ?>
			<div class="intro-left" <?php echo $lc_bg; ?>>
				<div class="intro-left__container">
					<div class="intro-left-info subtitle">
						<div class="intro-left-decor">
							<div class="intro-left-decor__img" <?php echo $lc_decor_bg; ?>></div>
						</div>
						<div class="intro-left-info__wrap">
							<?php if ( $lc_title ) : ?>
								<h5><?php echo $lc_title; ?></h5>
							<?php endif; ?>
							<?php if ( $lc_info ) : ?>
								<p><?php echo $lc_info; ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( $rc_title || $rc_subtitle || $rc_desc ) : ?>
			<div class="intro-right">
				<?php if ( $rc_subtitle ) : ?>
					<h5><?php echo $rc_subtitle; ?></h5>
				<?php endif; ?>
				<?php if ( $rc_title ) : ?>
					<h2><?php echo $rc_title; ?></h2>
				<?php endif; ?>
				<?php if ( $rc_desc ) : ?>
					<p><?php echo $rc_desc; ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $rc_link ) && is_array( $rc_link ) ) : ?>
					<a class="intro-link" href="<?php echo $rc_link['url']; ?>" target="<?php echo $rc_link['target']; ?>">
						<?php echo $rc_link['title']; ?>
					</a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
