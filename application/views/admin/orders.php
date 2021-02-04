<section class="cart bgwhite p-t-70 p-b-100">
	<!-- Page content -->
	<div class="container-fluid">
		<div class="card shadow mb-4">
			<!-- Card header -->
			<div class="card-header pt-3">
				<h3 class="mb-0 font-weight-bold text-primary">Kelola Order</h3>
			</div>

			<?php if (count($orders) > 0) : ?>
				<div class="card-body p-0">
					<div class="table-responsive">
						<!-- Projects table -->
						<table class="table align-items-center table-flush">
							<thead class="thead-light">
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Customer</th>
									<th scope="col">Date</th>
									<th scope="col">Total Items</th>
									<th scope="col">Total Price</th>
									<th scope="col">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($orders as $order) : ?>
									<tr>
										<th scope="col">
											<?php echo anchor('admin/orders/view/' . $order->id, '#' . $order->order_number); ?>
										</th>
										<td><?php echo $order->customer; ?></td>
										<td>
											<?php echo get_formatted_date($order->order_date); ?>
										</td>
										<td>
											<?php echo $order->total_items; ?>
										</td>
										<td>
											Rp <?php echo format_rupiah($order->total_price); ?>
										</td>
										<td><?php echo get_order_status($order->order_status, $order->payment_method); ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="card-footer">
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
</section>
