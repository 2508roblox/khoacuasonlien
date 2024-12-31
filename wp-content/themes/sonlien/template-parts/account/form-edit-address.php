<div class="_section_my_account">
  <div class="tw_container">
       <div class="content_all">
           <div class="_left" >
           <?php
                $user_woo=get_user_meta(get_current_user_id());
            ?>
           <div class="tab_child edit_information address">
                    <div class="form_edit">
                        <form action="" action="POST">
                            <div class="_from_control name">
                                <p>Số nhà / tên đường<span>*</span></p>
                                <input type="text" name="txt_account_street" value="<?php echo $user_woo['shipping_address_1'][0]; ?>">
                                <small>Ví dụ: 420 Lê Duẩn...</small>
                            </div>
                            <div class="_from_control email">
                                <p>Tên tòa nhà / số tầng <span>*</span></p>
                                <input type="text" name="txt_account_building" value="username@hotmail.com">
                                <small>Ví dụ: Tòa nhà A, Tòa E2 - chung cư XYZ...</small>
                            </div>    
                            <div class="row_form_group">
                                <div class="_from_control">
                                    <p>thành phố / tỉnh <span>*</span></p>
                                    <select name="select_city" id="">
                                        <option value="0">Chọn thành phố / tỉnh</option>
                                    </select>
                                </div>
                                <div class="_from_control">
                                    <p>Quận / huyện* <span>*</span></p>
                                    <select name="select_district" id="">
                                        <option value="0">Chọn quận / huyện</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row_form_group">
                                <div class="_from_control">
                                    <p>phường</p>
                                    <input type="text">
                                    <small>Ví dụ: Phường Thành Xuân Nam...</small>
                                </div>
                                <div class="_from_control">
                                    <p>Mã bưu chính</p>
                                    <input type="text">
                                    <small>Ví dụ: 100000....</small>
                                </div>
                            </div>
                            <div class="_from_control submit">
                                <input class="btn-red" type="submit" name="txt_account_tel" value="Lưu thay đổi">
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