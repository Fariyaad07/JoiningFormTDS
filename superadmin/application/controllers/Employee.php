<?php

ini_set('memory_limit', '512M');

defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );

class Employee extends MY_Controller {

	//Set Common things for this controller*************************************************************

	public $COMMON = array();



	function __construct() {

		parent::__construct();

		$this->COMMON[ 'DB' ] = 'tb_employee';

		$this->COMMON[ 'ID_FIELD' ] = 'employee_id';

		$this->COMMON[ 'VIEW_CONTROLLER' ] = 'employee';



		//Load Site Details Model

		$this->load->model('siteDetails');

		//Load Add Model

		$this->load->model( 'AddModel' );

		//Load Edit Model

		$this->load->model( 'EditModel' );

		//Load Fetch Model

		$this->load->model( 'FetchModel' );

		//Load Delete Model

		$this->load->model( 'DeleteModel' );

		

		$this->initData();

	}



	



//Initialize Common Details

	private function initData()

	{

		$this->common_data['view_controller'] 	= 	$this->COMMON['VIEW_CONTROLLER'];

		$this->common_data['default_id_field'] 	=	$this->COMMON['ID_FIELD'];

		$this->common_data['title'] 			= 	'Employee';

		$this->common_data['heading'] 			= 	'Manage Data';

		$this->common_data['description'] 		= 	'Manage info in an effective way.';

		$this->common_data['SITE'] 				= 	$this->siteDetails->SelectSiteDB();

		$this->common_data['THIS'] 				= 	$this;

	}

	

	

	

//Index or List View**********************************************************************************

	public function index()

	{

		//Run SelectDB Function which select data from database

		$FIELD='*';

		$CON='IsDel="0"';

		$ORDER=array('field'=>'employee_final_registration_status','direction'=>'asc');

		$this->common_data['list']=$this->FetchModel->SelectDB($FIELD,$this->COMMON['DB'],$CON,$ORDER);

		

		//Load View

		$this->common_data['view'] 	= 	"Active List";

		$this->template->write_view('header','common/header',$this->common_data);

		$this->template->write_view('leftSidebar','common/leftSidebar',$this->common_data);

		$this->template->write_view('pageBarTitle','common/pageBarTitle',$this->common_data);

		$this->template->write_view('commonMSG','common/commonMSG',$this->common_data);

		$this->template->write_view('importantButton','common/importantButtonListPage',$this->common_data);

		$this->template->write_view('content','modules/'.$this->COMMON['VIEW_CONTROLLER'].'/index',$this->common_data);

		$this->template->write_view('footer','common/footer',$this->footer_data);

		$this->template->render();

	}

	



	

	

	

	

	

	

	

//Trash View**********************************************************************************

	public function trash()

	{

		//Run SelectDB Function which select data from database

		$FIELD='*';

		$CON='IsDel="1"';

		$ORDER=array('field'=>'employee_final_registration_status','direction'=>'asc');

		$this->common_data['list']=$this->FetchModel->SelectDB($FIELD,$this->COMMON['DB'],$CON,$ORDER);

		

		//Load View

		$this->common_data['view'] 	= 	"Trash";

		$this->template->write_view('header','common/header',$this->common_data);

		$this->template->write_view('leftSidebar','common/leftSidebar',$this->common_data);

		$this->template->write_view('pageBarTitle','common/pageBarTitle',$this->common_data);

		$this->template->write_view('commonMSG','common/commonMSG',$this->common_data);

		$this->template->write_view('importantButton','common/importantButtonListPage',$this->common_data);

		$this->template->write_view('content','modules/'.$this->COMMON['VIEW_CONTROLLER'].'/index',$this->common_data);

		$this->template->write_view('footer','common/footer',$this->footer_data);

		$this->template->render();

	}









//On Update Status

	public function changeUpdateStatus($id=0)

	{

		//Set Data into array

		$updateData = array(

				'udpdate_status' => '1'

		);

		//Run UpdateDB Function which update data into database

		$CON=$this->COMMON['ID_FIELD'].'='.$id;

		$this->EditModel->UpdateDB($this->COMMON['DB'],$updateData,$CON);

		return redirect($_SERVER['HTTP_REFERER']);

			

	}



	

//Remove And Restore Action**************************************************************************

	//Move To Trash Folder (Single Item)

	public function moveToTrash($id=0)

	{

		//Set Data into array

		$updateData = array(

				'IsDel' => '1'

		);

		//Run UpdateDB Function which update data into database

		$CON=$this->COMMON['ID_FIELD'].'='.$id;

		$this->EditModel->UpdateDB($this->COMMON['DB'],$updateData,$CON);

			

	}

	

	//Delete Forever (Single Item)

	public function deleteForever($id=0)

	{

		//Run DeleteDB Function which remove data from database

		$CON=$this->COMMON['ID_FIELD'].'='.$id;

		$this->DeleteModel->DeleteDB($this->COMMON['DB'],$CON);

	}

	

	//Restore From Trash (Single Item)

	public function restoreFromTrash($id=0)

	{

		//Set Data into array

		$updateData = array(

				'IsDel' => '0'

		);

		//Run UpdateDB Function which update data into database

		$CON=$this->COMMON['ID_FIELD'].'='.$id;

		$this->EditModel->UpdateDB($this->COMMON['DB'],$updateData,$CON);

	}

	

	//Move To Trash Folder (Multiple Item)

	public function moveToTrashMultiple()

	{

		if($this->input->post('checkbox_value'))

		{	

			$id = $this->input->post('checkbox_value');

			for($count = 0; $count < count($id); $count++)

			{

				//Set Data into array

				$updateData = array(

						'IsDel' => '1'

				);

				//Run UpdateDB Function which update data into database

				$CON=$this->COMMON['ID_FIELD'].'='.$id[$count];

				$this->EditModel->UpdateDB($this->COMMON['DB'],$updateData,$CON);

			}

		}

	}

	

	//Delete Forever (Multiple Item)

	public function deleteForeverMultiple()

	{

		if($this->input->post('checkbox_value'))

		{	

			$id = $this->input->post('checkbox_value');

			for($count = 0; $count < count($id); $count++)

			{

				//Run DeleteDB Function which remove data from database

				$CON=$this->COMMON['ID_FIELD'].'='.$id[$count];

				$this->DeleteModel->DeleteDB($this->COMMON['DB'],$CON);

			}

		}

	}

	

	//Restore From Trash (Multiple Item)

	public function restoreFromTrashMultiple()

	{

		if($this->input->post('checkbox_value'))

		{	

			$id = $this->input->post('checkbox_value');

			for($count = 0; $count < count($id); $count++)

			{

				//Set Data into array

				$updateData = array(

						'IsDel' => '0'

				);

				//Run UpdateDB Function which update data into database

				$CON=$this->COMMON['ID_FIELD'].'='.$id[$count];

				$this->EditModel->UpdateDB($this->COMMON['DB'],$updateData,$CON);

			}

		}

	}

	

	

		

	

	 public function getdata()

	 {

			$params = $_REQUEST;

			$condition = "IsDel='0'";





			$searColumns = array('employee_name','employee_email');

			if( !empty($params['search']['value']) ) {

				$searchVal = $this->db->escape_like_str($params['search']['value']);

				$where="AND (";

				for($i=0;$i<count($searColumns);$i++)

					{

				$where .= $searColumns[$i]." Like '%".$searchVal."%' OR ";

					} 

				$condition .=substr($where,0,strlen($where)-3);

				$condition .=")";

			}



			$start  = (int) $params['start'];

			$length = (int) $params['length'];



			// dbdriver is sqlsrv, MySQL's LIMIT syntax is invalid T-SQL and fails the query

			$limit="order by employee_id desc OFFSET $start ROWS FETCH NEXT $length ROWS ONLY";



			$countQuery = $this->db->query("select * from tb_employee where $condition");

			$dataQuery  = $this->db->query("select * from tb_employee where $condition $limit");



			if ($countQuery === FALSE || $dataQuery === FALSE) {

				log_message('error', 'Employee getdata query failed: '.$this->db->error()['message']);

				echo json_encode(array(

					"draw"            => intval($params['draw']),

					"recordsTotal"    => 0,

					"recordsFiltered" => 0,

					"data"            => array()

				));

				exit;

			}



			$resultscount = $countQuery->result_array();

			$results      = $dataQuery->result_array();

			//print_r($results); exit;

			$datas = array();

			if(count($results)>0){

				foreach ($results as $DATA) {

					

					$nestedData=array();

					$nestedData[] = $DATA['employee_ref_no'].'<br>'.'<a href="'.base_url($this->COMMON['VIEW_CONTROLLER']).'/changeUpdateStatus/'.$DATA['employee_id'].'">Grant edit permission</a>';

					$nestedData[] = ($DATA['employee_final_registration_status']==1)?'<span class="badge badge-success">Registered</span>':'<span class="badge badge-danger">Not Registered</span>';

					

					$nestedData[] = $DATA['employee_name'];

					$nestedData[] = $DATA['employee_dob'];

					$nestedData[] = $DATA['employee_doj'];

					$nestedData[] = $DATA['employee_marital_status'];

					$nestedData[] = $DATA['employee_father_name'];

					$nestedData[] = $DATA['employee_mother_name'];

					$nestedData[] = $DATA['employee_dept'];

					$nestedData[] = $DATA['employee_designation'];

					$nestedData[] = $DATA['employee_contact_no'];

					$nestedData[] = $DATA['employee_contact_no_emergency'];

					$nestedData[] = $DATA['employee_email'];

					$nestedData[] = $DATA['employee_education'];

					$nestedData[] = $DATA['employee_present_address'];

					$nestedData[] = $DATA['employee_permanent_address'];

					$nestedData[] = $DATA['employee_aadhaar'].'<br>

														<a href="'.file_upload_base_url($DATA['employee_aadhaar_front_image']).'" download>Front</a> <br>

														<a href="'.file_upload_base_url($DATA['employee_aadhaar_back_image']).'" download>Back</a>';

					$nestedData[] = $DATA['employee_pan'].'<br><a href="'.file_upload_base_url($DATA['employee_pan_image']).'" download>Front</a>';

					$nestedData[] = $DATA['employee_uan'];

					$nestedData[] = $DATA['employee_esi'];

					$nestedData[] = $DATA['employee_bank_name'];

					$nestedData[] = $DATA['employee_account_no'];

					$nestedData[] = $DATA['employee_ifsc'];

					

					$datas[] = $nestedData; 

				}

				

				

				$json_data = array(

					"draw"            => intval($params['draw'] ),   

					"recordsTotal"    => intval(count($resultscount)),  

					"recordsFiltered" => intval(count($resultscount)),

					"data"            => $datas

					);

				 echo json_encode($json_data); exit; 



			}else{

				$json_data = array(

				"draw"            => intval($params['draw'] ),   

				"recordsTotal"    => intval(count($resultscount)),  

				"recordsFiltered" => intval(count($resultscount)),

				"data"            => $datas

				);

			 echo json_encode($json_data); exit;

			}



	}

}