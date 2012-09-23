<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Company_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function update_company($username, $company_info) {
		$this->db->select('*')
				 ->where('username', $username)
				 ->update('companies', $company_info);
	}
	
	function get_company_by_username($username) {
		$query = $this->db->select('*')
						  ->from('companies')
						  ->where('username', $username);
		
		$rows = $query->get()->result();
		return $rows[0];
	}
	
	function get_company_by_activation_code($activation_code) {
		$query = $this->db->select('*')
						  ->from('companies')
						  ->where('activation_code', $activation_code);
		
		$rows = $query->get()->result();
		return $rows[0];
	}
	
	function validate_activation_code($activation_code) {
		$query = $this->db->select('activation_code, activated')
						  ->from('companies')
						  ->where('activation_code', $activation_code)
						  ->where('activated', 0);	//account must still be unactive for the activation code to be valid
		
		if($query->get()->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	function activate($username) {
		$this->db->select('activated')
				 ->where('username', $username)
				 ->update('companies', array('activated' => '1'));
	}
	
	function company_email_exists($email) {
		$query = $this->db->select('email')
						  ->from('companies')
						  ->where('email', $email);
		
		if($query->get()->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function company_phone_exists($phone) {
		$query = $this->db->select('phone')
						  ->from('companies')
						  ->where('phone', $phone);
		
		if($query->get()->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	function validate_company($username, $password) {
		$salt = $this->config->item('encryption_key');
		
		$query = $this->db->select('username, password')
						  ->from('companies')
						  ->where('username', $username)
						  ->where('password', md5($password . $salt));
		
		if($query->get()->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
?>