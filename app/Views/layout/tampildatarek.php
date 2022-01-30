<table class="table table-sm table-striped" id="tbrek">
    <thead>
        <tr>
            <th>No</th>
            <th>No. Rekening</th>
            <th>Nama Rekening</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $nomor = 0;
        foreach ($tampildatar as $row) : $nomor++; ?>
            <tr>
                <td><?= $nomor ?></td>
                <td><?= $row['reknorek'] ?></td>
                <td><?= $row['reknama'] ?></td>
                <td>
                    <button type="button" class="btn btn-info btn-sm" onclick="edit('<?= $row['idrek']  ?>')">
                        <i class="fa fa-tags"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $row['idrek']  ?>')">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tbrek').DataTable();
    });

    function edit(idrek) {
        $.ajax({
            type: "post",
            url: "<?= site_url('rekening/formedit') ?>",
            data: {
                idrek: idrek
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaledit').modal('show');
                }
            },
            error: function(xhr, ajaxOption, throwError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function hapus(idrek) {
        Swal.fire({
            title: 'Hapus',
            text: "Data rekening akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Terhapus!',

                    'Rekening berhasil dihapus'
                )
            }
            $.ajax({
                type: "post",
                url: "<?= site_url('rekening/hapus') ?>",
                data: {
                    idrek: idrek
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.success,

                        })
                        datarek();
                    }
                },
                error: function(xhr, ajaxOption, throwError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        })
    }
</script>