<?php

class Dashboard extends CI_Controller {
    // Dashboard Index
    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
		$this->load->view('templates/admin_header'); //memanggil view header.php
		$this->load->view('templates/admin_sidebar'); //memanggil view sidebar.php
        $this->load->view('admin/dashboard', $data); //memanggil view dashboard.php
        $this->load->view('templates/admin_footer'); //memanggil view footer.php
    }
}
