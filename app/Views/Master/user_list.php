<?= $this->extend('layout/layout') ?>

<?= $this->section('stylecustom') ?>
<!-- sweet alert 2-->
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/sweetalert2/sweetalert2.min.css') ?>" /> 
<!-- datatable -->
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Overview Transaction</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= ucfirst($uri[0]) ?></a></li>
                        <li class="breadcrumb-item active"><?= ucfirst($uri[1]) ?></a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-border card-primary">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="tbTrans" class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Divisi</th>
                                            <th>Email</th>
                                            <th>Phone / Telegram ID.</th>
                                            <th>Role</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($user as $usr) :
                                        ?>
                                            <tr>
                                                <td><?= $usr['usr_id']  ?></td>
                                                <td><?= $usr['usr_name']  ?></td>
                                                <td><?= $usr['dv_desc']  ?></td>
                                                <td><?= $usr['usr_mail']  ?></td>
                                                <td><?= $usr['usr_phone'] . " / " . $usr['usr_telegram']  ?></td>
                                                <td><?php
                                                    switch ($usr['usr_role']) {
                                                        case "R00":
                                                            echo "Administrator";
                                                            break;
                                                        case "R01":
                                                            echo "User";
                                                            break;
                                                        case "R02":
                                                            echo "Manager";
                                                            break;
                                                        case "R03":
                                                            echo "Kasir";
                                                            break;
                                                        case "R04":
                                                            echo "Acc Ldr.";
                                                            break;
                                                        case "R05":
                                                            echo "Acc. Mgr";
                                                            break;
                                                        case "R06":
                                                            echo "Director";
                                                            break;
                                                    }

                                                    ?></td>
                                                <td><a href="<?= site_url() ?>master/user/<?= $usr['usr_id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></a></td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- /.content -->
</div>

<?= $this->endSection() ?>

<?= $this->section('jscustom') ?>
<!-- autoscroll -->
<script src="<?= base_url('assets/js/jquery.autoscroll.js') ?>"></script>
<!-- sweet alert 2-->
<script src="<?= base_url('assets/adminlte/plugin/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- datatable -->
<script src="<?= base_url('assets/adminlte/plugin/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        $("#tbTrans").DataTable();

        <?php if (!empty(session()->getFlashdata('success'))) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '<?= session()->getFlashdata('success'); ?>',
                timer: 3000,
                showConfirmButton: false
            })
        <?php } ?>

    });
</script>

<?= $this->endSection() ?>