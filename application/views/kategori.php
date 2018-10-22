<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Data Kategori</h3>
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
				<th>Id Kategori</th>
				<th>Nama Kategori</th>
				<th>Aksi</th>
			</thead>
			<tbody>
				<?php foreach ($tampil_kategori as $kat): ?>
					<tr>
						<td><?=$kat->id_kategori?> </td>
						<td><?=$kat->nama_kategori?> </td>
						<td>
							<a href="#edit" onclick="edit(<?=$kat->id_kategori?>)" class="btn btn-info" data-toggle="modal">Ubah</a>
							<a href="<?=base_url('index.php/kategori/hapus/'.$kat->id_kategori)?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
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
				<form action="<?=base_url('index.php/kategori/tambah_kategori')?>" method="POST">
					<table class="table">
						<tr>
							<td>Nama Kategori</td>
							<td><input type="text" name="nama_kategori" class="form-control"><br>
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
				<form action="<?=base_url('index.php/kategori/ubah')?>" method="POST">
					<table class="table">
						<tr>
							<td>Nama Kategori</td>
							<td>
							<input type="hidden" name="id_kategori" id="id_kategori">
							<input type="text" id="nama_kategori" name="nama_kategori" class="form-control"><br>
							<input type="submit" name="simpan" value="simpan" class="btn btn-success">
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
			url:"<?=base_url()?>index.php/kategori/edit_kategori/"+a,
			dataType:"json",
			success:function(data){
				$("#id_kategori").val(data.id_kategori);
				$("#nama_kategori").val(data.nama_kategori);
			}
		});
	}
</script>