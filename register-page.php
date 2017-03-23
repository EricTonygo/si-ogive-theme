<?php

/*
  Template Name: Resgister Page
 */
if (!is_user_logged_in()) {
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        register_user();
        
    } elseif (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

        register_user();
    }
    get_header();

    get_template_part('content-register-page', get_post_format());

    get_footer();
}else{
    wp_safe_redirect(home_url('/'));
    exit;
}