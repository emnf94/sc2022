<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN TARGET</title>
</head>

<body>
    <table style="width:100%; border-collapse:collapse; text-align:center;" border="0">
        <tr>
            <td>
                <h3>Laporan Target Pajak <?= date("Y", strtotime($tgla)); ?></h3>
                <h4>s/d Tanggal : <?= date("d-m-Y", strtotime($tglb)); ?></h4>
            </td>
        </tr>


    </table>

    <table style="width:100%; border-collapse:collapse; text-align:center;" border="1" border: 1px solid #000;>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Rekening</th>
                <th>Nama Rekening</th>
                <th>Target (Rp.)</th>
                <th>Masa Berlaku</th>

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
                        <?= $row['target']; ?>
                    </td>
                    <td>
                        <?= $row['tgtglawal']; ?> - <?= $row['tgtglakhir']; ?>
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