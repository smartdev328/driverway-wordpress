<?php
/**
 * Block Name: Iframe
 * Description: Block for embed Iframe
 * Category: common
 * Icon: admin-site
 * Keywords: map, iframe
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

$slug         = str_replace( 'acf/', '', $block['name'] );
$block_id     = $slug . '-' . $block['id'];
$align_class  = $block['align'] ? 'align' . $block['align'] : '';
$custom_class = isset( $block['className'] ) ? $block['className'] : '';
$iframe       = get_field('iframe-embed');
?>
<?php if ( $iframe ) : ?>
<section id="<?php echo $block_id; ?>" class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>"
         data-aos="fade-up" data-aos-duration="500">
	<?php echo $iframe; ?>
</section>
<?php endif; ?>
