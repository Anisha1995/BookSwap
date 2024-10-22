<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package shopstudio
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e( '404!', 'shopstudio' ); ?></h1>
                    <h2 class="page-description"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'shopstudio' ); ?></h2>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'shopstudio' ); ?></p>

					<?php
					get_search_form();
					?>
                </div><!-- .page-content -->
            </section><!-- .error-404 -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
