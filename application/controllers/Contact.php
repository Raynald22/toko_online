<?php

class Contact extends CI_Controller
{
	// Produk Index
	public function index()
	{
		$this->load->view('templates/header'); //memanggil view header.php
		$this->load->view('contact'); //memanggil view produk.php
		$this->load->view('templates/footer'); //memanggil view footer.php
	}
}
