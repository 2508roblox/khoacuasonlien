<?php
$argsProduct = new WP_Query(array(
	'post_type' => 'product',
	'posts_per_page' => 9,
));

?>
<section class="h-section3">
    <div class="tw_container">
        <div class="content_all">
            <div class="_slide_view" data-aos="fade-right">
                <div class="swiper-container gallery-top">
                    <div class="swiper-wrapper">
                        <?php
						if ($argsProduct->have_posts()) {
							while ($argsProduct->have_posts()) {
								$argsProduct->the_post();
								$productID = get_the_ID();
								global $product;
								$sku = $product->get_sku($productID);
								$thumbnailProduct = get_the_post_thumbnail_url($productID);
								$name = get_the_title($productID);
								$permailink = get_the_permalink($productID);
								echo '<div class="swiper-slide">
											<a href="' . $permailink . '">
												<div class="--key">' . $sku . '</div>
												<div class="--image"><img src="' . $thumbnailProduct . '" alt=""></div>
												<div class="--name">
													<span>' . $name . '</span>
													<span class="--detail_see">Xem chi tiết</span>
												</div>
											</a>
										</div>';
							}
						}
						?>
                    </div>
                </div>
            </div>
            <div class="_content_sub" data-aos="fade-left">

                <div class="tw_title">
                    <h2>Những sản phẩm tiêu biểu</h2>
                    <h3>Top sale</h3>
                </div>
                <div class="--list_text">
                    <?php
					if ($argsProduct->have_posts()) {
						$i = 0;
						while ($argsProduct->have_posts()) {
							$argsProduct->the_post();
							$productID = get_the_ID();
							$the_Excerpt = get_field('excerptProductHome');
							$is_active = $i == 0 ? 'is_active' : '';
							echo '<div class="--text ' . $is_active . '" data-content-index="' . $i . '">' . $the_Excerpt . '</div>';
							$i++;
						}
					}
					?>
                </div>
            </div>
            <div class="--slide_checked" data-aos="fade-up" data-aos-anchor=".content_all">
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                        <?php
						if ($argsProduct->have_posts()) {
							while ($argsProduct->have_posts()) {
								$argsProduct->the_post();
								$productID = get_the_ID();
								global $product;
								$sku = $product->get_sku($productID);
								$thumbnailProduct = get_the_post_thumbnail_url($productID);
								$name = get_the_title($productID);
								$permailink = get_the_permalink($productID);
								echo '<a href="' . $permailink . '" class="swiper-slide">
											<div class="--key">' . $sku . '</div>
											<div class="--image"><div><img src="' . $thumbnailProduct . '" alt=""></div></div>
											<div class="--name">
												<span>' . $name . '</span>
											</div>
										</a>';
							}
						}
						?>
                    </div>
                </div>
            </div>
            <a href="<?php echo bloginfo('url') . '/cua-hang'; ?>" class="tw_see_all" data-aos="fade-up"
                data-aos-anchor=".content_all">Xem tất cả</a>
            <div class="--control_slide" data-aos="fade-up" data-aos-anchor=".content_all">
                <div class="swiper-button-prev swiper-button-white"><img
                        src="<?php echo THEME_ASSETS . '/images/homes/prev.png'; ?>" alt=""></div>
                <div class="swiper-button-next swiper-button-white"><img
                        src="<?php echo THEME_ASSETS . '/images/homes/next.png'; ?>" alt=""></div>
            </div>
        </div>
    </div>
    <div class="--decor"></div>
</section>
<script type="text/javascript">
jQuery(document).ready(function($) {
    var galleryThumbsS3 = new Swiper('.h-section3 .gallery-thumbs', {
        slidesPerView: 2.5,
        spaceBetween: 24,
        slideToClickedSlide: true,
        slidesPerGroup: 1,
        loop: true,
        loopedSlides: 3,
        speed: 1200,
        autoplay: true,
        reverseDirection: true,
        breakpoints: {
            1024: {
                spaceBetween: 18,
            },
            768: {
                spaceBetween: 25,
                slidesPerView: 1,
            },
            480: {
                spaceBetween: 15,
                slidesPerView: 1,
            }
        }
    });

    var galleryTopS3 = new Swiper('.h-section3 .gallery-top', {
        effect: 'fade',
        loop: true,
        loopedSlides: 3,
        speed: 1200,
        navigation: {
            nextEl: '.h-section3 .swiper-button-next',
            prevEl: '.h-section3 .swiper-button-prev',
        },
    });

    galleryTopS3.controller.control = galleryThumbsS3;
    galleryThumbsS3.controller.control = galleryTopS3;

    galleryTopS3.on('slideChangeTransitionEnd', function() {
        var slideActiveIndex = $('.h-section3 .gallery-top .swiper-slide-active').attr(
            'data-swiper-slide-index');
        var ElContent = $('[data-content-index = "' + slideActiveIndex + '"]');
        $('[data-content-index]').removeClass('is_active');
        $(ElContent).addClass('is_active');
    });
});
</script>