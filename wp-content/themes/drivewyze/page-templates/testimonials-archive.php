<?php
/**
 * Template Name: Testimonials Archive
 *
 * @package Drivewyze
 */

$title          = get_field( 'testimonials_title', 'options' );
$posts_per_page = get_field( 'testimonials_posts_per_page', 'options' );

get_header(); ?>

    <div id="primary" class="content-area">
        <?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        } ?>
        <?php if ( $title ) : ?>
            <ul class="custom testimonials-prefix">
                <li><?php echo $title; ?></li>
            </ul>
        <?php endif; ?>

        <div class="content-title">
            <h1><?php echo the_title(); ?></h1>
        </div>

        <section class="testimonials-posts"
        <div class="testimonials-posts__container">
            <div class="testimonials-posts__block load-posts-block">
                <?php
                $args  = array(
                    'post_type'      => 'testimonials',
                    'orderby'        => 'menu_order',
                    'posts_per_page' => $posts_per_page,
                );
                $posts = new WP_Query( $args );

                if ( $posts->have_posts() ) : ?>
                    <?php
                    while ( $posts->have_posts() ) :
                        $posts->the_post();
                        get_template_part( 'template-parts/testimonials-post-template', '' );
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
            <?php $published_posts = wp_count_posts( 'testimonials' )->publish; ?>

            <?php if ( $published_posts > $posts_per_page ) : ?>
                <div class="load-more">
                    <button id="load-post" title="" data-count="<?php echo $posts_per_page; ?>"
                            data-post="<?php echo $published_posts; ?>"
                            data-type="<?php echo $args['post_type']; ?>" href="#"
                    ><?php esc_html_e( 'Load More', 'wp_dev' ); ?></button>
                </div>
            <?php endif; ?>
            <div class="ajax-preloader">
            </div>
        </div>
        </section>
    </div><!-- #primary -->

<?php
get_footer();
