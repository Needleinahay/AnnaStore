<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package holidayshop
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head(); ?>

    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="site">
            <header id="masthead" class="site-header" style="<?php holidayshop_header_styles(); ?>">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                if (!empty($image)) :
                    ?>
                    <div class='site-logo'>
                        <a href='<?php echo esc_url(home_url('/')); ?>'
                           title='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>' rel='home'>
                            <img src='<?php echo esc_url($image[0]); ?>'
                                 alt='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>'>
                        </a>
                    </div>
                <?php else : ?>
                    <div class='site-txt-logo'>
						<div>
							<a href='<?php echo esc_url(home_url('/')); ?>'>
								<img style="max-width:130px;" src="http://localhost/store/wp-content/themes/holidayshop/images/logo.png">
							</a>
						</div>
                        <!--<hgroup>
                            <h1 class='site-title'><a href='<?php echo esc_url(home_url('/')); ?>'
                                                      title='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>'
                                                      rel='home'
                                                      style="color: #<?php header_textcolor(); ?>"><?php bloginfo('name'); ?></a>
                            </h1>
                            <p class='site-description'
                               style="color: #<?php header_textcolor(); ?>"><?php bloginfo('description'); ?></p>
                        </hgroup>-->
                    </div>
                <?php endif; ?>
                <?php
                $nav_full = '';
                if (!class_exists('WooCommerce')) {
                    $nav_full = 'nav-full';
                }
                ?>
                <nav id="site-navigation" class="main-navigation <?php echo $nav_full ?>">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i></i><i></i><i></i></button>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'menu_id' => 'primary-menu',
                    ));
                    ?>
                </nav><!-- #site-navigation -->
                <?php
                if (class_exists('WooCommerce')) {
                    if (function_exists('YITH_WCWL')) {
                        if (get_option('yith_wcwl_enabled') == 'yes') {
                            ?>
                            <div class="header-wishlist">
                                <?php holidayshop_head_wishlist(); ?>
                            </div>
                            <?php
                        }
                    }
                }
                if (class_exists('WooCommerce')) {
                    if (function_exists('holidayshop_header_cart')) {
                        ?>
						<div style="height:30px;">
							<div class="header-cart text-right">
								<?php holidayshop_header_cart(); ?>
							</div>
						</div>
                        <?php
                    }
                }
                ?>
            </header><!-- #masthead -->

            <!-- #Header-image -->

            <?php
            if (holidayshop_is_frontpage()) {
                $default_banner_url = get_template_directory_uri() . '/images/holidayshop-banner.png';
                if (get_theme_mod('default_banner')) {
                    $banner_url = esc_url(get_theme_mod('default_banner'));
                    ?>
                    <div class="banner">
                        <img src="<?php echo $banner_url; ?>">
                    </div>
            <?php } else { ?>

                    <div class="banner">
                        <img src="<?php echo esc_url($default_banner_url); ?>">
                    </div>
                <?php }
            }
            ?>
            <!-- End header image -->
            <div id="content" class="site-content">
                <div class="wrapper">
