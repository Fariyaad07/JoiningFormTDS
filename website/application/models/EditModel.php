<?php

class EditModel extends CI_Model

{

	public function UpdateDB($DB,$updateData,$CON='')

	{		

		//Run Update Query to Update Data into database

		if(!empty($CON))

			$this->db->where($CON);

		

		if($this->db->update($DB, $updateData))

			return TRUE;

		else

			return FALSE;

	}

}