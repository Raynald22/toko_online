<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'Model_product' => 'product',
			// 'review_model' => 'review'
		));
	}
	// Dashboard Index
	public function index()
	{
		$params['title'] = 'Welcome to Toko Online';
		$home['flash'] = $this->session->flashdata('store_flash');
		$products['products'] = $this->product->get_all_products(); //untuk mendapatkan semua data produk
		$products['best_deal'] = $this->product->best_deal_product();

		$this->load->view('templates/header', $params); //memanggil view header.php
		$this->load->view('dashboard', $home, $products); //memanggil view dashboard.php
		$this->load->view('templates/footer'); //memanggil view footer.php
	}
}
