<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Page extends MY_Controller 
	{	
		public $common_data = array();
		
		public function __construct()
		{
			error_reporting(0);
			ini_set('display_errors', 0);
			parent::__construct();
		}
		
		//SignUp Page*********************************************************************************
		
		public function signup() {
			
			$this->load->view('modules/signup');
		}
		
		public function register() {
			
			$this->load->model('User_model');
			
			$firstName = trim($this->input->post('first_name') ?? '');
			$lastName  = trim($this->input->post('last_name') ?? '');
			$email     = trim($this->input->post('email') ?? '');
			$contact   = trim($this->input->post('contact') ?? '');
			
			// Check duplicate email
			$emailExists = $this->db
			->where('user_email_id', $email)
			->get('tb_user')
			->row();
			
			if ($emailExists) {
				$this->session->set_flashdata('errorMSG', 'Email already exists');
				return redirect($_SERVER['HTTP_REFERER']);
			}
			
			// Check duplicate phone number
			$phoneExists = $this->db
			->where('user_contact_number', $contact)
			->get('tb_user')
			->row();
			
			if ($phoneExists) {
				$this->session->set_flashdata('errorMSG', 'Phone number already exists');
				return redirect($_SERVER['HTTP_REFERER']);
				return;
			}
			
			
			
			$data = [
			'first_name'          => $firstName,
			'last_name'           => $lastName,
			'user_name'           => trim($firstName . ' ' . $lastName),
			'user_email_id'       => $email,
			'user_contact_number' => $contact,
			'user_password'       => $this->input->post('password'),
			'user_creation_date'  => date('Y-m-d H:i:s'),
			'user_verified'       => '1',
			'user_password_reset_salt' => '0',
			'user_lastname'       => $lastName,
			'user_session'        => date('Y'),
			'isDel'               => '0'
			];
			
			$inserted = $this->User_model->insertUser($data);
			
			if ($inserted) {
				
				redirect('signin');
				
				} else {
				
				echo "Insert Failed";
			}
		}
		
		public function forgotpassword() {
			
			$this->load->view('modules/forgotpassword');
		}
		
		public function resetpassword() {
			
			$this->load->view('modules/resetpassword');
		}
		
		public function resetCheck() {
			$this->load->model('User_model');
			
			$password = $this->input->post('password');
			
			if($this->session->userdata('forgot_password') == 'email') {
				$email = $this->session->userdata('user_email_id');
				$this->db->where('user_email_id', $email);
				$this->db->where('isDel', '0');
				$this->db->update('tb_user', ['user_password' => $password]);
				$this->session->set_flashdata('successMSG', 'User password change successfully. Please login');
				return redirect(front_base_url("signin"));
			}
			
			if($this->session->userdata('forgot_password') == 'mobile') {
				$mobile = $this->db->where('user_email_id', $mobile);
				$this->db->where('user_contact_number', $mobile);
				$this->db->where('isDel', '0');
				$this->db->update('tb_user', ['user_password' => $password]);
				$this->session->set_flashdata('successMSG', 'User password change successfully. Please login');
				return redirect(front_base_url("signin"));
			}
			
		}
		
		public function forgotCheck() {
			$this->load->model('User_model');
			
			$email = $this->input->post('email');
			$mobile    = $this->input->post('mobile');
			
			if($email) {
				$this->db->where('user_email_id', $email);
				$this->db->where('isDel', '0');
				$user = $this->db->get('tb_user')->row();
				if ($user) {
					// Send email here
					$subject = "Password Reset";
					$message = "Your new password is: ".$user->user_password;
					$this->load->library('email');
					
					
					
					$config = array(
					'protocol'    => 'smtp',
					'smtp_host'   => 'smtp.gmail.com',
					'smtp_port'   => 587,
					'smtp_user'   => 'prabhakarpuransh@gmail.com',
					'smtp_pass'   => 'cxge rrpc nnec dkjk',
					'smtp_crypto' => 'tls',
					'mailtype'    => 'html',
					'charset'     => 'utf-8',
					'newline'     => "\r\n",
					'crlf'        => "\r\n"
					);
					
					$this->email->initialize($config);
					
					$this->email->from('prabhakarpuransh@gmail.com', 'TDS Group');
					$this->email->to($email);
					
					$this->email->subject($subject);
					$this->email->message($message);
					
					if ($this->email->send()) {
						//echo 'Email Sent';
						} else {
						echo $this->email->print_debugger();
						die;
					}
					$this->session->set_flashdata(
					'successMSG',
					'Password sent successfully to your email.'
					);
					return redirect(front_base_url("signin"));
					} else {
					$this->session->set_flashdata('errorMSG', 'User Not Found');
					return redirect($_SERVER['HTTP_REFERER']);
				}
			}
			
			if($mobile) {
				$this->db->where('user_contact_number', $mobile);
				$this->db->where('isDel', '0');
				$user = $this->db->get('tb_user')->row();
				if ($user) {
					$session_data = [
					'user_contact_number'   => $mobile,
					'forgot_password' => 'mobile'
					];
					$this->session->set_userdata($session_data);
					$this->session->set_flashdata('successMSG', 'User verified. Please reset password');
					redirect(front_base_url("page/resetpassword"));
					} else {
					$this->session->set_flashdata('errorMSG', 'User Not Found');
					return redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}
		
		//SignIn Page*********************************************************************************
		
		public function signin() {
			$this->load->view('modules/signin'); // ✅ changed here
		}
		
		public function loginCheck() {
			
			$this->load->model('User_model');
			
			$login_input = $this->input->post('email'); // email OR mobile
			$password    = $this->input->post('password');
			
			// Fetch user by email OR mobile
			$this->db->group_start();
			$this->db->where('user_email_id', $login_input);
			$this->db->or_where('user_contact_number', $login_input);
			$this->db->group_end();
			
			$this->db->where('isDel', '0');
			
			$user = $this->db->get('tb_user')->row();
			
			if ($user) {
				
				// Password check (⚠️ currently plain text)
				if ($password == $user->user_password) {
					
					$session_data = [
					'user_id'   => $user->user_id,
					'user_name' => $user->user_name,
					'logged_in' => TRUE
					];
					
					$this->session->set_userdata($session_data);
					
					redirect(front_base_url("userdashboard"));
					
					} else {
					$this->session->set_flashdata('errorMSG', 'Wrong Password');
					return redirect($_SERVER['HTTP_REFERER']);
				}
				
				} else {
				$this->session->set_flashdata('errorMSG', 'User Not Found');
				return redirect($_SERVER['HTTP_REFERER']);
			}
		}
		
		//Userdashboard Page*********************************************************************************
		
		public function userdashboard() {
			
			if(!$this->session->userdata('logged_in')) {
				return redirect(front_base_url("signin"));
			}
			$this->load->model('User_model');
			$user_id = $this->session->userdata('user_id');
			$data['user'] = $this->User_model->getUserById($user_id);
			$data['application'] = $this->db
			->get_where('tb_application', ['application_user_id' => $user_id])
			->row_array();
			
			$this->template->write_view('content','modules/userdashboard',$data);
			$this->template->render();
		}
		
		public function payment_registration($amount = 0)
		{
			if(!$amount){
				show_error("Amount missing");
			}
			
			$user_id = $this->session->userdata('user_id');
			
			if(!$user_id){
				redirect('login');
			}
			
			$this->load->model('User_model');
			
			$user = $this->User_model->getUserById($user_id);
			
			if(!$user){
				show_error("User not found");
			}
			
			$data['user'] = $user;
			$data['amount'] = $amount;
			
			$this->load->view('modules/payment_page', $data);
		}
		
		
		public function paymentSuccess()
		{
			
			$payment_id = $this->input->post('razorpay_payment_id');
			$amount     = $this->input->post('amount');
			$user_id    = $this->session->userdata('user_id');
			$this->load->model('User_model');
			$user = $this->User_model->getUserById($user_id);
			// Save in DB
			$this->db->insert('paymentrespose', [
			'application_user_id'    => $user_id,
			'application_payment_date' => date('Y-m-d H:i:s'),
			'application_payment_details'     => $amount,
			'PaymentId' => $payment_id,
			'OrderID' => $payment_id,
			'Status'     => 'success'
			]);
			
			redirect('page/newApplicationForm');
		}
		
		
		public function newApplicationForm()
		{
			$user_id = $this->session->userdata('user_id');
			
			$this->load->model('User_model');
			
			$data['user'] = $this->User_model->getUserById($user_id);
			
			$data['bankmaster'] = $this->db->get_where('BankMaster')->result_array();
			
			// CLIENT LIST
			$data['clients'] = $this->db->order_by('client_name', 'asc')->where('IsDel','0')->get_where('tb_client')->result_array();
			
			// CHECK EXISTING APPLICATION
			$data['application'] = $this->db
			->get_where('tb_application', ['application_user_id' => $user_id])
			->row_array();
			
			$this->load->view('modules/application_form', $data);
		}
		
		private function uploadFile($field, $config)
		{
			if (!empty($_FILES[$field]['name'])) {
				
				// 🔥 MUST reset config every time
				$this->upload->initialize($config);
				
				if ($this->upload->do_upload($field)) {
					$data = $this->upload->data();
					return 'application/'.$data['file_name'];
					} else {
					echo $this->upload->display_errors();
					die;
				}
			}
			return '';
		}
		
		public function saveApplicationForm()
		{
			// Upload config
			$uploadPath = '../uploads/application/';
			if (!is_dir($uploadPath)) {
				@mkdir($uploadPath, 0777, true);
			}
			$uploadPath = rtrim($uploadPath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
			
			$config = [
				'upload_path'   => $uploadPath,
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size'      => 500,
				'encrypt_name'  => TRUE
			];
			
			$this->load->library('upload', $config);
			
			$userId = $this->input->post('application_user_id');
			if (!$userId) {
				$userId = $this->session->userdata('user_id');
			}
			
			$existing = $this->db
				->get_where('tb_application', ['application_user_id' => $userId])
				->row_array();
			
			$data = array();

			$fieldMap = [
				'application_client_name' => 'application_client_name',
				'employee_name' => 'application_employee_name',
				'mobile' => 'application_mobile_no',
				'email' => 'application_email',
				'gender' => 'Gender',
				'father_name' => 'application_father_name',
				'mother_name' => 'application_mother_name',
				'spouse' => 'application_wife_name',
				'marital_status' => 'application_marital_status',
				'dob' => 'application_dob',
				'doj' => 'application_doj',
				'application_Pincode' => 'application_Pincode',
				'present_address' => 'application_present_address',
				'permanent_address' => 'application_permanent_address',
				'emergency_contact' => 'application_mobile_no_emergency',
				'aadhaar' => 'application_aadhaar_no',
				'pan' => 'application_pan_no',
				'uan' => 'application_uan_no',
				'esi' => 'application_esi_no',
				'department' => 'application_department',
				'designation' => 'application_designation',
				'qualification' => 'application_education_qualification',
				'location' => 'location',
				'account_no' => 'application_bank_account_number',
				'bank_name' => 'application_bank_account_name',
				'ifsc' => 'application_bank_account_ifsc',
				'application_nominee_name' => 'application_nominee_name',
				'application_nominee_contact_no' => 'application_nominee_contact_no',
				'application_nominee_dob' => 'application_nominee_dob',
				'application_nominee_address' => 'application_nominee_address'
			];

			foreach ($fieldMap as $postKey => $dbColumn) {
				$val = $this->input->post($postKey);
				if (!is_null($val)) {
					$data[$dbColumn] = $val;
				}
			}

			if ($userId) {
				$data['application_user_id'] = $userId;
			}

			// File uploads
			$fileUploads = [
				'photo' => 'application_photo',
				'aadhaar_front' => 'application_aadhaar_front_upload',
				'aadhaar_back' => 'application_aadhaar_back_upload',
				'pan_file' => 'application_pan_upload',
				'application_sign_upload' => 'application_sign_upload',
				'application_education_qualification_certificate' => 'application_education_qualification_certificate',
				'application_bank_account_passbook_upload' => 'application_bank_account_passbook_upload'
			];

			foreach ($fileUploads as $fileField => $dbColumn) {
				$newFile = $this->uploadFile($fileField, $config);
				if (!empty($newFile)) {
					$data[$dbColumn] = $newFile;
				} elseif ($existing && !empty($existing[$dbColumn])) {
					$data[$dbColumn] = $existing[$dbColumn];
				}
			}

			if (isset($_POST['final'])) {
				$data['Status'] = '0';
			} elseif (!$existing) {
				$data['Status'] = '3';
			}

			if ($existing) {
				$data['application_submission_date'] = date('Y-m-d H:i:s');
				$this->db->where('application_user_id', $userId);
				$this->db->update('tb_application', $data);
			} else {
				$data['application_creation_date'] = date('Y-m-d H:i:s');
				$data['application_submission_date'] = date('Y-m-d H:i:s');
				$data['application_status'] = '0';
				$data['application_payment_status'] = '0';
				$this->db->insert('tb_application', $data);
			}

			// Update tb_user table
			if ($userId) {
				$userData = array();
				if ($this->input->post('employee_name')) {
					$userData['user_name'] = $this->input->post('employee_name');
				}
				if ($this->input->post('email')) {
					$userData['user_email_id'] = $this->input->post('email');
				}
				if ($this->input->post('mobile')) {
					$userData['user_contact_number'] = $this->input->post('mobile');
				}
				if (!empty($userData)) {
					$this->db->where('user_id', $userId);
					$this->db->update('tb_user', $userData);
				}
			}

			if (isset($_POST['final'])) {
				redirect('page/thanks');
			} else {
				return redirect($_SERVER['HTTP_REFERER']);
			}
		}
		
		
		public function thanks(){
			$this->load->view('modules/thanks');
		}
		
		
		
		//Profile**********************************************************************************
		public function profile()
		{	
			if(empty($this->session->userdata('current_employee_id')))
			return redirect(front_base_url());
			
			$FIELD='*';
			$CON='IsDel="0"';
			$ORDER=array();
			$this->common_data['CLIENT']=$this->FetchModel->SelectDB($FIELD,'tb_client',$CON,$ORDER);
			
			//Load View
			$this->template->write_view('content','modules/profile',$this->common_data);
			$this->template->render();
		}
		
		public function printApplication()
		{
			$this->load->model('User_model');
			$userId = $this->session->userdata('user_id');
			$data['user'] = $this->User_model->getUserById($userId);
			$data['row'] = $this->db
			->get_where('tb_application', ['application_user_id' => $userId])
			->row();
			
			$this->load->view('modules/print_application', $data);
		}
		
		public function showApplication()
		{
			$this->load->model('User_model');
			$userId = $this->session->userdata('user_id');
			$data['user'] = $this->User_model->getUserById($userId);
			$data['row'] = $this->db
			->get_where('tb_application', ['application_user_id' => $userId])
			->row();
			
			$this->load->view('modules/show_application', $data);
		}
		
		public function logout()
		{
			// destroy session
			$this->session->sess_destroy();
			
			// redirect to login page
			redirect('/'); // change if your login route is different
		}
		
		
	}
	
	
	
	
	
