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

if( isset( $block['data']['preview_image_help'] )  ) :
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
endif;

$slug         			= str_replace( 'acf/', '', $block['name'] );
$block_id     			= $slug . '-' . $block['id'];
$block_class  			= $slug;
$hero_type				= get_field( 'type_of_hero' );
$fleet_slider			= get_field( 'fleet_slider' );
$fleet_single			= get_field( 'fleet_hero' );
$fleet_section_class 	= $hero_type === 'multiple' ? 'fleet-multiple' : 'fleet-single';
$fleet_title_mob		= get_field( 'title_mobile' );
$fleet_title_desk		= get_field( 'title_desktop' );
$active_slide				= str_replace(' ', '', strtolower( get_field( 'active_slide' ) ) );
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $block_class . ' ' . $fleet_section_class; ?>">
	<?php
	if( $hero_type === 'multiple' )  {
	 	if( $fleet_slider ) { ?>
			<div class="fleet-hero">
				<div class="fleet-hero-container">
					<?php
					foreach ( $fleet_slider as $fleet_slide ) {
						$title = $fleet_slide['slide_title'];
						$desc = $fleet_slide['slide_description'];
						$nav_name = $fleet_slide['slide_nav_name'];
						$slide_id = str_replace(' ', '', strtolower( $nav_name ) );
						$customer_group = $fleet_slide['customer_group'];
						$customer_title	= $customer_group['customer_title'];
						$customer_name	= $customer_group['customer_name'];
						$customer_desc	= $customer_group['customer_desc'];
						$customer_img	= $customer_group['customer_image']; ?>

						<div id="<?php echo strtolower( $nav_name ); ?>" class="fleet-hero__slide<?php echo $active_slide === $slide_id ? ' active' : '' ?>">

							<?php if( $nav_name ) : ?>
								<span><?php echo $nav_name; ?></span>
							<?php endif; ?>

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
										<p class="bold"><?php echo $customer_name; ?></p>
									<?php endif; ?>

									<?php if( $customer_desc ) : ?>
										<p><?php echo $customer_desc; ?></p>
									<?php endif; ?>

								</div>

							<?php endif; ?>

							<?php if( is_array( $customer_img ) ) : ?>

								<div class="customer-group customer-group-image">
									<img src="<?php echo $customer_img['url']; ?>"
										 alt="<?php echo $customer_img['alt']; ?>">
								</div>

							<?php endif; ?>

						</div>

						<?php
					}
					?>
				</div>
				<div class="fleet-hero-nav">

					<?php if( $fleet_title_mob && $fleet_title_desk ) : ?>
						<span class="fleet-hero-nav__title">
						<?php echo $fleet_title_desk . ':'; ?>
					</span>
						<span class="fleet-hero-nav__title fleet-hero-nav__title_mob">
						<?php echo $fleet_title_mob . ':'; ?>
					</span>
					<?php endif; ?>

					<div class="fleet-hero-nav-scroll">
						<?php foreach( $fleet_slider as $fleet_slide ) :
							$nav_name = $fleet_slide['slide_nav_name'];
							$slide_id = str_replace(' ', '', strtolower( $nav_name ) ); ?>
							<a class="fleet-hero-nav-scroll__item<?php echo $active_slide === $slide_id ? ' active' : '' ?>"
							   href="<?php echo '#' . str_replace(' ', '', strtolower( $nav_name ) );?>"><?php echo $nav_name ?></a>
						<?php endforeach; ?>
					</div>

				</div>
			</div>
		<?php }
	} elseif( $hero_type === 'single' ) {
		if( $fleet_single ) :
			$name			 = $fleet_single['hero_name'];
			$title 			 = $fleet_single['hero_title'];
			$desc 			 = $fleet_single['hero_description'];
			$customer_group  = $fleet_single['customer_group'];
			$customer_title	 = $customer_group['customer_title'];
			$customer_name   = $customer_group['customer_name'];
			$customer_desc	 = $customer_group['customer_desc'];
			$customer_img	 = $customer_group['customer_image'];
			?>
				<div class="fleet-hero">
					<div class="fleet-hero-container">
						<div class="fleet-hero__slide">
							<?php if( $name ) : ?>
								<span><?php echo $name; ?></span>
							<?php endif; ?>

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

							<?php if( $customer_img ) : ?>
								<div class="customer-group customer-group-image">
									<img src="<?php echo $customer_img['url']; ?>"
										 alt="<?php echo $customer_img['alt']; ?>">
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php
			endif;
		}
	?>
</section>
