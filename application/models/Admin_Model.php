<?php 

	class Admin_Model extends CI_Model{
		
		//Barang
		public function getDataBarang(){

			$this->db->join('tb_kategori','tb_kategori.kode_kategori=tb_barang.kode_kategori');
			return $this->db->get('tb_barang');

		}

		public function getDataWhere($id){

			$this->db->where('kode_barang', $id);
			return $this->db->get('tb_barang');

		}

		public function InsertBarang($data, $table){
			
			return $this->db->insert($table, $data);

		}

		public function deleteBarang($id){
			
			$this->db->where('kode_barang', $id);
			$this->db->delete('tb_barang');

			$this->db->where('kode_barang', $id);
			$this->db->delete('br_masuk');

			$this->db->where('kode_barang', $id);
			return $this->db->delete('br_keluar');

		}

		public function UpdateBarang($where, $data, $table){
			
			$this->db->where($where);
			return $this->db->update($table, $data);

		}




		//Kategori
		public function getDataKategori(){
			
			return $this->db->get('tb_kategori');

		}

		public function getWhereKtg($id){

			$this->db->where('kode_kategori', $id);
			return $this->db->get('tb_kategori');

		}

		public function InsertKategori($data, $table){
			
			return $this->db->insert($table, $data);

		}

		public function deleteKategori($id){
			
			$this->db->where('kode_kategori', $id);
			return $this->db->delete('tb_kategori');

		}

		public function UpdateKategori($where, $data, $table){
			
			$this->db->where($where);
			return $this->db->update($table, $data);

		}




		//Gudang
		public function getDataGudang(){
			
			return $this->db->get('tb_gudang');

		}

		public function getWhereGdg($id){

			$this->db->where('kode_Gudang', $id);
			return $this->db->get('tb_Gudang');

		}

		public function InsertGudang($data, $table){
			
			return $this->db->insert($table, $data);

		}

		public function deleteGudang($id){
			
			$this->db->where('kode_gudang', $id);
			return $this->db->delete('tb_gudang');

		}

		public function UpdateGudang($where, $data, $table){
			
			$this->db->where($where);
			return $this->db->update($table, $data);

		}
		



		//Barang Masuk
		public function getDataBarangMasuk(){

			$this->db->join('tb_barang','tb_barang.kode_barang=br_masuk.kode_barang');
			return $this->db->get('br_masuk');

		}

		public function getWhereMasuk($id){

			$this->db->where('id_masuk', $id);
			return $this->db->get('br_masuk');

		}

		public function BarangMasuk($data, $table){
			
			return $this->db->insert($table, $data);

		}

		public function deleteMasuk($id){

			$this->db->where('id_masuk', $id);
			return $this->db->delete('br_masuk');

		}

		public function UpdateMasuk($where, $data, $table){
			
			$this->db->where($where);
			return $this->db->update($table, $data);

		}

		public function UpdateBarangMasuk($data2, $table, $kode){
			$this->db->where('kode_barang', $kode);
			return $this->db->update($table, $data2);
		}




		//Barang Keluar
		public function getDataBarangKeluar(){

			$this->db->join('tb_barang','tb_barang.kode_barang=br_keluar.kode_barang');
			$this->db->join('tb_gudang','tb_gudang.kode_gudang=br_keluar.kode_gudang');
			return $this->db->get('br_keluar');

		}

		public function getWhereKeluar($id){

			$this->db->where('id_keluar', $id);
			return $this->db->get('br_keluar');

		}

		public function BarangKeluar($data, $table){
			
			return $this->db->insert($table, $data);

		}

		public function deleteKeluar($id){

			$this->db->where('id_keluar', $id);
			return $this->db->delete('br_keluar');

		}

		public function UpdateBarangKeluar($data2, $table, $kode){
			$this->db->where('kode_barang', $kode);
			return $this->db->update($table, $data2);
		}

		public function UpdateKeluar($where, $data, $table){
			
			$this->db->where($where);
			return $this->db->update($table, $data);

		}




		//Opname
		public function getDataOpname(){
			$this->db->select('*');
			$this->db->select('(SELECT SUM(stock) FROM br_masuk WHERE kode_barang=tb_barang.kode_barang) AS masuk');
			$this->db->select('(SELECT SUM(stock) FROM br_keluar WHERE kode_barang=tb_barang.kode_barang) AS keluar');
			$this->db->join('br_masuk', 'br_masuk.kode_barang=tb_barang.kode_barang');
			$this->db->join('br_keluar', 'br_keluar.kode_barang=tb_barang.kode_barang');
			$this->db->group_by("tb_barang.kode_barang"); // P
			return $this->db->get('tb_barang');
		}
	}

 ?>