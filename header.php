<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        
        <meta name="author"content="SIOGIVE">
        <meta name="company" itemprop="name" content="SI OGIVE">
        <meta name="keywords" content="société, ingénieurie, ogive, siogive, marchés publics, solutions, experts"/>
        <meta name="robots" content="index, follow">
        <meta property="robots" content="index, follow">
        <meta name="description" content="Ingénieurie des marchés publics." >
        
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="SIOGIVE">  
        <meta property="og:url" content="<?php the_permalink(); ?>">
        <meta property="og:title" content="SIOGIVE | Société d'ingénieurie OGIVE.">
        <meta property="og:description" content="Ingénieurie des marchés publics.">
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/siogive.png">

        <meta name="twitter:card" content="summary">
        <meta name="identifier-url" content="<?php home_url(); ?>" >
        <meta name="copyright" content="SIOGIVE">
        <meta name="twitter:url" content="<?php the_permalink(); ?>">
        <meta name="twitter:title" content="SIOGIVE | Société d'ingénieurie OGIVE.">
        <meta name="twitter:description" content="Ingénieurie des marchés publics.">
        <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/siogive.png">
        
        <title><?php if (is_home()) {
                echo __("Blog", "gpdealdomain");
            }elseif (is_category()) {
                echo get_category(get_query_var('cat'))->name;
            }else { the_title(); }?> - SI OGIVE</title>
        <link rel="shortcut icon" href="/favicon.ico">
        <?php wp_head(); ?>
    </head>
    <body>
        <div id="top"></div>
        <!-- Progress bar area -->
        <div class="progress bar"></div>
        <a href="#top" class="ui circular icon button" id="toTop" data-slide="slide">
            <i class="angle up icon"></i>
        </a>
        
        <div id='mobile_menu' class="ui main fixed top menu" style="display: none;">
            <div class="ui container top-nav">
                <div class="left menu">
                    <a id="sidebar_menu_item" class="ui item hidden"><i class="large sidebar icon"></i></a>
                    <a id='remove_menu_item' class="ui item" style="display:none"><i class="large remove icon"></i></a>
                    <a href="<?php echo home_url('/') ?>" id="logo" ><img id="logo_img" class="ui small image" src="<?php echo get_template_directory_uri() ?>/assets/img/logo_ogive.png"></a>
                </div>
            </div>
        </div>

        <!-- Navbar fixed top area -->
        <div id='desktop_menu' class="ui main fixed top menu">
            <div class="ui container top-nav">
                <div class="left menu">
                    <a href="<?php echo home_url('/') ?>" id="logo" ><img id="logo_img" class="ui small image" src="<?php echo get_template_directory_uri() ?>/assets/img/logo_ogive.png"></a>
                </div>
                <div class="center menu">
                    <div class="item">
                        <form id="search_input_top_form" action="<?php echo home_url('/') ?>" method="GET">
                            <?php if (is_user_logged_in()): ?>
                                <div id="search_input_top" class="ui action input" style="width: 35em">
                                    <div class="ui input right icon s" style="width: 35em">
                                        <i class="remove link icon s" <?php if (!isset($_GET['s'])): ?> style="display: none;" <?php endif ?> clearable_id='s'></i>
                                        <input id='s' type="text" class="clearable" placeholder="Rechercher dans le site ..." name="s" value="<?php
                                        if (isset($_GET['s'])) {
                                            echo stripslashes($_GET['s']);
                                        }
                                        ?>" autocomplete="off">
                                    </div>
                                    <button id="submit_search_input_top" type="submit" class="ui brown button"><i class="search icon"></i></button>
                                </div>
                            <?php else: ?>
                                <div id="search_input_top" class="ui action input" style="width: 35em">
                                    <div class="ui input right icon s" style="width: 35em">
                                        <i class="remove link right icon s" <?php if (!isset($_GET['s'])): ?> style="display: none;" <?php endif ?> clearable_id='s'></i>
                                        <input id='s' type="text" class="clearable" placeholder="Rechercher dans le site ..." name="s" value="<?php
                                        if (isset($_GET['s'])) {
                                            echo stripslashes($_GET['s']);
                                        }
                                        ?>" autocomplete="off">
                                    </div>
                                    <button id="submit_search_input_top" type="submit" class="ui brown button"><i class="search icon"></i></button>
                                </div>
                            <?php endif ?>
                        </form>
                    </div>
                </div>
                <div class="right menu">

                    <?php
                    if (is_user_logged_in()):
                        $current_user = wp_get_current_user();
                        ?>                    
                        <a href="<?php echo esc_url(add_query_arg(array('logout' => 'true'), home_url('/'))) ?> " class="item">
                                    <i class="sign out icon"></i>
                                    <?php echo __('Se déconnecter', 'siogivedomain') ?>
                                </a>
                    <?php else: ?>
                        <a href="<?php echo get_permalink(get_page_by_path(__('connexion', 'siogivedomain'))) ?>" class=" item"> 
                            <i class="sign in icon"></i><?php _e("Se connecter", "siogivedomain"); ?>                            
                        </a>
                        <a href="<?php echo get_permalink(get_page_by_path(__('inscription', 'siogivedomain'))) ?>" class="item">
                            <i class="add user icon"></i><?php echo __("S'inscrire", 'siogivedomain') ?>
                        </a>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div id="second_desktop_menu" class="ui secondary fixed pointing menu">
            <div class="ui container">
                <a href="<?php echo home_url('/') ?>" class="<?php if (is_front_page()): ?>active<?php endif ?> item">
                    <i class="large home icon" style="margin: 0"></i>
                </a>
                <a href="<?php echo get_permalink(get_page_by_path(__('a-propos-de-siogive', 'siogivedomain'))) ?>" class="<?php if (is_page(__('a-propos-de-siogive', 'siogivedomain'))): ?>active<?php endif ?> item"> <?php echo __("A PROPOS", "siogivedomain"); ?> </a>
                <a href="<?php echo get_permalink(get_page_by_path(__('notre-vision', 'siogivedomain'))) ?>" class="<?php if (is_page(__('notre-vision', 'siogivedomain'))): ?>active<?php endif ?> item"> <?php echo get_page_by_path(__('notre-vision', 'siogivedomain'))->post_title ?> </a>
                <a href="<?php echo get_permalink(get_page_by_path(__('domaines-de-competence', 'siogivedomain'))) ?>" class="<?php if (is_page(__('domaines-de-competence', 'siogivedomain')) || is_singular('area-expertise')): ?>active<?php endif ?> item" style="text-transform: uppercase;"> <?php _e("Domaines de compétence", "siogivedomain"); ?></a>
                <a href="<?php echo get_permalink(get_page_by_path(__('offres-demploi', 'siogivedomain'))) ?>" class="<?php if (is_page(__('offres-demploi', 'siogivedomain')) || cat_is_ancestor_of(get_category_by_slug(__('offres-d-emploi', 'booksharedomain'))->term_id, get_category(get_query_var('cat'))->term_id) || is_singular('job')): ?>active<?php endif ?> item"> <?php echo __("OFFRES D'EMPLOI", "siogivedomain"); ?>  </a>
                <a href="<?php echo get_permalink(get_page_by_path(__('forums', 'siogivedomain'))) ?>" class="<?php if (bbp_is_forum_archive() || bbp_is_single_forum() || bbp_is_single_topic()): ?>active<?php endif ?> item"><?php echo __("FORUMS", "siogivedomain") ?></a>
                <a href="<?php echo get_permalink(get_page_by_path(__('blog', 'siogivedomain'))) ?>" class="<?php if (is_home() || cat_is_ancestor_of(get_category_by_slug(__('actualites-conseils', 'booksharedomain'))->term_id, get_category(get_query_var('cat'))->term_id) || is_singular('post')): ?>active<?php endif ?> item"> <?php echo __("BLOG", "siogivedomain"); ?>  </a>
                <div id="services_dropdown" class="ui dropdown <?php if (is_singular('service')): ?>active<?php endif ?> item" style="margin-left: 0;">
                    <?php  _e("SERVICES", "siogivedomain");?>
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <?php
                            $services = new WP_Query(array('post_type' => 'service', 'post_per_page' => -1, "post_status" => 'publish', 'orderby' => 'post_date', 'order' => 'ASC'));
                            if ($services->have_posts()) {
                                while ($services->have_posts()): $services->the_post();
                                    ?>
                                    <a href="<?php the_permalink() ?>" class="item"> <?php the_title() ?></a>
                                    <?php
                                endwhile;
                                wp_reset_postdata();
                            }
                            ?>
                    </div>
                </div>
                <a href="<?php echo get_permalink(get_page_by_path(__('nous-contacter', 'siogivedomain'))) ?>" class="<?php if (is_page(__('nous-contacter', 'siogivedomain'))): ?>active<?php endif ?> item"> <?php echo __("CONTACT", "siogivedomain") ?> </a>
            </div>
        </div>

        <!-- Sub main menu -->
        <div id='sub_main_menu' class="ui fixed menu" style="display: none;">
            <div class="ui container">
                <div id='menu_grid_column_container' class="ui four column stackable relaxed equal divided height grid">
                    <div class="column">
                        <div class="ui link list">
                            <a href="<?php echo home_url('/') ?>" class="item"><?php echo __("ACCUEIL", "siogivedomain"); ?></a>
                            <?php if (!is_user_logged_in()): ?>       
                                <a href="<?php echo get_permalink(get_page_by_path(__('connexion', 'siogivedomain'))) ?>" class="item"><?php echo __("Se connecter", 'siogivedomain') ?></a>
                                <a href="<?php echo get_permalink(get_page_by_path(__('inscription', 'siogivedomain'))) ?>" class="item"><?php echo __("S'inscrire", 'siogivedomain') ?></a>
                            <?php else : ?>
                                <a href="<?php echo esc_url(add_query_arg(array('logout' => 'true'), home_url('/'))) ?> " class="item">
                                    <?php echo __('Se déconnecter', 'siogivedomain') ?>
                                </a>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="column">
                        <!--<h4 class="ui header">SI OGIVE</h4>-->
                        <div class="ui link list">
                            <a href="<?php echo get_permalink(get_page_by_path(__('notre-vision', 'siogivedomain'))) ?>" class="ui <?php if (is_page(__('notre-vision', 'siogivedomain'))): ?> myactive <?php endif ?> item"> <?php echo get_page_by_path(__('notre-vision', 'siogivedomain'))->post_title ?> </a>
                            <a href="<?php echo get_permalink(get_page_by_path(__('a-propos-de-siogive', 'siogivedomain'))) ?>" class="ui <?php if (is_page(__('a-propos-de-siogive', 'siogivedomain'))): ?> myactive <?php endif ?> item"> <?php echo get_page_by_path(__('a-propos-de-siogive', 'siogivedomain'))->post_title ?> </a>

                            <a href="<?php echo get_permalink(get_page_by_path(__('domaines-de-competence', 'siogivedomain'))) ?>" class="item" style="text-transform: uppercase;"> <?php _e("Domaines de compétence", "siogivedomain"); ?></a>
                            <a href="<?php echo get_permalink(get_page_by_path(__('nous-contacter', 'siogivedomain'))) ?>" class="ui <?php if (is_page(__('nous-contacter', 'siogivedomain'))): ?> myactive <?php endif ?> item"> <?php echo get_page_by_path(__('nous-contacter', 'siogivedomain'))->post_title ?> </a>
                        </div>
                    </div>

                    <div class="column">
                        <!--<h4 class="ui header">AUTRES SERVICES</h4>-->
                        <div class="ui link list">
                            <?php
                            $services = new WP_Query(array('post_type' => 'service', 'post_per_page' => -1, "post_status" => 'publish', 'orderby' => 'post_date', 'order' => 'ASC'));
                            if ($services->have_posts()) {
                                while ($services->have_posts()): $services->the_post();
                                    ?>
                                    <a href="<?php the_permalink() ?>" class="ui <?php if ($post_id == get_the_ID()): ?> myactive <?php endif ?> item"> <?php the_title() ?></a>
                                    <?php
                                endwhile;
                                wp_reset_postdata();
                            }
                            ?>
                            <a href="<?php echo get_permalink(get_page_by_path(__('offres-demploi', 'siogivedomain'))) ?>" class="ui <?php if (is_page(__('offres-demploi', 'siogivedomain')) || is_category(intval(get_query_var('cat'))) || is_singular('job')): ?> myactive <?php endif ?> item"> <?php echo __("NOS OFFRES D'EMPLOI", "siogivedomain"); ?>  </a>
                            <a href="<?php echo get_permalink(get_page_by_path(__('forums', 'siogivedomain'))) ?>" class="<?php if (bbp_is_forum_archive() || bbp_is_single_forum() || bbp_is_single_topic()): ?> myactive <?php endif ?> item"><?php echo __("NOS FORUMS", "siogivedomain") ?></a>       
                        </div>
                    </div>

                    <div class="column">
                        <!--<h4 class="ui header">NOS FORUMS</h4>-->
                        <!--                        <div class="ui link list">
                                                   
                                                </div>-->
                    </div>

                </div>
            </div>
        </div>
        <!-- Collapse Navbar Menu -->
        <div class="ui fluid vertical menu collapse">
        </div>

        <div id="message_success" class="ui success message" style="position: fixed; top: 6em; right: 40em; left: auto; z-index: 5; width: 30em; display: none">
            <i class="close icon"></i>
            <div class="header"></div>
        </div>

        <div id="message_error" class="ui error message" style="position: fixed; top: 6em; right: 40em; left: auto; z-index: 5; width: 30em; display: none">
            <i class="close icon"></i>
            <div class="header"> </div>
        </div>

        <div id="message_loading" class="ui icon message" style="position: fixed; top: 6em; right: 40em; left: auto; z-index: 5; width: 20em; display: none;">
            <i class="notched circle loading icon"></i>
            <div class="content">
                <div class="header">Traitement encours... </div>
            </div>
        </div>