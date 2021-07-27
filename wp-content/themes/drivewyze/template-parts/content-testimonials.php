<?php
/**
 * Template part for displaying testimonials single.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Drivewyze
 */
$block_subtitle = get_field( 'testimonials_title', 'options' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('pt-block pt-block--light'); ?>>
	<div class="pt-block-header pt-block-header--light post-header">
		<div class="post-header__container">
			<div class="post-header__top">
				<?php
				if ( function_exists('yoast_breadcrumb') ) :
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				endif; ?>
				<?php if ( $block_subtitle ) : ?>
					<h5><?php echo $block_subtitle; ?></h5>
				<?php endif; ?>
				<?php the_title( '<h1>', '</h1>' ); ?>
			</div>
		</div>
	</div>

	<div class="post-main">
		<?php the_content(); ?>
	</div>
</article>

<div class="testimonials-posts">
    <div class="testimonials-posts__block load-posts-block">
        <?php
        $args  = array(
            'post_type'      => 'testimonials',
            'posts_per_page' => 3,
        );
        $posts_testimonial = new WP_Query( $args );

        if ( $posts_testimonial->have_posts() ) : ?>
            <?php
            while ( $posts_testimonial->have_posts() ) :
                $posts_testimonial->the_post();
                get_template_part( 'template-parts/testimonials-post-template', '' );
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </div>
    <?php $published_posts = wp_count_posts( 'testimonials' )->publish; ?>

    <?php if ( $published_posts > $posts_per_page ) : ?>
        <div class="load-more">
            <button id="load-post" title="" data-count="3"
                    data-post="<?php echo $published_posts; ?>"
                    data-type="<?php echo $args['post_type']; ?>" href="#"
            ><?php esc_html_e( 'Load More', 'wp_dev' ); ?></button>
        </div>
    <?php endif; ?>
    <div class="ajax-preloader">
    </div>
</div>
