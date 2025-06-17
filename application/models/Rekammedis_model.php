<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekammedis_model extends CI_Model {
    
    public function get_all_rekammedis() {
        $this->db->select('rekam_medis.*, tb_pasien.nama as nama_pasien, tb_barang.nama as nama_bidan, tb_farmasi.nama_obat, tb_ruangan.nama_ruangan');
        $this->db->from('rekam_medis');
        $this->db->join('tb_pasien', 'tb_pasien.id = rekam_medis.id_pasien');
        $this->db->join('tb_barang', 'tb_barang.id = rekam_medis.id_bidan');
        $this->db->join('tb_farmasi', 'tb_farmasi.id = rekam_medis.id_obat');
        $this->db->join('tb_ruangan', 'tb_ruangan.id = rekam_medis.id_ruangan');
        return $this->db->get()->result_array();
    }

    public function tambah_rekammedis($data) {
        return $this->db->insert('rekam_medis', $data);
    }

    public function update_rekammedis($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('rekam_medis', $data);
    }

    public function delete_rekammedis($id) {
        $this->db->where('id', $id);
        return $this->db->delete('rekam_medis');
    }

    public function get_by_date_range($dari, $sampai) {
        $this->db->select('rekam_medis.*, tb_pasien.nama as nama_pasien, tb_barang.nama as nama_bidan, tb_farmasi.nama_obat, tb_ruangan.nama_ruangan');
        $this->db->from('rekam_medis');
        $this->db->join('tb_pasien', 'tb_pasien.id = rekam_medis.id_pasien');
        $this->db->join('tb_barang', 'tb_barang.id = rekam_medis.id_bidan');
        $this->db->join('tb_farmasi', 'tb_farmasi.id = rekam_medis.id_obat');
        $this->db->join('tb_ruangan', 'tb_ruangan.id = rekam_medis.id_ruangan');
        $this->db->where('tanggal >=', $dari);
        $this->db->where('tanggal <=', $sampai);
        return $this->db->get()->result_array();
    }
}