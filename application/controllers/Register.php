<?php

class Register extends CI_Controller
{
    public function index()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_auth/header_reg');
            $this->load->view('auth/register_form');
            $this->load->view('template_auth/footer');
        } else {
            $nama      = $this->input->post('nama');
            $username      = $this->input->post('username');
            $password      = md5($this->input->post('password'));
            $role_id        = '2';

            $data = array(
                'nama'     => $nama,
                'username'     => $username,
                'password'     => $password,
                'role_id'       => $role_id
            );

            $this->model_auth->insert_data($data, 'tb_user');
            $this->session->set_flashdata('pesan', 'Berhasil Register, Silahkan Login!');
            redirect('auth/login');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }
}
