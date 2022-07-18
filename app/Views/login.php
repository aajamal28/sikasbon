<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= APP_NAME . " | " . APP_VERSION ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/fontawesome-free/css/all.min.css') ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/sweetalert2/sweetalert2.min.css') ?>" />
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= site_url() ?>"><b>siKasBon</b> Apps.</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="<?= base_url('auth/verify') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="input-group mb-3">
                        <input type="text" name="usrNik" class="form-control" placeholder="Masukkan NIK" maxlength="6">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="usrPassword" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-1">
                    <a href="#">I forgot my password</a>
                </p>

                <div class="social-auth-links text-center mb-3">
                    <br/>
                    <!-- <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a> -->
                    <img src="<?= base_url('assets/img/sanoh1.jpg') ?>" width="250px">
                </div>
                <!-- /.social-auth-links -->


                <!-- <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/adminlte/plugin/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/adminlte/plugin/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/adminlte/js/adminlte.min.js') ?>"></script>
    <script src="<?= base_url('assets/adminlte/plugin/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script>
        $(document).ready(function() {
            <?php if (!empty(session()->getFlashdata('msg'))) { ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Oopss',
                    text: '<?= session()->getFlashdata('msg'); ?>',
                    showConfirmButton: true
                })
            <?php } ?>

        });
    </script>
</body>

</html>