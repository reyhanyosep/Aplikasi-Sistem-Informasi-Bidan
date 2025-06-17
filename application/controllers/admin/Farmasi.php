<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Farmasi extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('M_farmasi');
    }

    public function index() {
        $data['farmasi'] = $this->M_farmasi->get_all();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/farmasi', $data);
        $this->load->view('admin/templates/footer');
    }

    public function add() {
        $data = array(
            'nama_obat' => $this->input->post('nama_obat'),
            'jenis_obat' => $this->input->post('jenis_obat'),
            'stok' => $this->input->post('stok'),
            'harga' => $this->input->post('harga')
        );
        $this->M_farmasi->insert($data);
        redirect('admin/farmasi');
    }

    public function edit($id) {
        $data = array(
            'nama_obat' => $this->input->post('nama_obat'),
            'jenis_obat' => $this->input->post('jenis_obat'),
            'stok' => $this->input->post('stok'),
            'harga' => $this->input->post('harga')
        );
        $this->M_farmasi->update($id, $data);
        redirect('admin/farmasi');
    }

    public function delete($id) {
        $this->M_farmasi->delete($id);
        redirect('admin/farmasi');
    }

    public function cetak($id) 
    {
        $data['detail'] = $this->db->get_where('tb_farmasi', ['id' => $id])->row();
        $this->load->view('admin/cetak_farmasi', $data);
    }
}