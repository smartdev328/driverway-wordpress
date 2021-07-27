<?php
/**
 * Page template file
 *
 * @package Drivewyze
 */

$title          = get_field( 'blog_title', 'options' );
$prefix         = get_field( 'page_prefix', 'options' );
$posts_per_page = get_field( 'posts_per_page', 'options' );

get_header(); ?>
	<div id="primary" class="content-area">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
        ?>
        <?php if ( $prefix ) : ?>
            <ul class="custom blog-prefix">
                <li><?php echo $prefix; ?></li>
            </ul>
        <?php endif; ?>

		<?php if ( $title ) : ?>
			<div class="content-title">
				<h1><?php echo $title; ?></h1>
			</div>
		<?php endif; ?>

		<section class="blog-posts"
			<div class="blog-posts__categories">
				<?php
				$args       = array(
					'type'       => 'post',
					'taxonomy'   => 'category',
					'hide_empty' => false,
				);
				$categories = get_categories( $args );?>

                <p class="categories-title"><?php esc_html_e( 'categories', 'wp_dev' ); ?></p>

                <div class="select-blog">
                    <select class="blog-select" name="name" data-isopen="false">
                        <?php foreach ( $categories as $cat ) :
                            $selected = $cat === $post->post_name ? 'selected' : '';
                            ?>
                            <option value="<?php echo get_category_link($cat->cat_ID); ?>" <?php echo $selected; ?>>
                                <?php echo $prefix ? ''. $prefix .' /' : '' ?> <?php echo $cat->name; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <a href="<?php echo esc_url(home_url()); ?>/?s=" class="posts-search"></a>
			</div>

			<div class="blog-posts__container">
				<div class="blog-posts__block load-posts-block">
					<?php
					$args  = array(
						'post_type'      => 'post',
                        'orderby'        => 'menu_order',
						'posts_per_page' => $posts_per_page,
						'category_name' => get_queried_object()->slug,
					);
					$posts = new WP_Query( $args );
					if ( $posts->have_posts() ) : ?>
						<?php
						while ( $posts->have_posts() ) :
							$posts->the_post();
                            get_template_part( 'template-parts/blog-post-template', '' );
						endwhile;
					endif;
					wp_reset_postdata();
					?>
				</div>
				<?php $published_posts = wp_count_posts( 'post' )->publish; ?>

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
