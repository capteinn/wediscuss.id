<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
	/**
     * This is default constructor of the class
     */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('thread_model');
		$this->load->model('categories_model');
		$this->load->model('comment_model');
	}

	public function index()
	{
		$data['threads'] = $this->categories_model->all()->result_object();
		$data['title'] = 'Categories';
		
		$this->load->view('layouts/header_user', $data);
		$this->load->view('user/categories', $data);
		$this->load->view('layouts/footer_user');
	}

	// public function detail($id)
	// {
	// 	$data['details'] = $this->thread_model->detail($id);
	// 	$data['title'] = 'Detail Categories';

	// 	$this->load->view('layouts/header_user', $data);
	// 	$this->load->view('user/detail_discuss', $data);
	// 	$this->load->view('layouts/footer_user');
	// }

	public function add()
	{
		$data['categories'] = $this->categories_model->all();
		$data['title'] = 'Add Categories';
		
		$this->load->view('layouts/header_user', $data);
		$this->load->view('user/add_categories', $data);
		$this->load->view('layouts/footer_user');
	}

	public function edit($id)
	{  
		
		// var_dump($this->input->post('submit')); exit;

		if ($this->input->post('submit'))
		{ 

			$b = $this->input->post('name'); 

			$object = array( 
				'name' => $b 
			); 
			$this->db->where('id', $id); 
			$query = $this->categories_model->update($object); 
			redirect('categories');
		}
		else
		{ 
			$data['categories'] = $this->categories_model->all();
			$data['title'] = 'Edit Categories';
			$data['editdata'] = $this->db->get_where('categories', array('id' => $id))->row();
			$this->load->view('layouts/header_user', $data);
			$this->load->view('user/edit_categories', $data);
			$this->load->view('layouts/footer_user');
		}   
		 

	}

	public function delete($id)
	{
		// $where = array('id' => $id);
		$this->categories_model->delete($id);
		redirect('categories');
	}

	public function store()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name'); 

		$data = array(
			'id' => $id,
			'name' => $name 
    		// 'user_id' => 1
		);

		$result = $this->categories_model->store($data);

		if($result) {
			redirect('categories');
		}else{
			$this->add();
		}
	}
}