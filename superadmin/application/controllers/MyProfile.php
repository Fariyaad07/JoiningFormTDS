<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyProfile extends MY_Controller 
{	
	
//Set Common things for this controller*************************************************************
	function __construct()
	{
		$COMMON=array();
		
        parent::__construct();
        $this->COMMON['DB']='tb_admin';
        $this->COMMON['ID_FIELD']='admin_id';
        $this->COMMON['VIEW_CONTROLLER']='myProfile';
		
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
		$this->common_data['default_id_field'] 	=	$this->COMMON['ID_FIELD'];
		$this->common_data['title'] 			= 	'My Profile';
		$this->common_data['heading'] 			= 	'Manage Complete Profile';
		$this->common_data['description'] 		= 	'Basic info, Avator & Password';
		$this->common_data['SITE'] 				= 	$this->siteDetails->SelectSiteDB();
	}
	

	
//Edit View**********************************************************************************	
	public function edit()
	{	
		//Run SelectDB Function which select data from database
		$FIELD='*';
		$CON=$this->COMMON['ID_FIELD'].'="'.$this->session->userdata('admin_session_uid').'"';
		$ORDER=array('field'=>$this->COMMON['ID_FIELD'],'direction'=>'desc');
		$this->common_data['list']=$this->FetchModel->SelectDB($FIELD,$this->COMMON['DB'],$CON,$ORDER);
		
				
		if(empty($this->common_data['list']))
		{
			echo "<script type='text/javascript'>window.history.back();</script>"; die;
		}
		
		
		$this->common_data['view'] 	= 	"Edit";
		$this->template->write_view('header','common/header',$this->common_data);
		$this->template->write_view('leftSidebar','common/leftSidebar',$this->common_data);
		$this->template->write_view('pageBarTitle','common/pageBarTitle',$this->common_data);
		$this->template->write_view('commonMSG','common/commonMSG',$this->common_data);
		//$this->template->write_view('importantButton','common/importantButtonListPage',$this->common_data);
		$this->template->write_view('content','modules/'.$this->COMMON['VIEW_CONTROLLER'].'/edit',$this->common_data);
		//$this->template->write_view('extra','modules/'.$this->COMMON['VIEW_CONTROLLER'].'/extra',$this->common_data);
		$this->template->write_view('mediaManager','common/mediaManager',$this->common_data);
		$this->template->write_view('footer','common/footer',$this->footer_data);
		$this->template->render();
	}
	
//Edit Form Submission User Information	
	public function editSubmitted()
	{
		//Set form validatin rule from back-end
		$this->form_validation->set_rules('admin_name','Name','required|alpha_numeric_spaces');
		$this->form_validation->set_rules('admin_email','Email','required|valid_email');
		
		if($this->input->post('admin_email')!=$this->input->post('admin_email_prev'))
		$this->form_validation->set_rules('admin_email','Email','is_unique[tb_admin.admin_email]');
		
		$this->form_validation->set_rules('admin_contact','Contact Number','min_length[10]|max_length[13]');
		$this->form_validation->set_rules('admin_website','Website Url','valid_url');
		$this->form_validation->set_rules('admin_facebook','Facebook Profile Url','valid_url');
		$this->form_validation->set_rules('admin_instagram','Instagram Profile Url','valid_url');
		$this->form_validation->set_rules('admin_twitter','Twitter Account Url','valid_url');
		$this->form_validation->set_rules('admin_linkedin','LinkedIN Profile Url','valid_url');
		$this->form_validation->set_rules('admin_youtube','Youtube Channel Url','valid_url');
		//Run Validation to Check form validation
		if($this->form_validation->run()) 
		{
			//Set Data into array
			$updateData = array(
					'admin_name' => $this->input->post('admin_name'),
					'admin_email' => $this->input->post('admin_email'),
					'admin_contact' => $this->input->post('admin_contact'),
					'admin_interest' => $this->input->post('admin_interest'),
					'admin_occupation' => $this->input->post('admin_occupation'),
					'admin_website' => $this->input->post('admin_website'),
					'admin_dob' => $this->input->post('admin_dob'),
					'admin_gender' => $this->input->post('admin_gender'),
					'admin_about' => $this->input->post('admin_about',false),
					'admin_address' => $this->input->post('admin_address',false),
					'admin_unique_id_number' => $this->input->post('admin_unique_id_number'),
					'admin_unique_id_type' => $this->input->post('admin_unique_id_type'),
					'admin_facebook' => $this->input->post('admin_facebook'),
					'admin_instagram' => $this->input->post('admin_instagram'),
					'admin_twitter' => $this->input->post('admin_twitter'),
					'admin_linkedin' => $this->input->post('admin_linkedin'),
					'admin_youtube' => $this->input->post('admin_youtube')
			);
			//Run UpdateDB Function which update data into database
			$CON=$this->COMMON['ID_FIELD'].'="'.$this->session->userdata('admin_session_uid').'"';
			$RET_VALUE=$this->EditModel->UpdateDB($this->COMMON['DB'],$updateData,$CON);
			
			if($RET_VALUE==TRUE)
			{
				$this->session->set_userdata('admin_session_email',$this->input->post('admin_email'));
				$this->session->set_userdata('admin_session_name',$this->input->post('admin_name'));			
				//Set Flash Data and Redirect to List/Index Page
				$this->session->set_flashdata('successMSG','Information Successfully Updated.....');
				return redirect(base_url($this->COMMON['VIEW_CONTROLLER'].'/details/'.$this->input->post('id')));
			}
			else
			{
				//Set Flash Data and Redirect to List/Index Page
				$this->session->set_flashdata('errorMSG','Information can not be Updated.....');
				return redirect(base_url($this->COMMON['VIEW_CONTROLLER'].'/edit/'.$this->input->post('id')));
			}
		}
		else
		{
			//If validation error
			//Set Flash Data and Redirect to List/Index Page
			$this->session->set_flashdata('errorMSG',validation_errors());
			return redirect(base_url($this->COMMON['VIEW_CONTROLLER'].'/edit#tab_1_1'));
		}
	}
	
//Edit Form Submission Avator/Profile Picture Change	
	public function editAvatorSubmitted()
	{
		//Set form validatin rule from back-end
		$this->form_validation->set_rules('admin_image','Image Field','required');
		//Run Validation to Check form validation
		if($this->form_validation->run()) 
		{
			//Set Data into array
			$updateData = array(
					'admin_image' => $this->input->post('admin_image')
			);
			//Run UpdateDB Function which update data into database
			$CON=$this->COMMON['ID_FIELD'].'="'.$this->session->userdata('admin_session_uid').'"';
			$RET_VALUE=$this->EditModel->UpdateDB($this->COMMON['DB'],$updateData,$CON);
			
			if($RET_VALUE==TRUE)
			{
				$this->session->set_userdata('admin_session_image',$this->input->post('admin_image'));
				//Set Flash Data and Redirect to List/Index Page
				$this->session->set_flashdata('successMSG','Information Successfully Updated.....');
				return redirect(base_url($this->COMMON['VIEW_CONTROLLER'].'/details/'.$this->input->post('id')));
			}
			else
			{
				//Set Flash Data and Redirect to List/Index Page
				$this->session->set_flashdata('errorMSG','Profile Picture changed successfully.....');
				return redirect(base_url($this->COMMON['VIEW_CONTROLLER'].'/edit/'.$this->input->post('id')));
			}
		}
		else
		{
			//If validation error
			//Set Flash Data and Redirect to List/Index Page
			$this->session->set_flashdata('errorMSG',validation_errors());
			return redirect(base_url($this->COMMON['VIEW_CONTROLLER'].'/edit#tab_1_2'));
		}
	}
	
//Edit Form Submission Password Change	
	public function editPasswordSubmitted()
	{
		//Set form validatin rule from back-end
		$this->form_validation->set_rules('admin_current_password','Current Password','required');
		$this->form_validation->set_rules('admin_password','New Password','required|min_length[8]');
		$this->form_validation->set_rules('admin_password_recovery','Re-type Password','required|min_length[8]');
		//Run Validation to Check form validation
		if($this->form_validation->run()) 
		{			
			if(sha1(sha1(sha1($this->input->post('admin_current_password'))))==$this->session->userdata('admin_session_password'))
			{
				if($this->input->post('admin_password')==$this->input->post('admin_password_recovery'))
				{
					//Set Data into array
					$updateData = array(
							'admin_password' => sha1(sha1(sha1($this->input->post('admin_password')))),
							'admin_password_recovery' => $this->input->post('admin_password_recovery')
					);
					//Run UpdateDB Function which update data into database
					$CON=$this->COMMON['ID_FIELD'].'="'.$this->session->userdata('admin_session_uid').'"';
					$RET_VALUE=$this->EditModel->UpdateDB($this->COMMON['DB'],$updateData,$CON);

					if($RET_VALUE==TRUE)
					{
						$this->session->set_userdata('admin_session_password',$this->input->post('admin_password_recovery'));
						
						//Set Flash Data and Redirect to List/Index Page
						$this->session->set_flashdata('successMSG','Password changed successfully.....');
						return redirect(base_url($this->COMMON['VIEW_CONTROLLER'].'/details/'.$this->input->post('id')));

						//return redirect(base_url('login/logout'));
					}
					else
					{
						//Set Flash Data and Redirect to List/Index Page
						$this->session->set_flashdata('errorMSG','Information can not be Updated.....');
						return redirect(base_url($this->COMMON['VIEW_CONTROLLER'].'/edit/'.$this->input->post('id')));
					}
				}
				else
				{
					//If New Password and Re-type password did not match
					//Set Flash Data and Redirect to List/Index Page
					$this->session->set_flashdata('errorMSG','New Password and Re-type password did not match.....');
					return redirect(base_url($this->COMMON['VIEW_CONTROLLER'].'/edit#tab_1_3'));
				}
			}
			else
			{
				//If Current Password Invalid
				//Set Flash Data and Redirect to List/Index Page
				$this->session->set_flashdata('errorMSG','Current password did not match.....');
				return redirect(base_url($this->COMMON['VIEW_CONTROLLER'].'/edit#tab_1_3'));
			}
		}
		else
		{
			//If validation error
			//Set Flash Data and Redirect to List/Index Page
			$this->session->set_flashdata('errorMSG',validation_errors());
			return redirect(base_url($this->COMMON['VIEW_CONTROLLER'].'/edit#tab_1_3'));
		}
	}
	
	
	
	
	
	

	
	
//Details View**********************************************************************************	
	public function details()
	{	
		//Run SelectDB Function which select data from database
		$FIELD='*';
		$CON=$this->COMMON['ID_FIELD'].'="'.$this->session->userdata('admin_session_uid').'"';
		$ORDER=array('field'=>$this->COMMON['ID_FIELD'],'direction'=>'desc');
		$this->common_data['list']=$this->FetchModel->SelectDB($FIELD,$this->COMMON['DB'],$CON,$ORDER);
		
		if(empty($this->common_data['list']))
		{
			echo "<script type='text/javascript'>window.history.back();</script>"; die;
		}
		
		
		$this->common_data['view'] 	= 	"Details View";
		$this->template->write_view('header','common/header',$this->common_data);
		$this->template->write_view('leftSidebar','common/leftSidebar',$this->common_data);
		$this->template->write_view('pageBarTitle','common/pageBarTitle',$this->common_data);
		$this->template->write_view('commonMSG','common/commonMSG',$this->common_data);
		//$this->template->write_view('importantButton','common/importantButtonListPage',$this->common_data);
		$this->template->write_view('content','modules/'.$this->COMMON['VIEW_CONTROLLER'].'/details',$this->common_data);
		//$this->template->write_view('extra','modules/'.$this->COMMON['VIEW_CONTROLLER'].'/extra',$this->common_data);
		$this->template->write_view('mediaManager','common/mediaManager',$this->common_data);
		$this->template->write_view('footer','common/footer',$this->footer_data);
		$this->template->render();
	}
	
}
