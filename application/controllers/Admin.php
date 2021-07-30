<?php 
	
	class Admin extends CI_Controller{
		
		public function Dashboard(){
			
			$this->load->view('Admin/Template/Header.php');
			$this->load->view('Admin/Admin_Dashboard');
			$this->load->view('Admin/Template/Footer.php');

		}




		//Barang
		public function ToDataBarang(){

			$data['tb_barang'] = $this->Admin_Model->getDataBarang()->result_array();
			$jml_data = $this->Admin_Model->getDataBarang()->num_rows()+1;
			$data['kode_barang'] = 'BR00'.$jml_data;
			
			if (isset($_GET['id'])) {
				$data['data'] = $this->Admin_Model->getDataWhere($_GET['id'])->row();
			}
			

			$this->load->view('Admin/Template/Header.php');
			$this->load->view('Admin/Master/Data_Barang', $data);
			$this->load->view('Admin/Template/Footer.php');

		}

		public function InsertBarang(){
			
			$data = array(
				'kode_barang' => $this->input->post('kdbarang'),
				'kode_kategori' => $this->input->post('kdktg'),
				'nama_barang' => $this->input->post('nbarang')
			);

			$this->Admin_Model->InsertBarang($data, 'tb_barang');

			redirect('kelola-barang');

		}

		public function deleteBrg($id){
			
			$this->Admin_Model->deleteBarang($id);

			redirect('kelola-barang');

		}

		public function UpdateBarang(){
			
			$data = array(
				'kode_barang' => $this->input->post('kdbarang'),
				'kode_kategori' => $this->input->post('kdktg'),
				'nama_barang' => $this->input->post('nbarang')
			);

			$where = array('kode_barang' => $this->input->post('kdbarang'));

			$this->Admin_Model->UpdateBarang($where, $data, 'tb_barang');

			redirect('kelola-barang');

		}




		//Kategori
		public function ToKategori(){

			$data['tb_kategori'] = $this->Admin_Model->getDataKategori()->result_array();
			$jml_data = $this->Admin_Model->getDataKategori()->num_rows()+1;
			$data['kode_kategori'] = 'KT00'.$jml_data;

			if (isset($_GET['id'])) {
				$data['data'] = $this->Admin_Model->getWhereKtg($_GET['id'])->row();
			}
			
			$this->load->view('Admin/Template/Header.php');
			$this->load->view('Admin/Master/Kategori', $data);
			$this->load->view('Admin/Template/Footer.php');

		}

		public function InsertKategori(){
			
			$data = array(
				'kode_kategori' => $this->input->post('kdkategori'),
				'nama_kategori' => $this->input->post('nkategori') 
			);

			$this->Admin_Model->InsertKategori($data, 'tb_kategori');

			redirect('kelola-kategori');

		}

		public function deleteKtg($id){
			
			$this->Admin_Model->deleteKategori($id);

			redirect('kelola-kategori');

		}

		public function UpdateKategori(){
			
			$data = array(
				'kode_kategori' => $this->input->post('kdkategori'),
				'nama_kategori' => $this->input->post('nkategori') 
			);

			$where = array('kode_kategori' => $this->input->post('kdkategori'));

			$this->Admin_Model->UpdateKategori($where, $data, 'tb_kategori');

			redirect('kelola-kategori');			

		}




		//Gudang
		public function ToGudang(){

			$data['tb_gudang'] = $this->Admin_Model->getDataGudang()->result_array();
			$jml_data = $this->Admin_Model->getDataGudang()->num_rows()+1;
			$data['kode_gudang'] = 'GD00'.$jml_data;

			if (isset($_GET['id'])) {
				$data['data'] = $this->Admin_Model->getWhereGdg($_GET['id'])->row();
			}
			
			$this->load->view('Admin/Template/Header.php');
			$this->load->view('Admin/Master/Gudang', $data);
			$this->load->view('Admin/Template/Footer.php');			

		}

		public function InsertGudang(){
			
			$data = array(
				'kode_gudang' => $this->input->post('kdgudang'),
				'nama_gudang' => $this->input->post('ngudang') 
			);

			$this->Admin_Model->InsertGudang($data, 'tb_gudang');

			redirect('kelola-gudang');

		}

		public function deleteGdg($id){
			
			$this->Admin_Model->deleteGudang($id);

			redirect('kelola-gudang');

		}

		public function UpdateGudang(){
			
			$data = array(
				'kode_gudang' => $this->input->post('kdgudang'),
				'nama_gudang' => $this->input->post('ngudang') 
			);

			$where = array('kode_gudang' => $this->input->post('kdgudang'));

			$this->Admin_Model->UpdateGudang($where, $data, 'tb_gudang');

			redirect('kelola-gudang');

		}




		//Barang Masuk
		public function ToBarangMasuk(){
			
			$data['br_masuk'] = $this->Admin_Model->getDataBarangMasuk()->result_array();

			if (isset($_GET['id'])) {
				$data['data'] = $this->Admin_Model->getWhereMasuk($_GET['id'])->row();
			}
			
			$this->load->view('Admin/Template/Header.php');
			$this->load->view('Admin/Manage/Barang_Masuk', $data);
			$this->load->view('Admin/Template/Footer.php');

		}

		public function BarangMasuk(){
			
			$jumlah = $this->db->get_where('tb_barang', 
				array('kode_barang' => $this->input->post('kdbrg') 
			))->row();
			
			$data = array(
				'tanggal' => $this->input->post('tgl'),
				'kode_barang' => $this->input->post('kdbrg'),
				'stock' => $this->input->post('nstock')
			);

			$data2 = array(
				'jumlah' => $this->input->post('nstock')+$jumlah->jumlah
			);
			
			$kode_barang = $this->input->post('kdbrg');

			$this->Admin_Model->BarangMasuk($data, 'br_masuk');
			$this->Admin_Model->UpdateBarangMasuk($data2, 'tb_barang', $kode_barang);

			redirect('barang-masuk');

		}

		public function deleteMsk($id){
			
			$this->Admin_Model->deleteMasuk($id);

			redirect('barang-masuk');

		}

		public function UpdateMasuk(){
			
			$data = array(
				'tanggal' => $this->input->post('tgl'),
				'kode_barang' => $this->input->post('kdbrg'),
				'stock' => $this->input->post('nstock')
			);

			$where = array('id_masuk' => $this->input->post('id'));

			$this->Admin_Model->UpdateMasuk($where, $data, 'br_masuk');

			redirect('barang-masuk');

		}




		//Barang Keluar
		public function ToBarangKeluar(){

			$data['br_keluar'] = $this->Admin_Model->getDataBarangKeluar()->result_array();

			if (isset($_GET['id'])) {
				$data['data'] = $this->Admin_Model->getWhereKeluar($_GET['id'])->row();
			}

			$this->load->view('Admin/Template/Header.php');
			$this->load->view('Admin/Manage/Barang_Keluar', $data);
			$this->load->view('Admin/Template/Footer.php');

		}

		public function BarangKeluar(){
			
			$jumlah = $this->db->get_where('tb_barang', 
				array('kode_barang' => $this->input->post('kdbrg') 
			))->row();

			$data = array(
				'tanggal' => $this->input->post('tgl'),
				'kode_barang' => $this->input->post('kdbrg'),
				'kode_gudang' => $this->input->post('kdgdg'),
				'stock' => $this->input->post('nstock')
			);

			$data2 = array(
				'jumlah' => $jumlah->jumlah-$this->input->post('nstock')
			);
			if ($jumlah->jumlah-$this->input->post('nstock') < 0) {
				$this->session->set_flashdata('pesan', 'Tidak bisa!');
				redirect('kelola-permintaan');				
			}else{
				$kode_barang = $this->input->post('kdbrg');

				$this->Admin_Model->BarangKeluar($data, 'br_keluar');

				$this->Admin_Model->UpdateBarangKeluar($data2, 'tb_barang', $kode_barang);

				redirect('kelola-permintaan');
			}

		}

		public function deleteKlr($id){
			
			$this->Admin_Model->deleteKeluar($id);

			redirect('kelola-permintaan');

		}

		public function UpdateKeluar(){
			
			$data = array(
				'tanggal' => $this->input->post('tgl'),
				'kode_barang' => $this->input->post('kdbrg'),
				'kode_gudang' => $this->input->post('kdgdg'),
				'stock' => $this->input->post('nstock')
			);

			$where = array('id_masuk' => $this->input->post('id'));

			$this->Admin_Model->UpdateKeluar($where, $data, 'br_masuk');

			redirect('barang-masuk');

		}

		public function ToOpname(){
			
			$data['tb_opname'] = $this->Admin_Model->getDataOpname()->result_array();

			$this->load->view('Admin/Template/Header.php');
			$this->load->view('Admin/Manage/Laporan', $data);
			$this->load->view('Admin/Template/Footer.php');

		}

	}

 ?>