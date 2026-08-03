<?php

$section = $args['section'] ?? "";
$red_box_text = $section['red_box_text'] ?? "";
$title = $section['title'] ? '<h2 class="title fadeUp">' . $section['title'] . '</h2>' : "";
$boxes = $section['info_boxes'] ?? "";

echo <<<HTML
    <section class="intro">
        <div class="inner-section">
            <div class="red-box fadeUpParagraphs">
                {$red_box_text}
            </div>
            {$title}

            <div class="box-wrapper">
HTML;
get_template_part('template-parts/top-left');
if ($boxes) {
    foreach ($boxes as $box) {
        get_template_part('template-parts/cards/box', null, ['box' => $box]);
    }
}
get_template_part('template-parts/bottom-right');

echo <<<HTML
            </div>
        </div>
    </section>
HTML;
