<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Farmasi
            <small>Pengelolaan Data Farmasi</small>
        </h1>
    </section>

    <section class="content">
        <button type="button" style="margin-bottom: 10px" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">
            <i class="fa fa-plus"></i> Tambah Data Farmasi
        </button>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Obat</th>
                                    <th>Jenis Obat</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($farmasi as $row) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->nama_obat; ?></td>
                                        <td><?php echo $row->jenis_obat; ?></td>
                                        <td><?php echo $row->stok; ?></td>
                                        <td>Rp <?php echo number_format($row->harga, 0, ',', '.'); ?></td>
                                        <td width="200px">
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="<?php echo base_url('admin/farmasi/delete/') . $row->id; ?>" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Hapus
                                            </a>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $row->id; ?>">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <a href="<?php echo base_url('admin/farmasi/cetak/') . $row->id; ?>" class="btn btn-success btn-sm" target="_blank">
                                                <i class="fa fa-print"></i> Cetak
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Tambah Data Farmasi</h4>
            </div>
            <form action="<?php echo base_url('admin/farmasi/add'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Obat</label>
                        <input type="text" class="form-control" name="nama_obat" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Obat</label>
                        <input type="text" class="form-control" name="jenis_obat" required>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" class="form-control" name="stok" required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" required>
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

<!-- Edit Modal -->
<?php foreach ($farmasi as $row) { ?>
    <div class="modal fade" id="editModal<?php echo $row->id; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Edit Data Farmasi</h4>
                </div>
                <form action="<?php echo base_url('admin/farmasi/edit/'.$row->id); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Obat</label>
                            <input type="text" class="form-control" name="nama_obat" value="<?php echo $row->nama_obat; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Obat</label>
                            <input type="text" class="form-control" name="jenis_obat" value="<?php echo $row->jenis_obat; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" class="form-control" name="stok" value="<?php echo $row->stok; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" name="harga" value="<?php echo $row->harga; ?>" required>
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
<?php } ?>