<?php

session_start();

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        apply_job(get_the_ID());
        //$_SESSION['success_message'] = "Votre candidature a été envoyée avec succès. \n Vous serez contacter par mail ou appel téléphonique dès l'examination de votre candidature.";
    } catch (Exception $ex) {
       $_SESSION['error_message'] = "Une erreur s'est produite lors de l'envoi de votre candidature. Verifiez vos informations puis réessayez à nouveau";
    }
    wp_safe_redirect(get_the_permalink());
    exit();
} 
get_header();

get_template_part('content-single-job');

get_footer();
