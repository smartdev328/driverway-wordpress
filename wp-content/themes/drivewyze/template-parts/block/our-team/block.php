<?php
/**
 * Block Name: Our Team
 * Description: It is sample Our Team Block.
 * Category: common
 * Icon: format-gallery
 * Keywords: our team acf block
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
$block_id     = !empty($block['anchor']) ? $block['anchor'] : $slug . '-' . $block['id'];
$align_class  = $block['align'] ? 'align' . $block['align'] : '';
$custom_class = isset( $block['className'] ) ? $block['className'] : '';
$title        = get_field( 'title' );
$team         = get_field( 'team' );
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $slug; ?>">
    <?php if ( $title ) : ?>
        <h2 class="our-team__title" data-aos="fade-up" data-aos-duration="500"><?php echo $title; ?></h2>
    <?php endif; ?>

    <?php if ( $team ) : ?>
        <div class="our-team__team">
            <?php foreach ( $team as $person ) : ?>
                <div class="team-item" data-aos="fade-up" data-aos-duration="500">
                    <?php if ( ! empty( $person['image'] ) && is_array( $person['image']) ) : ?>
                        <div class="team-item__image">
                            <?php echo wp_get_attachment_image( $person['image']['ID'], 'large' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $person['name'] || $person['position'] ) : ?>
                        <div class="team-item__info">
                            <?php if ( $person['name'] ) : ?>
                                <p class="team-item__name"><?php echo $person['name']; ?></p>
                            <?php endif; ?>

                            <?php if ( $person['position'] ) : ?>
                                <p class="team-item__position"><?php echo $person['position']; ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
