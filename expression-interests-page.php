<?php

/*
  Template Name: Expressions interest Page
 */

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $reference = removeslashes(esc_attr(trim($_POST['reference'])));
    $subject = removeslashes(esc_attr(trim($_POST['subject'])));
    $domain = removeslashes(esc_attr(trim($_POST['main_domain'])));
    $sub_domain = removeslashes(esc_attr(trim($_POST['sub_domain'])));
    $_files = get_multiple_files($_FILES);
    $expressionInterest_files = $_files['detail_files'];
    $expressionInterest_files_ids = array();    
    if (!empty($expressionInterest_files)) {        
        foreach ($expressionInterest_files as $expressionInterest_file) {
            $expressionInterest_file_id = upload_file_api($expressionInterest_file);
            $expressionInterest_files_ids[] = $expressionInterest_file_id;
        }
    }
    $expressionInterest_data = array(
        'reference' => $reference,
        'subject' => $subject,
        'main_domain' => $domain,
        'sub_domain' => $sub_domain,
        'expression_interest_files_ids' => $expressionInterest_files_ids
    );

    $expressionInterest_id = saveExpressionInterest($expressionInterest_data);
    if (!is_wp_error($expressionInterest_id)) {
        $json = array("url" => get_permalink($expressionInterest_id));
        return wp_send_json_success($json);
    } else {
        $json = array("url" => "");
        return wp_send_json_error($json);
    }
}