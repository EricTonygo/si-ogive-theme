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
                            <form id="reset_password_form" method="POST" action="<?php the_permalink() ?>" class="ui form">
                                <div class="fields">
                                    <div class="four wide field">
                                        <label>Mot de passe actuel <span style="color:red;">*</span></label>
                                    </div>
                                    <div class="twelve wide field">
                                        <div class="ui input right icon old_password">
                                            <i class="unhide link icon old_password" style="display: none;" input_password_id="old_password"></i>
                                            <input id="old_password" type="password" class="visible_password" name="old_password" placeholder="Mot de passe">
                                        </div>
                                    </div>
                                </div>

                                <div class="fields">
                                    <div class="four wide field">
                                        <label>Nouveau mot de passe <span style="color:red;">*</span></label>
                                    </div>
                                    <div class="twelve wide field">
                                        <div class="ui input right icon new_password">
                                            <i class="unhide link icon new_password" style="display: none;" input_password_id="new_password"></i>
                                            <input id="new_password" type="password" class="visible_password" name="new_password" placeholder="Mot de passe">
                                        </div>
                                    </div>
                                </div>
                                <div class="fields">
                                    <div class="four wide field">
                                        <label>Confirmation nouveau mot de passe <span style="color:red;">*</span></label>
                                    </div>
                                    <div class="twelve wide field">
                                        <div class="ui input right icon confirm_new_password">
                                            <i  class="unhide link icon confirm_new_password" style="display: none" input_password_id="confirm_new_password"></i>
                                            <input id="confirm_new_password" type="password" class="visible_password" name="confirm_new_password" placeholder="Confirmation Mot de passe">
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
                                    <button id="submit_reset_password" class="ui yellow button">Modifier maintenant</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>