<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Reset Password</title>
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<style>
body {
	color: #fff;
}
.form-control {
	min-height: 41px;
	background: #fff;
	box-shadow: none !important;
	border-color: #e3e3e3;
}
.form-control:focus {
	border-color: #70c5c0;
}
.form-control, .btn {        
	border-radius: 2px;
}
.login-form {
	width: 350px;
	margin: 0 auto;
	padding: 100px 0 30px;		
}
.login-form form {
	color: #7a7a7a;
	border-radius: 2px;
	margin-bottom: 15px;
	font-size: 13px;
	background: #ececec;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;	
	position: relative;	
}
.login-form h2 {
	font-size: 22px;
	margin: 35px 0 25px;
}
.login-form .avatar {
    position: absolute;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: -50px;
    width: 95px;
    height: 95px;
    border-radius: 50%;
    z-index: 9;
    background: #70c5c0;
    padding: 15px;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    display: flex;           /* Tambahan */
    align-items: center;     /* Tambahan */
    justify-content: center; /* Tambahan */
}
.login-form .avatar img {
	width: 100%;
}	
.login-form input[type="checkbox"] {
	position: relative;
	top: 1px;
}
.login-form .btn, .login-form .btn:active {        
	font-size: 16px;
	font-weight: bold;
	background: #70c5c0 !important;
	border: none;
	margin-bottom: 20px;
}
.login-form .btn:hover, .login-form .btn:focus {
	background: #50b8b3 !important;
}    
.login-form a {
	color: #fff;
	text-decoration: underline;
}
.login-form a:hover {
	text-decoration: none;
}
.login-form form a {
	color: #7a7a7a;
	text-decoration: none;
}
.login-form form a:hover {
	text-decoration: underline;
}
.login-form .bottom-action {
	font-size: 14px;
}
</style>
</head>
<body>
<div class="login-form">
    <?php 
    // Debug information
    if(isset($_SESSION)) {
        error_log('Session data: ' . print_r($_SESSION, true));
    }
    ?>
    <form action="<?php echo $this->session->flashdata('show_reset_form') ? site_url('welcome/simpan_password_baru') : site_url('welcome/proses_lupa_password'); ?>" method="POST">
        <div class="avatar">
            <i class="fa fa-lock" style="font-size: 65px; color: white;"></i>
        </div>
        <h2 class="text-center"><?php echo $this->session->flashdata('show_reset_form') ? 'Reset Password' : 'Lupa Password'; ?></h2>
        <?php if($this->session->flashdata('pesan')): ?>
            <?php echo $this->session->flashdata('pesan'); ?>
        <?php endif; ?>
        
        <?php if(!$this->session->flashdata('show_reset_form')): ?>
            <!-- Form pencarian username -->
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Cari Username</button>
            </div>
        <?php else: ?>
            <!-- Form reset password -->
            <div class="form-group">
                <input type="password" class="form-control" name="password_baru" placeholder="Password Baru" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="konfirmasi" placeholder="Konfirmasi Password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Reset Password</button>
            </div>
        <?php endif; ?>
        <div class="bottom-action clearfix">
            <a href="<?php echo site_url('welcome'); ?>" class="float-right">Kembali ke Login</a>
        </div>
    </form>
</div>
</body>
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
</body>
</html>