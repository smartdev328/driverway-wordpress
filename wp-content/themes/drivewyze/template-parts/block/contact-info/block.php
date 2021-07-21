<?php
/**
 * Block Name: Contact Info Blocks
 * Description: Contact Info Blocks managed with ACF.
 * Category: common
 * Icon: screenoptions
 * Keywords: contact info blocks acf block
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

if( isset( $block['data']['preview_image_help'] )  ) :
    echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
endif;

$slug       = str_replace( 'acf/', '', $block['name'] );
$block_id   = !empty($block['anchor']) ? $block['anchor'] : $slug . '-' . $block['id'];
$bg			= get_field( 'background_image' );
$left_side	= get_field( 'left_block_content' );
$right_side	= get_field( 'right_block_content' );
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $slug; ?>">
    <?php if( $left_side ) : ?>
        <div class="<?php echo $slug; ?>__block">
            <?php echo $left_side ?>
        </div>
    <?php endif; ?>

    <?php if( $right_side ) : ?>
        <div class="<?php echo $slug; ?>__block">
            <?php echo $right_side ?>
        </div>
    <?php endif; ?>
</section>
