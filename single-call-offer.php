<?php

session_start();
if (is_user_logged_in()) {
    get_header();

    get_template_part('content-single-procedure');

    get_footer();
} else {
    $_SESSION['redirect_to'] = get_the_permalink();
    wp_safe_redirect(get_permalink(get_page_by_path(__('connexion', 'siogive'))));
}
