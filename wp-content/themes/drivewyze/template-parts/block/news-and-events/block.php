<?php
/**
 * Block Name: News And Events
 * Description: It is sample News And Events Block.
 * Category: common
 * Icon: exerpt-view
 * Keywords: news events acf block
 * Preview: 'preview.png'
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
$title          = get_field( 'title' );
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $slug; ?> <?php echo $slug; ?>_<?php echo $select_type; ?>">
    <?php if ( $title ) : ?>
        <h2 class="<?php echo $slug; ?>__title"><?php echo $title ?></h2>
    <?php endif; ?>
</section>
