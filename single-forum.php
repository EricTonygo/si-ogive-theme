<?php
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        ogive_add_topic_forum(get_the_ID());
        //$_SESSION['success_message'] = "Votre candidature a été envoyée avec succès. \n Vous serez contacter par mail ou appel téléphonique dès l'examination de votre candidature.";
    } catch (Exception $ex) {
       $_SESSION['error_message'] = "Une erreur s'est produite lors de l'ajout de votre sujet";
    }
    wp_safe_redirect(get_the_permalink());
    exit();
} 
get_header();

get_template_part('content', 'forum'); 

get_footer();
