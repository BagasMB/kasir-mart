<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Voucher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null) {
            redirect('auth');
        } elseif ($this->session->userdata('level') != 'Admin') {
            redirect('auth/block');
        }
        $this->load->model('UserModel');
    }

    public function index()
    {
        $data = [
            'title'     => 'Voucher',
            'voucher' => $this->db->get('voucher')->result_array(),
            'kategori'  => $this->db->get('kategori')->result_array(),
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->template->load('template', 'admin/voucher', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_voucher', 'Nama', 'trim|required');
        $this->form_validation->set_rules('potongan_harga', 'Harga Jual', 'trim|required|numeric');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('gagal', 'Yahh, Semua Filed Harus DiIsi!!!');
            redirect('voucher');
        } elseif (date('Y-m-d') > $this->input->post('waktu')) {
            $this->session->set_flashdata('gagal', 'Yahh, Tanggalnya Harus Lebih Atau Sama Dengan Tanggal Sekarang!!!');
            redirect('voucher');
        } else {
            $data = [
                'nama_voucher'      => $this->input->post('nama_voucher'),
                'potongan_harga'    => $this->input->post('potongan_harga'),
                'jumlah'            => $this->input->post('jumlah'),
                'waktu'             => $this->input->post('waktu'),
            ];
            $this->db->insert('voucher', $data);
            $this->session->set_flashdata('berhasil', 'Yeaaaaaaaaaay!!!');
            redirect('voucher');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nama_voucher', 'Nama', 'trim|required');
        $this->form_validation->set_rules('potongan_harga', 'Harga Jual', 'trim|required|numeric');
        // $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');

        // var_dump($data);
        // die;
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('gagal', 'Yahh, Semua Filed Harus DiIsi!!!');
            redirect('voucher');
        } elseif (date('Y-m-d') > $this->input->post('waktu')) {
            $this->session->set_flashdata('gagal', 'Yahh, Tanggalnya Harus Lebih Atau Sama Dengan Tanggal Sekarang!!!');
            redirect('voucher');
        } else {
            $data = [
                'nama_voucher'      => $this->input->post('nama_voucher'),
                'potongan_harga'    => $this->input->post('potongan_harga'),
                'jumlah'            => $this->input->post('jumlah'),
                'waktu'             => $this->input->post('waktu'),
            ];
            $where = ['id_voucher' => $this->input->post('id_voucher')];
            $this->db->update('voucher', $data, $where);
            $this->session->set_flashdata('berhasil', 'Yeaaaaaaaaaay!!!');
            redirect('voucher');
        }
    }

    public function hapus($id)
    {
        $where = array('id_voucher' => $id);
        $this->db->delete('voucher', $where);
        $this->session->set_flashdata('berhasil', 'Berhasil DiHapus');
        redirect('voucher');
    }
}
