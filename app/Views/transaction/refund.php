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
                        <div class="card-header">
                            <h3 class="card-title">Kasbon Outstanding</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tbTrans" class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th width="10%">Nomor</th>
                                            <th width="10%">Tanggal</th>
                                            <th width="30%">Keperluan</th>
                                            <th width="15%">Nominal</th>
                                            <th>User / Dept.</th>
                                            <th width="10%">Status</th>
                                            <th width="10%">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($request as $req) :
                                            if ($req['rq_status'] == '550') :
                                        ?>
                                                <tr>
                                                    <td><?= $req['rq_no'] . "/" . $req['rq_month'] . "/" . $req['rq_year'] ?></td>
                                                    <td><?= $req['rq_date'] ?></td>
                                                    <td><?= $req['rq_desc'] ?></td>
                                                    <td><?= number_format($req['rq_amount']) ?></td>
                                                    <td><?= $req['usr_name'] . " / " . $req['dv_desc'] ?></td>
                                                    <td><?= $req['st_desc'] . " / " . $req['st_desc2'] ?></td>
                                                    <td>
                                                        <a href="<?= site_url()?>transaction/refund/<?= $req['rq_id'] ?>/create" class="btn btn-warning btn-md"><i class="fas fa-share"></i></a>
                                                    </td>
                                                </tr>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            
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
        $("#tbTrans").DataTable({
            "order": [
                [1, 'desc']
            ]
        });


        $('.alert_btn').on('click', function() {
            var getLink = $(this).attr('href');
            var mode = $(this).attr('data-mode');
            if (mode == 'R') {
                title = "Cancel request ini?";
            } else if (mode == 'A') {
                title = "Approve Request ini?"
            } else {
                title = "Proses request ini?"
            }
            Swal.fire({
                title: title,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya',
                cancelButtonColor: '#d33',
                cancelButtonText: "Tidak"

            }).then(result => {
                if (result.isConfirmed) {
                    window.location.href = getLink
                }
            })
            return false;
        });

        <?php if (!empty(session()->getFlashdata('success'))) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '<?= session()->getFlashdata('success'); ?>',
                timer: 4500,
                showConfirmButton: false
            })
        <?php } ?>

    });
</script>

<?= $this->endSection() ?>