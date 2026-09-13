<?php
class Admin_model extends CI_Model {

    public function check_login($admin_id, $password) {
        $this->db->where('admin_id', $admin_id);
        $this->db->where('admin_password', $password);
        $query = $this->db->get('tb_admin');

        return $query->row();
    }
}