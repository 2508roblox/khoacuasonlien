<?php
    // Template Name: My Account- Sổ địa chỉ
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
    <div class="content_all address">
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
            $current_user_fields=get_fields(wp_get_current_user());
            global $wpdb;
            $matp=$user_woo['billing_state'][0];
            $maqh=$user_woo['billing_city'][0];
            $mapx=$user_woo['billing_address_2'][0];
            $city =  $wpdb->get_results( "SELECT name FROM devvn_tinhthanhpho WHERE matp=$matp" );
            $district =  $wpdb->get_results( "SELECT name FROM devvn_quanhuyen WHERE maqh=$maqh " );
            $wards =  $wpdb->get_results( "SELECT name FROM devvn_xaphuongthitran WHERE xaid=$mapx" );
            // echo '<pre>';
            // var_dump ($user_woo );
            // echo '</pre>';
            ?>
                <div class="tab_child" id="tab_child_2">
                    <div class="_row_infor">
                        <h3 class="title-infor">Địa chỉ giao hàng mặc định</h3>
                    </div>
                    <div class="_row_infor">
                        <div class="box-infor">
                            <h4>Số nhà / tên đường</h4>
                            <p><?php echo $user_woo['billing_address_1'][0]; ?></p>
                        </div>
                        <div class="box-infor">
                            <h4>Tên tòa nhà / số tầng</h4>
                            <p><?php echo  $user_woo['billing_company'][0]; ?></p>
                        </div>
                    </div>
                    <div class="_row_infor">
                        <div class="box-infor">
                            <h4>Thành phố / tỉnh</h4>
                            <p><?php echo $city[0]->name; ?></p>
                        </div>
                        <div class="box-infor">
                            <h4>Quận / huyện</h4>
                            <p><?php echo  $district[0]->name; ?></p>
                        </div>  
                    </div>
                    <div class="_row_infor">
                        <div class="box-infor">
                            <h4>Phường</h4>
                            <p><?php echo $wards[0]->name; ?></p>
                        </div>
                        <div class="box-infor">
                            <h4>mã bưu chính</h4>
                            <p><?php echo $user_woo['shipping_postcode'][0]; ?></p>
                        </div>  
                    </div>
                    <div class="_row_infor">
                        <button class="btn-infor"> <a href="./my-account-edit-address">Chỉnh sửa thông tin</a></button>
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
<script type="text/javascript"></script>
<script src="<?php echo THEME_ASSETS .'/js/Swiper/scripts/pagination.min.js'; ?>"></script>
<?php
    get_template_part( 'template-parts/social/social' );
    get_footer();
?>
