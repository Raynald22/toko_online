 <!-- Header -->
 <div class="header bg-primary pb-6">
 	<div class="container-fluid">
 		<div class="header-body">
 			<div class="row align-items-center py-4">
 				<div class="col-lg-6 col-7">
 					<h6 class="h2 text-white d-inline-block mb-0">Order #<?php echo $data->order_number; ?></h6>
 				</div>
 				<div class="col-lg-6 col-5 text-right">
 					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
 						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
 							<li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
 							<li class="breadcrumb-item"><a href="<?php echo site_url('admin/orders'); ?>">Order</a></li>
 							<li class="breadcrumb-item active" aria-current="page">#<?php echo $data->order_number; ?></li>
 						</ol>
 					</nav>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
 <!-- Page content -->
 <div class="container-fluid p-0 mt-6">

 	<div class="row">
 		<div class="col-md-8">
 			<div class="card-wrapper">
 				<div class="card">
 					<div class="card-header">
 						<h3 class="mb-0">Data Product</h3>
 						<?php if ($order_flash) : ?>
 							<span class="float-right text-success font-weight-bold" style="margin-top: -30px;"><?php echo $order_flash; ?></span>
 						<?php endif; ?>
 					</div>

 					<div class="card-body p-0">
 						<table class="table align-items-center table-flush table-striped">
 							<tr>
 								<td>No. SKU</td>
 								<td><b>#<?php echo $data->order_number; ?></b></td>
 							</tr>
 							<tr>
 								<td>Date</td>
 								<td><b><?php echo get_formatted_date($data->order_date); ?></b></td>
 							</tr>
 							<tr>
 								<td>Items</td>
 								<td><b><?php echo $data->total_items; ?></b></td>
 							</tr>
 							<tr>
 								<td>Price</td>
 								<td><b>Rp <?php echo format_rupiah($data->total_price); ?></b></td>
 							</tr>
 							<tr>
 								<td>Payment method</td>
 								<!-- jika 1 bank transfer dan jika lebih dari 1 COD -->
 								<td><b><?php echo ($data->payment_method == 1) ? 'Bank transfer' : 'Cash on Delivery'; ?></b></td>
 							</tr>
 							<tr>
 								<td>Status</td>
 								<td><b class="statusField"><?php echo get_order_status($data->order_status, $data->payment_method); ?></b></td>
 							</tr>
 						</table>
 					</div>
 					<div class="card-footer">
 						<form action="<?php echo site_url('admin/orders/status'); ?>" method="POST">
 							<input type="hidden" name="order" value="<?php echo $data->id; ?>">
 							<div class="row">
 								<div class="col-md-10">
 									<div class="form-group">
 										<?php if ($data->payment_method == 1) : ?>
 											<select class="form-control" id="status" name="status">
 												<option value="2" <?php echo ($data->order_status == 2) ? ' selected' : ''; ?>>In proces</option>
 												<option value="3" <?php echo ($data->order_status == 3) ? ' selected' : ''; ?>>Shipping</option>
 												<option value="4" <?php echo ($data->order_status == 4) ? ' selected' : ''; ?>>Delivered</option>
 												<option value="5" <?php echo ($data->order_status == 5) ? ' selected' : ''; ?>>Cancel</option>
 											</select>
 										<?php else : ?>
 											<select class="form-control" id="status" name="status">
 												<option value="1" <?php echo ($data->order_status == 1) ? ' selected' : ''; ?>>In process</option>
 												<option value="2" <?php echo ($data->order_status == 2) ? ' selected' : ''; ?>>Shipping</option>
 												<option value="3" <?php echo ($data->order_status == 3) ? ' selected' : ''; ?>>Delivered</option>
 												<option value="4" <?php echo ($data->order_status == 4) ? ' selected' : ''; ?>>Cancel</option>
 											</select>
 										<?php endif; ?>
 									</div>
 								</div>
 								<div class="col-md-2">
 									<div class="text-right">
 										<input type="submit" value="OK" class="btn btn-md btn-primary">
 									</div>
 								</div>
 							</div>
 						</form>
 					</div>
 				</div>

 				<div class="card card-primary">
 					<div class="card-header">
 						<h3 class="mb-0">Item order</h3>
 					</div>
 					<div class="card-body p-0">
 						<table class="table align-items-center table-flush">
 							<thead class="thead-light">
 								<tr>
 									<th scope="col"></th>
 									<th scope="col">Product</th>
 									<th scope="col">Total item</th>
 									<th scope="col">Price per Pcs</th>
 								</tr>
 							</thead>
 							<tbody>
 								<?php foreach ($items as $item) : ?>
 									<tr>
 										<td>
 											<img class="img img-fluid rounded" style="width: 60px; height: 60px;" alt="<?php echo $item->name; ?>" src="<?php echo base_url('assets/uploads/products/' . $item->picture_name); ?>">
 										</td>
 										<td>
 											<h5 class="mb-0"><?php echo $item->name; ?></h5>
 										</td>
 										<td><?php echo $item->order_qty; ?> Item</td>
 										<td>Rp <?php echo format_rupiah($item->order_price); ?></td>
 									</tr>
 								<?php endforeach; ?>
 							</tbody>
 						</table>
 					</div>
 				</div>

 			</div>

 		</div>
 		<div class="col-md-4">
 			<div class="card card-primary">
 				<div class="card-header">
 					<h3 class="mb-0">Data Receiver</h3>
 				</div>
 				<div class="card-body p-0">
 					<table class="table align-items-center table-flush table-hover">
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
 							<td>
 								<div style="white-space: initial;"><b><?php echo $delivery_data->customer->address; ?></b></div>
 							</td>
 						</tr>
 						<tr>
 							<td>Note</td>
 							<td><b><?php echo $delivery_data->note; ?></b></td>
 						</tr>
 					</table>
 				</div>
 			</div>

 			<div class="card card-primary mt-4" id="#payments">
 				<div class="card-header">
 					<h3 class="mb-0">Payment</h3>
 				</div>
 				<div class="card-body <?php echo ($data->payment_method == 1) ? 'p-0' : ''; ?>">
 					<?php if ($data->payment_method == 1) : ?>
 						<?php if ($data->payment_price == NULL) : ?>
 							<div class="alert alert-info m-2">No payment founds.</div>
 						<?php else : ?>

 							<div>
 								<img class="img img-fluid" src="<?php echo base_url('assets/uploads/payments/' . $data->picture_name); ?>">
 							</div>

 							<?php if ($payment_flash) : ?>
 								<br>
 								<div class="alert alert-info" id="payment_flash"><?php echo $payment_flash; ?></div>
 							<?php endif; ?>

 							<table class="table align-items-center table-flush table-hover">
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
 												<span class="badge badge-info">Waiting confirmation</span>
 											<?php elseif ($data->payment_status == 2) : ?>
 												<span class="badge badge-success">Confirmated</span>
 											<?php elseif ($data->payment_status == 3) : ?>
 												<span class="badge badge-danger">Failed confirmation</span>
 											<?php endif; ?>
 										</b></td>
 								</tr>
 								<tr>
 									<td>Transfer to</td>
 									<td>
 										<div style="white-space: initial;"><b>
 												<?php
													$bank_data = json_decode($data->payment_data);
													$bank_data  = (array) $bank_data;
													$transfer_to = $bank_data['transfer_to'];

													$transfer_to = $banks[$transfer_to];
													$transfer_from = $bank_data['source'];
													?>
 												<?php echo $transfer_to->bank; ?> a.n <?php echo $transfer_to->name; ?> (<?php echo $transfer_to->number; ?>)
 											</b></div>
 									</td>
 								</tr>
 								<tr>
 									<td>Transfer from</td>
 									<td>
 										<div style="white-space: initial;">
 											<b><?php echo $transfer_from->bank; ?> a.n <?php echo $transfer_from->name; ?> (<?php echo $transfer_from->number; ?>)</b>
 										</div>
 									</td>
 								</tr>
 							</table>
 						<?php endif; ?>
 					<?php else : ?>
 						<div class="alert alert-info">
 							This order using Cash on Delivery. No confirm payment needed.
 						</div>
 					<?php endif; ?>
 				</div>
 				<?php if ($data->payment_price != NULL) : ?>
 					<div class="card-footer">
 						<form action="<?php echo site_url('admin/payments/verify'); ?>" method="POST">
 							<div class="row">
 								<input type="hidden" name="id" value="<?php echo $data->payment_id; ?>">
 								<input type="hidden" name="order" value="<?php echo $data->id; ?>">
 								<div class="col-md-9">
 									<select class="form-control" name="action">
 										<?php if ($data->payment_status == 1) : ?>
 											<option value="1">Confirm Payment</option>
 											<option value="2">Payment not found</option>
 										<?php else : ?>
 											<option value="4" readonly>No choice</option>
 										<?php endif; ?>
 									</select>
 								</div>
 								<div class="col-md-3 text-right">
 									<input type="submit" class="btn btn-primary" value="OK">
 								</div>
 							</div>
 						</form>
 					</div>
 				<?php endif; ?>
 			</div>
 		</div>
 	</div>
