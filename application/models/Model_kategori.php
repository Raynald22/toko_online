<?php

class Model_kategori extends CI_Model {
	public function data_sepatu()
	{
		return $this->db->get_where('tb_barang',array('kategori' => 'sepatu')); //diambil berdasarkan dari table tb_barang lalu column kategori
	}

	public function data_hoodie()
	{
		return $this->db->get_where('tb_barang',array('kategori' => 'hoodie')); //diambil berdasarkan dari table tb_barang lalu column kategori
	}

	public function data_tshirt()
	{
		return $this->db->get_where('tb_barang',array('kategori' => 't-shirt')); //diambil berdasarkan dari table tb_barang lalu column kategori
	}

	public function data_pants()
	{
		return $this->db->get_where('tb_barang',array('kategori' => 'pants')); //diambil berdasarkan dari table tb_barang lalu column kategori
	}
}
