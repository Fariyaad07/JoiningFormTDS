<?php
class InitHook 
{
	
	var $CI;
	
	function __construct()
	{
		$this->CI = NULL;
	}

	
	/*function InitHook()
	{
		//echo "<br>This is Hook Constructor 22222222";
	}*/
	

	function loadCustomCommonFunctions()
	{
		require_once(APPPATH.'third_party/functions.php');
	}
	
	function initPreController()
	{
	}
	
	function initPostController()
	{
		$this->CI =& get_instance();
		$this->setTemplateData();
	}
	
		
	function setTemplateData()
	{   
		if($this->CI)
		{
			$this->CI->footer_data['copyright'] 	= 'This Panel is copyrighted by INTELGC Solutions Pvt. Ltd.';		
			$this->CI->header_data['title']	= '';
			$this->CI->topmenu_data['pendingQueries'] 	= 	0;
			$this->CI->template->set_template('single');
		}	
	}
}
?>