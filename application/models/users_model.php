<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function username_check($username) {
		$this->db->where('username', $username);
		$query = $this->db->get('users');

		if ($query->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}

	public function email_check($email) {
		$this->db->where('email', $email);
		$query = $this->db->get('users');

		if ($query->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}

	public function insert_user($name, $username, $email, $password, $activation_code) {
		$data = array(
			'username' => $username,
			'password' => $password,
			'email' => $email,
			'name' => $name,
			'activation_code' => $activation_code
		);

		return $this->db->insert('users', $data);
	}

	public function confirm_registration($activation_code) {
		$this->db->select('id');
		$this->db->where('activation_code', $activation_code);
		$query = $this->db->get('users');

		if ($query->num_rows() > 0) {
			$data = array(
				'status' => 1
			);
			$this->db->where('activation_code', $activation_code);
			return $this->db->update('users', $data);
		} else {
			return false;
		}
	}

	public function verify_login($username, $password) {
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('users');

		if ($query->num_rows > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

}

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */