<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
    /**
	 * Builds the page by loading each view
	 */
	function load_page($body_view, $body_data = '') {
		$layout_data['main_content'] = $this->load->view($body_view, $body_data, true);
		$layout_data['menu_content'] = $this->load->view('template/menu', '', true);
	
		$this->load->view('template/main', $layout_data);
	}
	
	/**
	 * Checks whether a user is logged in based on session data
	 */
	function is_logged_in() {
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		if(isset($is_logged_in) && $is_logged_in) {
			return true;
		} else {
			return false;
		}
	}
	
	function login_check($user = '') {
		if($user == 'student' && $this->is_logged_in() && $this->session->userdata('username')) {
			$this->session->set_flashdata('message', 'You do not have permission to view that page.');
			redirect('account');
		} else if($user == 'company' && $this->is_logged_in() && $this->session->userdata('netID')) {
			$this->session->set_flashdata('message', 'You do not have permission to view that page.');
			redirect('account');
		} else {
			if(!$this->is_logged_in()) {
				$this->session->set_flashdata('message', 'You are not logged in! Please sign in or create an account.');
				redirect('home');
			}
		}
	}
}
?>