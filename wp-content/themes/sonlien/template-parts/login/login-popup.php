<div class="coating_login"></div><!-- is--active -->
<div class="block_login">
    <!-- is--active -->
    <div class="_center_content"></div>
    <div class="_signin">
        <div class="--close-login"><img src="<?php echo THEME_ASSETS . '/images/login-signin/close.png'; ?>" alt=""></div>
        <p class="__title_signin">Đăng nhập</p>
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

            <a href="https://khoacuasonlien39tb.com/wp-login.php?loginSocial=facebook"><img src="<?php echo THEME_ASSETS . '/images/login-signin/fb.png'; ?>" alt=""></a>
            <a href="https://khoacuasonlien39tb.com/wp-login.php?loginSocial=google"><img src="<?php echo THEME_ASSETS . '/images/login-signin/gg.png'; ?>" alt=""></a>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {

        $('.btn-signin-menu').on('click', function(e) {
            e.preventDefault();
            $('.coating_signin').addClass('is--active');
            $('.block_signin').addClass('is--active');
        });

        $('.coating_login, .--close-login').on('click', function() {
            $('.coating_login').removeClass('is--active');
            $('.block_login').removeClass('is--active');
        });

        $('.btn-login-menu').on('click', function(e) {
            e.preventDefault();
            $('.coating_login').addClass('is--active');
            $('.block_login').addClass('is--active');
        });

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
            e.preventDefault();
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
                            document.location.href = '<?php echo bloginfo('url'); ?>';
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