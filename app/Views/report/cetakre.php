<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN PENDAPATAN</title>
</head>

<body>
    <table style="width:100%; border-collapse:collapse; text-align:center;" border="0">
        <tr>
            <td>
                <h3>Laporan Pendapatan Asli Daerah Tahun <?= date("Y", strtotime($tgla)); ?></h3>
                <h4>s/d Tanggal : <?= date("d-m-Y", strtotime($tglb)); ?></h4>
            </td>
        </tr>


    </table>

    <table style="width:100%; border-collapse:collapse; text-align:center;" border="1" border: 1px solid #000;>
        <thead>
            <tr>
                <th style="width:3%" rowspan="2">No</th>
                <th style="width:15%" rowspan="2">Kode Rekening</th>
                <th style="width:20%" rowspan="2">Nama Rekening</th>
                <th style="width:13%" rowspan="2">Target (Rp.)</th>
                <th style="width:39%" colspan="3">Realisasi</th>
                <th rowspan="2">%</th>
            </tr>
            <tr>

                <td style="width:13%">s/d Bulan lalu</td>
                <td style="width:13%">Bulan ini</td>
                <td style="width:13%">s/d Bulan ini</td>

            </tr>
            </tr>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            $totalbulanini = 0;
            foreach ($datalaporan->getResultArray() as $row) :
                $totalbulanini += $row['jumlah']; ?>

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
                        tidak tahu caranya
                    </td>
                    <td>
                        tidak tahu caranya
                    </td>
                    <td>
                        tidak tahu caranya
                    </td>
                    </td>
                    <td>
                        tidak tahu caranya
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>


    <table style="width:100%; border-collapse:collapse; text-align:center;" border="0">
        <tr>
            <td>
                <h3>Laporan Pendapatan Asli Daerah via Bendahara Tahun <?= date("Y", strtotime($tgla)); ?></h3>
                <h4>s/d Tanggal : <?= date("d-m-Y", strtotime($tglb)); ?></h4>
            </td>
        </tr>


    </table>

    <table style="width:100%; border-collapse:collapse; text-align:center;" border="1" border: 1px solid #000;>
        <thead>
            <tr>
                <th style="width:3%" rowspan="2">No</th>
                <th style="width:15%" rowspan="2">Kode Rekening</th>
                <th style="width:20%" rowspan="2">Nama Rekening</th>
                <th style="width:13%" rowspan="2">Target (Rp.)</th>
                <th style="width:39%" colspan="3">Realisasi</th>
                <th rowspan="2">%</th>
            </tr>
            <tr>

                <td style="width:13%">s/d Bulan lalu</td>
                <td style="width:13%">Bulan ini</td>
                <td style="width:13%">s/d Bulan ini</td>

            </tr>
            </tr>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            $totalbulanini = 0;
            foreach ($datab->getResultArray() as $row1) :
                $totalbulanini += $row1['jumlah']; ?>

                <tr>
                    <td>
                        <?= $nomor++; ?>
                    </td>
                    <td>
                        <?= $row1['reknorek']; ?>
                    </td>
                    <td>
                        <?= $row1['reknama']; ?>
                    </td>
                    <td>
                        <?= $row1['target']; ?>
                    </td>
                    <td>
                        tidak tahu caranya
                    </td>
                    <td>
                        tidak tahu caranya
                    </td>
                    <td>
                        tidak tahu caranya
                    </td>
                    </td>
                    <td>
                        tidak tahu caranya
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