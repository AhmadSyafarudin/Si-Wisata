<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}


	public function index()
	{
		$random_number1 = rand(1, 15);
		$random_number2 = rand(1, 15);

		$this->session->set_userdata(['numb1' => $random_number1, 'numb2' => $random_number2]);

		$this->load->view('pages/login/register');
	}

	public function add()
	{
		$nama_lengkap = $this->input->post('nama_lengkap');
		$username = $this->input->post('username');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$captcha = $this->input->post('captcha');

		$random_number1 = $this->session->userdata('numb1');
		$random_number2 = $this->session->userdata('numb2');


		if ($captcha == $random_number1 + $random_number2) {
			if ($this->User_model->get(array('username' => $username))->num_rows() > 0) {
				$res = array('status' => 'failed', 'msg' => 'Galat! Username Sudah Terdaftar');
				echo json_encode($res);
				exit();
			}

			if ($this->User_model->get(array('no_hp' => $no_hp))->num_rows() > 0) {
				$res = array('status' => 'failed', 'msg' => 'Galat! Nomor Handphone Sudah Terdaftar');
				echo json_encode($res);
				exit();
			}

			if ($this->User_model->get(array('email' => $email))->num_rows() > 0) {
				$res = array('status' => 'failed', 'msg' => 'Galat! Email Sudah Terdaftar');
				echo json_encode($res);
				exit();
			}

			$data = [
				'nama_lengkap' => $nama_lengkap,
				'username' => $username,
				'no_hp' => $no_hp,
				'email' => $email,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'role' => 'User',
				'created_at' => date('Y-m-d H:i:s'),
			];

			$this->db->trans_start();
			$this->User_model->insert($data);
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				$res = array('status' => 'failed', 'msg' => 'Galat! Gagal Menambahkan Data');
				echo json_encode($res);
			} else {
				$res = array('status' => 'success');
				echo json_encode($res);
			}
		} else {
			$res = array('status' => 'failed', 'msg' => 'Galat! Hasil Penjumlahan Salah');
			echo json_encode($res);
		}
	}
}
