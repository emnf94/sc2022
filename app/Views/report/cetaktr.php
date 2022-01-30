<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN TRANSAKSI HARIAN</title>
</head>

<body>
    <table style="width:100%; border-collapse:collapse; text-align:center;" border="0">
        <tr>
            <td>
                <h3>Laporan Transaksi Harian</h3>
                <h4><?= date("d-m-Y", strtotime($tglb)); ?> s/d Tanggal : <?= date("d-m-Y", strtotime($tglb)); ?></h4>
            </td>
        </tr>


    </table>

    <table style="width:100%; border-collapse:collapse; text-align:center;" border="1" border: 1px solid #000;>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Rekening</th>
                <th>Nama Rekening</th>
                <th>Via Bayar</th>
                <th>Tanggal Setor</th>
                <th>Jumlah Bayar</th>

            </tr>

        </thead>
        <tbody>
            <?php
            $nomor = 1;

            foreach ($datalaporan->getResultArray() as $row) :
            ?>

                <tr>
                    <td>
                        <?= $nomor++; ?>
                    </td>
                    <td>
                        <?= $row['reknorek']; ?>
                    </td>
                    <td>
                        <?= $row['reknama']; ?>
                    </td>
                    <td>
                        <?= $row['via']; ?>
                    </td>
                    <td>
                        <?= $row['tglbayar']; ?>
                    </td>
                    <td>
                        <?= $row['jumlah']; ?>
                    </td>


                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</body>

</html>
<?php
echo
"<script>
window.print();
</script>";
?>