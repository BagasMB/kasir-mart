<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
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
            'title'     => 'Penjualan',
            'pelanggan' => $this->db->get('pelanggan')->result_array(),
            'penjualan' => $this->TransaksiModel->getPenjualan(),
            'kategori'  => $this->db->get('kategori')->result_array(),
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->template->load('template', 'kasir/penjualan', $data);
    }


    public function transaksi($id_pelanggan = null)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'title'         => 'Transaksi Penjualan',
            'id_pelanggan'  => $id_pelanggan,
            'barang'        => $this->db->order_by('nama', 'ASC')->get('barang')->result_array(),
            'voucher'       => $this->db->where('jumlah >', 0)->where('waktu >=', date('Y-m-d'))->get('voucher')->result_array(),
            'pelanggan'     => $this->db->where('id_pelanggan', $id_pelanggan)->get('pelanggan')->row(),
            'temp'          => $this->db->join('barang', 'temp.kode_barang = barang.kode_barang')->where('id_user', $this->session->userdata('id_user'))->where('id_pelanggan', $id_pelanggan)->get('temp')->result_array(),
            'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->template->load('template', 'kasir/transaksi', $data);
    }

    public function tambahKeranjang()
    {
        $cek = $this->db->where('kode_barang', $this->input->post('kode_barang'))->where('id_pelanggan', $this->input->post('id_pelanggan'))->where('id_user', $this->session->userdata('id_user'))->get('temp')->result_array();
        $stokLama = $this->db->from('barang')->where('kode_barang', $this->input->post('kode_barang'))->get()->row()->stok;
        if ($stokLama < $this->input->post('jumlah')) {
            $this->session->set_flashdata('gagal', 'Produk yang dipilih tidak cukup');
        } else if ($cek != NULL) {
            $this->session->set_flashdata('gagal', 'Produk sudah di pilih');
        } else {
            $this->TransaksiModel->tambahKeranjang();
            $this->session->set_flashdata('berhasil', 'Barang ditambah ke keranjang');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function hapusKeranjang($id_temp)
    {
        $where = array('id_temp' => $id_temp);
        $this->db->delete('temp', $where);
        $this->session->set_flashdata('berhasil', 'Barang berhasil dihapus dari keranjang');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function invoice($kode_penjualan)
    {
        $data = [
            'title'         => 'Invoice',
            'nota'          => $kode_penjualan,
            'konfig'        => $this->db->get('konfigurasi')->row(),
            'detail'        => $this->db->join('barang', 'detail_penjualan.kode_barang = barang.kode_barang')->where('kode_penjualan', $kode_penjualan)->get('detail_penjualan')->result_array(),
            'penjualan'     => $this->db->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id_pelanggan')->join('user', 'penjualan.id_user = user.id_user')->where('kode_penjualan', $kode_penjualan)->get('penjualan')->row(),
            'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->template->load('template', 'kasir/invoice', $data);
    }

    public function bayar2()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal)->from('penjualan');
        $jumlah = $this->db->count_all_results();
        $nota = date('ymd') . $jumlah + 1;
        $poin = $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'))->get('pelanggan')->row()->poin;
        $voucher = $this->db->where('id_voucher', $this->input->post('id_voucher'))->get('voucher')->row();
        if ($this->input->post('poin') <= $poin) {
            if ($this->input->post('bayar') >= $this->input->post('total_tagihan')) {
                $temp = $this->db->join('barang', 'temp.kode_barang = barang.kode_barang')->where('id_user', $this->session->userdata('id_user'))->where('id_pelanggan', $this->input->post('id_pelanggan'))->get('temp')->result_array();
                foreach ($temp as $value) {
                    if ($value['stok'] < $value['jumlah']) {
                        $this->session->set_flashdata('gagal', 'Produk yang dipilih tidak cukup');
                        redirect($_SERVER['HTTP_REFERER']);
                    } else {
                        // Input Table Detail
                        $data1 = [
                            'kode_penjualan'    => $nota,
                            'kode_barang'       => $value['kode_barang'],
                            'jumlah'            => $value['jumlah'],
                            'sub_total'         => $value['jumlah'] * $value['harga'],
                        ];
                        $this->db->insert('detail_penjualan', $data1);

                        // Update Stok barang
                        $data2 = ['stok' => $value['stok'] - $value['jumlah']];
                        $where1 = ['kode_barang' => $value['kode_barang']];
                        $this->db->update('barang', $data2, $where1);

                        // hapus table temp
                        $where2 = [
                            'id_pelanggan' => $this->input->post('id_pelanggan'),
                            'id_user' => $this->session->userdata('id_user'),
                        ];
                        $this->db->delete('temp', $where2);
                    }
                }
                $data = [
                    'kode_penjualan'    => $nota,
                    'id_pelanggan'      => $this->input->post('id_pelanggan'),
                    'total_tagihan'     => $this->input->post('total_tagihan'),
                    'bayar'             => $this->input->post('bayar'),
                    'id_user'           => $this->session->userdata('id_user'),
                    'potongan_harga'    => $this->input->post('poin') + $voucher->potongan_harga,
                    'tanggal'           => date('Y-m-d'),
                ];
                $this->db->insert('penjualan', $data);

                $pelanggan = $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'))->get('pelanggan')->row();
                $total = $this->input->post('total_tagihan');

                if ($pelanggan->id_pelanggan > 1) {
                    if ($total > 100000) {
                        $poin = (($total * 3) / 100) - $this->input->post('poin');
                    }
                    $poinakhir = $poin + $pelanggan->poin;
                    $data2 = ['poin' => $poinakhir];
                    $where = ['id_pelanggan' => $this->input->post('id_pelanggan')];
                    $this->db->update('pelanggan', $data2, $where);
                }
                $data3 = ['jumlah' => $voucher->jumlah - 1];
                $where4 = ['id_voucher' => $this->input->post('id_voucher')];
                $this->db->update('voucher', $data3, $where4);

                $this->session->set_flashdata('berhasil', 'Barang berhasil diBayar');
                redirect('penjualan/invoice/' . $nota);
            } else {
                $this->session->set_flashdata('gagal', 'Uang yang dibayarkan tidak cukup');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('gagal', 'Poin tidak cukup');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function printInvoice($kode_penjualan)
    {
        $data = [
            'detail'        => $this->db->join('barang', 'detail_penjualan.kode_barang = barang.kode_barang')->where('kode_penjualan', $kode_penjualan)->get('detail_penjualan')->result_array(),
            'penjualan'     => $this->db->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id_pelanggan')->join('user', 'penjualan.id_user = user.id_user')->where('kode_penjualan', $kode_penjualan)->get('penjualan')->row(),
            'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'konfig'        => $this->db->get('konfigurasi')->row()
        ];

        $this->load->view('printInvoice', $data);
    }
}
