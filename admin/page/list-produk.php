<div class="row">
						<div class="col-md-12">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-heading">
                                    <a class="btn btn-sm btn-success pull-right" href="?page=tambah-produk">Tambah</a>
									<h3 class="panel-title">List Produk</h3>
								</div>
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>#Kode Produk</th>
												<th>Nama Produk</th>
												<th>Kategori</th>
                                                <th>Harga</th>
                                                <!-- <th>Aksi</th> -->
											</tr>
										</thead>
										<tbody>
											<?php 
												$sql = $koneksi->query ("select * from produk, kategori where produk.kd_kategori=kategori.kd_kategori");
												while ($hasil = $sql->fetch_array()){
											?>
											<tr>
												<td><?=$hasil['kd_produk']?></td>
												<td><?=$hasil['nama_produk']?></td>
												<td><?=$hasil['nama_kategori']?></td>
                                                <td>Rp. <?=$hasil['harga']?></td>
                                                <!-- <td><a class="btn btn-sm btn-info">Ubah</a> <a class="btn btn-sm btn-danger">Hapus</a></td> -->
											</tr>
												<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- END BASIC TABLE -->
						</div>
						
					</div>