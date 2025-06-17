<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Ganti Password</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Ganti Password</h4>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_SESSION['success'])): ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if(isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?php echo base_url('ganti_password/proses'); ?>" method="POST">
                            <div class="form-group mb-3">
                                <label>Password Lama</label>
                                <input type="password" name="password_lama" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Password Baru</label>
                                <input type="password" name="password_baru" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="konfirmasi_password" class="form-control" required>
            </div>
            <button type="submit" name="ganti_password" class="btn btn-primary">Ganti Password</button>
        </form>
    </div>
</body>
</html>
