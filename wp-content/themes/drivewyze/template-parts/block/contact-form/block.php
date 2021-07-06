<?php
/**
 * Block Name: Contact form
 * Description: Contact form block managed with ACF.
 * Category: common
 * Icon: email
 * Keywords: contact-form contact form acf block
 * Supports: { "align":false, "anchor":true }
 *
 * @package Drivewyze
 *
 * @var array $block
 */

$slug         	= str_replace( 'acf/', '', $block['name'] );
$block_id     	= $slug . '-' . $block['id'];
$block_class  	= $slug . '-' . 'section';
$form_id	  	= get_field( 'choices' );
$bg_color	  	= get_field( 'background_color' );
$section_title	= get_field( 'section_title' );
if( $bg_color ) :
	$color_style = 'style=background-color:'. $bg_color . ';';
else :
	$color_style = '';
endif;
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $block_class; ?>">

	<?php if( $form_id || $section_title ) : ?>
		<div class="<?php echo $block_class . '-container' ?>"  <?php echo $color_style; ?>>

			<div class="<?php echo $block_class . '-container__column'; ?>">

				<?php if( $section_title ) : ?>
					<h2><?php echo $section_title; ?></h2>
				<?php endif; ?>

			</div>

			<div class="<?php echo $block_class . '-container__column'; ?>">

				<?php if( $form_id ) :
					gravity_form
					(
						$form_id,
						$display_title = false,
						$display_description = false,
						$ajax = true
					);
				endif; ?>

			</div>

		</div>
	<?php endif; ?>

</section>
