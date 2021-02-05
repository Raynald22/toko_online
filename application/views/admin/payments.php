<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Manage Payment</h6>
				</div>
				<div class="col-lg-6 col-5 text-right">
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item active" aria-current="page">Payments</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page content -->
<div class="container-fluid p-0">
	<div class="row">
		<div class="col">
			<div class="card">
				<!-- Card header -->
				<div class="card-header">
					<h3 class="mb-0">Payments</h3>
				</div>

				<?php if (count($payments) > 0) : ?>
					<div class="card-body p-0">
						<div class="table-responsive">
							<!-- Projects table -->
							<table class="table align-items-center table-flush">
								<thead class="thead-light">
									<tr>
										<th scope="col">ID</th>
										<th scope="col">No.Order</th>
										<th scope="col">Customer</th>
										<th scope="col">Date</th>
										<th scope="col">Total</th>
										<th scope="col">Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($payments as $payment) : ?>
										<tr>
											<th scope="col">
												<?php echo $no++ ?>
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
									No records found.
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
