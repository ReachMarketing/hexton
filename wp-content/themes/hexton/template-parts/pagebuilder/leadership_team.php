<?php

$section = $args['section'] ?? "";
$anchor = $section['anchor_id'] ?? "";
$title = $section['title'] ?? "";
$teams = $section['team'] ?? "";

echo <<<HTML
    <section class="section leadership-team" id="{$anchor}">
        <div class="inner-section">
HTML;

get_template_part('template-parts/section_title', null, ['title' => $title]);

echo <<<HTML
        <h2 class="section-title fadeIn">
            {$title}
        </h2>

        <div class="team">
HTML;

if ($teams) {
    foreach ($teams as $team) {
        get_template_part('template-parts/cards/team', null, ['team' => $team]);
    }
}

echo <<<HTML
        </div>

        </div>
    </section>
HTML;
