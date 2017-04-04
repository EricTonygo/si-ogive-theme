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
                                        <i class="settings icon"></i>
                                        <div class="content content_area_expertise">
                                            <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
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
                <a href="<?php echo get_permalink(get_page_by_path(__('offres-demploi', 'si-ogivedomain'))) ?>" class="item" style="text-transform: uppercase;"><strong><?php echo get_page_by_path(__('offres-demploi', 'si-ogivedomain'))->post_title ?></strong></a>
                <?php
                $categories = get_term_children(get_category_by_slug('offres-d-emploi')->term_id, 'category');
                foreach ($categories as $id) : $category = get_term_by('id', $id, 'category')
                    ?>
                    <a href="<?php echo get_category_link($category->term_id) ?>" class="<?php if (is_category($category->term_id)): ?> header <?php endif ?> item"> <?php echo $category->name ?>(<?php echo $category->count ?>) </a>
<?php endforeach; ?>
            </div>
            <div class="ui fluid vertical menu moderns">
                <div class="item" style="text-transform: uppercase;"><strong><?php echo __('Nos coordonnées', 'si-ogivedomain') ?></strong></div>
                <div  class="item"><i class="mail outline icon"></i> Siège social Yaoundé BP: 5253</div>
                <div  class="item"><i class="marker icon"></i> Situé à la Nouvelle route Bastos face Ariane TV Rue N°1839</div>
                <div  class="item"><i class="call icon"></i> (+237) 243804388 / 243803895</div>
                <a href="mailto:<?php echo get_bloginfo('admin_email'); ?>" class="item"><i class="mail icon"></i> <?php echo get_bloginfo('admin_email'); ?></a>
            </div>
        </div>
    </div>
</div>