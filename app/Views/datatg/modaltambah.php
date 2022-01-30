<div class="modal fade" id="modaltambahtg" data-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Data Target</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('datatarget/simpandata', ['class' => 'formtarget'])  ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Rekening</label>
                    <div class="col-sm-6">
                        <select id="rekid" class="form-control rekid" name="rekid">
                            <option selected>Pilih Kode Rekening...</option>

                            <?php foreach ($tampildata as $row) : ?>
                                <option value="<?= $row['idrek'] ?> ">
                                    <label for=""><?= $row['reknorek'] ?><p> - </p><strong><?= $row['reknama'] ?></strong></label>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Target (Rp.)</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="target" name="target">
                        <div class="invalid-feedback erorTarget"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Masa Berlaku</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="tgtglawal" name="tgtglawal">
                        <div class="invalid-feedback Tgtglawal"></div>
                        <small id="emailHelp" class="form-text text-muted">Sampai dengan.</small>
                        <input type="date" class="form-control" id="tgtglakhir" name="tgtglakhir">
                        <div class="invalid-feedback Tgtglakhir"></div>
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
    $(".rekid").select2({
        width: '100%',


    });

    $(document).ready(function() {
        $('.formtarget').submit(function(e) {
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

                        if (response.error.target) {
                            $('#target').addClass('is-invalid');
                            $('.erorTarget').html(response.error.target);
                        } else {
                            $('#target').removeClass('is-invalid');
                            $('.erorTarget').html('');
                        }
                        if (response.error.tgtglawal) {
                            $('#tgtglawal').addClass('is-invalid');
                            $('.Tgtglawal').html(response.error.tgtglawal);
                        } else {
                            $('#tgtglawal').removeClass('is-invalid');
                            $('.erorTgtglawal').html('');
                        }
                        if (response.error.tgtglakhir) {
                            $('#tgtglakhir').addClass('is-invalid');
                            $('.Tgtglakhir').html(response.error.tgtglakhir);
                        } else {
                            $('#tgtglakhir').removeClass('is-invalid');
                            $('.erorTgtglakhir').html('');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses
                        })

                        $('#modaltambahtg').modal('hide');
                        datatg();

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