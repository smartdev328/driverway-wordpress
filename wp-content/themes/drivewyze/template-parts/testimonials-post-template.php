<?php
/**
 * The template for displaying post item.
 *
 * @package Sr
 */

?>
<?php
$position   = get_field( 'position' );
$prefix   = get_field( 'page_prefix', 'options' );
?>

<div  class="post-block">
    <a href="<?php echo get_permalink(); ?>" class="post-image">
        <?php echo get_the_post_thumbnail(  get_the_ID(), 'full' );?>
    </a>

    <div class="post-content">
        <h3 class="post-content__excerpt"><?php echo get_the_excerpt(); ?></h3>
        <h4 class="post-content__title"><?php echo the_title(); ?></h4>

        <?php if ( $position ) : ?>
            <h4 class="post-content__position"><?php echo $position; ?></h4>
        <?php endif; ?>
    </div>

    <div class="more-block">
        <a class="read-more" href="<?php echo get_permalink(); ?>">
            <?php esc_html_e( 'Read More', 'wp_dev' ); ?>
        </a>
    </div>
</div>
