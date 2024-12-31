<?php
function register_acf_options_news_option() {

    // Check function exists.
    if( !function_exists('acf_add_options_page') )
        return;

    // register options page.
    $option_page = acf_add_options_sub_page(array(
        'page_title'    => __('Setting news'),
        'menu_title'    => __('Setting news'),
        'menu_slug'     => 'setting_news',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'parent_slug'   =>'edit.php'
    ));
}


// function theme_options_panel(){
//     // add_menu_page('abc', 'abc', 'abc', 'abc-options', 'wps_theme_func');
//     add_submenu_page( 'edit.php', 'Setting News', 'Setting News', 'edit_posts', 'setting_news', 'register_acf_options_news_option');
//   }
//   add_action('admin_menu', 'theme_options_panel');
  add_action('acf/init', 'register_acf_options_news_option');
