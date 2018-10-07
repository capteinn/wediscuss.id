<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discuss extends CI_Controller {
	/**
     * This is default constructor of the class
     */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('thread_model');
	}

	public function index()
	{
		$data['threads'] = $this->thread_model->all();

		$this->load->view('layouts/header_user');
		$this->load->view('user/discuss', $data);
		$this->load->view('layouts/footer_user');
	}

	public function add()
	{
		$this->load->view('layouts/header_user');
		$this->load->view('user/add_discuss');
		$this->load->view('layouts/footer_user');
	}
}