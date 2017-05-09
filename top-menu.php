<div class="ui container top-nav">
    <div class="ui borderless pointing main menu">
        <div  class="left menu">
                        <div class="ui dropdown top left pointing item">
                            <i class="large sidebar icon"></i>
                            <div class="menu">
                                <a href="<?php echo home_url('/') ?>" class="ui item">
                                    Accueil
                                </a>
                                <a class="ui item">
                                    Mentions legales
                                </a>
                                <a class="ui item">
                                    Condition d'utilisation
                                </a>
                                <a class="ui item">
                                    Nous contacter
                                </a>
                            </div>
                        </div>
<!--            <div class="toc item">
                <i class="big sidebar icon"></i>
            </div>-->
            <div href="#" class="header item">
                <img class="ui tiny image logo" src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png">
            </div>
        </div>

        <div id="sitename" class="center menu">
            <div class="item">
                <div id="search_input_top" class="ui icon input">
                    <input type="text" placeholder="Recherche...">
                    <i class="search link icon"></i>
                </div>
            </div>
        </div>

        <div  class="right menu">
            <div id="lang_select" class="ui top right pointing dropdown icon item">
                <i class="large world icon"></i>
                <div class="menu">
                    <a class="ui item">
                        <i class="gb flag"></i>Anglais
                    </a>
                    <a class="ui item">
                        <i class="fr flag"></i>Français
                    </a>
                </div>
            </div>
            <?php
            if (is_user_logged_in()):
                $current_user = wp_get_current_user();
                ?>                    
                <div class="ui dropdown top right pointing item"> 
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/avatar.png" alt="..." class="ui avatar image">
                    <?php echo $current_user->user_login ?>
                    <div class="menu">
                        <h2 class="header"> <?php $current_user->user_login ?></h2>
                        <a href='<?php echo get_permalink(get_page_by_path(__('mon-compte', 'siogive'))) ?>' class="ui item">
                            <i class="setting icon"></i>
                            Mon compte                         
                        </a>
                        <a href='<?php echo get_permalink(get_page_by_path(__('profile', 'siogive'))) ?>' class="ui item">
                            <i class="unhide icon"></i>
                            Voir le profil                         
                        </a>
                        <div class="divider"></div>
                        <a href="<?php echo esc_url(add_query_arg(array('logout' => 'true'), home_url('/'))) ?> " class="ui item">
                            <i class="sign out icon"></i>
                            Déconnexion
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <div class="ui dropdown top right pointing item"> 
                    <i class="large power icon"></i>
                    <?php echo __('Connexion', 'siogive'); ?>
                    <div class="menu signin_dropdown_menu">
                        <div class="ui fluid card" style="margin-bottom: 0;">
                            <div class="content">
                                <form id="login_form" method="POST" class="ui form" action="<?php echo get_permalink(get_page_by_path(__('connexion', 'siogive'))) ?>" style="margin-bottom: 1em" >
                                    <p><span style="color: red;">*</span> Informations obligatoires</p>
                                    <div class="field">
                                        <label>Adresse Email ou Pseudo <span style="color: red;">*</span></label>
                                        <input type="text" name="_username" placeholder="Adresse email">
                                    </div>
                                    <div class="field">
                                        <label>Mot de passe <span style="color: red;">*</span></label>
                                        <input type="password" name="_password" placeholder="Mot de passe">
                                    </div>
                                    <div class="inline field">
                                        <div class="ui checkbox">
                                            <input type="checkbox" name="_remember" value="true">
                                            <label>Se souvenir de moi</label>
                                        </div>
                                    </div>
                                    <div class="field center aligned">
                                        <button id="submit_login_form" class="ui green fluid button" type="submit">Connexion</button>
                                    </div> 
                                    <div class="field center aligned">
                                        <a href="<?php echo get_permalink(get_page_by_path(__('mot-de-passe-oublie', 'siogivedomain'))) ?>" >Mot de passe oublié</a>
                                    </div>
                                </form>
                                <a href="<?php echo get_permalink(get_page_by_path(__('inscription', 'siogivedomain'))) ?>" class="ui green fluid button" type="submit">Inscrivez-vous</a>
                            </div>
                        </div>
                        <div class="item" style="display: none"></div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>