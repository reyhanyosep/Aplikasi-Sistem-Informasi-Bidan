<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Ruangan
            <small>Pengelolaan Data Ruangan</small>
        </h1>
    </section>

    <section class="content">
<button type="button" style="margin-bottom: 10px" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">
    <i class="fa fa-plus"></i> Tambah Ruangan Baru
</button>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ruangan</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($ruangan as $row) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->nama_ruangan; ?></td>
                                        <td><?php echo $row->keterangan; ?></td>
                                        <td><?php echo $row->status; ?></td>
                                        <td class="text-center" width="160px">
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="<?php echo base_url('admin/ruangan/delete/') . $row->id; ?>" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Hapus
                                            </a>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $row->id; ?>">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
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
                <h4 class="modal-title">Tambah Ruangan</h4>
            </div>
            <form action="<?php echo base_url('admin/ruangan/add'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Ruangan</label>
                        <input type="text" class="form-control" name="nama_ruangan" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
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
<?php foreach ($ruangan as $row) { ?>
    <div class="modal fade" id="editModal<?php echo $row->id; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Edit Ruangan</h4>
                </div>
                <form action="<?php echo base_url('admin/ruangan/edit/'.$row->id); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Ruangan</label>
                            <input type="text" class="form-control" name="nama_ruangan" value="<?php echo $row->nama_ruangan; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" rows="3" required><?php echo $row->keterangan; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option value="Tersedia" <?php echo ($row->status == 'Tersedia') ? 'selected' : ''; ?>>Tersedia</option>
                                <option value="Tidak Tersedia" <?php echo ($row->status == 'Tidak Tersedia') ? 'selected' : ''; ?>>Tidak Tersedia</option>
                            </select>
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

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal<?php echo $row->id; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Delete Ruangan</h4>
                </div>
                <form action="<?php echo base_url('admin/ruangan/delete/'.$row->id); ?>" method="POST">
                    <div class="modal-body">
                        <p>Are you sure want to delete this room?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
