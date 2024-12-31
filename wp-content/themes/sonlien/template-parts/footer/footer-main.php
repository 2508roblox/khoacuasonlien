<div class="_ft_top">
	<div class="tw_container">
		<div class="_ft_content">
			<div class="_item">
				<p><span>Hotline </span> <a href="tel:0936191504">0936191504</a></p>
				<p><span>Hotline </span> <a href="tel:0349126473">0349126473</a></p>
				<ul class="_link">
					<li><a href="#">Chính sách bán hàng</a></li>
					<li><a href="#">Điều khoản mua hàng</a></li>
					<li><a href="#">Chính sách bảo mật</a></li>
				</ul>
			</div>
			<div class="_item">
				<!-- <ul class="_link">
					<li><a href="#">Mitsubishi Cleansui</a></li>
					<li><a href="#">Màng lọc sợi rỗng</a></li>
					<li><a href="#">Dự án</a></li>
					<li><a href="http://beta.timevn.com/mitsubishi/category/tin-tuc-mcc/">Tin tức</a></li>
					<li><a href="#">Thiết bị lọc nước</a></li>
					<li><a href="#">Bộ lọc thay thế</a></li>
					<li><a href="#">Dịch vụ</a></li>
					<li><a href="#">Điểm bán hàng</a></li>
					
				</ul> -->
				<?php wp_nav_menu( 
					array( 
						'theme_location' => 'footer-menu', 
						'container' => 'false', 
						'menu_id' => 'footer-menu', 
						'menu_class' => '_link'
					) 
				); ?>
			</div>
			<div class="_item">
				<ul class="_link">
				
					<li><a href="#"><span><img src="<?php echo THEME_ASSETS .'/images/homes/3.png'; ?>" alt=""></span><span>Khóa cửa Sơn Liên</span></a></li>
				</ul>
				<div class="--social">
					<p class="--label">Kết nối với chúng tôi</p>
					<ul class="_link_social">
						<li><a href="<?php home_url()?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="https://www.facebook.com/khoacuasonlien39tb"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
						<li><a href="<?php home_url()?>"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
						<li><a href="<?php home_url()?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="_ft_bottom">
	<div class="tw_container">
		<div class="_ft_content">
			Copyright 2021 Khóa cửa Sơn Liên . All rights severved.
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($) { 
		//js AOS:
		AOS.init({
			duration: 700,
			easing: 'linear',
			disable: 'mobile',
			once: true,
		});
	});
</script>
