<?php $questionAbout = get_field('question_about', 'option'); ?>
<?php
  $link_intro=get_field('link_button_intro', 'option');
?>
<section class="h-section4">
	<div class="_decor">
		<img src="<?php echo THEME_ASSETS .'/images/homes/s4_decor.png'; ?>">
	</div>
	<div class="tw_container">
		<div class="_s4_content">
			<img class="_decor_mobi" src="<?php echo THEME_ASSETS .'/images/homes/s4_decor_mobi.png'; ?>">
			<div class="_left" data-aos="fade-right">
				<div class="tw_title">
					<h2><?php _e('Đối tác', 'corex' );?></h2>
					
				</div>
				<!-- <div class="_text_highlight">THƯƠNG HIỆU <span>SỐ 1</span> TẠI NHẬT BẢN</div> -->
				<div class="_exceprt">
					<?php echo $questionAbout['content'] ?>
				</div>
				<a class="_readmore_def" href="<?php echo $link_intro; ?>"><?php _e('Xem tất cả', 'corex' );?></a>
			</div>
			<div class="_right" data-aos="fade-left">
				<div class="tw_title">
					<h2><?php _e('Các đơn vị hợp tác','corex' );?></h2>
				
				</div>
				<div class="swiper-container js_slide_img_s4">
					<div class="swiper-wrapper">
						<?php
							if(!empty($questionAbout['image'])){
								foreach ($questionAbout['image'] as $key => $image) {
									echo '<div class="swiper-slide" style="background-image: url('.$image.');"></div>';
								}
							}
						?>
					</div>
				</div>
				<div class="swiper-pagination pagination_def pagination_s4"></div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	jQuery(document).ready(function($) { 
		var js_slide_img_s4 = new Swiper('.js_slide_img_s4', {
			speed: 1200,
			effect: 'fade',
			autoplay: {
				delay: 1300
			},
			pagination: {
				el: '.pagination_s4',
				clickable: true,
			},
		});
	});
</script>