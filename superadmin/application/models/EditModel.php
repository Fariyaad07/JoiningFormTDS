<?php
class EditModel extends CI_Model
{
	public function UpdateDB($DB,$updateData,$CON='')
	{		
		if ($this->db->field_exists('modifiedOn', $DB))
			$modification=array('modifiedOn'=>date('Y-m-d H:i:s'));
		else
			$modification=array();
		
		//Run Update Query to Update Data into database
		if(!empty($CON))
			$this->db->where($CON);

		$updateData=array_merge($updateData,$modification);
		if($this->db->update($DB, $updateData))
			return TRUE;
		else
			return FALSE;
	}
}