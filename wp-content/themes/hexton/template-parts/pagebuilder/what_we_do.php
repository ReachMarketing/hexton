<?php

$section = $args['section'] ?? "";
$anchor = $section['anchor_id'] ?? "";
$title = $section['title'] ?? "";
$images_title = $section['images_title'] ?? "";
$intro = $section['intro'] ?? "";
$images = $section['images'] ?? "";
$boxes_title = $section['boxes_title'] ?? "";
$info_boxes = $section['info_boxes'] ?? "";

echo <<<HTML
    <section class="section what-we-do" id="{$anchor}">
        <div class="inner-section">
HTML;

get_template_part('template-parts/section_title', null, ['title' => $title]);

echo <<<HTML
        <h2 class="section-title fadeIn">
            {$title}
        </h2>
        <div class="intro-text">
            {$intro}
        </div>

        <div class="left-column">
            <h3 class="fadeUp">{$images_title}</h3>

            <div class="image image1 fadeIn">
                <img src="{$images[0]['image']['sizes']['xl']}" alt="Image representing Hexton Construction - {$title}" />
                <div class="caption bottom">{$images[0]['caption']}</div>
HTML;

get_template_part('template-parts/top-left');

echo <<<HTML
            </div>
            <div class="image image2 fadeIn">
                <img src="{$images[2]['image']['sizes']['xl']}" alt="Image representing Hexton Construction - {$title}" />
                <div class="caption bottom">{$images[2]['caption']}</div>
HTML;

get_template_part('template-parts/top-left');

echo <<<HTML
            </div>
        </div>

        <div class="right-column">
            <div class="image image3 fadeIn">
                <img src="{$images[1]['image']['sizes']['xl']}" alt="Image representing Hexton Construction - {$title}" />
                <div class="caption top">{$images[1]['caption']}</div>
HTML;

get_template_part('template-parts/bottom-right');

echo <<<HTML
            </div>

            <div class="image image4 fadeIn">
                <img src="{$images[3]['image']['sizes']['xl']}" alt="Image representing Hexton Construction - {$title}" />
                <div class="caption top">{$images[3]['caption']}</div>
HTML;

get_template_part('template-parts/bottom-left');

echo <<<HTML
            </div>
        </div>
        <h3 class="fadeUp">{$boxes_title}</h3>
        <div class="small-box-wrapper">
HTML;
get_template_part('template-parts/top-left');
foreach ($info_boxes as $info_box) {
    get_template_part('template-parts/cards/small_box', null, ['box' => $info_box]);
}
get_template_part('template-parts/bottom-right');
echo <<<HTML
            </div>
        </div>
    </section>
HTML;
