<?php

session_start();
$firstname = removeslashes(esc_attr(trim($_POST['firstname'])));
$lastname = removeslashes(esc_attr(trim($_POST['lastname'])));
$email = removeslashes(esc_attr(trim($_POST['email'])));
$phone = removeslashes(esc_attr(trim($_POST['phone'])));
$address = removeslashes(esc_attr(trim($_POST['address'])));
$country = removeslashes(esc_attr(trim($_POST['country'])));
$qualifications = removeslashes(esc_attr(trim($_POST['qualifications'])));
$lastdiploma = removeslashes(esc_attr(trim($_POST['lastdiploma'])));
$skills = removeslashes(esc_attr(trim($_POST['skills'])));
$experience = removeslashes(esc_attr(trim($_POST['experience'])));
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $application_data = array(
        "firstname" => $firstname,
        "lastname" => $lastname,
        "email" => $email,
        "phone" => $phone,
        "address" => $address,
        "country" => $country,
        "qualifications" => $qualifications,
        "lastdiploma" => $lastdiploma,
        "skills" => $skills,
        "experience" => $experience
    );
    try {
        apply_job(get_the_ID(), $application_data);
        //$_SESSION['success_message'] = "Votre candidature a été envoyée avec succès. \n Vous serez contacter par mail ou appel téléphonique dès l'examination de votre candidature.";
    } catch (Exception $ex) {
        $_SESSION['error_message'] = "Une erreur s'est produite lors de l'envoi de votre candidature. Verifiez vos informations puis réessayez à nouveau";
    }
    get_header();

    include(locate_template('content-single-job.php'));
    if (isset($_SESSION['success_message'])) {
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['error_message'])) {
        unset($_SESSION['error_message']);
    }
    get_footer();

    
} else {
    if (isset($_SESSION['success_message'])) {
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['error_message'])) {
        unset($_SESSION['error_message']);
    }
    get_header();

    get_template_part('content-single-job');

    get_footer();
}
