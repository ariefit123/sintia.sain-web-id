<div class="row">
						<div class="col-md-12">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Pesanan Masuk</h3>
								</div>
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>Tanggal Order</th>
												<th>Nama Pembeli</th>
												<th>Email Pembeli</th>
                                                <th>Bukti</th>
                                                <th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$sql = $koneksi->query ("select * from `order`, user where order.kd_user=user.kd_user and order.status = '2'");
												while ($hasil = $sql->fetch_array()){
											?>
											<tr>
												<td><?=$hasil['tgl_order']?></td>
												<td><?=$hasil['nama_user']?></td>
												<td><?=$hasil['email_user']?></td>
                                                <td> <a class="btn btn-sm btn-success" href="../images/bukti/<?=$hasil['bukti']?>" target="_blank">Lihat Bukti</a></td>
                                                <td><a class="btn btn-sm btn-info"  onclick="validasi('<?=$hasil['no_order']?>')">Konfirmasi Pembayaran</a></td>
											</tr>
											<?php 
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- END BASIC TABLE -->
						</div>
						
					</div>

					<script>
						function validasi(no_order){
							var dataString = 'no_order='+no_order;
							$.ajax({
								type: "POST",
								url: "page/val-pembayaran.php",
								data: dataString,
								success: function(jawaban){
									if (jawaban == 'berhasil'){
											alert ('berhasil Validasi pembayaran')
									}else{
										alert (jawaban);
									}
									}
							});
						}
					</script>