
<!DOCTYPE html>
<html>
	<head>
		<title>Application Form</title>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		
		<style>
			
			```css id="finalresponsivecss"
			/* ===================================== */
			/* GLOBAL */
			/* ===================================== */
			
			*{
			margin:0;
			padding:0;
			box-sizing:border-box;
			}
			
			html,
			body{
			width:100%;
			overflow-x:hidden;
			}
			
			body{
			background:linear-gradient(135deg,#8ec5fc,#3a7bd5);
			font-family:'Segoe UI',sans-serif;
			min-height:100vh;
			}
			
			/* ===================================== */
			/* NAVBAR */
			/* ===================================== */
			
			.navbar{
			background:#fff;
			border-radius:10px;
			}
			
			/* ===================================== */
			/* HEADER */
			/* ===================================== */
			
			.header{
			background:#e9ecef;
			padding:12px;
			text-align:center;
			font-weight:bold;
			color:red;
			font-size:18px;
			}
			
			/* ===================================== */
			/* PROFILE */
			/* ===================================== */
			
			.profile-box{
			background:#fff;
			border-radius:10px;
			padding:15px;
			box-shadow:0 5px 15px rgba(0,0,0,0.08);
			}
			
			/* ===================================== */
			/* FORM */
			/* ===================================== */
			
			.form-container{
			background:rgba(255,255,255,0.95);
			padding:20px;
			border-radius:10px;
			box-shadow:0 5px 15px rgba(0,0,0,0.08);
			overflow:hidden;
			}
			
			/* ===================================== */
			/* TABS */
			/* ===================================== */
			
			.nav-tabs .nav-link.active{
			background:#0d6efd;
			color:#fff;
			}
			
			/* ===================================== */
			/* LABEL */
			/* ===================================== */
			
			label{
			font-weight:600;
			margin-top:10px;
			margin-bottom:6px;
			}
			
			/* ===================================== */
			/* REQUIRED */
			/* ===================================== */
			
			.required{
			color:red;
			}
			
			/* ===================================== */
			/* HIDDEN */
			/* ===================================== */
			
			.hidden{
			display:none;
			}
			
			/* ===================================== */
			/* ERROR */
			/* ===================================== */
			
			.error-message{
			color:#dc3545;
			font-size:13px;
			margin-top:4px;
			}
			
			/* ===================================== */
			/* INVALID */
			/* ===================================== */
			
			.is-invalid{
			border:1px solid #dc3545 !important;
			}
			
			.form-check {
			margin-left: 25px;
			}
			
			/* ===================================== */
			/* FORM CONTROLS */
			/* ===================================== */
			
			.form-control{
			width:100%;
			max-width:100%;
			}
			
			/* ===================================== */
			/* MEDIA */
			/* ===================================== */
			
			img,
			iframe,
			embed,
			object{
			max-width:100%;
			height:auto;
			border-radius:6px;
			}
			
			/* ===================================== */
			/* ROW FIX */
			/* ===================================== */
			
			.row{
			margin-left:0 !important;
			margin-right:0 !important;
			}
			
			.row > *{
			padding-left:10px;
			padding-right:10px;
			}
			
			/* ===================================== */
			/* MOBILE + TABLET */
			/* ===================================== */
			
			@media(max-width:991px){
			
			html,
			body{
			overflow-x:hidden;
			}
			
			.container,
			.container-fluid{
			width:100%;
			max-width:100%;
			padding-left:12px;
			padding-right:12px;
			overflow-x:hidden;
			}
			
			/* HEADER */
			
			.header{
			font-size:16px;
			padding:12px;
			line-height:1.5;
			}
			
			/* NAVBAR */
			
			.navbar{
			padding:10px;
			}
			
			.navbar img{
			width:70px !important;
			max-width:100%;
			}
			
			.dropdown-toggle img{
			width:36px !important;
			}
			
			/* TITLE */
			
			h5{
			font-size:22px;
			margin-bottom:18px;
			}
			
			/* PROFILE */
			
			.profile-box{
			margin-bottom:20px;
			text-align:center;
			padding:18px;
			font-size: 40px;
			}
			
			.profile-box img{
			width:95px !important;
			}
			
			/* FORM */
			
			.form-container{
			padding:16px;
			border-radius:10px;
			}
			
			/* TABS */
			
			.nav-tabs{
			display:flex;
			flex-wrap:nowrap;
			overflow-x:auto;
			overflow-y:hidden;
			white-space:nowrap;
			scrollbar-width:none;
			-webkit-overflow-scrolling:touch;
			margin-bottom:18px;
			}
			
			.nav-tabs::-webkit-scrollbar{
			display:none;
			}
			
			.nav-tabs .nav-item{
			flex:0 0 auto;
			}
			
			.nav-tabs .nav-link{
			font-size:35px;
			padding:12px 18px;
			}
			
			/* SINGLE COLUMN */
			
			.col-md-3,
			.col-md-4,
			.col-md-6,
			.col-md-8,
			.col-md-9,
			.col-md-12{
			width:100% !important;
			max-width:100% !important;
			flex:0 0 100% !important;
			margin-bottom:16px;
			padding-left:0 !important;
			padding-right:0 !important;
			}
			
			/* LABELS */
			
			label{
			font-size:50px !important;
			margin-bottom:10px;
			}
			
			/* INPUTS */
			
			.form-control {
			font-size: 40px !important;
			min-height: 69px;
			padding: 25px 15px;
			border-radius: 8px;
			}
			
			textarea.form-control{
			min-height:120px;
			}
			
			select.form-control{
			background-position:right 12px center;
			}
			
			/* ADDRESS */
			
			.d-flex.justify-content-between{
			flex-direction:column;
			align-items:flex-start !important;
			gap:8px;
			}
			
			.form-check{
			margin-top:0 !important;
			}
			
			.form-check-label{
			font-size:15px;
			}
			
			/* BUTTON */
			
			.btn{
			width:100%;
			padding:14px;
			font-size:17px;
			border-radius:8px;
			}
			
			.text-center .btn-success{
			width:100%;
			font-size: 50px;
			padding: 30px;
			}
			
			/* FILE PREVIEW */
			
			iframe,
			embed,
			object{
			min-height:220px;
			}
			
			/* ERROR */
			
			.error-message{
			font-size:14px;
			}
			
			.form-check-input[type=checkbox]:
			{
			border-radius: .25em;
			margin-left: 20px;
			font-size: 73px;
			}
			
			}
			
			/* ===================================== */
			/* SMALL MOBILE */
			/* ===================================== */
			
			@media(max-width:575px){
			
			.header{
			font-size:14px;
			}
			
			.nav-tabs .nav-link{
			font-size:14px;
			padding:10px 16px;
			}
			
			.form-container{
			padding:14px;
			}
			
			.profile-box{
			padding:14px;
			}
			
			h5{
			font-size:20px;
			}
			
			}
			
			
		</style>
		
	</head>
	
	<body>
		
		<div class="header">TDS Management Consultant PVT. LTD.</div>
		
		<div class="container mt-3">
			
			<nav class="navbar navbar-expand-lg shadow-sm mb-3 rounded">
				<div class="container-fluid">
					
					<a href="<?= base_url('userdashboard') ?>">
						<img src="<?= base_url()?>images/TDS-group-logo-New.jpg" style="width:80px;">
					</a>
					
					<ul class="navbar-nav ms-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
								<img src="<?= base_url();?>images/blank-person.png"
								class="rounded-circle"
								style="width:35px;">
							</a>
							
							<ul class="dropdown-menu dropdown-menu-end">
								<li>
									<a class="dropdown-item"
									href="<?= base_url('page/logout') ?>">
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
					
				</div>
			</nav>
			
			<h5>Welcome <?= $user['user_name']; ?></h5>
			
			<div class="row">
				
				<!-- PROFILE -->
				<div class="col-md-3">
					<div class="profile-box text-center">
						<?php if(!empty($application['application_photo'])): ?>
						<?php showFilePreview($application['application_photo'] ?? ''); ?>
						<?php else: ?>				
						<img src="<?= base_url()?>images/blank-person.png"
						style="width:120px;border-radius:50%;">
						<?php endif; ?>
						
						<hr>
						
						<p><b>Name :</b> <?= $user['user_name']; ?></p>
						<p><b>Email :</b> <?= $user['user_email_id']; ?></p>
					</div>
				</div>
				
				<!-- FORM -->
				<div class="col-md-9">
					
					<div class="form-container">
						
						<ul class="nav nav-tabs mb-3">
							<li class="nav-item">
								<a class="nav-link active"
								data-bs-toggle="tab"
								href="#basic">Basic</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link"
								data-bs-toggle="tab"
								href="#personal">Personal</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link"
								data-bs-toggle="tab"
								href="#academic">Academic</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link"
								data-bs-toggle="tab"
								href="#document">Document</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link"
								data-bs-toggle="tab"
								href="#bank">Bank</a>
							</li>
						</ul>
						
						
						
						<div class="tab-content">
							
							<!-- BASIC -->
							<div class="tab-pane fade show active" id="basic">
								<form method="post" id="applicationFormBasic" action="<?= site_url('page/saveApplicationForm') ?>" enctype="multipart/form-data" novalidate>
									
									<input type="hidden"
									name="application_user_id"
									value="<?= $user['user_id']; ?>">
									<div class="row">
										
										<div class="col-md-6">
											<label>Client Name <span class="required">*</span></label>
											
											<select name="application_client_name" class="form-control" required>
												
												<option value="">Select Client</option>
												
												<?php foreach($clients as $client): ?>
												
												<option value="<?= $client['client_name']; ?>"
												<?= (isset($application['application_client_name']) &&
													$application['application_client_name']==$client['client_name']) ? 'selected':''; ?>>
													
													<?= $client['client_name']; ?>
													
												</option>
												
												<?php endforeach; ?>
												
											</select>
										</div>
										
										<div class="col-md-6">
											<label>Employee Name <span class="required">*</span></label>
											
											<input type="text"
											name="employee_name"
											class="form-control"
											value="<?= $user['user_name']; ?>"
											readonly>
										</div>
										
										<div class="col-md-6">
											<label>Father Name <span class="required">*</span></label>
											
											<input type="text"
											name="father_name"
											class="form-control"
											maxlength="30"
											pattern="[A-Za-z ]+"
											required
											value="<?= $application['application_father_name'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>Mother Name <span class="required">*</span></label>
											
											<input type="text"
											name="mother_name"
											class="form-control"
											maxlength="30"
											pattern="[A-Za-z ]+"
											required
											value="<?= $application['application_mother_name'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>Gender <span class="required">*</span></label>
											
											<select name="gender"
                                            class="form-control"
                                            required>
												
												<option <?php if(!$application['Gender']) { ?> selected <?php } ?> value="">Select</option>
												<option <?php if($application['Gender'] == 'Male') { ?> selected <?php } ?> value="Male">Male</option>
												<option <?php if($application['Gender'] == 'Female') { ?> selected <?php } ?> value="Female">Female</option>
												<option <?php if($application['Gender'] == 'Other') { ?> selected <?php } ?> value="Other">Other</option>
												
											</select>
										</div>
										
										<div class="col-md-6">
											<label>Marital Status <span class="required">*</span></label>
											
											<select name="marital_status"
                                            id="marital_status"
                                            class="form-control"
                                            required>
												
												<option <?php if(!$application['application_marital_status']) { ?> selected <?php } ?> value="">Select</option>
												<option <?php if($application['application_marital_status'] == 'Single') { ?> selected <?php } ?> value="Single">Single</option>
												<option <?php if($application['application_marital_status'] == 'Married') { ?> selected <?php } ?> value="Married">Married</option>
												
											</select>
										</div>
										
										<div class="col-md-6 <?php if($application['application_marital_status'] != 'Married') { ?> hidden <?php } ?>" id="spouseDiv">
											<label>Spouse Name <span class="required">*</span></label>
											
											<input type="text"
											name="spouse"
											id="spouse"
											maxlength="30"
											class="form-control"
											value="<?= $application['application_wife_name'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>DOB <span class="required">*</span></label>
											
											<input type="date"
											name="dob"
											class="form-control"
											required
											max="<?= date('Y-m-d', strtotime('-18 years')); ?>"
											value="<?= $application['application_dob'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>DOJ <span class="required">*</span></label>
											
											<input type="date"
											name="doj"
											class="form-control"
											required
											value="<?= $application['application_doj'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>Pincode <span class="required">*</span></label>
											
											<input type="text"
											name="application_Pincode"
											class="form-control"
											maxlength="6"
											pattern="[0-9]{6}"
											required
											value="<?= $application['application_Pincode'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											
											<label>
												Present Address
												<span class="required">*</span>
											</label>
											
											<textarea
											name="present_address"
											id="present_address"
											class="form-control address-field"
											maxlength="100"
											minlength="20"
											required><?= $application['application_present_address'] ?? '' ?></textarea>
											
										</div>
										
										
										<div class="col-md-6">
											
											<div class="d-flex justify-content-between align-items-center">
												
												<label>
													Permanent Address <span class="required">*</span>
												</label>
												
												<div class="form-check mt-2">
													
													<input
													class="form-check-input"
													type="checkbox"
													id="sameAddress">
													
													<label class="form-check-label" for="sameAddress">
														Same as Present
													</label>
													
												</div>
												
											</div>
											
											<textarea
											name="permanent_address"
											id="permanent_address"
											class="form-control address-field"
											maxlength="100"
											minlength="20"
											required><?= $application['application_permanent_address'] ?? '' ?></textarea>
											
										</div>
										<input type="hidden" name="basic" value="basic">
										<div class="text-center mt-4">
											<button type="submit" name="submit_type" value="basic" class="btn btn-primary px-5">
												Update
											</button>
										</div>
									</form>
								</div>
								
							</div>
							
							<!-- PERSONAL -->
							<div class="tab-pane fade" id="personal">
								
								
								<form method="post" id="applicationFormPersonal" action="<?= site_url('page/saveApplicationForm') ?>" enctype="multipart/form-data" novalidate>
									<div class="row">	
										<input type="hidden"
										name="application_user_id"
										value="<?= $user['user_id']; ?>">
										<div class="col-md-6">
											<label>Contact Number <span class="required">*</span></label>
											
											<input type="text"
											name="mobile"
											class="form-control"
											value="<?= $user['user_contact_number']; ?>"
											readonly>
										</div>
										
										<div class="col-md-6">
											<label>Email ID <span class="required">*</span></label>
											
											<input type="email"
											name="email"
											class="form-control"
											value="<?= $user['user_email_id']; ?>"
											readonly>
										</div>
										
										<div class="col-md-6">
											<label>Emergency Contact Number <span class="required">*</span></label>
											
											<input type="text"
											name="emergency_contact"
											class="form-control"
											maxlength="10"
											pattern="[0-9]{10}"
											required
											value="<?= $application['application_mobile_no_emergency'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>Aadhaar Number <span class="required">*</span></label>
											
											<input type="text"
											name="aadhaar"
											class="form-control"
											maxlength="12"
											pattern="[0-9]{12}"
											required
											value="<?= $application['application_aadhaar_no'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>PAN Number <span class="required">*</span></label>
											
											<input type="text"
											name="pan"
											id="pan"
											class="form-control text-uppercase"
											maxlength="10"
											pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"
											required
											value="<?= $application['application_pan_no'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>UAN Number</label>
											
											<input type="text"
											name="uan"
											class="form-control"
											maxlength="20"
											pattern="[A-Za-z0-9]{1,20}"
											oninput="this.value = this.value.replace(/[^A-Za-z0-9]/g, '').slice(0,20);"
											value="<?= $application['application_uan_no'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>ESI Number</label>
											
											<input type="text"
											name="esi"
											class="form-control"
											maxlength="20"
											pattern="[A-Za-z0-9]{1,20}"
											oninput="this.value = this.value.replace(/[^A-Za-z0-9]/g, '').slice(0,20);"
											value="<?= $application['application_esi_no'] ?? '' ?>">
										</div>
										<input type="hidden" name="personal" value="personal">
										<div class="text-center mt-4">
											<button type="submit" name="submit_type" value="personal" class="btn btn-primary px-5">
												Update
											</button>
										</div>
									</div>
								</form>
							</div>
							
							<!-- ACADEMIC -->
							<div class="tab-pane fade" id="academic">
								
								
								<form method="post" id="applicationFormAcademic" action="<?= site_url('page/saveApplicationForm') ?>" enctype="multipart/form-data" novalidate>
									<div class="row">		
										<input type="hidden"
										name="application_user_id"
										value="<?= $user['user_id']; ?>">
										<div class="col-md-6">
											<label>Department <span class="required">*</span></label>
											
											<input type="text"
											name="department"
											class="form-control"
											maxlength="30"
											required
											value="<?= $application['application_department'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>Designation <span class="required">*</span></label>
											
											<input type="text"
											name="designation"
											class="form-control"
											maxlength="30"
											required
											value="<?= $application['application_designation'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>Qualification <span class="required">*</span></label>
											<select name="qualification"
                                            id="qualification"
                                            class="form-control"
                                            required>
												
												<option <?php if(!$application['application_education_qualification']) { ?> selected <?php } ?> value="">Select</option>
												<option <?php if($application['application_education_qualification'] == '8TH') { ?> selected <?php } ?> value="8TH">8TH</option>
												<option <?php if($application['application_education_qualification'] == '10TH') { ?> selected <?php } ?> value="10TH">10TH</option>
												<option <?php if($application['application_education_qualification'] == '12TH') { ?> selected <?php } ?> value="12TH">12TH</option>
												<option <?php if($application['application_education_qualification'] == 'GRADUATE') { ?> selected <?php } ?> value="GRADUATE">GRADUATE</option>
												<option <?php if($application['application_education_qualification'] == 'POST GRADUATE') { ?> selected <?php } ?> value="POST GRADUATE">POST GRADUATE</option>
												<option <?php if($application['application_education_qualification'] == 'OTHERS') { ?> selected <?php } ?> value="OTHERS">OTHERS</option>
												
											</select>
										</div>
										
										<div class="col-md-6 hidden" id="otherQualificationDiv">
											<label>Other Qualification</label>
											
											<input type="text"
											name="other_qualification"
											id="other_qualification"
											class="form-control"
											maxlength="30">
										</div>
										
										<div class="col-md-6">
											<label>Working Location <span class="required">*</span></label>
											
											<input type="text"
											name="location"
											class="form-control"
											maxlength="100"
											required
											value="<?= $application['location'] ?? '' ?>">
										</div>
										<input type="hidden" name="academic" value="academic">
										<div class="text-center mt-4">
											<button type="submit" name="submit_type" value="academic" class="btn btn-primary px-5">
												Update
											</button>
										</div>
										
									</div>
								</form>
							</div>
							
							<!-- DOCUMENT -->
							<div class="tab-pane fade" id="document">
								
								
								
								
								
								<form method="post" id="applicationFormDocument" action="<?= site_url('page/saveApplicationForm') ?>" enctype="multipart/form-data" novalidate>
									<div class="row">
										<input type="hidden"
										name="application_user_id"
										value="<?= $user['user_id']; ?>">
										
										<!-- PHOTO -->
										
										<div class="col-md-6">
											
											<label>
												Upload Photo
												<span class="required">*</span>
											</label>
											
											<?php showFilePreview($application['application_photo'] ?? ''); ?>
											
											<input type="file"
											name="photo"
											class="form-control"
											accept=".jpg,.jpeg,.png"
											<?php if(empty($application['application_photo'])): ?> required <?php endif; ?>>
											
										</div>
										
										
										
										<!-- QUALIFICATION CERTIFICATE -->
										
										<div class="col-md-6">
											
											<label>
												Upload Qualification Certificate
												<span class="required">*</span>
											</label>
											
											<?php showFilePreview($application['application_education_qualification_certificate'] ?? ''); ?>
											
											<input type="file"
											name="application_education_qualification_certificate"
											class="form-control"
											accept=".pdf"
											<?php if(empty($application['application_education_qualification_certificate'])): ?> required <?php endif; ?>>
											
										</div>
										
										
										
										<!-- AADHAAR FRONT -->
										
										<div class="col-md-6">
											
											<label>
												Upload Aadhaar Front
												<span class="required">*</span>
											</label>
											
											<?php showFilePreview($application['application_aadhaar_front_upload'] ?? ''); ?>
											
											<input type="file"
											name="aadhaar_front"
											class="form-control"
											accept=".pdf"
											<?php if(empty($application['application_aadhaar_front_upload'])): ?> required <?php endif; ?>>
											
										</div>
										
										
										
										<!-- AADHAAR BACK -->
										
										<div class="col-md-6">
											
											<label>
												Upload Aadhaar Back
												<span class="required">*</span>
											</label>
											
											<?php showFilePreview($application['application_aadhaar_back_upload'] ?? ''); ?>
											
											<input type="file"
											name="aadhaar_back"
											class="form-control"
											accept=".pdf"
											<?php if(empty($application['application_aadhaar_back_upload'])): ?> required <?php endif; ?>>
											
										</div>
										
										
										
										<!-- PAN -->
										
										<div class="col-md-6">
											
											<label>
												Upload PAN
												<span class="required">*</span>
											</label>
											
											<?php showFilePreview($application['application_pan_upload'] ?? ''); ?>
											
											<input type="file"
											name="pan_file"
											class="form-control"
											accept=".pdf"
											<?php if(empty($application['application_pan_upload'])): ?> required <?php endif; ?>>
											
										</div>
										
										
										
										<!-- PASSBOOK -->
										
										<div class="col-md-6">
											
											<label>
												Upload Passbook / Cancel Cheque <span class="required">*</span>
											</label>
											
											<?php showFilePreview($application['application_bank_account_passbook_upload'] ?? ''); ?>
											
											<input type="file"
											name="application_bank_account_passbook_upload"
											class="form-control"
											accept=".pdf"
											<?php if(empty($application['application_bank_account_passbook_upload'])): ?> required <?php endif; ?>>
											
										</div>
										
										
										
										<!-- SIGNATURE -->
										
										<div class="col-md-6">
											
											<label>
												Upload Signature
											</label>
											
											<?php showFilePreview($application['application_sign_upload'] ?? ''); ?>
											
											<input type="file"
											name="application_sign_upload"
											class="form-control"
											accept=".jpg,.jpeg,.png">
											
										</div>
										<input type="hidden" name="document" value="document">
										<div class="text-center mt-4">
											<button type="submit" name="submit_type" value="document" class="btn btn-primary px-5">
												Update
											</button>
										</div>
										
									</div>
								</form>
							</div>
							
							<!-- BANK -->
							<div class="tab-pane fade" id="bank">
								
								
								<form method="post" id="applicationFormBank" action="<?= site_url('page/saveApplicationForm') ?>" enctype="multipart/form-data" novalidate>
									<div class="row">	
										<input type="hidden"
										name="application_user_id"
										value="<?= $user['user_id']; ?>">
										<div class="col-md-6">
											<label>Bank Account Number <span class="required">*</span></label>
											
											<input type="text"
											name="account_no"
											class="form-control"
											maxlength="18"
											pattern="[0-9]{18}"
											required
											value="<?= $application['application_bank_account_number'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>Bank Name <span class="required">*</span></label>
											
											<select name="bank_name"
                                            class="form-control"
                                            required>
												
												<option value="">Select Bank</option>
												<?php foreach($bankmaster as $bank) { ?>
													<option value="<?php echo $bank['BankName'];?>" <?php if($application['application_bank_account_name'] == trim($bank['BankName'])) { ?> selected <?php } ?>><?php echo $bank['BankName'];?></option>
												<?php } ?>
												
											</select>
										</div>
										
										<div class="col-md-6">
											<label>IFSC Code <span class="required">*</span></label>
											
											<input type="text"
											name="ifsc"
											id="ifsc"
											class="form-control text-uppercase"
											maxlength="11"
											pattern="^[A-Z]{4}0[A-Z0-9]{6}$"
											required
											value="<?= $application['application_bank_account_ifsc'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>Nominee Name</label>
											
											<input type="text"
											name="application_nominee_name"
											class="form-control"
											maxlength="30"
											
											value="<?= $application['application_nominee_name'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>Nominee Contact Number</label>
											
											<input type="text"
											name="application_nominee_contact_no"
											class="form-control"
											maxlength="10"
											pattern="[0-9]{10}"
											
											value="<?= $application['application_nominee_contact_no'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>Nominee DOB</label>
											
											<input type="date"
											name="application_nominee_dob"
											class="form-control"
											
											value="<?= $application['application_nominee_dob'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>Nominee Address</label>
											
											<textarea name="application_nominee_address"
											class="form-control"
											maxlength="100"
											><?= $application['application_nominee_address'] ?? '' ?></textarea>
										</div>
										<input type="hidden" name="bank" value="bank">
										<div class="text-center mt-4">
											<button type="submit" name="submit_type" value="bank" class="btn btn-primary px-5">
												Update
											</button>
										</div>
										
									</div>
								</form>
								<form method="post" id="applicationFormTerms" action="<?= site_url('page/saveApplicationForm') ?>" enctype="multipart/form-data" novalidate>
									
									<input type="hidden"
									name="application_user_id"
									value="<?= $user['user_id']; ?>">
									<div class="col-md-12 form-check mt-4">
										<input class="form-check-input"
										type="checkbox"
										id="terms" >
										
										<label class="form-check-label" for="terms">
											I hereby declare that all the above-mentioned information's is complete, correct and true to the best of my knowledge.
										</label>
										
										<div class="error-message" id="termsError"></div>
									</div>
									
									<input type="hidden" name="final" value="final">
									<div class="text-center mt-4 hidden" id="applyNowDiv">
										<button type="submit" name="finalsubmit" value="finalsubmit" class="btn btn-success px-5">  
											Apply Now
										</button>
									</div>
								</form>
							</div>
							
						</div>
						
						
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
		<script>
			
			
			
			// MARRIED SHOW HIDE
			
			document.getElementById('marital_status').addEventListener('change', function(){
				
				let spouseDiv = document.getElementById('spouseDiv');
				
				let spouse = document.getElementById('spouse');
				
				if(this.value === 'Married'){
					
					spouseDiv.style.display = 'block';
					
					spouse.required = true;
					
					}else{
					
					spouseDiv.style.display = 'none';
					
					spouse.required = false;
					
					spouse.value = '';
					
				}
				
			});
			
			
			
			// QUALIFICATION
			
			document.getElementById('qualification').addEventListener('change', function(){
				
				let otherDiv = document.getElementById('otherQualificationDiv');
				
				let otherInput = document.getElementById('other_qualification');
				
				if(this.value === 'OTHERS'){
					
					otherDiv.style.display = 'block';
					
					otherInput.required = true;
					
					}else{
					
					otherDiv.style.display = 'none';
					
					otherInput.required = false;
					
					otherInput.value = '';
					
				}
				
			});
			
			
			
			// PAN UPPERCASE
			
			document.getElementById('pan').addEventListener('input', function(){
				
				this.value = this.value.toUpperCase();
				
			});
			
			
			
			// IFSC UPPERCASE
			
			document.getElementById('ifsc').addEventListener('input', function(){
				
				this.value = this.value.toUpperCase();
				
			});
			
			
			
			// NUMBER ONLY
			
			const numberFields = [
			
			'application_Pincode',
			'emergency_contact',
			'aadhaar',
			'uan',
			'esi',
			'account_no',
			'application_nominee_contact_no'
			
			];
			
			
			
			numberFields.forEach(function(name){
				
				let field = document.querySelector('[name="'+name+'"]');
				
				if(field){
					
					field.addEventListener('input', function(){
						
						this.value = this.value.replace(/[^0-9]/g,'');
						
					});
					
				}
				
			});
			
			
			
			// ALPHABET ONLY
			
			const alphaFields = [
			
			'father_name',
			'mother_name',
			'spouse',
			'application_nominee_name'
			
			];
			
			
			
			alphaFields.forEach(function(name){
				
				let field = document.querySelector('[name="'+name+'"]');
				
				if(field){
					
					field.addEventListener('input', function(){
						
						this.value = this.value.replace(/[^A-Za-z ]/g,'');
						
					});
					
				}
				
			});
			
			
			
			// ADD ERROR MESSAGE DIVS
			
			document.querySelectorAll('input,select,textarea').forEach(function(field){
				
				if(!field.parentElement.querySelector('.error-message')){
					
					let div = document.createElement('div');
					
					div.className = 'error-message';
					
					field.parentElement.appendChild(div);
					
				}
				
			});
			
			
			
			// REMOVE ERROR WHILE TYPING
			
			document.querySelectorAll('input,select,textarea').forEach(function(field){
				
				field.addEventListener('input', function(){
					
					this.classList.remove('is-invalid');
					
					let errorDiv = this.parentElement.querySelector('.error-message');
					
					if(errorDiv){
						
						errorDiv.innerHTML = '';
						
					}
					
				});
				
			});
			
			
			
			// FORM VALIDATION
			
			// FILE SIZE VALIDATION (500 KB)
			
			const fileFields = document.querySelectorAll('input[type="file"]');
			
			fileFields.forEach(function(field){
				
				field.addEventListener('change', function(){
					
					let errorDiv =
					this.parentElement.querySelector('.error-message');
					
					if(errorDiv){
						errorDiv.innerHTML = '';
					}
					
					this.classList.remove('is-invalid');
					
					if(this.files.length > 0){
						
						let fileSize = this.files[0].size / 1024; // KB
						
						if(fileSize > 500){
							
							this.value = '';
							
							this.classList.add('is-invalid');
							
							if(errorDiv){
								errorDiv.innerHTML =
								'File size must be less than 500 KB';
							}
							
						}
						
					}
					
				});
				
			});
			
			// ALL FORMS VALIDATION
			
			document.querySelectorAll('form')
			.forEach(function(form){
				
				form.addEventListener('submit', function(e){
					
					e.preventDefault();
					
					let firstInvalid = null;
					
					const fields =
					this.querySelectorAll(
					'input,select,textarea'
					);
					
					fields.forEach(function(field){
						
						field.classList.remove('is-invalid');
						
						let errorDiv =
						field.parentElement.querySelector('.error-message');
						
						if(errorDiv){
							errorDiv.innerHTML = '';
						}
						
						// REQUIRED
						
						if(
						field.hasAttribute('required') &&
						field.type !== 'file' &&
						field.value.trim() === ''
						){
							
							field.classList.add('is-invalid');
							
							if(errorDiv){
								errorDiv.innerHTML =
								'This field is required';
							}
							
							if(!firstInvalid){
								firstInvalid = field;
							}
							
						}
						
						// FILE REQUIRED
						
						if(
						field.type === 'file' &&
						field.hasAttribute('required') &&
						field.files.length === 0
						){
							
							field.classList.add('is-invalid');
							
							if(errorDiv){
								errorDiv.innerHTML =
								'Please upload file';
							}
							
							if(!firstInvalid){
								firstInvalid = field;
							}
							
						}
						
						// PINCODE
						
						if(
						field.name === 'application_Pincode' &&
						field.value !== '' &&
						!/^[0-9]{6}$/.test(field.value)
						){
							
							field.classList.add('is-invalid');
							
							errorDiv.innerHTML =
							'Pincode must be 6 digits';
							
							if(!firstInvalid){
								firstInvalid = field;
							}
							
						}
						
						// PAN
						
						if(
						field.name === 'pan' &&
						field.value !== '' &&
						!/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/.test(field.value)
						){
							
							field.classList.add('is-invalid');
							
							errorDiv.innerHTML =
							'PAN format should be ABCDE1234F';
							
							if(!firstInvalid){
								firstInvalid = field;
							}
							
						}
						
						// AADHAAR
						
						if(
						field.name === 'aadhaar' &&
						field.value !== '' &&
						!/^[0-9]{12}$/.test(field.value)
						){
							
							field.classList.add('is-invalid');
							
							errorDiv.innerHTML =
							'Aadhaar must be 12 digits';
							
							if(!firstInvalid){
								firstInvalid = field;
							}
							
						}
						
					});
					
					// TERMS ONLY FOR FINAL SUBMIT
					
					if(
					this.querySelector('#terms')
					){
						
						let terms =
						this.querySelector('#terms');
						
						let termsError =
						this.querySelector('#termsError');
						
						if(!terms.checked){
							
							terms.classList.add('is-invalid');
							
							termsError.innerHTML =
							'Please accept Terms';
							
							firstInvalid = terms;
							
						}
						
					}
					
					// INVALID
					
					if(firstInvalid){
						
						firstInvalid.focus();
						
						firstInvalid.scrollIntoView({
							behavior:'smooth',
							block:'center'
						});
						
						return false;
						
					}
					
					// SUCCESS
					
					this.submit();
					
				});
				
			});
			
			
			// SAME ADDRESS
			
			document.getElementById('sameAddress')
			.addEventListener('change', function(){
				
				let present =
				document.getElementById('present_address');
				
				let permanent =
				document.getElementById('permanent_address');
				
				if(this.checked){
					
					permanent.value = present.value;
					
					permanent.setAttribute('readonly', true);
					
					}else{
					
					permanent.removeAttribute('readonly');
					
					permanent.value = '';
					
				}
				
			});
			
			
			// LIVE UPDATE
			
			document.getElementById('present_address')
			.addEventListener('input', function(){
				
				let checkbox =
				document.getElementById('sameAddress');
				
				if(checkbox.checked){
					
					document.getElementById('permanent_address').value =
					this.value;
					
				}
				
			});
			// SHOW HIDE APPLY NOW BUTTON
			
			document.getElementById('terms')
			.addEventListener('change', function(){
				
				let applyBtn =
				document.getElementById('applyNowDiv');
				
				if(this.checked){
					
					applyBtn.style.display = 'block';
					
					}else{
					
					applyBtn.style.display = 'none';
					
				}
				
			}); 	
		</script>
		
		<?php $this->load->view('modules/footer'); ?>
		
	</body>
</html>

