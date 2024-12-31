</div><!-- #content -->
<form>
    <?php FormCommon::security(); ?>
</form>

<?php get_template_part( 'template-parts/popup-cart/cart'); ?>
<?php get_template_part( 'template-parts/signin/signin'); ?>
<?php get_template_part( 'template-parts/login/login-popup'); ?>
<?php get_template_part( 'template-parts/popup-order/order-detail' );?>
<?php get_template_part( 'template-parts/quote-price/quote-price-popup' );?>
<?php get_template_part( 'template-parts/chat/subiz' );?>
<footer id="colophon" class="site-footer">
	<?php get_template_part( 'template-parts/footer/footer', 'main' ); ?>
</footer>

</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
