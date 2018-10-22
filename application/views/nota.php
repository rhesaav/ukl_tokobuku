<h2>Oke</h2>
<h4>
	<p>
		No nota : <?=$tampil_nota->id_nota?> |
		Nama Pembeli : <?=$tampil_transaksi->nama_pembeli?> <br><br>
		Tanggal Beli : <?=$tampil_transaksi->tanggal_beli?> | Admin : <?=$tampil_transaksi->nama_kasir?>
	</p>
</h4>
<table border="1px">
	<thead>
		<th>No</th>
		<th>Nama Barang</th>
		<th>Kategori</th>
		<th>Harga</th>
		<th>Qty</th>
		<th>Subtotal</th>
	</thead>
	<tbody>
		<?php $i=0; foreach($detail_nota as $nota):$i++;?>
			<tr>
				<td><?=$i?></td>
				<td><?=$nota->judul_buku?></td>
				<td><?=$nota->nama_kategori?></td>
				<td><?=$nota->harga?></td>
				<td><?=$nota->jumlah?></td>
				<td><?=$nota->jumlah*$nota->harga?></td>
			</tr>
		<?php endforeach?>
		<tr>
			<td colspan="5">Grandtotal</td><td><?=$tampil_transaksi->total?></td>
		</tr>
	</tbody>
</table>
<script type="text/javascript">
	window.print();
	// location.href="<?=base_url('index.php/transaksi')?>";
</script>