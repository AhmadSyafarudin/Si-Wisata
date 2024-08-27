<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		$user = $this->session->userdata('user');
		if ($user) {
			// script sweet alert sudah login
			$script = "<script>
				alert('Anda Sudah Login, Silahkan Logout Terlebih Dahulu');
				window.location.href='" . base_url() . "';
			</script>";
			echo $script;
			exit();
		}

		$random_number1 = rand(1, 15);
		$random_number2 = rand(1, 15);

		$this->session->set_userdata(['numb1' => $random_number1, 'numb2' => $random_number2]);

		$data = [
			'script' => '',
		];
		$this->load->view('pages/login/index', $data);
	}

	public function proses()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$captcha = $this->input->post('captcha');

		$random_number1 = $this->session->userdata('numb1');
		$random_number2 = $this->session->userdata('numb2');

		if ($captcha == $random_number1 + $random_number2) {
			$user = $this->User_model->get(array('email' => $email))->row();
			if ($user) {
				if (password_verify($password, $user->password)) {
					$this->session->set_userdata(['user' => $user]);
					$res = array('status' => 'success');
					echo json_encode($res);
				} else {
					$res = array('status' => 'failed', 'msg' => 'Galat! Password Salah');
					echo json_encode($res);
				}
			} else {
				$res = array('status' => 'failed', 'msg' => 'Galat! Email Tidak Terdaftar');
				echo json_encode($res);
			}
		} else {
			$res = array('status' => 'failed', 'msg' => 'Galat! Hasil Penjumlahan Salah');
			echo json_encode($res);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
