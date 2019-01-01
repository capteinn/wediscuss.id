<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->helper('form');
		$this->load->library('form_validation'); 
		$this->load->model('Register_model');
	} 

	public function index()
	{
		// $this->load->view('register');
		$data['content'] = 'register';
		$this->load->view('register', $data);
	}

	public function daftar()
	{     

			// if ($this->input->post('daftar')) 
			// {
		$cek = $this->db->query("SELECT * FROM users where username='".$this->input->post('username')."'")->num_rows();

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required'); 

		if ($cek<=0) 
		{
			if ($_POST['password']==$_POST['password2'] ) 
			{
				if ($this->form_validation->run() == FALSE) 
				{
					$data['content'] = 'register';
					$this->load->view('register', $data);
				}
				else
				{ 
					$id = $this->input->post('id');
					$a = $this->input->post('username'); 
					$c = $this->input->post('password');
					$c = $this->input->post('password2');  

						$object = array(
							'id' => $id,
							'username' => $a,
							'role_id' => '1',
							'password' => password_hash($c, PASSWORD_DEFAULT), 
								// 'password_ph' => $c 
							'photo' => ''
						);

						$query = $this->Register_model->insert($object);
						if($query) {
							$this->session->set_flashdata('info', 'Succes!');
							redirect('login');
						}else{
							$this->session->set_flashdata('infogagal', 'Failed');
							$this->add();
						}
						// if ($query) 
						// {
						// 	$this->session->set_flashdata('info', 'Congratulation, Register Succes!');
						// 	redirect('Login');
						// }
						// else
						// {
						// 	$this->session->set_flashdata('infogagal', 'Register Fail');
						// 	redirect('Register');
						// }
					 
				}
			}
			else
			{
				$this->session->set_flashdata('infogagal', 'Password field does not match the Password field.');
				redirect('register');
			} 
		}
		else
		{
			$this->session->set_flashdata('infogagal', 'Username Sudah Ada');
			redirect('register');
		}
	} 
}