<?php

/*
  Template Name: Login Page
 */
session_start();
if (!is_user_logged_in()) {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            if (isset($_POST['_username']) && isset($_POST['_password'])) {
                $user_login = null;
                $login = removeslashes(esc_attr(trim($_POST['_username'])));
                $password = $_POST['_password'];
                if (filter_var($login, FILTER_VALIDATE_EMAIL) && get_user_by('email', $login)) {
                    $user_login = get_user_by('email', $login);
                    $check_password = wp_check_password($password, $user_login->data->user_pass, $user_login->ID);
                    $state = get_user_meta($user_login->ID, 'state', true);
                    $expired_state = get_user_meta($user_login->ID, 'expired-state', true);
                } elseif (get_user_by('login', $login)) {
                    $user_login = get_user_by('login', $login);
                    $check_password = wp_check_password($password, $user_login->data->user_pass, $user_login->ID);
                    $state = get_user_meta($user_login->ID, 'state', true);
                    $expired_state = get_user_meta($user_login->ID, 'expired-state', true);
                }

                if ($user_login == null) {
                    $json = array("message" => "Utilisateur inexistant ");
                    return wp_send_json_error($json);
                } elseif ($user_login && !$check_password) {
                    $json = array("message" => "Mot de passe incorrect");
                    return wp_send_json_error($json);
                }
                elseif ($user_login && !is_null($expired_state) && $expired_state == "1") {
                    $json = array("message" => "Votre abonnement a expiré");
                    return wp_send_json_error($json);
                } elseif ($user_login && !is_null($state) && $state == "0") {
                    $json = array("message" => "Votre abonnement a été désactivé");
                    return wp_send_json_error($json);
                } 
                else {
                    if (isset($_POST['no_redirect']) && $_POST['no_redirect'] == "true") {
                        $remember = removeslashes(esc_attr(trim($_POST['_remember'])));
                        if ($remember && $remember == 'true') {
                            $remember = true;
                        } else {
                            $remember = false;
                        }
                        $creds = array('user_login' => $user_login->data->user_login, 'user_password' => $password, 'remember' => $remember);
                        $secure_cookie = is_ssl() ? true : false;
                        $user = wp_signon($creds, $secure_cookie);
                    }
                    $json = array("message" => "Ajout possible");
                    return wp_send_json_success($json);
                }
            } else {
                $json = array("message" => "Saisir le nom d'utilisateur et le mot de passe");
                return wp_send_json_error($json);
            }
        } elseif (isset($_POST['_username']) && isset($_POST['_password'])) {
            $username = removeslashes(esc_attr(trim($_POST['_username'])));
            $password = $_POST['_password'];
            $remember = removeslashes(esc_attr(trim($_POST['_remember'])));
            $redirect_to = $_POST['redirect_to'];
            signin($username, $password, $remember, $redirect_to);
        }
    } else {
        get_header();

        get_template_part('content-login-page', get_post_format());

        get_footer();
    }
} else {
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $json = array("message" => "Vous êtes déjà connecté en tantqu'un utilisateur!");
        return wp_send_json_error($json);
    }
    wp_safe_redirect(home_url('/'));
}
