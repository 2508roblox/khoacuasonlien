<?php
    function register_acf_options_questions() {

        // Check function exists.
        if( !function_exists('acf_add_options_page') )
            return;

        // register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Questions Asked'),
            'menu_title'    => __('Questions Asked'),
            'menu_slug'     => 'question',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'position' => '4.5',
            'icon_url' => 'dashicons-info',
        ));
    }

    // Hook into acf initialization.
    add_action('acf/init', 'register_acf_options_questions');