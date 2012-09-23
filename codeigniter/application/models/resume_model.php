<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Resume_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function add_resume($netID) {
		$resume_info = array('netID' => $netID);
		$this->db->insert('resumes', $resume_info);
	}
	
	function update_resume($resume_info) {
		$this->db->select('*')
				 ->where('netID', $resume_info['netID'])
				 ->update('resumes', $resume_info);
	}
	
	function delete_resume($netID) {
		$this->db->where('netID', $netID)
				 ->delete('resumes');
	}
	
	function get_resume_by_netID($netID) {
		$query = $this->db->select('*')
						  ->from('resumes')
						  ->where('netID', $netID);
		
		$rows = $query->get()->result();
		return $rows[0];
	}
}
?>