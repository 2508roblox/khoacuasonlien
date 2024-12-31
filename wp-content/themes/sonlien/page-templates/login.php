<?php
// Template Name: Login
if (is_user_logged_in()) {
    wp_redirect(bloginfo('url') . '/khoacuasonlien/thong-tin-giao-hang');
    exit;
}
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
        <div class="_banner" style="background-image: url('<?php echo THEME_ASSETS . '/images/login-signin/banner.png' ?>')"></div>
    </div>
</div>
<div class="checkout">
    <div class="_step_checkout">
        <div class="tw_container">
            <div class="_steps" id="checkout_steps">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide is--active">
                            <a href="javascript:void(0);">
                                Bước 1: Đăng nhập
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="javascript:void(0);">
                                Bước 2. Thông tin giao hàng
                            </a>
                        </div>
                        <div class="swiper-slide">
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
            <div class="content_all login_signin">
                <div class="__left">
                    <p class="--directional">Nhập địa chỉ Email và Mật khẩu của bạn để mua hàng!</p>
                    <form action="#" id="login" class="frm_login">
                        <?php wp_nonce_field('nonce_field_login_submit', 'nonce_field_login'); ?>
                        <div class="field_all">
                            <div class="--frm_group">
                                <label for="email-login">Email <span>*</span></label>
                                <input type="text" id="email-login" name="email-login">
                                <p class="message_field" id="message_email_login"></p>
                            </div>
                            <div class="--frm_group">
                                <label for="pwd-login">Mật khẩu <span>*</span></label>
                                <input type="password" id="pwd-login" name="pwd-login">
                                <p class="message_field" id="message_pwd_login"></p>
                            </div>
                        </div>
                        <div class="frm_control">
                            <a href="#">Quên mật khẩu?</a>
                            <button type="submit" id="login-submit">Đăng nhập</button>
                        </div>
                        <div class="message_err_login"></div>
                    </form>
                    <p class="--or">hoặc</p>
                    <div class="--login-social">
                        <a href="#"><img src="<?php echo THEME_ASSETS . '/images/login-signin/fb.png'; ?>" alt=""></a>
                        <a href="#"><img src="<?php echo THEME_ASSETS . '/images/login-signin/gg.png'; ?>" alt=""></a>
                    </div>
                    <a href="<?php echo bloginfo('url') . '/thong-tin-giao-hang'; ?>" class="--not-login">Thanh toán không cần tài khoản</a>
                </div>
                <div class="__right">
                    <p class="__question">Chưa có tài khoản?</p>
                    <p>Tạo tài khoản để theo dõi đơn hàng, lưu danh sách sản phẩm yêu thích, nhận nhiều ưu đãi hấp dẫn.</p>
                    <ul>
                        <li>Một lần đăng nhập chung duy nhất để tương tác với các sản phẩm và dịch vụ của Mistubishi Cleansui</li>
                        <li>Thanh toán nhanh hơn</li>
                        <li>Xem lịch sử đặt hàng riêng của bạn</li>
                        <li>Ưu đãi và khuyến mãi độc quyền</li>
                        <li>Thông tin về các sản phẩm mới nhất</li>
                    </ul>
                    <button class="btn_signin">Đăng ký</button>
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

        $('.btn-signin-menu').on('click', function(e) {
            e.preventDefault(e);
            $('.coating_signin').addClass('is--active');
            $('.block_signin').addClass('is--active');
        });

        var email_login = document.getElementById('email-login');
        var pwd_login = document.getElementById('pwd-login');
        var nonce_field_login_el = document.getElementById('nonce_field_login');
        var check_boolean_email_login_login = false;
        $('#email-login').keyup(function(event) {
            let email = email_login.value;
            let email_msg = $('body').find('#message_email_login');
            if (!validateEmail(email)) {
                email_msg.text('Email không hợp lệ');
                check_boolean_email_login = false;
            } else if (email.length > 70) {
                email_msg.text('Email không nhập quá 70 ký tự!');
                check_boolean_email_login = false;
            } else {
                email_msg.text('');
                check_boolean_email_login = true;
            }
        });

        $('#login').submit(function(e) {
            let flag = true;
            let email = email_login.value;
            let pwd = pwd_login.value;
            let nonce = nonce_field_login_el.value;
            let thisEl = $(this);
            let buttonSubmitEl = thisEl.find('button');
            let inputAll = thisEl.find('.field_all');
            let mess_error = thisEl.find('.message_err_login');
            if (!email || !pwd || !nonce) {
                flag = false;
            }
            if (!flag) {
                if (!email) {
                    $('#message_email_login').html('Vui lòng điền đầy đủ Email!');
                }
                if (!pwd) {
                    $('#message_pwd_login').html('Vui lòng điền đầy đủ Mật khẩu!');
                }
            } else {
                jQuery.ajax({
                    type: "POST",
                    url: obj.AJAX_URL,
                    data: {
                        action: 'loginForm',
                        email: email,
                        password: pwd,
                        nonce_field_login: nonce,
                    },
                    dataType: 'JSON',
                    beforeSend: function() {
                        $(buttonSubmitEl).text("Đang gửi đi . . .");
                        $(buttonSubmitEl).prop('disabled', true);
                    },
                    complete: function() {
                        $(buttonSubmitEl).text("Đăng nhập");
                        $(buttonSubmitEl).prop('disabled', false);
                    },
                    success: function(response) {
                        if (response.success) {
                            // $(inputAll).remove();
                            // $(buttonSubmitEl).remove();
                            // $(mess_error).html(response.data);
                            document.location.href = '<?php echo bloginfo('url') . '/thong-tin-giao-hang'; ?>';
                        } else {
                            $(mess_error).html(response.data);
                        }
                    }
                });
            }
            e.preventDefault();
        });
    });
</script>

<?php
get_template_part('template-parts/social/social');
get_footer();
?>