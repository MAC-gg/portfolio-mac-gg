<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mac
 */

?>
<DOCTYPE html>
<html <?php language_attributes(); // language setting ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); // based on language setting ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); // WordPress added classes ?> style="background-image: url(<?php echo get_theme_file_uri('/img/main-background-wood-grain.jpg'); ?>);">
	<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'mac' ); ?></a>
        <header>
            <div class="container">
                <div class="header-container">
                    <div class="menu-half">
                        <!-- MAC Main Menu Left -->
                        <?php wp_nav_menu(
                            array(
                                'theme_location'  => 'mac-main-left',
                                'container_class' => 'mac-main-left mac-main-menu',
                                'container_id'    => 'mac-main-left-container',
                                'menu_class'      => '',
                                'fallback_cb'     => '',
                                'menu_id'         => 'mac-main-left',
                                'depth'           => 2
                            )
                        ); ?>
                    </div>
                    <div class="header-logo">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/mac-logo-circle.png" />
                    </div>
                    <div class="menu-half">
                        <!-- MAC Main Menu Right -->
                        <?php wp_nav_menu(
                            array(
                                'theme_location'  => 'mac-main-right',
                                'container_class' => 'mac-main-right mac-main-menu',
                                'container_id'    => 'mac-main-right-container',
                                'menu_class'      => '',
                                'fallback_cb'     => '',
                                'menu_id'         => 'mac-main-right',
                                'depth'           => 2
                            )
                        ); ?>
                    </div>
                </div>
            </div>
        </header>