
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pasien extends CI_Model {
    
    private $table = 'tb_pasien';

    public function get_all_pasien() 
    {
        try {
        $query = $this->db->get('tb_pasien');
        if ($query) {
            $result = $query->result_array();
            log_message('debug', 'Query success, found ' . count($result) . ' records');
            return $result;
        } else {
            log_message('error', 'Query failed: ' . $this->db->error()['message']);
            return array();
        }
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            return array();
        }
    }

    public function get_pasien_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function tambah_pasien($data) {
        $data['tanggal'] = date('Y-m-d');
        return $this->db->insert($this->table, $data);
    }

    public function update_pasien($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function hapus_pasien($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    public function hitung_total_pasien() {
        return $this->db->count_all($this->table);
    }

    public function cari_pasien($keyword) {
        $this->db->like('nama', $keyword);
        $this->db->or_like('nik_ktp', $keyword);
        return $this->db->get($this->table)->result();
    }
}