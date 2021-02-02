<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus"></i> Add Product</button>
	
	<table class="table bordered table-responsive">
		<tr>
			<th>No.</th>
			<th>Nama Barang</th>
			<th>Keterangan</th>
			<th>Kategori</th>
			<th>Harga</th>
			<th>Stok</th>
			<th>Gambar</th>
			<th colspan="3">Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach ($barang as $brg) : ?>

		<tr>
			<td><?= $no++ ?></td>
			<td><?= $brg->nama_barang ?></td>
			<td><?= $brg->keterangan ?></td>
			<td><?= $brg->kategori ?></td>
			<td><?= $brg->harga ?></td>
			<td><?= $brg->stok ?></td>
			<td>
				<img width="60px" src="<?= base_url() . '/uploads/' . $brg->gambar ?>">
			</td>
			<!-- button action -->
			<td><?php echo anchor('admin/data_barang/detail/'.$brg->id_barang, '<div class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Detail</div>') ?></td>
			<td><?php echo anchor('admin/data_barang/edit/'.$brg->id_barang, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</div>') ?></td>
			<td><?php echo anchor('admin/data_barang/hapus/'.$brg->id_barang, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</div>') ?></td>
		</tr>

		<?php endforeach; ?>
	</table>
</div>


<!-- Modal untuk tambah produk -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(). 'admin/data_barang/tambah_aksi' ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="">Nama Barang</label>
				<input type="text" name="nama_barang" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Keterangan</label>
				<input type="text" name="keterangan" class="form-control">
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
				<label for="">Harga</label>
				<input type="text" name="harga" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Stok</label>
				<input type="number" name="stok" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Gambar</label>
				<input type="file" name="gambar" class="form-control">
			</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
	  </form>
    </div>
  </div>
</div>
