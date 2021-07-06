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

<a href="<?php echo get_permalink(); ?>" class="post-block">
	<div class="post-image" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID() ); ?>)">
		<div class="post-image__popup">+</div>
	</div>

	<div class="post-content">
		<?php if ( $category) : ?>
			<div class="post-info">
				<?php if ( $category ) : ?>
					<p class="post-info__category">
                        <?php echo $prefix ?: '' ?>
                        <?php echo $category; ?>
                    </p>
				<?php endif; ?>

                <p class="post-date">
                    <?php echo get_the_date() ?>
                </p>
			</div>
		<?php endif; ?>

		<h3 class="post-content__title"><?php echo get_the_title(); ?></h3>

		<?php if ( has_excerpt( get_the_ID() ) ) { ?>
			<p class="post-content__excerpt"><?php echo get_the_excerpt(); ?></p> 
														<?php
		}
		?>
	</div>
</a>
