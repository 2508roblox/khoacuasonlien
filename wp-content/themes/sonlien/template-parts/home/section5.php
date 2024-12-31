


	<?php $home_project_slide = get_field('home_project_slide', 'option'); ?>

<section class="h-section5">
	<img class="_decor" src="<?php echo THEME_ASSETS .'/images/homes/s5_decor.png'; ?>">
	<div class="tw_container">
		<div class="_s5_content">
			<div class="tw_title">
				<h2 data-aos="fade-right"><?php _e('dự án sử dụng', 'corex' );?></h2>
				<h3 data-aos="fade-left">khoa cửa Sơn Liên</h3>
			</div>
			<div class="swiper-container js_slide_project_s5" data-aos="fade-up">
				<div class="swiper-wrapper">

<?php if (!empty($home_project_slide)) : ?>

					<?php foreach ($home_project_slide as $key => $value) : ?>
					<div class="swiper-slide">
						<div class="_img" style="background-image: url('<?php echo $value['img'] ?>');">
							<div class="_text"><?php echo $value['title'] ?></div>
						</div>
						<a class="_content" href="<?php echo $value['link'] ?>">
							<div class="_text"><?php echo $value['title'] ?></div>
							<div class="_seemore"><?php _e('Xem chi tiết', 'corex' );?></div>
						</a>
					</div>
					

					<?php endforeach ?>
				<?php endif ?>

				</div>
				<div class="swiper-button-prev"><img src="<?php echo THEME_ASSETS .'/images/homes/btn-prev.png'; ?>"></div>
	    		<div class="swiper-button-next"><img src="<?php echo THEME_ASSETS .'/images/homes/btn-next.png'; ?>"></div>
			</div>
			<a class="_readmore_def" href="<?php echo bloginfo('url').'/du-an';?>">Xem tất cả</a>
		</div>
	</div>
</section>
<script type="text/javascript">
	jQuery(document).ready(function($) { 
		var js_slide_project_s5 = new Swiper('.js_slide_project_s5', {
			speed: 3000,
			effect: 'coverflow',
		    grabCursor: true,
		    centeredSlides: true,
		    slidesPerView: 1.7,
		    loop: true,
		    spaceBetween: 65,
			autoplay: {
				delay: 3000
			},
		    coverflowEffect: {
		        rotate: 0,
		        stretch: 0,
		        depth: 0,
		        modifier: 0,
		        slideShadows : true,
		    },
			navigation: {
			    nextEl: '.js_slide_project_s5 .swiper-button-next',
			    prevEl: '.js_slide_project_s5 .swiper-button-prev',
			},
			breakpoints: {
			    768: {
			      slidesPerView: 1,
			      spaceBetween: 10
			    },
			    1024: {
			      spaceBetween: 35,
			    }
			}
		});
	});
</script>