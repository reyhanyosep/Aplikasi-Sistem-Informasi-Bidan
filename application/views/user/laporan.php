
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <!-- Add Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Laporan Data Pasien</title>
    <style>
        table { border-collapse: collapse; width: 100%; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 10px 8px; text-align: left; }
        th { background-color: #3c8dbc; color: #fff; }
        tr:nth-child(even) { background: #f7f7f7; }
        body { margin:0; font-family:Arial,sans-serif; background:#f4f6f9; }
        .header {
            width: 100%;
            height: 60px;
            background: #3c8dbc;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: fixed;
            top: 0; left: 0; z-index: 1000;
            box-sizing: border-box;
        }
        .header h2 {
            margin: 0;
            font-size: 22px;
            flex: 1;
        }
        .header .user-info {
            font-size: 16px;
            display: flex;
            align-items: center;
        }
        .sidebar {
            width: 200px;
            background: #222d32;
            color: #fff;
            height: 100vh;
            position: fixed;
            top: 60px; left: 0;
            padding-top: 20px;
        }
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li { margin: 20px 0; }
        .sidebar ul li a {
            color: #b8c7ce;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .sidebar ul li a:hover { background: #1e282c; color: #fff; }
        .content {
            margin-left: 220px;
            padding: 30px;
            margin-top: 80px;
        }
        @media (max-width: 700px) {
            .sidebar { width: 100px; }
            .content { margin-left: 120px; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Selamat Datang di Hai Bidan</h2>
        <div class="user-info">
         <a href="<?php echo site_url('welcome/logout'); ?>" style="color:#fff;text-decoration:underline;">         <i class="fa fa-sign-out" href="<?php echo site_url('welcome/logout'); ?>"></i>
</a>
    </div>
    </div>
    <div class="sidebar">
    <ul>
        <li class="treeview">
          <a href="<?php echo base_url('user/dashboard') ?>">
            <i class="fa fa-heartbeat"></i> <span>Daftar Pasien</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url('user/laporan') ?>">
            <i class="fa fa-list-alt"></i> <span>Laporan</span>
          </a>
        </li>
    </ul>
</div>
<div class="content">
        <h2 style="margin-top:-35px;">Laporan Daftar Data Pasien</h2><br>
    <div style="max-width:1100px; margin-top: -25px; auto;background:#fff;padding:30px 25px 25px 25px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.08);">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Jenis Kelamin</th>
                    <th>NIK KTP</th>
                    <th>Keluhan</th>
                    <th>Tanggal</th>
                    <th>Feedback Bidan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($pasien as $row) {
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['alamat_rumah']}</td>
                            <td>{$row['no_telp']}</td>
                            <td>{$row['jenis_kelamin']}</td>
                            <td>{$row['nik_ktp']}</td>
                            <td>{$row['keluhan']}</td>
                            <td>{$row['tanggal']}</td>
                            <td>{$row['feedback_admin']}</td>
                        </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>