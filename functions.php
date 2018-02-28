<?php
//add_action( 'after_setup_theme', 'woocommerce_support' );
//function woocommerce_support() {
//    add_theme_support( 'woocommerce' );
//}

add_action('wp_print_scripts','theme_slug_dequeue_footer_jquery');
 function theme_slug_dequeue_footer_jquery() {
       if( !is_admin()){
           wp_dequeue_script('jquery');
           wp_deregister_script('jquery');
       }
}

add_filter( 'auto_update_plugin', '__return_true' );

function wpdocs_dequeue_dashicon() {
	if (current_user_can( 'update_core' )) {
	    return;
	}
        if(!is_admin()){
            wp_deregister_style('dashicons');
            wp_deregister_style('admin-bar');
        }
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );

function hide_admin_bar_from_front_end(){
  if (is_blog_admin()) {
    return true;
  }
  return false;
}
add_filter( 'show_admin_bar', 'hide_admin_bar_from_front_end' );

function si_ogive_scripts() {
	wp_register_style( 'semantic_ui_css', 'https://cdn.jsdelivr.net/semantic-ui/2.2.10/semantic.min.css', array(), '2.2.10' );
	wp_enqueue_style('semantic_ui_css');
        wp_register_style( 'font-awesone', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css');
        wp_enqueue_style('font-awesone');
        wp_enqueue_style( 'main_css', get_template_directory_uri() . '/assets/css/main.css' );
        wp_enqueue_style( 'owl.carousel.css', get_template_directory_uri() . '/assets/css/owl.carousel.css' );
        //wp_register_style( 'datetimepicker_css', get_template_directory_uri() . '/assets/css/jquery.datetimepicker.min.css' );
        wp_enqueue_script( 'jquery.min', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), false, true );
	wp_register_script( 'semantic_ui_js', 'https://cdn.jsdelivr.net/semantic-ui/2.2.10/semantic.min.js', array(), '2.2.10', true );
        wp_enqueue_script('semantic_ui_js');
        wp_enqueue_script( 'owl.carousel.js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array(), false, true);
        wp_enqueue_script( 'main_js', get_template_directory_uri() . '/assets/js/main.js',array(), false, true);
        wp_register_script( 'my_google_map_js', get_template_directory_uri() . '/assets/js/google_map.js',array(), false, true);
        wp_register_script( 'hideShowPassword_js', get_template_directory_uri() . '/assets/js/hideShowPassword.min.js', array(), false, true);
        //wp_register_script( 'datetimepicker_js', get_template_directory_uri() . '/assets/js/jquery.datetimepicker.full.min.js',array(), false, true);
//        wp_enqueue_script('datetimepicker_js');
//        wp_enqueue_style('datetimepicker_css');
        wp_enqueue_script('hideShowPassword_js');
        if(is_page(__('nous-contacter', 'siogivedomain'))){
            wp_enqueue_script('my_google_map_js');
        }
        
}

add_action( 'wp_enqueue_scripts', 'si_ogive_scripts' );

