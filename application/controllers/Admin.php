<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model');
        $data['pesanan'] = $this->Admin_model->pesanan_masuk();

        // var_dump($data['pesanan']);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function log_pesanan()
    {
        $data['title'] = 'Log Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // load model
        $this->load->model('Admin_model');
        $data['pesanan'] = $this->Admin_model->log_pesanan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/log_pesanan', $data);
        $this->load->view('templates/footer');
    }
    public function kelola_jasa()
    {
        $data['title'] = 'Kelola Jasa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jasa'] = $this->db->get('jasa')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelola_jasa', $data);
        $this->load->view('templates/footer');
    }
    public function kelola_pesanan()
    {
        $data['title'] = 'Kelola Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model');
        $data['pesanan'] = $this->Admin_model->kelola_pesanan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelola_pesanan', $data);
        $this->load->view('templates/footer');
    }
    public function proses_pesanan()
    {
        $status_id = $_GET['action'];
        $id_pesanan = $_GET['id'];

        // var_dump($status_id);
        // var_dump($id_pesanan);
        // die;

        $this->load->model('Admin_model');
        $this->Admin_model->proses_pesanan($status_id, $id_pesanan);
    }
    public function tambah_jasa()
    {
        $data = [
            'name' => $this->input->post('jasa'),
            'deskripsi' => $this->input->post('deskripsi')
        ];

        $this->db->insert('jasa', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Jasa berhasil ditambahkan</div>');
        redirect('admin/kelola_jasa');
    }
    public function hapus_jasa()
    {
        $id = $_GET['id'];

        $this->db->where('id', $id);
        $this->db->delete('jasa');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Jasa berhasil dihapus</div>');
        redirect('admin/kelola_jasa');
    }
    public function edit_jasa()
    {
        $id = $_GET['id'];
        $data = [
            'name' =>  $this->input->post('jasa'),
            'deskripsi' =>  $this->input->post('deskripsi')
        ];
        $this->db->where('id', $id);
        $this->db->update('jasa', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Jasa berhasil diedit</div>');
        redirect('admin/kelola_jasa');
    }

    public function edit_pesanan()
    {
        $id = $_GET['id'];
        $data = [
            'status_id' => $this->input->post('status')
        ];

        // var_dump($data);
        // die;

        $this->db->where('id', $id);
        $this->db->update('pesanan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Status pesanan berhasil diedit</div>');
        redirect('admin/kelola_pesanan');
    }
}
