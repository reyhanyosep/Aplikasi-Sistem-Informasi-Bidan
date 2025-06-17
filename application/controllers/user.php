<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Cek apakah sudah login dan level user
        if ($this->session->userdata('level') != 'user') {
            redirect('welcome');
        }
    }

    public function dashboard()
    {
        $this->load->view('user/dashboard');
    }

    public function daftar_pasien()
    {
        $nama = $this->input->post('nama');
        $alamat_rumah       = $this->input->post('alamat_rumah');
        $no_telp            = $this->input->post('no_telp');
        $jenis_kelamin      = $this->input->post('jenis_kelamin');
        $nik_ktp            = $this->input->post('nik_ktp');
        $keluhan            = $this->input->post('keluhan');
        $tanggal            = $this->input->post('tanggal');

        $data = [
            'nama'              => $nama,
            'alamat_rumah'      => $alamat_rumah,
            'no_telp'           => $no_telp,
            'jenis_kelamin'     => $jenis_kelamin,
            'nik_ktp'           => $nik_ktp,
            'keluhan'           => $keluhan,
            'tanggal'           => $tanggal
        ];

        $this->db->insert('tb_pasien', $data);

        $this->session->set_flashdata('pesan', 'Pasien berhasil didaftarkan!');
        redirect('user/dashboard');
    }


    public function laporan()
    {
        $data['pasien'] = $this->db->get('tb_pasien')->result_array();
        $this->load->view('user/laporan', $data);
    }
}

