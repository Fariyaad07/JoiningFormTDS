<?php

class AddModel extends CI_Model

{

	public function InsetDB($DB,$insertData)

	{
	

		if ($this->db->field_exists('date', $DB))

			$creation=array('date'=>date('Y-m-d'));

		else

			$creation=array();

		

		$insertData=array_merge($insertData,$creation);

		

		//Run Insert Query to insert into database

		if($this->db->insert($DB, $insertData))

			return TRUE;

		else

			return FALSE;

	}

}