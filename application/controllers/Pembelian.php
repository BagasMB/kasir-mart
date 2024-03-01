<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null) {
            redirect('auth');
        }
        $this->load->model('TransaksiModel');
        $this->load->model('BarangModel');
    }

    public function index()
    {
        $data = [
            'title'     => 'Pembelian',
            'pembelian' => $this->TransaksiModel->getPembelian(),
            'barang'    => $this->BarangModel->getBarang(),
            'supplier'  => $this->db->get('supplier')->result_array(),
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->template->load('template', 'kasir/pembelian', $data);
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

    public function add()
    {
        $data = [
            'title'     => 'Tambah Pembelian',
            'pembelian' => $this->TransaksiModel->getPembelian(),
            'barang'    => $this->BarangModel->getBarang(),
            'supplier'  => $this->db->get('supplier')->result_array(),
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->template->load('template', 'kasir/tambahPembelian', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('gagal', 'Yahh, Semua Field Harus DiIsi!!!');
            redirect('pembelian');
        } else {
            $this->TransaksiModel->tambahPembelian();
            // var_dump($this->db->last_query());
            // exit;
            $this->session->set_flashdata('berhasil', 'Yeaaaaaaaaaay!!!');
            redirect('pembelian');
        }
    }

    public function hapus($kode_pembelian)
    {
        $oo = $this->db->where('kode_pembelian', $kode_pembelian)->get('pembelian')->row();
        $rang = $this->db->where('kode_barang', $oo->kode_barang)->get('barang')->row();
        $date = date('Y-m-d');
        $wrw = $rang->stok - $oo->jumlah;
        if ($wrw < 0 || $oo->tanggal != $date) {
            $this->session->set_flashdata('gagal', 'Batas waktu penghapusan telah habis atau stoknya telah berkurang!!!');
            redirect('pembelian');
        } else {
            $data = ['stok' => $wrw];
            $where = array('kode_barang' => $rang->kode_barang);
            $this->db->update('barang', $data, $where);
            $where2 = array('kode_pembelian' => $kode_pembelian);
            $this->db->delete('pembelian', $where2);
            $this->session->set_flashdata('berhasil', 'Berhasil DiHapus!!!');
            redirect('pembelian');
        }
    }
}
