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
		$data['getLike'] = $this->thread_model->getLike($id, $this->user_id);
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

	public function like($id, $comment_id = NULL) {
		$data = array(
			'thread_id' => $id,
			'user_id' => $this->user_id,
			'like' => 1
		);

		if ($comment_id) {
			$this->thread_model->updateLike(array('like'=>1), $comment_id);
			$this->thread_model->pushUpdateLike($id, 1);
		} else {
			$this->thread_model->like($data);
			$this->thread_model->pushLike($id);
		}

		redirect('discuss/detail/'.$id);
	}

	public function dislike($id, $comment_id = NULL) {
		$data = array(
			'thread_id' => $id,
			'user_id' => $this->user_id,
		);

		if ($comment_id) {
			$this->thread_model->updateLike(array('like'=>0), $comment_id);
			$this->thread_model->pushUpdateLike($id, 0);
		} else {
			$this->thread_model->dislike($data);
			$this->thread_model->pushDislike($id);
		}

		redirect('discuss/detail/'.$id);
	}

	public function comment() {
		$id = $this->input->post('id');

		$data = array(
			'thread_id' => $id,
			'description' => $this->input->post('description'),
			'user_id' => $this->user_id
		);
		$this->comment_model->store($data);

		redirect('discuss/detail/'.$id);
	}
}