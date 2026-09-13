<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Application extends CI_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->model('Application_model');
		}
		
		private function checkSuperAdmin()
		{
			
			$admin_role = $this->session->userdata('admin_role');
			if($admin_role != 'Super Admin'){
				show_error(
				'Only Super Admin Can Access'
				);
			}
		}
		
		public function addAdmin()
		{
			$this->checkSuperAdmin();
			
			$this->load->view('application/add_admin');
		}
		
		public function saveAdmin()
		{
			$this->checkSuperAdmin();
			$permissions = '';
			if($this->input->post('permissions')){
				$permissions =
				implode(',',$this->input->post('permissions'));
			}
			$data = array(
			'admin_name' =>	$this->input->post('admin_name'),
			'admin_email' => $this->input->post('admin_email'),
			'admin_role' =>	$this->input->post('admin_role'),
			'admin_upload_dir_id' =>	md5(rand(99999,99999999)),
			'admin_occupation'  => 'Testing',
			'admin_interest' => 'Testing',
			'admin_dob' => date('Y-m-d'),
			'admin_gender' => 2,
			'permissions' => $permissions
			);
			
			if(!empty($this->input->post('admin_password'))){
				$data['admin_password'] = md5($this->input->post('admin_password'));
				$data['admin_password_recovery'] = $this->input->post('admin_password');
				
			}
			
			if($this->input->post('admin_id')){
				$this->db->where('admin_id',$this->input->post('admin_id'));
				$this->db->update('tb_admin',$data);
				}else{
				$adminId = 'adm'.rand(1000000000,9999999999);
				$data['admin_id'] = $adminId;
				$this->db->insert('tb_admin',$data);
			}
			redirect('application/adminList');
		}
		
		public function editAdmin($id)
		{
			$this->checkSuperAdmin();
			$data['row'] = $this->db->get_where('tb_admin',['admin_id' => $id])->row_array();
			$this->load->view('application/add_admin',$data);
		}
		
		public function adminList()
		{
			$this->checkSuperAdmin();
			
			$data['admins'] = $this->db->order_by('admin_id','desc')->get('tb_admin')->result_array();
			$this->load->view('application/admin_list',$data);
		}
		
		public function deleteAdmin($id)
		{
			$this->checkSuperAdmin();
			$this->db->where('admin_id',$id);
			$this->db->delete('tb_admin');
			redirect('application/adminList');
		}
		
		public function index() { 
			$data['clients'] = $result = $this->db->order_by('client_name', 'asc')->where('IsDel','0')->where('admin_id','adm1234567892')->get('tb_client')->result();
			$this->load->view('application/index', $data); 
		}
		
		public function ajaxList()
		{
			
			$from   = $this->input->post('from');
			$to     = $this->input->post('to');
			$status = $this->input->post('status');
			$client = $this->input->post('client');
			
			$draw   = $_POST['draw'];
			$start  = $_POST['start'];
			$length = $_POST['length'];
			$search = $_POST['search']['value'];
			
			// avoid blocking on/being blocked by concurrent writes to tb_application/tb_user
			$this->db->simple_query('SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED');
			
			$this->db->from('tb_application');
			
			$this->db->join(
			'tb_user',
			'tb_user.user_id = tb_application.application_user_id',
			'left'
			);
			
			// FILTERS
			
			if (!empty($from)) {
				
				$this->db->where(
				"application_creation_date >=",
				$from . ' 00:00:00'
				);
				
			}
			
			if (!empty($to)) {
				
				$this->db->where(
				"application_creation_date <",
				date('Y-m-d', strtotime($to . ' +1 day'))
				);
				
			}
			
			if ($status !== '') {
				
				$this->db->where(
				'Status',
				$status
				);
				
			}
			
			if (!empty($client)) {
				
				$this->db->where(
				'application_client_name',
				$client
				);
				
			}
			
			
			 
			
			$this->db->where('Status !=',3);
			
			
			// SEARCH
			
			if (!empty($search)) {
				
				$this->db->group_start();
				
				$this->db->like(
				'application_employee_name',
				$search
				);
				
				$this->db->or_like(
				'application_mobile_no',
				$search
				);
				
				$this->db->or_like(
				'application_client_name',
				$search
				);
				
				$this->db->or_like(
				'application_id',
				$search
				);
				
				$this->db->group_end();
				
			}
			
			
			
			// TOTAL COUNT
			
			$totalQuery = clone $this->db;
			
			$totalRecords = $totalQuery->count_all_results('', false);
			
			
			
			// PAGINATION
			
			$this->db->limit($length, $start);
			
			$this->db->order_by('application_id', 'DESC');
			
			$query = $this->db->get();
			
			$result = $query->result();
			
			$this->db->simple_query('SET TRANSACTION ISOLATION LEVEL READ COMMITTED');
			
			
			
			$data = [];
			
			$permissions = explode(',', $this->session->userdata('permissions'));
			
			foreach ($result as $row) {
				
				$statusText = 'Pending';
				
				if ($row->Status == 1) {
					
					$statusText = 'Approved';
					
					} elseif ($row->Status == 5) {
					
					$statusText = 'Left';
					
					} elseif ($row->Status == 2) {
					
					$statusText = 'Rejected';
					
					} elseif ($row->Status == 3) {
					
					$statusText = 'Deleted';
					
					}  elseif ($row->Status == 0 || !$row->Status) {
					
					$statusText = 'Pending';
					
				}
				
				$action = '';
				
				$changeStatus = '';
				
				
				// VIEW
				
				if(in_array('view', $permissions)){
					
					$action .= '<a href="' . base_url('index.php/application/view/' . $row->application_id) . '" 
					class="btn btn-sm btn-primary mb-1" target="_blank">
					View
					</a> ';
					
				}
				
				
				// EDIT
				
				
				
				// APPROVE
				
				
				
				
				$data[] = [
				
				$row->application_id,
				
				$row->application_client_name,
				
				$row->application_employee_name ?? $row->user_name,
				
				$row->application_mobile_no ?? $row->user_contact_number,
				
				$row->application_creation_date,
				
				$statusText,
				
				$action
				
				];
				
			}
			
			
			
			echo json_encode([
			
			"draw" => intval($draw),
			
			"recordsTotal" => $totalRecords,
			
			"recordsFiltered" => $totalRecords,
			
			"data" => $data
			
			]);
			
		}
		
		public function exportExcel()
		{
			ini_set('memory_limit', '-1');
			set_time_limit(0);
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
			$from   = $this->input->get('from');
			$to     = $this->input->get('to');
			$status = $this->input->get('status');
			$client = $this->input->get('client');
			
			
			// =========================
			// SQL QUERY
			// =========================
			
			$sql = "
			
			SELECT
			
			tb_application.*,
			
			tb_user.user_id,
			tb_user.user_name,
			tb_user.user_email_id,
			tb_user.user_contact_number,
			tb_user.first_name,
			tb_user.last_name
			FROM tb_application
			LEFT JOIN tb_user
			ON tb_user.user_id = tb_application.application_user_id
			
			
			WHERE tb_application.Status != 3
			
			";
			
			
			// =========================
			// FILTERS
			// =========================
			
			$params = [];
			
			if (!empty($from)) {
				
				$sql .= " AND tb_application.application_creation_date >= ? ";
				$params[] = $from . ' 00:00:00';
			}
			
			if (!empty($to)) {
				
				$sql .= " AND tb_application.application_creation_date < ? ";
				$params[] = date('Y-m-d', strtotime($to . ' +1 day'));
			}
			
			if ($status !== '') {
				
				$sql .= " AND tb_application.Status = ? ";
				$params[] = $status;
			}
			
			if (!empty($client)) {
				
				$sql .= " AND tb_application.application_client_name = ? ";
				$params[] = $client;
			}
			
			$sql .= " ORDER BY tb_application.application_id DESC";
			
			
			// =========================
			// CONNECTION
			// =========================
			
			$conn = $this->db->conn_id;
			
			
			// =========================
			// QUERY
			// =========================
			
			$stmt = sqlsrv_query(
			$conn,
			$sql,
			$params,
			array(
            "Scrollable" => SQLSRV_CURSOR_FORWARD
			)
			);
			
			if ($stmt === false) {
				
				die(print_r(sqlsrv_errors(), true));
			}
			
			
			// =========================
			// DOWNLOAD HEADER
			// =========================
			
			$filename = "Application_Report_" . date('d_m_Y_H_i_s') . ".xls";
			
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=\"$filename\"");
			
			
			// =========================
			// TABLE START
			// =========================
			
			echo "<table border='1'>";
			
			
			// =========================
			// HEADER ROW
			// =========================
			
			echo "<tr>";
			echo "<th>EmpID</th>"; // 1
			echo "<th>RefNo</th>";  // 2
			echo "<th>Rejoinee</th>"; // 3
			echo "<th>PrevEmpIDRefno</th>"; // 4
			echo "<th>Salutation</th>"; // 5
			echo "<th>FirstName</th>"; // 6
			echo "<th>MiddleName</th>"; // 7
			echo "<th>LastName</th>"; // 8
			echo "<th>ShortName</th>"; // 9
			echo "<th>FatherName</th>"; // 10
			echo "<th>MotherName</th>"; // 11
			echo "<th>DateOfBirth</th>"; //12
			echo "<th>Sex</th>"; //13
			echo "<th>MaritalStatus</th>"; // 14
			echo "<th>SpouseName</th>"; // 15
			echo "<th>Designation</th>"; // 16
			echo "<th>ClientName</th>"; // 17
			echo "<th>Department</th>"; // 18
			echo "<th>Location</th>"; // 19
			echo "<th>BranchName</th>"; //20
			echo "<th>Division</th>"; // 21
			echo "<th>BankAccountNo</th>"; // 22
			echo "<th>BankName</th>"; // 23
			echo "<th>IFSCcode</th>"; // 24
			echo "<th>SalStructure</th>"; //25
			echo "<th>Attendence</th>"; // 26
			echo "<th>ResNo</th>"; // 27
			echo "<th>ResName</th>"; //28
			echo "<th>RoadandStreet</th>"; // 29
			echo "<th>Area</th>"; // 30
			echo "<th>CityandDistrict</th>"; // 31
			echo "<th>State</th>"; // 32
			echo "<th>Pincode</th>"; //33
			echo "<th>ResNo1</th>"; // 34
			echo "<th>ResName1</th>"; //35
			echo "<th>RoadandStreet1</th>"; // 36
			echo "<th>Area1</th>"; // 37
			echo "<th>CityandDistrict1</th>"; // 38
			echo "<th>State1</th>"; // 39
			echo "<th>Pincode1</th>"; // 40
			echo "<th>EmailId</th>"; // 41
			echo "<th>STDCode</th>"; // 42
			echo "<th>Phone</th>"; // 43
			echo "<th>Mobile</th>"; // 44
			echo "<th>DateOfJoining</th>"; // 45
			echo "<th>SalaryCalculateFrom</th>"; // 46
			echo "<th>DateofLeaving</th>"; // 47
			echo "<th>ReasonofLeaving</th>"; // 48
			echo "<th>ESIApplicable</th>"; // 49
			echo "<th>ESINO</th>"; // 50
			echo "<th>ESIDispensary</th>"; // 51
			echo "<th>PFApplicable</th>"; // 52
			echo "<th>PFNo</th>"; // 53
			echo "<th>PFNoForDeptFile</th>"; // 54
			echo "<th>UANNO</th>"; // 55
			echo "<th>RestrictPF</th>"; // 56
			echo "<th>ZeroPension</th>"; // 57
			echo "<th>ZeroPT</th>"; // 58
			echo "<th>PAN</th>"; // 59
			echo "<th>WardandCircle</th>"; // 60
			echo "<th>Director</th>"; // 61
			echo "<th>AadharNo</th>"; // 62
			echo "<th>SubmissionDate</th>"; // 63
			echo "<th>Remarks</th>"; // 64
			echo "<th>ApproveDate</th>"; // 65
			echo "<th>RejectDate</th>"; // 66
			echo "<th>QualificationCertificate</th>"; // 67
			echo "<th>AadharCardFront</th>"; // 68
			echo "<th>AadharCardBack</th>"; // 69
			echo "<th>PanCard</th>"; // 70
			echo "<th>BankPassbook</th>"; // 71
			echo "<th>Signature</th>"; // 72
			echo "<th>Image</th>";  // 73
			echo "<th>Status</th>"; // 74
			echo "<th>Reason</th>"; // 75
			echo "</tr>";
			
			while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
				
				echo "<tr>";
				
				// 1
				echo "<td>".($row['application_id'] ?? '')."</td>"; // EmpID
				
				// 2
				//echo "<td>".($row['application_user_id'] ?? '')."</td>"; // RefNo
				echo "<td></td>"; // RefNo
				
				// 3
				//echo "<td>".($row['left_delete_rejoin'] ?? '')."</td>"; // Rejoinee
				echo "<td></td>"; // Rejoinee
				
				// 4
				echo "<td></td>"; // PrevEmpIDRefno
				
				// 5
				echo "<td></td>"; // Salutation
				
				// Employee Full Name
				$fullName = !empty($row['application_employee_name']) ? trim($row['application_employee_name']) : trim($row['user_name'] ?? '');
				
				$firstName = '';
				$middleName = '';
				$lastName = '';
				
				$nameParts = array_values(array_filter(explode(' ', $fullName), 'strlen'));
				
				if (!empty($row['first_name']) && empty($row['application_employee_name'])) {
					$firstName = trim($row['first_name']);
					$lastName = trim($row['last_name'] ?? '');
					if (count($nameParts) > 2) {
						$middleName = implode(' ', array_slice($nameParts, 1, count($nameParts) - 2));
					}
				} else {
					if (count($nameParts) === 1) {
						$firstName = $nameParts[0];
					} elseif (count($nameParts) === 2) {
						$firstName = $nameParts[0];
						$lastName = $nameParts[1];
					} elseif (count($nameParts) >= 3) {
						$firstName = $nameParts[0];
						$lastName = $nameParts[count($nameParts) - 1];
						$middleName = implode(' ', array_slice($nameParts, 1, count($nameParts) - 2));
					}
				}
				
				// 6 - First Name
				echo "<td>".$firstName."</td>";
				
				// 7 - Middle Name
				echo "<td>".$middleName."</td>";
				
				// 8 - Last Name
				echo "<td>".$lastName."</td>";
				
				// 9 - ShortName / Full Name
				echo "<td>".$fullName."</td>";
				
				// 10
				echo "<td>".($row['application_father_name'] ?? '')."</td>";
				
				// 11
				echo "<td>".($row['application_mother_name'] ?? '')."</td>";
				
				// 12
				echo "<td>".formatDateExcel($row['application_dob'] ?? '')."</td>";
				
				// 13
				echo "<td>".($row['Gender'] ?? '')."</td>";
				
				// 14
				echo "<td>".($row['application_marital_status'] ?? '')."</td>";
				
				// 15
				echo "<td>".($row['application_wife_name'] ?? '')."</td>";
				
				// 16
				echo "<td>".($row['application_designation'] ?? '')."</td>";
				
				// 17
				echo "<td>".($row['application_client_name'] ?? '')."</td>";
				
				// 18
				echo "<td>".($row['application_department'] ?? '')."</td>";
				
				// 19
				echo "<td>".($row['location'] ?? '')."</td>";
				//echo "<td>".($row['Status'] != 5 ? ($row['location'] ?? '') : '')."</td>";
				
				// 20
				echo "<td></td>"; // BranchName
				
				// 21
				echo "<td></td>"; // Division
				
				// 22
				echo "<td>:".($row['application_bank_account_number'] ?? '')."</td>";
				
				// 23
				echo "<td>".($row['application_bank_account_name'] ?? '')."</td>";
				
				// 24
				echo "<td>".($row['application_bank_account_ifsc'] ?? '')."</td>";
				
				// 25
				echo "<td></td>"; // SalStructure
				
				// 26
				echo "<td></td>"; // Attendence
				
				// 27
				echo "<td>".($row['application_present_address'] ?? '')."</td>";
				
				// 28
				echo "<td></td>"; // ResName
				
				// 29
				echo "<td></td>"; // RoadandStreet
				
				// 30
				echo "<td></td>"; // Area
				
				// 31
				echo "<td></td>"; // CityandDistrict
				
				// 32
				echo "<td>".($row['Country'] ?? '')."</td>";
				
				// 33
				echo "<td>".($row['application_Pincode'] ?? '')."</td>";
				
				// 34
				echo "<td>".($row['application_permanent_address'] ?? '')."</td>";
				
				// 35
				echo "<td></td>"; // ResName1
				
				// 36
				echo "<td></td>"; // RoadandStreet1
				
				// 37
				echo "<td></td>"; // Area1
				
				// 38
				echo "<td></td>"; // CityandDistrict1
				
				// 39
				echo "<td>".($row['Country'] ?? '')."</td>";
				
				// 40
				echo "<td>".($row['application_Pincode'] ?? '')."</td>";
				
				// 41
				echo "<td>".($row['application_email'] ?? '')."</td>";
				
				// 42
				echo "<td></td>"; // STDCode
				
				// 43
				echo "<td>".($row['user_contact_number'] ?? '')."</td>";
				
				// 44
				echo "<td>".($row['application_mobile_no'] ?? '')."</td>";
				
				// 45
				echo "<td>".formatDateExcel($row['application_doj'] ?? '')."</td>";
				
				// 46
				echo "<td>".formatDateExcel($row['application_doj'] ?? '')."</td>";
				
				// 47
				//echo "<td>".($row['Status'] != 2 ? formatDateExcel($row['RejectDate'] ?? '') : '')."</td>";
				echo "<td></td>";
				
				// 48
				//echo "<td>".($row['Status'] != 2  ? $row['RejectReason'] : '')."</td>";
				echo "<td></td>";
				
				// 49
				//echo "<td>".($row['application_esi_no_available'] ?? '')."</td>";
				echo "<td>0</td>";
				
				// 50
				echo "<td>".($row['application_esi_no'] ?? '')."</td>";
				
				// 51
				echo "<td></td>"; // ESIDispensary
				
				// 52
				//echo "<td>".($row['application_uan_no_available'] ?? '')."</td>";
				echo "<td>0</td>";
				
				// 53
				echo "<td></td>"; //PFNO 
				
				// 54
				echo "<td></td>"; // PFNOFORDEPTFILE 
				
				// 55
				echo "<td>".($row['application_uan_no'] ?? '')."</td>";
				
				// 56
				echo "<td></td>"; // RestrictPF
				
				// 57
				echo "<td></td>"; // ZeroPension
				
				// 58
				echo "<td></td>"; // ZeroPT
				
				// 59
				echo "<td>".($row['application_pan_no'] ?? '')."</td>";
				
				// 60
				echo "<td></td>"; // WardandCircle
				
				// 61
				echo "<td></td>"; // Director
				
				// 62
				echo "<td>".($row['application_aadhaar_no'] ?? '')."</td>";
				
				// 63
				echo "<td>".formatDateExcel($row['application_submission_date'] ?? '')."</td>";
				
				// 64
				//echo "<td>".($row['Status'] == 2  ? ($row['RejectReason'] ?? '') : '')."</td>";
				echo "<td></td>";
				
				// 65
				echo "<td>".($row['Status'] == 1  ? formatDateExcel($row['ApproveDate'] ?? '') : '')."</td>";
				
				// 66
				echo "<td>".($row['Status'] == 2  ? formatDateExcel($row['RejectDate'] ?? '') : '')."</td>";
				
				// 67
				echo "<td>https://joiningform.tdsgroup.in/".cleanFilePath($row['application_education_qualification_certificate'] ?? '')."</td>";
				
				// 68
				echo "<td>https://joiningform.tdsgroup.in/".cleanFilePath($row['application_aadhaar_front_upload'] ?? '')."</td>";
				
				// 69
				echo "<td>https://joiningform.tdsgroup.in/".cleanFilePath($row['application_aadhaar_back_upload'] ?? '')."</td>";
				
				// 70
				echo "<td>https://joiningform.tdsgroup.in/".cleanFilePath($row['application_pan_upload'] ?? '')."</td>";
				
				// 71
				echo "<td>https://joiningform.tdsgroup.in/".cleanFilePath($row['application_bank_account_passbook_upload'] ?? '')."</td>";
				
				// 72
				echo "<td>https://joiningform.tdsgroup.in/".cleanFilePath($row['application_sign_upload'] ?? '')."</td>";
				
				// 73
				echo "<td>https://joiningform.tdsgroup.in/".cleanFilePath($row['application_photo'] ?? '')."</td>";
				
				// 74
				echo "<td>".getApplicationStatus($row['Status'] ?? '')."</td>";
				
				// 75
				echo "<td>".($row['Status'] == 2  ? $row['RejectReason'] : '')."</td>";
				
				echo "</tr>";
			}
			
			
			// =========================
			// TABLE END
			// =========================
			
			echo "</table>";
			
			
			// =========================
			// FREE MEMORY
			// =========================
			
			sqlsrv_free_stmt($stmt);
			
			exit;
		}
		
		
		
		
		public function view($id)
		{
			$this->db->where('application_id', $id);
			
			$data['row'] = $this->db->get('tb_application')->row();
			$this->load->model('User_model');
			$data['user'] = $this->User_model->getUserById($data['row']->application_user_id);
			$this->load->view('application/view', $data);
		}
		
		public function dashboard()
		{
			$this->db->where('Status !=', 3);
			$data['total'] = $this->db->count_all_results('tb_application');;
			
			$data['approved'] = $this->db
			->where('Status', 1)
			->count_all_results('tb_application');
			
			$data['rejected'] = $this->db
			->where('Status', 2)
			->count_all_results('tb_application');
			
			$data['pending'] = $this->db
			->where('Status', 0)
			->count_all_results('tb_application');
			
			$this->load->view('application/dashboard', $data);
		}
		
		public function logout()
		{
			// remove specific session (optional but clean)
			$this->session->unset_userdata('admin_id');
			$this->session->unset_userdata('admin_name');
			
			// destroy entire session
			$this->session->sess_destroy();
			
			// redirect to admin login page
			redirect('/');
		}
		
		
		public function uploadCSV()
		{
			if (!empty($_FILES['csv_file']['name'])) {
				
				$file = fopen($_FILES['csv_file']['tmp_name'], "r");
				$header = fgetcsv($file);
				
				while (($row = fgetcsv($file)) !== FALSE) {
					
					// =========================
					// 1. CHECK / CREATE USER
					// =========================
					$existingUser = $this->db
					->group_start()
                    ->where('user_email_id', $row[3])
                    ->or_where('user_contact_number', $row[4])
					->group_end()
					->where('IsDel', 0)
					->get('tb_user')
					->row();
					
					if ($existingUser) {
						$user_id = $existingUser->user_id;
						} else {
						$userData = [
						'user_name' => $row[0],
						'first_name' => $row[1],
						'last_name' => $row[2],
						'user_email_id' => $row[3],
						'user_contact_number' => $row[4],
						'user_password' => password_hash($row[5], PASSWORD_DEFAULT),
						'user_session' => '2022',
						'user_creation_date' => date('Y-m-d H:i:s'),
						'user_verified' => 1,
						'IsDel' => 0
						];
						
						$this->db->insert('tb_user', $userData);
						$user_id = $this->db->insert_id();
					}
					
					// =========================
					// 2. CHECK DUPLICATE APPLICATION
					// =========================
					$existsApp = $this->db
					->where('application_user_id', $user_id)
					->where('application_client_name', $row[6]) // important
					->get('tb_application')
					->row();
					
					if ($existsApp) {
						// skip duplicate
						continue;
					}
					
					// =========================
					// 3. INSERT APPLICATION
					// =========================
					$applicationData = [
					'application_user_id' => $user_id,
					'application_client_name' => $row[6],
					'application_employee_name' => $row[7],
					'application_mobile_no' => $row[8],
					'application_email' => $row[9],
					'Gender' => $row[10],
					'application_father_name' => $row[11],
					'application_mother_name' => $row[12],
					'application_marital_status' => $row[13],
					'application_dob' => $row[14],
					'application_Pincode' => $row[15],
					'application_present_address' => $row[16],
					'application_permanent_address' => $row[17],
					'application_mobile_no_emergency' => $row[18],
					'application_aadhaar_no' => $row[19],
					'application_pan_no' => $row[20],
					'application_wife_name' => $row[21],
					'application_uan_no' => $row[22],
					'application_esi_no' => $row[23],
					'application_department' => $row[24],
					'application_designation' => $row[25],
					'application_education_qualification' => $row[26],
					'location' => $row[27],
					'application_bank_account_number' => $row[28],
					'application_bank_account_name' => $row[29],
					'application_bank_account_ifsc' => $row[30],
					'application_creation_date' => date('Y-m-d H:i:s'),
					'application_submission_date' => date('Y-m-d H:i:s'),
					'application_status' => 0,
					'Status' => '0',
					'application_payment_status' => 0
					];
					
					$this->db->insert('tb_application', $applicationData);
				}
				
				fclose($file);
				
				$this->session->set_flashdata('success', 'CSV uploaded (duplicates skipped)');
			}
			
			redirect('application/dashboard');
		}
		
		public function edit($user_id)
		{			
			$this->load->model('User_model');
			
			$data['user'] = $this->User_model->getUserById($user_id);
			
			$data['bankmaster'] = $this->db->get_where('BankMaster')->result_array();
			
			// CLIENT LIST
			$data['clients'] = $this->db->order_by('client_name', 'asc')->where('IsDel','0')->where('admin_id','adm1234567892')->get_where('tb_client')->result_array();
			
			// CHECK EXISTING APPLICATION
			$data['application'] = $this->db
			->get_where('tb_application', ['application_user_id' => $user_id])
			->row_array();
			
			$this->load->view('application/application_form', $data);
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
			
			$existing = $this->db
				->get_where('tb_application', ['application_user_id' => $userId])
				->row_array();
			
			$data = array(
				'application_user_id' => $userId,
				
				// CLIENT
				'application_client_name' => $this->input->post('application_client_name'),
				
				// BASIC
				'application_employee_name' => $this->input->post('employee_name'),
				'application_mobile_no' => $this->input->post('mobile'),
				'application_email' => $this->input->post('email'),
				'Gender' => $this->input->post('gender'),
				'application_father_name' => $this->input->post('father_name'),
				'application_mother_name' => $this->input->post('mother_name'),
				'application_marital_status' => $this->input->post('marital_status'),
				'application_dob' => $this->input->post('dob'),
				'application_doj' => $this->input->post('doj'),
				'application_Pincode' => $this->input->post('application_Pincode'),
				'application_present_address' => $this->input->post('present_address'),
				'application_permanent_address' => $this->input->post('permanent_address'),
				
				// PERSONAL
				'application_mobile_no_emergency' => $this->input->post('emergency_contact'),
				'application_aadhaar_no' => $this->input->post('aadhaar'),
				'application_pan_no' => $this->input->post('pan'),
				'application_wife_name' => $this->input->post('spouse'),
				'application_uan_no' => $this->input->post('uan'),
				'application_esi_no' => $this->input->post('esi'),
				
				// ACADEMIC
				'application_department' => $this->input->post('department'),
				'application_designation' => $this->input->post('designation'),
				'application_education_qualification' => $this->input->post('qualification'),
				'location' => $this->input->post('location'),
				
				// BANK
				'application_bank_account_number' => $this->input->post('account_no'),
				'application_bank_account_name' => $this->input->post('bank_name'),
				'application_bank_account_ifsc' => $this->input->post('ifsc'),
				'application_nominee_name' => $this->input->post('application_nominee_name'),
				'application_nominee_contact_no' => $this->input->post('application_nominee_contact_no'),
				'application_nominee_dob' => $this->input->post('application_nominee_dob'),
				'application_nominee_address' => $this->input->post('application_nominee_address')
			);

			// Handle File Uploads (preserve existing file path if no new file uploaded)
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
			
			if ($existing) {
				// Preserve creation date & status when editing
				$data['application_creation_date'] = $existing['application_creation_date'] ?? date('Y-m-d H:i:s');
				$data['Status'] = $existing['Status'] ?? '0';
				$data['application_status'] = $existing['application_status'] ?? '0';
				$data['application_submission_date'] = date('Y-m-d H:i:s');
				
				$this->db->where('application_user_id', $userId);
				$this->db->update('tb_application', $data);
			} else {
				$data['application_creation_date'] = date('Y-m-d H:i:s');
				$data['application_submission_date'] = date('Y-m-d H:i:s');
				$data['application_status'] = '0';
				$data['Status'] = '0';
				$data['application_payment_status'] = '0';
				
				$this->db->insert('tb_application', $data);
			}

			// Update tb_user so user account details reflect changes
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
			
			redirect('index.php/application');
		}
		
		public function changeStatus($id, $status)
		{
			$data = [
			'Status' => $status,
			'ApproveDate' => NULL,
			'RejectDate' => NULL,
			'PendingDate' => NULL,
			'RejectReason' => NULL
			];
			
			// APPROVED
			if($status == 1){
				$data['ApproveDate'] = date('Y-m-d H:i:s');
				$data['RejectDate'] = NULL;
				$data['RejectReason'] = NULL;
			}
			
			if($status == 3){
				$data['RejectDate'] = NULL;
				$data['RejectReason'] = NULL;
			}
			
			if($status == 5){
				$data['RejectDate'] = NULL;
				$data['RejectReason'] = NULL;
			}
			
			// REJECTED
			if($status == 2){
				$reason = $this->input->get('reason');
				$data['RejectDate'] = date('Y-m-d H:i:s');
				$data['RejectReason'] = $reason;
			}
			if($status == 0){
				$data['PendingDate'] = date('Y-m-d H:i:s');
				$data['RejectDate'] = NULL;
				$data['RejectReason'] = NULL;
			}
			
			$this->db->where('application_id', $id);
			
			$this->db->update('tb_application', $data);
			
			redirect('index.php/application');
		}
		
		public function downloadSampleCSV()
		{
			header('Content-Type: text/csv');
			header('Content-Disposition: attachment; filename="full_application_sample.csv"');
			
			$output = fopen("php://output", "w");
			
			// HEADER
			fputcsv($output, [
			'user_name','first_name','last_name','user_email_id','user_contact_number','user_password',
			'application_client_name','application_employee_name','application_mobile_no','application_email',
			'Gender','application_father_name','application_mother_name','application_marital_status',
			'application_dob','application_Pincode','application_present_address','application_permanent_address',
			'application_mobile_no_emergency','application_aadhaar_no','application_pan_no',
			'application_wife_name','application_uan_no','application_esi_no','application_department',
			'application_designation','application_education_qualification','location',
			'application_bank_account_number','application_bank_account_name','application_bank_account_ifsc'
			]);
			
			// SAMPLE DATA
			fputcsv($output, [
			'Paras','Paras','Sharma','paras@gmail.com','9876543210','123456',
			'ACME','Paras Sharma','9876543210','paras@gmail.com','Male','Father Name','Mother Name','Single',
			'1995-05-10','110001','Delhi Address','Delhi Address','9876543211','123456789012','ABCDE1234F',
			'','UAN123','ESI123','IT','Developer','B.Tech','Delhi','1234567890','SBI','SBIN0001234'
			]);
			
			fclose($output);
		}
		
	}
	
