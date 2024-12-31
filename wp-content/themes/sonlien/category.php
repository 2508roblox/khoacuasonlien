<?php
    get_header();
    $current_Cat = get_queried_object();
    $catID = $current_Cat->term_id;
    $cat_news = get_categories( array(
        'taxonomy' => 'category',
        'hide_empty' => 0,
        'order' => 'ASC',
        'orderby' => 'id'
    ));

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'cat'            => $catID,
    );
    $getPost= new WP_Query($args);
    $postHotNewsID = array();
    if($getPost->have_posts(  )){
        while($getPost->have_posts(  )){
            $getPost->the_post(  );
            $postID = get_the_ID(  );
            $news_is_hot = get_field('hot_news');
            if(count($news_is_hot) !== 0){
                array_push($postHotNewsID, $postID);
            }
        }
    }
    // var_dump($postHotNewsID);
?>

<div class="banner_page" id="banner_page--content">
    <div class="content_all">
        <div class="_title-breadcrumb">
            <div class="_break">
                <p class="__breadcrumbs">
                    <a href="<?php echo bloginfo('url'); ?>">Trang chủ</a>
                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                    <span>Tin tức</span>
                </p>
            </div>
            <h1>Tin tức</h1>
        </div>
        <div class="_banner" style="background-image: url('<?php echo THEME_ASSETS.'/images/news/banner.png' ?>')"></div>
    </div>
</div>
<div class="news_site">
    <div class="_categories">
        <!-- <div class="tw_container"> -->
            <div class="content_all">
                <?php foreach ($cat_news as $key => $cat) {
                    $catIDtab = $cat->term_id;
                    $catName = $cat->name;
                    $catURL = get_term_link($catIDtab);
                    $active = $catID == $catIDtab ? 'is_active' : null;
                    echo '<a href="'.$catURL.'" class="'.$active.'">'.$catName.'</a>';
                } ?>
            </div>
        <!-- </div> -->
    </div>

    <div class="_highlight">
        <div class="tw_container">
            <div class="content_all">
                <p class="tw_title_page">Tin nổi bật</p>
                <div class="__slide">
                    <div class="__left" >
                        <?php
                            if(isset($postHotNewsID)){
                                foreach ($postHotNewsID as $key => $hotNewsID) {
                                    $permalink = get_the_permalink($hotNewsID);
                                    $thumbnail = get_the_post_thumbnail_url($hotNewsID, 'full');
                                    $titleNews = get_the_title($hotNewsID);
                                    echo '<a href="'.$permalink.'">
                                            <div class="_img" style="background-image: url('.$thumbnail.');"></div>
                                            <p>'.$titleNews.'</p>
                                            <p>Xem chi tiết</p>
                                        </a>';
                                    break;
                                }
                            }
                        ?>
                        <!-- <a href="#">
                            <div class="_img" style="background-image: url('<?php //echo THEME_ASSETS .'/images/homes/s6_img1.png'; ?>');"></div>
                            <p>HƠN 30 NƯỚC SỬ DỤNG SẢN PHẨM MITSUBISHI CHEMICAL CLEANSUI</p>
                            <p>Xem chi tiết</p>
                        </a> -->
                    </div>
                    <div class="__right js_news_highlight">
                        <div class="swiper-pagination pagination_page"></div>
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php
                                    if(isset($postHotNewsID)){
                                        $i = 0;
                                        foreach ($postHotNewsID as $key => $postNewsID) {
                                            if($i >= 1){
                                                $permalink = get_the_permalink($postNewsID);
                                                $thumbnail = get_the_post_thumbnail_url($postNewsID, 'full');
                                                $titleNews = get_the_title($postNewsID);
                                                echo '<div class="swiper-slide">
                                                        <a href="'.$permalink.'">
                                                            <div class="_img" style="background-image: url('.$thumbnail.');"></div>
                                                            <p>'.$titleNews.'</p>
                                                        </a>
                                                    </div>';
                                            }
                                            $i++;
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="_control">
                            <div class="swiper-button-prev button_control"><img src="<?php echo THEME_ASSETS.'/images/homes/prev.png'; ?>" alt=""></div>
                            <div class="swiper-button-next button_control"><img src="<?php echo THEME_ASSETS.'/images/homes/next.png'; ?>" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=_other>
        <div class="tw_container">
            <div class="content_all">
                <p class="tw_title_page">Tin tức khác</p>
                <div class="__list">
                   <?php
                        $paged = get_query_var('page') ? get_query_var('page') : 1;
                        $argsother = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 4,
                            'post_status'    => 'publish',
                            'cat'            => $catID,
                            'post__not_in'   => $postHotNewsID,
                            'paged'          => $paged
                        );
                        $getPostOther= new WP_Query($argsother);

                        if($getPostOther->have_posts(  )){
                            while ($getPostOther->have_posts(  )) {
                                $getPostOther->the_post();
                                $postOtherID = get_the_ID(  );
                                $permalinkOther = get_the_permalink($postOtherID);
                                $thumbnailOther = get_the_post_thumbnail_url($postOtherID, 'full');
                                $titleNewsOther = get_the_title($postOtherID);
                                $excerptNewsOther = get_the_excerpt($postOtherID);
                                $timeNewsOther = get_the_time( 'd/m/Y', $postOtherID );
                                echo '
                                <a href="'.$permalinkOther.'">
                                    <div class="-left">
                                        <div class="--img" style="background-image: url('.$thumbnailOther.');">
                                            <img src="'.$thumbnailOther.'" alt="">
                                        </div>
                                    </div>
                                    <div class="-right">
                                        <time><img src="'. THEME_ASSETS .'/images/news/clock.png'.'" alt=""> <span>'.$timeNewsOther.'</span></time>
                                        <h3>'.$titleNewsOther.'</h3>
                                        <p>'.$excerptNewsOther.'</p>
                                    </div>
                                </a>';
                            }
                        }
                   ?>
                </div>

                <div class="__pagination--main">
                    <?php echo paginationWoo($getPostOther);?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($){
        var swiper = new Swiper('.js_news_highlight .swiper-container', {
            slidesPerView: 1,
            spaceBetween: 40,
            pagination: {
                el: '.js_news_highlight .swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.js_news_highlight .swiper-button-next',
                prevEl: '.js_news_highlight .swiper-button-prev',
            },
            breakpoints: {
                1024: {
                    spaceBetween: 30,
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 15
                }
            },
        });
    });
</script>
<?php 
    get_template_part( 'template-parts/social/social' );
    get_footer(); 
?>