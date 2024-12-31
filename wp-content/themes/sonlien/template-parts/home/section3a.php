<?php
$argsProduct = new WP_Query(array(
    'post_type' => 'product',
    'posts_per_page' => 9,
    'offset' => 9,
));

?>
<section class="h-section3a">
    <div class="tw_container">
        <div class="content_all">
            <?php $date = getdate(); ?>
            <div class="tw_title">
                <h2>Những sản phẩm bán chạy nhất <?php echo "Tháng: " . $date['mon'] . "<hr>"; ?></h2>

            </div>
            <div class="--slide_checked2" data-aos="fade-up" data-aos-anchor=".content_all">


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
                        $hot = get_field('excerptProductHome');

                        echo '<a href="' . $permailink . '" class="_slide">
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
            <a href="<?php echo bloginfo('url') . '/cua-hang'; ?>" class="tw_see_all" data-aos="fade-up"
                data-aos-anchor=".content_all">Xem tất cả</a>

        </div>
    </div>
    <div class="--decor"></div>
</section>
<script type="text/javascript">

</script>