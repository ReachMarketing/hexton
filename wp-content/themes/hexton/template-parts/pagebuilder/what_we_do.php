<?php

$section = $args['section'] ?? "";
$anchor = $section['anchor_id'] ?? "";
$title = $section['title'] ?? "";
$intro = $section['intro'] ?? "";
$content = $section['content'] ?? "";
$images = $section['images'] ?? "";

echo <<<HTML
    <section class="section what-we-do" id="{$anchor}">
        <div class="inner-section">
HTML;

get_template_part('template-parts/section_title', null, ['title' => $title]);

echo <<<HTML
        <div class="intro-text">
            {$intro}
        </div>

        </div>
    </section>
HTML;
