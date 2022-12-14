<?php
/**
 * The template for displaying post item.
 *
 * @package Sr
 */

?>
<?php
$prefix   = get_field( 'page_prefix', 'options' );
$category = get_the_category()[0]->name;
?>

<div  class="post-block">
	<div class="post-content">
		<?php if ( $category) : ?>
			<div class="post-info">
				<?php if ( $category ) : ?>
					<p class="post-info__category">
                        <?php echo $category; ?>
                    </p>
				<?php endif; ?>

                <p class="post-date">
                    <?php echo get_the_date() ?>
                </p>
			</div>
		<?php endif; ?>

		<a href="<?php echo get_permalink(); ?>" target="_blank" class="post-content__title"><?php echo get_the_title(); ?></a>

        <a class="read-more-d" href="<?php echo get_permalink(); ?>" target="_blank"><?php esc_html_e( 'Read More', 'wp_dev' ); ?> </a>
	</div>
    <a href="<?php echo get_permalink(); ?>" target="_blank" class="post-image">
        <?php echo get_the_post_thumbnail(  get_the_ID(), 'full' );?>
    </a>

    <a class="read-more" href="<?php echo get_permalink(); ?>" target="_blank"><?php esc_html_e( 'Read More', 'wp_dev' ); ?> </a>
</div>
