<?php
    function register_acf_options_generral_infomation() {

        // Check function exists.
        if( !function_exists('acf_add_options_page') )
            return;

        // register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Thông tin chung'),
            'menu_title'    => __('Thông tin chung'),
            'menu_slug'     => 'generral_infomation',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'position' => '4.0',
            'icon_url' => 'dashicons-menu',
        ));
    }

    // Hook into acf initialization.
    add_action('acf/init', 'register_acf_options_generral_infomation');