<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$data = [
			'script' => '',
		];
		$this->load->view('pages/login/index', $data);
	}
}