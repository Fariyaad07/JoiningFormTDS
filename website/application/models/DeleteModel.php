<?php

class DeleteModel extends CI_Model

{

	public function DeleteDB($DB,$CON='')

	{

		//Run Delete Query to Delete Data from database

		if(!empty($CON))

			$this->db->where($CON);



		if($this->db->delete($DB))

			return TRUE;

		else

			return FALSE;

	}

}