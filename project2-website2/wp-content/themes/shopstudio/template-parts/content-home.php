<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package shopstudio
 */

$post_id   = get_the_id();
$post_data = get_post( $post_id );
?>
<li class="col-sm-6">
    <div class="blog-containe box-shadow">
        <div class="blog-img">
			<?php
			$thumbnail_id  = get_post_thumbnail_id( $post_data->ID );
			$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
			if ( ! empty( $thumbnail_id ) ) {
				?>
				<?php echo the_post_thumbnail();
			} ?>
        </div>
        <div class="blog-details">

			<?php
			//  set date formatting
			$date_format_feature = $post_data->post_date;
			$date                = date_create( $date_format_feature );
			$date_format         = date_format( $date, 'M d, Y' );
			$author              = get_the_author();
			$avatar              = get_avatar( $post_data->post_author, 32 );
			$avatar_full_url = esc_url( get_avatar_url( $post_data->post_author ) );
			$avatar_url = explode("?", $avatar_full_url);

			?>

            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <span class="sub-title"> <img src="<?php echo esc_url($avatar_url[0],'shopstudio')."?s=200"; ?>" class="avatar avatar-32 photo">
                By <?php echo esc_html( $author, 'shopstudio' ); ?></span>

            <div class="comment-sec">
                <ul>
                    <li><i class="fa fa-comments"
                           aria-hidden="true"></i><?php echo esc_html( $post_data->comment_count, 'shopstudio' ); ?></li>
                    <li><i class="fa fa-calendar"
                           aria-hidden="true"></i><?php echo esc_html( $date_format, 'shopstudio' ); ?></li>
                </ul>
            </div>

            <?php if ( ! empty( $thumbnail_id ) ) {
                ?><div class="hover-item"><?php
            } else{
                ?><div class="hover-item-default"><?php
            } ?>
                <div class="hover-item-disabled">
					<?php
					$big   = wp_strip_all_tags( get_the_excerpt(), true );
					$small = substr( $big, 0, 150 );

					$pieces     = explode( " ", $big );
					$first_part = implode( " ", array_splice( $pieces, 0, 20 ) );

					?>
                    <p><?php echo esc_html( $first_part, 'shopstudio' ) ?></p>
                    <div class="read-more">
                        <a href="<?php echo esc_url( get_permalink( $post_data->ID ), 'shopstudio' ); ?>">Read More</a>
                    </div>
                </div>
            </div>
        </div>
</li>
