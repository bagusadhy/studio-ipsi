<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function pesanan_saya($user_id)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where('user_id', $user_id);
        $this->db->join('status', 'status.id = pesanan.status_id');
        $this->db->join('jasa', 'jasa.id = pesanan.jasa_id');
        $query = $this->db->get();

        return $query->result_array();
    }
}
