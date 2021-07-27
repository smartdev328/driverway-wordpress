<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @package Drivewyze
 */

get_header(); ?>

    <section id="primary" class="content-area search-page">
        <?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        } ?>

        <section id="main" class="site-main" role="main">

            <?php get_search_form(); ?>

            <?php
            if ( have_posts() ) :
                ?>

                <header class="page-header">
                    <?php /* translators: %s: search term */ ?>
                    <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'wp_dev' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </header><!-- .page-header -->

                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();

                    /**
                     * Run the loop for the search to output the results.
                     * If you want to overload this in a child theme then include a file
                     * called content-search.php and that will be used instead.
                     */

                    get_template_part( 'template-parts/content', 'search' );

                endwhile;

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>

        </section><!-- #main -->
    </section><!-- #primary -->

<?php
get_sidebar();
get_footer();
