<table class="table table-sm table-striped" id="tbrek2">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Rek.</th>
            <th>Nama</th>
            <th>Via</th>
            <th>Tgl. Setor</th>
            <th>Jumlah (Rp.)</th>

            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $nomor = 0;
        foreach ($tampildata as $row) : $nomor++; ?>
            <tr>
                <td><?= $nomor ?></td>
                <td><?= $row['reknorek'] ?></td>
                <td><?= $row['reknama'] ?></td>
                <td><?= $row['via'] ?></td>
                <td><?= $row['tglbayar'] ?></td>
                <td><?= $row['jumlah'] ?></td>

                <td>
                    <button type="button" class="btn btn-info btn-sm" onclick="edit('<?= $row['id']  ?>')">
                        <i class="fa fa-tags"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $row['id']  ?>')">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tbrek2').DataTable({

        });
    });


    function edit(id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('transaksi/formedit') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaledittr').modal('show');
                }
            },
            error: function(xhr, ajaxOption, throwError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function hapus(id) {
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
                url: "<?= site_url('transaksi/hapus') ?>",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.success,

                        })
                        datatrf();
                    }
                },
                error: function(xhr, ajaxOption, throwError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        })
    }
</script>