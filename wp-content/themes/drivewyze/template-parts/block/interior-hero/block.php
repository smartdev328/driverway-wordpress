<?php
/**
 * Block Name: Interior Hero
 * Description: Interior Hero block managed with ACF.
 * Category: common
 * Icon: welcome-widgets-menus
 * Keywords: interior hero acf block
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
$left_side	= get_field( 'left_side' );
$right_side	= get_field( 'right_side' );
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $slug; ?>">
    <?php if( ! empty( $bg ) && is_array( $bg ) ) : ?>
        <div class="<?php echo $slug; ?>__bg" style="background-image: url(<?php echo $bg['url'] ?>)"></div>
    <?php endif; ?>

    <?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs" class="breadcrumbs">','</p>' );
    } ?>

    <div class="<?php echo $slug; ?>__block <?php echo $slug; ?>__block_image">
        <?php if( $left_side ) : ?>
            <div class="<?php echo $slug; ?>__left">
                <?php if( $left_side['prefix'] ) : ?>
                    <ul class="left-prefix">
                        <li><?php echo $left_side['prefix'] ?></li>
                    </ul>
                <?php endif; ?>

                <?php if( $left_side['title'] ) : ?>
                    <h1 class="left-title"><?php echo $left_side['title'] ?></h1>
                <?php endif; ?>

                <?php if( $left_side['info'] ) : ?>
                    <p class="left-info"><?php echo $left_side['info'] ?></p>
                <?php endif; ?>

                <?php if ( ! empty( $left_side['link'] ) && is_array( $left_side['link']) ) :
                    $link_target = $left_side['link']['target'] ? $left_side['link']['target'] : '_blank'; ?>
                    <a class="left-link" href="<?php echo $left_side['link']['url']; ?>"
                       target="<?php echo esc_attr( $link_target ); ?>">
                        <span><?php echo $left_side['link']['title']; ?></span>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if( $right_side['select_type'] == 'info' ) { ?>

            <?php if( $right_side['info'] ) : ?>
                <div class="<?php echo $slug; ?>__right <?php echo $slug; ?>__right_info">
                    <?php echo $right_side['info'] ?>
                </div>
            <?php endif; ?>

        <?php } else { ?>

            <?php if( ( $right_side['text_in_image'] ) ) : ?>
                <div class="<?php echo $slug; ?>__right <?php echo $slug; ?>__right_image">
                    <?php if( $right_side['text_in_image'] ) : ?>
                        <p><?php echo $right_side['text_in_image'] ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        <?php } ?>
    </div>
</section>
