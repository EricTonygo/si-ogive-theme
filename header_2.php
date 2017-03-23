<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <title>SI OGIVE - <?php the_title() ?></title>
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/img/favicon.ico">
        <?php wp_head(); ?>

    </head>
    <body>
        <div id="top"></div>
        <!-- Progress bar area -->
        <div class="progress bar"></div>
        <a href="#top" class="ui circular icon button" id="toTop" data-slide="slide">
            <i class="angle up icon"></i>
        </a>

        <!-- Navbar fixed top area -->
        <div class="ui fixed top menu">
            <div class="left menu">
                <a href="<?php echo home_url('/') ?>" id="logo" ><img class="ui small image" src="<?php echo get_template_directory_uri() ?>/assets/img/logo_ogive.PNG"></a>
            </div>
            <div class="center menu">
                <a href="<?php echo home_url('/') ?>" class="<?php if(is_front_page()):?> myactive <?php endif ?> item"><?php echo __('Accueil', 'si-ogivedomain') ?></a>
                <div class="ui dropdown top left pointing <?php if(is_singular('area-expertise')):?> myactive <?php endif ?> item">
                    <?php echo __("Domaines de compétence", 'si-ogivedomain'); ?>
                    <div class="menu">
                        <?php
                        $areas_expertise = new WP_Query(array('post_type' => 'area-expertise', 'post_per_page' => -1, "post_status" => 'publish', 'orderby' => 'post_date', 'order' => 'ASC'));
                        if($areas_expertise->have_posts()){
                             while ($areas_expertise->have_posts()): $areas_expertise->the_post();
                            ?>
                            <a href="<?php the_permalink() ?>" class="ui item"> <?php the_title(); ?></a>
                        <?php endwhile; 
                        wp_reset_postdata();
                        } ?>
                    </div>
                </div>
                <a href="" class="icon item logo" id="trigger"><i class="sidebar icon"></i></a>
                <div class="ui dropdown top left pointing <?php if(is_page(__('notre-vision', 'si-ogivedomain')) || is_page(__('a-propos-de-si-ogive', 'si-ogivedomain')) || is_page(__('nous-contacter', 'si-ogivedomain'))):?>myactive<?php endif ?> item">
                    SI OGIVE
                    <div class="menu">
                        <a href="<?php echo get_permalink(get_page_by_path(__('notre-vision', 'si-ogivedomain'))) ?>" class="ui item"> <?php echo get_page_by_path(__('notre-vision', 'si-ogivedomain'))->post_title ?> </a>
                        <a href="<?php echo get_permalink(get_page_by_path(__('a-propos-de-si-ogive', 'si-ogivedomain'))) ?>" class="ui item"> <?php echo get_page_by_path(__('a-propos-de-si-ogive', 'si-ogivedomain'))->post_title ?> </a>
                        <a href="<?php echo get_permalink(get_page_by_path(__('nous-contacter', 'si-ogivedomain'))) ?>" class="ui item"> <?php echo get_page_by_path(__('nous-contacter', 'si-ogivedomain'))->post_title ?> </a>
                    </div>
                </div>
                <div class="ui dropdown top left pointing <?php if(is_singular('service')):?> myactive <?php endif ?> item">
                    <?php echo __("NOS SERVICES", 'si-ogivedomain'); ?>
                    <div class="menu">
                        <?php
                        $services = new WP_Query(array('post_type' => 'service', 'post_per_page' => -1, "post_status" => 'publish', 'orderby' => 'post_date', 'order' => 'ASC'));
                        if($services->have_posts()){
                        while ($services->have_posts()): $services->the_post();
                            ?>
                            <a href="<?php the_permalink() ?>" class="ui item"> <?php the_title() ?></a>
                        <?php endwhile;
                        wp_reset_postdata();
                        }?>
                    </div>
                </div>
            </div>
            <div class="right menu">
                <div class="ui dropdown top right pointing item">
                    <i class="world icon"></i>
                    <div class="menu">
                        <a class="ui item">
                            <i class="gb flag"></i>Anglais
                        </a>
                        <a class="ui item">
                            <i class="fr flag"></i>Français
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Collapse Navbar Menu -->
        <div class="ui fluid vertical menu collapse">
        </div>
        
        <div id="message_success" class="ui success message" style="position: fixed; top: 5em; right: 40em; left: auto; z-index: 5; width: 25em; display: none">
                <i class="close icon"></i>
                <div class="header"></div>
            </div>

            <div id="message_error" class="ui error message" style="position: fixed; top: 5em; right: 40em; left: auto; z-index: 5; width: 25em; display: none">
                <i class="close icon"></i>
                <div class="header"> </div>
            </div>