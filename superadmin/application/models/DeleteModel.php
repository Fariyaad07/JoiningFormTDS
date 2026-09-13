<?php
class DeleteModel extends CI_Model
{
	public function DeleteDB($DB,$CON='')
	{
		if(!empty($CON))
			$this->db->where($CON);

		if($this->db->delete($DB))
			return TRUE;
		else
			return FALSE;
	}
}