<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Input extends CI_Input {

	function save_query($query_array) {
		$CI =& get_instance();
		$CI->db->insert('ci_query', array('query_string' => http_build_query($query_array)));
		return $CI->db->insert_id();
	}
	
	function load_query($query_id) {
		$CI =& get_instance();
		$query = $CI->db->select('query_string')
						->from('ci_query')
						->where('id', $query_id);
		
		$rows = $query->get()->result();
		
		if(isset($rows[0])) {
			parse_str($rows[0]->query_string, $_GET);
		}
	}
}
?>