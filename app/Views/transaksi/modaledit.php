<div class="modal fade" id="modaledittr" data-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('transaksi/editdata', ['class' => 'formeditt'])  ?>
            <?= csrf_field(); ?>
            <div class="modal-body">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Via</label>
                    <div class="col-sm-6">
                        <select id="via2" class="form-control" name="via2">
                            <option <?php if ($via == 'Bendahara') {
                                        echo "selected";
                                    } ?> value="Bendahara">Bendahara</option>
                            <option <?php if ($via == 'Bank') {
                                        echo "selected";
                                    } ?> value="Bank">Bank</option>



                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Bayar</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tglbayar" name="tglbayar" value="<?= $tglbayar ?>">

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $jumlah ?>">
                        <input type="hidden" class="form-control" readonly id="id" name="id" value="<?= $id ?>">
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
            $('.formeditt').submit(function(e) {
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

                        $('#modaledittr').modal('hide');
                        datatrf();

                    },
                    error: function(xhr, ajaxOption, throwError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
            });
        });
    </script>