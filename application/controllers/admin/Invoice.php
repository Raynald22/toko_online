<?php

class Invoice extends CI_Controller {
    // Dashboard Index
    public function index()
    {
        $data['invoice'] = $this->model_invoice->tampil_data();
		$this->load->view('templates/admin_header'); //memanggil view header.php
		$this->load->view('templates/admin_sidebar'); //memanggil view sidebar.php
        $this->load->view('admin/invoice', $data); //memanggil view dashboard.php
        $this->load->view('templates/admin_footer'); //memanggil view footer.php
	}
	
	public function detail($id_invoice)
	{
		$data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
		$data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
		$this->load->view('templates/admin_header'); //memanggil view header.php
		$this->load->view('templates/admin_sidebar'); //memanggil view sidebar.php
        $this->load->view('admin/detail_invoice', $data); //memanggil view dashboard.php
        $this->load->view('templates/admin_footer'); //memanggil view footer.php
	}
}
