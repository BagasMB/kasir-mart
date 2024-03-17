<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiModel extends CI_Model
{

    public function getPembelian()
    {
        $this->db->order_by('tanggal', 'DESC');
        $this->db->join('supplier', 'pembelian.kode_supplier = supplier.kode_supplier');
        $this->db->join('barang', 'pembelian.kode_barang = barang.kode_barang');
        return $this->db->get('pembelian')->result_array();
    }

    public function getDetailPenjualan($kode)
    {
        $this->db->where('detail_penjualan.kode_penjualan', $kode);
        $this->db->join('detail_penjualan', 'penjualan.kode_penjualan = penjualan.kode_penjualan');
        $this->db->join('barang', 'detail_penjualan.kode_barang = barang.kode_barang');
        return $this->db->get('penjualan')->result_array();
    }

    public function getPenjualan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m');
        $this->db->order_by('id_penjualan', 'DESC');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tanggal);
        $this->db->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id_pelanggan');
        return $this->db->get('penjualan')->result_array();
    }

    public function getPenjualanHariIni()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
        $this->db->order_by('tanggal', 'DESC');
        $this->db->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id_pelanggan');
        return $this->db->where('tanggal', $date)->get('penjualan')->result_array();
    }

    public function tambahKeranjang()
    {
        // $harga = $this->db->from('barang')->where('kode_barang', $this->input->post('kode_barang'))->get()->row()->harga;
        // $stokLama = $this->db->from('barang')->where('kode_barang', $this->input->post('kode_barang'))->get()->row()->stok;
        // $sub_total = $this->input->post('demo3_22') * $harga;
        // $stokSekarang = $stokLama - $this->input->post('demo3_22');
        $data = [
            'id_pelanggan'  => $this->input->post('id_pelanggan'),
            'id_user'       => $this->session->userdata('id_user'),
            'kode_barang'   => $this->input->post('kode_barang'),
            'jumlah'        => $this->input->post('jumlah'),
        ];
        $this->db->insert('temp', $data);
        // $data2 = ['stok' => $stokSekarang];
        // $where = ['kode_barang' => $this->input->post('kode_barang')];
        // $this->db->update('barang', $data2, $where);

    }

    public function tambahPembelian()
    {
        // Code Otomatis
        $lastcode = $this->db->select_max('kode_pembelian')->get('pembelian')->row_array()['kode_pembelian'];
        $noUrut = (int) substr($lastcode, -1, 1);
        $noUrut++;
        $newCode = sprintf('%01s', $noUrut);
        date_default_timezone_set('Asia/Jakarta');
        $code = date('ymd') . $newCode;

        $data = [
            'kode_pembelian' => $code,
            'kode_barang' => $this->input->post('kode_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'tanggal' => $this->input->post('tanggal'),
            'kode_supplier' => $this->input->post('kode_supplier'),
        ];
        $this->db->insert('pembelian', $data);

        $newStok = $this->db->where('kode_barang', $this->input->post('kode_barang'))->get('barang')->row()->stok;
        $data2 = ['stok' => $this->input->post('jumlah') + $newStok];
        $this->db->update('barang', $data2, ['kode_barang' => $this->input->post('kode_barang')]);
    }

    public function getAllBarangPenjualan()
    {
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
        return $this->db->get('barang')->result_array();
    }

    public function bayar()
    {
        // Code Otomatis
        $lastcode = $this->db->select_max('kode_penjualan')->get('penjualan')->row_array()['kode_penjualan'];
        $noUrut = (int) substr($lastcode, -1, 1);
        $noUrut++;
        $newCode = sprintf('%01s', $noUrut);
        date_default_timezone_set('Asia/Jakarta');
        $code = date('YmdHis') . $newCode;

        $total_tagihan = (int) $this->cart->total();
        $bayar = (int) $this->input->post('bayar');

        foreach ($this->cart->contents() as $item) {
            $data = array(
                'kode_penjualan'    => $code,
                'kode_barang'       => $item['id'],
                'jumlah'            => $item['qty'],
                'sub_total'         => $item['subtotal']
            );
            // $stok = ['stok',];
            // belum bisa update stok 

            $this->db->insert('detail_penjualan', $data);
        }

        $tran = array(
            'kode_penjualan'    => $code,
            'tanggal'           => date('Y-m-d'),
            'total_tagihan'     => $total_tagihan,
            'bayar'             => $bayar,
            'kembalian'         => $bayar - $total_tagihan,
        );
        $this->db->insert('penjualan', $tran);
    }
}
