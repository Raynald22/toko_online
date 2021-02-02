<?php

class Model_barang extends CI_Model {
    // Untuk mengambil data dari database
    public function tampil_data()
    {
        return $this->db->get('tb_barang');
	}
	
	public function tambah_barang($data, $table)
	{
		//akan di record di table tb_barang
		$this->db->insert($table,$data);
	}

	public function edit_barang($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	//function untuk tambah ke keranjang
	public function find($id)
	{
		$result = $this->db->where('id_barang', $id)
							->limit(1)
							->get('tb_barang');

		if ($result->num_rows() > 0) {
			return $result->row();
		}else {
			return array();
		}
	}

	function get_all_produk(){
        $hasil=$this->db->get('tb_barang');
        return $hasil->result();
	}
	
	public function detail_barang($id_barang)
	{
		$result = $this->db->where('id_barang',$id_barang)->get('tb_barang');
		if($result->num_rows() > 0) {
			return $result->result();
		}else{
			return false;
		}
	}
}
