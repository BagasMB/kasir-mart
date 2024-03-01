<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SupplierModel extends CI_Model
{
    public function tambah(){
        // Code Otomatis
        $lastcode = $this->db->select_max('kode_supplier')->get('supplier')->row_array()['kode_supplier'];
        $noUrut = (int) substr($lastcode, -4, 4);
        $noUrut++;
        $str = "S";
        $newCode = $str . sprintf('%04s', $noUrut);

        $data = [
            'nama_supplier' => $this->input->post('nama_supplier'),
            'kode_supplier' => $newCode,
            'telp' => $this->input->post('telp'),
        ];
        $this->db->insert('supplier', $data);
    }
}
