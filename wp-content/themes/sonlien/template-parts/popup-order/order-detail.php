<?php
//    if(isset($_POST['btn_close'])){
//         $order = new WC_Order($order_id);
//         $order->update_status('pending', 'order_note');
//    }
?>
<div class="_my_accout_popup">
    <div class="tw_container">
       <div class="content_all">
           <div class="content_order">
               <div class="row_header">
                   <div class="title">
                       <h3>Chi tiêt đơn hàng</h3>
                       <span>(Đang vận chuyển)</span>
                   </div>
                   <div class="information">
                       <small>Mã đơn hàng:<strong>1738HN754</strong></small>
                       <small>Ngày đặt hàng:<strong>20 / 06 / 2019</strong></small>
                   </div>
               </div>
               <div class="row_product_list">
                   <div class="product_item">
                       <div class="box-image">
                            <img src="<?php echo THEME_ASSETS .'/images/my-account/product.png'; ?>" alt="">
                       </div>
                       <div class="box-text">
                           <h3>THIẾT BỊ LỌC NƯỚC LẮP TẠI VÒI</h3>
                           <p class="product_code">EU201</p>
                       </div>
                       <div class="box-cost">
                            <span class="amout">1</span>
                            <span class="mul"> x </span>
                            <span class="price">2.450.000VND</span>
                            
                       </div>
                   </div>
               </div>
               <div class="row_total">
                   <div class="discount">
                       <span>Mã Giảm giá</span>
                       <span>N/A</span>
                   </div>
                   <div class="ship">
                       <span>Giao hàng</span>
                       <span >Miễn phí</span>
                   </div>
                   <hr>
                   <div class="total">
                       <span>Tổng đơn hàng</span>
                       <span class="total_price">7.350.000VND</span>
                   </div>
               </div>
               <div class="row_information_customer">
                   <div class="address">
                       <h3>Địa chỉ giao hàng</h3>
                       <p>
                           Nguyễn Văn A <br>
                           Số 1 Lương Yên <br>
                           Quận Hai Bà Trưng, Hà Nội <br>
                           090 123 4567 <br>
                           username@hotmail.com
                       </p>
                   </div>
                   <div class="method">
                       <div class="pay_method">
                            <h3>Phương thức giao hàng</h3>
                            <p>Giao hàng tiêu chuẩn <br>
                                <small>trong vòng 3 - 9 ngày làm việc</small>
                                </p>
                                <span class="free">Miễn phí</span>
                       </div>
                       <div class="delivery_method">
                            <h3>Phương thức thanh toán</h3>
                            <p>Thẻ tín dụng / ghi nợ<br>
                            <small>có các chữ số cuối là **45 </small>
                            </p>
                       </div> 
                   </div>
               </div>
               <div class="row_button">
                   <button class="btn_cancel" class="btn_cancel">Hủy đơn hàng</button>
                   <button class="btn_close" name="btn_close">Đóng</button>
               </div>
           </div>
       </div>
    </div>
</div>
<script>
        jQuery(document).ready(function($){
            // GET DATA
            var orders=[];
            var order_id;
            $.ajax({
                    type : "post", //Phương thức truyền post hoặc get
                    dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
                    url : '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                    data : {
                        action: "thongbao", //Tên action
                        website : 'levantoan.com',//Biến truyền vào xử lý. $_POST['website']
                    },
                    context: this,
                    beforeSend: function(){
                        //Làm gì đó trước khi gửi dữ liệu vào xử lý
                    },
                    success: function(response) {
                        if(response.success) {
                            orders=JSON.parse(response.data);
                        }
                        else {
                            alert('Đã có lỗi xảy ra');
                        }
                    },
                    error: function( jqXHR, textStatus, errorThrown ){
                        //Làm gì đó khi có lỗi xảy ra
                        console.log( 'The following error occured: ' + textStatus, errorThrown );
                    }
            })
            // show detail order
            $('._row_table_bill').on('click',' tr td a.btn_detail_order', function(e){
                    e.preventDefault();
                    $('._my_accout_popup').addClass('is-active');
                    order_id=$(this).data('orderid');
                        orders.map(value=>{
                            if(order_id===value.id){
                                // console.log(value);
                                var status;
                                var enable_click=false;
                                switch(value.order_status){
                                        case 'refunded':
                                            status='Đã hoàn lại tiền';
                                        break;
                                        case 'cancelled':
                                            status='Đã hủy';
                                        break;
                                        case 'failed':
                                            status='Thất bại';
                                        break;
                                        case 'completed':
                                            status='Đã hoàn thành';
                                        break;
                                        case 'on-hold':
                                            status='Tạm giữ';
                                        break;
                                        default:
                                            status='Đang xử lý';
                                            enable_click=true;
                                        break;
                                    }
                                var list_product='';
                                value.product_in_order.map(item=>{
                                list_product+='<div class="product_item">';
                                list_product+='<div class="box-image"><img src="'+item.img_prd+'" alt=""></div>';
                                list_product+='<div class="box-text"><h3>'+item.name_prd+'</h3><p class="product_code">'+item.sku+'</p></div>';
                                list_product+='<div class="box-cost"><span class="amout">'+item.quantity+'</span><span class="mul"> x </span><span class="price">'+item.price+'VND</span></div>';
                                list_product+='</div>';
                                })
                            
                                $('.row_header .title>span').html("("+status+")");
                                $('.information small:first-child strong').html(value.order_key);
                                $('.information small:last-child strong').html(value.order_date);
                                $('.total_price').html(value.order_total+" VNĐ");
                                $('.row_information_customer .address p').html(value.order_address);
                                $('.row_product_list').html(list_product);
                                if(enable_click){
                                 $('.btn_cancel').addClass('active');
                                }else{
                                 $('.btn_cancel').removeClass('active');
                                }
                            }
                        })
                })
            // CLOSE POPUP
            $('._my_accout_popup .btn_close').on('click', function(e){
                $('._my_accout_popup').removeClass('is-active');
            });
            // CLICK CANCEL ORDER
            $('._my_accout_popup').on('click','.btn_cancel',function(e){
                        if(confirm('Bạn có thực sự muốn hủy đơn hàng này không?')){
                            $.ajax({
                            type : "post", 
                            dataType : "json", 
                            url : '<?php echo admin_url('admin-ajax.php');?>',
                            data : {
                                action: "cancel_order",
                                order_id : order_id,
                            },
                            context: this,
                            beforeSend: function(){
                                //Làm gì đó trước khi gửi dữ liệu vào xử lý
                            },
                            success: function(response) {
                                if(response.success) {
                                  location.reload();
                                }
                                else {
                                    alert('Đã có lỗi xảy ra');
                                }
                            },
                            error: function( jqXHR, textStatus, errorThrown ){
                                //Làm gì đó khi có lỗi xảy ra
                                console.log( 'The following error occured: ' + textStatus, errorThrown );
                            }
                            })
                            
                        }
                    })
        });    
</script>