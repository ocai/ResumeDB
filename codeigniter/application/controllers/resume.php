<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Resume extends MY_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->login_check('student');
		
		redirect('resume/view');
	}
	
	function view() {
		$this->login_check('student');
	
		$resume = $this->resume_model->get_resume_by_netID($this->session->userdata('netID'));
		
		if($resume->interests == '' && $resume->skills == '' && $resume->resume == '') {
			$view_data = array(
				'message' 	=> 'Your resume is empty! Add something to your resume by clicking "Edit" above.',
				'interests' => '',
				'skills' 	=> '',
				'resume' 	=> ''
			);
		} else {
			$view_data = array(
				'message' 	=> '',
				'interests' => $resume->interests,
				'skills' 	=> $resume->skills,
				'resume' 	=> $resume->resume
			);
		}

		$this->load_page('resume/view_resume', $view_data);
	}
	
	function edit() {
		$this->login_check('student');
	
		$this->form_validation->set_rules('interests', 'Interests', 'trim|max_length[500]');
		$this->form_validation->set_rules('skills', 'Skills', 'trim|max_length[500]');
		$this->form_validation->set_rules('resume', 'Resume', 'trim|max_length[3000]');
		
		if($this->form_validation->run() == true && $this->input->post('submitOK')) {
			$resume_info = array(
				'netID' 	=> $this->session->userdata('netID'),
				'interests' => $this->input->post('interests'),
				'skills' 	=> $this->input->post('skills'),
				'resume'  	=> $this->input->post('resume')
			);
			
			$this->resume_model->update_resume($resume_info);
			
			//only show the successfully submitted message if the user actually entered something
			if($this->input->post('interests') != '' || $this->input->post('skills') != '' || $this->input->post('resume') !='') {
				$this->session->set_flashdata('message', 'Your resume was submitted successfully!');
			}
			
			redirect('resume/view');
		} else if($this->input->post('submitCancel')) {
			redirect('resume/view');
		} else {
			$resume = $this->resume_model->get_resume_by_netID($this->session->userdata('netID'));
			
			$view_data = array(
				'interests' => $resume->interests,
				'skills'	=> $resume->skills,
				'resume'	=> $resume->resume
			);
			
			$this->load_page('resume/edit_resume', $view_data);
		}
	}
}
?>