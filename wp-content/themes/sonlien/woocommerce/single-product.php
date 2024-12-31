<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>
<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
        global $product;
        // var_dump($product);
        $name = get_the_title();
        $sku = $product->get_sku();
        $priceProduct = $product->regular_price;
        $saleProduct = $product->sale_price;
        $price = !$saleProduct ? $priceProduct : $saleProduct;
        $attachment_ids = $product->get_gallery_image_ids();
        $videoProduct = get_field('video_url');
        $excerptTitle = get_field('excerptProduct');
        $theContent = get_the_content();
        $tag = get_the_tags();
        $id = get_the_ID();
        $specifications = get_field('specifications');
        $productDetail = get_field('product_detail');
        $excerptProductDetail = get_the_excerpt();
        $productStrengths = get_field('product_strengths');
        $questionsAsked = get_field('questionsGroup', 'option');
        $categories = get_the_terms(get_the_ID(), 'product_cat');
        $categoriesID = $categories[0]->term_id;
        $categoriesSlug = $categories[0]->slug;
        $termParentID = $categories[0]->parent;
        $termParent = get_term($termParentID);
        $hotline = get_field('hotline', 'option');
        $questionProduct = get_field('question_group_product', get_the_ID());
        $args = array(

            'hide_empty' => true,

        );
        $terms = get_terms('product_tag', $args);
?>




        <div class="banner_page detail_product tw_container" id="banner_page--content">
            <div class="content_all">
                <div class="_title-breadcrumb">
                    <div class="_break">
                        <p class="__breadcrumbs">
                            <a href="#">Trang chủ</a>
                            <?php
                            if ($termParentID) {
                            ?>
                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                                <a href="<?php echo get_term_link($termParentID); ?>"><?php echo $termParent->name; ?></a>
                            <?php
                            }
                            ?>
                            <i class="fa fa-caret-right" aria-hidden="true"></i>
                            <span><?php echo $name . ' ' . $sku ?></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="page_detail_product">
            <div class=" tw_container">
                <div class="overview_product">
                    <div class="title_product_mobile"><?php echo $name; ?> <span><?php echo $sku; ?></span></div>
                    <div class="left">
                        <div class="swiper-container-wrap gallery-product">
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper ">
                                    <div class="swiper-slide  slide_thumb">
                                        <?php
                                        if ($videoProduct) {
                                            // $url = $videoProduct;
                                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                                            $id = $matches[1];
                                            $width = '100%';
                                            $height = '100%';
                                        ?>
                                            <iframe id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>" src="https://www.youtube.com/embed/<?php echo $videoProduct ?>?rel=0&control=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>
                                        <?php
                                        } else {
                                            echo '<a class="video_slide" data-fancybox href="#"><img src="' . THEME_ASSETS . '/images/detail-product/icon_list_video3.png' . '" alt="">" alt=""> </a>';
                                        }
                                        ?>

                                    </div>
                                    <?php if ($attachment_ids) {
                                        foreach ($attachment_ids as $key => $attachment_id) {
                                            echo '<div class="swiper-slide slide_thumb">
													<img src="' . wp_get_attachment_url($attachment_id) . '" alt="">
												</div>';
                                        }
                                    } ?>
                                </div>
                            </div>
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide slide_thumb">
                                        <?php
                                        //   echo '<pre>';var_dump($);echo'</pre>';
                                        if ($videoProduct) {
                                            $video_id = explode("?v=", $videoProduct);
                                            $video_id = $video_id[1];
                                            $thumbnail = "http://i3.ytimg.com/vi/" . $video_id . "/hqdefault.jpg";
                                            echo '<a class="video_slide" "><img src="' . $thumbnail . '" alt=""> </a>';
                                        } else {
                                            echo '<div class="video_slide" ><img src="' . THEME_ASSETS . '/images/detail-product/icon_list_video3.png' . '" alt=""></div>';
                                        }
                                        ?>
                                    </div>
                                    <?php if ($attachment_ids) {
                                        foreach ($attachment_ids as $key => $attachment_id) {
                                            echo '<div class="swiper-slide slide_thumb">
													<img src="' . wp_get_attachment_url($attachment_id) . '" alt="">
												</div>';
                                        }
                                    } ?>
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-white"><img src="<?php echo THEME_ASSETS . '/images/detail-product/next.png' ?>" alt=""></div>
                            <div class="swiper-button-prev swiper-button-white"><img src="<?php echo THEME_ASSETS . '/images/detail-product/prev.png' ?>" alt=""></div>
                        </div>

                        <!-- <div class="img_big">
							<img src="<?php echo $attachment_ids ? wp_get_attachment_url($attachment_ids[0]) : "" ?>" alt="">
						</div>
						<div class="slide_left">
							<div class="swiper-container" id="slide_overview">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<a class="video_slide" data-fancybox href="<?php echo $videoProduct; ?>"><img src="<?php echo THEME_ASSETS . '/images/detail-product/icon_list_video3.png' ?>" alt=""> </a>
									</div>
									<?php if ($attachment_ids) {
                                        foreach ($attachment_ids as $key => $attachment_id) {
                                            echo '<div class="swiper-slide slide_thumb">
													<img src="' . wp_get_attachment_url($attachment_id) . '" alt="">
												</div>';
                                        }
                                    } ?>
								</div>
							</div>
							<div class="swiper-button-next _btn_control"><img src="<?php echo THEME_ASSETS . '/images/detail-product/next.png' ?>" alt=""></div>
							<div class="swiper-button-prev _btn_control"><img src="<?php echo THEME_ASSETS . '/images/detail-product/prev.png' ?>" alt=""></div>
						</div> -->
                    </div>

                    <div class="right">
                        <div class="title_product"><?php echo $name; ?> <span><?php echo $sku; ?></span></div>
                        <div class="price">
                            <p><?php if ($price) {
                                    echo number_format($price, 0, ',', '.') . ' VNĐ';
                                } ?></p>
                            <span><?php echo $excerptTitle; ?></span>
                        </div>
                        <div class="_buy">
                            <div class="list_bennefit">
                                <?php echo $excerptProductDetail; ?>
                            </div>
                            <div class="nav_buy">
                                <a href="?add-to-cart=<?php echo get_the_ID(); ?>" class="add-to-cart" data-product-id="<?php echo get_the_ID(); ?>">Mua ngay</a>
                                <a href="<?php echo $hotline ? 'tel:' . $hotline : 'javascript:void(0)'; ?>">
                                    <p><i class="fa fa-phone" aria-hidden="true"></i><?php echo $hotline; ?></p> <span>(Gọi tư
                                        vấn miễn phí)</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="information_product">
                <div class="tw_container">
                    <div class="nav_product">
                        <a href="#tab_1" data-head class="is-active">Chi tiết </a>
                        <a href="#tab_2" data-head>Thông số <br />kĩ thuật</a>
                        <a href="#tab_3" data-head>Thông tin sản phẩm</a>
                    </div>
                    <div class="content_tab">
                        <div class="detail" id="tab_1" data-content>

                            <?php
                            if ($theContent) {
                                echo $theContent;
                            } else {
                                echo '<p class="--comming">Đang cập nhật ...</p>';
                            }
                            ?>
                            <div class="hastag">
                                <div class="_hastag">

                                    <?php


                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        foreach ($terms as $term) {
                                            $term_link = get_term_link($term->term_id, "product_tag");
                                    ?>
                                            <a href="<?= $term_link ?>"> #<?= $term->name; ?></a>

                                    <?php
                                        }
                                    }

                                    ?>
                                </div>
                            </div>



                        </div>
                        <div class="specifications" id="tab_2" data-content>
                            <?php
                            if ($specifications) {
                                echo '<div class="__list">';
                                foreach ($specifications as $key => $specification) {
                                    echo '<div class="-item">
													<p class="--label">' . $specification['parameter'] . '</p>
													<p class="--text">' . $specification['content'] . '</p>
												</div>';
                                }
                                echo '</div>';
                            } else {
                                echo '<p class="--comming">Đang cập nhật ...</p>';
                            }
                            ?>
                        </div>
                        <div class="info_product" id="tab_3" data-content>

                            <?php
                            // if($theContent){
                            // 	echo $theContent;
                            // }else{
                            // 	echo '<p class="--comming">Đang cập nhật ...</p>';
                            // }
                            $_block_1 = get_field('_block_1', get_the_ID());
                            $_block_2 = get_field('_block_2', get_the_ID());
                            $_block_3 = get_field('_block_3', get_the_ID());
                            // echo '<pre>';var_dump($_block_3);echo'</pre>';
                            ?>

                            <div class="__block_1">
                                <div class="content_block_1">
                                    <?php if ($_block_1['content_block_1']) echo $_block_1['content_block_1']; ?>
                                </div>
                                <div class="image_block_1">
                                    <?php if ($_block_1['image_block_1']) echo '<img src="' . $_block_1['image_block_1'] . '" alt="">'; ?>
                                </div>
                            </div>
                            <div class="__block_2">
                                <div class="title">
                                    <?php if ($_block_2['title_block_2']) echo '<h2 class="title_block_2">' . $_block_2['title_block_2'] . '</h2>'; ?>
                                    <?php if ($_block_2['title_content_block_2']) echo '<p class="title_content_block_2">' . $_block_2['title_content_block_2'] . '</p>'; ?>
                                    <?php if ($_block_2['image_block_2']) echo '<img src="' . $_block_2['image_block_2'] . '" alt="">'; ?>
                                </div>
                                <div class="content">
                                    <div class="content_text_block_2">
                                        <?php if ($_block_2['content_block_2']['content_text_block_2']) echo $_block_2['content_block_2']['content_text_block_2']; ?>
                                    </div>
                                    <div class="content_image_block_2">
                                        <?php if ($_block_2['content_block_2']['content_image_block_2']) echo '<img src="' . $_block_2['content_block_2']['content_image_block_2'] . '" alt="">'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="_block_3">
                                <?php if ($_block_3['title_block_3']) echo '<h2 class="title_block_3 mobile">' . $_block_3['title_block_3'] . '</h2>'; ?>
                                <div class="image_block_3">
                                    <?php if ($_block_3['image_block_3']) echo '<img src="' . $_block_3['image_block_3'] . '" alt="">'; ?>
                                </div>
                                <div class="content_block_3">
                                    <?php if ($_block_3['title_block_3']) echo '<h2 class="title_block_3">' . $_block_3['title_block_3'] . '</h2>'; ?>
                                    <?php if ($_block_3['content_block_3']) echo $_block_3['content_block_3']; ?>
                                </div>
                            </div>
                            <div class="strength">
                                <div class="title_detail_product">Điểm mạnh của sản phẩm</div>

                                <div class="content_strength">
                                    <div class="img_strength"><img src="<?php echo $productStrengths['photo_description'] ?>" alt=""></div>
                                    <div class="decor_strength"><img src="<?php echo THEME_ASSETS . '/images/detail-product/decor_strength.png' ?>" alt="">
                                    </div>
                                    <?php if ($productStrengths['strengths']) {
                                        foreach ($productStrengths['strengths'] as $key => $productStrength) {
                                            echo '<div class="_item">
													<div class="icon">
														<img src="' . $productStrength['icon'] . '" alt="">
													</div>
													<div class="text">
														<h2>' . $productStrength['title'] . '</h2>
														<p>' . $productStrength['content'] . '</p>
													</div>
												</div>';
                                        }
                                    } ?>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="tw_container">
                <div class="question">
                    <div class="title_detail_product">Các câu hỏi thường gặp</div>
                    <div class="content_question">
                        <div class="list_question">
                            <?php
                            if ($questionProduct) :
                                foreach ($questionProduct as $key => $questionProduct) :
                            ?>
                                    <div class="ground_question">
                                        <h2 class="title_ground"><?php echo $questionProduct['title_group'] ?> <i class="fa fa-caret-down" aria-hidden="true"></i></h2>
                                        <div class="list_detail">
                                            <?php
                                            if ($questionProduct['list_question']) :
                                                foreach ($questionProduct['list_question'] as $key => $questionList) :
                                            ?>
                                                    <div class="list_item">
                                                        <h3 class="title_list"><?php echo $questionList['title_question'] ?></h3>
                                                        <div class="content_detail">
                                                            <?php echo $questionList['answer_question'] ?>
                                                        </div>
                                                    </div>
                                            <?php endforeach;
                                            endif; ?>
                                        </div>
                                    </div>
                            <?php endforeach;
                            endif; ?>
                        </div>
                        <!-- <div class="form_question">
							<div class="title_form">Gửi câu hỏi cho chúng tôi</div>
							<form action="" id="questionsFrom" method="POST">
								<div class="all-field">
									<div class="item-field">
										<label for="">họ và tên <span>*</span></label>
										<input type="text" name="nameDetailP" id="nameDetailP">
									</div>
									<div class="item-field">
										<label for="">số điện thoại <span>*</span></label>
										<input type="text" name="phoneDetailP" id="phoneDetailP">
									</div>
									<div class="item-field">
										<label for="">câu hỏi cần tư vấn <span>*</span></label>
										<textarea name="questionDetailP" id="questionDetailP" rows="5"></textarea>
									</div>
								</div>
								<button type="submit">Gửi</button>
								<div class="--mess_error"></div>
							</form>
						</div> -->
                    </div>
                </div>
            </div>
            <div class="relate_products">
                <div class="tw_container">
                    <div class="left">
                        <div class="title_detail_product">Các sản phẩm <br>liên quan</div>
                        <a href="<?php echo get_term_link($categoriesID); ?>" class="see_more">Xem thêm</a>
                    </div>
                    <div class="right">
                        <div class="swiper-container" id="slide_relate_products">
                            <div class="swiper-wrapper">
                                <?php
                                $relateProducts = new WP_Query(array(
                                    'product_cat'       => $categoriesSlug,
                                    'post__not_in'        => array(get_the_ID()),
                                    'posts_per_page'       => 10,
                                    'post_type'           => 'product',
                                ));
                                if ($relateProducts->have_posts()) {
                                    while ($relateProducts->have_posts()) {
                                        $relateProducts->the_post();
                                        global $product;
                                        $skuRelate = $product->get_sku(get_the_ID());
                                        $thumbnailRelate = get_the_post_thumbnail_url(get_the_ID(), 'fullsize');
                                        $titleRelate = get_the_title(get_the_ID());
                                        $linkProductRelate = get_the_permalink(get_the_ID());
                                    }
                                    echo '<div class="swiper-slide">
											<a href="' . $linkProductRelate . '">
												<div class="_img"><img src="' . $thumbnailRelate . '" alt="">
												</div>
												<div class="brand">' . $skuRelate . '</div>
												<div class="title_slide"> <p>' . $titleRelate . '</p> </div>
											</a>
										</div>';
                                }
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="decor"><img src="<?php echo THEME_ASSETS . '/images/detail-product/decor.png' ?>" alt=""></div>
            </div>
            <div class="viewed_products">
                <div class="tw_container">
                    <div class="title_detail_product">Các sản phẩm đã xem</div>
                    <div class="list_item">
                        <div class="swiper-container" id="slide_viewed">
                            <div class="swiper-wrapper">
                                <?php if (isset($_SESSION["viewed"]) && $_SESSION["viewed"]) {
                                    $data = $_SESSION["viewed"];
                                    $argsViewed = array(
                                        'post_type' => 'product',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 10,
                                        'post__in'    => $data
                                    );
                                    $productViewed = new WP_Query($argsViewed);
                                    if ($productViewed->have_posts()) {
                                        while ($productViewed->have_posts()) {
                                            $productViewed->the_post();
                                            global $product;
                                            $skuViewed = $product->get_sku(get_the_ID());
                                            $thumbnailViewed = get_the_post_thumbnail_url(get_the_ID(), 'fullsize');
                                            $titleViewed = get_the_title(get_the_ID());
                                            $linkProductViewed = get_permalink(get_the_ID());
                                            echo '<div class="swiper-slide">
										<a href="' . $linkProductViewed . '">
											<div class="_img"><img src="' . $thumbnailViewed . '" alt="">
											</div>
											<div class="brand">' . $skuViewed . '</div>
											<div class="title_slide"> <p>' . $titleViewed . '</p> </div>
										</a>
									</div>';
                                        }
                                        wp_reset_postdata();
                                    } else {
                                        echo '<p class="--comming">Không có sản phẩm nào đã xem!</p>';
                                    }
                                } ?>
                            </div>
                        </div>
                        <div class="swiper-button-next _btn_control"><img src="<?php echo THEME_ASSETS . '/images/detail-product/next.png' ?>" alt=""></div>
                        <div class="swiper-button-prev _btn_control"><img src="<?php echo THEME_ASSETS . '/images/detail-product/prev.png' ?>" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="why_choose">
                <div class="title_detail_product">Tại sao nên chọn sản phẩm của <br><span>Sơn Liên</span></div>
                <div class="content_all">
                    <div class="tw_container">
                        <div class="content_why">
                            <div class="left">
                                <div class="_item">
                                    <div class="_img"><img src="<?php echo THEME_ASSETS . '/images/detail-product/img_2.png' ?>" alt=""></div>
                                    <div class="tex">Nhập Khẩu nguyên chiếc <br>từ Sơn Liên</div>
                                </div>
                                <div class="_item">
                                    <div class="_img"><img src="<?php echo THEME_ASSETS . '/images/detail-product/img_3.png' ?>" alt=""></div>
                                    <div class="tex">Lắp đặt vận chuyển<br> tận nơi</div>
                                </div>
                                <div class="_item">
                                    <div class="_img"><img src="<?php echo THEME_ASSETS . '/images/detail-product/img_4.png' ?>" alt=""></div>
                                    <div class="tex">Dịch vụ bảo hành<br> chuyên nghiệp</div>
                                </div>
                            </div>
                            <div class="right">
                                <img src="<?php echo THEME_ASSETS . '/images/detail-product/img_5.png' ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    endwhile;
    wp_reset_postdata();
endif;
?>
<script>
    jQuery(document).ready(function($) {
        // $('#questionsFrom').submit(function(e){
        // 	e.preventDefault();
        // 	console.log();
        // 	let thisEl = $(this);
        // 	let buttonSubmitEl = thisEl.find('button');
        // 	console.log(buttonSubmitEl);
        // 	let inputAll = thisEl.find('.all-field');
        // 	let mess_error = thisEl.find('.--mess_error');

        // 	const name = document.getElementById('nameDetailP').value;
        // 	const phone = document.getElementById('phoneDetailP').value;
        // 	const question = document.getElementById('questionDetailP').value;
        // 	const nonce = document.getElementById("contact_productDetail_nonce").value;
        // 	jQuery.ajax({
        //         type: "POST",
        //         url: obj.AJAX_URL,
        //         data: {
        //             action: 'contactFormAjaxProductDetail',
        //             nameDetailP: name,
        //             phoneDetailP: phone,
        //             questionDetailP: question,
        //             contact_productDetail_nonce: nonce,
        //         },
        //         dataType: 'JSON',
        //         beforeSend: function () {
        //             $(buttonSubmitEl).text("Đang gửi đi . . .");
        //             $(buttonSubmitEl).prop('disabled', true);
        //         },
        //         complete: function () {
        //             $(buttonSubmitEl).text("Gửi");
        //             $(buttonSubmitEl).prop('disabled', false);
        //         },
        //         success: function (response) {
        //             if(response.success){
        //                 $(mess_error).html(response.data);
        //                 // // $(mess_error).addClass('__active');
        //                 $(buttonSubmitEl).remove();
        //                 $(inputAll).remove();
        //             }else{
        //                 $(mess_error).html(response.data);
        //                 // $(mess_error).addClass('__active');
        //             }
        //         }
        //     })
        // });


        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            initialSlide: 1,
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
            initialSlide: 1,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs
            }
        });

        $('.information_product').tabs_new();
        $('.swiper-slide').click(function() {
            $(this).parent().find('.is-active').removeClass('is-active');
            $(this).addClass('is-active');
            var img_slide = $(this).find('img').attr('src');
            $('.overview_product .left .img_big img').attr("src", img_slide);
        });
        var slide_overview = new Swiper('#slide_overview', {
            spaceBetween: 10,
            slidesPerView: 4,
            clickable: true,
            navigation: {
                nextEl: '.overview_product .swiper-button-next',
                prevEl: '.overview_product .swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
            },
        });
        var slide_viewed = new Swiper('#slide_viewed', {
            spaceBetween: 30,
            slidesPerView: 3,
            breakpoints: {
                768: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
            },
            navigation: {
                nextEl: '.viewed_products .swiper-button-next',
                prevEl: '.viewed_products .swiper-button-prev',
            },
        });
        var slide_relate_products = new Swiper('#slide_relate_products', {
            spaceBetween: 30,
            slidesPerView: 3,
            breakpoints: {
                768: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                }
            },
        });
        var width_screnn = $(window).width();
        var buy = $('.nav_buy');
        if (width_screnn < 769) {
            var height_scroll = $('#header-main').height() + $('.overview_product .title_product_mobile').height() +
                $('.overview_product .left').height() + $('.overview_product .right .price').height() + 80;
            console.log(height_scroll);
            $(window).on('load scroll', function() {
                if ($(this).scrollTop() > height_scroll && buy.hasClass('fixed') == false) {
                    buy.css({
                        "top": '-100px'
                    });
                    buy.addClass('fixed');
                    buy.animate({
                        "top": 0
                    }, 600);
                } else if ($(this).scrollTop() < height_scroll && buy.hasClass('fixed') == true) {
                    buy.removeClass('fixed');
                }
            });
        }

        $('.title_ground').click(function() {
            $(this).toggleClass('active').siblings('.list_detail').slideToggle(300);
            // $(this).parent().siblings().find('.title_ground').removeClass('active').siblings('.list_detail').slideUp(300);
        });
        $('.title_list').click(function() {
            $(this).toggleClass('is-active').siblings('.content_detail').slideToggle(300);
            // $(this).parent().siblings().find('.title_list').removeClass('is-active').siblings('.content_detail').slideUp(300);
        });
    });
</script>
<?php
get_template_part('template-parts/social/social');
// ContactProductDetail::security();
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */