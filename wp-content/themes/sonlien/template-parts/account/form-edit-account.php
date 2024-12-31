<div class="_section_my_account">
  <div class="tw_container">
       <div class="content_all">
           <div class="_left" >
            <?php
            $user_woo=get_user_meta(get_current_user_id());
            $birthday=explode("/",$user_woo['birthday'][0]);
            // echo '<pre>';
            // var_dump($user_woo);
            // echo '</pre>';
            ?>
              <?php
               var_dump($_POST);
              ?>
           <div class="tab_child edit_information">
                    <div class="_row_infor">
                        <h3 class="title-infor">Thông tin đăng nhập của bạn</h3>
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
                                    <select name="date" id="">
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
                                    <select name="month" id="">
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
                                    <select name="year" id="">
                                    <?php 
                                      $year = date('Y');
                                      $min = $year - 60;
                                      $max = $year;
                                      for( $i=$max; $i>=$min; $i-- ) {
                                        if($birthday[2]==$i){
                                          echo '<option value='.$i.' selected>'.$i.'</option>';
                                        }
                                        else echo '<option value='.$i.'>'.$i.'</option>';
                                      }
                                    ?>
                                    </select>
                                  </div>
                               </div>
                            </div>
                            <div class="_from_control submit">
                                <input class="btn-red" type="submit" name="txt_account_tel" value="Lưu thay đổi">
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