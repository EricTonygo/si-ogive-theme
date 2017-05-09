<?php

/*
  Template Name: Additives Page
 */

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $reference = removeslashes(esc_attr(trim($_POST['reference'])));
    $subject = removeslashes(esc_attr(trim($_POST['subject'])));
    $domain = removeslashes(esc_attr(trim($_POST['main_domain'])));
    $sub_domain = removeslashes(esc_attr(trim($_POST['sub_domain'])));
    $_files = get_multiple_files($_FILES);
    $additive_files = $_files['additive_files'];
    $additive_files_ids = array();    
    if (!empty($additive_files)) {        
        foreach ($additive_files as $additive_file) {
            $additive_file_id = upload_file_api($additive_file);
            $additive_files_ids[] = $additive_file_id;
        }
    }
    $additive_data = array(
        'reference' => $reference,
        'subject' => $subject,
        'main_domain' => $domain,
        'sub_domain' => $sub_domain,
        'additive_files_ids' => $additive_files_ids
    );

    $additive_id = saveAdditive($additive_data);
    if (!is_wp_error($additive_id)) {
        $json = array("url" => get_permalink($additive_id));
        return wp_send_json_success($json);
    } else {
        $json = array("url" => "");
        return wp_send_json_error($json);
    }
}