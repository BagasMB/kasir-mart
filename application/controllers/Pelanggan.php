<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data = [
            'title'     => 'Data Pelanggan',
            'pelanggan' => $this->db->get('pelanggan')->result_array(),
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->template->load('template', 'kasir/pelanggan', $data);
    }

    public function transaksiPelanggan($id)
    {
        $data = [
            'title'     => 'Data Transaksi Pelanggan',
            'pelanggan' => $this->db->where('id_pelanggan', $id)->get('pelanggan')->row(),
            'penjualan' => $this->db->order_by('id_penjualan', 'DESC')->where('pelanggan.id_pelanggan', $id)->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id_pelanggan')->get('penjualan')->result_array(),
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->template->load('template', 'kasir/viewTransaksiPelanggan', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telepon', 'trim|required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('gagal', 'Yahh, Semua Field Harus DiIsi!!!');
            redirect('pelanggan');
        } else {
            $data = [
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'telp' => $this->input->post('telp'),
                'alamat' => $this->input->post('alamat'),
            ];
            $this->db->insert('pelanggan', $data);
            $this->session->set_flashdata('berhasil', 'Yeaaaaaaaaaay!!!');
            redirect('pelanggan');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telepon', 'trim|required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('gagal', 'Yahh, Semua Field Harus DiIsi!!!');
            redirect('pelanggan');
        } else {
            $data = [
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'telp' => $this->input->post('telp'),
                'alamat' => $this->input->post('alamat'),
            ];
            $where = ['id_pelanggan' => $this->input->post('id_pelanggan')];
            $this->db->update('pelanggan', $data, $where);
            $this->session->set_flashdata('berhasil', 'Gemgeekang Gacorr!!!');
            redirect('pelanggan');
        }
    }

    public function hapus($id)
    {
        $where = array('id_kategori' => $id);
        $this->db->delete('kategori', $where);
        $this->session->set_flashdata('berhasil', 'Berhasil DiHapus!!!');
        redirect('kategori');
    }
}
