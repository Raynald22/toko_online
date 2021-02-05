<section class="cart bgwhite p-t-70 p-b-100">

	<section class="content">
		<div class="card p-3">
			<button class="mb-3 text-right">
				<?php echo anchor('payments/confirm', 'Add Payment', 'class="text-white btn btn-primary btn-sm"'); ?>
			</button>
			<div class="card-body<?php echo (count($payments) > 0) ? ' p-0' : ''; ?>">
				<?php if (count($payments) > 0) : ?>
					<div class="table-responsive">
						<table class="table table-striped m-0">
							<tr>
								<th scope="col">No.</th>
								<th scope="col">Order</th>
								<th scope="col">Tanggal</th>
								<th scope="col">Status</th>
							</tr>
							<?php
							$no = 1;
							foreach ($payments as $payment) : ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo anchor('payments/view/' . $payment->id, '#' . $payment->order_number); ?></td>
									<td><?php echo get_formatted_date($payment->payment_date); ?></td>
									<td>
										<?php if ($payment->payment_status == 1) : ?>
											<span class="badge badge-warning text-white">Waiting confirmation</span>
										<?php elseif ($payment->payment_status == 2) : ?>
											<span class="badge badge-success text-white">Confirmated</span>
										<?php elseif ($payment->payment_status == 3) : ?>
											<span class="badge badge-danger text-white">Failed confirmation</span>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				<?php else : ?>
					<div class="row">
						<div class="col-md-6">
							<div class="alert alert-info">
								Belum ada data pembayaran
							</div>

							<?php echo anchor('payments/confirm', 'Konfirmasi pembayaran baru'); ?>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<?php if ($pagination) : ?>
				<div class="card-footer">
					<?php echo $pagination; ?>
				</div>
			<?php endif; ?>
			<!-- <div class="card-footer mt-3">

			</div> -->
		</div>
	</section>
</section>
