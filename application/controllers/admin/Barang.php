<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['barang'] = $this->m_barang->tampil_data('tb_barang')->result();

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/sidebar');
		$this->load->view('admin/barang', $data);
		$this->load->view('admin/templates/footer');
	}

	public function get_all_barang() {
        return $this->db->get('tb_barang')->result_array();
    }


	public function tambah_barang()
	{
		$nama	= $this->input->post('nama');
		$spesialis	= $this->input->post('spesialis');
		$alamat	= $this->input->post('alamat');
		$nomor	= $this->input->post('nomor');

		$data = array(
			'nama'	=> $nama,
			'spesialis'	=> $spesialis,
			'alamat'	=> $alamat,
			'nomor'	=> $nomor
		);

		$this->m_barang->insert($data, 'tb_barang');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Selamat!</strong> Data barang berhasil ditambahkan
			</div>
		');
		redirect('admin/barang');
	}

	public function hapus($id)
	{
		$where = array('id' => $id);

		$this->m_barang->delete($where, 'tb_barang');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Selamat!</strong> Data barang berhasil dihapus
			</div		');

		redirect('admin/barang');
	}

	public function edit_aksi()
	{
		$id 	= $this->input->post('id');
		$nama 	= $this->input->post('nama');
		$spesialis 	= $this->input->post('spesialis');
		$alamat 	= $this->input->post('alamat');
		$nomor 	= $this->input->post('nomor');

		$data = array(
			'nama'	=> $nama,
			'spesialis'	=> $spesialis,
			'alamat'	=> $alamat,
			'nomor'	=> $nomor
		);

		$where = array('id' => $id);

		$this->m_barang->update($data, $where, 'tb_barang');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Selamat!</strong> Data barang berhasil diubah
			</div>
		');
		redirect('admin/barang');
	}

	public function cetak($id)
	{
	    $data['detail'] = $this->db->get_where('tb_barang', ['id' => $id])->row();
	    $this->load->view('admin/cetak_bidan', $data);
	}
}
