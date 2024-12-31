<?php
    // Template Name: Đổi mật khẩu
    get_header();
?>
<div class="banner_page my-account" id="banner_page--content">
    <div class="content_all">
        <div class="_title-breadcrumb my_account">
            <div class="_break">
                <p class="__breadcrumbs">
                    <a href="<?php echo bloginfo('url'); ?>">Trang chủ</a>
                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                    <span>Tài khoản của tôi</span>
                </p>
            </div>
            <h1>Tài khoản của tôi</h1>
        </div>
        <!-- <div class="_banner" style="background-image: url('<?php echo $imageBanner; ?>')"></div> -->
    </div>
</div>
<div class="_section_my_account">
  <div class="tw_container">
  <div class="content_all">
           <div class="_left" >
            <?php
            $user=wp_get_current_user();
            $user_id=get_current_user_id();
            // $result = wp_check_password('1s3#abc', $user->user_pass, $user_id);
            // echo '<pre>';
            // var_dump($result);
            // echo '</pre>';
            ?>
            <!-- CHANGE PASSWORD -->
           
           <div class="tab_child edit_information">
                    <div class="_row_infor _title_edit">
                        <h3 class="title-infor">Thay đổi mật khẩu</h3>
                        
                        <?php
                            if(isset($_POST['btn-edit-password'])){
                                $current_pass=$_POST['current_password'];
                                $new_pass=$_POST['new_password'];
                                $confirm_pass=$_POST['confirm_new_password'];
                                $nonce=$_POST['nonce_field_editpass'];
                                //compare pass
                               
                                $result_current_pass = wp_check_password($current_pass, $user->user_pass, $user_id);
                                $result_new_pass=strcmp($new_pass,$confirm_pass);
                                $flag=false;
                                if(!$flag){
                                    echo '<div class="mess_err">';
                                    if(!$current_pass || !$new_pass || !$confirm_pass ){
                                        echo '<p>Mật khẩu không được để trống</p>';
                                    }
                                    else{
                                        if($result_current_pass!==true){
                                            echo '<p>Mật khẩu hiện tại không đúng</p>';
                                        }
                                        if($result_new_pass!==0){
                                            echo '<p>Mật khẩu mới không trùng khớp</p>';
                                        }
                                        if($result_new_pass===0 && $result_current_pass==true && $nonce){
                                            $flag=true;
                                        }
                                    } 
                                    echo'</div>';  
                                }
                                if($flag){
                                    wp_set_password( $new_pass, $user_id );
                                    echo '<div class="mess_succ">';
                                    echo '<p>Thay đổi mật khẩu thành công</p>';
                                    echo'</div>';  
                                }
                               
                            }
                            ?>
                    </div>
                    <div class="form_edit_password">
                        <form action="" method="POST">
                            <?php wp_nonce_field( 'nonce_field_editpass_submit', 'nonce_field_editpass' ); ?>
                            <div class="_from_control current_password">
                                <p>Mật khẩu hiện tại <span>*</span></p>
                                <input type="password" id="current_password" name="current_password" value="">
                            </div>
                            <div class="_from_control current_password">
                                <p>Mật khẩu mới <span>*</span></p>
                                <input type="password" id="new_password" name="new_password" value="">
                            </div>
                            <div class="_from_control current_password">
                                <p>Xác nhận mật khẩu mới <span>*</span></p>
                                <input type="password" id="confirm_new_password" name="confirm_new_password" value="">
                            </div>
                            <div class="_from_control _button">
                                <input type="reset" value="Hủy">
                                <input type="submit" value="Lưu thay đổi" name="btn-edit-password" class="btn-red btn-edit-password">
                            </div>
                        </form>            
                    </div>
                </div>
           </div>
           <div class="_right">
                <?php
                    get_template_part( 'template-parts/account/sidebar' );
                ?>
           </div>
       </div>
  </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        // $(".btn-edit-password").on('click',function(e){
        //     let current_pass=$('#current_password').val();
        //     let new_pass=$('#new_password').val();
        //     let confirm_pass=$('#confirm_new_password').val();
        //     let nonce=$('#nonce_field_editpass').val();
        //     let flag = true;
        //     console.log(nonce);
        //     if(!current_pass || !new_pass || !confirm_pass){
        //         flag = false;
        //     }
        //     if(!flag){
               
        //     }else{
        //         jQuery.ajax({
        //             type: "POST",
        //             url: obj.AJAX_URL,
        //             data: {
        //                 action: 'loginForm',
        //                 email: email,
        //                 password: pwd,
        //                 nonce_field_login: nonce,
        //             },
        //             dataType: 'JSON',
        //             beforeSend: function () {
        //                 $(buttonSubmitEl).text("Đang gửi đi . . .");
        //                 $(buttonSubmitEl).prop('disabled', true);
        //             },
        //             complete: function () {
        //                 $(buttonSubmitEl).text("Đăng nhập");
        //                 $(buttonSubmitEl).prop('disabled', false);
        //             },
        //             success: function (response) {
        //                 if(response.success){
        //                     // $(inputAll).remove();
        //                     // $(buttonSubmitEl).remove();
        //                     // $(mess_error).html(response.data);
        //                     document.location.href = '<?php echo bloginfo('url').'/thong-tin-giao-hang'; ?>';
        //                 }else{
        //                     $(mess_error).html(response.data);
        //                 }
        //             }
        //         });
        //     }
        //     e.preventDefault();
        // })
    });
</script>
<script src="<?php echo THEME_ASSETS .'/js/Swiper/scripts/pagination.min.js'; ?>"></script>
<?php
    get_template_part( 'template-parts/social/social' );
    get_footer();
?>
