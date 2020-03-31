<link rel="stylesheet" type="text/css" href="styles/checkout.css">
<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">

<?php 
error_reporting(0);
$no_order = $_GET['no_order'];
$sql = $koneksi->query ("select * from `order`, order_detail, user where `order`.no_order=order_detail.no_order and `order`.kd_user=user.kd_user and `order`.no_order='$no_order'");
while ($hasil = $sql->fetch_array()){
	$nama_user = $hasil['nama_user'];
	$no_telp_user = $hasil['no_telp_user'];
	$email_user = $hasil['email_user'];
	$qty 	  = $hasil['qty'];
	$harga 	  = $hasil['harga'];
	$subtotal += $harga * $qty;
}
?>

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/checkout.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="home_content">
				<div class="home_title">Checkout</div>
				<div class="breadcrumbs">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<li><a href="?">Home</a></li>
						<li><a href="?page=keranjang">Keranjang</a></li>
						<li>Checkout</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Checkout -->

	<div class="checkout">
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="checkout_container d-flex flex-xxl-row flex-column align-items-start justify-content-start">
							
							<!-- Billing -->
							<div class="billing checkout_box">
								<div class="checkout_title">Alamat Penerima</div>
								<div class="checkout_form_container">
									<form action="#" id="checkout_form" class="checkout_form">
										<div class="row">
											<div class="col-lg-12">
												<!-- Name -->
												<label for="checkout_name">Nama Penerima*</label>
												<input type="text" id="nama" class="checkout_input" value="<?=$nama_user?>" required="required">
											</div>
										</div>
										
										
										<div>
											<!-- Address -->
											<label for="checkout_address">Alamat Penerima*</label>
											<input type="text" id="alamat" class="checkout_input" required="required">
										</div>
										<div>
											<!-- Phone no -->
											<label for="checkout_phone">No Handphone Penerima*</label>
											<input type="phone" id="hp" class="checkout_input" value="<?=$no_telp_user?>" required="required">
										</div>
									</form>
								</div>
							</div>

							<!-- Cart Total -->
							<div class="cart_total">
								<div class="cart_total_inner checkout_box">
									<div class="checkout_title">Total Keranjang</div>
									<ul class="cart_extra_total_list">
										<li class="d-flex flex-row align-items-center justify-content-start">
											<div class="cart_extra_total_title">Subtotal</div>
											<div class="cart_extra_total_value ml-auto">Rp.<?=number_format($subtotal)?></div>
										</li>
										<li class="d-flex flex-row align-items-center justify-content-start">
											<div class="cart_extra_total_title">Shipping</div>
											<div class="cart_extra_total_value ml-auto">Gratis</div>
										</li>
										<li class="d-flex flex-row align-items-center justify-content-start">
											<div class="cart_extra_total_title">Total</div>
											<div class="cart_extra_total_value ml-auto">Rp.<?=number_format($subtotal)?></div>
										</li>
									</ul>

									<!-- Payment Options -->
									<div class="payment">
										<div class="payment_options">
											<?php 
												$sql2 = $koneksi->query ("select * from bank_transfer");
												while ($hasil2 = $sql2->fetch_array()){
											?>
											<label class="payment_option clearfix">Transfer <?=$hasil2['nama_bank']?>
												<input type="radio" name="radio" id="bank" value="<?=$hasil2['kd_bank']?>">
												<span class="checkmark"></span>
											</label>
											<?php 
												}
											?>
										</div>
									</div>

									<!-- Order Text -->
									<!-- <div class="order_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra temp or so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</div> -->

									<div class="checkout_button trans_200"><a style="cursor: pointer; color:black;" onclick="order()">Order</a></div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		function order (){
			var no_order = '<?=$no_order?>';
			var subtotal = '<?=$subtotal?>';
			var nama = $('#nama').val();
			var alamat = $('#alamat').val();
			var hp = $('#hp').val();
			var bank = $('#bank').val();
			var dataString = 'no_order='+no_order+'&nama='+nama+'&alamat='+alamat+'&hp='+hp+'&bank='+bank+'&subtotal='+subtotal;
			$.ajax({
					type: "POST",
					url: "post/order.php",
					data: dataString,
					success: function(jawaban){
						if (jawaban == 'berhasil'){
							document.location.href = '?page=konfirmasi_pembayaran&no_order='+no_order
						}else{
							alert (jawaban);
						}
					}
				});
		}

	</script>