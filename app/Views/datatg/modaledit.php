<div class="modal fade" id="modaledittg" data-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Target</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('datatarget/editdata', ['class' => 'formedit'])  ?>
            <?= csrf_field(); ?>
            <div class="modal-body">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Target</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="target" name="target" value="<?= $target ?>">
                        <input type="hidden" class="form-control" readonly id="tgid" name="tgid" value="<?= $tgid ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tgtglawal" name="tgtglawal" value="<?= $tgtglawal ?>">

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal AKhir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tgtglakhir" name="tgtglakhir" value="<?= $tgtglakhir ?>">

                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="submit" class="btn btn-primary btnsimpan">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.formedit').submit(function(e) {
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
                        $('.btnsimpan').html('Update');
                    },
                    success: function(response) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses
                        })

                        $('#modaledittg').modal('hide');
                        datatg();

                    },
                    error: function(xhr, ajaxOption, throwError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
            });
        });
    </script>