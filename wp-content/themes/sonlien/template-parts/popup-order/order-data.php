<?php
    $order_statuses = array('wc-on-hold', 'wc-processing', 'wc-completed');

    ## ==> Define HERE the customer ID
    $customer_user_id = get_current_user_id(); // current user ID here for example
    
    // Getting current customer orders
    $customer_orders = wc_get_orders( array(
        'meta_key' => '_customer_user',
        'meta_value' => $customer_user_id,
        'post_status' => $order_statuses,
        'numberposts' => -1
    ) );
    var_dump( $customer_orders);
