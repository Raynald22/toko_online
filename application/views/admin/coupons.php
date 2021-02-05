 <!-- Header -->
 <div class="header bg-primary pb-6">
 	<div class="container-fluid">
 		<div class="header-body">
 			<div class="row align-items-center py-4">
 				<div class="col-lg-6 col-7">
 					<h6 class="h2 text-white d-inline-block mb-0">Manage Coupons</h6>
 				</div>
 				<div class="col-lg-6 col-5 text-right">
 					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
 						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
 							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
 							<li class="breadcrumb-item"><a href="admin/products">Produk</a></li>
 							<li class="breadcrumb-item active" aria-current="page">Coupons</li>
 						</ol>
 					</nav>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
 <!-- Page content -->
 <div class="container-fluid p-1">
 	<div class="row">
 		<div class="col">
 			<div class="card">
 				<!-- Card header -->
 				<div class="card-header border-0">
 					<h3 class="mb-0">Coupon</h3>
 				</div>
 				<div class="text-right">
 					<a href="#" data-target="#addModal" data-toggle="modal" class="btn btn-sm btn-primary m-2"><i class="fas fa-plus"></i> Add Coupons</a>
 				</div>

 				<div class="packageContainer">
 					<!-- Light table -->
 					<div class="table-responsive">
 						<table class="table align-items-center table-flush" id="packageList" style="width: 100%">
 							<thead class="thead-light">
 								<tr>
 									<th scope="col">#</th>
 									<th scope="col">Name</th>
 									<th schope="col">Code</th>
 									<th schope="col">Discounts</th>
 									<th schope="col">Start date</th>
 									<th schope="col">End date</th>
 									<th schope="col">Status</th>
 									<th scope="col"></th>
 								</tr>
 							</thead>
 						</table>
 					</div>
 				</div>

 			</div>
 		</div>
 	</div>


 	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
 		<div class="modal-dialog modal- modal-dialog modal-md" role="document">
 			<div class="modal-content">
 				<div class="modal-body p-0">
 					<div class="card border-0 mb-0">
 						<div class="card-header">
 							<h3 class="card-heading text-center mt-2">Add Coupon</h3>
 						</div>
 						<div class="card-body px-lg-5 py-lg-5">
 							<form role="form" action="#" method="POST" id="addCouponForm">

 								<div class="form-group mb-3">
 									<div class="input-group input-group-merge input-group-alternative">
 										<div class="input-group-prepend">
 											<span class="input-group-text"><i class="fas fa-box"></i></span>
 										</div>
 										<input name="name" class="form-control" placeholder="Coupon Name" type="text" maxlength="255" required>
 									</div>
 									<div class="text-danger err name-error"></div>
 								</div>

 								<div class="form-group mb-3">
 									<div class="input-group input-group-merge input-group-alternative">
 										<div class="input-group-prepend">
 											<span class="input-group-text"><i class="fas fa-money-bill"></i></span>
 										</div>
 										<input name="code" class="form-control" placeholder="Coupon Code" type="text" maxlength="255" required>
 									</div>
 									<div class="text-danger err code-error"></div>
 								</div>

 								<div class="form-group mb-3">
 									<div class="input-group input-group-merge input-group-alternative">
 										<div class="input-group-prepend">
 											<span class="input-group-text">Rp</span>
 										</div>
 										<input name="credit" class="form-control" placeholder="Discount" type="text" required>
 									</div>
 									<div class="text-danger err credit-error"></div>
 								</div>

 								<div class="form-group mb-3">
 									<div class="input-group input-group-merge input-group-alternative">
 										<div class="input-group-prepend">
 											<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
 										</div>
 										<input name="start_date" class="form-control" placeholder="Start date" type="date" required>
 									</div>
 									<div class="text-danger err start-date-error"></div>
 								</div>

 								<div class="form-group mb-3">
 									<div class="input-group input-group-merge input-group-alternative">
 										<div class="input-group-prepend">
 											<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
 										</div>
 										<input name="expired_date" class="form-control" placeholder="Expired date" type="date" required>
 									</div>
 									<div class="text-danger err expired-date-error"></div>
 								</div>

 								<div class="text-left">
 									<button type="button" class="btn btn-secondary my-4" data-dismiss="modal">Cancel</button>
 								</div>
 								<div class="float-right" style="margin-top: -90px">
 									<button type="submit" class="btn btn-primary my-4 addPackageBtn">Add</button>
 								</div>
 							</form>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>

 	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
 		<div class="modal-dialog modal-modal-dialog-centered modal-" role="document">
 			<div class="modal-content">
 				<div class="modal-header">
 					<h6 class="modal-title" id="modal-title-default">Delete Coupon</h6>
 					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 						<span aria-hidden="true">×</span>
 					</button>
 				</div>
 				<form action="#" id="deleteCoupon" method="POST">

 					<input type="hidden" name="id" value="" class="deleteID">

 					<div class="modal-body">
 						<p>Are you sure want to delete this coupon ? Your action cannot be restore.</p>
 					</div>
 					<div class="modal-footer">
 						<button type="submit" class="btn btn-danger btn-delete">Delete</button>
 						<button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cancel</button>
 					</div>
 				</form>
 			</div>
 		</div>
 	</div>

 	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
 		<div class="modal-dialog modal- modal-dialog modal-md" role="document">
 			<div class="modal-content">
 				<div class="modal-body p-0">
 					<div class="card border-0 mb-0">
 						<div class="card-header">
 							<h3 class="card-heading text-center mt-2">Edit Coupon</h3>
 						</div>
 						<div class="card-body px-lg-5 py-lg-5">
 							<form role="form" action="#" method="POST" id="editCouponForm">

 								<input type="hidden" name="id" value="" class="edit-id">

 								<div class="form-group mb-3">
 									<div class="input-group input-group-merge input-group-alternative">
 										<div class="input-group-prepend">
 											<span class="input-group-text"><i class="fas fa-box"></i></span>
 										</div>
 										<input name="name" class="form-control edit-name" placeholder="Coupon Name" type="text" maxlength="255" required>
 									</div>
 									<div class="text-danger err name-error"></div>
 								</div>

 								<div class="form-group mb-3">
 									<div class="input-group input-group-merge input-group-alternative">
 										<div class="input-group-prepend">
 											<span class="input-group-text"><i class="fas fa-money-bill"></i></span>
 										</div>
 										<input name="code" class="form-control edit-code" placeholder="Coupon Code" type="text" maxlength="255" required>
 									</div>
 									<div class="text-danger err code-error"></div>
 								</div>

 								<div class="form-group mb-3">
 									<div class="input-group input-group-merge input-group-alternative">
 										<div class="input-group-prepend">
 											<span class="input-group-text">Rp</span>
 										</div>
 										<input name="credit" class="form-control edit-credit" placeholder="Discount" type="text" required>
 									</div>
 									<div class="text-danger err credit-error"></div>
 								</div>

 								<div class="form-group mb-3">
 									<div class="input-group input-group-merge input-group-alternative">
 										<div class="input-group-prepend">
 											<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
 										</div>
 										<input name="start_date" class="form-control edit-start" placeholder="Start date" type="date" required>
 									</div>
 									<div class="text-danger err start-date-error"></div>
 								</div>

 								<div class="form-group mb-3">
 									<div class="input-group input-group-merge input-group-alternative">
 										<div class="input-group-prepend">
 											<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
 										</div>
 										<input name="expired_date" class="form-control edit-expired" placeholder="Expired date" type="date" required>
 									</div>
 									<div class="text-danger err expired-date-error"></div>
 								</div>

 								<div class="form-group mb-3">
 									<label for="av" class="form-control-label">
 										<input type="checkbox" name="is_active" value="1" id="av"> Coupon availables
 									</label>
 								</div>

 								<div class="text-left">
 									<button type="button" class="btn btn-secondary my-4" data-dismiss="modal">Cancel</button>
 								</div>
 								<div class="float-right" style="margin-top: -90px">
 									<button type="submit" class="btn btn-primary my-4 editPackageBtn">Save</button>
 								</div>
 							</form>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>


 	<link href="<?php echo base_url('assets/vendor/argon/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">

 	<script src="<?php echo base_url('assets/vendor/argon/vendor/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
 	<script src="<?php echo base_url('assets/vendor/argon/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
 	<script src="<?php echo base_url('assets/js/datatables.lang.js'); ?>"></script>
 	<script>
 		$(document).ready(function() {
 			$(document).on('click', '.btnDelete', function() {
 				var id = $(this).data('id');

 				$('.deleteID').val(id);
 				$('#deleteModal').modal('show');
 			});

 			$(document).on('click', '.btnEdit', function() {
 				var id = $(this).data('id');

 				$.ajax({
 					method: 'GET',
 					url: '<?php echo site_url('admin/products/coupon_api?action=view_data'); ?>',
 					data: {
 						id: id
 					},
 					success: function(res) {
 						if (res.data) {
 							var d = res.data;

 							$('.edit-id').val(d.id);
 							$('.edit-name').val(d.name);
 							$('.edit-code').val(d.code);
 							$('.edit-credit').val(d.credit);
 							$('.edit-start').val(d.start_date);
 							$('.edit-expired').val(d.expired_date);

 							if (d.is_active == 1) {
 								$('#av').attr('checked', true);
 							}

 							$('#editModal').modal('show');
 						}
 					}
 				});
 			});

 			$('#editCouponForm').submit(function(e) {
 				e.preventDefault();

 				var btn = $('.editPackageBtn');
 				var id = $('.edit-id').val();
 				var data = $(this).serialize();
 				btn.html('<i class="fa fa-spin fa-spinner"></i> Saving...').attr('disabled', true);

 				$.ajax({
 					method: 'POST',
 					url: '<?php echo site_url('admin/products/coupon_api?action=edit_coupon'); ?>',
 					data: data,
 					success: function(res) {
 						if (res.code == 201) {
 							btn.html('<i class="fa fa-check"></i> Success').removeAttr('disabled');

 							setTimeout(() => {
 								$('#editModal').modal('hide');
 								table.ajax.reload();
 								btn.html('Save');
 							}, 1500);
 						}
 					}
 				})
 			});

 			$('#deleteCoupon').submit(function(e) {
 				e.preventDefault();

 				var id = $('.deleteID').val();
 				var btn = $('.btn-delete');

 				btn.html('<i class="fa fa-spin fa-spinner"></i> Deleting...');

 				$.ajax({
 					method: 'POST',
 					url: '<?php echo site_url('admin/products/coupon_api?action=delete_coupon'); ?>',
 					data: {
 						id: id
 					},
 					success: function(res) {
 						if (res.code == 204) {
 							btn.html('<i class="fa fa-check"></i> Deleted!');

 							setTimeout(() => {
 								$('#deleteModal').modal('hide');
 								table.ajax.reload();
 								btn.html('Delete');
 							}, 1500);
 						}
 					}
 				})
 			});

 			var table = $('#packageList').DataTable({
 				"ajax": "<?php echo site_url('admin/products/coupon_api?action=coupon_list'); ?>",
 				"columns": [{
 						"data": "id"
 					},
 					{
 						"data": "name"
 					},
 					{
 						"data": "code"
 					},
 					{
 						"data": "credit"
 					},
 					{
 						"data": "start_date"
 					},
 					{
 						"data": "expired_date"
 					},
 					{
 						"data": "is_active"
 					},
 					{
 						"mRender": function(data, type, row) {
 							return '<div class="text-right"><a href="#" data-id="' + row.id + '" class="btn btn-warning btn-sm btnEdit mr-3"><i class="fa fa-edit"></i></a><a href="#" data-id="' + row.id + '" class="btn btn-danger btn-sm btnDelete"><i class="fa fa-trash"></i></a></div>';
 						}
 					}
 				],
 				"language": {
 					"search": "Search :",
 					"lengthMenu": "Showing _MENU_ data",
 					"info": "Showing _START_ from _END_ data",
 					"infoEmpty": "No records found",
 					"infoFiltered": "(from total _MAX_ data)",
 					"zeroRecords": "Not found",
 					"paginate": {
 						"first": "&laquo;",
 						"last": "&raquo;",
 						"next": "&rsaquo;",
 						"previous": "&lsaquo;"
 					},
 				}
 			});


 			$('#addCouponForm').submit(function(e) {
 				e.preventDefault();

 				var data = $(this).serialize();
 				var btn = $('.addPackageBtn');

 				btn.html('<i class="fa fa-spin fa-spinner"></i> Adding...');
 				$('.err').empty();

 				$.ajax({
 					method: 'POST',
 					url: '<?php echo site_url('admin/products/coupon_api?action=add_coupon'); ?>',
 					data: data,
 					context: this,
 					success: function(res) {
 						if (res.data) {
 							btn.html('<i class="fa fa-check"></i> Success!');

 							setTimeout(function() {
 								$('#addCouponForm .form-control').val(null);
 								btn.html('Add');
 							}, 2000);
 							setTimeout(() => {
 								$('#addModal').modal('hide');
 							}, 2222);

 							table.ajax.reload();
 						}
 					},
 					error: function(xhr, ajaxOptions, thrownError) {
 						btn.html('Add');

 						var errors = xhr.responseJSON.errors;

 						$.each(errors, function(keys, val) {
 							$.each(val, function(key, val) {
 								$('.' + keys + '-error').text(val);
 							});
 						});
 					}
 				})
 			})
 		});
 	</script>
