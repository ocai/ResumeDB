<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Companies extends MY_Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {	
		$this->load_page('companies/index');
	}
	
	function register($activation_code = '') {
		if(!$this->company_model->validate_activation_code($activation_code) || $activation_code == '') {
			$this->session->set_flashdata('message', 'The activation code is incorrect or has already been used. Please try again.');
			redirect('home');
		}
		
		$company = $this->company_model->get_company_by_activation_code($activation_code);
		
		$this->form_validation->set_rules('title', '', '');
		$this->form_validation->set_rules('first_name', 'First name', 'trim|required|min_length[4]|max_length[25]');
		$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|min_length[2]|max_length[25]');
		$this->form_validation->set_rules('company_name', 'Company name', 'trim|required|max_length[25]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('confirm_password', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'Email address', 'trim|required|valid_email|callback__email_is_unique');
		$this->form_validation->set_rules('phone', 'Phone number', 'trim|required|callback__phone_is_unique');

		if($this->form_validation->run() == true) {			
			$profile = array(
				'title'		   => $this->input->post('title'),
				'first_name'   => $this->input->post('first_name'),
				'last_name'	   => $this->input->post('last_name'),
				'company_name' => $this->input->post('company_name'),
				'username'	   => $company->username,
				'email'		   => $this->input->post('email'),
				'phone' 	   => $this->input->post('phone'),
			);
			
			$password = $this->input->post('password');
			$salt = $this->config->item('encryption_key');
			
			$password = array(
				'username' => $company->username,
				'password' => md5($password . $salt)
			);
			
			$this->company_model->update_company_profile($profile);
			$this->company_model->update_company_password($password);
			$this->company_model->activate($company->username);
			
			$this->load_page('companies/create_account_success');
		} else {
			$this->load_page('companies/create_account');
		}
	}

	function _email_is_unique($email) {
		if($this->company_model->company_email_exists($email)) {	//email address is not unique
			if($this->is_logged_in()) {	//if a user is logged in, then they are at the edit account page
				$company = $this->company_model->get_company_by_username($this->session->userdata('username'));
				
				if($email == $company->email) {
					return true;
				} else {
					$this->form_validation->set_message('_email_is_unique', 'The email address you entered is already in the database. Please enter a different one.');
					return false;
				}
			} else {	//otherwise, they are at the registration page
				$this->form_validation->set_message('_email_is_unique', 'The email address you entered is already in the database. Please enter a different one.');
				return false;
			}
		} else {	//email doesn't exist in the database...yet
			return true;
		}
	}

	function _phone_is_unique($phone) {
		if($this->company_model->company_phone_exists($phone)) {	//phone number is not unique
			if($this->is_logged_in()) {	//if a user is logged in, then they are at the edit account page
				$company = $this->company_model->get_company_by_netID($this->session->userdata('username'));
				
				if($phone == $company->phone) {
					return true;
				} else {
					$this->form_validation->set_message('_phone_is_unique', 'The phone number you entered is already in the database. Please enter a different one.');
					return false;
				}
			} else {	//otherwise, they are at the registration page
				$this->form_validation->set_message('_phone_is_unique', 'The phone number you entered is already in the database. Please enter a different one.');
				return false;
			}
		} else {	//phone number doesn't exist in the database...yet
			return true;
		}
	}
}
?>