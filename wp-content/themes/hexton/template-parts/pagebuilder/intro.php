<?php

$section = $args['section'] ?? "";
$red_box_text = $section['red_box_text'] ?? "";
$title = $section['title'] ? '<h2 class="title">' . $section['title'] . '</h2>' : "";
$boxes = $section['info_boxes'] ?? "";

echo <<<HTML
    <section class="intro">
        <div class="inner-section">
            <div class="red-box">
                {$red_box_text}
            </div>
            {$title}
        </div>
    </section>
HTML;
