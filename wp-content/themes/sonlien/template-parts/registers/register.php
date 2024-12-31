<div class="_register">
    <div class="tw_container">
        <div class="content_all">
            <div class="tw_title">
                <h2>Đăng ký tư vấn</h2>
                <h3>hãy để cleansui gọi cho bạn và tư vấn</h3>
            </div>
            <form action="#" method="POST" id="frm_reg">
                <div class="--group-all">
                    <div class="--group">
                        <label>Họ và tên<sup>*</sup></label>
                        <input type="text" name="name" id="frm_name" class="input_reg">
                    </div>
                    <div class="--group">
                        <label>Số điện thoại<sup>*</sup></label>
                        <input type="text" name="phone" id="frm_phone" class="input_reg">
                    </div>
                    <div class="--group">
                        <label>Khu vực<sup>*</sup></label>
                        <select name="district" id="frm_district" class="select_reg">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="--group">
                        <label>vấn đề cần tư vấn<sup>*</sup></label>
                        <input type="text" name="problem" id="frm_problem" class="input_reg">
                    </div>
                </div>
                <button type="submit" class="button_reg">Gửi</button>
                <div class="--mess_error"> </div>
            </form>
        </div>
    </div>
</div>
<?php
    ContactForm::security();
?>
<script>
    jQuery(document).ready(function($){
        fetch('<?php echo get_template_directory_uri(); ?>/inc/cou.json')
        .then(function(response) {
            if(response.status !== 200 ){
                console.log('Looks like there was a problem. Status Code: ' +  response.status);  
                return; 
            }
            return response.json();
        })
        .then(function (data) {
            appendData(data);
        })
        .catch(function (err) {
            console.log(err);
        });

        var Elselect = document.getElementById("frm_district");
        appendData = data =>{
            data.forEach((item, index) => {
                var option = `<option value="${item.Title}">${item.Title}</option>`;
                $(option).appendTo(Elselect);
            });
        }

        $('#frm_reg').submit(function (e) { 
            e.preventDefault();
            let thisEl = $(this);
            let buttonSubmitEl = thisEl.find('button');
            let inputAll = thisEl.find('.--group-all');
            let mess_error = thisEl.find('.--mess_error');

            const name = document.getElementById('frm_name').value;
            const phone = document.getElementById('frm_phone').value;
            const district = document.getElementById('frm_district').value;
            const problem = document.getElementById('frm_problem').value;
            const nonce = document.getElementById("contact_product_nonce").value;
            jQuery.ajax({
                type: "POST",
                url: obj.AJAX_URL,
                data: {
                    action: 'contactFormAjaxProduct',
                    name: name,
                    phone: phone,
                    district: district,
                    problem: problem,
                    contact_product_nonce: nonce,
                },
                dataType: 'JSON',
                beforeSend: function () {
                    $(buttonSubmitEl).text("Đang gửi đi . . .");
                    $(buttonSubmitEl).prop('disabled', true);
                },
                complete: function () {
                    $(buttonSubmitEl).text("Gửi");
                    $(buttonSubmitEl).prop('disabled', false);
                },
                success: function (response) {
                    if(response.success){
                        $(mess_error).html(response.data);
                        // $(mess_error).addClass('__active');
                        $(buttonSubmitEl).remove();
                        $(inputAll).remove();
                        console.log(response);
                    }else{
                        $(mess_error).html(response.data);
                        // $(mess_error).addClass('__active');
                    }
                }
            })
        });
    });
</script>