<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package shopstudio
 */

?>

<section class="error-404 not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( '404!', 'shopstudio' ); ?></h1>
		<h2 class="page-description"><?php esc_html_e( 'Oops! Nothing Found.', 'shopstudio' ); ?></h2>
	</header><!-- .page-header -->

	<div class="page-content">
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'shopstudio' ); ?></p>

		<?php
			get_search_form();
		?>
	</div><!-- .page-content -->
</section><!-- .error-404 -->
