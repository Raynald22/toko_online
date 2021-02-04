<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		verify_session('customer');

		$this->load->model(array(
			'Model_payment' => 'payment',
			'Model_order' => 'order',
			// 'review_model' => 'review'
		));
	}

	public function index()
	{
		$params['title'] = get_store_name();

		$home['total_order'] = $this->order->count_all_orders();
		$home['total_payment'] = $this->payment->count_all_payments();
		$home['total_process_order'] = $this->order->count_process_order();
		// $home['total_review'] = $this->review->count_all_reviews();

		$home['flash'] = $this->session->flashdata('store_flash');

		$this->load->view('templates/header', $params);
		$this->load->view('template_customer/header');
		$this->load->view('customer/dashboard', $home);
		$this->load->view('template_customer/footer');
		$this->load->view('templates/footer');
	}
}
