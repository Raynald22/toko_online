<?php

class Auth extends CI_Controller
{

    public function login()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_auth/header');
            $this->load->view('auth/login_form');
            $this->load->view('template_auth/footer');
        } else {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $cek = $this->model_auth->cek_login($username, $password);

            if ($cek == FALSE) {
                $this->session->set_flashdata('pesan_wrongpass', 'Username atau Password Salah!');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('username', $cek->username);
                $this->session->set_userdata('role_id', $cek->role_id);
                $this->session->set_userdata('nama', $cek->nama);
                $this->session->set_userdata('id', $cek->id);

                switch ($cek->role_id) {
                    case 1:
                        redirect('admin/dashboard');
                        break;
                    case 2:
                        redirect('dashboard');
                        break;

                    default:
                        break;
                }
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function ganti_password()
    {
        $this->load->view('template_auth/header_reg');
        $this->load->view('ganti_password');
        $this->load->view('template_auth/footer');
    }

    public function ganti_password_aksi()
    {
        $pass_baru = $this->input->post('pass_baru');
        $ulang_pass = $this->input->post('ulang_pass');

        $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass', 'Ulangi Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_auth/header_reg');
            $this->load->view('ganti_password');
            $this->load->view('template_auth/footer');
        } else {
            $data = array('password' => md5($pass_baru));
            $id = array('id' => $this->session->userdata('id'));

            $this->model_auth->update_password($id, $data, 'customer');
            $this->session->set_flashdata('pesan', 'Password Berhasil di Update,Silahkan Login!');
            redirect('auth/login');
        }
    }
}
