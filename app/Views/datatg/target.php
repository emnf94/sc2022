<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>

<!-- DataTables -->
<link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Required datatable js -->
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<div class="col-sm-12">
    <div class="page-title-box">
        <div class="btn-group float-right">

        </div>
        <h4 class="page-title">Master Data Target </h4>
    </div>
</div>
<div class="col-sm-12">
    <div class="card m-b-30">

        <div class="card-body">
            <div class="card-title">
                <button type="button" class="btn btn-primary btn-sm tomboltambahtg">
                    <i class="fa fa-plus-circle"></i> Tambah Data Target
                </button>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#cetaktg">
                    <i class="fa fa-print"></i>
                </button>
            </div>
            <p class="card-text viewdata">

            </p>
        </div>
    </div>
</div>


<div class="viewmodal" style="display: none;"></div>
<div class="modal fade" id="cetaktg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Catak Data Target</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="div col">
                    <div class="card text-white bg-primary mb-3">

                        <div class="card-body bg-white">


                            <?= form_open('rtg/cetaktg', ['target' => '_blank']) ?>
                            <div class="form-group">
                                <label for="">Pilih Tanggal Awal</label>
                                <input type="date" name="tglatg" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Tanggal Akhir</label>
                                <input type="date" name="tglbtg" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-success">
                                    <i class="fa fa-print"> </i>Cetak Laporan
                                </button>
                            </div>
                            <?= form_close() ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        function datatg() {
            $.ajax({
                url: "<?= site_url('datatarget/ambildata') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewdata').html(response.data);
                },
                error: function(xhr, ajaxOption, throwError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        }
        $(document).ready(function() {
            datatg();

            $('.tomboltambahtg').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?= site_url('datatarget/formtambah') ?>",
                    dataType: "json",
                    success: function(response) {
                        $('.viewmodal').html(response.data).show();
                        $('#modaltambahtg').modal('show');
                    },
                    error: function(xhr, ajaxOption, throwError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            });

            $('.tombolcetak').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?= site_url('datatarget/cetak') ?>",
                    dataType: "json",
                    success: function(response) {
                        $('.viewmodal').html(response.data).show();
                        $('#modalcetak').modal('show');
                    },
                    error: function(xhr, ajaxOption, throwError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            });

        });
    </script>
    <?= $this->endSection('') ?>