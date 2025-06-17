<!DOCTYPE html>
<html>
<head>
  <title>Formulir Data Bidan</title>
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
    <h3>FORMULIR DATA BIDAN</h3>

    <div class="form-row">
      <label>Nama Lengkap</label>
      <div class="colon">:</div>
      <div class="value"><?php echo $detail->nama ?></div>
    </div>

    <div class="form-row">
      <label>Spesialis</label>
      <div class="colon">:</div>
      <div class="value"><?php echo $detail->spesialis ?></div>
    </div>

    <div class="form-row">
      <label>Alamat</label>
      <div class="colon">:</div>
      <div class="value"><?php echo $detail->alamat ?></div>
    </div>

    <div class="form-row">
      <label>No. Telepon</label>
      <div class="colon">:</div>
      <div class="value"><?php echo $detail->nomor ?></div>
    </div>

    <hr>

    
  </div>
</body>
</html>
