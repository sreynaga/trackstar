<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Users_Model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('session');
	}

	public function index() {
		$this->login();
	}

	public function login() {
		$data['title'] = 'Acceso a Track Start';
		$data['main_content'] = 'users/login';
		$this->load->view('includes/template_login', $data);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('users/login');
	}

	public function register() {
		$data['title'] = 'Crear nueva cuenta';
		$data['main_content'] = 'users/register';
		$this->load->view('includes/template_login', $data);
	}

	public function retry_password() {
		
	}

	public function verify_login() {
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$login = $this->Users_Model->verify_login($username, $password);

		if ($login) {
			$data = array(
				'loggued' => 'TRUE',
				'username' => $login[0]->username,
				'name' => $login[0]->name,
				'user_id' => $login[0]->id
			);
			
			$this->session->set_userdata($data);
			redirect('dashboard');
		} else {
			$this->login();
		}
	}

	public function create_account() {
		$this->form_validation->set_rules('name', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('username', 'Nombre de usuario', 'trim|required|callback__username_check');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback__email_check');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		$this->form_validation->set_rules('re_password', 'Confirmar Password', 'trim|required|matches[password]|md5');

		$this->form_validation->set_message('required', 'El campo %s es requerido');
		$this->form_validation->set_message('valid_email', 'El %s no es valido');
		$this->form_validation->set_message('_username_check', 'El %s ya existe');
		$this->form_validation->set_message('_email_check', 'El %s ya existe');
		$this->form_validation->set_message('matches', 'Las passwords no coinciden');

		if ($this->form_validation->run() == FALSE) {
			$this->register();
		}
		else {
			$name = $this->input->post('name');
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$activation_code = $this->_random_string(10);

			$insert = $this->Users_Model->insert_user($name, $username, $email, $password, $activation_code);

			# Email Confirmation
			$this->email->from('soporte@sergioreynaga.com', 'Sergio Reynaga');
			$this->email->to($email);
			$this->email->subject('Verificacion de registro TrackStart');
			$this->email->message('Por favor verifique su registro. ' . anchor('localhost/trackstart/users/register_confirm/' . $activation_code, 'Valide su correo'));	

			$this->email->send();

			$this->login();
		}
	}

	public function register_confirm($activation_code = '') {
		if ($activation_code == '') {
			die('Codigo de verificacion erroneo');
		} else {
			$update = $this->Users_Model->confirm_registration($activation_code);
			if ($update) {
				echo 'Registro Completo';
			} else {
				echo 'Su verficacion de registro fallo';
			}
		}
	}

	function _username_check($username) {
		return $this->Users_Model->username_check($username);
	}

	function _email_check($email) {
		return $this->Users_Model->email_check($email);
	}

	function _random_string($length) {
		$base = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789";
		$max = strlen($base) - 1;
		$activation_code = '';

		while (strlen($activation_code) < $length) {
			$activation_code .= $base{mt_rand(0, $max)};
		}

		return $activation_code;
	}

	public function username_check_ajax() {
		if ($this->input->is_ajax_request()) {
			$username = $this->input->post('username');
			if ($this->Users_Model->username_check($username)) {
				echo 'TRUE';
			} else {
				echo 'FALSE';
			}
		} else {
			echo 'Acceso denegado';
		}
	}

	public function email_check_ajax() {
		if ($this->input->is_ajax_request()) {
			$email = $this->input->post('email');
			if ($this->Users_Model->email_check($email)) {
				echo 'TRUE';
			} else {
				echo 'FALSE';
			}
		} else {
			echo 'Acceso denegado';
		}
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */