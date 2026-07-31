<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top">
    <?php wp_body_open(); ?> 

    <?php
        $logo = get_field('color_logo', 'option') ? '<img class="logo" src="' . get_field('color_logo', 'option')['url'] . '" alt="Hexton Construction logo" />' : "";

        echo <<<HTML
            <div class="fixed-header">
                <div class="inner-header">
                    <div class="logo">{$logo}</div>
                    <div class="navigation">
                        <div class="menu-toggle">
                            <div id="nav-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
        HTML;

        get_template_part('template-parts/navigation', null, ['type' => 'header']);

        echo <<<HTML
                    </div>
                </div>
            </div>
        HTML;
