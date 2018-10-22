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
		<table class="table">
			<thead>
				<th>Id Transaksi</th>
				<th>Nama pembeli</th>
				<th>Total</th>
				<th>Tanggal</th>
			</thead>
			<tbody>
				<?php foreach ($tampil_histroi as $histor): ?>
					<tr>
						<td><?=$histor->id_transaksi?> </td>
						<td><?=$histor->nama_pembeli?> </td>
						<td><?=$histor->total?> </td>
						<th><?=$histor->tanggal_beli?></th>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>