<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_farmasi extends CI_Model {
    
    public function get_all() {
        return $this->db->get('tb_farmasi')->result();
    }

    public function insert($data) {
        return $this->db->insert('tb_farmasi', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tb_farmasi', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tb_farmasi');
    }
}