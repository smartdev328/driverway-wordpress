<?php
/**
 * Block Name: Hero section for interior fleet page
 * Description: Hero banner block managed with ACF.
 * Category: common
 * Icon: slides
 * Keywords: hero-fleet hero fleet acf block
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

$slug         			= str_replace( 'acf/', '', $block['name'] );
$block_id     			= $slug . '-' . $block['id'];
$block_class  			= $slug;
$hero_type				= get_field( 'type_of_hero' );
$fleet_slider			= get_field( 'fleet_slider' );
$fleet_single			= get_field( 'fleet_hero' );
$fleet_section_class 	= $hero_type === 'multiple' ? 'fleet-multiple' : 'fleet-single'
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $block_class . ' ' . $fleet_section_class; ?>">
	<?php
	if( $hero_type === 'single' )  {
	 	if( $fleet_slider ) { ?>
			<div class="swiper-container">
				<div class="swiper-pagination"></div>
				<div class="swiper-wrapper">
					<?php
						foreach ( $fleet_slider as $fleet_slide) {
							$title = $fleet_slide['slide_title'];
							$desc = $fleet_slide['slide_description'];
							$nav_name = $fleet_slide['slide_nav_name'];
							$customer_group = $fleet_slide['customer_group'];
							$customer_title	= $customer_group['customer_title'];
							$customer_name	= $customer_group['customer_name'];
							$customer_desc	= $customer_group['customer_desc'];
							$customer_img	= $customer_group['customer_image']; ?>

							<div class="swiper-slide">
								<?php if( $title ) : ?>
									<h2><?php echo $title; ?></h2>
								<?php endif; ?>

								<?php if( $desc ) : ?>
									<p><?php echo $desc; ?></p>
								<?php endif; ?>

								<?php if( $customer_title || $customer_name || $customer_desc ) : ?>
								<div class="customer-group customer-group-text">

									<?php if( $customer_title ) : ?>
										<h3><?php echo $customer_title; ?></h3>
									<?php endif; ?>

									<?php if( $customer_name ) : ?>
										<p><?php echo $customer_name; ?></p>
									<?php endif; ?>

									<?php if( $customer_desc ) : ?>
										<p><?php echo $customer_desc; ?></p>
									<?php endif; ?>

								</div>
								<?php endif; ?>

								<?php if( is_array( $customer_img ) ) : ?>
								<div class="customer-group customer-group-image">
									<div class="customer-group-image__dot-pattern-top"></div>
									<img src="<?php echo $customer_img['url']; ?>"
										 alt="<?php echo $customer_img['alt']; ?>">
									<div class="customer-group-image__dot-pattern-bottom"></div>
								</div>
								<?php endif; ?>

							</div>

						<?php
						}
					?>
				</div>
			</div>
		<?php }
	} elseif( $hero_type === 'multiple' ) {
		if( have_rows( $fleet_single ) ) :
			while ( have_rows( $fleet_single ) ) : the_row();
				$title 			 = get_sub_field( 'hero_title' );
				$desc 			 = get_sub_field( 'hero_description' );
				$customer_group  = get_sub_field( 'customer_group' );
				$customer_title	= $customer_group['customer_title'];
				$customer_name	= $customer_group['customer_name'];
				$customer_desc	= $customer_group['customer_desc'];
				$customer_img	= $customer_group['customer_image'];
				?>
				<div class="fleet-hero">
					<?php if( $title ) : ?>
						<h2><?php echo $title; ?></h2>
					<?php endif; ?>

					<?php if( $desc ) : ?>
						<p><?php echo $desc; ?></p>
					<?php endif; ?>

					<?php if( $customer_title || $customer_name || $customer_desc ) : ?>
						<div class="customer-group customer-group-text">

							<?php if( $customer_title ) : ?>
								<h3><?php echo $customer_title; ?></h3>
							<?php endif; ?>

							<?php if( $customer_name ) : ?>
								<p><?php echo $customer_name; ?></p>
							<?php endif; ?>

							<?php if( $customer_desc ) : ?>
								<p><?php echo $customer_desc; ?></p>
							<?php endif; ?>

						</div>
					<?php endif; ?>

					<?php if( is_array( $customer_img ) ) : ?>
						<div class="customer-group customer-group-image">
							<div class="customer-group-image__dot-pattern-top"></div>
							<img src="<?php echo $customer_img['url']; ?>"
								 alt="<?php echo $customer_img['alt']; ?>">
							<div class="customer-group-image__dot-pattern-bottom"></div>
						</div>
					<?php endif; ?>
				</div>
			<?php
			endwhile;
		endif;
	}
	?>
</section>
