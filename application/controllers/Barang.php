<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null) {
            redirect('auth');
        }
        $this->load->model('BarangModel');
    }

    public function index()
    {
        $data = [
            'title'     => 'Data Barang',
            'barang'    => $this->BarangModel->getBarang(),
            'kategori'  => $this->db->get('kategori')->result_array(),
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->template->load('template', 'kasir/barang', $data);
    }

    public function get_autofill()
    {
        if (isset($_GET['term'])) {
            $result = $this->BarangModel->cariBarang($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) {
                    $all_result[] = $row->nama;
                    echo json_encode($all_result);
                }
            }
        }
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga Jual', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('gagal', 'Yahh, Semua Field Harus DiIsi!!!');
            redirect('barang');
        } else {
            $this->BarangModel->tambah();
            $this->session->set_flashdata('berhasil', 'Yeaaaaaaaaaay!!!');
            redirect('barang');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga Jual', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('gagal', 'Yahh, Semua Field Harus DiIsi!!!');
            redirect('barang');
        } else {
            $this->BarangModel->edit();
            $this->session->set_flashdata('berhasil', 'Gemgeekang Gacorr!!!');
            redirect('barang');
        }
    }

    public function hapus($id)
    {
        $where = array('id_barang' => $id);
        $this->db->delete('barang', $where);
        $this->session->set_flashdata('berhasil', 'Berhasil DiHapus!!!');
        redirect('barang');
    }
}
