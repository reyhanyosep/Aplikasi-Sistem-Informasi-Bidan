<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // Check if user is logged in
        if (!$this->session->userdata('id_user')) {
            redirect('login');
        }
    }

    public function index() {
        $this->load->view('ganti_password');
    }

    public function process() {
        if ($this->input->method() == 'post') {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');
            $konfirmasi_password = $this->input->post('konfirmasi_password');
            $id_user = $this->session->userdata('id_user');

            if ($password_baru == $konfirmasi_password) {
                // Verifikasi password lama
                $this->load->model('M_user');
                $user = $this->M_user->get_user_by_id($id_user);
                
                if (password_verify($password_lama, $user['password'])) {
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                    $update = $this->M_user->update_password($id_user, $password_hash);
                    
                    if ($update) {
                        $this->session->set_flashdata('success', 'Password berhasil diubah');
                    } else {
                        $this->session->set_flashdata('error', 'Gagal mengubah password');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Password lama tidak sesuai');
                }
            } else {
                $this->session->set_flashdata('error', 'Password baru dan konfirmasi tidak sama');
            }
            
            redirect('password');
        }
    }
}
