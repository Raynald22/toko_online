<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Manage Categories</h6>
				</div>
				<div class="col-lg-6 col-5 text-right">
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item active" aria-current="page">Categories</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<a href="#" data-target="#addModal" data-toggle="modal" class="btn btn-sm btn-primary mb-3 mt-3 text-right"><i class="fas fa-plus"></i> Add Category</a>
</div>
<!-- Page content -->
<div class="container-fluid">


	<div class="card shadow mb-4">
		<!-- Card header -->
		<div class="card-header">
			<h3 class="mb-0 font-weight-bold text-primary">Categories</h3>
		</div>

		<div class="packageContainer pt-3 m-3">
			<!-- Light table -->
			<div class="table-responsive">
				<table class="table table-flush" id="packageList" style="width: 100%" cellspacing="0">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col"></th>
						</tr>
					</thead>

				</table>
			</div>
		</div>
	</div>




	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
		<div class="modal-dialog modal- modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-body p-0">
					<div class="card border-0 mb-0">
						<div class="card-header">
							<h3 class="card-heading text-center mt-2">Add Categories</h3>
						</div>
						<div class="card-body px-lg-5 py-lg-5">
							<form role="form" action="#" method="POST" id="addCategoryForm">

								<div class="form-group mb-3">
									<div class="input-group input-group-merge input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-box"></i></span>
										</div>
										<input name="name" class="form-control" placeholder="Name " type="text" minlength="4" maxlength="255" required>
									</div>
									<div class="text-danger err name-error"></div>
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
					<h6 class="modal-title" id="modal-title-default">Delete Category</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="#" id="deleteCategory" method="POST">

					<input type="hidden" name="id" value="" class="deleteID">

					<div class="modal-body">
						<p>Are you sure want to delete this category ? All records will be erase and you cannot be undo.</p>
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
							<h3 class="card-heading text-center mt-2">Edit Category</h3>
						</div>
						<div class="card-body px-lg-5 py-lg-5">
							<form role="form" action="#" method="POST" id="editCategoryForm">

								<input type="hidden" name="id" value="" class="edit-id">

								<div class="form-group mb-3">
									<div class="input-group input-group-merge input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-box"></i></span>
										</div>
										<input name="name" class="form-control edit-name" placeholder="Name" type="text" minlength="4" maxlength="100" required>
									</div>
									<div class="text-danger err name-error"></div>
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
					url: '<?php echo site_url('admin/products/category_api?action=view_data'); ?>',
					data: {
						id: id
					},
					success: function(res) {
						if (res.data) {
							var d = res.data;

							$('.edit-id').val(d.id);
							$('.edit-name').val(d.name);

							$('#editModal').modal('show');
						}
					}
				});
			});

			$('#editCategoryForm').submit(function(e) {
				e.preventDefault();

				var btn = $('.editPackageBtn');
				var id = $('.edit-id').val();
				var data = $(this).serialize();
				btn.html('<i class="fa fa-spin fa-spinner"></i> Saving...').attr('disabled', true);

				$.ajax({
					method: 'POST',
					url: '<?php echo site_url('admin/products/category_api?action=edit_category'); ?>',
					data: data,
					success: function(res) {
						if (res.code == 201) {
							btn.html('<i class="fa fa-check"></i> Berhasil').removeAttr('disabled');

							setTimeout(() => {
								$('#editModal').modal('hide');
								table.ajax.reload();
								btn.html('Save');
							}, 1500);
						}
					}
				})
			});

			$('#deleteCategory').submit(function(e) {
				e.preventDefault();

				var id = $('.deleteID').val();
				var btn = $('.btn-delete');

				btn.html('<i class="fa fa-spin fa-spinner"></i> Deleting...');

				$.ajax({
					method: 'POST',
					url: '<?php echo site_url('admin/products/category_api?action=delete_category'); ?>',
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
				"ajax": "<?php echo site_url('admin/products/category_api?action=list'); ?>",
				"columns": [{
						"data": "id"
					},
					{
						"data": "name"
					},
					{
						"mRender": function(data, type, row) {
							return '<div class="text-center"><a href="#" data-id="' + row.id + '" class="btn btn-warning btn-sm mr-3 btnEdit"><i class="fa fa-edit"></i></a><a href="#" data-id="' + row.id + '" class="btn btn-danger btn-sm btnDelete"><i class="fa fa-trash"></i></a></div>';
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


			$('#addCategoryForm').submit(function(e) {
				e.preventDefault();

				var data = $(this).serialize();
				var btn = $('.addPackageBtn');

				btn.html('<i class="fa fa-spin fa-spinner"></i> Adding...');
				$('.err').empty();

				$.ajax({
					method: 'POST',
					url: '<?php echo site_url('admin/products/category_api?action=add_category'); ?>',
					data: data,
					context: this,
					success: function(res) {
						if (res.data) {
							btn.html('<i class="fa fa-check"></i> Success!');

							setTimeout(function() {
								$('#addCategoryForm .form-control').val(null);
								btn.html('Add Category');
							}, 2000);
							setTimeout(() => {
								$('#addModal').modal('hide');
							}, 2222);

							table.ajax.reload();
						}
					},
					error: function(xhr, ajaxOptions, thrownError) {
						btn.html('Add Category');

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
