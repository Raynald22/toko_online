<?php

class Produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->library('cart');
		$this->load->model(array(
			'Model_product' => 'product',
			'Model_customer' => 'customer'
		));
	}

	// Produk Index
	public function index()
	{
		$data['title'] = 'Products';
		$data['products'] = $this->product->get_all_products();

		$products['best_deal'] = $this->product->best_deal_product();

		$this->load->view('templates/header', $data); //memanggil view header.php
		$this->load->view('produk/produk', $data); //memanggil view produk.php
		$this->load->view('templates/produk_footer'); //memanggil view footer.php
	}

	// Produk Index
	public function shoes()
	{
		$data['title'] = 'Shoes';
		$data['products'] = $this->product->get_all_products();
		$params['shoes'] = $this->product->get_all_shoes();

		$this->load->view('templates/header', $data); //memanggil view header.php
		$this->load->view('kategori/sepatu', $data, $params); //memanggil view produk.php
		$this->load->view('templates/produk_footer'); //memanggil view footer.php
	}
}
