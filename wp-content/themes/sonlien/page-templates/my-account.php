<?php
    // Template Name: My Account
    get_header();
    $imageBanner = get_field('banner_about', 'option');
    $questionAbout = get_field('question_about', 'option');
    $about = get_field('about', 'option');
    $mlsrAbout = get_field('mlsr_about', 'option');
    $mccAbout = get_field('mcc_about','option');
    $networkAbout = get_field('network_about', 'option');
    $certificationAbout = get_field('certification_about', 'option');
?>
<div class="banner_page my-account" id="banner_page--content">
    <div class="content_all">
        <div class="_title-breadcrumb my_account">
            <div class="_break">
                <p class="__breadcrumbs">
                    <a href="<?php echo bloginfo('url'); ?>">Trang chủ</a>
                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                    <span>Tài khoản của tôi</span>
                </p>
            </div>
            <h1>Tài khoản của tôi</h1>
        </div>
        <!-- <div class="_banner" style="background-image: url('<?php echo $imageBanner; ?>')"></div> -->
    </div>
</div>
<div class="_section_my_account">
  <div class="tw_container">
        <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
        <?php endwhile;?>
  </div>
</div>
<script type="text/javascript"></script>
<script src="<?php echo THEME_ASSETS .'/js/Swiper/scripts/pagination.min.js'; ?>"></script>
<?php
    get_template_part( 'template-parts/social/social' );
    get_footer();
?>
