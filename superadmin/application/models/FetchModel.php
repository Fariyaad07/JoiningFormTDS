<?php
class FetchModel extends CI_Model
{
//For Single Table *********************************************************************************
	public function SelectDB($FIELD,$DB,$CON='',$ORDER='')
	{
		$this->db->select($FIELD);
		$this->db->from($DB);
	

		/*if($this->db->field_exists('createdOn', $DB))
		$this->db->where('createdOn between "'.$this->session->userdata('start_date').'" and "'.$this->session->userdata('end_date').'"');*/


		if(!empty($CON))
		$this->db->where($CON);

		
		if(!empty($ORDER))
		$this->db->order_by($ORDER['field'], $ORDER['direction']);

		
		//$resultObject=$this->db->get_compiled_select();
		//echo $resultObject; die;
		

		$resultObject=$this->db->get();
		$result=$resultObject->result_array();
		return $result;
	}

	

	//Data Group by
	public function SelectDBGroupBy($FIELD,$DB,$CON='',$ORDER='',$GROUP='')
	{
		//Run Query
		$this->db->select($FIELD);
		$this->db->from($DB);
		
		
		/*if($this->db->field_exists('createdOn', $DB))
		$this->db->where('createdOn between "'.$this->session->userdata('start_date').'" and "'.$this->session->userdata('end_date').'"');*/


		if(!empty($CON))
		$this->db->where($CON);

		
		if(!empty($ORDER))
		$this->db->order_by($ORDER['field'], $ORDER['direction']);
		
		
		if(!empty($GROUP))
		$this->db->group_by($GROUP);

		
		//$resultObject=$this->db->get_compiled_select();
		//echo $resultObject; die;


		$resultObject=$this->db->get();
		$result=$resultObject->result_array();
		return $result;
	}


	
	
	
	
	
	
	
//For Joining Table *********************************************************************************
	//Fetch Data
	public function SelectJoinDB($FIELD,$DB,$JOIN=array(),$CON='',$ORDER=array(),$AUTH=1)
	{
		//Run Query
		$this->db->select($FIELD);
		$this->db->from($DB);


		if(!empty($JOIN))
			foreach($JOIN as $JOIN_VALUE)
				$this->db->join($JOIN_VALUE['table'], $JOIN_VALUE['join_key']);


		/*if ($this->db->field_exists('createdOn', $DB))
		$this->db->where($DB.'.createdOn between "'.$this->session->userdata('start_date').'" and "'.$this->session->userdata('end_date').'"');*/

		
		if(!empty($CON))
		$this->db->where($CON);

		
		if(!empty($ORDER))
		$this->db->order_by($ORDER['field'], $ORDER['direction']);

		
		//$resultObject=$this->db->get_compiled_select();
		//echo $resultObject; die;


		$resultObject=$this->db->get();
		$result=$resultObject->result_array();
		return $result;
	}
}