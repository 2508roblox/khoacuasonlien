<?php
    // Template Name: Checkout-billing
    get_header();
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
        <div class="_banner" style="background-image: url('<?php echo THEME_ASSETS.'/images/login-signin/banner.png' ?>')"></div>
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
                        <div class="swiper-slide">
                            <a href="javascript:void(0);">
                                Bước 2. Thông tin giao hàng
                            </a>
                        </div>
                        <div class="swiper-slide is--active">
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
                <div class="swiper-button-next --panigate"><img src="<?php echo THEME_ASSETS.'/images/products/next.png'; ?>" alt=""></div>
                <div class="swiper-button-prev --panigate"><img src="<?php echo THEME_ASSETS.'/images/products/prev.png'; ?>" alt=""></div>
            </div>
        </div>
    </div>

    <div class="_content_site">
        <div class="tw_container">
            <div class="content_all login_signin">
                
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
                    spaceBetween: 30,
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
    });
</script>
<?php get_template_part( 'template-parts/social/social' ); get_footer(); ?>