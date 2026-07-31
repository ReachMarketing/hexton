<?php
$sections = get_field('page_builder');
foreach ($sections as $section) {
    if (array_key_exists('navigation_text', $section)) {
        echo '<section class="temp" id="' . $section['anchor_id'] . '">' . $section['title'] . '</section>';
    }
}
?>

<footer>
    
</footer>
<?php wp_footer(); ?>
</body>
</html>