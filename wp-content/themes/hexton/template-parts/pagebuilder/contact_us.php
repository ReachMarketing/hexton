<?php

$section = $args['section'] ?? "";
$anchor = $section['anchor_id'] ?? "";
$title = $section['title'] ?? "";
$intro = $section['intro'] ?? "";
$phone = $section['phone'] ?? "";
$email = $section['email'] ?? "";

$logo = get_field('white_logo', 'option');
$company = get_field('company_name', 'option');
$address = get_field('address', 'option');
$policies = get_field('policy_links', 'option');
$copyright_notice = get_field('copyright_notice', 'option');
$year = date('Y');



echo <<<HTML
    <section class="contact-us" id="{$anchor}">
        <div class="hexton-h">
            <svg xmlns="http://www.w3.org/2000/svg" width="649.508" height="649.5" viewBox="0 0 649.508 649.5">
                <g id="Group_122" data-name="Group 122" opacity="0.127">
                    <path id="Path_270" data-name="Path 270" d="M0,0V361.632L244.283,117.38V0Z" fill="#fff"/>
                    <path id="Path_271" data-name="Path 271" d="M404.531,0l-.008,164.861L162.64,406.549H.008L0,649.5h243.94L243.886,489l160.847-160.84V649.5H649.508V0Z" transform="translate(0.001)" fill="#fff"/>
                </g>
            </svg>
</div>
        <div class="inner-section">
HTML;

echo <<<HTML
            <div class="left-column">
                <h2 class="section-title fadeIn">
                    {$title}
                </h2>
                <div class="intro-text fadeUpParagraphs">
                    {$intro}
                </div>
            </div>
            <div class="right-column">
                <a class="phone contact-box fadeIn" href="tel:{$phone}">
                    <div class="icon">
                        <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55.9 55.9"><defs><style>.cls-1{fill:#fff;}</style></defs><path id="Path_268" class="cls-1" d="M51.98,55.89c-6.15-.13-12.19-1.68-17.64-4.52-6.42-3.22-12.25-7.49-17.25-12.63-5.12-5.01-9.37-10.83-12.59-17.23C1.67,16.07.13,10.04,0,3.9-.02,2.87.37,1.86,1.09,1.12,1.81.38,2.8-.03,3.83,0h7.06c.98-.02,1.94.3,2.7.92.78.66,1.34,1.54,1.59,2.54l1.66,7.38c.19.87.15,1.77-.12,2.62-.23.75-.68,1.42-1.28,1.94l-7.69,7.02c1.53,2.78,3.26,5.45,5.18,7.98,1.82,2.38,3.78,4.64,5.89,6.78,2.2,2.23,4.58,4.29,7.1,6.16,2.74,2.01,5.6,3.83,8.58,5.46l7.7-7.84c.47-.57,1.09-1,1.8-1.22.74-.17,1.51-.2,2.26-.07l6.12,1.24c1.01.19,1.91.74,2.55,1.54.64.79.98,1.78.97,2.8v6.83c.03,1.03-.38,2.02-1.12,2.73-.75.73-1.76,1.12-2.8,1.09M6.64,20.25l7.38-6.64c.29-.27.48-.63.55-1.02.09-.39.09-.81,0-1.2l-1.71-7.56c-.09-.43-.31-.82-.65-1.11-.34-.26-.77-.39-1.2-.37H3.69c-.35-.02-.7.12-.94.37-.23.25-.36.58-.35.92,0,2.7.37,5.4,1.11,8,.81,2.95,1.86,5.82,3.14,8.6M36.8,49.85c2.55,1.32,5.27,2.27,8.09,2.81,2.42.53,4.88.82,7.36.88.7.02,1.27-.53,1.29-1.23,0-.02,0-.04,0-.06v-7.19c.02-.43-.11-.86-.37-1.2-.29-.33-.68-.56-1.11-.65l-6.18-1.34c-.32-.09-.65-.09-.97,0-.33.13-.63.31-.88.56l-7.24,7.42Z"/></svg>
                    </div>
                    <div class="text">{$phone}</div>
                </a>

                <a class="email contact-box fadeIn" href="mailto:{$email}">
                    <div class="icon">
                        <svg id="Group_118" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62.16 62.16"><defs><style>.cls-1{fill:#fff;}</style></defs><path id="Path_267" class="cls-1" d="M31.08,62.15c-4.16.02-8.28-.81-12.11-2.46-7.44-3.15-13.37-9.08-16.52-16.52C.81,39.36-.02,35.24,0,31.09c-.02-4.16.81-8.29,2.46-12.11C5.61,11.53,11.54,5.61,18.98,2.45,22.79.81,26.91-.03,31.07,0c4.16-.03,8.29.81,12.11,2.46,7.45,3.15,13.38,9.08,16.53,16.53,1.64,3.82,2.47,7.94,2.45,12.1v2.97c.06,2.7-1.01,5.3-2.95,7.18-1.89,1.92-4.5,2.98-7.19,2.92-2.1.03-4.16-.64-5.84-1.9-1.7-1.24-2.97-2.98-3.62-4.98-1.21,2.02-2.88,3.73-4.87,4.98-1.96,1.26-4.25,1.92-6.58,1.9-7.17.06-13.04-5.71-13.1-12.88,0-.07,0-.14,0-.21-.06-7.17,5.72-13.04,12.89-13.09.07,0,.13,0,.2,0,7.17-.06,13.04,5.71,13.09,12.89,0,.07,0,.13,0,.2v2.99c-.02,2.07.83,4.06,2.34,5.48,2.97,3.03,7.83,3.09,10.86.12.04-.04.08-.08.12-.12,1.51-1.42,2.36-3.4,2.34-5.48v-2.99c.14-7.66-2.89-15.04-8.38-20.39-5.35-5.49-12.72-8.52-20.38-8.38-7.66-.14-15.04,2.89-20.39,8.38C5.2,16.03,2.17,23.41,2.31,31.07c-.14,7.66,2.89,15.04,8.38,20.39,5.34,5.49,12.72,8.52,20.38,8.38h17.99v2.31h-17.99M38.71,38.72c2.06-2,3.2-4.76,3.15-7.63.02-5.93-4.76-10.76-10.7-10.79-.03,0-.05,0-.08,0-5.93-.02-10.76,4.77-10.78,10.7,0,.02,0,.05,0,.07-.03,5.93,4.75,10.76,10.68,10.79.03,0,.06,0,.09,0,2.87.05,5.63-1.09,7.64-3.14"/></svg>
                    </div>
                    <div class="text">{$email}</div>
                </a>
            </div>

        </div>

        <div class="footer">
            <div class="left-column">
                <div class="left">
                    <img src="{$logo['url']}" alt="Hexton Construction logo" />
                    <div class="address">
                        <strong>{$company}</strong><br>
                        {$address}
                    </div>
                </div>
                <div class="right">
HTML;
get_template_part('template-parts/navigation', null, ['type' => 'footer-nav']);
echo <<<HTML
                </div>
            </div>
            <div class="right-column">
                <ul class="policies-nav">
HTML;
foreach ($policies as $policy) {
    echo <<<HTML
                    <li class="menu-item"><a href="#null">{$policy['title']}</a></li>
    HTML;
}
echo <<<HTML
                </ul>
            </div>
            <div class="footer-bottom">
                <a href="#top" class="top-link">
                    <svg id="animated-svg" xmlns="http://www.w3.org/2000/svg" width="92" height="101.072" viewBox="0 0 92 101.072">
                        <!-- Group translated down by 20px (from 8836.072 to 8856.072) to eliminate bottom whitespace and reserve top space for movement -->
                        <g id="Group_146" data-name="Group 146" transform="translate(266 8856.072) rotate(180)">
                            
                            <!-- Group wrappers for GSAP targets -->
                            <g id="Layer_2">
                            <path id="Polygon_2" data-name="Polygon 2" d="M46,0,92,52H0Z" transform="translate(266 8836.072) rotate(180)" fill="#8b2332"/>
                            </g>
                            
                            <g id="Layer_1">
                            <path id="Polygon_1" data-name="Polygon 1" d="M46,0,92,45.069H0Z" transform="translate(266 8818.072) rotate(180)" fill="#e2231a"/>
                            </g>
                            
                            <g id="Layer_3">
                            <path id="Polygon_3" data-name="Polygon 3" d="M46,0,92,45H0Z" transform="translate(266 8800) rotate(180)" fill="#fff"/>
                            </g>

                        </g>
                    </svg>
                </a>

                <div class="copyright">
                    <div>&copy;{$copyright_notice} {$year}</div>
                    <div>|</div>
                    <div>Design &amp; build <a href="https://reachmarketing.co.uk" target="_blank">reachmarketing.co.uk</a></div>
                </div>
            </div>
        </div>
    </section>
HTML;
