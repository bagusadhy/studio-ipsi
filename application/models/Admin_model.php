<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function pesanan_masuk()
    {
        // $this->db->select('*');
        // $this->db->from('pesanan');
        // $this->db->join('jasa', 'jasa.id = pesanan.jasa_id');
        // $this->db->where('status_id', 4);

        $this->db->select('*');
        $this->db->from('jasa');
        $this->db->join('pesanan', 'pesanan.jasa_id = jasa.id');
        $this->db->where('status_id', 4);

        $query = $this->db->get();

        return $query->result_array();
    }
    public function log_pesanan()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('status', 'status.id = pesanan.status_id');
        $this->db->join('jasa', 'jasa.id = pesanan.jasa_id');
        $query = $this->db->get();


        return $query->result_array();
    }

    public function proses_pesanan($status_id, $id_pesanan)
    {
        $data = ['status_id' => $status_id];

        $this->db->where('id', $id_pesanan);
        $this->db->update('pesanan', $data);

        redirect('admin/index');
    }
    public function kelola_pesanan()
    {
        $this->db->select('*');
        $this->db->from('jasa');
        $this->db->join('pesanan', 'pesanan.jasa_id = jasa.id');
        $this->db->where('status_id', 2);

        $query = $this->db->get();

        return $query->result_array();
    }
}
