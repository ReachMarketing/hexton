<?php

$slide = $args['slide'] ?? "";
$image = $slide['image'] ?? "";
$subtitle = $slide['subtitle'] ?? "";
$title = $slide['title'] ?? "";
$text = $slide['text'] ?? "";

echo <<<HTML

    <li class="splide__slide slide" data-subtitle="{$subtitle}" data-title="{$title}" data-text="{$text}">
        <img src="{$image['sizes']['xl']}" alt="Image of {$subtitle}, {$title}" />
    </li>

HTML;
