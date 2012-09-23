<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Students extends MY_Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		redirect('students/view');
	}
	
	/**
	 * Creates an account for the student
	 */
	function register() {		
		$this->form_validation->set_rules('first_name', 'First name', 'trim|required|min_length[4]|max_length[25]');
		$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|min_length[2]|max_length[25]');
		$this->form_validation->set_rules('netID', 'NetID', 'trim|required|callback__netID_is_unique|max_length[25]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('confirm_password', 'Confirm password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'E-mail address', 'trim|required|valid_email|callback__email_is_unique');
		$this->form_validation->set_rules('phone', 'Phone number', 'trim|required|callback__phone_is_unique');
		$this->form_validation->set_rules('year', 'Year entered', 'trim|required|exact_length[4]|numeric');
		$this->form_validation->set_rules('major', '', '');

		if($this->form_validation->run() == true) {
			$password = $this->input->post('password');
			$salt = $this->config->item('encryption_key');
			
			$student_info = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'netID' 	 => $this->input->post('netID'),
				'password' 	 => md5($password . $salt),
				'email'		 => $this->input->post('email'),
				'phone' 	 => $this->input->post('phone'),
				'year' 		 => $this->input->post('year'),
				'major'		 => $this->input->post('major')
			);
			
			$this->student_model->add_student($student_info);
			$this->resume_model->add_resume($this->input->post('netID'));
			
			$this->load_page('students/create_account_success');
		} else {
			$this->load_page('students/create_account');
		}
	}
	
	/**
	 * Checks whether the NetID entered during registration is unique and returns the result for form validation
	 */
	function _netID_is_unique($netID) {	
		if($this->student_model->netID_exists($netID)) {	//NetID is not unique
			$this->form_validation->set_message('_netID_is_unique', 'The NetID you entered is already in the database. Please enter a different one.');
			return false;
		} else {
			return true;
		}
	}
	
	function _email_is_unique($email) {	
		if($this->student_model->student_email_exists($email)) {
			$this->form_validation->set_message('_email_is_unique', 'The email address you entered is already in the database. Please enter a different one.');
			return false;
		} else {
			return true;
		}
	}
	
	function _phone_is_unique($phone) {	
		if($this->student_model->student_phone_exists($phone)) {
			$this->form_validation->set_message('_phone_is_unique', 'The phone number you entered is already in the database. Please enter a different one.');
			return false;
		} else {
			return true;
		}
	}
	
	/**
	 * Allows only companies to view student info
	 */
	function view($query_id = 0, $sort_by = 'netID', $sort_order = 'asc', $offset = 0) {
		$this->login_check('company');
		
		//if the input parameters aren't blank and invalid, set them to default values
		$query_id = is_numeric($query_id) ? (int) $query_id : 0;
		$sort_columns = array('netID', 'first_name', 'last_name', 'year', 'major');
		$sort_by = in_array($sort_by, $sort_columns) ? $sort_by : 'netID';
		$sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
		$offset = is_numeric($offset) ? (int) $offset : 0;
		
		//load the query array based on the query id
		$this->input->load_query($query_id);
		$query_array = array(
			'filter_input' => $this->input->get('filter_input'),
			'filter_type'  => $this->input->get('filter_type'),
			'search_input' => $this->input->get('search_input'),
			'search_type'  => $this->input->get('search_type')
		);
		
		//set the limit - the number of rows that will be displayed on each page
		$limit = 20;
		
		$results = $this->student_model->search($query_array, $limit, $offset, $sort_by, $sort_order);
		
		//set up pagination
		$config = array(
			'base_url'    => site_url("students/view/$query_id/$sort_by/$sort_order"),
			'total_rows'  => $results['num_results'],
			'per_page' 	  => $limit,
			'uri_segment' => 6,
			'num_links'   => 10,
			'first_link'  => '&#171; First',
			'last_link'   => 'Last &#187;'
		);
		$this->pagination->initialize($config);
		
		$view_data = array(
			'num_students' => $config['total_rows'],
			'students' 	   => $results['students'],
			'pagination'   => $this->pagination->create_links(),
			'query_id'	   => $query_id,
			'sort_by'	   => $sort_by,
			'sort_order'   => $sort_order,
			'offset'	   => $offset,
			'fields'	   => array(
							       'netID' 		=> 'NetID',
								   'first_name' => 'First name',
								   'last_name'  => 'Last name',
								   'year' 		=> 'Year entered',
								   'major' 		=> 'Major'
							  )
		);

		$this->session->set_userdata('query_id', $query_id);
		$this->session->set_userdata('sort_by', $sort_by);
		$this->session->set_userdata('sort_order', $sort_order);
		$this->session->set_userdata('limit', $limit);
		
		$this->load_page('students/view_students', $view_data);
	}
	
	function search() {
		$query_array = array(
			'filter_input' => $this->input->post('filter_input'),
			'filter_type'  => $this->input->post('filter_type'),
			'search_input' => $this->input->post('search_input'),
			'search_type'  => $this->input->post('search_type')
		);
		
		if($query_array['filter_input'] == '' && $query_array['search_input'] == '') {
			redirect('students/view/0');
		}
		
		$query_id = $this->input->save_query($query_array);
		
		redirect("students/view/$query_id");
	}
}
?>