<?php
/**
 * Block Name: News And Events
 * Description: It is sample News And Events Block.
 * Category: common
 * Icon: exerpt-view
 * Keywords: news events acf block
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
$subtitle       = get_field( 'subtitle' );
$posts_count    = get_field( 'posts_count' );
$link           = get_field( 'link' );
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $slug; ?>">
    <?php if ( $title ) : ?>
        <h3 class="<?php echo $slug; ?>__title" data-aos="fade-up" data-aos-duration="500"><?php echo $title ?></h3>
    <?php endif; ?>

    <?php if ( $subtitle ) : ?>
        <p class="<?php echo $slug; ?>__subtitle" data-aos="fade-up" data-aos-duration="500"><?php echo $subtitle ?></p>
    <?php endif; ?>

    <?php if ( ! empty( $link ) && is_array( $link) ) :
        $link_target = $link['target'] ? $link['target'] : '_blank'; ?>
        <a class="<?php echo $slug; ?>__link" href="<?php echo $link['url']; ?>" data-aos="fade-up" data-aos-duration="500"
           target="<?php echo esc_attr( $link_target ); ?>">
            <span><?php echo $link['title']; ?></span>
        </a>
    <?php endif; ?>

    <div class="blog-posts__container" data-aos="fade-up" data-aos-duration="500">
        <div class="blog-posts__block load-posts-block">
            <?php
            $args  = array(
                'post_type'      => 'post',
                'posts_per_page' => $posts_count,
            );
            $posts = new WP_Query( $args );
            if ( $posts->have_posts() ) : ?>
                <?php
                while ( $posts->have_posts() ) :
                    $posts->the_post();
                    get_template_part( 'template-parts/blog-post-template', '' );
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
