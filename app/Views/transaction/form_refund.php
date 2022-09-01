<?= $this->extend('layout/layout') ?>

<?= $this->section('stylecustom') ?>
<!-- sweet alert 2-->
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/sweetalert2/sweetalert2.min.css') ?>" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Refund Request</h3>
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
                <div class="col-lg-8">
                    <div class="card card-border card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Data Permintaan</h3>
                        </div>
                        <form class="form-horizontal form">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="trOrder" class="col-sm-2 col-form-label text-right">Nomor Request</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="trOrder" name="trOrder" value="<?= $order['rq_no'] . "/" . $order['rq_month'] . "/" . $order['rq_year'] ?>" readonly>
                                        <input type="hidden" name="trOrderId" value="<?= $order['rq_id'] ?>">
                                    </div>
                                    <label for="trOrderDate" class="col-sm-2 col-form-label text-right">Tanggal</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="trOrderDate" name="trOrderDate" value="<?= $order['rq_date'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="aprOtp" class="col-sm-2 col-form-label text-right">Keperluan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="trOrderDesc" name="trOrderDesc" value="<?= $order['rq_desc'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="trOrderAmount" class="col-sm-2 col-form-label text-right">Nominal</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control text-right" id="trOrderAmount" name="trOrderAmount" value="Rp. <?= number_format($order['rq_amount']) ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="trOrderUsr" class="col-sm-2 col-form-label text-right">Requester</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="trOrderUsr" name="trOrderUsr" value="<?= $order['usr_name'] ?>" readonly>
                                    </div>
                                    <label for="trOrderDiv" class="col-sm-2 col-form-label text-right">Requester</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="trOrderDiv" name="trOrderDiv" value="<?= $order['dv_desc'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card card-border card-info">
                        <div class="card-header">
                            <h3 class="card-title">FORM NORMATIF BIAYA ENTERTAINT</h3>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                <div class="table-responsive">
                                    <table border="1" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="5%" class="text-center">No</th>
                                                <th width="25%" class="text-center">Nama</th>
                                                <th width="35%" class="text-center">Perusahaan/Instansi</th>
                                                <th width="20%" class="text-center">Posisi</th>
                                                <!-- <th width="10%"></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input name="rfNoEmp[]" type="text" class="form-control" id="rfNo[]" value="1" readonly></td>
                                                <td><input name="rfNameEmp[]" type="text" class="form-control" id="rfName[]"></td>
                                                <td><input name="rfCompEmp[]" type="text" class="form-control" id="rfComp[]"></td>
                                                <td><input name="rfPostEmp[]" type="text" class="form-control" id="rfPost[]"></td>
                                                <!-- <td><button class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button></td> -->
                                            </tr>
                                            <tr>
                                                <td><input name="rfNoEmp[]" type="text" class="form-control" id="rfNo[]" value="2" readonly></td>
                                                <td><input name="rfNameEmp[]" type="text" class="form-control" id="rfName[]"></td>
                                                <td><input name="rfCompEmp[]" type="text" class="form-control" id="rfComp[]"></td>
                                                <td><input name="rfPostEmp[]" type="text" class="form-control" id="rfPost[]"></td>
                                                <!-- <td><button class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button></td> -->
                                            </tr>
                                            <tr>
                                                <td><input name="rfNoEmp[]" type="text" class="form-control" id="rfNo[]" value="3" readonly></td>
                                                <td><input name="rfNameEmp[]" type="text" class="form-control" id="rfName[]"></td>
                                                <td><input name="rfCompEmp[]" type="text" class="form-control" id="rfComp[]"></td>
                                                <td><input name="rfPostEmp[]" type="text" class="form-control" id="rfPost[]"></td>
                                                <!-- <td><button class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button></td> -->
                                            </tr>
                                            <tr>
                                                <td><input name="rfNoEmp[]" type="text" class="form-control" id="rfNo[]" value="4" readonly></td>
                                                <td><input name="rfNameEmp[]" type="text" class="form-control" id="rfName[]"></td>
                                                <td><input name="rfCompEmp[]" type="text" class="form-control" id="rfComp[]"></td>
                                                <td><input name="rfPostEmp[]" type="text" class="form-control" id="rfPost[]"></td>
                                                <!-- <td><button class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button></td> -->
                                            </tr>
                                            <tr>
                                                <td><input name="rfNoEmp[]" type="text" class="form-control" id="rfNo[]" value="5" readonly></td>
                                                <td><input name="rfNameEmp[]" type="text" class="form-control" id="rfName[]"></td>
                                                <td><input name="rfCompEmp[]" type="text" class="form-control" id="rfComp[]"></td>
                                                <td><input name="rfPostEmp[]" type="text" class="form-control" id="rfPost[]"></td>
                                                <!-- <td><button class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button></td> -->
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr />
                                    <div class="form-group row">
                                        <label for="aprOtp" class="col-sm-1 col-form-label text-right">Tanggal</label>
                                        <div class="col-sm-4">
                                            <input type="datetime" class="form-control" id="rfDate" name="rfDate" value="<?= date('Y-m-d H:i:s') ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="aprOtp" class="col-sm-1 col-form-label text-right">Tempat</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="rfVenue" name="rfVenue" placeholder="Tempat">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="aprOtp" class="col-sm-1 col-form-label text-right">Total</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="rfRefund" name="rfRefund" placeholder="Total Pengeluaran">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="aprOtp" class="col-sm-1 col-form-label text-right">Keterangan Kepentingan</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" id="rfRemark" name="rfRemark">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
<script>
    $(document).ready(function() {

    });
</script>
<?= $this->endSection() ?>