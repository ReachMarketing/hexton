<?php

$box = $args['box'] ?? "";
$icon = $box['icon'] ?? "";
$text = $box['text'] ?? "";
$template = get_bloginfo('template_url');
$svg = file_get_contents(get_bloginfo('template_url') . '/images/' . $icon . '.svg');

echo <<<HTML

<div class="info-box box {$icon}">
    <div class="inner-box">
        <div class="icon">
            {$svg}
        </div>
        <div class="text">
            {$text}
        </div>
    </div>
</div>

HTML;
