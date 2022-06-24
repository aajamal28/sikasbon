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
                    <h3>Approval Request</h3>
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
                            <h3 class="card-title">Kas Bon</h3>
                        </div>
                        <form class="form-horizontal form" method="POST" action="<?= base_url(); ?>/transaction/request/process" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="aprOrder" class="col-sm-2 col-form-label text-right">Ref.</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="aprOrder" name="aprOrder" value="<?= $order ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="aprDate" class="col-sm-2 col-form-label text-right">Tanggal</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="aprDate" name="aprDate" value="<?= date('Y-m-d H:i:s') ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="aprOtp" class="col-sm-2 col-form-label text-right">OTP</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" id="aprOtp" name="aprOtp" require>
                                    </div>
                                </div>
                                <input type="hidden" name="status" value="<?= $status ?>">
                                <input type="hidden" name="mode" value="<?= $mode ?>">
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-info">Proses</button>
                                <button type="reset" class="btn btn-warning">Batal</button>
                            </div>
                        </form>
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
    $(document).ready( function(){
        var code = <?= $otp ?>;
        $('.form').submit(function(){
            var otp = $('#aprOtp').val();

            if(otp != code){
                Swal.fire({
                icon: 'error',
                title: 'Ooppss!!!',
                text: 'OTP tidak valid',
                showConfirmButton: true
            })
                return false;
                $('#aprOtp').focus();
            }
        });
    });
</script>
<?= $this->endSection() ?>