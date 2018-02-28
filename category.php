<?php

get_header();

if (cat_is_ancestor_of(get_category_by_slug(__('actualites-conseils', 'booksharedomain'))->term_id, get_category(get_query_var('cat'))->term_id)) {
    $category_posts = new WP_Query(array('posts_per_page' => 6, "post_status" => 'publish', 'orderby' => 'post_date', 'category_name' => get_category(get_query_var('cat'))->slug, 'order' => 'DESC'));
    include(locate_template('content-post-category-page.php'));
} elseif(cat_is_ancestor_of(get_category_by_slug(__('offres-d-emploi', 'booksharedomain'))->term_id, get_category(get_query_var('cat'))->term_id)) {
    get_template_part('content-category-page');
}

get_footer();
?>