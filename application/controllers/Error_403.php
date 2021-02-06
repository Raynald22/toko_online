<?php

class Error404 extends CI_Controller
{
	public function index()
	{
		$this->output->set_status_header('403'); //status error 403
		$this->load->view('template_error/header_403');
		$this->load->view('error_403');
		$this->load->view('template_error/footer_403');
	}
}
