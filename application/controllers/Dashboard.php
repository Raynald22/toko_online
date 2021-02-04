<?php

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        verify_session('customer');

		$this->load->model(array(
            'Model_product' => 'product',
            // 'review_model' => 'review'
        ));
    }
    // Dashboard Index
    public function index()
    {
		$data['title'] = 'Welcome to Toko Online';
		$home['flash'] = $this->session->flashdata('store_flash');
        $data['barang'] = $this->product->get_all_products();
        $this->load->view('templates/header', $data); //memanggil view header.php
        $this->load->view('dashboard',$home, $data); //memanggil view dashboard.php
        $this->load->view('templates/footer'); //memanggil view footer.php
	}
}
