<?php
get_header();
if (have_posts()) : while (have_posts()) : the_post();
        $postID = get_the_ID();
        $titleArticle = get_the_title($postID);
        $timeArticle = get_the_time('d/m/Y', $postID);
        $contentArticle = get_the_content($postID);
        $post__not_in = array();
        array_push($post__not_in, $postID);
        $cat = get_the_category($postID);

        $contentArticle = apply_filters('the_content', $contentArticle);
        $contentArticle = str_replace(']]>', ']]&gt;', $contentArticle);

        $cat_news = get_categories(array(
            'taxonomy' => 'category',
            'hide_empty' => 0,
            'order' => 'ASC',
            'orderby' => 'id'
        ));

        $tags = get_tags(array('hide_empty' => false));

        $getPost = new WP_Query(array(
            'post_type'      => 'post',
            'posts_per_page' => -1,
            'post__not_in'   => $post__not_in,
            'post_status'    => 'publish',
            'cat'            => $cat[0]->term_id,
        ));

        $postHotNewsID = array();
        $postOtherNewsID = array();
        if ($getPost->have_posts()) {
            while ($getPost->have_posts()) {
                $getPost->the_post();
                $postsID = get_the_ID();
                $news_is_hot = get_field('hot_news');
                if (count($news_is_hot) !== 0) {
                    array_push($postHotNewsID, $postsID);
                } else {
                    array_push($postOtherNewsID, $postsID);
                }
            }
        }
        // var_dump($postHotNewsID);
?>
        <?php var_dump($tags) ?>
        <div class="news_detail">
            <div class="tw_container">
                <div class="content_all">
                    <a href="<?php echo get_term_link($cat[0]->term_id); ?>" class="_back"><i class="fa fa-caret-left" aria-hidden="true"></i><span>Quay lại Danh sách tin tức</span></a>
                    <div class="_box">
                        <div class="__left">
                            <h1><?php echo $titleArticle; ?></h1>
                            <time><img src="<?php echo THEME_ASSETS . '/images/news/clock.png'; ?>" alt=""> <span><?php echo $timeArticle; ?></span></time>
                            <div class="--the-content">
                                <?php echo $contentArticle; ?>
                            </div>

                            <div class="_other">
                                <p class="__title">Có thể bạn quan tâm</p>
                                <div class="__list">
                                    <?php
                                    if (isset($postOtherNewsID)) {
                                        $i = 0;
                                        foreach ($postOtherNewsID as $key => $otherNewsID) {
                                            $permalink = get_the_permalink($otherNewsID);
                                            $thumbnail = get_the_post_thumbnail_url($otherNewsID, 'full');
                                            $title = get_the_title($otherNewsID);
                                            $time = get_the_time('d/m/Y', $otherNewsID);
                                            echo '<a href="' . $permalink . '">
                                                <div class="-image">
                                                    <div class="--img" style="background-image: url(' . $thumbnail . ');">
                                                        <img src="' . $thumbnail . '" alt="">
                                                    </div>
                                                </div>
                                                <div class="-text">
                                                    <time><img src="' . THEME_ASSETS . '/images/news/clock.png' . '" alt=""> <span>' . $time . '</span></time>
                                                    <p>' . $title . '</p>
                                                </div>
                                            </a>';
                                            $i++;
                                            if ($i > 2) {
                                                break;
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="_load_more">
                                    Xem thêm
                                </div>
                            </div>
                        </div>
                        <div class="__right">
                            <div class="-item">
                                <p class="--title">Bài viết nổi bật</p>
                                <div class="--list">
                                    <?php
                                    if (isset($postHotNewsID)) {
                                        $i = 0;
                                        foreach ($postHotNewsID as $key => $HotNewsID) {
                                            $permalink = get_the_permalink($HotNewsID);
                                            $thumbnail = get_the_post_thumbnail_url($HotNewsID, 'full');
                                            $title = get_the_title($HotNewsID);
                                            echo '<a href="' . $permalink . '">
                                                <div class="--image" style="background-image: url(' . $thumbnail . ');"></div>
                                                <div class="--txt">
                                                    ' . $title . '
                                                </div>
                                            </a>';
                                            $i++;
                                            if ($i > 2) {
                                                break;
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="-item">
                                <p class="--title">chuyên mục</p>
                                <ul class="_cat">
                                    <?php
                                    if (isset($cat_news)) {
                                        foreach ($cat_news as $key => $cat) {
                                            echo '<li><img src="' . THEME_ASSETS . '/images/news/cat.png' . '" alt=""><a href="' . get_term_link($cat->term_id) . '">' . $cat->name . '</a></li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="-item">
                                <p class="--title">tags</p>
                                <div class="_tags">
                                    <?php if (!empty($tags)) {
                                        foreach ($tags as $key => $tag) {
                                            echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                                        }
                                    } ?>
                                </div>
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
get_template_part('template-parts/social/social');
get_footer();
?>