<?php

class Data_barang extends CI_Controller {
    // Dashboard Index
    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
		$this->load->view('templates/admin_header'); //memanggil view header.php
		$this->load->view('templates/admin_sidebar'); //memanggil view sidebar.php
        $this->load->view('admin/data_barang', $data); //memanggil view dashboard.php
        $this->load->view('templates/admin_footer'); //memanggil view footer.php
	}
	
	//function untuk tambah barang
	public function tambah_aksi()
	{
		$nama_barang = $this->input->post('nama_barang');
		$keterangan = $this->input->post('keterangan');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$gambar = $_FILES['gambar']['name'];
		if ($gambar = '') {

		}else {
			$config ['upload_path'] = './uploads'; //akan disimpan di folder uploads
			$config ['allowed_types'] = 'jpg|jpeg|png|gif'; //format gambar yang diperbolehkan

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				echo "Gambar gagal di upload!";
			}else {
				$gambar = $this->upload->data('file_name');
			}
		}

		$data = array (
			'nama_barang' => $nama_barang,
			'keterangan' => $keterangan,
			'kategori' => $kategori,
			'harga' => $harga,
			'stok' => $stok,
			'gambar' => $gambar,
		);

		$this->model_barang->tambah_barang($data, 'tb_barang'); //diambil dari function tambah_barang di model_barang
		redirect('admin/data_barang'); //jika sudah akan kembali ke halaman data barang
	}

	public function edit($id)
	{
		$where = array('id_barang' => $id);
		$data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result(); //function edit_barang berada di model_barang

		$this->load->view('templates/admin_header'); //memanggil view header.php
		$this->load->view('templates/admin_sidebar'); //memanggil view sidebar.php
        $this->load->view('admin/edit_barang', $data); //memanggil view edit_barang.php
        $this->load->view('templates/admin_footer'); //memanggil view footer.php
	}

	public function update()
	{
		$id = $this->input->post('id_barang');
		$nama_barang = $this->input->post('nama_barang');
		$keterangan = $this->input->post('keterangan');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');

		$data = array(
			'nama_barang' => $nama_barang,
			'keterangan' => $keterangan,
			'kategori' => $kategori,
			'harga' => $harga,
			'stok' => $stok,
		);

		$where = array(
			'id_barang' => $id
		);

		$this->model_barang->update_data($where, $data, 'tb_barang');
		redirect('admin/data_barang');
	}

	public function hapus($id)
	{
		$where = array('id_barang' => $id);
		$this->model_barang->hapus_data($where, 'tb_barang');

		redirect('admin/data_barang');
	}
}
