<?php
/**
 * Block Name: Avaible On for interior product page
 * Description: Hero banner block managed with ACF.
 * Category: common
 * Icon: images-alt
 * Keywords: product columns content acf block
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

if( isset( $block['data']['preview_image_help'] )  ) :
    echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
endif;

$slug         		= str_replace( 'acf/', '', $block['name'] );
$block_id          = !empty($block['anchor']) ? $block['anchor'] : $slug . '-' . $block['id'];
$block_class  		= $slug . '-' . 'section';
$section_title		= get_field( 'section_title' );
$logotypes			= get_field( 'logotypes' );
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $block_class; ?>">

	<?php if( $section_title ) : ?>
		<h2 class="<?php echo $block_class . '__title'; ?>" data-aos="fade-up" data-aos-duration="500">
            <?php echo $section_title; ?>
        </h2>
	<?php endif; ?>

	<?php if( $logotypes ) : ?>
		<div class="<?php echo $block_class . '-container'; ?>" data-aos="fade-up" data-aos-duration="500">

			<?php foreach ( $logotypes as $logo ) :
				$link = $logo['link'];
				$logo = $logo['image'];

				if( $link ) : ?>
					<a class="<?php echo $block_class . '-logo-link'; ?>"
					   href="<?php echo $link['url']; ?>"
					   title="<?php echo $link['title']; ?>"
					   target="<?php echo $link['target'] ? '_blank' : '_self'; ?>">
						<img class="<?php echo $block_class . '-logo'; ?>"
							 src="<?php echo $logo['url']; ?>"
							 alt="<?php echo $logo['alt']; ?>" />
					</a>
				<?php else : ?>
					<img class="<?php echo $block_class . '-logo'; ?>"
						 src="<?php echo $logo['url']; ?>"
						 alt="<?php echo $logo['alt']; ?>" />
				<?php endif; ?>

			<?php endforeach; ?>

		</div>
	<?php endif; ?>

</section>
