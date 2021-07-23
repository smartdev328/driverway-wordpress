<?php
/**
 * Block Name: Accordion
 * Description: Accordion.
 * Category: common
 * Icon: admin-page
 * Keywords: faq, accordion
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

if( isset( $block['data']['preview_image_help'] )  ) :
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
endif;


$id_block = 'faq-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {$id_block = $block['anchor'];
}

$title_block  = get_field( 'title' );
$faq_repeater = get_field( 'questions_repeater' );
?>
<section id="<?php echo esc_attr( $id_block ); ?>" class="faq-section">
	<div class="faq-section__block">
		<?php if ( $title_block ) : ?>
			<h2><?php echo $title_block; ?></h2>
		<?php endif; ?>

		<?php if ( $faq_repeater ):
			$counter = 1;
			foreach ( $faq_repeater as $item ): ?>
				<div class="faq-item">
					<?php if ( !empty($item['question']) ) : ?>
						<div class="faq-item__shown">
							<h2><?php echo $item['question']; ?></h2>
							<?php if ( !empty($item['item_subtitle']) ) : ?>
								<h4><?php echo $item['item_subtitle']; ?> </h4>
							<?php endif; ?>
							<span class="faq-item__button" aria-controls="faq-item-content-<?php echo $counter; ?>" aria-expanded="false" aria-label="Toggle FAQ Content Button"></span>
						</div>
					<?php endif; ?>
					<?php if ( !empty($item['answer']) ) : ?>
						<div id="faq-item-content-<?php echo $counter; ?>" class="faq-item-content faq-item__hidden" aria-hidden="true">
							<?php if ( !empty($item['item_subtitle']) ) : ?>
								<h4 class="mobile"><?php echo $item['item_subtitle']; ?></h4>
							<?php endif; ?>
							<?php echo $item['answer']; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php
				$counter++;
			endforeach;
		endif;
		?>
	</div>
</section>
