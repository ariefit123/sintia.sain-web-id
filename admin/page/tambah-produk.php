<?php
		 if (isset($_POST['simpan'])){
		 $query = "SELECT max(kd_produk) AS last FROM `produk`";
		 $hasil1 = $koneksi->query($query);
		 $data  = $hasil1->fetch_array();
		 $lastNoTransaksi = $data['last'];
		 $lastNoUrut = substr($lastNoTransaksi, 3, 3);
		 $nextNoUrut = $lastNoUrut + 1;
		 $kd_produk = "PK".sprintf('%03s', $nextNoUrut);

		 $nama_produk       =   $_POST['nama_produk'];
		 $harga      		 =   $_POST['harga'];
		 $stok      		 =   $_POST['stok'];
		 $kd_kategori       =   $_POST['kategori'];

		 $nama_file = $_FILES['gambar']['name'];
		 $tmp_file = $_FILES['gambar']['tmp_name'];
		 // Set path folder tempat menyimpan gambarnya
		 $path = "../images/produk/".$nama_file;
		  // Simpan ke Database
		  // Simpan di Folder Gambar
		  if(move_uploaded_file($tmp_file, $path)){ 
			$query = $koneksi->query ("insert into produk (kd_produk, nama_produk, harga, stok, kd_kategori, foto) values ('$kd_produk','$nama_produk','$harga','$stok','$kd_kategori','$nama_file')");
			if($query){
			?>
			  <script type="text/javascript">
				window.alert("Telah di tambahkan data Produk");
				window.location = "?page=list-produk";
			  </script>
			<?php
			}else{
			  ?>
			  <script type="text/javascript">
				window.alert("Gagal");
				window.history.go(-1);
			  </script>
			  <?php
			}
		  }else{
			?>
			<script type="text/javascript">
				window.alert("Gambar gagal diupload");
				window.history.go(-1);
			  </script>
			<?php
			}
		}
		?>
<div class="row">
						<div class="col-md-12">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Tambah Produk</h3>
								</div>
								<div class="panel-body">
								<form class="form-horizontal" name="form"  method="post" action="#" enctype="multipart/form-data">
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Nama Produk</label>
										<div class="col-sm-10">
										<input type="text" name="nama_produk" class="form-control" id="inputEmail3" placeholder="Nama Produk">
										</div>
									</div>
									<div class="form-group">
										<label for="inputPassword3" class="col-sm-2 control-label">Kategori</label>
										<div class="col-sm-10">
											<select class="form-control" name="kategori">
												<option>-- Pilih Kategori --</option>
												<!-- looping data provinsi -->
												<?php
												$sql="select * from kategori";	
												$q=$koneksi->query($sql);
												while($data=$q->fetch_array()){
													$kd_kategori = $data['kd_kategori'];
												?>
													<option value="<?php echo $data["kd_kategori"] ?>"><?php echo $data["nama_kategori"] ?></option>
											
												<?php
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Harga Produk</label>
										<div class="col-sm-10">
										<input type="text" name="harga" class="form-control" id="inputEmail3" placeholder="Harga Produk">
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Stok Produk</label>
										<div class="col-sm-10">
										<input type="text" name="stok" class="form-control" id="inputEmail3" placeholder="Stok Produk">
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">Foto Produk</label>
										<div class="col-sm-10">
										<input name="gambar" type="file" class="form-control" id="inputEmail3" placeholder="Email">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
										<input type="submit" name="simpan" value="Simpan">
										</div>
									</div>
									</form>
								</div>
							</div>
							<!-- END BASIC TABLE -->
						</div>
						
					</div>