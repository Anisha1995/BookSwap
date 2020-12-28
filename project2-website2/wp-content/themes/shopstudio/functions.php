<?php
/**
 * shopstudio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shopstudio
 */
if (!function_exists('shopstudio_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function shopstudio_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on shopstudio, use a find and replace
         * to change 'shopstudio' to the name of your theme in all the template files.
         */
        load_theme_textdomain('shopstudio', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'header-menu' => esc_html__('Primary', 'shopstudio'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('shopstudio_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
    }

endif;
add_action('after_setup_theme', 'shopstudio_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shopstudio_content_width() {
    $GLOBALS['content_width'] = apply_filters('shopstudio_content_width', 640);
}

add_action('after_setup_theme', 'shopstudio_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shopstudio_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'shopstudio'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add Sidebar widgets here.', 'shopstudio'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer', 'shopstudio'),
        'id' => 'footer-2',
        'description' => esc_html__('Add footer widgets here.', 'shopstudio'),
        'before_widget' => '<section id="%1$s" class="footer-section %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'shopstudio_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function shopstudio_scripts() {

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array());
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array());

    wp_enqueue_script('shopstudio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
    wp_enqueue_script('shopstudio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    wp_enqueue_script('wc-shopstudio-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), 1.1, true);
    
    wp_enqueue_style('shopstudio-style', get_stylesheet_uri());
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('wc-shopstudio', get_template_directory_uri() . '/css/wc-shopstudio.css', array(), true);
    }
    wp_enqueue_style('wc-shopstudio-media-css', get_template_directory_uri() . '/media.css', array());
}

add_action('wp_enqueue_scripts', 'shopstudio_scripts');

/**
 * Registers an editor stylesheet for the theme.
 */
function shopstudio_theme_add_editor_styles() {
    add_editor_style('custom-editor-style.css');
	wp_enqueue_style('shopstudio-editor', get_template_directory_uri() . '/css/shopstudio-editor.css', array(), true);
}

add_action('admin_init', 'shopstudio_theme_add_editor_styles');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*
 * *
 * Checks to see if we're on the homepage or not.
 */

function shopstudio_is_frontpage() {
    return ( is_front_page() && !is_home() );
}

/**
 * Apply inline style to the Storefront header.
 *
 * @uses  get_header_image()
 * @since  2.0.0
 */
function shopstudio_header_styles() {
    $is_header_image = get_header_image();

    if ($is_header_image) {
        $header_bg_image = 'url(' . esc_url($is_header_image) . ')';
    } else {
        $header_bg_image = 'none';
    }
    if ($header_bg_image != 'none') {
        $styles = apply_filters('shopstudio_header_styles', array(
            'background-image' => $header_bg_image,
        ));
    } else {
        $styles = apply_filters('shopstudio_header_styles', array(
            'background-color' => '#fff',
            'color' => '#000'
        ));
    }


    foreach ($styles as $style => $value) {
        echo esc_attr($style . ': ' . $value . '; ');
    }
}

// Header wishlist icon ajax update
add_action('wp_ajax_yith_wcwl_update_single_product_list', 'shopstudio_head_wishlist');
add_action('wp_ajax_nopriv_yith_wcwl_update_single_product_list', 'shopstudio_head_wishlist');

if (!function_exists('shopstudio_header_cart')) {

    function shopstudio_header_cart() {
        ?>
        <div class="header-cart-inner">
            <?php shopstudio_cart_link(); ?>
            <ul class="site-header-cart menu list-unstyled">
                <li>
                    <?php the_widget('WC_Widget_Cart', 'title='); ?>
                </li>
            </ul>
        </div>
        <?php
        if (get_theme_mod('wishlist-top-icon', 0) != 0) {
            shopstudio_head_wishlist();
        }
    }

}
if (!function_exists('shopstudio_header_add_to_cart_fragment')) {
    add_filter('woocommerce_add_to_cart_fragments', 'shopstudio_header_add_to_cart_fragment');

    function shopstudio_header_add_to_cart_fragment($fragments) {
        ob_start();

        shopstudio_cart_link();

        $fragments['a.cart-contents'] = ob_get_clean();

        return $fragments;
    }

}

////////////////////////////////////////////////////////////////////
// WooCommerce section
////////////////////////////////////////////////////////////////////
if (class_exists('WooCommerce')) {

////////////////////////////////////////////////////////////////////
// WooCommerce header cart
////////////////////////////////////////////////////////////////////
    if (!function_exists('shopstudio_cart_link')) {

        function shopstudio_cart_link() {
            if (get_theme_mod('cart-top-icon', 1) == 1) {
                ?>
                <a class="cart-contents text-right" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'shopstudio'); ?>">
                    <i class="fa fa-shopping-cart"><span class="count"><?php echo absint(WC()->cart->get_cart_contents_count()); ?></span></i><span class="amount-title hidden-sm hidden-xs"><?php echo esc_html_e('Cart ', 'shopstudio'); ?></span><span class="amount-cart"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span>
                </a>
                <?php
            }
        }

    }
    if (!function_exists('shopstudio_head_wishlist')) {

        function shopstudio_head_wishlist() {
            if (function_exists('YITH_WCWL')) {
                $wishlist_url = YITH_WCWL()->get_wishlist_url();
                ?>
                <div class="top-wishlist ">
                    <a href="<?php echo esc_url($wishlist_url); ?>" title="<?php esc_attr_e('Wishlist','shopstudio'); ?>" data-toggle="tooltip" data-placement="top">
                        <div class="fa fa-heart"><div class="count"><span><?php echo absint(yith_wcwl_count_products()); ?></span></div></div><span class="wish-title"><?php _e('Wishlist','shopstudio') ?></span>
                    </a>
                </div>
                <?php
            }
        }

    }
    // Header wishlist icon ajax update
    add_action('wp_ajax_yith_wcwl_update_single_product_list', 'shopstudio_head_wishlist');
    add_action('wp_ajax_nopriv_yith_wcwl_update_single_product_list', 'shopstudio_head_wishlist');

    if (!function_exists('shopstudio_header_cart')) {

        function shopstudio_header_cart() {
            ?>
            <div class="header-cart-inner">
                <?php shopstudio_cart_link(); ?>
                <ul class="site-header-cart menu list-unstyled">
                    <li>
                        <?php the_widget('WC_Widget_Cart', 'title='); ?>
                    </li>
                </ul>
            </div>
            <?php
            if (get_theme_mod('wishlist-top-icon', 0) != 0) {
                shopstudio_head_wishlist();
            }
        }

    }
    if (!function_exists('shopstudio_header_add_to_cart_fragment')) {
        add_filter('woocommerce_add_to_cart_fragments', 'shopstudio_header_add_to_cart_fragment');

        function shopstudio_header_add_to_cart_fragment($fragments) {
            ob_start();

            shopstudio_cart_link();

            $fragments['a.cart-contents'] = ob_get_clean();

            return $fragments;
        }

    }
////////////////////////////////////////////////////////////////////
// Change number of products displayed per page
////////////////////////////////////////////////////////////////////
    add_filter('loop_shop_per_page', create_function('$cols', 'return ' . absint(get_theme_mod('archive_number_products', 24)) . ';'), 20);
////////////////////////////////////////////////////////////////////
// Change number of products per row
////////////////////////////////////////////////////////////////////
    add_filter('loop_shop_columns', 'shopstudio_loop_columns');
    if (!function_exists('shopstudio_loop_columns')) {

        function shopstudio_loop_columns() {
            return absint(get_theme_mod('archive_number_columns', 4));
        }

    }

////////////////////////////////////////////////////////////////////
// Archive product wishlist button
////////////////////////////////////////////////////////////////////
    function shopstudio_wishlist_products() {
        if (function_exists('YITH_WCWL')) {
            if (get_option('yith_wcwl_enabled') == 'yes') {
                global $product;
                $url = add_query_arg('add_to_wishlist', $product->get_id());
                $id = $product->get_id();
                $wishlist_url = YITH_WCWL()->get_wishlist_url();
                ?>
                <div class="add-to-wishlist-custom add-to-wishlist-<?php echo esc_attr($id); ?>">
                    <div class="yith-wcwl-add-button show" style="display:block"><a href="<?php echo esc_url($url); ?>"
                                                                                    rel="nofollow"
                                                                                    data-product-id="<?php echo esc_attr($id); ?>"
                                                                                    data-product-type="simple"
                                                                                    class="add_to_wishlist"><?php _e('Add to Wishlist', 'shopstudio'); ?></a><img
                                                                                    src="<?php echo get_template_directory_uri() . '/images/loading.gif'; ?>"
                                                                                    class="ajax-loading" alt="loading" width="16" height="16"></div>
                    <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"><span
                            class="feedback"><?php esc_html_e('Added!', 'shopstudio'); ?></span> <a
                            href="<?php echo esc_url($wishlist_url); ?>"><?php esc_html_e('View Wishlist', 'shopstudio'); ?></a>
                    </div>
                    <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none"><span
                            class="feedback"><?php esc_html_e('The product is already in the wishlist!', 'shopstudio'); ?></span>
                        <a href="<?php echo esc_url($wishlist_url); ?>"><?php esc_html_e('Browse Wishlist', 'shopstudio'); ?></a>
                    </div>
                    <div class="clear"></div>
                    <div class="yith-wcwl-wishlistaddresponse"></div>
                </div>
                <?php
            }
        }
    }

    add_action('woocommerce_after_shop_loop_item', 'shopstudio_wishlist_products', 5);

    function shopstudio_woocommerce_breadcrumbs() {
        return array(
            'delimiter' => ' &raquo; ',
            'wrap_before' => '<div id="breadcrumbs" ><div class="breadcrumbs-inner text-right">',
            'wrap_after' => '</div></div>',
            'before' => '',
            'after' => '',
            'home' => esc_html_x('Home', 'woocommerce breadcrumb', 'shopstudio'),
        );
    }

    add_filter('woocommerce_breadcrumb_defaults', 'shopstudio_woocommerce_breadcrumbs');

////////////////////////////////////////////////////////////////////
// WooCommerce Support
////////////////////////////////////////////////////////////////////
    add_action('after_setup_theme', 'shopstudio_woocommerce_support');

    function shopstudio_woocommerce_support() {
        add_theme_support('woocommerce');
    }

////////////////////////////////////////////////////////////////////
// Product slider and zoom effect
////////////////////////////////////////////////////////////////////
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

////////////////////////////////////////////////////////////////////
// WooCommerce Theme wrappers and unhook
////////////////////////////////////////////////////////////////////
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

    add_action('woocommerce_before_main_content', 'shopstudio_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'shopstudio_wrapper_end', 10);

    function shopstudio_wrapper_start() {
        if (is_active_sidebar(1)) {
            echo '<div id="primary" class="content-area">';
        }
    }

    function shopstudio_wrapper_end() {
        if (is_active_sidebar(1)) {
            echo '</div>';
        }
    }

}

////////////////////////////////////////////////////////////////////
// WooCommerce end
////////////////////////////////////////////////////////////////////
function shopstudio_add_google_fonts() {

    wp_enqueue_style('popies-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700', false);
}

add_action('wp_enqueue_scripts', 'shopstudio_add_google_fonts');

