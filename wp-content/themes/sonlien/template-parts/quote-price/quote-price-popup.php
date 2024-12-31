
<div class="coating_quote"></div><!-- is--active -->
<div class="block_quote"><!-- is--active -->
    <div class="_center_content"></div>
    <div class="_quote">
        <div class="--close-quote"><img src="<?php echo THEME_ASSETS.'/images/login-signin/close.png'; ?>" alt=""></div>
        <p class="__title_quote">Nhận báo giá</p>
        <?php
  
        $file=get_field('file_quote_price','option');
        ?>
        <form  id="contact-form" class="frm_quote" >
            <div class="field_all">
                <div class="form-group --frm_group">
                    <label for="name">Họ và tên <span>*</span></label>
                    <input type="text" id="name" name="name">
                    <span class="form-message frm_msg"></span>
                </div>
                <div class="form-group --frm_group">
                    <label for="email">Email <span>*</span></label>
                    <input type="text" id="email" name="email">
                    <span class="form-message frm_msg"></span>
                </div>
                <div class="form-group --frm_group">
                    <label for="phone">Số điện thoại <span>*</span></label>
                    <input type="text" id="phone" name="phone">
                    <span class="form-message frm_msg"></span>
                </div>
                <div class="form-group --frm_group">
                    <label for="city-quote">Thành phố <span>*</span></label>
                    <input type="text" id="district" name="district">
                    <span class="form-message frm_msg"></span>
                </div>
            </div>
            <div class="form-group frm_control">
                <button class="btn_submit" type="submit" id="quote-submit" name="quote-submit_quote">Để lại thông tin của bạn</button>
                <a href="<?php echo $file['url'];?>" download class="hidden-links"></a>
            </div>
            <div class="msg">Gửi thông tin thành công</div>
        </form> 
    </div>
</div>
<script>
    // Validate email
 
    // Validate phone 
    jQuery(document).ready(function($) {
      

        $('.msg').hide();



        Validator({
            form: '#contact-form',
            formGroupSelector: '#contact-form .form-group',
            errorSelector: '#contact-form .form-message',
            classError: 'invalid',
            rules: [
                Validator.isText('#name'),
                Validator.isRequired('#name'),
                Validator.isPhone('#phone'),
                Validator.isRequired('#phone'),
                Validator.isRequired('#email'),
                Validator.isRequired('#district'),
               
                Validator.isEmail('#email'),
               
            ],
            onSubmit: (data) => {
                const token = document.querySelector('#contact_nonce').value
                const form = $('#contact-form')
                const fieldGroup = form.find('.fields')
                const btnSubmit = form.find('.btn_submit')
                const btnSubmitHtml = btnSubmit.html();
                const btnSubmitText = btnSubmit.text();
                const messageMain = form.find('.frm_msg2');
                dataValues = {
                    ...data,

                };
                jQuery.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    data: {
                        action: 'formCommonAjax',
                        data: dataValues,
                        nonce: token,
                        postTitle: 'name',
                        postType: 'register',
                    },

                    beforeSend: () => {
                        btnSubmit.prop('disabled', false)
                    },
                    complete: () => {
                        btnSubmit.text(btnSubmitText)
                        //btnSubmit.prop('disabled', true)
                        $('.msg').show();
                        $('.hidden-links')[0].click();
                    },
                    success: (res) => {
                        if (res.success) {
                            btnSubmit.remove();
                            form.trigger('reset');
                        }
                        messageMain.text(res.data)
                    },
                    error: (jqXHR, textStatus, errorThrown) => {
                        console.log('The following error occured: ' + jqXHR, textStatus, errorThrown);
                    }
                });
            }
        });


    // ACTIVE POPUP
    $('.quote-price').on('click', function(e){
        e.preventDefault();
        $('.coating_quote').addClass('is--active');
        $('.block_quote').addClass('is--active');
            // GET CITY
           
        });

    $('.coating_quote, .--close-quote').on('click', function(){
        $('.coating_quote').removeClass('is--active');
        $('.block_quote').removeClass('is--active');
    });

    $('.btn-quote-menu').on('click', function(e){
        e.preventDefault();
        $('.coating_quote').addClass('is--active');
        $('.block_quote').addClass('is--active');
    });
    // VALIDATION FORM
    
//     $('.frm_quote').on('click','#quote-submit', function(e){
//       e.preventDefault(); 
//       var name=$('#name').val();
//       var tel=$('#phone').val();
//       var email=$('#email').val();
//       var city=$('#city-quote').val();
//       $('.message_field').html('');
//       if(name==''){
//         $('#message_name_quote').html('Bạn phải nhập đầy đủ họ tên');
//     }
//     if(tel==''){
//         $('#message_tel_quote').html('Bạn phải nhập số điện thoại');
//     }
//     if(email==''){
//         $('#message_email_quote').html('Bạn phải nhập email');
//     }
//     if(!validateEmail(email)){
//         $('#message_email_quote').html('Email của bạn không đúng định dạng');
//     }
//     if(isNaN(tel)){
//         $('#message_tel_quote').html('Số điện thoại của bạn không đúng');
//     }
//     if(city==0){
//         $('#message_city_quote').html('Chọn thành phố bạn đang sống');
//     }
//     if(name !='' && tel !='' && email !='' && city!=0 && validateEmail(email) && !isNaN(tel)){
//         $('.hidden-links')[0].click();
//         $('.frm_quote').unbind('submit').submit();
//     }    
// })   
});
</script>