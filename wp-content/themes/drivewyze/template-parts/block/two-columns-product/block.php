<?php
/**
 * Block Name: Product two columns content for interior product page
 * Description: Hero banner block managed with ACF.
 * Category: common
 * Icon: columns
 * Keywords: product columns content acf block
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

$slug         		= str_replace( 'acf/', '', $block['name'] );
$block_id           = !empty($block['anchor']) ? $block['anchor'] : $slug . '-' . $block['id'];
$block_class  		= $slug . '-' . 'section';
$left_content		= get_field( 'left_column_content' );
$right_content		= get_field( 'right_column_content' );
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $block_class; ?>">
	<div class="<?php echo $block_class . '-container'; ?>">

		<?php if( $left_content ) : ?>
			<div class="<?php echo $block_class . '-container__column ' . $block_class . '-container__column_left'; ?>">
				<?php echo $left_content; ?>
			</div>
		<?php endif; ?>

		<?php if( $right_content ) : ?>
			<div class="<?php echo $block_class . '-container__column ' . $block_class . '-container__column_right'; ?>">
				<?php echo $right_content; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
