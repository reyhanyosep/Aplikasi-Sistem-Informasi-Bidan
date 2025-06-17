<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekammedis extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // Cek login
        if($this->session->userdata('level') != 'admin') {
            redirect('welcome');
        }
        // Load model yang dibutuhkan
        $this->load->model('Rekammedis_model');
        $this->load->model('Pasien_model');
        $this->load->model('Bidan_model');
        $this->load->model('Obat_model');
        $this->load->model('Ruangan_model');
    }

    public function index() {
        // Ambil data untuk ditampilkan
        $data['rekammedis'] = $this->Rekammedis_model->get_all_rekammedis();
        $data['pasien'] = $this->Pasien_model->get_all();
        $data['bidan'] = $this->Bidan_model->get_all();
        $data['obat'] = $this->Obat_model->get_all();
        $data['ruangan'] = $this->Ruangan_model->get_all();
        
        // Load view
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/rekammedis', $data);
        $this->load->view('admin/templates/footer');
    }

    public function tambah() {
        $data = array(
            'id_pasien' => $this->input->post('id_pasien'),
            'id_bidan' => $this->input->post('id_bidan'),
            'diagnosa' => $this->input->post('diagnosa'),
            'id_obat' => $this->input->post('id_obat'),
            'id_ruangan' => $this->input->post('id_ruangan'),
            'tanggal' => $this->input->post('tanggal')
        );

        if($this->Rekammedis_model->tambah_rekammedis($data)) {
            $this->session->set_flashdata('success', 'Data rekam medis berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data rekam medis');
        }
        
        redirect('admin/rekammedis');
    }

    public function edit($id) {
        $data = array(
            'id_pasien' => $this->input->post('id_pasien'),
            'id_bidan' => $this->input->post('id_bidan'),
            'diagnosa' => $this->input->post('diagnosa'),
            'id_obat' => $this->input->post('id_obat'),
            'id_ruangan' => $this->input->post('id_ruangan'),
            'tanggal' => $this->input->post('tanggal')
        );

        $this->Rekammedis_model->update_rekammedis($id, $data);
        redirect('admin/rekammedis');
    }

    public function hapus($id) {
        if($this->Rekammedis_model->delete_rekammedis($id)) {
            $this->session->set_flashdata('success', 'Data rekam medis berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data rekam medis');
        }
        redirect('admin/rekammedis');
    }

    public function cetak($id) 
    {
        $data['detail'] = $this->db->query("
            SELECT rm.*, p.nama as nama_pasien, b.nama as nama_bidan, 
                   o.nama_obat, r.nama_ruangan
            FROM rekam_medis rm
            JOIN tb_pasien p ON rm.id_pasien = p.id
            JOIN tb_barang b ON rm.id_bidan = b.id
            JOIN tb_farmasi o ON rm.id_obat = o.id
            JOIN tb_ruangan r ON rm.id_ruangan = r.id
            WHERE rm.id = $id
        ")->row_array();
        
        $this->load->view('admin/cetak_rekammedis', $data);
    }
}