<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->_is_loggued_in();
	}

	public function index() {
		$data['main_content'] = 'comments/index';
		$data['title'] = 'My Comments';
		$data['current_page'] = 'My Comments';
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

/* End of file comments.php */
/* Location: ./application/controllers/comments.php */