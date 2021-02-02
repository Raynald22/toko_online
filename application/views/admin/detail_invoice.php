<div class="container-fluid">
	<h4>Detail Invoice <div class="btn btn-sm btn-success ml-3"> No. Invoice: <?= $invoice->id ?></div></h4>

	<table class="table bordered table-stripped table-hover">
		<tr>
			<th>ID Barang</th>
			<th>Nama Barang</th>
			<th>Jumlah Pesanan</th>
			<th>Harga Satuan</th>
			<th>Subtotal</th>
		</tr>

		<?php
		$total = 0;
		foreach ($pesanan as $psn) :
			$subtotal = $psn->jumlah * $psn->harga;
			$total += $subtotal;
		?>

		<tr>
			<td><?= $psn->id_barang ?></td>
			<td><?= $psn->nama_barang ?></td>
			<td><?= $psn->jumlah ?></td>
			<td>Rp.<?= number_format($psn->harga, 0,',','.') ?></td>
			<td>Rp.<?= number_format($subtotal, 0,',','.') ?></td>
		</tr>

		<?php endforeach; ?>

		<tr>
			<td colspan="4" align="right">Total</td>
			<td align="right">Rp.<?= number_format($total, 0,',','.') ?></td>
		</tr>
	</table>

	<a href="<?= base_url('admin/invoice') ?>" class="btn btn-sm btn-primary">Kembali</a>
</div>
