<body>
	<div class="container-fluid">
		<div class="row no-gutter">
			<div class="col-md-6">
				<div class="login d-flex align-items-center py-5">
					<div class="container">
						<div class="row">
							<div class="col-md-10 mx-auto">
								<h3 class="login-heading mb-5 w-100">Create your account</h3>

								<form method="POST" action="<?= base_url('auth/register/verify') ?>">
									<div class="row">
										<div class="form-group col-6">
											<label for="username">Username</label>
											<input id="username" type="text" class="form-control" name="username" autofocus value="<?= set_value('username') ?>" />
											<?= form_error('username', '<div class="text-small text-danger">', '</div>') ?>
										</div>
										<div class="form-group col-6">
											<label for="password">Password</label>
											<input id="password" type="password" class="form-control" name="password" value="<?= set_value('password') ?>" />
											<?= form_error('password', '<div class="text-small text-danger">', '</div>') ?>
										</div>
									</div>

									<div class="form-group">
										<label>Nama Lengkap</label>
										<input type="text" id="name" name="name" class="form-control" />

										<?= form_error('name', '<div class="text-small text-danger">', '</div>') ?>
									</div>

									<div class="row">
										<div class="form-group col-6">
											<label for="phone_number">No. Hp</label>
											<input id="phone_number" type="text" class="form-control" name="phone_number" autofocus value="<?= set_value('phone_number') ?>" />
											<?= form_error('phone_number', '<div class="text-small text-danger">', '</div>') ?>
										</div>
										<div class="form-group col-6">
											<label for="email">Email</label>
											<input id="email" type="text" class="form-control" name="email" value="<?= set_value('email') ?>" />
											<?= form_error('email', '<div class="text-small text-danger">', '</div>') ?>
										</div>
									</div>

									<div class="form-group">
										<label>Alamat</label>
										<input type="text" id="address" name="address" class="form-control" value="<?= set_value('address') ?>" />
										<?= form_error('address', '<div class="text-small text-danger">', '</div>') ?>
									</div>

									<button class="btn1 text-uppercase mb-4" style="width: 100%;" type="submit">
										Register
									</button>
									<div>
										<p class="small text-center">
											Already have an account ? <a href="<?= base_url('auth') ?>">Login</a>
										</p>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="d-none d-md-flex col-md-4 col-lg-6">
				<img class="bg-image img-fluid" src="<?= base_url('assets/assets_auth') ?>/images/register.svg" alt="" />
			</div>
		</div>
	</div>


	<?php if ($this->session->flashdata('store_flash')) : ?>
		<script>
			swal({
				title: "Sukses",
				text: "<?php echo $this->session->flashdata('store_flash'); ?>",
				icon: 'success',
				button: "Ok"
			});
		</script>
	<?php endif; ?>
