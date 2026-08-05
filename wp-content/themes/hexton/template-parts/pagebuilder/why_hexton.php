<?php

$section = $args['section'] ?? "";
$anchor = $section['anchor_id'] ?? "";
$title = $section['title'] ?? "";
$intro = $section['intro'] ?? "";
$content = $section['content'] ?? "";
$image = $section['image'] ?? "";
$info_boxes = $section['info_boxes'] ?? "";

echo <<<HTML
    <section class="section why-hexton" id="{$anchor}">
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
                <div class="fadeUpParagraphs">
                    {$content}
                </div>
            </div>

            <div class="box-wrapper">
HTML;
get_template_part('template-parts/top-left');
if ($info_boxes) {
    foreach ($info_boxes as $box) {
        get_template_part('template-parts/cards/box', null, ['box' => $box]);
    }
}
get_template_part('template-parts/bottom-right');

echo <<<HTML
            </div>

            <div class="image">
                <div class="image fadeIn">
                    <img src="{$image['sizes']['xl']}" alt="Image representing Hexton Construction - {$title}" />
                </div>
            </div>

        </div>
    </section>
HTML;
