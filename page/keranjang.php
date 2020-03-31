<link rel="stylesheet" type="text/css" href="styles/cart.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">


	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/product_background.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="home_content">
				<div class="home_title">Keranjang</div>
				<div class="breadcrumbs">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<li><a href="?">Home</a></li>
						<li>Keranjang</li>
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
									<li>Harga</li>
									<li>Quantity</li>
									<li>Atur</li>
								</ul>
							</div>

							<!-- Cart Items -->
							<div class="cart_items">
								<ul class="cart_items_list">

									<!-- Cart Item -->
									<?php 
									$sql = $koneksi->query ("select * from `order`, order_detail, produk where order.no_order=order_detail.no_order and order_detail.kd_produk=produk.kd_produk and order.kd_user='$_SESSION[kd_user]'
									");
									while ($hasil = $sql->fetch_array()){
										$kd_produk = $hasil['kd_produk'];
										$no_order = $hasil['no_order'];
										$total = $hasil['harga'] * $hasil['qty'];
									?>
									<li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
										<div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
											<div><div class="product_image"><img src="images/produk/<?=$hasil['foto']?>" alt=""></div></div>
											<div class="product_name"><a href="?page=produk&kd_produk=<?=$hasil['kd_produk']?>"><?=$hasil['nama_produk']?></a></div>
										</div>
										<div class="product_size text-lg-center product_text"></div>
										<div class="product_price text-lg-center product_text"><span>Harga: </span>Rp. <?=number_format($hasil['harga'])?></div>
										<div class="product_quantity_container">
											<div class="product_quantity ml-lg-auto mr-lg-auto text-center">
												<span class="product_text product_num" id="quantity_<?=$hasil['kd_produk']?>"><?=$hasil['qty']?></span>
												<div class="qty_sub qty_button trans_200 text-center" onclick="kurang('<?=$no_order?>','<?=$kd_produk?>')" ><span>-</span></div>
												<div class="qty_add qty_button trans_200 text-center"  onclick="tambah('<?=$no_order?>','<?=$kd_produk?>')"><span>+</span></div>
											</div>
										</div>
										<div class="product_size text-lg-center product_text"><button class="btn btn-sm btn-danger">Hapus</button></div>
									</li>
									<?php } ?>
								</ul>
							</div>

							<div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
								<div class="cart_buttons_inner ml-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
									<div class="button button_continue trans_200"><a href="?page=checkout&no_order=<?=$no_order?>">Checkout Pesanan</a></div>
								</div>
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

	<script>
		function tambah (param, param2){
			var qty = $('#quantity_'+param2).html();
			var qty2 = (parseInt(qty) + 1);
			var dataString = 'no_order='+param+'&kd_produk='+param2+'&qty='+qty2;
			$.ajax({
					type: "POST",
					url: "post/ubah-keranjang.php",
					data: dataString,
					success: function(jawaban){
						if (jawaban == 'berhasil'){
							document.location.href = '?page=keranjang'
						}else{
							alert ('Gagal');
						}
					}
				});
		}

		function kurang (param, param2){
			var qty = $('#quantity_'+param2).html();
			var qty2 = (parseInt(qty) - 1);
			var dataString = 'no_order='+param+'&kd_produk='+param2+'&qty='+qty2;
			$.ajax({
					type: "POST",
					url: "post/ubah-keranjang.php",
					data: dataString,
					success: function(jawaban){
						if (jawaban == 'berhasil'){
							document.location.href = '?page=keranjang'
						}else{
							alert ('Gagal');
						}
					}
				});
		}

		function checkout (param){
			alert (param);
		}
	</script>
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