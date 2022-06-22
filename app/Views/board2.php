<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= APP_NAME . " | " . APP_COMPANY ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/fontawesome-free/css/all.min.css') ?>" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/css/adminlte.css') ?>" />

</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark navbar-inverse">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <img src="<?= base_url('assets/img/sanoh1-2.jpg') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light text-primary"><?= APP_NAME ?></span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link text-primary" href="#">
                            <i class="fas fa-sign-in-alt"></i> Login

                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> MILKRUN MONITORING <small>CONTROL BOARD</SMALL></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">DOCKING 1</a></li>
                                <li class="breadcrumb-item"><a href="#"><?= date('Y-m-d ') ?></a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">DOCKING AREA 1</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the card's
                                        content.
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Customer</th>
                                                    <th>Route</th>
                                                    <th>Logistic Partner</th>
                                                    <th>Cycle</th>
                                                    <th>Arrival</th>
                                                    <th>Departure</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="rowData">
                                                <?php
                                                for ($i = 0; $i < 15; $i++) :
                                                ?>
                                                    <tr>
                                                        <td>PT. TMMIN</td>
                                                        <td>N1</td>
                                                        <td>Armas Logistic </td>
                                                        <td>2</td>
                                                        <td>2022-01-31 14:20</td>
                                                        <td>2022-01-31 14:40</td>
                                                        <td></td>
                                                    </tr>
                                                <?php
                                                endfor;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- /.card -->
                        </div>

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; <?= date('Y') ?> <a href="http://www.sanohindonesia.co.id/">PT. Sanoh Indonesia</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/adminlte/plugin/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/adminlte/plugin/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/adminlte/js/adminlte.min.js') ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var $el = $(".table-responsive");

            function anim() {
                var st = $el.scrollTop();
                var sb = $el.prop("scrollHeight") - $el.innerHeight();
                $el.animate({
                    scrollTop: st < sb / 2 ? sb : 0
                }, 24000, anim);
            }

            function stop() {
                $el.stop();
            }
            
            anim();
            $el.hover(stop, anim);
        })
    </script>
</body>

</html>