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

								<?php if ($this->session->flashdata('pesan_sukses')) : ?>
                                    <script>
                                        swal({
                                            title: "Sukses",
                                            text: "<?php echo $this->session->flashdata('pesan_sukses'); ?>",
                                            icon: 'success',
                                            button: "Ok"
                                        });
                                    </script>
                                <?php endif; ?>

								<?php if ($this->session->flashdata('pesan_error')) : ?>
                                    <script>
                                        swal({
                                            title: "Error",
                                            text: "<?php echo $this->session->flashdata('pesan_error'); ?>",
                                            icon: 'error',
                                            button: "Ok"
                                        });
                                    </script>
                                <?php endif; ?>

								<?php if ($this->session->flashdata('pesan_wrongpass')) : ?>
                                    <script>
                                        swal({
                                            title: "Error",
                                            text: "<?php echo $this->session->flashdata('pesan_wrongpass'); ?>",
                                            icon: 'error',
                                            button: "Ok"
                                        });
                                    </script>
                                <?php endif; ?>
                                <form method="POST" action="<?= base_url('auth/login') ?>">
                                    <div class="form-label-group">
                                        <label for="username"><i class="fas fa-user"></i>Username</label>
                                        <input type="text" id="username" class="form-control" name="username" />
                                        <?= form_error('username', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>

                                    <div class="form-label-group">
                                        <label for="password"><i class="fas fa-lock"></i>Password</label>
                                        <input type="password" id="password" class="form-control" name="password" />
                                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        <?= form_error('password', '<div class="text-small text-danger">', '</div>') ?>
                                    </div>
                                    <button class="btn1 text-uppercase mb-4" type="submit">
                                        Login
                                    </button>
                                    <div>
                                        <p class="small">
                                            Already have an account ? <a href="<?= base_url('register') ?>">Register</a>
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
