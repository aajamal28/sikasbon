<?= $this->extend('layout/layout') ?>

<?= $this->section('stylecustom') ?>
<!-- sweet alert 2-->
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/sweetalert2/sweetalert2.min.css') ?>" />
<!-- datatable -->
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<style>
    /* hide-scrollbar::-webkit-scrollbar {
     display: none;
    } */

    .data-list {
        height: 750px;
        overflow-y: hidden;

    }

    .blink {
        animation: blink 1s steps(1, end) infinite;
    }

    @keyframes blink {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Register User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                        <!-- <div class="card-header">
                            <h3 class="card-title">Kas Bon</h3>
                        </div> -->
                        <form class="form-horizontal" method="POST" action="<?= base_url(); ?>/master/user/save" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="usrId" class="col-sm-2 col-form-label text-right">NIK</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="usrId" name="usrId" maxlength="6" require>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="usrName" class="col-sm-2 col-form-label text-right">Nama</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="usrName" name="usrName" require>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="usrDiv" class="col-sm-2 col-form-label text-right">Divisi</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="usrDiv" id="usrDiv" required>
                                            <option value="">- Pilih-</option>
                                            <?php
                                            foreach ($divisi as $div) :
                                            ?>
                                                <option value="<?= $div['dv_id'] ?>"><?= $div['dv_desc'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="usrMail" class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="usrMail" name="usrMail" require>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="usrPhone" class="col-sm-2 col-form-label text-right">No. Hp</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="usrPhone" name="usrPhone" require>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="usrTelegram" class="col-sm-2 col-form-label text-right">Telegram ID.</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="usrTelegram" name="usrTelegram" require>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="usrRole" class="col-sm-2 col-form-label text-right">Type</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="usrRole" id="usrRole" required>
                                            <option value="">- Pilih-</option>
                                            <?php
                                            foreach ($role as $type) :
                                            ?>
                                                <option value="<?= $type['code'] ?>"><?= $type['name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="usrDate" class="col-sm-2 col-form-label text-right">Tanggal</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="usrDate" name="usrDate" value="<?= date('Y-m-d H:i:s') ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Simpan</button>
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
<!-- component -->
<script src="<?= base_url('assets/js/component/main2-1.js') ?>"></script>

<?= $this->endSection() ?>