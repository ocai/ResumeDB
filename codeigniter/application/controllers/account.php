<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Account extends MY_Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->login_check();
	
		if($this->session->userdata('netID')) {	//student is logged in
			$student = $this->student_model->get_student_by_netID($this->session->userdata('netID'));
			$view_data = array('name' => $student->first_name);
		} else {	//company is logged in
			$company = $this->company_model->get_company_by_username($this->session->userdata('username'));
			$view_data = array('name' => $company->company_name);
		}
		
		$this->load_page('account/account_welcome', $view_data);
	}
	
	/**
	 * Grabs student account information and displays it
	 */
	function view() {
		$this->login_check();
		
		if($this->session->userdata('netID')) {
			$student = $this->student_model->get_student_by_netID($this->session->userdata('netID'));
		
			$view_data = array(
				'first_name' => $student->first_name,
				'last_name'  => $student->last_name,
				'email' 	 => $student->email,
				'phone' 	 => $student->phone,
				'year'		 => $student->year,
				'major' 	 => $student->major			
			);
		} else {
			$company = $this->company_model->get_company_by_username($this->session->userdata('username'));
			
			$view_data = array(
				'title'		   => $company->title,
				'first_name'   => $company->first_name,
				'last_name'    => $company->last_name,
				'company_name' => $company->company_name,
				'email' 	   => $company->email,
				'phone' 	   => $company->phone	
			);
		}

		$this->load_page('account/view_account', $view_data);
	}
	
	function edit() {
		$this->login_check();
	
		$this->form_validation->set_rules('first_name', 'First name', 'trim|required|min_length[4]|max_length[25]');
		$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|min_length[2]|max_length[25]');
		$this->form_validation->set_rules('email', 'E-mail address', 'trim|required|valid_email|callback__email_is_unique');
		$this->form_validation->set_rules('phone', 'Phone number', 'trim|required|callback__phone_is_unique');
		
		if($this->session->userdata('netID')) {
			$this->form_validation->set_rules('year', 'Year entered', 'trim|required|exact_length[4]|numeric');
		} else {
			$this->form_validation->set_rules('title', '', '');
		}

		if($this->form_validation->run() == true && $this->input->post('submitOK')) {
			if($this->session->userdata('netID')) {
				$student_info = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'email'		 => $this->input->post('email'),
					'phone' 	 => $this->input->post('phone'),
					'year' 		 => $this->input->post('year'),
					'major'		 => $this->input->post('major')
				);
				
				$this->student_model->update_student($this->session->userdata('netID'), $student_info);
			} else {
				$company_info = array(
					'title' 	 => $this->input->post('title'),
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'email' 	 => $this->input->post('email'),
					'phone' 	 => $this->input->post('phone')
				);
				
				$this->company_model->update_company($this->session->userdata('username'), $company_info);
			}
			
			$this->session->set_flashdata('message', 'Your account was updated successfully!');
			redirect('account/view');
		} else if($this->input->post('submitCancel')) {
			redirect('account/view');
		} else {
			if($this->session->userdata('netID')) {
				$student = $this->student_model->get_student_by_netID($this->session->userdata('netID'));
			
				$view_data = array(
					'first_name' => $student->first_name,
					'last_name'  => $student->last_name,
					'email' 	 => $student->email,
					'phone' 	 => $student->phone,
					'year'		 => $student->year,
					'major' 	 => $student->major
				);	
			} else {
				$company = $this->company_model->get_company_by_username($this->session->userdata('username'));
			
				$view_data = array(
					'title'		   => $company->title,
					'first_name'   => $company->first_name,
					'last_name'	   => $company->last_name,
					'company_name' => $company->company_name,
					'email' 	   => $company->email,
					'phone' 	   => $company->phone,
				);	
			}
		
			$this->load_page('account/edit_account', $view_data);
		}
	}
	
	function _email_is_unique($email) {
		if($this->session->userdata('netID')) {
			$student = $this->student_model->get_student_by_netID($this->session->userdata('netID'));
		
			//if the email already exists and isn't the same as the student's own email, then it isn't unique
			if($this->student_model->student_email_exists($email) && $email != $student->email) {
				$this->form_validation->set_message('_email_is_unique', 'The email address you entered is already in the database. Please enter a different one.');
				return false;
			} else {
				return true;
			}
		} else {
			$company = $this->company_model->get_company_by_username($this->session->userdata('username'));
			
			if($this->company_model->company_email_exists($email) && $email != $company->email) {
				$this->form_validation->set_message('_email_is_unique', 'The email address you entered is already in the database. Please enter a different one.');
				return false;
			} else {
				return true;
			}
		}
	}

	function _phone_is_unique($phone) {
		if($this->session->userdata('netID')) {
			$student = $this->student_model->get_student_by_netID($this->session->userdata('netID'));

			if($this->student_model->student_phone_exists($phone) && $phone != $student->phone) {
				$this->form_validation->set_message('_phone_is_unique', 'The phone number you entered is already in the database. Please enter a different one.');
				return false;
			} else {
				return true;
			}
		} else {
			$company = $this->company_model->get_company_by_username($this->session->userdata('username'));
			
			if($this->company_model->company_phone_exists($phone) && $phone != $company->phone) {
				$this->form_validation->set_message('_phone_is_unique', 'The phone number you entered is already in the database. Please enter a different one.');
				return false;
			} else {
				return true;
			}
		}
	}
	
	function edit_password() {
		$this->login_check();
	
		$this->form_validation->set_rules('current_password', 'Current password', 'trim|required|callback__validate_password');
		$this->form_validation->set_rules('new_password', 'New password', 'trim|required|callback__password_doesnt_match|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('confirm_new_password', 'Confirm new password', 'trim|required|matches[new_password]');
		
		if($this->form_validation->run() == true && $this->input->post('submitOK')) {
			$password = $this->input->post('new_password');
			$salt = $this->config->item('encryption_key');
			
			if($this->session->userdata('netID')) {
				$student_info = array('password' => md5($password . $salt));
				$this->student_model->update_student($this->session->userdata('netID'), $student_info);
			} else {
				$company_info = array('password' => md5($password . $salt));
				$this->company_model->update_company($this->session->userdata('username'), $company_info);
			}

			$this->session->set_flashdata('message', 'Your password was updated successfully!');
			redirect('account/view');			
		} else if($this->input->post('submitCancel')) {
			redirect('account/view');
		} else {
			$this->load_page('account/edit_password');
		}
	}
	
	
	/**
	 * Checks whether the current password matches the one in the database and returns the result for form validation
	 */
	function _validate_password($password) {
		if($this->session->userdata('netID')) {			
			if($this->student_model->validate_student($this->session->userdata('netID'), $password)) {
				return true;
			} else {
				$this->form_validation->set_message('_validate_password', 'The current password you entered was incorrect. Please try again.');
				return false;
			}
		} else {			
			if($this->company_model->validate_company($this->session->userdata('username'), $password)) {
				return true;
			} else {
				$this->form_validation->set_message('_validate_password', 'The current password you entered was incorrect. Please try again.');
				return false;
			}
		}
	}
	
	/**
	 * Checks whether the new password doesn't match the one in the database and returns the result for form validation
	 * (this is basically the opposite of _verify_password() but with a different form validation message)
	 */
	function _password_doesnt_match($password) {	
		if($this->_validate_password($password)) {
			$this->form_validation->set_message('_password_doesnt_match', 'Please enter a new password different from your current password.');
			return false;
		} else {
			return true;
		}
	}

	function delete() {
		$this->login_check('student');
	
		$this->form_validation->set_rules('current_password', 'Current password', 'trim|required|callback__verify_password');
		$this->form_validation->set_rules('confirm_delete', 'Confirm delete', 'callback__checkbox_selected');
		
		if($this->form_validation->run() == true && $this->input->post('submitOK')) {		
			$this->student_model->delete_student($this->session->userdata('netID'));
			$this->resume_model->delete_resume($this->session->userdata('netID'));
			
			$this->session->set_flashdata('message', 'Your account was deleted successfully. We will miss you! :\'(');
			$this->logout();
		} else if($this->input->post('submitCancel')) {
			redirect('account/view');
		} else {
			$this->load_page('account/delete_account_confirm');
		}
	}

	function _checkbox_selected() {
		if($this->input->post('confirm_delete')) {
			return true;
		} else {
			$this->form_validation->set_message('_checkbox_selected', 'Please select the checkbox to confirm that you would like to delete your account.');
			return false;
		}
	}
	
	/**
	 * Logs a student out of their account and redirects them to the login page
	 */
	function logout() {
		$this->login_check();
	
		if($this->session->userdata('netID')) {
			$this->session->unset_userdata('netID');
		} else {
			$this->session->unset_userdata('username');
		}
		
		$this->session->set_userdata('is_logged_in', false);
		
		redirect('home');
	}
}
?>