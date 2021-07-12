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
                        <?php echo $prefix ? ''. $prefix .' /' : '' ?>
                        <?php echo $category; ?>
                    </p>
				<?php endif; ?>

                <p class="post-date">
                    <?php echo get_the_date() ?>
                </p>
			</div>
		<?php endif; ?>

		<h3 class="post-content__title"><?php echo get_the_title(); ?></h3>
	</div>
    <div class="post-image">
        <?php echo get_the_post_thumbnail(  get_the_ID(), 'full' );?>
    </div>

    <a class="read-more" href="<?php echo get_permalink(); ?>"> Read More</a>
</div>
