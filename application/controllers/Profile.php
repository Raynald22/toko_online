<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		verify_session('customer');

		$this->load->model(array(
			'Model_profile' => 'profile'
		));
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = $this->profile->get_profile();

		$user['user'] = $data;
		$user['flash'] = $this->session->flashdata('profile');
		$params['title'] = 'Profile';

		$this->load->view('templates/header', $params);
		$this->load->view('customer/profile', $user);
		$this->load->view('templates/footeree');
	}

	public function edit_name()
	{
		$this->form_validation->set_rules('name', 'Nama lengkap', 'required|max_length[32]|min_length[4]');

		if ($this->form_validation->run() === FALSE) {
			$this->index();
		} else {
			$data = new stdClass();

			$data->name = $this->input->post('name');
			$data->phone_number = $this->input->post('phone_number');
			$data->address = $this->input->post('address');
			$data->profile_picture = $this->input->post('profile_picture');

			$profile = $this->profile->get_profile();
			$old_profile = $profile->profile_picture;

			if (isset($_FILES) && @$_FILES['file']['error'] == '0') {
				$config['upload_path'] = './assets/uploads/users/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = 2048;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {
					if ($old_profile) {
						unlink('./assets/uploads/users/' . $old_profile);
					}

					$file_data = $this->upload->data();
					$data->profile_picture = $file_data['file_name'];
				} else {
					$errors = $this->upload->display_errors();
					$errors .= '<p>';
					$errors .= anchor('profile', '&laquo; Kembali');
					$errors .= '</p>';

					show_error($errors);
				}
			}

			$flash_message = ($this->profile->update($data)) ? 'Profil berhasil diperbarui!' : 'Terjadi kesalahan';

			$this->session->set_flashdata('profile', $flash_message);
			redirect('profile');
		}
	}

	public function edit_account()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|max_length[16]|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'min_length[4]');

		if ($this->form_validation->run() === FALSE) {
			$this->index();
		} else {
			$data = new stdClass();
			$profile = $this->profile->get_profile();

			$get_password = $this->input->post('password');

			if (empty($get_password)) {
				$password = $profile->password;
			} else {
				$password = password_hash($get_password, PASSWORD_BCRYPT);
			}

			$data->username = $this->input->post('username');
			$data->password = $password;

			$flash_message = ($this->profile->update_account($data)) ? 'Akun berhasil diperbarui' : 'Terjadi kesalahan';

			$this->session->set_flashdata('profile', $flash_message);
			$this->session->set_flashdata('show_tab', 'akun');

			redirect('profile');
		}
	}

	public function edit_email()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[32]|min_length[10]');

		if ($this->form_validation->run() === FALSE) {
			$this->index();
		} else {
			$data = new stdClass();

			$data->email = $this->input->post('email');

			$flash_message = ($this->profile->update_account($data)) ? 'Email berhasil diperbarui' : 'Terjadi kesalahan';

			$this->session->set_flashdata('profile', $flash_message);
			$this->session->set_flashdata('show_tab', 'email');

			redirect('profile');
		}
	}
}
