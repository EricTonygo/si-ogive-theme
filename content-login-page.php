<!-- Content area -->
<div class="ui signup_container container content">
    <div class="ui stackable doubling grid">
        <!-- Middle Content -->
        <div class="sixteen wide column">
            <div align="">
                <div class="ui horizontal divider"><h2><?php the_title(); ?></h2></div>
                <br>
                <div class="ui container">
                    <div class="column content_page">
                        <div class="ui fluid card">
                            <div class="content">
                                <div id='menu_grid_column_container' class="ui two column stackable relaxed equal divided height grid">
                                    <div class="column">
                                        
                                        <form id="login_form2"  method="POST" class="ui form login_form" action="<?php echo get_permalink(get_page_by_path(__('connexion', 'gpdealdomain'))) ?>" style="margin-bottom: 1em" autocomplete="off" onkeydown="submit_modal_login_form();">
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
                                            <input type="hidden" name='no_redirect' value="true" >
                                            <div class="inline field">
                                                <div class="ui checkbox">
                                                    <input type="checkbox" name="_remember" value="true">
                                                    <label>Se souvenir de moi</label>
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div id="server_error_message2" class="ui negative message" style="display:none">
                                                    <i class="close icon"></i>
                                                    <div id="server_error_content2" class="header">Internal server error</div>
                                                </div>
                                                <div id="error_name_message2" class="ui error message" style="display: none">
                                                    <i class="close icon"></i>
                                                    <ul id="error_name_list2" class="list">

                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="field center aligned">
                                                <button id="submit_login_form2" class="ui yellow fluid button" type="submit">Se connecter</button>
                                            </div>
                                            <!--                                            <div class="field" align="center">
                                                                                            <a href="<?php echo get_permalink(get_page_by_path(__('mot-de-passe-oublie', 'gpdealdomain'))); ?>" ><?php echo __("Mot de passe oublié", "gpdealdomain") ?> ?</a> 
                                                                                        </div>-->
                                        </form>
                                    </div>
                                    <div class="column">
                                        <div class="ui form" style="margin-top: 5em;">
                                            <div class="field" align="center">
                                                <span><?php echo __("Vous n'avez pas encore un compte", "gpdealdomain") ?> ? </span>
                                            </div>
                                            <div class="field center aligned">
                                                <a href="<?php echo get_permalink(get_page_by_path(__('inscription', 'gpdealdomain'))); ?>" class="ui blue fluid button"><?php echo __("S'inscrire", "gpdealdomain") ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>