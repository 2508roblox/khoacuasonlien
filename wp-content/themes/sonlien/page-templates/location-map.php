<?php
    // Template Name: Điểm bán hàng(map)
    get_header();
    $imageBanner = get_field('banner_about', 'option');
    $questionAbout = get_field('question_about', 'option');
    $about = get_field('about', 'option');
    $mlsrAbout = get_field('mlsr_about', 'option');
    $mccAbout = get_field('mcc_about','option');
    $networkAbout = get_field('network_about', 'option');
    $certificationAbout = get_field('certification_about', 'option');
?>
<div class="banner_page" id="banner_page--content">
    <div class="content_all">
        <div class="_title-breadcrumb">
            <div class="_break">
                <p class="__breadcrumbs">
                    <a href="<?php echo bloginfo('url'); ?>">Trang chủ</a>
                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                    <span>Điểm bán hàng</span>
                </p>
            </div>
            <h1>Điểm bán hàng</h1>
        </div>
        <div class="_banner" style="background-image: url('<?php echo $imageBanner; ?>')"></div>
    </div>
</div>

<div class="nav-title-location">
    <div class="tw_container">
        <div class="content_all">
            <p>“Hệ thống phân phối sản phẩm của Mitsubishi Cleansui xin hân hạnh phục vụ quý khách”</p>
        </div>
    </div>
</div>
<div class="_content_location">
    <!-- START SECTION MAP -->
    <div class="_section_map">
        <div class="tw_container">
            <div class="content_all">
                <div class="_row">
                    <!-- Start col left -->
                    <div class="_col _left">
                        <div class="list_tab">
                            <ul>
                                <li class="active"><a href="#tab_child_1">Đại lý <span> (24)</span></a></li>
                                <li><a href="#tab_child_2">Showroom <span> (6)</span></a></li>
                            </ul>
                        </div>
                        <!-- Start Tab Child 1 -->
                        <div class="menu_location" id="tab_child_1">
                            <div class="arrcodion_location ">
                                <!-- Start arccordiOn item -->
                                <div class="arccordion-item panel-success"  data-city="1">
                                    <div class="panel-heading" data-coor="21.041310,105.788325">
                                        <h3 class="panel-title">Đồ Nhật nội địa</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                <!-- Start arccordiOn item -->
                                <div class="arccordion-item panel-success "  data-city="1">
                                    <div class="panel-heading" data-coor="20.957196,105.756594">
                                        <h3 class="panel-title">CTCP TM & DV MAI ĐẾN</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                <!-- Start arccordiOn item -->
                                <div class="arccordion-item panel-success"  data-city="1">
                                    <div class="panel-heading"  data-coor="21.019631,105.836399">
                                        <h3 class="panel-title">CÔNG TY MAXCO HẢI PHÒNG</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                <!-- Start arccordiOn item -->
                                <div class="arccordion-item panel-success"  data-city="1">
                                    <div class="panel-heading" data-coor="21.052768,105.886182">
                                        <h3 class="panel-title">CỬA HÀNG KÉT BẠC MINH CHÂU</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                <!-- Start arccordiOn item -->
                                <div class="arccordion-item panel-success"  data-city="1">
                                    <div class="panel-heading" data-coor="21.031451,105.769162">
                                        <h3 class="panel-title">VĨNH AN HÀ NỘI</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                <!-- Start arccordiOn item -->
                                <div class="arccordion-item panel-success"  data-city="2">
                                    <div class="panel-heading" data-coor="10.797017,106.634459">
                                        <h3 class="panel-title">CÔNG TY PAZACO</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                <!-- Start arccordiOn item -->
                                <div class="arccordion-item panel-success"  data-city="2">
                                    <div class="panel-heading"  data-coor="10.771152,106.684763">
                                        <h3 class="panel-title">ĐIỆN MÁY TẤN HƯNG</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                <!-- Start arccordiOn item -->
                                <div class="arccordion-item panel-success"  data-city="2">
                                    <div class="panel-heading" data-coor="10.782102,106.683399">
                                        <h3 class="panel-title">THẾ GIỚI ĐIỆN GIẢI</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                 <!-- Start arccordiOn item -->
                                 <div class="arccordion-item panel-success"  data-city="2">
                                    <div class="panel-heading" data-coor="10.789448,106.675846">
                                        <h3 class="panel-title">CÔNG TY TNHH NHẬT GIA</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                 <!-- Start arccordiOn item -->
                                 <div class="arccordion-item panel-success"  data-city="2">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">CÔNG TY TNHH NHẬT GIA</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                 <!-- Start arccordiOn item -->
                                 <div class="arccordion-item panel-success"  data-city="2">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">CÔNG TY TNHH NHẬT GIA</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->
                            </div>
                        </div>
                        <!-- End Tab Child 1 -->

                        <!-- Start Tab Child 2 -->
                        <div class="menu_location" id="tab_child_2">
                            <div class="arrcodion_location ">
                                <!-- Start arccordiOn item -->
                                <div class="arccordion-item panel-success"  data-city="1">
                                    <div class="panel-heading" data-coor="21.041310,105.788325">
                                        <h3 class="panel-title">Đồ Nhật nội địa</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                <!-- Start arccordiOn item -->
                                <div class="arccordion-item panel-success "  data-city="1">
                                    <div class="panel-heading" data-coor="20.957196,105.756594">
                                        <h3 class="panel-title">CTCP TM & DV MAI ĐẾN</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                <!-- Start arccordiOn item -->
                                <div class="arccordion-item panel-success"  data-city="1">
                                    <div class="panel-heading"  data-coor="21.019631,105.836399">
                                        <h3 class="panel-title">CÔNG TY MAXCO HẢI PHÒNG</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                <!-- Start arccordiOn item -->
                                <div class="arccordion-item panel-success"  data-city="1">
                                    <div class="panel-heading" data-coor="21.052768,105.886182">
                                        <h3 class="panel-title">CỬA HÀNG KÉT BẠC MINH CHÂU</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                <!-- Start arccordiOn item -->
                                <div class="arccordion-item panel-success"  data-city="1">
                                    <div class="panel-heading" data-coor="21.031451,105.769162">
                                        <h3 class="panel-title">VĨNH AN HÀ NỘI</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                <!-- Start arccordiOn item -->
                                <div class="arccordion-item panel-success"  data-city="2">
                                    <div class="panel-heading" data-coor="10.797017,106.634459">
                                        <h3 class="panel-title">CÔNG TY PAZACO</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                <!-- Start arccordiOn item -->
                                <div class="arccordion-item panel-success"  data-city="2">
                                    <div class="panel-heading"  data-coor="10.771152,106.684763">
                                        <h3 class="panel-title">ĐIỆN MÁY TẤN HƯNG</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                <!-- Start arccordiOn item -->
                                <div class="arccordion-item panel-success"  data-city="2">
                                    <div class="panel-heading" data-coor="10.782102,106.683399">
                                        <h3 class="panel-title">THẾ GIỚI ĐIỆN GIẢI</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                 <!-- Start arccordiOn item -->
                                 <div class="arccordion-item panel-success"  data-city="2">
                                    <div class="panel-heading" data-coor="10.789448,106.675846">
                                        <h3 class="panel-title">CÔNG TY TNHH NHẬT GIA</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                 <!-- Start arccordiOn item -->
                                 <div class="arccordion-item panel-success"  data-city="2">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">CÔNG TY TNHH NHẬT GIA</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->

                                 <!-- Start arccordiOn item -->
                                 <div class="arccordion-item panel-success"  data-city="2">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">CÔNG TY TNHH NHẬT GIA</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-tele.png'; ?>" alt=""> 096 913 885</li>
                                            <li><img src="<?php echo THEME_ASSETS .'/images/location/icon-mark.png'; ?>" alt=""> Số 29, ngõ 31 Trần Quốc Hoàn, phường Dịch Vọng Hậu, quận Cầu Giấy, thành phố Hà Nội.</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End arccordiOn item -->
                            </div>
                        </div>
                         <!-- End Tab Child 2 -->

                    </div>
                    <!-- End col left -->

                    <!-- Start col right -->
                    <div class="_col _right">
                        <div class="select_location">
        
                            <div class="_select_form">
                                <select name="select_city" class="_select_city" id="">
                                    <option value="0">Tỉnh / thành phố</option>
                                    <option value="1">Hà Nội</option>
                                    <option value="2">Tp. Hồ Chí Minh </option>
                                </select>
                            </div>
                       
                            <div class="_select_form">
                                <select name="select_district" class="_select_district" id="">
                                    <option value="0">Quận / huyện</option>
                                </select>
                            </div>

                        </div>
                        <div class="_row map_location">
                            <div id="map"></div>
                        </div>
                    </div>
                    <!-- End col right -->
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION MAP -->

    <!-- START SECTION POST -->
    <div class="_section_post">
        <div class="tw_container">
            <div class="content_all">
                <div class="tw_title">
                    <h3>Top nhà phân phối hàng đầu</h3>
                </div>
                <!-- Start block post -->
                <div class="_block_post">
                    <!-- Start post item -->
                    <div class="post_item">
                        <a href="#">
                            <div class="box-image">
                                <img src="<?php echo THEME_ASSETS .'/images/location/post-1.png'; ?>" alt="">
                            </div>
                            <div class="box-text">
                                <h5 class="title-post">Siêu thị điện máy chợ lớn</h5>
                                <p class="view-more">Xem trang web</p>
                            </div>
                        </a>
                    </div>
                    <!-- End postitem -->

                     <!-- Start post item -->
                     <div class="post_item">
                        <a href="#">
                            <div class="box-image">
                                <img src="<?php echo THEME_ASSETS .'/images/location/post-2.png'; ?>" alt="">
                            </div>
                            <div class="box-text">
                                <h5 class="title-post">Chuỗi cửa hàng điện máy xanh</h5>
                                <p class="view-more">Xem trang web</p>
                            </div>
                        </a>
                    </div>
                    <!-- End postitem -->

                     <!-- Start post item -->
                     <div class="post_item">
                        <a href="#">
                            <div class="box-image">
                                <img src="<?php echo THEME_ASSETS .'/images/location/post-3.png'; ?>" alt="">
                            </div>
                            <div class="box-text">
                                <h5 class="title-post">Chuỗi cửa hàng Nguyễn Kim</h5>
                                <p class="view-more">Xem trang web</p>
                            </div>
                        </a>
                    </div>
                    <!-- End postitem -->
                </div>
                <!-- End block post -->
            </div>
        </div>
    </div>
    <!-- END SECTION POST -->
</div>

<script type="text/javascript">

	jQuery(document).ready(function($) { 
        // Tab
        function activeTab(obj)
        {
            $('.list_tab ul li').removeClass('active');
            $(obj).addClass('active');
            var id = $(obj).find('a').attr('href');
    
            //Hide Alltab    
            $('.menu_location').hide();
    
            // Show Current tab
            $(id).show();
        }
    
        $('.list_tab li').click(function(){
            activeTab(this);
            return false;
        });
        activeTab($('.list_tab li:first-child'));

        // Menu Arrcordion
        $(".arccordion-item .panel-body").slideUp('fast');
        $(".panel-heading").click(function() {
            $(this).parent().toggleClass('active').find('.panel-body').slideToggle('fast');
            $(".panel-heading").not(this).parent().removeClass('active').find('.panel-body').slideUp('fast');
        }); 
        // Render select option;
        var opitonHN = '<option value="0">Quận / huyện</option>\
                    <option value="1">Quận Hai Bà Trưng</option>\
                    <option value="2">Quận Hoàn Kiếm</option>\
                    <option value="3">Quận Ba Đình</option>\
                    <option value="4">Quận Cầu Giấy</option>\
                    <option value="4">Quận Đống Đa</option>';

        var opitonHCM = '<option value="0">Quận / huyện</option>\
                        <option value="1">Quận 2</option>\
                        <option value="2">Quận 9</option>\
                        <option value="3">Quận 1</option>\
                        <option value="4">Quận Thủ Thiêm</option>\
                        <option value="4">Quận 7</option>';
        // Tab-arrcordion render
        // Select city event
        var tab=$('.arrcodion_location .arccordion-item');
        $("._select_city").change(function(){
            var valOp=$(this).children("option:selected").val();       
            if(valOp==='1'){
                $('._select_district').html(opitonHN);
            }
            if(valOp==='2'){
                $('._select_district').html(opitonHCM)
            }
            // Render tab    
            for(let i=0;i<tab.length;i++){
                var city=$(tab[i]).data('city')
                if(valOp==='0'){
                    $(tab[i]).show();
                }
                else if(String(city)!==valOp){
                    $(tab[i]).hide();
                }else
                    $(tab[i]).show();
            }
        })
    }); 
    // MAP API
    function initMap() {   
        var styles=[
                {
                    "featureType": "all",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "saturation": 36
                        },
                        {
                            "color": "#333333"
                        },
                        {
                            "lightness": 40
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#fefefe"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#fefefe"
                        },
                        {
                            "lightness": 17
                        },
                        {
                            "weight": 1.2
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e0dcdc"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "color": "#d71920"
                        }
                    ]
                },
                {
                    "featureType": "poi.government",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#dedede"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "featureType": "poi.place_of_worship",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 29
                        },
                        {
                            "weight": 0.2
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 18
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f2f2f2"
                        },
                        {
                            "lightness": 19
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e9e9e9"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                }
            ]
        var marker =[
            {lat: 21.041310, lng:105.788325},
            {lat: 20.957196, lng:105.756594},
            {lat: 21.019631, lng:105.836399},
            {lat: 21.052768, lng:105.886182},
            {lat: 21.031451, lng:105.769162},
            {lat: 10.797017, lng:106.634459},
            {lat: 10.771152, lng:106.684763},
            {lat: 10.782102, lng:106.683399},
            {lat: 10.789448, lng:106.675846}
        ]
        // The location of Uluru
        var map = new google.maps.Map(
                document.getElementById('map'), {
                zoom: 5, center:{lat:14.336711,lng:108.600470},styles:styles});
        // The map, centered at Uluru  
        // The marker, positioned at Uluru
        function addMarker(coords){
            var marker = new google.maps.Marker(
                {position: coords, 
                 map: map,
                 icon:'http://localhost/mitsubishi/wp-content/uploads/2020/04/mark-map.png'});
                marker.addListener('click', function() {
                    map.setZoom(13);
                    map.setCenter(marker.getPosition());
                });     
        }
        // Add marker 
        for(var i=0;i<marker.length;i++){
            addMarker(marker[i]);
        }
        jQuery('.panel-heading').click(function(){
            if(jQuery(this).data('coor')){
                var coor=jQuery(this).data('coor').split(",");
                map.setZoom(13);
                map.setCenter({lat:parseFloat(coor[0]),lng:parseFloat(coor[1])}); 
            }  
        })

        jQuery('._select_city').click(function(){
            var valOp=jQuery(this).children("option:selected").val();
            if(valOp==='1'){
                map.setZoom(11);
                map.setCenter({lat: 21.034984,lng:105.849022}); 
            }    
            if(valOp==='2'){
                map.setZoom(11);
                map.setCenter({lat: 10.819420,lng:106.626528}); 
            }    
        })
    }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLapHjmAqk9cL5mUx1QoiNO8dZJOgNmW0&callback=initMap">
</script>
<script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
<?php
    get_template_part( 'template-parts/social/social' );
    get_footer();
?>