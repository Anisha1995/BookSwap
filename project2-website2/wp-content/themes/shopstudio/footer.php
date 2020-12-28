<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shopstudio
 */

?>
</div>
</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <?php if (is_active_sidebar('footer-2')) : ?>
        <div class="footer-widget">
            <?php dynamic_sidebar('footer-2'); ?>

        </div>
    <?php endif; ?>

    <div class="footer-right">
        <ul class="social_icons">
            <?php if ( get_theme_mod( 'Facebook' ) ) : ?>
            <li class="social-facebook facebook"><a href="<?php echo esc_url( get_theme_mod( 'Facebook' ) ); ?>"
                                                    target="_blank"><i class="fa fa-facebook"></i></a>
            </li>
            <?php endif; ?>
            <?php if ( get_theme_mod( 'Google_plus' ) ) : ?>
            <li class="social-gplus gplus"><a href="<?php echo esc_url( get_theme_mod( 'Google_plus' ) ); ?>"
                                              target="_blank"><i class="fa fa-google-plus"></i></a>
            </li>
            <?php endif; ?>
            <?php if ( get_theme_mod( 'Linkedin' ) ) : ?>
            <li class="social-linkedin linkedin"><a href="<?php echo esc_url( get_theme_mod( 'Linkedin' ) ); ?>"
                                                    target="_blank"><i class="fa fa-linkedin"></i></a>
            </li>
            <?php endif; ?>
            <?php if ( get_theme_mod( 'Twitter' ) ) : ?>
            <li class="social-twitter twitter"><a href="<?php echo esc_url( get_theme_mod( 'Twitter' ) ); ?>"
                                                  target="_blank"><i class="fa fa-twitter"></i></a>
            </li>
            <?php endif; ?>
            <?php if ( get_theme_mod( 'Insta' ) ) : ?>
            <li class="social-instagram Instagram"><a href="<?php echo esc_url( get_theme_mod( 'Insta' ) ); ?>"
                                                    target="_blank"><i class="fa fa-instagram"></i></a>
            </li>
            <?php endif; ?>
            <?php if ( get_theme_mod( 'pinterest' ) ) : ?>
            <li class="social-pinterest pinterest"><a href="<?php echo esc_url( get_theme_mod( 'pinterest' ) ); ?>"
                                                    target="_blank"><i class="fa fa-pinterest"></i></a>
            </li>
            <?php endif; ?>
        </ul>
    </div>

    <div class="site-info">
        <?php if ( get_theme_mod( 'text_setting' ) ) {
            echo wp_kses_post(balanceTags( get_theme_mod( 'text_setting' )));
        } else {
                       echo esc_html('Proudly powered by WordPress.');
        } ?>
    </div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>


