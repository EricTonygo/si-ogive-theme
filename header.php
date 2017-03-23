<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
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
                <a href="<?php echo home_url('/') ?>" class="<?php if (is_front_page()): ?> myactive <?php endif ?> item"><?php echo get_page_by_path(__('accueil', 'si-ogivedomain'))->post_title ?></a>
                <div class="ui dropdown top left pointing <?php if (is_singular('area-expertise')): ?> myactive <?php endif ?> item">
                    <?php echo __("Domaines de compétence", 'si-ogivedomain'); ?>
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
                <div class="ui dropdown top left pointing <?php if (is_page(__('notre-vision', 'si-ogivedomain')) || is_page(__('a-propos-de-si-ogive', 'si-ogivedomain')) || is_page(__('nous-contacter', 'si-ogivedomain')) || is_page(__('offres-demploi', 'si-ogivedomain')) || is_singular('job') || is_category(intval(get_query_var('cat')))): ?>myactive<?php endif ?> item">
                    SI OGIVE
                    <div class="menu">
                        <a href="<?php echo get_permalink(get_page_by_path(__('notre-vision', 'si-ogivedomain'))) ?>" class="ui <?php if (is_page(__('notre-vision', 'si-ogivedomain'))): ?> myactive <?php endif ?> item"> <?php echo get_page_by_path(__('notre-vision', 'si-ogivedomain'))->post_title ?> </a>
                        <a href="<?php echo get_permalink(get_page_by_path(__('a-propos-de-si-ogive', 'si-ogivedomain'))) ?>" class="ui <?php if (is_page(__('a-propos-de-si-ogive', 'si-ogivedomain'))): ?> myactive <?php endif ?> item"> <?php echo get_page_by_path(__('a-propos-de-si-ogive', 'si-ogivedomain'))->post_title ?> </a>
                        <a href="<?php echo get_permalink(get_page_by_path(__('offres-demploi', 'si-ogivedomain'))) ?>" class="ui <?php if (is_page(__('offres-demploi', 'si-ogivedomain')) || is_category(intval(get_query_var('cat'))) || is_singular('job')): ?> myactive <?php endif ?> item"> <?php echo get_page_by_path(__('offres-demploi', 'si-ogivedomain'))->post_title ?> </a>
                        <a href="<?php echo get_permalink(get_page_by_path(__('nous-contacter', 'si-ogivedomain'))) ?>" class="ui <?php if (is_page(__('nous-contacter', 'si-ogivedomain'))): ?> myactive <?php endif ?> item"> <?php echo get_page_by_path(__('nous-contacter', 'si-ogivedomain'))->post_title ?> </a>
                    </div>
                </div>
                <div class="ui dropdown top left pointing <?php if (is_singular('service')): ?> myactive <?php endif ?> item">
                        <?php echo __("AUTRES SERVICES", 'si-ogivedomain'); ?>
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
                <a href="<?php echo get_permalink(get_page_by_path(__('forums', 'si-ogivedomain'))) ?>" class="<?php if (bbp_is_forum_archive() || bbp_is_single_forum() || bbp_is_single_topic()): ?> myactive <?php endif ?> item"><?php echo get_page_by_path(__('forums', 'si-ogivedomain'))->post_title ?></a>
            </div>
            <div class="right menu">
                
                <?php
            if (is_user_logged_in()):
                $current_user = wp_get_current_user();
                ?>                    
                <div class="ui dropdown top right pointing item"> 
                    <!--<img src="<?php echo get_template_directory_uri() ?>/assets/img/avatar.png" alt="..." class="ui avatar image">-->
                    <i class="user icon"></i>
                    <?php echo wp_trim_words( $current_user->user_firstname.' '.$current_user->user_lastname, 1, '' ); ?>
                    <div class="menu">
                        <h2 class="header"><?php echo __('Salut').' '.wp_trim_words( $current_user->user_firstname.' '.$current_user->user_lastname, 1, '' ).' !' ?></h2>
                        <div class="divider"></div>
<!--                        <a href='<?php echo get_permalink(get_page_by_path(__('mon-compte', 'gpdealdomain'))) ?>' class="ui item">
                            <i class="setting icon"></i>
                            <?php echo get_page_by_path(__('mon-compte', 'gpdealdomain'))->post_title ?>                         
                        </a>
                        <a href='<?php echo get_permalink(get_page_by_path(__('mon-compte', 'gpdealdomain') . '/' . __('profile', 'gpdealdomain'))) ?>' class="ui item">
                            <i class="user icon"></i>
                            <?php echo get_page_by_path(__('mon-compte', 'gpdealdomain') . '/' . __('profile', 'gpdealdomain'))->post_title ?>                         
                        </a>
                        <a href='<?php echo get_permalink(get_page_by_path(__('mon-compte', 'gpdealdomain') . '/' . __('courriers-colis', 'gpdealdomain'))) ?>' class="ui item">
                            <i class="travel icon"></i>
                            <?php echo get_page_by_path(__('mon-compte', 'gpdealdomain') . '/' . __('courriers-colis', 'gpdealdomain'))->post_title ?>                         
                        </a>
                        <a href='<?php echo get_permalink(get_page_by_path(__('mon-compte', 'gpdealdomain') . '/' . __('offres-de-transport', 'gpdealdomain'))) ?>' class="ui item">
                            <i class="shipping icon"></i>
                            <?php echo get_page_by_path(__('mon-compte', 'gpdealdomain') . '/' . __('offres-de-transport', 'gpdealdomain'))->post_title ?>                         
                        </a>
                        <div class="divider"></div>-->
                        <a href="<?php echo esc_url(add_query_arg(array('logout' => 'true'), home_url('/'))) ?> " class="ui item">
                            <i class="sign out icon"></i>
                            <?php echo __('Se déconnecter', 'gpdealdomain') ?>
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <div class="ui dropdown top right pointing item"> 
                    <i class="power icon"></i>
                    <span style="">Se connecter</span>
                    <!--<img src="<?php echo get_template_directory_uri() ?>/assets/img/avatar.png" alt="..." class="ui mini avatar image">-->
                    <div class="menu signin_dropdown_menu">
                        <div class="ui fluid card" style="margin-bottom: 0;">
                            <div class="content">
                                <form id='login_form'  method="POST" class="ui form login_form" action="<?php echo get_permalink(get_page_by_path(__('connexion', 'si-ogivedoamin'))) ?>" style="margin-bottom: 1em" >
                                    <!--<p><span style="color: red;">*</span> Informations obligatoires</p>-->
                                    <div class="field">
                                        <label>Adresse email ou pseudo <span style="color: red;">*</span></label>
                                        <input type="text" name="_username" placeholder="Adresse email">
                                    </div>
                                    <div class="field">
                                        <label>Mot de passe <span style="color: red;">*</span></label>
                                        <div class="ui input right icon">
                                            <i class="unhide link icon show_hide_password_login"></i>
                                            <input type="password" name="_password" placeholder="Mot de passe">
                                        </div>
                                    </div>
                                    <div class="inline field">
                                        <div class="ui checkbox">
                                            <input type="checkbox" name="_remember" value="true">
                                            <label style="text-transform:none">Se souvenir de moi</label>
                                        </div>
                                    </div>
                                    <div class="field center aligned">
                                        <button id="submit_login_form" class="ui yellow fluid button" type="submit">Se connecter</button>
                                    </div> 
                                    <div class="field center aligned">
                                        <a href="<?php echo get_permalink(get_page_by_path(__('mot-de-passe-oublie', 'si-ogivedomain'))) ?>" style="text-transform: none;" >Mot de passe oublié</a>
                                    </div>
                                </form>
                                    <a href="<?php echo get_permalink(get_page_by_path(__('inscription', 'si-ogivedomain'))) ?>" class="ui yellow fluid button">S'inscrire</a>
                            </div>
                        </div>
                        <div class="item" style="display: none"></div>
                    </div>
                </div>
                <?php endif ?>
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

        <div id="message_success" class="ui success message" style="position: fixed; top: 5em; right: 40em; left: auto; z-index: 5; width: 35em; <?php if(!isset($_SESSION['success_message'])): ?> display: none <?php endif ?>">
            <i class="close icon"></i>
            <p><?php if(isset($_SESSION['success_message'])){ echo $_SESSION['success_message']; unset($_SESSION['success_message']);}?></p>
        </div>

        <div id="message_error" class="ui error message" style="position: fixed; top: 5em; right: 40em; left: auto; z-index: 5; width: 35em; <?php if(!isset($_SESSION['error_message'])): ?> display: none <?php endif ?>">
            <i class="close icon"></i>
            <p><?php if(isset($_SESSION['error_message'])){ echo $_SESSION['error_message']; unset($_SESSION['error_message']);}?> </p>
        </div>