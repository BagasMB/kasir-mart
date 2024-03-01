<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangModel extends CI_Model
{
    public function getBarang()
    {
        return $this->db->get('barang')->result_array();
    }

    function cariBarang($namaBarang)
    {
        $this->db->like('nama', $namaBarang);
        $this->db->order_by('nama', 'ASC');
        $this->db->limit(10);
        return $this->db->get('barang')->result();
    }

    public function tambah()
    {
        // Code Otomatis
        $lastcode = $this->db->select_max('kode_barang')->get('barang')->row_array()['kode_barang'];
        $noUrut = (int) substr($lastcode, -4, 4);
        $noUrut++;
        $str = "B";
        $newCode = $str . sprintf('%04s', $noUrut);

        $data = [
            'nama' => $this->input->post('nama'),
            'kode_barang' => $newCode,
            'harga' => $this->input->post('harga'),
            'id_kategori' => $this->input->post('id_kategori'),
        ];
        $this->db->insert('barang', $data);
    }

    public function edit()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'id_kategori' => $this->input->post('id_kategori'),
        ];
        $where = array('id_barang' => $this->input->post('id_barang'));
        $this->db->update('barang', $data, $where);
    }
}
