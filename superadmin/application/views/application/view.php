<!DOCTYPE html>
<html>
	<head>
		<title>View Application</title>
		
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
			
			table.dataTable tbody td{
            vertical-align:middle;
			}
			
			.dt-buttons{
            margin-bottom:15px;
			}
		</style>
		
		<style>
			
			@media print{
			
			.sidebar,
			.navbar,
			.no-print{
			display:none !important;
			}
			
			body{
			background:#fff;
			}
			
			.card{
			border:none;
			box-shadow:none;
			}
			
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
			margin-bottom:5px;
			}
			
			.form-control{
			margin-bottom:15px;
			}
			
			.doc-img{
			width:140px;
			height:140px;
			object-fit:cover;
			border:1px solid #ddd;
			padding:5px;
			border-radius:5px;
			}
			
		</style>
	</head>
	
	<body>
		
		<div class="row m-0">
			<div class="col-md-2 sidebar d-flex flex-column">
				
				<div class="logo-box">
					
					<img src="<?= base_url();?>images/TDS-New-Logo-min.png">
					
					<div class="logo-text">
						TDS GROUP
					</div>
					
				</div>
				
				<div class="mt-3">
					
					<a href="<?= base_url('index.php/application') ?>"
					class="sidebar-link active">
						
						<i class="fas fa-home"></i>
						On Boarding
						
					</a>
					
					<a href="<?= base_url('index.php/client') ?>"
					class="sidebar-link">
						
						<i class="fas fa-users"></i>
						Client Management
						
					</a>
					
					<a href="<?= base_url('index.php/application/dashboard') ?>"
					class="sidebar-link">
						
						<i class="fas fa-chart-line"></i>
						Dashboard
						
					</a>
					
					<a href="<?= base_url('index.php/application/adminList') ?>"
					class="sidebar-link <?= uri_string() == 'application/adminList' ? 'active' : '' ?>">
						<i class="fas fa-chart-line"></i> Admin Management
					</a>
					
				</div>
				
			</div>
			
			
			<div class="col-10 content-body bg-white">
				
				<div class="col-12 bg-light">
					
					
					<nav class="navbar navbar-expand-lg bg-body-tertiary">
						<div class="container-fluid">
							
							<ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
								
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										<img src="<?= base_url();?>images/blank-person.png" class="rounded-circle" style="width: 30px;">
									</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="#">Logout</a></li>
									</li>
									
								</ul>
								
								
							</div>
						</nav>
						
						
					</div>
					
					<h3 class="mb-3">View Applicant</h3>
					
					
					
					<div class="card p-4">
						
						<h1 class="text-center mb-4">
							Employee Application Form
						</h1>
						
						<!-- BASIC DETAILS -->
						
						<?php
							$permissions = explode(',', $this->session->userdata('permissions'));
							$changeStatus = '';
							
							
							// =====================
							// REJECT REASON
							// =====================
							
							if(!empty($row->RejectReason)){
								
								$changeStatus .= '
								
								<div class="mb-3">
								
								<label style="font-weight:600; font-size:13px; margin-bottom:4px;">
								Reject Reason
								</label>
								
								<textarea readonly
								class="form-control"
								style="
								border:1px solid #dc3545;
								resize:none;
								background:#fff;
								font-size:13px;
								">'.$row->RejectReason.'</textarea>
								
								</div>';
							}
							
							
							
							// =====================
							// BUTTON DESIGN
							// =====================
							
							$changeStatus .= '<div class="d-flex flex-wrap gap-2 mb-3">';
							
							
							
							// APPROVE
							if(in_array('approve', $permissions)){
								
								$active = ($row->Status == 1);
								
								$changeStatus .= '
								<a href="' . (!$active ? base_url('index.php/application/changeStatus/'.$row->application_id.'/1') : 'javascript:void(0)') . '" 
								class="btn '.($active ? 'btn-success' : 'btn-outline-success').' "
								'.($active ? 'style="pointer-events:none; opacity:1; font-weight:bold;"' : '').'>
								'.($active ? '✓ Approved' : 'Approve').'
								</a>';
							}
							
							
							
							// PENDING
							if(in_array('pending', $permissions)){
								
								$active = ($row->Status == 0);
								
								$changeStatus .= '
								<a href="' . (!$active ? base_url('index.php/application/changeStatus/'.$row->application_id.'/0') : 'javascript:void(0)') . '" 
								class="btn '.($active ? 'btn-secondary' : 'btn-outline-secondary').' "
								'.($active ? 'style="pointer-events:none; opacity:1; font-weight:bold;"' : '').'>
								'.($active ? '✓ Pending' : 'Move to Pending').'
								</a>';
							}
							
							
							
							// UPDATE / REJECT
							if(in_array('reject', $permissions)){
								
								$active = ($row->Status == 2);
								
								$changeStatus .= '
								<a href="javascript:void(0)" 
								class="btn '.($active ? 'btn-info' : 'btn-outline-info').' "
								'.($active ? 'style="pointer-events:none; opacity:1; font-weight:bold;"' : '').'
								onclick="'.(!$active ? 'rejectApplication('.$row->application_id.')' : '').'">
								'.($active ? '✓ Rejected' : 'Rejected').'
								</a>';
							}
							
							
							
							// LEFT
							if(in_array('left', $permissions)){
								
								$active = ($row->Status == 5);
								
								$changeStatus .= '
								<a href="' . (!$active ? base_url('index.php/application/changeStatus/'.$row->application_id.'/5') : 'javascript:void(0)') . '" 
								class="btn '.($active ? 'btn-warning text-dark' : 'btn-outline-warning').' "
								'.($active ? 'style="pointer-events:none; opacity:1; font-weight:bold;"' : '').'>
								'.($active ? '✓ Left' : 'Left').'
								</a>';
							}
							
							
							
							// DELETE
							if(in_array('delete', $permissions)){
								
								$active = ($row->Status == 3);
								
								$changeStatus .= '
								<a href="' . (!$active ? base_url('index.php/application/changeStatus/'.$row->application_id.'/3') : 'javascript:void(0)') . '" 
								class="btn '.($active ? 'btn-danger' : 'btn-outline-danger').' "
								'.($active ? 'style="pointer-events:none; opacity:1; font-weight:bold;"' : '').'>
								'.($active ? '✓ Deleted' : 'Delete').'
								</a>';
							}
							
							if(in_array('edit', $permissions)){
								
								$changeStatus .= '<a href="' . base_url('index.php/application/edit/' . $row->application_user_id) . '" 
								class="btn btn-outline-success" style="opacity:1; font-weight:bold;">
								Update
								</a> ';
								
								
								
							}
							
							
							$changeStatus .= '</div>';
							
							
							
							
							echo $changeStatus;
						?>
						
						<div class="section-title">
							Basic Details
						</div>
						
						<div class="row">
							
							<div class="col-md-6">
								<label>Employee Name</label>
								<input type="text" class="form-control"
								value="<?= !empty($row->application_employee_name) ? $row->application_employee_name : ($user['user_name'] ?? ''); ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Creation Date</label>
								<input type="text" class="form-control"
								value="<?= $row->application_creation_date; ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Client Name</label>
								<input type="text" class="form-control"
								value="<?= $row->application_client_name ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Father Name</label>
								<input type="text" class="form-control"
								value="<?= $row->application_father_name ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Mother Name</label>
								<input type="text" class="form-control"
								value="<?= $row->application_mother_name ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Gender</label>
								<input type="text" class="form-control"
								value="<?= $row->Gender ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Marital Status</label>
								<input type="text" class="form-control"
								value="<?= $row->application_marital_status ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Spouse Name</label>
								<input type="text" class="form-control"
								value="<?= $row->application_wife_name ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Date of Birth</label>
								<input type="text" class="form-control"
								value="<?= $row->application_dob ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Date of Joining</label>
								<input type="text" class="form-control"
								value="<?= $row->application_doj ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Pincode</label>
								<input type="text" class="form-control"
								value="<?= $row->application_Pincode ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Status</label>
								
								<?php
									
									$statusText = '';
									
									switch($row->Status){
										
										case 0:
										$statusText = 'Pending';
										break;
										
										case 1:
										$statusText = 'Approved';
										break;
										
										case 2:
										$statusText = 'Rejected';
										break;
										
										case 3:
										$statusText = 'Deleted';
										break;
										
										case 5:
										$statusText = 'Left';
										break;
										
										default:
										$statusText = 'Unknown';
									}
									
								?>
								
								<input type="text"
								class="form-control"
								value="<?= $statusText ?>"
								readonly>
								
							</div>
							
							<div class="col-md-6">
								<label>Present Address</label>
								<textarea class="form-control"
								readonly><?= $row->application_present_address ?></textarea>
							</div>
							
							<div class="col-md-6">
								<label>Permanent Address</label>
								<textarea class="form-control"
								readonly><?= $row->application_permanent_address ?></textarea>
							</div>
							
						</div>
						
						<!-- PERSONAL DETAILS -->
						
						<div class="section-title">
							Personal Details
						</div>
						
						<div class="row">
							
							<div class="col-md-6">
								<label>Mobile Number</label>
								<input type="text" class="form-control"
								value="<?= !empty($row->application_mobile_no) ? $row->application_mobile_no : ($user['user_contact_number'] ?? ''); ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Email ID</label>
								<input type="text" class="form-control"
								value="<?= !empty($row->application_email) ? $row->application_email : ($user['user_email_id'] ?? ''); ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Emergency Contact Number</label>
								<input type="text" class="form-control"
								value="<?= $row->application_mobile_no_emergency ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Aadhaar Number</label>
								<input type="text" class="form-control"
								value="<?= $row->application_aadhaar_no ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>PAN Number</label>
								<input type="text" class="form-control"
								value="<?= $row->application_pan_no ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>UAN Number</label>
								<input type="text" class="form-control"
								value="<?= $row->application_uan_no ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>ESI Number</label>
								<input type="text" class="form-control"
								value="<?= $row->application_esi_no ?>" readonly>
							</div>
							
						</div>
						
						<!-- ACADEMIC DETAILS -->
						
						<div class="section-title">
							Academic Details
						</div>
						
						<div class="row">
							
							<div class="col-md-6">
								<label>Department</label>
								<input type="text" class="form-control"
								value="<?= $row->application_department ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Designation</label>
								<input type="text" class="form-control"
								value="<?= $row->application_designation ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Qualification</label>
								<input type="text" class="form-control"
								value="<?= $row->application_education_qualification ?>" readonly>
							</div>
							
							
							
							<div class="col-md-6">
								<label>Working Location</label>
								<input type="text" class="form-control"
								value="<?= $row->location ?>" readonly>
							</div>
							
						</div>
						
						<!-- DOCUMENT DETAILS -->
						
						<div class="section-title">
							Document Details
						</div>
						
						<div class="row">
							
							<div class="col-md-4 text-center mb-4">
								
								<label>Photo</label><br><br>
								
								<?php if(!empty($row->application_photo)){ ?>
									
									<?php showFilePreview($row->application_photo ?? ''); ?>
									
								<?php } ?>
								
							</div>
							
							<div class="col-md-4 mb-4">
								
								<label>Qualification Certificate</label><br>
								
								<?php if(!empty($row->application_education_qualification_certificate)){ ?>
									
									
									<?php showFilePreview($row->application_education_qualification_certificate ?? ''); ?>
									
									<?php } else { ?>
									
									Not Uploaded
									
								<?php } ?>
								
							</div>
							
							<div class="col-md-4 mb-4">
								
								<label>Aadhaar Front</label><br>
								
								<?php if(!empty($row->application_aadhaar_front_upload)){ ?>
									
									<?php showFilePreview($row->application_aadhaar_front_upload ?? ''); ?>
									
								<?php } ?>
								
							</div>
							
							<div class="col-md-4 mb-4">
								
								<label>Aadhaar Back</label><br>
								
								<?php if(!empty($row->application_aadhaar_back_upload)){ ?>
									
									<?php showFilePreview($row->application_aadhaar_back_upload ?? ''); ?>
									
								<?php } ?>
								
							</div>
							
							<div class="col-md-4 mb-4">
								
								<label>PAN Card</label><br>
								
								<?php if(!empty($row->application_pan_upload)){ ?>
									
									<?php showFilePreview($row->application_pan_upload ?? ''); ?>
									
								<?php } ?>
								
							</div>
							
							<div class="col-md-4 mb-4">
								
								<label>Passbook / Cancel Cheque</label><br>
								
								<?php if(!empty($row->application_bank_account_passbook_upload)){ ?>
									
									<?php showFilePreview($row->application_bank_account_passbook_upload ?? ''); ?>
									
								<?php } ?>
								
							</div>
							
							<div class="col-md-4 mb-4">
								
								<label>Signature</label><br>
								
								<?php if(!empty($row->application_sign_upload)){ ?>
									
									<?php showFilePreview($row->application_sign_upload ?? ''); ?>
									
								<?php } ?>
								
							</div>
							
						</div>
						
						<!-- BANK DETAILS -->
						
						<div class="section-title">
							Bank Details
						</div>
						
						<div class="row">
							
							<div class="col-md-6">
								<label>Bank Account Number</label>
								<input type="text" class="form-control"
								value="<?= $row->application_bank_account_number ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Bank Name</label>
								<input type="text" class="form-control"
								value="<?= $row->application_bank_account_name ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>IFSC Code</label>
								<input type="text" class="form-control"
								value="<?= $row->application_bank_account_ifsc ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Nominee Name</label>
								<input type="text" class="form-control"
								value="<?= $row->application_nominee_name ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Nominee Contact Number</label>
								<input type="text" class="form-control"
								value="<?= $row->application_nominee_contact_no ?>" readonly>
							</div>
							
							<div class="col-md-6">
								<label>Nominee DOB</label>
								<input type="text" class="form-control"
								value="<?= $row->application_nominee_dob ?>" readonly>
							</div>
							
							<div class="col-md-12">
								<label>Nominee Address</label>
								<textarea class="form-control"
								readonly><?= $row->application_nominee_address ?></textarea>
							</div>
							
						</div>
						
						<div class="text-center mt-5 no-print">
							
							<button onclick="window.print()"
							class="btn btn-primary px-5">
								Print Application
							</button>
							
						</div>
						
					</div>
					
					<div class="text-center mt-3 no-print">
						<a href="<?= base_url('superadmin/index.php/application') ?>" class="btn btn-secondary">Back</a>
					</div>
					
					
					
				</div>
				
			</div>
			
			<!-- Reject Reason Modal with Ghost Autocomplete -->
			<div class="modal fade" id="rejectReasonModal" tabindex="-1" aria-labelledby="rejectReasonModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="rejectReasonModalLabel"><i class="fas fa-exclamation-circle me-2"></i> Reject Application</h5>
							<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<input type="hidden" id="modalRejectAppId">
							<div class="mb-3">
								<label for="modalRejectReasonInput" class="form-label fw-bold">Enter or Select Reject Reason / Remarks:</label>
								<div class="position-relative" style="background: #fff; border-radius: 6px;">
									<input type="text" class="form-control position-absolute top-0 start-0 w-100 h-100" id="modalRejectReasonGhost" style="background: transparent; z-index: 1; pointer-events: none; color: #a0a0a0 !important; border: 1px solid #ced4da;" readonly tabindex="-1">
									<input type="text" class="form-control position-relative" id="modalRejectReasonInput" style="background: transparent; z-index: 2;" placeholder="Type reject reason..." autocomplete="off">
								</div>
								<div class="text-muted mt-1" style="font-size: 11px;">Press <kbd>Tab</kbd>, <kbd>&rarr;</kbd>, or <kbd>Enter</kbd> to accept auto-filled suggestion</div>
							</div>
							<!-- <div id="previousRejectReasonsBox" class="mb-2" style="display:none;">
								<label class="form-label text-muted small fw-bold mb-1">Previously Used Reasons (click to fill):</label>
								<div id="previousRejectReasonsList" class="d-flex flex-wrap gap-1"></div>
							</div> -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-danger" onclick="confirmRejectSubmit()">Confirm Reject</button>
						</div>
					</div>
				</div>
			</div>

			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
			<script>
				let currentRejectAppId = null;

				function loadRejectReasonsHistory() {
					let history = [];
					try {
						history = JSON.parse(localStorage.getItem('saved_reject_reasons') || '[]');
					} catch(e) { history = []; }

					let badgeBox = document.getElementById('previousRejectReasonsList');
					let container = document.getElementById('previousRejectReasonsBox');

					if (badgeBox) badgeBox.innerHTML = '';

					if (history.length > 0) {
						if (container) container.style.display = 'block';
						history.forEach(function(item) {
							if (badgeBox) {
								let badge = document.createElement('button');
								badge.type = 'button';
								badge.className = 'btn btn-sm btn-outline-danger me-1 mb-1 text-start';
								badge.style.fontSize = '12px';
								badge.textContent = item;
								badge.onclick = function() {
									let inp = document.getElementById('modalRejectReasonInput');
									inp.value = item;
									updateGhostText();
									inp.focus();
								};
								badgeBox.appendChild(badge);
							}
						});
					} else {
						if (container) container.style.display = 'none';
					}
				}

				function updateGhostText() {
					let inp = document.getElementById('modalRejectReasonInput');
					let ghost = document.getElementById('modalRejectReasonGhost');
					if (!inp || !ghost) return;

					let val = inp.value;
					if (!val || !val.trim()) {
						ghost.value = '';
						return;
					}

					let history = [];
					try {
						history = JSON.parse(localStorage.getItem('saved_reject_reasons') || '[]');
					} catch(e) { history = []; }

					let match = history.find(function(item) {
						return item.toLowerCase().startsWith(val.toLowerCase());
					});

					if (match) {
						ghost.value = val + match.substring(val.length);
					} else {
						ghost.value = '';
					}
				}

				function saveRejectReasonToHistory(reason) {
					if (!reason || !reason.trim()) return;
					reason = reason.trim();
					let history = [];
					try {
						history = JSON.parse(localStorage.getItem('saved_reject_reasons') || '[]');
					} catch(e) { history = []; }

					history = history.filter(function(r) { return r.toLowerCase() !== reason.toLowerCase(); });
					history.unshift(reason);
					if (history.length > 20) {
						history = history.slice(0, 20);
					}
					localStorage.setItem('saved_reject_reasons', JSON.stringify(history));
				}

				function rejectApplication(id) {
					currentRejectAppId = id;
					let appIdInput = document.getElementById('modalRejectAppId');
					let inp = document.getElementById('modalRejectReasonInput');
					let ghost = document.getElementById('modalRejectReasonGhost');
					if (appIdInput) appIdInput.value = id;
					if (inp) inp.value = '';
					if (ghost) ghost.value = '';

					loadRejectReasonsHistory();

					let modalEl = document.getElementById('rejectReasonModal');
					let modal = bootstrap.Modal.getOrCreateInstance(modalEl);
					modal.show();

					setTimeout(function() {
						if (inp) inp.focus();
					}, 400);
				}

				function confirmRejectSubmit() {
					let inp = document.getElementById('modalRejectReasonInput');
					let reason = inp ? inp.value.trim() : '';
					if (!reason) {
						alert("Please enter or select a reject reason.");
						return;
					}
					saveRejectReasonToHistory(reason);
					window.location.href = "<?php echo base_url('index.php/application/changeStatus'); ?>/" 
						+ currentRejectAppId + "/2?reason=" + encodeURIComponent(reason);
				}

				document.addEventListener('DOMContentLoaded', function() {
					let inp = document.getElementById('modalRejectReasonInput');
					let ghost = document.getElementById('modalRejectReasonGhost');

					if (inp) {
						inp.addEventListener('input', updateGhostText);

						inp.addEventListener('keydown', function(e) {
							if (ghost && ghost.value && ghost.value !== this.value) {
								if (e.key === 'Tab' || e.key === 'ArrowRight' || e.key === 'Enter') {
									e.preventDefault();
									this.value = ghost.value;
									updateGhostText();
								}
							}
						});
					}
				});
			</script>

					let modalEl = document.getElementById('rejectReasonModal');
					let modal = bootstrap.Modal.getOrCreateInstance(modalEl);
					modal.show();
				}

				function confirmRejectSubmit() {
					let reason = document.getElementById('modalRejectReasonInput').value.trim();
					if (!reason) {
						alert("Please enter or select a reject reason.");
						return;
					}
					saveRejectReasonToHistory(reason);
					window.location.href = "<?php echo base_url('index.php/application/changeStatus'); ?>/" 
						+ currentRejectAppId + "/2?reason=" + encodeURIComponent(reason);
				}
			</script>
			<?php $this->load->view('application/footer'); ?>
		</body>
	</html>									