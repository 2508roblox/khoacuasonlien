<?php
	$bannerContents = get_field('banner_content', 'option');
?>
<section class="h-section1">
	<div class="swiper-container js--banner_slide">
		<div class="swiper-wrapper">

			<?php if($bannerContents): $i = 0; ?> 
				<?php foreach ($bannerContents as $key => $bannerContent): $i++; ?>
					<div class="swiper-slide">
						<div class="_left" style="padding-bottom: 27rem;    font-family: Arial, sans-serif !important;">
							<div class="--content" data-aos="fade-right">
								<h2 style="    font-family: Arial, sans-serif !important; font-weight: bold;"><?php echo $bannerContent['title']; ?></h2>
								<p style="    font-family: Arial, sans-serif !important; font-weight: bold;"><?php echo $bannerContent['sku']; ?></p>
							</div>
						</div>
						<div class="_right" data-aos="fade-left">
							<a href="<?php echo $bannerContent['links_banner'];?>"><div class="_banner" style="background-image: url('<?php echo $bannerContent['image']; ?>');">
								<p><?php echo $bannerContent['content']; ?></p>
							</div>
							</a>
						</div>
						<div class="_video" data-aos="fade-right">
							<a data-fancybox href="<?php echo $bannerContent['video']['url_video']; ?>">
								<div class="__thumbnail" style="background-image: url('<?php echo $bannerContent['video']['postter']; ?>');">
									<img src="<?php echo THEME_ASSETS .'/images/homes/play.png'; ?>" alt="">
								</div>
								<div class="__title">
									<div class="--content">
										<p class="--number"><?php echo $i > 10 ? $i : '0'.$i.''; ?></p>
										<p class="--txt"><?php echo $bannerContent['video']['title']; ?></p>
									</div>
								</div>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="swiper-pagination" data-aos="fade-up" data-aos-anchor=".js--banner_slide"></div>
	</div>
</section>
<script type="text/javascript">
	jQuery(document).ready(function($) { 
		var swiperBanner = new Swiper('.js--banner_slide.swiper-container', {
			speed: 1900,
			loop: true,
			effect: 'fade',
			autoplay: {
				delay: 1800,
			},
			pagination: {
				el: '.js--banner_slide .swiper-pagination',
				clickable: true,
			},
		});

	});
</script>