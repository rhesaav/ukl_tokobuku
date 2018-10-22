<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Data kasir</h3>
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
		<table class="table">
			<thead>
				<th>Id kasir</th>
				<th>Nama kasir</th>
				<th>Password</th>
				<th>Level</th>
				<th>Aksi</th>
			</thead>
			<tbody>
				<?php foreach ($tampil_kasir as $kas): ?>
					<tr>
						<td><?=$kas->id_kasir?> </td>
						<td><?=$kas->nama_kasir?> </td>
						<td><?=$kas->password?> </td>
						<th><?=$kas->level?></th>
						<td>
							<a href="#edit" onclick="edit(<?=$kas->id_kasir?>)" class="btn btn-info" data-toggle="modal">Ubah</a>
							<a href="<?=base_url('index.php/kasir/hapus/'.$kas->id_kasir)?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
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
				<form action="<?=base_url('index.php/kasir/tambah_kasir')?>" method="POST">
					<table class="table">
						<tr>
							<td>Nama kasir</td>
							<td><input type="text" name="nama_kasir" class="form-control"><br>
						</tr>
						<tr>
							<td>Level</td>
							<td><input type="text" name="level" class="form-control"><br>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password" class="form-control"><br>
							<input type="submit" name="simpan" value="simpan" class="btn btn-success">
							</td>
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
				<form action="<?=base_url('index.php/kasir/ubah')?>" method="POST">
					<table class="table">
						<tr>
							<td>Nama kasir</td>
							<td><input id="nama_kasir" type="text" name="nama_kasir" class="form-control"><br>
						</tr>
						<tr>
							<td>Level</td>
							<td><input id="level" type="text" name="level" class="form-control"><br>
						</tr>
						<tr>
							<td>Password</td>
							<input type="hidden" name="id_kasir" id="id_kasir">
							<td><input id="password" type="password" name="password" class="form-control"><br>
							<input type="submit" class="btn btn-success">
							</td>
						</tr>
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
			url:"<?=base_url()?>index.php/kasir/edit_kasir/"+a,
			dataType:"json",
			success:function(data){
				$("#id_kasir").val(data.id_kasir);
				$("#nama_kasir").val(data.nama_kasir);
				$("#password").val(data.password);
				$("#level").val(data.level);
			}
		});
	}
</script>