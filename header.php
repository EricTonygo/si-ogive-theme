<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <title><?php the_title() ?> - SI OGIVE</title>
        <link rel="shortcut icon" href="favicon.ico">
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
            <div class="ui container top-nav">
                <div class="left menu">
                    <a id="sidebar_menu_item" class="ui item"><i class="large sidebar icon"></i></a>
                    <a id='remove_menu_item' class="ui item" style="display:none"><i class="large remove icon"></i></a>
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


<!--                <a href="<?php echo home_url('/') ?>" class="<?php if (is_front_page()): ?> myactive <?php endif ?> item"><?php echo get_page_by_path(__('accueil', 'siogivedomain'))->post_title ?></a>
<div class="ui dropdown top left pointing <?php if (is_singular('area-expertise')): ?> myactive <?php endif ?> item">
                    <?php echo __("Domaines de compétence", 'siogivedomain'); ?>
    <div class="menu">
                    <?php
                    $post_id = get_the_ID();
                    $areas_expertise = new WP_Query(array('post_type' => 'area-expertise', 'post_per_page' => -1, "post_status" => 'publish', 'orderby' => 'post_date', 'order' => 'ASC'));
                    if ($areas_expertise->have_posts()) {
                        while ($areas_expertise->have_posts()): $areas_expertise->the_post();
                            ?>
                                                                                                <a href="<?php the_permalink() ?>" class="ui <?php if ($post_id == get_the_ID()): ?> myactive <?php endif ?> item"> <?php the_title(); ?></a>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    }
                    ?>
    </div>
</div>
<a href="" class="icon item logo" id="trigger"><i class="sidebar icon"></i></a>
<div class="ui dropdown top left pointing <?php if (is_page(__('notre-vision', 'siogivedomain')) || is_page(__('a-propos-de-siogive', 'siogivedomain')) || is_page(__('nous-contacter', 'siogivedomain')) || is_page(__('offres-demploi', 'siogivedomain')) || is_singular('job') || is_category(intval(get_query_var('cat')))): ?>myactive<?php endif ?> item">
    SI OGIVE
    <div class="menu">
        <a href="<?php echo get_permalink(get_page_by_path(__('notre-vision', 'siogivedomain'))) ?>" class="ui <?php if (is_page(__('notre-vision', 'siogivedomain'))): ?> myactive <?php endif ?> item"> <?php echo get_page_by_path(__('notre-vision', 'siogivedomain'))->post_title ?> </a>
        <a href="<?php echo get_permalink(get_page_by_path(__('a-propos-de-siogive', 'siogivedomain'))) ?>" class="ui <?php if (is_page(__('a-propos-de-siogive', 'siogivedomain'))): ?> myactive <?php endif ?> item"> <?php echo get_page_by_path(__('a-propos-de-siogive', 'siogivedomain'))->post_title ?> </a>
        <a href="<?php echo get_permalink(get_page_by_path(__('offres-demploi', 'siogivedomain'))) ?>" class="ui <?php if (is_page(__('offres-demploi', 'siogivedomain')) || is_category(intval(get_query_var('cat'))) || is_singular('job')): ?> myactive <?php endif ?> item"> <?php echo get_page_by_path(__('offres-demploi', 'siogivedomain'))->post_title ?> </a>
        <a href="<?php echo get_permalink(get_page_by_path(__('nous-contacter', 'siogivedomain'))) ?>" class="ui <?php if (is_page(__('nous-contacter', 'siogivedomain'))): ?> myactive <?php endif ?> item"> <?php echo get_page_by_path(__('nous-contacter', 'siogivedomain'))->post_title ?> </a>
    </div>
</div>
<div class="ui dropdown top left pointing <?php if (is_singular('service')): ?> myactive <?php endif ?> item">
                    <?php echo __("AUTRES SERVICES", 'siogivedomain'); ?>
    <div class="menu">
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
    </div>
</div>
<a href="<?php echo get_permalink(get_page_by_path(__('forums', 'siogivedomain'))) ?>" class="<?php if (bbp_is_forum_archive() || bbp_is_single_forum() || bbp_is_single_topic()): ?> myactive <?php endif ?> item"><?php echo get_page_by_path(__('forums', 'siogivedomain'))->post_title ?></a>-->
                </div>
                <div class="right menu">

                    <?php
                    if (is_user_logged_in()):
                        $current_user = wp_get_current_user();
                        ?>                    
                        <div class="ui dropdown top right pointing item"> 
                            <!--<img src="<?php echo get_template_directory_uri() ?>/assets/img/avatar.png" alt="..." class="ui avatar image">-->
                            <i class="user icon"></i>
                            <?php echo wp_trim_words($current_user->user_firstname . ' ' . $current_user->user_lastname, 1, ''); ?>
                            <div class="menu">
                                <h2 class="header"><?php echo __('Salut') . ' ' . wp_trim_words($current_user->user_firstname . ' ' . $current_user->user_lastname, 1, '') ?></h2>
                                <div class="divider"></div>

                                <a href="<?php echo esc_url(add_query_arg(array('logout' => 'true'), home_url('/'))) ?> " class="ui item">
                                    <i class="sign out icon"></i>
                                    <?php echo __('Se déconnecter', 'siogivedomain') ?>
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="ui dropdown top right pointing item"> 
                            <i class="sign in icon"></i>
                            <span style="">Se connecter</span>
                            <!--<img src="<?php echo get_template_directory_uri() ?>/assets/img/avatar.png" alt="..." class="ui mini avatar image">-->
                            <div class="menu signin_dropdown_menu">
                                <div class="ui fluid card" style="margin-bottom: 0;">
                                    <div class="content">
                                        <form id='login_form'  method="POST" class="ui form login_form" action="<?php echo get_permalink(get_page_by_path(__('connexion', 'siogivedomain'))) ?>" style="margin-bottom: 1em" >
                                            <!--<p><span style="color: red;">*</span> Informations obligatoires</p>-->
                                            <div class="field">
                                                <label>Email ou pseudo <span style="color: red;">*</span></label>
                                                <div class="ui input left icon">
                                                    <i class="user icon"></i>
                                                    <input type="text" name="_username" placeholder="Email ou pseudo">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <label>Mot de passe <span style="color: red;">*</span></label>
                                                <div class="ui input left icon">
                                                    <i class="lock icon"></i>
                                                    <input type="password" name="_password" placeholder="Mot de passe">
                                                </div>
                                            </div>
                                            <div class="inline field">
                                                <div class="ui checkbox">
                                                    <input type="checkbox" name="_remember" value="true">
                                                    <label style="text-transform:none">Se souvenir de moi</label>
                                                </div>
                                            </div>
                                            <input type="hidden" name='no_redirect' value="true" >
                                            <div class="field center aligned">
                                                <button id="submit_login_form" class="ui yellow fluid button" type="submit">Se connecter</button>
                                            </div> 
                                            <!--                                            <div class="field center aligned">
                                                                                            <a href="<?php echo get_permalink(get_page_by_path(__('mot-de-passe-oublie', 'siogivedomain'))) ?>" style="text-transform: none;" ><?php echo __("Mot de passe oublié", "siogivedomain"); ?> ?</a>
                                                                                        </div>-->
                                        </form>
                                    </div>
                                </div>
                                <div class="item" style="display: none"></div>
                            </div>
                        </div>
                        <a href="<?php echo get_permalink(get_page_by_path(__('inscription', 'siogivedomain'))) ?>" class="item">
                            <i class="add user icon"></i><?php echo __("S'inscrire", 'siogivedomain') ?>
                        </a>
                    <?php endif ?>

                    <!--                <div class="ui dropdown top right pointing item">
                                        <i class="world icon"></i>
                                        <div class="menu">
                                            <a class="ui item">
                                                <i class="gb flag"></i>Anglais
                                            </a>
                                            <a class="ui item">
                                                <i class="fr flag"></i>Français
                                            </a>
                                        </div>
                                    </div>-->
                </div>
            </div>
        </div>
        <!-- Sub main menu -->
        <div id='sub_main_menu' class="ui fixed menu hidden">
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

                            <a href="<?php echo get_permalink(get_page_by_path(__('domaines-de-competence', 'siogivedomain'))) ?>" class="item"> DOMAINES DE COMPETENCE</a>
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

                        </div>
                    </div>

                    <div class="column">
                        <!--<h4 class="ui header">NOS FORUMS</h4>-->
                        <div class="ui link list">
                            <a href="<?php echo get_permalink(get_page_by_path(__('offres-demploi', 'siogivedomain'))) ?>" class="ui <?php if (is_page(__('offres-demploi', 'siogivedomain')) || is_category(intval(get_query_var('cat'))) || is_singular('job')): ?> myactive <?php endif ?> item"> <?php echo __("NOS OFFRES D'EMPLOI", "siogivedomain"); ?>  </a>
                            <a href="<?php echo get_permalink(get_page_by_path(__('forums', 'siogivedomain'))) ?>" class="<?php if (bbp_is_forum_archive() || bbp_is_single_forum() || bbp_is_single_topic()): ?> myactive <?php endif ?> item"><?php echo __("NOS FORUMS", "siogivedomain") ?></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Collapse Navbar Menu -->
        <div class="ui fluid vertical menu collapse">
        </div>

        <div id="message_success" class="ui success message" style="position: fixed; top: 6em; right: 40em; left: auto; z-index: 5; width: 25em; display: none">
            <i class="close icon"></i>
            <div class="header"></div>
        </div>

        <div id="message_error" class="ui error message" style="position: fixed; top: 6em; right: 40em; left: auto; z-index: 5; width: 25em; display: none">
            <i class="close icon"></i>
            <div class="header"> </div>
        </div>

        <div id="message_loading" class="ui icon message" style="position: fixed; top: 6em; right: 40em; left: auto; z-index: 5; width: 20em; display: none;">
            <i class="notched circle loading icon"></i>
            <div class="content">
                <div class="header">Traitement encours... </div>
            </div>
        </div>