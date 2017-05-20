<?php

/*
  Template Name: Call offers Page
 */

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $reference = removeslashes(esc_attr(trim($_POST['reference'])));
    $subject = removeslashes(esc_attr(trim($_POST['subject'])));
    $domain = removeslashes(esc_attr(trim($_POST['main_domain'])));
    $sub_domain = removeslashes(esc_attr(trim($_POST['sub_domain'])));
    $_files = get_multiple_files($_FILES);
    $callOffer_files = $_files['detail_files'];
    $callOffer_files_ids = array();    
    if (!empty($callOffer_files)) {        
        foreach ($callOffer_files as $callOffer_file) {
            $callOffer_file_id = upload_file_api($callOffer_file);
            $callOffer_files_ids[] = $callOffer_file_id;
        }
    }
    $call_offer_data = array(
        'reference' => $reference,
        'subject' => $subject,
        'main_domain' => $domain,
        'sub_domain' => $sub_domain,
        'call_offer_files_ids' => $callOffer_files_ids
    );

    $callOffer_id = saveCallOffer($call_offer_data);
    if (!is_wp_error($callOffer_id)) {
        $json = array("url" => get_permalink($callOffer_id));
        return wp_send_json_success($json);
    } else {
        $json = array("url" => "");
        return wp_send_json_error($json);
    }
}