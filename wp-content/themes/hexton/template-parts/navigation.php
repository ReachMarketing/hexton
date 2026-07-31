<?php

$type = $args['type'] ?? "header";
$links = "";
$sections = get_field('page_builder');
foreach ($sections as $section) {
    if (array_key_exists('navigation_text', $section)) {
        if ($section['anchor_id'] == "contactus" && $type == 'footer') {
            $links .= "";
        } else {
            $links .= '<li class="menu-item"><a href="#' . $section['anchor_id'] . '">' . $section['navigation_text'] . '</a></li>';
        }
    }
}

echo <<<HTML
    <ul class="navigation {$type}">
        {$links}
    </ul>
HTML;
