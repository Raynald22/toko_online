<?php

class About extends CI_Controller {
    // Produk Index
    public function index()
    {
        $this->load->view('templates/header'); //memanggil view header.php
        $this->load->view('about'); //memanggil view produk.php
        $this->load->view('templates/footer'); //memanggil view footer.php
	}
}
