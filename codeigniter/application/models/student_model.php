<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Student_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	/**
	 * Inserts a new student into the database
	 */
	function add_student($student_info) {
		$this->db->insert('students', $student_info);
	}
	
	function update_student($netID, $student_info) {
		$this->db->select('*')
				 ->where('netID', $netID)
				 ->update('students', $student_info);
	}
	
	function delete_student($netID) {
		$this->db->where('netID', $netID)
				 ->delete('students');
	}
	
	function get_student_by_netID($netID) {
		$query = $this->db->select('*')
						  ->from('students')
						  ->where('netID', $netID);
		
		$rows = $query->get()->result();
		return $rows[0];
	}
	
	function search($query_array, $limit, $offset, $sort_by, $sort_order) {		
		//results query
		$query = $this->db->select('first_name, last_name, netID, email, phone, year, major')
						  ->from('students')
						  ->order_by($sort_by, $sort_order);
		
		if(strlen($query_array['filter_input'])) {
			$keywords = $query_array['filter_input'];
		
			if($query_array['filter_type'] == 'year') {
				$query->like('year', $keywords);
			} else {
				$query->like('major', $keywords);
			}
		}
		
		$students = $query->get()->result();
		
		$query = $this->db->select('*')
						  ->from('resumes');
		
		//find search matches in the resume table
		if(strlen($query_array['search_input'])) {
			$keywords = $query_array['search_input'];
		
			if($query_array['search_type'] == 'interests') {
				$query->like('interests', $keywords);
			} else if($query_array['search_type'] == 'skills') {
				$query->like('skills', $keywords);
			} else {
				$query->like('resume', $keywords);
			}
		}
		
		$resumes = $query->get()->result();
		
		$total_students = array();
		
		//loop through the student and resume arrays to find matching netID's
		foreach($students as $student) {
			foreach($resumes as $resume) {
				if($student->netID == $resume->netID) {
					$total_students[] = $student;
				}
			}
		}
		
		$partial_students = array();
		
		$counter = 0;
		$index = $offset;
		while(array_key_exists($index, $total_students) && $counter < $limit) {
			$partial_students[] = $total_students[$index];
			
			$counter++;
			$index++;
		}
		
		$results = array(
			'num_results' => count($total_students),
			'students'	  => $partial_students
		);
		return $results;
	}
	
	function get_num_students() {
		return $this->db->count_all('students');
	}
	
	/**
	 * Returns whether the netID already exists in the database
	 */
	function netID_exists($netID) {
		$query = $this->db->select('netID')
						  ->from('students')
						  ->where('netID', $netID);
		
		if($query->get()->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Returns whether the student email already exists in the database
	 */
	function student_email_exists($email) {
		$query = $this->db->select('email')
						  ->from('students')
						  ->where('email', $email);
		
		if($query->get()->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Returns whether the student phone already exists in the database
	 */
	function student_phone_exists($phone) {
		$query = $this->db->select('phone')
						  ->from('students')
						  ->where('phone', $phone);
		
		if($query->get()->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Validates the student login
	 */
	function validate_student($netID, $password) {
		$salt = $this->config->item('encryption_key');
		
		$query = $this->db->select('netID, password')
						  ->from('students')
						  ->where('netID', $netID)
						  ->where('password', md5($password . $salt));
		
		if($query->get()->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
?>