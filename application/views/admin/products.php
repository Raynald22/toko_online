<section class="cart bgwhite p-t-70 p-b-100">
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Products</h6>
				<?php if ($flash) : ?>
					<span class="float-right text-success font-weight-bold" style="margin-top: -30px">
						<?php echo $flash; ?>
					</span>
				<?php endif; ?>
			</div>
			<div class="card-body">
				<?php if (count($products) > 0) : ?>
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr class="text-center">
									<th scope="col">No.</th>
									<th scope="col">Name</th>
									<th scope="col">Image</th>
									<th scope="col">Quantity</th>
									<th scope="col">Price</th>
									<th scope="col 3">Action</th>
								</tr>
							</thead>

							<tbody class="text-center">
								<?php
								$no = 1;
								foreach ($products as $product) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $product->name ?></td>
										<td>
											<img width="60px" alt="<?php echo $product->name; ?>" class="img img-fluid rounded" src="<?php echo base_url('assets/uploads/products/' . $product->picture_name); ?>">
										</td>
										<td><?php echo ($product->stock > 0) ? $product->stock . ' ' . $product->product_unit : '<span class="text-danger"><em>Stok habis</em></span>'; ?></td>
										<td>Rp <?php echo format_rupiah($product->price); ?></td>
										<td>
											<a href="<?php echo site_url('admin/products/view/' . $product->id); ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"> View</i></a>
											<a href="<?php echo site_url('admin/products/edit/' . $product->id); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"> Edit</i></a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<div>
						<?php echo $pagination; ?>
					</div>
				<?php else : ?>
					<div class="card-body">
						<div class="row">
							<div class="col-md-8">
								<div class="alert alert-primary">
									Belum ada data produk yang ditambahkan. Silahkan menambahkan baru.
								</div>
							</div>
							<div class="col-md-4">
								<a href="<?php echo site_url('admin/products/add_new_product'); ?>"><i class="fa fa-plus"></i> Tambah produk baru</a>
								<br>
								<a href="<?php echo site_url('admin/products/category'); ?>"><i class="fa fa-list"></i> Kelola kategori</a>
							</div>
						</div>
					</div>
				<?php endif; ?>

			</div>

		</div>
		<!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->
</section>
