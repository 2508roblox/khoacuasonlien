<?php
// Template Name: Checkout-shipping
get_header();
$hotline = get_field('hotline', 'option');
?>
<div class="banner_page" id="banner_page--content">
    <div class="content_all">
        <div class="_title-breadcrumb">
            <div class="_break">
                <p class="__breadcrumbs">
                    <a href="<?php echo bloginfo('url'); ?>">Trang chủ</a>
                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                    <span>Thanh toán</span>
                </p>
            </div>
            <h1>Thanh toán</h1>
        </div>
        <div class="_banner" style="background-image: url('<?php echo THEME_ASSETS . '/images/login-signin/banner.png' ?>')"></div>
    </div>
</div>

<div class="checkout">
    <div class="_step_checkout">
        <div class="tw_container">
            <div class="_steps" id="checkout_steps">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="javascript:void(0);">
                                Bước 1: Đăng nhập
                            </a>
                        </div>
                        <div class="swiper-slide is--active" steps-checkout="step_checkout_01">
                            <a href="javascript:void(0);">
                                Bước 2. Thông tin giao hàng
                            </a>
                        </div>
                        <div class="swiper-slide" steps-checkout="step_checkout_02">
                            <a href="javascript:void(0);">
                                bước 3. thanh toán
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="javascript:void(0);">
                                bước 4. đặt hàng
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next --panigate"><img src="<?php echo THEME_ASSETS . '/images/products/next.png'; ?>" alt=""></div>
                <div class="swiper-button-prev --panigate"><img src="<?php echo THEME_ASSETS . '/images/products/prev.png'; ?>" alt=""></div>
            </div>
        </div>
    </div>

    <div class="_content_site">
        <div class="tw_container">
            <div class="content_all checkout-page">
                <div class="__left">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                </div>
                <div class="__right">
                    <?php
                    global $woocommerce;
                    $products_in_cart = $woocommerce->cart->get_cart();
                    ?>
                    <div class="summary_order">
                        <p class="title_summary_order">Tóm tắt đơn hàng</p>
                        <div class="list_order">
                            <?php
                            foreach ($products_in_cart as $key => $product) {
                                $cart_item_remove_url = wc_get_cart_remove_url($key);
                            ?>
                                <div class="_item_product">
                                    <div class="--img">
                                        <img src="<?php echo get_the_post_thumbnail_url($product['product_id']); ?>" alt="">
                                    </div>
                                    <div class="--ifo">
                                        <p><?php echo get_the_title($product['product_id']); ?><br><span><?php echo $product['data']->sku; ?></span></p>
                                        <p><?php echo $product['quantity']; ?> X <span><?php echo number_format($product['line_total'] / $product['quantity'], 0, ",", "."); ?>VND</span></p>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <!-- <div class="_item_product">
                                <div class="--img">
                                    <img src="<?php echo THEME_ASSETS . '/images/products/product.png'; ?>" alt="">
                                </div>
                                <div class="--ifo">
                                    <p>Thiết bị lọc nước lắp tại vòi <span>eu201</span></p>
                                    <p>1 X <span>2.450.000VND</span></p>
                                </div>
                            </div>
                            <div class="_item_product">
                                <div class="--img">
                                    <img src="<?php echo THEME_ASSETS . '/images/products/product.png'; ?>" alt="">
                                </div>
                                <div class="--ifo">
                                    <p>Thiết bị lọc nước lắp tại vòi <span>eu201</span></p>
                                    <p>1 X <span>2.450.000VND</span></p>
                                </div>
                            </div>
                            <div class="_item_product">
                                <div class="--img">
                                    <img src="<?php echo THEME_ASSETS . '/images/products/product.png'; ?>" alt="">
                                </div>
                                <div class="--ifo">
                                    <p>Thiết bị lọc nước lắp tại vòi <span>eu201</span></p>
                                    <p>1 X <span>2.450.000VND</span></p>
                                </div>
                            </div> -->
                        </div>
                        <!-- <form id="frm_discount_code">
                            <p>mã giảm giá (nếu có)</p>
                            <div class="frm_group">
                                <input type="text" name="discountCode" id="discountCode">
                                <button type="submit">Áp dụng</button>
                            </div>
                            <p class="error_mess">Mã không tồn tại</p>
                        </form> -->
                        <div class="total_products">
                            <p><span>Tổng sản phẩm: </span><span><?php echo number_format(WC()->cart->cart_contents_total, 0, ",", "."); ?>VND</span></p>
                            <p><span>Giao hàng: </span><span>Theo cước vận chuyển bưu điện</span></p>
                        </div>
                        <div class="total_order">
                            <p><span>Tổng đơn hàng: </span><span><?php echo number_format(WC()->cart->cart_contents_total, 0, ",", "."); ?>VND</span></p>
                        </div>
                    </div>

                    <div class="need_help">
                        <p>Cần trợ giúp?</p>
                        <span>Gọi HOTLINE <?php echo $hotline; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        var swiper_checkout_steps = new Swiper('#checkout_steps .swiper-container', {
            slidesPerView: 4,
            spaceBetween: 50,
            simulateTouch: false,
            speed: 1200,
            navigation: {
                nextEl: '#checkout_steps .swiper-button-next',
                prevEl: '#checkout_steps .swiper-button-prev',
            },
            breakpoints: {
                1366: {
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                    simulateTouch: true,
                },
                480: {
                    simulateTouch: true,
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
            }
        });
        $('#back_cart').on('click', function(e) {
            e.preventDefault();
        });

        $('#continue_checkout').on('click', function(e) {
            e.preventDefault();
            $('.step_checkout_01').removeClass('is--active');
            $('.step_checkout_02').addClass('is--active');
            $('[steps-checkout]').removeClass('is--active');
            $('[steps-checkout="step_checkout_02"]').addClass('is--active');
            $('.btn_checkout_control').removeClass('is--active');
        });

        $('[steps-checkout]').on('click', function(e) {
            var stepClass = $(this).attr('steps-checkout');
            var stepCheckout = $('.' + stepClass + '');
            $('.step_checkout_shared').removeClass('is--active');
            $('[steps-checkout]').removeClass('is--active');
            $(this).addClass('is--active');
            $(stepCheckout).addClass('is--active');
            if (!$('.btn_checkout_control').hasClass('is--active')) {
                $('.btn_checkout_control').addClass('is--active');
            } else {
                $('.btn_checkout_control').removeClass('is--active');
            }
        })

        $('.checkout.woocommerce-checkout').on('click', '.back_to_shipping_form', function(e) {
            e.preventDefault();
            // alert('asdasd');
            $('[steps-checkout="step_checkout_01"]').trigger('click');
        })
    });
</script>
<?php get_template_part('template-parts/social/social');
get_footer(); ?>