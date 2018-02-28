<?php
$categories = get_categories(array('hide_empty' => false, 'orderby' => 'name', 'order' => 'ASC', 'parent' => get_category_by_slug('actualites-conseils')->term_id));
if (!empty($categories)) :
    ?>
    <div class="ui fluid vertical menu moderns">
        <div class="header item" style="text-transform: uppercase;"><strong>Rubriques</strong></div>
        <?php foreach ($categories as $c): $category = get_category($c); ?>
            <div class="item">
                <i class="angle double right middle aligned icon"></i>
                <a href="<?php echo wp_make_link_relative(get_category_link($category->term_id)); ?>" > <?php echo $category->name; ?> </a>
            </div>
            <?php
        endforeach;
        ?>                           
    </div>
<?php endif
?>

<?php
$latest_news = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 5, "post_status" => 'publish', 'category_name' => __('actualites-conseils', 'siogivedomain'), 'orderby' => 'post_date', 'order' => 'DESC'));
if ($latest_news->have_posts()) :
    ?>
    <div class="ui fluid vertical menu moderns">
        <div class="header item" style="text-transform: uppercase;"><strong>Derniers articles</strong></div>
        <?php
        while ($latest_news->have_posts()): $latest_news->the_post()
            ?>
            <div class="item">
                <i class="angle double right middle aligned icon"></i>
                <a href="<?php echo wp_make_link_relative(get_permalink()); ?>" > <?php the_title() ?> </a>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>                   
    </div>
    <?php

 endif ?>
