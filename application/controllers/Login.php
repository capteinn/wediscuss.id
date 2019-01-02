<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
  {
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		$this->isLoggedIn();
	}

	/**
		* This function used to check the user admin is logged in or not
	*/
  function isLoggedIn()
  {
		$isLoggedIn = $this->session->userdata('isLoggedIn');
		
		if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
		{
			return $this->load->view('login');
		} 
		else
		{
			redirect('dashboard');
		}
	}

	public function signUp() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$result = $this->login_model->login($username, $password);

		if($result)
		{
			$sessionArray = array(
				'user_id'=>$result->id,
				'role_id'=>$result->role_id,
				'username'=>$result->username,
				'role'=>$result->name,
				'photo'=>$result->photo,
				'isLoggedIn' => TRUE
			);
			
			$this->session->set_userdata($sessionArray);

			redirect('dashboard');
		}
		else
		{
			$this->session->set_flashdata('error', 'Username or password is mismatched');
			redirect('login');
		}
	}
}