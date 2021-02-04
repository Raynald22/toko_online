<div class="container">
	<a href="#" data-target="#addModal" data-toggle="modal" class="btn btn-sm btn-neutral btn-primary mb-3"><i class="fas fa-plus"></i> Add Coupons</a>
</div>
<!-- Page content -->

<div class="card shadow mb-4">
	<!-- Card header -->
	<div class="card-header">
		<h3 class="mb-0 font-weight-bold text-primary">Coupons</h3>
	</div>

	<div class="packageContainer pt-3 m-3">
		<!-- Light table -->
		<div class="table-responsive">
			<div class="card-body">
				<table class="table table-flush" id="packageList" style="width: 100%" cellspacing="0">
					<thead class="thead-light">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama</th>
							<th scope="col">Kode</th>
							<th scope="col">Potongan</th>
							<th scope="col">Tanggal Mulai</th>
							<th scope="col">Tanggal Selesai</th>
							<th scope="col">Status</th>
							<th colspan="8" scope="col"></th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>




<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
	<div class="modal-dialog modal- modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-body p-0">
				<div class="card bg-secondary border-0 mb-0">
					<div class="card-header bg-transparent">
						<h3 class="card-heading text-center mt-2">Add Coupon</h3>
					</div>
					<div class="card-body px-lg-5 py-lg-5">
						<form role="form" action="#" method="POST" id="addCouponForm">

							<div class="form-group mb-3">
								<div class="input-group input-group-merge input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-box-2"></i></span>
									</div>
									<input name="name" class="form-control" placeholder="Nama kupon" type="text" maxlength="255" required>
								</div>
								<div class="text-danger err name-error"></div>
							</div>

							<div class="form-group mb-3">
								<div class="input-group input-group-merge input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-cog"></i></span>
									</div>
									<input name="code" class="form-control" placeholder="Kode kupon " type="text" maxlength="255" required>
								</div>
								<div class="text-danger err code-error"></div>
							</div>

							<div class="form-group mb-3">
								<div class="input-group input-group-merge input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text">Rp</span>
									</div>
									<input name="credit" class="form-control" placeholder="Potongan harga " type="text" required>
								</div>
								<div class="text-danger err credit-error"></div>
							</div>

							<div class="form-group mb-3">
								<div class="input-group input-group-merge input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
									</div>
									<input name="start_date" class="form-control" placeholder="Tanggal mulai" type="date" required>
								</div>
								<div class="text-danger err start-date-error"></div>
							</div>

							<div class="form-group mb-3">
								<div class="input-group input-group-merge input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
									</div>
									<input name="expired_date" class="form-control" placeholder="Tanggal kadaluarsa" type="date" required>
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
					<p>Are you sure want to delete this coupon ? All records will be erase and you cannot be undo.</p>
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
				<div class="card bg-secondary border-0 mb-0">
					<div class="card-header bg-transparent">
						<h3 class="card-heading text-center mt-2">Edit Kupon</h3>
					</div>
					<div class="card-body px-lg-5 py-lg-5">
						<form role="form" action="#" method="POST" id="editCouponForm">

							<input type="hidden" name="id" value="" class="edit-id">

							<div class="form-group mb-3">
								<div class="input-group input-group-merge input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-box-2"></i></span>
									</div>
									<input name="name" class="form-control edit-name" placeholder="Nama kupon" type="text" maxlength="255" required>
								</div>
								<div class="text-danger err name-error"></div>
							</div>

							<div class="form-group mb-3">
								<div class="input-group input-group-merge input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-cog"></i></span>
									</div>
									<input name="code" class="form-control edit-code" placeholder="Kode kupon " type="text" maxlength="255" required>
								</div>
								<div class="text-danger err code-error"></div>
							</div>

							<div class="form-group mb-3">
								<div class="input-group input-group-merge input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text">Rp</span>
									</div>
									<input name="credit" class="form-control edit-credit" placeholder="Potongan harga " type="text" required>
								</div>
								<div class="text-danger err credit-error"></div>
							</div>

							<div class="form-group mb-3">
								<div class="input-group input-group-merge input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
									</div>
									<input name="start_date" class="form-control edit-start" placeholder="Tanggal mulai" type="date" required>
								</div>
								<div class="text-danger err start-date-error"></div>
							</div>

							<div class="form-group mb-3">
								<div class="input-group input-group-merge input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
									</div>
									<input name="expired_date" class="form-control edit-expired" placeholder="Tanggal kadaluarsa" type="date" required>
								</div>
								<div class="text-danger err expired-date-error"></div>
							</div>

							<div class="form-group mb-3">
								<label for="av" class="form-control-label">
									<input type="checkbox" name="is_active" value="1" id="av"> Kupon ini masih tersedia
								</label>
							</div>

							<div class="text-left">
								<button type="button" class="btn btn-secondary my-4" data-dismiss="modal">Batal</button>
							</div>
							<div class="float-right" style="margin-top: -90px">
								<button type="submit" class="btn btn-primary my-4 editPackageBtn">Simpan</button>
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
							btn.html('Simpan');
						}, 1500);
					}
				}
			})
		});

		$('#deleteCoupon').submit(function(e) {
			e.preventDefault();

			var id = $('.deleteID').val();
			var btn = $('.btn-delete');

			btn.html('<i class="fa fa-spin fa-spinner"></i> Deketing...');

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
							btn.html('Hapus');
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
						return '<div class="text-left"><a href="#" data-id="' + row.id + '" class="btn btn-split btn-warning btn-sm mb-3 btnEdit"><i class="fa fa-edit"></i></a><a href="#" data-id="' + row.id + '" class="btn btn-split btn-danger btn-sm btnDelete"><i class="fa fa-trash"></i></a></div>';
					}
				}
			],
			"language": {
				"search": "Search :",
				"lengthMenu": "Showing _MENU_ data",
				"info": "Showing _START_ of _END_",
				"infoEmpty": "Tidak ada data yang ditampilkan",
				"infoFiltered": "(dari total _MAX_ data)",
				"zeroRecords": "No records found",
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
							btn.html('Add Coupons');
						}, 2000);
						setTimeout(() => {
							$('#addModal').modal('hide');
						}, 2222);

						table.ajax.reload();
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					btn.html('Add Coupons');

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
