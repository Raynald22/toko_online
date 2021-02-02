<?php

class Produk extends CI_Controller {
    // Produk Index
    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates/header'); //memanggil view header.php
        $this->load->view('produk/produk', $data); //memanggil view produk.php
        $this->load->view('templates/produk_footer'); //memanggil view footer.php
	}
	
	public function tambah_ke_keranjang($id)
	{
		$barang = $this->model_barang->find($id);

		$data = array(
			'id' => $barang->id_barang,
			'qty' => 1,
			'price' => $barang->harga,
			'name' => $barang->nama_barang,
			'image' => $barang->gambar,
		);

		$this->cart->insert($data);
		$data['image'] = $barang->gambar;
		redirect('produk');
	}

	public function detail($id_barang)
	{
		$data['barang'] = $this->model_barang->detail_barang($id_barang);
		$this->load->view('templates/header'); //memanggil view header.php
        $this->load->view('produk/detail_barang', $data); //memanggil view produk.php
        $this->load->view('templates/produk_footer'); //memanggil view footer.php
	}
}
