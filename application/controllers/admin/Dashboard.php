<?php

class Dashboard extends CI_Controller
{
	// Dashboard Index
	public function __construct()
	{
		parent::__construct();

		verify_session('admin');

		$this->load->model(array(
			'admin/Model_product' => 'product',
			'admin/Model_customer' => 'customer',
			'admin/Model_order' => 'order',
			'admin/Model_payment' => 'payment'
		));
	}

	public function index()
	{
		$params['title'] = 'Admin ' . get_store_name();

		$overview['total_products'] = $this->product->count_all_products();
		$overview['total_customers'] = $this->customer->count_all_customers();
		$overview['total_order'] = $this->order->count_all_orders();
		$overview['total_income'] = $this->payment->sum_success_payment();

		$overview['products'] = $this->product->latest();
		$overview['categories'] = $this->product->latest_categories();
		$overview['payments'] = $this->payment->payment_overview();
		$overview['orders'] = $this->order->latest_orders();
		$overview['customers'] = $this->customer->latest_customers();

		$overview['order_overviews'] = $this->order->order_overview();
		$overview['income_overviews'] = $this->order->income_overview();

		$this->load->view('templates/admin_header', $params);
		$this->load->view('templates/admin_sidebar', $params);
		$this->load->view('admin/dashboard', $overview);
		$this->load->view('templates/admin_footer');
	}
}
