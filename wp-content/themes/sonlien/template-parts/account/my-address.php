<div class="_section_my_account">
	<?php
		$user_woo=get_user_meta(get_current_user_id());
		// echo '<pre>';
		// var_dump($user_woo);
		// echo '</pre>';
		// // echo wp_kses_post( $user_woo['shipping_state'][0] )
	?>
  <div class="tw_container">
       <div class="content_all">
           <div class="_left" >
                <div class="tab_child" id="tab_child_2">
                    <div class="_row_infor">
                        <h3 class="title-infor">Địa chỉ giao hàng mặc định</h3>
                    </div>
                    <div class="_row_infor">
                        <div class="box-infor">
                            <h4>Số nhà / tên đường</h4>
                            <p><?php echo $user_woo['shipping_address_1'][0]; ?></p>
                        </div>
                        <div class="box-infor">
                            <h4>Tên tòa nhà / số tầng</h4>
                            <p><?php echo $user_woo['shipping_company'][0]; ?></p>
                        </div>
                    </div>
                    <div class="_row_infor">
                        <div class="box-infor">
                            <h4>Thành phố / tỉnh</h4>
                            <p><?php echo $user_woo['shipping_city'][0]; ?></p>
                        </div>
                        <div class="box-infor">
                            <h4>Quận / huyện</h4>
                            <p><?php echo $user_woo['shipping_state'][0]; ?></p>
                        </div>  
                    </div>
                    <div class="_row_infor">
                        <div class="box-infor">
                            <h4>Phường</h4>
                            <p><?php echo $user_woo['shipping_address_2'][0]; ?></p>
                        </div>
                        <div class="box-infor">
                            <h4>mã bưu chính</h4>
                            <p><?php echo $user_woo['shipping_postcode'][0]; ?></p>
                        </div>  
                    </div>
                    <div class="_row_infor">
                        <button class="btn-infor">Chỉnh sửa thông tin</button>
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