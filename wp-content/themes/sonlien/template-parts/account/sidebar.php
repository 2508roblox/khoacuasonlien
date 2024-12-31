<div class="_row_setting_account">
    <?php
    // echo '<pre>';var_dump( explode('/', $_SERVER['REQUEST_URI']));echo'</pre>';
    function active($currect_page)
    {
        $url_array =  explode('/', $_SERVER['REQUEST_URI']);
        // $result=strpos($_SERVER['REQUEST_URI'],$currect_page);
        if ($url_array[2] == $currect_page) {
            echo 'is-active';
        }
    }
    $hotline = get_field('hotline', 'option');
    ?>
    <h2>Quản lý tài khoản</h2>
    <ul>
        <li class="<?php active('my-account'); ?>"><a href="<?php echo get_home_url() . '/my-account'; ?>">Thông tin đăng nhập</a></li>
        <li class="<?php active('my-account-address'); ?>"><a href="<?php echo get_home_url() . '/my-account-address'; ?>">Sổ địa chỉ</a></li>
        <li><a href="#">Thông tin thanh toán</a></li>
        <li class="<?php active('my-account-orders'); ?>"><a href="<?php echo get_home_url() . '/lich-su-don-hang'; ?>">Lịch sử đơn hàng</a></li>
        <li><a href="<?php echo wp_logout_url(home_url()); ?>">Đăng xuất</a></li>
    </ul>
    <!-- <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
                        <li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?>">
                            <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>"><?php echo esc_html($label); ?></a>
                        </li>
                    <?php endforeach; ?> -->
</div>
<hr>
<div class="_row_support">
    <h2>Cần trợ giúp?</h2>
    <p>Gọi HOTLINE <?php echo $hotline; ?></p>
    <!-- <ul>
                       <li><a href="#">Sản phẩm</a></li>
                       <li><a href="#">Đặt hàng & thanh toán</a></li>
                       <li><a href="#">Giao hàng</a></li>
                       <li><a href="#">Chương trình khuyến mãi</a></li>
                       <li><a href="#">Trả lại hàng & Hoàn tiền</a></li>
                       <li><a href="#">Hỗ trợ & chăm sóc khách hàng</a></li>
                   </ul> -->
</div>