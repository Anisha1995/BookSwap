<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package shopstudio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <div class="feature-img">
            <?php
            global $post;
            $thumbnail_id  = get_post_thumbnail_id( $post->ID );
            $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
            if ( ! empty( $thumbnail_id ) ) {
                ?>
                <?php echo the_post_thumbnail();
            } ?>
        </div>
		<?php
        if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		$author = get_the_author();
		$author_id = get_the_author_meta('ID');
		$avatar_full_url = esc_url( get_avatar_url( $author_id ) );
		$avatar_url = explode("?", $avatar_full_url);
		?>
		<div class="entry-author">
			<span class="sub-title"><img src="<?php echo esc_url($avatar_url[0],'shopstudio')."?s=200"; ?>" class="avatar avatar-32 photo"> <?php echo esc_html($author,'shopstudio'); ?></span>
		</div>

		<?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php shopstudio_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'shopstudio' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'shopstudio' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
