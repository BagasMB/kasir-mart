<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuaraPemilu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null) {
            redirect('auth');
        } elseif ($this->session->userdata('level') != 'Admin') {
            redirect('auth/block');
        }
    }

    public function index()
    {
        $data = [
            'title'     => 'Suara Pemilu',
            'suara'     => $this->db->get('suara_8')->result_array(),
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];
        $this->template->load('template', 'suara-pemilu', $data);
    }

    public function simpan()
    {
        $jumlahsuara = $this->input->post('total_suara_sah_8') + $this->input->post('total_suara_tidak_sah_8');
        $jumlahnosuara = $this->input->post('suara_no1_8') + $this->input->post('suara_no2_8') + $this->input->post('suara_no3_8');
        $salahsuara = $this->input->post('total_suara_8') != $jumlahsuara;
        $salahsuaratiapno = $this->input->post('total_suara_sah_8') != $jumlahnosuara;
        if ($salahsuara) {
            $this->session->set_flashdata('gagal', 'total jumlah suara salah!!!');
            redirect('suarapemilu');
        } elseif ($salahsuaratiapno) {
            $this->session->set_flashdata('gagal', 'total jumlah suara pada tiap nomor terdapat kesalahan!!!');
            redirect('suarapemilu');
        } else {
            $data = [
                'total_suara_8'             => $this->input->post('total_suara_8'),
                'total_suara_sah_8'         => $this->input->post('total_suara_sah_8'),
                'total_suara_tidak_sah_8'   => $this->input->post('total_suara_tidak_sah_8'),
                'suara_no1_8'               => $this->input->post('suara_no1_8'),
                'suara_no2_8'               => $this->input->post('suara_no2_8'),
                'suara_no3_8'               => $this->input->post('suara_no3_8'),
                'nama_tps_8'                => $this->input->post('nama_tps_8'),
            ];
            $this->db->insert('suara_8', $data);
            $this->session->set_flashdata('berhasil', 'Yeaaaaaaaaaay!!!');
            redirect('suarapemilu');
        }
    }
}
