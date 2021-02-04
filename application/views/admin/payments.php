<!-- Page content -->
<div class="container-fluid mt--6">
	<div class="row">
		<div class="col">
			<div class="card">
				<!-- Card header -->
				<div class="card-header">
					<h3 class="mb-0">Kelola Pembayaran</h3>
				</div>

				<?php if (count($payments) > 0) : ?>
					<div class="card-body p-0">
						<div class="table-responsive">
							<!-- Projects table -->
							<table class="table align-items-center table-flush">
								<thead class="thead-light">
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Pembayaran Order</th>
										<th scope="col">Customer</th>
										<th scope="col">Tanggal</th>
										<th scope="col">Jumlah</th>
										<th scope="col">Status</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($payments as $payment) : ?>
										<tr>
											<th scope="col">
												<?php echo $payment->id; ?>
											</th>
											<td>#<?php echo anchor('admin/payments/view/' . $payment->id, $payment->order_number); ?></td>
											<td>
												<?php echo $payment->customer; ?>
											</td>
											<td>
												<?php echo get_formatted_date($payment->payment_date); ?>
											</td>
											<td>
												Rp <?php echo format_rupiah($payment->payment_price); ?>
											</td>
											<td><?php echo get_payment_status($payment->status); ?></td>
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
						</div>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
