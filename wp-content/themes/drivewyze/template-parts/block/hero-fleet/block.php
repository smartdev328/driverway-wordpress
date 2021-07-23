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
$fleet_single			= get_field( 'fleet_hero' );
$fleet_nav				= get_field( 'fleet_hero_nav' );
$fleet_section_class 	= $hero_type === 'multiple' ? 'fleet-multiple' : 'fleet-single';
$fleet_title_mob		= get_field( 'title_mobile' );
$fleet_title_desk		= get_field( 'title_desktop' );
$active_nav				= str_replace(' ', '', strtolower( get_field( 'active_nav' ) ) );
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $block_class . ' ' . $fleet_section_class; ?>"
         data-aos="fade-up" data-aos-duration="500">
    <?php if ( function_exists('yoast_breadcrumb') && !is_front_page() ) :
        yoast_breadcrumb( '<div class="page-breadcrumbs page-breadcrumbs_' . $hero_type .'" ><p id="breadcrumbs">','</p></div>' );
    endif; ?>

	<?php
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

					<?php if( $hero_type === 'multiple' ) : ?>
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
								<?php foreach( $fleet_nav as $nav_item ) :
									$nav_name = $nav_item['nav_name'];
									$nav_id = strtolower( $nav_name['title'] );
									$active = ($active_nav === $nav_id) ? 'active' : '';

								?>
									<a class="fleet-hero-nav-scroll__item <?php echo $active; ?>"
									   href="<?php echo  $nav_name['url']; ?>"><?php echo $nav_name['title']; ?></a>
								<?php endforeach; ?>
							</div>

						</div>
					<?php endif; ?>

				</div>
			<?php
		endif;
	?>
</section>
