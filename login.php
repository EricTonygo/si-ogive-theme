<?php

/*
  Template Name: Login Page
 */

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    
    login();
} else {
    wp_safe_redirect(home_url('/'));
}

