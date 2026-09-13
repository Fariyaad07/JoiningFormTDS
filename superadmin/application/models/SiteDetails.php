<?php
class SiteDetails extends CI_Model
{
//For Site Table *********************************************************************************
	public function SelectSiteDB()
	{
		$FIELD='*';
		$DB='tb_site';
		$CON='site_id="site_67889"';

		//Run Query
		$this->db->select($FIELD);
		$this->db->from($DB);
		$this->db->where($CON);
		$resultObject=$this->db->get();

		$result=$resultObject->result_array();
		return $result;
	}
}