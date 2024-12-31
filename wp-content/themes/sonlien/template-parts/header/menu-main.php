<?php
global $current_user;
wp_get_current_user();
$flag = false;
if (strpos(home_url(), 'en') !== false) {
    $flag = true;
} else $flag = false;
?>
<div class="header-main">
    <!-- <div class="tw_container"> -->
    <div class="content_all">
        <div class="_left">
            <a href="<?php bloginfo('url'); ?>"><img src="<?php echo THEME_ASSETS . '/images/homes/logo.png'; ?>" alt=""></a>
            <div class="__close" id="close"><img src="<?php echo THEME_ASSETS . '/images/homes/close.png'; ?>" alt=""></div>
        </div>
        <div class="_login_m">
            <div class="__member--icon">
                <img src="<?php echo THEME_ASSETS . '/images/homes/member.png'; ?>" alt="">
                <p>Chào mừng bạn tới với <span>Khóa cửa Sơn Liên</span></p>
            </div>
            <div class="__button--click">
                <!-- <a href="/mitsubishi/my-account/">
                            <?php
                            if (is_user_logged_in()) {
                                echo $current_user->display_name;
                            } else {
                                echo 'Đăng nhập';
                            }
                            ?>
                        </a>
                        <a href="#">Đăng ký</a> -->
                <?php
                if (is_user_logged_in()) {
                    echo '<a href="/my-account/">' . $current_user->display_name . '</a>';
                    echo '<a href="' . wp_logout_url(home_url()) . '">Đăng xuất</a>';
                } else {
                    echo '<a class="btn-login-menu" href="#">Đăng nhập</a>';
                    echo '<a class="btn-signin-menu" href="#">Đăng ký</a>';
                }
                ?>
            </div>
        </div>
        <div class="_right">
            <div class="__cart-login">
                <ul> <?php pll_the_languages(array(
                            'show_flags' => 0,
                            'dropdown' => 0,
                            'display_names_as' => 'slug'
                        )); ?>
                </ul>
                <span class="--login">
                    <?php
                    if (is_user_logged_in()) {
                        // echo '<pre>';var_dump($flag);echo'</pre>';     
                    ?>
                        <a href="<?php bloginfo('url') ?><?php if ($flag) echo '/account';
                                                            else echo '/my-account'; ?>">
                            <img src="<?php echo THEME_ASSETS . '/images/homes/login.png'; ?>" alt="">
                            <span><?php echo $current_user->display_name; ?></span>
                        </a>
                        <ul>
                            <li><a href="<?php bloginfo('url') ?><?php if ($flag) echo '/account';
                                                                    else echo '/my-account'; ?>"><?php _e('Thông tin', 'corex'); ?></a></li>
                            <li><a href="<?php bloginfo('url') ?><?php if ($flag) echo '/lich-su-don-hang';
                                                                    else echo '/my-account/my-account/my-account-orders/'; ?>"><?php _e('Lịch sử đơn hàng', 'corex'); ?></a></li>
                            <li><a href="<?php echo wp_logout_url(home_url()); ?>"><?php _e('Đăng xuất', 'corex'); ?></a></li>
                        </ul>
                    <?php
                    } else {
                    ?>
                        <a class="btn-login-menu" href="#">
                            <img src="<?php echo THEME_ASSETS . '/images/homes/login.png'; ?>" alt="">
                            <span>Đăng nhập</span>
                        </a>
                        <ul>
                            <li><a class="btn-login-menu" href="#">Đăng nhập</a></li>
                            <li><a class="btn-signin-menu" href="#">Đăng ký</a></li>
                        </ul>
                    <?php
                    }
                    ?>
                </span>
                <a href="javascript:void(0);" id="showCart" class="--cart">
                    <img src="<?php echo THEME_ASSETS . '/images/homes/cart.png'; ?>" alt="">
                    <span>Giỏ hàng</span>
                    <div class="--number_product cart_count_menu"><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count), WC()->cart->cart_contents_count); ?></div>
                </a>
            </div>
            <div class="__menu" id="menu">
                <!-- <ul>
                            <li class="current_page_item">
                                <a href="javascript:void(0);">Giới thiệu</a>
                                <ul>
                                    <li><a href="http://beta.timevn.com/mitsubishi/gioi-thieu/">Mitsubishi cleansui</a></li>
                                    <li><a href="#">màng lọc sợi rỗng</a></li>
                                    <li><a href="#">dự án</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="http://beta.timevn.com/mitsubishi/san-pham/thiet-bi-loc-nuoc/">Thiết bị lọc nước</a>
                                <ul>
                                    <li>
                                        <a href="#">lọc nước ion kiềm</a>
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <p><img src="<?php echo THEME_ASSETS . '/images/homes/s3_img2.png'; ?>" alt=""></p>
                                                    <p>ue201</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <p><img src="<?php echo THEME_ASSETS . '/images/homes/s3_img3.png'; ?>" alt=""></p>
                                                    <p>ue201</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <p><img src="<?php echo THEME_ASSETS . '/images/homes/s3_img4.png'; ?>" alt=""></p>
                                                    <p>ue201</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">dưới chậu rửa</a>
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <p><img src="<?php echo THEME_ASSETS . '/images/homes/s3_img2.png'; ?>" alt=""></p>
                                                    <p>ue201</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <p><img src="<?php echo THEME_ASSETS . '/images/homes/s3_img3.png'; ?>" alt=""></p>
                                                    <p>ue201</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <p><img src="<?php echo THEME_ASSETS . '/images/homes/s3_img4.png'; ?>" alt=""></p>
                                                    <p>ue201</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">trên chậu rửa</a>
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <p><img src="<?php echo THEME_ASSETS . '/images/homes/s3_img2.png'; ?>" alt=""></p>
                                                    <p>ue201</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <p><img src="<?php echo THEME_ASSETS . '/images/homes/s3_img3.png'; ?>" alt=""></p>
                                                    <p>ue201</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <p><img src="<?php echo THEME_ASSETS . '/images/homes/s3_img4.png'; ?>" alt=""></p>
                                                    <p>ue201</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">lắp đầu vòi</a></li>
                                    <li><a href="#">lắp đầu vòi</a></li>
                                    <li><a href="#">lắp đầu vòi</a></li>
                                    <li>
                                        <a href="#">lọc công suất lớn</a>
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <p><img src="<?php echo THEME_ASSETS . '/images/homes/s3_img2.png'; ?>" alt=""></p>
                                                    <p>ue201</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <p><img src="<?php echo THEME_ASSETS . '/images/homes/s3_img3.png'; ?>" alt=""></p>
                                                    <p>ue201</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <p><img src="<?php echo THEME_ASSETS . '/images/homes/s3_img4.png'; ?>" alt=""></p>
                                                    <p>ue201</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                            </li>
                            <li><a href="http://beta.timevn.com/mitsubishi/san-pham/bo-loc-thay-the/">Bộ lọc thay thế</a></li>
                            <li><a href="#">Điểm bán hàng</a></li>
                            <li><a href="#">Dịch vụ</a></li>
                        </ul> -->
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'main-menu',
                        'container' => 'false',
                        'menu_id' => 'main-menu',
                        'menu_class' => 'main-menu'
                    )
                ); ?>
                <a href="tel:0936191504" class="--hotline">
                    <p>hotline </p>
                    <p>0936191504</p>
                </a>
                <a href="tel:0349126473" class="--hotline">
                    <p>hotline </p>
                    <p>0349126473</p>
                </a>
            </div>
        </div>

        <div class="__cart_m">
            <ul>
                <li><a href="#">
                        <p><img src="<?php echo THEME_ASSETS . '/images/homes/cart_m.png'; ?>" alt=""><span>Giỏ hàng của tôi</span></p>
                    </a></li>
                <li><a href="#">
                        <p><img src="<?php echo THEME_ASSETS . '/images/homes/buid.png'; ?>" alt=""><span>Đơn hàng của tôi</span></p>
                    </a></li>
                <li><a href="#">
                        <p><img src="<?php echo THEME_ASSETS . '/images/homes/see.png'; ?>" alt=""><span>Sản phẩm đã xem</span></p>
                    </a></li>
            </ul>
            <ul>
                <li><a href="tel:0349126473">
                        <p><img src="<?php echo THEME_ASSETS . '/images/homes/head.png'; ?>" alt=""><span>Hỗ trợ</span></p>
                    </a></li>
            </ul>
        </div>
    </div>
    <!-- </div> -->
</div>

<div class="--coating"></div>

<div class="header-main--m">
    <div class="_navigate" id="navigate">
        <div class="__pull"></div>
        <div class="__pull"></div>
        <div class="__pull"></div>
    </div>
    <div class="_logo">
        <a href="<?php bloginfo('url'); ?>">
            <img src="<?php echo THEME_ASSETS . '/images/homes/logo.png'; ?>" alt="">
        </a>
    </div>
    <div class="_cart">
        <a href="javascript:void(0)" class="--cart" id="showCartMobile">
            <img src="<?php echo THEME_ASSETS . '/images/homes/cart.png'; ?>" alt="">
            <div class="--number_product cart_count_menu"><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count), WC()->cart->cart_contents_count); ?></div>
        </a>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $('#menu>ul>li').hover(function(e) {
            $(this).children('ul').slideDown(200);
            if ($(window).width() >= 1024) {
                $(this).children('ul').children('li').hover(function() {
                    $(this).children('ul').css({
                        'opacity': '1',
                        'visibility': 'visible'
                    });
                }, function() {
                    $(this).children('ul').css({
                        'opacity': '0',
                        'visibility': 'hidden'
                    });
                });
            }
        }, function() {
            $(this).children('ul').slideUp(200);
        });

        $('#navigate').on('click', function(e) {
            $('.header-main').addClass('is_active');
            $('.--coating').addClass('is_active')
        });
        $('#close, .--coating').on('click', function(e) {
            $('.header-main').removeClass('is_active');
            $('.--coating').removeClass('is_active')
        });
        $('.btn_signin').on('click', function() {
            $('.coating_signin').addClass('is--active');
            $('.block_signin').addClass('is--active');
        });
    });
</script>