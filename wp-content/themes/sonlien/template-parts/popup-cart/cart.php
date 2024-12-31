<?php
global $woocommerce;
$products_in_cart = $woocommerce->cart->get_cart();

?>
<div class="cart_coating" id="cartPopup">
    <div class="cart_main">
        <div class="__close" id="hideCart"><img src="<?php echo THEME_ASSETS . '/images/cart/close.png'; ?>" alt=""></div>
        <div class="__message" id="cart-count">Bạn đang có <span><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count), WC()->cart->cart_contents_count); ?></span> sản phẩm trong giỏ hàng</div>
        <div class="_products_cart">
            <form action="#">
                <table id="cart-view">
                    <tr>
                        <th></th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($products_in_cart as $key => $product) :
                        $cart_item_remove_url = wc_get_cart_remove_url($key);
                    ?>
                        <tr>
                            <td>
                                <div class="__img">
                                    <img src="<?php echo get_the_post_thumbnail_url($product['product_id']); ?>" alt="">
                                </div>
                            </td>
                            <td>
                                <a href="<?php echo get_the_permalink($product['product_id']); ?>" class="--name"><?php echo get_the_title($product['product_id']); ?> <span><?php echo $product['data']->sku; ?></span></a>
                            </td>
                            <td>
                                <input type="number" id="quantity[1]" class="input-text qty text" step="1" min="0" value="<?php echo $product['quantity'] ?>" max="" name="cart[<?php echo $product['key']; ?>][qty]" title="Qty" size="4" placeholder="" inputmode="numeric">
                            </td>
                            <td>
                                <span class="price"><?php echo number_format($product['line_total'] / $product['quantity'], 0, ",", "."); ?>VND</span>
                            </td>
                            <td>
                                <a class="__remove remove_cart" href="<?php echo $cart_item_remove_url; ?>" cart-key-item="cart[<?php echo $product['key']; ?>][qty]">
                                    <img src="<?php echo THEME_ASSETS . '/images/cart/remove.png'; ?>" alt="cart[<?php echo $product['key']; ?>][qty]">
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </form>
            <div class="_total">
                <div class="__label">
                    <p>Tổng cộng:</p>
                    <p>(Đã bao gồm VAT)</p>
                </div>
                <div class="__amount" id="cart-amount"><span><?php echo number_format(WC()->cart->cart_contents_total, 0, ",", "."); ?></span>VND</div>
            </div>
            <div class="_control">
                <button class="__shopping" id="shopping-cart">Tiếp tục mua hàng</button>
                <a class="__ordered" id="ordered-cart" href="<?php echo bloginfo('url') . '/thong-tin-giao-hang'; ?>">Đặt mua</a>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        if ($(window).width() >= 1200) {
            $('#showCart').on('click', function(e) {
                $('#cartPopup').addClass('is--active');
            });
        } else {
            $('#showCartMobile').on('click', function(e) {
                $('#cartPopup').addClass('is--active');
            });
        }

        $('#hideCart, #shopping-cart').on('click', function(e) {
            $('#cartPopup').removeClass('is--active');
        });

        $('.add-to-cart').on('click', function(event) {
            event.preventDefault();
            var cartView = '<tr><th></th><th>Tên sản phẩm</th><th>Số lượng</th><th>Giá tiền</th><th></th></tr>';
            var productID = $(this).attr('data-product-id');
            var buttonAddToCart = $(this);
            jQuery.ajax({
                type: "POST",
                url: obj.AJAX_URL,
                data: {
                    action: 'addToCartAjax',
                    productID: productID,
                },
                dataType: 'JSON',
                beforeSend: function() {
                    $(buttonAddToCart).text("Mua ngay . . .");
                    $(this).prop('disabled', true);
                },
                complete: function() {
                    $(buttonAddToCart).text("Mua ngay");
                    $(this).prop('disabled', false);
                },
                success: function(response) {
                    if (response.success) {
                        cartView += response.html;
                        $('#cart-view').html(cartView);
                        $('#cart-amount span').html(response.cartTotal);
                        $('#cart-count span').html(response.cartCount);
                        $('.cart_count_menu').html(response.cartCount);
                        $('#cartPopup').addClass('is--active');
                        removeCart();
                    } else {
                        console.log(response.success);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr + ' ,' + status + ' ,' + error);
                }
            });
        });

        function removeCart() {
            $('.remove_cart').click(function(e) {
                e.preventDefault();
                console.log('test click remove');
                var cart_item_key = $(this).attr('cart-key-item').replace(/cart\[([\w]+)\]\[qty\]/g, "$1");;
                var tr = $(this).parent('td').parent('tr');
                jQuery.ajax({
                    type: "POST",
                    url: obj.AJAX_URL,
                    data: {
                        action: 'removeCartItemAjax',
                        key: cart_item_key,
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.success) {
                            $(tr).remove();
                            $('#cart-amount span').html(response.cartTotal);
                            $('#cart-count span').html(response.cartCount);
                            $('.cart_count_menu').html(response.cartCount);
                        } else {
                            console.log(response.success)
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr + ' ,' + status + ' ,' + error);
                    }
                });
            });
        }
        removeCart();
    });
</script>