<?php 
    //Code phan trang
    function paginationWoo($custom_query = null, $paged = null) {
        global $wp_query;
        if($custom_query) $main_query = $custom_query;
        else $main_query = $wp_query;
        $paged = ($paged) ? $paged : get_query_var('page');
        $big = 999999999;
        $total = isset($main_query->max_num_pages)?$main_query->max_num_pages:'';
        if($total > 1) echo '<div class="pagination_links">';
        echo paginate_links( array(
            // 'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?page=%#%',
            'current' => max( 1, $paged ),
            'total' => $total,
            'end_size' => '2',
            'mid_size' => '2',
            'prev_text'    => __('<<','devvn'),
            'next_text'    => __('>>','devvn'),
        ) );
        if($total > 1) echo '</div>';
    }

    // function bamboo_request($query_string )
    // {
    //     if( isset( $query_string['page'] ) ) {
    //         if( ''!=$query_string['page'] ) {
    //             if( isset( $query_string['name'] ) ) {
    //                 unset( $query_string['name'] );
    //             }
    //         }
    //     }
    //     return $query_string;
    // }
    // add_filter('request', 'bamboo_request');

    // add_action('pre_get_posts','bamboo_pre_get_posts');
    // function bamboo_pre_get_posts( $query ) { 
    //     if( $query->is_main_query() && !$query->is_feed() && !is_admin() ) { 
    //         $query->set( 'paged', str_replace( '/', '', get_query_var( 'page' ) ) ); 
    //     } 
    // }