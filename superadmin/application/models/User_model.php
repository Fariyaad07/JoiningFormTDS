<?php
	class User_model extends CI_Model {
		
		public function insertUser($data) {
			return $this->db->insert('tb_user', $data);
		}
		
		public function getUserById($user_id)
		{
			return $this->db
			->where('user_id', $user_id)
			->where('isDel', '0')
			->get('tb_user')
			->row_array();
		}
	}	