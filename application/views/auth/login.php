<body>
	<div class="container-fluid">
		<div class="row no-gutter">
			<div class="d-none d-md-flex col-md-4 col-lg-6">
				<img class="bg-image img-fluid" src="<?= base_url('assets/assets_auth') ?>/images/login.svg" alt="login" />
			</div>
			<div class="col-md-8 col-lg-6">
				<div class="login d-flex align-items-center py-5">
					<div class="container">
						<div class="row">
							<div class="col-md-9 col-lg-8 mx-auto">
								<h3 class="login-heading mb-4 w-100">
									Login into your account
								</h3>
								<?php if ($flash_message) : ?>
									<div class="flash-message">
										<?php echo $flash_message; ?>
									</div>
								<?php endif; ?>

								<?php if ($redirection) : ?>
									<div class="text-danger mb-4">
										Please login to continue...
									</div>
								<?php endif; ?>

								<form method="POST" action="<?= base_url('auth/login/do_login') ?>">
									<div class="form-label-group">
										<label><i class="fas fa-user"></i>Username</label>
										<input type="text" id="username" class="form-control" name="username" value="<?= set_value('username') ?>" />
									</div>
									<?= form_error('username', '<div class="text-small text-danger mb-3">', '</div>') ?>

									<div class="form-label-group">
										<label><i class="fas fa-lock"></i>Password</label>
										<input type="password" id="password" class="form-control" name="password" />
									</div>
									<?= form_error('password', '<div class="text-small text-danger">', '</div>') ?>
									<button class="btn1 text-uppercase mb-4" type="submit">
										Login
									</button>
									<div>
										<p class="small">
											Already have an account ? <a href="<?= base_url('auth/register') ?>">Register</a>
										</p>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php if ($this->session->flashdata('login_flash')) : ?>
		<script>
			swal({
				title: "Sukses",
				text: "<?php echo $this->session->flashdata('login_flash'); ?>",
				icon: 'success',
				button: "Ok"
			});
		</script>
	<?php endif; ?>

	<?php if ($this->session->flashdata('wrong_pass')) : ?>
		<script>
			swal({
				title: "Error",
				text: "<?php echo $this->session->flashdata('wrong_pass'); ?>",
				icon: 'error',
				button: "Ok"
			});
		</script>
	<?php endif; ?>

	<?php if ($this->session->flashdata('not_registered')) : ?>
		<script>
			swal({
				title: "Error",
				text: "<?php echo $this->session->flashdata('not_registered'); ?>",
				icon: 'error',
				button: "Ok"
			});
		</script>
	<?php endif; ?>

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

	<?php if ($this->session->flashdata('logout')) : ?>
		<script>
			swal({
				title: "Sukses",
				text: "<?php echo $this->session->flashdata('logout'); ?>",
				icon: 'success',
				button: "Ok"
			});
		</script>
	<?php endif; ?>
