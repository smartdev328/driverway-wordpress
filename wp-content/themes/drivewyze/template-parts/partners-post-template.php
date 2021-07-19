<?php
/**
 * The template for displaying partners CPT item.
 *
 * @package Drivewyze
 */

$id        = get_the_ID();
$post_icon = get_field( 'icon', $id );
?>

<div class="pt-block__item post-block">
	<div class="pt-block-content post-content">
		<h3><?php echo get_the_title(); ?></h3>
		<?php if( has_excerpt()) : ?>
			<div class="subtitle"><?php the_excerpt(); ?></div>
		<?php endif; ?>
		<a class="read-more" href="<?php echo get_permalink(); ?>"><?php esc_html_e( 'Learn More', 'drivewyze' ); ?> </a>
	</div>
	<div class="pt-block-media">
		<?php if ( has_post_thumbnail() ) :
			$post_thumb_url = get_the_post_thumbnail_url();
			?>
			<div class="pt-block-media__img" style="background-image: url(<?php echo $post_thumb_url; ?>)"></div>
		<?php endif; ?>
		<?php if ( $post_icon && is_array($post_icon)) : ?>
			<?php echo wp_get_attachment_image( $post_icon['id'], 'full', false, array('class' => 'pt-block-media__icon') ); ?>
		<?php endif; ?>
	</div>
</div>
