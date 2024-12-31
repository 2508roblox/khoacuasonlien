<?php
    function register_acf_options_about() {

        // Check function exists.
        if( !function_exists('acf_add_options_page') )
            return;

        // register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Giới thiệu'),
            'menu_title'    => __('Giới thiệu'),
            'menu_slug'     => 'about',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'position' => '4.2',
            'icon_url' => 'dashicons-media-interactive',
        ));
    }

    // Hook into acf initialization.
    add_action('acf/init', 'register_acf_options_about');