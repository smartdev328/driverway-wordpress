<?php
/**
 * Block Name: Hero Product
 * Description: Hero banner block managed with ACF.
 * Category: common
 * Icon: align-right
 * Keywords: hero-product hero product acf block
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

$slug         		= str_replace( 'acf/', '', $block['name'] );
$block_id     		= $slug . '-' . $block['id'];
$block_class  		= $slug . '-' . 'section';
$page_logo			= get_field( 'page_logo' );
$hero_content		= get_field( 'hero_content' );
$preview_image		= get_field( 'preview_image' );
$video_library		= get_field( 'video_from_media_library' );
$youtube_iframe		= get_field( 'youtube_video' );
$preview_title		= get_field( 'preview_title' );
$video_type			= get_field( 'video_type' );
$attr_video 		= array(
						'src' => $video_library,
						'autoplay' => 1,
					);
$wp_video			= wp_video_shortcode( $attr_video );
$video				= ($video_type) ? $wp_video : $youtube_iframe;
$tabs_title_desk	= get_field( 'tabs_title_desktop' );
$tabs_title_mob		= get_field( 'tabs_title_mobile' );
$tabs				= get_field( 'hero_tabs' );
$active_tab			= str_replace(' ', '', strtolower( get_field( 'active_tab' ) ) );

if( isset( $block['data']['preview_image_help'] )  ) :
    echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
endif;
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $block_class; ?>">

	<div class="<?php echo $block_class . '-container'; ?>">

		<?php if( $tabs ) : ?>
			<div class="<?php echo $block_class . '-tabs-nav'; ?>">

				<?php if( $tabs_title_desk && $tabs_title_mob ) : ?>
					<span class="<?php echo $block_class . '-tabs-nav__title'; ?>">
						<?php echo $tabs_title_desk . ':'; ?>
					</span>
					<span class="<?php echo $block_class . '-tabs-nav__title ' . $block_class . '-tabs-nav__title_mob'; ?>">
						<?php echo $tabs_title_mob . ':'; ?>
					</span>
				<?php endif; ?>

				<div class="<?php echo $block_class . '-tabs-nav-scroll'; ?>">
					<?php foreach( $tabs as $tab ) :
						$tab_name = $tab['tab_name'];
						$tab_id = str_replace(' ', '', strtolower( $tab_name ) ); ?>
						<a class="<?php echo $block_class . '-tabs-nav__item'; ?><?php echo $active_tab === $tab_id ? ' active' : '' ?>"
						href="<?php echo '#' . str_replace(' ', '', strtolower( $tab_name ) );?>"><?php echo $tab_name ?></a>
					<?php endforeach; ?>
				</div>

			</div>
		<?php endif; ?>

		<div class="<?php echo $block_class . '-hero'; ?>">

			<div class="<?php echo $block_class . '-hero__column'; ?>">
				<?php
				if ( function_exists('yoast_breadcrumb') ) :
					yoast_breadcrumb( '<div class="page-breadcrumbs page-breadcrumbs--product"><p id="breadcrumbs">','</p></div>' );
				endif; ?>

				<?php if( $page_logo ) : ?>
					<img class="<?php echo $block_class . '-hero__logo'; ?>"
						 src="<?php echo $page_logo['url']; ?>"
						 alt="<?php echo $page_logo['alt']; ?>" />
				<?php endif; ?>

				<?php if( $hero_content ) : ?>
					<p class="<?php echo $block_class . '-hero__content'; ?>"><?php echo $hero_content; ?></p>
				<?php endif; ?>

			</div>

			<div class="<?php echo $block_class . '-hero__column'; ?>">

				<?php if( $youtube_iframe || $video_library && $preview_image ) : ?>
					<div class="<?php echo $block_class . '-hero-video'; ?>">

						<?php echo $video; ?>

						<img class="<?php echo $block_class . '-hero-video__preview'; ?>"
							 src="<?php echo $preview_image['url']; ?>"
							 alt="<?php echo $preview_image['alt']; ?>"/>

						<div class="<?php echo $block_class . '-hero-video__overlay'; ?>">

							<?php if( $preview_title ) : ?>
 								<h2 class="<?php echo $block_class . '-hero-video__title' ?>">
									<?php echo $preview_title; ?>
								</h2>
							<?php endif; ?>

							<button class="<?php echo $block_class . '-hero-video__play'; ?>">
								<?php _e( 'Play Video', 'wp-dev' ); ?>
							</button>

						</div>
					</div>
				<?php endif; ?>

			</div>

		</div>

		<?php if( $tabs ) : ?>
			<div class="<?php echo $block_class . '-tabs-content'; ?>">

				<?php foreach( $tabs as $tab ) :
					$tab_name = $tab['tab_name'];
					$tab_id = str_replace(' ', '', strtolower( $tab_name ) );
				?>
					<div id="<?php echo $tab_id; ?>"
						 class="<?php echo $block_class . '-tabs-content__item'; ?><?php echo $active_tab === $tab_id ? ' active' : '' ?>">
						<div class="<?php echo $block_class . '-tabs-content__item-container'; ?>">
							<?php
								if( $tab['tab_content'] ) :
									foreach ( $tab['tab_content'] as $tab_content ) :
										$tab_icon = $tab_content['icon'];
										$tab_title = $tab_content['title']; ?>

										<div class="<?php echo $block_class . '-tab-content'; ?>">

											<?php if( $tab_icon ) : ?>
												<div class="<?php echo $block_class . '-tab-content__icon'; ?>">
													<img src="<?php echo $tab_icon['url']; ?>"
														 alt="<?php echo $tab_icon['alt']; ?>">
												</div>
											<?php endif; ?>

											<?php if( $tab_title ) : ?>
												<h2 class="<?php echo $block_class . '-tab-content__title'; ?>">
													<?php echo $tab_title; ?>
												</h2>
											<?php endif; ?>

										</div>
							<?php
									endforeach;
								endif; ?>
						</div>

					</div>
				<?php endforeach; ?>

			</div>
		<?php endif; ?>
	</div>
</section>
