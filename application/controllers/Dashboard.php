<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
		$this->load->view('layouts/header_user');
		$this->load->view('user/dashboard');
		$this->load->view('layouts/footer_user');
	}
}