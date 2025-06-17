<?php
session_start();
require_once '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi_password = $_POST['konfirmasi_password'];
    $id_user = $_SESSION['id_user'];

    if ($password_baru == $konfirmasi_password) {
        // Verifikasi password lama
        $query = mysqli_query($koneksi, "SELECT password FROM users WHERE id='$id_user'");
        $data = mysqli_fetch_assoc($query);
        
        if (password_verify($password_lama, $data['password'])) {
            $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
            $update = mysqli_query($koneksi, "UPDATE users SET password='$password_hash' WHERE id='$id_user'");
            
            if ($update) {
                $_SESSION['success'] = "Password berhasil diubah";
            } else {
                $_SESSION['error'] = "Gagal mengubah password";
            }
        } else {
            $_SESSION['error'] = "Password lama tidak sesuai";
        }
    } else {
        $_SESSION['error'] = "Password baru dan konfirmasi tidak sama";
    }
    
    header("Location: ../views/ganti_password.php");
    exit();
}
?>
