<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Client extends CI_Controller
	{
		private function checkSuperAdmin()
		{
			$admin_role = $this->session->userdata('admin_role');
			if($admin_role != 'Super Admin'){
				show_error(
				'Only Super Admin Can Access'
				);
			}
		}
		
		public function index()
		{
			$this->checkSuperAdmin();
			$data['clients'] = $this->db
            ->where('isDel', '0')
			->where('admin_id','adm1234567892')
			->order_by('client_name', 'asc')
            ->get('tb_client')
            ->result();
			
			$this->load->view('application/client', $data);
		}
		
		// SAVE CLIENT
		public function save()
		{
			$this->checkSuperAdmin();
			$name = $this->input->post('client_name');
			
			if (!empty($name)) {
				
				// prevent duplicate
				$exists = $this->db->get_where('tb_client', ['client_name' => $name])->row();
				
				if (!$exists) {
					$this->db->insert('tb_client', [
					'client_name' => $name,
					'admin_id' => 'adm1234567892', // dynamic
					'IsDel' => '0'
					]);
				}
			}
			
			redirect('client');
		}
		
		// DELETE CLIENT
		public function delete($id)
		{
			$this->checkSuperAdmin();
			$this->db->where('client_id', $id);
			$this->db->update('tb_client', ['isDel' => 1]);
			
			redirect('client');
		}
	}
