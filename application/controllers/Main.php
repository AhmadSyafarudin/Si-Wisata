<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'page' => 'pages/home/index',
			'script' => '',
		];
		return $this->load->view('layout/front/main', $data);
	}

	public function not_found()
	{
		$data = [
			'page' => 'pages/not_found/index',
			'script' => '',
			'link' => 'beranda',
		];
		return $this->load->view('layout/front/main', $data);
	}
}
