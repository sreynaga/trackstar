<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->_is_loggued_in();
	}

	public function index() {
		$data['main_content'] = 'dashboard/index';
		$data['title'] = 'Dashboard';
		$data['current_page'] = 'Home';
		$this->load->view('includes/template', $data);
	}

	public function _is_loggued_in() {
		$loggued_in = $this->session->userdata('loggued');
		$user_id = $this->session->userdata('user_id');

		if ($loggued_in != 'TRUE' OR $user_id == '') {
			redirect('users/login');
		}
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */