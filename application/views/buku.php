	<script src="<?=base_url()?>assets/vendor/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery.dataTables.js"></script>
	<script src="<?=base_url()?>assets/vendor/dataTables.bootstrap.min.js"></script>
<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Data buku</h3>
	</div>
	<div class="panel-body">
		<?php if ($this->session->flashdata('pesan')!=null): ?>
			<div class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<i class="fa fa-times-circle"></i>
				<?=$this->session->flashdata('pesan')?>
			</div>
		<?php endif ?>
		<center><a href="#modalTambah" data-toggle="modal" class="btn btn-success">Tambah</a></center>
		<table 	id="example" class="table">
			<thead>
				<th>Id buku</th>
				<th>Judul buku</th>				
				<th>Tahun</th>
				<th>Harga</th>
				<th>Cover Foto</th>
				<th>Penerbit</th>
				<th>Penulis</th>
				<th>Stok</th>
				<th>Nama Kategori</th>
				<th>Aksi</th>
			</thead>
			<tbody>
				<?php foreach ($tampil_buku as $buku): ?>
					<tr>
						<td><?=$buku->id_buku?> </td>
						<td><?=$buku->judul_buku?> </td>	
						<td><?=$buku->tahun?> </td>	
						<td><?=$buku->harga?> </td>	
						<td><img src="<?=base_url()?>assets/img/<?=$buku->foto_cover?>" style="width: 100px"></td>
						<td><?=$buku->penerbit?> </td>
						<td><?=$buku->penulis?> </td>	
						<td><?=$buku->stok?> </td>	
						<td><?=$buku->nama_kategori?> </td>	
						<td>
							<a href="#edit" onclick="edit(<?=$buku->id_buku?>)" class="btn btn-info" data-toggle="modal">Ubah</a>
							<a href="<?=base_url('index.php/buku/hapus/'.$buku->id_buku)?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<div class="modal fade" id="modalTambah">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span><h4 class="modal-title">Tambah Barang</h4>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?=base_url('index.php/buku/tambah_buku')?>" method="POST" enctype="multipart/form-data">
							<table class="table">
								<tr>
									<td>Judul Buku</td>
									<td><input type="text" name="judul_buku" class="form-control"><br>
								</tr>
									<tr>
										<td>Tahun</td>
										<td><input type="text" name="tahun" class="form-control"><br>
										</tr>
										<tr>
											<td>Harga</td>
											<td><input type="text" name="harga" class="form-control"><br>
											</tr>
											<tr>
												<td>Foto</td>
												<td><input type="file" name="foto_cover" class="form-control"><br>
												</tr>
												<tr>
													<td>Penerbit</td>
													<td><input type="text" name="penerbit" class="form-control"><br>
													</tr>
													<tr>
														<td>Stok</td>
														<td><input type="text" name="stok" class="form-control"><br>
														</tr>
														<tr>
															<td>Penulis</td>
															<td><input type="text" name="penulis" class="form-control"><br>
															</tr>
															<tr>
																<td>Kategori</td>
																<td>
																	<select name="kategori" class="form-control">
																		<?php foreach ($tampil_kategori as $kat): ?>
																			<option value="<?=$kat->id_kategori?>">
																				<?=$kat->nama_kategori?>
																			</option>
																		<?php endforeach ?>
																	</select>
																</td>
															</tr>
															<tr>
																<td><input type="submit" name="simpan" value="simpan" class="btn btn-success"></td>
															</tr>
														</table>
													</form>
												</div>
											</div>	
										</div>	
									</div>
									<div class="modal fade" id="edit">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span><h4 class="modal-title">Edit Barang</h4>
													</button>
												</div>
												<div class="modal-body">
													<form action="<?=base_url('index.php/buku/ubah')?>" method="POST" enctype="multipart/form-data">
														<table class="table">
															<tr>
																<td>Judul Buku</td>
																<td><input id="judul_buku" type="text" name="judul_buku" class="form-control"><br>
																</tr>
																<tr>
																	<td>Tahun</td>
																	<td><input id="tahun" type="text" name="tahun" class="form-control"><br>
																	</tr>
																	<tr>
																		<td>Harga</td>
																		<td><input id="harga" type="text" name="harga" class="form-control"><br>
																		</tr>
																		<tr>
																			<td>Foto</td>
																			<td><input type="file" name="foto_cover" class="form-control"><br>
																			</tr>
																			<tr>
																				<td>Penerbit</td>
																				<td><input id="penerbit" type="text" name="penerbit" class="form-control"><br>
																				</tr>
																				<tr>
																					<td>Stok</td>
																					<td><input id="stok" type="text" name="stok" class="form-control"><br>
																					</tr>
																					<tr>
																						<td>Penulis</td>
																						<td><input id="penulis" type="text" name="penulis" class="form-control"><br>
																						</tr>
																						<tr>
																							<td>Kategori</td>
																							<td>
																								<select name="kategori" class="form-control" id="id_kategori">
																									<?php foreach ($tampil_kategori as $kat): ?>
																										<option value="<?=$kat->id_kategori?>">
																											<?=$kat->nama_kategori?>
																										</option>
																									<?php endforeach ?>
																								</select>
																							</td>
																						</tr>		
																						<input type="hidden" name="id_buku" id="id_buku">
																						<td><input type="submit" name="simpan" value="simpan" class="btn btn-success"></td>
																					</table>
																				</form>
																			</div>
																		</div>	
																	</div>	
																</div>
															</div>
														</div>
														<script type="text/javascript">
															function edit(a) {
																$.ajax({
																	type:"post",
																	url:"<?=base_url()?>index.php/buku/edit_buku/"+a,
																	dataType:"json",
																	success:function(data){
																		$("#id_buku").val(data.id_buku);
																		$("#judul_buku").val(data.judul_buku);
																		$("#tahun").val(data.tahun);
																		$("#harga").val(data.harga);
																		$("#penerbit").val(data.penerbit);
																		$("#penulis").val(data.penulis);
																		$("#stok").val(data.stok);
																		$("#id_kategori").val(data.id_kategori);

																	}
																});
															}
														</script>
														<script type="text/javascript">
															$(document).ready(function(){
																$('#example').DataTable();
															});
														</script>