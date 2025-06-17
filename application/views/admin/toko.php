<?php $this->load->view('admin/templates/sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-wheelchair"></i> Data Pasien
            <small>Manajemen Data Pasien</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Pasien</li>
        </ol>
    </section>

    <section class="content">
        <!-- Tombol Tambah -->
      <button type="button" style="margin-bottom: 10px" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahData">
            <i class="fa fa-plus"></i> Tambah Pasien Baru
        </button>

        <?php echo $this->session->flashdata('pesan'); ?>

        
        <div class="box box-primary">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="example1">
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
                                <th width="200px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(isset($pasien) && !empty($pasien)):
                                $no = 1;
                                foreach ($pasien as $row): 
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><?php echo $row['alamat_rumah']; ?></td>
                                    <td><?php echo $row['no_telp']; ?></td>
                                    <td><?php echo $row['jenis_kelamin']; ?></td>
                                    <td><?php echo $row['nik_ktp']; ?></td>
                                    <td><?php echo $row['keluhan']; ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($row['tanggal'])); ?></td>
                                    <td><?php echo $row['feedback_admin']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editData<?php echo $row['id']; ?>">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <a href="<?php echo base_url('admin/admin/cetak/'.$row['id']); ?>" class="btn btn-success btn-sm" target="_blank">
                                            <i class="fa fa-print"></i> Cetak
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusData<?php echo $row['id']; ?>">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                            <?php 
                                endforeach;
                            else:
                            ?>
                                <tr>
                                    <td colspan="10" class="text-center">Data tidak ditemukan</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> Tambah Pasien</h4>
            </div>
            <form action="<?php echo base_url('admin/admin/tambah_pasien') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat_rumah" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" name="no_telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>NIK KTP</label>
                        <input type="text" name="nik_ktp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Keluhan</label>
                        <textarea name="keluhan" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Feedback Bidan</label>
                        <textarea name="feedback_admin" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
foreach ($pasien as $row): ?>
    <!-- Edit Modal -->
    <div class="modal fade" id="editData<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Data Pasien</h4>
            </div>
            <form action="<?php echo base_url('admin/admin/edit_pasien/'.$row['id']); ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Pasien</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat_rumah" class="form-control" required><?php echo $row['alamat_rumah']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="text" name="no_telp" class="form-control" value="<?php echo $row['no_telp']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?php echo ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>NIK KTP</label>
                            <input type="text" name="nik_ktp" class="form-control" value="<?php echo $row['nik_ktp']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Keluhan</label>
                            <textarea name="keluhan" class="form-control" required><?php echo $row['keluhan']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d', strtotime($row['tanggal'])); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Feedback Bidan</label>
                            <textarea name="feedback_admin" class="form-control"><?php echo $row['feedback_admin']; ?></textarea>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php
foreach ($pasien as $row): ?>
<div class="modal fade" id="hapusData<?php echo $row['id']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-trash"></i> Konfirmasi Hapus</h4>
            </div>
            <form action="<?php echo base_url('admin/admin/hapus_pasien/'.$row['id']); ?>" method="POST">
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data pasien:</p>
                    <p><b><?php echo $row['nama']; ?></b> dengan NIK: <b><?php echo $row['nik_ktp']; ?></b>?</p>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php $this->load->view('admin/templates/footer'); ?>