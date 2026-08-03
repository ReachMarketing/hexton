<?php

$section = $args['section'] ?? "";
$background_image = $section['background'] ?? "";
$title = $section['title'] ? '<h1>' . $section['title'] . '</h1>' : "";
$subtitle = $section['subtitle'] ? '<h2>' . $section['subtitle'] . '</h2>' : "";

$image = "";
if (!empty($background_image)) {
    $alt = $section['background']['alt'] ?? 'Background image representing Hexton Construction';
    $image = '<picture>';
    $image .= '<source media="(min-width:1440px) and (max-width:2000px)" srcset="' . $section['background']['sizes']['2xl'] . '">';
    $image .= '<source media="(min-width:1280px) and (max-width:1440px)" srcset="' . $section['background']['sizes']['xl'] . '">';
    $image .= '<source media="(min-width:1024px) and (max-width:1280px)" srcset="' . $section['background']['sizes']['lg'] . '">';
    $image .= '<source media="(min-width:768px) and (max-width:1024px)" srcset="' . $section['background']['sizes']['md'] . '">';
    $image .= '<source media="(min-width:500px) and (max-width:768px)" srcset="' . $section['background']['sizes']['sm'] . '">';
    $image .= '<source media="(max-width:500px)" srcset="' . $section['background']['sizes']['xs'] . '">';
    $image .= '<img class="parallax_scroll" src="' . $section['background']['sizes']['full-width'] . '" alt="' . $alt . '"/>';
    $image .= '</picture>';
}

$logo = get_field('white_logo', 'option') ? '<img class="logo" src="' . get_field('white_logo', 'option')['url'] . '" alt="Hexton Construction logo" />' : "";

$contact_logo = get_field('icon', 'option') ? get_field('icon', 'option')['url'] : "";
$contact_text = get_field('text', 'option') ?? "Contact us";
$contact_link = get_field('link_to', 'option') ?? '#contactus';

echo <<<HTML
    <a href="{$contact_link}" class="contact-sidebutton">
        <div class="button">{$contact_text}</div>
        <div class="white-flash">
            <div class="logo">
                <img src="{$contact_logo}" alt="Hexton Constrtuction H Logo" />
            </div>
        </div>
        
    </a>

    </div>

    <section class="hero">
        <div class="navigation-wrapper">
            <div class="menu-toggle">
                <div id="nav-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            {$logo}
HTML;

get_template_part('template-parts/navigation', null, ['type' => 'header']);

echo <<<HTML
        </div>
        {$image}
HTML;

get_template_part('template-parts/top-left');
get_template_part('template-parts/bottom-left');

echo <<<HTML
        <div class="info-box fadeIn">
            {$title}
            {$subtitle}
        </div>
        <div class="bottom-line">
            <div class="line"></div>
        </div>
    </section>
HTML;
