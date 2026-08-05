<?php

$box = $args['box'] ?? "";
$icon = $box['icon'] ?? "";
$text = $box['text'] ?? "";
$template = get_bloginfo('template_url');
$image = get_bloginfo('template_url') . '/images/' . $icon . '.png';

echo <<<HTML

<div class="info-box small-box boxFade {$icon}">
    <div class="inner-box">
        <div class="icon">
            <img src="{$image}" alt="icon for {$text}" />
        </div>
        <div class="text">
            {$text}
        </div>
    </div>
</div>

HTML;
