<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

/**
 * Class : BaseController
 * Base Class to control over all the classes
 * @author : Abdurrahman
 * @version : 1.1
 * @since : 12 Mei 2018
 */
class BaseController extends CI_Controller {
	protected $role_id = '';
	protected $role = '';
	protected $user_id = '';
	protected $username = '';
	protected $global = array ();
	
	/**
	 * Takes mixed data and optionally a status code, then creates the response
	 *
	 * @access public
	 * @param array|NULL $data
	 *        	Data to output to the user
	 *        	running the script; otherwise, exit
	 */
	public function response($data = NULL) {
		$this->output->set_status_header ( 200 )->set_content_type ( 'application/json', 'utf-8' )->set_output ( json_encode ( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) )->_display ();
		exit ();
	}
	
	/**
	 * This function used to check the user is logged in or not
	 */
	function isLoggedIn() {
		$isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		
		if (! isset ( $isLoggedIn ) || $isLoggedIn != TRUE) 
		{
			if ($this->role_id == 1) {
				redirect('login');
			} else if ($this->role_id == 2) {
				redirect('admin/login');
			} else {
				redirect('');
			}
		} 
		else 
		{
			$this->role_id = $this->session->userdata ( 'role_id' );
			$this->role = $this->session->userdata ( 'role' );
			$this->user_id = $this->session->userdata ( 'user_id' );
			$this->username = $this->session->userdata ( 'username' );
			
			$this->global ['username'] = $this->username;
			$this->global ['role_id'] = $this->role_id;
			$this->global ['role'] = $this->role;
		}
	}
	
	/**
	 * This function is used to check the access
	 */
	function isAdmin()
	{
		if ($this->role_id == 2)
		{
			return true;
		}
		else
		{
			$this->loadThis();
		}
	}

	/**
	 * This function is used to check the access
	 */
	function isStudent()
	{
		if ($this->role_id == 1 )
		{
			return true;
		}
		else
		{
			$this->loadThis();
		}
	}
	
	/**
	 * This function is used to load the set of views
	 */
	function loadThis()
	{		
		redirect('home/access');
	}

	/**
     * This function used to load views
     * @param {string} $viewName : This is view email
     * @param {mixed} $headerInfo : This is array of header information
     * @param {mixed} $pageInfo : This is array of page information
     * @param {mixed} $footerInfo : This is array of footer information
     * @return {null} $result : null
     */
  function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL)
  {
    $this->load->view('layouts/header_user', $headerInfo);
    $this->load->view($viewName, $pageInfo);
    $this->load->view('layouts/footer_user', $footerInfo);
  }
}