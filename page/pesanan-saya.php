<link rel="stylesheet" type="text/css" href="styles/cart.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">


	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/product_background.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="home_content">
				<div class="home_title">Pesanan Saya</div>
				<div class="breadcrumbs">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<li><a href="?">Home</a></li>
						<li>Pesanan Saya</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Cart -->

	<div class="cart_section">
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="cart_container">
							
							<!-- Cart Bar -->
							<div class="cart_bar">
								<ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-start">
									
									<li>Product</li>
									<li></li>
									<li>Tgl Order</li>
									<li>Total Bayar</li>
									<li>Status</li>
								</ul>
							</div>

							<!-- Cart Items -->
							<div class="cart_items">
								<ul class="cart_items_list">

									<!-- Cart Item -->
									<?php 
									$sql = $koneksi->query ("select * from `order` where status != '0' and kd_user='$_SESSION[kd_user]'");
									while ($hasil = $sql->fetch_array()){
									?>
									<li class="cart_item item_list d-flex flex-lg-row align-items-start justify-content-start">
											<div class="product_name" style="color: black;">
												<b>
												<?php 
													$sql2 = $koneksi->query ("select * from order_detail, produk where order_detail.kd_produk=produk.kd_produk and order_detail.no_order='$hasil[no_order]'");
													while ($hasil2 = $sql2->fetch_array()){
												?>
													<?=$hasil2['nama_produk']?> (<?=$hasil2['qty']?>),
													<?php } ?>
												</b>
											</div>
										
										<div class="product_size text-lg-center product_text"></div>
										<div class="product_size text-lg-center product_text"><?=$hasil['tgl_order']?></div>
										<div class="product_size text-lg-center product_text">
											<?=$hasil['total_bayar']?>
										</div>
										<div class="product_size text-lg-center product_text">
											<?php 
												if ($hasil['status'] == '1'){
											?>
											<a href="?page=konfirmasi_pembayaran&no_order=<?=$hasil['no_order']?>" class="btn btn-sm btn-danger">Bayar Sekarang</a>
												<?php }elseif ($hasil['status'] == '2'){ ?>
													<small>Menunggu Validasi</small>
												<?php }else{?>
													<small>Sudah Di validsai</small>
												<?php } ?>
										</div>
									</li>
									<?php } ?>
								</ul>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="section_container cart_extra_container">
			<div class="container">
				<div class="row">

					<div class="col-xxl-6">
						<div class="cart_extra cart_extra_1">
							<div class="cart_extra_content cart_extra_coupon">
								 <div class="cart_extra_title">Coupon code</div>
								<div class="coupon_form_container">
									<form action="#" id="coupon_form" class="coupon_form">
										<input type="text" class="coupon_input" required="required">
										<button class="coupon_button">apply code</button>
									</form>
								</div> 
								 <div class="shipping">
									<div class="cart_extra_title">Shipping Method</div>
									<ul>
										<?php 
											$sql = $koneksi->query ("select * from kurir, detail_kurir where kurir.kd_kurir=detail_kurir.kd_kurir");
											while ($hasil = $sql->fetch_array()){
										?>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_1" name="shipping_radio" class="shipping_radio">
												<span class="radio_mark"></span>
												<span class="radio_text"><?=$hasil['nama_kurir']?> (<?=$hasil['service']?>)</span>
											</label>
											<div class="shipping_price ml-auto">Rp. <?=$hasil['harga']?> </div>
										</li>
										<?php 
											}
										?>
									</ul>
									
								</div> 
							</div>
						</div>
					</div>

					<div class="col-xxl-6">
						<div class="cart_extra cart_extra_2">
							<div class="cart_extra_content cart_extra_total">
								<div class="cart_extra_title">Cart Total</div>
								<ul class="cart_extra_total_list">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Subtotal</div>
										<div class="cart_extra_total_value ml-auto">$29.90</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Shipping</div>
										<div class="cart_extra_total_value ml-auto">Free</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Total</div>
										<div class="cart_extra_total_value ml-auto">$29.90</div>
									</li>
								</ul>
								
							</div>
						</div>
					</div> 
				</div>
			</div>
		</div> -->
	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.3/popper.js"></script>
<script src="styles/bootstrap-4.1.3/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/cart.js"></script>