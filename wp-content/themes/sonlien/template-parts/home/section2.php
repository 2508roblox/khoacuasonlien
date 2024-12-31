<?php
	$Excerpt = get_field('advantages_content', 'option');
	$advantagesLists = get_field('advantages_lists', 'option');
?>
<section class="h-section2">
	<div class="tw_container">
		<div class="content_all">
			<div class="tw_title">
				<h2 data-aos="fade-right"><?php _e('Khóa cửa liên sơn 39 Thuốc Bắc', 'corex' );?></h2>
				<h3 data-aos="fade-left">Hân hạnh phục vụ quý khách</h3>
			</div>
			<p class="_excerpt" data-aos="fade-up"><?php echo $Excerpt; ?></p>
			<div class="_list__item">
				<?php
					if($advantagesLists){
						$i = 0;
						foreach ($advantagesLists as $key => $advantagesList) {
							$i++;
							echo '<div class="__item" data-aos="zoom-in" data-aos-delay="'. $i*300 .'">
									<div class="--icon">
										<img src="'.$advantagesList['icon'].'" alt="">
									</div>
									<div class="--txt">'.$advantagesList['text'].'</div>
								</div>';
						}
					}
				?>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	jQuery(document).ready(function($) { 
		
	});
</script>