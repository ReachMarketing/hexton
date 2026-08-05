<?php

$section = $args['section'] ?? "";
$anchor = $section['anchor_id'] ?? "";
$title = $section['title'] ?? "";
$intro = $section['intro'] ?? "";
$content = $section['content'] ?? "";
$images = $section['images'] ?? "";

echo <<<HTML
    <section class="section who-we-are" id="{$anchor}">
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

            <div class="image image1 fadeIn">
                <img src="{$images[0]['image']['sizes']['xl']}" alt="Image representing Hexton Construction - {$title}" />
HTML;

get_template_part('template-parts/bottom-right');

echo <<<HTML
            </div>
        </div>

        <div class="right-column">
            <div class="image image2 fadeIn">
                <img src="{$images[1]['image']['sizes']['xl']}" alt="Image representing Hexton Construction - {$title}" />
HTML;

get_template_part('template-parts/top-left');

echo <<<HTML
            </div>
        </div>

        </div>
    </section>
HTML;
