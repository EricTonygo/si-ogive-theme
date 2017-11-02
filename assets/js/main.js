$(document).ready(function () {

    $('input.clearable').on("change paste keyup", function (e) {
        var myclass = $(this).attr('id');
        if ($(this).val() !== "") {
            $('i.remove.link.icon.' + myclass).show();
        } else {
            $('i.remove.link.icon.' + myclass).hide();
        }
    });

    $('input.clearable').on("focusout", function (e) {
        var myclass = $(this).attr('id');
        if ($(this).val() === "") {
            $('i.remove.link.icon.' + myclass).hide();
        }
    });

    $('i.remove.link.icon').click(function (e) {
        var myid = $(this).attr('clearable_id');
        $('#' + myid).val("");
        $('i.remove.link.icon.' + myid).hide();
    });

    $('input.visible_password').on("change paste keyup", function (e) {
        var myclass = $(this).attr('id');
        if ($(this).val() !== "") {
            $('i.unhide.link.icon.' + myclass).show();
        } else {
            $('i.unhide.link.icon.' + myclass).hide();
        }
    });

    $('input.visible_password').on("focusout", function (e) {
        var myclass = $(this).attr('id');
        if ($(this).val() === "") {
            $('i.unhide.link.icon.' + myclass).hide();
        }
    });

    $('i.unhide.link.icon')
            .mouseup(function () {
                var myid = $(this).attr('input_password_id');
                $('#' + myid).hidePassword();
            })
            .mousedown(function () {
                var myid = $(this).attr('input_password_id');
                $('#' + myid).showPassword();
            });

    if (window.matchMedia("(max-width: 800px)").matches) {
        $('.ui.form .ui.button').addClass("fluid");
        $('.ui.button.procedure_detail_link').addClass('fluid');
        var view_password = 0;
        $('i.unhide.link.icon').click(function (e) {
            e.preventDefault();
            if (view_password === 0) {
                var myid = $(this).attr('input_password_id');
                $('#' + myid).showPassword();
                view_password = 1;
            } else if (view_password === 1) {
                var myid = $(this).attr('input_password_id');
                $('#' + myid).hidePassword();
                view_password = 0;
            }
        });

    }else{
        $('.ui.button.procedure_detail_link').removeClass('fluid');
    }

    /* Scroll Event*/
    $('a[data-slide="slide"]').on('click', function (e) {
        e.preventDefault();

        var target = this.hash;
        var $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - 90
        }, 900, 'swing');
    });

    /* Responsive Event */
    var navbarMenu = $('.fixed.top.menu .center.menu').clone();
    $('.vertical.menu.collapse').html(navbarMenu);

    $('#trigger').click(function (e) {
        e.preventDefault();
        $('.vertical.menu.collapse').toggleClass('slide down');
    });

    /* First Slider */
    $('#single-slider').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    $('#multiple-slider').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

    $('a[href^="#"]').click(function () {
        var the_id = $(this).attr("href");

        $('html, body').animate({
            scrollTop: $(the_id).offset().top
        }, 'slow');
        //$('a.item').removeClass('active');
        //$(this).addClass('active');
        return false;
    });
//    $('.message .close')
//            .on('click', function () {
//                $(this)
//                        .closest('.message')
//                        .transition('fade')
//                        ;
//            })
//            ;

    $('.message .close')
            .on('click', function () {
                $(this).parent(".message").hide();
            })
            ;

    $('.ui.sidebar')
            .sidebar({
                //context: $('.bottom.segment'),
                dimPage: false
            })
            .sidebar('setting', 'transition', 'overlay')
            .sidebar('attach events', '.toc.item')
            ;

//    $('.top-nav')
//            .visibility({
//                once: false,
//                onBottomPassed: function () {
//                    $('.fixed.menu').transition('fade in');
//                },
//                onBottomPassedReverse: function () {
//                    $('.fixed.menu').transition('fade out');
//                }
//            })
//            ;

    // show dropdown on hover
    $('.ui.dropdown').dropdown({
        on: 'hover'
    });

    $('.ui.accordion')
            .accordion({

            })
            ;

    $('#sidebar_menu_item').click(function (e) {
        e.preventDefault();
        $(this).hide();
        $('#remove_menu_item').show();
        $('#remove_menu_item i').transition('jiggle');
        $('#sub_main_menu').transition('slide down');
    });
    $('#remove_menu_item').click(function (e) {
        e.preventDefault();
        $(this).hide();
        $('#sidebar_menu_item').show();
        $('#sidebar_menu_item i').transition('jiggle');
        $('#sub_main_menu').transition('slide down');
    });


    $('#contact_form.ui.form')
            .form({
                fields: {
                    sender_name: {
                        identifier: 'sender_name',
                        rules: [
                            {
                                type: 'empty',
                                prompt: "Veuillez saisir votre nom."
                            }
                        ]
                    },
                    sender_email: {
                        identifier: 'sender_email',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Veuillez saisir votre adresse email'
                            },
                            {
                                type: 'email',
                                prompt: 'Veuillez saisir une adresse email valide'
                            }
                        ]
                    },

                    sender_subject: {
                        identifier: 'sender_subject',
                        rules: [
                            {
                                type: 'empty',
                                prompt: "Veuillez saisir l'objet de votre message."
                            }
                        ]
                    },
                    sender_message: {
                        identifier: 'sender_message',
                        rules: [
                            {
                                type: 'empty',
                                prompt: "Veuillez saisir votre message."
                            }
                        ]
                    }

                },
                inline: true,
                on: 'change',
                onSuccess: function (event, fields) {
                    $.ajax({
                        type: 'post',
                        url: $('#contact_form.ui.form').attr('action'),
                        data: $('#contact_form.ui.form').serialize(),
                        dataType: 'json',
                        beforeSend: function () {
                            $('#contact_form.ui.form').addClass('loading');
                            $('#submit_message').addClass('disabled');
                        },
                        statusCode: {
                            500: function (xhr) {
                                $('#contact_form.ui.form').removeClass('loading');
                                $('#submit_message').removeClass('disabled');
                                $('#message_error .header').html("Echec d'envoi du message");
                                $('#message_error').show();
                            },
                            400: function (response, textStatus, jqXHR) {
                                $('#contact_form.ui.form').removeClass('loading');
                                $('#submit_message').removeClass('disabled');
                                $('#message_success .header').html(response.data.message);
                                $('#message_success').show();
                            }
                        },
                        success: function (response, textStatus, jqXHR) {
                            if (response.success === true) {
                                $('#contact_form.ui.form').removeClass('loading');
                                $('#submit_message').removeClass('disabled');
                                $('#message_success .header').html(response.data.message);
                                $('#message_success').show();
                                setTimeout(function () {
                                    $('#message_success').hide();
                                }, 4000);
                            } else if (response.success === false) {
                                $('#contact_form.ui.form').removeClass('loading');
                                $('#submit_message').removeClass('disabled');
                                $('#message_error .header').html(response.data.message);
                                $('#message_error').show();
                            } else {
                                $('#contact_form.ui.form').removeClass('loading');
                                $('#submit_message').removeClass('disabled');
                                $('#message_error .header').html(response.data.message);
                                $('#message_error').show();
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            $('#contact_form.ui.form').removeClass('loading');
                            $('#submit_message').removeClass('disabled');
                            $('#message_error .header').html("Echec d'envoi du message");
                            $('#message_error').show();
                        }
                    });
                    return false;
                }
            }
            );
    $('#apply_job').click(function () {
        $('#application_job').show();
        $('#job_details').hide();
    });
    $('#apply_job_top').click(function () {
        $('#application_job').show();
        $('#job_details').hide();
    });
    $('#cancel_apply_job').click(function (e) {
        e.preventDefault();
        $('#application_job').hide();
        $('#job_details').show();
    });

    $('#apply_job_form.ui.form')
            .form({
                fields: {
                    lastname: {
                        identifier: 'lastname',
                        rules: [
                            {
                                type: 'empty',
                                prompt: "Veuillez saisir votre nom."
                            }
                        ]
                    },
                    email: {
                        identifier: 'email',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Veuillez saisir votre adresse email'
                            },
                            {
                                type: 'email',
                                prompt: 'Veuillez saisir une adresse email valide'
                            }
                        ]
                    },

                    phone: {
                        identifier: 'phone',
                        rules: [
                            {
                                type: 'regExp[/^([\+,00]{1}[0-9]{2,}?)$/]',
                                prompt: "Veuillez saisir un numéro de téléphone valide avec l'indicatif du pays."
                            }
                        ]
                    }
                },
                inline: true,
                on: 'change',
                onSuccess: function (event, fields) {
                    $("#apply_job_form.ui.form").addClass('loading');
                    //$("#apply_job_form.ui.form").submit();
                }
            }
            );

    $("#apply_job_form.ui.form").bind("keypress", function (e) {
        if (e.keyCode === 13) {
            return false;
        }
    });

//    $('#submit_apply_job').click(function (e) {
//        $("#apply_job_form.ui.form").addClass('loading');
//    });

//    $("#apply_job_form.ui.form").submit(function (e) {
//        if (e.keyCode == 13) {
//            e.preventDefault();
//            return false;
//        } else {
//            $(this).addClass('loading');
//        }
//    });


    $('#register_account_form.ui.form')
            .form({
                fields: {
                    last_name: {
                        identifier: 'last_name',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Veuillez saisir votre nom'
                            }
                        ]
                    },
                    username: {
                        identifier: 'username',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Veuillez saisir votre pseudo'
                            }
                        ]
                    },
                    email: {
                        identifier: 'email',
                        rules: [
                            {
                                type: 'email',
                                prompt: 'Veuillez saisir une adresse email valide'
                            }
                        ]
                    },
                    password: {
                        identifier: 'password',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Veuillez saisir un mot de passe'
                            }
                        ]
                    },
                    passwordConfirm: {
                        identifier: 'password_confirm',
                        rules: [
                            {
                                type: 'match[password]',
                                prompt: 'Les mots de passe saisis ne correspondent pas'
                            }
                        ]
                    }
                },
                inline: true,
                on: 'change'
            }
            );

    $('#submit_register_account').click(function (e) {
        e.preventDefault();
        $('#server_error_message').hide();
        $('#error_name_message').hide();
        $('#error_name_message_edit').hide();
        if ($('#register_account_form.ui.form').form('is valid')) {
            $.ajax({
                type: 'post',
                url: $('#register_account_form.ui.form').attr('action'),
                data: $('#register_account_form.ui.form').serialize(),
                dataType: 'json',
                beforeSend: function () {
                    $('#block_recap').hide();
                    $('#block_form_edit').show();
                    $('#submit_register_account').addClass('disabled');
                    $('#edit_account').addClass('disabled');
                    $('#register_account_form.ui.form').addClass('loading');
                },
                statusCode: {
                    500: function (xhr) {
                        $('#register_account_form.ui.form').removeClass('loading');
                        $('#server_error_message').show();
                    },
                    400: function (response, textStatus, jqXHR) {
                        $('#register_account_form.ui.form').removeClass('loading');
                        $('#error_name_header').html("Echec de la validation");
                        $('#error_name_message').show();

                    }
                },
                success: function (response, textStatus, jqXHR) {
                    if (response.success === true) {                        
                        $('#message_success>div.header').html(response.data.message);
                        $('#message_success').show();
                        window.location.reload();
                    } else if (response.success === false) {
                        $('#register_account_form.ui.form').removeClass('loading');
                        $('#submit_register_account').removeClass('disabled');
                        $('#error_name_header').html("Echec de la validation");
                        $('#error_name_list').html('<li>' + response.data.message + '</li>');
                        $('#error_name_message').show();
                    } else {
                        $('#register_account_form.ui.form').removeClass('loading');
                        $('#submit_register_account').removeClass('disabled');
                        $('#error_name_header').html("Internal server error");
                        $('#error_name_message').show();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('#register_account_form.ui.form').removeClass('loading');
                    $('#submit_register_account').removeClass('disabled');
                    $('#server_error_message').show();
                }
            });
        }
    });
    
    
    $('#update_account_form.ui.form')
            .form({
                fields: {
                    last_name: {
                        identifier: 'last_name',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Veuillez saisir votre nom'
                            }
                        ]
                    },
                    username: {
                        identifier: 'username',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Veuillez saisir votre pseudo'
                            }
                        ]
                    },
                    email: {
                        identifier: 'email',
                        rules: [
                            {
                                type: 'email',
                                prompt: 'Veuillez saisir une adresse email valide'
                            }
                        ]
                    }
                },
                inline: true,
                on: 'change'
            }
            );

    $('#submit_update_account').click(function (e) {
        e.preventDefault();
        $('#server_error_message').hide();
        $('#error_name_message').hide();
        $('#error_name_message_edit').hide();
        if ($('#update_account_form.ui.form').form('is valid')) {
            $.ajax({
                type: 'post',
                url: $('#update_account_form.ui.form').attr('action'),
                data: $('#update_account_form.ui.form').serialize(),
                dataType: 'json',
                beforeSend: function () {
                    $('#block_recap').hide();
                    $('#block_form_edit').show();
                    $('#submit_update_account').addClass('disabled');
                    $('#edit_account').addClass('disabled');
                    $('#update_account_form.ui.form').addClass('loading');
                },
                statusCode: {
                    500: function (xhr) {
                        $('#update_account_form.ui.form').removeClass('loading');
                        $('#server_error_message').show();
                    },
                    400: function (response, textStatus, jqXHR) {
                        $('#update_account_form.ui.form').removeClass('loading');
                        $('#error_name_header').html("Echec de la validation");
                        $('#error_name_message').show();

                    }
                },
                success: function (response, textStatus, jqXHR) {
                    if (response.success === true) {                        
                        $('#message_success>div.header').html(response.data.message);
                        $('#message_success').show();
                        window.location.reload();
                    } else if (response.success === false) {
                        $('#update_account_form.ui.form').removeClass('loading');
                        $('#submit_update_account').removeClass('disabled');
                        $('#error_name_header').html("Echec de la validation");
                        $('#error_name_list').html('<li>' + response.data.message + '</li>');
                        $('#error_name_message').show();
                    } else {
                        $('#update_account_form.ui.form').removeClass('loading');
                        $('#submit_update_account').removeClass('disabled');
                        $('#error_name_header').html("Internal server error");
                        $('#error_name_message').show();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('#update_account_form.ui.form').removeClass('loading');
                    $('#submit_update_account').removeClass('disabled');
                    $('#server_error_message').show();
                }
            });
        }
    });
    
    
    //Reset a password
    $('#reset_password_form.ui.form')
            .form({
                fields: {
                    old_password: {
                        identifier: 'old_password',
                        rules: [
                            {
                                type: 'empty',
                                prompt: "Veuillez saisir votre mot de passe actuel"
                            }
                        ]
                    },

                    new_password: {
                        identifier: 'new_password',
                        rules: [
                            {
                                type: 'empty',
                                prompt: "Veuillez saisir le nouveau mot de passe"
                            }
                        ]
                    },
                    confirm_new_password: {
                        identifier: 'confirm_new_password',
                        rules: [
                            {
                                type: 'match[new_password]',
                                prompt: "Les mots de passe saisis ne correspondent pas"
                            }
                        ]
                    }
                },
                inline: true,
                on: 'blur'
            }
            );

    $('#submit_reset_password').click(function (e) {
        e.preventDefault();
        $('#server_error_message').hide();
        //$('#reset_password_form.ui.form').form('validate form');
        if ($('#reset_password_form.ui.form').form('is valid')) {
            $.ajax({
                type: 'post',
                url: $('#reset_password_form.ui.form').attr('action'),
                data: $('#reset_password_form.ui.form').serialize(),
                dataType: 'json',
                beforeSend: function () {
                    $('#reset_password_form.ui.form').addClass('loading');
                    $('#submit_reset_password').addClass('disabled');
                },
                statusCode: {
                    500: function (xhr) {
                        $('#reset_password_form.ui.form').removeClass('loading');
                        $('#submit_reset_password').removeClass('disabled');
                        $('#server_error_message').show();
                    },
                    400: function (response, textStatus, jqXHR) {
                        $('#reset_password_form.ui.form').removeClass('loading');
                        $('#submit_reset_password').removeClass('disabled');
                        $('#error_name_header').html(gpdeal_translate("Failed to validate"));
                        $('#error_name_message').show();
                    }
                },
                success: function (response, textStatus, jqXHR) {
                    if (response.success === true) {
                        $('#reset_password_form.ui.form').submit();
                    } else if (response.success === false) {
                        $('#reset_password_form.ui.form').removeClass('loading');
                        $('#submit_reset_password').removeClass('disabled');
                        $('#error_name_header').html(gpdeal_translate("Failed to validate"));
                        $('#error_name_list').html('<li>' + response.data.message + '</li>');
                        $('#error_name_message').show();
                    } else {
                        $('#reset_password_form.ui.form').removeClass('loading');
                        $('#submit_reset_password').removeClass('disabled');
                        $('#error_name_header').html(gpdeal_translate("Internal server error"));
                        $('#error_name_message').show();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('#reset_password_form.ui.form').removeClass('loading');
                    $('#submit_reset_password').removeClass('disabled');
                    $('#server_error_message').show();
                }
            });
        }
    });
    
    

    $('#login_form.ui.form')
            .form({
                fields: {
                    username: {
                        identifier: '_username',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Veuillez saisir votre login'
                            }
                        ]
                    },
                    last_name: {
                        identifier: '_password',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Veuillez saisir votre mot de passe'
                            }
                        ]
                    }
                }
                //inline: true,
                //on: 'change'
            });

    $('#submit_login_form').click(function (e) {
        e.preventDefault();
        $('#server_error_message').hide();
        if ($('#login_form.ui.form').form('is valid')) {
            $.ajax({
                type: 'post',
                url: $('#login_form.ui.form').attr('action'),
                data: $('#login_form.ui.form').serialize(),
                dataType: 'json',
                beforeSend: function () {
                    $('#login_form.ui.form').addClass('loading');
                    $('#submit_login_form').addClass('disabled');
                    $('#message_error').hide();
                },
                statusCode: {
                    500: function (xhr) {
                        $('#message_error>.header').html("Internal server error");
                        $('#message_error').show();
                    },
                    400: function (response, textStatus, jqXHR) {

                        $('#message_error>.header').html("Echec de la validation");
                    }
                },
                success: function (response, textStatus, jqXHR) {
                    if (response.success === true) {
                        //$('#login_form.ui.form').submit();
                        window.location.reload();
                    } else if (response.success === false) {
                        $('#login_form.ui.form').removeClass('loading');
                        $('#submit_login_form').removeClass('disabled');
                        $('#message_error>.header').html(response.data.message);
                        $('#message_error').show();
                    } else {
                        $('#login_form1.ui.form').removeClass('loading');
                        $('#submit_login_form').removeClass('disabled');
                        $('#message_error>.header').html("Internal server error");
                        $('#message_error').show();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('#login_form.ui.form').removeClass('loading');
                    $('#submit_login_form').removeClass('disabled');
                    $('#message_error').show();
                }
            });
        }
    });

    $('#login_form2.ui.form')
            .form({
                fields: {
                    username: {
                        identifier: '_username',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Veuillez saisir votre login'
                            }
                        ]
                    },
                    last_name: {
                        identifier: '_password',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Veuillez saisir votre mot de passe'
                            }
                        ]
                    }
                }
                //inline: true,
                //on: 'change'
            });

    $('#submit_login_form2').click(function (e) {
        e.preventDefault();
        $('#server_error_message').hide();
        if ($('#login_form2.ui.form').form('is valid')) {            
            $('#login_form2.ui.form').addClass('loading');
            $('#submit_login_form2').addClass('disabled');
            $('#login_form2.ui.form').submit();
        }
    });

    $('#search_input_top_form').submit(function () {
        if ($('#search_input_top_form input[name="s"]').val() === "") {
            return false;
        }
        $('#submit_search_input_top').addClass('loading');
    });

    $('#reply_form')
            .form({
                fields: {
                    reply_message: {
                        identifier: 'reply_message',
                        rules: [
                            {
                                type: 'empty',
                                prompt: "Veuillez s'il vous plait saisir votre réponse"
                            }
                        ]
                    }
                },
                inline: true,
                on: 'blur',
                onSuccess: function (events, fields) {
                    $('#reply_form').addClass('loading');

                }
            }
            );

    $('#add_topic_form')
            .form({
                fields: {
                    topic_title: {
                        identifier: 'topic_title',
                        rules: [
                            {
                                type: 'empty',
                                prompt: "Veuillez s'il vous plait saisir votre le titre de votre sujet"
                            }
                        ]
                    },
                    topic_description: {
                        identifier: 'topic_description',
                        rules: [
                            {
                                type: 'empty',
                                prompt: "Veuillez s'il vous plait saisir une description de votre sujet"
                            }
                        ]
                    }
                },
                inline: true,
                on: 'blur',
                onSuccess: function (events, fields) {
                    $('#add_topic_form').addClass('loading');

                }
            }
            );

});

