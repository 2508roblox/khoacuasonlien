<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">

	<?php
		$order_key = $_GET['key'];
		$order_id = wc_get_order_id_by_order_key($order_key);
		$order = wc_get_order($order_id);
		$city = $order->get_billing_city();
		$state = $order->get_shipping_state();
	     if ( $order ) :
		 do_action( 'woocommerce_before_thankyou', $order->get_id() );
	?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<!-- <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul> -->

		<?php endif; ?>

			<?php // do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
			<?php // do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
		 <!-- Template -->
		<div class="order_checkout">	
				<div class="content_order">
					<div class="row_header">
						<div class="title">
							<h3>Giỏ hàng</h3>
						</div>
					</div>
					<div class="row_product_list">
						<?php
							foreach ( $order->get_items() as $item_id => $item ) {
								$product = $item->get_product();
								?>
								<div class="product_item">
										<div class="box-image">
												<img src="<?php echo get_the_post_thumbnail_url($product->id); ?>" alt="">
										</div>
										<div class="box-text">
											<h3><?php echo $product->name;?></h3>
											<p class="product_code"><?php echo $product->sku; ?></p>
										</div>
										<div class="box-cost">
												<span class="amout"><?php echo $item->get_quantity();  ?></span>
												<span class="mul"> x </span>
												<span class="price"><?php echo number_format($product->price,0,",","."); ?>VND</span>
								 		</div>
								  </div>
								<?php
							}
						?>
					</div>
					<div class="row_total">
						<div class="discount">
							<span>Mã Giảm giá</span>
							<span>N/A</span>
						</div>
						<div class="ship">
							<span>Giao hàng</span>
							<span >Miễn phí</span>
						</div>
						<hr>
						<div class="total">
							<span>Tổng đơn hàng</span>
							<span class="total_price"><?php echo number_format($order->total,0,",","."); ?>VND</span>
						</div>
					</div>
					<div class="row_information_customer">
						<div class="address">
							<h3>Địa chỉ giao hàng</h3>
							<p> <?php echo wp_kses_post( $order->get_formatted_shipping_address( esc_html__( 'N/A', 'woocommerce' ) ) );?></p>
						</div>
						<div class="method">
							<div class="pay_method">
									<h3>Phương thức giao hàng</h3>
									<p>Giao hàng tiêu chuẩn <br>
										<small>trong vòng 3 - 9 ngày làm việc</small>
										</p>
										<span class="free">Miễn phí</span>
							</div>
							<div class="delivery_method">
									<h3>Phương thức thanh toán</h3>
									<p><?php echo $order->get_payment_method_title();?><br>
									<small>có các chữ số cuối là **45 </small>
									</p>
							</div> 
						</div>
					</div>
				</div>
		</div>
	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div>
