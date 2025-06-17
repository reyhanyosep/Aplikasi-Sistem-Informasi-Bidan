<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function lupa_password()
    {
        $this->load->view('lupa_password');
    }

    public function proses_lupa_password() {
        $this->load->database();
        
        $username = $this->input->post('username');
        
        // Debug
        error_log('Mencari username: ' . $username);
        
        // Query ke database
        $query = $this->db->get_where('tb_user', ['username' => $username]);
        error_log('Last query: ' . $this->db->last_query());
        $user = $query->row();
        
        if($user) {
            error_log('User ditemukan: ' . print_r($user, true));
            // Set session untuk menyimpan username yang akan direset passwordnya
            $this->session->set_userdata('reset_username', $username);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Username ditemukan. Silakan masukkan password baru Anda.</div>');
            $this->session->set_flashdata('show_reset_form', true);
        } else {
            error_log('User tidak ditemukan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Username tidak ditemukan</div>');
        }
        
        redirect('welcome/lupa_password');
    }

	public function simpan_password_baru()
    {
        // Load database
        $this->load->database();
        
        // Debug: Print post data
        error_log('POST data: ' . print_r($_POST, true));
        
        // Cek apakah ada session reset_username
        if (!$this->session->userdata('reset_username')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Sesi reset password tidak valid!</div>');
            redirect('welcome/lupa_password');
            return;
        }

        $username = $this->session->userdata('reset_username');
        $password_baru = $this->input->post('password_baru');
        $konfirmasi = $this->input->post('konfirmasi');
        
        // Debug: Print variables
        error_log('Username: ' . $username);
        error_log('Password Baru: ' . (empty($password_baru) ? 'kosong' : 'terisi'));
        error_log('Konfirmasi: ' . (empty($konfirmasi) ? 'kosong' : 'terisi'));

        if (empty($password_baru) || empty($konfirmasi)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Password baru dan konfirmasi harus diisi!</div>');
            $this->session->set_flashdata('show_reset_form', true);
            redirect('welcome/lupa_password');
            return;
        }

        if ($password_baru != $konfirmasi) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Konfirmasi password tidak cocok!</div>');
            $this->session->set_flashdata('show_reset_form', true);
            redirect('welcome/lupa_password');
            return;
        }

        // Hash password menggunakan MD5 untuk konsistensi dengan login
        $password_hash = md5($password_baru);
        
        // Debug: Print query yang akan dijalankan
        error_log('Update password untuk username: ' . $username);
        
        // Cek dulu apakah user ada
        $user = $this->db->get_where('tb_user', ['username' => $username])->row();
        if (!$user) {
            error_log('User tidak ditemukan di database');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">User tidak ditemukan!</div>');
            $this->session->set_flashdata('show_reset_form', true);
            redirect('welcome/lupa_password');
            return;
        }
        
        try {
            $this->db->trans_start();
            $this->db->where('username', $username);
            // Menggunakan MD5 untuk enkripsi password
            $update = $this->db->update('tb_user', ['password' => md5($password_baru)]);
            $affected_rows = $this->db->affected_rows();
            $this->db->trans_complete();
            
            error_log('Affected rows: ' . $affected_rows);
            error_log('Last query: ' . $this->db->last_query());
            
            if ($this->db->trans_status() === FALSE) {
                throw new Exception('Database error');
            }
            
            if ($affected_rows > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success">Password berhasil diganti, silakan login.</div>');
                $this->session->unset_userdata('reset_username');
                redirect('welcome');
            } else {
                error_log('No rows affected by update');
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Tidak ada perubahan password!</div>');
                $this->session->set_flashdata('show_reset_form', true);
                redirect('welcome/lupa_password');
            }
        } catch (Exception $e) {
            error_log('Error updating password: ' . $e->getMessage());
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gagal mengubah password! Error: ' . $e->getMessage() . '</div>');
            $this->session->set_flashdata('show_reset_form', true);
            redirect('welcome/lupa_password');
        }
    }

	public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'username' => $username,
            'password' => md5($password)
        );

        $user = $this->m_welcome->get_login($where, 'tb_user')->row();

        if ($user) {
            $datauser = array(
                'id'       => $user->id,
                'username' => $user->username,
                'nama'     => $user->nama,
                'foto'     => $user->foto,
                'level'    => $user->level // pastikan ada kolom level di tb_user
            );
            $this->session->set_userdata($datauser);

            // Redirect sesuai level
            if ($user->level == 'admin') {
                redirect('admin/dashboard');
            } elseif ($user->level == 'user') {
                redirect('user/dashboard');
            } else {
                redirect('welcome');
            }
        } else {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Maaf!</strong> Login gagal
                </div>
            ');
            redirect('welcome');
        }
    }
    public function kirim_feedback($id)
    {
        $feedback = $this->input->post('feedback_admin');
        $this->db->where('id', $id);
        $this->db->update('tb_pasien', ['feedback_admin' => $feedback]);
        redirect('admin/feedback_pasien');
    }

    public function kelola_pasien($id)
    {
        // Cek data pasien, tampilkan form edit, dll
        echo "Ini halaman kelola pasien dengan ID: " . $id;
    }
    
    public function laporan()
    {
        $data['pasien'] = $this->db->get('tb_pasien')->result_array();
        $this->load->view('user/laporan', $data);
    }

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
