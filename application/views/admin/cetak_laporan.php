<!DOCTYPE html>
<html>
<head>
    <title>Laporan Rekam Medis</title>
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
    <h3>LAPORAN REKAM MEDIS</h3>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Periksa</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Diagnosa</th>
                <th>Nama Obat</th>
                <th>Ruang</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            foreach($rekammedis as $row): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo date('d/m/Y', strtotime($row['tanggal'])); ?></td>
                <td><?php echo $row['nama_pasien']; ?></td>
                <td><?php echo $row['nama_bidan']; ?></td>
                <td><?php echo $row['diagnosa']; ?></td>
                <td><?php echo $row['nama_obat']; ?></td>
                <td><?php echo $row['nama_ruangan']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    
</body>
</html>
