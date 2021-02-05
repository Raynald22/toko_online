<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sale extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'Model_product' => 'product',
		));
	}

	public function index()
	{
		$params['title'] = 'Sale';

		$products['products'] = $this->product->get_all_products();
		$products['best_deal'] = $this->product->best_deal_product();

		$this->load->view('templates/header', $params); //memanggil view header.php
		$this->load->view('produk/sale_produk', $products); //memanggil view dashboard.php
		$this->load->view('templates/footer'); //memanggil view footer.php
	}
}
