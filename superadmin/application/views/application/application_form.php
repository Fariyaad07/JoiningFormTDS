
<!DOCTYPE html>
<html>
	<head>
		<title>Edit Application</title>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
		<style>
			body{
				background:#f5f5f5;
			}
			
			.sidebar{
				background: linear-gradient(180deg,#6c757d,#495057);
				min-height:100vh;
				padding:0;
			}
			
			.sidebar .logo-box{
				text-align:center;
				padding:20px 10px;
				border-bottom:1px solid rgba(255,255,255,0.2);
			}
			
			.sidebar .logo-box img{
				width:100px;
			}
			
			.sidebar .logo-text{
				color:#fff;
				font-weight:bold;
				margin-top:10px;
				font-size:16px;
			}
			
			.sidebar-link{
				display:flex;
				align-items:center;
				color:#fff;
				padding:12px 20px;
				font-size:15px;
				transition:0.3s;
				border-radius:6px;
				margin:5px 10px;
				text-decoration:none;
			}
			
			.sidebar-link i{
				width:25px;
			}
			
			.sidebar-link:hover{
				background:#343a40;
				transform:translateX(5px);
			}
			
			.sidebar-link.active{
				background:#212529;
			}
			
			.card{
				border-radius:10px;
			}
			
			.section-title{
				background:#f1f1f1;
				padding:10px;
				border-left:5px solid #0d6efd;
				margin-top:30px;
				margin-bottom:20px;
				font-size:22px;
				font-weight:600;
			}
			
			label{
				font-weight:600;
				margin-top:10px;
				margin-bottom:5px;
			}
			
			.form-control{
				margin-bottom:15px;
			}
			
			.required{
				color:red;
			}
			
			.hidden{
				display:none;
			}
			
			.error-message{
				color:#dc3545;
				font-size:13px;
				margin-top:4px;
			}
			
			.is-invalid{
				border:1px solid #dc3545 !important;
			}
			
			.profile-box-header{
				background:#f8f9fa;
				border-radius:10px;
				padding:20px;
				margin-bottom:20px;
				border:1px solid #e3e6f0;
			}
		</style>
	</head>
	
	<body>
		
		<div class="row m-0">
			<div class="col-md-2 sidebar d-flex flex-column">
				
				<div class="logo-box">
					<img src="<?= base_url();?>images/TDS-New-Logo-min.png">
					<div class="logo-text">TDS GROUP</div>
				</div>
				
				<div class="mt-3">
					<a href="<?= base_url('index.php/application') ?>" class="sidebar-link active">
						<i class="fas fa-home"></i> On Boarding
					</a>
					<a href="<?= base_url('index.php/client') ?>" class="sidebar-link">
						<i class="fas fa-users"></i> Client Management
					</a>
					<a href="<?= base_url('index.php/application/dashboard') ?>" class="sidebar-link">
						<i class="fas fa-chart-line"></i> Dashboard
					</a>
					<a href="<?= base_url('index.php/application/adminList') ?>" class="sidebar-link <?= uri_string() == 'application/adminList' ? 'active' : '' ?>">
						<i class="fas fa-chart-line"></i> Admin Management
					</a>
				</div>
				
			</div>
			
			<div class="col-10 content-body bg-white p-4">
				
				<div class="col-12 bg-light mb-3">
					<nav class="navbar navbar-expand-lg bg-body-tertiary">
						<div class="container-fluid">
							<ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										<img src="<?= base_url();?>images/blank-person.png" class="rounded-circle" style="width: 30px;">
									</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="<?= base_url('index.php/application/logout') ?>">Logout</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</nav>
				</div>
				
				<h3 class="mb-3">Edit Applicant</h3>
				
				<div class="card p-4">
					
					<h1 class="text-center mb-4">
						Employee Application Form
					</h1>
					
					<!-- EMPLOYEE PROFILE PHOTO & INFO ABOVE BASIC DETAILS -->
					<div class="profile-box-header">
						<div class="row align-items-center">
							<div class="col-auto text-center text-md-start">
								<?php if(!empty($application['application_photo'])): ?>
									<img src="<?= 'https://joiningform.tdsgroup.in/'.cleanFilePath($application['application_photo']) ?>" style="width:120px; height:120px; border-radius:50%; object-fit:cover; border:3px solid #0d6efd; padding:2px;">
								<?php else: ?>
									<img src="<?= base_url()?>images/blank-person.png" style="width:120px; height:120px; border-radius:50%; object-fit:cover; border:2px solid #ccc; padding:2px;">
								<?php endif; ?>
							</div>
							<div class="col mt-2 mt-md-0">
								<h5 class="mb-2"><b>Name :</b> <?= !empty($application['application_employee_name']) ? $application['application_employee_name'] : ($user['user_name'] ?? ''); ?></h5>
								<p class="text-muted mb-1"><b>Email :</b> <?= !empty($application['application_email']) ? $application['application_email'] : ($user['user_email_id'] ?? ''); ?></p>
								<p class="text-muted mb-0"><b>Contact :</b> <?= !empty($application['application_mobile_no']) ? $application['application_mobile_no'] : ($user['user_contact_number'] ?? ''); ?></p>
							</div>
						</div>
					</div>

					<form method="post" id="applicationForm" action="<?= base_url('index.php/application/saveApplicationForm') ?>" enctype="multipart/form-data" novalidate>
						
						<input type="hidden" name="application_user_id" value="<?= $user['user_id']; ?>">
						
						<!-- BASIC DETAILS -->
						<div class="section-title">
							Basic Details
						</div>
							
							<div class="row">
										
										<div class="col-md-6">
											<label>Client Name <span class="required">*</span></label>
											
											<select name="application_client_name"
                                            class="form-control"
                                            required>
												
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
											required
											value="<?= !empty($application['application_employee_name']) ? $application['application_employee_name'] : ($user['user_name'] ?? ''); ?>">
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
										
										<div class="col-md-6 hidden" id="spouseDiv">
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
											class="form-control"
											maxlength="100"
											required><?= $application['application_present_address'] ?? '' ?></textarea>
											
										</div>
										
										
										<div class="col-md-6">
											
											<div class="d-flex justify-content-between align-items-center">
												
												<label>
													Permanent Address
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
											class="form-control"
											maxlength="100"><?= $application['application_permanent_address'] ?? '' ?></textarea>
											
										</div>
										
									</div>
							
							<!-- PERSONAL DETAILS -->
							<div class="section-title">
								Personal Details
							</div>
							
							<div class="row">
										
										<div class="col-md-6">
											<label>Contact Number <span class="required">*</span></label>
											
											<input type="text"
											name="mobile"
											class="form-control"
											maxlength="10"
											pattern="[0-9]{10}"
											required
											value="<?= !empty($application['application_mobile_no']) ? $application['application_mobile_no'] : ($user['user_contact_number'] ?? ''); ?>">
										</div>
										
										<div class="col-md-6">
											<label>Email ID <span class="required">*</span></label>
											
											<input type="email"
											name="email"
											class="form-control"
											required
											value="<?= !empty($application['application_email']) ? $application['application_email'] : ($user['user_email_id'] ?? ''); ?>">
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
											maxlength="12"
											pattern="[0-9]{12}"
											value="<?= $application['application_uan_no'] ?? '' ?>">
										</div>
										
										<div class="col-md-6">
											<label>ESI Number</label>
											
											<input type="text"
											name="esi"
											class="form-control"
											maxlength="10"
											pattern="[0-9]{10}"
											value="<?= $application['application_esi_no'] ?? '' ?>">
										</div>
										
									</div>
							
							<!-- ACADEMIC DETAILS -->
							<div class="section-title">
								Academic Details
							</div>
							
							<div class="row">
										
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
										
									</div>
							
							<!-- DOCUMENT DETAILS -->
							<div class="section-title">
								Document Details
							</div>
							
							<div class="row">
										
										
										
										
										
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
												Upload Passbook / Cancel Cheque
											</label>
											
											<?php showFilePreview($application['application_bank_account_passbook_upload'] ?? ''); ?>
											
											<input type="file"
											name="application_bank_account_passbook_upload"
											class="form-control"
											accept=".pdf">
											
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
										
									</div>
							
							<!-- BANK DETAILS -->
							<div class="section-title">
								Bank Details
							</div>
							
							<div class="row">
										
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
										
										<div class="col-md-12 form-check mt-4">
											<input class="form-check-input"
											type="checkbox"
											id="terms" <?php if(!empty($application)) { ?> checked <?php } ?>>
											
											<label class="form-check-label" for="terms">
												I agree to the Terms and Conditions
											</label>
											
											<div class="error-message" id="termsError"></div>
										</div>
										
									</div>
							
							<div class="text-center mt-5">
								<button type="submit" class="btn btn-success px-5 me-2">
									Submit Application
								</button>
								<a href="<?= base_url('index.php/application') ?>" class="btn btn-secondary px-4">
									Back
								</a>
							</div>
							
						</form>
						
					</div>
					
				</div>
				
			</div>
			
			<?php $this->load->view('application/footer'); ?>
			
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
			
			
			// FORM VALIDATION
			
			document.getElementById('applicationForm')
			.addEventListener('submit', function(e){
				
				e.preventDefault();
				
				let firstInvalid = null;
				
				const fields =
				this.querySelectorAll('input,select,textarea');
				
				
				
				fields.forEach(function(field){
					
					field.classList.remove('is-invalid');
					
					
					
					let errorDiv =
					field.parentElement.querySelector('.error-message');
					
					
					
					if(errorDiv){
						
						errorDiv.innerHTML = '';
						
					}
					
					
					
					// REQUIRED CHECK
					
					if(field.hasAttribute('required') &&
					field.value.trim() === ''){
						
						field.classList.add('is-invalid');
						
						
						
						if(errorDiv){
							
							errorDiv.innerHTML =
							'This field is required';
							
						}
						
						
						
						if(!firstInvalid){
							
							firstInvalid = field;
							
						}
						
					}
					
					
					
					// PINCODE
					
					if(field.name === 'application_Pincode' &&
					field.value !== '' &&
					!/^[0-9]{6}$/.test(field.value)){
						
						field.classList.add('is-invalid');
						
						
						
						errorDiv.innerHTML =
						'Pincode must be 6 digits';
						
						
						
						if(!firstInvalid){
							
							firstInvalid = field;
							
						}
						
					}
					
					
					
					// AADHAAR
					
					if(field.name === 'aadhaar' &&
					field.value !== '' &&
					!/^[0-9]{12}$/.test(field.value)){
						
						field.classList.add('is-invalid');
						
						
						
						errorDiv.innerHTML =
						'Aadhaar must be 12 digits';
						
						
						
						if(!firstInvalid){
							
							firstInvalid = field;
							
						}
						
					}
					
					
					
					// PAN
					
					if(field.name === 'pan' &&
					field.value !== '' &&
					!/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/.test(field.value)){
						
						field.classList.add('is-invalid');
						
						
						
						errorDiv.innerHTML =
						'PAN format should be ABCDE1234F';
						
						
						
						if(!firstInvalid){
							
							firstInvalid = field;
							
						}
						
					}
					
					
					
					// CONTACT
					
					if(
					(
					field.name === 'emergency_contact' ||
					field.name === 'application_nominee_contact_no'
					)
					&&
					field.value !== ''
					&&
					!/^[0-9]{10}$/.test(field.value)
					){
						
						field.classList.add('is-invalid');
						
						
						
						errorDiv.innerHTML =
						'Mobile number must be 10 digits';
						
						
						
						if(!firstInvalid){
							
							firstInvalid = field;
							
						}
						
					}
					
					
					
					// ACCOUNT NUMBER
					
					if(field.name === 'account_no' &&
					field.value !== '' &&
					!/^[0-9]+$/.test(field.value)){
						
						field.classList.add('is-invalid');
						
						
						
						errorDiv.innerHTML =
						'Only numbers allowed';
						
						
						
						if(!firstInvalid){
							
							firstInvalid = field;
							
						}
						
					}
					
					
					
					// ALPHABET CHECK
					
					if(
					(
					field.name === 'father_name' ||
					field.name === 'mother_name' ||
					field.name === 'spouse' ||
					field.name === 'application_nominee_name'
					)
					&&
					field.value !== ''
					&&
					!/^[A-Za-z ]+$/.test(field.value)
					){
						
						field.classList.add('is-invalid');
						
						
						
						errorDiv.innerHTML =
						'Only alphabets allowed';
						
						
						
						if(!firstInvalid){
							
							firstInvalid = field;
							
						}
						
					}
					
				});
				
				
				
				
				
				// SCROLL TO FIRST INVALID FIELD
				
				if(firstInvalid){
					
					firstInvalid.focus();
					
					firstInvalid.scrollIntoView({
						behavior:'smooth',
						block:'center'
					});
					
					return false;
					
				}
				
				
				let terms = document.getElementById('terms');
				
				let termsError = document.getElementById('termsError');
				
				terms.classList.remove('is-invalid');
				
				termsError.innerHTML = '';
				
				if(!terms.checked){
					
					terms.classList.add('is-invalid');
					
					termsError.innerHTML =
					'Please accept Terms and Conditions';
					
					terms.scrollIntoView({
						behavior:'smooth',
						block:'center'
					});
					
					return false;
					
				}
				
				// FILE SIZE VALIDATION (500 KB)
			
				
				let fileError = false;

document.querySelectorAll('input[type="file"]').forEach(function(field){

	let errorDiv =
	field.parentElement.querySelector('.error-message');

	if(field.files.length > 0){

		let fileSize = field.files[0].size / 1024;

		if(fileSize > 500){

			field.classList.add('is-invalid');

			if(errorDiv){
				errorDiv.innerHTML =
				'File size must be less than 500 KB';
			}

			fileError = true;
		}
	}

});

if(fileError){
	return false;
}
				
				
				
				// SUCCESS POPUP
				
				alert('Thank You! Application Submitted Successfully.');
				
				
				
				this.submit();
				
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
			
		</script>
		
		
		
	</body>
</html>

