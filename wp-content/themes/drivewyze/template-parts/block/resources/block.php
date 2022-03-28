<?php
/**
 * Block Name: Resources
 * Description: It is sample Resources Block.
 * Category: common
 * Icon: editor-unlink
 * Keywords: resources acf block
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
if ( !empty($block['anchor']) ) {
    $block_id = $slug . '-' . $block['anchor'];
} else {
    $block_id = $slug . '-' . $block['id'];

}
$align_class    = $block['align'] ? 'align' . $block['align'] : '';
$custom_class   = isset( $block['className'] ) ? $block['className'] : '';
$title          = get_field( 'title' );
$select_type    = get_field( 'select_type' );
$files_repeater = get_field( 'resources_files_repeater' );
$links_repeater = get_field( 'resources_links_repeater' );
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $slug; ?> <?php echo $slug; ?>_<?php echo $select_type; ?>">
    <?php if ( $title ) : ?>
        <h2 class="<?php echo $slug; ?>__title" data-aos="fade-up" data-aos-duration="500"><?php echo $title ?></h2>
    <?php endif; ?>

    <div class="<?php echo $slug; ?>-container" data-aos="fade-up" data-aos-duration="500">
        <?php if ( $select_type === 'file' ) { ?>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php if ( $files_repeater ) : ?>
                        <?php foreach ( $files_repeater as $files_item ) : ?>
                            <div class="swiper-slide">
                                <?php if ( $files_item['title'] ) : ?>
                                    <p class="file-title"><?php echo $files_item['title'] ?></p>
                                <?php endif; ?>

                                <?php if ( $files_item['subtitle'] ) : ?>
                                    <p class="file-subtitle"><?php echo $files_item['subtitle'] ?></p>
                                <?php endif; ?>

                                <?php if ( $files_item['text'] ) : ?>
                                    <p class="file-text"><?php echo $files_item['text'] ?></p>
                                <?php endif; ?>
                                <?php if ( $files_item['file'] ) : ?>
                                    <a href="<?php echo $files_item['file']['url']; ?>" class="download-file">
                                        <span class="download-file__size">
                                            <?php echo size_format(filesize( get_attached_file( $files_item['file']['id'] )), 1)?>
                                        </span>
                                        <span class="download-file__type">
                                            <?php echo $files_item['file']['subtype']?>
                                        </span>
                                        <span class="download-file__text">
                                            <?php esc_html_e( 'DOWNLOAD', 'wp_dev' ); ?>
                                        </span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="swiper-button-prev">
                <div class="arrow"></div>
            </div>
            <div class="swiper-button-next">
                <div class="arrow"></div>
            </div>
        <?php } else { ?>
            <?php if ( $links_repeater ) : ?>
                <div class="swiper-container swiper-container_links">
                    <div class="swiper-wrapper">
                    <?php foreach ( $links_repeater as $links_item ) : ?>
                        <div class="swiper-slide">
                            <?php if ( $links_item['title'] ) : ?>
                                <p class="file-subtitle"><?php echo $links_item['title'] ?></p>
                            <?php endif; ?>

                            <?php if ( $links_item['text'] ) : ?>
                                <p class="file-text"><?php echo $links_item['text'] ?></p>
                            <?php endif; ?>

                            <?php if ( ! empty( $links_item['link'] ) && is_array( $links_item['link']) ) :
                                $link_target = $links_item['link']['target'] ? $links_item['link']['target'] : '_blank'; ?>
                                <div class="link-block">
                                    <a class="download-file" href="<?php echo $links_item['link']['url']; ?>"
                                       target="<?php echo esc_attr( $link_target ); ?>">
                                        <span><?php echo $links_item['link']['title']; ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div class="swiper-button-prev">
                    <div class="arrow"></div>
                </div>
                <div class="swiper-button-next">
                    <div class="arrow"></div>
                </div>
            <?php endif; ?>
        <?php } ?>
    </div>
</section>
