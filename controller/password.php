<?php
session_start();
include_once '../config/koneksi.php';

if(isset($_POST['ganti_password'])) {
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi_password = $_POST['konfirmasi_password'];
    $id_user = $_SESSION['id_user'];

    // Cek password lama
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user='$id_user'");
    $data = mysqli_fetch_array($query);
    
    if(password_verify($password_lama, $data['password'])) {
        if($password_baru == $konfirmasi_password) {
            $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
            $update = mysqli_query($koneksi, "UPDATE users SET password='$password_hash' WHERE id_user='$id_user'");
            
            if($update) {
                $_SESSION['success'] = "Password berhasil diubah";
            } else {
                $_SESSION['error'] = "Gagal mengubah password";
            }
        } else {
            $_SESSION['error'] = "Password baru tidak sama dengan konfirmasi password";
        }
    } else {
        $_SESSION['error'] = "Password lama tidak sesuai";
    }
    
    header("Location: ../views/ganti_password.php");
    exit();
}
?>
