<!DOCTYPE html>

<html>

<head>

	<base href="<?=base_url('assets/');?>">

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>TDS Group</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">

	<link href="css/font-awesome.min.css" rel="stylesheet">

	<link href="css/datepicker3.css" rel="stylesheet">

	<link href="css/styles.css" rel="stylesheet">



	<!--Custom Font-->

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!--[if lt IE 9]>

	<script src="js/html5shiv.js"></script>

	<script src="js/respond.min.js"></script>

	<![endif]-->

</head>



<body>

	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">

		<div class="container-fluid">

			<div class="navbar-header">

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span></button>

				 <a class="navbar-brand" href="<?=front_base_url();?>"><img src="<?php echo file_upload_base_url($SITE[0]['site_logo']);?>" style="height: 55px;margin-top: -14px;display: inline;"></a>



			</div>

		</div>

	</nav>

	<?php $IMAGE=empty($EMP_DETAILS[0]['employee_image'])?"https://www.worldfuturecouncil.org/wp-content/uploads/2020/02/dummy-profile-pic-300x300-1.png":file_upload_base_url($EMP_DETAILS[0]['employee_image']);?>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

		<div class="profile-sidebar">

			<div class="profile-userpic">

				<img src="<?=$IMAGE;?>" class="img-responsive" alt="">

			</div>

			<div class="profile-usertitle">

				<div class="profile-usertitle-name">

					<?=$EMP_DETAILS[0]['employee_name'];?>

				</div>

				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>

			</div>

			<div class="clear"></div>

		</div>

		<div class="divider"></div>

		<ul class="nav menu">

			<li><a href="<?=front_base_url('dashboard');?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a>

			</li>

			<li class="active"><a href="<?=front_base_url('profile');?>"><em class="fa fa-user">&nbsp;</em> Profile</a>

			</li>

			<li><a href="<?=front_base_url('logout');?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a>

			</li>

		</ul>

	</div>

	<!--/.sidebar-->



	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">



		<?php if($this->session->flashdata('errorMSG')) { ?>

			<div class="alert bg-danger notify" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>

				<?=$this->session->flashdata('errorMSG');?><a href="javascript:void(0)" class="pull-right close_notify"><em class="fa fa-lg fa-close"></em></a>

			</div>

		<?php } ?>

		<?php if($this->session->flashdata('successMSG')) { ?>

			<div class="alert bg-success notify" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>

				<?=$this->session->flashdata('successMSG');?><a href="javascript:void(0)" class="pull-right close_notify"><em class="fa fa-lg fa-close"></em></a>

			</div>

		<?php } ?>

		

		<div class="row" style="margin-top: 10px">

			<div class="col-lg-12" <?php if($EMP_DETAILS[0]['udpdate_status']==0) { ?>style="pointer-events: none"<?php } ?>>

				<div class="panel panel-default">

					<div class="panel-heading">Employee Details</div>

					<?php if($EMP_DETAILS[0]['udpdate_status']==1) { ?> 

					<form method="post" action="<?=base_url('Page/submitEmployeeDetails');?>" enctype="multipart/form-data">

					<?php } ?>

					<div class="panel-body">

						<div class="col-md-6">

							<div class="form-group">

								<label>Client Name</label>

								<select class="form-control" name="employee_client"  id="employee_client">

									<option value="">Select Client</option>
<?php foreach($CLIENT as $DATA){ ?>
	<option value="<?=$DATA['client_name'];?>"><?=$DATA['client_name'];?></option>
<?php } ?>


								</select>

							</div>

							<div class="form-group">

								<label>Employee Name</label>

								<input class="form-control" type="text" name="employee_name"  value="<?=$EMP_DETAILS[0]['employee_name']?>" required  readonly>

							</div>

							<div class="form-group">

								<label>Upload your photo</label>

								<input class="form-control" type="file" name="employee_image" required >

							</div>

							<div class="form-group">

								<label>Date of Birth</label>

								<input class="form-control" type="date" name="employee_dob"  max="<?=date('Y')-18;?>-<?=date('m-d');?>"  value="<?=$EMP_DETAILS[0]['employee_dob']?>" required>

							</div>

							<div class="form-group">

								<label>Date of Joining</label>

								<input class="form-control" type="date" name="employee_doj"   max="<?=date('Y-m-d');?>"  value="<?=$EMP_DETAILS[0]['employee_doj']?>" required>

							</div>

							<div class="form-group">

								<label>Marital Status</label>

								<select class="form-control" name="employee_marital_status">

									<option value="">Select Marital Status</option>

									<option value="Unmarried" <?=$EMP_DETAILS[0]['employee_marital_status']=="Unmarried"?"selected":"";?>>Unmarried</option>

									<option value="Married" <?=$EMP_DETAILS[0]['employee_marital_status']=="Married"?"selected":"";?>>Married</option>

									<option value="Divorsed" <?=$EMP_DETAILS[0]['employee_marital_status']=="Divorsed"?"selected":"";?>>Divorsed</option>

								</select>

							</div>

							<div class="form-group">

								<label>Father Name</label>

								<input class="form-control" type="text" name="employee_father_name"  value="<?=$EMP_DETAILS[0]['employee_father_name']?>" >

							</div>

							<div class="form-group">

								<label>Mother Name</label>

								<input class="form-control" type="text" name="employee_mother_name"  value="<?=$EMP_DETAILS[0]['employee_mother_name']?>" >

							</div>

							<div class="form-group">

								<label>Department</label>

								<input class="form-control" type="text" name="employee_dept"  value="<?=$EMP_DETAILS[0]['employee_dept']?>" >

							</div>

							<div class="form-group">

								<label>Designation</label>

								<input class="form-control" type="text" name="employee_designation"  value="<?=$EMP_DETAILS[0]['employee_designation']?>" >

							</div>

							<div class="form-group">

								<label>Mobile No</label>

								<input class="form-control" type="text" name="employee_contact_no" pattern="[0-9]{10}" title="10 Digit Mobile No"  value="<?=$EMP_DETAILS[0]['employee_contact_no']?>"  required>

							</div>

							<div class="form-group">

								<label>Emergency Contact Number</label>

								<input class="form-control" type="text" name="employee_contact_no_emergency" pattern="[0-9]{10}" title="10 Digit Mobile No"  value="<?=$EMP_DETAILS[0]['employee_contact_no_emergency']?>">

							</div>

							<div class="form-group">

								<label>Education Qualification</label>

								<select class="form-control" name="employee_education">

									<option value="">Select Education Qualification</option>

									<option value="Under 10th" <?=$EMP_DETAILS[0]['employee_education']=="Under 10th"?"selected":"";?>>Under 10th</option>

									<option value="10th" <?=$EMP_DETAILS[0]['employee_education']=="10th"?"selected":"";?>>10th</option>

									<option value="12th" <?=$EMP_DETAILS[0]['employee_education']=="12th"?"selected":"";?>>12th</option>

									<option value="Graduate" <?=$EMP_DETAILS[0]['employee_education']=="Graduate"?"selected":"";?>>Graduate</option>

									<option value="Post Graduate" <?=$EMP_DETAILS[0]['employee_education']=="Post Graduate"?"selected":"";?>>Post Graduate</option>

								</select>

							</div>

							<div class="form-group">

								<label>Present Address</label>

								<input class="form-control" type="text" name="employee_present_address" value="<?=$EMP_DETAILS[0]['employee_present_address']?>">

							</div>

						</div>

						<div class="col-md-6">

							<div class="form-group">

								<label>Permanent Address</label>

								<input class="form-control" type="text" name="employee_permanent_address" value="<?=$EMP_DETAILS[0]['employee_permanent_address']?>">

							</div>

							<div class="form-group">

								<label>Aadhar Card Number</label>

								<input class="form-control" type="text" name="employee_aadhaar" pattern="[0-9]{12}" title="12 Digit Aadhaar No" value="<?=$EMP_DETAILS[0]['employee_aadhaar']?>">

							</div>

							<div class="form-group">

								<label>Upload Aadhar Front</label>

								<input class="form-control" type="file" name="employee_aadhaar_front_image" >

							</div>

							<div class="form-group">

								<label>Upload Aadhar Back</label>

								<input class="form-control" type="file" name="employee_aadhaar_back_image" >

							</div>

							<div class="form-group">

								<label>PAN Card Number</label>

								<input class="form-control" type="text" name="employee_pan" pattern="[A-Za-z0-9]+"  title="Alpha Neumeric" value="<?=$EMP_DETAILS[0]['employee_pan']?>">

							</div>

							<div class="form-group">

								<label>Upload PAN Card</label>

								<input class="form-control" type="file" name="employee_pan_image" >

							</div>

							<div class="form-group">

								<label>UAN Number</label>

								<input class="form-control" type="text" name="employee_uan" pattern="[0-9]+" title="Neumeric" value="<?=$EMP_DETAILS[0]['employee_uan']?>">

							</div>

							<div class="form-group">

								<label>ESI Number</label>

								<input class="form-control" type="text" name="employee_esi"  pattern="[0-9]+" title="Neumeric" value="<?=$EMP_DETAILS[0]['employee_esi']?>">

							</div>

							<div class="form-group">

								<label>Bank Account Number</label>

								<input class="form-control" type="text" name="employee_account_no" pattern="[0-9]+" title="Neumeric" value="<?=$EMP_DETAILS[0]['employee_account_no']?>">

							</div>

							<div class="form-group">

								<label>Bank Name</label>

								<input class="form-control" type="text" name="employee_bank_name"  value="<?=$EMP_DETAILS[0]['employee_bank_name']?>">

							</div>

							<div class="form-group">

								<label>IFSC Code</label>

								<input class="form-control" type="text" name="employee_ifsc" value="<?=$EMP_DETAILS[0]['employee_ifsc']?>" required>

							</div>

		

							<?php if($EMP_DETAILS[0]['udpdate_status']==1) { ?> 

							<button type="submit" class="btn btn-primary">Submit</button>

							<button type="reset" class="btn btn-default">Reset</button>

							<?php } ?>

						</div>



					</div>

						

					<?php if($EMP_DETAILS[0]['udpdate_status']==1) { ?> 

					</form>

					<?php } ?>

				</div>

			</div>

			<!-- /.panel-->

		</div>

		<!-- /.col-->

		<div class="col-sm-12">

			<p class="back-link">TDS GROUP &copy;

				<?=date('Y');?>

			</p>

		</div>

	</div>

	<!-- /.row -->

	</div>

	<!--/.main-->



	<script src="js/jquery-1.11.1.min.js"></script>

	<script src="js/bootstrap.min.js"></script>

	<script src="js/chart.min.js"></script>

	<script src="js/chart-data.js"></script>

	<script src="js/easypiechart.js"></script>

	<script src="js/easypiechart-data.js"></script>

	<script src="js/bootstrap-datepicker.js"></script>

	<script src="js/custom.js"></script>

	<script type="text/javascript">

	$('#employee_client option[value="<?=$EMP_DETAILS[0]['employee_client']?>"]').prop('selected', true);

	</script>



</body>

</html>