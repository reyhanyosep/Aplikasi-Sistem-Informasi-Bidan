<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_model extends CI_Model {
    
    public function get_all() {
        return $this->db->get('tb_farmasi')->result_array();
    }
}
