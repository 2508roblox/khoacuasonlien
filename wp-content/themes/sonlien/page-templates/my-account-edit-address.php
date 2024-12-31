<?php
    // Template Name: My Account-Chỉnh sửa địa chỉ
    get_header();
    $imageBanner = get_field('banner_about', 'option');
    $questionAbout = get_field('question_about', 'option');
    $about = get_field('about', 'option');
    $mlsrAbout = get_field('mlsr_about', 'option');
    $mccAbout = get_field('mcc_about','option');
    $networkAbout = get_field('network_about', 'option');
    $certificationAbout = get_field('certification_about', 'option');
?>
<div class="banner_page my-account" id="banner_page--content">
    <div class="content_all edit-address">
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
           <div class="tab_child edit_information address">
           <div class="_row_infor _title_edit">
                        <h3 class="title-infor">Thay đổi mật khẩu</h3>
                        <?php
                              $user_woo=get_user_meta(get_current_user_id());
                            // echo '<pre>';var_dump($user_woo);echo'</pre>';
                            $user_id=get_current_user_id();
                            // echo '<pre>';var_dump($user_id);echo'</pre>';
                            if(isset($_POST['btn_submit_edit_address'])){
                               $address=$_POST['txt_user_address'];
                               $building=$_POST['txt_user_building'];
                               $city=$_POST['select_city'];
                               $district=$_POST['select_district'];
                               $wards=$_POST['select_wards'];
                               $post_code=$_POST['txt_post_code'];
                               $flag=false;
                               if($flag==false){       
                                    if(!$address || !$building || $city==0  || $district==0 ||$wards==0){  
                                        echo '<div class="mess_err">';                  
                                        echo '<p>Bạn chưa nhập đầy đủ thông tin</p>';    
                                        echo '</div>';       
                                    }
                                    else $flat=true;         
                               }
                               if($flat===true){
                                update_user_meta( $user_id,'billing_address_1',$address);
                                update_user_meta( $user_id,'billing_company',$building);
                                update_user_meta( $user_id,'billing_state',$city);
                                update_user_meta( $user_id,'billing_city',$district);
                                update_user_meta( $user_id,'billing_address_2',$wards);
                                update_user_meta( $user_id,'shipping_postcode',$post_code);
                                echo '<div class="mess_succ">';
                                echo '<p>Thành công</p>';
                                echo '</div>';  
                               }                                   
                            }
                            ?>
                    </div>
                    <div class="form_edit">
                        <form action="" method="POST">
                            <?php wp_nonce_field( 'nonce_field_editpass_submit', 'nonce_field_editpass' ); ?>
                            <div class="_from_control name">
                                <p>Số nhà / tên đường<span>*</span></p>
                                <input type="text" name="txt_user_address" value="" class="input_user_address">
                                <small>Ví dụ: 420 Lê Duẩn...</small>
                            </div>
                            <div class="_from_control email">
                                <p>Tên tòa nhà / số tầng <span>*</span></p>
                                <input type="text" name="txt_user_building" value=""  class="input_user_building">
                                <small>Ví dụ: Tòa nhà A, Tòa E2 - chung cư XYZ...</small>
                            </div>    
                            <div class="row_form_group">
                                <div class="_from_control">
                                    <p>thành phố / tỉnh <span>*</span></p>
                                    <select name="select_city" id="" class="select_city">
                                        <option value="0">Chọn thành phố / tỉnh</option>
                                    </select>
                                </div>
                                <div class="_from_control">
                                    <p>Quận / huyện* <span>*</span></p>
                                    <select name="select_district" id="" class="select_district">
                                        <option value="0">Chọn quận / huyện</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row_form_group">
                                <div class="_from_control">
                                    <p>phường</p>
                                    <select name="select_wards" id="" class="select_wards">
                                        <option value="0">Chọn phường / xã</option>
                                    </select>
                                    <small>Ví dụ: Phường Thành Xuân Nam...</small>
                                </div>
                                <div class="_from_control">
                                    <p>Mã bưu chính</p>
                                    <input type="text" name="txt_post_code" class="post_code">
                                    <small>Ví dụ: 100000....</small>
                                </div>
                            </div>
                            <div class="_from_control submit">
                                <input class="btn-red" type="submit" name="btn_submit_edit_address" value="Lưu thay đổi">
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
<script>
    jQuery(document).ready(function($) {
        var cityOp='<option value="0">Chọn thành phố / tỉnh</option>';
        var data_address;
        $.ajax({
                    type : "post", 
                    dataType : "json", 
                    url : '<?php echo admin_url('admin-ajax.php');?>', 
                    data : {
                        action: "address"
                    },
                    context: this,
                    beforeSend: function(){
                       
                    },
                    success: function(response) {
                        if(response.success) {
                           data_address=response.data;
                           let user_address_data=data_address.user_address;
                           $('.input_user_address').val(user_address_data.user_address);
                           $('.input_user_building').val(user_address_data.user_building);
                           $('.post_code').val(user_address_data.user_post_code);
                           data_address.city.map(value=>{
                                cityOp+='<option value="'+value.matp+'">'+value.name+'</option>';
                           });  
                           $('.select_city').html(cityOp);
                        }
                        else {
                            alert('Đã có lỗi xảy ra');
                        }
                    },
                    error: function( jqXHR, textStatus, errorThrown ){
                       
                        console.log( 'The following error occured: ' + textStatus, errorThrown );
                    }
                })
                $('.select_city').on('change',function(){
                    var districtOp='<option value="0">Chọn quận / huyện</option>';
                    data_address.district.map(value=>{
                       if($(this).val()===value.matp){
                        districtOp+='<option value="'+value.maqh+'">'+value.name+'</option>';
                       }
                    });
                    $('.select_district').html(districtOp);
                })
                $('.select_district').on('change',function(){
                    var wardsOp='<option value="0">Chọn phường / xã</option>';
                    data_address.wards.map(value=>{
                       if($(this).val()===value.maqh){
                        wardsOp+='<option value="'+value.xaid+'">'+value.name+'</option>';
                       }
                    });
                    $('.select_wards').html(wardsOp);
                })                              
    });
</script>
<?php
    get_template_part( 'template-parts/social/social' );
    get_footer();
?>
