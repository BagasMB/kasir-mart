<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null) {
            redirect('auth');
        } elseif ($this->session->userdata('level') != 'Admin') {
            redirect('auth/block');
        }
        $this->load->model('SupplierModel');
    }

    public function index()
    {
        $data = [
            'title'     => 'Data Supplier',
            'supplier'  => $this->db->order_by('kode_supplier', 'DESC')->get('supplier')->result_array(),
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->template->load('template', 'admin/supplier', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_supplier', 'Nama', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telefon', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('gagal', 'Yahh, Isi Field Dengan Benar!!!');
            redirect('supplier');
        } else {
            $this->SupplierModel->tambah();
            $this->session->set_flashdata('berhasil', 'Yeaaaaaaaaaay!!!');
            redirect('supplier');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nama_supplier', 'Nama', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telefon', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('gagal', 'Yahh, Isi Field Dengan Benar!!!');
            redirect('supplier');
        } else {
            $data = ['nama_supplier' => $this->input->post('nama_supplier'), 'telp' => $this->input->post('telp')];
            $where = ['id_supplier' => $this->input->post('id_supplier')];
            $this->db->update('supplier', $data, $where);
            $this->session->set_flashdata('berhasil', 'Gemgeekang Gacorr!!!');
            redirect('supplier');
        }
    }

    public function hapus($id)
    {
        $where = array('id_supplier' => $id);
        $this->db->delete('supplier', $where);
        $this->session->set_flashdata('berhasil', 'Berhasil DiHapus!!!');
        redirect('supplier');
    }
}
