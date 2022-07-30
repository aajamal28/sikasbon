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
                    <h3>Pembayaran Request</h3>
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
                        <form class="form-horizontal form" method="POST" action="<?= base_url(); ?>/transaction/request/paidprocess" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="aprOrder" class="col-sm-2 col-form-label text-right"></label>
                                    <div class="col-sm-10 text-success text-md">
                                        <p>Transaksi pembayaran Petty cash</p>
                                    </div>
                                </div>
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
                                <div class="form-group row">
                                    <label for="trAmount" class="col-sm-2 col-form-label text-right">Nominal Bayar</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control text-right" id="trAmount" name="trAmount" placeholder="Input nominal Bayar" require>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="trOtp" class="col-sm-2 col-form-label text-right">OTP</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="trOtp" name="trOtp" placeholder="Input OTP anda" require>
                                    </div>
                                </div>
                                <br/>
                                <button type="submit" name="submit" class="btn btn-info">Simpan</button>
                                <button type="reset" class="btn btn-warning">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-border card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Kolom Persetujuan</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Disetujui</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $n = 1;
                                    foreach ($approval as $apr) :
                                    ?>
                                        <tr>
                                            <td><?= $n ?></td>
                                            <td><?= $apr['apr_date'] ?></td>
                                            <td><?= $apr['usr_name'] ?></td>
                                            <td><?= $apr['apr_note'] ?></td>
                                        </tr>
                                    <?php
                                        $n++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
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
        var code = <?= $otp ?>;
        $('.form').submit(function() {
            var otp = $('#trOtp').val();

            if (otp != code) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ooppss!!!',
                    text: 'OTP tidak valid',
                    showConfirmButton: true
                })
                return false;
                $('#trOtp').focus();
            }
        });
    });
</script>
<?= $this->endSection() ?>