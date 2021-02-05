<?php

class About extends CI_Controller
{
	// about Index
	public function index()
	{
		$params['title'] = ('About Us');

		$this->load->view('templates/header', $params); //memanggil view header.php
		$this->load->view('about'); //memanggil view about.php
		$this->load->view('templates/footer'); //memanggil view footer.php
	}
}
