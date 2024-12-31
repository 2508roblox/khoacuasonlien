<?php
    function register_acf_options_projects() {

        // Check function exists.
        if( !function_exists('acf_add_options_page') )
            return;

        // register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Danh sách dự án'),
            'menu_title'    => __('Danh sách dự án'),
            'menu_slug'     => 'projects',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'position' => '4.3',
            'icon_url' => 'dashicons-admin-page',
        ));
    }

    // Hook into acf initialization.
    add_action('acf/init', 'register_acf_options_projects');