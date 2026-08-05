<?php

$section = $args['section'] ?? "";
$anchor = $section['anchor_id'] ?? "";
$title = $section['title'] ?? "";
$intro = $section['intro'] ?? "";
$slides = $section['slides'] ?? "";

echo <<<HTML
    <section class="section projects" id="{$anchor}">
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

            <div class="slider-wrapper">
                <div class="info-block fadeUp">
                    <div class="subtitle"><span>&nbsp;</span></div>
                    <div class="title"><span>&nbsp;</span></div>
                    <div class="text"><span>&nbsp;</span></div>
                </div>
                <div class="right-overlay"></div>
                <div class="left-overlay">
HTML;
get_template_part('template-parts/top-left');
echo <<<HTML
                </div>
                <div class="splide carousel" aria-label="Carousel">
                    <div class="splide__track ">
                        <ul class="splide__list">
HTML;
foreach ($slides as $slide) {
    get_template_part('template-parts/cards/slide', null, ['slide' => $slide]);
}
echo <<<HTML
                        </ul>
                    </div>
                     <div class="splide-pagination">
                        <div class="splide-next">
                            <div class="inner-circle"></div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="34.099" height="24.278" viewBox="0 0 34.099 24.278">
                                <g id="Arrow" transform="translate(1.5 2.121)">
                                    <line id="Line_3" data-name="Line 3" x2="30.871" transform="translate(0 10.018)" fill="none" stroke="#8b2332" stroke-linecap="round" stroke-width="3"/>
                                    <path id="Path_255" data-name="Path 255" d="M3370.5,410.582l10.552-10.018L3370.5,390.545" transform="translate(-3349.953 -390.545)" fill="none" stroke="#8b2332" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </section>
HTML;
