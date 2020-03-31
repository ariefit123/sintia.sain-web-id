<link rel="stylesheet" type="text/css" href="styles/checkout.css">
<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">

<?php 
error_reporting(0);
$no_order = $_GET['no_order'];
$sql = $koneksi->query ("select * from `order`, bank_transfer where `order`.pembayaran=bank_transfer.kd_bank and `order`.no_order='$no_order'");
$hasil = $sql->fetch_array();
?>

	<div class="checkout">
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="checkout_container d-flex flex-xxl-row flex-column align-items-start justify-content-start">
							
							<!-- Billing -->
							<div class="billing checkout_box">
								<div class="checkout_title">Konfirmasi pembayaran</div>
								<div class="checkout_form_container">
									<form method="post" action="#" enctype="multipart/form-data">
										<div class="row">
											<div class="col-lg-12">
												<!-- Name -->
												<label for="checkout_name">* Silahkan Transfer ke Rekening <?=$hasil['nama_bank']?> - <?=$hasil['no_rek']?> atas nama <?=$hasil['nama_rekening']?>, Lalu upload Bukti transfer pada form dibawah ini.</label>
											</div>
										</div>
										
										
										<div>
											<!-- Address -->
											<label for="checkout_address">Bukti Transfer*</label>
											<input type="file" id="gambar" name="gambar" class="checkout_input" required="required">
										</div>
										<div style="margin-top: 10px;">
											
											<button type="submit" name="upload" value="upload" class="btn btn-info btn-lg">Upload</button>
										</div>
									</form>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php 
			  $no_order = $_GET['no_order'];
              $nama_file = $_FILES['gambar']['name'];
              $tmp_file = $_FILES['gambar']['tmp_name'];
              // Set path folder tempat menyimpan gambarnya
              $path = "images/bukti/".$nama_file;
                  
              $simpan  =  $_POST['upload'];

              if($simpan){ 
              if(move_uploaded_file($tmp_file, $path)){ 
                $query = $koneksi->query ("update `order` set bukti='$nama_file', status='2' where no_order='$no_order'");
                if($query){
                ?>
                  <script type="text/javascript">
                    window.alert("Sudah Upload Bukti, Silahkan tunggu Konfirmasi");
                    window.location = "?";
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
							document.location.href = '?page=konfirmasi_pembayaran'
						}else{
							alert (jawaban);
						}
					}
				});
		}

	</script>