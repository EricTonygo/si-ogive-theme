<?php

/*
  Template Name: Assignments Page
 */

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $reference = removeslashes(esc_attr(trim($_POST['reference'])));
    $subject = removeslashes(esc_attr(trim($_POST['subject'])));
    $domain = removeslashes(esc_attr(trim($_POST['main_domain'])));
    $sub_domain = removeslashes(esc_attr(trim($_POST['sub_domain'])));
    $_files = get_multiple_files($_FILES);
    $assignment_files = $_files['detail_files'];
    $assignment_files_ids = array();    
    if (!empty($assignment_files)) {        
        foreach ($assignment_files as $assignment_file) {
            $assignment_file_id = upload_file_api($assignment_file);
            $assignment_files_ids[] = $assignment_file_id;
        }
    }
    $assignment_data = array(
        'reference' => $reference,
        'subject' => $subject,
        'main_domain' => $domain,
        'sub_domain' => $sub_domain,
        'assignment_files_ids' => $assignment_files_ids
    );

    $assignment_id = saveAssignment($assignment_data);
    if (!is_wp_error($assignment_id)) {
        $json = array("url" => get_permalink($assignment_id));
        return wp_send_json_success($json);
    } else {
        $json = array("url" => "");
        return wp_send_json_error($json);
    }
}