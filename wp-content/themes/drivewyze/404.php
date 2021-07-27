<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package Drivewyze
 */

get_header(); ?>

	<div id="primary" class="content-area">
        <?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        } ?>

		<section id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( '404: Page Not Found', 'wp_dev' ); ?></h1>
				</header><!-- .page-header -->

                <a class="back-button" href="<?php echo esc_url( home_url() ); ?>">
                    <?php esc_html_e( 'Back to home', 'wp_dev' ); ?>
                </a>

				<div class="page-content">

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</section><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
