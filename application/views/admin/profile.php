<!-- Page content -->
<div class="container-fluid mt--6">
	<?php echo form_open_multipart('admin/settings/profile_update'); ?>

	<div class="row">
		<div class="col-md-8">
			<div class="card-wrapper">
				<div class="card">
					<div class="card-header">
						<h3 class="mb-0">Identity</h3>
						<?php if ($flash) : ?>
							<span class="float-right text-success font-weight-bold" style="margin-top: -30px">
								<?php echo $flash; ?>
							</span>
						<?php endif; ?>
					</div>

					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="name">Name :</label>
									<input type="text" name="name" value="<?php echo set_value('name', get_admin_name()); ?>" class="form-control" id="name" minlength="4" maxlength="255" required>
									<?php echo form_error('name'); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="email">Email :</label>
									<input type="email" name="email" value="<?php echo set_value('email', $user->email); ?>" class="form-control" id="email" minlength="10" maxlength="255" required>
									<?php echo form_error('email'); ?>
								</div>
							</div>
						</div>



						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="username">Username :</label>
									<input type="text" name="username" value="<?php echo set_value('username', $user->username); ?>" class="form-control" id="username" minlength="4" maxlength="16" required>
									<?php echo form_error('username'); ?>
								</div>

							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="password">Password :</label>
									<input type="password" name="password" value="" class="form-control" id="password" minlength="4" maxlength="100">
									<p class="text-muted"><small>Leave blank if not any change</small></p>
									<?php echo form_error('password'); ?>
								</div>
							</div>
						</div>



					</div>

				</div>
			</div>

			<div class="card">
				<div class="card-body  d-none d-md-block">
					<input type="submit" class="btn btn-primary float-right" value="Save">
				</div>
			</div>

		</div>
		<div class="col-md-4">
			<div class="card card-profile">
				<img src="<?php echo get_admin_image(); ?>" alt="<?php echo get_admin_name(); ?>" class="img-fluid card-img-top">
				<div class="row justify-content-center">
					<div class="col-lg-3 order-lg-2">
						<div class="card-profile-image">
							<a href="#" class="changeProfile">
								<img src="<?php echo get_admin_image(); ?>" class="img-fluid rounded-circle">
							</a>
						</div>
					</div>
				</div>

				<div class="card-body pt-0" style="margin-top: 8px">

					<div class="text-center">
						<h5 class="h3">
							<?php echo get_admin_name(); ?>
						</h5>
						<div class="h5 mt-4">
							<i class="fa fa-at mr-2"></i><?php echo $user->email; ?>
						</div>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-body d-block d-sm-none">
					<input type="submit" class="btn btn-primary float-right" value="Save">
				</div>
			</div>

		</div>
	</div>
	<input type="file" id="fileSelect" name="picture" class="d-none">

	</form>

	<script>
		$('.changeProfile').click(function(e) {
			$('#fileSelect').click();
		})
	</script>
