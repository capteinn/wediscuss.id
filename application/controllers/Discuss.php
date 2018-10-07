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
		$this->load->model('categories_model');
	}

	public function index()
	{
		$data['threads'] = $this->thread_model->all();
		$data['title'] = 'Discuss';

		$this->load->view('layouts/header_user', $data);
		$this->load->view('user/discuss', $data);
		$this->load->view('layouts/footer_user');
	}

	public function add()
	{
		$data['categories'] = $this->categories_model->all();
		$data['title'] = 'Add Discuss';
		
		$this->load->view('layouts/header_user', $data);
		$this->load->view('user/add_discuss', $data);
		$this->load->view('layouts/footer_user');
	}
}