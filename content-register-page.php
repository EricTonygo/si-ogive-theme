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
                        <div class="ui attached message">
                            <div class="header"><?php echo __("Bienvenu dans notre site", 'siogivedomain') . " !" ?> </div>
                            <p style="font-size: 10pt;"><?php echo __("Remplissez le formulaire ci-dessous pour créer un nouveau compte", 'siogivedomain') ?></p>
                        </div>
                        <div class="ui fluid card">
                            <form id="register_account_form" method="POST" action="<?php the_permalink() ?>" class="ui form">
                                <div class="fields">
                                    <div class="four wide field">
                                        <label>Prénom </label>
                                    </div>
                                    <div class="twelve wide field">
                                        <input type="text" name="first_name" placeholder="Prénom">
                                    </div>
                                </div>

                                <div class="fields">
                                    <div class="four wide field">
                                        <label>Nom <span style="color:red;">*</span></label>
                                    </div>
                                    <div class="twelve wide field">
                                        <input type="text" name="last_name" placeholder="Nom">
                                    </div>
                                </div>

                                <div class="fields">
                                    <div class="four wide field">
                                        <label>Pseudo <span style="color:red;">*</span></label>
                                    </div>
                                    <div class="twelve wide field">
                                        <input type="text" name="username" placeholder="Pseudo">
                                    </div>                        
                                </div>

                                <div class="fields">
                                    <div class="four wide field">
                                        <label>Adresse email <span style="color:red;">*</span></label>
                                    </div>
                                    <div class="twelve wide field">
                                        <input type="email" name="email" placeholder="Adresse email">
                                    </div>
                                </div>

                                <div class="fields">
                                    <div class="four wide field">
                                        <label>Mot de passe <span style="color:red;">*</span></label>
                                    </div>
                                    <div class="twelve wide field">
                                        <div class="ui input right icon password">
                                            <i class="unhide link icon password" style="display: none;" input_password_id="password"></i>
                                            <input id="password" type="password" class="visible_password" name="password" placeholder="Mot de passe">
                                        </div>
                                    </div>
                                </div>
                                <div class="fields">
                                    <div class="four wide field">
                                        <label>Confirmation Mot de passe <span style="color:red;">*</span></label>
                                    </div>
                                    <div class="twelve wide field">
                                        <div class="ui input right icon confirm_password">
                                            <i  class="unhide link icon confirm_password" style="display: none" input_password_id="confirm_password"></i>
                                            <input id="confirm_password" type="password" class="visible_password" name="password_confirm" placeholder="Confirmation Mot de passe">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="sign_user_after" value="yes">
                                <div class="field">
                                    <div class="ui error message"></div>
                                    <div id="server_error_message" class="ui negative message" style="display:none">
                                        <i class="close icon"></i>
                                        <div id="server_error_content" class="header">Internal server error</div>
                                    </div>
                                    <div id="error_name_message" class="ui error message" style="display: none">
                                        <i class="close icon"></i>
                                        <div id="error_name_header" class="header"></div>
                                        <ul id="error_name_list" class="list">

                                        </ul>
                                    </div>
                                </div>
                                <div class="field" align="right">
                                    <button id="submit_register_account" class="ui yellow button">S'inscrire maintenant</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>