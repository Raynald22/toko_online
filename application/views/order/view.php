<section class="cart bgwhite p-t-70 p-b-100">

	<div class="content-wrapper mb-5">
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Order #<?php echo $data->order_number; ?></h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><?php echo anchor('', 'Home'); ?></li>
							<li class="breadcrumb-item active"><?php echo anchor('/order', 'Order'); ?></li>
							<li class="breadcrumb-item active">#<?php echo $data->order_number; ?></li>
						</ol>
					</div>
				</div>
			</div>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-md-8">
					<div class="card card-primary">
						<div class=" card-header py-3">
							<h5 class="card-heading m-0 font-weight-bold text-primary">Data Order</h5>
						</div>
						<div class="card-body p-0 table-responsive">
							<table class="table table-hover" width="100%" cellspacing="0">
								<tbody>
									<tr>
										<td>Nomor</td>
										<td><b>#<?php echo $data->order_number; ?></b></td>
									</tr>
									<tr>
										<td>Date order</td>
										<td><b><?php echo get_formatted_date($data->order_date); ?></b></td>
									</tr>
									<tr>
										<td>Item</td>
										<td><b><?php echo $data->total_items; ?></b></td>
									</tr>
									<tr>
										<td>Price</td>
										<td><b>Rp <?php echo format_rupiah($data->total_price); ?></b></td>
									</tr>
									<tr>
										<td>Payment by</td>
										<td><b><?php echo ($data->payment_method == 1) ? 'Bank Transfer' : 'Cash on Delivery'; ?></b></td>
									</tr>
									<tr>
										<td>Status</td>
										<td><b class="statusField"><?php echo get_order_status($data->order_status, $data->payment_method); ?></b></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="card card-primary">
						<div class="card-header">
							<h5 class="card-heading">Items</h5>
						</div>
						<div class="card-body p-0">
							<table class="table table-hover table-condensed">
								<tr>
									<th scope="col"></th>
									<th scope="col">Product</th>
									<th scope="col">Total order</th>
									<th scope="col">Price /item</th>
								</tr>
								<?php foreach ($items as $item) : ?>
									<tr>
										<td>
											<img class="img img-fluid rounded" style="width: 60px; height: 60px;" alt="<?php echo $item->name; ?>" src="<?php echo base_url('assets/uploads/products/' . $item->picture_name); ?>">
										</td>
										<td>
											<h5 class="mb-0"><?php echo $item->name; ?></h5>
										</td>
										<td><?php echo $item->order_qty; ?></td>
										<td>Rp <?php echo format_rupiah($item->order_price); ?></td>
									</tr>
								<?php endforeach; ?>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card card-primary">
						<div class="card-header">
							<h5 class="card-heading">Data Receiver</h5>
						</div>
						<div class="card-body p-0">
							<table class="table table-hover table-striped table-hover">
								<tr>
									<td>Name</td>
									<td><b><?php echo $delivery_data->customer->name; ?></b></td>
								</tr>
								<tr>
									<td>No. Mobile</td>
									<td><b><?php echo $delivery_data->customer->phone_number; ?></b></td>
								</tr>
								<tr>
									<td>Address</td>
									<td><b><?php echo $delivery_data->customer->address; ?></b></td>
								</tr>
								<tr>
									<td>Note</td>
									<td><b><?php echo $delivery_data->note; ?></b></td>
								</tr>
							</table>
						</div>
					</div>

					<div class="card card-primary">
						<div class="card-header">
							<h5 class="card-heading">Payment</h5>
						</div>
						<div class="card-body p-0">
							<?php if ($data->payment_price == NULL) : ?>
								<div class="alert alert-danger m-2">No payments found.</div>
							<?php else : ?>
								<table class="table table-hover table-striped table-hover">
									<tr>
										<td>Transfer</td>
										<td><b>Rp <?php echo format_rupiah($data->payment_price); ?></b></td>
									</tr>
									<tr>
										<td>Date</td>
										<td><b><?php echo get_formatted_date($data->payment_date); ?></b></td>
									</tr>
									<tr>
										<td>Status</td>
										<td><b>
												<?php if ($data->payment_status == 1) : ?>
													<span class="badge badge-warning text-white">Waiting Confirmation</span>
												<?php elseif ($data->payment_method == 2) : ?>
													<span class="badge badge-success text-white">Confirmated</span>
												<?php elseif ($data->payment_method == 3) : ?>
													<span class="badge badge-danger text-white">Failed</span>
												<?php endif; ?>
											</b></td>
									</tr>
									<tr>
										<td>Transfer to</td>
										<td><b>
												<?php
												$bank_data = json_decode($data->payment_data);
												$bank_data  = (array) $bank_data;
												$transfer_to = $bank_data['transfer_to'];

												$transfer_to = $banks[$transfer_to];
												$transfer_from = $bank_data['source'];
												?>
												<?php echo $transfer_to->bank; ?> a.n <?php echo $transfer_to->name; ?> (<?php echo $transfer_to->number; ?>)
											</b></td>
									</tr>
									<tr>
										<td>Transfer from</td>
										<td><b><?php echo $transfer_from->bank; ?> a.n <?php echo $transfer_from->name; ?> (<?php echo $transfer_from->number; ?>)</b></td>
									</tr>
								</table>
							<?php endif; ?>
						</div>
					</div>

					<div class="card card-primary">
						<div class="card-header">
							<h5 class="card-heading">Actions</h5>
						</div>
						<div class="card-body">
							<div class="text-center actionRow">
								<?php if ($data->payment_method == 1) : ?>
									<?php if ($data->order_status == 1) : ?>
										<p>Order waiting for payments</p>
										<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal"><i class="fa fa-times"></i> Cancel</a>
									<?php elseif ($data->order_status == 5) : ?>
										<p>Order cancelled</p>
										<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i> Delete</a>
									<?php elseif ($data->order_status == 2) : ?>
										<p>Order in process</p>
									<?php elseif ($data->order_status == 3) : ?>
										<p>Shipping</p>
									<?php elseif ($data->order_status == 4) : ?>
										<p>Completed</p>
										<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i> Delete</a>
									<?php endif; ?>
								<?php elseif ($data->payment_method == 2) : ?>
									<?php if ($data->order_status == 1) : ?>
										<p>Order in process</p>
										<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal"><i class="fa fa-times"></i> Cancel</a>
									<?php elseif ($data->order_status == 4) : ?>
										<p>Order cancelled</p>
										<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i> Delete</a>
									<?php elseif ($data->order_status == 2) : ?>
										<p>Shipping</p>
									<?php elseif ($data->order_status == 3) : ?>
										<p>Completed</p>
										<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i> Delete</a>
									<?php endif; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>

	</div>

	<?php if (($data->payment_method == 1 && $data->order_status == 1) || ($data->payment_method == 2 && $data->order_status == 1)) : ?>
		<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="cancelModalLabel">Cancel Order</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Are you sure cancel this order ? Please contact us to refund.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger cancel-btn">Cancel</button>
					</div>
				</div>
			</div>
		</div>

		<script>
			$('.cancel-btn').click(function(e) {
				e.preventDefault();

				$(this).html('<i class="fa fa-spin fa-spinner"></i> Cancelling...');

				$.ajax({
					method: 'POST',
					url: '<?php echo site_url('order/order_api?action=cancel_order'); ?>',
					data: {
						id: <?php echo $data->id; ?>
					},
					context: this,
					success: function(res) {
						if (res.code == 200) {
							$(this).html('Cancel');

							if (res.success) {
								$('.statusField').text('Cancelled');
								$('.actionRow').html('Order cancelled');
							} else if (res.error) {
								$('.actionRow').html(res.message);
							}

							setTimeout(() => {
								$('#cancelModal').modal('hide');
							}, 2000);
						}
					}
				})
			})
		</script>
	<?php endif; ?>

	<?php if (($data->payment_method == 1 && ($data->order_status == 5 || $data->order_status == 4)) || ($data->payment_method == 2 && ($data->order_status == 4 || $data->order_status == 3))) : ?>
		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="deletelModalLabel">Delete Order</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p class="deleteText">Are you sure want to delete this order ? All records will be deleted</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger delete-btn">Delete</button>
					</div>
				</div>
			</div>
		</div>
</section>

<script>
	$('.delete-btn').click(function(e) {
		e.preventDefault();

		$(this).html('<i class="fa fa-spin fa-spinner"></i> Deleting...');
		var del = $('.deleteText');

		$.ajax({
			method: 'POST',
			url: '<?php echo site_url('order/order_api?action=delete_order'); ?>',
			data: {
				id: <?php echo $data->id; ?>
			},
			context: this,
			success: function(res) {
				if (res.code == 200) {
					$(this).html('Hapus');

					if (res.success) {
						del.html('Order and all data delete successful');

						setTimeout(() => {
							del.html('<i class="fa fa-spin fa-spinner"></i> Redirecting...');
						}, 3000);
						setTimeout(() => {
							window.location = '<?php echo site_url('order'); ?>';
						}, 5000);
					} else if (res.error) {
						$('.actionRow').html(res.message);

						setTimeout(() => {
							$('#deleteModal').modal('hide');
						}, 2000);
					}
				}
			}
		})
	})
</script>
<?php endif; ?>
