<table class="table table-sm table-striped" id="tbrek1">
    <thead>
        <tr>
            <th>No</th>

            <th>Kode Rek.</th>
            <th>Nama Rekening</th>
            <th>Target</th>
            <th>Masa Berlaku</th>

            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $nomor = 0;
        foreach ($tampildatag as $row) : $nomor++; ?>
            <tr>
                <td><?= $nomor ?></td>
                <td><?= $row['reknorek'] ?></td>
                <td><?= $row['reknama'] ?></td>

                <td><?= $row['target'] ?></td>
                <td><?= $row['tgtglawal'] ?> sd. <?= $row['tgtglakhir'] ?></td>

                <td>
                    <button type="button" class="btn btn-info btn-sm" onclick="edit('<?= $row['tgid']  ?>')">
                        <i class="fa fa-tags"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $row['tgid']  ?>')">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tbrek1').DataTable({

        });
    });

    function edit(tgid) {
        $.ajax({
            type: "post",
            url: "<?= site_url('datatarget/formedit') ?>",
            data: {
                tgid: tgid
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaledittg').modal('show');
                }
            },
            error: function(xhr, ajaxOption, throwError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function hapus(tgid) {
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
                url: "<?= site_url('datatarget/hapus') ?>",
                data: {
                    tgid: tgid
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.success,

                        })
                        datatg();
                    }
                },
                error: function(xhr, ajaxOption, throwError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        })
    }
</script>