<?php
    $hotline = get_field('hotline','option');
?>
<div class="social_all" data-aos="fade-up" data-aos-anchor="#header-main">
    <div class="tw_container">
        <div class="content_all">
            <a href="#" class="quote-price" download>
                <span><img src="<?php echo THEME_ASSETS . '/images/homes/document.png'; ?>" alt=""></span>
                <span>tải tất cả <strong>báo giá</strong></span>
                <span>Tải báo giá</span>
            </a>
            <a href="<?php echo $hotline?'tel:'.$hotline:'javascript:void(0)'; ?>" download>
                <span><img src="<?php echo THEME_ASSETS . '/images/homes/phone.png'; ?>" alt=""></span>
                <span>hotline <strong><?php echo $hotline; ?></strong> (miễn phí)</span>
                <span>Gọi hotline</span>
            </a>
            <a href="<?php bloginfo('url'); ?>" onclick="" class="chat-sobiz">
                <span><img src="<?php echo THEME_ASSETS . '/images/homes/chat.png'; ?>" alt=""></span>
                <span>Quay về <strong>Trang chủ</strong></span>
                <span>Trang chủ</span>
            </a>
        </div>
    </div>
</div>