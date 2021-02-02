<?php

class Kategori extends CI_Controller {
    // Dashboard Index
    public function sepatu()
    {
        $data['sepatu'] = $this->model_kategori->data_sepatu()->result();
		$this->load->view('templates/header'); //memanggil view header.php
        $this->load->view('kategori/sepatu', $data); //memanggil view dashboard.php
        $this->load->view('templates/produk_footer'); //memanggil view footer.php
	}

	public function hoodie()
    {
        $data['hoodie'] = $this->model_kategori->data_hoodie()->result();
		$this->load->view('templates/header'); //memanggil view header.php
        $this->load->view('kategori/hoodie', $data); //memanggil view dashboard.php
        $this->load->view('templates/produk_footer'); //memanggil view footer.php
	}

	public function tshirt()
    {
        $data['tshirt'] = $this->model_kategori->data_tshirt()->result();
		$this->load->view('templates/header'); //memanggil view header.php
        $this->load->view('kategori/tshirt', $data); //memanggil view dashboard.php
        $this->load->view('templates/produk_footer'); //memanggil view footer.php
	}

	public function pants()
    {
        $data['pants'] = $this->model_kategori->data_pants()->result();
		$this->load->view('templates/header'); //memanggil view header.php
        $this->load->view('kategori/pants', $data); //memanggil view dashboard.php
        $this->load->view('templates/produk_footer'); //memanggil view footer.php
	}
}
