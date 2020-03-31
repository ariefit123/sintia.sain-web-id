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
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$sql = $koneksi->query ("select * from `order`, user where order.kd_user=user.kd_user and order.status = '3'");
												while ($hasil = $sql->fetch_array()){
											?>
											<tr>
												<td><?=$hasil['tgl_order']?></td>
												<td><?=$hasil['nama_user']?></td>
												<td><?=$hasil['email_user']?></td>
                                                <td><a class="btn btn-sm btn-success">Detail</a></td>
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