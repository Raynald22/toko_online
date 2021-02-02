<div class="container-fluid">
	<h3>Edit data barang</h3>

	<?php foreach($barang as $brg) : ?>

		<form action="<?= base_url().'admin/data_barang/update' ?>" method="post">
			<div class="form-group">
				<label>Nama Barang</label>
				<input type="text" name="nama_barang" class="form-control" value="<?= $brg->nama_barang ?>">
			</div>

			<div class="form-group">
				<label>Keterangan</label>
				<input type="hidden" name="id_barang" class="form-control" value="<?= $brg->id_barang ?>">
				<input type="text" name="keterangan" class="form-control" value="<?= $brg->keterangan ?>">
			</div>

			<div class="form-group">
				<label for="">Kategori</label>
				<select class="form-control" name="kategori">
					<option>Shoes</option>
					<option>Hoodie</option>
					<option>T-Shirt</option>
					<option>Pants</option>
				</select>
			</div>

			<div class="form-group">
				<label>Harga</label>
				<input type="text" name="harga" class="form-control" value="<?= $brg->harga ?>">
			</div>

			<div class="form-group">
				<label>Stok</label>
				<input type="number" name="stok" class="form-control" value="<?= $brg->stok ?>">
			</div>

			<button class="btn btn-sm btn-primary mt-3" type="submit">Save</button>
			<button class="btn btn-sm btn-secondary mt-3" type="reset" value="Reset">Reset</button>
		</form>

	<?php endforeach; ?>
</div>
