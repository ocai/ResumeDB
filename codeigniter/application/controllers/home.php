<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	/**
	 * Loads login page
	 */
	function index() {		
		if($this->is_logged_in()) {
			redirect('account');
		} else {		
			$this->load_page('home/login', array('message' => ''));
		}
	}

	/**
	 * Logs a student into their account and redirects them to the account controller
	 */
	function login() {
		$this->form_validation->set_rules('user', '', '');
		
		if($this->input->post('user') == 'student' ) {
			$this->form_validation->set_rules('username', 'NetID', 'required');
		} else {
			$this->form_validation->set_rules('username', 'Username', 'required');
		}
		
		//interestingly, the placement of this line affects the order of the form validation messages
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if($this->form_validation->run() == false) {
			$this->index();
		} else {
			if($this->input->post('user') == 'student') {	//radio button is selected on student
				if($this->student_model->validate_student($this->input->post('username'), $this->input->post('password'))) {
					$this->session->set_userdata('netID', $this->input->post('username'));
					$this->session->set_userdata('is_logged_in', true);
					redirect('account');
				} else {
					$view_data = array('message' => 'The login details you entered are incorrect. Please try again.');
					$this->load_page('home/login', $view_data);
				}
			} else {	//radio button is selected on recruiter
				if($this->company_model->validate_company($this->input->post('username'), $this->input->post('password'))) {
					$this->session->set_userdata('username', $this->input->post('username'));
					$this->session->set_userdata('is_logged_in', true);
					redirect('account');
				} else {
					$view_data = array('message' => 'The login details you entered are incorrect. Please try again.');
					$this->load_page('home/login', $view_data);
				}
			}
		}
	}
}
?>