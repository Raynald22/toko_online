<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payments extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		verify_session('admin');

		$this->load->model(array(
			'admin/Model_order' => 'order',
			'admin/Model_payment' => 'payment'
		));
	}

	public function index()
	{
		$params['title'] = 'Kelola Pembayaran';

		$config['base_url'] = site_url('admin/payments/index');
		$config['total_rows'] = $this->payment->count_all_payments();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		$config['first_link']       = '«';
		$config['last_link']        = '»';
		$config['next_link']        = '›';
		$config['prev_link']        = '‹';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->load->library('pagination', $config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$payments['payments'] = $this->payment->get_all_payments($config['per_page'], $page);
		$payments['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/admin_header', $params);
		$this->load->view('templates/admin_sidebar', $params);
		$this->load->view('admin/payments', $payments);
		$this->load->view('templates/admin_footer');
	}

	public function view($id = 0)
	{
		if ($this->payment->is_payment_exist($id)) {
			$data = $this->payment->payment_data($id);

			$banks = json_decode(get_settings('payment_banks'));
			$banks = (array) $banks;

			$params['title'] = 'Pembayaran Order #' . $data->order_number;

			$payments['banks'] = $banks;
			$payments['payment'] = $data;
			$payments['flash'] = $this->session->flashdata('payment_flash');

			$this->load->view('templates/admin_header', $params);
			$this->load->view('templates/admin_sidebar', $params);
			$this->load->view('admin/detail_payment', $payments);
			$this->load->view('templates/admin_footer');
		} else {
			show_404();
		}
	}

	public function verify()
	{
		$id = $this->input->post('id');
		$order = $this->input->post('order');
		$action = $this->input->post('action');
		$redir = $this->input->post('redir');

		if ($action == 1) {
			$status = 2;
			$flash = 'Payment confirmation success';
		} else if ($action == 2) {
			$status = 3;
			$flash = 'Pembayaran ditandai sebagai tidak ada';
		} else {
			$flash = 'Tidak ada tindakan dilakukan';
		}

		$this->payment->set_payment_status($id, $status, $order);

		$this->session->set_flashdata('payment_flash', $flash);

		if ($redir == 1)
			redirect('admin/detail_payment/' . $id);

		redirect('admin/detail_order/' . $order . '#payment_flash');
	}
}
