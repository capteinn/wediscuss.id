<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController {
	public function __construct()
  {
		parent::__construct();
		$this->isLoggedIn();
		$this->isStudent();
	}

	public function index()
	{
		$this->load->view('layouts/header_user');
		$this->load->view('user/dashboard');
		$this->load->view('layouts/footer_user');
	}
}