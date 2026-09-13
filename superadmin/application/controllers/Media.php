<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends MY_Controller 
{	
	
//Set Common things for this controller*************************************************************
	public $COMMON=array();
	
	function  __construct() {
        parent::__construct();
        $this->COMMON['VIEW_CONTROLLER']='media';
		
		//Load Site Details Model
		$this->load->model('siteDetails');
		//Load Add Model
		$this->load->model('AddModel');
		//Load Edit Model
		$this->load->model('EditModel');
		//Load Fetch Model
		$this->load->model('FetchModel');
		//Load Delete Model
		$this->load->model('DeleteModel');
		
		$this->initData();
	}
	

//Initialize Common Details
	private function initData()
	{
		$this->common_data['view_controller'] 	= 	$this->COMMON['VIEW_CONTROLLER'];
		$this->common_data['title'] 			= 	'Media';
		$this->common_data['heading'] 			= 	'Manage Data';
		$this->common_data['description'] 		= 	'Manage info in an effective way.';
		$this->common_data['SITE'] 				= 	$this->siteDetails->SelectSiteDB();
		$this->common_data['THIS'] 				= 	$this;
	}	
	

	
	
	
	
	
	
	
//Index or List View**********************************************************************************
	public function index()
	{
		
		//Load View
		$this->common_data['view'] 	= 	"Media Manager";
		$this->template->write_view('header','common/header',$this->common_data);
		$this->template->write_view('leftSidebar','common/leftSidebar',$this->common_data);
		$this->template->write_view('pageBarTitle','common/pageBarTitle',$this->common_data);
		$this->template->write_view('content','modules/'.$this->COMMON['VIEW_CONTROLLER'].'/index',$this->common_data);
		$this->template->write_view('footer','common/footer',$this->footer_data);
		$this->template->render();
	}
	

	
	
	
	
	
	
	
//Browser View**********************************************************************************
	public function browser()
	{
		//Load View
		$this->common_data['view'] 	= 	"Media Browser";
		$this->template->write_view('header','common/header',$this->common_data);
		$this->template->write_view('content','modules/'.$this->COMMON['VIEW_CONTROLLER'].'/browser',$this->common_data);
		$this->template->write_view('footer','common/footer',$this->footer_data);
		$this->template->render();
	}
}
