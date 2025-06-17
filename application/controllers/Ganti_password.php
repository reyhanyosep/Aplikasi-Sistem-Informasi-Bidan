<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ganti_password extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        session_start();
        $this->load->database();
    }

    public function index() {
        $this->load->view('ganti_password');
    }

    public function proses() {
        $password_lama = $this->input->post('password_lama');
        $password_baru = $this->input->post('password_baru');
        $konfirmasi_password = $this->input->post('konfirmasi_password');
        
        // Validasi input
        if (empty($password_lama) || empty($password_baru) || empty($konfirmasi_password)) {
            $_SESSION['error'] = "Semua field harus diisi";
            redirect('ganti_password');
            return;
        }

        // Cek apakah password baru dan konfirmasi sama
        if ($password_baru !== $konfirmasi_password) {
            $_SESSION['error'] = "Password baru dan konfirmasi password tidak sama";
            redirect('ganti_password');
            return;
        }

        // Ambil data user dari database
        $id_user = $_SESSION['id_user'];
        $query = $this->db->get_where('tb_user', ['id' => $id_user]);
        $user = $query->row_array();

        if (!$user) {
            $_SESSION['error'] = "User tidak ditemukan";
            redirect('ganti_password');
            return;
        }

        // Verifikasi password lama
        if (!password_verify($password_lama, $user['password'])) {
            $_SESSION['error'] = "Password lama tidak sesuai";
            redirect('ganti_password');
            return;
        }

        // Update password baru
        $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
        $this->db->where('id', $id_user);
        $update = $this->db->update('tb_user', ['password' => $password_hash]);

        if ($update) {
            $_SESSION['success'] = "Password berhasil diubah";
        } else {
            $_SESSION['error'] = "Gagal mengubah password";
        }

        redirect('ganti_password');
    }
}
