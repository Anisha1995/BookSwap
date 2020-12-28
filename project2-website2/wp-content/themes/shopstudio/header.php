<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shopstudio
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <header id="masthead" class="site-header" style="<?php shopstudio_header_styles(); ?>">
        <div class="site-branding">
             <?php
                if (class_exists('WooCommerce')) {
                    if ( function_exists( 'YITH_WCWL' ) ) {
                        if ( get_option( 'yith_wcwl_enabled' ) == 'yes') {
                            ?>
                            <div class="header-wishlist">
                                <?php shopstudio_head_wishlist(); ?>
                            </div>
                            <?php
                        }
                    }
                }
             ?>
            <?php if (get_theme_mod('shopstudio_logo')) : ?>
                <div class='site-logo'>
                    <a href='<?php echo esc_url(home_url('/')); ?>'
                       title='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>' rel='home'>
                        <img src='<?php echo esc_url(get_theme_mod('shopstudio_logo')); ?>'
                             alt='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>'>
                    </a>
                </div>
            <?php else : ?>
                <hgroup>
                    <h1 class='site-title'><a href='<?php echo esc_url(home_url('/')); ?>'
                                              title='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>'
                                              rel='home'
                                              style="color: #<?php header_textcolor(); ?>"><?php bloginfo('name'); ?></a>
                    </h1>
                    <p class='site-description'
                       style="color: #<?php header_textcolor(); ?>"><?php bloginfo('description'); ?></p>
                </hgroup>
            <?php endif; ?>
            <?php
            if (class_exists('WooCommerce')) {
                if (function_exists('shopstudio_header_cart')) {
                    ?>
                     <div class="header-cart text-right">
                        <?php shopstudio_header_cart(); ?>
                     </div>
                    <?php
                }
                
            }
            ?>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i></i><i></i><i></i></button>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'menu_id' => 'primary-menu',
            ));
            ?>
        </nav><!-- #site-navigation -->

    </header><!-- #masthead -->

    <!-- #Header-image -->

    <?php if ( shopstudio_is_frontpage() ) {
        $default_banner_url = get_template_directory_uri().'/images/shopstudio-banner.jpg';
        if ( get_theme_mod('default_banner') ) {
            $banner_url = esc_url(get_theme_mod('default_banner')); ?>
            <div class="banner">
                <img src="<?php echo $banner_url; ?>">
            </div>
        <?php } else { ?>
    
             <div class="banner">
                <img src="<?php echo esc_url($default_banner_url); ?>">
            </div>
        <?php }
    } ?>
    <!-- End header image -->
    <div id="content" class="site-content">
        <div class="wrapper">
