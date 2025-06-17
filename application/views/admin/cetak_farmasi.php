<!DOCTYPE html>
<html>
<head>
  <title>Formulir Data Farmasi</title>
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
    <h3>FORMULIR DATA FARMASI</h3>

    <div class="form-row">
      <label>Nama Obat</label>
      <div class="colon">:</div>
      <div class="value"><?php echo $detail->nama_obat ?></div>
    </div>

    <div class="form-row">
      <label>Jenis Obat</label>
      <div class="colon">:</div>
      <div class="value"><?php echo $detail->jenis_obat ?></div>
    </div>

    <div class="form-row">
      <label>Stok</label>
      <div class="colon">:</div>
      <div class="value"><?php echo $detail->stok ?></div>
    </div>

    <div class="form-row">
      <label>Harga</label>
      <div class="colon">:</div>
      <div class="value">Rp <?php echo number_format($detail->harga, 0, ',', '.') ?></div>
    </div>

    <hr>

    
  </div>
</body>
</html>
