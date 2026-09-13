<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends MY_Controller
{
	
//Set Common things for this controller*************************************************************
	//Set Page Details
	public function pageDetails($view="Login")
	{
		//Load Site Details Model
		$this->load->model('siteDetails');
		$SITE_DETAILS['SITE']=$this->siteDetails->SelectSiteDB();
			
		$PAGE = array('title' => 'Administrative User Login','heading' => 'Login to your panel','description' => 'Manage this system','view' => $view);
		
		return array_merge($SITE_DETAILS,$PAGE);
	}
	
//Index or Login View
	public function index()
	{
		$COOKIE=array('cookie_email'=>get_cookie('admin_email'),'cookie_password'=>get_cookie('admin_password'),'cookie_remember'=>get_cookie('admin_remember'));
		
		$this->template->write_view('content','modules/authenticate/login',array_merge($this->pageDetails(),$COOKIE));
		$this->template->render();
	}

//Login Submission
	public function loginSubmitted()
	{
		//Set form validatin rule from back-end
		$this->form_validation->set_rules('admin_email','Email','required');
		$this->form_validation->set_rules('admin_password','Password','required|min_length[8]');
		//Run Validation to Check form validation
		if($this->form_validation->run())
		{
			//Get Form Value
			$admin_email=$this->input->post('admin_email');
			$admin_password=sha1(sha1(sha1($this->input->post('admin_password'))));
			//Load Admin Login Model
			$this->load->model('AdminLogin');
			//Run authentication Function which return admin_id and admin_upload_dir_id if Admin authorized
			$admin_details=$this->AdminLogin->authenticate($admin_email,$admin_password);
			if(!empty($admin_details['admin_id'])) //Check user authentication 
			{
				//Set User Login Session Data
				$this->session->set_userdata('admin_session_uid',$admin_details['admin_id']);
				$this->session->set_userdata('admin_session_dir',$admin_details['admin_upload_dir_id']);
				$this->session->set_userdata('admin_session_email',$admin_email);
				$this->session->set_userdata('admin_session_password',$admin_password);
				$this->session->set_userdata('admin_session_image',$admin_details['admin_image']);
				$this->session->set_userdata('admin_session_name',$admin_details['admin_name']);
				$this->session->set_userdata('admin_session_login',TRUE);
				
				//Load Site Details Model and set report date range
				$this->load->model('siteDetails');
				$SITE_DETAILS['SITE']=$this->siteDetails->SelectSiteDB();
				$this->session->set_userdata('start_date',$SITE_DETAILS['SITE'][0]['site_report_start_date']);
				$this->session->set_userdata('end_date',$SITE_DETAILS['SITE'][0]['site_report_end_date']);
				
				if($this->input->post('admin_remember_me'))
				{
					$cookie_email = array(
						'name'   => 'admin_email',
						'value'  => $admin_email,
						'expire' => '1209600'  // Two weeks
					);
					set_cookie($cookie_email);
					
					$cookie_password = array(
						'name'   => 'admin_password',
						'value'  => $this->input->post('admin_password'),
						'expire' => '1209600'  // Two weeks
					);
					set_cookie($cookie_password);
					
					$cookie_remember = array(
						'name'   => 'admin_remember',
						'value'  => 1,
						'expire' => '1209600'  // Two weeks
					);
					set_cookie($cookie_remember);
				}
				else
				{
					delete_cookie('admin_email');
					delete_cookie('admin_password');
					delete_cookie('admin_remember');
				}
				
				$this->session->set_flashdata('successMSG','Successfully Loged in');
				
				if(!$this->session->userdata('redirect_session_url'))
				{
					//Redirect to dashboard Page
					return redirect(base_url('dashboard'));
				}
				else
				{
					//Redirect to previous Page
					return redirect($this->session->userdata('redirect_session_url'));
				}
			}
			else
			{
				//If user credential is not authenticate then set error message and load login page view again
				$this->session->set_flashdata('errorMSG','Invalid Email or Password');
				return redirect(base_url('authenticate'));
			}
		}
		else
		{
			//If form validation error then load login page view again
			$this->session->set_flashdata('errorMSG',validation_errors());
			return redirect(base_url('authenticate'));
		}
	}

//Logout Submission
	public function logout()
	{
		$this->session->unset_userdata('admin_session_uid');
		$this->session->unset_userdata('admin_session_dir');
		$this->session->unset_userdata('admin_session_email');
		$this->session->unset_userdata('admin_session_password');
		$this->session->unset_userdata('admin_session_image');
		$this->session->unset_userdata('admin_session_name');
		$this->session->unset_userdata('admin_session_role');
		$this->session->unset_userdata('admin_session_login');
		$this->session->unset_userdata('redirect_session_url');
		$this->session->unset_userdata('start_date');
		$this->session->unset_userdata('end_date');
		return redirect(base_url('authenticate'));
	}

	
	
	
	
	
	
	
	
	
	
//Lock Profile View
	public function lockProfile()
	{
		$this->template->write_view('content','modules/authenticate/lockProfile',$this->pageDetails('Locked Profile'));
		$this->template->render();
	}
	
//Lock Profile Locked Submission
	public function lockProfileLockedSubmitted()
	{
		$this->session->unset_userdata('admin_session_login');
		return redirect(base_url('authenticate/lockProfile'));
	}
	
//Lock Profile UNLocked Submission
	public function lockProfileUnlockedSubmitted()
	{
		if(sha1(sha1(sha1($this->input->post('check_password'))))==$this->session->userdata('admin_session_password'))
		{
			$this->session->set_userdata('admin_session_login',TRUE);
			//Redirect to previous Page
			return redirect($this->session->userdata('redirect_session_url'));
		}
		else
		{
			$this->session->set_flashdata('errorMSG','Password did not match....');
			return redirect(base_url('authenticate/lockProfile'));
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
//Forget Password View
	public function forgetPassword()
	{
		$this->template->write_view('content','modules/authenticate/forgetPassword',$this->pageDetails('Forget Password'));
		$this->template->render();
	}

//Forget Password Submission
	public function forgetPasswordSubmitted()
	{
		//Set form validatin rule from back-end
		$this->form_validation->set_rules('admin_email','Email','required|valid_email');
		//Run Validation to Check form validation
		if($this->form_validation->run())
		{
			//Get Form Value
			$admin_email=$this->input->post('admin_email');
			//Load Fetch Model Model
			$this->load->model('FetchModel');
			//Run to check email id exist or not
			//Run SelectDB Function which select data from database
			$FIELD='*';
			$CON='IsDel="0" and admin_email="'.$admin_email.'"';
			$ORDER=array();
			$RET_VALUE['list']=$this->FetchModel->SelectDB($FIELD,'tb_admin',$CON,$ORDER);
			if($RET_VALUE['list'][0]['admin_id'])
			{
				//Reset & Set OTP and EMAIL in Session for Check OTP and RESET Password
				$this->session->unset_userdata('admin_session_login');
				$this->session->unset_userdata('redirect_session_url');
				$this->session->set_userdata('admin_password_reset_otp',rand(000000,999999));
				$this->session->set_userdata('admin_password_reset_email',$admin_email);
				
				//Send OTP and reset link to email
				//Load Site Details Model
				$this->load->model('siteDetails');
				$SITE_DETAILS['SITE']=$this->siteDetails->SelectSiteDB();
				
				$config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'iso-8859-1';
                $config['wordwrap'] = TRUE;
                
                $this->email->initialize($config);
                
				$this->email->from($SITE_DETAILS['SITE'][0]['site_email'], $SITE_DETAILS['SITE'][0]['site_name']);
				$this->email->to($admin_email);
				$this->email->subject('Reset Password Email');
				$this->email->message('Password reset OTP is '.$this->session->userdata('admin_password_reset_otp'));
				$this->email->send();
				
				$this->session->set_flashdata('successMSG','OTP Send to your email successfully');
				
				
				//Redirect to Password Reset Page
				return redirect(base_url('authenticate/resetPassword'));
			}
			else
			{
				//If user credential is not authenticate then set error message and load forget Password page view again
				$this->session->set_flashdata('errorMSG','Invalid Email ID');
				return redirect(base_url('authenticate/forgetPassword'));
			}
		}
		else
		{
			//If form validation error then load login page view again
			$this->session->set_flashdata('errorMSG',validation_errors());
			return redirect(base_url('authenticate/forgetPassword'));
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
//Reset Password View
	public function resetPassword()
	{
		$this->template->write_view('content','modules/authenticate/resetPassword',$this->pageDetails('Reset Password'));
		$this->template->render();
	}

//Reset Password Submission
	public function resetPasswordSubmitted()
	{
		//Set form validatin rule from back-end
		$this->form_validation->set_rules('reset_password_otp','OTP','required|min_length[6]');
		$this->form_validation->set_rules('admin_password','New Password','required|min_length[8]');
		$this->form_validation->set_rules('admin_password_recovery','Re-type Password','required|min_length[8]');
		//Run Validation to Check form validation
		if($this->form_validation->run()) 
		{			
			if($this->input->post('reset_password_otp')==$this->session->userdata('admin_password_reset_otp'))
			{
				if($this->input->post('admin_password')==$this->input->post('admin_password_recovery'))
				{
					//Load Edit Model 
					$this->load->model('EditModel');
					//Set Data into array
					$updateData = array(
							'admin_password' => sha1(sha1(sha1($this->input->post('admin_password')))),
							'admin_password_recovery' => $this->input->post('admin_password_recovery')
					);
					//Run UpdateDB Function which update data into database
					$CON='IsDel="0" and admin_email="'.$this->session->userdata('admin_password_reset_email').'"';
					$RET_VALUE=$this->EditModel->UpdateDB('tb_admin',$updateData,$CON);

					if($RET_VALUE==TRUE)
					{
						//Clear OTP and Email From Session
						$this->session->unset_userdata('admin_session_login');
						$this->session->unset_userdata('redirect_session_url');
						//Set Flash Data and Redirect to List/Index Page
						$this->session->set_flashdata('successMSG','Password changed successfully.....');
						return redirect(base_url('authenticate'));

						//return redirect(base_url('authenticate/logout'));
					}
					else
					{
						//Set Flash Data and Redirect to List/Index Page
						$this->session->set_flashdata('errorMSG','Information can not be Updated.....');
						return redirect(base_url('authenticate/resetPassword'));
					}
				}
				else
				{
					//If New Password and Re-type password did not match
					//Set Flash Data and Redirect to List/Index Page
					$this->session->set_flashdata('errorMSG','New Password and Re-type password did not match.....');
					return redirect(base_url('authenticate/resetPassword'));
				}
			}
			else
			{
				//If Current Password Invalid
				//Set Flash Data and Redirect to List/Index Page
				$this->session->set_flashdata('errorMSG','OTP did not match.....');
				return redirect(base_url('authenticate/resetPassword'));
			}
		}
		else
		{
			//If validation error
			//Set Flash Data and Redirect to List/Index Page
			$this->session->set_flashdata('errorMSG',validation_errors());
			return redirect(base_url('authenticate/resetPassword'));
		}
	}
}
