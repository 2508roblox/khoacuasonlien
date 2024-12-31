<?php
$cat_news = get_categories(array(
    'taxonomy' => 'category',
    'hide_empty' => 0,
    'order' => 'ASC',
    'orderby' => 'id'
));
?>
<section class="h-section6">
    <div class="_decor1" style="background:#67bce0 ">
    </div>
    <img class="_decor2" src="<?php echo THEME_ASSETS . '/images/homes/s6_decor2.png'; ?>">
    <div class="tw_container">
        <div class="_s6_content js_tab_news">
            <div class="_top" data-aos="fade-left">
                <div class="tw_title">
                    <h2>tin tức </h2>

                </div>
                <div class="_tab">
                    <?php
                    if (!empty($cat_news)) {
                        foreach ($cat_news as $key => $cat) {
                            echo '<div class="_tab_active">' . $cat->name . '</div>';
                            break;
                        }
                    }
                    ?>
                    <div class="_tab_list">
                        <?php
                        if (!empty($cat_news)) {
                            $i = 0;
                            foreach ($cat_news as $key => $cat) {
                                $i++;
                                $active = $i == 1 ? 'is-active' : '';
                                echo '<a class="_item ' . $active . '" href=".js-tab' . $i . '" data-head>' . $cat->name . '</a>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="_bottom js--anchor" data-aos="fade-up">
                <?php
                if (!empty($cat_news)) : $j = 0;
                    foreach ($cat_news as $key => $cat) : $j++;
                        $getPostCat = new WP_Query(array(
                            'post_type'      => 'post',
                            'posts_per_page' => -1,
                            'post_status'    => 'publish',
                            'cat'            => $cat->term_id,
                        ));
                        $getPostCat2 = new WP_Query(array(
                            'post_type'      => 'post',
                            'posts_per_page' => 10,
                            'post_status'    => 'publish',

                            'cat'            => $cat->term_id,

                        ));
                ?>

                        <div class="_tab_item_content js-tab<?php echo $j; ?>" data-content>
                            <?php
                            if ($getPostCat->have_posts()) :
                                while ($getPostCat->have_posts()) :
                                    $getPostCat->the_post();
                                    $permalink = get_the_permalink(get_the_ID());
                                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                    $title = get_the_title(get_the_ID());

                            ?>
                                    <a href="<?php echo $permalink; ?>" class="_left" style="background-image: url('<?php echo $thumbnail; ?>');">
                                        <div class="_text"><?php echo $title; ?></div>
                                        <div class="_seemore"><?php _e('Xem chi tiết', 'corex'); ?></div>
                                    </a>
                            <?php
                                    break;
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                            <div class="_right">
                                <div class="swiper-container js_slide_news_t<?php echo $j; ?>">
                                    <div class="swiper-wrapper">
                                        <?php
                                        if ($getPostCat2->have_posts()) {
                                            $k = 0;
                                            while ($getPostCat2->have_posts()) {
                                                $getPostCat2->the_post();
                                                $permalink = get_the_permalink(get_the_ID());
                                                $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                                $title = get_the_title(get_the_ID());
                                                echo '<div class="swiper-slide">
																	<a href="' . $permalink . '" class="_img" style="background-image: url(' . $thumbnail . ');">
																		<div class="_text">' . $title . '</div>
																	</a>
																</div>';
                                                $k++;
                                            }
                                            wp_reset_postdata();
                                        }
                                        ?>
                                    </div>
                                    <div class="swiper-pagination pagination_def"></div>
                                </div>
                            </div>
                        </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
            <a class="_readmore_def" href="<?php echo bloginfo('url') . '/tin-tuc'; ?>" data-aos="fade-up" data-aos-anchor=".js--anchor">Xem thêm</a>
        </div>
    </div>
</section>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        // js slide tab mobi
        var width_content = $(window).width();
        if (width_content <= 480) {
            $('._tab_active').click(function() {
                $('._tab_list').slideToggle(300);
            });
            $('._tab_list a').click(function() {
                $(this).parent('._tab_list').slideUp(300);
                var tab_html = $(this).html();
                $('._tab_active').html(tab_html);
            });
        }

        <?php
        if (!empty($cat_news)) : $i = 0;
            foreach ($cat_news as $key => $cat) : $i++;
        ?>
                // js slide
                var js_slide_news_t<?php echo $i; ?> = new Swiper('.js_slide_news_t<?php echo $i; ?>', {
                    speed: 1200,
                    slidesPerView: 1.75,
                    loop: true,
                    spaceBetween: 45,
                    pagination: {
                        el: '.js_slide_news_t<?php echo $i; ?> .swiper-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 20
                        }
                    }
                });
        <?php
            endforeach;
        endif;
        ?>
        var href = $('._s6_content .swiper-slide-active').find('a').attr('href');
        var img = $('._s6_content .swiper-slide-active').find('a').css('background-image');
        var text = $('._s6_content .swiper-slide-active').find('a ._text').html();
        $('.h-section6 ._tab_item_content').find('._left').attr('href', href);
        $('.h-section6 ._tab_item_content').find('._left').css('background', img + 'center no-repeat');
        $('.h-section6 ._tab_item_content').find('._left ._text').html(text);

        $('.js_tab_news').tabs_new();
        $('.h-section6 .pagination_def ').on('click', '.swiper-pagination-bullet', function(e) {
            href = $('._s6_content .swiper-slide-active').find('a').attr('href');
            img = $('._s6_content .swiper-slide-active').find('a').css('background-image');
            text = $('._s6_content .swiper-slide-active').find('a ._text').html();
            $('.h-section6 ._tab_item_content').find('._left').attr('href', href).css('background', img +
                'center no-repeat').fadeIn();
            $('.h-section6 ._tab_item_content').find('._left ._text').html(text);
        });
    });
</script>