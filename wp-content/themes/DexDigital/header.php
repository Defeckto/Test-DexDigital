<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test DexDigital</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <?php wp_head() ?>
</head>

<body>
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <div class="navbar__logo">
                    <?php the_custom_logo(); ?>
                </div>
                <div class="navbar__nav">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'header',
                            'menu_id'        => 'primary-menu',
                            'menu_class'     => 'navbar-nav__items',
                            'container'      => 'ul',
                        )
                    );
                    ?>
                </div>
                <?php
                $link = get_field('header_btn', 'option');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                    <a class="btn navbar__btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
            </nav>
        </div>
    </header>