<?php
class AddModel extends CI_Model
{
	public function InsetDB($DB,$insertData)
	{
		if ($this->db->field_exists('createdOn', $DB))
			$creation=array('createdOn'=>date('Y-m-d H:i:s'));
		else
			$creation=array();

		
		$insertData=array_merge($insertData,$creation);
		if($this->db->insert($DB, $insertData))
			return TRUE;
		else
			return FALSE;
	}
	
	
	public function selectRow($ref_no) {
	    $this->db->select('employee_ref_no');
$this->db->from('tb_employee');
$this->db->where('employee_ref_no', $ref_no);
$query = $this->db->get();
	    
	}
	
		public function updateValue($ref_no, $insertData) {
	  	    $this->db->set('employee_ref_no', $ref_no);
$this->db->where('employee_ref_no', $ref_no);
$this->db->update('tb_employee', $insertData);
	    
	    
	}
	
}