<div class="home">
		
		<!-- Home Slider -->
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image" style="background-image:url(images/home_slider_1.jpg)"></div>
					<div class="home_content_container">
						<div class="home_content">
							<div class="home_discount d-flex flex-row align-items-end justify-content-start">
								<div class="home_discount_num">20</div>
								<div class="home_discount_text">Discount on the</div>
							</div>
							<div class="home_title">New Collection</div>
							<!-- <div class="button button_1 home_button trans_200"><a href="categories.html">Shop NOW!</a></div> -->
						</div>
					</div>
				</div>

				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image" style="background-image:url(images/home_slider_1.jpg)"></div>
					<div class="home_content_container">
						<div class="home_content">
							<div class="home_discount d-flex flex-row align-items-end justify-content-start">
								<div class="home_discount_num">20</div>
								<div class="home_discount_text">Discount on the</div>
							</div>
							<div class="home_title">New Collection</div>
							<div class="button button_1 home_button trans_200"><a href="categories.html">Shop NOW!</a></div>
						</div>
					</div>
				</div>

				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image" style="background-image:url(images/home_slider_1.jpg)"></div>
					<div class="home_content_container">
						<div class="home_content">
							<div class="home_discount d-flex flex-row align-items-end justify-content-start">
								<div class="home_discount_num">20</div>
								<div class="home_discount_text">Discount on the</div>
							</div>
							<div class="home_title">New Collection</div>
							<div class="button button_1 home_button trans_200"><a href="categories.html">Shop NOW!</a></div>
						</div>
					</div>
				</div>

			</div>
				
			<!-- Home Slider Navigation -->
			<div class="home_slider_nav home_slider_prev trans_200"><div class=" d-flex flex-column align-items-center justify-content-center"><img src="images/prev.png" alt=""></div></div>
			<div class="home_slider_nav home_slider_next trans_200"><div class=" d-flex flex-column align-items-center justify-content-center"><img src="images/next.png" alt=""></div></div>

		</div>
	</div>

	<!-- Boxes -->
	
	<div class="boxes">
		<div class="section_container">
			<div class="container">
				<div class="row">
					
					<?php 
						$sql = $koneksi->query ("select * from kategori");
						while ($hasil = $sql->fetch_array()){
					?>
					<div class="col-lg-4 box_col" style="margin-bottom: 50px;">
						<div class="box">
							<div class="box_image"><img src="images/kategori/<?=$hasil['gambar_kategori']?>" width="100%" height="100" alt=""></div>
							<div class="box_title trans_200"><a href=""><?=$hasil['nama_kategori']?></a></div>
						</div>
					</div>
					<?php 
						}
					?>


				</div>
			</div>
		</div>
	</div>

	<!-- Categories -->

	<div class="categories">
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<div class="categories_list_container">
							<ul class="categories_list d-flex flex-row align-items-center justify-content-start">
								<li><a href="categories.html">new arrivals</a></li>
								<li><a href="categories.html">recommended</a></li>
								<li><a href="categories.html">best sellers</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="products_container grid">
							
							<?php 
								$sql_produk = $koneksi->query ("select * from produk");
								while ($hasil_produk = $sql_produk->fetch_array()){
							?>
							<div class="product grid-item hot">
								<div class="product_inner">
									<div class="product_image">
										<img src="images/produk/<?=$hasil_produk['foto']?>" alt="">
									</div>
									<div class="product_content text-center">
										<div class="product_title"><a href="?page=produk&kd_produk=<?=$hasil_produk['kd_produk']?>"><?=$hasil_produk['nama_produk']?></a></div>
										<div class="product_price">Rp. <?=number_format($hasil_produk['harga'])?></div>
										<div class="product_button ml-auto mr-auto trans_200"><a style="cursor:pointer;" onclick="tambah_keranjang('<?=$hasil_produk[kd_produk]?>')">+ Keranjang</a></div>
									</div>
								</div>	
							</div>
							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/newsletter.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="newsletter_content text-center">
						<div class="newsletter_title_container">
							<div class="newsletter_title">subscribe to our newsletter</div>
							<div class="newsletter_subtitle">we won't spam, we promise!</div>
						</div>
						<div class="newsletter_form_container">
							<form action="#" id="newsletter_form" class="newsletter_form">
								<input type="email" class="newsletter_input" placeholder="your e-mail here" required="required">
								<button class="newsletter_button">submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal" id="modal_notif" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Modal title</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<center><img src='https://firmanindonesia.com/assets/image/logo/success.png' width='150'></center><br><br>
			<center><a class="btn btn-sm btn-success" href="?page=keranjang">Lihat Keranjang</a> <a class="btn btn-sm btn-info" href="">Lanjut Belanja</a></center>
		</div>
		</div>
	</div>
	</div>

	<script>
		function tambah_keranjang(param){
			var kd_user = "<?=$_SESSION['kd_user']?>";

			if (kd_user == ''){
				document.location='login.php';
			}else{
				var dataString = 'kd_produk='+param;
				$.ajax({
					type: "POST",
					url: "post/tambah-keranjang.php",
					data: dataString,
					success: function(jawaban){
						if (jawaban == 'berhasil'){
								$('#modal_notif').modal('show');
						}else{
							alert ('Gagal');
						}
					}
				});
			}
		}
	</script>