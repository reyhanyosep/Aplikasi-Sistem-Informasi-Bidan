<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Laporan Rekam Medis
            <small>Laporan Data Rekam Medis</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <form action="<?php echo base_url('admin/laporan/cetak'); ?>" method="POST" target="_blank" class="form-inline">
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="example1">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="check-all"></th>
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
                                    <?php if(isset($rekammedis) && !empty($rekammedis)): 
                                        $no = 1;
                                        foreach($rekammedis as $row): ?>
                                        <tr>
                                            <td><input type="checkbox" name="pilih[]" value="<?php echo $row['id']; ?>" class="check-item"></td>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo date('Y-m-d', strtotime($row['tanggal'])); ?></td>
                                            <td><?php echo $row['nama_pasien']; ?></td>
                                            <td><?php echo $row['nama_bidan']; ?></td>
                                            <td><?php echo $row['diagnosa']; ?></td>
                                            <td><?php echo $row['nama_obat']; ?></td>
                                            <td><?php echo $row['nama_ruangan']; ?></td>
                                        </tr>
                                    <?php endforeach;
                                    endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    // Handle check all functionality
    $("#check-all").click(function() {
        $(".check-item").prop('checked', $(this).prop('checked'));
    });
    
    // Handle individual checkbox click
    $(".check-item").click(function() {
        if (!$(this).prop("checked")) {
            $("#check-all").prop("checked", false);
        }
    });
});

// Export functions
function exportToPDF() {
    window.location.href = '<?php echo base_url("admin/laporan/pdf"); ?>';
}

function exportToJSON() {
    window.location.href = '<?php echo base_url("admin/laporan/json"); ?>';
}
</script>
