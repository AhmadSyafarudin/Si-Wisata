<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tiket_model');

		$this->user = $this->session->userdata('user');
		if (!@$this->user || @$this->user->role != 'Admin') {
			// script sweet alert sudah login
			$script = "<script>
				alert('Silahkan Login Terlebih Dahulu');
				window.location.href='" . base_url('login') . "';
			</script>";
			echo $script;
			exit();
		}
	}

	public function index()
	{
		$data = [
			'page' => 'pages/admin/index',
			'script' => 'pages/tiket_form/script',
			'tiket' => $this->Tiket_model->get(),
		];
		return $this->load->view('layout/front/main', $data);
	}

	public function add()
	{
		$nama = $this->input->post('nama');
		$no_wa = $this->input->post('no_wa');
		$alamat = $this->input->post('alamat');
		$destinasi_wisata = $this->input->post('destinasi_wisata');
		$tanggal_perjalanan = $this->input->post('tanggal_perjalanan');
		$tanggal_pulang = $this->input->post('tanggal_pulang');
		$layanan = "";
		if ($this->input->post('penginapan') == 'penginapan') {
			$layanan .= 'Penginapan,';
		}
		if ($this->input->post('transportasi') == 'transportasi') {
			$layanan .= 'Transportasi,';
		}
		if ($this->input->post('makan') == 'makan') {
			$layanan .= 'Makan';
		}

		$jumlah_peserta = $this->input->post('jumlah_peserta');
		$harga_paket = $this->input->post('harga_paket');
		$jumlah_tagihan = $this->input->post('jumlah_tagihan');

		$data = [
			'id_user' => $this->user->id_user,
			'nama' => $nama,
			'no_wa' => $no_wa,
			'alamat' => $alamat,
			'destinasi_wisata' => $destinasi_wisata,
			'tanggal_perjalanan' => $tanggal_perjalanan,
			'tanggal_pulang' => $tanggal_pulang,
			'layanan' => $layanan,
			'jumlah_peserta' => $jumlah_peserta,
			'harga_paket' => $harga_paket,
			'jumlah_tagihan' => $jumlah_tagihan,
			'created_at' => date('Y-m-d H:i:s'),
		];

		$this->db->trans_start();
		$this->Tiket_model->insert($data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$res = array('status' => 'failed', 'msg' => 'Galat! Gagal Menambahkan Data');
			echo json_encode($res);
		} else {
			$res = array('status' => 'success');
			echo json_encode($res);
		}
	}

	public function get()
	{
		$id_tiket = $this->input->post('id_tiket');
		$tiket = $this->Tiket_model->get(['id_tiket' => $id_tiket])->row();
		if ($tiket) {
			$res = array('status' => 'success', 'tiket' => $tiket);
			echo json_encode($res);
		} else {
			$res = array('status' => 'failed', 'msg' => 'Galat! Data Tidak Ditemukan');
			echo json_encode($res);
		}
	}

	public function edit()
	{
		$id_tiket = $this->input->post('id_tiket');
		$nama = $this->input->post('nama');
		$no_wa = $this->input->post('no_wa');
		$alamat = $this->input->post('alamat');
		$destinasi_wisata = $this->input->post('destinasi_wisata');
		$tanggal_perjalanan = $this->input->post('tanggal_perjalanan');
		$tanggal_pulang = $this->input->post('tanggal_pulang');
		$layanan = "";
		if ($this->input->post('penginapan') == 'penginapan') {
			$layanan .= 'Penginapan,';
		}
		if ($this->input->post('transportasi') == 'transportasi') {
			$layanan .= 'Transportasi,';
		}
		if ($this->input->post('makan') == 'makan') {
			$layanan .= 'Makan';
		}

		$jumlah_peserta = $this->input->post('jumlah_peserta');
		$harga_paket = $this->input->post('harga_paket');
		$jumlah_tagihan = $this->input->post('jumlah_tagihan');

		$data = [
			'id_user' => $this->user->id_user,
			'nama' => $nama,
			'no_wa' => $no_wa,
			'alamat' => $alamat,
			'destinasi_wisata' => $destinasi_wisata,
			'tanggal_perjalanan' => $tanggal_perjalanan,
			'tanggal_pulang' => $tanggal_pulang,
			'layanan' => $layanan,
			'jumlah_peserta' => $jumlah_peserta,
			'harga_paket' => $harga_paket,
			'jumlah_tagihan' => $jumlah_tagihan,
			'updated_at' => date('Y-m-d H:i:s'),
		];

		$this->db->trans_start();
		$this->Tiket_model->update($data, $id_tiket);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$res = array('status' => 'failed', 'msg' => 'Galat! Gagal Menambahkan Data');
			echo json_encode($res);
		} else {
			$res = array('status' => 'success');
			echo json_encode($res);
		}
	}

	public function hapus()
	{
		$id_tiket = $this->input->post('id_tiket');

		$this->db->trans_start();
		$this->Tiket_model->delete($id_tiket);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$res = array('status' => 'failed', 'msg' => 'Galat! Gagal Menghapus Data');
			echo json_encode($res);
		} else {
			$res = array('status' => 'success', 'msg' => 'Data Berhasil Dihapus');
			echo json_encode($res);
		}
	}
}
