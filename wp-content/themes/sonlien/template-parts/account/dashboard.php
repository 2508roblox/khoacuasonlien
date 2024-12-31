<?php $user_woo=get_user_meta(get_current_user_id()); ?>
   <div class="content_all account-informaation">
           <div class="_left" >
                <div class="tab_child" id="tab_child_1">
                    <div class="_row_infor">
                        <h3 class="title-infor"><?php _e('Thông tin đăng nhập của bạn','corex');?></h3>
                    </div>
                    <div class="_row_infor">
                        <div class="box-infor">
                            <h4><?php _e('Họ và tên','corex');?></h4>
                            <p><?php echo $user_woo['billing_last_name'][0]; ?></p>
                        </div>
                        <div class="box-infor">
                            <h4><?php _e('Email','corex');?></h4>
                            <p><?php echo $user_woo['billing_email'][0]; ?></p>
                        </div>
                    </div>
                    <div class="_row_infor">
                        <div class="box-infor">
                            <h4><?php _e('Số điện thoại','corex');?></h4>
                            <p><?php echo $user_woo['billing_phone'][0]; ?></p>
                        </div>
                        <div class="box-infor">
                            <h4><?php _e('Ngày sinh','corex');?></h4>
                            <p><?php echo $user_woo['birthday'][0]; ?></p>
                        </div>  
                    </div>
                    <div class="_row_infor">
                        <button class="btn-infor"><a href="./edit-my-account"><?php _e('Chỉnh sửa thông tin','corex');?></a></button>
                        <button class="btn-infor"><a href="./edit-password"><?php _e('Đổi mật khẩu','corex');?></a></button>
                    </div>
                </div>
           </div>
           <div class="_right">
           <?php
                get_template_part( 'template-parts/account/sidebar' );
            ?>
           </div>
       </div>