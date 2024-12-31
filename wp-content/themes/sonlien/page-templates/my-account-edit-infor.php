<?php
    // Template Name: My Account-Chỉnh sửa thông tin
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
    <div class="content_all edit-information">
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
            $user_woo=get_user_meta(get_current_user_id());
            $user_id=get_current_user_id();
            $birthday=explode("/",$user_woo['birthday'][0]);
            // echo '<pre>';
            // var_dump($_POST);
            // echo '</pre>';
            ?>
            <!-- SUBMIT FORM -->
            
           <div class="tab_child edit_information">
                    <div class="_row_infor _title_edit">
                        <h3 class="title-infor">Chỉnh sửa thông tin đăng nhập của bạn</h3>
                        <?php
                            if(isset($_POST['btn_custom_submit'])){
                                $new_birthday=$_POST['custom_date'].'/'.$_POST['custom_month'].'/'.$_POST['custom_year'];
                                update_user_meta($user_id,'billing_last_name',$_POST['txt_account_name']);
                                update_user_meta($user_id,'billing_email',$_POST['txt_account_email']);
                                update_user_meta($user_id,'billing_phone',$_POST['txt_account_tel']);
                                update_user_meta($user_id,'birthday',$new_birthday);
                                echo '<div class="mess_succ">';
                                echo 'Sửa Thông tin thành công';
                                echo '</div>';
                            }
                        ?>
                    </div>
                    <div class="form_edit">
                        <form  method="POST">
                            <div class="_from_control name">
                              <p>Họ và tên <span>*</span></p>
                                <input type="text" name="txt_account_name" value="<?php echo $user_woo['billing_last_name'][0]; ?>">
                            </div>
                            <div class="_from_control email">
                                <p>Email <span>*</span></p>
                                <input type="text" name="txt_account_email" value="<?php echo $user_woo['billing_email'][0]; ?>">
                            </div>
                            <div class="_from_control tel">
                              <p>Số điện thoại <span>*</span></p>
                                <input type="text" name="txt_account_tel" value="<?php echo $user_woo['billing_phone'][0]; ?>">
                            </div>
                            <div class="_from_control birthday">
                               <p>Ngày sinh</p>
                               <div class="_form_group">
                                  <div class="_select_form">
                                    <select name="custom_date" id="">
                                    <?php 
                                        $start_date = 1;
                                        $end_date   = 31;
                                        for( $j=$start_date; $j<=$end_date; $j++ ) {
                                          if($j<10){
                                            $j='0'.$j;
                                          }
                                          if($birthday[0]==$j){
                                            echo '<option value='.$j.' selected>'.$j.'</option>';
                                          }
                                          else  echo '<option value='.$j.'>'.$j.'</option>';
                                          
                                        }
                                      ?>
                                    </select>
                                  </div>
                                  <div class="_select_form">
                                        <select name="custom_month" id="">
                                        <?php for( $m=1; $m<=12; ++$m ) { 
                                        if($m<10){
                                            $m='0'.$m;
                                        }
                                        if($birthday[1]==$m){
                                            echo '<option value='.$m.' selected>'.$m.'</option>';
                                        }
                                        else echo '<option value="'.$m.'">'.$m.'</option>'
                                        ?>

                                        <?php } ?>
                                        </select>
                                  </div>
                                  <div class="_select_form">
                                    <select name="custom_year" id="">
                                    <?php 
                                      $year = date('Y');
                                      $min = $year - 60;
                                      $max = $year;
                                      for( $i=$max; $i>=$min; $i-- ) {
                                        if($birthday[2]==$i){
                                          echo '<option value='.$i.' selected>'.$i.'</option>';
                                        }
                                        else
                                         echo '<option value='.$i.'>'.$i.'</option>';
                                      }
                                    ?>
                                    </select>
                                  </div>
                               </div>
                            </div>
                            <div class="_from_control submit">
                                <input class="btn-red" type="submit" name="btn_custom_submit" value="Lưu thay đổi">
                            </div>
                        </form>
                        <!-- SUBMIT FORM -->
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
 
</script>
<script src="<?php echo THEME_ASSETS .'/js/Swiper/scripts/pagination.min.js'; ?>"></script>
<?php
    get_template_part( 'template-parts/social/social' );
    get_footer();
?>
