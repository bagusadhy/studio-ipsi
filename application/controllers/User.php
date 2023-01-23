<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jasa'] = $this->db->get('jasa')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function pesanan_saya()
    {
        $data['title'] = 'Pesanan Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $data['user']['id'];

        // load model
        $this->load->model('user_model');
        $data['pesanan'] = $this->user_model->pesanan_saya($user_id);
        // load view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/pesanan_saya', $data);
        $this->load->view('templates/footer');
    }
    public function pesan()
    {
        $this->load->library('form_validation');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_jasa = $_GET['jasa_id'];

        $data['jasa'] = $this->db->get_where('jasa', ['id' => $id_jasa])->row_array();

        $data['title'] = 'Pesan ' . $data['jasa']['name'];

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('wa', 'Wa', 'required|trim|max_length[15]', ['max_length' => 'Nomor whatsapp terlalu panjang']);
        $this->form_validation->set_rules('konsep', 'Konsep', 'required|trim|max_length[1000]', ['max_length' => 'Konsep terlalu panjang']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/form_pemesanan', $data);
            $this->load->view('templates/footer');
        } else {
            $data_pesanan = [
                'jasa_id' => $this->input->post('id_jasa'),
                'user_id' => $data['user']['id'],
                'status_id' => 4,
                'tanggal_pemesanan' => date('Y-m-d'),
                'no_telp' => $this->input->post('wa'),
                'email' => $data['user']['email'],
                'konsep' => $this->input->post('konsep'),
                'alamat' => $this->input->post('alamat')
            ];

            $this->db->insert('pesanan', $data_pesanan);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat pesanan anda sedang direview, silahkan lihat <b>Pesanan Saya</b> untuk mengecek statusnya</div>');
            redirect('user/index');
        }
    }
}
