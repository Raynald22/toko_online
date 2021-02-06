<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library(['form_validation', 'encryption']); //load library dari CI
		$this->load->model('Model_login', 'login'); //load model dari model/Model_login dengan function login
	}

	public function index()
	{
		$params['flash_message'] = $this->session->flashdata('login_flash'); //load flash message
		$params['old_username'] = $this->session->flashdata('old_username'); //load flash message

		$params['redirection'] = $this->input->get('redir_to'); //redirect current url
		$this->session->set_userdata('redirection', $params['redirection']);

		$this->load->view('template_auth/header'); //load view template_auth/header.php
		$this->load->view('auth/login', $params); //load view auth/logn.php
		$this->load->view('template_auth/footer'); //load view template_auth/footer.php
	}

	// function untuk login
	public function do_login()
	{
		$this->form_validation->set_error_delimiters('<div class="text-error">', '</div>');

		// rules untuk login
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[16]', [
			'min_length' => 'Username minimal 4 character', //minimal panjang karakter
			'max_length' => 'Username maksimal 16 character', //maksimal panjang karakter
			'required' => 'Please enter Username to login' //wajib diisi
		]);
		$this->form_validation->set_rules('password', 'Password', 'required', [
			'required' => 'Please enter Password' //wajib diisi
		]);

		if ($this->form_validation->run() === FALSE) { //jika gagal
			$this->index(); //akan di redirect kembali ke halaman login
		} else {
			$username = $this->input->post('username'); //masukan username
			$password = $this->input->post('password'); //masukan password
			$remember_me = $this->input->post('remember_me');

			//run Model_login dengan function login
			$this->login->login($username, $password);

			if ($this->login->is_user_exist()) { //jika username ada
				$user_password = $this->login->get_password();

				//cek password
				if (password_verify($password, $user_password)) {
					$login_data = [
						'is_login' => TRUE,
						'user_id' => $this->login->logged_user_id(),
						'login_at' => time(),
						'remember_me' => ($remember_me == 1) ? TRUE : FALSE
					];

					$login_data = json_encode($login_data);
					$login_session = $this->encryption->encrypt($login_data);

					$redirection = $this->session->userdata('redirection');
					if ($redirection) {
						$redir_to = base64_decode($redirection);

						$this->session->unset_userdata('redirection');
					} else {
						$role = $this->login->get_role(); //memeriksa role_id

						$redir_to = ($role == 1) ? 'admin' : 'dashboard'; //jika 1 akan di redirect ke admin dan jika 2 akan di redirect ke index
					}

					if ($remember_me == 1) {
						$this->input->set_cookie('__ACTIVE_SESSION_DATA', $login_session, 172800); //48 jam
					} else {
						$this->session->set_userdata('__ACTIVE_SESSION_DATA', $login_session);
					}

					redirect($redir_to);
					//jika username ada dan password salah
				} else {
					$this->session->set_flashdata('wrong_pass', 'Password salah!'); //pesan password salah
					$this->session->set_flashdata('old_username', $username); //username dari login

					//dan akan dikembalikan ke halaman login
					redirect('auth/login');
				}
				//jika username tidak terdaftar
			} else {
				$this->session->set_flashdata('not_registered', 'User with username ' . $username  . ' is not registered');

				redirect('auth/login');
			}
		}
	}
}
