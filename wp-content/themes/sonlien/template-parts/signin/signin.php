<div class="coating_signin"></div><!-- is--active -->
<div class="block_signin"><!-- is--active -->
    <div class="_center_content"></div>
    <div class="_signin">
        <div class="--close-signin"><img src="<?php echo THEME_ASSETS.'/images/login-signin/close.png'; ?>" alt=""></div>
        <p class="__title_social">Đăng ký qua</p>
        <div class="__signin_social">
            <a href="#"><img src="<?php echo THEME_ASSETS.'/images/login-signin/fb.png'; ?>" alt=""></a>
            <a href="#"><img src="<?php echo THEME_ASSETS.'/images/login-signin/gg.png'; ?>" alt=""></a>
        </div>
        <p class="__title_signin">Hoặc tạo tài khoản</p>
        <form action="#" class="frm_signin" id="signin">
            <?php wp_nonce_field( 'nonce_field_signin_submit', 'nonce_field_signin' ); ?>
            <input type="hidden" name="birthday" id="birthday">
            <div class="fields-all">
                <div class="--frm_group">
                    <label>Họ và tên <span>*</span></label>
                    <input type="text" name="username" id="username">
                    <p class="message_field" id="message_name"></p>
                </div>
                <div class="--frm_group">
                    <label>Ngày sinh <span>*</span></label>
                    <div class="--select">
                        <select name="day" id="day">
                            <option value="">Ngày</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="27">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                        <select name="month" id="month">
                            <option value="">Tháng</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="04">05</option>
                            <option value="04">06</option>
                            <option value="04">07</option>
                            <option value="04">08</option>
                            <option value="04">09</option>
                            <option value="04">10</option>
                            <option value="04">11</option>
                            <option value="04">12</option>
                        </select>
                        <select name="year" id="year"></select>
                    </div>
                    <p class="message_field" id="message_birthday"></p>
                </div>
                <div class="--frm_group">
                    <label>Email <span>*</span></label>
                    <input type="text" name="email" id="email">
                    <p class="message_field" id="message_email"></p>
                </div>
                <div class="--frm_group">
                    <label>Mật khẩu <span>*</span></label>
                    <input type="password" name="pwd" id="pwd">
                    <p class="message_field" id="message_pwd"></p>
                </div>
                <div class="--frm_group">
                    <input type="checkbox" name="condition" id="condition" value="yes">
                    <label for="condition">Tôi đã đọc, hiểu và chấp thuận <a href="#">Chính sách Bảo mật</a> và <a href="#">Các Điều khoản và Điều kiện</a></label>
                </div>
            </div>
            <button type="submit" id="signin-submit">Đăng ký</button>
            <p class="message_error"></p>
        </form>
    </div>
</div>

<script>
    jQuery(document).ready(function($){
        var usernameEl = document.getElementById("username");
        var daySelectEl = document.getElementById("day");
        var monthSelectEl = document.getElementById("month");
        var yearSelectEl = document.getElementById("year");
        var emailEl = document.getElementById("email");
        var pwdEl = document.getElementById("pwd");
        var conditionEl = document.getElementsByName('condition');
        var birthdayEl = document.getElementById("birthday");
        var nonceEl = document.getElementById("nonce_field_signin");
        var d = new Date();
        var y = d.getFullYear();
        function optionYear(el,y,option){
            let options = option;
            for (let i = y; i >= 1960; i--) {
                options += '<option value="'+i+'">'+i+'</option>';
            }
            $(el).html(options);
        }
        optionYear(yearSelectEl, y, '<option value="">Năm</option>');
        $('#signin').on('change', function(e){
            e.preventDefault();
            let day = valueSelectOption($(daySelectEl).children('option'));
            let month = valueSelectOption($(monthSelectEl).children('option'));
            let year = valueSelectOption($(yearSelectEl).children('option'));
            let condition = valueChekbox(conditionEl);
            if(day && month && year){
                birthdayEl.value = ''+day+'/'+month+'/'+year+'';
            }
            if(condition){
                $('#signin-submit').addClass('is--active');
            }else{
                $('#signin-submit').removeClass('is--active');
            }
        });

        var check_boolean_name = false;
        $('#username').keyup(function (event) {
            let username = $(this).val();
            let username_msg = $('body').find('#message_name');
            if ( !validateName(username)) {
                username_msg.text('Họ và tên liên hệ không hợp lệ');
                check_boolean_name = false;
            }else if(username.length > 35){
                username_msg.text('Họ và tên không nhập quá 35 ký tự!');
                check_boolean_name = false;
            }else {
                username_msg.text('');
                check_boolean_name = true;
            }
        });

        var check_boolean_email = false;
        $('#email').keyup(function (event) {
            var email = $(this).val();
            var email_msg = $('body').find('#message_email');
            if (!validateEmail(email) ) {
                email_msg.text('Email không hợp lệ');
                check_boolean_email = false;
            } else if(email.length > 70){
                email_msg.text('Email không nhập quá 70 ký tự!');
                check_boolean_email = false;
            } else {
                email_msg.text('');
                check_boolean_email = true;
            }

        });
        $('#signin').submit(function(e){
            e.preventDefault();
            let flag = true;
            let username = usernameEl.value;
            let birthday = birthdayEl.value;
            let email = emailEl.value;
            let pwd = pwdEl.value;
            let nonce = nonceEl.value;
            let thisEl = $(this);
            let buttonSubmitEl = thisEl.find('button');
            let inputAll = thisEl.find('.fields-all');
            let mess_error = thisEl.find('.message_error');
            if(!username || !birthday || !email || !pwd || !nonce){
                flag = false;
            }
            if(!flag){
                if(!username){
                    $('#message_name').html('Vui lòng điền đầy đủ Họ và Tên!');
                }
                if(!birthday){
                    $('#message_birthday').html('Vui lòng điền đầy đủ Ngày sinh!');
                }
                if(!email){
                    $('#message_email').html('Vui lòng điền đầy đủ Email!');
                }
                if(!pwd){
                    $('#message_pwd').html('Vui lòng điền đầy đủ Mật khẩu!');
                }
            }else{
                jQuery.ajax({
                    type: "POST",
                    url: obj.AJAX_URL,
                    data: {
                        action: 'signinForm',
                        username: username,
                        birthday: birthday,
                        email: email,
                        pwd: pwd,
                        nonce_field_signin: nonce,
                    },
                    dataType: 'JSON',
                    beforeSend: function () {
                        $(buttonSubmitEl).text("Đang xử lý . . .");
                        $(buttonSubmitEl).prop('disabled', true);
                    },
                    complete: function () {
                        $(buttonSubmitEl).text("Đăng ký");
                        $(buttonSubmitEl).prop('disabled', false);
                    },
                    success: function (response) {
                        if(response.success){
                            $(inputAll).remove();
                            $(buttonSubmitEl).remove();
                            $(mess_error).html(response.data);
                        }else{
                            $(mess_error).html(response.data);
                        }
                    }
                });
            };
            
        });

        $('.coating_signin, .--close-signin').on('click', function(){
            $('.coating_signin').removeClass('is--active');
            $('.block_signin').removeClass('is--active');
        });
    });
</script>