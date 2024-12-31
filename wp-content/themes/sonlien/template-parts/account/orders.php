<div class="_section_my_account">
  <div class="tw_container">
       <div class="content_all order_list">
           <div class="_left" >
                <div class="tab_child" id="tab_child_4">
                    <!-- START ROW SEARCH FORM -->
                    <div class="_row_date_search">
                        <div class="date_from">
                            <h3>Xem từ ngày</h3>
                            <input type="date" name="date_from">
                        </div>
                        <div class="date_to">
                            <h3>Đến ngày</h3>
                            <input type="date" name="date_to">
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
                            </tbody>
                        </table>
                        <div id="pagination-container"></div>
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
 var dataBill=[
  {
  	date:'20/06/2019',
    code:'1738HN754',
    status:1,
    cost:'7350000',
  },
  {
  	date:'20/06/2019',
    code:'1738HN754',
    status:1,
    cost:'7350000',
  },
  {
  	date:'20/06/2019',
    code:'1738HN754',
    status:1,
    cost:'7350000',
  },
  {
  	date:'20/06/2019',
    code:'1738HN754',
    status:1,
    cost:'7350000',
  },
  {
  	date:'20/06/2019',
    code:'1738HN754',
    status:1,
    cost:'7350000',
  },
  {
  	date:'20/06/2019',
    code:'1738HN754',
    status:1,
    cost:'7350000',
  },
  {
  	date:'20/06/2019',
    code:'1738HN754',
    status:1,
    cost:'7350000',
  },
  {
  	date:'20/06/2019',
    code:'1738HN754',
    status:1,
    cost:'7350000',
  },
  {
  	date:'20/06/2019',
    code:'1738HN754',
    status:1,
    cost:'7350000',
  },
  {
  	date:'20/06/2019',
    code:'1738HN754',
    status:1,
    cost:'7350000',
  },
  {
  	date:'20/06/2019',
    code:'1738HN754',
    status:1,
    cost:'7350000',
  },
  {
  	date:'20/06/2019',
    code:'1738HN754',
    status:1,
    cost:'7350000',
  },

  {
  	date:'20/06/2019',
    code:'1738HN754',
    status:1,
    cost:'7350000',
  },
]
function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}

jQuery(document).ready(function($){
    // PAGINATIOn
    function template(data) {
    var html = '';
    $.each(data, function(index, item){
        if(item.status===1){
            item.status='Đang vận chuyển';
        }else{
            item.status='Đã vận chuyển'
        }
        html += '<tr>';
        html += '<td>'+ item.date +'</td>';
        html += '<td>'+ item.code +'</td>';
        html += '<td>'+ item.status +'</td>';
        html += '<td>'+ formatNumber(item.cost) +' VND</td>';
        html += '<td><a href="#" class="btn_detail_order">Chi tiết</a></td>';
        html += '</tr>';
    });
    return html;
	}
    $('#pagination-container').pagination({
    dataSource: dataBill,
    pageSize: 7,
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        $('._row_table_bill table tbody').html(html);
    }
    })

    // 
});
</script>
<script src="<?php echo THEME_ASSETS .'/js/Swiper/scripts/pagination.min.js'; ?>"></script>