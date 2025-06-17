<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
    
    public function get_user_by_id($id) {
        return $this->db->get_where('tb_user', ['id' => $id])->row_array();
    }
    
    public function update_password($id, $password) {
        return $this->db->update('tb_user', ['password' => $password], ['id' => $id]);
    }
}
