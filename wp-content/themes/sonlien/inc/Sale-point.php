<?php
    function register_acf_options_sale_points() {

        // Check function exists.
        if( !function_exists('acf_add_options_page') )
            return;

        // register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Điểm bán hàng'),
            'menu_title'    => __('Điểm bán hàng'),
            'menu_slug'     => 'sale_point',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'position' => '4.6',
            'icon_url' => 'dashicons-admin-site-alt',
        ));
    }
    // Hook into acf initialization.
    add_action('acf/init', 'register_acf_options_sale_points');
    // Country information
    add_action( 'wp_ajax_get_info_select', 'get_select_sale_point_init' );
    add_action( 'wp_ajax_nopriv_get_info_select', 'get_select_sale_point_init' );
    function get_select_sale_point_init() {
        global $wpdb;
        $city =  $wpdb->get_results( "SELECT * FROM devvn_tinhthanhpho" );
        $district =  $wpdb->get_results( "SELECT * FROM devvn_quanhuyen" );
        $data=array('city'=>$city,'district'=>$district);
        wp_send_json_success($data);
    
        die();//bắt buộc phải có khi kết thúc
    }
    // Select area city
    function acf_load_lga_field_choices_city( $field ) {
    
        // reset choices
        $field['choices'] = array();
      
        global $wpdb;
        $city =   $wpdb->get_results( "SELECT * FROM devvn_tinhthanhpho WHERE matp='01'  OR matp='31'  OR matp='48' OR matp='79' OR matp='92' " );
        foreach($city as $key=>$value){
            $field['choices'][$value->matp]=$value->name;
        }
        return $field;
        
    }
    
    add_filter('acf/load_field/name=point_city', 'acf_load_lga_field_choices_city');
     // SELECT ARE DISTRICT
    function acf_load_lga_field_choices_district( $field ) {
    
        // reset choices
        $field['choices'] = array();
      
        global $wpdb;
        $district =   $wpdb->get_results( "SELECT * FROM devvn_quanhuyen WHERE matp='01' OR matp='31' OR matp='48' OR matp='79' OR matp='92'" );
        foreach($district as $key=>$value){
            $field['choices'][$value->maqh]=$value->name;
        }
        return $field;
        
    }
    add_filter('acf/load_field/name=point_district', 'acf_load_lga_field_choices_district');
    
