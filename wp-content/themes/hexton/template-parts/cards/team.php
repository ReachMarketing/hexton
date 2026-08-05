<?php

$team = $args['team'] ?? "";

$image = $team['image'] ?? "";
$name = $team['name'] ?? "";
$role = $team['role'] ?? "";

echo <<<HTML
    <div class="team-profile">
        <div class="team-image">
            <img src="{$image['sizes']['md']}" alt="profile image of {$name}" />
        </div>
        <div class="name-panel">
            <div class="name">
                {$name}
            </div>
            <div class="role">
                {$role}
            </div>
        </div>
    </div>
HTML;
