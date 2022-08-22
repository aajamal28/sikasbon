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
                    <h3>Laporan Kas dan Mutasi</h3>
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
                <div class="col-lg-6 col-12">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5>Saldo Cash saat ini</h5>
                            <h3 class="text-right">Rp. <?= number_format($saldoCash['sld_saldo']) ?></h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">
                            Details <i class="fas fa-arrow-circle-right"></i>
                        </a> -->
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <!-- small card -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h5>Saldo Advance saat ini</h5>
                            <h3 class="text-right">Rp. <?= number_format($saldoAdvance['sld_saldo']) ?></h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">
                            Details <i class="fas fa-arrow-circle-right"></i>
                        </a> -->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-border card-info">
                        <div class="card-header">
                            <h4 class="card-title">Mutasi Kas Periode <?= date('F', mktime(0, 0, 0, date('m'), 10)) . " " . date('Y') ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tbMutasi" class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center">Account</th>
                                            <th rowspan="2">Deskripsi</th>
                                            <th rowspan="2">Reference</th>
                                            <th rowspan="2">Tanggal</th>
                                            <th colspan="2" class="text-center">IDR</th>
                                            <th rowspan="2" class="text-center">Saldo</th>
                                        </tr>
                                        <tr>
                                            <th>COA</th>
                                            <th>Desc.</th>
                                            <th>Debit</th>
                                            <th>Credit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($trans as $trn) :
                                        ?>
                                            <tr>
                                                <td><?= $trn['trn_account'] ?></td>
                                                <td><?= $trn['coa_desc'] ?></td>
                                                <td width="25%"><?= $trn['trn_desc'] ?></td>
                                                <td><?= $trn['trn_reff'] ?></td>
                                                <td width="5%"><?= $trn['trn_date'] ?></td>
                                                <td class="text-right">
                                                    <?php
                                                    if ($trn['trn_type'] == 'D') echo number_format($trn['trn_amount']);
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php
                                                    if ($trn['trn_type'] == 'C') echo number_format($trn['trn_amount']);
                                                    ?>
                                                </td>
                                                <td class="text-right"><?= number_format($trn['trn_saldo']) ?></td>
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
        $("#tbMutasi").DataTable({
            order: [[4, 'asc']],
        });
    });
</script>
<?= $this->endSection() ?>