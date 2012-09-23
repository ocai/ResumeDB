<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Student extends MY_Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		redirect('students');
	}
	
	/*
	 * Allows companies to view a single student
	 */
	function view($netID = '') {
		$this->login_check('company');
		
		if($this->student_model->netID_exists($netID)) {
			$student = $this->student_model->get_student_by_netID($netID);
			$resume = $this->resume_model->get_resume_by_netID($netID);
			
			$query_id = $this->session->userdata('query_id') ? $this->session->userdata('query_id') : 0;
			$sort_by = $this->session->userdata('sort_by') ? $this->session->userdata('sort_by') : 'netID';
			$sort_order = $this->session->userdata('sort_order') ? $this->session->userdata('sort_order') : 'asc';
			$limit = $this->session->userdata('limit') ? $this->session->userdata('limit') : 20; //messy, but meh
			
			$this->input->load_query($query_id);
			$query_array = array(
				'filter_input' => $this->input->get('filter_input'),
				'filter_type'  => $this->input->get('filter_type'),
				'search_input' => $this->input->get('search_input'),
				'search_type'  => $this->input->get('search_type')
			);
		
			$results = $this->student_model->search($query_array, $this->student_model->get_num_students(), 0, $sort_by, $sort_order);
			$students = $results['students'];
			
			//find the index of the current netID within the $results array
			$index = 0;
			while($students[$index]->netID != $netID) {
				$index++;
			}
			
			//calculate the offset for the 'Back to Table' link based on the netID's index
			$offset = ((int) ($index / $limit)) * $limit;
			
			$view_data = array(
				'first_name' 	 => $student->first_name,
				'last_name'  	 => $student->last_name,
				'netID' 	 	 => $student->netID,
				'email' 	 	 => $student->email,
				'phone' 	 	 => $student->phone,
				'year' 	 	 	 => $student->year,
				'major' 	 	 => $student->major,
				'interests'  	 => $resume->interests,
				'skills' 		 => $resume->skills,
				'resume' 	 	 => $resume->resume,
				'next_netID' 	 => ($index + 1 < $results['num_results']) ? $students[$index + 1]->netID : '',
				'previous_netID' => ($index - 1 >= 0) ? $students[$index - 1]->netID : '',
				'query_id'		 => $query_id,
				'sort_by'		 => $sort_by,
				'sort_order'	 => $sort_order,
				'offset'		 => ($offset == 0) ? '' : $offset
			);
			
			$this->load_page('student/view_student', $view_data);
		} else {
			$this->index();
		}		
	}
}