<!DOCTYPE html>
<html>
<head>
  <title>Formulir Rekam Medis</title>
  <style>
    body { 
      font-family: Arial; 
      margin: 0;
      padding: 20px;
    }
    .print-area {
      width: 21cm;
      margin: 0 auto;
    }
    h3 {
      text-align: center;
      font-size: 18px;
      margin-bottom: 30px;
    }
    .form-row {
      margin-bottom: 15px;
      display: flex;
    }
    .form-row label {
      width: 200px;
      padding-right: 15px;
    }
    .form-row .colon {
      padding-right: 15px;
    }
    .form-row .value {
      border-bottom: 1px solid #000;
      flex-grow: 1;
    }
    hr {
      border-top: 2px solid #000;
      margin: 30px 0;
    }
  </style>
</head>
<body onload="window.print()">
  <div class="print-area">
    <h3>FORMULIR REKAM MEDIS</h3>

    <div class="form-row">
      <label>Nama Pasien</label>
      <div class="colon">:</div>
      <div class="value"><?php echo $detail['nama_pasien'] ?></div>
    </div>

    <div class="form-row">
      <label>Nama Bidan</label>
      <div class="colon">:</div>
      <div class="value"><?php echo $detail['nama_bidan'] ?></div>
    </div>

    <div class="form-row">
      <label>Diagnosa</label>
      <div class="colon">:</div>
      <div class="value"><?php echo $detail['diagnosa'] ?></div>
    </div>

    <div class="form-row">
      <label>Obat</label>
      <div class="colon">:</div>
      <div class="value"><?php echo $detail['nama_obat'] ?></div>
    </div>

    <div class="form-row">
      <label>Ruangan</label>
      <div class="colon">:</div>
      <div class="value"><?php echo $detail['nama_ruangan'] ?></div>
    </div>

    <div class="form-row">
      <label>Tanggal</label>
      <div class="colon">:</div>
      <div class="value"><?php echo date('d/m/Y', strtotime($detail['tanggal'])) ?></div>
    </div>

    <hr>

    
  </div>
</body>
</html>
