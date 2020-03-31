
<link rel="stylesheet" type="text/css" href="styles/product.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
<!-- Home -->

	<?php 
		$sql = $koneksi->query ("select * from produk inner join kategori on produk.kd_kategori=kategori.kd_kategori where produk.kd_produk='$_GET[kd_produk]'");
		$hasil = $sql->fetch_array();
	?>
	
	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/kategori/<?=$hasil['gambar_kategori']?>" data-speed="0.8"></div>
		<div class="home_container">
			<div class="home_content">
				<div class="home_title">Shop</div>
				<div class="breadcrumbs">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<li><a href="index.html">Home</a></li>
						<li><a href="categories.html"><?=$hasil['nama_kategori']?></a></li>
						<li><?=$hasil['nama_produk']?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="products_bar">
			<div class="section_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="products_bar_content d-flex flex-row align-items-center justify-content-start">
								<div class="product_categories">
									<ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">
										<li class="active"><a href="#">All</a></li>
										<li><a href="#">Hot Products</a></li>
										<li><a href="#">New Products</a></li>
										<li><a href="#">Sale Products</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<!-- Products -->

	<div class="product">

		<!-- Product Content -->
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="product_content_container d-flex flex-lg-row flex-column align-items-start justify-content-start">
							<div class="product_content order-lg-1 order-2">
								<div class="product_content_inner">
									<div class="product_image_row">
										<div class="product_image_3 product_image"><img src="images/produk/<?=$hasil['foto']?>" width="100%" height="500" alt=""></div>
									</div>
									
								</div>
							</div>
							<div class="product_sidebar order-lg-2 order-1">
								<form action="#" id="product_form" class="product_form">
									<div class="product_name"><?=$hasil['nama_produk']?></div>
									<div class="product_price">Rp. <?=number_format($hasil['harga'])?></div>
									
									<button class="cart_button trans_200">+ Keranjang</button>
									<div class="similar_products_button trans_200"><a href="categories.html">see similar products</a></div>
								</form>
								<div class="product_links">
									<ul class="text-center">
										<li><a href="#">See guide</a></li>
										<li><a href="#">Shipping</a></li>
										<li><a href="#">Returns</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	