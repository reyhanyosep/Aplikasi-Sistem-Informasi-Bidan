<?php $this->load->view('admin/templates/sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Pasien
            <small>Manajemen Data Pasien</small>
        </h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <form action="<?php echo base_url('admin/admin/cetak_laporan'); ?>" method="POST" target="_blank" class="form-inline">
                    <div class="form-group" style="margin-right: 10px;">
                        <label style="margin-right: 5px;">Dari:</label>
                        <input type="date" name="dari" class="form-control" value="<?php echo date('Y-m-01'); ?>">
                    </div>
                    <div class="form-group" style="margin-right: 10px;">
                        <label style="margin-right: 5px;">Sampai:</label>
                        <input type="date" name="sampai" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-print"></i> Cetak Laporan
                    </button>
                </form>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped">
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
                        foreach ($pasien as $row) {
                            echo "<tr>
                                    <td>{$no}</td>
                                    <td>{$row['nama']}</td>
                                    <td>{$row['alamat_rumah']}</td>
                                    <td>{$row['no_telp']}</td>
                                    <td>{$row['jenis_kelamin']}</td>
                                    <td>{$row['nik_ktp']}</td>
                                    <td>{$row['tanggal']}</td>
                                    <td>{$row['feedback_admin']}</td>
                                    <td>
                                        <button type='button' 
                                                class='btn btn-primary btn-sm' 
                                                data-toggle='modal' 
                                                data-target='#editModal{$row['id']}'>
                                            <i class='fa fa-edit'></i> Beri Feedback
                                        </button>
                                        <a href='".site_url('admin/admin/cetak/'.$row['id'])."' 
                                        class='btn btn-success btn-sm' 
                                        target='_blank'>
                                            <i class='fa fa-print'></i> Cetak
                                        </a>
                                    </td>
                                </tr>";
                            
                            // Modal for each row
                            echo "<div class='modal fade' id='editModal{$row['id']}'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                <h4 class='modal-title'>Edit Data Pasien</h4>
                                            </div>
                                            <form action='".site_url('admin/admin/update_pasien')."' method='post'>
                                                <div class='modal-body'>
                                                    <input type='hidden' name='id' value='{$row['id']}'>
                                                    
                                                    <div class='form-group'>
                                                        <label>Nama Pasien</label>
                                                        <input type='text' class='form-control' name='nama' value='{$row['nama']}'>
                                                    </div>
                                                    
                                                    <div class='form-group'>
                                                        <label>Alamat</label>
                                                        <textarea class='form-control' name='alamat_rumah'>{$row['alamat_rumah']}</textarea>
                                                    </div>
                                                    
                                                    <div class='form-group'>
                                                        <label>No Telepon</label>
                                                        <input type='text' class='form-control' name='no_telp' value='{$row['no_telp']}'>
                                                    </div>
                                                    
                                                    <div class='form-group'>
                                                        <label>Feedback Bidan</label>
                                                        <textarea class='form-control' name='feedback_admin'>{$row['feedback_admin']}</textarea>
                                                    </div>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Tutup</button>
                                                    <button type='submit' class='btn btn-primary'>Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('admin/templates/footer'); ?>