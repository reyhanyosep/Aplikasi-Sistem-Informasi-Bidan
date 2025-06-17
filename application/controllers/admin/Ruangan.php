<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_ruangan');
        // Adjust this according to your actual session variable names
        if(!$this->session->userdata('username')) {
            redirect('welcome');
        }
    }

    public function index() {
        $data['ruangan'] = $this->M_ruangan->get_all();
        $data['title'] = 'Data Ruangan';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/ruangan', $data);
        $this->load->view('admin/templates/footer');
    }

    public function add() {
        $data = array(
            'nama_ruangan' => $this->input->post('nama_ruangan'),
            'keterangan' => $this->input->post('keterangan'),
            'status' => $this->input->post('status')
        );

        $this->M_ruangan->insert($data);
        $this->session->set_flashdata('success', 'Data ruangan berhasil ditambahkan');
        redirect('admin/ruangan');
    }

    public function edit($id) {
        $data = [
            'nama_ruangan' => $this->input->post('nama_ruangan'),
            'keterangan' => $this->input->post('keterangan'),
            'status' => $this->input->post('status')
        ];
        
        $update = $this->M_ruangan->update($id, $data);
        if($update) {
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diupdate');
        }
        redirect('admin/ruangan');
    }

    public function delete($id) {
        $this->M_ruangan->delete($id);
        $this->session->set_flashdata('success', 'Data ruangan berhasil dihapus');
        redirect('admin/ruangan');
    }
}
