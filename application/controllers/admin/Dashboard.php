<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        if (!$this->session->userdata('id')) {
            redirect('welcome');
        }
    }

    public function index()
    {
        // Count data for dashboard boxes
        $data['jumlahBarang'] = $this->db->count_all('tb_barang');
        $data['barangMasuk'] = $this->db->count_all('tb_pasien');
        $data['barangKeluar'] = $this->db->count_all('tb_ruangan');
        $data['jumlahObat'] = $this->db->count_all('tb_farmasi');

        // Load views in correct order
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/templates/footer');
    }
}