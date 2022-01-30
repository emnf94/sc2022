<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>
<div class="col-sm-12">
    <div class="page-title-box">
        <div class="btn-group float-right">

        </div>
        <h4 class="page-title">Laporan Pendapatan Daerah</h4>
    </div>
</div>

<div class="col-lg-12">
    <div class="card m-b-30">

        <div class="card-body">
            <div class="card-title">

            </div>


            <div class="div col">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Laporan Pendapat Daerah</div>
                    <div class="card-body bg-white">


                        <?= form_open('report/cetakr', ['target' => '_blank']) ?>
                        <div class="form-group">
                            <label for="">Pilih Tanggal Awal</label>
                            <input type="date" name="tgla" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Pilih Tanggal Akhir</label>
                            <input type="date" name="tglb" class="form-control" required>
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
</div>
</div>


<?= $this->endSection('') ?>