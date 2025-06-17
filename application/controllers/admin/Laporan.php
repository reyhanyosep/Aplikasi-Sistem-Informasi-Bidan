<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if($this->session->userdata('level') != 'admin') {
            redirect('welcome');
        }
        $this->load->model('Rekammedis_model');
    }

    public function index() {
        $data['rekammedis'] = $this->Rekammedis_model->get_all_rekammedis();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/laporan', $data);
        $this->load->view('admin/templates/footer');
    }

    public function filter() {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $data['rekammedis'] = $this->Rekammedis_model->get_by_date_range($dari, $sampai);
        
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/laporan', $data);
        $this->load->view('admin/templates/footer');
    }

    public function pdf() {
        // Implement PDF export
    }

    public function json() {
        $data = $this->Rekammedis_model->get_all_rekammedis();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function cetak() 
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $pilih = $this->input->post('pilih');
        
        $where = "";
        if($dari && $sampai) {
            $where .= " AND rm.tanggal BETWEEN '$dari' AND '$sampai'";
        }
        if($pilih) {
            $ids = implode(",", $pilih);
            $where .= " AND rm.id IN ($ids)";
        }
        
        $data['rekammedis'] = $this->db->query("
            SELECT rm.*, p.nama as nama_pasien, b.nama as nama_bidan, 
                   o.nama_obat, r.nama_ruangan
            FROM rekam_medis rm
            JOIN tb_pasien p ON rm.id_pasien = p.id
            JOIN tb_barang b ON rm.id_bidan = b.id
            JOIN tb_farmasi o ON rm.id_obat = o.id
            JOIN tb_ruangan r ON rm.id_ruangan = r.id
            WHERE 1=1 $where
            ORDER BY rm.tanggal DESC
        ")->result_array();
        
        $this->load->view('admin/cetak_laporan', $data);
    }
}
