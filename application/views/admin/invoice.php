<div class="container-fluid">
	<h4>Invoice</h4>

	<table class="table table-bordered table-stripped table-hover">
		<tr>
			<th>ID Invoice</th>
			<th>Nama pemesan</th>
			<th>Alamat</th>
			<th>Tanggal</th>
			<th>Batas Pembayaran</th>
			<th>Action</th>
		</tr>

		<?php foreach ($invoice as $inv) : ?>
		<tr>
			<td><?= $inv->id ?></td>
			<td><?= $inv->nama ?></td>
			<td><?= $inv->alamat ?></td>
			<td><?= $inv->tanggal_pesanan ?></td>
			<td><?= $inv->batas_bayar ?></td>
			<td>
				<?= anchor('admin/invoice/detail/'.$inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?>
			</td>
		</tr>

		<?php endforeach; ?>
	</table>
</div>
