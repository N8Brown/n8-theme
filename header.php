<!DOCTYPE html>
<html <?php  language_attributes(); ?>>
    <head>
        <meta charset='<?php bloginfo('charset'); ?>'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <nav id="mobileMenu" class="mobile-nav">
            <a href="javascript:void(0)" class="closebtn close-nav" onclick="closeNav()"
                >&times;</a
            >
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'mobile-menu'
                ));
            ?>
        </nav>
    
        <header class="mobile-header">
            <div class="mobile-header-item">
                <a href="<?php echo site_url(); ?>">
                    <img class="profile-pic" src="<?php echo get_theme_file_uri('images/theme-logo.png'); ?>" alt="Nathan Brown"/>
                </a>
            </div>
            <div class="mobile-header-item">
                <h2>NATHAN BROWN</h2>
            </div>
            <div id="menu" class="mobile-header-item open-nav" >
                <a onclick="openNav()">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
        </header>

        <nav class='side-nav'>
            <div class="logo">
                <a href="<?php echo site_url(); ?>">
                    <img src="<?php echo get_theme_file_uri('images/theme-logo.png'); ?>" alt="">
                </a>
            </div>
            <div class='nav-links'>
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu'
                    ));
                ?>
            </div>
        </nav>