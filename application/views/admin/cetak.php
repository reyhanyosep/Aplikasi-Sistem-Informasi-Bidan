
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cetak Data Pasien</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .container { margin: 20px; }
        h3 { text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h3>Data Pasien</h3>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Jenis Kelamin</th>
                <th>NIK</th>
                <th>Keluhan</th>
                <th>Tanggal</th>
                <th>Feedback Bidan</th>
            </tr>
            <?php 
            if($is_single): ?>
                <tr>
                    <td>1</td>
                    <td><?php echo $pasien['nama']; ?></td>
                    <td><?php echo $pasien['alamat_rumah']; ?></td>
                    <td><?php echo $pasien['no_telp']; ?></td>
                    <td><?php echo $pasien['jenis_kelamin']; ?></td>
                    <td><?php echo $pasien['nik_ktp']; ?></td>
                    <td><?php echo $pasien['keluhan']; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($pasien['tanggal'])); ?></td>
                    <td><?php echo $pasien['feedback_admin']; ?></td>
                </tr>
            <?php else: 
                $no = 1;
                foreach($pasien as $row): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['alamat_rumah']; ?></td>
                    <td><?php echo $row['no_telp']; ?></td>
                    <td><?php echo $row['jenis_kelamin']; ?></td>
                    <td><?php echo $row['nik_ktp']; ?></td>
                    <td><?php echo $row['keluhan']; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                    <td><?php echo $row['feedback_admin']; ?></td>
                </tr>
                <?php endforeach;
            endif; ?>
        </table>
    </div>

    <script>
        window.print();
    </script>
</body>
</html>