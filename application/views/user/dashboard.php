<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <!-- Add Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>User Dashboard</title>
    <style>
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
        .welcome-text {
            font-weight: bold;
            font-size: 18px;
            color: #ffe082;
            margin-right: 15px;
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px #222d32;
            display: inline-block;
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
        <h2 style="margin-top:-35px;">Daftar Data Pasien</h2><br>
    <div style="max-width:1100px; margin-top: -25px; auto;background:#fff;padding:30px 25px 25px 25px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.08);">
        <form action="<?php echo site_url('user/daftar_pasien'); ?>" method="post">
            <label>Nama Pasien:</label><br>
            <input type="text" name="nama" required style="width:100%;margin-bottom:10px;"><br>
            <label>Alamat:</label><br>
            <input type="text" name="alamat_rumah" required style="width:100%;margin-bottom:10px;"><br>
            <label>No. Telepon:</label><br>
            <input type="text" name="no_telp" required style="width:100%;margin-bottom:10px;"><br>
            <label>Jenis Kelamin:</label><br>
            <select name="jenis_kelamin" required style="width:100%;margin-bottom:10px;">
                <option value="">-- Pilih --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select><br>
            <label>NIK KTP:</label><br>
            <input type="text" name="nik_ktp" required style="width:100%;margin-bottom:10px;"><br>
            <label>Keluhan:</label><br>
            <textarea name="keluhan" required style="width:100%;margin-bottom:10px;"></textarea><br>
            <label>Tanggal:</label><br>
            <input type="date" name="tanggal" required style="width:100%;margin-bottom:15px;"><br>
            <button type="submit" style="width:100%;background:#3c8dbc;color:#fff;padding:10px;border:none;border-radius:5px;font-weight:bold;">Daftar</button>
        </form>
        <?php if ($this->session->flashdata('pesan')): ?>
            <p style="text-align:center;margin-top:15px;"><?php echo $this->session->flashdata('pesan'); ?></p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>