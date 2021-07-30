<?php 

	class Home extends CI_Controller{
		
		public function ToLogin(){

			$this->load->view('Login');

		}

		public function Login(){

			$data = array(
				'username' => $this->input->post('username'), 
				'password' => sha1($this->input->post('password'))
			);

			$cek = $this->Home_Model->Login($data)->num_rows();

			if ($cek > 0) {
				
				$user = $this->Home_Model->Login($data)->row();

				if ($user->status === '0') {
					
					$data_session = array(
						'username' => $data['user'],
						'status' => "login"
						 );

					$this->session->set_userdata($data_session);

					redirect('admin-dashboard');

				} elseif ($user->status === '1') {
					
					$data_session = array(
						'username' => $data['user'],
						'status' => "login"
						 );

					$this->session->set_userdata($data_session);

					redirect('operator-dashboard');

				} else {
					
					echo "gagal";

				}

			} else {

				echo "gagal";

			}
		}
	}

 ?>