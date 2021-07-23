<?php
/**
 * Block Name: Tabs
 * Description: Tabs Block
 * Category: common
 * Icon: category
 * Keywords: hero-product hero product acf block
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

$slug        = str_replace( 'acf/', '', $block['name'] );
$block_id    = $slug . '-' . $block['id'];
$block_class = $slug;
$tabs	     = get_field( 'tabs' );
$tabs_bg	 = get_field( 'tab_bg' );
$tabs_bg_c	 = $tabs_bg ?? 'light';

if( isset( $block['data']['preview_image_help'] )  ) :
    echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
endif;
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $block_class; ?>">

	<div class="tabs-container">

		<?php if( $tabs && is_array( $tabs ) ) :
			$tab_nav_class = ( count($tabs) === 2 ) ? 'half' : '';
			?>
			<div class="tabs-nav">

				<div class="<?php echo $block_class . '-nav-scroll'; ?>">
					<?php
					$tab_name_in = 0;
					foreach( $tabs as $tab ) :
						$tab_name   = is_array($tab) ? $tab['tab_name'] : '';
						$tab_active = ($tab_name_in === 0) ? 'active' : '';
						$tab_id     = str_replace(' ', '', strtolower( $tab_name ) ); ?>
						<a class="<?php echo $block_class . '-nav__item'; ?> <?php echo $tab_active; ?> <?php echo $tab_nav_class; ?>"
						href="<?php echo '#' . str_replace(' ', '', strtolower( $tab_name ) ) . '-' . $tab_name_in;?>"><?php echo $tab_name ?></a>
					<?php
						$tab_name_in++;
					endforeach; ?>
				</div>

			</div>

			<div class="tabs-content <?php echo $tabs_bg_c; ?>">

				<?php
				$tab_content_in = 0;
				foreach( $tabs as $tab ) :
					$tab_name    = is_array($tab) ? $tab['tab_name'] : '';
					$tab_heading = is_array($tab) ? $tab['tab_title'] : '';
					$tab_active  = ($tab_content_in === 0) ? 'active' : '';
					$tab_content = is_array($tab) ? $tab['tab_content'] : '';
					$tab_id      = str_replace(' ', '', strtolower( $tab_name ) );
					?>
					<div id="<?php echo $tab_id . '-' . $tab_content_in; ?>"
						 class="tabs-item tab-item <?php echo $tab_active; ?>">
						<div class="tab-item-container">
							<?php if( $tab_heading ) : ?>
								<h2><?php echo $tab_heading; ?></h2>
							<?php endif; ?>
							<?php
								if( $tab_content && is_array( $tab_content ) ) : ?>
									<div class="tab-item-info">
										<?php foreach ( $tab_content as $content ) :
											$tab_icon  = is_array($content) ? $content['icon'] : '';
											$tab_info  = is_array($content) ? $content['content'] : '';
											$tab_title = is_array($tab_info) ? $tab_info['title'] : '';
											$tab_desc  = is_array($tab_info) ? $tab_info['desc'] : '';
											?>
											<div class="tab-content">

												<?php if( $tab_icon && is_array( $tab_icon ) ) : ?>
													<div class="tab-content__img">
														<img src="<?php echo $tab_icon['url']; ?>"
															 alt="<?php echo $tab_icon['alt']; ?>">
													</div>
												<?php endif; ?>

												<?php if( $tab_title || $tab_desc ) : ?>
													<div class="tab-content__text">
														<?php if( $tab_title ) : ?>
															<h3 class="light"><?php echo $tab_title; ?></h3>
														<?php endif; ?>
														<?php if( $tab_desc ) : ?>
															<p><?php echo $tab_desc; ?></p>
														<?php endif; ?>
													</div>
												<?php endif; ?>

											</div>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
						</div>
					</div>
				<?php
					$tab_content_in++;
				endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
