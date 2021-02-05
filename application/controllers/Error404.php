<?php

class Error404 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->output->set_status_header('404'); //status error 404
		$this->load->view('template_error/header');
		$this->load->view('error');
		$this->load->view('template_error/footer');
	}
}
