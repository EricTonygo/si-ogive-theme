<!-- Content area -->
<div class="ui container content">
    <div class="ui stackable doubling grid">
        <!-- Middle Content -->
        <div class="twelve wide column">
            <div align="center">
                <div class="ui horizontal divider"><h2 style="text-transform: uppercase;"><?php echo __("Nos domaines de compétence") ?></h2></div>
                <br>
                <div id="areas_competence" class="ui two column stackable doubling grid center ">
                    <?php
                    $areas_expertise = new WP_Query(array('post_type' => 'area-expertise', 'post_per_page' => -1, "post_status" => 'publish', 'orderby' => 'post_date', 'order' => 'ASC'));
                    if ($areas_expertise->have_posts()) {
                        while ($areas_expertise->have_posts()): $areas_expertise->the_post()
                            ?>
                            <div class="column">
                                <div class="ui segment">
                                    <h2 class="ui icon header">
                            <!--<i class="settings icon"></i>-->
                                        <?php if (has_post_thumbnail()): ?>
                                            <a class="ui small image" href="<?php the_permalink() ?>">
                                                <img src="<?php the_post_thumbnail_url('full'); ?>">
                                            </a>
                                        <?php endif ?>
                                        <div class="content content_area_expertise">
                                            <a class="area_expertise_link" href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                        </div>
                                    </h2>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    }
                    ?>            
                </div>             
            </div>
        </div>
        <!-- Right Sidebar -->
        <div class="four wide column">
            <div class="ui fluid vertical menu moderns">
                <div class="header item" style="text-transform: uppercase;"><strong><?php echo __('Domaines de compétence', 'siogivedomain') ?></strong></div>
                <?php
                $post_id = get_the_ID();
                $areas_expertise = new WP_Query(array('post_type' => 'area-expertise', 'post_per_page' => -1, "post_status" => 'publish', 'orderby' => 'post_date', 'order' => 'ASC'));
                if ($areas_expertise->have_posts()) {
                    while ($areas_expertise->have_posts()): $areas_expertise->the_post();
                        ?>
                        <a href="<?php the_permalink() ?>" class="<?php if ($post_id == get_the_ID()): ?>header<?php endif ?> item"> <?php the_title(); ?></a>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                }
                ?>
            </div>

        </div>
    </div>
</div>