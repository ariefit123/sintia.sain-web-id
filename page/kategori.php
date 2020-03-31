<link rel="stylesheet" type="text/css" href="styles/categories.css">
<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">

<?php 
	$sql = $koneksi->query ("select * from produk inner join kategori on produk.kd_kategori=kategori.kd_kategori where kategori.kd_kategori='$_GET[kd_kategori]'");
	$hasil = $sql->fetch_array();
?>
	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/kategori/<?=$hasil['gambar_kategori']?>" data-speed="0.8"></div>
		<div class="home_container">
			<div class="home_content">
				<div class="home_title" style="color: white;">Shop</div>
				<div class="breadcrumbs">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<li style="color: white;"><a style="color: white;" href="?">Home</a></li>
						<li><a style="color: white;">Kategori</a></li>
						<li style="color: white;"><?=$hasil['nama_kategori']?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">

		<!-- Sorting & Filtering -->
		<div class="products_bar">
			<div class="section_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="products_bar_content d-flex flex-column flex-xxl-row align-items-start align-items-xxl-center justify-content-start">
								<div class="products_bar_side ml-xxl-auto d-flex flex-row align-items-center justify-content-start">
									<div class="products_dropdown product_dropdown_sorting">
										<div class="isotope_sorting_text"><span>Default Sorting</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
										<ul>
											<li class="item_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'>Default</li>
											<li class="item_sorting_btn" data-isotope-option='{ "sortBy": "price" }'>Price</li>
											<li class="item_sorting_btn" data-isotope-option='{ "sortBy": "name" }'>Name</li>
										</ul>
									</div>
									<div class="product_view d-flex flex-row align-items-center justify-content-start">
										<div class="view_item active"><img src="images/view_1.png" alt=""></div>
										<div class="view_item"><img src="images/view_2.png" alt=""></div>
										<div class="view_item"><img src="images/view_3.png" alt=""></div>
									</div>
									<div class="products_dropdown text-right product_dropdown_filter">
										<div class="isotope_filter_text"><span>Filter</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
										<ul>
											<li class="item_filter_btn" data-filter="*">All</li>
											<li class="item_filter_btn" data-filter=".hot">Hot</li>
											<li class="item_filter_btn" data-filter=".new">New</li>
											<li class="item_filter_btn" data-filter=".sale">Sale</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="products_container grid">
							
							<?php 
								$sql_produk = $koneksi->query ("select * from produk where kd_kategori='$_GET[kd_kategori]'");
								while ($hasil_produk = $sql_produk->fetch_array()){
							?>
							<!-- Product -->
							<div class="product grid-item hot">
								<div class="product_inner">
									<div class="product_image">
										<img src="images/produk/<?=$hasil_produk['foto']?>" alt="">
									</div>
									<div class="product_content text-center">
										<div class="product_title"><a href="?page=produk&kd_produk=<?=$hasil_produk['kd_produk']?>"><?=$hasil_produk['nama_produk']?></a></div>
										<div class="product_price">Rp. <?=number_format($hasil_produk['harga'])?></div>
										<div class="product_button ml-auto mr-auto trans_200"><a href="#">+ Keranjang</a></div>
									</div>
								</div>	
							</div>
							<?php 
								}
							?>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>