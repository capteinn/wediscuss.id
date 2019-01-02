<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Profile extends BaseController {
	public function __construct()
	{
		parent::__construct();
		$this->isLoggedIn();
		$this->isStudent();
	}

	public function index()
	{
		$data['profile'] = $this->db->where('id', $this->user_id)->get('users')->row();

		$this->loadViews('user/profile', $data);
	}

	public function update() {
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean');

		if($this->form_validation->run() == FALSE)
    {
       redirect('profile');
    }
    else
    {
    	$id = $this->input->post('id');
    	$username = $this->input->post('username');
    	$password = $this->input->post('password');
    	$photo = $this->input->post('photo');

    	$data['username'] = $username;

    	if ($password) {
    		$data['password'] = password_hash($password, PASSWORD_DEFAULT);
    	}

    	if ($photo) {
    		$data['photo'] = $photo;
    	}

    	$result = $this->db->where('id', $id)->update('users', $data);

    	if ($result) {
    		$this->session->set_userdata('username', $username);
    	}

			redirect('profile');
    }
	}
}
