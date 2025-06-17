<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {
    
    public function get_all() {
        return $this->db->get('tb_pasien')->result_array();
    }

    public function get_pasien_by_id($id) {
        return $this->db->get_where('tb_pasien', ['id' => $id])->row_array();
    }

    public function tambah_pasien($data) {
        return $this->db->insert('tb_pasien', $data);
    }

    public function edit_pasien($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tb_pasien', $data);
    }

    public function hapus_pasien($id) {
        return $this->db->delete('tb_pasien', ['id' => $id]);
    }
}
