<?php

class Dashboard extends CI_Controller {
    // Dashboard Index
    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates/header'); //memanggil view header.php
        $this->load->view('dashboard', $data); //memanggil view dashboard.php
        $this->load->view('templates/footer'); //memanggil view footer.php
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
	
	public function detail_keranjang()
	{
		$this->load->view('templates/header'); //memanggil view header.php
        $this->load->view('produk/keranjang'); //memanggil view dashboard.php
        $this->load->view('templates/footer'); //memanggil view footer.php
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('dashboard');
	}

	public function pembayaran()
	{
		$this->load->view('templates/header'); //memanggil view header.php
        $this->load->view('produk/pembayaran'); //memanggil view dashboard.php
        $this->load->view('templates/footer'); //memanggil view footer.php
	}

	public function proses_pesanan()
	{
		//apabila datanya diproses
		$is_processed = $this->model_invoice->index();
		if($is_processed) {
			$this->cart->destroy(); //jika customer melakukan checkout,maka keranjang akan kosong
			$data['barang'] = $this->model_barang->tampil_data()->result();
			$this->load->view('templates/header'); //memanggil view header.php
			$this->load->view('produk/proses_pesanan', $data); //memanggil view dashboard.php
			$this->load->view('templates/footer'); //memanggil view footer.php
		} else {
			echo "Maaf, Pesanan anda gagal diproses";
		}
	}
}
