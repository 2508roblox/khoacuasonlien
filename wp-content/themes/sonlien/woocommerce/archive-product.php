<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header();
$current_term = get_queried_object();
$current_term_id = $current_term->term_id;
$current_term_slug = $current_term->slug;
$termLink = get_term_link($current_term_id);
//query category
$args = array(
    'hide_empty' => 0,
    'taxonomy' => 'product_cat',
    'parent' => $current_term_id
);
$cates = get_categories($args);
$is_active_all = count($cates) !== 0 ? 'is_active' : null;
if (count($cates) == 0) {
    $args = array(
        'hide_empty' => 0,
        'taxonomy' => 'product_cat',
        'parent' => $current_term->parent
    );
    $termLink = get_term_link($current_term->parent);
    $cates = get_categories($args);
}


//query product
$metakey = get_query_var('orderby') ? get_query_var('orderby') : '';
$paged = get_query_var('page') ? get_query_var('page') : 1;
$order = '';
$orderby = '';
switch ($metakey) {
    case 'rating':
        $metakey = 'total_sales';
        $order = 'ASC';
        $orderby = 'meta_value_num';
        break;
    case 'price':
        $metakey = '_regular_price';
        $order = 'ASC';
        $orderby = 'meta_value_num';
        break;
    case 'price_desc':
        $metakey = '_regular_price';
        $order = 'DESC';
        $orderby = 'meta_value_num';
        break;
    default:
        $metakey = '';
        $order = '';
        $orderby = '';
        break;
}
$argsProduct = new WP_Query(array(
    'post_type' => 'product',
    'posts_per_page' => 9,
    'product_cat' => $current_term_slug,
    'meta_key'   => $metakey,
    'orderby'    => $orderby,
    'order'      => $order,
    'paged'          => $paged,
    'post_status'    => 'publish',
));

$argsProduct_all = new WP_Query(array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'product_cat' => $current_term_slug,
    'meta_key'   => $metakey,
    'orderby'    => $orderby,
    'order'      => $order,
    'paged'          => $paged,
    'post_status'    => 'publish',
));
?>
<div class="banner_page" id="banner_page--content">

    <div class="content_all">
        <div class="_title-breadcrumb">
            <div class="_break">
                <p class="__breadcrumbs">
                    <a href="<?php bloginfo('url') ?>">Trang chủ</a>
                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                    <span><?php echo $current_term->name; ?></span>
                </p>
            </div>
            <h1><?php echo $current_term->name; ?></h1>
        </div>
        <div class="_banner" style="background-image: url('<?php echo THEME_ASSETS . '/images/products/banner.png' ?>')"></div>
    </div>
</div>

<div class="products_site">

    <div class="_advantages" id="advantages">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php $advantagesLists = get_field('advantages_lists', 'option'); ?>
                <?php
                if ($advantagesLists) {
                    foreach ($advantagesLists as $key => $advantagesList) {
                        echo '<div class="swiper-slide">
                                    <div class="_icon">
                                        <img src="' . $advantagesList['icon'] . '" alt="">
                                    </div>
                                    <div class="_txt">
                                        ' . $advantagesList['text'] . '
                                    </div>
                                </div>';
                    }
                }
                ?>
            </div>
        </div>
        <div class="swiper-button-next --panigate"><img src="<?php echo THEME_ASSETS . '/images/products/next.png'; ?>" alt=""></div>
        <div class="swiper-button-prev --panigate"><img src="<?php echo THEME_ASSETS . '/images/products/prev.png'; ?>" alt=""></div>
    </div>

    <div class="product_content">
        <div class="content_all">
            <div class="tw_title">
                <div class="tw_container">
                    <h2>danh mục sản phẩm</h2>
                    <h3>chọn thiết bị bạn tìm kiếm</h3>
                </div>
            </div>
            <div class="_products">
                <div class="tw_container">
                    <div class="__content">
                        <div class="__control">
                            <div class="--notification">Có <?php echo $argsProduct_all->post_count; ?> sản phẩm</div>
                            <form action="#" method="GET" class="--filter" id="filter">
                                <p>Sắp xếp theo:</p>
                                <div class="--group">
                                    <input type="radio" name="orderby" class="filter_item" id="popularity" value="rating" <?php echo get_query_var('orderby') == 'rating' ? 'checked' : ''; ?>>
                                    <label for="popularity"><span>Độ ưu chuộng</span><span>Độ ưu chuộng</span></label>
                                </div>
                                <div class="--group">
                                    <input type="radio" name="orderby" class="filter_item" id="price-increase" value="price" <?php echo get_query_var('orderby') == 'price' ? 'checked' : ''; ?>>
                                    <label for="price-increase"><span>Giá tăng dần</span><span>Giá <img src="<?php echo THEME_ASSETS . '/images/products/price.png'; ?>" alt=""></span></label>
                                </div>
                                <div class="--group">
                                    <input type="radio" name="orderby" class="filter_item" id="price-descend" value="price_desc" <?php echo get_query_var('orderby') == 'price_desc' ? 'checked' : ''; ?>>
                                    <label for="price-descend"><span>Giá giảm dần</span><span>Giá <img src="<?php echo THEME_ASSETS . '/images/products/price1.png'; ?>" alt=""></span></label>
                                </div>
                            </form>
                        </div>
                        <div class="__list_product">
                            <?php
                            if ($argsProduct->have_posts()) {
                                while ($argsProduct->have_posts()) {
                                    $argsProduct->the_post();
                                    global $product;
                                    $productID = get_the_ID();
                                    $permailink = get_the_permalink(get_the_ID());
                                    $nameProduct = get_the_title(get_the_ID());
                                    $skuProduct = $product->get_sku(get_the_ID());
                                    $priceProduct = $product->regular_price;
                                    $saleProduct = $product->sale_price;
                                    $price = !$saleProduct ? $priceProduct : $saleProduct;
                                    $featured = $product->featured;
                                    if ($featured == 'yes' && $saleProduct) {
                                        $iconSale = '<img src="' . THEME_ASSETS . "/images/products/hot.png" . '" alt=""></img>';
                                    } elseif ($featured == 'yes' && !$saleProduct) {
                                        $iconSale = '<img src="' . THEME_ASSETS . "/images/products/hot.png" . '" alt=""></img>';
                                    } elseif ($featured == 'no' && $saleProduct) {
                                        $iconSale = '<img src="' . THEME_ASSETS . "/images/products/sale.png" . '" alt=""></img>';
                                    } else {
                                        $iconSale = null;
                                    }
                                    $thumbnailProduct = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                                    $the_excerpt = get_field('excerptProduct');
                            ?>
                                    <div class="--item">
                                        <div class="--info-product">
                                            <a href="<?php echo $permailink; ?>">
                                                <p class="--name"><?php echo $nameProduct; ?></p>
                                                <div class="--image">
                                                    <img src="<?php echo $thumbnailProduct; ?>" alt="">
                                                </div>
                                                <div class="--name_m">
                                                    <span><?php echo $nameProduct; ?></span>
                                                    <span><?php echo $skuProduct; ?></span>
                                                </div>
                                                <div class="--sku"><span><?php echo $skuProduct; ?></span></div>
                                                <div class="--price">
                                                    <p><?php if ($price) {
                                                            echo number_format($price, 0, ',', '.') . '<span>vnd</span>';
                                                        } ?></p>
                                                    <p><?php echo $the_excerpt; ?></p>
                                                </div>

                                                <div class="--even">
                                                    <?php echo $iconSale; ?>
                                                </div>

                                                <div class="--decor">
                                                    <div class="--line"></div>
                                                    <div class="--line"></div>
                                                    <div class="--line"></div>
                                                    <div class="--line"></div>
                                                </div>

                                            </a>
                                        </div>
                                        <div class="--button-control">
                                            <a href="<?php echo '?add-to-cart=' . $productID; ?>" class="add-to-cart" data-product-id="<?php echo $productID; ?>">Mua ngay</a>
                                            <a href="<?php echo $permailink; ?>">Xem chi tiết</a>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="__pagination--main">
                            <?php paginationWoo($argsProduct); ?>
                        </div>

                        <div class="__load--more">Xem thêm kết quả</div>
                    </div>
                </div>
            </div>
            <div class="_category">
                <div class="tw_container">
                    <div class="__list">
                        <?php
                        if (!empty($cates)) {
                            foreach ($cates as $key => $cate) {
                                $catID = $cate->term_id;
                                $is_active = ($catID == $current_term_id) ? "is_active" : "";
                                echo '<a href="' . get_term_link($catID) . '" class="' . $is_active . '">' . $cate->name . '</a>';
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script>
    jQuery(document).ready(function($) {
        var swiperAdvantages = new Swiper('#advantages .swiper-container', {
            slidesPerView: 4,
            spaceBetween: 30,
            simulateTouch: false,
            navigation: {
                nextEl: '#advantages .swiper-button-next',
                prevEl: '#advantages .swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                    simulateTouch: true,
                },
                480: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    simulateTouch: true,
                },
            }
        });

        function value_radio(Element) {
            var value_El;
            for (var i = 0; i < Element.length; i++) {
                if (Element[i].checked === true) {
                    value_El = Element[i].value;
                }
            }
            return value_El;
        }
        var Elorderby = document.getElementsByName("orderby");
        $('#filter').on('change', function(e) {
            var orderby = value_radio(Elorderby);
            $('#filter').submit();
        });
    });
</script>
<?php
get_template_part('template-parts/social/social');
?>
<?php get_footer(); ?>