<div class="modal fade" id="modaltambah" data-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Rekening</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('rekening/simpandata', ['class' => 'formrek'])  ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Rek</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="reknorek" name="reknorek">
                        <div class="invalid-feedback erorReknorek">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Rekening</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="reknama" name="reknama">
                        <div class="invalid-feedback erorReknama">

                        </div>
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
    $(document).ready(function() {
        $('.formrek').submit(function(e) {
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
                        if (response.error.reknorek) {
                            $('#reknorek').addClass('is-invalid');
                            $('.erorReknorek').html(response.error.reknorek);
                        } else {
                            $('#reknorek').removeClass('is-invalid');
                            $('.erorReknorek').html('');
                        }
                        if (response.error.reknama) {
                            $('#reknama').addClass('is-invalid');
                            $('.erorReknama').html(response.error.reknama);
                        } else {
                            $('#reknama').removeClass('is-invalid');
                            $('.erorReknama').html('');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses
                        })

                        $('#modaltambah').modal('hide');
                        datarek();
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