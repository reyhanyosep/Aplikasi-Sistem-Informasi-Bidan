<?php
session_start();
require_once "../config/koneksi.php";

if(isset($_POST['ganti_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $user_id = $_SESSION['user_id']; // Assuming you have user_id in session

    // Verify old password
    $query = "SELECT password FROM users WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if(password_verify($old_password, $user['password'])) {
        if($new_password === $confirm_password) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_query = "UPDATE users SET password = ? WHERE id = ?";
            $stmt = mysqli_prepare($koneksi, $update_query);
            mysqli_stmt_bind_param($stmt, "si", $hashed_password, $user_id);
            
            if(mysqli_stmt_execute($stmt)) {
                $_SESSION['success'] = "Password berhasil diubah";
            } else {
                $_SESSION['error'] = "Gagal mengubah password";
            }
        } else {
            $_SESSION['error'] = "Password baru tidak cocok";
        }
    } else {
        $_SESSION['error'] = "Password lama salah";
    }
    
    header("Location: ../views/ganti_password.php");
    exit();
}
?>
