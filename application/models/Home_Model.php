<?php 

	class Home_Model extends CI_Model{
		
		public function Login($data){
			
			return $this->db->get_where('tb_user', $data);

		}

	}

 ?>