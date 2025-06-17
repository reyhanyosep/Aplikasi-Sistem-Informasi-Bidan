<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // Cek login dulu
        if($this->session->userdata('level') != 'admin') {
            redirect('welcome');
        }
        // Load model yang dibutuhkan
        $this->load->model('M_pasien');
        $this->load->model('Pasien_model');
        // Load helper
        $this->load->helper(['url', 'form']);
        // Load library
        $this->load->library(['session', 'form_validation']);
    }

    public function index() {
        redirect('admin/dashboard');
    }

    public function dashboard() {
        $data['total_pasien'] = $this->db->count_all('tb_pasien');
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/templates/footer');
    }

    public function laporanbidan() {
        $data['pasien'] = $this->db->get('tb_pasien')->result_array();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/laporanbidan', $data);
        $this->load->view('admin/templates/footer');
    }

    public function toko() 
{
    // Debug untuk melihat data
    $data['pasien'] = $this->M_pasien->get_all_pasien();
    // var_dump($data['pasien']); die; // Uncomment untuk debug
    
    $this->load->view('admin/templates/header');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/toko', $data);
    $this->load->view('admin/templates/footer');
}

    public function tambah_pasien()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat_rumah' => $this->input->post('alamat_rumah'),
            'no_telp' => $this->input->post('no_telp'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'nik_ktp' => $this->input->post('nik_ktp'),
            'keluhan' => $this->input->post('keluhan'),
            'tanggal' => $this->input->post('tanggal'),
            'feedback_admin' => $this->input->post('feedback_admin')
        );

        $this->db->insert('tb_pasien', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil ditambahkan!</div>');
        redirect('admin/toko'); // Ganti dari redirect('admin/dashboard')
    }

    public function update_pasien() {
        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat_rumah' => $this->input->post('alamat_rumah'),
            'no_telp' => $this->input->post('no_telp'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'nik_ktp' => $this->input->post('nik_ktp'),
            'keluhan' => $this->input->post('keluhan'),
            'feedback_admin' => $this->input->post('feedback_admin')
        );
        
        $this->db->where('id', $id);
        $this->db->update('tb_pasien', $data);
        
        $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sukses!</strong> Data pasien berhasil diperbarui
            </div>
        ');
        redirect('admin/toko');
    }


    

    public function profil() {
        $id = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('tb_user', ['id' => $id])->row_array();
        
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/profil', $data);
        $this->load->view('admin/templates/footer');
    }

    public function update_profil() {
        $id = $this->session->userdata('id');
        $data = array(
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama')
        );

        // Jika ada password baru
        if($this->input->post('password')) {
            $data['password'] = md5($this->input->post('password'));
        }

        $this->db->where('id', $id);
        $this->db->update('tb_user', $data);
        
        $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sukses!</strong> Profil berhasil diperbarui
            </div>
        ');
        redirect('admin/profil');
    }

    public function edit_pasien($id)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat_rumah' => $this->input->post('alamat_rumah'),
            'no_telp' => $this->input->post('no_telp'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'nik_ktp' => $this->input->post('nik_ktp'),
            'keluhan' => $this->input->post('keluhan'),
            'tanggal' => $this->input->post('tanggal'),
            'feedback_admin' => $this->input->post('feedback_admin')
        );

        $this->db->where('id', $id);
        $this->db->update('tb_pasien', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil diupdate!</div>');
        redirect('admin/toko'); // Ganti dari redirect('admin/dashboard')
    }

    public function hapus_pasien($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pasien');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil dihapus!</div>');
        redirect('admin/toko'); // Ganti dari redirect('admin/dashboard')
    }

    public function cetak($id) {
        $data['detail'] = $this->db->get_where('tb_pasien', ['id' => $id])->row_array();
        $this->load->view('admin/cetak_pasien', $data);
    }

    public function cetak_laporan() 
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        
        if($dari && $sampai) {
            $data['pasien'] = $this->db->query("
                SELECT * FROM tb_pasien 
                WHERE tanggal BETWEEN '$dari' AND '$sampai'
                ORDER BY tanggal DESC
            ")->result_array();
        } else {
            $data['pasien'] = $this->db->get('tb_pasien')->result_array();
        }
        
        $this->load->view('admin/cetak_laporanbidan', $data);
    }

}