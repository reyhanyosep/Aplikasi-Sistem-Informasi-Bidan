<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Rekam Medis
            <small>Pengelolaan Data Rekam Medis</small>
        </h1>
    </section>
    <section class="content">
        <button type="button" style="margin-bottom: 10px" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahData">
            <i class="fa fa-plus"></i> Tambah Data Rekam Medis
        </button>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="example1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>Nama Bidan</th>
                                <th>Diagnosa</th>
                                <th>Obat</th>
                                <th>Ruangan</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($rekammedis) && !empty($rekammedis)): 
                                $no = 1;
                                foreach($rekammedis as $row): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo isset($row['nama_pasien']) ? $row['nama_pasien'] : ''; ?></td>
                                    <td><?php echo isset($row['nama_bidan']) ? $row['nama_bidan'] : ''; ?></td>
                                    <td><?php echo isset($row['diagnosa']) ? $row['diagnosa'] : ''; ?></td>
                                    <td><?php echo isset($row['nama_obat']) ? $row['nama_obat'] : ''; ?></td>
                                    <td><?php echo isset($row['nama_ruangan']) ? $row['nama_ruangan'] : ''; ?></td>
                                    <td><?php echo isset($row['tanggal']) ? date('d/m/Y', strtotime($row['tanggal'])) : ''; ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editData<?php echo $row['id']; ?>">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <a href="<?php echo base_url('admin/rekammedis/cetak/'.$row['id']); ?>" class="btn btn-success btn-sm" target="_blank">
                                            <i class="fa fa-print"></i> Cetak
                                        </a>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusData<?php echo $row['id']; ?>">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach;
                            endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <?php foreach($rekammedis as $row): ?>
        <div class="modal fade" id="editData<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Rekam Medis</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="<?php echo base_url('admin/rekammedis/edit/'.$row['id']); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Pasien</label>
                                <select name="id_pasien" class="form-control" required>
                                    <option value="">Pilih Pasien</option>
                                    <?php foreach($pasien as $p): ?>
                                        <option value="<?php echo $p['id']; ?>" <?php echo ($p['id'] == $row['id_pasien']) ? 'selected' : ''; ?>><?php echo $p['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bidan</label>
                                <select name="id_bidan" class="form-control" required>
                                    <option value="">Pilih Bidan</option>
                                    <?php foreach($bidan as $b): ?>
                                        <option value="<?php echo $b['id']; ?>" <?php echo ($b['id'] == $row['id_bidan']) ? 'selected' : ''; ?>><?php echo $b['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Diagnosa</label>
                                <textarea name="diagnosa" class="form-control" required><?php echo $row['diagnosa']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Obat</label>
                                <select name="id_obat" class="form-control" required>
                                    <option value="">Pilih Obat</option>
                                    <?php foreach($obat as $o): ?>
                                        <option value="<?php echo $o['id']; ?>" <?php echo ($o['id'] == $row['id_obat']) ? 'selected' : ''; ?>><?php echo $o['nama_obat']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ruangan</label>
                                <select name="id_ruangan" class="form-control" required>
                                    <option value="">Pilih Ruangan</option>
                                    <?php foreach($ruangan as $r): ?>
                                        <option value="<?php echo $r['id']; ?>" <?php echo ($r['id'] == $row['id_ruangan']) ? 'selected' : ''; ?>><?php echo $r['nama_ruangan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="<?php echo $row['tanggal']; ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Hapus -->
        <div class="modal fade" id="hapusData<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Rekam Medis</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="<?php echo base_url('admin/rekammedis/hapus/'.$row['id']); ?>" method="post">
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus data rekam medis ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        
        <!-- Modal Tambah -->
        <div class="modal fade" id="tambahData" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Rekam Medis</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="<?php echo base_url('admin/rekammedis/tambah'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Pasien</label>
                                <select name="id_pasien" class="form-control" required>
                                    <option value="">Pilih Pasien</option>
                                    <?php foreach($pasien as $p): ?>
                                        <option value="<?php echo $p['id']; ?>"><?php echo $p['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bidan</label>
                                <select name="id_bidan" class="form-control" required>
                                    <option value="">Pilih Bidan</option>
                                    <?php foreach($bidan as $b): ?>
                                        <option value="<?php echo $b['id']; ?>"><?php echo $b['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Diagnosa</label>
                                <textarea name="diagnosa" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Obat</label>
                                <select name="id_obat" class="form-control" required>
                                    <option value="">Pilih Obat</option>
                                    <?php foreach($obat as $o): ?>
                                        <option value="<?php echo $o['id']; ?>"><?php echo $o['nama_obat']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ruangan</label>
                                <select name="id_ruangan" class="form-control" required>
                                    <option value="">Pilih Ruangan</option>
                                    <?php foreach($ruangan as $r): ?>
                                        <option value="<?php echo $r['id']; ?>"><?php echo $r['nama_ruangan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

