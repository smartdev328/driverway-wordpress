<?php
/**
 * Block Name: Two Columns Content
 * Description: It is sample Two Columns Content  Block.
 * Category: common
 * Icon: screenoptions
 * Keywords: two columns content acf block
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

if( isset( $block['data']['preview_image_help'] )  ) :
    echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
endif;

$slug         = str_replace( 'acf/', '', $block['name'] );
$block_id     = $slug . '-' . $block['id'];
$align_class  = $block['align'] ? 'align' . $block['align'] : '';
$custom_class = isset( $block['className'] ) ? $block['className'] : '';
$position     = get_field( 'first_image_position' );
$columns      = get_field( 'columns' );
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $slug; ?> <?php echo $slug; ?>_<?php echo $position;  ?>">
    <?php if ( $columns ) : ?>
        <?php foreach ( $columns as $column ) : ?>
            <div class="column-item">
                <?php if ( ! empty( $column['image'] ) && is_array( $column['image']) ) : ?>
                    <div class="column-item__image">
                        <?php echo wp_get_attachment_image( $column['image']['ID'], 'large' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( $column['content'] ) : ?>
                    <div class="column-item__info">
                        <?php echo $column['content']; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>
