<?php
/**
 * Block Name: Our customers slider for page
 * Description: Hero banner block managed with ACF.
 * Category: common
 * Icon: slides
 * Keywords: customers slider acf block
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

$slug         		= str_replace( 'acf/', '', $block['name'] );
$block_id     		= $slug . '-' . $block['id'];
$block_class  		= $slug;
$block_container	= $block_class . '-container';
$slider				= get_field( 'slider' );
$title				= get_field( 'section_title' );
$button				= get_field( 'testimonials_button' );
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $block_class; ?>">

	<div class="dot-pattern">
		<img src="<?php echo asset_path('/images/dot-pattern.svg'); ?>">
	</div>

	<div class="<?php echo $block_container; ?>">

		<?php if( $title ) : ?>
			<h2 class="<?php echo $block_class . '__title'; ?>"><?php echo $title; ?></h2>
		<?php endif; ?>

		<?php if( $slider ) : ?>
			<div class="swiper-container">
				<div class="swiper-wrapper" data-slides="<?php echo count($slider); ?>">

					<?php foreach ( $slider as $slide ) :
						$subtitle 	= $slide['slide_subtitle'];
						$title	  	= $slide['slide_title'];
						$thumbnail	= $slide['customer_image'];
						$name		= $slide['customer_name'];
						$desc		= $slide['customer_description']; ?>
						<div class="swiper-slide">

							<?php if( $subtitle || $title ) : ?>
								<div class="swiper-slide-top">

									<?php if( $subtitle ) : ?>
										<h3><?php echo $subtitle; ?></h3>
									<?php endif; ?>

									<?php if( $title ) : ?>
										<h2><?php echo '"' . $title . '"'; ?></h2>
									<?php endif; ?>

								</div>
							<?php endif; ?>

							<?php if( $thumbnail || $name || $desc ) : ?>
								<div class="swiper-slide-bottom">

									<?php if( $thumbnail ) : ?>
										<div class="customer-image" style="background-image: url('<?php echo $thumbnail['url']; ?>')"></div>
									<?php endif; ?>

									<?php if( $name || $desc ) : ?>
										<div class="customer-desc">

											<?php if( $name ) : ?>
												<h4><?php echo $name . ','; ?></h4>
											<?php endif; ?>

											<?php if( $desc ) : ?>
												<p><?php echo $desc; ?></p>
											<?php endif; ?>

										</div>
									<?php endif; ?>

								</div>
							<?php endif; ?>

						</div>
					<?php endforeach; ?>

				</div>

				<div class="swiper-button-prev">
					<div class="arrow"></div>
				</div>
				<div class="swiper-button-next">
					<div class="arrow"></div>
				</div>
			</div>
		<?php endif; ?>

	</div>

	<?php if( $button ) : ?>
		<a class="<?php echo $block_class . '__button'; ?>"
		   href="<?php echo $button['url']; ?>"
		   target="<?php echo $button['target'] ? '_blank' : '_self'; ?>"
		   title="<?php echo $button['title']; ?>"><?php echo $button['title']; ?></a>
	<?php endif; ?>

</section>
