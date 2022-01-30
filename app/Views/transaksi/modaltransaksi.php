<div class="modal fade" id="modaltransaksi" data-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Input Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('transaksi/simpandata', ['class' => 'formtr']);  ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Rekening</label>
                    <div class="col-sm-6">
                        <select id="idrek" class="form-control idrek" name="idrek" required>
                            <option selected>Pilih Kode Rekening...</option>

                            <?php foreach ($tampildata as $row) : ?>
                                <option value="<?= $row['idrek'] ?>">
                                    <label for=""><?= $row['reknorek'] ?><p> - </p><strong><?= $row['reknama'] ?></strong></label>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Via Bayar</label>
                    <div class="col-sm-6">
                        <select id="via" class="form-control" name="via" required>
                            <option selected>Silahkan pilih...</option>


                            <option value="Bendahara"> Bendahara </option>
                            <option value="Bank"> Bank </option>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jumlah Bayar(Rp.)</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="jmlbayar" name="jmlbayar">
                        <div class="invalid-feedback erorJmlbayar"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal pembayaran</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="tglbayar" name="tglbayar">

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class=" col-sm-4">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<script>
    $(".idrek").select2({
        width: '100%',


    });

    $(document).ready(function() {
        $('.formtr').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disabled');
                    $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {

                    $('.btnsimpan').removeAttr('disable');
                    $('.btnsimpan').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {

                        if (response.error.jmlbayar) {
                            $('#jmlbayar').addClass('is-invalid');
                            $('.erorJmlbayar').html(response.error.target);
                        } else {
                            $('#jmlbayar').removeClass('is-invalid');
                            $('.erorJmlbayar').html('');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses
                        })

                        $('#modaltransaksi').modal('hide');
                        datatrf();

                    }
                },
                error: function(xhr, ajaxOption, throwError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
</script>