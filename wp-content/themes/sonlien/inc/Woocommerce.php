<?php
    function my_custom_wc_theme_support() {
        add_theme_support( 'woocommerce' );
    }
    add_action( 'after_setup_theme', 'my_custom_wc_theme_support' );

    // Vieweb Products
    function viewedProduct(){
        session_start();
        if(!isset($_SESSION["viewed"])){
            $_SESSION["viewed"] = array();
        }
        if(is_singular('product')){
            $_SESSION["viewed"][get_the_ID()] = get_the_ID();
        }
    }
    add_action('wp', 'viewedProduct');

    //button mua ngay
    add_filter ('woocommerce_add_to_cart_redirect', 'redirect_to_checkout');
    function redirect_to_checkout($checkout_url) {
        global $woocommerce;
        if($_GET['quick_buy']) {
            $checkout_url = $woocommerce->cart->get_cart_url();
            // get_checkout_url()
        }
        return $checkout_url;
    }

    //
    add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
    function change_existing_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'VND': $currency_symbol = 'VNĐ'; break;
    }
        return $currency_symbol;
    }
    


    //Ajax cập nhật số lượng giỏ hàng
    //Enqueue Ajax Scripts
    function enqueue_cart_qty_ajax() {
        wp_register_script( 'cart-qty-ajax-js', get_template_directory_uri() . '/assets/js/cart-qty-ajax.js', array( 'jquery' ), '', true );
        wp_localize_script( 'cart-qty-ajax-js', 'cart_qty_ajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
        wp_enqueue_script( 'cart-qty-ajax-js' );
    
    }
    add_action('wp_enqueue_scripts', 'enqueue_cart_qty_ajax');
    
    function ajax_qty_cart() {
    
        // Set item key as the hash found in input.qty's name
        $cart_item_key = $_POST['hash'];
    
        // Get the array of values owned by the product we're updating
        $threeball_product_values = WC()->cart->get_cart_item( $cart_item_key );
    
        // Get the quantity of the item in the cart
        $threeball_product_quantity = apply_filters( 'woocommerce_stock_amount_cart_item', apply_filters( 'woocommerce_stock_amount', preg_replace( "/[^0-9\.]/", '', filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT)) ), $cart_item_key );
    
        // Update cart validation
        $passed_validation  = apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $threeball_product_values, $threeball_product_quantity );
    
        // Update the quantity of the item in the cart
        if ( $passed_validation ) {
            WC()->cart->set_quantity( $cart_item_key, $threeball_product_quantity, true );
        }
    
        // Refresh the page
        echo WC()->cart->cart_contents_total;
    
        die();
    
    }
    add_action('wp_ajax_qty_cart', 'ajax_qty_cart');
    add_action('wp_ajax_nopriv_qty_cart', 'ajax_qty_cart');


    // Add to cart
    add_action('wp_ajax_addToCartAjax', 'addToCartAjax');
    add_action('wp_ajax_nopriv_addToCartAjax', 'addToCartAjax');
    function addToCartAjax(){
        global $woocommerce;
        $result = array(
            'success' => false,
            'message' => '',
            'cartCount' => '',
            'cartTotal' => '',
            'html' => ''
        );
        if(!function_exists("WC")){
            $result['message'] = "woocommerce not installed";
        }elseif(empty($_POST['productID'])){
            $result['message'] = "no product id provided";
        }else{
            $productID = $_POST['productID'];
            $cart = WC()->cart;
            $result['success'] = $cart->add_to_cart($productID);
            if(!$result['success']){
                $result['message'] = "product could not be added to cart";
            } else {
                $result['message'] = "product added to cart";
                $result['cartTotal'] = number_format(WC()->cart->cart_contents_total,0,",",".");
                $result['cartCount'] = sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count );
                $products_in_cart = $woocommerce->cart->get_cart();
                foreach ($products_in_cart as $key => $product) {
                    $cart_item_remove_url = wc_get_cart_remove_url($key);
                    $result['html'] .= '<tr>
                                            <td>
                                                <div class="__img">
                                                    <img src="'.get_the_post_thumbnail_url($product['product_id']).'" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <a href="'.get_the_permalink($product['product_id']).'" class="--name">'.get_the_title($product['product_id']).' <span>'.$product['data']->sku.'</span></a>
                                            </td>
                                            <td>
                                                <input type="number" id="quantity[1]" class="input-text qty text" step="1" min="0" value="'. $product['quantity'].'" max="" name="cart['. $product['key'].'][qty]" title="Qty" size="4" placeholder="" inputmode="numeric">
                                            </td>
                                            <td>
                                                <span class="price">'.number_format($product['line_total']/$product['quantity'],0,",",".").'VND</span>
                                            </td>
                                            <td>
                                                <a class="__remove remove_cart" href="'.$cart_item_remove_url.'" cart-key-item="cart['. $product['key'].'][qty]">
                                                    <img src="'.THEME_ASSETS.'/images/cart/remove.png'.'" alt="">
                                                </a>
                                            </td>
                                        </tr>';
                }
            }
        }
        echo json_encode($result);
        wp_die();
    }

    // remove cart item
    add_action('wp_ajax_removeCartItemAjax', 'removeCartItemAjax');
    add_action('wp_ajax_nopriv_removeCartItemAjax', 'removeCartItemAjax');
    function removeCartItemAjax(){
        global $woocommerce;
        $result = array(
            'success' => false,
            'message' => '',
            'cartCount' => '',
            'cartTotal' => '',
        );
        $cart_key_item = $_POST['key'];
        $cart = WC()->cart;
        $result['success'] = $cart->remove_cart_item($cart_key_item);
        if(!$result['success']){
            $result['message'] = "An error has occured, the product cannot be removed from the cart";
        }else{
            $result['message'] = "Remove a cart item";
            $result['cartTotal'] = number_format(WC()->cart->cart_contents_total,0,",",".");
            $result['cartCount'] = sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count );
            $products_in_cart = $woocommerce->cart->get_cart();
        }
        echo json_encode($result);
        wp_die();
    }
    // add new tab My account page
function my_account_menu_order() {
    $menuOrder = array(
        'dashboard'          => __( 'Thông tin đăng nhập', 'woocommerce' ),
        'my-account-address'       => __( 'Sổ địa chỉ', 'woocommerce' ),
        'downloads'          => __( 'Thông tin thanh toán', 'woocommerce' ),
        'my-account-orders'             => __( 'Lịch sử đơn hàng', 'woocommerce' ),
 		'customer-logout'    => __( 'Logout', 'woocommerce' ),
		
    );
    return $menuOrder;
}
add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );
// GET DATA TO POPUP DETAIL ORDER
add_action( 'wp_ajax_thongbao', 'thongbao_init' );
add_action( 'wp_ajax_nopriv_thongbao', 'thongbao_init' );
function thongbao_init() {
   
    $customer = wp_get_current_user();
    $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'orderby' => 'date',
        'order' => 'DESC',
        'meta_value'  => get_current_user_id(),
        'post_type'   => wc_get_order_types(),
        'post_status' => array_keys( wc_get_order_statuses() ),  'post_status' 
        => array( 'wc-processing','wc-processing','wc-on-hold','wc-completed','wc-cancelled', 'wc-refunded','wc-failed' ),
    ) );
    
    $data_json=[];
    foreach($customer_orders as $customer_order){
        $orderq = wc_get_order( $customer_order );
        $orderq_id=$orderq->get_id();
        $orderq_date=date_format($orderq->get_date_created(),"d/m/Y");
        $orderq_key=str_replace('wc_order_','',$orderq->get_order_key());
        $orderq_status= $orderq->get_status();
        $orderq_total=number_format($orderq->get_total(),0,",",".");
        $orderq_address=wp_kses_post( $orderq->get_formatted_shipping_address( esc_html__( 'N/A', 'woocommerce' ) ) );
        $product_in_order=[];
        foreach ( $orderq->get_items() as $item_id => $item ) {
            $product_id = $item->get_product_id();
            $product=wc_get_product($product_id );
            $product_name=$product->get_name();
            $product_img=get_the_post_thumbnail_url($product_id);
            $product_sku=$product->get_sku();
            $product_price=number_format($product->get_price(),0,",",".");
            $product_quantity=$item->get_quantity();
            // $product_in_order=[$product_id,$product_sku,$product_name,$product_img,$product_price,$product_quantity];
            array_push($product_in_order,array("id"=>$product_id,"sku"=>$product_sku,"name_prd"=>$product_name,"img_prd"=>$product_img,"price"=>$product_price,"quantity"=>$product_quantity));
        }
        array_push($data_json,array("id"=>$orderq_id,"order_key"=>$orderq_key,"order_date"=>$orderq_date,"order_status"=>$orderq_status,"product_in_order"=>$product_in_order,"order_total"=>$orderq_total,"order_
        "=>$orderq_address));
    }
    // $website = (isset($_POST['website']))?esc_attr($_POST['website']) : '';
    wp_send_json_success(json_encode($data_json));
    die();//bắt buộc phải có khi kết thúc
}
// CANCEL ORDER
add_action( 'wp_ajax_cancel_order', 'cancel_order_init' );
add_action( 'wp_ajax_nopriv_cancel_order', 'cancel_order_init' );
function cancel_order_init() {
    $order_id = (isset($_POST['order_id']))?esc_attr($_POST['order_id']) : '';
    $order = new WC_Order($order_id);
    $order->update_status('cancelled', 'order_note');
    wp_send_json_success(json_encode($order_id));
    die();//bắt buộc phải có khi kết thúc
}
// GET DATA ADDRESS USER
add_action( 'wp_ajax_address', 'select_address_init' );
add_action( 'wp_ajax_nopriv_address', 'select_address_init' );
function select_address_init() {
 
    global $wpdb;
    $user_woo=get_user_meta(get_current_user_id());
    $current_user_fields=get_fields(wp_get_current_user());
    $current_city=$user_woo['billing_state'][0];
    $current_district=$user_woo['billing_city'][0];
    $current_wards=$user_woo['billing_address_2'][0];

    $current_address=$user_woo['billing_address_1'][0];
    $current_building=$user_woo['billing_company'];
    $current_postcode= $user_woo['billing_postcode'][0];

    $data_current_address=array('user_city'=>$current_city,'user_district'=>$current_district,'user_wards'=>$current_wards,'user_address'=>$current_address,'user_building'=>$current_building,'user_post_code'=>$current_postcode);

    $city =  $wpdb->get_results( "SELECT * FROM devvn_tinhthanhpho" );
    $district =  $wpdb->get_results( "SELECT * FROM devvn_quanhuyen" );
    $wards =  $wpdb->get_results( "SELECT * FROM devvn_xaphuongthitran" );
    $data_address=array('city'=>$city,'district'=>$district,'wards'=>$wards,'user_address'=>$data_current_address);
    wp_send_json_success($data_address);
 
    die();//bắt buộc phải có khi kết thúc
}
// GET CITY QUOTE
add_action( 'wp_ajax_city_quote', 'city_quote_init' );
add_action( 'wp_ajax_nopriv_city_quote', 'city_quote_init' );
function city_quote_init() {
 
    global $wpdb;
    $city =  $wpdb->get_results( "SELECT * FROM devvn_tinhthanhpho" );
    $data=array('city'=>$city);
    wp_send_json_success($data);
 
    die();//bắt buộc phải có khi kết thúc
}

// REMOVE FIELD
// add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields',10);
// function custom_override_checkout_fields( $fields ) {
//     unset($fields['billing']['billing_postcode']);
//     return $fields;
// }
// add_filter( 'woocommerce_checkout_fields', 'misha_email_first' );

// function misha_email_first( $checkout_fields ) {
//     $checkout_fields['billing']['billing_phone']['priority'] = 20;
// 	return $checkout_fields;
// }