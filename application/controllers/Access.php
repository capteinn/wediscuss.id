<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Access extends CI_Controller
{
		public function __construct()
  	{
			parent::__construct();
		}

    public function index()
    {
    		$this->global['pageTitle'] = 'Zare : Access Denided';
        $this->load->view('404', $this->global);
    }

    /**
        * This function used to logged out user from system
    */
    public function logout() {
        $this->session->sess_destroy ();
        redirect('login');
    }

}