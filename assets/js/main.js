function show_password_login() {
    $('.unhide.link.icon.show_hide_password_login').click(function () {
        $(this).parents('.ui.form.login_form:first-child').find('input[name="_password"]').showPassword();
        $(this).removeClass('unhide');
        $(this).addClass('hide');
        hide_password_login();
    });
}
function hide_password_login() {
    $('.hide.link.icon.show_hide_password_login').click(function () {
        $(this).parents('.ui.form.login_form:first-child').find('input[name="_password"]').hidePassword();
        $(this).removeClass('hide');
        $(this).addClass('unhide');
        show_password_login();
    });
}

function show_password_registration() {
    $('#show_hide_password.unhide.link.icon').click(function () {
        $('#register_account_form.ui.form input[name="password"]').showPassword();
        $(this).removeClass('unhide');
        $(this).addClass('hide');
        hide_password_registration();
    });
}

function hide_password_registration() {
    $('#show_hide_password.hide.link.icon').click(function () {
        $('#register_account_form.ui.form input[name="password"]').hidePassword();
        $(this).removeClass('hide');
        $(this).addClass('unhide');
        show_password_registration();
    });
}

function show_password_confirm_registration() {
    $('#show_hide_password_confirm.unhide.link.icon').click(function () {
        $('#register_account_form.ui.form input[name="password_confirm"]').showPassword();
        $(this).removeClass('unhide');
        $(this).addClass('hide');
        hide_password_confirm_registration();
    });
}

function hide_password_confirm_registration() {
    $('#show_hide_password_confirm.hide.link.icon').click(function () {
        $('#register_account_form.ui.form input[name="password_confirm"]').hidePassword();
        $(this).removeClass('hide');
        $(this).addClass('unhide');
        show_password_confirm_registration();
    });
}
$(document).ready(function () {
    show_password_login();
    hide_password_login();
    show_password_registration();
    hide_password_registration();
    show_password_confirm_registration();
    hide_password_confirm_registration();
    /* Navbar animation */
//    $(window).bind('mousewheel', function (event) {
//        if (event.originalEvent.wheelDelta >= 0) {
//            $('.fixed.top.menu').removeClass('slide up');
//        } else {
//            $('.fixed.top.menu').addClass('slide up');
//            $('.vertical.menu.collapse').removeClass('slide down');
//        }
//
//    });

    /* Back to top fade */
//    $(window).scroll(function (event) {
//        var scroll = $(window).scrollTop();
//        $('#toTop').hide();
//        if (scroll > 200) {
//            $('#toTop').show();
//        } else {
//            $('#toTop').hide();
//        }
//
//        if (scroll == 0) {
//            $('.fixed.top.menu').removeClass('slide up');
//        }
//    });

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
                                prompt: "Veuillez saisir un numéro de téléphone valide."
                            }
                        ]
                    }
                },
                inline: false,
                on: 'change',
                onSuccess: function (event, fields) {
                    $('#apply_job_form.ui.form').addClass('loading');
                    $('#submit_apply_job').addClass('disabled');
                    $('#apply_job_form.ui.form').submit();
                }
            }
            );


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
                data: {'testunicity': 'yes', 'username': $('#register_account_form.ui.form input[name="username"]').val(), 'email': $('#register_account_form.ui.form input[name="email"]').val()},
                dataType: 'json',
                beforeSend: function () {
                    $('#block_recap').hide();
                    $('#block_form_edit').show();
                    $('#submit_register_account').addClass('disabled');
                    $('#edit_account').addClass('disabled');
                    $('#confirm_create_account').addClass('disabled');
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
                        $('#register_account_form.ui.form').submit();
                    } else if (response.success === false) {
                        $('#register_account_form.ui.form').removeClass('loading');
                        $('#error_name_header').html("Echec de la validation");
                        $('#error_name_list').html('<li>' + response.data.message + '</li>');
                        $('#error_name_message').show();
                    } else {
                        $("#register_account_form.ui.form input[name='save_account']").val('no');
                        $('#register_account_form.ui.form').removeClass('loading');
                        $('#error_name_header').html("Internal server error");
                        $('#error_name_message').show();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('#register_account_form.ui.form').removeClass('loading');
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
                },
                //inline: true,
                on: 'change'
            });

});

