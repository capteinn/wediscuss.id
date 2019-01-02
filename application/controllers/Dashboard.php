<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController {
	public function __construct()
  {
		parent::__construct();
		$this->isLoggedIn();
	}

	public function index()
	{
		$data['students'] = $this->db->join('users', 'users.id = threads.user_id')->group_by('users.id')->get('threads')->num_rows();
		$data['threads'] = $this->db->get('threads')->num_rows();
		$data['mostlike'] = $this->db->order_by('like', 'desc')->get('threads')->row();

		$this->load->view('layouts/header_user');
		$this->load->view('user/dashboard', $data);
		$this->load->view('layouts/footer_user');
	}
}