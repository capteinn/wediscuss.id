<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Discuss extends BaseController {
	/**
     * This is default constructor of the class
     */
	public function __construct()
	{
		parent::__construct();
		$this->isLoggedIn();
		$this->isStudent();

		$this->load->model('thread_model');
		$this->load->model('categories_model');
		$this->load->model('comment_model');
	}

	public function index()
	{
		$data['threads'] = $this->thread_model->all();
		$data['title'] = 'Discuss';
		
		$this->load->view('layouts/header_user', $data);
		$this->load->view('user/discuss', $data);
		$this->load->view('layouts/footer_user');
	}

	public function detail($id)
	{
		$data['details'] = $this->thread_model->detail($id);
		$data['title'] = 'Detail Discussion';
		
		$this->load->view('layouts/header_user', $data);
		$this->load->view('user/detail_discuss', $data);
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

	public function store()
	{
		$this->form_validation->set_rules('title','Title','trim|required|xss_clean');
		$this->form_validation->set_rules('category','Category','trim|required|numeric|xss_clean');
		$this->form_validation->set_rules('description','Description','trim|required|xss_clean');

		if($this->form_validation->run() == FALSE)
    {
       $this->add();
    }
    else
    {
    	$title = $this->input->post('title');
    	$category = $this->input->post('category');
    	$description = $this->input->post('description');

    	$data = array(
    		'title' => $title,
    		'category_id' => $category,
    		'description' => $description,
    		'user_id' => 1
    	);

    	$result = $this->thread_model->store($data);

			if($result) {
				redirect('discuss');
			}else{
				$this->add();
			}
    }
	}
}