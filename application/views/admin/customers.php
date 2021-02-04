<!-- Page content -->
<div class="container-fluid mt--6">
	<div class="row">
		<div class="col">
			<div class="card">
				<!-- Card header -->
				<div class="card-header">
					<h3 class="mb-0">Pelanggan</h3>
				</div>

				<div class="card-body p-0">
					<div class="table-responsive">
						<table class="table align-items-center table-flush" id="customerList" style="width: 100%">
							<thead class="thead-light">
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Foto</th>
									<th scope="col">Nama</th>
									<th scope="col">Email</th>
									<th scope="col">No. HP</th>
									<th scope="col">Alamat</th>
									<th scope="col"></th>
								</tr>
							</thead>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
		<div class="modal-dialog modal-modal-dialog-centered modal-" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title" id="modal-title-default">Hapus Pelanggan?</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="#" id="deleteCustomer" method="POST">

					<input type="hidden" name="id" value="" class="deleteID">

					<div class="modal-body">
						<p>Yakin ingin pelanggan ini? Semua data seperti data profil, order dan pembayaran juga akan dihapus.</p>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger btn-delete">Hapus</button>
						<button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Batal</button>
					</div>
				</form>
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

			$('#deleteCustomer').submit(function(e) {
				e.preventDefault();

				var id = $('.deleteID').val();
				var btn = $('.btn-delete');

				btn.html('<i class="fa fa-spin fa-spinner"></i> Menghapus...');

				$.ajax({
					method: 'POST',
					url: '<?php echo site_url('admin/customers/api/delete'); ?>',
					data: {
						id: id
					},
					success: function(res) {
						if (res.code == 204) {
							btn.html('<i class="fa fa-check"></i> Terhapus!');

							setTimeout(() => {
								$('#deleteModal').modal('hide');
								table.ajax.reload();
								btn.html('Hapus');
							}, 1500);
						}
					}
				})
			});

			var table = $('#customerList').DataTable({
				"ajax": "<?php echo site_url('admin/customers/api/customers'); ?>",
				"columns": [{
						"data": "id"
					},
					{
						"data": function(data, type, row) {
							return '<img src="' + data.profile_picture + '" class="img img-fluid rounded" style="width: 40px;">';
						}
					},
					{
						"data": function(data, type, row) {
							var url = window.location.href.split('?')[0].replace('#', '');
							url = url + '/view/' + data.id;

							return '<a href="' + url + '">' + data.name + '</a>';
						}
					},
					{
						"data": "email"
					},
					{
						"data": "phone_number"
					},
					{
						"data": "address"
					},
					{
						"mRender": function(data, type, row) {
							var url = window.location.href.split('?')[0].replace('#', '');
							url = url + '/edit/' + row.id;

							return '<div class="text-right"><a href="#" data-id="' + row.id + '" class="btn btn-danger btn-sm btnDelete"><i class="fa fa-trash"></i></a></div>';
						}
					}
				],
				"language": {
					"search": "Cari:",
					"lengthMenu": "Menampilkan _MENU_ data",
					"info": "Menampilkan _START_ sampai _END_ data dari _TOTAL_ data",
					"infoEmpty": "Tidak ada data yang ditampilkan",
					"infoFiltered": "(dari total _MAX_ data)",
					"zeroRecords": "Tidak ada hasil pencarian ditemukan",
					"paginate": {
						"first": "&laquo;",
						"last": "&raquo;",
						"next": "&rsaquo;",
						"previous": "&lsaquo;"
					},
				}
			});
		});
	</script>
