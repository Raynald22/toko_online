<section class="cart bgwhite p-t-70 p-b-100">
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">My Order</h6>
			</div>
			<div class="card-body" <?php echo (count($orders) > 0) ? ' p-0' : ''; ?>>
				<?php if (count($orders) > 0) : ?>
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th scope="col">No.</th>
									<th scope="col">ID</th>
									<th scope="col">Date</th>
									<th scope="col">Total Items</th>
									<th scope="col">Total</th>
									<th scope="col">Payment by</th>
									<th scope="col">Status</th>
								</tr>
							</thead>

							<tbody>
								<?php
								$no = 1;
								foreach ($orders as $order) : ?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo anchor('order/view/' . $order->id, '#' . $order->order_number); ?></td>
										<td><?php echo get_formatted_date($order->order_date); ?></td>
										<td class="text-center"><?php echo $order->total_items; ?> Items</td>
										<td>Rp <?php echo format_rupiah($order->total_price); ?></td>
										<td><?php echo ($order->payment_method == 1) ? 'Bank Transfer' : 'Cash on Delivery'; ?></td>
										<td>
											<?php echo get_order_status($order->order_status, $order->payment_method); ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				<?php else : ?>
					<div class="row">
						<div class="col-md-6">
							<div class="alert alert-primary">
								No records found.
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<?php if ($pagination) : ?>
				<div class="card-footer">
					<?php echo $pagination; ?>
				</div>
			<?php endif; ?>
		</div>

	</div>
	<!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->
</section>
