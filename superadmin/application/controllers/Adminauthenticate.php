<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Adminauthenticate extends CI_Controller {
		
		public function index()
		{
			$this->load->view('application/login');
		}
		
		public function loginCheck()
		{
			$admin_id = $this->input->post('admin_id');
			$password = $this->input->post('password');
			
			// Fetch admin from DB
			$this->db->where('admin_id', $admin_id);
			$admin = $this->db->get('tb_admin')->row_array();
			if($admin){
				
				if($admin['admin_password_recovery'] == $password){
					
					$this->session->set_userdata($admin);
					redirect(site_url('index.php/application'));
					
					} else {
					echo "<script>
                    alert('Wrong Password');
                    window.history.back();
					</script>";
				}
				
				} else {
				echo "<script>
                alert('Admin ID not found');
                window.history.back();
				</script>";
			}
		}
	}	