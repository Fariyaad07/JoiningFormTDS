<?php
	class Application_model extends CI_Model {
		
		public function getApplications($from = null, $to = null, $status = null, $client = null)
		{
			$this->db->select('*');
			$this->db->from('tb_application');
			
			if (!empty($from)) {
				$this->db->where('DATE(application_creation_date) >=', $from);
			}
			
			if (!empty($to)) {
				$this->db->where('DATE(application_creation_date) <=', $to);
			}
			
			if (!empty($status)) {
				$this->db->where('application_status', $status);
			}
			
			if (!empty($client)) {
				$this->db->where('application_client_name', $client);
			}
			
			return $this->db->get()->result();
		}
		
		
	}	