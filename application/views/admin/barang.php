<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user-md"></i> Data Bidan
        <small>Manajemen Data Bidan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Bidan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Button trigger modal -->
      <button type="button" style="margin-bottom: 10px" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahData">
        <div class="fa fa-plus"></div> Tambah Bidan Baru
      </button>

      <?php echo $this->session->flashdata('pesan'); ?>

      <div class="box box-primary" style="margin-top: 10px">
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="example1">
              <thead>
                <tr>
                  <th width="5%">#</th>
                  <th>Nama Bidan</th>
                  <th>Spesialis</th>
                  <th>Alamat</th>
                  <th>Nomor Telepon</th>
                  <th width="150px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach ($barang as $brng):
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $brng->nama; ?></td>
                    <td><?php echo $brng->spesialis; ?></td>
                    <td><?php echo $brng->alamat; ?></td>
                    <td><?php echo $brng->nomor; ?></td>
                    <td>
                      <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editData<?php echo $brng->id ?>"><div class="fa fa-edit fa-sm"></div> Edit</a>
                      <a href="<?php echo('barang/cetak/').$brng->id ?>" class="btn btn-primary btn-sm"><div class="fa fa-print fa-sm"></div> Cetak</a>
                      <a href="<?php echo('barang/hapus/').$brng->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data barang ini?')"><div class="fa fa-trash fa-sm"></div> Hapus</a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><div class="fa fa-plus"></div> Tambah Barang</h4>
      </div>
      <form action="<?php echo base_url('admin/barang/tambah_barang') ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Bidan</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Bidan" required>
          </div>
          <div class="form-group">
            <label>Spesialis</label>
            <input type="text" name="spesialis" class="form-control" placeholder="Spesialis" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
          </div>
          <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" name="nomor" class="form-control" placeholder="Nomor Telepon" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
          <button type="submit" class="btn btn-warning"><div class="fa fa-save"></div> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit Data -->
<?php foreach ($barang as $brng) : ?>

  <div class="modal fade" id="editData<?php echo $brng->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><div class="fa fa-edit"></div> Edit Barang</h4>
        </div>
        <form action="<?php echo base_url('admin/barang/edit_aksi') ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Bidan</label>
              <input type="hidden" name="id" value="<?php echo $brng->id ?>">
              <input type="text" name="nama" class="form-control" placeholder="Nama Bidan" value="<?php echo $brng->nama ?>" required>
            </div>
            <div class="form-group">
              <label>Spesialis</label>
              <input type="text" name="spesialis" class="form-control" placeholder="Spesialis" value="<?php echo $brng->spesialis ?>" required>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $brng->alamat ?>" required>
            </div>
            <div class="form-group">
              <label>Nomor Telepon</label>
              <input type="text" name="nomor" class="form-control" placeholder="Nomor Telepon" value="<?php echo $brng->nomor ?>" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
            <button type="submit" class="btn btn-warning"><div class="fa fa-save"></div> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php endforeach ?>