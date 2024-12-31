<?php
function register_acf_options_quote_price() {

    // Check function exists.
    if( !function_exists('acf_add_options_page') )
        return;

    // register options page.
    $option_page = acf_add_options_page(array(
        'page_title'    => __('Thông tin báo giá'),
        'menu_title'    => __('Thông tin báo giá'),
        'menu_slug'     => 'quote_price',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'position' => '4.9',
        'icon_url' => ' dashicons-clipboard',
    ));
}
// Hook into acf initialization.
add_action('acf/init', 'register_acf_options_quote_price');