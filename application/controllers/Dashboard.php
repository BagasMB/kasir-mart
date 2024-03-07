<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d');
		$mounth = date('Y-m');
		$data = [
			'title' 		=> 'Dashboard',
			'kategori' 		=> $this->db->get('kategori')->result_array(),
			'hari_ini' 		=> $this->db->select_sum('total_tagihan', 'hari')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m-%d')", $date)->get()->row()->hari,
			'bulan_ini' 	=> $this->db->select_sum('total_tagihan', 'bulan')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $mounth)->get()->row()->bulan,
			'transaksi' 	=> $this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m-%d')", $date)->count_all_results(),
			'barang'		=> $this->db->from('barang')->count_all_results(),
			'jumlah_barang' => $this->db->select('barang.nama, sum(detail_penjualan.jumlah) AS jumlah')->from('barang')->join('detail_penjualan', 'barang.kode_barang = detail_penjualan.kode_barang')->group_by('barang.nama, barang.kode_barang')->order_by('jumlah DESC')->limit(5)->get()->result(),
			'user' 			=> $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
		];
		$this->template->load('template', 'dashboard', $data);
	}

	public function profile()
	{
		$data = [
			'title' => 'Profile Website',
			'konfig' => $this->db->get('konfigurasi')->row(),
			'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
		];
		$this->template->load('template', 'profile', $data);
	}

	public function updateprofile()
	{
		$where = ['id_konfigurasi' => 1];
		$data = [
			'judul_website' => $this->input->post('judul_website'),
			'profil_website' => $this->input->post('profil_website'),
			'instagram' => $this->input->post('instagram'),
			'twitter' => $this->input->post('twitter'),
			'facebook' => $this->input->post('facebook'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'no_wa' => $this->input->post('no_wa'),
		];
		$this->db->update('konfigurasi', $data, $where);
		$this->session->set_flashdata('berhasil', 'Gemgeekang Gacorr!!!');
		redirect('Profile-Website');
	}
}
