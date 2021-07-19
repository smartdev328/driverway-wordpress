<?php
/**
 * Block Name: Cards
 * Description: Cards
 * Category: common
 * Icon: feedback
 * Keywords: cards
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

if( isset( $block['data']['preview_image_help'] )  ) :
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
endif;

$slug         = str_replace( 'acf/', '', $block['name'] );
$block_id     = !empty($block['anchor']) ? $block['anchor'] : $slug . '-' . $block['id'];
$align_class  = $block['align'] ? 'align' . $block['align'] : '';
$custom_class = isset( $block['className'] ) ? $block['className'] : '';
$cards        = get_field( 'cards' );
?>
<?php if ( ! empty( $cards ) && is_array( $cards ) ) : ?>
	<section id="<?php echo $block_id; ?>" class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">
		<div class="cards__container">
			<?php foreach ( $cards as $card ) : ?>
				<?php
				$title = is_array( $card ) ? $card['title'] : '';
				$desc  = is_array( $card ) ? $card['description'] : '';
				$link  = is_array( $card ) ? $card['link'] : '';
				?>
				<div class="card">
					<?php if ($title || $desc): ?>
						<div class="card-info">
							<?php if ( $title ) : ?>
								<h3><?php echo $title; ?></h3>
							<?php endif; ?>

							<?php if ( $desc ) : ?>
								<p><?php echo $desc; ?></p>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $link ) && is_array( $link ) ) : ?>
						<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
							<?php echo $link['title']; ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>
