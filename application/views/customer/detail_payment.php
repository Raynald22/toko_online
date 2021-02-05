<section class="cart bgwhite p-t-60 p-b-100">

	<div class="content-wrapper">
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h2>Payment from order</h2>
						<h3 class="text-primary">
							<span class="text-secondary">#</span><?php echo $data->order_number; ?>
						</h3>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><?php echo anchor('customer', 'Home'); ?></li>
							<li class="breadcrumb-item active"><?php echo anchor('customer/payments', 'Pembayaran'); ?></li>
							<li class="breadcrumb-item active">Order #<?php echo $data->order_number; ?></li>
						</ol>
					</div>
				</div>
			</div>
		</section>

		<section class="content pl-3">
			<div class="row">
				<div class="col-md-8">
					<div class="card card-primary">
						<div class="card-header">
							<h5 class="card-heading">Data Order</h5>
						</div>
						<div class="card-body p-0">
							<table class="table table-hover table-striped table-hover">
								<tr>
									<td>Order</td>
									<td>#<b><?php echo $data->order_number; ?></b></td>
								</tr>
								<tr>
									<td>Date</td>
									<td><b><?php echo get_formatted_date($data->payment_date); ?></b></td>
								</tr>
								<tr>
									<td>Total transfer</td>
									<td><b>Rp <?php echo format_rupiah($data->payment_price); ?></b></td>
								</tr>
								<tr>
									<td>Transfer from</td>
									<td><b><?php echo $payment->source->bank; ?> a.n <?php echo $payment->source->name; ?> (<?php echo $payment->source->number; ?>)</td>
								</tr>
								<tr>
									<td>Transfer to</td>
									<td><b>
											<?php
											$transfer_to = $payment->transfer_to;
											$transfer_to = $banks[$transfer_to];

											?>
											<?php echo $transfer_to->bank; ?> a.n <?php echo $transfer_to->name; ?> (<?php echo $transfer_to->number; ?>)
										</b></td>
								</tr>
								<tr>
									<td>Status</td>
									<td>
										<b>
											<?php if ($data->payment_status == 1) : ?>
												<span class="badge badge-warning text-white">Waiting confirmation</span>
											<?php elseif ($data->payment_status == 2) : ?>
												<span class="badge badge-success text-white">Confirmated</span>
											<?php elseif ($data->payment_status == 3) : ?>
												<span class="badge badge-danger text-white">Failed confirmation</span>
											<?php endif; ?>
										</b>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-4 pr-3">
					<div class="card card-success">
						<div class="card-header">
							<h5 class="card-heading">Bukti Pembayaran</h5>
						</div>
						<div class="card-body">
							<div class="text-center">
								<img alt="Pembayaran order #<?php echo $data->order_number; ?>" class="img img-fluid" src="<?php echo base_url('assets/uploads/payments/' . $data->picture_name); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>
</section>
