<?php

/*
  Template Name: Resgister Page
 */

if (!is_user_logged_in()) {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_login = str_replace("+", "", removeslashes(esc_attr(trim($_POST['username']))));
        $user_pass = esc_attr($_POST['password']);
        $user_email = removeslashes(esc_attr(trim($_POST['email'])));
        $first_name = removeslashes(esc_attr(trim($_POST['first_name'])));
        $last_name = removeslashes(esc_attr(trim($_POST['last_name'])));
        $state = removeslashes(esc_attr(trim($_POST['state'])));
        $expired_state = removeslashes(esc_attr(trim($_POST['expired_state'])));
        $sign_user_after = removeslashes(esc_attr(trim($_POST['sign_user_after'])));

        $user_data = array(
            'user_login' => $user_login,
            'user_pass' => $user_pass,
            'user_email' => $user_email,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'state' => $state,
            'expired_state' => $expired_state
        );
        if (isset($_POST['action']) && ($_POST['action'] == 'enable' || $_POST['action'] == 'disable')) {
            $user = get_user_by('email', $user_email);
            if ($user) {
                enable_disable_user_api($user->ID, $user_data);
            } else {
                register_user_api($user_data);
            }
        } elseif (isset($_POST['action']) && $_POST['action'] == 'update') {
            $user = get_user_by('email', $user_email);
            if ($user) {
                update_user_api($user->ID, $user_data);
            } else {
                register_user_api($user_data);
            }
        } else {
            $unique_user_email = get_user_by('email', $user_email);
            $unique_user_login = get_user_by('login', $user_login);
            if ($unique_user_login) {
                $json = array("message" => "Un utilisateur avec ce pseudo existe déjà veuillez le modifier");
                return wp_send_json_error($json);
            } elseif ($unique_user_email) {
                $json = array("message" => "Un utilisateur avec cet email existe déjà veuillez le modifier");
                return wp_send_json_error($json);
            } else {
                if ($sign_user_after == "yes") {
                    register_user($user_data);
                } else {
                    register_user_api($user_data);
                }
            }
        }
    } else {
        get_header();

        get_template_part('content-register-page', get_post_format());

        get_footer();
    }
} else {
    wp_safe_redirect(home_url('/'));
    exit;
}