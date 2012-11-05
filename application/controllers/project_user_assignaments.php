<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_User_Assignaments extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->_is_loggued_in();
	}

	public function index() {
		
	}

	public function _is_loggued_in() {
		$loggued_in = $this->session->userdata('loggued');
		$user_id = $this->session->userdata('user_id');

		if ($loggued_in != 'TRUE' OR $user_id == '') {
			redirect('users/login');
		}
	}

}

/* End of file project_user_assignaments.php */
/* Location: ./application/controllers/project_user_assignaments.php */