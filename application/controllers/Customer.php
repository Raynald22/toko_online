<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		verify_session('customer'); //verif jika sudah login atau belum

		$this->load->model(array(
			'Model_payment' => 'payment',
			'Model_order' => 'order',
			// 'review_model' => 'review'
		));
	}

	public function index()
	{
		$params['title'] = get_store_name(); //get_store_name di load dari global helper

		$home['total_order'] = $this->order->count_all_orders(); //menghitung total order
		$home['total_payment'] = $this->payment->count_all_payments(); //Menghitung total pembayaran
		$home['total_awaiting_payment'] = $this->payment->count_awaiting_payment(); //Menghitung total menunggu pembayaran
		$home['total_process_order'] = $this->order->count_process_order(); //Menghitung total order yang di proses
		$home['total_shipping_order'] = $this->order->count_shipping_order(); //Menghitung total order yang di dikirim
		$home['total_delivered_order'] = $this->order->count_delivered_order(); //Menghitung total order yang sudah di kirim
		$home['total_cancelled_order'] = $this->order->count_cancelled_order(); //Menghitung total order yang di batalkan
		// $home['total_review'] = $this->review->count_all_reviews();

		$home['flash'] = $this->session->flashdata('store_flash');

		$this->load->view('templates/header', $params); //$params = title
		$this->load->view('customer/dashboard', $home);
		$this->load->view('templates/footer');
	}
}
