<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Pasien</title>
    <style>
        body { 
            font-family: Arial; 
            margin: 20px;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body onload="window.print()">
    <h3>LAPORAN DATA PASIEN</h3>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Jenis Kelamin</th>
                <th>NIK KTP</th>
                <th>Tanggal</th>
                <th>Feedback Bidan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            foreach($pasien as $row): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['alamat_rumah']; ?></td>
                <td><?php echo $row['no_telp']; ?></td>
                <td><?php echo $row['jenis_kelamin']; ?></td>
                <td><?php echo $row['nik_ktp']; ?></td>
                <td><?php echo date('d/m/Y', strtotime($row['tanggal'])); ?></td>
                <td><?php echo $row['feedback_admin']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    
</body>
</html>
