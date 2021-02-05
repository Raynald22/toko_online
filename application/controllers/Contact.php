<?php

class Contact extends CI_Controller
{
	// Contact Index
	public function index()
	{
		$params['title'] = ('Contact Us');

		$this->load->view('templates/header', $params); //memanggil view header.php
		$this->load->view('contact', $params); //memanggil view contact.php
		$this->load->view('templates/footer'); //memanggil view footer.php
	}
}
