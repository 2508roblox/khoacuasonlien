<?php
    // Template Name: My Account-Lịch sử đơn hàng
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
<?php

$customer = wp_get_current_user();
global $wp_query;
// Get all customer orders
// $customer_orders = get_posts( array(
// 'numberposts' => -1,
// 'meta_key'    => '_customer_user',
// 'orderby' => 'date',
// 'order' => 'DESC',
// 'meta_value'  => get_current_user_id(),
// 'post_type'   => wc_get_order_types(),
//     'post_status' => array_keys( wc_get_order_statuses() ),  'post_status' 
//     => array( 'wc-processing','wc-processing','wc-on-hold','wc-completed','wc-cancelled', 'wc-refunded','wc-failed' ),
// ) );
// echo '<pre>';
// var_dump($customer_orders);
// echo'</pre>';
// PAGINATION
// $page = ! empty($wp_query->query['page']) ? (int)$wp_query->query['page'] : 1;
// $total = count( $customer_orders ); //total items in array    
// $limit = 7; //per page    
// $totalPages = ceil( $total/ $limit ); //calculate total pages
// $page = max($page, 1); //get 1 page when $_GET['page'] <= 0
// $page = min($page, $totalPages); //get last page when $_GET['page'] > $totalPages
// $offset = ($page - 1) * $limit;
// if( $offset < 0 ) $offset = 0;
// $customer_orders_pagination = array_slice( $customer_orders, $offset, $limit );

// var_dump($customer_orders);

// 

// echo '<pre>';
// foreach ( $customer_orders_pagination as $customer_order ) {
//   $orderq = wc_get_order( $customer_order );
//   foreach ( $orderq->get_items() as $item_id => $item ) {
//     $product_id = $item->get_product_id();
//     $product=wc_get_product($product_id );
//     var_dump($product->get_name());
//     var_dump(get_the_post_thumbnail_url($product_id));
//     var_dump($product->get_sku());
//     var_dump($product->get_price());
//     var_dump($item->get_quantity());
//  }
// } 
// echo '</pre>';
?>
<div class="_section_my_account">
  <div class="tw_container">
       <div class="content_all order_list">
           <div class="_left" >
                <div class="tab_child" id="tab_child_4">
                    <!-- START ROW SEARCH FORM -->
                    <div class="_row_date_search">
                        <div class="date_from">
                            <h3>Xem từ ngày</h3>
                            <input type="date" name="date_from" class="input_date_from">
                        </div>
                        <div class="date_to">
                            <h3>Đến ngày</h3>
                            <input type="date" name="date_to" class="input_date_to">
                        </div>
                    </div>
                    <!-- END ROW SEARCH FORM -->
                         
                    <!-- START ROW TABLE -->
                    <div class="_row_table_bill">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ngày đặt hàng</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Trạng thái đơn hàng</th>
                                    <th>Tổng tiền đơn hàng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               <!-- Content Pagination Here -->
                               <!-- <?php
                               foreach ( $customer_orders_pagination as $customer_order ) {
                                      $orderq = wc_get_order( $customer_order );
                                      $orderq_key=str_replace('wc_order_','',$orderq->get_order_key());
                                      $orderq_status= ($orderq->get_status()=='processing')?'Đang vận chuyển':'Đã hoàn tất';
                                      $date=$orderq->get_date_created();  
                                      $order_id=$orderq->get_id();
                                      ?>
                                      <tr>
                                          <td><?php echo date_format($date,"d/m/Y");?></td>
                                          <td><?php echo $orderq_key;?></td>
                                          <td> <?php echo $orderq_status;?> </td>
                                          <td> <?php echo number_format( (float)$orderq->get_total(),0,",",".");?> VND</td>
                                          <td><a href="javascript:void(0)" class="btn_detail_order" data-orderid="<?php echo $order_id;?>">Chi tiết</a></td>
                                      </tr>
                                      <?php  
                                } 
                               ?> -->
                            </tbody>
                        </table>
                        <div id="pagination-container">
                            <!-- <div class="paginationjs">
                              <div class="paginationjs-pages">
                                <ul>
                                  <?php
                                    for($i=0;$i<$totalPages;$i++){
                                      if(($i+1)==(int)$page){
                                        echo '<li class="paginationjs-page J-paginationjs-page active" data-num="1"><a>'.($i+1).'</a></li>';
                                      }
                                      else echo '<li class="paginationjs-page J-paginationjs-page" data-num="2"><a href="?page='.($i+1).'">'.($i+1).'</a></li>';
                                    }
                                  ?>
                                </ul>
                              </div>
                            </div> -->
                        </div>
                    </div>
                    <!-- END ROW TABLE -->
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
function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}
function reverseString(str) {
    return str.split("/").reverse().join("");
}
function renderPagination(data){
    $('#pagination-container').pagination({
        dataSource: data,
        pageSize: 7,
        callback: function(data, pagination) {
            var html = template(data);
            $('._row_table_bill table tbody').html(html);
        }
        })
        //
        $('.paginationjs-pages ul li').on('click', function(e){
            $( document ).ready( function(){} );  
    });
}
jQuery(document).ready(function($){
     var dataOrders;
     var date_from;
     var  date_to;

     function renderPagination(data_order){
                $('#pagination-container').pagination({
                    dataSource: data_order,
                    pageSize: 7,
                    callback: function(data, pagination) {
                        var html = template(data);
                        $('._row_table_bill table tbody').html(html);
                    }
                    })
                    //
                    $('.paginationjs-pages ul li').on('click', function(e){
                        $( document ).ready( function(){} );  
                });
    }

     $.ajax({
              type : "post", //Phương thức truyền post hoặc get
              dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
              url : '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
              data : {
                  action: "thongbao", //Tên action
              },
              context: this,
              beforeSend: function(){
                  //Làm gì đó trước khi gửi dữ liệu vào xử lý
              },
              success: function(response) {
                  if(response.success) {
                     dataOrders=JSON.parse(response.data);
                     renderPagination(dataOrders);
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
    // PAGINATIOn;
    
    function template(data) {
    var html = '';
    $.each(data, function(index, item){
        let status;
        switch(item.order_status){
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
            break;
        }
        html += '<tr>';
        html += '<td>'+ item.order_date +'</td>';
        html += '<td>'+ item.order_key +'</td>';
        html += '<td>'+ status +'</td>';
        html += '<td>'+ item.order_total +' VND</td>';
        html += '<td><a href="javascript:void(0)" data-orderid="'+item.id+'" class="btn_detail_order">Chi tiết</a></td>';
        html += '</tr>';
    });
    return html;
	}
     
    //SEARCH BY DATE 
    $('.input_date_from').on('change',function(){
        date_from=$('.input_date_from').val();
        date_from=parseFloat(date_from.split("-").join(""));
        var dataSearch=[...dataOrders];
        if(isNaN(date_from) && isNaN(date_to)){
            dataSearch=[...dataOrders];
        }
        if(!isNaN(date_from) && isNaN(date_to)){
            dataSearch=dataOrders.filter(value=>{
                let date_number=parseFloat(reverseString(value.order_date));
                if(date_number >= date_from){
                   return value;
                }       
            })
        }
        if(isNaN(date_from) && !isNaN(date_to)){
            dataSearch=dataOrders.filter(value=>{
                let date_number=parseFloat(reverseString(value.order_date));
                if(date_number <= date_to){
                   return value;
                }       
            })
        }
        if(!isNaN(date_from) && !isNaN(date_to)){
            dataSearch=dataOrders.filter(value=>{
                let date_number=parseFloat(reverseString(value.order_date));
                if(date_number >= date_from && date_number <= date_to){
                   return value;
                }       
            })
        }
        // console.log(dataSearch); 
        
        renderPagination(dataSearch);
    });
    $('.input_date_to').on('change',function(){
        date_to=$('.input_date_to').val();
        date_to=parseFloat(date_to.split("-").join(""));

        var dataSearch=[...dataOrders];
        if(isNaN(date_from) && isNaN(date_to)){
            dataSearch=[...dataOrders];
        }
        if(!isNaN(date_from) && isNaN(date_to)){
            dataSearch=dataOrders.filter(value=>{
                let date_number=parseFloat(reverseString(value.order_date));
                if(date_number >= date_from){
                   return value;
                }       
            })
        }
        if(isNaN(date_from) && !isNaN(date_to)){
            dataSearch=dataOrders.filter(value=>{
                let date_number=parseFloat(reverseString(value.order_date));
                if(date_number <= date_to){
                   return value;
                }       
            })
        }
        if(!isNaN(date_from) && !isNaN(date_to)){
            dataSearch=dataOrders.filter(value=>{
                let date_number=parseFloat(reverseString(value.order_date));
                if(date_number >= date_from && date_number <= date_to){
                   return value;
                }       
            })
        }
        // console.log(dataSearch); 
        
        renderPagination(dataSearch);
    });
});
</script>
<script src="<?php echo THEME_ASSETS .'/js/Swiper/scripts/pagination.min.js'; ?>"></script>
<?php
    get_template_part( 'template-parts/social/social' );
    get_footer();
?>
