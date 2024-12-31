<?php
    get_header();
    $current_Tag = get_queried_object();
    $tagID = $current_Tag->term_id;
    $postsTag = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'tag_id'         => $tagID
    ));
    $post__not_in = array();
    $tags = get_tags(array('hide_empty' => false));
?>
<div class="post_tags">
    <div class="tw_container">
        <div class="content_all">
            <div class="_breadcrumbs">
                <a href="<?php echo bloginfo('url'); ?>">Trang chủ</a>
                <i class="fa fa-caret-right" aria-hidden="true"></i>
                <span>Tìm kiếm</span>
                <i class="fa fa-caret-right" aria-hidden="true"></i>
                <span>"<?php echo $current_Tag->name; ?>"</span>
            </div>
            <p class="_message">kết quả tìm kiếm cho từ khóa <br>“<?php echo $current_Tag->name; ?>”</p>

            <div class="_content_site">
                <div class="__left">
                    <?php
                        if($postsTag->have_posts(  )){
                            while ($postsTag->have_posts(  )) {
                                $postsTag->the_post(  );
                                $postID = get_the_ID(  );
                                $permalink = get_the_permalink($postID);
                                $thumbnail = get_the_post_thumbnail_url($postID, 'full');
                                $title = get_the_title($postID);
                                $date = get_the_time( 'd/m/Y', $postID);
                                array_push($post__not_in, $postID);
                                echo '<a href="'.$permalink.'">
                                    <div class="-image">
                                        <div style="background-image: url('.$thumbnail.')">
                                            <img src="'.$thumbnail.'" alt="">
                                        </div>
                                    </div>
                                    <div class="-text">
                                        <time><img src="'.THEME_ASSETS .'/images/news/clock.png'.'" alt=""> <span>'.$date.'</span></time>
                                        <h3>'.$title.'</h3>
                                        <p>Xem chi tiết</p>
                                    </div>
                                </a>';
                            }
                        }
                    ?>
                </div>
                <div class="__right">
                    <div class="-item">
                        <div class="--title">Tin liên quan</div>
                        <div class="--border-box">
                            <div class="--list-related">
                                <?php
                                    $postsRelated = new WP_Query(array(
                                        'post_type'      => 'post',
                                        'posts_per_page' => -1,
                                        'post_status'    => 'publish',
                                        'post__not_in'   => $post__not_in
                                    ));
                                    if($postsRelated->have_posts(  )){
                                        while ($postsRelated->have_posts(  )) {
                                            $postsRelated->the_post(  );
                                            $postID = get_the_ID(  );
                                            $title = get_the_title($postID);
                                            echo '<p>
                                                    <a href="#">'.$title.'</a>
                                                </p>';
                                        }
                                    }else{
                                        echo '<p>không có bài viết nào!</p>';
                                    }
                                ?>
                            </div>
                            <a href="<?php echo bloginfo('url').'/tin-tuc'; ?>" class="--see-more">Xem tất cả</a>
                        </div>
                    </div>
                    <div class="-item">
                        <div class="--title">Tags</div>
                        <div class="--border-box">
                            <div class="--list-tags">
                                <?php if(!empty($tags)){
                                    foreach ($tags as $key => $tag) {
                                        echo '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_template_part( 'template-parts/social/social' );
    get_footer();
?>