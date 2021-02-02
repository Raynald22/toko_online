<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('template_auth/header');
			$this->load->view('auth/login');
			$this->load->view('template_auth/footer');
		}else{
			//validasinya sukses
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$user = $this->db->get_where('tb_user',['username' => $username])->row_array();

		//cek validasi
		if ($user) {
			//usernya ada
			if($user['is_active'] == 1) {
				//cek password
				if(password_verify($password, $user['password'])) {
					$data = [
						'username' => $user['username'],
						'role_id' => $user['role_id'],
					];
					$this->session->set_userdata($data);
					redirect('dashboard');
				}else{
					$this->session->set_flashdata('pesan_wrongpass', 'Your password is wrong :(');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('pesan_nonactive', 'Username has not been activated!');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('pesan_error', 'Username is not registered');
			redirect('auth');
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim'); //Input name harus diisi
		$this->form_validation->set_rules('username', 'Username', 'required|trim'); //Input username harus diisi
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

		if($this->form_validation->run() == FALSE) { //Jika validasinya gagal
			
			$this->load->view('template_auth/header_reg');
			$this->load->view('auth/register');
			$this->load->view('template_auth/footer');
		}else{ //Jika berhasil
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'image ' => 'default.jpg',
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => md5($this->input->post('password')),
				'role_id' => 2,
				'is_active' => 1,
			];

			$this->db->insert('tb_user', $data);
			$this->session->set_flashdata('pesan', 'Congratulation! Your account has been created!');
			redirect('auth');
		}
	}

	public function logout()
		{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Telah Keluar</div>');
		redirect('auth');
		}
}
