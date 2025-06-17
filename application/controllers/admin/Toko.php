<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['toko'] = $this->m_toko->tampil_data('tb_toko')->result();

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/toko', $data);
		$this->load->view('admin/templates/footer');
	}

	public function tambah_pasien()
	{
		$nama	= $this->input->post('nama');
		$alamat_rumah	= $this->input->post('alamat_rumah');
		$no_telp	= $this->input->post('no_telp');
		$jenis_kelamin	= $this->input->post('jenis_kelamin');
		$nik_ktp	= $this->input->post('nik_ktp');
		$keluhan	= $this->input->post('keluhan');
		$tanggal	= $this->input->post('tanggal');
		$tanggal	= $this->input->post('tanggal');
		$feedback_admin	= $this->input->post('feedback_admin');



		$data = array(
			'nama'	=> $nama,
			'alamat_rumah'	=> $alamat_rumah,
			'no_telp'	=> $no_telp,
			'jenis_kelamin'	=> $jenis_kelamin,
			'nik_ktp'	=> $nik_ktp,
			'keluhan'	=> $keluhan,
			'tanggal'	=> $tanggal,
			'feedback_admin'	=> $feedback_admin
		);

		$this->m_barang->insert($data, 'tb_pasien');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Selamat!</strong> Data Pasien berhasil ditambahkan
			</div>
		');
		redirect('admin/toko');
	}
	public function hapus($id)
	{
		$where = array('id' => $id);

		$this->m_barang->delete($where, 'tb_pasien');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Selamat!</strong> Data Pasien berhasil dihapus
			</div		');

		redirect('admin/toko');
	}
	public function edit_aksi()
	{
		$nama	= $this->input->post('nama');
		$alamat_rumah	= $this->input->post('alamat_rumah');
		$no_telp	= $this->input->post('no_telp');
		$jenis_kelamin	= $this->input->post('jenis_kelamin');
		$nik_ktp	= $this->input->post('nik_ktp');
		$keluhan	= $this->input->post('keluhan');
		$tanggal	= $this->input->post('tanggal');
		$feedback_admin	= $this->input->post('feedback_admin');



		$data = array(
			'nama'	=> $nama,
			'alamat_rumah'	=> $alamat_rumah,
			'no_telp'	=> $no_telp,
			'jenis_kelamin'	=> $jenis_kelamin,
			'nik_ktp'	=> $nik_ktp,
			'keluhan'	=> $keluhan,
			'tanggal'	=> $tanggal,
			'feedback_admin'	=> $feedback_admin
		);

		$where = array('id' => $id);

		$this->m_barang->update($data, $where, 'tb_pasien');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Selamat!</strong> Data Pasien berhasil diubah
			</div>
		');
		redirect('admin/toko');
	}
}
