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
                        <div class="card-header">
                            <h3 class="card-title">Kas Bon</h3>
                        </div>
                        <form class="form-horizontal" method="POST" action="<?= base_url(); ?>/transaction/request/save" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="trNomor" class="col-sm-2 col-form-label text-right">Nomor</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control text-center" id="trNomor" placeholder="Generate by sistem" readonly>
                                    </div>
                                    <!--<div class="col-sm-3">
                                        <input type="text" class="form-control text-right" id="trNomor" name="trNomor" value="" readonly>
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-control text-center" value="/" readonly>
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-control" id="trMonth" name="trMonth" value="<?= date('m') ?>" readonly>
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-control text-center" value="/" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="trYear" name="trYear" value="<?= date('Y') ?>" readonly>
                                    </div> -->
                                </div>
                                <div class="form-group row">
                                    <label for="trDate" class="col-sm-2 col-form-label text-right">Tanggal</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="trDate" name="trDate" value="<?= date('Y-m-d H:i:s') ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="trCredit" class="col-sm-2 col-form-label text-right">Nominal</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" class="form-control text-right nominal" name="trCredit" id="trCredit" placeholder="Input Nominal kasbon" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="trType" class="col-sm-2 col-form-label text-right">Type</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="trType" id="trType" required>
                                            <option value="">- Pilih-</option>
                                            <?php
                                            foreach ($tr_type as $type) :
                                            ?>
                                                <option value="<?= $type['code'] ?>"><?= $type['name'] ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="trDesc" class="col-sm-2 col-form-label text-right">Keperluan</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="trDesc" id="trDesc" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="trUser" class="col-sm-2 col-form-label text-right">User</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="trUser" name="trUser" value="002354" readonly>
                                    </div>
                                    <label for="trDept" class="col-sm-1 col-form-label ">Divisi</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="trDept" name="trDept" value="D01" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
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
<script>
    $(document).ready(function() {
        $("#exampleSelectBorder").change(function() {
            var tes = document.getElementById("exampleSelectBorder").value;
            if (tes != 1) {
                var iss = document.getElementById("inputSample");
                iss.setAttribute("style", "display : block");
                var ist = document.getElementById("inputSampleOpt");
                ist.setAttribute("style", "display : none");
            } else {
                var iss = document.getElementById("inputSample");
                iss.setAttribute("style", "display : none");
                var ist = document.getElementById("inputSampleOpt");
                ist.setAttribute("style", "display : block");
            }
        });
    });
</script>

<?= $this->endSection() ?>