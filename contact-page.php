<?php

/*
  Template Name: Contact Page
 */

if(is_user_logged_in() && isset($_GET['logout']) && esc_attr($_GET['logout'])=='true'){
    wp_logout();
    wp_safe_redirect(home_url('/'));
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            leave_message();
        } catch (Exception $ex) {
            $json = array("message" => __("Echec d'envoi du message", 'si-ogivedomain'));
            return wp_send_json_error($json);
        }
    }else{
        wp_safe_redirect(the_permalink());
    }
}

get_header(); 

get_template_part('content-contact-page'); 

get_footer(); 