<?php

/*
  Template Name: Profile Page
 */

if (is_user_logged_in()) {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_login = removeslashes(esc_attr(trim($_POST['username'])));
        $user_email = removeslashes(esc_attr(trim($_POST['email'])));
        $first_name = removeslashes(esc_attr(trim($_POST['first_name'])));
        $last_name = removeslashes(esc_attr(trim($_POST['last_name'])));

        $user_data = array(
            'user_login' => $user_login,
            'user_email' => $user_email,
            'first_name' => $first_name,
            'last_name' => $last_name,
        );
        update_user($user_data);
    } else {
        global $current_user;
        $user_login = $current_user->user_login;
        $user_pass = $gender = get_user_meta($current_user->ID, 'plain-text-password', true);
        $user_email = $current_user->user_email;
        $first_name = $current_user->user_firstname;
        $last_name = $current_user->user_lastname;
        get_header();

        include(locate_template('content-profile-page.php'));

        get_footer();
    }
} else {
    wp_safe_redirect(home_url('/'));
    exit;
}