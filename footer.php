<?php

/**
 * Footer For the Theme.
 *
 * @package HUB_WP
 */
?>

</div>
</div>
<?php

get_theme_mod('prefooter-display-setting') ? get_template_part('template-parts/footer/pre_footer') : '';
get_theme_mod('footer-display-setting') ? get_template_part('template-parts/footer/main_footer') : '';
?>
<?php wp_footer(); ?>
</body>

</html>